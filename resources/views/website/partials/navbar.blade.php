@php
    $navUser = auth('admin')->user() ?? auth('web')->user();
    $navIsAdmin = auth('admin')->check();
@endphp
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
        <img src="{{ cms_image('global.nav.logo', '/assets/website/images/logo.png') }}" alt="شعار دار الرؤى للتدريب" loading="eager" fetchpriority="high" decoding="async" class="w-[58px] h-[45px] lg:w-auto lg:h-[58px] object-contain drop-shadow-sm" />
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
      <a href="{{ cms_url('global.nav.courses_url', '/courses') }}" data-nav="courses" class="nav-item relative py-1 text-[#1D1D1D] font-medium hover:text-[#204A7A] transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary rounded">
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

    <!-- LEFT SIDE IN RTL: User Profile Dropdown or Login Button -->
    <div class="flex items-center justify-end">
      @if ($navUser)
        <!-- User Profile Dropdown (Hover Trigger) -->
        <div class="relative group" id="user-profile-menu">
          <!-- User Avatar / Icon Trigger Button -->
          <button 
            type="button"
            id="user-menu-button"
            aria-expanded="false" 
            aria-haspopup="true"
            aria-label="قائمة المستخدم"
            class="w-[36px] h-[36px] lg:w-[45px] lg:h-[45px] rounded-full bg-[#E9EDF2] hover:bg-[#204A7A] text-[#204A7A] hover:text-white border border-[#204A7A]/30 transition-all duration-200 flex items-center justify-center shadow-sm cursor-pointer focus:outline-none focus-visible:ring-2 focus-visible:ring-[#204A7A]"
          >
            <i class="fa-solid fa-user text-[15px] lg:text-[18px]"></i>
          </button>

          <!-- Invisible bridge to prevent hover loss when moving mouse to dropdown -->
          <div class="absolute left-0 top-full w-full h-2"></div>

          <!-- Dropdown Menu (Opens on hover and focus-within) -->
          <div 
            class="absolute left-0 top-[calc(100%+8px)] w-[230px] bg-white rounded-[18px] border border-[#DADADA]/70 shadow-[0_12px_32px_rgba(0,0,0,0.12)] p-2.5 z-50 text-right opacity-0 pointer-events-none translate-y-1.5 transition-all duration-200 group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0 group-focus-within:opacity-100 group-focus-within:pointer-events-auto group-focus-within:translate-y-0"
            role="menu"
            aria-labelledby="user-menu-button"
          >
            <!-- User Info: Name -->
            <div class="px-3.5 py-2.5 rounded-[12px] bg-[#F8FAFC] border border-[#E2E8F0] mb-2">
              <p class="text-[#204A7A] font-bold text-[15px] leading-tight font-messiri truncate">
                {{ $navUser->name }}
              </p>
            </div>

            <!-- Profile / Dashboard Link -->
            <a 
              href="{{ $navIsAdmin ? route('admin.dashboard') : route('profile.edit') }}"
              class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-[10px] text-[#262626] hover:bg-[#F0F5FA] hover:text-[#204A7A] font-messiri font-semibold text-[14px] transition-colors mb-1"
              role="menuitem"
            >
              <span class="flex items-center gap-2">
                <i class="fa-regular fa-id-card text-[15px] text-[#204A7A]"></i>
                <span>{{ cms('global.nav.profile', 'الملف الشخصي') }}</span>
              </span>
              @unless ($navIsAdmin)
                @php $navPercent = app(\App\Services\Website\Auth\ProfileForm::class)->completion($navUser)['percent']; @endphp
                <span dir="ltr" class="rounded-full px-2 py-0.5 text-[11px] font-cairo font-bold {{ $navPercent === 100 ? 'bg-[#dcfce7] text-[#166534]' : 'bg-[#fff3cd] text-[#92400e]' }}">{{ $navPercent }}%</span>
              @endunless
            </a>

            <!-- Sign Out Action -->
            <form method="POST" action="{{ route('logout') }}" class="w-full m-0 p-0">
              @csrf
              <button 
                type="submit" 
                class="w-full flex items-center gap-2 px-3.5 py-2.5 rounded-[10px] text-[#E53935] hover:bg-[#FFF5F5] font-messiri font-semibold text-[14px] transition-colors cursor-pointer text-right"
                role="menuitem"
              >
                <i class="fa-solid fa-arrow-right-from-bracket text-[14px]"></i>
                <span>تسجيل الخروج</span>
              </button>
            </form>
          </div>
        </div>
      @else
        <a href="{{ route('login', ['next' => request()->getRequestUri()]) }}" class="w-[80px] h-[28px] lg:w-[154px] lg:h-[45px] rounded-[5px] lg:rounded-[16px] border border-[#204A7A] text-[#204A7A] font-messiri lg:font-cairo font-semibold text-[10px] lg:text-[14px] hover:bg-[#204A7A] hover:text-white transition-all duration-200 shadow-sm flex items-center justify-center whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary">
          <span class="leading-none lg:hidden">{{ cms('global.nav.login_mobile', 'تسجيل دخول') }}</span>
          <span class="leading-none hidden lg:inline">{{ cms('global.nav.login', 'تسجيل الدخول') }}</span>
        </a>
      @endif
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
      <a href="{{ cms_url('global.nav.courses_url', '/courses') }}" data-nav="courses" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.courses', 'الدورات') }}</a>
      <a href="{{ cms_url('global.nav.certifications_url', '#certifications') }}" data-nav="certifications" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.certifications_mobile', 'الشهادات الإحترافية') }}</a>
      <a href="{{ cms_url('global.nav.assessments_url', '#assessments') }}" data-nav="assessments" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.assessments', 'المقاييس') }}</a>
      <a href="{{ cms_url('global.nav.about_url', '#about') }}" data-nav="about" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.about', 'عن دار الرؤى') }}</a>
      <a href="{{ cms_url('global.nav.contact_url', '#contact') }}" data-nav="contact" class="mobile-nav-item text-white font-normal text-[19px] leading-[1.5] whitespace-nowrap hover:text-[#E6B844] transition-colors cursor-pointer">{{ cms('global.nav.contact', 'تواصل معنا') }}</a>
      
      <div class="pt-4 border-t border-white/10 mt-2">
        @if ($navUser)
          <div class="px-3 py-2.5 rounded-[12px] bg-white/10 mb-3 text-right">
            <div class="text-white font-bold text-[15px] font-messiri truncate">{{ $navUser->name }}</div>
          </div>

          <a 
            href="{{ $navIsAdmin ? route('admin.dashboard') : route('profile.edit') }}"
            class="w-full h-[40px] rounded-[10px] bg-white/15 hover:bg-white/25 text-white font-semibold text-[14px] flex items-center justify-between px-3 transition-colors mb-2"
          >
            <span class="flex items-center gap-2">
              <i class="fa-regular fa-id-card text-xs"></i>
              <span>الملف الشخصي</span>
            </span>
            <i class="fa-solid fa-chevron-left text-[10px] opacity-70"></i>
          </a>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full h-[40px] rounded-[10px] bg-red-600/80 hover:bg-red-600 text-white font-semibold text-[14px] flex items-center justify-center gap-2 transition-colors cursor-pointer">
              <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
              <span>تسجيل الخروج</span>
            </button>
          </form>
        @else
          <a href="{{ route('login', ['next' => request()->getRequestUri()]) }}" class="w-full h-[42px] rounded-[10px] bg-white text-[#1A3B62] font-semibold text-[15px] flex items-center justify-center gap-2 transition-colors">
            <i class="fa-regular fa-user text-xs"></i>
            <span>تسجيل الدخول</span>
          </a>
        @endif
      </div>
    </nav>
  </aside>

  

  <!-- Main Container -->
