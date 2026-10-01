<!-- Ambient Glow effect in Hero section -->
    <div class="absolute top-[40px] sm:top-[64px] left-1/2 -translate-x-1/2 w-[90%] max-w-[720px] h-[320px] sm:h-[371px] rounded-full bg-gradient-to-b from-[#D6DFEA]/50 to-[#D6DFEA]/20 blur-[60px] sm:blur-[72px] pointer-events-none -z-10"></div>

    <!-- ==================== 2. HERO SECTION: اختبار عجلة الحياة (#937:4162) ==================== -->
    <section id="hero-section" aria-labelledby="hero-title" class="pt-8 sm:pt-12 md:pt-16 pb-[25px] md:pb-[64px] px-0 sm:px-6 md:px-12 relative flex flex-col items-center">

      <!-- Main Section Header (Figma Mobile: 312x32 Title, 240x44 Subtitle, Gap 10-12px) -->
      <div class="text-center w-full max-w-[340px] sm:max-w-none mx-auto mb-0 relative flex flex-col items-center gap-2 px-4 sm:px-0">
        
        <!-- Heading: (Figma: 318px x 88px Hug Container, 312px Hug Title) with Sparkle Star on the left -->
        <div class="relative inline-flex items-center justify-center">
          <h1 id="hero-title" class="text-[17.5px] min-[360px]:text-[18px] min-[390px]:text-[19px] sm:text-[27px] md:text-[34px] font-bold text-[#1D436E] leading-tight font-messiri text-center whitespace-nowrap">
            اكتشف نفسك ... وابدأ رحلة تطورك
          </h1>
          <img src="/landing/images/icons/sparkle.svg" alt="" aria-hidden="true" class="absolute -top-1 -left-4 sm:-left-7 w-[17px] h-[17px] sm:w-[22px] sm:h-[22px] shrink-0 pointer-events-none" />
        </div>

        <!-- Subtitle: (Figma: 240px x 44px Hug, El Messiri Medium 14px, Line height 100%) with 4-point Star on the right -->
        <div class="w-full max-w-[285px] sm:max-w-none mx-auto flex items-center justify-center">
          <p class="text-[13px] min-[390px]:text-[13.5px] sm:text-[15px] md:text-[20px] font-medium text-[#262626] leading-[19px] min-[390px]:leading-[20px] sm:leading-normal font-messiri text-center sm:whitespace-nowrap">
            <svg class="w-[14px] h-[14px] sm:w-[16px] sm:h-[16px] text-[#204A7A] inline-block align-middle ml-1.5 sm:ml-2 pointer-events-none mb-[2px] sm:mb-[4px]" style="transform: rotate(12.47deg);" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 0C12 6.627 6.627 12 0 12C6.627 12 12 17.373 12 24C12 17.373 17.373 12 24 12C17.373 12 12 6.627 12 0Z"/>
            </svg>
            <span class="align-middle">قياسات ذكية لفهم ذاتك، شخصيتك،</span>
            <br class="sm:hidden"/>
            <span class="align-middle">وتوازنك في الحياة.</span>
          </p>
        </div>

      </div>

      <!-- ==================== THE WHEEL OF LIFE (عجلة الحياة) ==================== -->
      <div class="w-full max-w-[800px] mx-auto relative flex flex-col items-center justify-center -mt-[2px] md:-mt-[15px] mb-0 md:mb-[40px] px-0">

        <!-- Outer Radial Wheel Graphic (Figma: Mobile 319.08x332.58, Desktop 834.43x869.75) -->
        <div class="relative w-full max-w-[305px] min-[390px]:max-w-[325px] min-[410px]:max-w-[335px] sm:max-w-[593px] mx-auto flex items-center justify-center overflow-visible aspect-[319.08/332.58] sm:aspect-[834.43/869.75]">
          <div id="wheel-wrap" class="w-full h-full relative z-10">
            <svg id="wheelSvg" viewBox="0 0 834.43 869.75" xmlns="http://www.w3.org/2000/svg" class="w-full h-full overflow-visible" style="overflow: visible;"></svg>
          </div>
        </div>

        @include('landing.partials.life-wheel-admin-controls')
      </div>

      <!-- Heading CTA (#875:7304 Desktop / #942:4138 Mobile) -->
      <div class="text-center mb-[12px] md:mb-[40px] px-3 sm:px-4 flex flex-col items-center gap-[10px] md:gap-[20px] w-full max-w-[361px] md:max-w-[490px] mx-auto">
        <p class="text-[12.5px] min-[360px]:text-[13px] min-[390px]:text-[14px] md:text-[24px] font-medium text-black font-messiri leading-normal text-center w-full max-w-none md:max-w-[490px] mx-auto whitespace-nowrap">
          اكتشف مستوى التوازن فى اهم جوانب حياتك باستخدام
        </p>
        <h2 class="text-[16.5px] min-[390px]:text-[17.5px] md:text-[34px] font-bold md:font-semibold text-[#1D436E] font-messiri leading-[23px] sm:leading-[22px] md:leading-[1.5] text-center whitespace-nowrap">
          اختبار عجلة الحياة
        </h2>
      </div>

      <!-- CTA Offer Card (#951:4239 Desktop / #951:4463 Mobile) -->
      <div class="w-full max-w-[330px] sm:max-w-[510px] h-[63px] sm:h-[111px] bg-[#F5F8FC] border-[0.4px] sm:border-[1px] border-[#BAC7D6] rounded-[15px] sm:rounded-[18px] px-[14px] sm:px-[38px] lg:px-[43px] flex flex-row items-center justify-between shadow-sm mb-[16px] md:mb-[35px] overflow-visible select-none z-10 relative">

        <!-- Right Promotional Text & Alarm Clock (First child in RTL) -->
        <div class="flex items-center gap-[10px] sm:gap-[21px] min-w-0">
          <div class="flex items-center justify-center shrink-0 w-[35px] h-[35px] sm:w-[62px] sm:h-[62px]">
            <img src="/landing/images/icons/alarm-clock.svg" alt="أيقونة ساعة منبه ترمز للعرض المحدود" loading="lazy" decoding="async" class="w-full h-full object-contain" />
          </div>
          <div class="flex flex-col items-start min-w-0 font-messiri">
            <span class="text-[23px] min-[390px]:text-[25px] sm:text-[32px] font-bold text-[#204A7A] block leading-tight sm:leading-none">مجاني</span>
            <span class="text-[13px] min-[390px]:text-[14px] sm:text-[28px] font-normal text-[#204A7A] block leading-[1.5]">لفترة محدودة</span>
          </div>
        </div>

        <!-- Left Gift Box Image / Vector (Last child in RTL) -->
        <div class="w-[82px] h-[76px] sm:w-[115px] sm:h-[107px] flex items-center justify-center shrink-0">
          <img src="/landing/images/icons/wrapped-gift.svg" alt="أيقونة صندوق هدية ترمز للاختبار المجاني" loading="lazy" decoding="async" class="w-full h-full object-contain drop-shadow-sm" />
        </div>

      </div>

      <!-- Action Buttons (#875:6123) — mobile: 330x40 hug, gap 10px -->
      <div class="flex flex-row items-stretch justify-center gap-[10px] sm:gap-[56px] mb-0 w-full max-w-[330px] sm:max-w-[510px] px-0">
        <!-- Start Evaluation Button (Figma: Outline Button/Default, 111x21 Hug body, 4px gap) -->
        <a href="/life-wheel-assessment.html" class="group flex-1 h-[40px] sm:h-[56px] bg-brand-primary text-white rounded-[10px] sm:rounded-[12px] font-semibold text-[13.5px] sm:text-[17px] flex items-center justify-center gap-1 sm:gap-3 shadow-md hover:bg-[#102744] hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 border-2 border-brand-primary cursor-pointer whitespace-nowrap font-messiri focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary">
          <span class="leading-none">ابدأ التقييم الآن</span>
          <i class="fa-solid fa-arrow-left text-xs sm:text-sm group-hover:-translate-x-1.5 transition-transform duration-200" aria-hidden="true"></i>
        </a>

        <!-- Explore Wheel Button -->
        <a href="{{ route('life-wheel.explore') }}" class="group flex-1 h-[40px] sm:h-[56px] border-2 border-brand-primary text-brand-primary rounded-[10px] sm:rounded-[12px] font-semibold text-[13.5px] sm:text-[17px] flex items-center justify-center hover:bg-brand-primary hover:text-white transition-all duration-200 shadow-sm hover:shadow-md cursor-pointer whitespace-nowrap font-messiri focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary">
          <span class="leading-none">اكتشف عجلة الحياة</span>
        </a>
      </div>

    </section>
