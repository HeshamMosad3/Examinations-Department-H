{{-- قايمة منسدلة في فورم إنشاء حساب: $field (من RegisterForm), $value, $flags (اسم الخيار => علم، للجنسية) --}}
@php
    $name = $field['name'];
    $selectedLabel = $field['options'][$value] ?? null;
@endphp
<div class="flex flex-col gap-1.5 relative" id="group-{{ $name }}" data-dropdown>
    <label id="label-{{ $name }}" class="text-[#262626] font-medium text-[16px] flex items-center gap-1">
        {{ $field['label'] }}
        @if ($field['required'])<span class="text-[#E53935] font-bold text-xs">*</span>@endif
    </label>

    <input type="hidden" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" data-dropdown-input>

    <button
        type="button"
        id="wrapper-{{ $name }}"
        class="w-full h-[56px] px-4 rounded-[10px] border border-[#DADADA] bg-white flex items-center justify-between transition-all focus:outline-none @error($name) input-error @enderror"
        aria-haspopup="listbox"
        aria-expanded="false"
        aria-labelledby="label-{{ $name }}"
        data-dropdown-button
    >
        <span class="flex items-center gap-2.5">
            @if ($flags)
                <img src="{{ $selectedLabel ? $flags[$value] : \App\Services\Auth\RegisterForm::OTHER_FLAG }}" alt="" class="w-[22px] h-[22px] rounded-full object-cover shadow-sm {{ $selectedLabel ? '' : 'hidden' }}" data-dropdown-flag />
            @endif
            <span class="font-medium text-[16px] {{ $selectedLabel ? 'text-[#262626]' : 'text-[#949494]' }}" data-dropdown-text data-placeholder="{{ $field['placeholder'] }}">{{ $selectedLabel ?? $field['placeholder'] }}</span>
        </span>
        <i class="fa-solid fa-chevron-down text-[#949494] text-xs transition-transform duration-200" data-dropdown-arrow></i>
    </button>

    <div class="hidden absolute top-[85px] right-0 left-0 {{ $flags ? 'bg-[#F8FAFC] p-3' : 'bg-white py-2' }} border border-[#BAC7D6] rounded-[10px] shadow-[0px_4px_16px_rgba(69,133,207,0.12)] z-50" role="listbox" data-dropdown-menu>
        @if ($flags)
            <div class="relative w-full mb-2.5">
                <input
                    type="text"
                    placeholder="{{ $field['search_placeholder'] ?? '' }}"
                    dir="rtl"
                    class="w-full h-[46px] pr-10 pl-4 bg-white border border-[#C5C5C5] rounded-[10px] text-sm text-[#262626] placeholder-[#6F6F6F] focus:outline-none focus:border-[#4585CF] transition-all text-right"
                    data-dropdown-search
                />
                <i class="fa-solid fa-magnifying-glass text-[#949494] text-sm absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
            </div>
        @endif
        <div class="{{ $flags ? 'max-h-[250px] overflow-y-auto custom-dropdown-scroll bg-white border border-[#E2E8F0] rounded-[8px] divide-y divide-gray-100' : '' }}">
            @foreach ($field['options'] as $optValue => $optLabel)
                <div
                    class="px-4 {{ $flags ? 'h-[48px]' : 'h-[52px]' }} flex items-center justify-between cursor-pointer transition-colors {{ (string) $value === (string) $optValue ? 'bg-[#E6F2FA] text-[#3777A9]' : 'text-[#262626] hover:bg-[#F8FAFC]' }}"
                    data-value="{{ $optValue }}"
                    data-label="{{ $optLabel }}"
                    @if ($flags) data-flag="{{ $flags[$optValue] }}" @endif
                    role="option"
                    aria-selected="{{ (string) $value === (string) $optValue ? 'true' : 'false' }}"
                    data-dropdown-option
                >
                    <span class="flex items-center gap-3">
                        @if ($flags)<img src="{{ $flags[$optValue] }}" alt="" class="w-[22px] h-[22px] rounded-full object-cover shadow-xs" />@endif
                        <span class="font-semibold {{ $flags ? 'text-[15px]' : 'text-[16px]' }}">{{ $optLabel }}</span>
                    </span>
                    <i class="fa-solid fa-check text-[#3777A9] text-xs {{ (string) $value === (string) $optValue ? '' : 'hidden' }}" data-dropdown-check></i>
                </div>
            @endforeach
        </div>
    </div>
    <div id="error-{{ $name }}" class="field-error-msg {{ $errors->has($name) ? '' : 'hidden' }}">
        @error($name)<i class="fa-solid fa-circle-exclamation text-xs"></i><span>{{ $message }}</span>@enderror
    </div>
</div>
