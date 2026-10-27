<?php

namespace Database\Seeders;

use App\Services\Website\Assessments\PerceptualReportCopy;

class PerceptualStylesSeeder extends AssessmentDataSeeder
{
    protected string $code = 'perceptual_styles';

    /** نصوص التقرير بالشكل الجديد (database/data/perceptual_report_copy.php) فوق مستويات ملف المقياس */
    protected function data(): array
    {
        $data = parent::data();
        $copy = PerceptualReportCopy::levels();
        $data['levels'] = array_map(fn (array $level) => array_merge($level, $copy[$level['code'] ?? ''] ?? []), $data['levels'] ?? []);

        return $data;
    }
}
