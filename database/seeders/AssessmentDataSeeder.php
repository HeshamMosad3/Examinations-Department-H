<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\Dashboard\Admin\Assessments\AssessmentImporter;
use Illuminate\Database\Seeder;

/**
 * أساس سيدرز المقاييس: كل مقياس ليه ملف بيانات في database/data/assessments/{code}.php، والسيدر بتاعه بيحدد الكود بس.
 * ممكن تشغيل مقياس واحد لوحده: php artisan db:seed --class=SelfDisciplineSeeder
 */
abstract class AssessmentDataSeeder extends Seeder
{
    protected string $code;

    public function run(AssessmentImporter $importer): void
    {
        $data = $this->data();
        $data['created_by'] = \App\Models\Admin::value('id');

        $assessment = $importer->import($data);
        $this->command?->info("  {$assessment->title_ar}");
    }

    /** بيانات المقياس من ملفه (ممكن السيدر الفرعي يضيف عليها) */
    protected function data(): array
    {
        return require database_path("data/assessments/{$this->code}.php");
    }
}
