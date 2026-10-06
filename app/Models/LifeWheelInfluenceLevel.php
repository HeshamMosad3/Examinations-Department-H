<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LifeWheelInfluenceLevel extends Model
{
    protected $fillable = ['key', 'name_ar', 'min_percent', 'max_percent', 'order_index'];

    protected $casts = [
        'min_percent' => 'integer',
        'max_percent' => 'integer',
        'order_index' => 'integer',
    ];
}
