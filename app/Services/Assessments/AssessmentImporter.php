<?php

namespace App\Services\Assessments;

use App\Models\AnswerOption;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\ResultLevel;
use Illuminate\Support\Facades\DB;

/**
 * يسجل مقياس كامل من مصفوفة بيانات (ملفات database/data/assessments/*.php، أو نسخة من مقياس موجود).
 *
 * الشكل:
 *   code, title_ar, subtitle_ar, category, description_ar, instructions_ar, scoring_type, level_basis, time_limit_min, price, ...
 *   options:    [[label, score], ...]          الاختيارات الافتراضية لكل الأسئلة
 *   dimensions: [{code, name_ar, description_ar, reverse_in_total, questions: [نص | {text, reversed, options}], children: [...], levels: [...]}]
 *   levels:     [{code, title_ar, min, max, summary_ar, description_ar, strengths, development_areas, how_to_learn,
 *                 practical_tips, strategies_title_ar, remember_ar, programs_intro_ar, programs: [نص | {title, subtitle, icon}], programs_outro_ar}]
 */
class AssessmentImporter
{
    private const ASSESSMENT_FIELDS = [
        'code', 'title_ar', 'subtitle_ar', 'category', 'description_ar', 'instructions_ar', 'scoring_type', 'level_basis',
        'time_limit_min', 'price', 'image_url', 'report_code', 'is_active', 'order_index', 'created_by',
    ];

    public function __construct(private readonly AssessmentManager $manager) {}

    /** لو فيه مقياس بنفس الكود بيتمسح بكل محتواه ومحاولاته الأول، عشان التشغيل المتكرر يدي نفس النتيجة. */
    public function import(array $data): Assessment
    {
        return DB::transaction(function () use ($data) {
            if ($existing = Assessment::where('code', $data['code'])->first()) {
                $this->manager->deleteAssessment($existing);
            }

            $assessment = Assessment::create(array_intersect_key($data, array_flip(self::ASSESSMENT_FIELDS)));
            $options = $data['options'] ?? [];
            $questionOrder = 0;

            foreach (array_values($data['dimensions'] ?? []) as $i => $dimension) {
                $this->importDimension($assessment, $dimension, null, $i, $options, $questionOrder);
            }
            $this->importLevels($assessment, null, $data['levels'] ?? []);

            return $assessment;
        });
    }

    private function importDimension(Assessment $assessment, array $data, ?int $parentId, int $order, array $options, int &$questionOrder): void
    {
        $dimension = Dimension::create([
            'assessment_id' => $assessment->id,
            'parent_id' => $parentId,
            'code' => $data['code'] ?? null,
            'name_ar' => $data['name_ar'],
            'description_ar' => $data['description_ar'] ?? null,
            'reverse_in_total' => $data['reverse_in_total'] ?? false,
            'order_index' => $order,
        ]);

        foreach ($data['questions'] ?? [] as $question) {
            $question = is_array($question) ? $question : ['text' => $question];
            $row = Question::create([
                'assessment_id' => $assessment->id,
                'dimension_id' => $dimension->id,
                'text_ar' => $question['text'],
                'is_reversed' => $question['reversed'] ?? false,
                'order_index' => $questionOrder++,
            ]);
            foreach (array_values($question['options'] ?? $options) as $k => [$label, $score]) {
                AnswerOption::create(['question_id' => $row->id, 'label_ar' => $label, 'score_value' => $score, 'order_index' => $k]);
            }
        }

        foreach (array_values($data['children'] ?? []) as $i => $child) {
            $this->importDimension($assessment, $child, $dimension->id, $i, $options, $questionOrder);
        }
        $this->importLevels($assessment, $dimension->id, $data['levels'] ?? []);
    }

    private function importLevels(Assessment $assessment, ?int $dimensionId, array $levels): void
    {
        foreach (array_values($levels) as $i => $level) {
            ResultLevel::create([
                'assessment_id' => $assessment->id,
                'dimension_id' => $dimensionId,
                'code' => $level['code'] ?? null,
                'title_ar' => $level['title_ar'],
                'min_score' => $level['min'] ?? null,
                'max_score' => $level['max'] ?? null,
                'summary_ar' => $level['summary_ar'] ?? null,
                'description_ar' => $level['description_ar'] ?? null,
                'strengths' => $level['strengths'] ?? null,
                'development_areas' => $level['development_areas'] ?? null,
                'how_to_learn' => $level['how_to_learn'] ?? null,
                'practical_tips' => $level['practical_tips'] ?? null,
                'strategies_title_ar' => $level['strategies_title_ar'] ?? null,
                'remember_ar' => $level['remember_ar'] ?? null,
                'programs_intro_ar' => $level['programs_intro_ar'] ?? null,
                'programs' => isset($level['programs'])
                    ? array_map(fn ($p) => is_array($p) ? $p : ['title' => $p], $level['programs'])
                    : null,
                'programs_outro_ar' => $level['programs_outro_ar'] ?? null,
                'order_index' => $i,
            ]);
        }
    }
}
