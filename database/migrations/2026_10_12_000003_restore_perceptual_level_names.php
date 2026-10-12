<?php

use App\Models\Assessment;
use App\Models\ResultLevel;
use App\Services\Assessments\PerceptualReportCopy;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /** أسماء مستويات تقرير الأنماط الإدراكية زي تصميم فيجما (النمط الحسي (العملي)، نمط مزدوج (بصري - سمعي)، نمط متوازن...) */
    public function up(): void
    {
        $assessment = Assessment::where('code', Assessment::PERCEPTUAL_STYLES)->first();
        if (! $assessment) {
            return;
        }

        foreach (PerceptualReportCopy::levels() as $code => $copy) {
            ResultLevel::where('assessment_id', $assessment->id)->where('code', $code)->update(['title_ar' => $copy['title_ar']]);
        }
    }

    public function down(): void
    {
        // الأسماء السابقة متاحة في database/data/assessments/perceptual_styles.php
    }
};
