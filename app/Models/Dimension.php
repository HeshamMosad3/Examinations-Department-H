<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $fillable = ['assessment_id', 'parent_id', 'code', 'name_ar', 'description_ar', 'reverse_in_total', 'order_index'];

    protected $casts = [
        'reverse_in_total' => 'boolean',
        'order_index' => 'integer',
    ];
}
