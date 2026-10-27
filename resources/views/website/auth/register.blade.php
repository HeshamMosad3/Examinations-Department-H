@extends('layouts.auth')

@section('title', cms('auth.register.page_title', 'إنشاء حساب جديد — دار الرؤى'))

@section('body_class', 'lg:h-auto lg:overflow-y-auto')
@section('wrapper_class', 'lg:h-auto')
@section('grid_class', 'lg:items-start')
@section('aside_class', 'lg:sticky lg:top-6 lg:h-[calc(100vh-3rem)]')

@php
    // الحقول وترتيبها وقواعدها من لوحة الإدارة (App\Services\Website\Auth\RegisterForm)
    $form = app(\App\Services\Website\Auth\RegisterForm::class);
    $fields = $form->fields();
    $firstField = array_key_first($fields);
@endphp

@section('content')
<div class="w-full max-w-[680px] py-2 lg:py-4">
    <!-- Header: Logo, Title, Subtitle -->
    <div class="flex flex-col items-center text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block mb-4 transition-transform hover:scale-105">
            <img src="{{ cms_image('auth.common.logo', '/images/auth/auth-logo.png') }}" alt="{{ cms('auth.common.logo_alt', 'دار الرؤى') }}" class="w-[85px] h-[85px] object-contain" />
        </a>
        <h1 class="text-[#204A7A] font-bold text-[28px] sm:text-[32px] leading-tight mb-2">
            {{ cms('auth.register.title', 'إنشاء حساب جديد') }}
        </h1>
        <p class="text-[#565656] font-medium text-[16px] sm:text-[18px]">
            {{ cms('auth.register.subtitle', 'أهلًا بك! أنشئ حسابك وابدأ رحلتك مع دار الرؤى.') }}
        </p>
        <div class="w-full h-[1px] bg-[#E9E9E9] mt-6"></div>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
            <div class="font-bold mb-1 flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation text-red-500"></i>
                {{ cms('auth.register.errors_title', 'يرجى تصحيح الأخطاء التالية:') }}
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

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-5">
            @foreach ($fields as $name => $field)
                @php $span = $field['full'] ? 'sm:col-span-2' : ''; @endphp

                @if (in_array($field['type'], ['select', 'nationality']))
                    @php
                        $flags = $field['type'] === 'nationality'
                            ? collect($field['options'])->keys()->mapWithKeys(fn ($n) => [$n => $form->flagFor($n)])->all()
                            : null;
                        $value = old($name, $field['required'] ? array_key_first($field['options']) : '');
                    @endphp
                    <div class="{{ $span }}">
                        @include('website.auth.partials.register-select', ['field' => $field, 'value' => $value, 'flags' => $flags])
                    </div>
                @else
                    <div class="{{ $span }}">
                        @include('website.auth.partials.register-input', [
                            'name' => $name,
                            'label' => $field['label'],
                            'placeholder' => $field['placeholder'],
                            'type' => $field['type'],
                            'required' => $field['required'],
                            'value' => old($name),
                            'prefix' => $field['prefix'] ?? null,
                            'prefixFlag' => $field['prefix_flag'] ?? null,
                            'autofocus' => $name === $firstField,
                        ])
                    </div>
                    @if ($field['confirm'])
                        <div class="{{ $span }}">
                            @include('website.auth.partials.register-input', [
                                'name' => $name . '_confirmation',
                                'label' => $field['confirm']['label'],
                                'placeholder' => $field['confirm']['placeholder'],
                                'type' => $field['type'],
                                'required' => $field['required'],
                                'value' => '',
                                'prefix' => null,
                                'prefixFlag' => null,
                            ])
                        </div>
                    @endif
                @endif
            @endforeach
        </div>

        @if (cms_flag('auth.register.show_remember', '1'))
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
                    <span class="text-[#565656] font-medium text-[16px]">{{ cms('auth.register.remember', 'تذكرني') }}</span>
                </label>
            </div>
        @endif

        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full h-[56px] rounded-[10px] bg-[#204A7A] hover:bg-[#163558] text-[#F6F6F6] font-semibold text-[18px] sm:text-[20px] transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center mt-2"
        >
            {{ cms('auth.register.submit', 'إنشاء حساب جديد') }}
        </button>

        <!-- Login Link -->
        <div class="text-center mt-4">
            <span class="text-[#515151] font-normal text-[17px]">{{ cms('auth.register.have_account', 'هل لديك حساب؟') }} </span>
            <a href="{{ route('login', request()->only('next')) }}" class="text-[#204A7A] hover:underline font-semibold text-[17px] border-b border-[#204A7A] pb-[1px]">
                {{ cms('auth.register.login_link', 'تسجيل دخول') }}
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // قواعد التحقق نفسها اللي في السيرفر (App\Services\Website\Auth\RegisterForm::clientRules)
    window.REGISTER_RULES = @json($form->clientRules());

    document.addEventListener('DOMContentLoaded', () => {
        // --- 1. Custom dropdowns (identity type, nationality with search, gender) ---
        const dropdowns = [...document.querySelectorAll('[data-dropdown]')].map((root) => ({
            root,
            input: root.querySelector('[data-dropdown-input]'),
            button: root.querySelector('[data-dropdown-button]'),
            menu: root.querySelector('[data-dropdown-menu]'),
            arrow: root.querySelector('[data-dropdown-arrow]'),
            text: root.querySelector('[data-dropdown-text]'),
            flag: root.querySelector('[data-dropdown-flag]'),
            search: root.querySelector('[data-dropdown-search]'),
            options: [...root.querySelectorAll('[data-dropdown-option]')],
        }));

        function toggleDropdown(dd, open) {
            const show = open !== undefined ? open : dd.menu.classList.contains('hidden');
            dd.menu.classList.toggle('hidden', !show);
            dd.button.classList.toggle('border-[#4585CF]', show);
            dd.button.classList.toggle('bg-[#F6F6F6]', show);
            dd.button.classList.toggle('ring-4', show);
            dd.button.classList.toggle('ring-[#4585CF]/15', show);
            dd.arrow.classList.toggle('rotate-180', show);
            dd.button.setAttribute('aria-expanded', show ? 'true' : 'false');
            if (show && dd.search) setTimeout(() => dd.search.focus(), 50);
        }

        dropdowns.forEach((dd) => {
            dd.button.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdowns.filter((other) => other !== dd).forEach((other) => toggleDropdown(other, false));
                toggleDropdown(dd);
            });

            dd.options.forEach((opt) => {
                opt.addEventListener('click', () => {
                    dd.input.value = opt.dataset.value;
                    dd.text.textContent = opt.dataset.label;
                    dd.text.classList.remove('text-[#949494]');
                    dd.text.classList.add('text-[#262626]');
                    if (dd.flag && opt.dataset.flag) {
                        dd.flag.src = opt.dataset.flag;
                        dd.flag.classList.remove('hidden');
                    }
                    dd.options.forEach((o) => {
                        const selected = o === opt;
                        o.classList.toggle('bg-[#E6F2FA]', selected);
                        o.classList.toggle('text-[#3777A9]', selected);
                        o.classList.toggle('text-[#262626]', !selected);
                        o.setAttribute('aria-selected', selected ? 'true' : 'false');
                        o.querySelector('[data-dropdown-check]').classList.toggle('hidden', !selected);
                    });
                    clearFieldError(dd.input.name);
                    toggleDropdown(dd, false);
                });
            });

            if (dd.search) {
                dd.search.addEventListener('input', (e) => {
                    const query = e.target.value.trim().toLowerCase();
                    dd.options.forEach((opt) => {
                        opt.style.display = opt.dataset.label.toLowerCase().includes(query) ? 'flex' : 'none';
                    });
                });
            }
        });

        document.addEventListener('click', (e) => {
            dropdowns.forEach((dd) => {
                if (!dd.root.contains(e.target)) toggleDropdown(dd, false);
            });
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') dropdowns.forEach((dd) => toggleDropdown(dd, false));
        });

        // --- 2. Client-side validation (same rules as the server) ---
        const regForm = document.getElementById('register-form');

        function setFieldError(field, msg) {
            const wrapper = document.getElementById(`wrapper-${field}`);
            const errorDiv = document.getElementById(`error-${field}`);
            if (wrapper) wrapper.classList.add('input-error');
            if (errorDiv) {
                errorDiv.innerHTML = '<i class="fa-solid fa-circle-exclamation text-xs"></i><span></span>';
                errorDiv.querySelector('span').textContent = msg;
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

        function cleanValue(rule, raw) {
            const val = raw || '';
            if (rule.type === 'password') return val.replace(/[​-‍﻿ \r\n\t]/g, '').trim();
            if (rule.type === 'digits') return val.replace(/[\s\-]/g, '');
            return val.trim();
        }

        function validate(rule) {
            const input = document.getElementById(rule.name);
            if (!input) return true;
            const val = cleanValue(rule, input.value);
            const m = rule.messages;

            let error = '';
            if (!val) {
                error = rule.required ? m.required : '';
            } else if (rule.type === 'email') {
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) error = m.email;
            } else if (rule.type === 'digits') {
                if (!/^[0-9]+$/.test(val) || val.length < rule.min || val.length > rule.max) error = m.regex;
            } else if (rule.type === 'text' || rule.type === 'password') {
                if (rule.min && val.length < rule.min) error = m.min;
                else if (rule.max && val.length > rule.max) error = m.max;
                else if (rule.arabic && !/^[؀-ۿ\s]+$/.test(val)) error = m.regex;
            }

            if (error) {
                setFieldError(rule.name, error);
                return false;
            }
            clearFieldError(rule.name);
            return true;
        }

        function validateConfirm(rule) {
            const confirm = document.getElementById(`${rule.name}_confirmation`);
            if (!rule.confirm || !confirm) return true;
            const original = cleanValue(rule, document.getElementById(rule.name).value);
            const val = cleanValue(rule, confirm.value);
            const name = `${rule.name}_confirmation`;

            if (!val && (rule.required || original)) {
                setFieldError(name, rule.messages.confirm_required);
                return false;
            }
            if (val !== original) {
                setFieldError(name, rule.messages.confirmed);
                return false;
            }
            clearFieldError(name);
            return true;
        }

        window.REGISTER_RULES.forEach((rule) => {
            const input = document.getElementById(rule.name);
            if (!input || input.type === 'hidden') return;
            input.addEventListener('input', () => {
                clearFieldError(rule.name);
                const confirm = document.getElementById(`${rule.name}_confirmation`);
                if (confirm && confirm.value) validateConfirm(rule);
            });
            input.addEventListener('blur', () => validate(rule));

            const confirm = document.getElementById(`${rule.name}_confirmation`);
            if (confirm) {
                confirm.addEventListener('input', () => clearFieldError(`${rule.name}_confirmation`));
                confirm.addEventListener('blur', () => validateConfirm(rule));
            }
        });

        regForm.addEventListener('submit', (e) => {
            let firstFailed = null;
            window.REGISTER_RULES.forEach((rule) => {
                const ok = validate(rule);
                const confirmOk = validateConfirm(rule);
                if (!firstFailed && (!ok || !confirmOk)) {
                    firstFailed = !ok ? rule.name : `${rule.name}_confirmation`;
                }
            });

            if (firstFailed) {
                e.preventDefault();
                const el = document.getElementById(firstFailed);
                const focusEl = el && el.type === 'hidden' ? document.getElementById(`wrapper-${firstFailed}`) : el;
                if (focusEl) {
                    focusEl.focus();
                    focusEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return;
            }

            // Send the same cleaned values the checks used
            window.REGISTER_RULES.forEach((rule) => {
                [rule.name, `${rule.name}_confirmation`].forEach((id) => {
                    const el = document.getElementById(id);
                    if (el && el.type !== 'hidden') el.value = cleanValue(rule, el.value);
                });
            });
        });
    });
</script>
@endpush
