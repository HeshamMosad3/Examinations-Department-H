<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\AnswerOption;
use App\Models\Recommendation;
use App\Models\DimensionInterpretation;

class BigFivePersonalityAssessmentSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Assessment
        $assessment = Assessment::updateOrCreate(
            ['title_ar' => 'مقياس الشخصية الخماسية'],
            [
                'description_ar' => 'مقياس الشخصية الخماسية هو أداة تقييم نفسي تهدف إلى قياس خمسة أبعاد رئيسة في الشخصية: الانفتاح، الضمير، الانبساطية، التوافق، العصابية. يتيح هذا المقياس التعرف على سماتك الشخصية وفهم كيفية تأثيرها على سلوكك وعلاقاتك مع الآخرين.',
                'category' => 'الشخصية',
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

        // 2. Dimensions & Questions
        $dimensionsData = [
            [
                'name' => 'الانفتاح',
                'description' => 'يعكس استعدادك لتجربة تجارب جديدة وتقبل الأفكار الجديدة والتوجهات المختلفة.',
                'questions' => [
                    'أحب تجربة أشياء جديدة ومغامرات غير تقليدية.',
                    'أستمتع بالتفكير في الأفكار الإبداعية والمفاهيم الجديدة.',
                    'أكون فضوليًا بشكل دائم حول كيفية عمل الأشياء.'
                ],
                'interpretations' => [
                    [
                        'level' => 'منخفض',
                        'low_threshold' => 0,
                        'high_threshold' => 2,
                        'text' => "الوصف: لديك ميل لتفضيل الروتين والأنشطة التقليدية.\nالتوجيه: حاول استكشاف أفكار وتجارب جديدة.\nالدورات المقترحة: التفكير الإبداعي، استكشاف الذات."
                    ],
                    [
                        'level' => 'متوسط',
                        'low_threshold' => 3,
                        'high_threshold' => 4,
                        'text' => "الوصف: تشعر بالراحة في بعض الأحيان في تجربة أشياء جديدة.\nالتوجيه: استمر في فتح آفاق جديدة، ولكن اعتمد على تجارب تثقيفية أكثر.\nالدورات المقترحة: توسيع الأفق الثقافي، الإبداع في العمل."
                    ],
                    [
                        'level' => 'مرتفع',
                        'low_threshold' => 5,
                        'high_threshold' => 6,
                        'text' => "الوصف: تحب المغامرة والتغيير، وتكون شخصًا مبدعًا.\nالتوجيه: استمر في تعزيز إبداعك وفضولك.\nالدورات المقترحة: قيادة الابتكار، استراتيجيات الإبداع."
                    ]
                ]
            ],
            [
                'name' => 'الضمير',
                'description' => 'يقيّم مدى تنظيمك والانضباط والموثوقية في سلوكياتك وأدائك.',
                'questions' => [
                    'أضع خططًا دقيقة لأعمالي وأنشطتي.',
                    'أتعامل مع المسؤوليات بجدية.',
                    'أغلب الوقت أكون دقيقًا في المواعيد وفي إنجاز المهام.'
                ],
                'interpretations' => [
                    [
                        'level' => 'منخفض',
                        'low_threshold' => 0,
                        'high_threshold' => 2,
                        'text' => "الوصف: قد تكون عشوائيًا ولا تتبع الروتين.\nالتوجيه: عليك تحسين مهارات التنظيم.\nالدورات المقترحة: تنظيم وإدارة الوقت، تقنيات التحفيز الذاتي، التخطيط الشخصي الفعال."
                    ],
                    [
                        'level' => 'متوسط',
                        'low_threshold' => 3,
                        'high_threshold' => 4,
                        'text' => "الوصف: توازن جيد بين الانضباط والاسترخاء.\nالتوجيه: حافظ على مستوى جيد من الانضباط.\nالدورات المقترحة: استراتيجيات التحفيز الذاتي، تنظيم الحياة اليومية."
                    ],
                    [
                        'level' => 'مرتفع',
                        'low_threshold' => 5,
                        'high_threshold' => 6,
                        'text' => "الوصف: تنظيم وموثوقية كبيرة في حياتك.\nالتوجيه: استمر في الكفاءة التنظيمية، وشارك تجاربك.\nالدورات المقترحة: القيادة من خلال الانضباط، إدارة المشاريع."
                    ]
                ]
            ],
            [
                'name' => 'الانبساطية',
                'description' => 'يقيس مدى انفتاحك على التفاعلات الاجتماعية وقدرتك على التعبير عن نفسك بشكل نشط وفاعل في البيئات الاجتماعية.',
                'questions' => [
                    'أحب التواجد بين الناس وتكوين صداقات جديدة.',
                    'أجد الطاقة في اللقاءات الاجتماعية والمناسبات.',
                    'أشعر بالراحة عند التحدث أمام جمهور.'
                ],
                'interpretations' => [
                    [
                        'level' => 'منخفض',
                        'low_threshold' => 0,
                        'high_threshold' => 2,
                        'text' => "الوصف: تفضل الانعزال وتجنب المناسبات الاجتماعية.\nالتوجيه: حاول تكوين صداقات جديدة والتفاعل أكثر.\nالدورات المقترحة: تطوير المهارات الاجتماعية، فن التحدث العلني، مهارات التواصل الفعال، بناء العلاقات."
                    ],
                    [
                        'level' => 'متوسط',
                        'low_threshold' => 3,
                        'high_threshold' => 4,
                        'text' => "الوصف: تحقق توازنًا بين الخصوصية والتفاعل الاجتماعي.\nالتوجيه: استغل فرصة التواصل ولكن بمجالات مريحة.\nالدورات المقترحة: فنون التفاوض، تطوير الشبكات الاجتماعية."
                    ],
                    [
                        'level' => 'مرتفع',
                        'low_threshold' => 5,
                        'high_threshold' => 6,
                        'text' => "الوصف: شخصية اجتماعية تُجذب إلى الآخرين وتعبر عن نفسك بحرية.\nالتوجيه: استعن بمهاراتك في القيادة والمشاركة.\nالدورات المقترحة: القيادة الكاريزمية، تطوير فرق العمل."
                    ]
                ]
            ],
            [
                'name' => 'التوافق',
                'description' => 'يعكس قدرتك على التكيف مع الآخرين والعمل بشكل تعاوني، ومدى استعدادك لإعطاء الأولوية للاحتياجات الجماعية.',
                'questions' => [
                    'أستطيع التكيف مع آراء الآخرين بسهولة.',
                    'أضع احتياجات الآخرين أحيانًا قبل احتياجاتي.',
                    'أحب العمل في مجموعات والتعاون مع الآخرين.'
                ],
                'interpretations' => [
                    [
                        'level' => 'منخفض',
                        'low_threshold' => 0,
                        'high_threshold' => 2,
                        'text' => "الوصف: تجد صعوبة في التكيف مع الآراء المختلفة.\nالتوجيه: اعمل على تعزيز المهارات التعاونية لديك.\nالدورات المقترحة: تعزيز مهارات التعاون، فهم الديناميكيات الاجتماعية، أساليب التفاوض، بناء الفريق."
                    ],
                    [
                        'level' => 'متوسط',
                        'low_threshold' => 3,
                        'high_threshold' => 4,
                        'text' => "الوصف: تعبر عن رأيك أيضًا، لكنك متقبل للاختلاف.\nالتوجيه: يمكنك تحسين مهاراتك في حل النزاعات.\nالدورات المقترحة: الذكاء العاطفي، حل النزاع."
                    ],
                    [
                        'level' => 'مرتفع',
                        'low_threshold' => 5,
                        'high_threshold' => 6,
                        'text' => "الوصف: تعاون جيد ومرونة في التعامل مع الآخرين.\nالتوجيه: استمر في العمل على تحسين العلاقات.\nالدورات المقترحة: تطوير مهارات العلاقات العامة، قيادة الفرق المتنوعة."
                    ]
                ]
            ],
            [
                'name' => 'العصابية',
                'description' => 'يقيم مدى تعرضك للضغوط النفسية والاستجابة العاطفية، ويعكس حساسيتك للمشاعر السلبية مثل القلق والتوتر.',
                'questions' => [
                    'أستجيب بسرعة للضغوط والتوتر.',
                    'أشعر بالقلق في أوقات غير متوقعة.',
                    'أتعرض لمشاعر سلبية بشكل مستمر.'
                ],
                'interpretations' => [
                    [
                        'level' => 'منخفض',
                        'low_threshold' => 0,
                        'high_threshold' => 2,
                        'text' => "الوصف: تظهر قدرة على التحكم في عواطفك.\nالتوجيه: اعمل على الحفاظ على توازنك العاطفي.\nالدورات المقترحة: إدارة الضغوط، تحسين الصحة النفسية والعقلية."
                    ],
                    [
                        'level' => 'متوسط',
                        'low_threshold' => 3,
                        'high_threshold' => 4,
                        'text' => "الوصف: قد تواجه مشاعر سلبية بين الحين والآخر.\nالتوجيه: ابحث عن طرق لتحسين إدارة المشاعر.\nالدورات المقترحة: تقنيات الاسترخاء، التعافي العاطفي."
                    ],
                    [
                        'level' => 'مرتفع',
                        'low_threshold' => 5,
                        'high_threshold' => 6,
                        'text' => "الوصف: حساسية كبيرة تجاه الضغوط والمشاعر السلبية.\nالتوجيه: استخدم تجربتك لمساعدة الآخرين.\nالدورات المقترحة: التوجيه النفسي، القيادة العاطفية."
                    ]
                ]
            ]
        ];

        $dOrder = 1;
        $qOrder = 1;
        foreach ($dimensionsData as $dData) {
            $dimension = Dimension::updateOrCreate(
                ['assessment_id' => $assessment_id, 'name_ar' => $dData['name']],
                [
                    'max_score' => 6,
                    'order_index' => $dOrder++
                ]
            );

            // Add Questions
            foreach ($dData['questions'] as $qText) {
                $question = Question::updateOrCreate(
                    ['assessment_id' => $assessment_id, 'dimension_id' => $dimension->id, 'text_ar' => $qText],
                    [
                        'order_index' => $qOrder++,
                        'is_reversed' => false
                    ]
                );

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

            // Add Dimension Interpretations
            foreach ($dData['interpretations'] as $interp) {
                DimensionInterpretation::updateOrCreate(
                    ['dimension_id' => $dimension->id, 'level' => $interp['level']],
                    [
                        'interpretation_text_ar' => $interp['text'],
                        'low_threshold' => $interp['low_threshold'],
                        'high_threshold' => $interp['high_threshold'],
                    ]
                );
            }
        }

        // 3. Overall Recommendations
        $recs = [
            [
                'level' => 'منخفض',
                'low_threshold' => 0,
                'high_threshold' => 10,
                'title_ar' => 'منخفضة',
                'description_ar' => 'تشير إلى سمات شخصية تتصف بالانغلاق، الاعتماد على الآخرين، ومستويات عالية من العصابية.',
                'practical_tips_ar' => [
                    'قد تحتاج إلى استكشاف أبعاد شخصيتك بشكل أعمق.',
                    'العمل على تعزيز الثقة بالنفس.',
                    'تحسين التفاعل الاجتماعي والتخلص من الخوف من المجهول.'
                ],
                'programs_ar' => [
                    'تعزيز الثقة بالنفس',
                    'تنمية المهارات الاجتماعية',
                    'مقدمة في التفكير الإبداعي'
                ]
            ],
            [
                'level' => 'متوسط',
                'low_threshold' => 11,
                'high_threshold' => 20,
                'title_ar' => 'متوسطة',
                'description_ar' => 'تعكس توازنًا معقولًا بين السمات المختلفة، مع قدرات مختلطة.',
                'practical_tips_ar' => [
                    'هناك توازن معقول، لكن يمكنك تعزيز بعض السمات.',
                    'العمل على تعدد التجارب الجديدة.',
                    'دراسة كيفية تحسين مهاراتك التنظيمية.'
                ],
                'programs_ar' => [
                    'تطوير المهارات الشخصية',
                    'إدارة الوقت والموارد',
                    'فن التفاوض والإقناع'
                ]
            ],
            [
                'level' => 'مرتفع',
                'low_threshold' => 21,
                'high_threshold' => 30,
                'title_ar' => 'مرتفعة',
                'description_ar' => 'تعبر عن شخصية منفتحة، منظمة، اجتماعية، متعاونة، وذات استقرار عاطفي.',
                'practical_tips_ar' => [
                    'لديك سمات شخصية قوية.',
                    'استمر في تطوير مهاراتك القيادية والتعاونية.',
                    'ابحث عن فرص لقيادة الفرق والمبادرات.'
                ],
                'programs_ar' => [
                    'مهارات القيادة الفعالة',
                    'إدارة الفرق وبناء العلاقات',
                    'التفكير الاستراتيجي والإبداعي'
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
        
        echo "Big Five Personality Assessment Seeded Successfully!\n";
    }
}
