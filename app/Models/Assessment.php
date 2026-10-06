<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    // أكواد المقاييس اللي ليها صفحات خاصة في الموقع
    public const WHEEL_OF_LIFE = 'wheel_of_life';
    public const PERCEPTUAL_STYLES = 'perceptual_styles';

    public const SCORING_TYPES = [
        'sum' => 'مجموع الدرجات (مستويات حسب الدرجة)',
        'dominant_style' => 'النمط الغالب (أعلى محور / ثنائي / متوازن)',
    ];

    public const LEVEL_BASES = [
        'score' => 'الدرجة',
        'percent' => 'النسبة المئوية',
    ];

    protected $fillable = [
        'code', 'title_ar', 'subtitle_ar', 'category', 'description_ar', 'instructions_ar', 'scoring_type', 'level_basis',
        'time_limit_min', 'price', 'image_url', 'report_code', 'is_active', 'order_index', 'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'time_limit_min' => 'integer',
        'order_index' => 'integer',
    ];

    public static function byCode(string $code): ?self
    {
        return static::where('code', $code)->where('is_active', true)->first();
    }
}
