<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\AnswerOption;
use App\Models\Recommendation;
use Illuminate\Support\Str;

class CognitiveFlexibilityAssessmentSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Assessment
        $assessment = Assessment::updateOrCreate(
            ['title_ar' => 'مقياس المرونة المعرفية'],
            [
                'description_ar' => 'المرونة المعرفية هي قدرة الفرد على النظر إلى المواقف والمشكلات من زوايا متعددة، وتعديل أفكاره أو خططه عند الحاجة، وتقبّل المعلومات الجديدة، والانتقال بين البدائل والاستراتيجيات المختلفة دون جمود أو تسرع. يهدف هذا المقياس إلى التعرّف على مستوى المرونة المعرفية لدى الفرد؛ أي قدرته على تغيير طريقة تفكيره أو تعديل خططه واستجاباته عندما تتغير الظروف أو تظهر معلومات جديدة.',
                'category' => 'السلوك',
                'time_limit_min' => 15,
                'scoring_type' => 'sum',
                'price' => 0,
                'is_active' => true,
                'created_by' => \App\Models\User::first()->id ?? 1,
            ]
        );

        $assessment_id = $assessment->id;

        // Common options
        $optionsData = [
            ['label_ar' => 'نعم', 'score_value' => 2, 'order_index' => 1],
            ['label_ar' => 'إلى حد ما', 'score_value' => 1, 'order_index' => 2],
            ['label_ar' => 'لا', 'score_value' => 0, 'order_index' => 3],
        ];

        // 2. Dimensions & Questions (Only one dimension for this assessment)
        $dimension = Dimension::updateOrCreate(
            ['assessment_id' => $assessment_id, 'name_ar' => 'المرونة المعرفية'],
            [
                'max_score' => 40,
                'order_index' => 1
            ]
        );

        $questionsText = [
            'أستطيع تعديل خطتي عندما أكتشف أنها لا تحقق النتيجة المطلوبة.',
            'أتقبل تغيير طريقة العمل عندما تظهر طريقة أفضل.',
            'أستطيع النظر إلى المشكلة من أكثر من زاوية.',
            'لا أتمسك برأيي إذا ظهرت معلومات جديدة ومقنعة.',
            'أبحث عن بدائل متعددة عندما لا ينجح الحل الأول.',
            'أتكيف مع التغيرات المفاجئة في الدراسة أو العمل بصورة جيدة.',
            'أستطيع الانتقال من مهمة إلى أخرى عند الضرورة دون أن أفقد تركيزي بالكامل.',
            'أتقبل الآراء المختلفة حتى عندما لا تتفق مع رأيي.',
            'أتعلم من أخطائي وأغيّر أسلوبي لتجنب تكرارها.',
            'أستطيع العمل بكفاءة حتى عندما لا تكون التعليمات أو الظروف واضحة تمامًا.',
            'أغيّر أولوياتي عندما تتغير أهمية المهام أو ظروفها.',
            'أستطيع التمييز بين ما يمكن تغييره وما ينبغي تقبله في الموقف.',
            'أجرّب أساليب جديدة إذا لم تنجح الأساليب المعتادة.',
            'أتمكن من فهم وجهة نظر الآخرين حتى لو كانت مختلفة عن وجهة نظري.',
            'أتعامل مع المفاجآت باعتبارها فرصة للتعلم والتحسين.',
            'أستطيع إعادة ترتيب أفكاري بسرعة عند حدوث تغيير غير متوقع.',
            'لا أرفض فكرة جديدة لمجرد أنها غير مألوفة بالنسبة لي.',
            'أستطيع تعديل أهدافي المرحلية دون أن أفقد هدفي الأساسي.',
            'أوازن بين الالتزام بالخطة وبين الحاجة إلى التغيير عند الضرورة.',
            'أستفيد من التغذية الراجعة والنقد البنّاء لتطوير أدائي.'
        ];

        $qOrder = 1;
        foreach ($questionsText as $qText) {
            $question = Question::updateOrCreate(
                ['assessment_id' => $assessment_id, 'dimension_id' => $dimension->id, 'text_ar' => $qText],
                [
                    'order_index' => $qOrder++,
                    'is_reversed' => false
                ]
            );

            // Add options
            foreach ($optionsData as $opt) {
                AnswerOption::updateOrCreate(
                    ['question_id' => $question->id, 'label_ar' => $opt['label_ar']],
                    [
                        'score_value' => $opt['score_value'],
                        'order_index' => $opt['order_index']
                    ]
                );
            }
        }

        // 3. Recommendations
        $recs = [
            [
                'level' => 'منخفض',
                'low_threshold' => 0,
                'high_threshold' => 13,
                'title_ar' => 'منخفض',
                'description_ar' => 'قد يجد الشخص صعوبة في تقبل التغيير أو تعديل الخطط والأفكار عند ظهور ظروف جديدة، وقد يميل إلى الاعتماد على الأساليب المألوفة حتى عندما لا تكون مناسبة. تشير هذه النتيجة إلى الحاجة لتنمية مهارات التكيف مع التغيير، وتوسيع البدائل المتاحة عند مواجهة المشكلات أو الظروف غير المتوقعة. ويمكن تطوير هذه المهارات بالتدريب والممارسة التدريجية.',
                'programs_ar' => [
                    'إدارة التغيير والتكيف مع المتغيرات.',
                    'مهارات حل المشكلات واتخاذ القرار.',
                    'إدارة الضغوط النفسية والضغوط المهنية.',
                    'الذكاء العاطفي والوعي بالذات.',
                    'التفكير الإبداعي وتوليد البدائل.'
                ]
            ],
            [
                'level' => 'متوسط',
                'low_threshold' => 14,
                'high_threshold' => 27,
                'title_ar' => 'متوسط',
                'description_ar' => 'قدرة مقبولة على التكيف وتغيير أسلوب التفكير، لكنها قد تتأثر بضغوط الوقت أو المفاجآت أو المواقف غير الواضحة. تشير هذه النتيجة إلى امتلاك أساس جيد من المرونة المعرفية، مع الحاجة إلى تعزيز القدرة على تطبيقها باستمرار، خاصة في الظروف المفاجئة أو عند التعامل مع آراء ومهام متعارضة.',
                'programs_ar' => [
                    'المرونة المعرفية والتفكير التكيفي.',
                    'إدارة التغيير في بيئة العمل.',
                    'التفكير التصميمي وحل المشكلات المعقدة.',
                    'إدارة الأولويات والوقت في البيئات المتغيرة.',
                    'مهارات التواصل وإدارة الاختلاف.'
                ]
            ],
            [
                'level' => 'مرتفع',
                'low_threshold' => 28,
                'high_threshold' => 40,
                'title_ar' => 'مرتفع',
                'description_ar' => 'قدرة جيدة على تقبل التغيير، والنظر إلى الأمور من زوايا متعددة، وتعديل الخطط والأفكار بفاعلية عند الحاجة. تشير هذه النتيجة إلى التمتع بمرونة معرفية جيدة، والقدرة على مراجعة الأفكار والتكيف مع التغيرات والاستفادة من البدائل المختلفة. ويمكن تطوير هذه القدرة إلى مستوى أكثر تقدمًا من خلال ممارسة التفكير الاستراتيجي وقيادة التغيير.',
                'programs_ar' => [
                    'القيادة التكيفية وقيادة التغيير.',
                    'التفكير الاستراتيجي وإدارة السيناريوهات.',
                    'التفكير المنظومي وتحليل المشكلات المركبة.',
                    'الابتكار وإدارة التحول المؤسسي.',
                    'التفاوض وإدارة أصحاب المصلحة والاختلافات.'
                ]
            ]
        ];

        foreach ($recs as $rec) {
            Recommendation::updateOrCreate(
                ['assessment_id' => $assessment_id, 'level' => $rec['level']],
                [
                    'low_threshold' => $rec['low_threshold'],
                    'high_threshold' => $rec['high_threshold'],
                    'title_ar' => $rec['title_ar'],
                    'description_ar' => $rec['description_ar'],
                    'programs_ar' => $rec['programs_ar'] ?? null,
                ]
            );
        }
        
        echo "Cognitive Flexibility Assessment Seeded Successfully!\n";
    }
}
