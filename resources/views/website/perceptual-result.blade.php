@php
  // وضع الـPDF (?pdf=1): نفس الصفحة بعرض 1440px كصفحة واحدة طويلة من غير أزرار، والنصوص مفتوحة كاملة
  $pdf = $pdf ?? false;
  $img = '/assets/website/images/perceptual-report';
  $res = $img . '/result';
  $top = $styles->first();
  // نسبة النمط الغالب (90%) زي كارت النمط في فيجما
  $percent = ($top && $top['max']) ? (int) round($top['score'] / $top['max'] * 100) : 0;

  // الكروت الأربعة (Figma #3509:8645 desktop / #3509:6619 mobile): الألوان من التصميم
  $cards = [
    [
      'key' => 'strengths', 'expandable' => true, 'bg' => '#f4fef9', 'edge' => '#10b981', 'ring' => '#a0d8b4', 'ring_m' => '#a0d8b4',
      'badge' => cms('perceptual_result.sections.strengths_badge', 'ميزات رئيسية'), 'badge_bg' => 'rgba(209,250,229,0.7)', 'badge_border' => 'rgba(167,243,208,0.8)', 'color' => '#047857',
      'title' => cms('perceptual_result.sections.strengths_card_title', 'نقاط قوتك'), 'icon_bg' => 'rgba(209,250,229,0.9)', 'icon_border' => 'rgba(167,243,208,0.6)',
      'icon' => 'sparkles-outline.svg', 'btn_bg' => '#f9fffb', 'btn_border' => 'rgba(167,243,208,0.8)', 'chevron' => 'chevron-green.svg', 'text' => $report['strengths_text'],
    ],
    [
      'key' => 'growth', 'expandable' => true, 'bg' => '#fffdf3', 'edge' => '#f59e0b', 'ring' => '#edd0c1', 'ring_m' => '#f3dbc9',
      'badge' => cms('perceptual_result.sections.development_badge', 'فرص نمو'), 'badge_bg' => '#fef5d0', 'badge_border' => 'rgba(234,220,163,0.8)', 'color' => '#92400e',
      'title' => cms('perceptual_result.sections.development_title', 'جوانب يمكنك تطويرها'), 'icon_bg' => '#faf0c7', 'icon_border' => 'rgba(234,220,163,0.6)',
      'icon' => 'bulb.svg', 'btn_bg' => '#fffffe', 'btn_border' => 'rgba(234,220,163,0.8)', 'chevron' => 'chevron-amber.svg', 'text' => $report['development_text'],
    ],
    [
      'key' => 'strategies', 'expandable' => true, 'bg' => '#f6fbff', 'edge' => '#0ea5e9', 'ring' => '#9ecbe0', 'ring_m' => '#9ecbe0',
      'badge' => cms('perceptual_result.sections.strategies_badge', 'استراتيجيات'), 'badge_bg' => '#e2f3fe', 'badge_border' => 'rgba(191,228,247,0.8)', 'color' => '#1f7ca5',
      'title' => $report['strategies_title'], 'icon_bg' => '#e2f3fe', 'icon_border' => 'rgba(191,228,247,0.6)',
      'icon' => 'eye-sparkles.svg', 'btn_bg' => '#f9fcff', 'btn_border' => 'rgba(191,228,247,0.8)', 'chevron' => 'chevron-sky.svg', 'text' => $report['strategies_text'],
    ],
    [
      'key' => 'remember', 'expandable' => false, 'bg' => '#f8f8ff', 'edge' => '#727dee', 'ring' => '#e9d9f9', 'ring_m' => '#e9d9f9',
      'title' => cms('perceptual_result.sections.remember_title', 'تذكّر'), 'icon_bg' => '#e9ebfa', 'icon_border' => '#d1d4f3',
      'icon' => 'bell.svg', 'text' => $report['remember_text'],
    ],
  ];

  $infoItems = [
    ['icon' => 'user-check.svg', 'label' => cms('perceptual_result.info.beneficiary', 'المستفيد'), 'mlabel' => cms('perceptual_result.info.beneficiary_mobile', 'المستخدم'), 'value' => $beneficiary, 'w' => 'lg:w-[119px]', 'mw' => 'flex-1 min-w-[113px]', 'wrap' => true],
    ['icon' => 'date.svg', 'label' => cms('perceptual_result.info.date', 'تاريخ التنفيذ'), 'mlabel' => cms('perceptual_result.info.date', 'تاريخ التنفيذ'), 'value' => now()->format('d M Y'), 'w' => 'lg:w-[130px]', 'mw' => 'w-[99px]'],
    ['icon' => 'report.svg', 'label' => cms('perceptual_result.info.report_code', 'رقم التقرير المعتمد'), 'mlabel' => cms('perceptual_result.info.report_code', 'رقم التقرير المعتمد'), 'value' => $reportCode, 'w' => 'lg:w-[241px]', 'mw' => 'w-[122px]'],
  ];
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('perceptual_result.header.seo_title', 'تقرير نتائج مقياس الأنماط الإدراكية | دار الرؤى للتدريب') }}</title>
  <meta name="robots" content="noindex" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  @unless ($pdf)
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/style.css']) }}
  @endunless
  <style>
    @media print {
      .pr-no-print { display: none !important; }
      body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
      .pr-clamp { -webkit-line-clamp: unset !important; display: block !important; }
    }
  </style>
  @if ($pdf)
    @include('website.partials.pdf-head')
  @endif
</head>
<!-- Figma: Desktop #3509:8526 (+ عرض المزيد #3509:8442 / #3509:8403 / #3509:8481) / Mobile #3509:6488 -->
<body class="pt-0 bg-white lg:bg-[#f6f6f6] text-[#262626] min-h-screen font-messiri antialiased {{ $pdf ? 'pdf-mode' : '' }}">
@if ($pdf)
  @include('website.partials.pdf-bar', ['back' => request()->fullUrlWithoutQuery(['pdf', 'print']), 'backLabel' => 'رجوع للنتيجة'])
@endif

<main id="pdf-root" class="w-full max-w-[393px] sm:max-w-[720px] lg:max-w-[1440px] mx-auto px-4 lg:px-[100px] pb-[48px] lg:pb-[112px] flex flex-col items-center gap-6 lg:gap-16">

  <!-- Logo -->
  <a href="/" class="bg-[#204a7a] w-[77px] h-[79px] lg:w-[156px] lg:h-[138px] flex items-center justify-center shrink-0 px-[14px] py-[29px] lg:p-[14px]" aria-label="دار الرؤى للتدريب - الرئيسية">
    <img src="{{ cms_image('perceptual_result.header.logo', $img . '/logo.png') }}" alt="دار الرؤى للتدريب" class="w-[50px] h-[51px] lg:w-[95px] lg:h-[96px] object-contain object-bottom" />
  </a>

  <div class="w-full flex flex-col items-center gap-12 lg:gap-[98px]">
    <div class="w-full flex flex-col items-center gap-12 lg:gap-16">

      <!-- Heading (Figma #3509:8532 / #3509:6494) -->
      <header class="w-full flex flex-col items-center gap-2 lg:gap-5 text-center lg:max-w-[602px]">
        <div class="flex items-center justify-center gap-[2px] lg:gap-[10px] pr-2 lg:pr-0 w-full">
          <img src="{{ $img }}/check-shield.svg" alt="" width="32" height="35" class="w-[23px] h-[25px] lg:w-[32px] lg:h-[35px] shrink-0" />
          <h1 class="font-bold lg:font-semibold text-[18px] lg:text-[36px] leading-normal lg:leading-[1.5] text-[#204a7a] whitespace-nowrap">{{ cms('perceptual_result.header.title', 'تقرير نتائج مقياس الأنماط الإدراكية') }}</h1>
        </div>
        <p class="font-medium text-[14px] lg:text-[25px] leading-normal text-[#262626] max-w-[311px] lg:max-w-[602px]">{{ cms('perceptual_result.header.subtitle', 'اكتشف النمط الإدراكي، الغالب لديك (بصري، سمعي، أو حسي) لتحسين أساليب التعلم والتواصل.') }}</p>
      </header>

      <!-- Report info (Figma #3509:8539 / #3509:6503) -->
      <section class="w-full max-w-[361px] lg:max-w-none bg-white rounded-[16px] lg:rounded-[20px] drop-shadow-[0px_1px_4.55px_rgba(0,0,0,0.04)] flex flex-wrap lg:flex-nowrap items-start justify-center lg:justify-between gap-[10px] lg:px-12 lg:py-8">
        @foreach ($infoItems as $item)
          <div class="flex flex-col items-center gap-2 lg:gap-4 p-[10px] lg:p-0 min-h-[117px] lg:min-h-0 {{ $item['mw'] }} lg:w-auto {{ $item['w'] }}">
            <div class="bg-[#fff0e4] rounded-[8px] lg:rounded-[11px] size-[32px] lg:size-[60px] flex items-center justify-center shrink-0">
              <img src="{{ $img }}/{{ $item['icon'] }}" alt="" class="size-[19px] lg:size-[32px] object-contain" />
            </div>
            <p class="font-medium text-[11px] lg:text-[18px] leading-[16.5px] text-[#565656] whitespace-nowrap lg:min-h-[25px]"><span class="lg:hidden">{{ $item['mlabel'] }}</span><span class="hidden lg:inline">{{ $item['label'] }}</span></p>
            <p class="font-semibold text-[14px] lg:text-[25px] leading-[20px] text-[#1e293b] text-center max-w-full {{ ($item['wrap'] ?? false) ? 'max-lg:whitespace-normal max-lg:break-words' : '' }} whitespace-nowrap lg:min-h-[29px] lg:flex lg:items-center" dir="auto">{{ $item['value'] }}</p>
          </div>
        @endforeach
      </section>

      <!-- Chart + highlights + insight (Figma Desktop #3644:7944 / Mobile #3644:7795) -->
      @php
        $pctOf = fn ($code) => ($row = $styles->firstWhere('key', $code)) && $row['max'] ? (int) round($row['score'] / $row['max'] * 100) : 0;
        $percents = ['vis' => $pctOf('visual'), 'aud' => $pctOf('auditory'), 'kin' => $pctOf('kinesthetic')];
        // ألوان كارت «النمط الأكثر حضورًا» حسب النمط الأعلى في نتيجة المستخدم
        $palettes = [
          'visual' => ['short' => 'vis', 'name' => cms('perceptual_result.highlights.visual_name', 'النمط البصري'), 'icon' => $res . '/eye.svg', 'border' => '#3664e1', 'label' => '#224fcb', 'pct' => '#1e5af9', 'icon_bg' => '#ddebfe', 'from' => '#fcfdfe', 'via' => '#f1f6fe', 'to' => '#ecf1ff'],
          'auditory' => ['short' => 'aud', 'name' => cms('perceptual_result.highlights.auditory_name', 'النمط السمعي'), 'icon' => $res . '/headphones.svg', 'border' => '#7c3aed', 'label' => '#6d2fd1', 'pct' => '#7c3aed', 'icon_bg' => '#f0e6ff', 'from' => '#fdfcff', 'via' => '#f7f3ff', 'to' => '#f1eaff'],
          'kinesthetic' => ['short' => 'kin', 'name' => cms('perceptual_result.highlights.kinesthetic_name', 'النمط الحسي'), 'icon' => $res . '/heart.svg', 'border' => '#ec4899', 'label' => '#c2347e', 'pct' => '#db2777', 'icon_bg' => '#fdf2f8', 'from' => '#fffcfe', 'via' => '#fff5fa', 'to' => '#fdecf4'],
        ];
        $pal = $palettes[$top['key'] ?? 'visual'] ?? $palettes['visual'];
        // ماذا تعني هذه النتيجة؟ = «ملخص نتيجتك» المخزن للمستوى في قاعدة البيانات
        $insightText = trim((string) ($report['summary_text'] ?: $report['summary']));
      @endphp
      <div class="w-full flex flex-col lg:flex-row lg:items-start gap-6 lg:gap-[27px]">

        <!-- توزيع الأنماط الإدراكية الثلاثة -->
        <section class="relative bg-white overflow-clip border border-[#d6e6f8] lg:border-0 rounded-[20px] lg:rounded-[30px] shadow-[0px_0.8px_0px_rgba(91,89,89,0.25)] lg:shadow-[0px_5px_11.8px_rgba(0,0,0,0.03)] w-full max-w-[361px] lg:max-w-none lg:w-[630px] h-[455px] lg:h-[699px] shrink-0 self-center lg:self-auto" aria-labelledby="pr-chart">
          <div class="absolute left-1/2 -translate-x-1/2 top-[19px] lg:top-[24px] w-[320px] lg:w-[582px] max-w-[calc(100%-24px)] h-[33px] lg:h-[48px] flex items-center justify-between border-b border-[#f1f5f9] pb-[13px]">
            <h2 id="pr-chart" class="flex items-center gap-[6px] lg:gap-[8px] font-semibold lg:font-bold text-[14px] lg:text-[21px] leading-[1.5] lg:leading-[normal] text-[#262626]">
              <img src="{{ $res }}/file-chart.svg" alt="" class="size-[16px] lg:size-[24px]" />
              <span class="lg:hidden">{{ cms('perceptual_result.chart.title_mobile', 'توزيع أنماطك الإدراكية الثلاثة') }}</span>
              <span class="hidden lg:inline">{{ cms('perceptual_result.chart.title', 'توزيع الأنماط الإدراكية الثلاثة') }}</span>
            </h2>
            <span class="rounded-full bg-[#f1f5f9] px-[12px] py-[4px] font-medium text-[12px] lg:text-[14px] leading-[1.5] lg:leading-[normal] text-[#565656] whitespace-nowrap">{{ cms('perceptual_result.chart.badge', '3 أنماط إدراك') }}</span>
          </div>

          <div class="absolute top-[82px] left-[8px] right-[4.3px] lg:top-[101px] lg:left-[29px] lg:right-[29px]">
            @include('website.partials.perceptual-orbit', ['theme' => $report['theme'], 'percents' => $percents])
          </div>

          <p class="absolute left-0 right-0 text-center font-normal text-[11px] lg:text-[20px] leading-[normal] text-[#565656] top-[425.5px] -translate-y-1/2 lg:top-auto lg:translate-y-0 lg:bottom-[30px]">{{ cms('perceptual_result.chart.note', 'تكامل أنماطك يرسم بصمتك الخاصة في الفهم والتعلّم.') }}</p>
        </section>

        <div class="flex flex-col gap-6 lg:gap-[57px] w-full max-w-[361px] lg:max-w-none lg:w-[581px] lg:shrink-0 lg:min-h-[699px] self-center lg:self-auto">

          <!-- أبرز أنماط إدراكك -->
          <section class="bg-white border border-[#e2e8f0] rounded-[16px] shadow-[0px_2px_8px_-2px_rgba(15,23,42,0.04)] lg:shadow-none p-[17px] lg:p-[30px] min-h-[198px] lg:min-h-[336px] flex flex-col gap-[30px] lg:gap-[39px]" aria-labelledby="pr-highlight">
            <div class="flex items-center gap-[5px] lg:gap-[16px]">
              <span class="flex size-[28px] lg:size-[32px] shrink-0 items-center justify-center rounded-[8px] lg:rounded-[7.429px] bg-[#eff6ff]"><img src="{{ $res }}/brain-outline.svg" alt="" class="size-[18px] lg:size-[24px]" /></span>
              <h2 id="pr-highlight" class="font-semibold lg:font-bold text-[17px] lg:text-[21px] leading-[1.5] lg:leading-[normal] text-[#262626]">{{ cms('perceptual_result.highlights.title', 'أبرز أنماط إدراكك') }}</h2>
            </div>

            @php
              // الأنماط اللي بتظهر في الكارت: النمط الغالب لوحده، أو النمطين في المستويات المزدوجة، أو الثلاثة في المتوازن (مرتّبين بنسبتهم)
              $shown = $styles->filter(fn ($row) => in_array($row['key'], $report['active_styles'], true))->values();
              if ($shown->isEmpty()) { $shown = $styles->take(1)->values(); }
              $count = $shown->count();
              $isBalanced = $count > 2;
              $rankLabels = [
                cms('perceptual_result.highlights.top_label', 'النمط الأكثر حضوراً لديك'),
                cms('perceptual_result.highlights.second_label', 'النمط الثاني حضوراً لديك'),
                cms('perceptual_result.highlights.third_label', 'النمط الثالث حضوراً لديك'),
              ];
              $balancedLabel = cms('perceptual_result.highlights.balanced_label', 'حضور متوازن');
            @endphp

            {{-- الموبايل (وكل الأحجام لو نمط واحد): كارت لكل نمط تحت بعض بنفس تصميم فيجما --}}
            <div class="flex flex-col gap-3 lg:gap-4 {{ $count > 1 ? 'lg:hidden' : '' }}">
              @foreach ($shown as $i => $row)
                @php $pl = $palettes[$row['key']] ?? $palettes['visual']; $label = $isBalanced ? $balancedLabel : ($rankLabels[$i] ?? $rankLabels[0]); @endphp
                <div class="rounded-[12px] border border-r-[5px] lg:border-r-[8px] h-[101px] lg:h-[172px] px-[12px] py-[14px] lg:px-[14px] lg:py-[11px] flex flex-col justify-center" style="border-color:{{ $pl['border'] }};background-image:linear-gradient(to right, {{ $pl['from'] }}, {{ $pl['via'] }} 37.572%, {{ $pl['to'] }})">
                  <div class="flex flex-col gap-[5px] lg:gap-[21px] w-full">
                    <div class="flex items-start justify-between w-full">
                      <div class="flex flex-col items-start gap-[11px] lg:gap-[35px]">
                        <span class="font-semibold text-[12px] lg:text-[21px] leading-[1.5] whitespace-nowrap" style="color:{{ $pl['label'] }}">{{ $label }}</span>
                        <span class="font-bold lg:font-semibold text-[14px] lg:text-[25px] leading-[normal] lg:leading-[1.5] text-[#262626] whitespace-nowrap lg:h-[26px] lg:flex lg:items-center">{{ $pl['name'] }}</span>
                      </div>
                      <span class="flex h-[30px] w-[32px] lg:size-[36px] shrink-0 items-center justify-center rounded-[12px] lg:rounded-[7.429px]" style="background:{{ $pl['icon_bg'] }}"><img src="{{ $pl['icon'] }}" alt="" class="size-[20px] lg:size-[24px]" /></span>
                    </div>
                    <span class="flex items-center justify-start h-[24px] font-bold lg:font-semibold text-[21px] lg:text-[30px] leading-[normal] lg:leading-[1.5]" dir="ltr" style="color:{{ $pl['pct'] }}">{{ $percents[$pl['short']] }}%</span>
                  </div>
                </div>
              @endforeach
            </div>

            {{-- الديسكتوب لو أكتر من نمط: الكروت جنب بعض بنفس الارتفاع (172) فالكارت الخارجي ما يطولش --}}
            @if ($count > 1)
              <div class="hidden lg:flex gap-[16px]">
                @foreach ($shown as $i => $row)
                  @php $pl = $palettes[$row['key']] ?? $palettes['visual']; $label = $isBalanced ? $balancedLabel : ($rankLabels[$i] ?? $rankLabels[0]); @endphp
                  <div class="min-w-0 flex-1 rounded-[12px] border border-r-[8px] h-[172px] {{ $isBalanced ? 'px-[10px] py-[12px]' : 'px-[14px] py-[12px]' }} flex flex-col justify-between" style="border-color:{{ $pl['border'] }};background-image:linear-gradient(to right, {{ $pl['from'] }}, {{ $pl['via'] }} 37.572%, {{ $pl['to'] }})">
                    <div class="flex flex-col gap-[10px] items-start">
                      <span class="flex size-[36px] shrink-0 items-center justify-center rounded-[7.429px]" style="background:{{ $pl['icon_bg'] }}"><img src="{{ $pl['icon'] }}" alt="" class="size-[24px]" /></span>
                      <div class="flex flex-col items-start gap-[2px]">
                        <span class="font-semibold leading-[1.5] whitespace-nowrap {{ $isBalanced ? 'text-[13px]' : 'text-[16px]' }}" style="color:{{ $pl['label'] }}">{{ $label }}</span>
                        <span class="font-semibold leading-[1.5] text-[#262626] whitespace-nowrap {{ $isBalanced ? 'text-[19px]' : 'text-[22px]' }}">{{ $pl['name'] }}</span>
                      </div>
                    </div>
                    <span class="flex items-center justify-start h-[32px] font-semibold text-[28px] leading-[1.5]" dir="ltr" style="color:{{ $pl['pct'] }}">{{ $percents[$pl['short']] }}%</span>
                  </div>
                @endforeach
              </div>
            @endif
          </section>

          <!-- ماذا تعني هذه النتيجة؟ -->
          <section class="rounded-[16px] lg:rounded-[20px] border border-[#a3c0e2] px-[15px] py-[19px] lg:px-[18px] lg:pt-[40px] lg:pb-[30px] lg:min-h-[306px] lg:flex-1 flex items-start gap-[8px] lg:gap-[12px]" style="background-image:linear-gradient(79deg, #fff 1%, #d2dfef 99%)" aria-labelledby="pr-insight">
            <span class="flex size-[41px] lg:size-[56px] shrink-0 items-center justify-center rounded-[12px] bg-[#204a7a]"><img src="{{ $res }}/lightbulb-on.svg" alt="" class="size-[22px] lg:size-[32px]" /></span>
            <div class="flex min-w-0 flex-1 flex-col gap-[10px] lg:gap-[40px]">
              <div class="flex items-center justify-between w-full">
                <h2 id="pr-insight" class="font-bold text-[14px] lg:text-[25px] leading-[normal] text-[#172554] whitespace-nowrap">{{ cms('perceptual_result.insight.title', 'ماذا تعني هذه النتيجة؟') }}</h2>
                <span class="flex items-center gap-[4px] rounded-full bg-white lg:bg-[#e9edf2] px-[12px] py-[4px] font-medium lg:font-semibold text-[10px] lg:text-[14px] leading-[16px] text-[#204a7a] h-[22px] lg:h-[33px] shrink-0">
                  <span>{{ cms('perceptual_result.insight.badge', 'تحليل ذكي') }}</span>
                  <img src="{{ $res }}/sparkle-ai.svg" alt="" class="size-[11px] lg:size-[13px]" />
                </span>
              </div>
              <p class="w-full font-medium text-[11px] lg:text-[20px] leading-[17.88px] lg:leading-[1.5] text-[#565656] text-right">{{ $insightText }}</p>
            </div>
          </section>
        </div>
      </div>

      <!-- Four cards (Figma #3509:8645 / #3509:6619) -->
      <div class="w-full max-w-[361px] lg:max-w-none flex flex-col lg:grid lg:grid-cols-2 gap-6 lg:gap-x-[46px] lg:gap-y-16 items-start lg:items-stretch -mt-6 lg:mt-0">
        @foreach ($cards as $card)
          <article class="relative border-r-[3px] lg:border-r-[5px] rounded-[17px] lg:rounded-[30px] w-full flex flex-col" style="background:{{ $card['bg'] }};border-right-color:{{ $card['edge'] }}" @if ($card['expandable']) data-expandable @endif>
            <div class="rounded-[17px] lg:rounded-[30px] border lg:border-2 pt-[15px] pb-[17px] pr-[17px] pl-6 lg:pt-[25px] lg:pb-[26px] lg:pr-[30px] lg:pl-[40px] min-h-[174px] lg:min-h-[289px] flex-1 flex flex-col justify-between" style="border-color:{{ $card['ring'] }}">
              <div class="flex-1 flex flex-col justify-between gap-[18px] lg:gap-[24px]">
                <div class="flex flex-col gap-4 lg:gap-6">
                  <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-[10px] lg:gap-[18px] min-w-0">
                      <div class="rounded-[12px] lg:rounded-[20px] border lg:border-[1.658px] size-[32px] lg:size-[54px] flex items-center justify-center shrink-0 p-px lg:p-[1.658px]" style="background:{{ $card['icon_bg'] }};border-color:{{ $card['icon_border'] }}">
                        @if ($card['key'] === 'strategies')
                          <span class="relative block size-[18px] lg:size-[30px] overflow-hidden"><span class="absolute inset-[8.33%_4.17%_12.5%_8.33%]"><img src="{{ $res }}/{{ $card['icon'] }}" alt="" class="absolute block max-w-none left-[-3.81%] top-0 w-[103.81%] h-[104.21%]" /></span></span>
                        @else
                          <img src="{{ $res }}/{{ $card['icon'] }}" alt="" class="size-[18px] lg:size-[30px]" />
                        @endif
                      </div>
                      <h3 class="font-semibold text-[17px] lg:text-[28.191px] leading-[1.3] lg:leading-[1.5] text-[#262626] min-w-0">{{ $card['title'] }}</h3>
                    </div>
                    @if ($card['expandable'])
                      <span class="shrink-0 rounded-full lg:rounded-[20px] border lg:border-[1.658px] px-[11px] py-[3px] lg:w-[145px] lg:h-[42px] lg:py-[5.658px] flex items-center justify-center font-bold text-[10px] lg:text-[20px] leading-normal whitespace-nowrap" style="background:{{ $card['badge_bg'] }};border-color:{{ $card['badge_border'] }};color:{{ $card['color'] }}">{{ $card['badge'] }}</span>
                    @endif
                  </div>
                  <p class="font-semibold text-[12px] lg:text-[20px] leading-[1.5] text-[#565656] text-right @if ($card['expandable']) pr-clamp line-clamp-2 @endif" @if ($card['expandable']) data-card-text @endif>{{ $card['text'] }}</p>
                </div>
                @if ($card['expandable'])
                  <button type="button" data-toggle aria-expanded="false" class="pr-no-print self-start lg:w-[161px] lg:h-[50px] rounded-full lg:rounded-[30px] border lg:border-[1.658px] px-[13px] py-[5px] lg:px-[21.658px] lg:py-[9.658px] flex items-center justify-center gap-[6px] lg:gap-[10px] cursor-pointer font-bold text-[12px] lg:text-[19.899px] leading-normal whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2" style="background:{{ $card['btn_bg'] }};border-color:{{ $card['btn_border'] }};color:{{ $card['color'] }};--tw-ring-color:{{ $card['color'] }}">
                    <span data-label-more>{{ cms('perceptual_result.sections.show_more', 'عرض المزيد') }}</span>
                    <span data-label-less class="hidden">{{ cms('perceptual_result.sections.show_less', 'عرض أقل') }}</span>
                    <img src="{{ $res }}/{{ $card['chevron'] }}" alt="" data-chevron class="w-[14px] h-[14px] lg:h-[23px] transition-transform duration-200" />
                  </button>
                @endif
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </div>

    <!-- Actions (Figma #3509:8665 / #3509:6635) -->
    <div class="pr-no-print w-full max-w-[346px] lg:max-w-none flex items-center justify-between lg:justify-center gap-3 lg:gap-[75px]">
      <a href="{{ request()->fullUrlWithQuery(['pdf' => 1, 'print' => 1]) }}" target="_blank" rel="noopener" class="w-[165px] lg:w-[290px] h-[45px] lg:h-[60px] rounded-[10px] lg:rounded-[15px] bg-[#204a7a] text-[#e9edf2] font-semibold text-[14px] lg:text-[21px] leading-[1.5] flex items-center justify-center gap-2 hover:bg-[#102744] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2 cursor-pointer">
        <img src="{{ $img }}/download.svg" alt="" class="w-[18px] h-[16px] lg:w-[22px] lg:h-[20px]" />
        <span>{{ cms('perceptual_result.sections.download_button', 'تحميل التقرير') }}</span>
      </a>
      <a href="/" class="w-[165px] lg:w-[290px] h-[45px] lg:h-[60px] rounded-[10px] lg:rounded-[15px] border border-[#204a7a] text-[#204a7a] font-semibold text-[14px] lg:text-[21px] leading-[1.5] flex items-center justify-center gap-2 hover:bg-[#e9edf2] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
        <img src="{{ $img }}/home.svg" alt="" class="size-[18px] lg:size-[24px]" />
        <span>{{ cms('perceptual_result.sections.home_button', 'العودة إلى الرئيسية') }}</span>
      </a>
    </div>
  </div>
</main>

<script>
  // عرض المزيد / عرض أقل: بيفتح النص كامل وبيقلب السهم
  document.querySelectorAll('[data-expandable]').forEach((card) => {
    const button = card.querySelector('[data-toggle]');
    const text = card.querySelector('[data-card-text]');
    if (!button || !text) return;
    button.addEventListener('click', () => {
      const open = button.getAttribute('aria-expanded') !== 'true';

      // المربع اللي جنبه في نفس الصف يفضل بطوله اللي كان عليه، والمربع المفتوح بس هو اللي يكبر (لازم يتقاس قبل ما النص يتفتح)
      const mates = [...document.querySelectorAll('article')].filter((other) => other !== card && Math.abs(other.offsetTop - card.offsetTop) < 4);
      if (open) {
        card.style.height = '';
        card.style.alignSelf = '';
        mates.forEach((mate) => { mate.style.height = `${mate.offsetHeight}px`; mate.style.alignSelf = 'start'; });
      } else {
        mates.forEach((mate) => { mate.style.height = ''; mate.style.alignSelf = ''; });
      }

      button.setAttribute('aria-expanded', String(open));
      text.classList.toggle('line-clamp-2', !open);
      button.querySelector('[data-label-more]').classList.toggle('hidden', open);
      button.querySelector('[data-label-less]').classList.toggle('hidden', !open);
      button.querySelector('[data-chevron]').classList.toggle('rotate-180', open);
    });
  });
</script>
@if ($pdf)
  @include('website.partials.pdf-body')
@endif
</body>
</html>
