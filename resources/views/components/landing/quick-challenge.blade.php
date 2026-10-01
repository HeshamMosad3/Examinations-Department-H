<!-- ==================== 5. SECTION: التحدي السريع (#943:4131) ==================== -->
    <section id="challenge" class="pt-[9px] md:pt-[64px] pb-[25px] md:pb-[64px] px-2 sm:px-6 md:px-12 flex flex-col items-center">

      <div class="text-center mb-[24px] sm:mb-[100px] px-2 w-full flex flex-col items-center">
        <!-- Title and Marks Block -->
        <div class="flex flex-row items-center justify-center gap-2 sm:gap-6 mb-[14px] sm:mb-[30px]">
          
          <!-- Right Mark (Visual Right in RTL) -->
          <div class="flex items-center w-[50px] sm:w-[109px]" dir="ltr">
            <!-- Diamond is closest to text (left side of this block) -->
            <div class="w-[6px] h-[6px] sm:w-[6px] sm:h-[6px] rotate-45 bg-[#204A7A] shrink-0 mx-1 sm:mx-2"></div>
            <!-- Line fades to the right (away from text) -->
            <div class="flex-1 h-[1.5px] bg-gradient-to-r from-[#204A7A] to-transparent"></div>
          </div>
          
          <!-- Text -->
          <h2 class="text-[18px] sm:text-[29px] text-brand-primary" style="font-family: 'El Messiri', sans-serif; font-weight: 600; line-height: 1.5;">التحدي السريع</h2>

          <!-- Left Mark (Visual Left in RTL) -->
          <div class="flex items-center w-[50px] sm:w-[109px]" dir="ltr">
            <!-- Line fades to the left (away from text) -->
            <div class="flex-1 h-[1.5px] bg-gradient-to-l from-[#204A7A] to-transparent"></div>
            <!-- Diamond is closest to text (right side of this block) -->
            <div class="w-[6px] h-[6px] sm:w-[6px] sm:h-[6px] rotate-45 bg-[#204A7A] shrink-0 mx-1 sm:mx-2"></div>
          </div>

        </div>

        <!-- Subtitle -->
        <p class="text-[13.5px] sm:text-[18px] md:text-[24px] font-medium text-brand-dark leading-normal sm:leading-none text-center" style="font-family: 'El Messiri', sans-serif; font-weight: 500;">
          اختبر دقة ملاحظتك للأنماط والتفاصيل.
        </p>
      </div>

      <!-- Interactive Aptitude Challenge Quiz Widget matching reference design (Figma Desktop #902:4016 & Mobile #934:5749) -->
      <div id="quiz-widget" class="w-full max-w-[364px] md:max-w-[794px] bg-white rounded-[24px] md:rounded-[34px] border border-[#DDE4ED] md:border-[1px] shadow-[0px_1px_3px_0px_rgba(0,0,0,0.1)] md:shadow-[0px_1.77px_3.53px_-1.77px_rgba(0,0,0,0.1),0px_1.77px_5.3px_0px_rgba(0,0,0,0.1)] px-3.5 min-[360px]:px-[17px] pt-[22px] pb-[21px] md:p-[39px_42px] transition-all duration-300">

        <!-- Question View -->
        <div id="quiz-question-card" class="bg-transparent p-0 border-0 rounded-none md:bg-[#F6F9FC] md:p-[29px_40px] md:border md:border-[#EDF2F7] md:rounded-[16px] transition-all duration-200">
          <!-- Top Bar: Progress dashes + question counter -->
          <div class="flex items-center justify-between mb-3 md:mb-6">
            <span id="quiz-counter" class="text-[14px] md:text-[17px] font-semibold text-[#262626] font-messiri">سؤال 1 من 3</span>
            <div id="quiz-progress-dots" class="flex items-center gap-[6px] md:gap-[8px]" dir="ltr">
              <span class="quiz-dash w-[20px] md:w-[28px] h-[6px] md:h-[8px] rounded-full bg-[#204A7A] transition-all duration-300"></span>
              <span class="quiz-dash w-[12px] md:w-[17px] h-[6px] md:h-[8px] rounded-full bg-[#DDE4ED] transition-all duration-300"></span>
              <span class="quiz-dash w-[12px] md:w-[17px] h-[6px] md:h-[8px] rounded-full bg-[#DDE4ED] transition-all duration-300"></span>
            </div>
          </div>

          <!-- Question title -->
          <h4 id="quiz-question-title" class="text-[14px] md:text-[24px] text-[#262626] font-semibold md:font-medium font-messiri text-right leading-normal mb-3 md:mb-6">
            ما الشكل التالي في النمط؟
          </h4>

          <!-- Pattern sequence illustration container (visible for pattern questions) -->
          <div id="quiz-pattern-container" class="hidden my-4 md:my-8">
            <!-- Dynamically populated if pattern question -->
          </div>

          <!-- Options Grid / Row Container -->
          <div id="quiz-options-container" class="flex items-center justify-center gap-1.5 min-[360px]:gap-[11px] md:gap-[16px] my-4 md:my-8 w-full max-w-[330px] md:max-w-[376px] mx-auto">
            <!-- Dynamically populated from questions list -->
          </div>

          <!-- Action Button: ابدأ التحدي / التالي / شاهد نتيجتك -->
          <div class="flex justify-center w-full mt-4 md:mt-8">
            <button id="quiz-action-btn" disabled class="w-full max-w-[330px] md:max-w-[430px] h-[40px] md:h-[57px] rounded-[10px] md:rounded-[14px] bg-[#BAC7D5] text-white font-semibold font-messiri text-[14px] md:text-[20px] flex items-center justify-center gap-[8px] md:gap-[11px] cursor-not-allowed transition-all duration-200 shadow-sm">
              <span id="quiz-btn-text">ابدأ التحدي</span>
              <svg class="w-[14px] h-[14px] md:w-[20px] md:h-[20px] fill-current shrink-0" viewBox="0 0 24 24"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/><circle cx="19" cy="5" r="1.5" /><circle cx="5" cy="19" r="1.5" /></svg>
            </button>
          </div>
        </div>

        <!-- Result View (Hidden initially) -->
        <div id="quiz-result-card" class="hidden bg-[#F8FAFC] rounded-[20px] md:rounded-[24px] p-6 md:p-12 border border-[#EDF2F7] text-center flex flex-col items-center relative overflow-hidden">
          <!-- Top Indicator Bar matching reference -->
          <span class="w-10 md:w-14 h-1 md:h-1.5 rounded-full bg-brand-primary block mb-4 md:mb-6"></span>

          <!-- 3D Golden Trophy with celebratory glow -->
          <div class="relative mb-4 md:mb-5 flex items-center justify-center">
            <div class="absolute inset-0 w-24 md:w-28 h-24 md:h-28 rounded-full bg-[#F59E0B]/20 blur-xl animate-pulse pointer-events-none"></div>
            <img id="quiz-trophy-img" src="/images/icons/trophy.png" alt="كأس التفوق" class="w-16 h-16 md:w-28 md:h-28 object-contain relative z-10 animate-trophy-pop trophy-glow" />
          </div>

          <!-- Result Headline -->
          <h3 id="quiz-result-title" class="text-[20px] md:text-[29px] font-bold text-[#102744] mb-2 md:mb-3 font-cairo">محاولة جيدة!</h3>

          <!-- Result Score Text matching user reference -->
          <p id="quiz-score-text" class="text-[#334155] text-[14px] md:text-[18px] font-cairo mb-6 md:mb-8">
            أجبت على <span id="quiz-score-num" class="text-brand-primary font-bold text-[16px] md:text-[19px]">3</span> من <span id="quiz-total-num" class="font-bold text-[16px] md:text-[19px]">3</span> أسئلة بشكل صحيح
          </p>

          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row items-center gap-3 md:gap-4 w-full max-w-[384px]">
            <button id="quiz-restart-btn" class="w-full h-[40px] md:h-[43px] rounded-[10px] md:rounded-[14px] border-2 border-brand-primary text-brand-primary font-bold hover:bg-brand-primary hover:text-white transition-all duration-200 font-cairo text-[14px] md:text-[14px] shadow-sm hover:shadow-md cursor-pointer">
              إعادة التحدي
            </button>
            <a href="#assessments" class="w-full h-[40px] md:h-[43px] rounded-[10px] md:rounded-[14px] bg-brand-primary text-white font-bold hover:bg-[#102744] shadow-md hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 flex items-center justify-center font-cairo text-[14px] md:text-[14px] cursor-pointer border-2 border-brand-primary">
              اكتشف مقاييسك
            </a>
          </div>
        </div>

      </div>
    </section>
