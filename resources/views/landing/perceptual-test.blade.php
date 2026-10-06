<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('perceptual_test.seo.title', 'اختبار أنماط الإدراك | دار الرؤى للتدريب') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="description" content="{{ cms('perceptual_test.seo.description', 'أجب عن أسئلة أنماط الإدراك وتعرّف على أسلوبك في استقبال المعلومات والتعلّم، سواء كنت تميل إلى النمط البصري، السمعي، أو الحركي.') }}" />
  <meta name="robots" content="index, follow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="canonical" href="https://alruaa.com/perceptual-test.html" />

  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://alruaa.com/perceptual-test.html" />
  <meta property="og:title" content="{{ cms('perceptual_test.seo.title', 'اختبار أنماط الإدراك | دار الرؤى للتدريب') }}" />
  <meta property="og:description" content="{{ cms('perceptual_test.seo.share_description', 'اكتشف نمطك الإدراكي الغالب: بصري، سمعي، أو حسي.') }}" />
  <meta property="og:image" content="https://alruaa.com/images/hero_cover.png" />
  <meta property="og:locale" content="ar_SA" />

  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/perceptualTest.js']) }}
</head>
<body class="bg-brand-bg text-brand-dark min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">
    {{ cms('global.a11y.skip_link', 'تخطي إلى المحتوى الرئيسي') }}
  </a>

  @include('landing.partials.navbar')

  <!-- Figma: Desktop #3083:14974 / Mobile #3080:12206 -->
  <main id="main-content" class="w-full max-w-[1240px] mx-auto px-[15.5px] sm:px-6 lg:px-0 pt-4 md:pt-[48px] pb-[64px] md:pb-[128px] font-messiri">

    <!-- Mobile header: back button + title (#3080:12217) -->
    <div class="md:hidden flex items-center justify-start gap-[61px] mb-[24px]">
      <a href="/#assessments" class="size-[32px] p-[8px] rounded-full bg-[#e9edf2] flex items-center justify-center text-brand-primary shrink-0 hover:bg-[#d8e0ea] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary" aria-label="الرجوع للرئيسية">
        <i class="fa-solid fa-arrow-right text-[14px]" aria-hidden="true"></i>
      </a>
      <h1 class="text-[21px] font-bold text-[#204a7a] leading-[28px] tracking-[-0.5px]">{{ cms('perceptual_test.header.title', 'اختبار أنماط الإدراك') }}</h1>
    </div>

    <!-- Desktop breadcrumb (#3083:14979) -->
    <nav class="hidden md:flex items-center gap-2 h-[33px] mb-[64px]" aria-label="مسار التنقل">
      <a href="/#home" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[18px] font-normal">{{ cms('perceptual_test.header.breadcrumb_home', 'الرئيسية') }}</a>
      <i class="fa-solid fa-chevron-left text-[12px] text-[#6f6f6f]" aria-hidden="true"></i>
      <span class="text-brand-primary text-[18px] font-medium">{{ cms('perceptual_test.header.title', 'اختبار أنماط الإدراك') }}</span>
    </nav>

    <!-- Desktop title + description (#3083:14992) -->
    <div class="hidden md:flex flex-col items-center gap-[28px] max-w-[729px] mx-auto text-center mb-[64px]">
      <h2 class="text-[36px] font-semibold text-[#204a7a] leading-[1.5] -my-[15px]">{{ cms('perceptual_test.header.title', 'اختبار أنماط الإدراك') }}</h2>
      <p class="text-[21px] font-medium text-[#565656] leading-normal">{{ cms('perceptual_test.header.text', 'أجب عن أسئلة أنماط الإدراك وتعرّف على أسلوبك في استقبال المعلومات والتعلّم، سواء كنت تميل إلى النمط البصري، السمعي، أو الحركي.') }}</p>
    </div>

    <!-- Reminder box (#3083:14997 / #3080:12224) -->
    <div class="bg-[#fffaf8] border border-[#ce9d42] rounded-[16px] p-[16px] flex items-start gap-[12px] min-h-[76px] md:min-h-[91px] mb-[32px] md:mb-[45px]">
      <div class="bg-[#fef9ec] rounded-[12px] size-[36px] md:size-[50px] flex items-center justify-center shrink-0" aria-hidden="true">
        <img src="/landing/images/perceptual-test/lightbulb.svg" alt="" width="24" height="24" class="size-[18px] md:size-[24px]" />
      </div>
      <div class="flex flex-col min-w-0">
        <p class="text-[14px] md:text-[17px] font-bold md:font-semibold text-[#262626] leading-normal md:leading-[1.5]">{{ cms('perceptual_test.reminder.title', 'تذكّر') }}</p>
        <p class="text-[12px] md:text-[17px] font-medium text-[#565656] leading-normal pt-[2px]">{{ cms('perceptual_test.reminder.text', 'اختر الإجابة الأقرب إليك لا توجد إجابة صحيحة أو خاطئة.') }}</p>
      </div>
    </div>

    <!-- Progress (#3083:15007 / #3080:12235) -->
    <div class="flex items-center gap-0 md:gap-[8px] h-[16px] md:h-[20px] mb-[16px] md:mb-[48px]">
      <span id="pt-progress-text" class="min-w-[36px] -ml-[4px] md:ml-0font-cairo md:font-messiri font-bold md:font-semibold text-[12px] md:text-[17px] leading-[16px] md:leading-[1.5] text-[#2b5788] whitespace-nowrap" aria-live="polite"></span>
      <div class="flex-1 h-[8px] bg-[#e5e7eb] rounded-full overflow-hidden" role="progressbar" aria-label="تقدم الاختبار" aria-valuemin="0" id="pt-progress-bar">
        <div id="pt-progress-fill" class="h-full bg-[#2b5788] rounded-full transition-[width] duration-300 mr-0 ml-auto" style="width:0"></div>
      </div>
    </div>

    <!-- Quiz (#1429:4088 / #1509:49305) -->
    <div id="pt-quiz" class="flex flex-col gap-[48px] md:gap-[64px]">
      <div class="bg-white rounded-[16px] shadow-[0px_0px_3.2px_0px_rgba(32,74,122,0.2)] md:shadow-none px-[12px] py-[30px] md:px-[60px] lg:px-[144px] md:py-[100px]">
        <div class="flex flex-col items-center gap-[30px] md:gap-[67px] max-w-[952px] mx-auto">

          <!-- Question box: border with a gap on top for the icon -->
          <div class="relative w-full max-w-[307px] md:max-w-[913px] pt-[8px] md:pt-[16px]">
            <div class="border border-[#bac7d6] rounded-[15px] min-h-[97px] md:min-h-[234px] flex items-center justify-center px-[8px] md:px-[40px] pt-[22px] pb-[14px] md:py-[40px]">
              <p class="flex items-start justify-center gap-px md:gap-[8px] text-center max-w-[291px] md:max-w-[560px]">
                <span id="pt-question-number" class="font-bold md:font-medium text-[21px] md:text-[30px] text-[#204a7a] leading-normal shrink-0"></span>
                <span id="pt-question-text" class="font-medium text-[17px] md:text-[30px] text-[#262626] leading-[1.5] md:leading-normal"></span>
              </p>
            </div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 bg-white px-[12px] md:px-[35px]" aria-hidden="true">
              <img src="/landing/images/perceptual-test/thought-bubble.svg" alt="" width="40" height="38" class="w-[20px] h-[19px] md:w-[40px] md:h-[38px]" />
            </div>
          </div>

          <!-- Answers -->
          <div id="pt-options" role="radiogroup" aria-labelledby="pt-question-text" class="w-full flex flex-col gap-[22px] md:gap-[32px]"></div>
        </div>
      </div>

      <!-- Nav buttons -->
      <div id="pt-nav" class="flex items-center justify-between gap-4"></div>
    </div>

  </main>

  @include('landing.partials.footer')
  @include('landing.partials.login-modal')

  <script>
    window.PERCEPTUAL_QUESTIONS = {!! json_encode($questions ?? [], JSON_UNESCAPED_UNICODE) !!};
    window.PERCEPTUAL_RESULT_URL = @json(route('perceptual.result'));
  </script>
</body>
</html>
