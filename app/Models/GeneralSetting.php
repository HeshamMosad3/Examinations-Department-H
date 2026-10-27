<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralSetting extends Model
{
    use SoftDeletes;

    protected $fillable = ['key', 'value', 'type', 'group'];
}
