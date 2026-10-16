{{--
  تقرير مفاتيح الشخصية السبعة (PDF): صفحة واحدة طويلة بعرض 1440px، بنفس هيدر وستايل تقريري الأنماط الإدراكية وعجلة الحياة:
  الشعار + العنوان + كارت بيانات التقرير (الاسم ووقت الاختبار والعمر)، ثم نفس مكونات صفحة النتيجة (المخطط وأبرز المفاتيح والتفسير كاملاً)،
  ثم نفس كروت صفحة التفاصيل مفتوحة كاملة (7 مفاتيح بصورها ومحاورها الفرعية). من غير أي اختصار ولا هيدر/فوتر الموقع.
  بيتفتح من «تحميل التقرير» (?print=1) وبيفتح نافذة الطباعة لحفظه PDF. الستايل من App\Support\PdfStyles (ديسكتوب ثابت).
  يحتاج نفس بيانات الصفحتين: $keys, $top, $next, $lowest, $overall, $overallLevel, $subCount, $title, $completedAt, $user
--}}
@php
  $img = '/landing/images/keys-result';
  $pimg = '/landing/images/perceptual-report';

  // كروت التفاصيل: نفس ألوان صفحة التفاصيل، وفي 3 أعمدة مستقلة (المفتاح رقم i في العمود i % 3 من اليمين)
  $themes = require resource_path('data/keys-detail-themes.php');
  $themeOf = fn ($key) => $themes[$key->code] ?? $themes['K1'];
  $columns = [[], [], []];
  foreach ($keys as $i => $key) { $columns[$i % 3][] = $key; }

  $when = $completedAt ? \Illuminate\Support\Carbon::parse($completedAt) : now();
  $months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];
  $whenText = $when->day . ' ' . $months[$when->month - 1] . ' ' . $when->year . ' · ' . $when->format('h:i') . ' ' . ($when->hour < 12 ? 'ص' : 'م');
  $infoItems = array_values(array_filter([
    ['icon' => 'user-check.svg', 'label' => 'المستفيد', 'value' => trim((string) $user->name)],
    ['icon' => 'date.svg', 'label' => 'وقت إجراء الاختبار', 'value' => $whenText],
    ['icon' => 'info.svg', 'label' => 'العمر', 'value' => $user->birth_date ? $user->birth_date->age . ' سنة' : ''],
  ], fn ($item) => $item['value'] !== ''));
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=1440" />
  <title>تقرير مفاتيح الشخصية السبعة{{ $user->name ? ' - ' . $user->name : '' }}</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  @include('landing.partials.pdf-head')
  <style>
    /* المخطط في منتصف الكارت (الكارت بيطول مع نص التفسير الكامل) */
    .pdf-mode [data-chart-diagram] { top: calc(50% + 24px) !important; transform: translate(-50%, -50%) !important; }
  </style>
</head>
<body class="pdf-mode pt-0 bg-[#f6f6f6] text-[#262626] min-h-screen font-messiri antialiased">
@include('landing.partials.pdf-bar', ['back' => route('keys.details'), 'backLabel' => 'رجوع للتفاصيل'])

<main id="pdf-root" class="w-full max-w-[1440px] mx-auto px-[100px] pb-[112px] flex flex-col items-center gap-20 font-messiri">

  <!-- Logo -->
  <div class="bg-[#204a7a] w-[156px] h-[138px] flex items-center justify-center shrink-0 p-[14px]">
    <img src="{{ cms_image('perceptual_result.header.logo', $pimg . '/logo.png') }}" alt="دار الرؤى للتدريب" class="w-[95px] h-[96px] object-contain object-bottom" />
  </div>

  <!-- Heading -->
  <header class="w-full flex flex-col items-center gap-5 text-center max-w-[980px]">
    <div class="flex items-center justify-center gap-[10px] w-full">
      <img src="{{ $pimg }}/check-shield.svg" alt="" width="32" height="35" class="w-[32px] h-[35px] shrink-0" />
      <h1 class="font-semibold text-[36px] leading-[1.5] text-[#204a7a] whitespace-nowrap">{{ cms('keys_report.title', 'تقرير نتائج مقياس مفاتيح الشخصية السبعة') }}</h1>
    </div>
    <p class="font-medium text-[25px] leading-normal text-[#262626]">{{ cms('keys_report.subtitle', 'اكتشف أبرز مفاتيح شخصيتك السبعة ومستوى حضور كل مفتاح، وحدّد أولويات تطويرك.') }}</p>
  </header>

  <!-- Report info -->
  <section class="w-full bg-white rounded-[20px] drop-shadow-[0px_1px_4.55px_rgba(0,0,0,0.04)] flex items-start justify-between px-12 py-8">
    @foreach ($infoItems as $item)
      <div class="flex flex-col items-center gap-4">
        <div class="bg-[#fff0e4] rounded-[11px] size-[60px] flex items-center justify-center shrink-0">
          <img src="{{ $pimg }}/{{ $item['icon'] }}" alt="" class="size-[32px] object-contain" />
        </div>
        <p class="font-medium text-[18px] leading-[16.5px] text-[#565656] whitespace-nowrap min-h-[25px]">{{ $item['label'] }}</p>
        <p class="font-semibold text-[25px] leading-[20px] text-[#1e293b] whitespace-nowrap min-h-[29px] flex items-center" dir="auto">{{ $item['value'] }}</p>
      </div>
    @endforeach
  </section>

  <!-- Result: same components as the result page -->
  <section class="w-full flex flex-col items-center gap-10" aria-labelledby="keys-result-title">
    <div class="flex items-center gap-4">
      <div class="rounded-[21.793px] size-[60px] flex items-center justify-center shrink-0 bg-[#e0efff]">
        <img src="{{ $img }}/key-outline.svg" alt="" class="size-[30px]" aria-hidden="true" />
      </div>
      <h2 id="keys-result-title" class="font-semibold text-[36px] leading-[1.5] text-[#262626] whitespace-nowrap">{{ cms('keys_result.page.title', 'نتيجة التقييم') }}</h2>
    </div>
    <div class="w-full">
      @include('landing.partials.keys-result-body')
    </div>
  </section>

  <!-- Details: same cards as the details page, all opened -->
  <section class="w-full flex flex-col items-center gap-10" aria-labelledby="keys-details-title">
    <div class="flex items-center gap-4">
      <div class="rounded-[21.793px] size-[60px] flex items-center justify-center shrink-0 bg-[#e0efff]">
        <img src="{{ $img }}/share.svg" alt="" class="size-[30px] rotate-90" aria-hidden="true" />
      </div>
      <h2 id="keys-details-title" class="font-semibold text-[36px] leading-[1.5] text-[#262626] whitespace-nowrap">{{ cms('keys_details.page.title', 'تفاصيل المفاتيح') }}</h2>
    </div>
    <div class="w-full flex items-start gap-[14px]">
      @foreach ($columns as $column)
        <div class="flex-1 min-w-0 flex flex-col gap-[32px]">
          @foreach ($column as $key)
            @include('landing.partials.keys-detail-card', ['key' => $key, 't' => $themeOf($key), 'v' => 'd', 'showDetails' => true])
          @endforeach
        </div>
      @endforeach
    </div>
  </section>

  <p class="text-[#6f6f6f] text-[16px] font-medium text-center max-w-[900px] leading-[1.7]">{{ cms('keys_report.note', 'هذا التقرير أداة للتأمل والتطوير الذاتي، ويعتمد على تقييمك لنفسك، ولا يُعد تشخيصاً نفسياً أو حكماً نهائياً.') }} · {{ cms('global.footer.copyright', 'جميع الحقوق محفوظة لـ مركز دار الرؤى للتدريب © 2026') }}</p>
</main>

@include('landing.partials.pdf-body')
</body>
</html>
