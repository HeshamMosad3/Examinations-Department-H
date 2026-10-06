<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ cms('auth.login.seo_title', 'تسجيل الدخول — دار الرؤى') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center min-vh-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="text-center mb-4">
                <img src="{{ cms_image('auth.common.logo', '/images/logo.png') === '/images/logo.png' ? asset('images/logo.png') : cms_image('auth.common.logo', '/images/logo.png') }}" alt="دار الرؤى" style="height: 70px; margin-bottom: 10px;">
                <p class="text-muted">{{ cms('auth.common.tagline', 'نظام مقاييس التميز الشخصي') }}</p>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4 fw-semibold">{{ cms('auth.login.title', 'تسجيل الدخول') }}</h5>

                    @if($errors->any())
                        <div class="alert alert-danger alert-sm py-2">
                            <i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.common.email', 'البريد الإلكتروني') }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="example@email.com" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.common.password', 'كلمة المرور') }}</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label small" for="remember">{{ cms('auth.login.remember', 'تذكرني') }}</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-box-arrow-in-right me-1"></i>{{ cms('auth.login.submit', 'دخول') }}
                        </button>
                    </form>
                    <hr>
                    <div class="text-center small">
                        {{ cms('auth.login.no_account', 'ليس لديك حساب؟') }}
                        <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-medium">{{ cms('auth.login.register_link', 'سجّل الآن') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
