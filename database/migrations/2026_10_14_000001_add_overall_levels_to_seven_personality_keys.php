<?php

use App\Models\Assessment;
use App\Models\ResultLevel;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /** مستويات النتيجة الإجمالية لمقياس مفاتيح الشخصية السبعة (النص الطويل في «ماذا تعني هذه النتيجة؟») للمقياس المحفوظ فعلًا */
    public function up(): void
    {
        $assessment = Assessment::where('code', Assessment::SEVEN_PERSONALITY_KEYS)->first();
        if (! $assessment || ResultLevel::where('assessment_id', $assessment->id)->whereNull('dimension_id')->exists()) {
            return;
        }

        foreach (require database_path('data/seven_personality_keys_overall.php') as $i => $level) {
            ResultLevel::create([
                'assessment_id' => $assessment->id,
                'dimension_id' => null,
                'code' => $level['code'],
                'title_ar' => $level['title_ar'],
                'min_score' => $level['min'],
                'max_score' => $level['max'],
                'description_ar' => $level['description_ar'],
                'order_index' => $i,
            ]);
        }
    }

    public function down(): void
    {
        $assessment = Assessment::where('code', Assessment::SEVEN_PERSONALITY_KEYS)->first();
        if ($assessment) {
            ResultLevel::where('assessment_id', $assessment->id)->whereNull('dimension_id')->delete();
        }
    }
};
