@extends('layouts.auth')

@section('title', cms('auth.otp.page_title', 'إدخال رمز التحقق — دار الرؤى'))

@section('content')
<div class="w-full max-w-[620px]">
    <!-- Top Back Arrow -->
    <div class="w-full flex justify-end mb-2">
        <a href="{{ route('password.request') }}" class="p-2 text-[#204A7A] hover:bg-[#204A7A]/10 rounded-full transition-colors flex items-center justify-center" aria-label="الرجوع">
            <i class="fa-solid fa-arrow-right text-[22px]"></i>
        </a>
    </div>

    <!-- Header: Mail Icon, Title, Subtitle -->
    <div class="flex flex-col items-center text-center mb-8">
        <div class="w-[90px] h-[90px] rounded-[16px] bg-[#E9EDF2] border border-[#204A7A] flex items-center justify-center mb-5 shadow-sm">
            <img src="{{ cms_image('auth.otp.icon', '/images/auth/mail-icon.svg') }}" alt="" aria-hidden="true" class="w-[50px] h-[50px] object-contain" />
        </div>

        <h1 class="text-[#204A7A] font-bold text-[28px] sm:text-[32px] leading-tight mb-2">
            {{ cms('auth.otp.title', 'إدخال رمز التحقق') }}
        </h1>
        <p class="text-[#565656] font-medium text-[16px] sm:text-[18px]">
            {{ cms('auth.otp.subtitle', 'لقد قمنا بإرسال رمز التأكيد إلى') }} <span class="font-bold text-[#204A7A]">{{ $maskedEmail }}</span>
        </p>
        <div class="w-full h-[1px] bg-[#E9E9E9] mt-6"></div>
    </div>

    @if(session('dev_otp'))
        <div class="mb-5 p-3 rounded-xl bg-blue-50 border border-blue-200 text-blue-800 text-sm text-center">
            {{ cms('auth.otp.dev_code', 'رمز التحقق التجريبي (يظهر على جهاز التطوير فقط):') }} <strong class="text-base tracking-widest text-[#204A7A]">{{ session('dev_otp') }}</strong>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-red-500 text-lg"></i>
            <div>{{ $errors->first() }}</div>
        </div>
    @endif

    <!-- OTP Form -->
    <form method="POST" action="{{ route('password.verify-otp.post') }}" id="otp-form" class="flex flex-col gap-6">
        @csrf

        <!-- 4 Digit Inputs (codes read left-to-right, so the first digit goes in the left box) -->
        <div class="flex items-center justify-center gap-3 sm:gap-6 my-2" dir="ltr">
            @for($i = 0; $i < 4; $i++)
                <input 
                    type="text" 
                    name="otp[]" 
                    maxlength="1" 
                    inputmode="numeric" 
                    pattern="[0-9]"
                    required
                    autocomplete="one-time-code"
                    aria-label="{{ cms('auth.otp.digit_label', 'رقم من رمز التحقق') }} {{ $i + 1 }}"
                    class="otp-box w-[60px] h-[60px] sm:w-[85px] sm:h-[85px] text-center text-[26px] sm:text-[32px] font-bold text-[#204A7A] rounded-[10px] sm:rounded-[12px] border border-[#DADADA] bg-white focus:outline-none focus:border-[#204A7A] focus:ring-1 focus:ring-[#204A7A] transition-all shadow-sm font-sans"
                    data-index="{{ $i }}"
                />
            @endfor
        </div>

        <!-- Timer / Resend Block -->
        <div class="text-center min-h-[30px] flex items-center justify-center">
            <div id="timer-container" class="text-[#565656] text-[16px]">
                {{ cms('auth.otp.resend_wait_before', 'لم يصلك الرمز؟ إعادة الإرسال خلال') }} <span id="countdown" class="font-bold text-[#204A7A]">{{ cms_number('auth.otp.resend_seconds', '30') }}</span> {{ cms('auth.otp.resend_wait_after', 'ثانية') }}
            </div>
            <button 
                type="button" 
                id="resend-btn" 
                onclick="resendOtpCode()" 
                class="hidden text-[#204A7A] hover:underline font-bold text-[16px] transition-all"
            >
                {{ cms('auth.otp.resend_button', 'إرسال رمز جديد') }}
            </button>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full h-[56px] rounded-[10px] bg-[#204A7A] hover:bg-[#163558] text-[#F6F6F6] font-semibold text-[18px] sm:text-[20px] transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center mt-2"
        >
            {{ cms('auth.otp.submit', 'تحقق من الرمز') }}
        </button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // OTP Box Navigation Logic
    const otpBoxes = document.querySelectorAll('.otp-box');
    if (otpBoxes.length > 0) {
        otpBoxes[0].focus();

        otpBoxes.forEach((box, index) => {
            box.addEventListener('input', (e) => {
                const val = e.target.value.replace(/[^0-9]/g, '');
                e.target.value = val ? val[0] : '';
                if (val && index < otpBoxes.length - 1) {
                    otpBoxes[index + 1].focus();
                }
            });

            box.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !box.value && index > 0) {
                    otpBoxes[index - 1].focus();
                }
            });

            box.addEventListener('paste', (e) => {
                e.preventDefault();
                const pasteData = (e.clipboardData || window.clipboardData).getData('text').replace(/[^0-9]/g, '');
                if (!pasteData) return;
                for (let i = 0; i < otpBoxes.length; i++) {
                    otpBoxes[i].value = pasteData[i] || '';
                }
                const focusIdx = Math.min(pasteData.length, otpBoxes.length - 1);
                otpBoxes[focusIdx].focus();
            });
        });
    }

    // 30 Seconds Countdown Timer
    let timeLeft = {{ cms_number('auth.otp.resend_seconds', '30') }};
    const countdownEl = document.getElementById('countdown');
    const timerContainer = document.getElementById('timer-container');
    const resendBtn = document.getElementById('resend-btn');

    const timer = setInterval(() => {
        timeLeft--;
        if (countdownEl) countdownEl.textContent = timeLeft;
        if (timeLeft <= 0) {
            clearInterval(timer);
            if (timerContainer) timerContainer.classList.add('hidden');
            if (resendBtn) resendBtn.classList.remove('hidden');
        }
    }, 1000);

    function resendOtpCode() {
        resendBtn.disabled = true;
        resendBtn.textContent = @json(cms('auth.otp.sending', 'جاري الإرسال...'));

        fetch('{{ route("password.resend-otp") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(res => res.json().then(data => ({ status: res.status, data })))
        .then(({ status, data }) => {
            if (status === 200 && data.success) {
                alert(@json(cms('auth.otp.resent', 'تم إرسال رمز تحقق جديد بنجاح.')));
                location.reload();
            } else if (status === 400) {
                // Session expired: start the reset again
                alert(data.message);
                location.href = '{{ route("password.request") }}';
            } else {
                throw new Error();
            }
        })
        .catch(() => {
            alert(@json(cms('auth.otp.resend_failed', 'تعذر إرسال رمز جديد، يرجى المحاولة بعد قليل.')));
            resendBtn.disabled = false;
            resendBtn.textContent = @json(cms('auth.otp.resend_button', 'إرسال رمز جديد'));
        });
    }
</script>
@endpush
