@php
    // Same auth logic as website/partials/navbar.blade.php
    $navUser = auth('admin')->user() ?? auth('web')->user();
    $navIsAdmin = auth('admin')->check();
    $navPercent = ($navUser && ! $navIsAdmin) ? app(\App\Services\Website\Auth\ProfileForm::class)->completion($navUser)['percent'] : null;
    $profileUrl = $navIsAdmin ? route('admin.dashboard') : route('profile.edit');
    $loginUrl = route('login', ['next' => request()->getRequestUri()]);

    // [key, label, url] — same CMS keys as the main header; defaults point at real URLs so the links work from any page
    $navItems = [
        ['home', cms('global.nav.home', 'الرئيسية'), cms_url('global.nav.home_url', url('/'))],
        ['courses', cms('global.nav.courses', 'الدورات'), cms_url('global.nav.courses_url', url('/courses'))],
        ['certifications', cms('global.nav.certifications', 'الشهادات الاحترافية'), cms_url('global.nav.certifications_url', url('/#certifications'))],
        ['assessments', cms('global.nav.assessments', 'المقاييس'), cms_url('global.nav.assessments_url', url('/#assessments'))],
        ['about', cms('global.nav.about', 'عن دار الرؤى'), cms_url('global.nav.about_url', url('/#about'))],
        ['contact', cms('global.nav.contact', 'تواصل معنا'), cms_url('global.nav.contact_url', '#contact')],
    ];
@endphp
{{-- ==================== FLOATING NAV-BAR (same look + auth behaviour as the main site header) ==================== --}}
<header id="main-header" class="bs-header">
  <div class="d-flex align-items-center gap-1 gap-lg-3">
    <button type="button" class="bs-menu-btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobile-drawer" aria-controls="mobile-drawer" aria-label="فتح القائمة الرئيسية">
      <i class="fa-solid fa-bars" aria-hidden="true"></i>
    </button>
    <a href="{{ url('/') }}" class="bs-logo" aria-label="الصفحة الرئيسية لدار الرؤى">
      <img src="{{ cms_image('global.nav.logo', '/assets/website/images/logo.png') }}" alt="شعار دار الرؤى للتدريب" width="86" height="58" fetchpriority="high" />
    </a>
  </div>

  <nav class="bs-nav d-none d-lg-flex" aria-label="القائمة الرئيسية">
    @foreach ($navItems as [$key, $label, $href])
      <a href="{{ $href }}" data-text="{{ $label }}" class="bs-nav-link {{ ($active ?? null) === $key ? 'is-active' : '' }}" @if (($active ?? null) === $key) aria-current="page" @endif>
        <span>{{ $label }}</span>
      </a>
    @endforeach
  </nav>

  <div class="d-flex align-items-center justify-content-end">
    @if ($navUser)
      {{-- Logged in: user menu (profile / dashboard + logout) --}}
      <div class="dropdown bs-user-menu" id="user-profile-menu">
        <button type="button" id="user-menu-button" class="bs-user-btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-label="قائمة المستخدم">
          <i class="fa-solid fa-user" aria-hidden="true"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end bs-user-dropdown" aria-labelledby="user-menu-button">
          <div class="bs-user-name">{{ $navUser->name }}</div>

          <a href="{{ $profileUrl }}" class="bs-user-item">
            <span class="bs-item-label"><i class="fa-regular fa-id-card" aria-hidden="true"></i><span>{{ cms('global.nav.profile', 'الملف الشخصي') }}</span></span>
            @if ($navPercent !== null)
              <span dir="ltr" class="bs-pct {{ $navPercent === 100 ? 'is-complete' : '' }}">{{ $navPercent }}%</span>
            @endif
          </a>

          <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
            @csrf
            <button type="submit" class="bs-user-item bs-user-item--danger">
              <span class="bs-item-label"><i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i><span>تسجيل الخروج</span></span>
            </button>
          </form>
        </div>
      </div>
    @else
      <a href="{{ $loginUrl }}" class="bs-login-btn">
        <span class="d-lg-none">{{ cms('global.nav.login_mobile', 'تسجيل دخول') }}</span>
        <span class="d-none d-lg-inline">{{ cms('global.nav.login', 'تسجيل الدخول') }}</span>
      </a>
    @endif
  </div>
</header>

{{-- ==================== MOBILE OFF-CANVAS DRAWER (Bootstrap offcanvas) ==================== --}}
<aside id="mobile-drawer" class="offcanvas offcanvas-start bs-drawer" tabindex="-1" aria-label="القائمة الجانبية للتنقل">
  <button type="button" class="bs-drawer-close" data-bs-dismiss="offcanvas" aria-label="إغلاق القائمة الجانبية">
    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
  </button>
  <nav class="bs-drawer-nav" aria-label="روابط التنقل للأجهزة الذكية">
    @foreach ($navItems as [$key, $label, $href])
      <a href="{{ $href }}" class="{{ ($active ?? null) === $key ? 'is-active' : '' }}" @if (str_starts_with($href, '#')) data-bs-dismiss="offcanvas" @endif>{{ $label }}</a>
    @endforeach

    <div class="bs-drawer-cta">
      @if ($navUser)
        <div class="bs-drawer-user">{{ $navUser->name }}</div>
        <a href="{{ $profileUrl }}" class="bs-drawer-btn">
          <span class="bs-item-label d-flex align-items-center gap-2"><i class="fa-regular fa-id-card" aria-hidden="true"></i><span>الملف الشخصي</span></span>
          <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
        </a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="bs-drawer-btn bs-drawer-btn--danger">
            <i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i><span>تسجيل الخروج</span>
          </button>
        </form>
      @else
        <a href="{{ $loginUrl }}" class="bs-drawer-login"><i class="fa-regular fa-user" aria-hidden="true"></i><span>تسجيل الدخول</span></a>
      @endif
    </div>
  </nav>
</aside>
