<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'لوحة الإدارة') — إدارة دار الرؤى</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .sidebar { width: 260px; min-height: 100vh; background: #1a1d23; flex-shrink: 0; }
        .sidebar .nav-link { color: #adb5bd; border-radius: 8px; margin: 2px 8px; padding: 10px 16px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #0d6efd; color: #fff; }
        .sidebar .nav-link i { width: 20px; }
        .main-content { flex: 1; overflow-x: hidden; }
        .topbar { background: #fff; border-bottom: 1px solid #dee2e6; padding: 12px 24px; }
        @media print { .sidebar, .topbar, .no-print { display: none !important; } }
    </style>
    @stack('styles')
</head>
<body class="bg-light">
<div class="d-flex">

    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column py-3">
        <div class="px-4 mb-3 text-center pt-2">
            <img src="{{ asset('images/logo.png') }}" alt="دار الرؤى" style="height: 55px; filter: brightness(0) invert(1);">
            <div class="text-muted small mt-2">لوحة الإدارة</div>
        </div>
        <ul class="nav flex-column flex-grow-1 pb-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>الرئيسية
                </a>
            </li>

            <!-- قسم المقاييس -->
            <li class="nav-item mt-3 mb-1 px-3">
                <span class="text-secondary small fw-bold" style="font-size: 0.75rem;">نظام المقاييس</span>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.assessments*') ? 'active' : '' }}" href="{{ route('admin.assessments.index') }}">
                    <i class="bi bi-collection me-2"></i>إدارة المقاييس
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.questions*') ? 'active' : '' }}" href="{{ route('admin.questions.index') }}">
                    <i class="bi bi-question-circle me-2"></i>بنك الأسئلة
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.exams.create') ? 'active' : '' }}" href="{{ route('admin.exams.create') }}">
                    <i class="bi bi-plus-circle me-2"></i>إنشاء اختبار
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.recommendations*') ? 'active' : '' }}" href="{{ route('admin.recommendations.index') }}">
                    <i class="bi bi-lightbulb me-2"></i>إدارة التوصيات
                </a>
            </li>


            <!-- قسم الإدارة العامة -->
            <li class="nav-item mt-3 mb-1 px-3">
                <span class="text-secondary small fw-bold" style="font-size: 0.75rem;">الإدارة العامة</span>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.icons*') ? 'active' : '' }}" href="{{ route('admin.icons.index') }}">
                    <i class="bi bi-images me-2"></i>إدارة الأيقونات
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="bi bi-people me-2"></i>المستخدمين والنتائج
                </a>
            </li>
        </ul>
        <div class="px-3 mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                    <i class="bi bi-box-arrow-right me-1"></i>تسجيل الخروج
                </button>
            </form>
        </div>
    </nav>

    <!-- Main -->
    <div class="main-content">
        <div class="topbar d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">@yield('page-title', 'لوحة الإدارة')</h6>
            <div class="text-muted small">
                <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}
            </div>
        </div>

        <div id="alert-container" class="px-4 pt-2"></div>

        <div class="p-4">
            @yield('content')
        </div>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger"><i class="bi bi-exclamation-triangle me-2"></i>تأكيد الحذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="confirmDeleteMessage">هل أنت متأكد من الحذف؟ لا يمكن التراجع.</div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">حذف</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/json-lists.js') }}"></script>
@stack('scripts')
</body>
</html>
