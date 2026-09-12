<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\AnswerOption;
use App\Models\Recommendation;

class CuriosityAssessmentSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Assessment
        $assessment = Assessment::updateOrCreate(
            ['title_ar' => 'مقياس الفضول وحب التعلم'],
            [
                'description_ar' => 'الفضول وحب التعلم هو الرغبة الطبيعية في معرفة المزيد عن العالم من حولنا. يتمثل في الدافع للاستكشاف، وطرح الأسئلة، والبحث عن المعرفة الجديدة. يهدف هذا المقياس إلى تقييم مدى فضولك ورغبتك في التعلم واستكشاف المعلومات الجديدة، كونه المحرك الأساسي للتعلم والنمو الشخصي.',
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
            ['assessment_id' => $assessment_id, 'name_ar' => 'الفضول وحب التعلم'],
            [
                'max_score' => 24,
                'order_index' => 1
            ]
        );

        $questionsText = [
            'أشعر بالحماس لاكتشاف أشياء جديدة ومعلومات جديدة',
            'أبحث دائمًا عن مصادر جديدة للتعلم (كتب، مقاطع فيديو، دورات)',
            'أستمتع بمناقشة المواضيع الجديدة مع الآخرين',
            'أحب توسيع مهاراتي ومعرفتي في مجالات مختلفة',
            'عندما أواجه صعوبة في موضوع ما، أستمر في المحاولة حتى أفهمه',
            'أشعر بالفضول لمعرفة كيفية عمل الأشياء من حولي',
            'أخصص وقتًا لنفسي لتعلم مهارات أو معلومات جديدة',
            'أبحث عن فرص للتعلم خارج نطاق دراستي أو وظيفتي',
            'أستمتع بطرح الأسئلة عندما أتعلم شيئًا جديدًا',
            'أبحث عن تجارب جديدة حتى لو كانت خارج منطقة راحتي',
            'أعتبر نفسي شخصًا مبتكرًا وأحب تطبيق ما تعلمته',
            'أستخدم التكنولوجيا للمساعدة في تعلم أشياء جديدة'
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
                'high_threshold' => 11,
                'title_ar' => 'منخفض',
                'description_ar' => 'تعكس نتيجتك نقصًا في الفضول وحب التعلم. قد تحتاج إلى الدعم لإيجاد الدوافع للتعلم واستكشاف المعرفة الجديدة.',
                'practical_tips_ar' => [
                    'ابدأ بتحديد موضوعات بسيطة تشد انتباهك واكتب عن تجربتك معها.',
                    'قراءة كتب تحفيزية حول أهمية التعلم.'
                ],
                'programs_ar' => [
                    'أساسيات التعلم المستمر',
                    'تقنيات التحفيز الذاتي'
                ]
            ],
            [
                'level' => 'متوسط',
                'low_threshold' => 12,
                'high_threshold' => 18,
                'title_ar' => 'متوسط',
                'description_ar' => 'تظهر نتيجتك مستوى معقول من الفضول، لكن قد تحتاج إلى تعزيز الرغبة في التعلم.',
                'practical_tips_ar' => [
                    'خصص وقتًا يوميًا لاستكشاف موضوع جديد عبر الإنترنت أو قراءة كتاب.',
                    'المشاركة في ورش عمل أو دورات قصيرة.',
                    'تحديد موضوعات معينة تتعلق بشغفك وممارسة التعلم فيها.'
                ],
                'programs_ar' => [
                    'استراتيجيات التعلم الذاتي الفعال',
                    'توسيع المهارات الشخصية والفكرية'
                ]
            ],
            [
                'level' => 'مرتفع',
                'low_threshold' => 19,
                'high_threshold' => 24,
                'title_ar' => 'مرتفع',
                'description_ar' => 'نتيجتك تعني أنك تتمتع بمستوى عالٍ من الفضول وحب التعلم، وهذا يفتح أمامك فرصًا عديدة.',
                'practical_tips_ar' => [
                    'الانخراط في مجتمعات تعلمية أو مجموعات مناقشة.',
                    'محاولة مشاركة معرفتك مع الآخرين من خلال التدريس أو ورش العمل.',
                    'تحدي نفسك بتعلم مهارة جديدة كل شهر، وشارك تجربتك مع الأصدقاء أو الزملاء.'
                ],
                'programs_ar' => [
                    'قيادة التعلم الجماعي',
                    'تطوير مهارات التعلم العميق'
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
        
        echo "Curiosity Assessment Seeded Successfully!\n";
    }
}
