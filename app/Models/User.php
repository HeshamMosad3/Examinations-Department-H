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
        'national_id',
        'phone',
        'identity_type',
        'gender',
        'qualification',
        'nationality',
        'name_en',
        'whatsapp',
        'birth_date',
        'residence',
        'heard_from',
        'job_status',
        'employer',
        'job_title',
        'photo',
        // أسماء الأعمدة حسب هيكل المشروع (الأسماء القديمة فوق بتتحوّل ليها تلقائيًا)
        'grand_father_name', 'id_number', 'phone_number', 'edu_qualification', 'functional_status',
        'how_you_reached_us', 'date_birth', 'place_of_work', 'logo', 'status', 'is_profile_complete',
    ];

    /**
     * أسماء حقول الفورم والـ CMS القديمة => أعمدة جدول users. الفورم والمفاتيح فضلت زي ما هي،
     * والموديل بيترجم الاسم عند القراءة والكتابة ($user->phone = عمود phone_number).
     */
    public const COLUMNS = [
        'grandfather_name' => 'grand_father_name',
        'national_id' => 'id_number',
        'phone' => 'phone_number',
        'qualification' => 'edu_qualification',
        'job_status' => 'functional_status',
        'heard_from' => 'how_you_reached_us',
        'birth_date' => 'date_birth',
        'employer' => 'place_of_work',
        'photo' => 'logo',
    ];

    /** اسم عمود قاعدة البيانات لحقل فورم */
    public static function column(string $field): string
    {
        return self::COLUMNS[$field] ?? $field;
    }

    public function getAttribute($key)
    {
        return parent::getAttribute(self::column((string) $key));
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute(self::column((string) $key), $value);
    }

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed',
        'date_birth' => 'date',
        'status' => 'boolean',
        'is_profile_complete' => 'boolean',
    ];
}
