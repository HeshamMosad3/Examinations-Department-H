@php
    // Life-wheel palette (same colours as the result page); one slice is missing: "something is not here"
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $missing = 5;
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('errors.not_found.seo_title', 'الصفحة غير موجودة | دار الرؤى للتدريب') }}</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/notFound.js']) }}

  <style>
    @keyframes nf-rise { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes nf-ring { to { transform: rotate(360deg); } }
    .nf-rise { animation: nf-rise .6s cubic-bezier(.22, 1, .36, 1) both; }
    .nf-ring { animation: nf-ring 40s linear infinite; transform-origin: 50% 50%; }
    @media (prefers-reduced-motion: reduce) { .nf-rise, .nf-ring { animation: none; } }
  </style>
</head>
<body class="bg-brand-bg text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">تخطي إلى المحتوى</a>

  @include('landing.partials.navbar')

  <main id="main-content" class="relative isolate w-full max-w-[1240px] mx-auto px-4 lg:px-0 py-12 md:py-[72px] lg:py-[96px] font-messiri overflow-x-clip">
    {{-- soft brand glow behind the content --}}
    <div class="absolute inset-0 -z-10 flex items-center justify-center pointer-events-none" aria-hidden="true">
      <div class="hero-glow animate-glow motion-reduce:animate-none w-[320px] h-[320px] md:w-[560px] md:h-[560px]"></div>
    </div>

    <section class="flex flex-col items-center text-center gap-6 md:gap-8 max-w-[560px] mx-auto" aria-labelledby="nf-title">
      <h1 id="nf-title" class="nf-rise flex items-center justify-center gap-[0.04em] font-cairo text-[104px] sm:text-[140px] lg:text-[176px] leading-none font-bold text-[#1B436C] select-none" dir="ltr" aria-label="{{ cms('errors.not_found.aria', 'خطأ 404: الصفحة غير موجودة') }}">
        <span aria-hidden="true">4</span>
        <svg viewBox="0 0 100 100" class="w-[0.82em] h-[0.82em] shrink-0 drop-shadow-sm" role="presentation" aria-hidden="true" focusable="false">
          <g class="nf-ring">
            @foreach ($slices as $i => $color)
              @continue($i === $missing)
              @php
                  [$x1, $y1] = $point($i * 45 + 5);
                  [$x2, $y2] = $point(($i + 1) * 45 - 5);
              @endphp
              <path d="M {{ $x1 }} {{ $y1 }} A 40 40 0 0 1 {{ $x2 }} {{ $y2 }}" fill="none" stroke="{{ $color }}" stroke-width="11" stroke-linecap="round" />
            @endforeach
          </g>
          <circle cx="50" cy="50" r="6" fill="#204A7A" opacity=".85" />
        </svg>
        <span aria-hidden="true">4</span>
      </h1>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <h2 class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.not_found.title', 'عذرًا، الصفحة غير موجودة') }}</h2>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ cms('errors.not_found.text', 'ربما تم نقل الصفحة أو حذفها، أو أن الرابط غير صحيح. يمكنك العودة للرئيسية أو الرجوع للصفحة السابقة.') }}</p>
      </div>

      <div class="nf-rise flex flex-col-reverse sm:flex-row items-stretch justify-center gap-3 sm:gap-4 w-full max-w-[361px] sm:max-w-none" style="animation-delay: .2s">
        <button type="button" data-go-back data-fallback="{{ route('home') }}" class="group sm:min-w-[170px] h-[48px] sm:h-[56px] px-6 rounded-[10px] sm:rounded-[12px] border-2 border-brand-primary text-brand-primary font-semibold text-[15px] sm:text-[17px] flex items-center justify-center gap-2 hover:bg-brand-primary hover:text-white transition-colors duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary focus-visible:ring-offset-2">
          <i class="fa-solid fa-arrow-right text-[13px] group-hover:translate-x-1 motion-reduce:group-hover:translate-x-0 transition-transform duration-200" aria-hidden="true"></i>
          <span>{{ cms('errors.not_found.back_button', 'رجوع') }}</span>
        </button>
        <a href="{{ route('home') }}" class="group sm:min-w-[200px] h-[48px] sm:h-[56px] px-6 rounded-[10px] sm:rounded-[12px] bg-brand-primary border-2 border-brand-primary text-white font-semibold text-[15px] sm:text-[17px] flex items-center justify-center gap-2 shadow-md hover:bg-[#102744] hover:border-[#102744] hover:shadow-xl motion-safe:hover:-translate-y-0.5 transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary focus-visible:ring-offset-2">
          <i class="fa-solid fa-house text-[14px]" aria-hidden="true"></i>
          <span>{{ cms('errors.not_found.home_button', 'العودة للرئيسية') }}</span>
        </a>
      </div>
    </section>
  </main>

  @include('landing.partials.footer')
</body>
</html>
