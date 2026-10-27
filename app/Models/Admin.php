<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasRoles, Notifiable;

    protected string $guard_name = 'admin';

    protected $fillable = [
        'user_name',
        'name',
        'email',
        'password',
        'id_number',
        'phone_number',
        'logo',
        'edu_degree',
        'address',
        'about_me',
        'status',
        'is_show_in_teachers_home_page',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed',
        'status' => 'boolean',
        'is_show_in_teachers_home_page' => 'boolean',
    ];
}
