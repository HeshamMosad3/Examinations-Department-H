<?php

namespace App\Enums;

/** مجموعات جدول general_settings (حسب هيكل المشروع) */
enum SettingsGroupsEnum: string
{
    case GENERAL_GROUP = 'general';
    case COUNTERS_GROUP = 'counters';
    case COMMON_GROUP = 'commons';
}
