@extends('layouts.auth')

@section('title', cms('auth.success.page_title', 'تم تغيير كلمة المرور — دار الرؤى'))

@section('content')
<div class="w-full max-w-[480px] bg-white rounded-[24px] shadow-lg border border-[#DADADA]/50 p-6 sm:p-10 flex flex-col items-center text-center relative animate-fade-in">
    <!-- Top Close Button -->
    <a href="{{ route('login') }}" class="absolute top-5 left-5 text-[#949494] hover:text-[#262626] p-2 rounded-full transition-colors" aria-label="{{ cms('auth.success.close', 'إغلاق') }}">
        <i class="fa-solid fa-xmark text-[20px]"></i>
    </a>

    <!-- Animated Success Illustration from Figma -->
    <div class="w-[120px] h-[120px] sm:w-[140px] sm:h-[140px] rounded-full overflow-hidden flex items-center justify-center my-4">
        <img src="{{ cms_image('auth.success.image', '/images/auth/password-success.gif') }}" alt="" class="w-full h-full object-cover" onerror="this.src='/images/auth/password-success.png'" />
    </div>

    <!-- Title -->
    <h1 class="text-[#0D0D0D] font-bold text-[24px] sm:text-[28px] leading-tight mb-2">
        {{ cms('auth.success.title', 'تم تغيير كلمة المرور!') }}
    </h1>

    <!-- Subtitle -->
    <p class="text-[#565656] font-medium text-[16px] sm:text-[17px] mb-8">
        {{ cms('auth.success.subtitle', 'تم تحديث كلمة المرور الخاصة بك بنجاح.') }}
    </p>

    <!-- Return to Login Button -->
    <a 
        href="{{ route('login') }}" 
        class="w-full h-[52px] rounded-[10px] bg-[#204A7A] hover:bg-[#163558] text-[#E9EDF2] font-semibold text-[17px] sm:text-[18px] transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center"
    >
        {{ cms('auth.success.login_button', 'العودة إلى تسجيل الدخول') }}
    </a>
</div>
@endsection
