<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('profile.seo.title', 'الملف الشخصي | دار الرؤى للتدريب') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/profile.js']) }}
  {{-- نفس شكل حقول وقوائم فورم إنشاء حساب (auth/register): الارتفاع 56، حد #DADADA، تركيز #4585CF، وقايمة منسدلة مخصصة.
       CSS عادي (مش Tailwind) عشان الشكل ما يعتمدش على إعادة بناء الـ CSS. --}}
  <style>
    .pf-group { position: relative; display: flex; flex-direction: column; gap: 6px; min-width: 0; }
    .pf-label { display: flex; align-items: center; gap: 4px; font-weight: 500; font-size: 16px; color: #262626; }
    .pf-star { color: #E53935; font-weight: 700; font-size: 12px; }
    .pf-optional { font-family: 'Cairo', sans-serif; font-weight: 400; font-size: 12px; color: #6F6F6F; }
    .pf-control { box-sizing: border-box; width: 100%; height: 56px; padding: 0 16px; border: 1px solid #DADADA; border-radius: 10px; background: #fff; color: #262626; font: 500 16px 'El Messiri', 'Cairo', sans-serif; transition: border-color .2s, box-shadow .2s, background-color .2s; outline: none; appearance: none; -webkit-appearance: none; }
    .pf-control::placeholder { color: #949494; }
    .pf-control.is-numeric { text-align: right; font-family: 'Cairo', sans-serif; }
    .pf-control:hover:not(:disabled) { border-color: #BAC7D6; }
    .pf-control:focus, .pf-control[aria-expanded="true"] { border-color: #4585CF; background: #F6F6F6; box-shadow: 0 0 0 4px rgba(69, 133, 207, .12); }
    .pf-control:disabled { background: #F1F3F6; color: #6F6F6F; cursor: not-allowed; }
    .pf-control.pf-invalid { border-color: #E53935; background: #FFF5F5; }
    .pf-control.pf-invalid:focus { box-shadow: 0 0 0 4px rgba(229, 57, 53, .12); }
    input[type="date"].pf-control { display: block; min-width: 0; text-align: right; }
    input[type="date"].pf-control::-webkit-calendar-picker-indicator { cursor: pointer; opacity: .55; }
    .pf-select { display: flex; align-items: center; justify-content: space-between; gap: 8px; cursor: pointer; text-align: right; }
    .pf-select-value, .pf-option-label { display: flex; align-items: center; gap: 10px; min-width: 0; }
    .pf-flag { width: 22px; height: 22px; flex-shrink: 0; border-radius: 50%; object-fit: cover; box-shadow: 0 1px 2px rgba(0, 0, 0, .15); }
    .pf-flag[hidden] { display: none; }
    .pf-select-text { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #262626; }
    .pf-select-text.is-placeholder { color: #949494; }
    .pf-arrow { flex-shrink: 0; font-size: 12px; color: #949494; transition: transform .2s; }
    .pf-select[aria-expanded="true"] .pf-arrow { transform: rotate(180deg); }
    .pf-menu { position: absolute; top: calc(100% + 6px); right: 0; left: 0; z-index: 50; background: #fff; border: 1px solid #BAC7D6; border-radius: 10px; box-shadow: 0 4px 16px rgba(69, 133, 207, .12); padding: 8px 0; }
    .pf-menu[hidden], .pf-empty[hidden] { display: none; }
    .pf-menu.has-search { background: #F8FAFC; padding: 12px; }
    .pf-search { position: relative; margin-bottom: 10px; }
    .pf-search i { position: absolute; top: 50%; right: 14px; transform: translateY(-50%); color: #949494; font-size: 14px; pointer-events: none; }
    .pf-search input { box-sizing: border-box; width: 100%; height: 46px; padding: 0 40px 0 16px; border: 1px solid #C5C5C5; border-radius: 10px; background: #fff; color: #262626; font: 400 14px 'Cairo', sans-serif; text-align: right; outline: none; transition: border-color .2s; }
    .pf-search input:focus { border-color: #4585CF; }
    .pf-options { max-height: 250px; overflow-y: auto; scrollbar-width: thin; scrollbar-color: #CBD5E1 #F1F5F9; }
    .pf-menu.has-search .pf-options { background: #fff; border: 1px solid #E2E8F0; border-radius: 8px; }
    .pf-options::-webkit-scrollbar { width: 6px; }
    .pf-options::-webkit-scrollbar-track { background: #F1F5F9; border-radius: 4px; }
    .pf-options::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 4px; }
    .pf-options::-webkit-scrollbar-thumb:hover { background: #94A3B8; }
    .pf-option { display: flex; align-items: center; justify-content: space-between; gap: 8px; min-height: 48px; padding: 0 16px; cursor: pointer; font-weight: 600; font-size: 16px; color: #262626; transition: background-color .15s; outline: none; }
    .pf-menu.has-search .pf-option + .pf-option { border-top: 1px solid #F1F5F9; }
    .pf-option:hover, .pf-option:focus { background: #F8FAFC; }
    .pf-option.is-selected { background: #E6F2FA; color: #3777A9; }
    .pf-check { display: none; font-size: 12px; color: #3777A9; }
    .pf-option.is-selected .pf-check { display: inline; }
    .pf-empty { margin: 0; padding: 14px 16px; text-align: center; font: 500 14px 'Cairo', sans-serif; color: #6F6F6F; }
    .pf-hint { margin: 0; font: 400 12.5px 'Cairo', sans-serif; color: #6F6F6F; }
    .pf-error { display: flex; align-items: center; gap: 4px; margin: 2px 0 0; color: #E53935; font-size: 13px; font-weight: 500; animation: pf-fade .2s ease-in-out; }
    @keyframes pf-fade { from { opacity: 0; transform: translateY(-3px); } to { opacity: 1; transform: none; } }
    @media (max-width: 640px) { .pf-option { min-height: 52px; } }
  </style>
</head>
@php
  $sections = [
      'personal' => cms('profile.section.personal', 'البيانات الشخصية'),
      'contact' => cms('profile.section.contact', 'بيانات التواصل'),
      'professional' => cms('profile.section.professional', 'البيانات التعليمية والمهنية'),
  ];
  $percent = $completion['percent'];
  $ring = 2 * M_PI * 34;
@endphp
<body class="bg-brand-bg text-[#262626] min-h-screen font-messiri antialiased selection:bg-brand-primary selection:text-white flex flex-col relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">{{ cms('global.a11y.skip_link', 'تخطي إلى المحتوى الرئيسي') }}</a>

  @include('landing.partials.navbar')

  <main id="main-content" class="w-full max-w-[1100px] mx-auto px-4 sm:px-6 lg:px-0 pt-5 lg:pt-[40px] pb-[64px] lg:pb-[112px] flex-1">
    <nav aria-label="مسار التنقل" class="mb-4 lg:mb-6 flex items-center gap-2 text-[14px] lg:text-[17px]">
      <a href="{{ route('home') }}" class="text-[#6f6f6f] hover:text-[#204a7a] transition-colors">{{ cms('profile.page.breadcrumb_home', 'الرئيسية') }}</a>
      <i class="fa-solid fa-chevron-left text-[10px] text-[#9aa3ad]" aria-hidden="true"></i>
      <span class="font-semibold text-[#204a7a]" aria-current="page">{{ cms('profile.page.title', 'الملف الشخصي') }}</span>
    </nav>

    @if (session('status'))
      <div role="status" class="mb-4 flex items-start gap-3 rounded-[14px] border border-[#bbf7d0] bg-[#f0fdf4] px-4 py-3 text-[14px] lg:text-[16px] font-semibold text-[#166534]">
        <i class="fa-solid fa-circle-check mt-[3px]" aria-hidden="true"></i><span>{{ session('status') }}</span>
      </div>
    @endif
    @if (session('warning'))
      <div role="alert" data-profile-warning class="mb-4 flex items-start gap-3 rounded-[14px] border border-[#fde68a] bg-[#fffbeb] px-4 py-3 text-[14px] lg:text-[16px] font-semibold text-[#92400e]">
        <i class="fa-solid fa-triangle-exclamation mt-[3px]" aria-hidden="true"></i><span>{{ session('warning') }}</span>
      </div>
    @endif
    @if ($errors->any())
      <div role="alert" data-profile-errors class="mb-4 flex items-start gap-3 rounded-[14px] border border-[#fecaca] bg-[#fef2f2] px-4 py-3 text-[14px] lg:text-[16px] font-semibold text-[#b91c1c]">
        <i class="fa-solid fa-circle-exclamation mt-[3px]" aria-hidden="true"></i><span>{{ cms('profile.page.errors', 'راجع الحقول المحددة أدناه ثم أعد الحفظ.') }}</span>
      </div>
    @endif

    {{-- بطاقة الملخص: الصورة والاسم ونسبة الاكتمال --}}
    <section aria-labelledby="profile-summary" class="mb-6 lg:mb-8 overflow-hidden rounded-[20px] bg-gradient-to-l from-[#204a7a] to-[#102744] p-5 lg:p-8 text-white shadow-[0_10px_30px_rgba(32,74,122,0.2)]">
      <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex items-center gap-4 lg:gap-5 min-w-0">
          <span class="flex size-[64px] lg:size-[88px] shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-white/40 bg-white/15">
            @if ($user->photo)
              <img src="{{ $user->photo }}" alt="" data-summary-photo class="size-full object-cover" />
            @else
              <i class="fa-solid fa-user text-[26px] lg:text-[34px] text-white/90" aria-hidden="true"></i>
            @endif
          </span>
          <div class="min-w-0">
            <h1 id="profile-summary" class="truncate font-bold text-[21px] lg:text-[30px] leading-tight">{{ $user->name }}</h1>
            <p dir="ltr" class="mt-1 truncate text-right font-cairo text-[13px] lg:text-[15px] text-white/80">{{ $user->email }}</p>
          </div>
        </div>

        <div class="flex items-center gap-4 lg:gap-5 lg:min-w-[380px]">
          <div class="relative size-[76px] lg:size-[88px] shrink-0" role="img" aria-label="{{ cms('profile.completion.aria', 'نسبة اكتمال الملف الشخصي') }}">
            <svg viewBox="0 0 80 80" class="size-full -rotate-90" aria-hidden="true">
              <circle cx="40" cy="40" r="34" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="7" />
              <circle data-completion-ring cx="40" cy="40" r="34" fill="none" stroke="{{ $completion['complete'] ? '#4ade80' : '#e6b844' }}" stroke-width="7" stroke-linecap="round"
                stroke-dasharray="{{ $ring }}" stroke-dashoffset="{{ $ring * (1 - $percent / 100) }}" data-circumference="{{ $ring }}" class="transition-all duration-500" />
            </svg>
            <span data-completion-percent dir="ltr" class="absolute inset-0 flex items-center justify-center font-cairo font-bold text-[18px] lg:text-[21px]">{{ $percent }}%</span>
          </div>
          <div class="min-w-0 flex-1">
            <p data-completion-title class="font-semibold text-[16px] lg:text-[19px]">
              {{ $completion['complete'] ? cms('profile.completion.done', 'ملفك الشخصي مكتمل') : cms('profile.completion.title', 'اكتمال الملف الشخصي') }}
            </p>
            <p data-completion-text class="mt-1 font-cairo text-[12.5px] lg:text-[14px] leading-[1.7] text-white/80">
              @if ($completion['complete'])
                {{ cms('profile.completion.done_text', 'يمكنك الآن عرض التقارير التفصيلية لكل المقاييس.') }}
              @else
                {{ str_replace(':count', $completion['total'] - $completion['filled'], cms('profile.completion.remaining', 'متبقي :count حقول إجبارية لعرض التقارير التفصيلية.')) }}
              @endif
            </p>
          </div>
        </div>
      </div>
    </section>

    <form id="profile-form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" novalidate
          data-remaining-text="{{ cms('profile.completion.remaining', 'متبقي :count حقول إجبارية لعرض التقارير التفصيلية.') }}"
          data-done-title="{{ cms('profile.completion.done', 'ملفك الشخصي مكتمل') }}"
          data-title="{{ cms('profile.completion.title', 'اكتمال الملف الشخصي') }}"
          data-done-text="{{ cms('profile.completion.done_text', 'يمكنك الآن عرض التقارير التفصيلية لكل المقاييس.') }}"
          class="flex flex-col gap-6 lg:gap-8">
      @csrf
      @method('PUT')

      @foreach ($groups as $group => $fields)
        <fieldset class="rounded-[20px] bg-white p-5 lg:p-8 shadow-sm border border-[#e5e9ef]">
          <legend class="float-right mb-5 w-full font-bold text-[18px] lg:text-[24px] text-[#204a7a]">{{ $sections[$group] }}</legend>
          <div class="clear-both grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2">
            @foreach ($fields as $name => $f)
              @php
                $current = old($name, $suggested[$name] ?? $form->valueOf($user, $name));
                $id = "pf-{$name}";
                $error = $errors->first($name);
                $options = $f['options'];
                if ($f['type'] === 'select' && $current !== '' && ! array_key_exists($current, $options)) {
                    $options[$current] = $current;
                }
              @endphp
              <div class="{{ $f['half'] ? '' : 'md:col-span-2' }} pf-group" data-field="{{ $name }}" @if ($f['type'] === 'select') data-dropdown @endif>
                <label @if ($f['type'] === 'select') id="{{ $id }}-label" @else for="{{ $id }}" @endif class="pf-label">
                  <span>{{ $f['label'] }}</span>
                  @if ($f['required'] && ! $f['readonly'])<span class="pf-star" aria-hidden="true">*</span>@endif
                  @unless ($f['required'])<span class="pf-optional">({{ cms('profile.common.optional', 'اختياري') }})</span>@endunless
                </label>

                @if ($f['type'] === 'select')
                  @php
                    $selectedLabel = $options[$current] ?? null;
                    $searchable = count($options) > 8;
                  @endphp
                  <input type="hidden" name="{{ $name }}" id="{{ $id }}" value="{{ $current }}" data-profile-input data-dropdown-input @if ($f['required']) data-required @endif>
                  <button type="button" class="pf-control pf-select {{ $error ? 'pf-invalid' : '' }}" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="{{ $id }}-label"
                          @if ($error) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif data-dropdown-button>
                    <span class="pf-select-value">
                      @if ($f['flags'])
                        <img src="{{ $selectedLabel ? $form->flag($current) : '' }}" alt="" class="pf-flag" {{ $selectedLabel ? '' : 'hidden' }} data-dropdown-flag />
                      @endif
                      <span class="pf-select-text {{ $selectedLabel ? '' : 'is-placeholder' }}" data-dropdown-text data-placeholder="{{ cms('profile.common.choose', 'اختر...') }}">{{ $selectedLabel ?? cms('profile.common.choose', 'اختر...') }}</span>
                    </span>
                    <i class="fa-solid fa-chevron-down pf-arrow" aria-hidden="true" data-dropdown-arrow></i>
                  </button>
                  <div class="pf-menu {{ $searchable ? 'has-search' : '' }}" role="listbox" aria-labelledby="{{ $id }}-label" hidden data-dropdown-menu>
                    @if ($searchable)
                      <div class="pf-search">
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        <input type="text" dir="rtl" autocomplete="off" placeholder="{{ cms('profile.common.search', 'بحث...') }}" aria-label="{{ cms('profile.common.search', 'بحث...') }}" data-dropdown-search />
                      </div>
                    @endif
                    <div class="pf-options">
                      @unless ($f['required'])
                        {{-- اختياري: ممكن يرجع لـ "اختر..." (بدون قيمة) --}}
                        <div class="pf-option {{ $current === '' ? 'is-selected' : '' }}" role="option" tabindex="-1" data-value="" data-label="{{ cms('profile.common.choose', 'اختر...') }}"
                             aria-selected="{{ $current === '' ? 'true' : 'false' }}" data-dropdown-option>
                          <span class="text-[#949494]">{{ cms('profile.common.choose', 'اختر...') }}</span>
                          <i class="fa-solid fa-check pf-check" aria-hidden="true"></i>
                        </div>
                      @endunless
                      @foreach ($options as $value => $label)
                        <div class="pf-option {{ (string) $current === (string) $value ? 'is-selected' : '' }}" role="option" tabindex="-1" data-value="{{ $value }}" data-label="{{ $label }}"
                             @if ($f['flags']) data-flag="{{ $form->flag($value) }}" @endif
                             aria-selected="{{ (string) $current === (string) $value ? 'true' : 'false' }}" data-dropdown-option>
                          <span class="pf-option-label">
                            @if ($f['flags'])<img src="{{ $form->flag($value) }}" alt="" class="pf-flag" loading="lazy" />@endif
                            <span>{{ $label }}</span>
                          </span>
                          <i class="fa-solid fa-check pf-check" aria-hidden="true"></i>
                        </div>
                      @endforeach
                      <p class="pf-empty" hidden data-dropdown-empty>{{ cms('profile.common.no_results', 'لا توجد نتائج') }}</p>
                    </div>
                  </div>
                @else
                  <input id="{{ $id }}" name="{{ $name }}"
                         type="{{ $f['type'] === 'digits' ? 'tel' : $f['type'] }}"
                         value="{{ $current }}"
                         @if ($f['type'] === 'digits') inputmode="numeric" maxlength="{{ $f['max'] }}" @endif
                         @if ($f['type'] === 'date') max="{{ now()->subDay()->format('Y-m-d') }}" min="1920-01-02" @endif
                         @if ($f['dir'] || in_array($f['type'], ['digits', 'email'])) dir="{{ $f['dir'] ?? 'rtl' }}" @endif
                         @if ($f['readonly']) disabled @else data-profile-input @endif
                         @if ($f['required']) data-required @endif
                         @if ($f['hint']) aria-describedby="{{ $id }}-hint" @endif
                         @if ($error) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
                         class="pf-control {{ $error ? 'pf-invalid' : '' }} {{ in_array($f['type'], ['digits', 'email', 'date']) || $f['dir'] === 'ltr' ? 'is-numeric' : '' }}" />
                @endif

                @if ($f['hint'])<p id="{{ $id }}-hint" class="pf-hint">{{ $f['hint'] }}</p>@endif
                @if ($error)<p id="{{ $id }}-error" role="alert" class="pf-error"><i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i><span>{{ $error }}</span></p>@endif
              </div>
            @endforeach
          </div>
        </fieldset>
      @endforeach

      {{-- الصورة الشخصية (اختياري) --}}
      <fieldset class="rounded-[20px] bg-white p-5 lg:p-8 shadow-sm border border-[#e5e9ef]">
        <legend class="float-right mb-5 w-full font-bold text-[18px] lg:text-[24px] text-[#204a7a]">{{ cms('profile.section.photo', 'الصورة الشخصية') }}</legend>
        <div class="clear-both flex flex-col items-center gap-4 sm:flex-row sm:items-center sm:gap-6">
          <span class="flex size-[112px] shrink-0 items-center justify-center overflow-hidden rounded-full border-4 border-[#dbe5f0] bg-[#eef2f7]">
            <img id="photo-preview" src="{{ $user->photo ?: '' }}" alt="" class="size-full object-cover {{ $user->photo ? '' : 'hidden' }}" />
            <i id="photo-placeholder" class="fa-solid fa-user text-[44px] text-[#b4c0cf] {{ $user->photo ? 'hidden' : '' }}" aria-hidden="true"></i>
          </span>
          <div class="flex flex-col items-center gap-3 sm:items-start">
            <div class="flex flex-wrap justify-center gap-3 sm:justify-start">
              <label for="photo" class="inline-flex h-[44px] cursor-pointer items-center gap-2 rounded-[10px] bg-[#204a7a] px-5 font-semibold text-[15px] text-white transition-colors hover:bg-[#102744] focus-within:ring-2 focus-within:ring-[#204a7a] focus-within:ring-offset-2">
                <i class="fa-solid fa-plus text-[12px]" aria-hidden="true"></i>{{ cms('profile.photo.choose', 'اختر الصورة الشخصية') }}
              </label>
              <input id="photo" name="photo" type="file" accept="image/png,image/jpeg,image/webp" class="sr-only" />
              <label id="remove-photo-wrap" class="{{ $user->photo ? 'inline-flex' : 'hidden' }} h-[44px] cursor-pointer items-center gap-2 rounded-[10px] border border-[#cfd6df] px-4 font-semibold text-[14px] text-[#565656] transition-colors hover:border-[#e24949] hover:text-[#e24949]">
                <input type="checkbox" name="remove_photo" value="1" id="remove-photo" class="size-4 accent-[#e24949]" />{{ cms('profile.photo.remove', 'حذف الصورة') }}
              </label>
            </div>
            <p class="font-cairo text-[12.5px] lg:text-[13px] text-[#6f6f6f]">{{ cms('profile.photo.hint', 'اختياري — JPG أو PNG أو WEBP، بحد أقصى 2 ميجابايت.') }}</p>
            @error('photo')<p role="alert" class="font-cairo text-[13px] font-semibold text-[#e24949]">{{ $message }}</p>@enderror
          </div>
        </div>
      </fieldset>

      {{-- الإقرار والحفظ --}}
      <div class="rounded-[20px] bg-white p-5 lg:p-8 shadow-sm border border-[#e5e9ef]">
        <label class="flex cursor-pointer items-start gap-3 font-cairo text-[14px] lg:text-[16px] leading-[1.8] text-[#262626]">
          <input type="checkbox" name="confirm" value="1" data-profile-confirm @checked(old('confirm')) class="mt-[6px] size-5 shrink-0 accent-[#204a7a]" />
          <span>{{ cms('profile.confirm.label', 'قرأت وفهمت الملاحظات أعلاه، وتأكدت من صحة المعلومات المدخلة، وخاصة رقم الهوية.') }}</span>
        </label>
        @error('confirm')<p role="alert" class="mt-2 font-cairo text-[13px] lg:text-[14px] font-semibold text-[#e24949]">{{ $message }}</p>@enderror

        <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
          <button type="button" data-open-delete class="flex h-[48px] items-center justify-center gap-2 rounded-[12px] border border-[#f3b4b4] px-5 font-semibold text-[15px] text-[#e24949] transition-colors hover:bg-[#fff5f5] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#e24949] focus-visible:ring-offset-2">
            <i class="fa-regular fa-trash-can text-[14px]" aria-hidden="true"></i>{{ cms('profile.delete.button', 'حذف بيانات الملف الشخصي') }}
          </button>
          <button type="submit" class="flex h-[48px] lg:h-[56px] items-center justify-center gap-2 rounded-[12px] bg-[#204a7a] px-8 lg:px-12 font-semibold text-[16px] lg:text-[19px] text-white transition-colors hover:bg-[#102744] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
            <i class="fa-solid fa-floppy-disk text-[15px]" aria-hidden="true"></i>{{ cms('profile.page.save', 'حفظ') }}
          </button>
        </div>
      </div>
    </form>
  </main>

  {{-- تأكيد حذف بيانات الملف --}}
  <dialog id="delete-dialog" aria-labelledby="delete-title" class="m-auto w-[calc(100%-32px)] max-w-[440px] rounded-[20px] border-0 p-0 shadow-[0_20px_60px_rgba(0,0,0,0.3)] backdrop:bg-black/50 backdrop:backdrop-blur-sm">
    <form method="POST" action="{{ route('profile.destroy') }}" class="p-6 lg:p-8 text-right">
      @csrf
      @method('DELETE')
      <span class="mb-4 flex size-[48px] items-center justify-center rounded-full bg-[#fee2e2] text-[#e24949]" aria-hidden="true"><i class="fa-regular fa-trash-can text-[20px]"></i></span>
      <h2 id="delete-title" class="font-bold text-[20px] lg:text-[23px] text-[#262626]">{{ cms('profile.delete.title', 'حذف بيانات الملف الشخصي؟') }}</h2>
      <p class="mt-2 font-cairo text-[14px] lg:text-[15px] leading-[1.8] text-[#565656]">{{ cms('profile.delete.text', 'سيتم مسح بياناتك الشخصية والمهنية وصورتك، ويبقى حسابك وبريدك ورقم جوالك وهويتك. ستحتاج لإكمال الملف من جديد لعرض التقارير التفصيلية.') }}</p>
      <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-start">
        <button type="button" data-close-delete class="h-[46px] rounded-[10px] border border-[#cfd6df] px-6 font-semibold text-[15px] text-[#262626] transition-colors hover:bg-[#f3f5f8]">{{ cms('profile.delete.cancel', 'إلغاء') }}</button>
        <button type="submit" class="h-[46px] rounded-[10px] bg-[#e24949] px-6 font-semibold text-[15px] text-white transition-colors hover:bg-[#c53030]">{{ cms('profile.delete.confirm', 'نعم، احذف البيانات') }}</button>
      </div>
    </form>
  </dialog>

  @include('landing.partials.footer')
</body>
</html>
