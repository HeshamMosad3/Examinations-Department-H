@php
  $img = '/assets/website/images/personality-keys-explore';
  $u = fn ($n) => "calc(var(--u) * {$n})";
  $startPath = '/' . ltrim(cms_url('keys_explore.hero.start_url', '/personality-keys-test.html'), '/');
  $startHref = auth()->check() ? $startPath : route('login', ['next' => $startPath]);
  $startLabel = cms('keys_explore.hero.start_button', 'ابدأ التقييم الآن');

  // مقاسات الرسمة (Figma: ديسكتوب #3551:10973 / موبايل #3551:12155)
  $desktopDiagram = [
    'mobile' => false, 'W' => 567, 'H' => 480, 'g' => [209.29, 157.87],
    'ring1' => [0, 4.3, 154.997, 154.997], 'ring2' => [20.09, 24.39, 114.812, 117.683],
    'dots' => [[76.06, -2.87, 8.611, '#5969ff'], [144.95, 113.37, 8.611, '#00bc45'], [107.64, 146.38, 7.176, '#783cff'], [55.97, 150.69, 7.176, '#d37100']],
    'red' => [-1.43, 103.33, 8.611, [[-47.06, 4.27, 50.609, 12.17, -12, 51.418, 1.512, '#f63657'], [155, 11.31, 45.913, 4.635, -4, 45.925, 1.435, '#00bc45'], [81.74, -133.49, 1.935, 31.61, 89, 31.591, 1.383, '#5969ff']]],
    'emb' => [37.31, 40.18, 80.369, 81.804], 'embImg' => [-4.29, 4.27, 88.929, 76.993],
    'rdot' => [137.78, 28.7, 11.866, 8.611, 148, '#204a7a', [-45.92, 4.31, 48.027, 11.549, -12, 48.795, 1.435, '#204a7a']],
    'pdot' => [225.32, 175.09, 12.087, 8.611, 52, '#a855f7', [-45.93, 4.31, 48.027, 11.549, -12, 48.795, 1.435, '#b578f7']],
    'bars' => [[236.19, 312.87, 31.605, 40.528, -52.46, 50.006, 1.435, '#d37100'], [320.04, 308.56, 28.73, 41.087, -124.37, 48.795, 1.435, '#783cff']],
    'poly' => [136.34, 129.164],
    'pos' => [1 => [227, 11], 2 => [373, 73], 3 => [402, 211], 4 => [307, 330], 5 => [135, 330], 6 => [33, 214], 7 => [70, 73]],
    'body' => ['up' => [24.4, 12.92, 87.544, 104.766], 'mid' => [24.4, 11.48, 87.544, 106.201]],
    'border' => 1.722, 'radius' => 14.352, 'gap' => 5.741, 'numSize' => 20.092,
  ];
  $mobileDiagram = [
    'mobile' => true, 'W' => 393, 'H' => 340, 'g' => [144.86, 110.65],
    'ring1' => [0, 3.02, 108.639, 108.639], 'ring2' => [14.08, 17.1, 80.473, 82.485],
    'dots' => [[54.14, -1.65, 6, '#5969ff'], [101.14, 79.35, 6, '#00bc45'], [77.14, 103.35, 6, '#783cff'], [39.14, 106.35, 6, '#d37100']],
    'red' => [-0.86, 72.35, 6, [[-32.99, 3.42, 33.465, 8.047, -12, 34, 1, '#f63657'], [107.64, 6.81, 33.987, 3.369, -4, 34, 1, '#00bc45'], [57.26, -102.56, 1.593, 34.012, 89, 34, 1, '#5969ff']]],
    'emb' => [26.16, 28.17, 56.331, 57.337], 'embImg' => [-3.01, 3, 62.332, 53.965],
    'rdot' => [96.62, 20.15, 8.268, 6, 148, '#204a7a', [-32.19, 3.06, 33.465, 8.047, -12, 34, 1, '#204a7a']],
    'pdot' => [157.96, 122.72, 8.422, 6, 52, '#a855f7', [-33.59, 3.23, 33.465, 8.047, -12, 34, 1, '#b578f7']],
    'bars' => [[165.55, 220.12, 21.508, 27.57, -52.46, 34, 1, '#d37100'], [224.43, 216.44, 20.018, 28.629, -124.37, 34, 1, '#783cff']],
    'poly' => [95.562, 90.533],
    'pos' => [1 => [154.93, 0.047], 2 => [259.535, 51.303], 3 => [277.648, 144.871], 4 => [215.266, 231.363], 5 => [94.557, 231.363], 6 => [23.137, 149.883], 7 => [47.283, 51.303]],
    'body' => ['up' => [17.1, 9.05, 61.361, 73.432], 'mid' => [17.1, 8.045, 61.361, 74.438]],
    'border' => 1.207, 'radius' => 10.059, 'gap' => 4.024, 'numSize' => 14.083,
  ];

  // المفاتيح السبعة: لون الحد/العنوان وشارة الرقم (قيم الموبايل بتختلف في كام لون عن الديسكتوب)
  $keys = [
    ['n' => 1, 'title' => 'البصيرة', 'desc' => cms('keys_explore.keys.k1', 'قدرتك على فهم نفسه وما يحدث حوله بصورة تتجاوز الاستجابة السطحية أو التفسير المباشر.'), 'accent' => '#4f6ea5', 'bg' => '#eff6ff', 'bd' => '#cedbf3', 'kt' => '#43649e', 'tt' => '#3c5b90', 'icon' => 'key-1', 'group' => '21.87% 9.37% 21.88% 9.38%', 'gimg' => null, 'mw' => 31],
    ['n' => 2, 'title' => 'الدافع', 'desc' => cms('keys_explore.keys.k2', 'القوة الداخلية التي تدفع الشخص إلى العمل والاستمرار والسعي نحو الأهداف.'), 'accent' => '#64748b', 'bg' => '#fafafa', 'bd' => '#d2d4d9', 'kt' => '#45474b', 'tt' => '#45474b', 'icon' => 'key-2', 'whole' => true],
    ['n' => 3, 'title' => 'الصمود', 'desc' => cms('keys_explore.keys.k3', 'قدرتك على الحفاظ على قدرتك على التصرف والاستمرار أمام الضغط والتغيير والفشل.'), 'accent' => '#5fae7d', 'bg' => '#f7fcf9', 'bd' => '#b3e2c5', 'kt' => '#439060', 'tt' => '#439060', 'icon' => 'key-3'],
    ['n' => 4, 'title' => 'الارتباط', 'desc' => cms('keys_explore.keys.k4', 'قدرتك على فهم الآخرين وبناء علاقات قائمة على القرب والثقة مع الحفاظ على الاستقلال.'), 'accent' => '#735297', 'bg' => '#f8f2ff', 'bd' => '#d1c6de', 'kt' => '#735297', 'ktm' => '#614283', 'tt' => '#735297', 'ttm' => '#614283', 'icon' => 'key-4', 'group' => '16.67% 8.35% 12.5% 8.32%', 'gimg' => '-3.8% -3.23%'],
    ['n' => 5, 'title' => 'القرار', 'desc' => cms('keys_explore.keys.k5', 'الطريقة التي تنتقل بها من التفكير إلى الاختيار والفعل، مع مراعاة النتائج المستقبلية.'), 'accent' => '#cfad3c', 'bg' => '#fffdf4', 'bd' => '#dfd1a3', 'kt' => '#cfad3c', 'ktm' => '#aa8d2c', 'tt' => '#cfad3c', 'ttm' => '#c8a83f', 'icon' => 'key-5'],
    ['n' => 6, 'title' => 'التأثير', 'desc' => cms('keys_explore.keys.k6', 'قدرتك على الحضور والتعبير وتحريك الآخرين مع الاهتمام بالأثر الذي يتركه.'), 'accent' => '#ae4d60', 'bg' => '#fff2f5', 'bd' => '#efbec7', 'kt' => '#ae4d60', 'tt' => '#ae4d60', 'icon' => 'key-6'],
    ['n' => 7, 'title' => 'الأفق', 'desc' => cms('keys_explore.keys.k7', 'قدرتك على رؤية المستقبل الذي يريده، والتأثير في المسار الذي يقوده إليه،'), 'accent' => '#8640c9', 'bg' => '#f8f2ff', 'bgm' => '#f6effc', 'bd' => '#d1c6de', 'bdm' => '#d0b3eb', 'kt' => '#8640c9', 'tt' => '#8640c9', 'icon' => 'key-7'],
  ];

  $benefits = [
    ['title' => cms('keys_explore.benefits.item_1_title', 'تقرير تحليلي شامل'), 'text' => cms('keys_explore.benefits.item_1_text', 'يعرض نسب ومستويات مفاتيح الشخصية السبعة، مع توضيح أبرز نقاط القوة والجوانب التي تحتاج إلى تطوير.'), 'border' => '#7babdb', 'bg' => '#dbeafe', 'icon' => 'benefit-report', 'size' => [20, 16]],
    ['title' => cms('keys_explore.benefits.item_2_title', 'كشف نقاط قوتك'), 'text' => cms('keys_explore.benefits.item_2_text', 'تعرّف على أبرز قدراتك الشخصية والقيادية، واكتشف الجوانب التي يمكنك تطويرها لتحقيق أفضل أداء ممكن.'), 'border' => '#82d793', 'bg' => '#dff7e4', 'icon' => 'benefit-strengths', 'size' => [22, 18]],
    ['title' => cms('keys_explore.benefits.item_3_title', 'تحديد فرص التحسين'), 'text' => cms('keys_explore.benefits.item_3_text', 'تعرّف على مفاتيح شخصيتك الأقل نموًا، وحدد المهارات التي تحتاج إلى تعزيزها لتحقيق توازن أفضل.'), 'border' => '#dccb73', 'bg' => '#fef8db', 'icon' => 'benefit-improve', 'size' => [20, 16]],
  ];

  // خطوات الرحلة (الأولى على اليمين): اللون، الأيقونة، النص
  $steps = [
    ['n' => 1, 'color' => '#a480cb', 'num' => '#725196', 'ring' => '156,125,189', 'bg' => '#faf5ff', 'bd' => '#e9d5ff', 'icon' => 'step-search', 'text' => cms('keys_explore.steps.step_1_text', 'تعرّف على المفاتيح وأبعادها المختلفة.'), 'btn' => cms('keys_explore.steps.step_1_button', 'تصفح المقياس'), 'btnColor' => '#56337e', 'btnW' => 229],
    ['n' => 2, 'color' => '#2e7ea2', 'mcolor' => '#3d96be', 'num' => '#3f8bac', 'ring' => '63,138,171', 'bg' => '#f4fcff', 'bd' => '#c1e3f2', 'icon' => 'step-question', 'text' => cms('keys_explore.steps.step_2_text', "أجب عن الأسئلة
بصدق ووضوح."), 'btn' => cms('keys_explore.steps.step_2_button', 'أجب بشفافية'), 'btnColor' => '#2e7ea2', 'btnW' => 229],
    ['n' => 3, 'color' => '#f08544', 'num' => '#e68347', 'ring' => '239,133,68', 'bg' => '#fffefd', 'bd' => '#f9e7db', 'icon' => 'step-report', 'text' => cms('keys_explore.steps.step_3_text', "اطّلع على تقريرك
لمعرفة النتائج."), 'btn' => cms('keys_explore.steps.step_3_button', 'استلم تقريرك'), 'btnColor' => '#d76b2a', 'btnW' => 260],
  ];
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ cms('keys_explore.seo.title', 'مفاتيح الشخصية السبعة | دار الرؤى للتدريب') }}</title>
  <meta name="description" content="{{ cms('keys_explore.seo.description', 'مقياس وصفي يرسم صورة متعددة الأبعاد لشخصيتك، وكيف تفهم نفسك والعالم، وتواجه الظروف، وتتخذ قراراتك، وترتبط بالآخرين، وتنظر إلى مستقبلك.') }}" />
  <meta name="robots" content="index, follow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="canonical" href="https://alruaa.com/personality-keys.html" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ cms('keys_explore.seo.title', 'مفاتيح الشخصية السبعة | دار الرؤى للتدريب') }}" />
  <meta property="og:description" content="{{ cms('keys_explore.seo.share_description', 'تعرّف على مفاتيح شخصيتك السبعة واكتشف نقاط قوتك والجوانب التي يمكنك تطويرها.') }}" />
  <meta property="og:locale" content="ar_SA" />
  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('website.partials.cms-script'){{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/personalityKeysExplore.js']) }}
</head>
<body class="bg-brand-bg text-[#262626] min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative page-wide-header">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">{{ cms('global.a11y.skip_link', 'تخطي إلى المحتوى الرئيسي') }}</a>

  @include('website.partials.navbar')

  <!-- Figma: Desktop #3551:10953 / Mobile #3551:12043 (الديسكتوب من 1280 وطالع، وتحته تصميم الموبايل) -->
  <main id="main-content" class="w-full max-w-[1240px] min-[1280px]:max-w-[1243px] mx-auto px-4 min-[1280px]:px-0 pt-[24px] md:pt-[48px] font-messiri overflow-x-clip">

    <!-- Breadcrumb (ديسكتوب بس) -->
    <nav class="hidden min-[1280px]:flex items-center gap-2 h-[32px] mb-[64px]" aria-label="مسار التنقل">
      <a href="/#home" class="text-[#6f6f6f] hover:text-brand-primary transition-colors text-[18px]">{{ cms('keys_explore.hero.breadcrumb_home', 'الرئيسية') }}</a>
      <i class="fa-solid fa-chevron-left text-[12px] text-[#6f6f6f]" aria-hidden="true"></i>
      <span class="text-brand-primary text-[18px] font-medium">{{ cms('keys_explore.hero.breadcrumb_current', 'اكتشف مفاتيح الشخصية السبعة') }}</span>
    </nav>

    <div class="flex flex-col gap-[48px] min-[1280px]:gap-[112px]">

      <!-- ===== Hero ===== -->
      <section class="flex flex-col items-center min-[1280px]:flex-row min-[1280px]:items-center min-[1280px]:justify-start min-[1280px]:gap-[50px] min-[1280px]:h-[480px] min-[1280px]:pr-[5px]" aria-labelledby="pk-title">
        <div class="flex flex-col items-center min-[1280px]:items-start w-full min-[1280px]:w-[621px] shrink-0">
          <div class="w-[229px] min-[1280px]:w-[399px] flex flex-col items-center gap-0 min-[1280px]:gap-[3px] text-center text-[#1d436e]">
            <h1 id="pk-title" class="w-full font-bold text-[21px] leading-[33px] min-[1280px]:text-[36px] min-[1280px]:leading-[56px] min-[1280px]:text-right">{{ cms('keys_explore.hero.title', 'مفاتيح الشخصية السبعة') }}</h1>
            <p class="w-full font-semibold min-[1280px]:font-bold text-[17px] leading-[26px] min-[1280px]:text-[25px] min-[1280px]:leading-[39px] text-center" dir="ltr">{{ cms('keys_explore.hero.subtitle', 'Seven Personality Keys — 7PK') }}</p>
          </div>

          <p class="mt-[24px] w-[312px] max-w-full min-[1280px]:w-[594px] min-[1280px]:max-w-none min-[1280px]:h-[117px] min-[1280px]:flex min-[1280px]:items-center font-medium text-[14px] leading-[22px] min-[1280px]:text-[25px] min-[1280px]:leading-[1.5] text-[#403f3f] min-[1280px]:text-[#565656] text-center min-[1280px]:text-right">{{ cms('keys_explore.hero.text', 'مقياس وصفي يرسم صورة متعددة الأبعاد لشخصيتك، وكيف تفهم نفسك والعالم، وتواجه الظروف، وتتخذ قراراتك، وترتبط بالآخرين، وتنظر إلى مستقبلك.') }}</p>

          <a href="{{ $startHref }}" @guest data-auth-gate="{{ $startPath }}" @endguest
             class="group mt-[32px] min-[1280px]:mt-[48px] w-[195px] min-[1280px]:w-[271px] h-[45px] min-[1280px]:h-[60px] rounded-[10px] min-[1280px]:rounded-[15px] bg-[#204a7a] hover:bg-[#102744] text-[#e9edf2] font-semibold text-[14px] min-[1280px]:text-[25px] leading-[1.5] flex items-center justify-center gap-[8px] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
            <span>{{ $startLabel }}</span>
            <img src="{{ $img }}/arrow-left.svg" alt="" class="size-[12px] min-[1280px]:size-[24px] group-hover:-translate-x-1 transition-transform" />
          </a>

          <!-- شريط المميزات -->
          <ul class="mt-[16px] min-[1280px]:mt-[24px] w-full min-[1280px]:w-[619px] flex items-center border-t border-[rgba(226,232,240,0.8)] min-[1280px]:border-t-[1.715px] pt-[21px] min-[1280px]:pt-[36px] h-[41px] min-[1280px]:h-[88px]">
            <li class="flex-1 min-w-0 flex items-center justify-center gap-[6px] min-[1280px]:gap-[12px] min-[1280px]:basis-[205px]">
              <span class="w-[20px] h-[20px] min-[1280px]:size-[35px] rounded-[10px] min-[1280px]:rounded-[17.147px] bg-[#e7f2ff] flex items-center justify-center font-bold text-[12px] min-[1280px]:text-[21px] text-[#1d436e] leading-none">7</span>
              <span class="font-medium text-[12px] min-[1280px]:text-[21px] leading-[1.5] text-[#565656] whitespace-nowrap">{{ cms('keys_explore.hero.chip_keys', 'مفاتيح محورية') }}</span>
            </li>
            <li class="font-cairo font-bold text-[11px] leading-[16.5px] min-[1280px]:text-[18.862px] min-[1280px]:leading-[28.293px] text-[#cbd5e1] w-[3px] min-[1280px]:w-[5px] text-center shrink-0" aria-hidden="true">|</li>
            <li class="flex-1 min-w-0 flex items-center justify-center gap-[6px] min-[1280px]:gap-[12px] min-[1280px]:basis-[205px]">
              <img src="{{ $img }}/chip-report.svg" alt="" class="size-[14px] min-[1280px]:size-[28px]" />
              <span class="font-medium text-[12px] min-[1280px]:text-[21px] leading-[1.5] text-[#565656] whitespace-nowrap">{{ cms('keys_explore.hero.chip_report', 'تقرير مخصص') }}</span>
            </li>
            <li class="font-cairo font-bold text-[11px] leading-[16.5px] min-[1280px]:text-[18.862px] min-[1280px]:leading-[28.293px] text-[#cbd5e1] w-[3px] min-[1280px]:w-[5px] text-center shrink-0" aria-hidden="true">|</li>
            <li class="flex-1 min-w-0 flex items-center justify-center gap-[6px] min-[1280px]:gap-[12px] min-[1280px]:basis-[205px]">
              <img src="{{ $img }}/chip-zap.svg" alt="" class="size-[16px] min-[1280px]:size-[28px]" />
              <span class="font-medium text-[12px] min-[1280px]:text-[21px] leading-[1.5] text-[#565656] whitespace-nowrap">{{ cms('keys_explore.hero.chip_instant', 'نتائج فورية') }}</span>
            </li>
          </ul>
        </div>

        <!-- الرسمة: ديسكتوب 567×480 / موبايل 393×340 -->
        <div class="hidden min-[1280px]:block shrink-0 w-[567px] h-[480px]" style="--u: 1px">
          @include('website.partials.personality-keys-diagram', ['c' => $desktopDiagram])
        </div>
        <div class="min-[1280px]:hidden mt-[48px] w-[calc(100%+32px)] max-w-[393px]" style="container-type: inline-size">
          <div style="--u: calc(100cqw / 393); height: calc(100cqw * 340 / 393)">
            @include('website.partials.personality-keys-diagram', ['c' => $mobileDiagram])
          </div>
        </div>
      </section>

      <!-- ===== المفاتيح السبعة الأساسية ===== -->
      <section class="flex flex-col gap-[12px] min-[1280px]:gap-[60px]" aria-labelledby="pk-keys">
        <div class="flex items-center justify-between h-[33px] min-[1280px]:h-[58px]">
          <h2 id="pk-keys" class="font-bold text-[21px] min-[1280px]:text-[30px] leading-[33px] min-[1280px]:leading-normal text-[#262626]">{{ cms('keys_explore.keys.title', 'المفاتيح السبعة الأساسية') }}</h2>
          <span class="bg-[#f1f5f9] min-[1280px]:bg-[#eef4fa] rounded-full min-[1280px]:rounded-[30px] px-[10px] py-[4px] min-[1280px]:w-[236px] min-[1280px]:h-[58px] flex items-center justify-center font-semibold text-[12px] min-[1280px]:text-[25px] leading-[1.5] text-[#262626]">{{ cms('keys_explore.keys.badge', '7 مفاتيح') }}</span>
        </div>

        <div class="grid grid-cols-1 min-[1280px]:grid-cols-3 gap-[12px] min-[1280px]:gap-x-[14px] min-[1280px]:gap-y-[32px]">
          @foreach ($keys as $k)
            @php
              $kbgM = $k['bgm'] ?? $k['bg']; $kbdM = $k['bdm'] ?? $k['bd'];
              $ktM = $k['ktm'] ?? $k['kt']; $ttM = $k['ttm'] ?? $k['kt'];
              $ttD = $k['tt'];
              $vars = "--ac: {$k['accent']}; --kbg: {$k['bg']}; --kbgm: {$kbgM}; --kbd: {$k['bd']}; --kbdm: {$kbdM}; --kt: {$k['kt']}; --ktm: {$ktM}; --tt: {$ttD}; --ttm: " . ($k['ttm'] ?? $k['tt']) . ';';
              $ins = function ($v) {
                $t = array_map('floatval', preg_split('/\s+/', trim($v ?: '0')));
                [$top, $right, $bottom, $left] = match (count($t)) { 1 => [$t[0], $t[0], $t[0], $t[0]], 2 => [$t[0], $t[1], $t[0], $t[1]], default => [$t[0], $t[1], $t[2], $t[3]] };
                return 'left:' . $left . '%;top:' . $top . '%;width:' . (100 - $left - $right) . '%;height:' . (100 - $top - $bottom) . '%';
              };
              $icon = function () use ($k, $img, $ins) {
                if (! empty($k['group'])) {
                  return '<span class="absolute" style="' . $ins($k['group']) . '"><img src="' . $img . '/' . $k['icon'] . '.svg" alt="" class="absolute max-w-none" style="' . $ins($k['gimg'] ?? '0') . '" /></span>';
                }
                return '<img src="' . $img . '/' . $k['icon'] . '.svg" alt="" class="absolute max-w-none inset-0 size-full" />';
              };
            @endphp
            <article class="relative bg-white overflow-clip rounded-[12px] min-[1280px]:rounded-[15px] border border-r-[5px] min-[1280px]:border-r-[6px] border-[color:var(--ac)] shadow-[0px_1px_2px_rgba(0,0,0,0.05)] min-[1280px]:shadow-[0px_1.122px_2.244px_rgba(0,0,0,0.05)] h-[101px] min-[1280px]:h-[140px] {{ $k['n'] === 7 ? 'min-[1280px]:col-span-3' : '' }}" style="{{ $vars }}">
              @if ($k['n'] === 7)
                {{-- ديسكتوب: كارت عريض (مواضع Figma #3551:11819) --}}
                <div class="hidden min-[1280px]:block">
                  <span class="absolute right-[27px] top-[28px] size-[50px] rounded-[15px] border border-[color:var(--kbd)] bg-[color:var(--kbg)] flex items-center justify-center">
                    <span class="relative block size-[28px]">{!! $icon() !!}</span>
                  </span>
                  <span class="absolute right-[93px] top-[48.5px] -translate-y-1/2 font-bold text-[20px] leading-normal text-[color:var(--tt)] whitespace-nowrap">{{ $k['n'] }}. {{ $k['title'] }}</span>
                  <span class="absolute left-[24px] top-[36.5px] -translate-y-1/2 w-[38px] h-[31px] rounded-[6px] border border-[color:var(--kbd)] bg-[color:var(--kbg)] flex items-center justify-center font-bold text-[16px] text-[color:var(--kt)]">K7</span>
                  <p class="absolute right-[88px] top-[90.5px] -translate-y-1/2 w-[749px] font-medium text-[16px] leading-normal text-[#262626] text-right">{{ $k['desc'] }}</p>
                </div>
              @endif
              <div class="{{ $k['n'] === 7 ? 'min-[1280px]:hidden' : '' }} h-full flex justify-center items-start pt-[16px] min-[1280px]:pt-[18px]">
                <div class="flex items-start justify-between w-[327px] min-[1280px]:w-[367px] max-w-full">
                  <span class="shrink-0 relative size-[44px] min-[1280px]:size-[50px] rounded-[12px] min-[1280px]:rounded-[15px] border border-[color:var(--kbdm)] min-[1280px]:border-[color:var(--kbd)] bg-[color:var(--kbgm)] min-[1280px]:bg-[color:var(--kbg)] flex items-center justify-center">
                    <span class="relative block {{ ! empty($k['whole']) ? 'hidden' : ($k['n'] === 1 ? 'size-[24px]' : 'size-[22px]') . ' min-[1280px]:size-[28px]' }}">{!! $icon() !!}</span>
                    @if (! empty($k['whole']))
                      <img src="{{ $img }}/{{ $k['icon'] }}.svg" alt="" class="absolute inset-[-1px] max-w-none w-[calc(100%+2px)] h-[calc(100%+2px)]" />
                    @endif
                  </span>
                  <div class="flex flex-col gap-[4px] min-[1280px]:gap-[15px] w-[269px] min-[1280px]:w-[310px]">
                    <div class="flex items-center justify-between h-[25px] min-[1280px]:h-[31px]">
                      <h3 class="font-bold text-[16px] min-[1280px]:text-[20px] leading-normal text-[color:var(--ttm)] min-[1280px]:text-[color:var(--tt)] whitespace-nowrap">{{ $k['n'] }}. {{ $k['title'] }}</h3>
                      <span class="h-[21px] min-[1280px]:h-[31px] {{ $k['n'] === 1 ? 'w-[31px]' : 'w-[29px]' }} min-[1280px]:w-[38px] rounded-[4px] min-[1280px]:rounded-[6px] border border-[color:var(--kbdm)] min-[1280px]:border-[color:var(--kbd)] bg-[color:var(--kbgm)] min-[1280px]:bg-[color:var(--kbg)] flex items-center justify-center font-bold text-[12px] min-[1280px]:text-[16px] text-[color:var(--ktm)] min-[1280px]:text-[color:var(--kt)]">K{{ $k['n'] }}</span>
                    </div>
                    <p class="font-normal min-[1280px]:font-medium text-[12px] min-[1280px]:text-[16px] leading-[19px] min-[1280px]:leading-[25px] text-[#262626]">{{ $k['desc'] }}</p>
                  </div>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </section>

      <!-- ===== ماذا يقدم لك هذا المقياس؟ ===== -->
      <section class="bg-white border border-[#e2e8f0] rounded-[16px] drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] p-[20px] min-[1280px]:px-[26px] min-[1280px]:py-[50px] flex flex-col gap-[16px] min-[1280px]:gap-[50px]" aria-labelledby="pk-benefits">
        <div class="flex items-center gap-[8px] min-[1280px]:gap-[22px] h-[33px] min-[1280px]:h-[47px]">
          <span class="size-[32px] min-[1280px]:size-[40px] rounded-[8px] min-[1280px]:rounded-[11px] bg-[rgba(0,74,198,0.1)] flex items-center justify-center shrink-0">
            <span class="relative block size-[18px] min-[1280px]:size-[24px]"><span class="absolute" style="left: 14.58%; top: 8.33%; width: 70.84%; height: 83.34%"><img src="{{ $img }}/benefit-note.svg" alt="" class="absolute max-w-none" style="left: -4.85%; top: -4.12%; width: 109.7%; height: 108.25%" /></span></span>
          </span>
          <h2 id="pk-benefits" class="font-bold text-[21px] min-[1280px]:text-[30px] leading-[33px] min-[1280px]:leading-[47px] text-[#262626] whitespace-nowrap">{{ cms('keys_explore.benefits.title', 'ماذا يقدم لك هذا المقياس؟') }}</h2>
        </div>
        <div class="flex flex-col min-[1280px]:flex-row gap-[12px] min-[1280px]:gap-[8px]">
          @foreach ($benefits as $b)
            <article class="w-full min-[1280px]:w-[390px] min-[1280px]:h-[144px] shrink-0 rounded-[12px] min-[1280px]:rounded-[15px] border min-[1280px]:border-[1.5px] px-[10px] py-[12px] min-[1280px]:px-[12px] min-[1280px]:py-[14px]" style="border-color: {{ $b['border'] }}">
              <div class="flex items-start justify-between min-[1280px]:justify-start min-[1280px]:gap-[11px]">
                <span class="shrink-0 w-[32px] h-[34px] min-[1280px]:size-[40px] pt-[2px] min-[1280px]:pt-[2.453px]">
                  <span class="size-[32px] min-[1280px]:size-[39.248px] rounded-full flex items-center justify-center" style="background: {{ $b['bg'] }}">
                    <img src="{{ $img }}/{{ $b['icon'] }}.svg" alt="" class="{{ $b['size'][1] === 18 ? 'size-[18px] min-[1280px]:size-[22px]' : 'size-[16px] min-[1280px]:size-[20px]' }}" />
                  </span>
                </span>
                <div class="w-[248px] min-[1280px]:w-[311px] flex flex-col gap-[6px] min-[1280px]:gap-[8px] text-right text-[#262626]">
                  <h3 class="font-bold text-[14px] min-[1280px]:text-[18px] leading-[22px] min-[1280px]:leading-[28px]">{{ $b['title'] }}</h3>
                  <p class="font-medium text-[11px] min-[1280px]:text-[16px] leading-[17px] min-[1280px]:leading-[25px] min-[1280px]:text-[#565656] min-[1280px]:w-[304px] min-[1280px]:self-end">{{ $b['text'] }}</p>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </section>

      <!-- ===== رحلة التقييم في 3 خطوات ===== -->
      <section class="flex flex-col gap-[32px] min-[1280px]:gap-[60px]" aria-labelledby="pk-steps">
        <h2 id="pk-steps" class="font-bold text-[21px] min-[1280px]:text-[30px] leading-[33px] min-[1280px]:leading-[normal] text-[#262626] text-center">{{ cms('keys_explore.steps.title', 'رحلة التقييم في 3 خطوات بسيطة') }}</h2>

        <!-- ديسكتوب -->
        <div class="hidden min-[1280px]:block relative w-[1150px] h-[521px] mx-auto" dir="ltr">
          <div class="absolute left-[44px] top-0 flex gap-[102px]">
            @foreach (array_reverse($steps) as $s)
              <div class="flex items-center border-solid px-[12px] py-[22px] rounded-tl-[30px] rounded-tr-[80px] rounded-bl-[25px] rounded-br-[25px]" style="border-color: {{ $s['color'] }}; border-width: 10px 2px 2px 7px">
                <div class="w-[260px] flex flex-col items-center gap-[46px]" dir="rtl">
                  <span class="size-[74px] rounded-[40px] flex items-center justify-center drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)] {{ $s['n'] === 1 ? 'border-[3px] p-[3px]' : 'border p-px' }} border-solid" style="background: {{ $s['bg'] }}; border-color: {{ $s['bd'] }}">
                    <img src="{{ $img }}/{{ $s['icon'] }}.svg" alt="" class="{{ $s['n'] === 3 ? 'size-[40px]' : 'size-[45px]' }}" />
                  </span>
                  <p class="w-full h-[72px] flex items-center justify-center font-medium text-[24px] leading-[1.5] text-[#262626] text-center">{!! nl2br(e($s['text'])) !!}</p>
                  <span class="h-[58px] bg-white flex items-center justify-center rounded-tl-[15px] rounded-tr-[35px] rounded-bl-[25px] rounded-br-[25px] font-semibold text-[24px] leading-[1.5]" style="width: {{ $s['btnW'] }}px; color: {{ $s['btnColor'] }}; filter: drop-shadow(0px 4.925px 7.387px rgba({{ $s['ring'] }}, 0.1))">{{ $s['btn'] }}</span>
                </div>
              </div>
            @endforeach
          </div>
          <img src="{{ $img }}/steps-arrows.svg" alt="" class="absolute max-w-none" style="left: 147px; top: 349px; width: 946px; height: 95.358px" />
          <div class="absolute left-0 top-[456.87px] w-[1150px] h-[63.795px]">
            <span class="absolute h-[15.416px] rounded-full" style="left: 3%; right: 3.01%; top: 20.09px; background: linear-gradient(to right, #ffe4d3 26.923%, #87ceec 52.885%, #dfc4fd 77.885%); box-shadow: 0px 6.166px 12.332px rgba(0,0,0,0.12), inset 0px 3.083px 3.083px #fff"></span>
            @foreach ([[1, 955, 2.13, 61.831], [2, 567.21, 1, 62], [3, 162.57, 1, 62]] as [$sn, $sx, $sy, $ss])
              @php $sd = collect($steps)->firstWhere('n', $sn); @endphp
              <span class="absolute rounded-full" style="left: {{ $sx }}px; top: {{ $sy }}px; width: {{ $ss }}px; height: {{ $ss }}px; box-shadow: 0 0 0 14.747px rgba({{ $sd['ring'] }}, 0.2)"></span>
              <span class="absolute rounded-full border-solid border-white border-[6.166px] flex items-center justify-center font-bold text-[32px] leading-[1.5] text-white" style="left: {{ $sx }}px; top: {{ $sy }}px; width: {{ $ss }}px; height: {{ $ss }}px; background: {{ $sd['num'] }}">{{ $sn }}</span>
            @endforeach
          </div>
        </div>

        <!-- موبايل -->
        <div class="min-[1280px]:hidden relative w-[361px] max-w-full h-[174px] mx-auto" dir="ltr">
          @foreach ([[3, 13, 0], [2, 128, 0], [1, 243, 0.5]] as [$sn, $sx, $sy])
            @php $sd = collect($steps)->firstWhere('n', $sn); @endphp
            <div class="absolute w-[105px] h-[125px] border-solid rounded-tl-[12px] rounded-tr-[28px] rounded-bl-[14px] rounded-br-[14px]" style="left: {{ $sx }}px; top: {{ $sy }}px; border-color: {{ $sd['mcolor'] ?? $sd['color'] }}; border-width: 5px 1px 1px 3px">
              <span class="absolute left-1/2 -translate-x-1/2 top-[6px] size-[26px] rounded-[25px] border border-solid p-px flex items-center justify-center drop-shadow-[0px_1px_1px_rgba(0,0,0,0.05)]" style="background: {{ $sd['bg'] }}; border-color: {{ $sd['bd'] }}"><img src="{{ $img }}/{{ $sd['icon'] }}.svg" alt="" class="{{ $sn === 3 ? 'size-[14px]' : 'size-[16px]' }}" /></span>
              <p class="absolute left-1/2 -translate-x-1/2 top-[45px] h-[30px] flex items-center justify-center font-medium text-[10px] leading-[1.5] text-[#262626] text-center" style="width: {{ [3 => 71, 2 => 67, 1 => 79][$sn] }}px" dir="rtl">{!! nl2br(e($sd['text'])) !!}</p>
              <span class="absolute left-1/2 -translate-x-1/2 top-[86px] w-[93px] h-[23px] bg-white flex items-center justify-center rounded-tl-[6px] rounded-tr-[14px] rounded-bl-[10px] rounded-br-[10px] font-semibold text-[11px] leading-[1.5]" style="color: {{ $sd['btnColor'] }}; filter: drop-shadow(0px 2px 3px rgba({{ $sd['ring'] }}, 0.1))">{{ $sd['btn'] }}</span>
            </div>
          @endforeach
          @foreach ([[1, 283.1, 122.5], [2, 167.5, 122], [3, 51.55, 122]] as [$an, $ax, $ay])
            <span class="absolute flex items-center justify-center size-[23.071px]" style="left: {{ $ax }}px; top: {{ $ay }}px"><img src="{{ $img }}/steps-arrow-m{{ $an }}.svg" alt="" class="block size-[18px] flex-none" style="transform: rotate(-38deg)" /></span>
          @endforeach
          <span class="absolute h-[5px] rounded-full" style="left: 3%; right: 3.01%; top: 162.5px; background: linear-gradient(to right, #ffe4d3 26.923%, #87ceec 52.885%, #dfc4fd 77.885%); box-shadow: 0px 2px 4px rgba(0,0,0,0.12), inset 0px 1px 1px #fff"></span>
          @foreach ([[1, 287], [2, 171], [3, 55]] as [$sn, $sx])
            @php $sd = collect($steps)->firstWhere('n', $sn); @endphp
            <span class="absolute size-[20px] rounded-full" style="left: {{ $sx }}px; top: 154px; box-shadow: 0 0 0 4.783px rgba({{ $sd['ring'] }}, 0.2)"></span>
            <span class="absolute size-[20px] rounded-full border-2 border-solid border-white flex items-center justify-center font-bold text-[12px] leading-[1.5] text-white" style="left: {{ $sx }}px; top: 154px; background: {{ $sd['num'] }}">{{ $sn }}</span>
          @endforeach
        </div>
      </section>

    </div>
  </main>

  <!-- ===== Bottom CTA (Figma #3615:7840): بعرض الصفحة كله ===== -->
  <section class="w-full mt-[48px] min-[1280px]:mt-[112px] mb-[64px] min-[1280px]:mb-[128px] overflow-hidden bg-gradient-to-r from-[rgba(248,251,255,0.7)] via-[#f0f9ff] to-[rgba(238,242,255,0.7)] px-4 py-[32px] min-[1280px]:px-[121px] min-[1280px]:py-[40px] flex flex-col items-center justify-center gap-[20px] min-[1280px]:flex-row min-[1280px]:gap-[90px]" aria-labelledby="pk-cta">
    <div class="order-1 relative shrink-0 w-[130px] h-[95px] min-[1280px]:w-[320px] min-[1280px]:h-[222px]" aria-hidden="true">
      <img src="{{ $img }}/cta-character.svg" alt="" class="absolute left-0 min-[1280px]:left-[-3.2px] top-0 h-full w-[83.8%] min-[1280px]:w-[268.2px] object-contain -scale-x-100" />
      <img src="{{ $img }}/cta-plants.svg" alt="" class="absolute -scale-x-100" style="left: 80.3%; width: 19.7%; top: 31%; height: 38.1%" />
    </div>
    <div class="order-2 flex flex-col items-center min-[1280px]:items-start min-[1280px]:w-[589px] min-[1280px]:gap-[48px]">
      <div class="flex flex-col items-center min-[1280px]:items-start gap-[8px] min-[1280px]:gap-[20px] text-center min-[1280px]:text-right">
        <h2 id="pk-cta" class="font-bold text-[24px] leading-[32px] pt-[8px] min-[1280px]:pt-0 min-[1280px]:text-[36px] min-[1280px]:leading-[56px] text-[#204a7a] min-[1280px]:text-[#11254d]">{{ cms('keys_explore.cta.title', 'اكتشف مفاتيح شخصيتك') }}</h2>
        <p class="font-normal text-[12px] leading-[19.5px] min-[1280px]:text-[21px] min-[1280px]:leading-[1.5] text-[#565656] w-[320px] max-w-full min-[1280px]:w-auto min-[1280px]:max-w-none min-[1280px]:min-h-[64px]">{{ cms('keys_explore.cta.text', 'أجب عن أسئلة المقياس لتتعرف على أبرز سمات شخصيتك، وتكتشف نقاط قوتك والجوانب التي يمكنك تطويرها.') }}</p>
      </div>
      <a href="{{ $startHref }}" @guest data-auth-gate="{{ $startPath }}" @endguest
         class="group mt-[34px] min-[1280px]:mt-0 w-[190px] min-[1280px]:w-[271px] h-[45px] min-[1280px]:h-[60px] rounded-[10px] min-[1280px]:rounded-[15px] bg-[#204a7a] hover:bg-[#102744] text-[#e9edf2] font-semibold text-[14px] min-[1280px]:text-[25px] leading-[1.5] flex items-center justify-center gap-[8px] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#204a7a] focus-visible:ring-offset-2">
        <span>{{ $startLabel }}</span>
        <img src="{{ $img }}/arrow-left.svg" alt="" class="size-[12px] min-[1280px]:size-[24px] group-hover:-translate-x-1 transition-transform" />
      </a>
    </div>
  </section>

  @include('website.partials.footer')
  @guest
    @include('website.partials.auth-dialogs')
  @endguest
</body>
</html>
