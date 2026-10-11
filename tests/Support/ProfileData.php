<?php

namespace Tests\Support;

/** بيانات ملف شخصي مكتمل (كل الحقول الإجبارية) لاختبارات التقارير المفصّلة */
final class ProfileData
{
    public static function complete(array $override = []): array
    {
        return $override + [
            'first_name' => 'أحمد',
            'father_name' => 'محمد',
            'grandfather_name' => 'علي',
            'last_name' => 'الشامسي',
            'name_en' => 'Ahmed Mohammed Ali',
            'identity_type' => 'سعودية',
            'nationality' => 'سعودي',
            'national_id' => '1012345678',
            'gender' => 'male',
            'birth_date' => '1990-05-10',
            'residence' => 'الرياض',
            'phone' => '0501234567',
            'qualification' => 'بكالوريوس',
            'job_status' => 'موظف',
            'employer' => 'شركة الرؤى',
        ];
    }
}
