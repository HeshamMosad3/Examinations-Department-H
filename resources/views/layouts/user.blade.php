<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'نظام المقاييس') — دار الرؤى</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Kufi Arabic', sans-serif;
            background-color: #f8f9fa;
            color: #1a2b56;
        }

        /* ── Top Navbar ── */
        .top-navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 1020;
        }
        .navbar-brand {
            color: #1a2b56;
            font-weight: 800;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
        }
        .navbar-brand span {
            color: #f59e0b; /* Accent color for the VR logo part */
        }
        .navbar-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .icon-btn {
            background: none;
            border: none;
            color: #4a5568;
            font-size: 1.3rem;
            position: relative;
        }
        .notification-dot {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 8px;
            height: 8px;
            background-color: #f59e0b;
            border-radius: 50%;
        }


        /* ── Utilities ── */
        .text-navy {
            color: #1a2b56;
        }
        .bg-navy {
            background-color: #1a2b56;
        }
        
        @media (min-width: 992px) {
            body {
                padding-bottom: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Top Navbar -->
<nav class="top-navbar">
    <div class="container d-flex justify-content-between align-items-center px-3">
        <!-- Logo -->
        <a class="navbar-brand text-decoration-none" href="{{ route('dashboard.assessments') }}">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="دار الرؤى" style="height: 48px;">
            </div>
        </a>

        <!-- User Menu -->
        <div class="d-flex align-items-center gap-2">
            <span class="fw-medium text-secondary" style="font-size: 0.9rem;">
                <i class="bi bi-person-circle text-muted fs-5 align-middle me-1"></i> {{ auth()->user()?->name ?? 'معاينة بالنظام' }}
            </span>
            <div class="dropdown">
                <button class="btn btn-link text-secondary p-0 ms-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                    <i class="bi bi-three-dots-vertical fs-5"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width: 150px; border-radius: 12px; padding: 8px;">
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger fw-bold d-flex align-items-center gap-2 rounded" style="padding: 8px 12px;">
                                <i class="bi bi-box-arrow-right"></i> تسجيل الخروج
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div id="alert-container" class="container mt-2"></div>

<main>
    @if(session('info'))
        <div class="container mt-3">
            <div class="alert alert-info alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="bi bi-info-circle me-2"></i>{{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @yield('content')
</main>

<footer class="text-center text-muted py-4 mt-5 mb-lg-0 mb-5 small bg-white border-top">
    &copy; {{ date('Y') }} دار الرؤى — نظام مقاييس التميز الشخصي والاحتراف المهني
</footer>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
        window.location.reload();
    }
});
</script>
@stack('scripts')
</body>
</html>
