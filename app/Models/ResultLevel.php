<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * مستوى نتيجة (للمقياس كله لو dimension_id = null، أو لمحور معين) بتفسيره وتوصياته.
 */
class ResultLevel extends Model
{
    // القوائم اللي ممكن تتكتب للمستوى، واسمها في لوحة الإدارة
    public const LISTS = [
        'strengths' => 'نقاط القوة',
        'development_areas' => 'مجالات التطوير',
        'how_to_learn' => 'كيف تتعلم',
        'practical_tips' => 'إرشادات وتوجيهات عملية',
    ];

    // أسماء القوائم في مقاييس النمط الغالب (تقرير الأنماط الإدراكية): نفس عناوين الكروت في التقرير
    public const REPORT_LIST_LABELS = [
        'strengths' => 'نقاط قوتك',
        'development_areas' => 'جوانب يمكنك تطويرها',
        'how_to_learn' => 'كيف تستفيد من نمطك',
        'practical_tips' => 'إرشادات وتوجيهات عملية (غير معروضة في التقرير الجديد)',
    ];

    protected $fillable = [
        'assessment_id', 'dimension_id', 'code', 'title_ar', 'min_score', 'max_score', 'summary_ar', 'description_ar',
        'strengths', 'development_areas', 'how_to_learn', 'strategies_title_ar', 'practical_tips', 'remember_ar', 'programs_intro_ar', 'programs', 'programs_outro_ar', 'order_index',
    ];

    protected $casts = [
        'assessment_id' => 'integer',
        'dimension_id' => 'integer',
        'min_score' => 'integer',
        'max_score' => 'integer',
        'order_index' => 'integer',
        'strengths' => 'array',
        'development_areas' => 'array',
        'how_to_learn' => 'array',
        'practical_tips' => 'array',
        'programs' => 'array',
    ];
}
