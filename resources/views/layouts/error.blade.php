<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('seo_title')</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('website.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/notFound.js']) }}

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

  @include('website.partials.navbar')

  <main id="main-content" class="relative isolate w-full max-w-[1240px] mx-auto px-4 lg:px-0 py-12 md:py-[72px] lg:py-[96px] font-messiri overflow-x-clip">
    {{-- soft brand glow behind the content --}}
    <div class="absolute inset-0 -z-10 flex items-center justify-center pointer-events-none" aria-hidden="true">
      <div class="hero-glow animate-glow motion-reduce:animate-none w-[320px] h-[320px] md:w-[560px] md:h-[560px]"></div>
    </div>

    <section class="flex flex-col items-center text-center gap-6 md:gap-8 max-w-[560px] mx-auto" aria-labelledby="nf-title">
      @yield('content')

      {{-- "رجوع" + "العودة للرئيسية" (the back button falls back to home when there is no history) --}}
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

  @include('website.partials.footer')
</body>
</html>
