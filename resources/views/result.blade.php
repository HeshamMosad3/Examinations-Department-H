<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>نتيجة التقييم | دار الرؤى للتدريب</title>

  <link rel="icon" type="image/png" href="/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  @vite(['resources/css/app.css', 'resources/js/lifeWheelResult.js'])
</head>
<body class="bg-[#F6F6F6] text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white flex flex-col">

  @include('home.components.navbar')

  <main class="w-full max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-0 pt-2 lg:pt-4 pb-16 lg:pb-32 flex-1">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center justify-start gap-2 mb-8 lg:mb-16 font-messiri" aria-label="breadcrumb">
      <a href="/#home" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[15px] md:text-[18px] font-normal">الرئيسية</a>
      <i class="fa-solid fa-chevron-left text-[10px] md:text-[12px] text-[#6f6f6f]"></i>
      <a href="/life-wheel-assessment" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[15px] md:text-[18px] font-normal">اختبار عجلة الحياة</a>
      <i class="fa-solid fa-chevron-left text-[10px] md:text-[12px] text-[#6f6f6f]"></i>
      <span class="text-brand-primary text-[15px] md:text-[18px] font-medium">نتيجة التقييم</span>
    </nav>

    <div class="flex flex-col gap-8 lg:gap-16">
      
      <!-- Top Section: Chart and Gauge -->
      <div class="flex flex-col lg:flex-row gap-8 lg:gap-10">
        
        <!-- Gauge Chart (Overall Score) -->
        <div class="bg-white rounded-[24px] shadow-sm p-6 md:p-8 w-full lg:w-[320px] shrink-0 flex flex-col items-center text-center">
          <h2 class="font-messiri font-bold text-[#1a3b62] text-[18px] md:text-[22px] mb-8 w-full text-center">مؤشر التوازن العام</h2>
          
          <div class="relative w-full max-w-[240px] aspect-[4/3] mx-auto mb-6">
            <canvas id="gaugeChart"></canvas>
            <div class="absolute inset-0 flex flex-col items-center justify-center pt-10">
              <span id="gauge-score" class="font-bold text-[56px] text-[#1a3b62] leading-none">0%</span>
              <span id="gauge-level" class="font-messiri font-bold text-[18px] text-[#20AD70] mt-1">مستوى متميز</span>
            </div>
          </div>

          <p class="font-messiri text-[#6f6f6f] text-[13px] md:text-[15px] leading-relaxed mt-4 px-2 text-center">
            أنت تسير في الطريق الصحيح حافظ على توازنك واستمر في تطوير نفسك
          </p>
        </div>

        <!-- Polar Chart (Life Wheel) -->
        <div class="bg-white rounded-[24px] shadow-sm p-6 md:p-8 flex-1 relative flex flex-col overflow-hidden">
          <h2 class="font-messiri font-bold text-[#1a3b62] text-[18px] md:text-[22px] mb-6">مجالات التوازن</h2>
          <div class="flex-1 flex items-center justify-center relative min-h-[350px] md:min-h-[450px]">
            <div id="wheel-container" class="relative w-full max-w-[500px] mx-auto aspect-square flex items-center justify-center">
              <svg id="wheelSvg" viewBox="0 0 834 834" class="w-full h-full overflow-visible" style="overflow: visible;"></svg>
            </div>
            
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="bg-white rounded-full w-[90px] h-[90px] md:w-[110px] md:h-[110px] shadow-sm flex flex-col items-center justify-center z-10 border border-[#f0f0f0]">
                    <span id="center-score" class="font-bold text-[22px] md:text-[28px] text-[#1a3b62] leading-none mb-1">0%</span>
                    <span class="text-[#6f6f6f] text-[10px] md:text-[12px] font-messiri">التوازن العام</span>
                </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Bottom Section: Analysis and Highlights -->
      <div class="flex flex-col lg:flex-row gap-8 lg:gap-10">
        
        <!-- Highest and Lowest -->
        <div class="w-full lg:w-[320px] shrink-0 flex flex-col gap-[10px]">
            
          <!-- Lowest -->
          <div id="lowest-card" class="bg-[#fffaf5] border border-[#f97316]/30 rounded-[20px] py-[20px] px-[16px] flex items-center justify-between">
            <div class="flex flex-col items-start gap-1 text-right">
              <span class="font-messiri font-bold text-[#262626] text-[16px]">أقل جانب</span>
              <span id="lowest-value" class="font-messiri font-bold text-[#f97316] text-[18px] md:text-[20px]">--</span>
            </div>
            <div id="lowest-icon-box" class="w-[48px] h-[48px] rounded-xl bg-[#f97316]/10 flex items-center justify-center shrink-0">
              <span id="lowest-icon" class="lw-icon-mask w-[24px] h-[24px] text-[#f97316]" style="--icon-url:url('')"></span>
            </div>
          </div>

          <!-- Highest -->
          <div id="highest-card" class="bg-[#fcfaff] border border-[#8b5cf6]/30 rounded-[20px] py-[20px] px-[16px] flex items-center justify-between">
            <div class="flex flex-col items-start gap-1 text-right">
              <span class="font-messiri font-bold text-[#262626] text-[16px]">أعلى جانب</span>
              <span id="highest-value" class="font-messiri font-bold text-[#8b5cf6] text-[18px] md:text-[20px]">--</span>
            </div>
            <div id="highest-icon-box" class="w-[48px] h-[48px] rounded-xl bg-[#8b5cf6]/10 flex items-center justify-center shrink-0">
              <span id="highest-icon" class="lw-icon-mask w-[24px] h-[24px] text-[#8b5cf6]" style="--icon-url:url('')"></span>
            </div>
          </div>

        </div>

        <!-- Text Analysis -->
        <div class="bg-[#f0f5ff] rounded-[24px] py-[44px] px-[16px] flex-1 flex flex-col justify-center relative overflow-hidden">
          <div class="flex items-center justify-between mb-5 relative z-10">
            <div class="flex items-center gap-3">
              <div class="w-[42px] h-[42px] bg-[#1a3b62] rounded-xl flex items-center justify-center shrink-0">
                <i class="fa-solid fa-scale-balanced text-white text-[18px]"></i>
              </div>
              <h2 class="font-messiri font-bold text-[#1a3b62] text-[18px] md:text-[22px]">ماذا تعني هذه النتيجة؟</h2>
            </div>
            <div class="bg-white/60 backdrop-blur-sm px-4 py-1.5 rounded-full flex items-center gap-2">
              <span class="text-[12px] font-bold text-[#1a3b62]">تحليل ذكي</span>
              <i class="fa-solid fa-wand-magic-sparkles text-[12px] text-[#1a3b62]"></i>
            </div>
          </div>
          
          <p id="analysis-text" class="font-messiri text-[#333333] text-[14px] md:text-[18px] leading-relaxed text-right relative z-10 mt-2">
            جاري تحليل النتيجة...
          </p>
        </div>

      </div>
      
      <!-- Action Button -->
      <div class="flex justify-center mt-8 lg:mt-[128px]">
        <button id="viewReportBtn" class="bg-[#1a3b62] text-white font-messiri font-bold text-[16px] md:text-[20px] w-full max-w-[467px] h-[60px] md:h-[70px] rounded-[15px] hover:bg-[#112948] transition-colors flex items-center justify-center gap-[8px] shadow-md">
          <span>عرض جوانب التقرير</span>
          <i class="fa-solid fa-arrow-left text-[14px]"></i>
        </button>
      </div>

    </div>
  </main>

  @include('home.components.footer')
  
  

  <!-- Auth Modal -->
  <div id="authModal" class="fixed inset-0 z-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <!-- Backdrop -->
    <div id="authModalBackdrop" class="absolute inset-0 bg-[#000000]/60 backdrop-blur-sm"></div>
    
    <!-- Modal Content -->
    <div id="authModalContent" class="relative bg-white rounded-[24px] w-[90%] max-w-[746px] p-8 md:p-12 flex flex-col items-center text-center shadow-2xl scale-95 transition-transform duration-300">
      
      <!-- Close Button -->
      <button id="closeAuthModal" class="absolute top-6 left-6 text-[#999999] hover:text-[#1a3b62] transition-colors">
        <i class="fa-solid fa-xmark text-[24px]"></i>
      </button>

      <!-- Icon -->
      <div class="w-[80px] h-[80px] rounded-full bg-[#f4f7fb] flex items-center justify-center mb-6 text-[#1a3b62]">
        <i class="fa-solid fa-lock text-[32px]"></i>
      </div>

      <!-- Title & Subtitle -->
      <h3 class="font-messiri font-bold text-[24px] md:text-[32px] text-[#1a3b62] mb-4">سجّل الدخول للوصول إلى تقريرك</h3>
      <p class="font-messiri text-[15px] md:text-[18px] text-[#6f6f6f] max-w-[500px] mb-10 leading-relaxed">
        للاطلاع على تفاصيل تقريرك، يرجى تسجيل الدخول أو إنشاء حساب اذا لم يكن لديك حساب.
      </p>

      <!-- Buttons -->
      <div class="flex flex-col w-full max-w-[682px] gap-4">
        <a href="#" class="w-full h-[60px] bg-[#1a3b62] text-white rounded-[15px] flex items-center justify-center gap-3 hover:bg-[#112948] transition-colors font-messiri font-bold text-[18px]">
          <span>تسجيل دخول</span>
          <i class="fa-solid fa-arrow-right-to-bracket text-[18px]"></i>
        </a>
        <a href="#" class="w-full h-[60px] bg-transparent border-2 border-[#1a3b62] text-[#1a3b62] rounded-[15px] flex items-center justify-center gap-3 hover:bg-[#f4f7fb] transition-colors font-messiri font-bold text-[18px]">
          <span>إنشاء حساب جديد</span>
          <i class="fa-regular fa-user text-[18px]"></i>
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

      function openModal() {
        modal.classList.remove('opacity-0', 'pointer-events-none');
        content.classList.remove('scale-95');
        content.classList.add('scale-100');
      }

      function closeModal() {
        modal.classList.add('opacity-0', 'pointer-events-none');
        content.classList.remove('scale-100');
        content.classList.add('scale-95');
      }

      if (openBtn) openBtn.addEventListener('click', openModal);
      if (closeBtn) closeBtn.addEventListener('click', closeModal);
      if (backdrop) backdrop.addEventListener('click', closeModal);
    });
  </script>

</body>
</html>
