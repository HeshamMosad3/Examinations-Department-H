<?php

use App\Models\AnswerOption;
use App\Models\Assessment;
use App\Models\Attempt;
use App\Models\Question;
use App\Services\Assessments\AssessmentData;
use App\Services\Assessments\AssessmentImporter;
use App\Services\Assessments\AttemptService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * مقياس مفاتيح الشخصية السبعة اتحدّث: درجات الإجابة من 0 إلى 4 (دائمًا ← أبدًا) بدل 1 إلى 5، ومستويات جديدة للمفاتيح والأبعاد الفرعية
     * والنتيجة الإجمالية (من 336). المقياس المحفوظ بيتبدّل بالنسخة الجديدة (database/data/assessments/seven_personality_keys.php)،
     * ومحاولات المستخدمين الحالية بتتحفظ من جديد: نفس الإجابات بنفس ترتيبها بدرجاتها الجديدة (الدرجة القديمة - 1).
     */
    public function up(): void
    {
        $old = Assessment::where('code', Assessment::SEVEN_PERSONALITY_KEYS)->first();
        if (! $old) {
            return; // قاعدة جديدة: السيدر بيحمّل النسخة الجديدة
        }

        $questionIds = Question::where('assessment_id', $old->id)->orderBy('order_index')->pluck('id')->all();
        if (! $questionIds || AnswerOption::query()->whereIn('question_id', $questionIds)->max('score_value') < 5) {
            return; // اتحدّث قبل كده
        }
        $position = array_flip($questionIds);

        // المحاولات القديمة: لكل واحدة الإجابات بترتيب العبارات (الدرجة القديمة من 1 إلى 5)
        $attempts = Attempt::where('assessment_id', $old->id)->orderBy('id')->get()->map(function ($attempt) use ($position) {
            $answers = DB::table('attempt_answers')->where('attempt_id', $attempt->id)->get(['question_id', 'score'])
                ->mapWithKeys(fn ($a) => [$position[$a->question_id] ?? -1 => (int) $a->score])->forget(-1)->all();

            return ['user_id' => $attempt->user_id, 'created_at' => $attempt->created_at, 'completed_at' => $attempt->completed_at, 'answers' => $answers];
        })->all();

        $data = require database_path('data/assessments/seven_personality_keys.php');
        $data['created_by'] = $old->created_by;
        $data['is_active'] = $old->is_active;
        $data['order_index'] = $old->order_index;

        DB::transaction(function () use ($data, $attempts) {
            $new = app(AssessmentImporter::class)->import($data);
            $assessmentData = AssessmentData::load($new);
            $orderedQuestions = $assessmentData->questions->values();
            $attemptsService = app(AttemptService::class);

            foreach ($attempts as $attempt) {
                $answers = [];
                foreach ($orderedQuestions as $i => $question) {
                    $score = max(0, min(4, ($attempt['answers'][$i] ?? 1) - 1));
                    $answers[$question->id] = collect($question->options)->firstWhere('score_value', $score)->id;
                }

                $saved = $attemptsService->save($attempt['user_id'], $assessmentData, $answers);
                DB::table('attempts')->where('id', $saved->id)->update(['created_at' => $attempt['created_at'], 'completed_at' => $attempt['completed_at']]);
            }
        });
    }

    public function down(): void
    {
        // النسخة القديمة (درجات 1 إلى 5) متاحة في تاريخ git لملف database/data/assessments/seven_personality_keys.php
    }
};
