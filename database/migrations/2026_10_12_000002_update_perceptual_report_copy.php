<?php

use App\Models\Assessment;
use App\Models\ResultLevel;
use App\Services\Assessments\PerceptualReportCopy;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * نصوص تقرير الأنماط الإدراكية الجديدة (اسم النمط، ملخص نتيجتك، نقاط القوة، التطوير، الاستراتيجيات، تذكّر)
     * بتتحط على المستويات الموجودة مكانها من غير ما نمسح المقياس ومحاولات المستخدمين.
     */
    public function up(): void
    {
        $assessment = Assessment::where('code', Assessment::PERCEPTUAL_STYLES)->first();
        if (! $assessment) {
            return;
        }

        foreach (PerceptualReportCopy::levels() as $code => $copy) {
            ResultLevel::where('assessment_id', $assessment->id)->where('code', $code)->update($copy);
        }
    }

    public function down(): void
    {
        // النصوص القديمة متاحة في database/data/assessments/perceptual_styles.php (إعادة التسجيل بالسيدر)
    }
};
