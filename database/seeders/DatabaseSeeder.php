<?php

namespace Database\Seeders;

use App\Models\AnswerOption;
use App\Models\Assessment;
use App\Models\Coupon;
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
        // Safety guard: Prevent destructive table reset in production environment
        if (! app()->environment(['local', 'testing'])) {
            throw new \RuntimeException('DatabaseSeeder destructive reset is disabled outside local or testing environments.');
        }

        // Disable foreign keys for truncation
        if (DB::connection()->getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        }

        // Truncate all tables in proper order
        DB::table('coupon_user')->delete();
        DB::table('coupon_assessment')->delete();
        Coupon::query()->forceDelete();
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

        // Include all finalized comprehensive assessments
        $this->call(AssessmentsDatabaseSeeder::class);
        $this->call(PerceptualStylesSeeder::class);
        $this->call(WheelOfLifeSeeder::class);
        $this->call(InitiativeAssessmentSeeder::class);
        $this->call(ReasoningAbilitiesAssessmentSeeder::class);
        $this->call(CognitiveFlexibilityAssessmentSeeder::class);
        $this->call(SelfDisciplineAssessmentSeeder::class);
        $this->call(GradedExamsDatabaseSeeder::class);

        // Seed some demo coupons
        $assessment = Assessment::first();

        // 1. FREE100: 100% discount, single use
        Coupon::firstOrCreate(
            ['code' => 'FREE100'],
            [
                'title' => 'كوبون خصم كامل 100%',
                'discount_percentage' => 100,
                'assessments_limit' => 1,
                'is_active' => true,
                'applies_to_all_assessments' => true,
            ]
        );

        // 2. TIERED: 1st 100%, 2nd 50%, 3rd 10%
        Coupon::firstOrCreate(
            ['code' => 'TIERED'],
            [
                'title' => 'كوبون الخصم المتدرج للمبادرة',
                'discount_percentage' => 100,
                'discount_percentage_2nd' => 50,
                'discount_percentage_3rd' => 10,
                'assessments_limit' => 3,
                'is_active' => true,
                'applies_to_all_assessments' => true,
            ]
        );

        // 3. SPECIFIC: Only for the first assessment
        if ($assessment) {
            $specificCoupon = Coupon::firstOrCreate(
                ['code' => 'SPECIFIC'],
                [
                    'title' => 'كوبون مقياس محدد',
                    'discount_percentage' => 100,
                    'assessments_limit' => 1,
                    'is_active' => true,
                    'applies_to_all_assessments' => false,
                ]
            );
            $specificCoupon->assessments()->syncWithoutDetaching([$assessment->id]);
        }
    }
}
