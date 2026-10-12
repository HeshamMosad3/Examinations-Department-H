<?php

namespace App\Services\Assessments;

use App\Models\ResultLevel;

/**
 * يحوّل مقياس من قاعدة البيانات لنفس شكل ملفات البيانات اللي AssessmentImporter بيقراها (للنسخ والتصدير).
 */
class AssessmentExporter
{
    public function export(AssessmentData $data): array
    {
        $assessment = $data->assessment->only([
            'code', 'title_ar', 'subtitle_ar', 'category', 'description_ar', 'instructions_ar', 'scoring_type', 'level_basis',
            'time_limit_min', 'price', 'image_url', 'report_code', 'is_active', 'order_index',
        ]);

        return $assessment + [
            'options' => [],
            'dimensions' => $data->roots()->map(fn ($d) => $this->dimension($data, $d))->all(),
            'levels' => $this->levels($data->levelsFor(null)),
        ];
    }

    private function dimension(AssessmentData $data, object $dimension): array
    {
        return [
            'code' => $dimension->code,
            'name_ar' => $dimension->name_ar,
            'description_ar' => $dimension->description_ar,
            'reverse_in_total' => $dimension->reverse_in_total,
            'questions' => $data->questions->where('dimension_id', $dimension->id)->map(fn ($q) => [
                'text' => $q->text_ar,
                'reversed' => $q->is_reversed,
                'options' => array_map(fn ($o) => [$o->label_ar, $o->score_value], $q->options),
            ])->values()->all(),
            'children' => $data->children($dimension->id)->map(fn ($c) => $this->dimension($data, $c))->all(),
            'levels' => $this->levels($data->levelsFor($dimension->id)),
        ];
    }

    private function levels($levels): array
    {
        return $levels->map(fn (ResultLevel $l) => [
            'code' => $l->code,
            'title_ar' => $l->title_ar,
            'min' => $l->min_score,
            'max' => $l->max_score,
            'summary_ar' => $l->summary_ar,
            'description_ar' => $l->description_ar,
            'strengths' => $l->strengths,
            'development_areas' => $l->development_areas,
            'how_to_learn' => $l->how_to_learn,
            'practical_tips' => $l->practical_tips,
            'strategies_title_ar' => $l->strategies_title_ar,
            'remember_ar' => $l->remember_ar,
            'programs_intro_ar' => $l->programs_intro_ar,
            'programs' => $l->programs,
            'programs_outro_ar' => $l->programs_outro_ar,
        ])->all();
    }
}
