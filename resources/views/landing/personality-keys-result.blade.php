<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('keys_result.seo.title', 'نتيجة مفاتيح الشخصية السبعة | دار الرؤى للتدريب') }}</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/notFound.js']) }}
</head>
<body class="bg-brand-bg text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">تخطي إلى المحتوى</a>

  @include('landing.partials.navbar')

  <main id="main-content" class="w-full max-w-[1240px] mx-auto px-4 lg:px-0 pt-4 lg:pt-[48px] pb-[64px] lg:pb-[128px] font-messiri">
    <header class="mb-8 lg:mb-[48px] flex flex-col gap-2 lg:gap-3">
      <p class="font-semibold text-[12px] lg:text-[21px] text-[#cfa63d]">{{ cms('keys_result.eyebrow', 'تم حفظ نتيجتك') }}</p>
      <h1 class="font-semibold text-[21px] lg:text-[32px] text-[#204a7a]">{{ cms('keys_result.title', 'ملفك الشخصي في المفاتيح السبعة') }}</h1>
      <p class="font-medium lg:font-normal text-[13px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[760px]">{{ cms('keys_result.text', 'لا يصنّفك المقياس في «نوع» واحد، بل يرسم حضور كل مفتاح من المفاتيح السبعة لديك.') }}</p>
    </header>

    @unless ($profileComplete)
      <div data-profile-gate class="mb-6 lg:mb-8 flex flex-col gap-4 rounded-[16px] border border-[#acc7e6] bg-[#eef4fb] p-5 lg:flex-row lg:items-center lg:justify-between lg:p-6">
        <div class="flex items-start gap-3">
          <span class="flex size-[40px] shrink-0 items-center justify-center rounded-[12px] bg-[#204a7a] text-white" aria-hidden="true"><i class="fa-solid fa-lock text-[16px]"></i></span>
          <div>
            <h2 class="font-semibold text-[16px] lg:text-[19px] text-[#204a7a]">{{ cms('keys_result.gate.title', 'أكمل ملفك الشخصي لعرض التقرير التفصيلي') }}</h2>
            <p class="mt-1 font-medium lg:font-normal text-[13px] lg:text-[16px] leading-[1.7] text-[#565656]">{{ cms('keys_result.gate.text', 'درجاتك ظاهرة أمامك، ومستوى كل مفتاح وتفسيره يظهر بعد اكتمال بياناتك.') }}</p>
          </div>
        </div>
        <a href="{{ route('profile.edit', ['next' => '/personality-keys-result.html']) }}" data-profile-gate-link class="flex h-[45px] shrink-0 items-center justify-center rounded-[10px] bg-[#204a7a] px-6 font-semibold text-[15px] lg:text-[17px] text-white hover:bg-[#102744] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">{{ cms('keys_result.gate.button', 'إكمال الملف الشخصي') }}</a>
      </div>
    @endunless

    <ul class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-6">
      @foreach ($keys as $key)
        <li class="flex flex-col gap-3 rounded-[16px] bg-white p-5 lg:p-6">
          <div class="flex items-center justify-between gap-3">
            <div class="flex flex-col">
              <span class="font-semibold text-[12px] lg:text-[14px] text-[#cfa63d]">{{ $key->code }}</span>
              <h2 class="font-semibold text-[17px] lg:text-[21px] text-[#204a7a]">مفتاح {{ $key->name }} <span class="font-normal text-[#565656]">({{ $key->tagline }})</span></h2>
            </div>
            <span dir="ltr" class="shrink-0 font-bold text-[14px] lg:text-[17px] text-[#2b5788]">{{ $key->score }}/{{ $key->max }}</span>
          </div>
          <div class="h-2 lg:h-3 overflow-hidden rounded-full bg-[#e5e7eb]" role="progressbar" aria-valuemin="0" aria-valuemax="{{ $key->max }}" aria-valuenow="{{ $key->score }}" aria-label="{{ $key->name }}">
            <div class="h-full rounded-full bg-[#2b5788]" style="width: {{ $key->percent }}%"></div>
          </div>
          @if ($profileComplete)
            @if ($key->level)
              <p class="font-semibold text-[15px] lg:text-[17px] text-[#262626]">{{ $key->level }}</p>
            @endif
            @if ($key->summary)
              <p class="font-medium lg:font-normal text-[13px] lg:text-[16px] leading-[1.7] text-[#565656]">{{ $key->summary }}</p>
            @endif
          @endif
        </li>
      @endforeach
    </ul>

    <div class="mt-8 lg:mt-[48px] flex flex-col sm:flex-row items-stretch gap-3 lg:gap-4">
      <a href="{{ route('home') }}" class="flex h-[45px] lg:h-[60px] items-center justify-center rounded-[10px] lg:rounded-[15px] bg-[#204a7a] px-8 font-semibold text-[17px] lg:text-[21px] text-[#f6f6f6] hover:bg-[#102744] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">{{ cms('keys_result.home', 'العودة للرئيسية') }}</a>
      <a href="{{ route('keys.test') }}" class="flex h-[45px] lg:h-[60px] items-center justify-center rounded-[10px] lg:rounded-[15px] border border-[#204a7a] px-8 font-semibold text-[17px] lg:text-[21px] text-[#204a7a] hover:bg-[#204a7a] hover:text-white transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">{{ cms('keys_result.retake', 'إعادة الاختبار') }}</a>
    </div>
  </main>

  @include('landing.partials.footer')
</body>
</html>
