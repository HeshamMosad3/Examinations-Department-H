{{-- حقل واحد في فورم إنشاء حساب: $name, $label, $placeholder, $type (text|email|digits|password), $required, $value, $prefix, $prefixFlag, $autofocus --}}
<div class="flex flex-col gap-1.5" id="group-{{ $name }}">
    <label for="{{ $name }}" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
        {{ $label }}
        @if ($required)<span class="text-[#E53935] font-bold text-xs">*</span>@endif
    </label>
    <div id="wrapper-{{ $name }}" class="w-full h-[56px] {{ $prefix ? '' : 'px-4' }} rounded-[10px] border border-[#DADADA] bg-white flex items-center {{ $type === 'password' ? 'justify-between' : '' }} {{ $prefix ? 'overflow-hidden' : '' }} form-input-focus transition-all @error($name) input-error @enderror">
        <input
            type="{{ match ($type) { 'email' => 'email', 'digits' => 'tel', 'password' => 'password', default => 'text' } }}"
            id="{{ $name }}"
            name="{{ $name }}"
            @if ($type !== 'password') value="{{ $value }}" @endif
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            @if ($autofocus ?? false) autofocus @endif
            @if ($type === 'digits') inputmode="numeric" @endif
            @if ($type === 'email') autocomplete="email" @elseif ($type === 'password') autocomplete="new-password" @endif
            @if (in_array($type, ['email', 'digits'])) dir="rtl" @endif
            class="w-full h-full {{ $prefix ? 'px-4' : '' }} bg-transparent text-[#262626] placeholder-[#949494] text-[16px] focus:outline-none {{ in_array($type, ['email', 'digits']) ? 'text-right font-sans' : '' }}"
        />
        @if ($type === 'password')
            <button
                type="button"
                onclick="togglePassword('{{ $name }}', '{{ $name }}-toggle-icon')"
                class="text-[#949494] hover:text-[#204A7A] transition-colors p-2 focus:outline-none"
                aria-label="{{ cms('auth.common.toggle_password', 'عرض أو إخفاء كلمة المرور') }}"
            >
                <i id="{{ $name }}-toggle-icon" class="fa-regular fa-eye-slash text-[18px]"></i>
            </button>
        @endif
        @if ($prefix)
            <div class="h-full px-3.5 bg-[#B6B6B6]/10 border-r border-[#DADADA] flex items-center gap-2 select-none shrink-0" dir="rtl">
                @if ($prefixFlag)<img src="{{ $prefixFlag }}" alt="" class="w-[24px] h-[24px] object-contain rounded-full shadow-sm" />@endif
                <span class="text-[#262626] font-semibold text-[16px]">{{ $prefix }}</span>
            </div>
        @endif
    </div>
    <div id="error-{{ $name }}" class="field-error-msg {{ $errors->has($name) ? '' : 'hidden' }}">
        @error($name)<i class="fa-solid fa-circle-exclamation text-xs"></i><span>{{ $message }}</span>@enderror
    </div>
</div>
