<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeQuestion extends Model
{
    protected $fillable = [
        'question',
        'type',
        'pattern_row',
        'options',
        'correct_index',
        'is_active',
    ];

    protected $casts = [
        'pattern_row' => 'array',
        'options' => 'array',
        'is_active' => 'boolean',
        'correct_index' => 'integer',
    ];
}
