<section id="challenge" aria-labelledby="challenge-title" class="pt-[9px] md:pt-[64px] pb-[25px] md:pb-[64px] px-2 sm:px-6 md:px-12 flex flex-col items-center">
  <!-- Interactive Aptitude Challenge Quiz Widget (Figma: desktop #3403:9849, mobile #3403:8558) -->
  <div id="quiz-widget" class="w-full max-w-[361px] md:max-w-[1240px] bg-gradient-to-b from-[#1B3C66] to-[#2E527C] rounded-[24px] md:rounded-[45px] border-[0.8px] border-[#7BA4D4] px-[14px] pt-[28px] pb-[26px] md:px-[91px] md:py-[48px] shadow-[0px_4px_12px_rgba(0,0,0,0.16)] flex flex-col items-stretch transition-all duration-300">

    <!-- Question View -->
    <div id="quiz-question-card" aria-live="polite" class="flex flex-col items-stretch w-full transition-all duration-200">

      <!-- Header -->
      <div class="flex flex-col items-center w-full">

        <!-- Title pill -->
        <div class="flex items-center justify-center gap-[8px] md:gap-[12px] h-[32px] md:h-[60px] px-[16px] md:px-[32px] rounded-full bg-white/15 border border-white/25">
          <h2 id="challenge-title" class="text-[#FCD34D] font-bold font-messiri text-[16px] md:text-[24px] leading-none m-0">
            {{ cms('home.challenge.title', 'التحدي السريع') }}
          </h2>
          <svg class="w-[16px] h-[16px] md:w-[22px] md:h-[22px] text-[#FCD34D]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/>
            <path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/>
            <path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/>
            <path d="M17.599 6.5a3 3 0 0 0 .399-1.375"/>
            <path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"/>
            <path d="M3.477 10.896a4 4 0 0 1 .585-.396"/>
            <path d="M19.938 10.5a4 4 0 0 1 .585.396"/>
            <path d="M6 18a4 4 0 0 1-1.967-.516"/>
            <path d="M19.967 17.484A4 4 0 0 1 18 18"/>
          </svg>
          <span class="w-[6px] h-[6px] md:w-[10px] md:h-[10px] rounded-full bg-[#FCD34D]" aria-hidden="true"></span>
        </div>

        <!-- Subtitle -->
        <div class="flex items-center justify-center gap-[8px] md:gap-[10px] mt-[20px] md:mt-[48px] text-center">
          <h3 class="font-bold font-messiri text-[16px] md:text-[26px] text-white m-0 leading-normal">
            {{ cms('home.challenge.subtitle', 'تحدّ ذكاءك واكتشف النمط') }}
          </h3>
          <i class="fa-solid fa-bolt text-[#FCD34D] text-[14px] md:text-[20px]" aria-hidden="true"></i>
        </div>

        <!-- Gold divider -->
        <span class="block w-full h-[2px] md:h-[3px] bg-[#FCD34D] rounded-full mt-[16px] md:mt-[24px]" aria-hidden="true"></span>
      </div>

      <!-- Counter + progress -->
      <div class="flex flex-row items-center justify-between w-full mt-[28px] md:mt-[48px]">
        <span id="quiz-counter" class="text-[13px] md:text-[16px] font-semibold text-[#F6F6F6] font-messiri">سؤال 1 من 3</span>
        <div id="quiz-progress-dots" class="flex items-center gap-[6px] md:gap-[8px]" dir="ltr" aria-hidden="true"></div>
      </div>

      <!-- Question title -->
      <h4 id="quiz-question-title" class="text-[14px] md:text-[24px] text-[#F6F6F6] font-semibold md:font-medium font-messiri text-right m-0 mt-[32px] md:mt-[44px]">
        ما الشكل التالي في النمط؟
      </h4>

      <!-- Pattern sequence (populated by quiz.js for pattern questions) -->
      <div id="quiz-pattern-container" class="hidden" aria-label="تسلسل النمط"></div>

      <!-- Options (populated by quiz.js) -->
      <div id="quiz-options-container" role="radiogroup" aria-labelledby="quiz-question-title"></div>

      <!-- Action Button -->
      <div class="flex justify-center w-full mt-[32px] md:mt-[48px]">
        <button id="quiz-action-btn" type="button" disabled>
          <span id="quiz-btn-text">ابدأ التحدي</span>
          <svg class="w-[16px] h-[16px] md:w-[20px] md:h-[20px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/>
            <path d="M20 3v4"/>
            <path d="M22 5h-4"/>
            <path d="M4 17v2"/>
            <path d="M5 18H3"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Result View (Hidden initially) -->
    <div id="quiz-result-card" aria-live="polite" class="hidden bg-[#F8FAFC] rounded-[20px] md:rounded-[24px] p-6 md:p-12 border border-[#EDF2F7] text-center flex-col items-center relative overflow-hidden mx-auto max-w-[768px] w-full">
      <!-- Top Indicator Bar -->
      <span class="w-10 md:w-14 h-1 md:h-1.5 rounded-full bg-brand-primary block mb-4 md:mb-6 mx-auto" aria-hidden="true"></span>

      <!-- 3D Golden Trophy with celebratory glow -->
      <div class="relative mb-4 md:mb-5 flex items-center justify-center w-full">
        <div class="absolute inset-0 w-24 md:w-28 h-24 md:h-28 rounded-full bg-[#F59E0B]/20 blur-xl animate-pulse pointer-events-none mx-auto" aria-hidden="true"></div>
        <img id="quiz-trophy-img" src="{{ cms_image('home.challenge.trophy_image', '/images/icons/trophy.webp') }}" alt="كأس التفوق" class="w-16 h-16 md:w-28 md:h-28 object-contain relative z-10 animate-trophy-pop trophy-glow mx-auto" />
      </div>

      <!-- Result Headline -->
      <h3 id="quiz-result-title" class="text-[20px] md:text-[29px] font-bold text-[#102744] mb-2 md:mb-3 font-cairo text-center">محاولة جيدة!</h3>

      <!-- Result Score Text -->
      <p id="quiz-score-text" class="text-[#334155] text-[14px] md:text-[18px] font-cairo mb-6 md:mb-8 text-center">
        أجبت على <span id="quiz-score-num" class="text-brand-primary font-bold text-[16px] md:text-[19px]">3</span> من <span id="quiz-total-num" class="font-bold text-[16px] md:text-[19px]">3</span> أسئلة بشكل صحيح
      </p>

      <!-- Action Buttons -->
      <div class="flex flex-col sm:flex-row items-center justify-center gap-3 md:gap-4 w-full max-w-[384px] mx-auto">
        <button id="quiz-restart-btn" type="button" class="w-full h-[40px] md:h-[43px] rounded-[10px] md:rounded-[14px] border-2 border-brand-primary text-brand-primary font-bold hover:bg-brand-primary hover:text-white transition-all duration-200 font-cairo text-[14px] shadow-sm hover:shadow-md cursor-pointer">
          {{ cms('home.challenge.restart_button', 'إعادة التحدي') }}
        </button>
        <a href="{{ cms_url('home.challenge.discover_url', '#assessments') }}" class="w-full h-[40px] md:h-[43px] rounded-[10px] md:rounded-[14px] bg-brand-primary text-white font-bold hover:bg-[#102744] shadow-md hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 flex items-center justify-center font-cairo text-[14px] cursor-pointer border-2 border-brand-primary">
          {{ cms('home.challenge.discover_button', 'اكتشف مقاييسك') }}
        </a>
      </div>
    </div>

  </div>
</section>
