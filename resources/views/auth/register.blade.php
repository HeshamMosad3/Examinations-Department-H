@extends('layouts.auth')

@section('title', 'إنشاء حساب جديد — دار الرؤى')

@section('body_class', 'lg:h-auto lg:overflow-y-auto')
@section('wrapper_class', 'lg:h-auto')
@section('grid_class', 'lg:items-start')
@section('aside_class', 'lg:sticky lg:top-6 lg:h-[calc(100vh-3rem)]')

@section('content')
<div class="w-full max-w-[680px] py-2 lg:py-4">
    <!-- Header: Logo, Title, Subtitle -->
    <div class="flex flex-col items-center text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block mb-4 transition-transform hover:scale-105">
            <img src="/images/auth/auth-logo.png" alt="دار الرؤى" class="w-[85px] h-[85px] object-contain" />
        </a>
        <h1 class="text-[#204A7A] font-bold text-[28px] sm:text-[32px] leading-tight mb-2">
            إنشاء حساب جديد
        </h1>
        <p class="text-[#565656] font-medium text-[16px] sm:text-[18px]">
            أهلًا بك! أنشئ حسابك وابدأ رحلتك مع دار الرؤى.
        </p>
        <div class="w-full h-[1px] bg-[#E9E9E9] mt-6"></div>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
            <div class="font-bold mb-1 flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation text-red-500"></i>
                يرجى تصحيح الأخطاء التالية:
            </div>
            <ul class="list-disc list-inside space-y-1 pr-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Register Form -->
    <form id="register-form" method="POST" action="{{ route('register.post') }}" novalidate class="flex flex-col gap-5">
        @csrf

        @if(request()->filled('next'))
            <input type="hidden" name="next" value="{{ request('next') }}">
        @endif

        <!-- Row 1: First Name & Father Name -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- First Name -->
            <div class="flex flex-col gap-1.5" id="group-first_name">
                <label for="first_name" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                    الاسم الأول (بالعربي)
                    <span class="text-[#E53935] font-bold text-xs">*</span>
                </label>
                <div id="wrapper-first_name" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center form-input-focus transition-all">
                    <input 
                        type="text" 
                        id="first_name" 
                        name="first_name" 
                        value="{{ old('first_name') }}" 
                        placeholder="أدخل الاسم الأول" 
                        required 
                        autofocus
                        class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none"
                    />
                </div>
                <div id="error-first_name" class="field-error-msg hidden"></div>
            </div>

            <!-- Father Name -->
            <div class="flex flex-col gap-1.5" id="group-father_name">
                <label for="father_name" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                    اسم الأب (بالعربي)
                    <span class="text-[#E53935] font-bold text-xs">*</span>
                </label>
                <div id="wrapper-father_name" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center form-input-focus transition-all">
                    <input 
                        type="text" 
                        id="father_name" 
                        name="father_name" 
                        value="{{ old('father_name') }}" 
                        placeholder="أدخل اسم الأب" 
                        required 
                        class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none"
                    />
                </div>
                <div id="error-father_name" class="field-error-msg hidden"></div>
            </div>
        </div>

        <!-- Row 2: Grandfather Name & Last Name -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Grandfather Name -->
            <div class="flex flex-col gap-1.5" id="group-grandfather_name">
                <label for="grandfather_name" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                    اسم الجد (بالعربي)
                    <span class="text-[#E53935] font-bold text-xs">*</span>
                </label>
                <div id="wrapper-grandfather_name" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center form-input-focus transition-all">
                    <input 
                        type="text" 
                        id="grandfather_name" 
                        name="grandfather_name" 
                        value="{{ old('grandfather_name') }}" 
                        placeholder="أدخل اسم الجد" 
                        required 
                        class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none"
                    />
                </div>
                <div id="error-grandfather_name" class="field-error-msg hidden"></div>
            </div>

            <!-- Last Name -->
            <div class="flex flex-col gap-1.5" id="group-last_name">
                <label for="last_name" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                    الاسم الأخير (بالعربي)
                    <span class="text-[#E53935] font-bold text-xs">*</span>
                </label>
                <div id="wrapper-last_name" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center form-input-focus transition-all">
                    <input 
                        type="text" 
                        id="last_name" 
                        name="last_name" 
                        value="{{ old('last_name') }}" 
                        placeholder="أدخل الاسم الأخير" 
                        required 
                        class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none"
                    />
                </div>
                <div id="error-last_name" class="field-error-msg hidden"></div>
            </div>
        </div>

        <!-- Row 3: Email -->
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
                    dir="rtl"
                    class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none text-right font-sans"
                />
            </div>
            <div id="error-email" class="field-error-msg hidden"></div>
        </div>

        <!-- Row 4: Phone with Saudi Flag -->
        <div class="flex flex-col gap-1.5" id="group-phone">
            <label for="phone" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                رقم الجوال
                <span class="text-[#E53935] font-bold text-xs">*</span>
            </label>
            <div id="wrapper-phone" class="w-full h-[56px] rounded-[10px] border border-[#DADADA] bg-white flex items-center overflow-hidden form-input-focus transition-all" dir="rtl">
                <!-- Number Input -->
                <input 
                    type="tel" 
                    id="phone" 
                    name="phone" 
                    value="{{ old('phone') }}" 
                    placeholder="0500000000" 
                    required 
                    dir="rtl"
                    class="w-full h-full px-4 bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none text-right font-sans"
                />
                <!-- Country Prefix Box -->
                <div class="h-full px-3.5 bg-[#B6B6B6]/10 border-r border-[#DADADA] flex items-center gap-2 select-none shrink-0" dir="rtl">
                    <img src="/images/auth/flags/flag-sa.svg" alt="السعودية" class="w-[24px] h-[24px] object-contain rounded-full shadow-sm" />
                    <span class="text-[#262626] font-semibold text-[16px]">966+</span>
                </div>
            </div>
            <div id="error-phone" class="field-error-msg hidden"></div>
        </div>

        <!-- Row 5: Custom Identity Type & Custom Nationality (Figma Node 3362:5914 & 3362:5730) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            
            <!-- Custom Identity Type Dropdown (Figma 3362:5914) -->
            <div class="flex flex-col gap-1.5 relative" id="group-identity_type">
                <label class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                    نوع الهوية
                    <span class="text-[#E53935] font-bold text-xs">*</span>
                </label>
                
                <input type="hidden" name="identity_type" id="identity_type" value="{{ old('identity_type', 'سعودية') }}" required>

                <!-- Trigger Button -->
                <button 
                    type="button" 
                    id="identity-dropdown-btn" 
                    class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center justify-between transition-all focus:outline-none"
                    aria-haspopup="listbox" 
                    aria-expanded="false"
                >
                    <span id="identity-selected-text" class="text-[#262626] font-medium text-[16px]">
                        {{ old('identity_type', 'سعودية') }}
                    </span>
                    <i id="identity-dropdown-arrow" class="fa-solid fa-chevron-down text-[#949494] text-xs transition-transform duration-200"></i>
                </button>

                <!-- Dropdown Menu (Figma Variant2) -->
                <div 
                    id="identity-dropdown-menu" 
                    class="hidden absolute top-[85px] right-0 left-0 bg-white border border-[#BAC7D6] rounded-[10px] shadow-[0px_4px_16px_rgba(69,133,207,0.12)] py-2 z-50 transition-all"
                    role="listbox"
                >
                    <div 
                        class="identity-option px-4 h-[52px] flex items-center justify-start cursor-pointer transition-colors {{ old('identity_type', 'سعودية') === 'سعودية' ? 'bg-[#E6F2FA] text-[#3777A9]' : 'text-[#262626] hover:bg-[#F8FAFC]' }}" 
                        data-value="سعودية"
                        role="option"
                    >
                        <span class="font-semibold text-[16px]">سعودية</span>
                    </div>
                    <div 
                        class="identity-option px-4 h-[52px] flex items-center justify-start cursor-pointer transition-colors {{ old('identity_type') === 'غير سعودية' ? 'bg-[#E6F2FA] text-[#3777A9]' : 'text-[#262626] hover:bg-[#F8FAFC]' }}" 
                        data-value="غير سعودية"
                        role="option"
                    >
                        <span class="font-semibold text-[16px]">غير سعودية</span>
                    </div>
                </div>
                <div id="error-identity_type" class="field-error-msg hidden"></div>
            </div>

            <!-- Custom Nationality Dropdown with Live Search (Figma 3362:5730) -->
            <div class="flex flex-col gap-1.5 relative" id="group-nationality">
                <label class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                    الجنسية
                    <span class="text-[#E53935] font-bold text-xs">*</span>
                </label>

                <input type="hidden" name="nationality" id="nationality" value="{{ old('nationality', 'سعودي') }}" required>

                @php
                    $nationalitiesMap = [
                        'سعودي' => '/images/auth/flags/flag-sa.svg',
                        'إماراتي' => '/images/auth/flags/flag-ae.svg',
                        'قطري' => '/images/auth/flags/flag-qa.svg',
                        'بحريني' => '/images/auth/flags/flag-bh.svg',
                        'كويتي' => '/images/auth/flags/flag-kw.svg',
                        'عماني' => '/images/auth/flags/flag-om.svg',
                        'مصري' => '/images/auth/flags/flag-eg.svg',
                        'أردني' => '/images/auth/flags/flag-jo.svg',
                        'سوري' => '/images/auth/flags/flag-sy.svg',
                        'لبناني' => '/images/auth/flags/flag-lb.svg',
                        'فلسطيني' => '/images/auth/flags/flag-ps.svg',
                        'سوداني' => '/images/auth/flags/flag-sd.svg',
                        'يمني' => '/images/auth/flags/flag-ye.svg',
                        'عراقي' => '/images/auth/flags/flag-iq.svg',
                        'مغربي' => '/images/auth/flags/flag-ma.svg',
                        'تونسي' => '/images/auth/flags/flag-tn.svg',
                        'جزائري' => '/images/auth/flags/flag-dz.svg',
                        'أخرى' => '/images/auth/flags/flag-other.svg',
                    ];
                    $currentNat = old('nationality', 'سعودي');
                    $currentFlag = $nationalitiesMap[$currentNat] ?? '/images/auth/flags/flag-sa.svg';
                @endphp

                <!-- Trigger Button -->
                <button 
                    type="button" 
                    id="nationality-dropdown-btn" 
                    class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center justify-between transition-all focus:outline-none"
                    aria-haspopup="listbox" 
                    aria-expanded="false"
                >
                    <div class="flex items-center gap-2.5">
                        <img 
                            id="nationality-selected-flag" 
                            src="{{ $currentFlag }}" 
                            alt="" 
                            class="w-[22px] h-[22px] rounded-full object-cover shadow-sm"
                        />
                        <span id="nationality-selected-text" class="text-[#262626] font-medium text-[16px]">
                            {{ $currentNat }}
                        </span>
                    </div>
                    <i id="nationality-dropdown-arrow" class="fa-solid fa-chevron-down text-[#949494] text-xs transition-transform duration-200"></i>
                </button>

                <!-- Dropdown Menu with Search (Figma Variant2) -->
                <div 
                    id="nationality-dropdown-menu" 
                    class="hidden absolute top-[85px] right-0 left-0 bg-[#F8FAFC] border border-[#BAC7D6] rounded-[10px] shadow-[0px_4px_20px_rgba(69,133,207,0.15)] p-3 z-50 transition-all"
                    role="listbox"
                >
                    <!-- Search Input -->
                    <div class="relative w-full mb-2.5">
                        <input 
                            type="text" 
                            id="nationality-search-input" 
                            placeholder="بحث عن جنسية..." 
                            dir="rtl"
                            class="w-full h-[46px] pr-10 pl-4 bg-white border border-[#C5C5C5] rounded-[10px] text-sm text-[#262626] placeholder-[#6F6F6F] focus:outline-none focus:border-[#4585CF] transition-all text-right"
                        />
                        <i class="fa-solid fa-magnifying-glass text-[#949494] text-sm absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                    </div>

                    <!-- Scrollable List -->
                    <div id="nationality-options-list" class="max-h-[250px] overflow-y-auto custom-dropdown-scroll bg-white border border-[#E2E8F0] rounded-[8px] divide-y divide-gray-100">
                        @foreach($nationalitiesMap as $natName => $natFlagPath)
                            <div 
                                class="nationality-option px-4 h-[48px] flex items-center justify-between cursor-pointer transition-colors {{ $currentNat === $natName ? 'bg-[#E6F2FA] text-[#3777A9]' : 'text-[#262626] hover:bg-[#F8FAFC]' }}" 
                                data-value="{{ $natName }}"
                                data-flag="{{ $natFlagPath }}"
                                role="option"
                            >
                                <div class="flex items-center gap-3">
                                    <img src="{{ $natFlagPath }}" alt="{{ $natName }}" class="w-[22px] h-[22px] rounded-full object-cover shadow-xs" />
                                    <span class="font-semibold text-[15px]">{{ $natName }}</span>
                                </div>
                                @if($currentNat === $natName)
                                    <i class="fa-solid fa-check text-[#3777A9] text-xs checkmark"></i>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="error-nationality" class="field-error-msg hidden"></div>
            </div>

        </div>

        <!-- Row 6: National ID & Confirm National ID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- National ID -->
            <div class="flex flex-col gap-1.5" id="group-national_id">
                <label for="national_id" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                    رقم الهوية (الإقامة)
                    <span class="text-[#E53935] font-bold text-xs">*</span>
                </label>
                <div id="wrapper-national_id" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center form-input-focus transition-all">
                    <input 
                        type="text" 
                        id="national_id" 
                        name="national_id" 
                        value="{{ old('national_id') }}" 
                        placeholder="أدخل رقم الهوية" 
                        required 
                        dir="rtl"
                        class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none text-right font-sans"
                    />
                </div>
                <div id="error-national_id" class="field-error-msg hidden"></div>
            </div>

            <!-- Confirm National ID -->
            <div class="flex flex-col gap-1.5" id="group-national_id_confirmation">
                <label for="national_id_confirmation" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
                    تأكيد رقم الهوية (الإقامة)
                    <span class="text-[#E53935] font-bold text-xs">*</span>
                </label>
                <div id="wrapper-national_id_confirmation" class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center form-input-focus transition-all">
                    <input 
                        type="text" 
                        id="national_id_confirmation" 
                        name="national_id_confirmation" 
                        placeholder="تأكيد رقم الهوية" 
                        required 
                        dir="rtl"
                        class="w-full h-full bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none text-right font-sans"
                    />
                </div>
                <div id="error-national_id_confirmation" class="field-error-msg hidden"></div>
            </div>
        </div>

        <!-- Row 7: Password & Confirm Password -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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

            <!-- Confirm Password -->
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
        </div>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center gap-2 pt-1">
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
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full h-[56px] rounded-[10px] bg-[#204A7A] hover:bg-[#163558] text-[#F6F6F6] font-semibold text-[18px] sm:text-[20px] transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center mt-2"
        >
            إنشاء حساب جديد
        </button>

        <!-- Login Link -->
        <div class="text-center mt-4">
            <span class="text-[#515151] font-normal text-[17px]">هل لديك حساب؟ </span>
            <a href="{{ route('login', request()->only('next')) }}" class="text-[#204A7A] hover:underline font-semibold text-[17px] border-b border-[#204A7A] pb-[1px]">
                تسجيل دخول
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- 1. Custom Identity Type Dropdown Logic ---
        const identityBtn = document.getElementById('identity-dropdown-btn');
        const identityMenu = document.getElementById('identity-dropdown-menu');
        const identityArrow = document.getElementById('identity-dropdown-arrow');
        const identityInput = document.getElementById('identity_type');
        const identityText = document.getElementById('identity-selected-text');
        const identityOptions = document.querySelectorAll('.identity-option');

        function toggleIdentityMenu(open) {
            const isExpanded = open !== undefined ? open : identityMenu.classList.contains('hidden');
            if (isExpanded) {
                identityMenu.classList.remove('hidden');
                identityBtn.classList.add('border-[#4585CF]', 'bg-[#F6F6F6]', 'ring-4', 'ring-[#4585CF]/15');
                identityArrow.classList.add('rotate-180');
                identityBtn.setAttribute('aria-expanded', 'true');
            } else {
                identityMenu.classList.add('hidden');
                identityBtn.classList.remove('border-[#4585CF]', 'bg-[#F6F6F6]', 'ring-4', 'ring-[#4585CF]/15');
                identityArrow.classList.remove('rotate-180');
                identityBtn.setAttribute('aria-expanded', 'false');
            }
        }

        if (identityBtn) {
            identityBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleNationalityMenu(false);
                toggleIdentityMenu();
            });

            identityOptions.forEach(opt => {
                opt.addEventListener('click', () => {
                    const val = opt.getAttribute('data-value');
                    identityInput.value = val;
                    identityText.textContent = val;

                    identityOptions.forEach(o => {
                        o.classList.remove('bg-[#E6F2FA]', 'text-[#3777A9]');
                        o.classList.add('text-[#262626]');
                    });
                    opt.classList.add('bg-[#E6F2FA]', 'text-[#3777A9]');
                    opt.classList.remove('text-[#262626]');

                    toggleIdentityMenu(false);
                });
            });
        }

        // --- 2. Custom Nationality Dropdown with Search Filter ---
        const natBtn = document.getElementById('nationality-dropdown-btn');
        const natMenu = document.getElementById('nationality-dropdown-menu');
        const natArrow = document.getElementById('nationality-dropdown-arrow');
        const natInput = document.getElementById('nationality');
        const natText = document.getElementById('nationality-selected-text');
        const natFlag = document.getElementById('nationality-selected-flag');
        const natSearch = document.getElementById('nationality-search-input');
        const natOptions = document.querySelectorAll('.nationality-option');

        function toggleNationalityMenu(open) {
            const isExpanded = open !== undefined ? open : natMenu.classList.contains('hidden');
            if (isExpanded) {
                natMenu.classList.remove('hidden');
                natBtn.classList.add('border-[#4585CF]', 'bg-[#F6F6F6]', 'ring-4', 'ring-[#4585CF]/15');
                natArrow.classList.add('rotate-180');
                natBtn.setAttribute('aria-expanded', 'true');
                if (natSearch) {
                    setTimeout(() => natSearch.focus(), 50);
                }
            } else {
                natMenu.classList.add('hidden');
                natBtn.classList.remove('border-[#4585CF]', 'bg-[#F6F6F6]', 'ring-4', 'ring-[#4585CF]/15');
                natArrow.classList.remove('rotate-180');
                natBtn.setAttribute('aria-expanded', 'false');
            }
        }

        if (natBtn) {
            natBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleIdentityMenu(false);
                toggleNationalityMenu();
            });

            natOptions.forEach(opt => {
                opt.addEventListener('click', () => {
                    const val = opt.getAttribute('data-value');
                    const flag = opt.getAttribute('data-flag');
                    natInput.value = val;
                    natText.textContent = val;
                    if (natFlag && flag) {
                        natFlag.src = flag;
                    }

                    natOptions.forEach(o => {
                        o.classList.remove('bg-[#E6F2FA]', 'text-[#3777A9]');
                        o.classList.add('text-[#262626]');
                        const check = o.querySelector('.checkmark');
                        if (check) check.remove();
                    });
                    opt.classList.add('bg-[#E6F2FA]', 'text-[#3777A9]');
                    opt.classList.remove('text-[#262626]');
                    if (!opt.querySelector('.checkmark')) {
                        opt.insertAdjacentHTML('beforeend', '<i class="fa-solid fa-check text-[#3777A9] text-xs checkmark"></i>');
                    }

                    toggleNationalityMenu(false);
                });
            });

            // Search filter functionality
            if (natSearch) {
                natSearch.addEventListener('input', (e) => {
                    const query = e.target.value.trim().toLowerCase();
                    natOptions.forEach(opt => {
                        const val = opt.getAttribute('data-value').toLowerCase();
                        if (val.includes(query)) {
                            opt.style.display = 'flex';
                        } else {
                            opt.style.display = 'none';
                        }
                    });
                });
            }
        }

        // Close on clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('#identity-dropdown-btn') && !e.target.closest('#identity-dropdown-menu')) {
                toggleIdentityMenu(false);
            }
            if (!e.target.closest('#nationality-dropdown-btn') && !e.target.closest('#nationality-dropdown-menu')) {
                toggleNationalityMenu(false);
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                toggleIdentityMenu(false);
                toggleNationalityMenu(false);
            }
        });

        // --- 3. Client-Side Validation Logic ---
        const regForm = document.getElementById('register-form');
        const firstNameInput = document.getElementById('first_name');
        const fatherNameInput = document.getElementById('father_name');
        const grandfatherNameInput = document.getElementById('grandfather_name');
        const lastNameInput = document.getElementById('last_name');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const nationalIdInput = document.getElementById('national_id');
        const nationalIdConfirmInput = document.getElementById('national_id_confirmation');
        const passwordInput = document.getElementById('password');
        const passwordConfirmInput = document.getElementById('password_confirmation');

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

        function validateName(input, field, label) {
            const val = input.value.trim();
            if (!val) {
                setFieldError(field, `${label} مطلوب.`);
                return false;
            }
            if (val.length < 2) {
                setFieldError(field, `${label} يجب أن يحتوي على حرفين على الأقل.`);
                return false;
            }
            clearFieldError(field);
            return true;
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

        function validatePhone() {
            const val = phoneInput.value.trim();
            if (!val) {
                setFieldError('phone', 'رقم الجوال مطلوب.');
                return false;
            }
            const cleanPhone = val.replace(/[\s\-]/g, '');
            if (!/^[0-9]{9,15}$/.test(cleanPhone)) {
                setFieldError('phone', 'رقم الجوال غير صالح (أرقام فقط من 9 إلى 15 خانة).');
                return false;
            }
            clearFieldError('phone');
            return true;
        }

        function validateNationalId() {
            const val = nationalIdInput.value.trim();
            if (!val) {
                setFieldError('national_id', 'رقم الهوية مطلوب.');
                return false;
            }
            if (!/^[0-9]{8,15}$/.test(val)) {
                setFieldError('national_id', 'رقم الهوية يجب أن يتكون من أرقام فقط (8-15 خانة).');
                return false;
            }
            clearFieldError('national_id');
            return true;
        }

        function validateNationalIdConfirm() {
            const val = nationalIdConfirmInput.value.trim();
            if (!val) {
                setFieldError('national_id_confirmation', 'يرجى تأكيد رقم الهوية.');
                return false;
            }
            if (val !== nationalIdInput.value.trim()) {
                setFieldError('national_id_confirmation', 'رقم الهوية وتأكيده غير متطابقين.');
                return false;
            }
            clearFieldError('national_id_confirmation');
            return true;
        }

        function cleanPassVal(str) {
            return (str || '')
                .replace(/[\u200B-\u200D\uFEFF\u00A0\r\n\t]/g, '')
                .trim();
        }

        function validatePassword() {
            const val = cleanPassVal(passwordInput.value);
            if (!val) {
                setFieldError('password', 'كلمة المرور مطلوبة.');
                return false;
            }
            if (val.length < 8) {
                setFieldError('password', 'يجب أن لا تقل كلمة المرور عن 8 خانات.');
                return false;
            }
            clearFieldError('password');
            return true;
        }

        function validatePasswordConfirm() {
            const val = cleanPassVal(passwordConfirmInput.value);
            const originalVal = cleanPassVal(passwordInput.value);

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

        // Real-time & blur listeners
        const fields = [
            { input: firstNameInput, fn: () => validateName(firstNameInput, 'first_name', 'الاسم الأول'), name: 'first_name' },
            { input: fatherNameInput, fn: () => validateName(fatherNameInput, 'father_name', 'اسم الأب'), name: 'father_name' },
            { input: grandfatherNameInput, fn: () => validateName(grandfatherNameInput, 'grandfather_name', 'اسم الجد'), name: 'grandfather_name' },
            { input: lastNameInput, fn: () => validateName(lastNameInput, 'last_name', 'الاسم الأخير'), name: 'last_name' },
            { input: emailInput, fn: validateEmail, name: 'email' },
            { input: phoneInput, fn: validatePhone, name: 'phone' },
            { input: nationalIdInput, fn: validateNationalId, name: 'national_id' },
            { input: nationalIdConfirmInput, fn: validateNationalIdConfirm, name: 'national_id_confirmation' },
            { input: passwordInput, fn: validatePassword, name: 'password' },
            { input: passwordConfirmInput, fn: validatePasswordConfirm, name: 'password_confirmation' },
        ];

        fields.forEach(item => {
            if (item.input) {
                item.input.addEventListener('input', () => {
                    clearFieldError(item.name);
                    if (item.name === 'national_id' && nationalIdConfirmInput.value) validateNationalIdConfirm();
                    if (item.name === 'password' && passwordConfirmInput.value) validatePasswordConfirm();
                });
                item.input.addEventListener('blur', item.fn);
            }
        });

        if (regForm) {
            regForm.addEventListener('submit', (e) => {
                let firstFailedInput = null;
                let isValid = true;

                // Validate in reverse or check all
                for (const item of fields) {
                    if (item.input && !item.fn()) {
                        isValid = false;
                        if (!firstFailedInput) firstFailedInput = item.input;
                    }
                }

                if (!isValid) {
                    e.preventDefault();
                    if (firstFailedInput) {
                        firstFailedInput.focus();
                        firstFailedInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } else {
                    // Normalize trimmed values so backend receives clean matching data
                    if (passwordInput) passwordInput.value = cleanPassVal(passwordInput.value);
                    if (passwordConfirmInput) passwordConfirmInput.value = cleanPassVal(passwordConfirmInput.value);
                    if (nationalIdInput) nationalIdInput.value = nationalIdInput.value.trim();
                    if (nationalIdConfirmInput) nationalIdConfirmInput.value = nationalIdConfirmInput.value.trim();
                    if (phoneInput) phoneInput.value = phoneInput.value.trim();
                    if (emailInput) emailInput.value = emailInput.value.trim();
                }
            });
        }
    });
</script>
@endpush
