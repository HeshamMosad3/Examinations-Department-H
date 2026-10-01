<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasUuids, Notifiable, SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'role', 'national_id', 'phone', 'gender', 'qualification', 'nationality'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'role' => 'string',
        'password' => 'hashed',
    ];

    public function delete()
    {
        return DB::transaction(fn () => parent::delete());
    }

    public function restore()
    {
        $pattern = '/_deleted_\d+$/';
        $originalEmail = preg_replace($pattern, '', $this->email);
        $originalNationalId = $this->national_id ? preg_replace($pattern, '', $this->national_id) : null;
        $originalPhone = $this->phone ? preg_replace($pattern, '', $this->phone) : null;

        if (static::where('email', $originalEmail)->whereNull('deleted_at')->where('id', '!=', $this->id)->exists()) {
            throw new \Exception('لا يمكن استرجاع هذا المستخدم لوجود مستخدم نشط آخر بنفس البريد الإلكتروني.');
        }

        if ($originalNationalId && static::where('national_id', $originalNationalId)->whereNull('deleted_at')->where('id', '!=', $this->id)->exists()) {
            throw new \Exception('لا يمكن استرجاع هذا المستخدم لوجود مستخدم نشط آخر بنفس الرقم القومي.');
        }

        if ($originalPhone && static::where('phone', $originalPhone)->whereNull('deleted_at')->where('id', '!=', $this->id)->exists()) {
            throw new \Exception('لا يمكن استرجاع هذا المستخدم لوجود مستخدم نشط آخر بنفس رقم الهاتف.');
        }

        return DB::transaction(fn () => parent::restore());
    }

    public static function bulkSoftDelete(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            static::whereIn('id', $ids)->get()->each->delete();
        });
    }

    protected static function booted(): void
    {
        static::deleting(function (User $user) {
            if (!$user->isForceDeleting()) {
                $timestamp = now()->timestamp;
                $user->email = $user->email . '_deleted_' . $timestamp;
                if ($user->national_id) {
                    $user->national_id = $user->national_id . '_deleted_' . $timestamp;
                }
                if ($user->phone) {
                    $user->phone = $user->phone . '_deleted_' . $timestamp;
                }
                $user->saveQuietly();
            }
        });

        static::restoring(function (User $user) {
            $pattern = '/_deleted_\d+$/';
            $user->email = preg_replace($pattern, '', $user->email);
            if ($user->national_id) {
                $user->national_id = preg_replace($pattern, '', $user->national_id);
            }
            if ($user->phone) {
                $user->phone = preg_replace($pattern, '', $user->phone);
            }
            $user->saveQuietly();
        });
    }

    public function getDisplayEmailAttribute(): string
    {
        return preg_replace('/_deleted_\d+$/', '', $this->email);
    }

    public function getDisplayPhoneAttribute(): ?string
    {
        return $this->phone ? preg_replace('/_deleted_\d+$/', '', $this->phone) : null;
    }

    public function getDisplayNationalIdAttribute(): ?string
    {
        return $this->national_id ? preg_replace('/_deleted_\d+$/', '', $this->national_id) : null;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function examSessions()
    {
        return $this->hasMany(ExamSession::class);
    }

    public function createdAssessments()
    {
        return $this->hasMany(Assessment::class, 'created_by');
    }
}
