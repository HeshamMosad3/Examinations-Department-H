{{-- الفوتر (Figma: ديسكتوب #3403:8807 / موبايل #3403:7581) --}}
@php
  $fi = '/landing/images/footer';
  // عنوان العمود: اسم + خط ذهبي بنقطة على شماله
  $heading = fn (string $text) => '<div class="flex items-center gap-2 mb-[25px]"><h4 class="text-[21px] font-semibold leading-[1.5] text-white whitespace-nowrap" style="font-family: \'El Messiri\', sans-serif;">' . e($text) . '</h4><div class="flex items-center" dir="ltr"><div class="w-[6.64px] h-[6.64px] rounded-full bg-[#CFA63D] shrink-0"></div><div class="w-[52px] h-[2px] bg-[#E6B844]"></div></div></div>';
@endphp
<footer id="contact" role="contentinfo" class="w-full bg-[#1A3B62] text-white mt-[25px] md:mt-[51px] pt-4 lg:pt-[47px] pb-4 lg:pb-[28px] px-4 sm:px-6 lg:px-12">
  <div class="max-w-[1240px] mx-auto">

    <!-- Columns Container: 1 col on mobile, 2 cols on tablet (md), flex on desktop (lg) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:flex lg:flex-row lg:justify-start items-start gap-10 md:gap-x-12 md:gap-y-10 lg:gap-0 max-w-[361px] md:max-w-[680px] lg:max-w-[1236px] mx-auto lg:mx-0">

      <!-- Col 1: Logo & Social -->
      <div class="order-1 flex flex-col items-start text-right w-full max-w-[247px] lg:w-[247px] lg:shrink-0">
        <div class="mb-[21px]">
          <img src="{{ cms_image('global.footer.logo', '/landing/images/footer-logo.png') }}" alt="شعار دار الرؤى للتدريب" class="w-[69px] h-[70px] lg:w-[81px] lg:h-[82px] object-contain object-bottom" />
        </div>
        <p class="text-[#FEFEFE] text-[14px] leading-[1.5] mb-[28px] min-h-[49px] max-w-[247px]" style="font-family: 'El Messiri', sans-serif; font-weight: 500;">
          {{ cms('global.footer.tagline', 'مع دار الرؤى للتدريب... نصنع مستقبلك بخبرات علمية ومهارات عملية.') }}
        </p>
        <div class="flex items-center gap-[14px]">
          <a href="{{ cms_url('global.footer.x_url', '#') }}" aria-label="حساب دار الرؤى للتدريب على منصة إكس" rel="noopener noreferrer" class="size-[31px] rounded-[5px] hover:opacity-80 transition-opacity focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844]">
            <img src="{{ $fi }}/x.svg" alt="" class="size-[31px]" aria-hidden="true" />
          </a>
          <a href="{{ cms_url('global.footer.instagram_url', '#') }}" aria-label="حساب دار الرؤى للتدريب على إنستغرام" rel="noopener noreferrer" class="size-[31px] rounded-[5px] border border-[#ddd] hover:border-[#E6B844] flex items-center justify-center transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844]">
            <img src="{{ $fi }}/instagram.svg" alt="" class="size-[20px]" aria-hidden="true" />
          </a>
          <a href="{{ cms_url('global.footer.youtube_url', '#') }}" aria-label="قناة دار الرؤى للتدريب على يوتيوب" rel="noopener noreferrer" class="size-[31px] rounded-[5px] border border-[#ddd] hover:border-[#E6B844] flex items-center justify-center transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844]">
            <img src="{{ $fi }}/youtube.svg" alt="" class="size-[20px]" aria-hidden="true" />
          </a>
        </div>
      </div>

      <!-- Col 2: تواصل معنا (آخر عمود على الديسكتوب، وبعد «روابط سريعة» على الموبايل) -->
      <div class="order-3 md:order-2 w-full max-w-[300px] lg:order-4 lg:w-[270px] lg:max-w-none lg:shrink-0 lg:ms-[161px]">
        {!! $heading(cms('global.footer.contact_title', 'تواصل معنا')) !!}
        <ul class="flex flex-col gap-[18px] text-[17px] leading-[27px] text-[#ddd]" style="font-family: 'El Messiri', sans-serif;">
          <li class="flex items-start gap-[14px]">
            <span class="relative block size-[24px] shrink-0 overflow-clip" aria-hidden="true"><span class="absolute inset-[8.33%_16.67%]"><img src="{{ $fi }}/location.svg" alt="" class="absolute block max-w-none" style="left:-6.25%;top:-5%;width:112.5%;height:110%" /></span></span>
            <span class="whitespace-nowrap hover:text-white transition-colors">{{ cms('global.footer.address', 'الرياض - المملكة العربية السعودية') }}</span>
          </li>
          <li class="flex items-start gap-[14px]">
            <span class="relative block h-[25px] w-[26px] shrink-0 overflow-clip" aria-hidden="true"><img src="{{ $fi }}/phone.svg" alt="" class="absolute max-w-none left-[4px] top-px size-[24px]" /></span>
            <a href="{{ cms_url('global.footer.phone_url', 'tel:+966557595769') }}" dir="ltr" aria-label="الاتصال بالهاتف: {{ cms('global.footer.phone', '+966 55 759 5769') }}" class="hover:text-[#E6B844] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844] rounded">{{ cms('global.footer.phone', '+966 55 759 5769') }}</a>
          </li>
          <li class="flex items-center gap-[14px]">
            <img src="{{ $fi }}/email.svg" alt="" class="size-[24px] shrink-0" aria-hidden="true" />
            <a href="mailto:{{ cms('global.footer.email', 'info@alruaa.com') }}" dir="ltr" aria-label="إرسال بريد إلكتروني: {{ cms('global.footer.email', 'info@alruaa.com') }}" class="hover:text-[#E6B844] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E6B844] rounded">{{ cms('global.footer.email', 'info@alruaa.com') }}</a>
          </li>
          <li class="flex items-center gap-[14px]">
            <span class="relative block size-[24px] shrink-0" aria-hidden="true"><span class="absolute inset-[8.33%]"><img src="{{ $fi }}/clock.svg" alt="" class="absolute block max-w-none" style="left:-5%;top:-5%;width:110%;height:110%" /></span></span>
            <span>{{ cms('global.footer.hours', 'الأحد–الخميس: 9ص–6م') }}</span>
          </li>
        </ul>
      </div>

      <!-- Col 3: خدماتنا (مخفي على الموبايل) -->
      <div class="hidden md:block order-4 md:order-3 lg:order-2 w-full max-w-[300px] lg:w-[131px] lg:max-w-none lg:shrink-0 lg:ms-[91px]">
        {!! $heading(cms('global.footer.services_title', 'خدماتنا')) !!}
        <ul class="flex flex-col gap-[18px] text-[17px] leading-[27px] text-[#ddd] whitespace-nowrap" style="font-family: 'El Messiri', sans-serif;">
          <li><a href="{{ cms_url('global.footer.service_1_url', '#courses') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_1', 'التدريب الفردي') }}</a></li>
          <li><a href="{{ cms_url('global.footer.service_2_url', '#courses') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_2', 'التدريب المؤسسي') }}</a></li>
          <li><a href="{{ cms_url('global.footer.service_3_url', '#courses') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_3', 'التعلم الإلكتروني') }}</a></li>
          <li><a href="{{ cms_url('global.footer.service_4_url', '#certifications') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_4', 'الشهادات الدولية') }}</a></li>
          <li><a href="{{ cms_url('global.footer.service_5_url', '#assessments') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.service_5', 'المقاييس والتقييم') }}</a></li>
        </ul>
      </div>

      <!-- Col 4: روابط سريعة -->
      <div class="order-2 md:order-4 lg:order-3 w-full max-w-[300px] lg:w-[175px] lg:max-w-none lg:shrink-0 lg:ms-[161px]">
        {!! $heading(cms('global.footer.links_title', 'روابط سريعة')) !!}
        <ul class="flex flex-col gap-[18px] text-[17px] leading-[21px] text-[#ddd]" style="font-family: 'El Messiri', sans-serif;">
          <li><a href="{{ cms_url('global.footer.link_1_url', '#home') }}" data-nav="home" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_1', 'الرئيسية') }}</a></li>
          <li><a href="{{ cms_url('global.footer.link_2_url', '#courses') }}" data-nav="courses" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_2', 'الدورات') }}</a></li>
          <li><a href="{{ cms_url('global.footer.link_3_url', '#certifications') }}" data-nav="certifications" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_3', 'الشهادات') }}</a></li>
          <li><a href="{{ cms_url('global.footer.link_4_url', '#assessments') }}" data-nav="assessments" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_4', 'المقاييس') }}</a></li>
          <li><a href="{{ cms_url('global.footer.link_5_url', '#about') }}" data-nav="about" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.link_5', 'عن دار الرؤى') }}</a></li>
        </ul>
      </div>

    </div>

    <!-- Divider Line -->
    <div class="w-full max-w-[361px] md:max-w-none mx-auto h-[1px] bg-[#C5C5C5]/20 mt-10 mb-[13px] lg:mt-[25px] lg:mb-[42px]"></div>

    <!-- Rights & Policies -->
    <div class="w-full max-w-[361px] md:max-w-none mx-auto flex flex-col md:flex-row items-center justify-between gap-5 md:gap-0 text-[14px] leading-[normal] text-[#F6F6F6]" style="font-family: 'El Messiri', sans-serif;">
      <p class="order-1 md:order-1 text-center md:text-right font-medium min-h-[26px]">{{ cms('global.footer.copyright', 'جميع الحقوق محفوظة لـ مركز دار الرؤى للتدريب © 2026') }}</p>
      <div class="order-2 md:order-2 flex items-center justify-center gap-[27px] leading-[1.5]">
        <a href="{{ cms_url('global.footer.terms_url', '#') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.terms', 'الشروط والأحكام') }}</a>
        <a href="{{ cms_url('global.footer.privacy_url', '#') }}" class="hover:text-[#E6B844] transition-colors">{{ cms('global.footer.privacy', 'سياسة الخصوصية') }}</a>
      </div>
    </div>

  </div>
</footer>
