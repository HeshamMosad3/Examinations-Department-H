@php
    // Static nav (no backend): [key, label, url]
    $navItems = [
        ['home', 'الرئيسية', url('/')],
        ['courses', 'الدورات', url('/courses')],
        ['certifications', 'الشهادات الاحترافية', url('/#certifications')],
        ['assessments', 'المقاييس', url('/#assessments')],
        ['about', 'عن دار الرؤى', url('/#about')],
        ['contact', 'تواصل معنا', '#contact'],
    ];
@endphp
{{-- ==================== FLOATING NAV-BAR (same look as the main site header) ==================== --}}
<header id="main-header" class="bs-header">
  <div class="d-flex align-items-center gap-1 gap-lg-3">
    <button type="button" class="bs-menu-btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobile-drawer" aria-controls="mobile-drawer" aria-label="فتح القائمة الرئيسية">
      <i class="fa-solid fa-bars" aria-hidden="true"></i>
    </button>
    <a href="{{ url('/') }}" class="bs-logo" aria-label="الصفحة الرئيسية لدار الرؤى">
      <img src="/assets/website/images/logo.png" alt="شعار دار الرؤى للتدريب" width="86" height="58" fetchpriority="high" />
    </a>
  </div>

  <nav class="bs-nav d-none d-lg-flex" aria-label="القائمة الرئيسية">
    @foreach ($navItems as [$key, $label, $href])
      <a href="{{ $href }}" class="bs-nav-link {{ ($active ?? null) === $key ? 'is-active' : '' }}" @if (($active ?? null) === $key) aria-current="page" @endif>
        <span>{{ $label }}</span>
      </a>
    @endforeach
  </nav>

  <a href="{{ route('login') }}" class="bs-login-btn">
    <span class="d-lg-none">تسجيل دخول</span>
    <span class="d-none d-lg-inline">تسجيل الدخول</span>
  </a>
</header>

{{-- ==================== MOBILE OFF-CANVAS DRAWER (Bootstrap offcanvas) ==================== --}}
<aside id="mobile-drawer" class="offcanvas offcanvas-start bs-drawer" tabindex="-1" aria-label="القائمة الجانبية للتنقل">
  <button type="button" class="bs-drawer-close" data-bs-dismiss="offcanvas" aria-label="إغلاق القائمة الجانبية">
    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
  </button>
  <nav class="bs-drawer-nav" aria-label="روابط التنقل للأجهزة الذكية">
    @foreach ($navItems as [$key, $label, $href])
      <a href="{{ $href }}" class="{{ ($active ?? null) === $key ? 'is-active' : '' }}" @if ($key === 'contact') data-bs-dismiss="offcanvas" @endif>{{ $label }}</a>
    @endforeach
    <div class="bs-drawer-cta">
      <a href="{{ route('login') }}" class="bs-drawer-login"><i class="fa-regular fa-user" aria-hidden="true"></i><span>تسجيل الدخول</span></a>
    </div>
  </nav>
</aside>
