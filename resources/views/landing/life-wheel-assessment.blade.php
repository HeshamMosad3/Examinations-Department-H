<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>اختبار عجلة الحياة | دار الرؤى للتدريب</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="description" content="اختبار عجلة الحياة التفاعلي المجاني من دار الرؤى للتدريب. قيّم توازنك عبر 8 جوانب أساسية في حياتك واكتشف مؤشرات تطورك الشخصي والمهني." />
  <meta name="robots" content="index, follow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="canonical" href="https://alruaa.com/life-wheel-assessment.html" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://alruaa.com/life-wheel-assessment.html" />
  <meta property="og:title" content="اختبار عجلة الحياة | دار الرؤى للتدريب" />
  <meta property="og:description" content="اختبار عجلة الحياة التفاعلي - قيّم مستوى توازنك في 8 جوانب حياتية واحصل على تقريرك الفوري." />
  <meta property="og:image" content="https://alruaa.com/images/hero_cover.png" />
  <meta property="og:locale" content="ar_SA" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="اختبار عجلة الحياة | دار الرؤى للتدريب" />
  <meta name="twitter:description" content="اختبار عجلة الحياة التفاعلي - قيّم مستوى توازنك في 8 جوانب حياتية واحصل على تقريرك الفوري." />
  <meta name="twitter:image" content="https://alruaa.com/images/hero_cover.png" />

  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "Quiz",
    "name": "اختبار عجلة الحياة",
    "description": "تقييم تفاعلي شامل لتوازن الحياة عبر 8 جوانب حياتية رئيسية.",
    "educationalUse": "تقييم وتطوير الذات",
    "provider": {
      "@@type": "EducationalOrganization",
      "name": "دار الرؤى للتدريب",
      "url": "https://alruaa.com/"
    }
  }
  </script>

  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/lifeWheelAssessment.js']) }}
</head>
<body class="bg-[#F8FAFC] text-brand-dark min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <!-- Skip to Main Content Link -->
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">
    تخطي إلى المحتوى الرئيسي
  </a>

  @include('landing.partials.navbar')

  <main id="main-content" class="w-full max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-0 pt-6 sm:pt-8 md:pt-10 pb-16 md:pb-24 relative">

    <!-- Hidden Accessible Primary Heading for SEO and Screen Readers -->
    <h1 class="sr-only">اختبار عجلة الحياة - دار الرؤى للتدريب</h1>

    <!-- Mobile header: back button + title -->
    <div id="lw-mobile-header" class="md:hidden relative h-[32px] flex items-center justify-center mb-5 font-messiri">
      <a href="/#home" class="absolute right-0 top-0 size-[32px] p-[8px] rounded-full bg-[#e9edf2] flex items-center justify-center text-brand-primary hover:bg-[#d8e0ea] transition-colors shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary" aria-label="الرجوع للرئيسية">
        <i class="fa-solid fa-arrow-right text-[14px]" aria-hidden="true"></i>
      </a>
      <h1 class="text-[19px] font-bold text-[#204a7a] leading-[28px] tracking-[-0.5px] text-center">اختبار عجلة الحياة</h1>
    </div>

    <!-- Desktop full breadcrumb -->
    <nav id="lw-desktop-breadcrumb" class="hidden md:flex items-center justify-start gap-2 mb-10 font-messiri" aria-label="مسار التنقل">
      <div class="flex items-center gap-2">
        <a href="/#home" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[15px] md:text-[18px] font-normal">الرئيسية</a>
        <i class="fa-solid fa-chevron-left text-[10px] md:text-[12px] text-[#6f6f6f]" aria-hidden="true"></i>
        <span class="text-brand-primary text-[15px] md:text-[18px] font-medium">اختبار عجلة الحياة</span>
      </div>
    </nav>

    <!-- Stepper (8 categories) -->
    <div id="lw-stepper" class="relative mb-6 md:mb-12 w-full select-none"></div>

    <!-- Category header -->
    <div id="lw-category-header" class="mb-5 md:mb-6"></div>

    <!-- Reminder box (static) -->
    <div id="lw-reminder-box" class="bg-[#fffaf8] border border-[#ce9d42] rounded-2xl p-3.5 md:p-4 flex items-center gap-3 md:gap-4 mb-5 md:mb-6">
      <div class="flex items-center justify-center rounded-xl bg-[#fef9ec] w-[42px] h-[42px] md:w-[50px] md:h-[50px] shrink-0" aria-hidden="true">
        <i class="fa-regular fa-lightbulb text-[#ce9d42] text-[17px] md:text-[20px]"></i>
      </div>
      <div class="text-right flex-1 min-w-0">
        <p class="font-messiri font-semibold text-[#262626] text-[14px] md:text-[17px]">تذكّر</p>
        <p class="font-messiri font-medium text-[#565656] text-[12.5px] md:text-[17px] mt-0.5 md:mt-1 leading-snug">اختر الإجابة الأقرب إليك لا توجد إجابة صحيحة أو خاطئة.</p>
      </div>
    </div>

    <!-- Answer scale legend (reference row) -->
    <div class="flex bg-white rounded-2xl shadow-card items-center justify-center w-full mx-auto py-3.5 sm:py-5 px-2.5 sm:px-6 mb-4 gap-2.5 min-[360px]:gap-3 min-[390px]:gap-4 sm:gap-6 md:gap-8 lg:gap-10 xl:gap-[77px] overflow-hidden" id="lw-scale-legend"></div>

    <!-- Progress row (dynamic: X/10) -->
    <div id="lw-progress-row" class="flex items-center gap-3 mb-4 md:mb-6"></div>

    <!-- Questions list -->
    <div id="lw-questions" class="flex flex-col bg-white rounded-2xl shadow-card px-3 sm:px-5 md:px-6 divide-y divide-[#EEF1F6]"></div>

    <!-- Nav buttons -->
    <div id="lw-nav-buttons" class="flex items-center justify-between mt-8 md:mt-10 gap-4"></div>

  </main>

  <!-- Milestone celebration overlay -->
  <div id="lw-milestone-overlay" role="status" aria-live="polite" class="fixed inset-0 z-[200] hidden items-center justify-center bg-black/40 px-4">
      <div id="lw-milestone-card" class="bg-brand-primary rounded-[16px] md:rounded-[24px] shadow-2xl px-5 py-4 md:px-10 md:py-6 w-[95%] sm:w-auto max-w-[352px] md:max-w-[650px] flex items-center justify-center gap-[8px] md:gap-[16px]">
        <!-- In RTL, the first element appears on the right. -->
        <div id="lw-milestone-icon" class="shrink-0 w-[44px] h-[44px] md:w-[65px] md:h-[65px] lg:w-[75px] lg:h-[75px] flex items-center justify-center"></div>
        <p id="lw-milestone-text" class="font-messiri font-semibold text-white text-[14px] md:text-[22px] lg:text-[26px] leading-snug text-right m-0"></p>
      </div>
    </div>
    </div>

  @include('landing.partials.footer')
  @include('landing.partials.login-modal')



<script>
    window.WHEEL_OF_LIFE_DB = {!! json_encode($categories ?? []) !!};
    @auth
    window.LW_SAVE_URL = @json(route('life-wheel.results.store'));
    @endauth
</script>

<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
</body>
</html>
