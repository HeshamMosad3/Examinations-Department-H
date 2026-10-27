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

        Admin::firstOrCreate(['email' => 'admin@alroaya.sa'], [
            'user_name' => 'admin',
            'name' => 'مدير النظام',
            'password' => 'password',
            'id_number' => '1000000000',
            'phone_number' => '0500000000',
        ])->assignRole(UserRoleEnum::SUPER_ADMIN->value);

        User::firstOrCreate(['email' => 'user@alroaya.sa'], [
            'name' => 'محمد أحمد',
            'password' => 'password',
            'role' => 'user',
            'national_id' => '1111111111',
            'phone' => '0511111111',
        ]);

        // المقاييس العشرة
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

        // أسئلة "التحدي السريع" في الصفحة الرئيسية
        if (! \App\Models\ChallengeQuestion::exists()) {
            $this->call(ChallengeQuestionSeeder::class);
        }
    }
}
