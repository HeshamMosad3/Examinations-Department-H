@extends('layouts.auth')

@section('title', 'إدخال رمز التحقق — دار الرؤى')

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
            <img src="/images/auth/mail-icon.svg" alt="" aria-hidden="true" class="w-[50px] h-[50px] object-contain" />
        </div>

        <h1 class="text-[#204A7A] font-bold text-[28px] sm:text-[32px] leading-tight mb-2">
            إدخال رمز التحقيق
        </h1>
        <p class="text-[#565656] font-medium text-[16px] sm:text-[18px]">
            لقد قمنا بإرسال رمز التأكيد إلى <span class="font-bold text-[#204A7A]">{{ $maskedEmail }}</span>
        </p>
        <div class="w-full h-[1px] bg-[#E9E9E9] mt-6"></div>
    </div>

    @if(session('dev_otp'))
        <div class="mb-5 p-3 rounded-xl bg-blue-50 border border-blue-200 text-blue-800 text-sm text-center">
            رمز التحقق التجريبي هو: <strong class="text-base tracking-widest text-[#204A7A]">{{ session('dev_otp') }}</strong>
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

        <!-- 4 Digit Inputs (RTL Order) -->
        <div class="flex items-center justify-center gap-3 sm:gap-6 my-2" dir="rtl">
            @for($i = 0; $i < 4; $i++)
                <input 
                    type="text" 
                    name="otp[]" 
                    maxlength="1" 
                    inputmode="numeric" 
                    pattern="[0-9]"
                    required
                    autocomplete="one-time-code"
                    dir="rtl"
                    class="otp-box w-[60px] h-[60px] sm:w-[85px] sm:h-[85px] text-center text-[26px] sm:text-[32px] font-bold text-[#204A7A] rounded-[10px] sm:rounded-[12px] border border-[#DADADA] bg-white focus:outline-none focus:border-[#204A7A] focus:ring-1 focus:ring-[#204A7A] transition-all shadow-sm font-sans"
                    data-index="{{ $i }}"
                />
            @endfor
        </div>

        <!-- Timer / Resend Block -->
        <div class="text-center min-h-[30px] flex items-center justify-center">
            <div id="timer-container" class="text-[#565656] text-[16px]">
                لم يصلك الرمز؟ إعادة الإرسال خلال <span id="countdown" class="font-bold text-[#204A7A]">30</span> ثانية
            </div>
            <button 
                type="button" 
                id="resend-btn" 
                onclick="resendOtpCode()" 
                class="hidden text-[#204A7A] hover:underline font-bold text-[16px] transition-all"
            >
                ارسال رمز جديد
            </button>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full h-[56px] rounded-[10px] bg-[#204A7A] hover:bg-[#163558] text-[#F6F6F6] font-semibold text-[18px] sm:text-[20px] transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center mt-2"
        >
            تحقق من الرمز
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
    let timeLeft = 30;
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
        resendBtn.textContent = 'جاري الإرسال...';

        fetch('{{ route("password.resend-otp") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            alert('تم إرسال رمز تحقق جديد بنجاح.');
            location.reload();
        })
        .catch(() => {
            location.reload();
        });
    }
</script>
@endpush
