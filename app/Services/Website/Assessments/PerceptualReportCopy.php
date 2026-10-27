<?php

namespace App\Services\Website\Assessments;

/**
 * نصوص تقرير الأنماط الإدراكية بالشكل الجديد لكل مستوى (database/data/perceptual_report_copy.php)،
 * بنفس شكل حقول المستوى: الفقرات بتتقسم لجمل عشان تظهر سطر لكل جملة في لوحة الإدارة وتتجمع تاني في الكروت.
 */
class PerceptualReportCopy
{
    private const LISTS = ['strengths', 'development_areas', 'how_to_learn'];

    /** @return array<string, array<string, mixed>> المفتاح كود المستوى */
    public static function levels(): array
    {
        $copy = require database_path('data/perceptual_report_copy.php');

        return array_map(function (array $level) {
            foreach (self::LISTS as $list) {
                $level[$list] = self::sentences($level[$list] ?? '');
            }

            return $level;
        }, $copy);
    }

    /** يقسم الفقرة جمل عند النقطة (وعلامة الاستفهام اللي بعدها مسافة وبداية جملة جديدة) */
    public static function sentences(string $text): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/(?<=[.؟])\s+(?=[^\s])/u', trim($text)))));
    }
}
