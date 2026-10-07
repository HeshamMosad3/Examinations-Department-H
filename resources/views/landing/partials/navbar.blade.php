<!-- ==================== 1. FLOATING NAV-BAR (#875:7147 / #934:5750) ==================== -->
@php
    $isHome = request()->routeIs('home') || request()->is('/');
@endphp
  <header id="main-header" class="sticky top-[6px] min-[390px]:top-[10px] mt-[6px] min-[390px]:mt-[10px] lg:mt-4 lg:top-4 z-40 w-[calc(100%-32px)] lg:max-w-[1024px] mx-auto h-[57px] lg:h-[80px] rounded-[109px] lg:rounded-[38px] bg-white/65 lg:bg-white/66 backdrop-blur-md lg:backdrop-blur-xl border border-[#E2E8F0]/80 shadow-[0_6px_25px_rgba(0,0,0,0.06)] px-[16px] lg:px-[24px] flex items-center justify-between transition-all duration-300">

    <!-- RIGHT SIDE IN RTL: Logo & Mobile Hamburger Menu (#934:5756 / #656:3820) -->
    <div class="flex items-center gap-[3px] lg:gap-3">
      <!-- MOBILE MENU TOGGLE (Mobile only, 40x40px, #cuida:menu-outline #934:5758) -->
      <button id="mobile-menu-btn" aria-label="فتح القائمة الرئيسية" aria-expanded="false" aria-controls="mobile-drawer" aria-haspopup="dialog" class="lg:hidden w-[40px] h-[40px] rounded-full flex items-center justify-center text-[#204A7A] hover:bg-black/5 active:scale-95 transition-all cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary">
        <i class="fa-solid fa-bars text-[20px] text-[#204A7A]" aria-hidden="true"></i>
      </button>

      <!-- LOGO (58x45 on mobile #934:5757, scaled up to 86x79 on desktop #656:3820) -->
      <a href="#home" data-nav="home" aria-label="الصفحة الرئيسية لدار الرؤى" class="flex items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary rounded-lg">
        <img src="{{ cms_image('global.nav.logo', '/landing/images/logo.png') }}" alt="شعار دار الرؤى للتدريب" loading="eager" fetchpriority="high" decoding="async" class="w-[58px] h-[45px] lg:w-auto lg:h-[58px] object-contain drop-shadow-sm" />
      </a>
    </div>

    <!-- Center Navigation Links (desktop) (#I875:7147;656:3882) -->
    <nav id="main-nav" aria-label="القائمة الرئيسية" class="hidden lg:flex items-center gap-[24px] xl:gap-[26px] text-[15px] xl:text-[17px] font-messiri leading-none h-[38px] whitespace-nowrap">
      <a href="{{ cms_url('global.nav.home_url', '/#home') }}" data-nav="home" class="nav-item relative py-1 {{ $isHome ? 'text-[#204A7A] font-bold' : 'text-[#1D1D1D] font-medium hover:text-[#204A7A]' }} transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary rounded">
        <span class="nav-text">{{ cms('global.nav.home', 'الرئيسية') }}</span>
        @if($isHome)
        <span class="nav-indicator absolute bottom-[-4px] left-0 right-0 h-[2.5px] bg-[#204A7A] rounded-full" aria-hidden="true"></span>
        @endif
      </a>
      <a href="{{ cms_url('global.nav.courses_url', '#courses') }}" data-nav="courses" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary rounded">
        <span class="nav-text">{{ cms('global.nav.courses', 'الدورات') }}</span>
      </a>
      <a href="{{ cms_url('global.nav.certifications_url', '#certifications') }}" data-nav="certifications" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary rounded">
        <span class="nav-text">{{ cms('global.nav.certifications', 'الشهادات الاحترافية') }}</span>
      </a>
      <a href="{{ cms_url('global.nav.assessments_url', '#assessments') }}" data-nav="assessments" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary rounded">
        <span class="nav-text">{{ cms('global.nav.assessments', 'المقاييس') }}</span>
      </a>
      <a href="{{ cms_url('global.nav.about_url', '#about') }}" data-nav="about" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary rounded">
        <span class="nav-text">{{ cms('global.nav.about', 'عن دار الرؤى') }}</span>
      </a>
      <a href="{{ cms_url('global.nav.contact_url', '#contact') }}" data-nav="contact" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary rounded">
        <span class="nav-text">{{ cms('global.nav.contact', 'تواصل معنا') }}</span>
      </a>
    </nav>

    <!-- LEFT SIDE IN RTL: Outline Button (#954:5878 mobile / #656:3810 desktop) -->
    <div class="flex items-center justify-end">
      @auth
        <div class="flex items-center gap-2">
          <span class="hidden sm:inline-block text-[#204A7A] font-medium text-xs lg:text-sm font-messiri max-w-[120px] lg:max-w-[160px] truncate">
            {{ auth()->user()->name }}
          </span>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" aria-label="تسجيل الخروج" title="تسجيل الخروج" class="h-[28px] lg:h-[40px] px-2.5 lg:px-4 rounded-[5px] lg:rounded-[14px] border border-[#E53935]/40 text-[#E53935] hover:bg-[#E53935] hover:text-white font-messiri lg:font-cairo font-semibold text-[10px] lg:text-[13px] transition-all duration-200 flex items-center justify-center gap-1.5 whitespace-nowrap shadow-sm">
              <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
              <span class="hidden lg:inline">خروج</span>
            </button>
          </form>
        </div>
      @else
        <a href="#login" role="button" aria-haspopup="dialog" aria-controls="login-modal" aria-label="فتح نافذة تسجيل الدخول" class="w-[80px] h-[28px] lg:w-[154px] lg:h-[45px] rounded-[5px] lg:rounded-[16px] border border-[#204A7A] text-[#204A7A] font-messiri lg:font-cairo font-semibold text-[10px] lg:text-[14px] hover:bg-[#204A7A] hover:text-white transition-all duration-200 shadow-sm flex items-center justify-center whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary">
          <span class="leading-none lg:hidden">{{ cms('global.nav.login_mobile', 'تسجيل دخول') }}</span>
          <span class="leading-none hidden lg:inline">{{ cms('global.nav.login', 'تسجيل الدخول') }}</span>
        </a>
      @endauth
    </div>
  </header>

  <!-- ==================== MOBILE OFF-CANVAS DRAWER (#934:5761 / #934:5762) ==================== -->
  <!-- Backdrop Overlay -->
  <div id="mobile-drawer-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[99] opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out lg:hidden" aria-hidden="true"></div>

  <!-- Off-Canvas Drawer (Full Height Sidebar, slides in from the right edge, hidden on desktop) -->
  <aside id="mobile-drawer" role="dialog" aria-modal="true" aria-label="القائمة الجانبية للتنقل" class="fixed top-0 right-0 bottom-0 h-screen h-[100dvh] w-[252px] max-w-[85vw] bg-[#1A3B62] shadow-[-4px_0_25px_rgba(0,0,0,0.35)] z-[100] flex flex-col translate-x-full transition-transform duration-300 ease-in-out select-none overflow-hidden lg:hidden">
    <!-- Top Row: Close Button (Positioned at top-left inside drawer: x=22, y=19, 16x16px icon) -->
    <button id="mobile-drawer-close" aria-label="إغلاق القائمة الجانبية" class="absolute top-[20px] left-[20px] w-[32px] h-[32px] flex items-center justify-center text-white/90 hover:text-white hover:bg-white/10 rounded-full active:scale-95 transition-all cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white">
      <svg class="w-[16px] h-[16px] text-white pointer-events-none" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
        <line x1="2" y1="2" x2="14" y2="14" />
        <line x1="14" y1="2" x2="2" y2="14" />
      </svg>
    </button>

    <!-- Navigation Links List (#934:5763: x=49, y=54, width=174px, gap=19px, El Messiri) -->
    <nav aria-label="روابط التنقل للأجهزة الذكية" class="pt-[56px] pr-[28px] pl-[20px] flex flex-col gap-[20px] text-right font-messiri overflow-hidden">
      <a href="{{ cms_url('global.nav.home_url', '/#home') }}" data-nav="home" class="mobile-nav-item {{ $isHome ? 'text-white font-bold' : 'text-white font-normal hover:text-[#E6B844]' }} text-[19px] leading-[1.5] whitespace-nowrap transition-colors cursor-pointer">{{ cms('global.nav.home', 'الرئيسية') }}</a>
      <a href="{{ cms_url('global.nav.courses_url', '#courses') }}" data-nav="courses" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.courses', 'الدورات') }}</a>
      <a href="{{ cms_url('global.nav.certifications_url', '#certifications') }}" data-nav="certifications" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.certifications_mobile', 'الشهادات الإحترافية') }}</a>
      <a href="{{ cms_url('global.nav.assessments_url', '#assessments') }}" data-nav="assessments" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.assessments', 'المقاييس') }}</a>
      <a href="{{ cms_url('global.nav.about_url', '#about') }}" data-nav="about" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.about', 'عن دار الرؤى') }}</a>
      <a href="{{ cms_url('global.nav.contact_url', '#contact') }}" data-nav="contact" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.contact', 'تواصل معنا') }}</a>
      
      <div class="pt-4 border-t border-white/10 mt-2">
        @auth
          <div class="text-white/80 text-sm mb-2 font-messiri">{{ auth()->user()->name }}</div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full h-[42px] rounded-[10px] bg-red-600/80 hover:bg-red-600 text-white font-semibold text-[15px] flex items-center justify-center gap-2 transition-colors">
              <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
              <span>تسجيل الخروج</span>
            </button>
          </form>
        @else
          <a href="#login" onclick="const d = document.getElementById('mobile-drawer-close'); if(d) d.click();" class="w-full h-[42px] rounded-[10px] bg-white text-[#1A3B62] font-semibold text-[15px] flex items-center justify-center gap-2 transition-colors">
            <i class="fa-regular fa-user text-xs"></i>
            <span>تسجيل الدخول</span>
          </a>
        @endauth
      </div>
    </nav>
  </aside>

  

  <!-- Main Container -->
