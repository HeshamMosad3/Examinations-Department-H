{{--
  تقرير عجلة الحياة (PDF): صفحة واحدة طويلة بعرض 1440px بنفس ستايل تقرير الأنماط الإدراكية:
  الشعار + العنوان + كارت بيانات التقرير، ثم العجلة وأعلى/أقل جانب والتفسير الإجمالي، ثم تفاصيل الجوانب الثمانية بأجزائها الفرعية.
  بيتفتح من «تحميل التقرير» (?print=1) وبيفتح نافذة الطباعة لحفظه PDF. الأصول من نفس صفحات النتيجة والتفاصيل.
  $aspects: الجوانب بترتيب العجلة (ألوان + نسب + أجزاء فرعية)، $highest / $lowest / $overall / $levelTitle / $levelText
--}}
@php
  $img = '/assets/website/images/perceptual-report';
  $icons = '/assets/website/icons/aspects';
  $homeIcons = '/assets/website/icons/wheel_of_life/home';

  $rgba = function (string $hex, float $alpha): string {
    $n = hexdec(ltrim($hex, '#'));
    return 'rgba(' . (($n >> 16) & 255) . ',' . (($n >> 8) & 255) . ',' . ($n & 255) . ',' . $alpha . ')';
  };
  $darken = function (string $hex, float $amount): string {
    $n = hexdec(ltrim($hex, '#'));
    $ch = fn ($v) => str_pad(dechex((int) round($v * (1 - $amount))), 2, '0', STR_PAD_LEFT);
    return '#' . $ch(($n >> 16) & 255) . $ch(($n >> 8) & 255) . $ch($n & 255);
  };

  // العجلة (إحداثيات فيجما للديسكتوب 630x698، زي resultWheelChart.js)
  [$cx, $cy, $outer, $inner, $compass] = [318.5, 383.5, 218.5, 44.5, 36.5];
  $polar = fn (float $r, float $deg) => [$cx + $r * sin(deg2rad($deg)), $cy - $r * cos(deg2rad($deg))];
  $sector = function (float $r0, float $r1, float $a0, float $a1) use ($polar) {
    [$x1, $y1] = $polar($r0, $a0); [$x2, $y2] = $polar($r1, $a0); [$x3, $y3] = $polar($r1, $a1); [$x4, $y4] = $polar($r0, $a1);
    $f = fn ($n) => round($n, 2);
    return "M {$f($x1)} {$f($y1)} L {$f($x2)} {$f($y2)} A {$r1} {$r1} 0 0 1 {$f($x3)} {$f($y3)} L {$f($x4)} {$f($y4)} A {$r0} {$r0} 0 0 0 {$f($x1)} {$f($y1)} Z";
  };

  $when = \Illuminate\Support\Carbon::parse($completedAt);
  $infoItems = [
    ['icon' => 'user-check.svg', 'label' => cms('perceptual_result.info.beneficiary', 'المستفيد'), 'value' => $beneficiary],
    ['icon' => 'date.svg', 'label' => cms('perceptual_result.info.date', 'تاريخ التنفيذ'), 'value' => $when->format('d M Y')],
    ['icon' => 'report.svg', 'label' => cms('perceptual_result.info.report_code', 'رقم التقرير المعتمد'), 'value' => $reportCode],
  ];

  $analysis = $levelText ?: (cms('wheel_result.analysis.part_1', 'تشير نتيجتك إلى توازن بنسبة') . ' ' . $overall . '% '
    . cms('wheel_result.analysis.part_2', 'في حياتك بشكل عام. وهناك بعض الجوانب التي تحتاج إلى مزيد من الاهتمام خاصة الجانب') . ' ' . $lowest['label']
    . cms('wheel_result.analysis.part_3', '، بينما تتميز بقوة في الجانب') . ' ' . $highest['label'] . '.');

  // كارت أعلى/أقل جانب: نفس ألوان وزوايا صفحة النتيجة
  $cards = [
    ['label' => cms('wheel_result.summary.highest', 'أعلى جانب'), 'a' => $highest, 'border' => $highest['text'], 'bg' => 'linear-gradient(224.88deg, ' . $rgba($highest['text'], 0.33) . ' 0%, #ffffff 71.284%)', 'value' => $highest['text']],
    ['label' => cms('wheel_result.summary.lowest', 'أقل جانب'), 'a' => $lowest, 'border' => $lowest['text'], 'bg' => 'linear-gradient(221.27deg, ' . $rgba($lowest['fill'], 0.5) . ' 0%, #ffffff 70%)', 'value' => $darken($lowest['text'], 0.2)],
  ];
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=1440" />
  <title>{{ cms('wheel_report.seo_title', 'تقرير نتائج مقياس عجلة الحياة | دار الرؤى للتدريب') }}</title>
  <meta name="robots" content="noindex" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@700&display=swap" rel="stylesheet">

  @include('website.partials.pdf-head')
</head>
<body class="pdf-mode pt-0 bg-[#f6f6f6] text-[#262626] min-h-screen font-messiri antialiased">
@include('website.partials.pdf-bar', ['back' => route('life-wheel.details'), 'backLabel' => 'رجوع للتفاصيل'])

<main id="pdf-root" class="w-full max-w-[1440px] mx-auto px-[100px] pb-[112px] flex flex-col items-center gap-16">

  <!-- Logo -->
  <div class="bg-[#204a7a] w-[156px] h-[138px] flex items-center justify-center shrink-0 p-[14px]">
    <img src="{{ cms_image('perceptual_result.header.logo', $img . '/logo.png') }}" alt="دار الرؤى للتدريب" class="w-[95px] h-[96px] object-contain object-bottom" />
  </div>

  <!-- Heading -->
  <header class="w-full flex flex-col items-center gap-5 text-center max-w-[760px]">
    <div class="flex items-center justify-center gap-[10px] w-full">
      <img src="{{ $img }}/check-shield.svg" alt="" width="32" height="35" class="w-[32px] h-[35px] shrink-0" />
      <h1 class="font-semibold text-[36px] leading-[1.5] text-[#204a7a] whitespace-nowrap">{{ cms('wheel_report.title', 'تقرير نتائج مقياس عجلة الحياة') }}</h1>
    </div>
    <p class="font-medium text-[25px] leading-normal text-[#262626]">{{ cms('wheel_report.subtitle', 'اكتشف مستوى التوازن في جوانب حياتك الثمانية وحدّد أولوياتك للنمو والتطوير.') }}</p>
  </header>

  <!-- Report info -->
  <section class="w-full bg-white rounded-[20px] drop-shadow-[0px_1px_4.55px_rgba(0,0,0,0.04)] flex items-start justify-between px-12 py-8">
    @foreach ($infoItems as $item)
      <div class="flex flex-col items-center gap-4">
        <div class="bg-[#fff0e4] rounded-[11px] size-[60px] flex items-center justify-center shrink-0">
          <img src="{{ $img }}/{{ $item['icon'] }}" alt="" class="size-[32px] object-contain" />
        </div>
        <p class="font-medium text-[18px] leading-[16.5px] text-[#565656] whitespace-nowrap min-h-[25px]">{{ $item['label'] }}</p>
        <p class="font-semibold text-[25px] leading-[20px] text-[#1e293b] whitespace-nowrap min-h-[29px] flex items-center" dir="auto">{{ $item['value'] }}</p>
      </div>
    @endforeach
  </section>

  <!-- Wheel + highest / lowest + analysis -->
  <div class="w-full flex flex-row items-stretch gap-[27px]">

    <section class="relative w-[630px] h-[698px] shrink-0 bg-white rounded-[30px] shadow-[0px_5px_11.8px_0px_rgba(0,0,0,0.03)] overflow-hidden" aria-labelledby="wheel-card-title">
      <div class="absolute left-1/2 -translate-x-1/2 top-[27px] w-[582px] h-[48px] pb-[13px] flex items-center justify-between border-b border-[#f1f5f9] text-[#262626]">
        <div class="flex items-center gap-2">
          <img src="/assets/website/icons/result/chart-pie.svg" alt="" width="21" height="20" class="h-[20px] w-auto" aria-hidden="true" />
          <h2 id="wheel-card-title" class="text-[21px] font-bold leading-normal whitespace-nowrap">{{ cms('wheel_result.summary.wheel_title', 'مخطط عجلة الحياة') }}</h2>
        </div>
        <span class="bg-[#f1f5f9] rounded-full px-3 py-1 text-[14px] font-medium text-[#565656] leading-normal whitespace-nowrap">{{ cms('wheel_result.summary.dimensions_badge', '8 أبعاد رئيسية') }}</span>
      </div>

      <svg viewBox="0 0 630 698" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 size-full" role="img" aria-label="{{ $aspects->map(fn ($a) => $a['label'] . ' ' . $a['percent'] . '%')->implode('، ') }}">
        <defs><clipPath id="reportCompassClip"><circle cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $compass }}" /></clipPath></defs>
        @foreach ($aspects as $i => $a)
          <path d="{{ $sector($inner, $outer, $i * 45, ($i + 1) * 45) }}" fill="{{ $a['bg'] }}" stroke="{{ $a['bg'] }}" stroke-width="0.6" stroke-linejoin="round" />
        @endforeach
        @foreach ($aspects as $i => $a)
          @php $r = $inner + ($outer - $inner) * max(0, min(1, $a['percent'] / 100)); @endphp
          @if ($r > $inner + 0.01)
            <path d="{{ $sector($inner, $r, $i * 45, ($i + 1) * 45) }}" fill="{{ $a['fill'] }}" stroke="{{ $a['fill'] }}" stroke-width="0.6" stroke-linejoin="round" />
          @endif
        @endforeach
        <circle cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $inner }}" fill="#F6F6F6" />
        <image href="/assets/website/images/Frame%202147238562.png" x="{{ $cx - $compass }}" y="{{ $cy - $compass }}" width="{{ $compass * 2 }}" height="{{ $compass * 2 }}" preserveAspectRatio="xMidYMid slice" clip-path="url(#reportCompassClip)" />
      </svg>

      {{-- الأسماء والنسب والأيقونات حوالين العجلة --}}
      @foreach ($aspects as $a)
        @php [$lx, $top] = $a['pos']; [$iw, $ih] = $a['icon']; @endphp
        <div class="absolute flex flex-col items-center" style="left: {{ $lx }}px; top: {{ $top }}px; transform: translateX(-50%)">
          <span class="flex items-center justify-center rounded-full border font-bold font-['Plus_Jakarta_Sans',Cairo,sans-serif] text-[14px] leading-none" dir="ltr" style="width: 60px; height: 24px; background: rgba({{ $a['pill'][0] }},0.2); border-color: rgba({{ $a['pill'][0] }},0.3); color: {{ $a['pill'][1] }}; letter-spacing: -0.3px">{{ $a['percent'] }}%</span>
          <span class="flex items-center whitespace-nowrap" dir="ltr" style="margin-top: 6px; height: 24px; gap: 4px">
            <span dir="rtl" class="font-bold text-[16px] leading-none" style="color: {{ $a['text'] }}">{{ $a['label'] }}</span>
            <img src="{{ $homeIcons }}/{{ $a['key'] }}.svg" alt="" style="width: {{ $iw }}px; height: {{ $ih }}px" />
          </span>
        </div>
      @endforeach
    </section>

    <div class="flex flex-col gap-[28px] flex-1 min-w-0">
      <div class="grid grid-cols-1 gap-6">
        @foreach ($cards as $card)
          @php $a = $card['a']; @endphp
          <div class="h-[155px] rounded-[20px] border px-4 py-5 flex items-center justify-between bg-white" style="border-color: {{ $card['border'] }}; background: {{ $card['bg'] }}">
            <div class="flex flex-col items-end gap-4 text-right">
              <span class="text-[22px] font-semibold text-[#111] leading-[15px]">{{ $card['label'] }}</span>
              <span class="block font-bold leading-[1.5] text-[24px]" style="color: {{ $card['value'] }}">{{ $a['label'] }} <span dir="ltr">{{ $a['percent'] }}%</span></span>
            </div>
            <div class="size-[56px] rounded-[12px] flex items-center justify-center shrink-0" style="background-color: {{ $rgba($a['text'], 0.2) }}" aria-hidden="true">
              <img src="{{ $homeIcons }}/{{ $a['key'] }}.svg" alt="" class="h-[32px] w-auto" />
            </div>
          </div>
        @endforeach
      </div>

      <div class="rounded-[20px] border border-[#acc7e6] pt-10 pb-8 px-[18px] flex items-start flex-1" style="background-image: linear-gradient(-70.4deg, #d0e2fb 30.374%, #ffffff 100%)">
        <div class="flex items-start gap-3.5 w-full">
          <div class="bg-[#204a7a] rounded-[12px] size-[56px] flex items-center justify-center shrink-0" aria-hidden="true">
            <img src="/assets/website/icons/result/lightbulb.svg" alt="" width="32" height="32" class="size-[32px]" />
          </div>
          <div class="flex flex-col gap-6 flex-1 min-w-0">
            <div class="w-full flex items-center justify-between gap-3">
              <h3 class="text-[#172554] text-[25px] font-bold leading-normal whitespace-nowrap">{{ cms('wheel_result.summary.analysis_title', 'ماذا تعني هذه النتيجة؟') }}</h3>
              <span class="bg-white border border-[#b4cce6] rounded-full h-[33px] px-3 py-1 flex items-center gap-1 shrink-0 text-[#204a7a] text-[14px] font-semibold leading-[16px]">
                <img src="/assets/website/icons/result/sparkle.svg" alt="" width="13" height="13" class="size-[13px]" aria-hidden="true" />
                <span class="whitespace-nowrap">{{ $levelTitle ?: cms('wheel_result.summary.analysis_badge', 'تحليل ذكي') }}</span>
              </span>
            </div>
            <p class="w-full text-[#565656] text-[20px] font-medium leading-[1.6] text-right whitespace-pre-line">{{ $analysis }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Details of the eight aspects -->
  <section class="w-full flex flex-col items-center gap-10" aria-labelledby="aspects-title">
    <div class="flex items-center gap-4">
      <div class="drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] rounded-[21.793px] size-[60px] flex items-center justify-center shrink-0 bg-[#e0efff]">
        <img src="/assets/website/icons/result/chart-pie.svg" alt="" class="size-[30px]" aria-hidden="true" />
      </div>
      <h2 id="aspects-title" class="font-semibold text-[36px] leading-[1.5] text-[#262626] whitespace-nowrap">{{ cms('wheel_details.page.title', 'تفاصيل الجوانب') }}</h2>
      <span class="rounded-full bg-white border border-[#dde4ed] px-5 py-1 text-[20px] font-bold text-[#204a7a]" dir="ltr">{{ $overall }}%</span>
    </div>

    <div class="w-full grid grid-cols-2 gap-x-[46px] gap-y-10 items-stretch">
      @foreach ($aspects as $a)
        <article class="relative border-r-[5px] rounded-[30px]" style="background: {{ $rgba($a['bg'], 0.28) }}; border-right-color: {{ $a['fill'] }}">
          <div class="rounded-[30px] border-2 pt-[26px] pb-[28px] px-[30px] flex flex-col gap-6 h-full" style="border-color: {{ $a['bg'] }}">
            <div class="flex items-start justify-between gap-4">
              <div class="flex items-center gap-[18px] min-w-0">
                <div class="rounded-[20px] size-[54px] flex items-center justify-center shrink-0" style="background: {{ $a['bg'] }}">
                  <img src="{{ $icons }}/{{ $a['key'] }}.svg" alt="" class="size-[30px] object-contain" />
                </div>
                <h3 class="font-semibold text-[28px] leading-[1.4] text-[#262626] min-w-0">{{ $a['name'] }}</h3>
              </div>
              <span class="shrink-0 rounded-full border-[1.658px] px-4 h-[42px] flex items-center justify-center font-bold text-[22px] leading-none" dir="ltr" style="background: #fff; border-color: {{ $a['bg'] }}; color: {{ $a['text'] }}">{{ $a['percent'] }}%</span>
            </div>

            <p class="font-semibold text-[19px] leading-[1.6] text-[#565656] text-right">{{ $a['desc'] }}</p>

            <div class="h-[10px] w-full rounded-full overflow-hidden flex justify-end" dir="ltr" style="background: {{ $a['bg'] }}" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $a['percent'] }}">
              <div class="h-full rounded-full" style="width: {{ $a['percent'] }}%; background: {{ $a['fill'] }}"></div>
            </div>

            <ul class="flex flex-col gap-3" aria-label="تفاصيل {{ $a['name'] }}">
              @foreach ($a['subs'] as $s)
                <li class="bg-[rgba(255,255,255,0.75)] border-2 rounded-[20px] px-5 py-4 flex flex-col gap-3" style="border-color: {{ $a['bg'] }}">
                  <div class="flex items-start gap-4">
                    <div class="rounded-[12px] size-[44px] flex items-center justify-center shrink-0" style="background: {{ $a['bg'] }}">
                      <img src="{{ $icons }}/{{ $s['icon'] }}" alt="" class="size-[24px] object-contain" />
                    </div>
                    <div class="flex-1 min-w-0">
                      <p class="font-bold text-[20px] leading-[1.4] text-[#1e293b]">{{ $s['title'] }}</p>
                      <p class="font-medium text-[16px] leading-[1.6] text-[#565656] mt-1">{{ $s['desc'] }}</p>
                    </div>
                    <span class="shrink-0 font-bold text-[22px] leading-none mt-1" dir="ltr" style="color: {{ $a['text'] }}">{{ $s['value'] }}%</span>
                  </div>
                  <div class="h-[7px] w-full rounded-full overflow-hidden flex justify-end" dir="ltr" style="background: {{ $a['bg'] }}" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{ $s['value'] }}">
                    <div class="h-full rounded-full" style="width: {{ $s['value'] }}%; background: {{ $a['fill'] }}"></div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </article>
      @endforeach
    </div>
  </section>

  <p class="text-[#6f6f6f] text-[16px] font-medium text-center max-w-[900px] leading-[1.7]">{{ cms('wheel_report.note', 'هذا التقرير أداة للتأمل والتطوير الذاتي، ويعتمد على تقييمك لنفسك، ولا يُعد تشخيصاً نفسياً أو حكماً نهائياً.') }} · {{ cms('global.footer.copyright', 'جميع الحقوق محفوظة لـ مركز دار الرؤى للتدريب © 2026') }}</p>
</main>

@include('website.partials.pdf-body')
</body>
</html>
