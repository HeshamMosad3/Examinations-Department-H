<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'first_name',
        'father_name',
        'grandfather_name',
        'last_name',
        'email',
        'password',
        'role',
        'national_id',
        'phone',
        'identity_type',
        'gender',
        'qualification',
        'nationality',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
