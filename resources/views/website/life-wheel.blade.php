<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('life_wheel.seo.title', 'ما هي عجلة الحياة؟ | دار الرؤى للتدريب') }}</title>

  <meta name="description" content="{{ cms('life_wheel.seo.description', 'تعرّف على عجلة الحياة: أداة تقيس درجة التوازن بين ثمانية جوانب رئيسية في حياتك، وكيف يعمل التقييم في دار الرؤى للتدريب.') }}" />
  <meta name="robots" content="index, follow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="canonical" href="https://alruaa.com/life-wheel.html" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://alruaa.com/life-wheel.html" />
  <meta property="og:title" content="{{ cms('life_wheel.seo.title', 'ما هي عجلة الحياة؟ | دار الرؤى للتدريب') }}" />
  <meta property="og:description" content="{{ cms('life_wheel.seo.share_description', 'ثمانية جوانب رئيسية تساعدك على رؤية حياتك بشكل متكامل.') }}" />
  <meta property="og:image" content="https://alruaa.com/images/hero_cover.png" />
  <meta property="og:locale" content="ar_SA" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="{{ cms('life_wheel.seo.title', 'ما هي عجلة الحياة؟ | دار الرؤى للتدريب') }}" />
  <meta name="twitter:description" content="{{ cms('life_wheel.seo.share_description', 'ثمانية جوانب رئيسية تساعدك على رؤية حياتك بشكل متكامل.') }}" />
  <meta name="twitter:image" content="https://alruaa.com/images/hero_cover.png" />

  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('website.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/lifeWheelExplore.js']) }}
</head>
<body class="bg-[#F6F6F6] text-brand-dark min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <!-- Skip to Main Content Link -->
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">
    {{ cms('global.a11y.skip_link', 'تخطي إلى المحتوى الرئيسي') }}
  </a>

  @include('website.partials.navbar')


  <!-- ==================== اكتشف عجلة الحياة (Desktop #3615:7582 / Mobile #3615:7963) ==================== -->
  <main id="main-content" class="w-full max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-0 pt-6 lg:pt-[48px] relative font-messiri">

    <!-- Desktop breadcrumb (#3615:7587) -->
    <nav class="hidden lg:flex items-center justify-start gap-1 h-[33px] mb-[64px]" aria-label="مسار التنقل">
      <a href="{{ route('home') }}" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[21px] font-normal leading-[1.5]">{{ cms('life_wheel.breadcrumb.home', 'الرئيسية') }}</a>
      <span class="w-[18px] h-[18px] flex items-center justify-center shrink-0" aria-hidden="true">
        <img src="/assets/website/images/life-wheel-explore/breadcrumb-arrow.svg" alt="" width="7" height="13" />
      </span>
      <span class="text-[#204a7a] text-[21px] font-medium leading-normal" aria-current="page">{{ cms('life_wheel.breadcrumb.current', 'عجلة الحياة') }}</span>
    </nav>

    <div class="flex flex-col gap-[48px] lg:gap-[112px]">

      <!-- ==================== 1. ما هي عجلة الحياة؟ (#3615:7602 / #3615:7977) ==================== -->
      <section aria-label="ما هي عجلة الحياة؟" class="flex flex-col items-center gap-[48px] lg:flex-row lg:justify-between lg:gap-[214px]">

        <!-- Text + CTA + pills -->
        <div class="w-full lg:w-[501px] lg:shrink-0 flex flex-col items-center lg:items-start gap-[32px] lg:gap-[48px]">
          <div class="w-full flex flex-col items-center lg:items-start gap-[24px] text-center lg:text-right">
            <h1 class="text-[21px] lg:text-[36px] font-bold lg:font-semibold text-[#204a7a] leading-[28px] lg:leading-[1.5] tracking-[-0.5px] lg:tracking-normal">{{ cms('life_wheel.intro.title', 'ما هي عجلة الحياة؟') }}</h1>
            <p class="w-full max-w-[329px] lg:max-w-none text-[14px] lg:text-[25px] font-medium text-[#565656] leading-normal">
              {{ cms('life_wheel.intro.line_1', 'أداة تقيس درجة التوازن الذي يحققه الفرد') }}<br class="hidden lg:block" />
              {{ cms('life_wheel.intro.line_2', 'بين الجوانب الرئيسة في حياته، من خلال') }}<br class="hidden lg:block" />
              {{ cms('life_wheel.intro.line_3', 'تقييم ممارساته وعاداته وإدراكه لمدى') }}<br class="hidden lg:block" />
              {{ cms('life_wheel.intro.line_4', 'اهتمامه بكل جانب.') }}
            </p>
          </div>

          <div class="w-full flex flex-col items-center lg:items-start gap-[16px] lg:gap-[48px]">
            <a href="{{ route('life-wheel.assessment') }}" @guest data-auth-gate="life-wheel-assessment" @endguest
               class="group w-[195px] lg:w-[271px] h-[45px] lg:h-[60px] px-6 py-3 bg-[#204a7a] rounded-[10px] lg:rounded-[15px] flex items-center justify-center gap-2 text-[#e9edf2] text-[14px] lg:text-[25px] font-semibold leading-[1.5] whitespace-nowrap hover:bg-[#102744] hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary focus-visible:ring-offset-2">
              <span>{{ cms('life_wheel.steps.start_button', 'ابدأ التقييم الآن') }}</span>
              <img src="/assets/website/images/life-wheel-explore/m-arrow-left.svg" alt="" aria-hidden="true" width="12" height="12" class="lg:hidden size-[12px] group-hover:-translate-x-1 transition-transform duration-200" />
              <img src="/assets/website/images/life-wheel-explore/arrow-left.svg" alt="" aria-hidden="true" width="24" height="24" class="hidden lg:block size-[24px] group-hover:-translate-x-1 transition-transform duration-200" />
            </a>

            <ul class="flex flex-wrap items-center justify-center lg:justify-start gap-[6px] lg:gap-[20px]">
              @foreach ([
                ['key' => 'pie',     'text' => cms('life_wheel.intro.pill_aspects', '8 جوانب')],
                ['key' => 'check',   'text' => cms('life_wheel.intro.pill_no_wrong', 'لا توجد إجابات صحيحة أو خاطئة')],
                ['key' => 'instant', 'text' => cms('life_wheel.intro.pill_instant', 'نتائج فورية')],
              ] as $pill)
                <li class="h-[25px] lg:h-auto px-[13px] py-[7px] bg-white border border-[rgba(226,232,240,0.7)] rounded-full flex items-center justify-center gap-[6px] text-[#334155] text-[10px] lg:text-[14px] font-medium leading-[1.5] whitespace-nowrap">
                  <img src="/assets/website/images/life-wheel-explore/m-pill-{{ $pill['key'] }}.svg" alt="" width="11" height="11" class="lg:hidden h-[11px] w-auto shrink-0" aria-hidden="true" />
                  <img src="/assets/website/images/life-wheel-explore/pill-{{ $pill['key'] }}.svg" alt="" width="16" height="16" class="hidden lg:block size-[16px] shrink-0" aria-hidden="true" />
                  <span>{{ $pill['text'] }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

        <!-- Wheel (#3615:7603 / #3615:8003) — same wheel as the home page, no card behind it -->
        <div class="relative w-full lg:w-[521px] h-[348px] lg:h-[494px] lg:shrink-0 flex items-center justify-center">
          @include('website.partials.life-wheel-influence-config')
          <div class="relative w-[334px] h-[348px] lg:w-[474px] lg:h-[494px] flex items-center justify-center overflow-visible">
            <div id="wheel-wrap" class="w-full h-full relative z-10">
              <svg id="wheelSvg" viewBox="0 0 834.43 869.75" xmlns="http://www.w3.org/2000/svg" class="w-full h-full overflow-visible" style="overflow: visible;" role="img" aria-label="عجلة الحياة بجوانبها الثمانية"></svg>
            </div>
          </div>
        </div>
      </section>

      @include('website.partials.life-wheel-admin-controls')

      <!-- ==================== 2. جوانب الحياة التي ستقيمها (#3083:16877 / #3080:10857) ==================== -->
      @php
        $aspects = [
          ['title' => cms('life_wheel.aspects.spiritual_title', 'الروحي'),    'desc' => cms('life_wheel.aspects.spiritual_text', 'التزام الفرد بالعبادات والممارسات الإيمانية.'), 'icon' => 'spiritual', 'bg' => 'bg-[#eff1ff]', 'border' => 'border-[#5963d9]', 'color' => 'text-[#5963d9]'],
          ['title' => cms('life_wheel.aspects.health_title', 'الصحي'),     'desc' => cms('life_wheel.aspects.health_text', 'مدى تبني الفرد لعادات صحية متكاملة.'),          'icon' => 'health',    'bg' => 'bg-[#f4fff9]', 'border' => 'border-[#488c70]', 'color' => 'text-[#488c70]'],
          ['title' => cms('life_wheel.aspects.personal_title', 'الشخصي'),    'desc' => cms('life_wheel.aspects.personal_text', 'مستوى سعي الفرد للتعلم المستمر.'),              'icon' => 'personal',  'bg' => 'bg-[#f6f1ff]', 'border' => 'border-[#5c3e9b]', 'color' => 'text-[#5c3e9b]'],
          ['title' => cms('life_wheel.aspects.family_title', 'العائلي'),   'desc' => cms('life_wheel.aspects.family_text', 'مستوى جودة التواصل الأسري.'),                   'icon' => 'family',    'bg' => 'bg-[#fff8f3]', 'border' => 'border-[#d87f3c]', 'color' => 'text-[#d87f3c]'],
          ['title' => cms('life_wheel.aspects.social_title', 'الاجتماعي'), 'desc' => cms('life_wheel.aspects.social_text', 'مدى اهتمام الفرد بصلة الأرحام.'),               'icon' => 'social',    'bg' => 'bg-[#fff9fb]', 'border' => 'border-[#963056] lg:border-[#f2abc5]', 'color' => 'text-[#963056]'],
          ['title' => cms('life_wheel.aspects.career_title', 'المهني'),    'desc' => cms('life_wheel.aspects.career_text', 'مدى انضباط الفرد والتزامه بأنظمة العمل.'),      'icon' => 'career',    'bg' => 'bg-[#f2f8ff]', 'border' => 'border-[#21487b]', 'color' => 'text-[#21487b]'],
          ['title' => cms('life_wheel.aspects.financial_title', 'المالي'),    'desc' => cms('life_wheel.aspects.financial_text', 'مدى كفاءة الفرد في التخطيط المالي.'),           'icon' => 'financial', 'bg' => 'bg-[#effeff]', 'border' => 'border-[#27797e]', 'color' => 'text-[#27797e]'],
          ['title' => cms('life_wheel.aspects.leisure_title', 'الترفيهي'),  'desc' => cms('life_wheel.aspects.leisure_text', 'قدرة الفرد على التوازن بين العمل والحياة.'),    'icon' => 'leisure',   'bg' => 'bg-[#fdfcf3]', 'border' => 'border-[#b8aa44]', 'color' => 'text-[#b8aa44]'],
        ];
      @endphp
      <section aria-labelledby="aspects-title" class="flex flex-col items-center gap-[24px] lg:gap-[60px]">
        <div class="flex flex-col items-center gap-[16px] lg:gap-[21px] text-center w-full max-w-[767px]">
          <h2 id="aspects-title" class="text-[21px] lg:text-[36px] font-semibold text-[#262626] leading-[28px] lg:leading-[1.5] tracking-[-0.5px] lg:tracking-normal">{{ cms('life_wheel.aspects.title', 'جوانب الحياة التي ستقيمها') }}</h2>
          <p class="text-[14px] lg:text-[25px] font-medium text-[#565656] leading-[22px] lg:leading-[39px]">{{ cms('life_wheel.aspects.subtitle', 'ثمانية جوانب رئيسية تساعدك على رؤية حياتك بشكل متكامل') }}</p>
        </div>

        <ul class="grid grid-cols-2 md:grid-cols-4 gap-x-[17px] gap-y-[24px] md:gap-5 lg:gap-x-[40px] lg:gap-y-[55px] w-full">
          @foreach ($aspects as $aspect)
            <li class="{{ $aspect['bg'] }} {{ $aspect['border'] }} border-[0.5px] border-solid rounded-[22.828px] lg:rounded-[30px] drop-shadow-[0px_4px_5.3px_rgba(0,0,0,0.1)] lg:drop-shadow-[0px_3px_3.1px_rgba(0,0,0,0.1)] flex flex-col items-center justify-center p-4 h-[190px] lg:w-[280px] lg:h-[290px]">
              <div class="flex flex-col items-center gap-[16px] lg:gap-[33px] w-full max-w-[142px] lg:max-w-none lg:w-[200px] lg:h-[246px]">
                <img src="/assets/website/images/life-wheel-explore/m-icon-{{ $aspect['icon'] }}.svg" alt="" width="56" height="56" class="lg:hidden size-[56px] shrink-0" aria-hidden="true" />
                <img src="/assets/website/images/life-wheel-explore/icon-{{ $aspect['icon'] }}.svg" alt="" width="86" height="86" class="hidden lg:block size-[86px] shrink-0" aria-hidden="true" />
                <div class="flex flex-col items-center gap-[8px] lg:gap-[18px] w-full text-center leading-normal lg:leading-[1.5]">
                  <h3 class="{{ $aspect['color'] }} text-[21px] lg:text-[30px] font-bold lg:font-semibold">{{ $aspect['title'] }}</h3>
                  <p class="text-[#565656] text-[14px] lg:text-[21px] font-medium lg:font-semibold">{{ $aspect['desc'] }}</p>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </section>

      <!-- ==================== 3. كيف يعمل التقييم؟ (#3083:16940 / #3080:10922) ==================== -->
      <section aria-labelledby="how-title" class="flex flex-col items-center w-full lg:w-[953px] mx-auto">
        <div class="flex flex-col items-center gap-[24px] lg:gap-[60px] w-full h-[399px] lg:h-auto">
          <h2 id="how-title" class="w-full h-[24px] lg:h-auto flex items-center justify-center lg:block text-center text-[21px] lg:text-[36px] font-semibold text-[#262626] leading-[28px] lg:leading-[1.5] tracking-[-0.5px] lg:tracking-normal">{{ cms('life_wheel.steps.title', 'كيف يعمل التقييم؟') }}</h2>

          <!-- Timeline (#3083:16943 / #3080:10925): card & step positions are the same percentages on both designs -->
          <div class="relative shrink-0 self-stretch -ml-[13px] -mr-[18px] h-[335px] lg:self-auto lg:mx-0 lg:w-[953px] lg:h-[741px]">
            <div role="list" class="absolute inset-x-0 top-[23px] h-[318px] lg:top-[48.48px] lg:h-[670.25px]">
              <!-- Snaking track -->
              <div class="absolute inset-[-2.52%_6.41%_-2.22%_6.41%] pointer-events-none" aria-hidden="true">
                <div class="absolute inset-[-0.32%_-0.31%] lg:hidden">
                  <img src="/assets/website/images/life-wheel-explore/m-timeline-track.svg" alt="" width="343.876" height="335.188" class="block max-w-none size-full" />
                </div>
                <div class="absolute inset-[-0.32%_-0.27%] hidden lg:block">
                  <img src="/assets/website/images/life-wheel-explore/timeline-track.svg" alt="" width="835.315" height="706.472" class="block max-w-none size-full" />
                </div>
              </div>

              <!-- Step 1 -->
              <div role="listitem" class="absolute inset-[-0.63%_11.79%_70.75%_5.13%] bg-[#f6f6f6] border lg:border-[2.108px] border-[#afc8e6] rounded-[16px] lg:rounded-[33.723px] backdrop-blur-[6px] lg:backdrop-blur-[12.646px]">
                <div class="absolute left-[3.4%] top-[10px] size-[44px] rounded-[16px] lg:left-[23.18px] lg:top-[21.08px] lg:size-[92.738px] lg:rounded-[33.723px] bg-[#e9edf2] flex items-center justify-center" aria-hidden="true">
                  <img src="/assets/website/images/life-wheel-explore/m-step-multi-select.svg" alt="" width="24" height="24" class="lg:hidden size-[24px]" />
                  <img src="/assets/website/images/life-wheel-explore/step-multi-select.svg" alt="" width="50.5846" height="50.5846" class="hidden lg:block size-[50.585px]" />
                </div>
                <div class="absolute left-[30.59%] top-[10px] w-[62.1%] lg:left-[209.02px] lg:top-[20.63px] lg:w-[505px] flex flex-col gap-[4px] lg:gap-[8.431px] text-right">
                  <h3 class="text-[17px] lg:text-[35.831px] font-semibold text-[#204a7a] leading-[1.5]">{{ cms('life_wheel.steps.step_1_title', 'أجب بعفوية') }}</h3>
                  <p class="text-[12px] lg:text-[25.292px] font-normal text-[#262626] leading-[1.5] lg:leading-normal">{{ cms('life_wheel.steps.step_1_text', 'اختر الإجابة الأقرب إلى واقعك دون تردد أو تفكير مفرط.') }}</p>
                </div>
              </div>

              <!-- Step 2 -->
              <div role="listitem" class="absolute inset-[34.59%_7.95%_35.53%_9.23%] bg-[#f6f6f6] border lg:border-[2.108px] border-[#afc8e6] rounded-[16px] lg:rounded-[33.723px] backdrop-blur-[6px] lg:backdrop-blur-[12.646px]">
                <div class="absolute left-[7.13%] top-[12px] w-[71.9%] lg:left-[179.92px] lg:top-[25.29px] lg:w-[448.94px] flex flex-col gap-[4px] lg:gap-[8.431px] text-right">
                  <h3 class="text-[17px] lg:text-[35.831px] font-semibold text-[#204a7a] leading-[1.5]">{{ cms('life_wheel.steps.step_2_title', 'قيم جوانب حياتك') }}</h3>
                  <p class="text-[12px] lg:text-[25.292px] font-normal text-[#262626] leading-[1.5] lg:leading-normal">{{ cms('life_wheel.steps.step_2_text', 'مر على مختلف الجوانب وأجب عن أسئلتها بدقة وصدق.') }}</p>
                </div>
                <div class="absolute left-[82.44%] top-[12px] size-[44px] rounded-[16px] lg:left-[668.92px] lg:top-[25.29px] lg:size-[92.738px] lg:rounded-[33.723px] bg-[#e9edf2] flex items-center justify-center" aria-hidden="true">
                  <img src="/assets/website/images/life-wheel-explore/m-step-finger.svg" alt="" width="15.9041" height="21.5003" class="lg:hidden w-[15.904px] h-[21.5px]" />
                  <img src="/assets/website/images/life-wheel-explore/step-finger.svg" alt="" width="33.5209" height="45.3139" class="hidden lg:block w-[33.521px] h-[45.314px]" />
                </div>
              </div>

              <!-- Step 3 -->
              <div role="listitem" class="absolute inset-[69.81%_10%_0.31%_6.92%] bg-[#f6f6f6] border lg:border-[2.108px] border-[#afc8e6] rounded-[16px] lg:rounded-[33.723px] backdrop-blur-[6px] lg:backdrop-blur-[12.646px]">
                <div class="absolute left-[3.4%] top-[10px] size-[44px] rounded-[16px] lg:left-[23.18px] lg:top-[21.08px] lg:size-[92.738px] lg:rounded-[33.723px] bg-[#e9edf2] flex items-center justify-center" aria-hidden="true">
                  <img src="/assets/website/images/life-wheel-explore/m-step-star.svg" alt="" width="24" height="24" class="lg:hidden size-[24px]" />
                  <img src="/assets/website/images/life-wheel-explore/step-star.svg" alt="" width="50.5846" height="50.5846" class="hidden lg:block size-[50.585px]" />
                </div>
                <div class="absolute left-[26.57%] top-[10px] w-[66.74%] lg:left-[246.92px] lg:top-[21.08px] lg:w-[455.26px] flex flex-col gap-[4px] lg:gap-[8.431px] text-right">
                  <h3 class="text-[17px] lg:text-[35.831px] font-semibold text-[#204a7a] leading-[1.5]">{{ cms('life_wheel.steps.step_3_title', 'اكتشف نتيجتك') }}</h3>
                  <p class="text-[12px] lg:text-[25.292px] font-normal text-[#262626] leading-[1.5] lg:leading-normal">{{ cms('life_wheel.steps.step_3_text', 'احصل على نظرة واضحة إلى مستوي توازنك والجوانب التي تحتاج إلى اهتمام') }}</p>
                </div>
              </div>

              <!-- Step numbers -->
              <span class="absolute left-[91.43%] top-[15.13%] -translate-x-1/2 -translate-y-1/2 size-[26px] lg:size-[55.77px] rounded-full bg-[#204a7a] shadow-[0px_0px_16px_4px_rgba(32,74,122,0.2)] lg:shadow-[0px_0px_33.723px_8.431px_rgba(32,74,122,0.2)] flex items-center justify-center font-cairo font-bold text-white text-[11px] lg:text-[23.185px] leading-[16.5px] lg:leading-[34.777px]" aria-hidden="true">1</span>
              <span class="absolute left-[5.28%] top-[47.45%] -translate-x-1/2 -translate-y-1/2 size-[26px] lg:size-[55.77px] rounded-full bg-[#204a7a] shadow-[0px_0px_16px_4px_rgba(32,74,122,0.2)] lg:shadow-[0px_0px_33.723px_8.431px_rgba(32,74,122,0.2)] flex items-center justify-center font-cairo font-bold text-white text-[11px] lg:text-[23.185px] leading-[16.5px] lg:leading-[34.777px]" aria-hidden="true">2</span>
              <span class="absolute left-[93.74%] top-[85.94%] -translate-x-1/2 -translate-y-1/2 size-[26px] lg:size-[55.77px] rounded-full bg-[#204a7a] shadow-[0px_0px_16px_4px_rgba(32,74,122,0.2)] lg:shadow-[0px_0px_33.723px_8.431px_rgba(32,74,122,0.2)] flex items-center justify-center font-cairo font-bold text-white text-[11px] lg:text-[23.185px] leading-[16.5px] lg:leading-[34.777px]" aria-hidden="true">3</span>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>

  <!-- ==================== 4. اكتشف توازن حياتك — Bottom CTA (#3615:7840 / #3615:8218): عرض الصفحة كله، الرسمة يمين والنص شمال ==================== -->
  <section aria-labelledby="cta-title" class="w-full mt-[48px] lg:mt-[112px] mb-[64px] lg:mb-[128px] overflow-hidden bg-gradient-to-r from-[rgba(248,251,255,0.7)] via-[#f0f9ff] to-[rgba(238,242,255,0.7)] px-4 py-8 lg:px-[121px] lg:py-[40px] flex flex-col items-center justify-center gap-[20px] lg:flex-row lg:gap-[90px]">
    <!-- Illustration: character + plants, mirrored like the Figma frame -->
    <div class="relative shrink-0 w-[130px] h-[95px] lg:w-[320px] lg:h-[222px]" aria-hidden="true">
      <img src="/assets/website/images/life-wheel-explore/cta-character.svg" alt="" width="268" height="222" class="absolute -scale-x-100 left-0 top-0 w-[84.6%] h-full lg:left-[-3px] lg:w-[268px] lg:h-[222px]" />
      <img src="/assets/website/images/life-wheel-explore/cta-plants.svg" alt="" width="63" height="85" class="absolute -scale-x-100 right-0 top-[34.87%] w-[19.5%] h-[35.9%] lg:top-[68.7px] lg:w-[63px] lg:h-[84.6px]" />
    </div>

    <div class="w-full lg:w-[589px] lg:shrink-0 flex flex-col items-center lg:items-start gap-[20px] lg:gap-[48px] text-center lg:text-right">
      <div class="flex flex-col items-center lg:items-start gap-[8px] lg:gap-[20px] w-full">
        <h2 id="cta-title" class="text-[24px] lg:text-[36px] font-bold text-[#204a7a] lg:text-[#11254d] leading-[32px] lg:leading-[56px] pt-[8px] lg:pt-0">{{ cms('life_wheel.cta.title', 'اكتشف توازن حياتك') }}</h2>
        <p class="w-full max-w-[274px] lg:max-w-none text-[12px] lg:text-[21px] font-normal text-[#565656] leading-[19.5px] lg:leading-[1.5]">{{ cms('life_wheel.cta.text', 'أجب عن الأسئلة لتتعرف على مستوى توازنك في جوانب حياتك المختلفة، وتحدد نقاط قوتك والجوانب التي تحتاج إلى مزيد من الاهتمام والتطوير.') }}</p>
      </div>
      <a href="{{ route('life-wheel.assessment') }}" @guest data-auth-gate="life-wheel-assessment" @endguest
         class="group w-[190px] lg:w-[271px] h-[45px] lg:h-[60px] px-6 py-3 bg-[#204a7a] rounded-[10px] lg:rounded-[15px] flex items-center justify-center gap-2 text-[#e9edf2] text-[14px] lg:text-[25px] font-semibold leading-[1.5] whitespace-nowrap hover:bg-[#102744] hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary focus-visible:ring-offset-2">
        <span>{{ cms('life_wheel.steps.start_button', 'ابدأ التقييم الآن') }}</span>
        <img src="/assets/website/images/life-wheel-explore/m-arrow-left.svg" alt="" aria-hidden="true" width="12" height="12" class="lg:hidden size-[12px] group-hover:-translate-x-1 transition-transform duration-200" />
        <img src="/assets/website/images/life-wheel-explore/arrow-left.svg" alt="" aria-hidden="true" width="24" height="24" class="hidden lg:block size-[24px] group-hover:-translate-x-1 transition-transform duration-200" />
      </a>
    </div>
  </section>

  @include('website.partials.footer')
  @guest
    @include('website.partials.auth-dialogs')
  @endguest

</body>
</html>
