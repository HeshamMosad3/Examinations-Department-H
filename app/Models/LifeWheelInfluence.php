<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LifeWheelInfluence extends Model
{
    protected $fillable = ['source_axis', 'target_axis', 'level_key'];
}
