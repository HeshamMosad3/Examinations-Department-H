<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** إعدادات حركة عجلة الصفحة الرئيسية (صف واحد). */
class LifeWheelJourneySetting extends Model
{
    protected $fillable = [
        'enabled', 'duration_seconds', 'years', 'start_mode', 'start_min', 'start_max', 'start_values',
        'final_min', 'final_max', 'setback_level', 'priority_axes',
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'duration_seconds' => 'integer',
        'years' => 'integer',
        'start_min' => 'integer',
        'start_max' => 'integer',
        'start_values' => 'array',
        'final_min' => 'integer',
        'final_max' => 'integer',
        'setback_level' => 'integer',
        'priority_axes' => 'array',
    ];
}
