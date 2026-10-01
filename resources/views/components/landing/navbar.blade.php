<!-- ==================== 1. FLOATING NAV-BAR (#875:7147 / #934:5750) ==================== -->
  <header class="sticky top-[6px] min-[390px]:top-[10px] mt-[6px] min-[390px]:mt-[10px] lg:mt-4 lg:top-4 z-40 w-[calc(100%-32px)] lg:max-w-[1024px] mx-auto h-[57px] lg:h-[80px] rounded-[109px] lg:rounded-[38px] bg-white/65 lg:bg-white/66 backdrop-blur-md lg:backdrop-blur-xl border border-[#E2E8F0]/80 shadow-[0_6px_25px_rgba(0,0,0,0.06)] px-[16px] lg:px-[24px] flex items-center justify-between transition-all duration-300">

    <!-- RIGHT SIDE IN RTL: Logo & Mobile Hamburger Menu (#934:5756 / #656:3820) -->
    <div class="flex items-center gap-[3px] lg:gap-3">
      <!-- MOBILE MENU TOGGLE (Mobile only, 40x40px, #cuida:menu-outline #934:5758) -->
      <button id="mobile-menu-btn" aria-label="فتح القائمة" aria-expanded="false" class="lg:hidden w-[40px] h-[40px] rounded-full flex items-center justify-center text-[#204A7A] hover:bg-black/5 active:scale-95 transition-all cursor-pointer">
        <i class="fa-solid fa-bars text-[20px] text-[#204A7A]"></i>
      </button>

      <!-- LOGO (58x45 on mobile #934:5757, scaled up to 86x79 on desktop #656:3820) -->
      <a href="#home" data-nav="home" class="flex items-center">
        <img src="/images/logo.png" alt="شعار دار الرؤى للتدريب" loading="eager" fetchpriority="high" decoding="async" class="w-[58px] h-[45px] lg:w-auto lg:h-[58px] object-contain drop-shadow-sm" />
      </a>
    </div>

    <!-- Center Navigation Links (desktop) (#I875:7147;656:3882) -->
    <nav id="main-nav" class="hidden lg:flex items-center gap-[24px] xl:gap-[26px] text-[15px] xl:text-[17px] font-messiri leading-none h-[38px] whitespace-nowrap">
      <a href="#home" data-nav="home" class="nav-item relative py-1 text-[#204A7A] font-bold transition-colors cursor-pointer">
        <span class="nav-text">الرئيسية</span>
        <span class="nav-indicator absolute bottom-[-4px] left-0 right-0 h-[2.5px] bg-[#204A7A] rounded-full"></span>
      </a>
      <a href="#courses" data-nav="courses" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer">
        <span class="nav-text">الدورات</span>
      </a>
      <a href="#certifications" data-nav="certifications" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer">
        <span class="nav-text">الشهادات الاحترافية</span>
      </a>
      <a href="#assessments" data-nav="assessments" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer">
        <span class="nav-text">المقاييس</span>
      </a>
      <a href="#about" data-nav="about" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer">
        <span class="nav-text">عن دار الرؤى</span>
      </a>
      <a href="#contact" data-nav="contact" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer">
        <span class="nav-text">تواصل معنا</span>
      </a>
    </nav>

    <!-- LEFT SIDE IN RTL: Outline Button (#954:5878 mobile / #656:3810 desktop) -->
    <div class="flex items-center justify-end">
      <a href="#login" class="w-[80px] h-[28px] lg:w-[154px] lg:h-[45px] rounded-[5px] lg:rounded-[16px] border border-[#204A7A] text-[#204A7A] font-messiri lg:font-cairo font-semibold text-[10px] lg:text-[14px] hover:bg-[#204A7A] hover:text-white transition-all duration-200 shadow-sm flex items-center justify-center whitespace-nowrap">
        <span class="leading-none lg:hidden">تسجيل دخول</span>
        <span class="leading-none hidden lg:inline">تسجيل الدخول</span>
      </a>
    </div>
  </header>

  <!-- ==================== MOBILE OFF-CANVAS DRAWER (#934:5761 / #934:5762) ==================== -->
  <!-- Backdrop Overlay -->
  <div id="mobile-drawer-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[99] opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out lg:hidden"></div>

  <!-- Off-Canvas Drawer (Full Height Sidebar, slides in from the right edge, hidden on desktop) -->
  <aside id="mobile-drawer" class="fixed top-0 right-0 bottom-0 h-screen h-[100dvh] w-[252px] max-w-[85vw] bg-[#1A3B62] shadow-[-4px_0_25px_rgba(0,0,0,0.35)] z-[100] flex flex-col translate-x-full transition-transform duration-300 ease-in-out select-none overflow-hidden lg:hidden" aria-label="القائمة الجانبية">
    <!-- Top Row: Close Button (Positioned at top-left inside drawer: x=22, y=19, 16x16px icon) -->
    <button id="mobile-drawer-close" aria-label="إغلاق القائمة" class="absolute top-[20px] left-[20px] w-[32px] h-[32px] flex items-center justify-center text-white/90 hover:text-white hover:bg-white/10 rounded-full active:scale-95 transition-all cursor-pointer">
      <svg class="w-[16px] h-[16px] text-white pointer-events-none" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
        <line x1="2" y1="2" x2="14" y2="14" />
        <line x1="14" y1="2" x2="2" y2="14" />
      </svg>
    </button>

    <!-- Navigation Links List (#934:5763: x=49, y=54, width=174px, gap=19px, El Messiri) -->
    <nav class="pt-[56px] pr-[28px] pl-[20px] flex flex-col gap-[20px] text-right font-messiri overflow-hidden">
      <a href="#home" data-nav="home" class="mobile-nav-item text-white font-bold text-[19px] leading-[1.5] whitespace-nowrap transition-colors cursor-pointer">الرئيسية</a>
      <a href="#courses" data-nav="courses" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">الدورات</a>
      <a href="#certifications" data-nav="certifications" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">الشهادات الإحترافية</a>
      <a href="#assessments" data-nav="assessments" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">المقاييس</a>
      <a href="#about" data-nav="about" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">عن دار الرؤى</a>
      <a href="#contact" data-nav="contact" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">تواصل معنا</a>
    </nav>
  </aside>

  

  <!-- Main Container -->
