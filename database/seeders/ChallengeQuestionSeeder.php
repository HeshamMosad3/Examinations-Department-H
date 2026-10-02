<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChallengeQuestion;

class ChallengeQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'question' => 'ما الشكل التالي في النمط؟',
                'type' => 'pattern',
                'pattern_row' => ['2-vert', '4-grid', '2-vert', 'question'],
                'options' => ['3-tr', '3-tl', '2-diag', '2-horiz'],
                'correct_index' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'ما الرقم التالي في المتتالية: ٢، ٤، ٨، ١٦؟',
                'type' => 'text',
                'pattern_row' => null,
                'options' => ['٢٤', '٣٢', '٢٠', '٢٨'],
                'correct_index' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'قلم : كتابة = مقص : ؟',
                'type' => 'text',
                'pattern_row' => null,
                'options' => ['خياطة', 'قطع', 'حديد', 'ألوان'],
                'correct_index' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'ما هو الشكل المكمل للسلسلة؟',
                'type' => 'pattern',
                'pattern_row' => ['1-center', '3-vert', '5-dice', 'question'],
                'options' => ['3-horiz', '5-dice', '4-grid', '1-center'],
                'correct_index' => 0,
                'is_active' => true,
            ]
        ];

        foreach ($questions as $q) {
            ChallengeQuestion::create($q);
        }
    }
}
