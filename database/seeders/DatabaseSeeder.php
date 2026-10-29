<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Admin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (UserRoleEnum::cases() as $role) {
            Role::findOrCreate($role->value, $role === UserRoleEnum::TRAINEES ? 'web' : 'admin');
        }

        // الأدمن: الإيميل والباسورد من ADMIN_EMAIL / ADMIN_PASSWORD، وبيتضبطوا في كل تشغيل
        // (غيّر المتغير وأعد الـ deploy لتغيير الباسورد). على الإنتاج من غير ADMIN_PASSWORD مفيش أدمن بيتعمل،
        // وعلى الجهاز المحلي بيتعمل بباسورد تجريبي للتجربة بس.
        $adminPassword = env('ADMIN_PASSWORD') ?: (app()->isProduction() ? null : 'password');
        if ($adminPassword) {
            Admin::updateOrCreate(['email' => env('ADMIN_EMAIL', 'admin@alroaya.sa')], [
                'user_name' => 'admin',
                'name' => 'مدير النظام',
                'password' => $adminPassword,
                'id_number' => '1000000000',
                'phone_number' => '0500000000',
            ])->assignRole(UserRoleEnum::SUPER_ADMIN->value);
        }

        // مستخدم تجريبي: للتطوير المحلي فقط، مش على الإنتاج
        if (! app()->isProduction()) {
            User::firstOrCreate(['email' => 'user@alroaya.sa'], [
                'name' => 'محمد أحمد',
                'password' => 'password',
                'national_id' => '1111111111',
                'phone' => '0511111111',
            ]);
        }

        // المقاييس العشرة: بتتزرع مرة واحدة بس لما جدول المقاييس يكون فاضي. تشغيلها تاني بيمسح المقياس ومحاولات
        // المستخدمين عليه (الـ Importer بيمسح الموجود بنفس الكود)، فالتشغيل المتكرر على السيرفر مايعيدهاش.
        // لإعادة زرع مقياس واحد: php artisan db:seed --class=SelfDisciplineSeeder
        if (! \App\Models\Assessment::exists()) {
            $this->call([
                WheelOfLifeSeeder::class,
                PerceptualStylesSeeder::class,
                SevenPersonalityKeysSeeder::class,
                BigFiveSeeder::class,
                CognitiveFlexibilitySeeder::class,
                SelfDisciplineSeeder::class,
                CriticalThinkingSeeder::class,
                CuriositySeeder::class,
                ReasoningAbilitiesSeeder::class,
                InitiativeSeeder::class,
            ]);
        }

        // أسئلة "التحدي السريع" في الصفحة الرئيسية
        if (! \App\Models\ChallengeQuestion::exists()) {
            $this->call(ChallengeQuestionSeeder::class);
        }
    }
}
