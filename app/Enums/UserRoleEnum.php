<?php

namespace App\Enums;

/** رتب النظام (حسب هيكل المشروع: الأدمن على حارس admin، والمتدربين على حارس web) */
enum UserRoleEnum: string
{
    case SUPER_ADMIN = 'Super_Admin';
    case ADMIN = 'Admin';
    case ADMISSION = 'Admission';
    case TEACHER = 'Teacher';
    case SUPPORT = 'Support';
    case TRAINEES = 'Trainees';
}
