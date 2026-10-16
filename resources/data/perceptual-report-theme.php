<?php

// ثيم تقرير الأنماط الإدراكية لكل مستوى (Figma: بصري #3509:8526/#3509:6488، سمعي #3509:8668/#3509:7087،
// حسي #3509:9401/#3509:6939، بصري–سمعي #3509:8814/#3509:6638): ألوان الكروت وصورة المخ وهندسة رسمة المدار.
// الإحداثيات بالبكسل في تصميم كل جهاز: d = الديسكتوب (572×503)، m = الموبايل (393×346).
// كل المستويات السبعة متصممة؛ أي كود تاني بياخد ثيم البصري.
$r = '/landing/images/perceptual-report/result/';

// ثيم البصري (الأزرق) = الأساس
$visual = [
    'colors' => [
        'dom_border' => '#bed1e6', 'dom_bg' => 'linear-gradient(81.4deg, #fff 1%, #e0efff 99%)',
        'dom_icon_bg' => '#d9eaff', 'pill_bg' => '#d9eaff', 'pill_text' => '#204a7a', 'title_css' => 'color:#204a7a', 'pct_css' => 'color:#204a7a',
        'sum_border' => 'rgba(133,193,225,0.7)', 'sum_bg' => 'linear-gradient(150deg, rgba(248,250,252,0.9) 0%, rgba(240,249,255,0.7) 50%, rgba(239,246,255,0.8) 100%)',
        'sum_glow' => 'rgba(125,211,252,0.1)', 'sum_icon_bg' => '#cee7ff', 'sum_line' => '#0ea5e9', 'sum_bullet_border' => 'rgba(186,218,239,0.8)',
        'check_bg' => ['#e0f2fe', '#e0f2fe'],
    ],
    'assets' => [
        'star' => '/landing/images/perceptual-report/star.svg', 'zap' => $r . 'zap.svg', 'check' => $r . 'check.svg',
        'dom_icons' => [], // الأيقونة من المستوى نفسه (dominant.svg)
        'watermark' => $r . 'watermark-visual.svg',
    ],
    'orbit' => [
        'd' => [
            'w' => 572, 'h' => 503,
            'outer' => ['size' => 445.374, 'dx' => 0, 'dy' => 26.04, 'f' => $r . 'orbital-outer.svg'],
            'inner' => ['w' => 334.758, 'h' => 331.847, 'dx' => 2.91, 'dy' => 26.04, 'f' => $r . 'orbital-inner.svg'],
            'glows' => [['l' => 27.66, 't' => 231.42, 's' => 75.684, 'c' => 'rgba(108,145,227,0.6)', 'b' => 8.733]],
            'dots' => [['dx' => 38.57, 't' => 53.85, 'f' => $r . 'dot-1.svg', 'i' => 58.33], ['dx' => 219.05, 't' => 245.97, 'f' => $r . 'dot-2.svg', 'i' => 66.67], ['dx' => -114.25, 't' => 78.6, 'f' => $r . 'dot-3.svg', 'i' => 66.67]],
            'arc' => ['l' => 62.59, 't' => 53.85, 'w' => 419.176, 'h' => 436.641, 'img' => ['l' => 0.54, 't' => 6.6, 'w' => 25.1, 'h' => 36.2], 'f' => $r . 'arc.svg'],
            'brain' => ['l' => 131, 't' => 174, 'w' => 267, 'h' => 210, 'img' => ['l' => 0, 't' => -19.32, 'w' => 114.29, 'h' => 145.45], 'f' => $r . 'brain.png'],
            'kin' => ['l' => 418.73, 't' => 240.42, 'bw' => 1.455, 'ba' => 0.42],
            'aud' => ['cx' => -0.5, 't' => 0, 'bw' => 1.455, 'ba' => 0.13],
            'vis' => ['l' => 26.05, 't' => 239.42, 'bw' => 2.911, 'ba' => 0.5],
        ],
        'm' => [
            'w' => 393, 'h' => 346,
            'outer' => ['size' => 306, 'dx' => 0, 'dy' => 17, 'f' => $r . 'orbital-outer.svg'],
            'inner' => ['w' => 230, 'h' => 228, 'dx' => 2, 'dy' => 17, 'f' => $r . 'orbital-inner.svg'],
            'glows' => [['l' => 19, 't' => 159, 's' => 52, 'c' => 'rgba(108,145,227,0.6)', 'b' => 6]],
            'dots' => [['dx' => 26.5, 't' => 37, 'f' => $r . 'dot-1.svg', 'i' => 58.33], ['dx' => 150.5, 't' => 169, 'f' => $r . 'dot-2.svg', 'i' => 66.67], ['dx' => -78.5, 't' => 54, 'f' => $r . 'dot-3.svg', 'i' => 66.67]],
            'arc' => ['l' => 44, 't' => 37, 'w' => 288, 'h' => 300, 'img' => ['l' => 0.6, 't' => 6.79, 'w' => 24.87, 'h' => 35.95], 'f' => $r . 'arc.svg'],
            'brain' => ['l' => 98, 't' => 128, 'w' => 177, 'h' => 139, 'img' => ['l' => 0, 't' => -19.32, 'w' => 114.29, 'h' => 145.45], 'f' => $r . 'brain.png'],
            'kin' => ['l' => 288, 't' => 165, 'bw' => 1, 'ba' => 0.42],
            'aud' => ['cx' => 0, 't' => 3, 'bw' => 1, 'ba' => 0.13],
            'vis' => ['l' => 18, 't' => 165, 'bw' => 2, 'ba' => 0.5],
        ],
    ],
];

$auditory = [
    'colors' => [
        'dom_border' => '#d3b9ef', 'dom_bg' => 'linear-gradient(81.4deg, #fff 1%, #f4eeff 99%)',
        'dom_icon_bg' => '#f0e6ff', 'pill_bg' => '#f0e6ff', 'pill_text' => '#6e3cc2', 'title_css' => 'color:#6e3cc2', 'pct_css' => 'color:#6e3cc2',
        'sum_border' => '#d3b9ef', 'sum_bg' => 'linear-gradient(154.3deg, #f9f8fe 0%, #f9f8fe 50%, #eae5f5 100%)',
        'sum_glow' => '#eeebfc', 'sum_icon_bg' => '#f0e6ff', 'sum_line' => '#6e3cc2', 'sum_bullet_border' => 'rgba(213,195,233,0.8)',
        'check_bg' => ['#f0e6ff', '#f0e6ff'],
    ],
    'assets' => [
        'star' => $r . 'aud/AntDesignStarFilled.svg', 'zap' => $r . 'aud/OcticonZap24.svg', 'check' => $r . 'aud/QlementineIconsCheckTickSmall16.svg',
        'dom_icons' => [['f' => $r . 'aud/Fa7RegularHeadphones.svg', 'bg' => '#f0e6ff']],
        'watermark' => null,
    ],
    'orbit' => [
        'd' => [
            'w' => 572, 'h' => 503,
            'outer' => ['size' => 445, 'dx' => -0.5, 'dy' => 26, 'f' => $r . 'aud/OrbitalOuter.svg'],
            'inner' => ['w' => 334.758, 'h' => 331.847, 'dx' => 2.91, 'dy' => 26.04, 'f' => $r . 'orbital-inner.svg'],
            'glows' => [['l' => 203, 't' => -7, 's' => 75.684, 'c' => '#c5a9e3', 'b' => 8.733]],
            'dots' => [['dx' => 183.37, 't' => 149, 'f' => $r . 'aud/Ellipse.svg', 'i' => 58.33], ['dx' => 219.05, 't' => 245.97, 'f' => $r . 'aud/Ellipse1.svg', 'i' => 66.67], ['dx' => -175.63, 't' => 140, 'f' => $r . 'aud/Ellipse2.svg', 'i' => 66.67]],
            'arc' => ['l' => 63, 't' => 51, 'w' => 445, 'h' => 445, 'img' => ['l' => 42.41, 't' => 0, 'w' => 49.28, 'h' => 23.09], 'f' => $r . 'aud/Ellipse1452.svg'],
            'brain' => ['l' => 163, 't' => 150, 'w' => 258, 'h' => 243, 'img' => ['l' => -19.05, 't' => -4.07, 'w' => 123.81, 'h' => 122.76], 'f' => $r . 'aud/img.png'],
            'kin' => ['l' => 418.73, 't' => 240.42, 'bw' => 1.455, 'ba' => 0.42],
            'aud' => ['cx' => -0.5, 't' => 0, 'bw' => 3, 'ba' => 0.6],
            'vis' => ['l' => 26.05, 't' => 239.42, 'bw' => 2, 'ba' => 0.5],
        ],
        'm' => [
            'w' => 393, 'h' => 346,
            'outer' => ['size' => 306, 'dx' => 0, 'dy' => 17, 'f' => $r . 'aud/OrbitalOuter-m.svg'],
            'inner' => ['w' => 230, 'h' => 228, 'dx' => 2, 'dy' => 17, 'f' => $r . 'aud/OrbitalInner.svg'],
            'glows' => [['l' => 145, 't' => 0, 's' => 47, 'c' => '#c5a9e3', 'b' => 6]],
            'dots' => [['dx' => 107.5, 't' => 77, 'f' => $r . 'aud/Ellipse-m.svg', 'i' => 58.33], ['dx' => 150.5, 't' => 169, 'f' => $r . 'aud/Ellipse1-m.svg', 'i' => 66.67], ['dx' => -119.5, 't' => 92, 'f' => $r . 'aud/Ellipse2-m.svg', 'i' => 66.67]],
            'arc' => ['l' => 59, 't' => 36, 'w' => 288, 'h' => 300, 'img' => ['l' => 43.39, 't' => 0, 'w' => 41.23, 'h' => 14.58], 'f' => $r . 'aud/Ellipse1446.svg'],
            'brain' => ['l' => 108, 't' => 88, 'w' => 177, 'h' => 181, 'img' => ['l' => -19.05, 't' => -4.07, 'w' => 123.81, 'h' => 122.76], 'f' => $r . 'aud/img.png'],
            'kin' => ['l' => 288, 't' => 165, 'bw' => 1, 'ba' => 0.42],
            'aud' => ['cx' => 1, 't' => 0, 'bw' => 2, 'ba' => 0.6],
            'vis' => ['l' => 18, 't' => 165, 'bw' => 1, 'ba' => 0.5],
        ],
    ],
];

$kinesthetic = [
    'colors' => [
        'dom_border' => '#f6a5cd', 'dom_bg' => 'linear-gradient(81.4deg, #fff 1%, #fcf1f6 99%)',
        'dom_icon_bg' => '#ffeef7', 'pill_bg' => '#fce6f2', 'pill_text' => '#c13684', 'title_css' => 'color:#c13684', 'pct_css' => 'color:#c13684',
        'sum_border' => '#f6a5cd', 'sum_bg' => 'linear-gradient(154.3deg, #f9f8fe 0%, #fff9fc 50%, #fdf6f9 100%)',
        'sum_glow' => '#f6ebef', 'sum_icon_bg' => '#fce3ef', 'sum_line' => '#c13684', 'sum_bullet_border' => 'rgba(249,212,230,0.8)',
        'check_bg' => ['#fce3ef', '#fce3ef'],
    ],
    'assets' => [
        'star' => $r . 'kin/AntDesignStarFilled.svg', 'zap' => $r . 'kin/OcticonZap24.svg', 'check' => $r . 'kin/QlementineIconsCheckTickSmall16.svg',
        'dom_icons' => [['f' => $r . 'kin/Heart1.svg', 'bg' => '#ffeef7']],
        'watermark' => null,
    ],
    'orbit' => [
        'd' => [
            'w' => 572, 'h' => 503,
            'outer' => ['size' => 445, 'dx' => -0.5, 'dy' => 26, 'f' => $r . 'aud/OrbitalOuter.svg'],
            'inner' => ['w' => 334.758, 'h' => 331.847, 'dx' => 2.91, 'dy' => 26.04, 'f' => $r . 'orbital-inner.svg'],
            'glows' => [['l' => 434, 't' => 187, 's' => 75.684, 'c' => '#f2c3da', 'b' => 8.733]],
            'dots' => [['dx' => 183.37, 't' => 149, 'f' => $r . 'kin/Ellipse.svg', 'i' => 58.33], ['dx' => 83.37, 't' => 482, 'f' => $r . 'kin/Ellipse1.svg', 'i' => 66.67], ['dx' => -181.63, 't' => 140, 'f' => $r . 'kin/Ellipse2.svg', 'i' => 66.67]],
            'arc' => ['l' => 70, 't' => 57, 'w' => 445, 'h' => 445, 'img' => ['l' => 68.1, 't' => 50, 'w' => 31.9, 'h' => 46.28], 'f' => $r . 'kin/Ellipse1453.svg'],
            'brain' => ['l' => 141, 't' => 130, 'w' => 294, 'h' => 294, 'img' => ['l' => 0, 't' => 0, 'w' => 100, 'h' => 100], 'f' => $r . 'kin/Image15.png'],
            'kin' => ['l' => 443, 't' => 194, 'bw' => 3, 'ba' => 0.6],
            'aud' => ['cx' => -0.5, 't' => 0, 'bw' => 2, 'ba' => 0.6],
            'vis' => ['l' => 15, 't' => 229, 'bw' => 2, 'ba' => 0.5],
        ],
        'm' => [
            'w' => 393, 'h' => 346,
            'outer' => ['size' => 306, 'dx' => 0, 'dy' => 17, 'f' => $r . 'kin/OrbitalOuter.svg'],
            'inner' => ['w' => 230, 'h' => 228, 'dx' => 2, 'dy' => 17, 'f' => $r . 'aud/OrbitalInner.svg'],
            'glows' => [],
            'dots' => [['dx' => 107.5, 't' => 77, 'f' => $r . 'kin/Ellipse-m.svg', 'i' => 58.33], ['dx' => -119.5, 't' => 92, 'f' => $r . 'kin/Ellipse1-m.svg', 'i' => 66.67], ['dx' => 75.5, 't' => 319, 'f' => $r . 'kin/Ellipse2-m.svg', 'i' => 66.67]],
            'arc' => ['l' => 46, 't' => 36, 'w' => 306, 'h' => 306, 'img' => ['l' => 73.6, 't' => 50.53, 'w' => 26.4, 'h' => 43.21], 'f' => $r . 'kin/Ellipse1449.svg'],
            'brain' => ['l' => 90, 't' => 83, 'w' => 215, 'h' => 215, 'img' => ['l' => 0, 't' => 0, 'w' => 100, 'h' => 100], 'f' => $r . 'kin/Image15.png'],
            'kin' => ['l' => 285, 't' => 160, 'bw' => 2, 'ba' => 0.42, 'rgb' => '173,23,97'],
            'aud' => ['cx' => 1, 't' => 0, 'bw' => 1, 'ba' => 0.6],
            'vis' => ['l' => 17, 't' => 170, 'bw' => 1, 'ba' => 0.5],
        ],
    ],
];

$dualVisualAuditory = [
    'colors' => [
        'dom_border' => '#bed1e6', 'dom_bg' => 'linear-gradient(81.4deg, #fff 1%, #e9f3ff 50%, #f4eeff 99%)',
        'dom_icon_bg' => '#d9eaff', 'pill_bg' => 'linear-gradient(to right, #d9eaff, #f0e6ff)', 'pill_text' => '#6e3cc2',
        'title_css' => 'background-image:linear-gradient(to bottom,#39689d 26.4%,#6e3cc2 100%);-webkit-background-clip:text;background-clip:text;color:transparent',
        'pct_css' => 'background-image:linear-gradient(to bottom,#39689d 8.65%,#6e3cc2 70.2%);-webkit-background-clip:text;background-clip:text;color:transparent',
        'sum_border' => '#85c1e1', 'sum_bg' => 'linear-gradient(154.3deg, #f9f8fe 0%, #f3f9ff 100%)',
        'sum_glow' => 'linear-gradient(to bottom, #d7e7fe, #eae5fe)', 'sum_icon_bg' => 'linear-gradient(to bottom, #cee7ff, #f0e6ff)', 'sum_line' => '#9370cd', 'sum_bullet_border' => 'rgba(213,195,233,0.8)',
        'check_bg' => ['linear-gradient(to bottom, #d6e7ff, #eae5fe)', 'linear-gradient(to bottom, #d6e7fe, #ede6ff)'],
    ],
    'assets' => [
        'star' => $r . 'aud/AntDesignStarFilled.svg', 'zap' => $r . 'dual/OcticonZap24.svg', 'check' => $r . 'aud/QlementineIconsCheckTickSmall16.svg',
        'dom_icons' => [['f' => $r . 'dual/Group2.svg', 'bg' => '#d9eaff', 'inset' => '21.87% 9.38% 21.88% 9.37%'], ['f' => $r . 'aud/Fa7RegularHeadphones.svg', 'bg' => '#f0e6ff']],
        'watermark' => null,
    ],
    'orbit' => [
        'd' => [
            'w' => 572, 'h' => 503,
            'outer' => ['size' => 445, 'dx' => -0.5, 'dy' => 26, 'f' => $r . 'dual/OrbitalOuter.svg'],
            'inner' => ['w' => 334.758, 'h' => 331.847, 'dx' => 2.91, 'dy' => 26.04, 'f' => $r . 'orbital-inner.svg'],
            'glows' => [['l' => 25, 't' => 229, 's' => 75.684, 'c' => 'rgba(108,145,227,0.6)', 'b' => 8.733], ['l' => 215, 't' => -6, 's' => 75.684, 'c' => '#c5a9e3', 'b' => 8.733]],
            'dots' => [['dx' => -53.63, 't' => 59, 'f' => $r . 'dual/Ellipse.svg', 'i' => 58.33], ['dx' => 219.05, 't' => 245.97, 'f' => $r . 'dual/Ellipse1.svg', 'i' => 66.67], ['dx' => -219.63, 't' => 229, 'f' => $r . 'dual/Ellipse2.svg', 'i' => 66.67]],
            'arc' => ['l' => 59, 't' => 57, 'w' => 445, 'h' => 445, 'img' => ['l' => 1.27, 't' => 1.17, 'w' => 38.58, 'h' => 38.22], 'f' => $r . 'dual/Ellipse1452.svg'],
            'brain' => ['l' => 131, 't' => 168, 'w' => 264, 'h' => 218, 'img' => ['l' => 0, 't' => -4.41, 'w' => 106.22, 'h' => 128.97], 'f' => $r . 'dual/Image23.png'],
            'kin' => ['l' => 418.73, 't' => 240.42, 'bw' => 1.455, 'ba' => 0.42],
            'aud' => ['cx' => 12.5, 't' => 2, 'bw' => 3, 'ba' => 0.6],
            'vis' => ['l' => 26.05, 't' => 239.42, 'bw' => 2, 'ba' => 0.5],
        ],
        'm' => [
            'w' => 393, 'h' => 346,
            'outer' => ['size' => 306, 'dx' => 0, 'dy' => 17, 'f' => $r . 'dual/OrbitalOuter-m.svg'],
            'inner' => ['w' => 230, 'h' => 228, 'dx' => 2, 'dy' => 17, 'f' => $r . 'aud/OrbitalInner.svg'],
            'glows' => [['l' => 19, 't' => 159, 's' => 52, 'c' => 'rgba(108,145,227,0.6)', 'b' => 6], ['l' => 146, 't' => -1, 's' => 47, 'c' => '#c5a9e3', 'b' => 6]],
            'dots' => [['dx' => 150.5, 't' => 169, 'f' => $r . 'dual/Ellipse-m.svg', 'i' => 66.67], ['dx' => -40.5, 't' => 37, 'f' => $r . 'dual/Ellipse1-m.svg', 'i' => 58.33], ['dx' => -150.5, 't' => 157, 'f' => $r . 'kin/Ellipse1-m.svg', 'i' => 66.67]],
            'arc' => ['l' => 42, 't' => 37, 'w' => 285, 'h' => 309, 'img' => ['l' => 0.91, 't' => 1.27, 'w' => 38.47, 'h' => 39.7], 'f' => $r . 'dual/Ellipse1446.svg'],
            'brain' => ['l' => 97, 't' => 112, 'w' => 183, 'h' => 151, 'img' => ['l' => 0, 't' => -4.41, 'w' => 106.22, 'h' => 128.97], 'f' => $r . 'dual/Image23.png'],
            'kin' => ['l' => 288, 't' => 165, 'bw' => 1, 'ba' => 0.42],
            'aud' => ['cx' => 4, 't' => 2, 'bw' => 2, 'ba' => 0.6],
            'vis' => ['l' => 18, 't' => 165, 'bw' => 2, 'ba' => 0.5],
        ],
    ],
];

// الثلاث مستويات الباقية: البصري–الحسي (#3509:8964/#3509:6789)، السمعي–الحسي (#3509:9108/#3509:7239)، المتوازن (#3509:9251/#3509:7387)
$gradBlue = 'linear-gradient(to bottom, #d7e7fe, #eae5fe)';
$gradZap = 'linear-gradient(to bottom, #cee7ff, #f0e6ff)';
$sumBg = 'linear-gradient(154.3deg, #f9f8fe 0%, #f6f9ff 57.69%, #f3e5ec 100%)';
$gradText = fn (string $from, string $fromAt, string $to, string $toAt = '100%') => "background-image:linear-gradient(to bottom,{$from} {$fromAt},{$to} {$toAt});-webkit-background-clip:text;background-clip:text;color:transparent";
$starZapCheck = fn (string $zap) => ['star' => $r . 'aud/AntDesignStarFilled.svg', 'zap' => $r . $zap, 'check' => $r . 'aud/QlementineIconsCheckTickSmall16.svg', 'watermark' => null];
$heartIcon = ['f' => $r . 'kin/Heart1.svg', 'bg' => '#ffeef7', 'w' => 56, 'h' => 50];
$eyeIcon = fn (string $file, int $w) => ['f' => $r . $file, 'bg' => '#d9eaff', 'inset' => '21.87% 9.38% 21.88% 9.37%', 'w' => $w, 'h' => $w === 50 ? 44 : 50];

$dualVisualKinesthetic = [
    'colors' => [
        'dom_border' => '#bed1e6', 'dom_bg' => 'linear-gradient(81.4deg, #fff 1%, #e9f3ff 50%, #f4eeff 99%)',
        'dom_icon_bg' => '#d9eaff', 'pill_bg' => 'linear-gradient(to right, #d9eaff, #f0e6ff)', 'pill_text' => '#6e3cc2',
        'title_css' => $gradText('#39689d', '26.44%', '#c45a94'), 'pct_css' => $gradText('#39689d', '8.65%', '#6e3cc2', '70.19%'),
        'sum_border' => '#e8d8e0', 'sum_bg' => $sumBg, 'sum_glow' => $gradBlue, 'sum_icon_bg' => $gradZap, 'sum_line' => '#9370cd',
        'sum_bullet_border' => 'rgba(213,195,233,0.8)',
        'check_bg' => ['linear-gradient(to bottom, #d6e7ff, #eae5fe)', 'linear-gradient(to bottom, #d6e7fe, #ede6ff)'],
    ],
    'assets' => $starZapCheck('vk/OcticonZap24.svg') + ['dom_icons' => [$eyeIcon('dual/Group2.svg', 50), $heartIcon]],
    'orbit' => [
        'd' => [
            'w' => 572, 'h' => 503,
            'outer' => ['size' => 445, 'dx' => -0.5, 'dy' => 26, 'f' => $r . 'dual/OrbitalOuter.svg'],
            'inner' => ['w' => 334.758, 'h' => 331.847, 'dx' => 2.91, 'dy' => 26.04, 'f' => $r . 'orbital-inner.svg'],
            'glows' => [['l' => 410, 't' => 231, 's' => 75.684, 'c' => '#f2c3da', 'b' => 8.733], ['l' => 25, 't' => 229, 's' => 75.684, 'c' => 'rgba(108,145,227,0.6)', 'b' => 8.733]],
            'dots' => [['dx' => -53.63, 't' => 59, 'f' => $r . 'vk/Ellipse.svg', 'i' => 58.33]],
            'arc' => ['l' => 62, 't' => 59, 'w' => 445, 'h' => 445, 'img' => ['l' => 0.34, 't' => 52.43, 'w' => 99.66, 'h' => 47.57], 'f' => $r . 'vk/Ellipse1452.svg'],
            'brain' => ['l' => 145, 't' => 178, 'w' => 265, 'h' => 195, 'img' => ['l' => 0, 't' => -18.02, 'w' => 101.39, 'h' => 148.84], 'f' => $r . 'vk/Image24.png'],
            'kin' => ['l' => 418.73, 't' => 237.42, 'bw' => 3, 'ba' => 0.6],
            'aud' => ['cx' => 8.5, 't' => 2, 'bw' => 2, 'ba' => 0.6],
            'vis' => ['l' => 24.05, 't' => 234.42, 'bw' => 3, 'ba' => 0.5],
        ],
        'm' => [
            'w' => 393, 'h' => 346,
            'outer' => ['size' => 306, 'dx' => 0, 'dy' => 17, 'f' => $r . 'vk/OrbitalOuter.svg'],
            'inner' => ['w' => 230, 'h' => 228, 'dx' => 2, 'dy' => 17, 'f' => $r . 'aud/OrbitalInner.svg'],
            'glows' => [['l' => 19, 't' => 153, 's' => 52, 'c' => 'rgba(108,145,227,0.6)', 'b' => 6], ['l' => 284, 't' => 155, 's' => 47, 'c' => '#f0a5ce', 'b' => 6]],
            'dots' => [['dx' => 151.5, 't' => 193, 'f' => $r . 'kin/Ellipse2-m.svg', 'i' => 66.67], ['dx' => -78.5, 't' => 55, 'f' => $r . 'vk/Ellipse1.svg', 'i' => 58.33], ['dx' => -21, 't' => 41, 'f' => $r . 'vk/Ellipse2-m.svg', 'i' => 66.67]],
            'arc' => ['l' => 44, 't' => 37, 'w' => 306, 'h' => 306, 'img' => ['l' => 0.35, 't' => 52.53, 'w' => 99.65, 'h' => 47.47], 'f' => $r . 'vk/Ellipse1450.svg'],
            'brain' => ['l' => 101, 't' => 119, 'w' => 188, 'h' => 138, 'img' => ['l' => 0, 't' => -18.02, 'w' => 101.39, 'h' => 148.84], 'f' => $r . 'vk/Image24.png'],
            'kin' => ['l' => 288, 't' => 159, 'bw' => 2, 'ba' => 0.42, 'rgb' => '202,61,130'],
            'aud' => ['cx' => 1, 't' => -1, 'bw' => 1, 'ba' => 0.6],
            'vis' => ['l' => 19, 't' => 159, 'bw' => 2, 'ba' => 0.5],
        ],
    ],
];

$akColors = [
    'dom_border' => '#fffcfd', 'dom_bg' => 'linear-gradient(81.4deg, #fffefe 1%, #fffcfd 50%, #e1dbf4 99%)',
    'dom_icon_bg' => '#f0e6ff', 'pill_bg' => 'linear-gradient(to right, #d9eaff, #f0e6ff)', 'pill_text' => '#6e3cc2',
    'title_css' => $gradText('#7a45cd', '26.44%', '#c45a94'), 'pct_css' => $gradText('#a378ea', '29.81%', '#8c245f', '91.35%'),
    'sum_border' => '#a07bc8', 'sum_bg' => $sumBg, 'sum_glow' => $gradBlue, 'sum_icon_bg' => $gradZap, 'sum_line' => '#ee95c1',
    'sum_bullet_border' => 'rgba(192,161,226,0.8)',
    'check_bg' => ['linear-gradient(to bottom, #d6e7ff, #f7d4fe)', 'linear-gradient(to bottom, #d6e7fe, #f2d7fe)'],
];

$dualAuditoryKinesthetic = [
    'colors' => $akColors,
    'assets' => $starZapCheck('ak/OcticonZap24.svg') + ['dom_icons' => [['f' => $r . 'aud/Fa7RegularHeadphones.svg', 'bg' => '#f0e6ff', 'w' => 56, 'h' => 50], $heartIcon]],
    'orbit' => [
        'd' => [
            'w' => 572, 'h' => 503,
            'outer' => ['size' => 445, 'dx' => -0.5, 'dy' => 26, 'f' => $r . 'ak/OrbitalOuter.svg'],
            'inner' => ['w' => 334.758, 'h' => 331.847, 'dx' => 2.91, 'dy' => 26.04, 'f' => $r . 'orbital-inner.svg'],
            'glows' => [['l' => 205, 't' => -7, 's' => 75.684, 'c' => '#c5a9e3', 'b' => 8.733], ['l' => 410, 't' => 231, 's' => 75.684, 'c' => '#f2c3da', 'b' => 8.733]],
            'dots' => [['dx' => -24.63, 't' => 53, 'f' => $r . 'ak/Ellipse.svg', 'i' => 58.33], ['dx' => -181.63, 't' => 140, 'f' => $r . 'ak/Ellipse2.svg', 'i' => 66.67]],
            'arc' => ['l' => 62, 't' => 53, 'w' => 445, 'h' => 445, 'img' => ['l' => 45.53, 't' => 0, 'w' => 54.22, 'h' => 45.54], 'f' => $r . 'ak/Ellipse1452.svg'],
            'brain' => ['l' => 138, 't' => 145, 'w' => 268, 'h' => 268, 'img' => ['l' => 0, 't' => 0, 'w' => 100, 'h' => 100], 'f' => $r . 'ak/Image21.png'],
            'kin' => ['l' => 418.73, 't' => 237.42, 'bw' => 3, 'ba' => 0.6],
            'aud' => ['cx' => 0.5, 't' => 1, 'bw' => 2, 'ba' => 0.6],
            'vis' => ['l' => 23.05, 't' => 243.42, 'bw' => 3, 'ba' => 0.5],
        ],
        'm' => [
            'w' => 393, 'h' => 346,
            'outer' => ['size' => 306, 'dx' => 0, 'dy' => 17, 'f' => $r . 'ak/OrbitalOuter-m.svg'],
            'inner' => ['w' => 230, 'h' => 228, 'dx' => 2, 'dy' => 17, 'f' => $r . 'aud/OrbitalInner.svg'],
            'glows' => [['l' => 284, 't' => 155, 's' => 47, 'c' => '#f0a5ce', 'b' => 6]],
            'dots' => [['dx' => -17.5, 't' => 37, 'f' => $r . 'ak/Ellipse-m.svg', 'i' => 58.33], ['dx' => -129.5, 't' => 104, 'f' => $r . 'ak/Ellipse1-m.svg', 'i' => 66.67], ['dx' => 150.5, 't' => 171, 'f' => $r . 'ak/Ellipse2-m.svg', 'i' => 66.67]],
            'arc' => ['l' => 44, 't' => 37, 'w' => 306, 'h' => 306, 'img' => ['l' => 44.89, 't' => 0, 'w' => 54.85, 'h' => 45.03], 'f' => $r . 'ak/Ellipse1451.svg'],
            'brain' => ['l' => 95, 't' => 101, 'w' => 186, 'h' => 186, 'img' => ['l' => 0, 't' => 0, 'w' => 100, 'h' => 100], 'f' => $r . 'ak/Image21.png'],
            'kin' => ['l' => 288, 't' => 159, 'bw' => 2, 'ba' => 0.42, 'rgb' => '202,61,130'],
            'aud' => ['cx' => -1, 't' => 0, 'bw' => 1, 'ba' => 0.6],
            'vis' => ['l' => 19, 't' => 159, 'bw' => 2, 'ba' => 0.5],
        ],
    ],
];

$balanced = [
    'colors' => ['pill_bg' => 'linear-gradient(to right, #f8ecf7, #c5c3e7)', 'title_css' => $gradText('#7a45cd', '26.44%', '#c45a94', '89.42%')] + $akColors,
    'assets' => $starZapCheck('bal/OcticonZap24.svg') + ['dom_icons' => [$eyeIcon('bal/Group2.svg', 56), ['f' => $r . 'aud/Fa7RegularHeadphones.svg', 'bg' => '#f0e6ff', 'w' => 56, 'h' => 50], ['f' => $r . 'kin/Heart1.svg', 'bg' => '#ffeef7', 'w' => 51, 'h' => 50]]],
    'orbit' => [
        'd' => [
            'w' => 572, 'h' => 503,
            'outer' => ['size' => 445, 'dx' => -0.5, 'dy' => 26, 'f' => $r . 'bal/OrbitalOuter.svg'],
            'inner' => ['w' => 334.758, 'h' => 331.847, 'dx' => 2.91, 'dy' => 26.04, 'f' => $r . 'orbital-inner.svg'],
            'glows' => [['l' => 205, 't' => -7, 's' => 75.684, 'c' => '#c5a9e3', 'b' => 8.733], ['l' => 410, 't' => 231, 's' => 75.684, 'c' => '#f2c3da', 'b' => 8.733], ['l' => 24, 't' => 231, 's' => 75.684, 'c' => 'rgba(108,145,227,0.6)', 'b' => 8.733]],
            'dots' => [['dx' => -24.63, 't' => 53, 'f' => $r . 'bal/Ellipse.svg', 'i' => 58.33], ['dx' => -220.63, 't' => 236, 'f' => $r . 'bal/Ellipse2.svg', 'i' => 66.67]],
            'arc' => ['l' => 61, 't' => 55, 'w' => 445, 'h' => 445, 'img' => ['l' => 0, 't' => 0, 'w' => 100, 'h' => 100], 'f' => $r . 'bal/Ellipse1452.svg'],
            'brain' => ['l' => 143, 't' => 149, 'w' => 258, 'h' => 255, 'img' => ['l' => 0, 't' => 0, 'w' => 104.49, 'h' => 105.68], 'f' => $r . 'bal/Image22.png'],
            'kin' => ['l' => 418.73, 't' => 237.42, 'bw' => 3, 'ba' => 0.6],
            'aud' => ['cx' => 0.5, 't' => 1, 'bw' => 2, 'ba' => 0.6],
            'vis' => ['l' => 23.05, 't' => 243.42, 'bw' => 3, 'ba' => 0.5],
        ],
        'm' => [
            'w' => 393, 'h' => 346,
            'outer' => ['size' => 306, 'dx' => 0, 'dy' => 17, 'f' => $r . 'bal/OrbitalOuter-m.svg'],
            'inner' => ['w' => 230, 'h' => 228, 'dx' => 2, 'dy' => 17, 'f' => $r . 'aud/OrbitalInner.svg'],
            'glows' => [['l' => 284, 't' => 155, 's' => 47, 'c' => '#f0a5ce', 'b' => 6], ['l' => 152, 't' => -3, 's' => 47, 'c' => '#c5a9e3', 'b' => 6], ['l' => 22, 't' => 150, 's' => 52, 'c' => 'rgba(108,145,227,0.6)', 'b' => 6]],
            'dots' => [['dx' => -146.5, 't' => 150, 'f' => $r . 'bal/Ellipse-m.svg', 'i' => 66.67], ['dx' => 150.5, 't' => 171, 'f' => $r . 'bal/Ellipse1-m.svg', 'i' => 66.67], ['dx' => -17.5, 't' => 37, 'f' => $r . 'bal/Ellipse2-m.svg', 'i' => 58.33]],
            'arc' => ['l' => 44, 't' => 37, 'w' => 306, 'h' => 306, 'img' => ['l' => 0, 't' => 0, 'w' => 100, 'h' => 100], 'f' => $r . 'bal/Ellipse1451.svg'],
            'brain' => ['l' => 113, 't' => 109, 'w' => 168, 'h' => 166, 'img' => ['l' => 0, 't' => 0, 'w' => 104.49, 'h' => 105.68], 'f' => $r . 'bal/Image22.png'],
            'kin' => ['l' => 288, 't' => 159, 'bw' => 2, 'ba' => 0.42, 'rgb' => '202,61,130'],
            'aud' => ['cx' => 10, 't' => 0, 'bw' => 1, 'ba' => 0.6],
            'vis' => ['l' => 21, 't' => 156, 'bw' => 2, 'ba' => 0.5],
        ],
    ],
];

return [
    'visual' => $visual,
    'auditory' => $auditory,
    'kinesthetic' => $kinesthetic,
    'dual_visual_auditory' => $dualVisualAuditory,
    'balanced' => $balanced,
    'dual_visual_kinesthetic' => $dualVisualKinesthetic,
    'dual_auditory_kinesthetic' => $dualAuditoryKinesthetic,
];
