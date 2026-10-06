<?php

namespace App\Services\Assessments;

use App\Models\ResultLevel;
use Illuminate\Support\Collection;

/**
 * فحص سلامة المقياس قبل تفعيله: أي حاجة ممكن تخلي نتيجة مستخدم تطلع من غير مستوى أو غلط.
 * المشاكل متقسمة على خطوات إعداد المقياس (dimensions / questions / levels) عشان صفحة المقياس توضح كل خطوة ناقصها إيه.
 */
class AssessmentHealth
{
    /** @return list<string> كل المشاكل في قايمة واحدة */
    public function issues(AssessmentData $data): array
    {
        return array_merge(...array_values($this->issuesByArea($data)));
    }

    /** @return array{dimensions: list<string>, questions: list<string>, levels: list<string>} */
    public function issuesByArea(AssessmentData $data): array
    {
        $issues = ['dimensions' => [], 'questions' => [], 'levels' => []];

        if ($data->dimensions->isEmpty()) {
            $issues['dimensions'][] = 'المقياس مفيهوش محاور. حتى المقياس اللي ليه محور واحد محتاج محور.';
        }
        if ($data->questions->isEmpty()) {
            $issues['questions'][] = 'المقياس مفيهوش أسئلة.';

            return $issues;
        }

        foreach ($data->dimensions as $dimension) {
            if ($data->questionsUnder($dimension->id)->isEmpty()) {
                $issues['dimensions'][] = "محور «{$dimension->name_ar}» مفيهوش أسئلة.";
            }
        }

        $fewOptions = $data->questions->filter(fn ($q) => count($q->options) < 2)->count();
        if ($fewOptions) {
            $issues['questions'][] = "{$fewOptions} سؤال فيه أقل من اختيارين للإجابة.";
        }
        $loose = $data->questions->whereNull('dimension_id')->count();
        if ($loose && $data->dimensions->isNotEmpty()) {
            $issues['questions'][] = "{$loose} سؤال مش تابع لأي محور (بيتحسب في الدرجة الكلية بس).";
        }

        $basis = $data->assessment->level_basis;
        $range = fn (Collection $questions) => $basis === 'percent' ? [0, 100] : [
            $questions->sum(fn ($q) => min(array_column($q->options, 'score_value') ?: [0])),
            $questions->sum(fn ($q) => max(array_column($q->options, 'score_value') ?: [0])),
        ];

        if ($data->assessment->scoring_type === 'dominant_style') {
            $codes = $data->roots()->pluck('code')->filter()->values();
            $expected = $codes->merge(['balanced']);
            foreach ($codes as $i => $a) {
                foreach ($codes->slice($i + 1) as $b) {
                    $expected->push("dual_{$a}_{$b}");
                }
            }
            $missing = $expected->diff($data->levelsFor(null)->pluck('code'));
            if ($missing->isNotEmpty()) {
                $issues['levels'][] = 'نتائج النمط الغالب الناقصة (كود المستوى): ' . $missing->implode('، ');
            }
        } elseif ($data->levelsFor(null)->isNotEmpty() || $data->levels->isEmpty()) {
            // مقياس من غير مستوى كلي بس ليه مستويات على المحاور (ملف شخصي زي 7PK) مش محتاج مستويات للمقياس كله
            $issues['levels'] = array_merge($issues['levels'], $this->coverage('المقياس كله', $data->levelsFor(null), $range($data->questions)));
        }

        foreach ($data->dimensions as $dimension) {
            $levels = $data->levelsFor($dimension->id);
            if ($levels->isNotEmpty()) {
                $issues['levels'] = array_merge($issues['levels'], $this->coverage("محور «{$dimension->name_ar}»", $levels, $range($data->questionsUnder($dimension->id))));
            }
        }

        return $issues;
    }

    /** النطاقات لازم تغطي كل الدرجات الممكنة من غير فجوات */
    private function coverage(string $scope, Collection $levels, array $range): array
    {
        [$min, $max] = $range;
        if ($levels->isEmpty()) {
            return ["{$scope}: مفيش مستويات نتيجة."];
        }

        $ranged = $levels->filter(fn (ResultLevel $l) => $l->min_score !== null)->sortBy('min_score')->values();
        $issues = [];
        $next = $min;
        foreach ($ranged as $level) {
            if ($level->min_score > $next) {
                $issues[] = "{$scope}: الدرجات من {$next} إلى " . ($level->min_score - 1) . ' مالهاش مستوى.';
            }
            $next = max($next, $level->max_score + 1);
        }
        if ($next <= $max) {
            $issues[] = "{$scope}: الدرجات من {$next} إلى {$max} مالهاش مستوى.";
        }

        return $issues;
    }
}
