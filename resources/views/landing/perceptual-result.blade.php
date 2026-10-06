@php
  $img = '/landing/images/perceptual-report';
  // ألوان كل نمط في كارت الدرجات (ثابتة لكل نمط زي فيجما)
  $styleColors = [
    'visual' => ['bg' => '#f2f5fa', 'border' => '#bac7d6', 'track' => '#e2e8f0', 'fill' => '#204a7a'],
    'auditory' => ['bg' => '#f9f7f7', 'border' => '#dba9b3', 'track' => '#ffe5e5', 'fill' => '#ae5566'],
    'kinesthetic' => ['bg' => '#f5efff', 'border' => '#af99c8', 'track' => '#e1cef6', 'fill' => '#705093'],
  ];
  $card = 'drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]';
  $top = $styles->first();
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

  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css']) }}
  <style>
    @media print {
      .pr-no-print { display: none !important; }
      body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }
  </style>
</head>
<!-- Figma: Desktop #3083:12562 (+6 variants) / Mobile #3080:5514 (+6 variants) -->
<body class="bg-brand-bg text-[#262626] min-h-screen font-messiri antialiased">

<main class="w-full max-w-[393px] sm:max-w-[720px] lg:max-w-[1440px] mx-auto px-4 lg:px-[100px] pb-[48px] lg:pb-[112px] flex flex-col items-center gap-[24px] lg:gap-[64px]">

  <!-- Logo -->
  <a href="/" class="bg-[#204a7a] w-[77px] h-[79px] lg:w-[111px] lg:h-[120px] flex items-center justify-center shrink-0" aria-label="دار الرؤى للتدريب - الرئيسية">
    <img src="{{ cms_image('perceptual_result.header.logo', '/landing/images/perceptual-report/logo.png') }}" alt="دار الرؤى للتدريب" class="w-[50px] h-[51px] lg:w-[77px] lg:h-[78px] object-contain object-bottom" />
  </a>

  <div class="w-full flex flex-col items-center gap-[48px] lg:gap-[64px]">

    <!-- Heading -->
    <header class="flex flex-col items-center gap-[8px] lg:gap-[21px] text-center px-4 lg:px-0 max-w-[767px]">
      <div class="flex items-center justify-center gap-[2px]">
        <img src="{{ $img }}/check-shield.svg" alt="" width="23" height="25" class="lg:hidden w-[23px] h-[25px]" />
        <h1 class="font-bold lg:font-semibold text-[18px] lg:text-[36px] leading-normal lg:leading-[1.5] text-[#204a7a]">{{ cms('perceptual_result.header.title', 'تقرير نتائج مقياس الأنماط الإدراكية') }}</h1>
      </div>
      <p class="font-medium text-[14px] lg:text-[25px] leading-normal text-[#262626] lg:text-[#565656] max-w-[311px] lg:max-w-[602px]">{{ cms('perceptual_result.header.subtitle', 'اكتشف النمط الإدراكي الغالب لديك (بصري، سمعي، أو حسي) لتحسين أساليب التعلم والتواصل.') }}</p>
    </header>

    <!-- Report info -->
    <section class="w-full max-w-[361px] lg:max-w-none bg-white rounded-[16px] lg:rounded-[20px] drop-shadow-[0px_1px_4.55px_rgba(0,0,0,0.04)] flex items-center justify-center lg:justify-between gap-[10px] lg:px-[48px] lg:py-[32px]">
      @foreach ([
        ['icon' => 'user-check.svg', 'label' => cms('perceptual_result.info.beneficiary', 'المستفيد'), 'mlabel' => cms('perceptual_result.info.beneficiary_mobile', 'المستخدم والمستفيد'), 'value' => $beneficiary, 'w' => 'lg:w-[241px]'],
        ['icon' => 'date.svg', 'label' => cms('perceptual_result.info.date', 'تاريخ التنفيذ'), 'mlabel' => null, 'value' => now()->format('d M Y'), 'w' => 'lg:w-[241px]'],
        ['icon' => 'report.svg', 'label' => cms('perceptual_result.info.report_code', 'رقم التقرير المعتمد'), 'mlabel' => cms('perceptual_result.info.report_code', 'رقم التقرير المعتمد'), 'value' => $reportCode,'w' => 'lg:w-[241px]'],
      ] as $item)
        <div class="{{ $item['mlabel'] ? 'flex' : 'hidden lg:flex' }} flex-col items-center gap-[8px] lg:gap-[16px] p-[10px] lg:p-0 w-[120px] {{ $item['w'] }}">
          <div class="bg-[#fff0e4] rounded-[8px] lg:rounded-[11px] size-[32px] lg:size-[60px] flex items-center justify-center">
            <img src="{{ $img }}/{{ $item['icon'] }}" alt="" class="size-[19px] lg:size-[32px] object-contain" />
          </div>
          <p class="font-medium text-[11px] lg:text-[18px] leading-[16.5px] text-[#565656] whitespace-nowrap"><span class="lg:hidden">{{ $item['mlabel'] }}</span><span class="hidden lg:inline">{{ $item['label'] }}</span></p>
          <p class="font-semibold text-[14px] lg:text-[25px] leading-[20px] text-[#1e293b] whitespace-nowrap" dir="auto">{{ $item['value'] }}</p>
        </div>
      @endforeach
    </section>

    <!-- Sections -->
    <div class="w-full max-w-[361px] lg:max-w-none flex flex-col gap-[40px] lg:gap-[64px]">

      <!-- Dominant style + scores -->
      <div class="flex flex-col lg:flex-row gap-[40px] lg:gap-[48px] lg:items-stretch">

        <!-- Dominant style card -->
        <section class="lg:w-[569px] lg:shrink-0 border border-[#bed1e6] rounded-[16px] lg:rounded-[20px] drop-shadow-[0px_3px_3.05px_rgba(0,0,0,0.09)] p-[16px] lg:p-[24px] flex flex-col gap-[20px]" style="background-image: linear-gradient(81.4deg, #fff 1%, #e0efff 99%)">
          <div class="flex items-center justify-between">
            <div class="bg-[#d9eaff] h-[35px] lg:h-[40px] rounded-full px-[12px] flex items-center gap-[6px] lg:w-[225px] lg:justify-center">
              <img src="{{ $img }}/star.svg" alt="" class="size-[14px] lg:size-[16px]" />
              <span class="font-bold text-[12px] lg:text-[14px] leading-[16px] text-[#204a7a] whitespace-nowrap">{{ cms('perceptual_result.sections.dominant_label', 'النمط الإدراكي الغالب لديك') }}</span>
            </div>
            <div class="bg-[#d9eaff] w-[40px] h-[35px] lg:w-[45px] lg:h-[40px] rounded-[9px] flex items-center justify-center" aria-hidden="true">
              @if ($report['icon'])<img src="{{ $report['icon'] }}" alt="" class="w-[22px] h-[22px] lg:w-[26px] lg:h-[26px] object-contain" />@endif
            </div>
          </div>
          <div class="flex flex-col gap-[9px]">
            <div class="flex items-center justify-between gap-3 lg:min-h-[63px]">
              <h2 class="font-bold text-[25px] lg:text-[30px] leading-[32px] tracking-[-0.6px] text-[#204a7a]">{{ $report['title'] }}</h2>
              <p class="font-medium text-[#204a7a] tracking-[-0.6px] leading-[32px] whitespace-nowrap shrink-0">
                <span dir="ltr"><span class="text-[17px] lg:text-[25px]">{{ $top['max'] }}</span><span class="font-bold text-[25px] lg:text-[30px]">/{{ $top['score'] }}</span></span><span class="text-[16px] lg:text-[25px]">{{ cms('perceptual_result.sections.score_unit', 'درجة') }}</span>
              </p>
            </div>
            <p class="font-medium lg:font-normal text-[12px] lg:text-[17px] leading-[19.5px] lg:leading-[1.5] text-[#262626] lg:max-w-[415px]">{{ $report['summary'] }}</p>
          </div>
        </section>

        <!-- Scores card -->
        <section class="flex-1 bg-white border border-[#e9edf2] rounded-[16px] lg:rounded-[20px] {{ $card }} p-[17px] lg:p-[25px] flex flex-col gap-[20px] justify-center">
          <div class="flex items-center gap-[4px] lg:gap-[8px]">
            <span class="bg-[#e9edf2] rounded-full size-[28px] lg:size-[35px] flex items-center justify-center shrink-0"><img src="{{ $img }}/layers.svg" alt="" class="size-[20px]" /></span>
            <h2 class="font-semibold text-[17px] lg:text-[25px] leading-[20px] text-[#262626]">{{ cms('perceptual_result.sections.scores_title', 'درجاتك في الأنماط الإدراكية') }}</h2>
          </div>
          <div class="flex flex-col gap-[14px]">
            @foreach ($styles as $style)
              @php $c = $styleColors[$style['key']]; @endphp
              <div class="rounded-[12px] border-[0.5px] px-[12.5px] py-[14.5px] flex flex-col gap-[10px]" style="background: {{ $c['bg'] }}; border-color: {{ $c['border'] }}">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-[8px]">
                    <img src="{{ $img }}/style-{{ $style['key'] }}.svg" alt="" class="size-[16px]" />
                    <span class="font-bold text-[14px] leading-[16px] text-[#262626]">{{ $style['name'] }}</span>
                  </div>
                  <span class="font-bold text-[14px] leading-[16px]" style="color: {{ $c['fill'] }}" dir="ltr"><span class="font-semibold">{{ $style['max'] }}</span>/{{ $style['score'] }}</span>
                </div>
                <div class="h-[8px] rounded-full overflow-hidden" style="background: {{ $c['track'] }}" role="progressbar" aria-label="{{ $style['name'] }}" aria-valuemin="0" aria-valuemax="{{ $style['max'] }}" aria-valuenow="{{ $style['score'] }}">
                  <div class="h-full rounded-full" style="width: {{ $style['max'] ? min(100, $style['score'] / $style['max'] * 100) : 0 }}%; background: {{ $c['fill'] }}"></div>
                </div>
              </div>
            @endforeach
          </div>
        </section>
      </div>

      <!-- How do you learn best -->
      <section class="bg-[#fafcff] border border-[#e9edf2] lg:border-[#f1f5f9] rounded-[16px] {{ $card }} pt-[16px] pb-[28px] lg:pt-[23px] lg:pb-[33px] px-0 lg:px-[23px] flex flex-col gap-[11px] lg:gap-[40px]">
        <div class="flex items-center gap-[8px] px-[27px] lg:px-[2px]">
          <span class="bg-[#e9edf2] rounded-full size-[28px] lg:size-[38px] flex items-center justify-center shrink-0"><img src="{{ $img }}/light-bulb.svg" alt="" class="w-[18px] h-[18px] lg:w-[20px] lg:h-[19px]" /></span>
          <h2 class="font-semibold text-[17px] lg:text-[25px] leading-[1.5] text-[#262626]">{{ cms('perceptual_result.sections.how_to_learn_title', 'كيف تتعلم بشكل أفضل؟') }}</h2>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-[8px] gap-y-[9px] lg:gap-x-[17px] lg:gap-y-[29px] w-full max-w-[338px] lg:max-w-none mx-auto">
          @foreach ($report['how_to_learn'] as $how)
            <div class="bg-white border-[0.5px] border-[#6997cb] lg:border lg:border-[#1657c2] rounded-[16px] lg:rounded-[29px] drop-shadow-[0px_1px_2px_rgba(0,0,0,0.05)] lg:drop-shadow-none min-h-[97px] lg:h-[206px] p-[12.5px] lg:p-[24px] flex flex-col items-start lg:items-center gap-[8px] lg:gap-0 lg:justify-between">
              <span class="bg-[#e9edf2] rounded-[8px] lg:rounded-[16px] size-[28px] lg:size-[69px] flex items-center justify-center shrink-0">
                @if ($how['icon'])<img src="{{ $how['icon'] }}" alt="" class="size-[18px] lg:size-[37px] object-contain" />@endif
              </span>
              <p class="font-semibold lg:font-bold text-[12px] lg:text-[21px] leading-[1.5] lg:leading-normal text-[#262626] lg:text-center lg:min-h-[69px] lg:flex lg:items-center lg:max-w-[307px]">{{ $how['text'] }}</p>
            </div>
          @endforeach
        </div>
      </section>

      <!-- Strengths + development -->
      <div class="flex flex-col lg:flex-row gap-[32px] lg:gap-[76px] lg:items-stretch">
        @foreach ([
          ['title' => $report['strengths_title'], 'items' => $report['strengths'], 'label' => cms('perceptual_result.sections.strengths_badge', 'مكتمل'), 'icon' => 'sparkles.svg', 'item_icon' => 'circle-tick.svg', 'top' => '#26797e', 'color' => '#27797e', 'pill' => '#e6f9ef', 'bg' => '#ebfcf3', 'gap' => 'gap-[14px]', 'pad' => 'px-[8px] py-[12px] lg:min-h-[54px]'],
          ['title' => cms('perceptual_result.sections.development_title', 'جوانب التطوير والتحسين'), 'items' => $report['development'], 'label' => cms('perceptual_result.sections.development_badge', 'توصيات'), 'icon' => 'arrow-up-circle.svg', 'item_icon' => 'trending-up.svg', 'top' => '#b8aa44', 'color' => '#9c8e30', 'pill' => '#f9f7e8', 'bg' => '#fcfaec', 'gap' => 'gap-[10px] lg:gap-[14px]', 'pad' => 'px-[10.5px] py-[16.5px] lg:py-0 lg:h-[54px]'],
        ] as $list)
          <section class="flex-1 bg-white border-t-4 rounded-[16px] {{ $card }} px-[16px] py-[26px] flex flex-col gap-[24px]" style="border-top-color: {{ $list['top'] }}">
            <div class="flex items-center justify-between gap-3 border-b border-[#ddd] pb-[9px]">
              <div class="flex items-center gap-[8px]">
                <img src="{{ $img }}/{{ $list['icon'] }}" alt="" class="size-[18px] lg:size-[24px]" />
                <h2 class="font-bold lg:font-semibold text-[17px] lg:text-[25px] leading-normal lg:leading-[1.2]" style="color: {{ $list['color'] }}">{{ $list['title'] }}</h2>
              </div>
              <span class="rounded-full w-[54px] lg:w-[58px] py-[2px] text-center font-bold text-[10px] lg:text-[12px] leading-[15px] shrink-0" style="background: {{ $list['pill'] }}; color: {{ $list['color'] }}">{{ $list['label'] }}</span>
            </div>
            <ul class="flex flex-col {{ $list['gap'] }}">
              @foreach ($list['items'] as $item)
                <li class="rounded-[12px] border-[0.5px] flex items-center gap-[8px] {{ $list['pad'] }}" style="background: {{ $list['bg'] }}; border-color: {{ $list['top'] }}">
                  <img src="{{ $img }}/{{ $list['item_icon'] }}" alt="" class="size-[18px] lg:size-[19px] shrink-0 object-contain" />
                  <span class="font-semibold text-[12px] lg:text-[16px] leading-[16px] lg:leading-[18px] text-[#262626]">{{ $item }}</span>
                </li>
              @endforeach
            </ul>
          </section>
        @endforeach
      </div>

      <!-- Suggested programs -->
      <div class="flex flex-col gap-[16px] lg:gap-[24px]">
        <section class="bg-white border border-[#f1f5f9] rounded-[16px] {{ $card }} px-[16px] py-[21px] lg:p-[24px] flex flex-col gap-[19px] lg:gap-[40px]">
          <div class="flex items-center gap-[8px]">
            <span class="bg-[#e5f0ff] rounded-full size-[28px] lg:size-[38px] flex items-center justify-center shrink-0"><img src="{{ $img }}/book-mark.svg" alt="" class="size-[18px] lg:size-[20px]" /></span>
            <h2 class="font-semibold text-[17px] lg:text-[25px] leading-[1.5] text-[#262626]">{{ cms('perceptual_result.sections.programs_title', 'البرامج التدريبية المقترحة لك:') }}</h2>
          </div>
          @php $programRows = [array_slice($report['programs'], 0, 3), array_slice($report['programs'], 3)]; @endphp
          <div class="flex flex-col gap-[12px] lg:gap-[32px]">
            @foreach ($programRows as $r => $row)
              <div class="flex flex-col lg:grid gap-[12px] {{ $r === 0 ? 'lg:grid-cols-3 lg:gap-[28px]' : 'lg:grid-cols-[433fr_357fr] lg:gap-[32px] lg:w-[69%]' }}">
                @foreach ($row as $program)
                  <div class="border rounded-[16px] lg:rounded-[29px] min-h-[70px] lg:min-h-[189px] px-[17px] py-[13px] lg:p-[24px] flex lg:flex-col items-center lg:items-start gap-[12px] lg:gap-[11px] lg:justify-center" style="background: {{ $program['bg'] }}; border-color: {{ $program['border'] }}">
                    <span class="rounded-[12px] size-[40px] lg:size-[50px] flex items-center justify-center shrink-0" style="background: {{ $program['icon_bg'] }}">
                      @if ($program['icon'])<img src="{{ $program['icon'] }}" alt="" class="size-[20px] lg:size-[32px] object-contain" />@endif
                    </span>
                    <div class="flex flex-col gap-[4px] lg:gap-[11px] min-w-0">
                      <h3 class="font-semibold text-[14px] lg:text-[25px] leading-[16.5px] lg:leading-normal text-[#262626]">{{ $program['title'] }}</h3>
                      @if ($program['subtitle'])
                        <p class="font-medium text-[11px] lg:text-[20px] leading-[16.5px] lg:leading-[1.3] text-[#565656]">{{ $program['subtitle'] }}</p>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            @endforeach
          </div>
        </section>

        <div class="bg-[#f1f7ff] border border-[#bac7d6] rounded-[12px] p-[16px] lg:min-h-[85px] flex items-start lg:items-center gap-[10px]">
          <img src="{{ $img }}/info.svg" alt="" class="size-[20px] lg:size-[25px] shrink-0 object-contain p-[1.5px]" />
          <p class="font-medium lg:font-semibold text-[14px] lg:text-[20px] leading-[19px] text-[#204a7a]">{{ $report['programs_outro'] }}</p>
        </div>
      </div>

      <!-- Practical tips -->
      <section class="bg-white border border-[#f1f5f9] rounded-[16px] {{ $card }} px-[16px] py-[17px] lg:p-[24px] flex flex-col gap-[19px] lg:gap-[32px]">
        <div class="flex items-center gap-[8px]">
          <span class="bg-[#e5f0ff] rounded-full size-[28px] lg:size-[38px] flex items-center justify-center shrink-0"><img src="{{ $img }}/sparkle.svg" alt="" class="size-[18px] lg:size-[20px]" /></span>
          <h2 class="font-semibold text-[17px] lg:text-[25px] leading-[20px] text-[#262626]">{{ cms('perceptual_result.sections.tips_title', 'نصائح عملية لك:') }}</h2>
        </div>
        <ul class="flex flex-col lg:grid lg:grid-cols-3 gap-[10px] lg:gap-x-[14px] lg:gap-y-[20px]">
          @foreach ($report['tips'] as $tip)
            <li class="bg-[#f8fafc] border-[0.5px] lg:border border-[#0284c7] rounded-[12px] lg:rounded-[22px] min-h-[50px] lg:h-[86px] px-[8.5px] py-[8px] lg:p-[17px] flex items-center gap-[8px] lg:gap-[12px]">
              <span class="bg-[#e5f0ff] rounded-[8px] size-[28px] lg:size-[36px] flex items-center justify-center shrink-0">
                @if ($tip['icon'])<img src="{{ $tip['icon'] }}" alt="" class="size-[18px] lg:size-[24px] object-contain" />@endif
              </span>
              <span class="font-medium lg:font-bold text-[14px] lg:text-[15px] leading-[16px] lg:leading-[20px] text-[#262626] lg:text-[#1e293b]">{{ $tip['text'] }}</span>
            </li>
          @endforeach
        </ul>
      </section>

      <!-- Our message -->
      <section class="w-full lg:max-w-[924px] lg:mx-auto bg-gradient-to-r from-[#f1f5f9] to-[rgba(239,246,255,0.4)] border border-[#d6e5f8] rounded-[16px] lg:rounded-[21px] p-[16px] lg:min-h-[232px] flex flex-col items-center justify-center gap-[10px] text-center">
        <div class="flex items-center gap-[8px]">
          <img src="{{ $img }}/message-dot.svg" alt="" class="size-[18px] lg:size-[24px]" />
          <h2 class="font-semibold text-[14px] lg:text-[30px] leading-normal lg:leading-[1.5] text-[#204a7a]">{{ cms('perceptual_result.sections.message_title', 'رسالتنا لك:') }}</h2>
        </div>
        <p class="font-normal lg:font-medium text-[12px] lg:text-[21px] leading-[1.5] text-[#262626] max-w-[301px] lg:max-w-[623px]">{{ cms('perceptual_result.sections.message_text', 'نتائج هذا التقرير تمثل نقطة بداية لفهم قدراتك وننصحك بالاستفادة منها في وضع خطة تطوير مستمرة تناسب أهدافك المهنية والشخصية.') }}</p>
      </section>
    </div>

    <!-- Actions -->
    <div class="pr-no-print w-full max-w-[361px] lg:max-w-none flex items-center justify-between lg:justify-center gap-[12px] lg:gap-[75px] lg:-mt-0">
      <button type="button" onclick="window.print()" class="w-[165px] lg:w-[290px] h-[45px] lg:h-[60px] rounded-[10px] lg:rounded-[15px] bg-[#204a7a] text-[#e9edf2] font-semibold text-[14px] lg:text-[21px] leading-[1.5] flex items-center justify-center gap-[8px] hover:bg-[#102744] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
        <img src="{{ $img }}/download.svg" alt="" class="w-[18px] h-[16px] lg:w-[22px] lg:h-[20px]" />
        <span>{{ cms('perceptual_result.sections.download_button', 'تحميل التقرير') }}</span>
      </button>
      <a href="/" class="w-[165px] lg:w-[290px] h-[45px] lg:h-[60px] rounded-[10px] lg:rounded-[15px] border border-[#204a7a] text-[#204a7a] font-semibold text-[14px] lg:text-[21px] leading-[1.5] flex items-center justify-center gap-[8px] hover:bg-[#e9edf2] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
        <img src="{{ $img }}/home.svg" alt="" class="size-[15px] lg:size-[20px]" />
        <span>{{ cms('perceptual_result.sections.home_button', 'العودة إلى الرئيسية') }}</span>
      </a>
    </div>
  </div>
</main>
</body>
</html>
