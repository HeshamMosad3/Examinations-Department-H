<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\AnswerOption;
use App\Models\Recommendation;
use Illuminate\Support\Str;

class ReasoningAbilitiesAssessmentSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Assessment
        $assessment = Assessment::updateOrCreate(
            ['title_ar' => 'مقياس القدرات الاستدلالية (الذكاء)'],
            [
                'description_ar' => 'تشير القدرات الاستدلالية إلى القدرة على استخدام المنطق والتفكير النقدي لاستنتاج النتائج من المعلومات المتاحة. تشمل تحليل الأدلة، تقييم الحجج، وابتكار استنتاجات من السياقات المتنوعة. يهدف هذا المقياس إلى تقييم مستوى القدرات في الاستدلال المنطقي، وتحليل المعلومات، والتفكير النقدي.',
                'category' => 'الذكاء',
                'time_limit_min' => 10,
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
            ['assessment_id' => $assessment_id, 'name_ar' => 'القدرات الاستدلالية'],
            [
                'max_score' => 20,
                'order_index' => 1
            ]
        );

        $questionsText = [
            'يمكنني تحليل المعلومات المعقدة واستخلاص النقاط الرئيسية منها بسهولة.',
            'أستطيع تحديد الأنماط والعلاقات في البيانات والمعلومات.',
            'أعتبر نفسي جيدًا في حل المشكلات باستخدام التفكير المنطقي.',
            'أشعر بالثقة في اتخاذ القرارات بناءً على الأدلة المتاحة.',
            'أستطيع تقييم صحة الحجج والتفسيرات التي أواجهها.',
            'أبحث عن معلومات إضافية لفهم موضوعات جديدة بعمق.',
            'أستمتع بمناقشة الأفكار المعقدة مع الآخرين وتحليلها.',
            'يمكنني تطبيق المعرفة المكتسبة على مواقف جديدة.',
            'أستخدم البيانات والإحصائيات لدعم آرائي واستنتاجاتي.',
            'أستطيع تفسير المعلومات المختلفة واستخلاص الاستنتاجات الصحيحة منها.'
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
                'high_threshold' => 7,
                'title_ar' => 'منخفض',
                'description_ar' => 'تعكس هذه النتيجة ضعفًا في القدرات الاستدلالية. قد تحتاج إلى تطوير مهارات التفكير التحليلي والاستدلالي.',
                'practical_tips_ar' => [
                    'ابدأ بتحديد موضوعات بسيطة وكتابة أفكارك وآرائك حولها، ثم قم بتحليلها.',
                    'الانخراط في دورات تدريبية حول التفكير النقدي وحل المشكلات.',
                    'قراءة مواد تعليمية حول المنطق والتحليل.'
                ],
                'programs_ar' => [
                    'أساسيات التحليل المنطقي',
                    'مهارات التفكير النقدي'
                ]
            ],
            [
                'level' => 'متوسط',
                'low_threshold' => 8,
                'high_threshold' => 14,
                'title_ar' => 'متوسط',
                'description_ar' => 'تظهر هذه النتيجة مستوى معقولًا من القدرات الاستدلالية، لكن هناك فرص للتحسين.',
                'practical_tips_ar' => [
                    'خصص وقتًا لممارسة حل الألغاز أو الألعاب العقلية لتطوير قدراتك الاستدلالية.',
                    'المشاركة في ورش عمل لتعزيز التفكير النقدي.',
                    'ممارسة تحليل المعلومات بشكل دوري من خلال الأنشطة الجماعية.'
                ],
                'programs_ar' => [
                    'استراتيجيات حل المشكلات',
                    'تطوير مهارات التفكير الاستدلالي'
                ]
            ],
            [
                'level' => 'مرتفع',
                'low_threshold' => 15,
                'high_threshold' => 20,
                'title_ar' => 'مرتفع',
                'description_ar' => 'تعكس هذه النتيجة مستوى عاليًا من القدرات الاستدلالية، مما يسهم في اتخاذ قرارات مدروسة وحل المشكلات بشكل فعال.',
                'practical_tips_ar' => [
                    'تحدَّ نفسك بطرح أسئلة معقدة على نفسك، وابحث عن الإجابات ولا تتردد في مناقشتها مع الآخرين.',
                    'المشاركة في منتديات مناقشة للأفكار المعقدة.',
                    'الاستمرار في تطوير مهارات القيادة والتوجيه مع الجمع بين القدرات الاستدلالية.'
                ],
                'programs_ar' => [
                    'قيادة الفرق بالاستدلال المنطقي',
                    'التفكير النقدي في بيئات العمل'
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
                    'practical_tips_ar' => $rec['practical_tips_ar'] ?? null,
                    'programs_ar' => $rec['programs_ar'] ?? null,
                ]
            );
        }
        
        echo "Reasoning Abilities Assessment Seeded Successfully!\n";
    }
}
