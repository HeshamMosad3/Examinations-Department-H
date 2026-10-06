<footer id="contact" role="contentinfo" class="w-full bg-[#1A3B62] text-white mt-[25px] md:mt-[51px] pt-8 lg:pt-[72px] pb-8 lg:pb-[28px] px-4 sm:px-6 lg:px-12">
  <div class="max-w-[1240px] mx-auto">

    <!-- Columns Container: 1 col on mobile, 2 cols on tablet (md), 4 cols flex on desktop (lg) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:flex lg:flex-row lg:justify-between items-start gap-10 md:gap-x-12 md:gap-y-10 lg:gap-0 max-w-[361px] md:max-w-[680px] lg:max-w-none mx-auto lg:mx-0">
      
      <!-- Col 1: Logo & Social -->
      <div class="order-1 md:order-1 flex flex-col items-start text-right w-full max-w-[247px]">
        <div class="mb-[21px]">
          <img src="{{ cms_image('global.footer.logo', '/landing/images/footer-logo.png') }}" alt="شعار دار الرؤى للتدريب" class="w-[85px] h-auto object-contain" />
        </div>
        <p class="text-[#FEFEFE] text-[14px] leading-[1.5] mb-[28px] max-w-[247px]" style="font-family: 'El Messiri', sans-serif; font-weight: 500;">
          {{ cms('global.footer.tagline', 'مع دار الرؤى للتدريب... نصنع مستقبلك بخبرات علمية ومهارات عملية.') }}
        </p>
        <div class="flex items-center gap-[14px]">
          <a href="{{ cms_url('global.footer.youtube_url', '#') }}" aria-label="قناة دار الرؤى للتدريب على يوتيوب" rel="noopener noreferrer" class="w-[31px] h-[31px] rounded-[5px] border border-[#DDDDDD]/40 hover:border-[#E6B844] hover:text-[#E6B844] text-[#DDDDDD] flex items-center justify-center transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844]">
            <i class="fa-brands fa-youtube text-[14px]" aria-hidden="true"></i>
          </a>
          <a href="{{ cms_url('global.footer.instagram_url', '#') }}" aria-label="حساب دار الرؤى للتدريب على إنستغرام" rel="noopener noreferrer" class="w-[31px] h-[31px] rounded-[5px] border border-[#DDDDDD]/40 hover:border-[#E6B844] hover:text-[#E6B844] text-[#DDDDDD] flex items-center justify-center transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844]">
            <i class="fa-brands fa-instagram text-[14px]" aria-hidden="true"></i>
          </a>
          <a href="{{ cms_url('global.footer.x_url', '#') }}" aria-label="حساب دار الرؤى للتدريب على منصة إكس" rel="noopener noreferrer" class="w-[31px] h-[31px] rounded-[5px] border border-[#DDDDDD]/40 hover:border-[#E6B844] hover:text-[#E6B844] text-[#DDDDDD] flex items-center justify-center transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844]">
            <i class="fa-brands fa-x-twitter text-[13px]" aria-hidden="true"></i>
          </a>
        </div>
      </div>

      <!-- Col 2: تواصل معنا -->
      <div class="order-2 md:order-2 w-full max-w-[300px] lg:w-[216px]">
        <div class="flex items-center gap-3 mb-[25px]">
          <h4 class="text-[21px] font-semibold text-white whitespace-nowrap" style="font-family: 'El Messiri', sans-serif;">{{ cms('global.footer.contact_title', 'تواصل معنا') }}</h4>
          <div class="flex items-center" dir="ltr">
            <div class="w-[6.64px] h-[6.64px] rounded-full bg-[#CFA63D] shrink-0"></div>
            <div class="w-[58px] h-[2px] bg-[#E6B844]"></div>
          </div>
        </div>
        <ul class="space-y-[18px] text-[17px] text-[#DDDDDD]" style="font-family: 'El Messiri', sans-serif;">
          <li class="flex items-center gap-[14px]">
            <i class="fa-solid fa-location-dot text-white text-[18px] w-5 text-center shrink-0" aria-hidden="true"></i>
            <span class="hover:text-white transition-colors">{{ cms('global.footer.address', 'الرياض - المملكة العربية السعودية') }}</span>
          </li>
          <li class="flex items-center gap-[14px]">
            <i class="fa-solid fa-phone text-white text-[18px] w-5 text-center shrink-0" aria-hidden="true"></i>
            <a href="{{ cms_url('global.footer.phone_url', 'tel:+966557595769') }}" dir="ltr" aria-label="الاتصال بالهاتف: {{ cms('global.footer.phone', '+966 55 759 5769') }}" class="hover:text-[#E6B844] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844] rounded">{{ cms('global.footer.phone', '+966 55 759 5769') }}</a>
          </li>
          <li class="flex items-center gap-[14px]">
            <i class="fa-regular fa-envelope text-white text-[18px] w-5 text-center shrink-0" aria-hidden="true"></i>
            <a href="mailto:{{ cms('global.footer.email', 'info@alruaa.com') }}" dir="ltr" aria-label="إرسال بريد إلكتروني: {{ cms('global.footer.email', 'info@alruaa.com') }}" class="hover:text-[#E6B844] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844] rounded">{{ cms('global.footer.email', 'info@alruaa.com') }}</a>
          </li>
          <li class="flex items-center gap-[14px]">
            <i class="fa-regular fa-clock text-white text-[18px] w-5 text-center shrink-0" aria-hidden="true"></i>
            <span>{{ cms('global.footer.hours', 'الأحد–الخميس: 9ص–6م') }}</span>
          </li>
        </ul>
      </div>

      <!-- Col 3: خدماتنا (Hidden on mobile, visible on tablet & desktop) -->
      <div class="hidden md:block order-4 md:order-3 lg:order-2 w-full max-w-[300px] lg:w-[131px]">
        <div class="flex items-center gap-3 mb-[25px]">
          <h4 class="text-[21px] font-semibold text-white whitespace-nowrap" style="font-family: 'El Messiri', sans-serif;">{{ cms('global.footer.services_title', 'خدماتنا') }}</h4>
          <div class="flex items-center" dir="ltr">
            <div class="w-[6.64px] h-[6.64px] rounded-full bg-[#CFA63D] shrink-0"></div>
            <div class="w-[58px] h-[2px] bg-[#E6B844]"></div>
          </div>
        </div>
        <ul class="space-y-[18px] text-[17px] text-[#DDDDDD]" style="font-family: 'El Messiri', sans-serif;">
          <li><a href="{{ cms_url('global.footer.service_1_url', '#courses') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_1', 'التدريب الفردي') }}</a></li>
          <li><a href="{{ cms_url('global.footer.service_2_url', '#courses') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_2', 'التدريب المؤسسي') }}</a></li>
          <li><a href="{{ cms_url('global.footer.service_3_url', '#courses') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_3', 'التعلم الإلكتروني') }}</a></li>
          <li><a href="{{ cms_url('global.footer.service_4_url', '#certifications') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_4', 'الشهادات الدولية') }}</a></li>
          <li><a href="{{ cms_url('global.footer.service_5_url', '#assessments') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_5', 'المقاييس والتقييم') }}</a></li>
        </ul>
      </div>

      <!-- Col 4: روابط سريعة -->
      <div class="order-3 md:order-4 lg:order-3 w-full max-w-[300px] lg:w-[140px]">
        <div class="flex items-center gap-3 mb-[25px]">
          <h4 class="text-[21px] font-semibold text-white whitespace-nowrap" style="font-family: 'El Messiri', sans-serif;">{{ cms('global.footer.links_title', 'روابط سريعة') }}</h4>
          <div class="flex items-center" dir="ltr">
            <div class="w-[6.64px] h-[6.64px] rounded-full bg-[#CFA63D] shrink-0"></div>
            <div class="w-[58px] h-[2px] bg-[#E6B844]"></div>
          </div>
        </div>
        <ul class="space-y-[18px] text-[17px] text-[#DDDDDD]" style="font-family: 'El Messiri', sans-serif;">
          <li><a href="{{ cms_url('global.footer.link_1_url', '#home') }}" data-nav="home" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_1', 'الرئيسية') }}</a></li>
          <li><a href="{{ cms_url('global.footer.link_2_url', '#courses') }}" data-nav="courses" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_2', 'الدورات') }}</a></li>
          <li><a href="{{ cms_url('global.footer.link_3_url', '#certifications') }}" data-nav="certifications" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_3', 'الشهادات') }}</a></li>
          <li><a href="{{ cms_url('global.footer.link_4_url', '#assessments') }}" data-nav="assessments" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_4', 'المقاييس') }}</a></li>
          <li><a href="{{ cms_url('global.footer.link_5_url', '#about') }}" data-nav="about" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_5', 'عن دار الرؤى') }}</a></li>
        </ul>
      </div>

    </div>

    <!-- Divider Line -->
    <div class="w-full max-w-[361px] md:max-w-none mx-auto h-[1px] bg-[#C5C5C5]/20 my-8 lg:my-10"></div>

    <!-- Rights & Policies -->
    <div class="w-full max-w-[361px] md:max-w-none mx-auto flex flex-col md:flex-row items-center justify-between gap-5 md:gap-0 text-[14px] text-[#F6F6F6]" style="font-family: 'El Messiri', sans-serif;">
      <p class="order-1 md:order-1 text-center md:text-right font-medium">{{ cms('global.footer.copyright', 'جميع الحقوق محفوظة لـ مركز دار الرؤى للتدريب © 2026') }}</p>
      <div class="order-2 md:order-2 flex items-center justify-center gap-[27px]">
        <a href="{{ cms_url('global.footer.terms_url', '#') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.terms', 'الشروط والأحكام') }}</a>
        <a href="{{ cms_url('global.footer.privacy_url', '#') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.privacy', 'سياسة الخصوصية') }}</a>
      </div>
    </div>

  </div>
</footer>
