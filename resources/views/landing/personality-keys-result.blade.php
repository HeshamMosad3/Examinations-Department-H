@php
  $img = '/landing/images/keys-result';
  $kimg = '/landing/images/personality-keys-explore';
  $percents = $keys->mapWithKeys(fn ($k) => [$k->code => $k->percent])->all();

  // ألوان كل مفتاح في كروت «أبرز المفاتيح» (الأعلى والتالي والأقل حضورًا)
  $themes = [
    'K1' => ['accent' => '#204a7a', 'end' => '#deeaff', 'iconBg' => '#ddebfe', 'pct' => '#4f6ea5', 'label' => '#475d7c'],
    'K2' => ['accent' => '#64748b', 'end' => '#f3f3f4', 'iconBg' => '#eef1f5', 'pct' => '#556378', 'label' => '#475d7c'],
    'K3' => ['accent' => '#5fae7d', 'end' => '#e3f6ea', 'iconBg' => '#e3f6ea', 'pct' => '#227f45', 'label' => '#3f7a59'],
    'K4' => ['accent' => '#735297', 'end' => '#efe7f8', 'iconBg' => '#f1e8fa', 'pct' => '#5d3589', 'label' => '#614283'],
    'K5' => ['accent' => '#ccab3e', 'end' => '#fbf2d6', 'iconBg' => '#fdf3d3', 'pct' => '#b89336', 'label' => '#8f7425'],
    'K6' => ['accent' => '#b35769', 'end' => '#fff1f4', 'iconBg' => '#ffebf0', 'pct' => '#a04a5b', 'label' => '#a04a5b'],
    'K7' => ['accent' => '#8640c9', 'end' => '#f1e6fb', 'iconBg' => '#f3e8fd', 'pct' => '#752fb7', 'label' => '#6d2fb0'],
  ];
  // أيقونة كل مفتاح (من صفحة الاستكشاف): ملف + إطار القص + إطار الصورة جواه
  $icons = [
    'K1' => ['key-1', '21.87% 9.37% 21.88% 9.38%', null], 'K2' => ['key-2', null, null, true], 'K3' => ['key-3', null, null],
    'K4' => ['key-4', '16.67% 8.35% 12.5% 8.32%', '-3.8% -3.23%'], 'K5' => ['key-5', null, null], 'K6' => ['key-6', null, null], 'K7' => ['key-7', null, null],
  ];
  $ins = function ($v) {
    $t = array_map('floatval', preg_split('/\s+/', trim($v ?: '0')));
    [$top, $right, $bottom, $left] = match (count($t)) { 1 => [$t[0], $t[0], $t[0], $t[0]], 2 => [$t[0], $t[1], $t[0], $t[1]], default => [$t[0], $t[1], $t[2], $t[3]] };
    return 'left:' . $left . '%;top:' . $top . '%;width:' . (100 - $left - $right) . '%;height:' . (100 - $top - $bottom) . '%';
  };
  // أيقونة المفتاح داخل مربع (الحجم بالـpx): K2 أيقونتها كاملة بخلفيتها
  $keyIcon = function (string $code, int $size, int $inner) use ($themes, $icons, $kimg, $ins) {
    [$file, $group, $gimg] = $icons[$code]; $whole = ! empty($icons[$code][3]);
    $bg = $whole ? 'transparent' : $themes[$code]['iconBg'];
    $html = '<span class="relative flex shrink-0 items-center justify-center rounded-[7.429px]" style="width:' . $size . 'px;height:' . $size . 'px;background:' . $bg . '">';
    if ($whole) {
      $html .= '<img src="' . $kimg . '/' . $file . '.svg" alt="" class="absolute inset-0 size-full max-w-none" />';
    } else {
      $html .= '<span class="relative block" style="width:' . $inner . 'px;height:' . $inner . 'px">';
      $html .= $group
        ? '<span class="absolute" style="' . $ins($group) . '"><img src="' . $kimg . '/' . $file . '.svg" alt="" class="absolute max-w-none" style="' . $ins($gimg ?? '0') . '" /></span>'
        : '<img src="' . $kimg . '/' . $file . '.svg" alt="" class="absolute inset-0 size-full max-w-none" />';
      $html .= '</span>';
    }

    return $html . '</span>';
  };

  // مخطط المفاتيح: إحداثيات فيجما (ديسكتوب #3551:8838 / موبايل #3551:9789)
  $dg = [205.68, 157.11];
  $D = fn ($x, $y) => [$dg[0] + $x, $dg[1] + $y];
  $desktop = [
    'W' => 558, 'H' => 474, 'g' => $dg, 'ring1' => [0.32, 3.89, 154], 'ring2' => [19.99, 24.28, 114.26, 117.116],
    'emb' => [28.32, 32.89, 99], 'embBorder' => 4.26, 'embImg' => [1.74, 9.74, 88, 77],
    'poly' => [135.684, 128.542], 'border' => 1.714, 'radius' => 14.282, 'pill' => [41.176, 22.718, 14.198, 14.198, 1.91],
    'items' => [
      ['dot', $D(79.71, -2.34)[0], $D(79.71, -2.34)[1], 7.099, '#5969ff'], ['bar', $D(81.5, -48.58)[0], $D(81.5, -48.58)[1], 2.262, 48.292, 89, 48.275, 1.42, '#5969ff'],
      ['rdot', $D(147.16, 103.24)[0], $D(147.16, 103.24)[1], 9.242, 7.099, 22, '#00bc45'], ['bar', $D(154.33, 108.59)[0], $D(154.33, 108.59)[1], 50.402, 17.584, 18, 52.534, 1.42, '#00bc45'],
      ['rdot', $D(137.72, 31.22)[0], $D(137.72, 31.22)[1], 9.783, 7.099, 148, '#204a7a'], ['bar', $D(144.14, -1.63)[0], $D(144.14, -1.63)[1], 38.776, 37.515, 136, 52.534, 1.42, '#204a7a'],
      ['dot', 245.63, 308.11, 7.099, '#d37100'], ['bar', 216.59, 314.26, 31.403, 40.272, -52.46, 49.695, 1.42, '#d37100'],
      ['dot', 312.37, 309.53, 7.099, '#735297'], ['bar', 317.08, 315.59, 28.591, 40.89, -124.37, 48.56, 1.428, '#735297'],
      ['dot', 205.88, 264.09, 7.099, '#f63657'], ['bar', 156.18, 266.93, 55.848, 13.197, -12, 56.794, 1.42, '#f63657'],
      ['bar', 63 + 116.03, 74 + 87.6, 39.24, 31.534, 38.53, 49.076, 1.284, '#a855f7', -2.95], ['rdot', 63 + 150.01, 74 + 113.73, 8.991, 6.406, 52, '#a855f7'],
    ],
    'nodes' => [
      'K1' => [217, 0, 24, 13, 86, 106, 6, 16, [28, 28]], 'K2' => [367, 69, 25, 12, 86, 107, 8, 16, [20, 21]], 'K3' => [391, 211, 25, 13, 86, 106, 6, 16, [28, 28]],
      'K4' => [297, 333, 24, 11, 86, 106, 6, 16, [28, 28]], 'K5' => [134, 329, 25, 11, 86, 106, 6, 16, [28, 28]], 'K6' => [33, 211, 24, 13, 86, 104, 6, 16, [28, 28]], 'K7' => [63, 74, 24, 13, 87, 104, 6, 16, [28, 28]],
    ],
  ];
  $mg = [144.86, 110.65];
  $M = fn ($x, $y) => [$mg[0] + $x, $mg[1] + $y];
  $mobile = [
    'W' => 393, 'H' => 334, 'g' => $mg, 'ring1' => [0, 3.02, 108.639], 'ring2' => [14.08, 17.1, 80.473, 82.485],
    'emb' => [20.14, 23.35, 70], 'embBorder' => 3, 'embImg' => [1, 7, 62.332, 53.965],
    'poly' => [95.562, 90.533], 'border' => 1.207, 'radius' => 10.059, 'pill' => [29, 16, 10, 10, 1.34],
    'items' => [
      ['dot', $M(56.14, -1.65)[0], $M(56.14, -1.65)[1], 5, '#5969ff'], ['bar', $M(57.4, -34.21)[0], $M(57.4, -34.21)[1], 1.593, 34.012, 89, 34, 1, '#5969ff'],
      ['rdot', $M(103.64, 72.71)[0], $M(103.64, 72.71)[1], 6.509, 5, 22, '#00bc45'], ['bar', $M(108.69, 76.48)[0], $M(108.69, 76.48)[1], 35.498, 12.385, 18, 37, 1, '#00bc45'],
      ['rdot', $M(97, 21.99)[0], $M(97, 21.99)[1], 6.89, 5, 148, '#204a7a'], ['bar', $M(101.52, -1.15)[0], $M(101.52, -1.15)[1], 27.31, 26.422, 136, 37, 1, '#204a7a'],
      ['dot', 173, 217, 5, '#d37100'], ['bar', 152.55, 221.33, 22.117, 28.363, -52.46, 35, 1, '#d37100'],
      ['dot', 220, 218, 5, '#735297'], ['bar', 223.32, 222.27, 20.137, 28.799, -124.37, 34.201, 1.006, '#735297'],
      ['dot', 145, 186, 5, '#f63657'], ['bar', 110, 188, 39.334, 9.295, -12, 40, 1, '#f63657'],
      ['bar', 44.28 + 81.72, 52.3 + 61.7, 27.637, 22.21, 38.53, 34.564, 0.904, '#a855f7', -2.95], ['rdot', 44.28 + 105.65, 52.3 + 80.1, 6.333, 4.511, 52, '#a855f7'],
    ],
    'nodes' => [
      'K1' => [152.93, 0.05, 17.07, 8.95, 61, 75, 4, 12.071, [20, 20]], 'K2' => [258.54, 48.3, 17.46, 8.7, 61, 75, 6, 12.071, [14, 15]], 'K3' => [275.65, 148.87, 17.35, 8.13, 61, 75, 4, 11.065, [20, 20]],
      'K4' => [209.27, 234.36, 16.73, 7.64, 61, 75, 4, 10.059, [19.112, 19.112]], 'K5' => [94.56, 231.36, 17.45, 7.64, 61, 75, 4, 10.059, [20.118, 20.118]], 'K6' => [23.14, 148.88, 16.86, 9.12, 61, 73, 4.024, 12.071, [20.118, 20.118]], 'K7' => [44.28, 52.3, 17.1, 9.05, 61.361, 73.432, 4, 12.071, [20.118, 20.118]],
    ],
  ];

  // ماذا تعني هذه النتيجة؟ فقرات مستوى النتيجة الإجمالية (من قاعدة البيانات، بتتعدل من الأدمن)، وأول فقرة بتظهر والباقي تحت «عرض المزيد»
  $paragraphs = $overallLevel ? array_values(array_filter(array_map('trim', preg_split('/\R+/u', (string) $overallLevel->description_ar)), 'strlen')) : [];
  if (! $paragraphs) {
    $level = $overall >= 80 ? 'المرتفع جدًا' : ($overall >= 65 ? 'المرتفع' : ($overall >= 40 ? 'المتوسط' : 'المنخفض'));
    $paragraphs = ["تشير نتيجتك إلى أن مستوى حضور السمات التي يقيسها مقياس مفاتيح الشخصية السبعة لديك يقع ضمن المستوى {$level}."];
  }
  $hasMore = count($paragraphs) > 1 || mb_strlen($paragraphs[0]) > 330;
  $chartNote = str_replace(':count', $subCount, cms('keys_result.chart.note', 'تم احتساب المفاتيح بالاعتماد على :count بعداً فرعياً'));
  $detailsUrl = route('keys.details');
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('keys_result.seo.title', 'نتيجة مفاتيح الشخصية السبعة | دار الرؤى للتدريب') }}</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/personalityKeysResult.js']) }}
</head>
<body class="bg-brand-bg text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">تخطي إلى المحتوى</a>

  @include('landing.partials.navbar')

  <!-- Figma: Desktop #3551:8746 / Mobile #3551:9773 (الديسكتوب من 1280 وطالع) -->
  <main id="main-content" class="w-full max-w-[393px] min-[1280px]:max-w-[1240px] mx-auto px-[16px] min-[1280px]:px-0 pt-[16px] min-[1280px]:pt-[48px] pb-[39px] md:pb-[13px] min-[1280px]:pb-[77px] font-messiri">

    <!-- Breadcrumb (ديسكتوب بس) -->
    <nav class="hidden min-[1280px]:flex items-center h-[33px] mb-[64px] text-[21px] leading-[1.5]" aria-label="مسار التنقل">
      @foreach ([[cms('keys_result.page.breadcrumb_home', 'الرئيسية'), route('home')], [cms('keys_result.page.breadcrumb_test', 'اختبار مفاتيح الشخصية السبعة'), route('keys.test')]] as [$label, $href])
        <span class="flex items-center gap-[4px] pr-[4px]">
          <a href="{{ $href }}" class="text-[#6f6f6f] hover:text-brand-primary transition-colors">{{ $label }}</a>
          <i class="fa-solid fa-chevron-left text-[12px] text-[#6f6f6f] mx-[4px]" aria-hidden="true"></i>
        </span>
      @endforeach
      <span class="text-[#204a7a] pr-[4px]">{{ cms('keys_result.page.title', 'نتيجة التقييم') }}</span>
    </nav>

    <h1 class="text-center text-[#204a7a] font-bold min-[1280px]:font-semibold text-[21px] leading-[28px] tracking-[-0.5px] min-[1280px]:tracking-normal min-[1280px]:text-[36px] min-[1280px]:leading-[1.5] min-[1280px]:h-[70px] min-[1280px]:flex min-[1280px]:items-center min-[1280px]:justify-center mb-[32px] min-[1280px]:mb-[64px]">{{ cms('keys_result.page.title', 'نتيجة التقييم') }}</h1>

    <div class="flex flex-col min-[1280px]:flex-row min-[1280px]:items-start gap-[24px] min-[1280px]:gap-[27px]">

      <!-- مخطط المفاتيح -->
      <section class="relative bg-white overflow-clip border border-[#d6e6f8] min-[1280px]:border-0 rounded-[20px] min-[1280px]:rounded-[30px] shadow-[0px_0.8px_0px_rgba(91,89,89,0.25)] min-[1280px]:shadow-[0px_5px_11.8px_rgba(0,0,0,0.03)] w-full min-[1280px]:w-[630px] h-[455px] min-[1280px]:h-[699px] shrink-0" aria-labelledby="kr-chart">
        <div class="absolute left-1/2 -translate-x-1/2 top-[19px] min-[1280px]:top-[24px] w-[320px] min-[1280px]:w-[582px] max-w-[calc(100%-24px)] h-[33px] min-[1280px]:h-[48px] flex items-center justify-between border-b border-[#f1f5f9] pb-[13px]">
          <h2 id="kr-chart" class="flex items-center gap-[2px] min-[1280px]:gap-[8px] font-semibold min-[1280px]:font-bold text-[14px] min-[1280px]:text-[21px] leading-[1.5] min-[1280px]:leading-[normal] text-[#262626]">
            <span>{{ cms('keys_result.chart.title', 'مخطط مفاتيح شخصيتك السبعة') }}</span>
            <img src="{{ $img }}/share.svg" alt="" class="size-[17px] min-[1280px]:size-[28px] rotate-90" />
          </h2>
          <span class="rounded-full bg-[#f1f5f9] px-[12px] py-[4px] font-medium text-[12px] min-[1280px]:text-[14px] leading-[1.5] min-[1280px]:leading-[normal] text-[#565656] whitespace-pre">{{ cms('keys_result.chart.badge', '7 أبعاد رئيسية') }}</span>
        </div>

        <!-- ديسكتوب -->
        <div class="hidden min-[1280px]:block absolute left-1/2 -translate-x-1/2 top-[112px]" style="--u: 1px">
          @include('landing.partials.keys-result-diagram', ['c' => $desktop, 'percents' => $percents])
        </div>
        <!-- موبايل -->
        <div class="min-[1280px]:hidden absolute left-1/2 -translate-x-1/2 top-[68px] w-[393px] max-w-[calc(100%+30px)]" style="container-type: inline-size">
          <div style="--u: calc(100cqw / 393); height: calc(100cqw * 334 / 393)">
            @include('landing.partials.keys-result-diagram', ['c' => $mobile, 'percents' => $percents])
          </div>
        </div>

        <p class="absolute left-0 right-0 text-center font-normal text-[11px] min-[1280px]:text-[20px] leading-[normal] text-[#565656] top-[417px] min-[1280px]:top-[640px]">{{ $chartNote }}</p>
      </section>

      <div class="flex flex-col gap-[24px] min-[1280px]:gap-[28px] min-[1280px]:w-[581px] min-[1280px]:shrink-0">

        <!-- أبرز مفاتيحك -->
        <section class="bg-white border border-[#e2e8f0] rounded-[16px] shadow-[0px_2px_8px_-2px_rgba(15,23,42,0.04)] min-[1280px]:shadow-none p-[16px] min-[1280px]:px-[30px] min-[1280px]:py-[26px] flex flex-col gap-[12px] min-[1280px]:gap-[18px]" aria-labelledby="kr-highlights">
          <div class="flex items-center gap-[14px] min-[1280px]:gap-[16px] min-[1280px]:h-[33px]">
            <span class="flex size-[28px] min-[1280px]:size-[32px] shrink-0 items-center justify-center rounded-[8px] min-[1280px]:rounded-[7.429px] bg-[#eff6ff]"><img src="{{ $img }}/key-outline.svg" alt="" class="size-[18px] min-[1280px]:size-[24px]" /></span>
            <h2 id="kr-highlights" class="font-bold text-[17px] min-[1280px]:text-[21px] leading-[normal] text-[#262626]">{{ cms('keys_result.highlights.title', 'أبرز مفاتيح شخصيتك') }}</h2>
          </div>

          <div class="flex flex-col gap-[10px] min-[1280px]:gap-[14px]">
            <div class="flex items-start justify-center gap-[8px] min-[1280px]:gap-[19px] min-[1280px]:justify-start">
              @foreach ([[$top, cms('keys_result.highlights.top', 'المفتاح الأعلى')], [$next, cms('keys_result.highlights.next', 'المفتاح التالي')]] as [$k, $label])
                @if ($k)
                  @php $t = $themes[$k->code]; @endphp
                  <div class="min-w-0 flex-1 min-[1280px]:flex-none min-[1280px]:w-[250px] flex flex-col justify-center rounded-[12px] border border-r-[4px] border-solid p-[12px] min-[1280px]:px-[14px] min-[1280px]:py-[11px] min-[1280px]:h-[126px]" style="border-color: {{ $t['accent'] }}; background: linear-gradient(to right, {{ $label === cms('keys_result.highlights.top', 'المفتاح الأعلى') ? '#fcfdfe' : '#fcfdfe' }}, {{ $t['end'] }})">
                    <div class="flex flex-col gap-[14px] min-[1280px]:gap-[21px]">
                      <div class="flex items-start justify-between gap-[8px]">
                        <div class="flex flex-col gap-[5px] min-[1280px]:w-[104px]">
                          <span class="font-semibold text-[12px] min-[1280px]:text-[17px] leading-[1.5] min-[1280px]:leading-[26px]" style="color: {{ $t['label'] }}">{{ $label }}</span>
                          <span class="font-bold text-[14px] min-[1280px]:text-[21px] leading-[normal] text-[#262626] whitespace-nowrap min-[1280px]:flex min-[1280px]:h-[26px] min-[1280px]:items-center">{{ $k->name }} ({{ $k->code }})</span>
                        </div>
                        <span class="min-[1280px]:hidden">{!! $keyIcon($k->code, 32, 20) !!}</span>
                        <span class="hidden min-[1280px]:block">{!! $keyIcon($k->code, 36, 24) !!}</span>
                      </div>
                      <span class="block min-[1280px]:flex min-[1280px]:h-[24px] min-[1280px]:items-center font-bold text-[21px] min-[1280px]:text-[25px] leading-[normal]" dir="ltr" style="color: {{ $t['pct'] }}; text-align: left">{{ $k->percent }}%</span>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>

            @if ($lowest && $lowest !== $top)
              @php $t = $themes[$lowest->code]; @endphp
              <div class="rounded-[12px] border border-r-[4px] border-solid px-[13px] py-[11px] min-[1280px]:p-[15px] min-[1280px]:h-[120px]" style="border-color: {{ $t['accent'] }}; background: linear-gradient(to right, #fff, {{ $t['end'] }})">
                <div class="flex items-start justify-between gap-[8px] min-[1280px]:h-[64px]">
                  <div class="flex flex-col gap-[5px] min-w-0 flex-1 min-[1280px]:flex-none min-[1280px]:w-[285px]">
                    <div class="flex items-center gap-[16px] min-[1280px]:items-start">
                      <span class="font-bold min-[1280px]:font-semibold text-[12px] min-[1280px]:text-[17px] leading-[normal] min-[1280px]:leading-[1.5]" style="color: {{ $t['pct'] }}">{{ cms('keys_result.highlights.lowest', 'المفتاح الأقل حضوراً') }}</span>
                      <span class="flex h-[18px] min-[1280px]:h-[23px] min-[1280px]:w-[129px] min-[1280px]:justify-center items-center rounded-full px-[8px] font-bold text-[10px] min-[1280px]:text-[17px] leading-[normal] whitespace-nowrap" style="background: {{ $t['iconBg'] }}; color: {{ $t['pct'] }}">{{ cms('keys_result.highlights.priority', 'أولوية تطوير') }}</span>
                    </div>
                    <span class="font-bold text-[17px] min-[1280px]:text-[21px] leading-[normal] text-[#262626] min-[1280px]:h-[33px]">{{ $lowest->name }} ({{ $lowest->code }})</span>
                  </div>
                  <span class="min-[1280px]:hidden">{!! $keyIcon($lowest->code, 32, 20) !!}</span>
                  <span class="hidden min-[1280px]:block">{!! $keyIcon($lowest->code, 36, 24) !!}</span>
                </div>
                <span class="mt-[-4px] min-[1280px]:mt-0 block min-[1280px]:flex min-[1280px]:h-[24px] min-[1280px]:items-center font-bold min-[1280px]:font-semibold text-[21px] min-[1280px]:text-[25px] leading-[normal] min-[1280px]:leading-[1.5]" dir="ltr" style="color: {{ $t['pct'] }}; text-align: left">{{ $lowest->percent }}%</span>
              </div>
            @endif
          </div>
        </section>

        <!-- ماذا تعني هذه النتيجة؟ -->
        <section class="rounded-[16px] min-[1280px]:rounded-[20px] border border-[#a3c0e2] px-[15px] py-[19px] min-[1280px]:px-[18px] min-[1280px]:pt-[40px] min-[1280px]:pb-[36px] min-[1280px]:min-h-[306px]" style="background-image: linear-gradient(79deg, #fff 1%, #d2dfef 99%)" aria-labelledby="kr-insight">
          <div class="flex items-start gap-[8px] min-[1280px]:gap-[12px]">
            <span class="flex size-[41px] min-[1280px]:size-[56px] shrink-0 items-center justify-center rounded-[12px] bg-[#204a7a]"><img src="{{ $img }}/lightbulb.svg" alt="" class="size-[22px] min-[1280px]:size-[32px]" /></span>
            <div class="flex min-w-0 flex-1 flex-col gap-[10px] min-[1280px]:gap-[40px]">
              <div class="flex items-center justify-between min-[1280px]:items-start">
                <h2 id="kr-insight" class="font-bold text-[14px] min-[1280px]:text-[25px] leading-[normal] text-[#172554]">{{ cms('keys_result.insight.title', 'ماذا تعني هذه النتيجة؟') }}</h2>
                <span class="flex items-center gap-[4px] rounded-full bg-white min-[1280px]:bg-[#e9edf2] px-[12px] py-[4px] font-medium min-[1280px]:font-semibold text-[10px] min-[1280px]:text-[14px] leading-[16px] text-[#204a7a] min-[1280px]:h-[33px] min-[1280px]:items-center">
                  <span>{{ cms('keys_result.insight.badge', 'تحليل ذكي') }}</span>
                  <img src="{{ $img }}/sparkle.svg" alt="" class="size-[11px] min-[1280px]:size-[13px]" />
                </span>
              </div>
              <div class="font-medium text-[11px] min-[1280px]:text-[20px] leading-[17.88px] min-[1280px]:leading-[1.5] text-[#565656] min-[1280px]:w-[455px]">
                <p data-first class="{{ $hasMore ? 'line-clamp-5' : '' }}">{{ $paragraphs[0] }}</p>
                @if ($hasMore)
                  <div data-more class="hidden flex-col gap-[10px] mt-[10px]">
                    @foreach (array_slice($paragraphs, 1) as $paragraph)
                      <p>{{ $paragraph }}</p>
                    @endforeach
                  </div>
                  <button type="button" data-more-toggle data-label-more="{{ cms('keys_result.insight.more', 'عرض المزيد') }}" data-label-less="{{ cms('keys_result.insight.less', 'عرض أقل') }}" aria-expanded="false" class="mt-[10px] flex items-center gap-[6px] font-semibold text-[12px] min-[1280px]:text-[17px] leading-[1.5] text-[#204a7a] cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2 rounded">
                    <span data-label>{{ cms('keys_result.insight.more', 'عرض المزيد') }}</span>
                    <svg data-chevron class="w-[10px] h-[6px] transition-transform duration-200" viewBox="0 0 11 6" fill="none" aria-hidden="true"><path d="M1 1l4.5 4L10 1" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                @endif
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- زرار عرض تفاصيل التقرير -->
    <div class="mt-[48px] min-[1280px]:mt-[128px] flex justify-center">
      <a href="{{ $detailsUrl }}" class="group w-full min-[1280px]:w-[467px] h-[45px] min-[1280px]:h-[70px] rounded-[10px] min-[1280px]:rounded-[15px] bg-[#204a7a] hover:bg-[#102744] text-[#e9edf2] font-semibold text-[14px] min-[1280px]:text-[25px] leading-[1.5] flex items-center justify-center gap-[8px] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
        <span>{{ cms('keys_result.page.details_button', 'عرض تفاصيل التقرير') }}</span>
        <img src="{{ $img }}/arrow.svg" alt="" class="size-[12px] min-[1280px]:size-[24px] group-hover:-translate-x-1 transition-transform" />
      </a>
    </div>
  </main>

  @include('landing.partials.footer')
</body>
</html>
