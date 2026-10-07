@extends('layouts.auth')

@section('title', 'إدخال كلمة المرور الجديدة — دار الرؤى')

@section('content')
<div class="w-full max-w-[620px]">
    <!-- Top Back Arrow -->
    <div class="w-full flex justify-end mb-2">
        <a href="{{ route('login') }}" class="p-2 text-[#204A7A] hover:bg-[#204A7A]/10 rounded-full transition-colors flex items-center justify-center" aria-label="الرجوع">
            <i class="fa-solid fa-arrow-right text-[22px]"></i>
        </a>
    </div>

    <!-- Header: Logo, Title, Subtitle -->
    <div class="flex flex-col items-center text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block mb-4 transition-transform hover:scale-105">
            <img src="/images/auth/auth-logo.png" alt="دار الرؤى" class="w-[90px] h-[90px] object-contain" />
        </a>
        <h1 class="text-[#204A7A] font-bold text-[28px] sm:text-[32px] leading-tight mb-2">
            إدخال كلمة المرور الجديدة
        </h1>
        <p class="text-[#565656] font-medium text-[16px] sm:text-[18px]">
            يجب أن تكون كلمة المرور الجديدة مكونة من 8 خانات على الأقل.
        </p>
        <div class="w-full h-[1px] bg-[#E9E9E9] mt-6"></div>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-red-500 text-lg"></i>
            <div>{{ $errors->first() }}</div>
        </div>
    @endif

    <!-- Reset Password Form -->
    <form id="reset-form" method="POST" action="{{ route('password.update') }}" novalidate class="flex flex-col gap-6">
        @csrf

        <!-- New Password -->
        <div class="flex flex-col gap-1.5" id="group-password">
            <label for="password" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                كلمة المرور الجديدة
                <span class="text-[#E53935] font-bold text-xs">*</span>
            </label>
            <div id="wrapper-password" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center justify-between form-input-focus transition-all">
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="••••••••" 
                    required 
                    autofocus
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

        <!-- Confirm New Password -->
        <div class="flex flex-col gap-1.5" id="group-password_confirmation">
            <label for="password_confirmation" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                تأكيد كلمة المرور
                <span class="text-[#E53935] font-bold text-xs">*</span>
            </label>
            <div id="wrapper-password_confirmation" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center justify-between form-input-focus transition-all">
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="••••••••" 
                    required 
                    class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none"
                />
                <button 
                    type="button" 
                    onclick="togglePassword('password_confirmation', 'password-confirm-toggle-icon')" 
                    class="text-[#949494] hover:text-[#204A7A] transition-colors p-2 focus:outline-none"
                    aria-label="عرض أو إخفاء تأكيد كلمة المرور"
                >
                    <i id="password-confirm-toggle-icon" class="fa-regular fa-eye-slash text-[18px]"></i>
                </button>
            </div>
            <div id="error-password_confirmation" class="field-error-msg hidden"></div>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full h-[56px] rounded-[10px] bg-[#204A7A] hover:bg-[#163558] text-[#F6F6F6] font-semibold text-[18px] sm:text-[20px] transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center mt-2"
        >
            إعادة تعيين كلمة المرور
        </button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('reset-form');
        const pass = document.getElementById('password');
        const passConfirm = document.getElementById('password_confirmation');

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

        function cleanPassVal(str) {
            return (str || '')
                .replace(/[\u200B-\u200D\uFEFF\u00A0\r\n\t]/g, '')
                .trim();
        }

        function validatePass() {
            const val = cleanPassVal(pass.value);
            if (!val) {
                setFieldError('password', 'كلمة المرور الجديدة مطلوبة.');
                return false;
            }
            if (val.length < 8) {
                setFieldError('password', 'يجب أن تكون كلمة المرور 8 خانات على الأقل.');
                return false;
            }
            clearFieldError('password');
            return true;
        }

        function validatePassConfirm() {
            const val = cleanPassVal(passConfirm.value);
            const originalVal = cleanPassVal(pass.value);

            if (!val) {
                setFieldError('password_confirmation', 'يرجى تأكيد كلمة المرور.');
                return false;
            }
            if (val !== originalVal) {
                setFieldError('password_confirmation', 'كلمة المرور وتأكيدها غير متطابقين.');
                return false;
            }
            clearFieldError('password_confirmation');
            return true;
        }

        pass.addEventListener('input', () => {
            clearFieldError('password');
            if (passConfirm.value) validatePassConfirm();
        });
        pass.addEventListener('blur', validatePass);

        passConfirm.addEventListener('input', () => clearFieldError('password_confirmation'));
        passConfirm.addEventListener('blur', validatePassConfirm);

        form.addEventListener('submit', (e) => {
            const v1 = validatePass();
            const v2 = validatePassConfirm();
            if (!v1 || !v2) {
                e.preventDefault();
                const first = !v1 ? pass : passConfirm;
                first.focus();
            } else {
                if (pass) pass.value = cleanPassVal(pass.value);
                if (passConfirm) passConfirm.value = cleanPassVal(passConfirm.value);
            }
        });
    });
</script>
@endpush
