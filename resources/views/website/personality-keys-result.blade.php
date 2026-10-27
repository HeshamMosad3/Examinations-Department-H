@php
  $img = '/assets/website/images/keys-result';
  $detailsUrl = route('keys.details');
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('keys_result.seo.title', 'نتيجة مفاتيح الشخصية السبعة | دار الرؤى للتدريب') }}</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('website.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/personalityKeysResult.js']) }}
</head>
<body class="bg-brand-bg text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">تخطي إلى المحتوى</a>

  @include('website.partials.navbar')

  <!-- Figma: Desktop #3551:8746 / Mobile #3551:9773 (الديسكتوب من 1280 وطالع) -->
  <main id="main-content" class="w-full max-w-[393px] min-[1280px]:max-w-[1240px] mx-auto px-[16px] min-[1280px]:px-0 pt-[16px] min-[1280px]:pt-[48px] pb-[39px] md:pb-[13px] min-[1280px]:pb-[77px] font-messiri">

    <!-- Breadcrumb (ديسكتوب بس) -->
    <nav class="hidden min-[1280px]:flex items-center h-[33px] mb-[64px] text-[21px] leading-[1.5]" aria-label="مسار التنقل">
      @foreach ([[cms('keys_result.page.breadcrumb_home', 'الرئيسية'), route('home')], [cms('keys_result.page.breadcrumb_test', 'اختبار مفاتيح الشخصية السبعة'), route('keys.test')]] as [$label, $href])
        <span class="flex items-center gap-[4px] pr-[4px]">
          <a href="{{ $href }}" class="text-[#6f6f6f] hover:text-brand-primary transition-colors">{{ $label }}</a>
          <i class="fa-solid fa-chevron-left text-[12px] text-[#6f6f6f] mx-[4px]" aria-hidden="true"></i>
        </span>
      @endforeach
      <span class="text-[#204a7a] pr-[4px]">{{ cms('keys_result.page.title', 'نتيجة التقييم') }}</span>
    </nav>

    <h1 class="text-center text-[#204a7a] font-bold min-[1280px]:font-semibold text-[21px] leading-[28px] tracking-[-0.5px] min-[1280px]:tracking-normal min-[1280px]:text-[36px] min-[1280px]:leading-[1.5] min-[1280px]:h-[70px] min-[1280px]:flex min-[1280px]:items-center min-[1280px]:justify-center mb-[32px] min-[1280px]:mb-[64px]">{{ cms('keys_result.page.title', 'نتيجة التقييم') }}</h1>

    @include('website.partials.keys-result-body')

    <!-- زرار عرض تفاصيل التقرير -->
    <div class="mt-[48px] min-[1280px]:mt-[128px] flex justify-center">
      <a href="{{ $detailsUrl }}" class="group w-full min-[1280px]:w-[467px] h-[45px] min-[1280px]:h-[70px] rounded-[10px] min-[1280px]:rounded-[15px] bg-[#204a7a] hover:bg-[#102744] text-[#e9edf2] font-semibold text-[14px] min-[1280px]:text-[25px] leading-[1.5] flex items-center justify-center gap-[8px] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
        <span>{{ cms('keys_result.page.details_button', 'عرض تفاصيل التقرير') }}</span>
        <img src="{{ $img }}/arrow.svg" alt="" class="size-[12px] min-[1280px]:size-[24px] group-hover:-translate-x-1 transition-transform" />
      </a>
    </div>
  </main>

  @include('website.partials.footer')
</body>
</html>
