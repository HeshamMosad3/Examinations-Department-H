<?php

/*
 * "تفاصيل الجوانب" page data. The percentages shown on the page are NOT stored here: they come from the user's
 * saved result in the database (App\Services\LifeWheelService). Each aspect has 4 sub-aspects covering the scale's
 * questions in order: 3 + 3 + 2 + 2 (see LifeWheelService::SUB_GROUPS), as in the scale document.
 * Icons: public/landing/icons/aspects/ ({key}.svg main icon, {key}-1..4.svg sub-aspect icons).
 * (Figma file n7hAGUkz558sP500I0m375, frame 3083:12404).
 * Texts, percentages and per-element sizes are copied from the Figma "Service (Desktop)" components
 * (Property 1 = Default / Expand). Full Tailwind class strings are kept literal on purpose so the
 * landing Tailwind build (resources/landing/tailwind.config.js scans this file) generates them.
 *
 * NOTE: a few texts are copied verbatim from Figma even though they look like typos / placeholders there:
 *   family   sub 1  description, financial sub 3 description, leisure sub 3 description.
 */

// One sub-aspect row of the expanded card.
$sub = static fn (array $s, array $defaults): array => $s + $defaults;

$subDefaults = [
    'titleW' => 'whitespace-nowrap',
    'colW' => '',
    'colAlign' => 'items-start',
    'descBox' => 'w-full',
    'descW' => 'w-full',
    'descLeading' => 'leading-[16.5px]',
    'iconInner' => null,          // null => the svg already contains the 36x36 box (Background+Border)
    'iconWrap' => false,
    'rowAlign' => 'items-start',
];

return [
    [
        'key' => 'spiritual', 'dimension' => 'الروحي', 'name' => 'الجانب الروحاني', 'icon' => 'spiritual.svg',
        'text' => 'text-[#5963d9]', 'border' => 'border-[#5963d9]', 'badge' => 'bg-[#e6e9ff] border-[rgba(169,176,255,0.87)]',
        'descWidth' => 'w-full whitespace-pre-wrap', 'desc' => ' يقيس مدى التزام الفرد بالعبادات  والممارسات الإيمانية، وانعكاس القيم الروحية على سلوكه',
        'order' => 'order-1',
        'expand' => [
            'border' => 'border-[#5963d9]', 'outer' => 'h-[623px]',
            'inner' => 'left-0 top-0 w-[401px] px-[16px] py-[15px]',
            'content' => 'gap-[16px] h-[596px] items-start w-[369px]',
            'head' => 'w-[369px]', 'hideBtn' => 'w-full',
            'list' => 'gap-[10px] h-[443px] items-center w-full',
            'box' => 'bg-[#e6e9ff] border-[#a9b0ff]', 'pct' => 'text-[#5963d9]', 'bar' => 'bg-[#5963d9]',
        ],
        'subs' => [
            $sub(['title' => 'الالتزام بالعبادات', 'desc' => 'الحرص على أداء الفرائض والنوافل والمحافظة على الأذكار وتلاوة القرآن بانتظام.',
                'wrap' => 'w-[294px]', 'colW' => 'w-[205px]', 'titleW' => 'w-full', 'descW' => 'w-[229px]', 'iconInner' => 'size-[19.217px]', 'file' => 'spiritual-1.svg',], $subDefaults),
            $sub(['title' => 'الممارسات الإيمانية', 'desc' => 'العناية بالعبادات التطوعية ومحاسبة النفس وزيادة المعرفة الشرعية.',
                'wrap' => 'w-[217px]', 'colW' => 'w-[200px]', 'iconInner' => 'h-[17.14px] w-[17.01px]', 'file' => 'spiritual-2.svg',], $subDefaults),
            $sub(['title' => 'القيم والسلوك الإسلامي', 'desc' => 'انعكاس القيم الإيمانية في التعاملات اليومية والمسارعة بالتوبة وتصحيح الخطأ.',
                'wrap' => 'w-[259px]', 'colW' => 'w-[217px]', 'file' => 'spiritual-3.svg',], $subDefaults),
            $sub(['title' => 'النمو الروحي', 'desc' => 'الطمانينة الإيمانية في مواجهة ضغوط الحياة ووضع أهداف عملية للتطور الروحي.',
                'wrap' => 'w-[264px]', 'colW' => 'w-[201px]', 'iconInner' => 'h-[13.712px] w-[15.149px]', 'file' => 'spiritual-4.svg',], $subDefaults),
        ],
    ],
    [
        'key' => 'health', 'dimension' => 'الصحي', 'name' => 'الجانب الصحي', 'icon' => 'health.svg',
        'text' => 'text-[#488c70]', 'border' => 'border-[#488c70]', 'badge' => 'bg-[#e6f9ef] border-[#a7f3d0]',
        'descWidth' => 'w-[288px]', 'desc' => 'يقيس مدى تبني الفرد لعادات صحية متكاملة تشمل التغذية، النشاط البدني، كفاية النوم،',
        'order' => 'order-2',
        'expand' => [
            'border' => 'border-[#488c70]', 'outer' => 'h-[623px]',
            'inner' => 'left-0 top-[-1px] w-[401px] p-[16px]',
            'content' => 'gap-[19px] h-[590px] items-center w-[369px]',
            'head' => 'w-[369px]', 'hideBtn' => 'w-[369px]',
            'list' => 'gap-[10px] h-[426px] items-center justify-center w-full',
            'box' => 'bg-[#e6f9ef] border-[#a7f3d0]', 'pct' => 'text-[#488c70]', 'bar' => 'bg-[#488c70]',
        ],
        'subs' => [
            $sub(['title' => 'التغذية الصحية', 'desc' => 'تناول وجبات متوازنة وشرب كميات كافية من الماء والحد من الأطعمة الضارة.',
                'wrap' => 'w-[242px]', 'colW' => 'w-[200px]', 'iconInner' => 'h-[16.125px] w-[11.866px]', 'file' => 'health-1.svg',], $subDefaults),
            $sub(['title' => 'النشاط البدني', 'desc' => 'ممارسة الرياضة بانتظام، تجنب الخمول، والحفاظ على اللياقة البدنية.',
                'wrap' => 'w-[269px]', 'colW' => 'w-[200px]', 'iconInner' => 'size-[16.669px]', 'file' => 'health-2.svg',], $subDefaults),
            $sub(['title' => 'الراحة والتعافي', 'desc' => 'الحصول على كفاية من النوم وتخصيص وقت للاسترخاء عند الإجهاد.',
                'wrap' => 'w-[253px]', 'colW' => 'w-[211px]', 'file' => 'health-3.svg',], $subDefaults),
            $sub(['title' => 'الوقاية والعناية الصحية', 'desc' => 'إجراء الفحوصات الحرجة / الدورية والالتزام بالسلوكيات الوقائية من الأمراض.',
                'wrap' => 'w-[256px]', 'colW' => 'w-[209px]', 'file' => 'health-4.svg',], $subDefaults),
        ],
    ],
    [
        'key' => 'personal', 'dimension' => 'الشخصي', 'name' => 'الجانب الشخصي', 'icon' => 'personal.svg',
        'text' => 'text-[#5c3e9b]', 'border' => 'border-[#5c3e9b]', 'badge' => 'bg-[#f1eaff] border-[rgba(207,186,255,0.87)]',
        'descWidth' => 'w-[244px]', 'desc' => 'يقيس معرفتك للتعلم والنمو الذاتي وتحقيق أهدافك الشخصية.',
        'order' => 'order-3',
        'expand' => [
            'border' => 'border-[#5c3e9b]', 'outer' => 'h-[641px]',
            'inner' => 'bg-white h-[643px] left-0 right-[-1px] top-[-1px] px-[13px] py-[16px]',
            'content' => 'gap-[16px] items-center justify-center w-[371px]',
            'head' => 'w-full', 'hideBtn' => 'w-[369px]',
            'list' => 'gap-[10px] items-start w-full',
            'box' => 'bg-[#f1eaff] border-[#e9d5ff]', 'pct' => 'text-[#5c3e9b]', 'bar' => 'bg-[#5c3e9b]',
        ],
        'subs' => [
            $sub(['title' => 'التعلم والتطوير', 'desc' => 'تخصيص وقت لتعلم مهارات جديدة واستثمار مصادر المعرفة المختلفة.',
                'wrap' => 'w-[248px]', 'colW' => 'w-[199px]', 'descLeading' => 'leading-[normal]', 'iconInner' => 'h-[15px] w-[19px]', 'iconWrap' => true, 'file' => 'personal-1.svg',], $subDefaults),
            $sub(['title' => 'إدارة الذات', 'desc' => 'تنظيم الوقت الالتزام بالمهام ومراجعة الأولويات بانتظام.',
                'wrap' => 'w-[217px]', 'descW' => 'w-[148px]', 'iconInner' => 'size-[17.005px]', 'file' => 'personal-2.svg',], $subDefaults),
            $sub(['title' => 'التخطيط الشخصي', 'desc' => 'تحديد أهداف واضحة ووضع خطوات عملية للوصول إليها.',
                'wrap' => 'w-[217px]', 'descW' => 'w-[148px]', 'iconInner' => 'size-[19px]', 'file' => 'personal-3.svg',], $subDefaults),
            $sub(['title' => 'التحسين المستمر', 'desc' => 'تقييم الأداء الذاتي دورياً والاستفادة من التجارب السابقة.',
                'wrap' => 'w-[217px]', 'colW' => 'w-[171px]', 'descLeading' => 'leading-[normal]', 'iconInner' => 'h-[18.518px] w-[13.563px]', 'file' => 'personal-4.svg',], $subDefaults),
        ],
    ],
    [
        'key' => 'family', 'dimension' => 'العائلي', 'name' => 'الجانب العائلي', 'icon' => 'family.svg', 'iconGlyph' => true,
        'text' => 'text-[#d87f3c]', 'border' => 'border-[#d87f3c]', 'badge' => 'bg-[#fff0e5] border-[#f5b695]',
        'descWidth' => 'w-[250px]', 'desc' => 'يقيس جودة التواصل الأسري، ومستوى تحمل المسؤوليات،',
        'order' => 'order-4',
        'expand' => [
            'border' => 'border-[#bc7b4a]', 'outer' => 'h-[595px]',
            'inner' => 'h-[597px] overflow-clip left-0 right-[-1px] top-[-1px] px-[13px] py-[16px]',
            'content' => 'gap-[16px] items-start w-full',
            'head' => 'w-full', 'hideBtn' => 'w-[369px]',
            'list' => 'gap-[10px] h-[410px] items-center justify-center w-full',
            'box' => 'bg-[#fff0e5] border-[#f5b695]', 'pct' => 'text-[#d87f3c]', 'bar' => 'bg-[#d87f3c]',
        ],
        'subs' => [
            $sub(['title' => 'التواصل الأسري', 'desc' => 'الحوار المستمر، الاستماء باحة اه والتعبيه الاتحاد عن المشاعر',
                'wrap' => 'w-[242px]', 'colW' => 'w-[200px]', 'descW' => 'w-[171px]', 'iconInner' => 'h-[17.274px] w-[17.235px]', 'file' => 'family-1.svg',], $subDefaults),
            $sub(['title' => 'المسؤولية الأسرية', 'desc' => 'الالتزام بالواجبات والوفاء بالوعود وتلبية احتياجات الأسرة',
                'wrap' => 'w-[217px]', 'colW' => 'w-[200px]', 'descW' => 'w-[171px]', 'iconInner' => 'h-[15.149px] w-[18.563px]', 'file' => 'family-2.svg',], $subDefaults),
            $sub(['title' => 'المشاركة والدعم', 'desc' => 'التواجد في المناسبات العائلية وتقديم المساندة عند الحاجة',
                'wrap' => 'w-[217px]', 'descW' => 'w-[148px]', 'file' => 'family-3.svg',], $subDefaults),
            $sub(['title' => 'استمرارية العلاقات', 'desc' => 'بر الوالدين وصلة الرحم',
                'wrap' => 'w-[217px]', 'descW' => 'w-[148px]', 'descLeading' => 'leading-[17px]', 'rowAlign' => 'items-center', 'file' => 'family-4.svg',], $subDefaults),
        ],
    ],
    [
        'key' => 'social', 'dimension' => 'الاجتماعي', 'name' => 'الجانب الاجتماعي', 'icon' => 'social.svg',
        'text' => 'text-[#963056]', 'border' => 'border-[#963056]', 'badge' => 'bg-[#ffe4ee] border-[#976a7b]',
        'descWidth' => 'w-[265px]', 'desc' => 'يقيس مدى اهتمام الفرد بصلة الأرحام وبناء علاقات إيجابية مع المحيط.',
        'order' => 'order-5',
        'expand' => [
            'border' => 'border-[#963056]', 'outer' => 'h-[612px]', 'width' => 'w-full xl:w-[401px]',
            'inner' => 'h-[614px] left-0 right-[-1px] top-[-1px] px-[13px] pb-[8px] pt-[16px]',
            'content' => 'gap-[16px] items-center w-full',
            'head' => 'w-full', 'hideBtn' => 'w-[369px]',
            'list' => 'gap-[10px] h-[426px] items-center justify-center w-full',
            'box' => 'bg-[#ffe4ee] border-[#976a7b]', 'pct' => 'text-[#963056]', 'bar' => 'bg-[#963056]',
        ],
        'subs' => [
            $sub(['title' => 'التواصل الاجتماعي', 'desc' => 'المبادرة بالسؤال عن الأقارب والأصدقاء والتواصل بتقدير واحترام.',
                'wrap' => 'w-[242px]', 'colW' => 'w-[200px]', 'iconInner' => 'h-[16.976px] w-[18.648px]', 'file' => 'social-1.svg',], $subDefaults),
            $sub(['title' => 'المحافظة على العلاقات', 'desc' => 'بناء علاقات إيجابية معالجة الخلافات بالحوار، والوفاء بالالتزامات.',
                'wrap' => 'w-[217px]', 'colW' => 'w-[200px]', 'iconInner' => 'h-[17.661px] w-[17.854px]', 'file' => 'social-2.svg',], $subDefaults),
            $sub(['title' => 'المشاركة المجتمعية', 'desc' => 'المساهمة في المناسبات والمبادرات وتقديم العون للآخرين.',
                'wrap' => 'w-[217px]', 'colW' => 'w-[175px]', 'file' => 'social-3.svg',], $subDefaults),
            $sub(['title' => 'المهارات الاجتماعية', 'desc' => 'الإنصاف في الاستماع للغير ومراعاة المشاعر وآداب التعامل.',
                'wrap' => 'w-[247px]', 'colW' => 'w-[205px]', 'rowAlign' => 'items-center', 'file' => 'social-4.svg',], $subDefaults),
        ],
    ],
    [
        'key' => 'career', 'dimension' => 'المهني', 'name' => 'الجانب المهني', 'icon' => 'career.svg',
        'text' => 'text-[#21487b]', 'border' => 'border-[#21487b]', 'badge' => 'bg-[#e9edf2] border-[#bac7d6]',
        'descWidth' => 'w-full', 'desc' => 'يقيس انضباط الفرد والتزامه بأنظمة العمل، وجودة أدائه المهني، وسعيه لتطوير مهاراته',
        'order' => 'order-6',
        'expand' => [
            'border' => 'border-[#21487b]', 'outer' => 'h-[613px]', 'width' => 'w-full xl:w-[403px]',
            'inner' => 'justify-center left-0 top-0 w-full xl:w-[403px] px-[15px] py-[16px]',
            'content' => 'gap-[16px] justify-center w-[371px]',
            'head' => 'w-full', 'hideBtn' => 'w-[369px]',
            'list' => 'gap-[10px] h-[426px] items-center justify-center w-full',
            'box' => 'bg-[#dee4eb] border-[#bac7d6]', 'pct' => 'text-[#204a7a]', 'bar' => 'bg-[#204a7a]',
        ],
        'subs' => [
            $sub(['title' => 'الالتزام المهني', 'desc' => 'إنجاز المسؤوليات في وقتها والالتزام بأنظمة العمل وأنظمته.',
                'wrap' => 'w-[242px]', 'colW' => 'w-[200px]', 'descW' => 'w-[171px]', 'iconInner' => 'h-[10.339px] w-[17.005px]', 'file' => 'career-1.svg',], $subDefaults),
            $sub(['title' => 'جودة الأداء', 'desc' => 'الدقة والإتقان والسعي المستمر لتطوير الإنتاجية.',
                'wrap' => 'w-[217px]', 'colW' => 'w-[200px]', 'descW' => 'w-[171px]', 'iconInner' => 'size-[17.005px]', 'file' => 'career-2.svg',], $subDefaults),
            $sub(['title' => 'التطوير المهني', 'desc' => 'تنمية المهارات الوظيفية والاستفادة من التغذية الراجعة لرفع الكفاءة.',
                'wrap' => 'w-[241px]', 'colW' => 'w-[199px]', 'descW' => 'w-[183px]', 'file' => 'career-3.svg',], $subDefaults),
            $sub(['title' => 'العلاقات المهنية:', 'desc' => 'التعامل باحترام مع الزملاء والمستفيدين وتعزيز روح التعاون.',
                'wrap' => 'w-[217px]', 'colW' => 'w-[171px]', 'rowAlign' => 'items-center', 'file' => 'career-4.svg',], $subDefaults),
        ],
    ],
    [
        'key' => 'financial', 'dimension' => 'المالي', 'name' => 'الجانب المالي', 'icon' => 'financial.svg',
        'text' => 'text-[#27797e]', 'border' => 'border-[#27797e]', 'badge' => 'bg-[#e2fdff] border-[#87aaac]',
        'descWidth' => 'w-[250px]', 'desc' => 'يقيس مدى كفاءة الفرد في التخطيط المالي، وإدارة الدخل والمصروفات.',
        'order' => 'order-7',
        'expand' => [
            'border' => 'border-[#27797e]', 'outer' => 'h-[613px]',
            'inner' => 'left-0 right-[-1px] top-[-1px] px-[13px] py-[16px]',
            'content' => 'gap-[16px] items-center w-full',
            'head' => 'w-full', 'hideBtn' => 'w-[369px]',
            'list' => 'gap-[10px] h-[428px] items-center justify-center w-full',
            'box' => 'bg-[#e2fdff] border-[#27797e]', 'pct' => 'text-[#27797e]', 'bar' => 'bg-[#27797e]',
        ],
        'subs' => [
            $sub(['title' => 'التخطيط المالي', 'desc' => 'تحديد الأهداف المالية ووضع ميزانية واضحة لتنظيم الإنفاق.',
                'wrap' => 'w-[242px]', 'colW' => 'w-[200px]', 'descW' => 'w-[171px]', 'iconInner' => 'size-[24px]', 'file' => 'financial-1.svg',], $subDefaults),
            $sub(['title' => 'إدارة الإنفاق', 'desc' => 'إدارة الميزانية اليومية والتمييز بين الحاجات الأساسية والرغبات.',
                'wrap' => 'w-[217px]', 'colW' => 'w-[200px]', 'descW' => 'w-[171px]', 'iconInner' => 'size-[18px]', 'file' => 'financial-2.svg',], $subDefaults),
            $sub(['title' => 'الادخار والاستعداد للمستقبل', 'desc' => 'المساهمة في المناسبات والمبادرات وتقديم العون للآخرين.',
                'wrap' => 'w-[217px]', 'colW' => 'w-[205px]', 'iconInner' => 'size-[18px]', 'file' => 'financial-3.svg', 'pct' => 'text-[#26797e]', 'bar' => 'bg-[#26797e]',], $subDefaults),
            $sub(['title' => 'المسؤولية المالية', 'desc' => 'الالتزام بدفع الالتزامات والديون والحد من المصاريف غير الضرورية.',
                'wrap' => 'w-[245px]', 'colW' => 'w-[189px]', 'iconInner' => 'size-[18px]', 'rowAlign' => 'items-center', 'file' => 'financial-4.svg', 'pct' => 'text-[#26797e]', 'bar' => 'bg-[#26797e]',], $subDefaults),
        ],
    ],
    [
        'key' => 'leisure', 'dimension' => 'الترفيهي', 'name' => 'الجانب الترفيهي', 'icon' => 'leisure.svg',
        'text' => 'text-[#b8aa44]', 'border' => 'border-[#b8aa44]', 'badge' => 'bg-[#f7f4d9] border-[#dbcf9d]',
        'descWidth' => 'w-full', 'desc' => 'يقيس قدرة الفرد على التوازن بين العمل والحياة، وممارسة الهوايات والأنشطة الترفيهية .',
        'order' => 'order-8',
        'expand' => [
            'border' => 'border-[#b8aa44]', 'outer' => 'h-[610px]', 'width' => 'w-full xl:w-[401px]',
            'inner' => 'left-0 right-[-1px] top-[-1px] px-[13px] py-[16px]',
            'content' => 'gap-[16px] h-[578px] items-center w-full',
            'head' => 'w-full', 'hideBtn' => 'w-[369px]',
            'list' => 'gap-[10px] h-[425px] items-center justify-center w-full',
            'box' => 'bg-[#f7f4d9] border-[#dbcf9d]', 'pct' => 'text-[#b8aa44]', 'bar' => 'bg-[#b8aa44]',
        ],
        'subs' => [
            $sub(['title' => 'التوازن بين العمل والحياة', 'desc' => 'الفصل بين المسؤوليات والوقت الشخصي بانتظام.',
                'wrap' => 'w-[242px]', 'colW' => 'w-[200px]', 'descW' => 'w-[171px]', 'iconInner' => 'h-[14px] w-[18px]', 'file' => 'leisure-1.svg',], $subDefaults),
            $sub(['title' => 'الهوايات والاهتمامات', 'desc' => 'بممارسة نشاط استمتاعي منتظم وتجربة أنشطة جديدة كاسرة للروتين.',
                'wrap' => 'w-[257px]', 'colW' => 'w-[200px]', 'iconInner' => 'size-[18px]', 'file' => 'leisure-2.svg',], $subDefaults),
            $sub(['title' => 'الراحة وتحديد الطاقة', 'desc' => 'اأخذ فترات استرخاء لتخفيف ضغوط الحياة واستعادة النشاط.',
                'wrap' => 'w-[245px]', 'colW' => 'w-[199px]', 'iconInner' => 'size-[18px]', 'file' => 'leisure-3.svg',], $subDefaults),
            $sub(['title' => 'التنوع في الأنشطة', 'desc' => 'التخطيط المسبق لأنشطة ترفيهية متنوعة (مع الأسرة، الأصدقاء، أو بمفردك.',
                'wrap' => 'w-[273px]', 'colW' => 'w-[217px]', 'colAlign' => 'items-end', 'descBox' => 'w-[193px]', 'descW' => 'w-[208px]', 'iconInner' => 'size-[18px]', 'rowAlign' => 'items-center', 'file' => 'leisure-4.svg',], $subDefaults),
        ],
    ],
];
