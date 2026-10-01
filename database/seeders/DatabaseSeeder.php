<?php

namespace Database\Seeders;

use App\Models\AnswerOption;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\DimensionInterpretation;
use App\Models\DimensionScore;
use App\Models\ExamSession;
use App\Models\Question;
use App\Models\Recommendation;
use App\Models\Result;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign keys for truncation
        if (DB::connection()->getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        }

        // Truncate all tables in proper order
        DimensionScore::query()->forceDelete();
        Result::query()->forceDelete();
        UserAnswer::query()->forceDelete();
        ExamSession::query()->forceDelete();
        AnswerOption::query()->forceDelete();
        Question::query()->forceDelete();
        DimensionInterpretation::query()->forceDelete();
        Dimension::query()->forceDelete();
        Recommendation::query()->forceDelete();
        Assessment::query()->forceDelete();

        // Enable foreign keys
        if (DB::connection()->getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        }

        // Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@alroaya.sa'],
            [
                'name' => 'مدير النظام',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'national_id' => '1000000000',
                'phone' => '0500000000',
            ]
        );

        // Demo User
        $demoUser = User::firstOrCreate(
            ['email' => 'user@alroaya.sa'],
            [
                'name' => 'محمد أحمد',
                'password' => Hash::make('password'),
                'role' => 'user',
                'national_id' => '1111111111',
                'phone' => '0511111111',
            ]
        );

        // Include only the 9 allowed comprehensive assessments
        $this->call(PerceptualStylesSeeder::class);
        $this->call(WheelOfLifeSeeder::class);
        $this->call(InitiativeAssessmentSeeder::class);
        $this->call(ReasoningAbilitiesAssessmentSeeder::class);
        $this->call(CognitiveFlexibilityAssessmentSeeder::class);
        $this->call(SelfDisciplineAssessmentSeeder::class);
        $this->call(BigFivePersonalityAssessmentSeeder::class);
        $this->call(CriticalThinkingAssessmentSeeder::class);
        $this->call(CuriosityAssessmentSeeder::class);

    }
}
