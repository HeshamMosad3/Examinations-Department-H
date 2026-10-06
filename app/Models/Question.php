<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['assessment_id', 'dimension_id', 'text_ar', 'is_reversed', 'order_index'];

    protected $casts = [
        'is_reversed' => 'boolean',
        'order_index' => 'integer',
    ];
}
