<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{
    protected $fillable = ['question_id', 'label_ar', 'score_value', 'order_index'];

    protected $casts = [
        'score_value' => 'integer',
        'order_index' => 'integer',
    ];
}
