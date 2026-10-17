@php
  // وضع الـPDF (?pdf=1): نفس الصفحة بعرض 1440px كصفحة واحدة طويلة من غير أزرار، والنصوص مفتوحة كاملة
  $pdf = $pdf ?? false;
  $img = '/landing/images/perceptual-report';
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
    ['icon' => 'user-check.svg', 'label' => cms('perceptual_result.info.beneficiary', 'المستفيد'), 'mlabel' => cms('perceptual_result.info.beneficiary_mobile', 'المستخدم'), 'value' => $beneficiary, 'w' => 'lg:w-[119px]', 'mw' => 'w-[113px]'],
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
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  @unless ($pdf)
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css']) }}
  @endunless
  <style>
    @media print {
      .pr-no-print { display: none !important; }
      body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
      .pr-clamp { -webkit-line-clamp: unset !important; display: block !important; }
    }
  </style>
  @if ($pdf)
    @include('landing.partials.pdf-head')
  @endif
</head>
<!-- Figma: Desktop #3509:8526 (+ عرض المزيد #3509:8442 / #3509:8403 / #3509:8481) / Mobile #3509:6488 -->
<body class="pt-0 bg-white lg:bg-[#f6f6f6] text-[#262626] min-h-screen font-messiri antialiased {{ $pdf ? 'pdf-mode' : '' }}">
@if ($pdf)
  @include('landing.partials.pdf-bar', ['back' => request()->fullUrlWithoutQuery(['pdf', 'print']), 'backLabel' => 'رجوع للنتيجة'])
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
      <section class="w-full max-w-[361px] lg:max-w-none bg-white rounded-[16px] lg:rounded-[20px] drop-shadow-[0px_1px_4.55px_rgba(0,0,0,0.04)] flex items-start justify-center lg:justify-between gap-[10px] lg:px-12 lg:py-8">
        @foreach ($infoItems as $item)
          <div class="flex flex-col items-center gap-2 lg:gap-4 p-[10px] lg:p-0 h-[117px] lg:h-auto {{ $item['mw'] }} lg:w-auto {{ $item['w'] }}">
            <div class="bg-[#fff0e4] rounded-[8px] lg:rounded-[11px] size-[32px] lg:size-[60px] flex items-center justify-center shrink-0">
              <img src="{{ $img }}/{{ $item['icon'] }}" alt="" class="size-[19px] lg:size-[32px] object-contain" />
            </div>
            <p class="font-medium text-[11px] lg:text-[18px] leading-[16.5px] text-[#565656] whitespace-nowrap lg:min-h-[25px]"><span class="lg:hidden">{{ $item['mlabel'] }}</span><span class="hidden lg:inline">{{ $item['label'] }}</span></p>
            <p class="font-semibold text-[14px] lg:text-[25px] leading-[20px] text-[#1e293b] whitespace-nowrap lg:min-h-[29px] lg:flex lg:items-center" dir="auto">{{ $item['value'] }}</p>
          </div>
        @endforeach
      </section>

      <!-- Dominant style card + orbit illustration (Figma #3509:8566 / #3509:6537 + #3509:6560): ألوان الكارت من ثيم المستوى -->
      @php
        $t = $report['theme']['colors'];
        $ta = $report['theme']['assets'];
        $domIcons = $ta['dom_icons'];
      @endphp
      <div class="w-full flex flex-col lg:flex-row lg:items-center lg:justify-center gap-12 lg:gap-7">

        <section class="relative overflow-hidden w-full max-w-[361px] lg:max-w-none lg:w-[635px] lg:shrink min-w-0 border lg:border-[1.109px] rounded-[16px] lg:rounded-[22.183px] drop-shadow-[0px_3px_3.05px_rgba(0,0,0,0.09)] p-4 lg:p-[26.619px] lg:min-h-[353px] flex flex-col justify-center gap-[19px] lg:gap-[21px]" style="border-color:{{ $t['dom_border'] }};background-image:{{ $t['dom_bg'] }}">
          @if ($ta['watermark'] || $report['icon'])
            <div class="absolute flex items-center justify-center pointer-events-none -bottom-[46.71px] -left-[40px] lg:-bottom-[27.82px] lg:-left-[21.11px] size-[196.708px]" aria-hidden="true">
              <div class="-rotate-30 flex-none opacity-[0.03] lg:opacity-5">
                <img src="{{ $ta['watermark'] ?: $report['icon'] }}" alt="" class="size-[144px] object-contain" />
              </div>
            </div>
          @endif

          <div class="relative flex flex-col gap-5 lg:gap-[22px] w-full">
            <div class="flex items-center justify-between w-full">
              <div class="h-[35px] lg:h-[44px] rounded-full px-3 lg:px-[14px] py-1 lg:py-[6px] flex items-center justify-center gap-[6px] lg:gap-2 lg:w-[306px]" style="background:{{ $t['pill_bg'] }}">
                <img src="{{ $ta['star'] }}" alt="" class="size-[14px] lg:size-[17.746px]" />
                <span class="font-bold text-[12px] lg:text-[20px] leading-[16px] lg:leading-[17.746px] whitespace-nowrap" style="color:{{ $t['pill_text'] }}">{{ cms('perceptual_result.sections.dominant_label', 'النمط الإدراكي الغالب لديك') }}</span>
              </div>
              <div class="flex flex-row-reverse items-center gap-[10px] lg:gap-[15px]" aria-hidden="true">
                @forelse ($domIcons as $icon)
                  <div class="w-[40px] h-[35px] lg:w-[var(--w)] lg:h-[var(--h)] rounded-[9px] lg:rounded-[10px] flex items-center justify-center" style="background:{{ $icon['bg'] }};--w:{{ $icon['w'] ?? 56 }}px;--h:{{ $icon['h'] ?? 50 }}px">
                    @if (! empty($icon['inset']))
                      @php [$it, $ir, $ib, $il] = array_map('trim', explode(' ', str_replace('%', '', $icon['inset']))); @endphp
                      <span class="relative block size-[28px] lg:size-[34px]"><span class="absolute" style="top:{{ $it }}%;right:{{ $ir }}%;bottom:{{ $ib }}%;left:{{ $il }}%"><img src="{{ $icon['f'] }}" alt="" class="absolute inset-0 size-full max-w-none" /></span></span>
                    @else
                      <img src="{{ $icon['f'] }}" alt="" class="size-[28px] lg:size-[35px] object-contain" />
                    @endif
                  </div>
                @empty
                  <div class="w-[40px] h-[35px] lg:w-[56px] lg:h-[50px] rounded-[9px] lg:rounded-[10px] flex items-center justify-center" style="background:{{ $t['dom_icon_bg'] }}">
                    @if ($report['icon'])<img src="{{ $report['icon'] }}" alt="" class="size-[28px] lg:size-[35px] object-contain" />@endif
                  </div>
                @endforelse
              </div>
            </div>

            <div class="flex flex-col gap-[9px] lg:gap-[10px] w-full">
              <div class="flex items-start justify-between w-full lg:min-h-[70px] gap-3">
                <h2 class="font-bold text-[25px] lg:text-[36px] leading-[32px] lg:leading-[1.2] tracking-[-0.6px] lg:tracking-[-0.6655px] lg:max-w-[390px]" style="{{ $t['title_css'] }}">{!! preg_replace('/\s+\(/u', '<br>(', e($report['title'])) !!}</h2>
                <p class="bg-[#f2f6fa] lg:bg-transparent rounded-[8px] px-1 lg:px-0 font-bold lg:font-semibold text-[20px] lg:text-[36px] leading-[32px] lg:leading-[35.492px] tracking-[-0.6px] lg:tracking-[-0.6655px] whitespace-nowrap lg:self-start" dir="ltr"><span style="{{ $t['pct_css'] }}">{{ $percent }}%</span></p>
              </div>
              <p class="w-full font-medium lg:font-normal text-[12px] lg:text-[20px] leading-[19.5px] lg:leading-[1.6] text-[#262626] text-right">{{ $report['summary'] }}</p>
            </div>
          </div>
        </section>

        <div class="w-[calc(100%+32px)] -mx-4 max-w-[393px] self-center lg:w-auto lg:mx-0 lg:max-w-[572px] lg:flex-1 lg:min-w-0">
          @include('landing.partials.perceptual-orbit', ['theme' => $report['theme']])
        </div>
      </div>

      <!-- Summary card (Figma #3509:8620 / #3509:6593) -->
      <section class="relative overflow-hidden w-full max-w-[361px] lg:max-w-[1184px] border lg:border-2 rounded-[16px] lg:rounded-[29.057px] shadow-[0px_1px_2px_0px_rgba(0,0,0,0.05)] lg:shadow-[0px_1.816px_3.632px_0px_rgba(0,0,0,0.05)] p-[17px] lg:py-[41px] lg:px-0 flex flex-col gap-[10px] lg:gap-0" style="border-color:{{ $t['sum_border'] }};background-image:{{ $t['sum_bg'] }}">
        <div class="absolute rounded-full -left-[40px] -top-[40px] size-[96px] blur-[12px] lg:-left-[72.64px] lg:-top-[72.64px] lg:size-[174.342px] lg:blur-[21.793px] pointer-events-none" style="background:{{ $t['sum_glow'] }}" aria-hidden="true"></div>

        <div class="relative flex items-center gap-[9.99px] lg:gap-[18.142px] lg:pr-[78.68px]">
          <div class="drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] rounded-[12px] lg:rounded-[21.793px] size-[32px] lg:size-[60px] flex items-center justify-center shrink-0" style="background:{{ $t['sum_icon_bg'] }}">
            <img src="{{ $ta['zap'] }}" alt="" class="size-[16px] lg:size-[32px]" />
          </div>
          <h2 class="font-semibold text-[17px] lg:text-[36px] leading-[1.5] text-[#262626] whitespace-nowrap">{{ cms('perceptual_result.sections.summary_title', 'ملخص نتيجتك') }}</h2>
        </div>

        <div class="relative flex flex-col gap-[10px] lg:gap-0">
          <div class="border-r-2 lg:border-r-4 min-h-[38.5px] lg:min-h-[87px] flex items-center pr-3 lg:pr-[29.37px] lg:mt-[41px] lg:mr-[7.67%] lg:ml-[18.93%]" style="border-right-color:{{ $t['sum_line'] }}">
            <p class="font-semibold text-[14px] lg:text-[30px] leading-[1.5] text-[#262626]">{{ $report['summary_headline'] }}</p>
          </div>

          <ul class="flex flex-col gap-2 lg:gap-[15px] lg:mt-[35px] lg:mr-[7.25%] lg:ml-[14.8%]">
            @foreach ($report['summary_points'] as $i => $point)
              <li class="bg-[rgba(255,255,255,0.6)] border lg:border-2 rounded-[12px] lg:rounded-[21.793px] p-[9px] lg:px-[45px] lg:py-[14px] lg:min-h-[125px] flex items-start lg:items-center gap-2 lg:gap-6" style="border-color:{{ $t['sum_bullet_border'] }}">
                <span class="rounded-full size-[20px] lg:size-[60px] flex items-center justify-center shrink-0 mt-[2px] lg:mt-0" style="background:{{ $t['check_bg'][$i % 2] }}"><img src="{{ $ta['check'] }}" alt="" class="size-[12px] lg:size-[32px]" /></span>
                <span class="font-medium text-[12px] lg:text-[25px] leading-[1.5] lg:leading-normal text-[#262626]">{{ $point }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </section>

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
  @include('landing.partials.pdf-body')
@endif
</body>
</html>
