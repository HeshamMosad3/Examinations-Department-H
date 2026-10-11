@php
  $img = '/landing/images/perceptual-explore';
  $icons = '/landing/images/icons';
  // الرسمة مبنية على مقاس فيجما (553×495) وبتتصغر بالنسبة على الموبايل
  $u = fn ($n) => "calc(var(--u) * {$n})";

  $badges = [
    'visual' => ['icon' => "$icons/icon-visual-eye.svg", 'bg' => '#eff6ff', 'border' => 'rgba(30,90,249,0.13)', 'shadow' => 'rgba(30,90,249,0.12)', 'inset' => 'rgba(30,90,249,0.1)', 'color' => '#1e5af9'],
    'auditory' => ['icon' => "$icons/icon-auditory-headphones.svg", 'bg' => '#f5f3ff', 'border' => 'rgba(124,58,237,0.13)', 'shadow' => 'rgba(124,58,237,0.12)', 'inset' => 'rgba(124,58,237,0.1)', 'color' => '#7c3aed'],
    'sensory' => ['icon' => "$icons/icon-sensory-heart.svg", 'bg' => '#fdf2f8', 'border' => 'rgba(236,72,153,0.42)', 'shadow' => 'rgba(236,72,153,0.12)', 'inset' => 'rgba(236,72,153,0.1)', 'color' => '#ec4899'],
  ];
  $badgeStyle = fn ($b) => "background: {$b['bg']}; border-color: {$b['border']}; box-shadow: 0 17px 17px {$b['shadow']}, inset 0 5.7px 11.45px {$b['inset']};";

  $basicTypes = [
    ['key' => 'visual', 'title' => cms('perceptual_explore.types.visual_title', 'بصري'), 'text' => cms('perceptual_explore.types.visual_text', 'يغلب عليك الإدراك البصري.'), 'card' => '#eff6ff', 'card_border' => 'rgba(30,90,249,0.3)'],
    ['key' => 'auditory', 'title' => cms('perceptual_explore.types.auditory_title', 'سمعي'), 'text' => cms('perceptual_explore.types.auditory_text', 'يغلب عليك الإدراك السمعي.'), 'card' => '#f5f3ff', 'card_border' => 'rgba(124,58,237,0.3)'],
    ['key' => 'sensory', 'title' => cms('perceptual_explore.types.kinesthetic_title', 'حسي'), 'text' => cms('perceptual_explore.types.kinesthetic_text', 'تشعر وتتفاعل مع ما حولك.'), 'card' => '#fdf2f8', 'card_border' => 'rgba(236,72,153,0.3)'],
  ];
  // ترتيب الشارات زي فيجما (من الشمال لليمين)
  $otherTypes = [
    ['title' => cms('perceptual_explore.types.auditory_kinesthetic_title', 'سمعي - حسي'), 'text' => cms('perceptual_explore.types.auditory_kinesthetic_text', 'يجمع بين السمعي والحسي'), 'badges' => ['sensory', 'auditory']],
    ['title' => cms('perceptual_explore.types.visual_kinesthetic_title', 'بصري - حسي'), 'text' => cms('perceptual_explore.types.visual_kinesthetic_text', 'يجمع بين البصري والحسي'), 'badges' => ['sensory', 'visual']],
    ['title' => cms('perceptual_explore.types.visual_auditory_title', 'بصري - سمعي'), 'text' => cms('perceptual_explore.types.visual_auditory_text', 'يجمع بين البصري والسمعي'), 'badges' => ['auditory', 'visual']],
    ['title' => cms('perceptual_explore.types.balanced_title', 'متوازن'), 'text' => cms('perceptual_explore.types.balanced_text', 'لديك توازن نسبي بين الأنماط'), 'badges' => ['sensory', 'auditory', 'visual']],
  ];

  $lifeCards = [
    ['icon' => 'life-learning.svg', 'title' => cms('perceptual_explore.life.card_1_title', 'في التعلم'), 'text' => cms('perceptual_explore.life.card_1_text', 'هل تفضل مشاهدة المحتوى، أم الاستماع إلى الشرح، أم التعلم من خلال التطبيق؟'), 'border' => '#204a7a', 'm_border' => '#204a7a', 'icon_bg' => 'rgba(219,234,254,0.7)'],
    ['icon' => 'life-work.svg', 'title' => cms('perceptual_explore.life.card_2_title', 'في العمل'), 'text' => cms('perceptual_explore.life.card_2_text', 'هل تساعدك المخططات والصور؟ أم النقاش؟ أم التجربة العملية؟'), 'border' => '#4f46e5', 'm_border' => '#4f46e5', 'icon_bg' => '#eef2ff'],
    ['icon' => 'life-communication.svg', 'title' => cms('perceptual_explore.life.card_3_title', 'في التواصل'), 'text' => cms('perceptual_explore.life.card_3_text', 'هل تستوعب الفكرة أكثر عندما تراها، تسمع شرحها، أم تجربها بنفسك؟'), 'border' => '#118bcb', 'm_border' => '#204a7a', 'icon_bg' => '#f0f9ff'],
    ['icon' => 'life-organize.svg', 'title' => cms('perceptual_explore.life.card_4_title', 'في تنظيم المعلومات'), 'text' => cms('perceptual_explore.life.card_4_text', 'هل تميل إلى الصور والمخططات، الملاحظات الصوتية، أم التطبيق والممارسة؟'), 'border' => '#0d9488', 'm_border' => '#204a7a', 'icon_bg' => '#f0fdfa'],
  ];

  $benefits = [
    ['text' => cms('perceptual_explore.benefits.item_1', 'تتعرف على نقاط قوتك وفرص التطوير.'), 'color' => '#3b82f6', 'bg' => '#e9f1ff', 'ring' => '0 0 0 10px rgba(219,234,254,0.65), 0 0 0 20px rgba(239,246,255,0.4)'],
    ['text' => cms('perceptual_explore.benefits.item_2', 'تكتشف نمطك في استقبال المعلومات.'), 'color' => '#06b6d4', 'bg' => '#e8fcff', 'ring' => '0 0 0 10px rgba(207,250,254,0.6), 0 0 0 20px rgba(236,254,255,0.4)'],
    ['text' => cms('perceptual_explore.benefits.item_3', 'تطوّر أساليب التعلم المناسبة لك.'), 'color' => '#7c3aed', 'bg' => '#ebdfff', 'ring' => '0 0 0 10px rgba(237,233,254,0.65), 0 0 0 20px rgba(245,243,255,0.4)'],
    ['text' => cms('perceptual_explore.benefits.item_4', 'تحسّن طريقة فهم وتذكر المعلومات.'), 'color' => '#0284c7', 'bg' => '#e9f7ff', 'ring' => '0 0 0 10px rgba(224,242,254,0.6), 0 0 0 20px rgba(240,249,255,0.4)'],
    ['text' => cms('perceptual_explore.benefits.item_5', 'تطوّر مهارات التواصل مع الآخرين.'), 'color' => '#10b981', 'bg' => '#dffff4', 'ring' => '0 0 0 10px rgba(209,250,229,0.55), 0 0 0 20px rgba(236,253,245,0.4)'],
    ['text' => cms('perceptual_explore.benefits.item_6', 'تحصل على توصيات عملية تناسب نتيجتك.'), 'color' => '#f59e0b', 'bg' => '#fff1db', 'ring' => '0 0 0 10px rgba(255,160,0,0.14)'],
  ];

  $questionsLabel = ($questionsCount ?: 30) . ' ' . cms('perceptual_explore.hero.questions_unit', 'سؤال');
  $startUrl = route('perceptual.test');
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('perceptual_explore.seo.title', 'اكتشف أنماط الإدراك | دار الرؤى للتدريب') }}</title>
  <meta name="description" content="{{ cms('perceptual_explore.seo.description', 'أنماط الإدراك هي الطرق التي تميل لاستخدامها في استقبال المعلومات وفهمها والتفاعل معها: بصري، سمعي، حسي، أو مزيج منها.') }}" />
  <meta name="robots" content="index, follow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="canonical" href="https://alruaa.com/perceptual-explore.html" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ cms('perceptual_explore.seo.title', 'اكتشف أنماط الإدراك | دار الرؤى للتدريب') }}" />
  <meta property="og:description" content="{{ cms('perceptual_explore.seo.share_description', 'تعرّف على أنماط الإدراك وكيف تظهر في حياتك، ثم اكتشف نمطك.') }}" />
  <meta property="og:locale" content="ar_SA" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('landing.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/perceptualExplore.js']) }}
</head>
<body class="bg-brand-bg text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">{{ cms('global.a11y.skip_link', 'تخطي إلى المحتوى الرئيسي') }}</a>

  @include('landing.partials.navbar')

  <!-- Figma: Desktop #3083:16295 / Mobile #3080:13939 -->
  <main id="main-content" class="w-full max-w-[1240px] mx-auto px-4 lg:px-0 pt-4 md:pt-[48px] font-messiri overflow-x-clip">

    <!-- Desktop breadcrumb -->
    <nav class="hidden md:flex items-center gap-2 h-[32px] mb-[64px]" aria-label="مسار التنقل">
      <a href="/#home" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[18px]">{{ cms('perceptual_explore.hero.breadcrumb_home', 'الرئيسية') }}</a>
      <i class="fa-solid fa-chevron-left text-[12px] text-[#6f6f6f]" aria-hidden="true"></i>
      <span class="text-brand-primary text-[18px] font-medium">{{ cms('perceptual_explore.hero.breadcrumb_current', 'أنماط الإدراك') }}</span>
    </nav>

    <div class="flex flex-col gap-[48px] lg:gap-[112px]">

      <!-- ===== Hero ===== -->
      <section class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-[48px] lg:gap-0" aria-labelledby="pe-title">
        <div class="flex flex-col items-center lg:items-start lg:w-[520px] lg:pt-[5px] gap-[24px] lg:gap-[55px]">
          <!-- Mobile header: back + title -->
          <div class="flex items-center justify-start gap-[49px] w-full max-w-[361px] lg:max-w-none">
            <a href="/#assessments" class="md:hidden size-[32px] p-[8px] rounded-full bg-[#e9edf2] flex items-center justify-center text-brand-primary shrink-0" aria-label="الرجوع للرئيسية">
              <i class="fa-solid fa-arrow-right text-[14px]" aria-hidden="true"></i>
            </a>
            <h1 id="pe-title" class="font-bold text-[21px] lg:text-[36px] leading-normal text-[#1d436e]">{{ cms('perceptual_explore.hero.title', 'ما هي أنماط الإدراك؟') }}</h1>
          </div>
          <div class="flex flex-col items-center lg:items-start gap-[33px] lg:gap-[74px] w-full max-w-[361px] lg:max-w-none lg:-mt-[4px]">
            <p class="font-medium text-[14px] lg:text-[21px] leading-normal text-[#565656] text-center lg:text-right max-w-[339px] lg:max-w-none">{{ cms('perceptual_explore.hero.text', 'أنماط الإدراك هي الطرق التي تميل لاستخدامها في استقبال المعلومات وفهمها والتفاعل معها. قد تكون ميولك بصرية أو سمعية أو حسية، أو تجمع بين أكثر من نمط.') }}</p>
            <div class="flex flex-col items-center lg:items-start gap-[16px] lg:gap-[55px] w-full">
              <a 
                href="{{ $startUrl }}" @guest data-auth-gate="perceptual-test" @endguest
                class="group w-[195px] lg:w-[271px] h-[45px] lg:h-[60px] rounded-[10px] lg:rounded-[15px] bg-[#204a7a] hover:bg-[#102744] text-[#e9edf2] font-semibold text-[14px] lg:text-[25px] leading-[1.5] flex items-center justify-center gap-[8px] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2"
              >
                <span>{{ cms('perceptual_explore.hero.start_button', 'ابدأ التقييم الآن') }}</span>
                <i class="fa-solid fa-arrow-left text-[12px] lg:text-[20px] group-hover:-translate-x-1 transition-transform" aria-hidden="true"></i>
              </a>
              <ul class="flex items-center gap-[6px] lg:gap-[20px]">
                @foreach ([['chip-list.svg', $questionsLabel, 'w-[80px] lg:w-[100px]'], ['chip-check.svg', cms('perceptual_explore.hero.chip_no_wrong', 'لا توجد إجابات صحيحة أو خاطئة'), 'w-[172px] lg:w-[230px]'], ['chip-lightning.svg', cms('perceptual_explore.hero.chip_instant', 'نتائج فورية'), 'w-[80px] lg:w-[110px]']] as [$icon, $label, $w])
                  <li class="{{ $w }} h-[25px] lg:h-[35px] bg-white border border-[rgba(226,232,240,0.7)] rounded-full px-[7px] flex items-center justify-center gap-[4px]">
                    <img src="{{ $img }}/{{ $icon }}" alt="" class="size-[16px] lg:size-[20px]" />
                    <span class="font-medium text-[10px] lg:text-[14px] leading-[1.5] text-[#565656] whitespace-nowrap">{{ $label }}</span>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        <!-- Perception diagram (reuses the home illustration & badge icons) -->
        <div class="relative -mx-4 w-[calc(100%+32px)] lg:mx-0 lg:w-[553px] lg:-mt-[30px] lg:-ml-[14px] shrink-0" style="container-type: inline-size" aria-hidden="true">
          <div class="hidden lg:block absolute -top-[20px] -left-[7px] -right-[2px] bottom-[45px] rounded-full blur-[18.7px]" style="background-image: linear-gradient(42.56deg, rgba(255,255,255,0.7) 0%, #f0f9ff 50%, rgba(245,247,255,0.5) 100%)"></div>
          <div class="relative w-full aspect-[553/495] max-w-[553px] mx-auto" dir="ltr" style="--u: calc(100cqw / 553)">
            <svg viewBox="0 0 553 495" class="absolute inset-0 w-full h-full" fill="none">
              <defs>
                <linearGradient id="pe-orbit" x1="15%" y1="0%" x2="85%" y2="100%">
                  <stop offset="0%" stop-color="#7C3AED" stop-opacity="0.5" />
                  <stop offset="42%" stop-color="#EC4899" stop-opacity="0.5" />
                  <stop offset="85%" stop-color="#1E5AF9" stop-opacity="0.45" />
                </linearGradient>
                @foreach (['p' => '#7C3AED', 'k' => '#EC4899', 'b' => '#1E5AF9'] as $id => $c)
                  <filter id="pe-glow-{{ $id }}" x="-100%" y="-100%" width="300%" height="300%"><feDropShadow dx="0" dy="0" stdDeviation="3.5" flood-color="{{ $c }}" flood-opacity="0.95" /></filter>
                @endforeach
              </defs>
              <circle cx="277.26" cy="271.95" r="218.99" stroke="url(#pe-orbit)" stroke-opacity="0.2" stroke-width="1.4" />
              <ellipse cx="280.12" cy="271.95" rx="164.6" ry="163.17" stroke="#4F46E5" stroke-opacity="0.06" stroke-width="1.4" />
              <circle cx="315.18" cy="57.25" r="4.3" fill="#7C3AED" filter="url(#pe-glow-p)" />
              <circle cx="492.67" cy="246.19" r="4.3" fill="#EC4899" filter="url(#pe-glow-k)" />
              <circle cx="69" cy="207.54" r="4.3" fill="#1E5AF9" filter="url(#pe-glow-b)" />
            </svg>

            <!-- Head -->
            <img src="{{ cms_image('perceptual_explore.hero.image', '/landing/images/illustrations/perception-head.png') }}" alt="" loading="lazy" decoding="async" class="absolute object-contain" style="left: {{ $u(144.86) }}; top: {{ $u(158.88) }}; width: {{ $u(269.09) }}; height: {{ $u(226.15) }}" />
            <div class="absolute rounded-full bg-brand-bg" style="left: {{ $u(193.52) }}; top: {{ $u(357.84) }}; width: {{ $u(207.54) }}; height: {{ $u(68.7) }}; filter: blur({{ $u(15.3) }})"></div>

            @foreach ([
              ['key' => 'auditory', 'title' => cms('perceptual_explore.hero.auditory_title', 'سمعي'), 'text' => cms('perceptual_explore.hero.auditory_text', 'تسمع وتفهم الأصوات.'), 'box' => 'left: ' . $u(199.25) . '; top: 0; width: ' . $u(156.01), 'gap' => 5.73, 'tgap' => 2.86, 'tw' => 110.21],
              ['key' => 'sensory', 'title' => cms('perceptual_explore.hero.kinesthetic_title', 'حسي'), 'text' => cms('perceptual_explore.hero.kinesthetic_text', 'تشعر وتتفاعل مع ما حولك.'), 'box' => 'left: ' . $u(412.22) . '; top: ' . $u(236.17) . '; width: ' . $u(127.39), 'gap' => 8.59, 'tgap' => 5.73, 'tw' => 127.39],
              ['key' => 'visual', 'title' => cms('perceptual_explore.hero.visual_title', 'بصري'), 'text' => cms('perceptual_explore.hero.visual_text', 'ترى وتلاحظ التفاصيل.'), 'box' => 'left: ' . $u(12.88) . '; top: ' . $u(221.85) . '; width: ' . $u(140.27), 'gap' => 5.73, 'tgap' => 5.73, 'tw' => 143.13],
            ] as $node)
              @php $b = $badges[$node['key']]; @endphp
              <div class="absolute flex flex-col items-center" style="{{ $node['box'] }}; gap: {{ $u($node['tgap']) }}">
                <div class="flex items-center justify-center" style="gap: {{ $u($node['gap']) }}">
                  <span class="rounded-full border-[1.4px] flex items-center justify-center shrink-0" style="{{ $badgeStyle($b) }} width: {{ $u(57.25) }}; height: {{ $u(57.25) }}">
                    <img src="{{ $b['icon'] }}" alt="" style="width: {{ $u(28.63) }}; height: {{ $u(28.63) }}" />
                  </span>
                  <span class="font-bold leading-normal whitespace-nowrap" style="color: {{ $b['color'] }}; font-size: {{ $u(24.33) }}">{{ $node['title'] }}</span>
                </div>
                <p class="font-normal leading-normal text-[#262626] text-center" dir="rtl" style="font-size: {{ $u(17.18) }}; width: {{ $u($node['tw']) }}">{{ $node['text'] }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </section>

      <!-- ===== Know your perceptual patterns ===== -->
      <section class="flex flex-col items-center gap-[23px] lg:gap-[60px]" aria-labelledby="pe-types">
        <h2 id="pe-types" class="font-semibold lg:font-bold text-[18px] lg:text-[30px] leading-[1.5] lg:leading-normal text-[#0d0d0d] lg:text-[#262626] text-center">{{ cms('perceptual_explore.types.title', 'تعرّف على أنماط إدراكك') }}</h2>
        <div class="w-full max-w-[361px] lg:max-w-none flex flex-col items-center gap-[32px] lg:gap-[40px]">

          <!-- Basic types -->
          <div class="w-full flex flex-col items-center gap-[20px] lg:gap-px">
            <div class="flex flex-col items-center gap-[16px]">
              <span class="bg-[#204a7a] text-white rounded-full h-[29px] lg:h-auto w-[147px] lg:w-auto px-[16px] lg:px-[24px] py-[4px] lg:py-[8px] font-bold lg:font-semibold text-[14px] lg:text-[20px] leading-[16px] lg:leading-[24px] flex items-center justify-center drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">{{ cms('perceptual_explore.types.basic_label', 'الأنماط الأساسية') }}</span>
              <img src="{{ $img }}/tree-basic.svg" alt="" class="hidden lg:block w-[793px] h-[12px]" aria-hidden="true" />
            </div>
            <div class="w-full lg:w-[1096px] grid grid-cols-1 lg:grid-cols-3 gap-[14px] lg:gap-[20px]">
              @foreach ($basicTypes as $t)
                @php $b = $badges[$t['key']]; @endphp
                <article class="h-[86px] lg:h-[167px] rounded-[20px] lg:rounded-[30px] border backdrop-blur-[4px] drop-shadow-[0px_4px_12.5px_rgba(180,210,250,0.15)] px-[17px] lg:px-[33px] flex items-center justify-between" style="background: {{ $t['card'] }}; border-color: {{ $t['card_border'] }}">
                  <div class="flex flex-col gap-[4px] lg:gap-[8px] w-[169px]">
                    <h3 class="font-bold text-[21px] lg:text-[30px] leading-[36px] text-[#0e1d38]">{{ $t['title'] }}</h3>
                    <p class="font-medium text-[14px] lg:text-[16px] leading-[24px] text-[#565656] whitespace-nowrap">{{ $t['text'] }}</p>
                  </div>
                  <span class="rounded-full border-[1.4px] size-[48px] lg:size-[85px] flex items-center justify-center shrink-0" style="{{ $badgeStyle($b) }}">
                    <img src="{{ $b['icon'] }}" alt="" class="size-[32px] lg:size-[48px]" />
                  </span>
                </article>
              @endforeach
            </div>
          </div>

          <!-- Other types -->
          <div class="w-full flex flex-col items-center gap-[20px] lg:gap-[10px]">
            <div class="flex flex-col items-center gap-[16px] w-full">
              <span class="bg-[#204a7a] text-white rounded-full h-[29px] lg:h-auto w-[131px] lg:w-[168px] px-[16px] lg:px-[24px] py-[4px] lg:py-[8px] font-bold lg:font-semibold text-[14px] lg:text-[20px] leading-[16px] lg:leading-[24px] flex items-center justify-center drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">{{ cms('perceptual_explore.types.other_label', 'أنماط أخرى') }}</span>
              <img src="{{ $img }}/tree-others.svg" alt="" class="hidden lg:block w-[1024px] h-[13px]" aria-hidden="true" />
            </div>
            <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-[12px] lg:gap-[19px]">
              @foreach ($otherTypes as $t)
                <article class="bg-white border border-[#e2e8f0] lg:border-[#fae2ee] rounded-[16px] lg:rounded-[20px] lg:backdrop-blur-[4px] drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] p-[15px] lg:px-[41px] lg:py-[25px] flex flex-col items-center gap-[10px] lg:gap-[14px]">
                  <div class="flex items-center justify-center gap-[14px] lg:gap-[20px]" dir="ltr">
                    @foreach ($t['badges'] as $key)
                      @php $b = $badges[$key]; @endphp
                      <span class="rounded-full border-[1.4px] size-[32px] lg:size-[58px] flex items-center justify-center shrink-0" style="{{ $badgeStyle($b) }}">
                        <img src="{{ $b['icon'] }}" alt="" class="size-[19px] lg:size-[28px]" />
                      </span>
                    @endforeach
                  </div>
                  <div class="flex flex-col items-center gap-[7px] lg:gap-[10px] text-center">
                    <h3 class="font-bold text-[17px] lg:text-[24px] leading-[16px] lg:leading-[28px] text-[#0f172a] lg:text-[#0e1d38] whitespace-nowrap">{{ $t['title'] }}</h3>
                    <p class="font-medium text-[11px] lg:text-[14px] leading-[13.75px] lg:leading-[16px] text-[#565656] whitespace-nowrap">{{ $t['text'] }}</p>
                  </div>
                </article>
              @endforeach
            </div>
          </div>
        </div>
      </section>

      <!-- ===== How it shows in your life ===== -->
      <section class="flex flex-col items-center gap-[20px] lg:gap-[60px]" aria-labelledby="pe-life">
        <h2 id="pe-life" class="font-bold text-[21px] lg:text-[30px] leading-normal text-[#262626] text-center">{{ cms('perceptual_explore.life.title', 'كيف يظهر نمط إدراكك في حياتك؟') }}</h2>
        <div class="w-full max-w-[361px] lg:max-w-none grid grid-cols-1 lg:grid-cols-4 gap-[14px] lg:gap-[22px]">
          @foreach ($lifeCards as $c)
            <article class="border-[0.8px] lg:border-[1.5px] border-[var(--mb)] lg:border-[var(--b)] rounded-[16px] lg:rounded-[24px] bg-gradient-to-b from-white to-[rgba(248,250,252,0.5)] lg:bg-none lg:bg-white px-[17px] py-[16px] lg:px-[50px] lg:py-[30px] flex lg:flex-col items-start lg:items-center gap-[14px] lg:gap-[12px]" style="--b: {{ $c['border'] }}; --mb: {{ $c['m_border'] }}">
              <span class="rounded-full size-[44px] lg:size-[70px] flex items-center justify-center shrink-0" style="background: {{ $c['icon_bg'] }}">
                <img src="{{ $img }}/{{ $c['icon'] }}" alt="" class="size-[24px] lg:size-[40px] object-contain" />
              </span>
              <div class="flex flex-col gap-[4px] lg:gap-[12px] lg:items-center lg:text-center lg:mt-[12px]">
                <h3 class="font-bold text-[14px] lg:text-[21px] leading-normal text-[#0f172a] lg:text-[#262626]">{{ $c['title'] }}</h3>
                <p class="font-normal lg:font-medium text-[12px] lg:text-[14px] leading-[1.5] lg:leading-normal text-[#565656] lg:max-w-[191px]">{{ $c['text'] }}</p>
              </div>
            </article>
          @endforeach
        </div>
      </section>

      <!-- ===== Benefits ===== -->
      <section class="flex flex-col items-center gap-[20px] lg:gap-[60px]" aria-labelledby="pe-benefits">
        <h2 id="pe-benefits" class="font-bold text-[21px] lg:text-[30px] leading-normal text-[#262626] text-center">{{ cms('perceptual_explore.benefits.title', 'ماذا تستفيد من معرفة نمطك؟') }}</h2>

        <!-- Desktop: horizontal steps on a wavy line -->
        <ol class="hidden lg:flex relative w-[1130px] justify-between">
          <img src="{{ $img }}/wave-desktop.svg" alt="" class="absolute top-[51px] left-1/2 -translate-x-[calc(50%+9px)] w-[906px] max-w-none h-[30px] pointer-events-none" aria-hidden="true" />
          @foreach ($benefits as $i => $s)
            <li class="relative w-[162px] flex flex-col items-center gap-[14px]">
              <div class="relative w-[112px] h-[125px]">
                <span class="absolute top-[13px] left-0 size-[112px] rounded-full border-[3px] flex items-center justify-center" style="background: {{ $s['bg'] }}; border-color: {{ $s['color'] }}; box-shadow: {{ $s['ring'] }}">
                  <img src="{{ $img }}/benefit-{{ $i + 1 }}.svg" alt="" class="size-[44px]" />
                </span>
                <span class="absolute top-[6px] left-1/2 -translate-x-1/2 w-[50px] h-[24px] rounded-full text-white font-bold text-[17px] leading-none flex items-center justify-center drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]" style="background: {{ $s['color'] }}">{{ $i + 1 }}</span>
              </div>
              <div class="w-full h-[195px] rounded-[24px] border-2 bg-[#fdfdfd] px-[8px] py-[22px] flex flex-col items-center justify-between" style="border-color: {{ $s['color'] }}; filter: drop-shadow(0 6px 10px {{ $s['color'] }}0a)">
                <p class="font-bold text-[18px] leading-[28px] text-[#262626] text-center pt-[8px] max-w-[141px]">{{ $s['text'] }}</p>
                <span class="w-[44px] h-[6px] rounded-full shrink-0" style="background: {{ $s['color'] }}"></span>
              </div>
            </li>
          @endforeach
        </ol>

        <!-- Mobile: vertical timeline -->
        <ol class="lg:hidden relative w-[337px] h-[555px]" dir="ltr">
          <img src="{{ $img }}/wave-mobile.svg" alt="" class="absolute w-[494px] max-w-none h-[20px] -rotate-90 pointer-events-none" style="left: 60px; top: 263px" aria-hidden="true" />
          @foreach ($benefits as $i => $s)
            <li class="absolute left-0 right-0 h-[78px]" style="top: {{ [0, 98, 193, 290, 385, 480][$i] }}px">
              <div class="absolute left-0 top-[15px] w-[294px] min-h-[58px] bg-white border-[1.5px] rounded-[20px] py-[16px] px-[25.5px] flex items-center" style="border-color: {{ $i === 0 ? '#2563eb' : ($i === 2 ? '#8b5cf6' : $s['color']) }}" dir="rtl">
                <p class="font-semibold text-[14px] leading-[22.75px] text-[#0c2f54] text-right">{{ $s['text'] }}</p>
              </div>
              <span class="absolute right-0 top-[13px] size-[65px] rounded-full border-[1.5px] flex items-center justify-center drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]" style="background: {{ $s['bg'] }}; border-color: {{ $s['color'] }}">
                <img src="{{ $img }}/benefit-{{ $i + 1 }}.svg" alt="" class="size-[27px]" />
              </span>
              <span class="absolute top-0 right-[22.5px] size-[20px] rounded-[10px] text-white font-bold text-[11px] leading-none flex items-center justify-center" style="background: {{ $i === 0 ? '#2563eb' : $s['color'] }}">{{ $i + 1 }}</span>
            </li>
          @endforeach
        </ol>
      </section>
    </div>
  </main>

  <!-- ===== Bottom CTA (full width) ===== -->
  <section class="mt-[48px] lg:mt-[112px] mb-[39px] md:mb-[13px] lg:mb-[77px] w-full bg-gradient-to-r from-[rgba(248,251,255,0.7)] via-[#f0f9ff] to-[rgba(238,242,255,0.7)] px-4 py-[32px] lg:px-[121px] lg:py-[40px] font-messiri" aria-labelledby="pe-cta">
    <div class="max-w-[1240px] mx-auto flex flex-col lg:flex-row items-center justify-center gap-[20px] lg:gap-[90px]">
      <div class="w-[130px] h-[95px] lg:w-[320px] lg:h-[222px] shrink-0 flex items-center -scale-x-100" dir="ltr" aria-hidden="true">
        <img src="{{ $img }}/cta-plants.svg" alt="" class="w-[19.5%] h-auto -mr-[2.5%] relative z-[1]" />
        <img src="{{ $img }}/cta-character.svg" alt="" class="w-[83.8%] h-full object-contain" />
      </div>
      <div class="flex flex-col items-center lg:items-start gap-[24px] lg:gap-[48px] lg:w-[589px]">
        <div class="flex flex-col items-center lg:items-start gap-[8px] lg:gap-[20px] text-center lg:text-right">
          <h2 id="pe-cta" class="font-bold text-[24px] lg:text-[36px] leading-[32px] lg:leading-normal text-[#204a7a] lg:text-[#11254d] pt-[8px] lg:pt-0">{{ cms('perceptual_explore.cta.title', 'اكتشف نمط إدراكك') }}</h2>
          <p class="font-normal text-[12px] lg:text-[21px] leading-[19.5px] lg:leading-[1.5] text-[#565656] max-w-[274px] lg:max-w-none">{{ cms('perceptual_explore.cta.text_before_count', 'أجب عن') }} {{ $questionsCount ?: 30 }} {{ cms('perceptual_explore.cta.text_after_count', 'سؤالاً لتتعرف على نمط الإدراك الأقرب إليك، سواء كان بصرياً، سمعياً، حسياً أو مزيجاً من أكثر من نمط.') }}</p>
        </div>
        <a 
          href="{{ $startUrl }}" @guest data-auth-gate="perceptual-test" @endguest
          class="group w-[190px] lg:w-[271px] h-[45px] lg:h-[60px] rounded-[10px] lg:rounded-[15px] bg-[#204a7a] hover:bg-[#102744] text-[#e9edf2] font-semibold text-[14px] lg:text-[25px] leading-[1.5] flex items-center justify-center gap-[8px] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2"
        >
          <span>{{ cms('perceptual_explore.cta.start_button', 'ابدأ التقييم الآن') }}</span>
          <i class="fa-solid fa-arrow-left text-[12px] lg:text-[20px] group-hover:-translate-x-1 transition-transform" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </section>

  @include('landing.partials.footer')
  @guest
    @include('landing.partials.auth-dialogs')
  @endguest
</body>
</html>
