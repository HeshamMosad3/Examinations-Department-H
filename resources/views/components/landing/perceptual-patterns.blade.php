<!-- ==================== 3. SECTION: أنماط الإدراك (#943:4129) ==================== -->
    <section id="assessments" class="pt-[19px] md:pt-[64px] pb-[25px] md:pb-[64px] px-0 sm:px-6 md:px-12 flex flex-col items-center w-full overflow-hidden">

      <!-- Perception orbital diagram matching reference image (Figma #875:6216 & Mobile Frame #943:4129) -->
      <div class="relative w-full max-w-[393px] sm:max-w-[593px] mx-auto mb-[16px] md:mb-[40px] select-none aspect-[393/346] sm:aspect-[926/832]">
        
        <!-- Mobile Vector Orbit Background (Figma: 393 x 346) -->
        <svg viewBox="0 0 393 346" class="absolute inset-0 w-full h-full pointer-events-none sm:hidden" fill="none">
          <defs>
            <linearGradient id="orbitGradientMobile" x1="15%" y1="0%" x2="85%" y2="100%">
              <stop offset="0%" stop-color="#7C3AED" stop-opacity="0.5" />
              <stop offset="42%" stop-color="#EC4899" stop-opacity="0.5" />
              <stop offset="85%" stop-color="#1E5AF9" stop-opacity="0.45" />
            </linearGradient>

            <filter id="dot-glow-purple-m" x="-100%" y="-100%" width="300%" height="300%">
              <feDropShadow dx="0" dy="0" stdDeviation="3" flood-color="#7C3AED" flood-opacity="0.95" />
            </filter>
            <filter id="dot-glow-pink-m" x="-100%" y="-100%" width="300%" height="300%">
              <feDropShadow dx="0" dy="0" stdDeviation="3" flood-color="#EC4899" flood-opacity="0.95" />
            </filter>
            <filter id="dot-glow-blue-m" x="-100%" y="-100%" width="300%" height="300%">
              <feDropShadow dx="0" dy="0" stdDeviation="3" flood-color="#1E5AF9" flood-opacity="0.95" />
            </filter>
          </defs>

          <!-- Outer Orbital Circle: r=156.16, cx=196.5, cy=190 -->
          <circle cx="196.5" cy="190" r="156.16" stroke="url(#orbitGradientMobile)" stroke-opacity="0.2" stroke-width="1.2" />

          <!-- Inner Orbital Circle: rx=117.37, ry=114, cx=198.2, cy=190 -->
          <ellipse cx="198.2" cy="190" rx="117.37" ry="114" stroke="#4F46E5" stroke-opacity="0.06" stroke-width="1.2" />

          <!-- 3 Glowing Dots on Outer Orbit -->
          <circle cx="223.3" cy="40.0" r="3.2" fill="#7C3AED" filter="url(#dot-glow-purple-m)" />
          <circle cx="349.9" cy="172.0" r="3.2" fill="#EC4899" filter="url(#dot-glow-pink-m)" />
          <circle cx="47.8" cy="145.0" r="3.2" fill="#1E5AF9" filter="url(#dot-glow-blue-m)" />
        </svg>

        <!-- Desktop Vector Orbit Background (Concentric Circles + Subtle Gradient + Glowing Nodes) -->
        <svg viewBox="0 0 926 832" class="absolute inset-0 w-full h-full pointer-events-none hidden sm:block" fill="none">
          <defs>
            <linearGradient id="orbitGradient" x1="15%" y1="0%" x2="85%" y2="100%">
              <stop offset="0%" stop-color="#7C3AED" stop-opacity="0.5" />
              <stop offset="42%" stop-color="#EC4899" stop-opacity="0.5" />
              <stop offset="85%" stop-color="#1E5AF9" stop-opacity="0.45" />
            </linearGradient>

            <filter id="dot-glow-purple" x="-100%" y="-100%" width="300%" height="300%">
              <feDropShadow dx="0" dy="0" stdDeviation="5" flood-color="#7C3AED" flood-opacity="0.95" />
            </filter>
            <filter id="dot-glow-pink" x="-100%" y="-100%" width="300%" height="300%">
              <feDropShadow dx="0" dy="0" stdDeviation="5" flood-color="#EC4899" flood-opacity="0.95" />
            </filter>
            <filter id="dot-glow-blue" x="-100%" y="-100%" width="300%" height="300%">
              <feDropShadow dx="0" dy="0" stdDeviation="5" flood-color="#1E5AF9" flood-opacity="0.95" />
            </filter>
          </defs>

          <!-- Outer Orbital Circle (passes cleanly behind the badges) -->
          <circle cx="463" cy="457" r="367.91" stroke="url(#orbitGradient)" stroke-opacity="0.2" stroke-width="2.4" />

          <!-- Inner Orbital Circle (wraps close around the head) -->
          <ellipse cx="467" cy="457" rx="276.53" ry="274.125" stroke="#4F46E5" stroke-opacity="0.06" stroke-width="2.4" />

          <!-- 3 Glowing Dots on Outer Orbit (r=367.91, cx=463, cy=457) -->
          <circle cx="526.2" cy="96.2" r="7.2" fill="#7C3AED" filter="url(#dot-glow-purple)" />
          <circle cx="824.4" cy="413.6" r="7.2" fill="#EC4899" filter="url(#dot-glow-pink)" />
          <circle cx="112.6" cy="348.7" r="7.2" fill="#1E5AF9" filter="url(#dot-glow-blue)" />
        </svg>

        <!-- Center Head/Brain Illustration (Mobile: 188x158 at Left 104, Top 111) -->
        <div class="absolute flex items-center justify-center pointer-events-none left-[26.46%] top-[32.08%] w-[47.84%] h-[45.66%] sm:left-[25.926%] sm:top-[32.08%] sm:w-[48.81%] sm:h-[45.66%]">
          <img src="/images/illustrations/perception-head.png" alt="أنماط الإدراك" loading="lazy" decoding="async" class="w-full h-full object-contain" />
        </div>

        <!-- 1. سمعي (Auditory) — Top (#875:6228 Desktop / #934:4970 Mobile) -->
        <div class="absolute flex flex-col items-center justify-start pointer-events-auto left-1/2 -translate-x-1/2 top-0 w-[120px] sm:w-auto sm:left-[35.794%] sm:translate-x-0 sm:top-0">
          <div class="flex items-center justify-center gap-[4px] sm:gap-[8px]" dir="ltr">
            <div class="w-[40px] h-[40px] sm:w-[56px] sm:h-[56px] md:w-[77px] md:h-[77px] rounded-full bg-[#F5F3FF] border border-[#7C3AED]/20 md:border-[2px] shadow-[0px_12px_24px_rgba(124,58,237,0.12),inset_0px_4px_8px_rgba(124,58,237,0.1)] md:shadow-[0px_28.85px_57.71px_rgba(124,58,237,0.12),inset_0px_9.62px_19.24px_rgba(124,58,237,0.1)] flex items-center justify-center shrink-0 transition-transform duration-300 hover:scale-105 cursor-pointer">
              <img src="/images/icons/icon-auditory-headphones.svg" alt="سمعي" loading="lazy" decoding="async" class="w-[20px] h-[20px] sm:w-[28px] sm:h-[28px] md:w-[38px] md:h-[38px] object-contain" />
            </div>
            <h4 class="font-bold text-[17px] sm:text-[22px] md:text-[33px] leading-none text-[#7C3AED] font-messiri">
              سمعي
            </h4>
          </div>
          <p class="text-[12px] sm:text-[14px] md:text-[23px] text-[#262626] text-center font-normal leading-[1.3] font-messiri mt-1 sm:mt-2">
            تسمع وتفهم<br />الأصوات.
          </p>
        </div>

        <!-- 2. حسي (Kinesthetic) — Right (#875:6221 Desktop / #934:4963 Mobile) -->
        <div class="absolute flex flex-col items-center justify-start pointer-events-auto right-[1%] top-[47.69%] w-[95px] sm:w-auto sm:right-auto sm:left-[74.79%] sm:top-[47.69%]">
          <div class="flex items-center justify-center gap-[6px] sm:gap-[12px]" dir="ltr">
            <div class="w-[40px] h-[40px] sm:w-[56px] sm:h-[56px] md:w-[77px] md:h-[77px] rounded-full bg-[#FDF2F8] border border-[#EC4899]/40 md:border-[2px] shadow-[0px_12px_24px_rgba(236,72,153,0.12),inset_0px_4px_8px_rgba(236,72,153,0.1)] md:shadow-[0px_28.85px_57.71px_rgba(236,72,153,0.12),inset_0px_9.62px_19.24px_rgba(236,72,153,0.1)] flex items-center justify-center shrink-0 transition-transform duration-300 hover:scale-105 cursor-pointer">
              <img src="/images/icons/icon-sensory-heart.svg" alt="حسي" loading="lazy" decoding="async" class="w-[20px] h-[20px] sm:w-[28px] sm:h-[28px] md:w-[38px] md:h-[38px] object-contain" />
            </div>
            <h4 class="font-bold text-[17px] sm:text-[22px] md:text-[33px] leading-none text-[#EC4899] font-messiri">
              حسي
            </h4>
          </div>
          <p class="text-[12px] sm:text-[14px] md:text-[23px] text-[#262626] text-center font-normal leading-[1.3] font-messiri mt-1 sm:mt-2">
            تشعر وتتفاعل مع<br />ما حولك.
          </p>
        </div>

        <!-- 3. بصري (Visual) — Left (#875:6235 Desktop / #934:4977 Mobile) -->
        <div class="absolute flex flex-col items-center justify-start pointer-events-auto left-[2.29%] top-[44.80%] w-[100px] sm:w-auto sm:left-[2.34%] sm:top-[44.80%]">
          <div class="flex items-center justify-center gap-[4px] sm:gap-[8px]" dir="ltr">
            <div class="w-[40px] h-[40px] sm:w-[56px] sm:h-[56px] md:w-[77px] md:h-[77px] rounded-full bg-[#EFF6FF] border border-[#1E5AF9]/20 md:border-[2px] shadow-[0px_12px_24px_rgba(30,90,249,0.12),inset_0px_4px_8px_rgba(30,90,249,0.1)] md:shadow-[0px_28.85px_57.71px_rgba(30,90,249,0.12),inset_0px_9.62px_19.24px_rgba(30,90,249,0.1)] flex items-center justify-center shrink-0 transition-transform duration-300 hover:scale-105 cursor-pointer">
              <img src="/images/icons/icon-visual-eye.svg" alt="بصري" loading="lazy" decoding="async" class="w-[20px] h-[20px] sm:w-[28px] sm:h-[28px] md:w-[38px] md:h-[38px] object-contain" />
            </div>
            <h4 class="font-bold text-[17px] sm:text-[22px] md:text-[33px] leading-none text-[#1E5AF9] font-messiri">
              بصري
            </h4>
          </div>
          <p class="text-[12px] sm:text-[14px] md:text-[23px] text-[#262626] text-center font-normal leading-[1.3] font-messiri mt-1 sm:mt-2">
            ترى وتلاحظ<br />التفاصيل.
          </p>
        </div>

      </div>

      <!-- Heading CTA (#875:7315 Desktop / #942:4140 Mobile) -->
      <div class="text-center mb-[12px] md:mb-[40px] px-3 sm:px-4 flex flex-col items-center gap-[10px] md:gap-[20px] w-full max-w-[361px] md:max-w-[490px] mx-auto">
        <p class="text-[14px] md:text-[24px] font-medium text-black font-messiri leading-normal text-center w-full max-w-[333px] md:max-w-[490px] mx-auto">
          اكتشف طريقتك في فهم العالم من حولك باستخدام
        </p>
        <h2 class="text-[18px] md:text-[34px] font-bold md:font-semibold text-[#1D436E] font-messiri leading-[27px] md:leading-[1.5] text-center whitespace-nowrap">
          اختبار أنماط الإدراك
        </h2>
      </div>

      <!-- CTA Offer Card (#951:4239 Desktop / #951:4463 Mobile) -->
      <div class="w-full max-w-[330px] sm:max-w-[510px] h-[63px] sm:h-[111px] bg-[#F5F8FC] border-[0.4px] sm:border-[1px] border-[#BAC7D6] rounded-[15px] sm:rounded-[18px] px-[14px] sm:px-[38px] lg:px-[43px] flex flex-row items-center justify-between shadow-sm mb-[16px] md:mb-[35px] overflow-visible select-none">

        <!-- Right Promotional Text & Alarm Clock (First child in RTL) -->
        <div class="flex items-center gap-[10px] sm:gap-[21px] min-w-0">
          <div class="flex items-center justify-center shrink-0 w-[37px] h-[37px] sm:w-[62px] sm:h-[62px]">
            <img src="/images/icons/alarm-clock.svg" alt="Alarm Clock" loading="lazy" decoding="async" class="w-full h-full object-contain" />
          </div>
          <div class="flex flex-col items-start min-w-0 font-messiri">
            <span class="text-[25px] sm:text-[32px] font-bold text-[#204A7A] block leading-tight sm:leading-none">مجاني</span>
            <span class="text-[14px] sm:text-[28px] font-normal text-[#204A7A] block leading-[1.5]">لفترة محدودة</span>
          </div>
        </div>

        <!-- Left Gift Box Image / Vector (Last child in RTL) -->
        <div class="w-[84px] h-[78px] sm:w-[115px] sm:h-[107px] flex items-center justify-center shrink-0">
          <img src="/images/icons/wrapped-gift.svg" alt="Gift Box" loading="lazy" decoding="async" class="w-full h-full object-contain drop-shadow-sm" />
        </div>

      </div>

      <!-- Action Buttons (#875:6168) — mobile: 330x40 hug, gap 10px -->
      <div class="flex flex-row items-stretch justify-center gap-[10px] sm:gap-[56px] mt-0 mb-0 w-full max-w-[330px] sm:max-w-[510px] px-0">
        <!-- Start Evaluation Button -->
        <a href="#challenge" class="group flex-1 h-[40px] sm:h-[56px] bg-brand-primary text-white rounded-[10px] sm:rounded-[12px] font-semibold text-[13.5px] sm:text-[17px] flex items-center justify-center gap-1 sm:gap-3 shadow-md hover:bg-[#102744] hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 border-2 border-brand-primary cursor-pointer whitespace-nowrap font-messiri">
          <span class="leading-none">ابدأ التقييم الآن</span>
          <i class="fa-solid fa-arrow-left text-xs sm:text-sm group-hover:-translate-x-1.5 transition-transform duration-200"></i>
        </a>

        <!-- Explore Button -->
        <a href="#assessments" class="group flex-1 h-[40px] sm:h-[56px] border-2 border-brand-primary text-brand-primary rounded-[10px] sm:rounded-[12px] font-semibold text-[13.5px] sm:text-[17px] flex items-center justify-center hover:bg-brand-primary hover:text-white transition-all duration-200 shadow-sm hover:shadow-md cursor-pointer whitespace-nowrap font-messiri">
          <span class="leading-none">اكتشف أنماط الإدراك</span>
        </a>
      </div>

    </section>
