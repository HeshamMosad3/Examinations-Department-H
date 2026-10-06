<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ cms('auth.register.seo_title', 'إنشاء حساب — دار الرؤى') }}</title>
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
                    <h5 class="card-title mb-4 fw-semibold">{{ cms('auth.register.title', 'تسجيل حساب جديد') }}</h5>

                    @if($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 small">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.register.name', 'الاسم الكامل') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="الاسم الكامل" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.common.email', 'البريد الإلكتروني') }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="example@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.register.phone', 'رقم الجوال') }}</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" placeholder="05xxxxxxxx" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.register.national_id', 'رقم الهوية الوطنية / الإقامة') }}</label>
                            <input type="text" name="national_id" class="form-control @error('national_id') is-invalid @enderror"
                                value="{{ old('national_id') }}" placeholder="1xxxxxxxxx" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.register.gender', 'النوع') }}</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                <option value="" disabled {{ old('gender') ? '' : 'selected' }}>{{ cms('auth.register.gender_placeholder', 'اختر النوع') }}</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ cms('auth.register.male', 'ذكر') }}</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ cms('auth.register.female', 'أنثى') }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.register.qualification', 'المؤهل') }}</label>
                            <input type="text" name="qualification" class="form-control @error('qualification') is-invalid @enderror"
                                value="{{ old('qualification') }}" placeholder="مثال: بكالوريوس" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.register.nationality', 'الجنسية') }}</label>
                            <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror"
                                value="{{ old('nationality') }}" placeholder="مثال: سعودي" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">{{ cms('auth.common.password', 'كلمة المرور') }}</label>
                            <input type="password" name="password" class="form-control" placeholder="8 أحرف على الأقل" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-medium">{{ cms('auth.register.password_confirmation', 'تأكيد كلمة المرور') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="أعد كتابة كلمة المرور" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-person-plus me-1"></i>{{ cms('auth.register.submit', 'إنشاء الحساب') }}
                        </button>
                    </form>
                    <hr>
                    <div class="text-center small">
                        {{ cms('auth.register.has_account', 'لديك حساب بالفعل؟') }}
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-medium">{{ cms('auth.register.login_link', 'سجّل دخولك') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
