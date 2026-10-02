<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>نتيجة التقييم | دار الرؤى للتدريب</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="description" content="تقرير نتيجة تقييم عجلة الحياة من دار الرؤى للتدريب. استعرض مؤشر التوازن العام وتحليل أداء كل جانب مع التوصيات التطويرية المخصصة." />
  <meta name="robots" content="noindex, follow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="canonical" href="https://alruaa.com/result.html" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://alruaa.com/result.html" />
  <meta property="og:title" content="نتيجة التقييم | دار الرؤى للتدريب" />
  <meta property="og:description" content="تقرير نتيجة تقييم عجلة الحياة - مؤشر التوازن العام وتحليل الجوانب الحياتية." />
  <meta property="og:image" content="https://alruaa.com/images/hero_cover.png" />
  <meta property="og:locale" content="ar_SA" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="نتيجة التقييم | دار الرؤى للتدريب" />
  <meta name="twitter:description" content="تقرير نتيجة تقييم عجلة الحياة - مؤشر التوازن العام وتحليل الجوانب الحياتية." />
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
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/lifeWheelResult.js', 'resources/landing/js/resultWheel.js']) }}
</head>
<body class="page-wide-header bg-[#F6F6F6] text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white flex flex-col">
  <!-- Skip to Main Content Link -->
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">
    تخطي إلى المحتوى الرئيسي
  </a>

  @include('landing.partials.navbar')

  <main id="main-content" class="w-full max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-0 pt-6 sm:pt-8 md:pt-10 pb-16 lg:pb-32 flex-1">
    
    <!-- Hidden Accessible Page Title for screen readers & SEO -->
    <h1 class="sr-only">تقرير نتيجة تقييم عجلة الحياة</h1>

    <!-- Mobile header: back button + title -->
    <div class="md:hidden relative h-[32px] flex items-center justify-center mb-5 font-messiri">
      <a href="/life-wheel-assessment.html" class="absolute right-0 top-0 size-[32px] p-[8px] rounded-full bg-[#e9edf2] flex items-center justify-center text-brand-primary hover:bg-[#d8e0ea] transition-colors shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary" aria-label="العودة لاختبار عجلة الحياة">
        <i class="fa-solid fa-arrow-right text-[14px]" aria-hidden="true"></i>
      </a>
      <h1 class="text-[19px] font-bold text-[#204a7a] leading-[28px] tracking-[-0.5px] text-center">نتيجة التقييم</h1>
    </div>

    <!-- Desktop full breadcrumb -->
    <nav class="hidden md:flex items-center justify-start gap-2 mb-8 lg:mb-16 font-messiri" aria-label="مسار التنقل">
      <div class="flex items-center gap-2">
        <a href="/#home" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[15px] md:text-[18px] font-normal">الرئيسية</a>
        <i class="fa-solid fa-chevron-left text-[10px] md:text-[12px] text-[#6f6f6f]" aria-hidden="true"></i>
        <a href="/life-wheel-assessment.html" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[15px] md:text-[18px] font-normal">اختبار عجلة الحياة</a>
        <i class="fa-solid fa-chevron-left text-[10px] md:text-[12px] text-[#6f6f6f]" aria-hidden="true"></i>
        <span class="text-brand-primary text-[15px] md:text-[18px] font-medium">نتيجة التقييم</span>
      </div>
    </nav>

    <div class="flex flex-col gap-8 lg:gap-16">
      
      <!-- Top Section: Chart and Gauge -->
      <div class="flex flex-col lg:flex-row gap-8 lg:gap-10">
        
        <!-- Gauge Chart (Overall Score) -->
        <div class="bg-white rounded-[16px] sm:rounded-[20px] lg:rounded-[24px] shadow-sm p-4 sm:p-6 lg:p-8 w-full lg:w-[320px] shrink-0 flex flex-row lg:flex-col items-center justify-between lg:justify-center gap-3 sm:gap-6 lg:gap-0">
          
          <div class="flex-1 flex flex-col justify-center text-right lg:contents">
            <h2 class="font-messiri font-bold text-[#1D436E] text-[15px] sm:text-[17px] lg:text-[22px] mb-1.5 lg:mb-8 lg:order-1 lg:w-full lg:text-center">
              مؤشر التوازن العام
            </h2>
            <p id="gauge-desc" class="font-messiri text-[#6f6f6f] text-[11px] sm:text-[12px] lg:text-[15px] leading-relaxed lg:order-3 lg:mt-4 lg:px-2 lg:text-center">
              أنت تسير في الطريق الصحيح حافظ على توازنك واستمر في تطوير نفسك
            </p>
          </div>
          
          <div class="relative w-[130px] min-[360px]:w-[137px] sm:w-[155px] lg:w-full lg:max-w-[240px] aspect-[137/101] lg:aspect-[4/3] shrink-0 lg:order-2 lg:mb-6 lg:mx-auto">
            <canvas id="gaugeChart" role="img" aria-label="رسم بياني لمؤشر التوازن العام"></canvas>
            <div class="absolute inset-0 flex flex-col items-center justify-center pt-5 min-[360px]:pt-6 sm:pt-7 lg:pt-10">
              <span id="gauge-score" class="font-bold text-[24px] min-[360px]:text-[28px] sm:text-[32px] lg:text-[56px] text-[#111827] leading-none">0%</span>
              <span id="gauge-level" class="font-messiri font-bold text-[10.5px] min-[360px]:text-[12px] sm:text-[13px] lg:text-[18px] text-[#20AD70] mt-0.5 lg:mt-1">مستوى متميز</span>
            </div>
          </div>

        </div>

        <!-- Polar Chart (Life Wheel) -->
        <div class="bg-white rounded-[16px] sm:rounded-[20px] lg:rounded-[24px] shadow-sm p-4 sm:p-6 lg:p-8 flex-1 relative flex flex-col">
          <h2 class="font-messiri font-bold text-[#1D436E] text-[18px] md:text-[22px] mb-2 sm:mb-4 lg:mb-2 text-right">مجالات التوازن</h2>
          <div class="flex-1 flex items-center justify-center relative w-full py-1">
            <!-- Wheel container matching Figma sizing: larger width on mobile & desktop -->
            <div class="relative w-full max-w-[350px] min-[390px]:max-w-[385px] sm:max-w-[440px] md:max-w-[480px] lg:max-w-[500px] xl:max-w-[530px] mx-auto flex items-center justify-center overflow-visible aspect-[834.43/869.75]">
              <div id="wheel-wrap" class="w-full h-full relative z-10">
                <svg id="wheelSvg" viewBox="0 0 834.43 869.75" xmlns="http://www.w3.org/2000/svg" class="w-full h-full overflow-visible" style="overflow: visible;"></svg>
              </div>

              <!-- Center Score Overlay perfectly sized to match the empty SVG hole -->
              <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
                <div class="bg-white rounded-full shadow-sm flex flex-col items-center justify-center border border-[#f0f0f0] w-[17.7%] aspect-square">
                  <span id="center-score" class="font-bold text-[15px] sm:text-[18px] md:text-[22px] lg:text-[24px] text-[#21487B] leading-none mb-0.5">0%</span>
                  <span class="text-[#21487B] text-[8.5px] sm:text-[9.5px] md:text-[11px] lg:text-[12px] font-messiri font-semibold leading-none">التوازن العام</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Bottom Section: Analysis and Highlights (Figma #3083:11353 on Desktop, #3080:8190 on Mobile) -->
      <div class="flex flex-col lg:flex-row items-stretch gap-4 sm:gap-6 lg:gap-10">
        
        <!-- Highest and Lowest Cards (Figma #3080:8282 on Mobile: top in 2 cols; Figma #3083:11368 on Desktop: left stack) -->
        <div class="w-full lg:w-[420px] xl:w-[460px] shrink-0 grid grid-cols-2 lg:grid-cols-1 gap-3 sm:gap-4 order-1 lg:order-2">
            
          <!-- Highest (Right in RTL on mobile) -->
          <div id="highest-card" class="bg-gradient-to-l from-[#5c3e9b]/20 to-white border border-[#8b5cf6]/40 rounded-[16px] sm:rounded-[20px] p-3 sm:p-5 flex items-center justify-between shadow-sm transition-all">
            <div class="flex flex-col items-start gap-0.5 sm:gap-1 text-right">
              <span class="font-messiri font-semibold text-[#111111] text-[12px] min-[360px]:text-[13px] sm:text-[16px]">أعلى جانب</span>
              <span id="highest-value" class="font-messiri font-bold text-[#8b5cf6] text-[14px] min-[360px]:text-[16px] sm:text-[20px]">--</span>
            </div>
            <div id="highest-icon-box" class="w-[38px] h-[38px] sm:w-[52px] sm:h-[52px] rounded-xl bg-[#8b5cf6]/20 flex items-center justify-center shrink-0" aria-hidden="true">
              <span id="highest-icon" class="lw-icon-mask w-[20px] h-[20px] sm:w-[28px] sm:h-[28px] text-[#8b5cf6]" style="--icon-url:url('')"></span>
            </div>
          </div>

          <!-- Lowest (Left in RTL on mobile) -->
          <div id="lowest-card" class="bg-gradient-to-l from-[#fbbaba]/20 to-white border border-[#f97316]/40 rounded-[16px] sm:rounded-[20px] p-3 sm:p-5 flex items-center justify-between shadow-sm transition-all">
            <div class="flex flex-col items-start gap-0.5 sm:gap-1 text-right">
              <span class="font-messiri font-semibold text-[#111111] text-[12px] min-[360px]:text-[13px] sm:text-[16px]">أقل جانب</span>
              <span id="lowest-value" class="font-messiri font-bold text-[#f97316] text-[14px] min-[360px]:text-[16px] sm:text-[20px]">--</span>
            </div>
            <div id="lowest-icon-box" class="w-[38px] h-[38px] sm:w-[52px] sm:h-[52px] rounded-xl bg-[#f97316]/20 flex items-center justify-center shrink-0" aria-hidden="true">
              <span id="lowest-icon" class="lw-icon-mask w-[20px] h-[20px] sm:w-[28px] sm:h-[28px] text-[#f97316]" style="--icon-url:url('')"></span>
            </div>
          </div>

        </div>

        <!-- Text Analysis (Figma: AI Insight #3080:8303 on Mobile: below high/low; #3083:11354 on Desktop: right side in RTL) -->
        <div class="bg-gradient-to-tr from-white to-[#dbeafe] border border-blue-100 rounded-[16px] sm:rounded-[20px] p-4 sm:p-6 lg:p-10 flex-1 flex flex-col justify-center relative overflow-hidden order-2 lg:order-1 shadow-sm">
          <div class="flex items-center justify-between mb-3 lg:mb-4 relative z-10 gap-2 sm:gap-3">
            <div class="flex items-center gap-2.5 sm:gap-3">
              <div class="w-[38px] h-[38px] sm:w-[48px] sm:h-[48px] lg:w-[56px] lg:h-[56px] bg-[#1a3b62] rounded-xl flex items-center justify-center shrink-0 shadow-sm" aria-hidden="true">
                <i class="fa-regular fa-lightbulb text-white text-[18px] sm:text-[22px] lg:text-[26px]"></i>
              </div>
              <h2 class="font-messiri font-bold text-[#172554] text-[15px] sm:text-[19px] lg:text-[25px]">ماذا تعني هذه النتيجة؟</h2>
            </div>
            <div class="bg-white/80 border border-blue-200/50 px-2.5 sm:px-3 lg:px-4 py-1 sm:py-1.5 rounded-full flex items-center gap-1 sm:gap-1.5 shrink-0">
              <span class="text-[10px] sm:text-[12px] lg:text-[14px] font-semibold text-[#1a3b62] font-messiri">تحليل ذكي</span>
              <i class="fa-solid fa-wand-magic-sparkles text-[9px] sm:text-[11px] lg:text-[13px] text-[#1a3b62]" aria-hidden="true"></i>
            </div>
          </div>
          
          <p id="analysis-text" class="font-messiri text-[#565656] text-[12px] sm:text-[15px] lg:text-[19px] leading-relaxed text-right relative z-10 mt-1 sm:mt-2">
            جاري تحليل النتيجة...
          </p>
        </div>

      </div>
      
      <!-- Action Button -->
      <div class="flex justify-center mt-8 lg:mt-[128px]">
        <button id="viewReportBtn" class="bg-[#1a3b62] text-white font-messiri font-bold text-[16px] md:text-[20px] w-full max-w-[467px] h-[60px] md:h-[70px] rounded-[15px] hover:bg-[#112948] transition-colors flex items-center justify-center gap-[8px] shadow-md cursor-pointer"
          @auth data-details-url="{{ route('life-wheel.details') }}" data-save-url="{{ route('life-wheel.results.store') }}" @else aria-haspopup="dialog" aria-controls="authModal" @endauth>
          <span>عرض جوانب التقرير</span>
          <i class="fa-solid fa-arrow-left text-[14px]" aria-hidden="true"></i>
        </button>
      </div>

    </div>
  </main>

  @include('landing.partials.footer')
  @include('landing.partials.login-modal', ['loginNext' => 'life-wheel'])
  

  <!-- Auth Modal -->
  <div id="authModal" role="dialog" aria-modal="true" aria-labelledby="auth-modal-title" aria-describedby="auth-modal-desc" class="fixed inset-0 z-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <!-- Backdrop -->
    <div id="authModalBackdrop" class="absolute inset-0 bg-[#000000]/60 backdrop-blur-sm" aria-hidden="true"></div>
    
    <!-- Modal Content -->
    <div id="authModalContent" class="relative bg-white rounded-[24px] w-[90%] max-w-[746px] p-8 md:p-12 flex flex-col items-center text-center shadow-2xl scale-95 transition-transform duration-300">
      
      <!-- Close Button -->
      <button id="closeAuthModal" aria-label="إغلاق النافذة" class="absolute top-6 left-6 text-[#999999] hover:text-[#1a3b62] transition-colors cursor-pointer">
        <i class="fa-solid fa-xmark text-[24px]" aria-hidden="true"></i>
      </button>

      <!-- Icon -->
      <div class="w-[80px] h-[80px] rounded-full bg-[#f4f7fb] flex items-center justify-center mb-6 text-[#1a3b62]" aria-hidden="true">
        <i class="fa-solid fa-lock text-[32px]"></i>
      </div>

      <!-- Title & Subtitle -->
      <h3 id="auth-modal-title" class="font-messiri font-bold text-[24px] md:text-[32px] text-[#1a3b62] mb-4">سجّل الدخول للوصول إلى تقريرك</h3>
      <p id="auth-modal-desc" class="font-messiri text-[15px] md:text-[18px] text-[#6f6f6f] max-w-[500px] mb-10 leading-relaxed">
        للاطلاع على تفاصيل تقريرك، يرجى تسجيل الدخول أو إنشاء حساب اذا لم يكن لديك حساب.
      </p>

      <!-- Buttons -->
      <div class="flex flex-col w-full max-w-[682px] gap-4">
        <a href="{{ route('login', ['next' => 'life-wheel']) }}" class="w-full h-[60px] bg-[#1a3b62] text-white rounded-[15px] flex items-center justify-center gap-3 hover:bg-[#112948] transition-colors font-messiri font-bold text-[18px]">
          <span>تسجيل دخول</span>
          <i class="fa-solid fa-arrow-right-to-bracket text-[18px]" aria-hidden="true"></i>
        </a>
        <a href="{{ route('register', ['next' => 'life-wheel']) }}" class="w-full h-[60px] bg-transparent border-2 border-[#1a3b62] text-[#1a3b62] rounded-[15px] flex items-center justify-center gap-3 hover:bg-[#f4f7fb] transition-colors font-messiri font-bold text-[18px]">
          <span>إنشاء حساب جديد</span>
          <i class="fa-regular fa-user text-[18px]" aria-hidden="true"></i>
        </a>
      </div>

    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const modal = document.getElementById('authModal');
      const content = document.getElementById('authModalContent');
      const openBtn = document.getElementById('viewReportBtn');
      const closeBtn = document.getElementById('closeAuthModal');
      const backdrop = document.getElementById('authModalBackdrop');
      let triggerBtn = null;

      function openModal() {
        triggerBtn = document.activeElement;
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.setAttribute('aria-hidden', 'false');
        content.classList.remove('scale-95');
        content.classList.add('scale-100');
        if (closeBtn) closeBtn.focus();
      }

      function closeModal() {
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.setAttribute('aria-hidden', 'true');
        content.classList.remove('scale-100');
        content.classList.add('scale-95');
        if (triggerBtn && typeof triggerBtn.focus === 'function') {
          triggerBtn.focus();
        }
      }

      @guest
      if (openBtn) openBtn.addEventListener('click', openModal);
      @endguest
      if (closeBtn) closeBtn.addEventListener('click', closeModal);
      if (backdrop) backdrop.addEventListener('click', closeModal);

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('pointer-events-none')) {
          closeModal();
        }
      });
    });
  </script>


<script>
    window.WHEEL_OF_LIFE_DB = {!! json_encode($categories ?? []) !!};
</script>

</body>
</html>
