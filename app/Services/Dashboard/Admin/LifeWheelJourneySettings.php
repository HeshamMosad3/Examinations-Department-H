<?php

namespace App\Services\Dashboard\Admin;

use App\Models\LifeWheelJourneySetting;
use Illuminate\Support\Facades\Cache;

/**
 * إعدادات حركة عجلة الصفحة الرئيسية (بتتعدل من لوحة الإدارة وبتوصل للعجلة في window.LIFE_WHEEL_JOURNEY).
 */
class LifeWheelJourneySettings
{
    private const CACHE_KEY = 'life_wheel_journey_config';

    public const DEFAULTS = [
        'enabled' => true,
        'duration_seconds' => 7,
        'years' => 5,
        'start_mode' => 'random',
        'start_min' => 30,
        'start_max' => 60,
        'start_values' => [38, 54, 44, 58, 48, 36, 52, 42],
        'final_min' => 75,
        'final_max' => 95,
        'setback_level' => 2,
        'priority_axes' => ['career', 'health', 'personal', 'financial'],
    ];

    public const SETBACK_LEVELS = [0 => 'من غير تراجع', 1 => 'خفيف', 2 => 'متوسط', 3 => 'قوي'];

    /** الإعدادات الحالية (القيم الافتراضية لو الصف مش موجود). */
    public function get(): array
    {
        $row = LifeWheelJourneySetting::first();

        return $row ? array_merge(self::DEFAULTS, $row->only(array_keys(self::DEFAULTS))) : self::DEFAULTS;
    }

    /** اللي بيتبعت للعجلة: الجوانب بتتحول لأرقام بنفس ترتيب محاور العجلة. */
    public function wheelConfig(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            $s = $this->get();
            $order = array_keys(LifeWheelInfluenceSettings::AXES);
            $values = array_values($s['start_values']);

            return [
                'enabled' => (bool) $s['enabled'],
                'durationMs' => (int) $s['duration_seconds'] * 1000,
                'years' => (int) $s['years'],
                'startMode' => $s['start_mode'],
                'startMin' => (int) $s['start_min'],
                'startMax' => (int) $s['start_max'],
                'startValues' => array_map(fn ($i) => (int) ($values[$i] ?? 50), array_keys($order)),
                'finalMin' => (int) $s['final_min'],
                'finalMax' => (int) $s['final_max'],
                'setbackLevel' => (int) $s['setback_level'],
                'priorityAxes' => array_values(array_filter(array_map(
                    fn ($key) => array_search($key, $order, true),
                    $s['priority_axes'] ?? []
                ), fn ($i) => $i !== false)),
            ];
        });
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
