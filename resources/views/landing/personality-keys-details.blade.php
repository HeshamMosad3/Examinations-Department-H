@php
  $img = '/landing/images/keys-details';
  // ألوان كل مفتاح (Figma: تفاصيل الجوانب — ديسكتوب #3551:8587 / موبايل #3551:9670) في resources/data/keys-detail-themes.php، ومشتركة مع تقرير الـPDF
  $themes = require resource_path('data/keys-detail-themes.php');
  $themeOf = fn ($key) => $themes[$key->code] ?? $themes['K1'];
  // ديسكتوب: 3 أعمدة مستقلة (المفتاح رقم i في العمود i % 3 من اليمين)، وكل عمود بيطول لوحده لما الكروت تتفتح
  $columns = [[], [], []];
  foreach ($keys as $i => $key) { $columns[$i % 3][] = $key; }
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('keys_details.seo.title', 'تفاصيل مفاتيح الشخصية السبعة | دار الرؤى للتدريب') }}</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    @media print {
      .kd-no-print { display: none !important; }
      .kd-list { display: flex !important; }
      body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }
  </style>

  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/personalityKeysDetails.js']) }}
</head>
<body class="bg-brand-bg text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">تخطي إلى المحتوى</a>

  @include('landing.partials.navbar')

  <!-- Figma: Desktop #3551:8587 / Mobile #3551:9670 (الديسكتوب من 1280 وطالع) -->
  <main id="main-content" class="w-full max-w-[393px] min-[1280px]:max-w-[1243px] mx-auto px-4 min-[1280px]:px-0 pt-[16px] min-[1280px]:pt-[48px] pb-[39px] md:pb-[13px] min-[1280px]:pb-[77px] font-messiri">

    <!-- Breadcrumb (ديسكتوب بس) -->
    <nav class="hidden min-[1280px]:flex items-center h-[32px] mb-[64px] text-[21px] leading-[1.5]" aria-label="مسار التنقل">
      @foreach ([[cms('keys_details.page.breadcrumb_home', 'الرئيسية'), route('home')], [cms('keys_details.page.breadcrumb_test', 'اختبار مفاتيح الشخصية السبعة'), route('keys.test')], [cms('keys_details.page.breadcrumb_result', 'نتيجة التقييم'), route('keys.result')]] as [$label, $href])
        <span class="flex items-center gap-[4px] pr-[4px]">
          <a href="{{ $href }}" class="text-[#6f6f6f] hover:text-brand-primary transition-colors">{{ $label }}</a>
          <i class="fa-solid fa-chevron-left text-[12px] text-[#6f6f6f] mx-[4px]" aria-hidden="true"></i>
        </span>
      @endforeach
      <span class="text-[#204a7a] pr-[4px]">{{ cms('keys_details.page.title', 'تفاصيل المفاتيح') }}</span>
    </nav>

    <h1 class="text-center text-[#204a7a] font-bold min-[1280px]:font-semibold text-[21px] leading-[28px] tracking-[-0.5px] min-[1280px]:tracking-normal min-[1280px]:text-[36px] min-[1280px]:leading-[1.5] min-[1280px]:h-[70px] min-[1280px]:flex min-[1280px]:items-center min-[1280px]:justify-center mb-[32px] min-[1280px]:mb-[64px]">{{ cms('keys_details.page.title', 'تفاصيل المفاتيح') }}</h1>

    <!-- الكروت: ديسكتوب 3 أعمدة / موبايل عمود واحد -->
    <section aria-label="{{ cms('keys_details.page.title', 'تفاصيل المفاتيح') }}">
      <div class="hidden min-[1280px]:flex items-start gap-[14px]">
        @foreach ($columns as $column)
          <div class="flex-1 min-w-0 flex flex-col gap-[32px]">
            @foreach ($column as $key)
              @include('landing.partials.keys-detail-card', ['key' => $key, 't' => $themeOf($key), 'v' => 'd', 'showDetails' => true])
            @endforeach
          </div>
        @endforeach
      </div>
      <div class="min-[1280px]:hidden flex flex-col gap-[24px]">
        @foreach ($keys as $key)
          @include('landing.partials.keys-detail-card', ['key' => $key, 't' => $themeOf($key), 'v' => 'm', 'showDetails' => true])
        @endforeach
      </div>
    </section>

    <!-- الأزرار -->
    <div class="kd-no-print mt-[48px] min-[1280px]:mt-[128px] flex items-center justify-between min-[1280px]:justify-center gap-[20px]">
      <a href="{{ route('keys.report', ['print' => 1]) }}" target="_blank" rel="noopener" class="w-[170px] min-[1280px]:w-[312px] h-[45px] min-[1280px]:h-[60px] rounded-[10px] min-[1280px]:rounded-[15px] border border-[#204a7a] text-[#204a7a] font-semibold text-[14px] min-[1280px]:text-[21px] leading-[1.5] flex items-center justify-center gap-[8px] hover:bg-[#204a7a] hover:text-white transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2 group">
        <span>{{ cms('keys_details.page.download', 'تحميل التقرير') }}</span>
        <img src="{{ $img }}/download.svg" alt="" class="w-[18px] h-[16px] min-[1280px]:w-[22px] min-[1280px]:h-[20px] group-hover:brightness-0 group-hover:invert transition" />
      </a>
      <a href="{{ route('keys.test') }}" class="w-[170px] min-[1280px]:w-[312px] h-[45px] min-[1280px]:h-[60px] rounded-[10px] min-[1280px]:rounded-[15px] bg-[#204a7a] hover:bg-[#102744] text-[#f6f6f6] font-semibold text-[14px] min-[1280px]:text-[21px] leading-[1.5] flex items-center justify-center gap-[8px] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
        <span>{{ cms('keys_details.page.retake', 'اعاده التقييم') }}</span>
        <img src="{{ $img }}/refresh.svg" alt="" class="size-[12px] min-[1280px]:w-[27px] min-[1280px]:h-[24px]" />
      </a>
    </div>
  </main>

  @include('landing.partials.footer')
</body>
</html>
