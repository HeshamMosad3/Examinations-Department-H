@extends('layouts.auth')

@section('title', cms('auth.forgot.page_title', 'إعادة تعيين كلمة المرور — دار الرؤى'))

@section('content')
<div class="w-full max-w-[580px]">
    <!-- Top Back Arrow -->
    <div class="w-full flex justify-end mb-1">
        <a href="{{ route('login') }}" class="p-2 text-[#204A7A] hover:bg-[#204A7A]/10 rounded-full transition-colors flex items-center justify-center" aria-label="{{ cms('auth.forgot.back_link', 'العودة إلى تسجيل الدخول') }}">
            <i class="fa-solid fa-arrow-right text-[20px]"></i>
        </a>
    </div>

    <!-- Header: Logo, Title, Subtitle -->
    <div class="flex flex-col items-center text-center mb-6">
        <a href="{{ route('home') }}" class="inline-block mb-3 transition-transform hover:scale-105">
            <img src="{{ cms_image('auth.common.logo', '/images/auth/auth-logo.png') }}" alt="{{ cms('auth.common.logo_alt', 'دار الرؤى') }}" class="w-[80px] h-[80px] object-contain" />
        </a>
        <h1 class="text-[#204A7A] font-bold text-[28px] sm:text-[32px] leading-tight mb-1.5">
            {{ cms('auth.forgot.title', 'إعادة تعيين كلمة المرور') }}
        </h1>
        <p class="text-[#565656] font-medium text-[16px] sm:text-[17px]">
            {{ cms('auth.forgot.subtitle', 'قم بإدخال بريدك الإلكتروني لاستعادة كلمة المرور الخاصة بك!') }}
        </p>
        <div class="w-full h-[1px] bg-[#E9E9E9] mt-4"></div>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-red-500 text-lg"></i>
            <div>{{ $errors->first() }}</div>
        </div>
    @endif

    <!-- Form -->
    <form id="forgot-form" method="POST" action="{{ route('password.email') }}" novalidate class="flex flex-col gap-6">
        @csrf

        <!-- Email Input -->
        <div class="flex flex-col gap-1.5" id="group-email">
            <label for="email" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                {{ cms('auth.forgot.email_label', 'البريد الإلكتروني') }}
                <span class="text-[#E53935] font-bold text-xs">*</span>
            </label>
            <div id="wrapper-email" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center form-input-focus transition-all">
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="{{ cms('auth.forgot.email_placeholder', 'user@gmail.com') }}" 
                    required 
                    autofocus
                    dir="rtl"
                    class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none text-right font-sans"
                />
            </div>
            <div id="error-email" class="field-error-msg hidden"></div>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full h-[56px] rounded-[10px] bg-[#204A7A] hover:bg-[#163558] text-[#F6F6F6] font-semibold text-[18px] sm:text-[20px] transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center mt-2"
        >
            {{ cms('auth.forgot.submit', 'إرسال رمز التحقق (OTP)') }}
        </button>

        <!-- Back to login link -->
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-[#204A7A] hover:underline font-semibold text-[17px] border-b border-[#204A7A] pb-[1px]">
                {{ cms('auth.forgot.back_link', 'العودة إلى تسجيل الدخول') }}
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('forgot-form');
        const emailInput = document.getElementById('email');

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
                setFieldError('email', @json(cms('auth.forgot.email_required', 'يرجى إدخال البريد الإلكتروني.')));
                return false;
            }
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(val)) {
                setFieldError('email', @json(cms('auth.validation.email', 'يرجى إدخال بريد إلكتروني صحيح.')));
                return false;
            }
            clearFieldError('email');
            return true;
        }

        emailInput.addEventListener('input', () => clearFieldError('email'));
        emailInput.addEventListener('blur', validateEmail);

        form.addEventListener('submit', (e) => {
            if (!validateEmail()) {
                e.preventDefault();
                emailInput.focus();
            }
        });
    });
</script>
@endpush
