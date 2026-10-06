<?php

namespace App\Services;

use App\Models\LifeWheelInfluence;
use App\Models\LifeWheelInfluenceLevel;
use Illuminate\Support\Facades\Cache;

/**
 * إعدادات تأثير جوانب عجلة الحياة على بعضها (بتتعدل من لوحة الإدارة وبتستخدمها عجلة الصفحة الرئيسية).
 */
class LifeWheelInfluenceSettings
{
    private const CACHE_KEY = 'life_wheel_influence_config';

    // نفس ترتيب محاور العجلة في resources/landing/js/newLifeWheel.js
    public const AXES = [
        'personal' => 'الشخصي',
        'spiritual' => 'الروحاني',
        'health' => 'الصحي',
        'social' => 'الاجتماعي',
        'family' => 'العائلي',
        'leisure' => 'الترفيهي',
        'financial' => 'المالي',
        'career' => 'المهني',
    ];

    public function levels()
    {
        return LifeWheelInfluenceLevel::orderBy('order_index')->get();
    }

    /** level_key لكل خلية: [source][target] */
    public function matrix(): array
    {
        $cells = LifeWheelInfluence::all()->groupBy('source_axis');
        $matrix = [];
        foreach (array_keys(self::AXES) as $source) {
            foreach (array_keys(self::AXES) as $target) {
                $matrix[$source][$target] = $source === $target
                    ? null
                    : $cells->get($source)?->firstWhere('target_axis', $target)?->level_key;
            }
        }

        return $matrix;
    }

    /**
     * اللي بيتبعت للعجلة: نطاق كل مستوى (0..1) ومصفوفة 8×8 بنفس ترتيب المحاور.
     */
    public function wheelConfig(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            $levels = $this->levels()->mapWithKeys(fn ($l) => [$l->key => [$l->min_percent / 100, $l->max_percent / 100]])->all();
            $matrix = array_map(fn ($row) => array_values($row), array_values($this->matrix()));

            return ['levels' => $levels, 'matrix' => $matrix];
        });
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
