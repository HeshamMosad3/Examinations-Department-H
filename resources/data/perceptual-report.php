<?php

// شكل تقرير أنماط الإدراك من فيجما لكل نتيجة من السبع: الأيقونات وألوان كروت البرامج فقط.
// كل النصوص المعروضة جاية من جدول recommendations في قاعدة البيانات (PerceptualReportBuilder)،
// والنصوص هنا بتستخدم بس عشان نطابق كل عنصر من قاعدة البيانات مع الأيقونة المناسبة له.
return [
    'visual' => [
        'icon' => '/assets/website/images/perceptual-report/visual/dominant.svg',
        'how_to_learn' => [
            [
                'text' => 'استخدم الخرائط الذهنية والمخططات.',
                'icon' => '/assets/website/images/perceptual-report/visual/how-1.svg',
            ],
            [
                'text' => 'دوّن الملاحظات باستخدام الألوان والرموز.',
                'icon' => '/assets/website/images/perceptual-report/visual/how-2.svg',
            ],
            [
                'text' => 'شاهد الرسوم التوضيحية ومقاطع الفيديو التعليمية.',
                'icon' => '/assets/website/images/perceptual-report/visual/how-3.svg',
            ],
            [
                'text' => 'قسم المعلومات إلى جداول وعناصر رئيسية.',
                'icon' => '/assets/website/images/perceptual-report/visual/how-4.svg',
            ],
            [
                'text' => 'استخدم العروض التقديمية والصور في المراجعة.',
                'icon' => '/assets/website/images/perceptual-report/visual/how-5.svg',
            ],
            [
                'text' => 'أنشئ ملخصات مرئية للمعلومات المهمة.',
                'icon' => '/assets/website/images/perceptual-report/visual/how-6.svg',
            ],
        ],
        'programs' => [
            [
                'title' => 'مهارات التفكير البصري',
                'icon' => '/assets/website/images/perceptual-report/visual/program-1.svg',
                'border' => '#1657c2',
                'bg' => '#f6faff',
                'icon_bg' => '#e6f1ff',
            ],
            [
                'title' => 'إعداد العروض التقديمية الاحترافية',
                'icon' => '/assets/website/images/perceptual-report/visual/program-2.svg',
                'border' => '#6c66e9',
                'bg' => '#f6f8ff',
                'icon_bg' => '#eef2ff',
            ],
            [
                'title' => 'الخرائط الذهنية وتنظيم المعرفة',
                'icon' => '/assets/website/images/perceptual-report/visual/program-3.svg',
                'border' => '#3ea1d5',
                'bg' => '#f6faff',
                'icon_bg' => '#edf8ff',
            ],
            [
                'title' => 'الإبداع والابتكار',
                'icon' => '/assets/website/images/perceptual-report/visual/program-4.svg',
                'border' => '#0d9488',
                'bg' => '#f9fffe',
                'icon_bg' => '#e6fff9',
            ],
            [
                'title' => 'القراءة السريعة واستخلاص الأفكار',
                'icon' => '/assets/website/images/perceptual-report/visual/program-5.svg',
                'border' => '#9333ea',
                'bg' => '#fdfbff',
                'icon_bg' => '#faf5ff',
            ],
        ],
        'tips' => [
            [
                'text' => 'استخدم الألوان لتمييز المعلومات المهمة.',
                'icon' => '/assets/website/images/perceptual-report/visual/tip-1.svg',
            ],
            [
                'text' => 'حول الأفكار إلى رسوم أو مخططات بيانية.',
                'icon' => '/assets/website/images/perceptual-report/visual/tip-2.svg',
            ],
            [
                'text' => 'احفظ بعض ملاحظاتك مرئيًا.',
                'icon' => '/assets/website/images/perceptual-report/visual/tip-3.svg',
            ],
            [
                'text' => 'رتّب المعلومات باستخدام الصور قبل الكتابة.',
                'icon' => '/assets/website/images/perceptual-report/visual/tip-4.svg',
            ],
            [
                'text' => 'اجعل بيئة عملك منظمة بصرياً.',
                'icon' => '/assets/website/images/perceptual-report/visual/tip-5.svg',
            ],
        ],
    ],
    'balanced' => [
        'icon' => '/assets/website/images/perceptual-report/balanced/dominant.svg',
        'how_to_learn' => [
            [
                'text' => 'استخدم مزيجاً من القراءة والاستماع والتطبيق.',
                'icon' => '/assets/website/images/perceptual-report/balanced/how-1.svg',
            ],
            [
                'text' => 'نوع مصادر التعلم بحسب طبيعة الموضوع.',
                'icon' => '/assets/website/images/perceptual-report/balanced/how-2.svg',
            ],
            [
                'text' => 'مارس ما تعلمته بصورة منظمة.',
                'icon' => '/assets/website/images/perceptual-report/balanced/how-3.svg',
            ],
            [
                'text' => 'شارك في النقاشات والأنشطة العملية.',
                'icon' => '/assets/website/images/perceptual-report/balanced/how-4.svg',
            ],
            [
                'text' => 'استخدم الرسوم والملاحظات والتجارب معاً.',
                'icon' => '/assets/website/images/perceptual-report/balanced/how-5.svg',
            ],
            [
                'text' => 'راجع المعلومات بأكثر من طريقة.',
                'icon' => '/assets/website/images/perceptual-report/balanced/how-6.svg',
            ],
        ],
        'programs' => [
            [
                'title' => 'مهارات التعلم الذاتي',
                'icon' => '/assets/website/images/perceptual-report/balanced/program-1.svg',
                'border' => '#1657c2',
                'bg' => '#f6faff',
                'icon_bg' => '#e6f1ff',
            ],
            [
                'title' => 'التفكير الناقد',
                'icon' => '/assets/website/images/perceptual-report/balanced/program-2.svg',
                'border' => '#6c66e9',
                'bg' => '#f6f8ff',
                'icon_bg' => '#eef2ff',
            ],
            [
                'title' => 'التفكير الإبداعي والابتكاري',
                'icon' => '/assets/website/images/perceptual-report/balanced/program-3.svg',
                'border' => '#3ea1d5',
                'bg' => '#f6faff',
                'icon_bg' => '#edf8ff',
            ],
            [
                'title' => 'القيادة والتأثير',
                'icon' => '/assets/website/images/perceptual-report/balanced/program-4.svg',
                'border' => '#0d9488',
                'bg' => '#f9fffe',
                'icon_bg' => '#e2fff8',
            ],
            [
                'title' => 'الاتصال الفعال',
                'icon' => '/assets/website/images/perceptual-report/balanced/program-5.svg',
                'border' => '#9333ea',
                'bg' => '#fdfbff',
                'icon_bg' => '#f7efff',
            ],
        ],
        'tips' => [
            [
                'text' => 'استثمر مرونتك في التعلم المستمر.',
                'icon' => '/assets/website/images/perceptual-report/balanced/tip-1.svg',
            ],
            [
                'text' => 'اختر أسلوب التعلم الأنسب لكل موقف.',
                'icon' => '/assets/website/images/perceptual-report/balanced/tip-2.svg',
            ],
            [
                'text' => 'حافظ على توازن استخدام الأنماط الثلاثة.',
                'icon' => '/assets/website/images/perceptual-report/balanced/tip-3.svg',
            ],
            [
                'text' => 'شارك خبراتك مع الآخرين.',
                'icon' => '/assets/website/images/perceptual-report/balanced/tip-4.svg',
            ],
            [
                'text' => 'اجعل التنوع في أساليب التعلم جزءًا من أسلوبك.',
                'icon' => '/assets/website/images/perceptual-report/balanced/tip-5.svg',
            ],
        ],
    ],
    'dual_auditory_kinesthetic' => [
        'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/dominant.svg',
        'how_to_learn' => [
            [
                'text' => 'استمع ثم طبّق.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/how-1.svg',
            ],
            [
                'text' => 'شارك في الورش العملية.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/how-2.svg',
            ],
            [
                'text' => 'ناقش خطوات التنفيذ.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/how-3.svg',
            ],
            [
                'text' => 'كرر التطبيق بعد الشرح.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/how-4.svg',
            ],
            [
                'text' => 'استخدم قوائم العمل المكتوبة.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/how-5.svg',
            ],
            [
                'text' => 'اطلب تغذية راجعة أثناء العمل.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/how-6.svg',
            ],
        ],
        'programs' => [
            [
                'title' => 'مهارات الاتصال الفعال',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/program-1.svg',
                'border' => '#1657c2',
                'bg' => '#f6faff',
                'icon_bg' => '#e6f1ff',
            ],
            [
                'title' => 'القيادة الميدانية',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/program-2.svg',
                'border' => '#6c66e9',
                'bg' => '#f6f8ff',
                'icon_bg' => '#eef2ff',
            ],
            [
                'title' => 'إدارة فرق العمل',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/program-3.svg',
                'border' => '#3ea1d5',
                'bg' => '#f6faff',
                'icon_bg' => '#edf8ff',
            ],
            [
                'title' => 'حل المشكلات',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/program-4.svg',
                'border' => '#0d9488',
                'bg' => '#f9fffe',
                'icon_bg' => '#e2fff8',
            ],
            [
                'title' => 'التفاوض والإقناع',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/program-5.svg',
                'border' => '#9333ea',
                'bg' => '#fdfbff',
                'icon_bg' => '#f7efff',
            ],
        ],
        'tips' => [
            [
                'text' => 'ناقش قبل التنفيذ.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/tip-1.svg',
            ],
            [
                'text' => 'اطلب توضيحاً عند الحاجة.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/tip-2.svg',
            ],
            [
                'text' => 'سجل ملاحظاتك بعد كل تجربة.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/tip-3.svg',
            ],
            [
                'text' => 'راجع ما تعلمته مع زملائك.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/tip-4.svg',
            ],
            [
                'text' => 'احرص على الموازنة بين الحوار والتطبيق.',
                'icon' => '/assets/website/images/perceptual-report/dual_auditory_kinesthetic/tip-5.svg',
            ],
        ],
    ],
    'dual_visual_kinesthetic' => [
        'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/dominant.svg',
        'how_to_learn' => [
            [
                'text' => 'شاهد ثم طبّق مباشرة',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/how-1.svg',
            ],
            [
                'text' => 'استخدم المحاكاة الواقعية',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/how-2.svg',
            ],
            [
                'text' => 'تعلم من خلال المشروعات',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/how-3.svg',
            ],
            [
                'text' => 'نفّذ أمثلة عملية حية',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/how-4.svg',
            ],
            [
                'text' => 'استخدم الرسوم أثناء التطبيق',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/how-5.svg',
            ],
            [
                'text' => 'راجع خطوات التنفيذ بصرياً',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/how-6.svg',
            ],
        ],
        'programs' => [
            [
                'title' => 'مهارات التفكير البصري',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/program-1.svg',
                'border' => '#0d9488',
                'bg' => '#f9fffe',
                'icon_bg' => '#e2fff8',
            ],
            [
                'title' => 'مهارات العرض والإلقاء',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/program-2.svg',
                'border' => '#9333ea',
                'bg' => '#fdfbff',
                'icon_bg' => '#f7efff',
            ],
            [
                'title' => 'التفكير التصميمي (Design Thinking)',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/program-3.svg',
                'border' => '#1657c2',
                'bg' => '#f6faff',
                'icon_bg' => '#e0eeff',
            ],
            [
                'title' => 'إعداد العروض التقديمية الاحترافية',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/program-4.svg',
                'border' => '#6c66e9',
                'bg' => '#f6f8ff',
                'icon_bg' => '#eef2ff',
            ],
            [
                'title' => 'الخرائط الذهنية وتنظيم المعرفة',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/program-5.svg',
                'border' => '#3ea1d5',
                'bg' => '#f6faff',
                'icon_bg' => '#edf8ff',
            ],
        ],
        'tips' => [
            [
                'text' => 'لا تكتفِ بالمشاهدة طبّق ما تتعلمه مباشرة.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/tip-1.svg',
            ],
            [
                'text' => 'استخدم الرسومات لتخطيط مراحل التنفيذ.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/tip-2.svg',
            ],
            [
                'text' => 'راجع النتائج بعد كل تجربة للتحسين الفوري.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/tip-3.svg',
            ],
            [
                'text' => 'استفد من التغذية الراجعة المستمرة من الفريق.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/tip-4.svg',
            ],
            [
                'text' => 'وازن بين جودة التخطيط وسرعة التنفيذ الميداني.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_kinesthetic/tip-5.svg',
            ],
        ],
    ],
    'dual_visual_auditory' => [
        'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/dominant.svg',
        'how_to_learn' => [
            [
                'text' => 'احضر العروض التقديمية التفاعلية.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/how-1.svg',
            ],
            [
                'text' => 'استخدم الفيديوهات التعليمية.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/how-2.svg',
            ],
            [
                'text' => 'استخدم الخرائط الذهنية مع التسجيلات الصوتية.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/how-3.svg',
            ],
            [
                'text' => 'دون الملاحظات أثناء الاستماع.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/how-4.svg',
            ],
            [
                'text' => 'ناقش الأفكار بعد قراءتها.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/how-5.svg',
            ],
            [
                'text' => 'شارك في مجموعات التعلم.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/how-6.svg',
            ],
        ],
        'programs' => [
            [
                'title' => 'مهارات التفكير البصري',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/program-1.svg',
                'border' => '#0d9488',
                'bg' => '#f9fffe',
                'icon_bg' => '#e2fff8',
            ],
            [
                'title' => 'مهارات العرض والإلقاء',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/program-2.svg',
                'border' => '#9333ea',
                'bg' => '#fdfbff',
                'icon_bg' => '#faf5ff',
            ],
            [
                'title' => 'مهارات الاتصال الفعال',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/program-3.svg',
                'border' => '#1657c2',
                'bg' => '#f6faff',
                'icon_bg' => '#e0eeff',
            ],
            [
                'title' => 'إعداد العروض التقديمية الاحترافية',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/program-4.svg',
                'border' => '#6c66e9',
                'bg' => '#f6f8ff',
                'icon_bg' => '#eef2ff',
            ],
            [
                'title' => 'الخرائط الذهنية وتنظيم المعرفة',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/program-5.svg',
                'border' => '#3ea1d5',
                'bg' => '#f6faff',
                'icon_bg' => '#edf8ff',
            ],
        ],
        'tips' => [
            [
                'text' => 'الجمع دائماً بين القراءة والمناقشة.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/tip-1.svg',
            ],
            [
                'text' => 'لخص المعلومات في مخططات ثم ناقشها.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/tip-2.svg',
            ],
            [
                'text' => 'شاهد المحتوى التعليمي مع تدوين الملاحظات.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/tip-3.svg',
            ],
            [
                'text' => 'راجع المعلومات بصرياً وشفهياً.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/tip-4.svg',
            ],
            [
                'text' => 'احرص على حضور الورش التفاعلية.',
                'icon' => '/assets/website/images/perceptual-report/dual_visual_auditory/tip-5.svg',
            ],
        ],
    ],
    'auditory' => [
        'icon' => '/assets/website/images/perceptual-report/auditory/dominant.svg',
        'how_to_learn' => [
            [
                'text' => 'استمع إلى الشروحات والمحاضرات',
                'icon' => '/assets/website/images/perceptual-report/auditory/how-1.svg',
            ],
            [
                'text' => 'شارك في النقاشات واطرح الأسئلة',
                'icon' => '/assets/website/images/perceptual-report/auditory/how-2.svg',
            ],
            [
                'text' => 'استخدم التسجيلات الصوتية للمراجعة',
                'icon' => '/assets/website/images/perceptual-report/auditory/how-3.svg',
            ],
            [
                'text' => 'ناقش الأفكار مع الآخرين',
                'icon' => '/assets/website/images/perceptual-report/auditory/how-4.svg',
            ],
            [
                'text' => 'اقرأ المعلومات بصوت مسموع',
                'icon' => '/assets/website/images/perceptual-report/auditory/how-5.svg',
            ],
            [
                'text' => 'استفد من البودكاست والموارد الصوتية',
                'icon' => '/assets/website/images/perceptual-report/auditory/how-6.svg',
            ],
        ],
        'programs' => [
            [
                'title' => 'مهارات الاتصال الفعال',
                'icon' => '/assets/website/images/perceptual-report/auditory/program-1.svg',
                'border' => '#1657c2',
                'bg' => '#f6faff',
                'icon_bg' => '#e6f1ff',
            ],
            [
                'title' => 'فن الإلقاء والتحدث أمام الجمهور',
                'icon' => '/assets/website/images/perceptual-report/auditory/program-2.svg',
                'border' => '#6c66e9',
                'bg' => '#f6f8ff',
                'icon_bg' => '#eef2ff',
            ],
            [
                'title' => 'الاستماع النشط',
                'icon' => '/assets/website/images/perceptual-report/auditory/program-3.svg',
                'border' => '#3ea1d5',
                'bg' => '#f6faff',
                'icon_bg' => '#edf8ff',
            ],
            [
                'title' => 'التفاوض والإقناع',
                'icon' => '/assets/website/images/perceptual-report/auditory/program-4.svg',
                'border' => '#0d9488',
                'bg' => '#f9fffe',
                'icon_bg' => '#f1f7ff',
            ],
            [
                'title' => 'إدارة الحوار والنقاش',
                'icon' => '/assets/website/images/perceptual-report/auditory/program-5.svg',
                'border' => '#9333ea',
                'bg' => '#fdfbff',
                'icon_bg' => '#f7efff',
            ],
        ],
        'tips' => [
            [
                'text' => 'سجل الملاحظات صوتياً.',
                'icon' => '/assets/website/images/perceptual-report/auditory/tip-1.svg',
            ],
            [
                'text' => 'ناقش ما تعلمته مع الاخرين.',
                'icon' => '/assets/website/images/perceptual-report/auditory/tip-2.svg',
            ],
            [
                'text' => 'كرر المعلومات بصوت مرتفع.',
                'icon' => '/assets/website/images/perceptual-report/auditory/tip-3.svg',
            ],
            [
                'text' => 'احرص على حضور الورش التفاعلية.',
                'icon' => '/assets/website/images/perceptual-report/auditory/tip-4.svg',
            ],
            [
                'text' => 'استخدم الأسئلة لتثبيت المعلومات.',
                'icon' => '/assets/website/images/perceptual-report/auditory/tip-5.svg',
            ],
        ],
    ],
    'kinesthetic' => [
        'icon' => '/assets/website/images/perceptual-report/kinesthetic/dominant.svg',
        'how_to_learn' => [
            [
                'text' => 'مارس المهارة بنفسك',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/how-1.svg',
            ],
            [
                'text' => 'شارك في الأنشطة العملية',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/how-2.svg',
            ],
            [
                'text' => 'تعلم من خلال المشروعات',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/how-3.svg',
            ],
            [
                'text' => 'استخدم المحاكاة والتجارب',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/how-4.svg',
            ],
            [
                'text' => 'طبق ما تتعلمه مباشرة',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/how-5.svg',
            ],
            [
                'text' => 'اطلب تغذية راجعة بعد التطبيق',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/how-6.svg',
            ],
        ],
        'programs' => [
            [
                'title' => 'القيادة الميدانية',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/program-1.svg',
                'border' => '#0d9488',
                'bg' => '#f9fffe',
                'icon_bg' => '#e2fff8',
            ],
            [
                'title' => 'إدارة الأنشطة والفعاليات',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/program-2.svg',
                'border' => '#9333ea',
                'bg' => '#fdfbff',
                'icon_bg' => '#f7efff',
            ],
            [
                'title' => 'التعلم بالمشروعات',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/program-3.svg',
                'border' => '#1657c2',
                'bg' => '#f6faff',
                'icon_bg' => '#e0eeff',
            ],
            [
                'title' => 'التفكير التصميمي',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/program-4.svg',
                'border' => '#6c66e9',
                'bg' => '#f6f8ff',
                'icon_bg' => '#e9eeff',
            ],
            [
                'title' => 'حل المشكلات واتخاذ القرار',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/program-5.svg',
                'border' => '#3ea1d5',
                'bg' => '#f6faff',
                'icon_bg' => '#ddf1ff',
            ],
        ],
        'tips' => [
            [
                'text' => 'جرب قبل أن تحكم.',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/tip-1.svg',
            ],
            [
                'text' => 'قسم المهام إلى خطوات عملية.',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/tip-2.svg',
            ],
            [
                'text' => 'سجل ما تعلمته بعد كل تجربة.',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/tip-3.svg',
            ],
            [
                'text' => 'تعلم من الأخطاء ولا تخش التجربة.',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/tip-4.svg',
            ],
            [
                'text' => 'مارس المهارة بصورة مستمرة.',
                'icon' => '/assets/website/images/perceptual-report/kinesthetic/tip-5.svg',
            ],
        ],
    ],
];
