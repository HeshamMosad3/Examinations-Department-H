<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>اختبار عجلة الحياة | دار الرؤى للتدريب</title>

  <link rel="icon" type="image/png" href="/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @vite(['resources/css/app.css', 'resources/js/lifeWheelAssessment.js'])
</head>
<body class="bg-[#F8FAFC] text-brand-dark min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative">

  @include('home.components.navbar')

  <main class="w-full max-w-[1040px] mx-auto px-4 sm:px-6 lg:px-0 pt-2 md:pt-4 pb-16 md:pb-24 relative">

    <!-- Breadcrumb -->
    <nav class="flex items-center justify-start gap-2 mb-8 md:mb-10 font-messiri" aria-label="breadcrumb">
      <a href="/#home" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[15px] md:text-[18px] font-normal">الرئيسية</a>
      <i class="fa-solid fa-chevron-left text-[10px] md:text-[12px] text-[#6f6f6f]"></i>
      <span class="text-brand-primary text-[15px] md:text-[18px] font-medium">اختبار عجلة الحياة</span>
    </nav>

    <!-- Stepper (8 categories) -->
    <div id="lw-stepper" class="relative mb-10 md:mb-12 overflow-x-auto no-scrollbar"></div>

    <!-- Category header -->
    <div id="lw-category-header" class="mb-5 md:mb-6"></div>

    <!-- Reminder box (static) -->
    <div id="lw-reminder-box" class="bg-[#fffaf8] border border-[#ce9d42] rounded-2xl p-3.5 md:p-4 flex items-center gap-3 md:gap-4 mb-5 md:mb-6">
      <div class="flex items-center justify-center rounded-xl bg-[#fef9ec] w-[42px] h-[42px] md:w-[50px] md:h-[50px] shrink-0">
        <i class="fa-regular fa-lightbulb text-[#ce9d42] text-[17px] md:text-[20px]"></i>
      </div>
      <div class="text-right flex-1 min-w-0">
        <p class="font-messiri font-semibold text-[#262626] text-[14px] md:text-[17px]">تذكّر</p>
        <p class="font-messiri font-medium text-[#565656] text-[12.5px] md:text-[17px] mt-0.5 md:mt-1 leading-snug">اختر الإجابة الأقرب إليك لا توجد إجابة صحيحة أو خاطئة.</p>
      </div>
    </div>

    <!-- Answer scale legend (static, desktop reference row) -->
    <div class="hidden md:flex bg-white rounded-2xl shadow-card items-center justify-center gap-[77px] py-5 mb-4" id="lw-scale-legend"></div>

    <!-- Progress row (dynamic: X/10) -->
    <div id="lw-progress-row" class="flex items-center gap-3 mb-4 md:mb-6"></div>

    <!-- Questions list -->
    <div id="lw-questions" class="flex flex-col bg-white rounded-2xl shadow-card px-4 sm:px-5 md:px-6 divide-y divide-[#EEF1F6]"></div>

    <!-- Nav buttons -->
    <div id="lw-nav-buttons" class="flex items-center justify-between mt-8 md:mt-10 gap-4"></div>

  </main>

  <!-- Milestone celebration overlay -->
  <div id="lw-milestone-overlay" class="fixed inset-0 z-[200] hidden items-center justify-center bg-black/40 px-4">
    <div id="lw-milestone-card" class="bg-brand-primary rounded-[20px] md:rounded-[25px] shadow-2xl px-6 py-6 md:px-12 md:py-9 max-w-[820px] w-full flex items-center justify-center gap-4 md:gap-6 text-center">
      <span class="text-[34px] md:text-[44px] animate-bounce shrink-0">👏</span>
      <p id="lw-milestone-text" class="font-messiri font-semibold text-white text-[16px] md:text-[24px] leading-snug text-right"></p>
    </div>
  </div>

  @include('home.components.footer')

  

</body>
</html>
