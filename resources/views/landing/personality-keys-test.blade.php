@php
    // قيم الإجابة 4 ← 0 (Figma): [خلفية الدايرة، لون الرقم، التسمية]
    $scale = [
        4 => ['bg' => '#dcfce7', 'color' => '#16a34a', 'label' => cms('keys_test.scale.always', 'دائماً')],
        3 => ['bg' => '#e3d8ef', 'color' => '#735297', 'label' => cms('keys_test.scale.often', 'غالباً')],
        2 => ['bg' => '#d7def7', 'color' => '#204a7a', 'label' => cms('keys_test.scale.sometimes', 'أحياناً')],
        1 => ['bg' => '#ffedd5', 'color' => '#ea580c', 'label' => cms('keys_test.scale.rarely', 'نادراً')],
        0 => ['bg' => '#fee2e2', 'color' => '#e24949', 'label' => cms('keys_test.scale.never', 'أبداً')],
    ];
    $keysCount = count($keys);
    $title = cms('keys_test.title', 'اختبار مفاتيح الشخصية السبعة');
    $dir = '/landing/images/keys-test';
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>{{ cms('keys_test.seo.title', 'اختبار مفاتيح الشخصية السبعة | دار الرؤى للتدريب') }}</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/personalityKeysTest.js']) }}
</head>
<body class="bg-brand-bg text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">تخطي إلى المحتوى</a>

  @include('landing.partials.navbar')

  {{-- Figma: Desktop 3396:7751 / 3396:8204 — Mobile 3396:4747 / 3396:5090 --}}
  <main id="main-content" class="w-full max-w-[1240px] mx-auto px-4 lg:px-0 pt-4 lg:pt-[48px] pb-[64px] lg:pb-[128px] font-messiri">
    <div id="pk-app" class="flex flex-col gap-6 lg:gap-[64px]"
         data-user="{{ auth()->id() }}" data-total="{{ $keysCount }}"
         data-store-url="{{ route('keys.results.store') }}"
         data-final-label="{{ cms('keys_test.buttons.finish', 'عرض النتيجة') }}"
         data-next-label="{{ cms('keys_test.buttons.next', 'المفتاح التالي') }}"
         data-error="{{ cms('keys_test.error', 'تعذّر حفظ إجاباتك، يرجى المحاولة مرة أخرى.') }}">

      {{-- مسار التنقل (ديسكتوب) / زر الرجوع (موبايل، في أول مفتاح) --}}
      <nav class="hidden lg:flex items-center" aria-label="مسار التنقل">
        <a href="{{ route('home') }}" class="font-normal text-[21px] leading-[1.5] text-[#6f6f6f] hover:text-brand-primary transition-colors">{{ cms('keys_test.breadcrumb_home', 'الرئيسية') }}</a>
        <span class="flex size-[18px] items-center justify-center mx-1" aria-hidden="true"><img src="{{ $dir }}/chevron.svg" alt="" class="block w-[7px] h-[13px]" /></span>
        <span class="font-medium text-[21px] text-[#204a7a]" aria-current="page">{{ $title }}</span>
      </nav>
      <a id="pk-back" href="{{ route('home') }}#assessments" class="lg:hidden flex size-[32px] items-center justify-center rounded-full bg-[#e9edf2] text-brand-primary" aria-label="الرجوع للرئيسية">
        <i class="fa-solid fa-arrow-right text-[14px]" aria-hidden="true"></i>
      </a>

      <div id="pk-top" class="flex flex-col gap-8 lg:gap-[64px] scroll-mt-[90px]">
        {{-- ===== الخطوات K1 ← K7 ===== --}}
        <ol class="relative mx-auto flex w-full items-start justify-center gap-[22px] md:max-w-[1022px] md:justify-between md:gap-0" aria-label="{{ cms('keys_test.steps_label', 'مفاتيح الاختبار') }}">
          <li class="absolute inset-x-[13px] top-[13px] md:inset-x-[40px] md:top-[26px] h-px md:h-[2px] bg-[#dedede]" aria-hidden="true">
            <span id="pk-bar" class="absolute inset-y-0 right-0 bg-[#204a7a] transition-[width] duration-300" style="width: 0%"></span>
          </li>
          @foreach ($keys as $i => $key)
            <li data-pk-step="{{ $i }}" class="relative flex w-[26px] md:w-[80px] flex-col items-center gap-[6px] md:gap-[8px]">
              <span data-pk-step-icon data-state="off">
                <span data-icon-off>@include('landing.partials.keys-icon', ['code' => $key['code'], 'on' => false, 'circle' => 'size-[26px] md:size-[54px]', 'glyph' => 'size-[13px] md:size-[28px]'])</span>
                <span data-icon-on hidden>@include('landing.partials.keys-icon', ['code' => $key['code'], 'on' => true, 'circle' => 'size-[26px] md:size-[54px]', 'glyph' => 'size-[13px] md:size-[28px]'])</span>
              </span>
              <span data-pk-step-label class="flex flex-col items-center text-center text-[8px] md:text-[14px] leading-[1.5] md:leading-[normal] text-[#565656] md:text-[#6f6f6f] font-semibold">
                <span>{{ $key['code'] }}</span>
                <span class="whitespace-nowrap font-medium md:font-semibold">{{ $key['name'] }}</span>
              </span>
            </li>
          @endforeach
        </ol>

        {{-- ===== مفتاح واحد في كل خطوة ===== --}}
        @foreach ($keys as $i => $key)
          <section data-pk-key="{{ $i }}" aria-labelledby="pk-title-{{ $i }}" class="{{ $i > 0 ? 'hidden ' : '' }}flex flex-col gap-8 lg:gap-[48px]">
            <div class="flex flex-col gap-5 lg:gap-[40px]">
              <div class="flex flex-col gap-3 lg:gap-[28px]">
                <div class="flex flex-col gap-2 lg:gap-[20px]">
                  <p class="font-semibold text-[12px] lg:text-[21px] leading-[1.5] text-[#cfa63d]">{{ str_replace([':n', ':total'], [$key['number'], $keysCount], cms('keys_test.key_of', 'المفتاح K:n من K:total')) }}</p>
                  <h1 id="pk-title-{{ $i }}" class="flex items-center gap-[9px] lg:gap-[15px] font-semibold text-[17px] lg:text-[25px] leading-[1.5] text-[#204a7a]">
                    @include('landing.partials.keys-icon', ['code' => $key['code'], 'on' => true, 'circle' => 'size-[22px] lg:size-[54px]', 'glyph' => 'size-[13px] lg:size-[28px]'])
                    <span>مفتاح {{ $key['name'] }} ({{ $key['tagline'] }})</span>
                  </h1>
                </div>
                <p class="font-medium lg:font-normal text-[13px] lg:text-[21px] leading-normal lg:leading-[1.5] text-[#565656]">{{ $key['description'] }}</p>
              </div>

              @if ($i === 0)
                {{-- التذكير ودليل الدرجات: في أول شاشة بس (زي اختبار عجلة الحياة) --}}
                <div data-pk-intro class="flex flex-col gap-5 lg:gap-[40px]">
                  {{-- تذكّر --}}
                  <div class="flex items-start gap-3 rounded-[16px] border border-[#ce9d42] bg-[#fffaf8] p-4">
                    <span class="flex size-[36px] lg:size-[50px] shrink-0 items-center justify-center rounded-[12px] bg-[#fef9ec]" aria-hidden="true"><img src="{{ $dir }}/bulb.svg" alt="" class="block size-[18px] lg:size-[24px]" /></span>
                    <div class="flex flex-col lg:gap-[2px]">
                      <p class="font-bold lg:font-semibold text-[14px] lg:text-[17px] leading-normal lg:leading-[1.5] text-[#262626]">{{ cms('keys_test.remember.title', 'تذكّر') }}</p>
                      <p class="font-medium text-[12px] lg:text-[17px] leading-normal text-[#565656]">{{ cms('keys_test.remember.text', 'اختر الإجابة الأقرب إليك لا توجد إجابة صحيحة أو خاطئة.') }}</p>
                    </div>
                  </div>

                  {{-- دليل الدرجات --}}
                  <div class="flex items-center justify-between rounded-[16px] bg-white px-3 sm:px-8 lg:px-[60px] py-[27px] lg:py-[31px]" role="group" aria-label="{{ cms('keys_test.scale.label', 'دليل الإجابات') }}">
                    @foreach (array_reverse($scale, true) as $value => $s)
                      @unless ($loop->first)<span class="h-[38px] lg:h-[66px] w-px bg-[#e9e9e9]" aria-hidden="true"></span>@endunless
                      <span class="flex flex-1 flex-col items-center gap-[6px] lg:gap-[8px]">
                        <span class="flex size-[30px] lg:size-[50px] items-center justify-center rounded-full font-cairo lg:font-messiri font-bold text-[14px] lg:text-[17px]" style="background: {{ $s['bg'] }}; color: {{ $value === 1 ? '#e24949' : $s['color'] }}">{{ $value }}</span>
                        <span class="font-normal lg:font-semibold text-[12px] lg:text-[14px] leading-normal lg:leading-[1.5] text-[#262626] text-center">{{ $s['label'] }}</span>
                      </span>
                    @endforeach
                  </div>
                </div>
              @endif

              {{-- التقدّم في المفتاح --}}
              <div class="flex items-center gap-1 lg:gap-px px-0 lg:px-6" data-pk-progress>
                <div class="h-2 lg:h-3 flex-1 overflow-hidden rounded-full bg-[#e5e7eb]" role="progressbar" aria-valuemin="0" aria-valuemax="{{ count($key['questions']) }}" aria-valuenow="0" aria-label="{{ cms('keys_test.progress_label', 'تقدّمك في هذا المفتاح') }}">
                  <div data-pk-fill class="h-full rounded-full bg-[#2b5788] transition-[width] duration-300" style="width: 0%"></div>
                </div>
                <span dir="ltr" data-pk-count class="min-w-[36px] text-end lg:text-start font-cairo lg:font-messiri font-bold lg:font-semibold text-[12px] lg:text-[17px] leading-[16px] lg:leading-[1.5] text-[#2b5788]">0/{{ count($key['questions']) }}</span>
              </div>
            </div>

            {{-- العبارات --}}
            <div class="rounded-[16px] bg-white px-5 sm:px-[30px] lg:px-[33px] py-[14px] lg:py-[18px]">
              <ol class="m-0 list-none p-0">
                @foreach ($key['questions'] as $q)
                  <li data-pk-question class="flex flex-col items-center gap-[18px] md:flex-row md:justify-between md:gap-8 py-[17px] lg:py-[30px] border-b border-[#ececec] last:border-b-0">
                    <p id="pk-q-{{ $q['id'] }}" class="flex w-full items-start gap-1 md:gap-[6px] md:w-auto md:flex-1 font-normal text-[14px] lg:text-[21px] leading-[1.5] text-[#262626]">
                      <span class="shrink-0 font-semibold text-[17px] lg:text-[25px] text-[#204a7a]">{{ $q['number'] }}.</span>
                      <span>{{ $q['text'] }}</span>
                    </p>
                    <div role="radiogroup" aria-labelledby="pk-q-{{ $q['id'] }}" class="flex shrink-0 items-center gap-[24px] max-[374px]:gap-[12px] sm:gap-[26px]">
                      {{-- الدوم بترتيب 0 ← 4 (في RTL الصفر على اليمين، فيظهر 4 3 2 1 0 من الشمال زي Figma) --}}
                      @foreach (array_reverse($scale, true) as $value => $s)
                        @php $option = $q['options'][4 - $value] ?? null; @endphp
                        @continue(! $option)
                        <label class="relative cursor-pointer" style="--bg: {{ $s['bg'] }}; --c: {{ $s['color'] }}">
                          <input type="radio" name="q{{ $q['id'] }}" value="{{ $option }}" data-pk-choice aria-label="{{ $s['label'] }} ({{ $value }})" class="peer sr-only" />
                          <span aria-hidden="true" class="flex size-[40px] max-[374px]:size-[34px] md:size-[44px] lg:size-[50px] items-center justify-center rounded-full border-2 border-solid border-[var(--bg)] bg-transparent font-messiri font-bold text-[14px] lg:text-[17px] text-[color:var(--c)] transition-colors duration-150 hover:bg-[var(--bg)] peer-checked:border-[var(--c)] peer-checked:bg-[var(--c)] peer-checked:text-white peer-focus-visible:ring-2 peer-focus-visible:ring-[var(--c)] peer-focus-visible:ring-offset-2">{{ $value }}</span>
                        </label>
                      @endforeach
                    </div>
                  </li>
                @endforeach
              </ol>
            </div>
          </section>
        @endforeach

        {{-- ===== التنقل بين المفاتيح ===== --}}
        <div class="flex items-center justify-between">
          <button type="button" id="pk-prev" class="hidden flex h-[45px] lg:h-[60px] w-[151px] lg:w-[255px] items-center justify-center gap-2 rounded-[10px] lg:rounded-[15px] border border-[#204a7a] px-6 py-3 font-semibold text-[17px] lg:text-[21px] text-[#204a7a] transition-colors hover:bg-[#204a7a] hover:text-white cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2 group">
            <img src="{{ $dir }}/arrow-prev.svg" alt="" aria-hidden="true" class="block size-[16px] lg:size-[24px] rotate-180 group-hover:[filter:brightness(0)_invert(1)]" />
            <span>{{ cms('keys_test.buttons.prev', 'المفتاح السابق') }}</span>
          </button>
          <button type="button" id="pk-next" disabled class="ms-auto flex h-[45px] lg:h-[60px] w-[151px] lg:w-[255px] items-center justify-center gap-2 rounded-[10px] lg:rounded-[15px] bg-[#204a7a] px-6 py-3 font-semibold text-[17px] lg:text-[21px] text-[#f6f6f6] transition-colors enabled:hover:bg-[#102744] enabled:cursor-pointer disabled:bg-[#204a7a]/50 disabled:text-[#f6f6f6]/70 disabled:cursor-not-allowed focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2 group">
            <span id="pk-next-label">{{ cms('keys_test.buttons.next', 'المفتاح التالي') }}</span>
            <img src="{{ $dir }}/arrow-next.svg" alt="" aria-hidden="true" class="block size-[16px] lg:size-[24px] group-enabled:[filter:brightness(0)_invert(1)]" />
          </button>
        </div>
        <p id="pk-error" role="alert" class="hidden text-center text-[14px] font-medium text-[#e24949]"></p>
      </div>
    </div>
  </main>

  @include('landing.partials.footer')
</body>
</html>
