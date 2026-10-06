<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttemptScore extends Model
{
    public $timestamps = false;

    protected $fillable = ['attempt_id', 'dimension_id', 'score', 'max_score', 'percent', 'level_id'];
}
