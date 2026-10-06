<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $fillable = ['user_id', 'assessment_id', 'total_score', 'max_score', 'percent', 'level_id', 'completed_at'];

    protected $casts = [
        'total_score' => 'integer',
        'max_score' => 'integer',
        'percent' => 'integer',
        'completed_at' => 'datetime',
    ];
}
