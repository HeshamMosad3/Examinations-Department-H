@extends('layouts.auth')

@section('title', 'تسجيل الدخول — دار الرؤى')

@section('content')
<div class="w-full max-w-[580px]">
    <!-- Header: Logo, Title, Subtitle -->
    <div class="flex flex-col items-center text-center mb-6 lg:mb-6">
        <a href="{{ route('home') }}" class="inline-block mb-3 transition-transform hover:scale-105">
            <img src="/images/auth/auth-logo.png" alt="دار الرؤى" class="w-[80px] h-[80px] lg:w-[84px] lg:h-[84px] object-contain" />
        </a>
        <h1 class="text-[#204A7A] font-bold text-[28px] sm:text-[32px] leading-tight mb-1.5">
            تسجيل الدخول
        </h1>
        <p class="text-[#565656] font-medium text-[16px] sm:text-[17px]">
            مرحباً بعودتك! أدخل بياناتك للمتابعة.
        </p>
        <div class="w-full h-[1px] bg-[#E9E9E9] mt-4"></div>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-red-500 text-lg"></i>
            <div>{{ $errors->first() }}</div>
        </div>
    @endif

    @if(session('info'))
        <div class="mb-6 p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-800 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-info text-[#204A7A] text-lg"></i>
            <div>{{ session('info') }}</div>
        </div>
    @endif

    @if(session('status'))
        <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-green-500 text-lg"></i>
            <div>{{ session('status') }}</div>
        </div>
    @endif

    <!-- Login Form -->
    <form id="login-form" method="POST" action="{{ route('login.post') }}" novalidate class="flex flex-col gap-5">
        @csrf

        @if(request()->filled('next'))
            <input type="hidden" name="next" value="{{ request('next') }}">
        @endif

        <!-- Email -->
        <div class="flex flex-col gap-1.5" id="group-email">
            <label for="email" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                البريد الإلكتروني
                <span class="text-[#E53935] font-bold text-xs">*</span>
            </label>
            <div id="wrapper-email" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center form-input-focus transition-all">
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="user@gmail.com" 
                    required 
                    autofocus
                    dir="rtl"
                    class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none text-right font-sans"
                />
            </div>
            <div id="error-email" class="field-error-msg hidden"></div>
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-1.5" id="group-password">
            <label for="password" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                كلمة المرور
                <span class="text-[#E53935] font-bold text-xs">*</span>
            </label>
            <div id="wrapper-password" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center justify-between form-input-focus transition-all">
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="••••••••" 
                    required 
                    class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none"
                />
                <button 
                    type="button" 
                    onclick="togglePassword('password', 'password-toggle-icon')" 
                    class="text-[#949494] hover:text-[#204A7A] transition-colors p-2 focus:outline-none"
                    aria-label="عرض أو إخفاء كلمة المرور"
                >
                    <i id="password-toggle-icon" class="fa-regular fa-eye-slash text-[18px]"></i>
                </button>
            </div>
            <div id="error-password" class="field-error-msg hidden"></div>
        </div>

        <!-- Remember me & Forgot Password -->
        <div class="flex items-center justify-between pt-1">
            <label class="flex items-center gap-2 cursor-pointer select-none">
                <input 
                    type="checkbox" 
                    name="remember" 
                    id="remember" 
                    class="w-[19px] h-[19px] rounded border-[#565656] text-[#204A7A] focus:ring-[#204A7A] cursor-pointer"
                    {{ old('remember') ? 'checked' : '' }}
                />
                <span class="text-[#565656] font-medium text-[16px]">تذكرني</span>
            </label>

            <a href="{{ route('password.request') }}" class="text-[#204A7A] hover:underline font-semibold text-[16px]">
                هل نسيت كلمة المرور؟
            </a>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full h-[56px] rounded-[10px] bg-[#204A7A] hover:bg-[#163558] text-[#F6F6F6] font-semibold text-[18px] sm:text-[20px] transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center mt-2"
        >
            تسجيل الدخول
        </button>

        <!-- Register Link -->
        <div class="text-center mt-3">
            <span class="text-[#515151] font-normal text-[17px]">إذا لم يكن لديك حساب، </span>
            <a href="{{ route('register', request()->only('next')) }}" class="text-[#204A7A] hover:underline font-semibold text-[17px] border-b border-[#204A7A] pb-[1px]">
                أنشئ حساباً سريعاً الآن
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('login-form');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        function setFieldError(field, msg) {
            const wrapper = document.getElementById(`wrapper-${field}`);
            const errorDiv = document.getElementById(`error-${field}`);
            if (wrapper) wrapper.classList.add('input-error');
            if (errorDiv) {
                errorDiv.innerHTML = `<i class="fa-solid fa-circle-exclamation text-xs"></i><span>${msg}</span>`;
                errorDiv.classList.remove('hidden');
            }
        }

        function clearFieldError(field) {
            const wrapper = document.getElementById(`wrapper-${field}`);
            const errorDiv = document.getElementById(`error-${field}`);
            if (wrapper) wrapper.classList.remove('input-error');
            if (errorDiv) {
                errorDiv.textContent = '';
                errorDiv.classList.add('hidden');
            }
        }

        function validateEmail() {
            const val = emailInput.value.trim();
            if (!val) {
                setFieldError('email', 'البريد الإلكتروني مطلوب.');
                return false;
            }
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(val)) {
                setFieldError('email', 'يرجى إدخال بريد إلكتروني صحيح.');
                return false;
            }
            clearFieldError('email');
            return true;
        }

        function validatePassword() {
            const val = passwordInput.value;
            if (!val) {
                setFieldError('password', 'كلمة المرور مطلوبة.');
                return false;
            }
            if (val.length < 8) {
                setFieldError('password', 'كلمة المرور يجب أن لا تقل عن 8 خانات.');
                return false;
            }
            clearFieldError('password');
            return true;
        }

        emailInput.addEventListener('input', () => clearFieldError('email'));
        emailInput.addEventListener('blur', validateEmail);
        passwordInput.addEventListener('input', () => clearFieldError('password'));
        passwordInput.addEventListener('blur', validatePassword);

        form.addEventListener('submit', (e) => {
            const isEmailValid = validateEmail();
            const isPasswordValid = validatePassword();

            if (!isEmailValid || !isPasswordValid) {
                e.preventDefault();
                const firstInvalid = !isEmailValid ? emailInput : passwordInput;
                if (firstInvalid) firstInvalid.focus();
            }
        });
    });
</script>
@endpush
