<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['email' => 'admin@alroaya.sa'], [
            'name' => 'مدير النظام',
            'password' => 'password',
            'role' => 'admin',
            'national_id' => '1000000000',
            'phone' => '0500000000',
        ]);

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
