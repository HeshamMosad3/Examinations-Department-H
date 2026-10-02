<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>تفاصيل الجوانب | دار الرؤى للتدريب</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="description" content="تفاصيل جوانب عجلة الحياة الثمانية ونسبة كل جانب في نتيجة تقييمك من دار الرؤى للتدريب." />
  <meta name="robots" content="noindex, follow" />
  <meta name="theme-color" content="#204A7A" />

  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/lifeWheelDetails.js']) }}
</head>
{{--
  Figma: "تفاصيل الجوانب" (file n7hAGUkz558sP500I0m375, node 3083:12404), desktop frame 1440px.
  - From the xl breakpoint (>=1280px) the navbar, content and footer reproduce the Figma frame 1:1
    (Figma structure/classes are LTR-based, so those blocks are wrapped in dir="ltr" with dir="auto" text, as exported).
  - Below xl the site's shared responsive navbar/footer are used and the cards stack.
--}}
@php
  $d = '/landing/images/details';
  $icons = '/landing/icons/aspects';
  $profileUrl = auth()->check() ? route('dashboard.assessments') : route('login');
@endphp
<body class="bg-[#F6F6F6] text-[#1D1D1D] min-h-screen font-messiri antialiased selection:bg-brand-primary selection:text-white flex flex-col xl:pt-0">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">
    تخطي إلى المحتوى الرئيسي
  </a>

  {{-- ===== Navbar: shared responsive navbar below xl ===== --}}
  <div class="contents xl:hidden">
    @include('landing.partials.navbar')
  </div>

  {{-- ===== Navbar: Figma 3083:12407 (xl and up) ===== --}}
  <header dir="ltr" class="hidden xl:block w-full pt-[20px]">
    <div class="bg-[rgba(255,255,255,0.66)] h-[100px] overflow-clip relative rounded-[48px] w-[1242px] mx-auto">
      <div class="-translate-x-1/2 -translate-y-1/2 absolute flex gap-[83px] items-center justify-center left-1/2 px-[2px] top-[calc(50%-0.5px)] w-[1200px]">
        <a href="{{ $profileUrl }}" aria-label="حسابي" class="relative shrink-0 size-[65px] block">
          <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/user-circle.svg" />
        </a>
        <nav aria-label="القائمة الرئيسية" class="flex gap-[32px] items-center justify-center relative shrink-0 w-[752px]">
          <a href="/#contact" class="h-[38px] relative shrink-0 w-[100px]">
            <p class="-translate-x-1/2 [word-break:break-word] absolute font-messiri font-medium leading-[normal] left-[50px] text-[#1d1d1d] text-[21px] text-center top-0 whitespace-nowrap" dir="auto">تواصل معنا</p>
          </a>
          <a href="/#about" class="h-[38px] relative shrink-0 w-[105px]">
            <p class="-translate-x-1/2 [word-break:break-word] absolute font-messiri font-medium leading-[normal] left-[52.5px] text-[#1d1d1d] text-[21px] text-center top-0 whitespace-nowrap" dir="auto">عن دار الرؤى</p>
          </a>
          <a href="/#assessments" class="h-[38px] relative shrink-0 w-[84px]">
            <p class="-translate-x-1/2 [word-break:break-word] absolute font-messiri font-medium leading-[normal] left-[42px] text-[#1d1d1d] text-[21px] text-center top-0 whitespace-nowrap" dir="auto">المقاييس</p>
          </a>
          <a href="/#certifications" class="h-[38px] relative shrink-0 w-[168px]">
            <p class="-translate-x-1/2 [word-break:break-word] absolute font-messiri font-medium leading-[normal] left-[84px] text-[#1d1d1d] text-[21px] text-center top-0 whitespace-nowrap" dir="auto">الشهادات الاحترافية</p>
          </a>
          <a href="/#courses" class="h-[38px] relative shrink-0 w-[61px]">
            <p class="-translate-x-1/2 [word-break:break-word] absolute font-messiri font-medium leading-[normal] left-[30.5px] text-[#1d1d1d] text-[21px] text-center top-0 whitespace-nowrap" dir="auto">الدورات</p>
          </a>
          <a href="/" aria-current="page" class="h-[38px] relative shrink-0 w-[74px]">
            <p class="-translate-x-1/2 [word-break:break-word] absolute font-messiri font-bold leading-[normal] left-[37px] text-[#204a7a] text-[21px] text-center top-0 whitespace-nowrap" dir="auto">الرئيسية</p>
            <span class="absolute h-0 left-0 top-[38px] w-[74px]" aria-hidden="true">
              <span class="absolute inset-[-2.5px_0_0_0]"><img alt="" class="block max-w-none size-full" src="{{ $d }}/nav-underline.svg" /></span>
            </span>
          </a>
        </nav>
        <a href="/" aria-label="الصفحة الرئيسية لدار الرؤى" class="h-[79px] relative shrink-0 w-[86px] block">
          <span class="absolute inset-0 overflow-hidden pointer-events-none">
            <img alt="شعار دار الرؤى للتدريب" class="absolute h-[124.73%] left-[-14.4%] max-w-none top-[-12.77%] w-[127.45%]" src="{{ $d }}/nav-logo.png" />
          </span>
        </a>
      </div>
    </div>
  </header>

  <main id="main-content" data-save-url="{{ route('life-wheel.results.store') }}" data-user-id="{{ auth()->id() }}" class="w-full max-w-[1242px] mx-auto px-4 sm:px-6 xl:px-0 pt-6 sm:pt-8 xl:pt-[48px] pb-16 xl:pb-[128px] flex-1">
    <h1 class="sr-only">تفاصيل جوانب عجلة الحياة</h1>

    <!-- Mobile header: back button + title -->
    <div class="md:hidden relative h-[32px] flex items-center justify-center mb-5 font-messiri">
      <a href="{{ route('life-wheel.result') }}" class="absolute right-0 top-0 size-[32px] p-[8px] rounded-full bg-[#e9edf2] flex items-center justify-center text-brand-primary hover:bg-[#d8e0ea] transition-colors shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary" aria-label="العودة لنتيجة التقييم">
        <i class="fa-solid fa-arrow-right text-[14px]" aria-hidden="true"></i>
      </a>
      <h1 class="text-[19px] font-bold text-[#204a7a] leading-[28px] tracking-[-0.5px] text-center">تفاصيل الجوانب</h1>
    </div>

    {{-- Breadcrumb: Figma 3083:12433 (items 160/135/168/73 = pl 4 + link + gap 4 + 18px arrow; links have fixed widths, text right-aligned) --}}
    <nav dir="ltr" aria-label="مسار التنقل" class="hidden md:flex items-center justify-end h-[32px] mb-8 xl:mb-[64px]">
      <div class="flex items-center justify-end gap-[4px] pl-[4px] shrink-0">
        <p class="relative top-px w-[134px] font-messiri font-normal leading-[1.5] text-[#204a7a] text-[15px] md:text-[21px] text-right whitespace-nowrap" dir="auto" aria-current="page">تفاصيل الجوانب</p>
        <div class="relative shrink-0 size-[18px]" aria-hidden="true">
          <div class="absolute inset-[21.88%_24.45%_4.01%_34.38%]"><img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/breadcrumb-arrow-active.svg" /></div>
        </div>
      </div>
      <div class="flex items-center justify-end gap-[4px] pl-[4px] shrink-0">
        <a href="{{ route('life-wheel.result') }}" class="relative top-px block w-[109px] font-messiri font-normal leading-[1.5] text-[#6f6f6f] text-[15px] md:text-[21px] text-right whitespace-nowrap" dir="auto">نتيجة التقييم</a>
        <div class="relative shrink-0 size-[18px]" aria-hidden="true">
          <div class="absolute inset-[21.88%_24.45%_4.01%_34.38%]"><img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/breadcrumb-arrow.svg" /></div>
        </div>
      </div>
      <div class="flex items-center justify-end gap-[4px] pl-[4px] shrink-0">
        <a href="{{ route('life-wheel.assessment') }}" class="relative top-px block w-[142px] font-messiri font-normal leading-[1.5] text-[#6f6f6f] text-[15px] md:text-[21px] text-right whitespace-nowrap" dir="auto">اختبار عجلة الحياة</a>
        <div class="relative shrink-0 size-[18px]" aria-hidden="true">
          <div class="absolute inset-[21.88%_24.45%_4.01%_34.38%]"><img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/breadcrumb-arrow.svg" /></div>
        </div>
      </div>
      <div class="block pl-[4px] shrink-0">
        <a href="/" class="relative top-px block w-[69px] font-messiri font-normal leading-[1.5] text-[#6f6f6f] text-[15px] md:text-[21px] text-right whitespace-nowrap" dir="auto">الرئيسية</a>
      </div>
    </nav>

    {{-- Aspect cards: Figma 3083:12460 -- three independent columns (RTL: right column first) so an expanded card only pushes the cards below it
         in its own column. Below xl the column wrappers disappear (display: contents) and the cards follow `order-N` in a 1/2-column grid. --}}
    @unless ($hasResult)
      {{-- No saved result yet for this user --}}
      <div dir="rtl" class="flex flex-col items-center gap-6 text-center bg-white rounded-[17px] border border-[#DDE4ED] drop-shadow-[0px_4px_3.1px_rgba(0,0,0,0.18)] px-6 py-14 max-w-[620px] mx-auto">
        <p class="font-messiri font-bold text-[#204a7a] text-[24px]">لا توجد نتيجة محفوظة بعد</p>
        <p class="font-messiri font-medium text-[#565656] text-[16px] leading-[1.6]">أكمل اختبار عجلة الحياة وسنعرض لك هنا تفاصيل كل جانب ونسبته في نتيجتك.</p>
        <a href="{{ route('life-wheel.assessment') }}" class="bg-[#204a7a] text-[#f6f6f6] font-messiri font-semibold text-[21px] rounded-[15px] h-[60px] px-8 inline-flex items-center justify-center">ابدأ الاختبار</a>
      </div>
    @else
    <section aria-label="جوانب عجلة الحياة" dir="rtl" class="grid grid-cols-1 md:grid-cols-2 gap-x-[19px] gap-y-[32px] items-start xl:flex xl:flex-row xl:gap-[19px]">
      @foreach ([['xl:w-[401px]', ['spiritual', 'family', 'financial']], ['xl:w-[402px]', ['health', 'social', 'leisure']], ['xl:w-[401px]', ['personal', 'career']]] as [$colWidth, $keys])
        <div class="contents xl:flex xl:flex-col xl:gap-[32px] xl:items-start xl:shrink-0 {{ $colWidth }}">
          @foreach ($keys as $key)
            @include('landing.partials.aspect-card', ['a' => $aspects[$key], 'd' => $d, 'icons' => $icons])
          @endforeach
        </div>
      @endforeach
    </section>
    @endunless

    @if ($hasResult)
    {{-- Buttons: Figma 3083:12472 --}}
    <div dir="ltr" class="flex flex-col sm:flex-row gap-[20px] items-center justify-center mt-12 xl:mt-[128px]">
      <a href="{{ route('life-wheel.assessment') }}" class="bg-[#204a7a] cursor-pointer flex gap-[8px] h-[60px] items-center justify-center px-[24px] py-[12px] relative rounded-[15px] shrink-0 w-full max-w-[312px] sm:w-[312px]">
        <span class="flex items-center relative shrink-0 w-[116px]">
          <span class="[word-break:break-word] block w-full relative top-px font-messiri font-semibold leading-[1.5] shrink-0 text-[#f6f6f6] text-[21px] text-left whitespace-nowrap" dir="auto">اعاده التقييم</span>
        </span>
        <span class="relative shrink-0 size-[24px]" aria-hidden="true">
          <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/restart-icon.svg" />
        </span>
      </a>
      <button type="button" class="border border-[#204a7a] border-solid cursor-pointer flex h-[60px] items-center justify-center px-[24px] py-[12px] relative rounded-[15px] shrink-0 w-full max-w-[312px] sm:w-[312px]">
        <span class="flex gap-[8px] items-center relative shrink-0">
          <span class="flex items-center relative shrink-0">
            <span class="[word-break:break-word] font-messiri font-semibold leading-[1.5] relative top-px shrink-0 text-[#204a7a] text-[21px] whitespace-nowrap" dir="auto">تحميل التقرير</span>
          </span>
          <span class="h-[20px] relative shrink-0 w-[22px]" aria-hidden="true">
            <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/download-icon.svg" />
          </span>
        </span>
      </button>
    </div>
    @endif
  </main>

  {{-- ===== Footer: shared responsive footer below xl ===== --}}
  <div class="contents xl:hidden">
    @include('landing.partials.footer')
  </div>

  {{-- ===== Footer: Figma 3083:12479 (xl and up) ===== --}}
  <footer dir="ltr" role="contentinfo" class="hidden xl:block bg-[#1a3b62] h-[433px] overflow-clip relative shrink-0 w-full">
    <div class="relative mx-auto h-full w-[1440px]">
      <div class="[word-break:break-word] absolute flex items-center justify-between left-[99px] text-[#f6f6f6] text-[14px] text-right top-[379px] w-[1238px]">
        <div class="flex font-messiri font-normal gap-[27px] items-center leading-[1.5] relative shrink-0 whitespace-nowrap">
          <a class="relative shrink-0" href="#" dir="auto">الشروط والأحكام</a>
          <a class="relative shrink-0" href="#" dir="auto">سياسة الخصوصية</a>
        </div>
        <div class="font-messiri font-medium h-[26px] leading-[0] relative shrink-0 w-[332px]">
          <p class="leading-[normal] mb-0" dir="auto">جميع الحقوق محفوظة لـ مركز دار الرؤى للتدريب © 2026</p>
        </div>
      </div>
      <div class="absolute flex h-0 items-center justify-center left-[93px] top-[336px] w-[1238px]" aria-hidden="true">
        <div class="flex-none rotate-180">
          <div class="h-0 relative w-[1238px]">
            <div class="absolute inset-[-0.2px_0_0_0]"><img alt="" class="block max-w-none size-full" src="{{ $d }}/footer-divider.svg" /></div>
          </div>
        </div>
      </div>

      <div class="absolute flex items-start justify-between left-[104px] top-[47px] w-[1236px]">
        <div class="flex items-start justify-between relative shrink-0 w-[898px]">
          {{-- تواصل معنا --}}
          <div class="flex flex-col gap-[25px] items-end relative shrink-0 w-[270px]">
            <div class="grid-cols-[max-content] grid-rows-[max-content] inline-grid leading-[0] place-items-start relative shrink-0">
              <div class="[grid-area:1/1] grid-cols-[max-content] grid-rows-[max-content] inline-grid ml-0 mt-[15.76px] place-items-start relative" aria-hidden="true">
                <div class="[grid-area:1/1] h-[6.481px] ml-0 mt-0 relative w-[59.406px]">
                  <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/footer-title-contact.svg" />
                </div>
              </div>
              <h3 class="[word-break:break-word] [grid-area:1/1] font-messiri font-semibold leading-[1.5] top-px ml-[50.17px] mt-0 relative text-[21px] text-right text-white w-[117.833px]" dir="auto">تواصل معنا</h3>
            </div>
            <div class="flex flex-col gap-[18px] items-end relative shrink-0 w-[270px]">
              <div class="flex gap-[14px] items-start relative shrink-0 w-full h-[26px]">
                <p class="[word-break:break-word] font-messiri font-normal leading-[1.5] relative top-px shrink-0 text-[#ddd] text-[17px] text-right whitespace-nowrap" dir="auto">الرياض - المملكة العربية السعودية</p>
                <div class="overflow-clip relative shrink-0 size-[24px]" aria-hidden="true">
                  <div class="absolute inset-[8.33%_16.67%]"><div class="absolute inset-[-5%_-6.25%]"><img alt="" class="block max-w-none size-full" src="{{ $d }}/footer-icon-location.svg" /></div></div>
                </div>
              </div>
              <div class="flex gap-[14px] items-start justify-center relative shrink-0 w-[168px] h-[26px]">
                <a href="tel:+966557595769" class="[word-break:break-word] font-messiri font-normal leading-[1.5] relative top-px shrink-0 text-[#ddd] text-[17px] whitespace-nowrap">+966 55 759 5769</a>
                <div class="h-[25px] overflow-clip relative shrink-0 w-[26px]" aria-hidden="true">
                  <div class="absolute left-[4px] size-[24px] top-px"><img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/footer-icon-phone.svg" /></div>
                </div>
              </div>
              <div class="flex gap-[14px] items-center relative shrink-0 w-[159px] h-[26px]">
                <a href="mailto:info@alruaa.com" class="[word-break:break-word] font-messiri font-normal leading-[1.5] relative top-px shrink-0 text-[#ddd] text-[17px] whitespace-nowrap">info@alruaa.com</a>
                <div class="relative shrink-0 size-[24px]" aria-hidden="true">
                  <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/footer-icon-email.svg" />
                </div>
              </div>
              <div class="flex gap-[14px] items-center relative shrink-0 w-[207px] h-[26px]">
                <div class="flex flex-col items-start relative shrink-0">
                  <p class="[word-break:break-word] font-messiri font-normal leading-[1.5] relative top-px shrink-0 text-[#ddd] text-[17px] whitespace-nowrap" dir="auto">الأحد–الخميس: 9ص–6م</p>
                </div>
                <div class="overflow-clip relative shrink-0 size-[24px]" aria-hidden="true">
                  <div class="absolute inset-[8.33%]"><div class="absolute inset-[-5%]"><img alt="" class="block max-w-none size-full" src="{{ $d }}/footer-icon-clock.svg" /></div></div>
                </div>
              </div>
            </div>
          </div>

          {{-- روابط سريعة --}}
          <div class="flex flex-col gap-[25px] items-end relative shrink-0 w-[175px]">
            <div class="grid-cols-[max-content] grid-rows-[max-content] inline-grid leading-[0] place-items-start relative shrink-0">
              <div class="[grid-area:1/1] h-[6.524px] ml-0 mt-[15.74px] relative w-[57.633px]" aria-hidden="true">
                <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/footer-title-links.svg" />
              </div>
              <h3 class="[word-break:break-word] [grid-area:1/1] font-messiri font-semibold leading-[1.5] top-px ml-[42.57px] mt-0 relative text-[21px] text-right text-white w-[132.432px]" dir="auto">روابط سريعة</h3>
            </div>
            <ul class="flex flex-col gap-[18px] items-start relative shrink-0 w-[108px]">
              @foreach ([['الرئيسية', '/'], ['الدورات', '/#courses'], ['الشهادات', '/#certifications'], ['المقاييس', '/#assessments'], ['عن دار الرؤى', '/#about']] as [$label, $href])
                <li class="h-[21px] relative shrink-0 w-full">
                  <a href="{{ $href }}" class="[word-break:break-word] absolute font-messiri font-normal inset-[1px_0_-23.81%_0] leading-[1.5] text-[#ddd] text-[17px] text-right" dir="auto">{{ $label }}</a>
                </li>
              @endforeach
            </ul>
          </div>

          {{-- خدماتنا --}}
          <div class="flex flex-col gap-[25px] items-start relative shrink-0 w-[131px]">
            <div class="grid-cols-[max-content] grid-rows-[max-content] inline-grid leading-[0] place-items-start relative shrink-0">
              <div class="[grid-area:1/1] flex h-0 items-center justify-center ml-0 mt-[18px] relative w-[61.215px]" aria-hidden="true">
                <div class="flex-none rotate-180">
                  <div class="h-0 relative w-[61.215px]">
                    <div class="absolute inset-[-2px_0_0_0]"><img alt="" class="block max-w-none size-full" src="{{ $d }}/footer-title-services-line.svg" /></div>
                  </div>
                </div>
              </div>
              <div class="[grid-area:1/1] ml-[0.43px] mt-[15.68px] relative size-[6.639px]" aria-hidden="true">
                <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/footer-title-services-dot.svg" />
              </div>
              <h3 class="[word-break:break-word] [grid-area:1/1] font-messiri font-semibold leading-[1.5] top-px ml-[53.87px] mt-0 relative text-[21px] text-right text-white w-[77.131px]" dir="auto">خدماتنا</h3>
            </div>
            <ul class="[word-break:break-word] flex flex-col font-messiri font-normal gap-[18px] items-end leading-[1.5] relative shrink-0 text-[#ddd] text-[17px] text-right w-full whitespace-nowrap">
              @foreach (['التدريب الفردي', 'التدريب المؤسسي', 'التعلم الإلكتروني', 'الشهادات الدولية', 'المقاييس والتقييم'] as $service)
                <li class="relative top-px shrink-0 h-[26px]" dir="auto">{{ $service }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        {{-- Logo + description + social --}}
        <div class="flex flex-col gap-[28px] items-end relative shrink-0 w-[247px]">
          <div class="flex flex-col gap-[21px] items-end relative shrink-0 w-full">
            <div class="h-[82px] relative shrink-0 w-[81px]">
              <img alt="شعار دار الرؤى للتدريب" class="absolute inset-0 max-w-none object-bottom pointer-events-none size-full" src="{{ $d }}/footer-logo.png" />
            </div>
            <div class="[word-break:break-word] font-cairo font-medium h-[49px] leading-[0] min-w-full not-italic relative shrink-0 text-[#fefefe] text-[0px] text-right w-[min-content] whitespace-pre-wrap">
              <p class="font-messiri leading-[normal] mb-0 text-[14px]" dir="auto">مع دار الرؤى للتدريب... نصنع مستقبلك بخبرات علمية ومهارات عملية.</p>
            </div>
          </div>
          <div class="flex gap-[14px] items-center relative shrink-0">
            <a href="#" aria-label="قناة دار الرؤى للتدريب على يوتيوب" rel="noopener noreferrer" class="border border-[#ddd] border-solid flex flex-col items-center justify-center px-[7px] py-[9px] relative rounded-[5px] shrink-0 size-[31px]">
              <span class="relative shrink-0 size-[20px]"><img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/social-youtube.svg" /></span>
            </a>
            <a href="#" aria-label="حساب دار الرؤى للتدريب على إنستغرام" rel="noopener noreferrer" class="border border-[#ddd] border-solid flex flex-col items-center justify-center px-[7px] py-[9px] relative rounded-[5px] shrink-0 size-[31px]">
              <span class="relative shrink-0 size-[20px]"><img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/social-instagram.svg" /></span>
            </a>
            <a href="#" aria-label="حساب دار الرؤى للتدريب على منصة إكس" rel="noopener noreferrer" class="relative shrink-0 size-[31px]">
              <img alt="" class="absolute block inset-0 max-w-none size-full" src="{{ $d }}/social-twitter.svg" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  @include('landing.partials.login-modal')
</body>
</html>
