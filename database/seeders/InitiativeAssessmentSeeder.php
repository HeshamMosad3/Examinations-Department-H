<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\AnswerOption;
use App\Models\Recommendation;
use Illuminate\Support\Str;

class InitiativeAssessmentSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Assessment
        $assessment = Assessment::updateOrCreate(
            ['title_ar' => 'مقياس المبادرة (السلوك)'],
            [
                'description_ar' => 'تشير المبادرة إلى القدرة على اتخاذ الخطوات اللازمة دون الحاجة إلى توجيه من الآخرين. تعكس الاستعداد لتحدي الظروف والبحث عن الفرص وتقديم الأفكار دون انتظار التعليمات. يهدف هذا المقياس إلى تقييم مستوى قدرة الفرد على اتخاذ المبادرة واستكشاف الفرص بشكل استباقي.',
                'category' => 'السلوك',
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
            ['assessment_id' => $assessment_id, 'name_ar' => 'المبادرة'],
            [
                'max_score' => 30,
                'order_index' => 1
            ]
        );

        $questionsText = [
            'أعتبر نفسي شخصًا مبادرًا في اقتراح أفكار جديدة للعمل.',
            'أستطيع اتخاذ خطوات سريعة لمعالجة المشكلات عندما أراها.',
            'لا أحتاج إلى توجيه لأداء المهام؛ أبحث عن طرق لتحسين الأمور بنفسي.',
            'عندما ألاحظ فرصة للتطوير، أتحرك سريعًا للاستفادة منها.',
            'أستمتع بتحدي نفسي لإكمال المهام قبل المواعيد النهائية.',
            'أرى التحديات كفرص للتعلم والنمو، وأقوم بأخذ المبادرة لتحقيق أهدافي.',
            'غالبًا ما أبحث عن مشاريع جديدة لأعمل عليها دون انتظار استدعاء من الإدارة.',
            'أستطيع التفكير بشكل مستقل واتخاذ القرارات بحرية.',
            'أعتبر نفسي رائدًا في المحادثات ومناقشات الأفكار الجديدة.',
            'أحب تشجيع الآخرين على اتخاذ المبادرة وتحقيق إمكاناتهم.',
            'أتحمل المسؤولية عن النتائج، سواء كانت إيجابية أو سلبية.',
            'أستطيع التعرف على إمكاناتي القابلة للتحقيق، وأسعى لتحقيقها دون خوف.',
            'أستفيد من النقد لتحسين أدائي وأخذ زمام المبادرة.',
            'أضع أهدافًا واضحة لنفسي وأعمل بجد لتحقيقها.',
            'أعتبر نفسي قدوة للآخرين في اتخاذ المبادرات وتحفيزهم على العمل.'
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
                'high_threshold' => 10,
                'title_ar' => 'منخفض',
                'description_ar' => 'تعكس هذه النتيجة ضعفًا في روح المبادرة. قد تحتاج إلى تعزيز الثقة والقدرة على اتخاذ خطوات استباقية.',
                'practical_tips_ar' => [
                    'ابدأ بتحديد موقف صغير يتطلب اتخاذ المبادرة، وحاول أحيانًا أن تتحدث عن أفكارك فيه.',
                    'الانخراط في تدريب على مهارات التواصل والمبادرة.',
                    'تجريب مشاريع صغيرة لتطوير روح المبادرة.'
                ],
                'programs_ar' => [
                    'أساسيات اتخاذ المبادرة',
                    'تنمية الثقة بالنفس'
                ]
            ],
            [
                'level' => 'متوسط',
                'low_threshold' => 11,
                'high_threshold' => 20,
                'title_ar' => 'متوسط',
                'description_ar' => 'تظهر هذه النتيجة مستوى معقولًا من المبادرة، لكن هناك فرص للتحسين.',
                'practical_tips_ar' => [
                    'خصص وقتًا أسبوعيًا لتقييم ما يمكنك القيام به بشكل أفضل، وتحديد خطوات اتخاذ المبادرة.',
                    'تحديد مجالات تلزمك فيها المبادرة، وممارسة اتخاذ القرارات بسرعة.',
                    'المشاركة في ورش عمل لتعزيز المهارات القيادية.'
                ],
                'programs_ar' => [
                    'مهارات القيادة الفعالة',
                    'الإبداع في العمل'
                ]
            ],
            [
                'level' => 'مرتفع',
                'low_threshold' => 21,
                'high_threshold' => 30,
                'title_ar' => 'مرتفع',
                'description_ar' => 'تعكس هذه النتيجة روحًا قوية من المبادرة والاستعداد لاتخاذ الخطوات اللازمة لتحقيق الأهداف.',
                'practical_tips_ar' => [
                    'تحدَّ نفسك بمشاريع جديدة، وشارك نتائجك مع فريق العمل لتلهمهم.',
                    'البحث عن فرص لقيادة المشاريع الجديدة وتعزيز ثقافة المبادرة.',
                    'استمر في تطوير مهاراتك القيادية وشارك تجاربك مع الآخرين.'
                ],
                'programs_ar' => [
                    'قيادة الابتكار',
                    'تطوير استراتيجيات المبادرة في الفرق'
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
        
        echo "Initiative Assessment Seeded Successfully!\n";
    }
}
