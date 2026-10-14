<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('wheel_result.seo.title', 'نتيجة التقييم | دار الرؤى للتدريب') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="description" content="{{ cms('wheel_result.seo.description', 'تقرير نتيجة تقييم عجلة الحياة من دار الرؤى للتدريب. استعرض مؤشر التوازن العام وتحليل أداء كل جانب مع التوصيات التطويرية المخصصة.') }}" />
  <meta name="robots" content="noindex, follow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="canonical" href="https://alruaa.com/result.html" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://alruaa.com/result.html" />
  <meta property="og:title" content="{{ cms('wheel_result.seo.title', 'نتيجة التقييم | دار الرؤى للتدريب') }}" />
  <meta property="og:description" content="{{ cms('wheel_result.seo.share_description', 'تقرير نتيجة تقييم عجلة الحياة - مؤشر التوازن العام وتحليل الجوانب الحياتية.') }}" />
  <meta property="og:image" content="https://alruaa.com/images/hero_cover.png" />
  <meta property="og:locale" content="ar_SA" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ cms('wheel_result.seo.title', 'نتيجة التقييم | دار الرؤى للتدريب') }}" />
  <meta name="twitter:description" content="{{ cms('wheel_result.seo.share_description', 'تقرير نتيجة تقييم عجلة الحياة - مؤشر التوازن العام وتحليل الجوانب الحياتية.') }}" />
  <meta name="twitter:image" content="https://alruaa.com/images/hero_cover.png" />

  <!-- Structured Data (BreadcrumbList) -->
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@@type": "ListItem",
        "position": 1,
        "name": "الرئيسية",
        "item": "https://alruaa.com/"
      },
      {
        "@@type": "ListItem",
        "position": 2,
        "name": "اختبار عجلة الحياة",
        "item": "https://alruaa.com/life-wheel-assessment.html"
      },
      {
        "@@type": "ListItem",
        "position": 3,
        "name": "نتيجة التقييم",
        "item": "https://alruaa.com/result.html"
      }
    ]
  }
  </script>

  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/lifeWheelResult.js']) }}
</head>
<body class="page-wide-header bg-[#F6F6F6] text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white flex flex-col">
  <!-- Skip to Main Content Link -->
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">
    {{ cms('global.a11y.skip_link', 'تخطي إلى المحتوى الرئيسي') }}
  </a>

  @include('landing.partials.navbar')

  <main id="main-content" class="w-full max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-0 pt-4 lg:pt-12 pb-[39px] md:pb-[77px] flex-1 font-messiri">

    <!-- Hidden Accessible Page Title for screen readers & SEO -->
    <h1 class="sr-only">{{ cms('wheel_result.header.sr_title', 'تقرير نتيجة تقييم عجلة الحياة') }}</h1>

    <!-- Mobile header (Figma #3418:6296): العنوان في المنتصف وزر الرجوع يمين، ثم مسافة 32px -->
    <div class="md:hidden relative h-[32px] flex items-center justify-center mb-8 max-w-[480px] mx-auto">
      <a href="/life-wheel-assessment.html" class="absolute right-0 top-0 size-[32px] p-[8px] rounded-full bg-[#e9edf2] flex items-center justify-center hover:bg-[#d8e0ea] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary" aria-label="العودة لاختبار عجلة الحياة">
        <img src="/landing/icons/result/back-mobile.svg" alt="" width="18" height="18" class="size-[18px] -scale-x-100" aria-hidden="true" />
      </a>
      <h2 class="text-[21px] font-bold text-[#204a7a] leading-[28px] tracking-[-0.5px] text-center">{{ cms('wheel_result.header.title', 'نتيجة التقييم') }}</h2>
    </div>

    <!-- Desktop breadcrumb (Figma #3414:6356): 21px، والمسافة بعده 64px -->
    <nav class="hidden md:flex items-center justify-start mb-16" aria-label="مسار التنقل">
      <ol class="flex items-center">
        <li class="flex items-center gap-1 pr-1">
          <a href="/#home" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[21px] font-normal leading-[1.5] whitespace-nowrap">{{ cms('wheel_result.header.breadcrumb_home', 'الرئيسية') }}</a>
          <span class="relative shrink-0 size-[18px]" aria-hidden="true"><img src="/landing/icons/result/chevron.svg" alt="" class="absolute block max-w-none h-[13px] left-[33.33%] right-[27.78%] top-[calc(50%+1.5px)] -translate-y-1/2" /></span>
        </li>
        <li class="flex items-center gap-1 pr-1">
          <a href="/life-wheel-assessment.html" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[21px] font-normal leading-[1.5] whitespace-nowrap">{{ cms('wheel_result.header.breadcrumb_test', 'اختبار عجلة الحياة') }}</a>
          <span class="relative shrink-0 size-[18px]" aria-hidden="true"><img src="/landing/icons/result/chevron.svg" alt="" class="absolute block max-w-none h-[13px] left-[33.33%] right-[27.78%] top-[calc(50%+1.5px)] -translate-y-1/2" /></span>
        </li>
        <li class="flex items-center">
          <span class="text-[#204a7a] text-[21px] font-medium leading-normal whitespace-nowrap" aria-current="page">{{ cms('wheel_result.header.title', 'نتيجة التقييم') }}</span>
        </li>
      </ol>
    </nav>

    <!-- Desktop title (Figma #3414:6377): 36px semibold، ارتفاع 70px، والمسافة بعده 64px -->
    <h2 class="hidden md:flex items-center justify-center h-[70px] mb-16 text-[36px] font-semibold text-[#204a7a] leading-[1.5] text-center">{{ cms('wheel_result.header.title', 'نتيجة التقييم') }}</h2>

    <!-- Result row. Desktop: wheel card 630 + 27 gap + 581 column | Mobile: stacked with 32px gaps -->
    <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:gap-[27px] max-w-[480px] mx-auto lg:max-w-none">

      <!-- Wheel card (Figma #3414:6413 / #3418:6302) -->
      <section class="relative w-full lg:w-[50.81%] lg:shrink-0 aspect-[361/450] lg:aspect-[630/698] bg-white rounded-[20px] lg:rounded-[30px] shadow-[0px_5px_11.8px_0px_rgba(0,0,0,0.03)] overflow-hidden" aria-labelledby="wheel-card-title">
        <div class="absolute left-1/2 -translate-x-1/2 top-[6.44%] lg:top-[3.87%] w-[88.64%] lg:w-[92.38%] h-[33px] lg:h-[48px] pb-[13px] flex items-center justify-between border-b border-[#f1f5f9] text-[#262626]">
          <div class="flex items-center gap-2">
            <img src="/landing/icons/result/chart-pie.svg" alt="" width="21" height="20" class="h-[20px] w-auto" aria-hidden="true" />
            <h3 id="wheel-card-title" class="text-[17px] lg:text-[21px] font-semibold lg:font-bold leading-[1.5] lg:leading-normal whitespace-nowrap">{{ cms('wheel_result.summary.wheel_title', 'مخطط عجلة الحياة') }}</h3>
          </div>
          <span class="bg-[#f1f5f9] rounded-full px-3 py-1 text-[12px] lg:text-[14px] font-medium text-[#565656] leading-[1.5] lg:leading-normal whitespace-nowrap">{{ cms('wheel_result.summary.dimensions_badge', '8 أبعاد رئيسية') }}</span>
        </div>

        <svg id="wheelSvg" viewBox="0 0 361 450" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 size-full" preserveAspectRatio="xMidYMid meet"></svg>
      </section>

      <div class="flex flex-col gap-8 lg:gap-[28px] lg:flex-1 lg:min-w-0">

        <!-- Highest / Lowest (Figma #3414:6380 / #3418:6448): mobile عمودين ارتفاع 84، desktop فوق بعض ارتفاع 155 ومسافة 24 -->
        <div class="grid grid-cols-2 gap-3 lg:grid-cols-1 lg:gap-6">

          <!-- Highest (right in RTL) -->
          <div id="highest-card" class="h-[84px] lg:h-[155px] rounded-[16px] lg:rounded-[20px] border border-[#5c3e9b] px-4 lg:py-5 flex items-center justify-between bg-white">
            <div class="flex flex-col items-end gap-[6px] lg:gap-4 text-right">
              <span class="text-[10px] lg:text-[22px] font-semibold text-[#0d0d0d] lg:text-[#111] leading-[15px]">{{ cms('wheel_result.summary.highest', 'أعلى جانب') }}</span>
              <span class="flex flex-col items-end gap-[2px] lg:block font-bold leading-[1.5]">
                <span id="highest-name" class="block lg:inline text-[14px] lg:text-[24px]">--</span>
                <span id="highest-percent" class="block lg:inline text-[17px] lg:text-[24px] leading-[17px] lg:leading-[1.5]"></span>
              </span>
            </div>
            <div id="highest-icon-box" class="size-[40px] lg:size-[56px] rounded-[12px] flex items-center justify-center shrink-0" aria-hidden="true">
              <img id="highest-icon" src="" alt="" class="w-[24.7px] h-auto lg:w-auto lg:h-[32px]" />
            </div>
          </div>

          <!-- Lowest (left in RTL) -->
          <div id="lowest-card" class="h-[84px] lg:h-[155px] rounded-[16px] lg:rounded-[20px] border border-[#b8aa43] px-4 lg:py-5 flex items-center justify-between bg-white">
            <div class="flex flex-col items-end gap-[6px] lg:gap-4 text-right">
              <span class="text-[10px] lg:text-[22px] font-semibold text-[#111] leading-[15px]">{{ cms('wheel_result.summary.lowest', 'أقل جانب') }}</span>
              <span class="flex flex-col items-end gap-[2px] lg:block font-bold leading-[1.5]">
                <span id="lowest-name" class="block lg:inline text-[14px] lg:text-[24px]">--</span>
                <span id="lowest-percent" class="block lg:inline text-[16px] lg:text-[24px] leading-[17px] lg:leading-[1.5]"></span>
              </span>
            </div>
            <div id="lowest-icon-box" class="size-[40px] lg:size-[56px] rounded-[12px] flex items-center justify-center shrink-0" aria-hidden="true">
              <img id="lowest-icon" src="" alt="" class="w-[24.7px] h-auto lg:w-auto lg:h-[32px]" />
            </div>
          </div>

        </div>

        <!-- AI Insight (Figma #3414:6399 / #3418:6470) -->
        <div class="rounded-[16px] lg:rounded-[20px] border border-[#acc7e6] px-[15px] py-4 lg:pt-10 lg:pb-[58px] lg:px-[18px] min-h-[147px] lg:min-h-0 flex items-center lg:items-start" style="background-image: linear-gradient(-70.4deg, #d0e2fb 30.374%, #ffffff 93.014%);">
          <div class="flex items-start justify-between gap-2 lg:gap-3 w-full lg:min-h-[229px]">
            <div class="bg-[#204a7a] rounded-[12px] size-[41px] lg:size-[56px] flex items-center justify-center shrink-0" aria-hidden="true">
              <img src="/landing/icons/result/lightbulb.svg" alt="" width="32" height="32" class="size-[22px] lg:size-[32px]" />
            </div>
            <div class="flex flex-col items-end gap-[14px] lg:gap-10 flex-1 min-w-0 lg:max-w-[473px]">
              <div class="w-full flex items-center justify-between gap-3 lg:gap-[116px]">
                <h3 class="text-[#172554] text-[14px] lg:text-[25px] font-bold leading-normal whitespace-nowrap">{{ cms('wheel_result.summary.analysis_title', 'ماذا تعني هذه النتيجة؟') }}</h3>
                <span class="bg-white border border-[#b4cce6] rounded-full h-[22px] lg:h-[33px] px-3 py-1 flex items-center gap-1 shrink-0 text-[#204a7a] text-[10px] lg:text-[14px] font-medium lg:font-semibold leading-[16px]">
                  <img src="/landing/icons/result/sparkle.svg" alt="" width="13" height="13" class="size-[11px] lg:size-[13px]" aria-hidden="true" />
                  <span class="whitespace-nowrap">{{ cms('wheel_result.summary.analysis_badge', 'تحليل ذكي') }}</span>
                </span>
              </div>
              <p id="analysis-text" data-levels="{{ json_encode($overallLevels, JSON_UNESCAPED_UNICODE) }}" class="w-full lg:max-w-[455px] text-[#565656] text-[11px] lg:text-[20px] font-medium leading-[17.88px] lg:leading-[1.5] text-right">
                جاري تحليل النتيجة...
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Action Button (Figma #3414:6556 / #3418:6485): desktop 467x70 بعد 128px، mobile بعد 48px -->
    <div class="flex justify-center mt-12 lg:mt-32 max-w-[480px] mx-auto lg:max-w-none">
      <button id="viewReportBtn" class="bg-[#204a7a] text-[#e9edf2] font-semibold w-full lg:w-[467px] py-3 px-6 lg:h-[70px] rounded-[10px] lg:rounded-[15px] hover:bg-[#1a3b62] transition-colors flex items-center justify-center gap-2 cursor-pointer text-[14px] lg:text-[25px] leading-[1.5]"
        @auth data-details-url="{{ route('life-wheel.details') }}" data-save-url="{{ route('life-wheel.results.store') }}" @else data-auth-gate="life-wheel" @endauth>
        <span class="whitespace-nowrap">{{ cms('wheel_result.summary.details_button', 'عرض جوانب التقرير') }}</span>
        <img src="/landing/icons/result/arrow-left.svg" alt="" width="24" height="24" class="size-[12px] lg:size-[24px]" aria-hidden="true" />
      </button>
    </div>

  </main>

  @include('landing.partials.footer')
  

  @guest
    @include('landing.partials.auth-dialogs')
  @endguest

<script>
    window.WHEEL_OF_LIFE_DB = {!! json_encode($categories ?? []) !!};
</script>

</body>
</html>
