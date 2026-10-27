<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'لوحة الإدارة') · دار الرؤى</title>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/admin-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/admin.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @php
        $menu = [
            ['route' => 'admin.dashboard', 'match' => 'admin.dashboard', 'icon' => 'bi-speedometer2', 'label' => 'الرئيسية'],
            ['header' => 'المحتوى'],
            ['route' => 'admin.assessments.index', 'match' => 'admin.assessments.*', 'icon' => 'bi-ui-checks-grid', 'label' => 'المقاييس'],
            ['route' => 'admin.site-content.index', 'match' => 'admin.site-content.*', 'icon' => 'bi-layout-text-window', 'label' => 'محتوى الصفحات'],
            ['route' => 'admin.life-wheel-influence.index', 'match' => 'admin.life-wheel-influence.*', 'icon' => 'bi-diagram-3', 'label' => 'إدارة عجلة الحياة'],
            ['header' => 'المستخدمون'],
            ['route' => 'admin.users.index', 'match' => ['admin.users.*', 'admin.attempts.*'], 'icon' => 'bi-people', 'label' => 'المستخدمون والنتائج'],
        ];
    @endphp

    <nav class="navbar bg-white border-bottom sticky-top">
        <div class="container-fluid gap-2">
            <button class="btn btn-outline-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#panelSidebar" aria-label="القائمة"><i class="bi bi-list fs-5"></i></button>
            <a class="navbar-brand brand-mark me-auto ms-1 text-truncate d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="" height="32">
                دار الرؤى <small class="text-muted fw-normal d-none d-sm-inline">· لوحة الإدارة</small>
            </a>
            <div class="d-flex align-items-center gap-2 gap-md-3">
                <a class="small text-decoration-none" href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-left"></i> الموقع</a>
                <span class="small text-muted d-none d-xl-inline"><bdi>{{ auth('admin')->user()->email }}</bdi></span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-outline-secondary" type="submit"><i class="bi bi-box-arrow-right"></i><span class="d-none d-sm-inline"> خروج</span></button>
                </form>
            </div>
        </div>
    </nav>

    <div class="d-lg-flex panel-shell">
        <aside class="offcanvas-lg offcanvas-start panel-aside bg-white border-end" tabindex="-1" id="panelSidebar">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title brand-mark">دار الرؤى · لوحة الإدارة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#panelSidebar" aria-label="إغلاق"></button>
            </div>
            <div class="offcanvas-body d-block p-3">
                <ul class="nav nav-pills flex-column gap-1">
                    @foreach ($menu as $item)
                        @if (isset($item['header']))
                            <li class="nav-header text-muted small px-3 pt-3 pb-1">{{ $item['header'] }}</li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs(...(array) $item['match']) ? 'active' : '' }}" href="{{ route($item['route']) }}">
                                    <i class="bi {{ $item['icon'] }}"></i> {{ $item['label'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </aside>

        <main class="panel-main p-3 p-md-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0 ps-3">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script src="{{ asset('assets/dashboard/js/admin.js') }}"></script>
</body>
</html>
