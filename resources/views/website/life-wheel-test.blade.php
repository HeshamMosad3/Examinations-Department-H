<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth ">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>مختبر اختبار عجلة الحياة | دار الرؤى للتدريب</title>
  <meta name="robots" content="noindex, nofollow" />
  <meta name="theme-color" content="#204A7A" />

  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @include('website.partials.cms-script')
  @include('website.partials.life-wheel-influence-config')
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/wheelTestingLab.js']) }}

  <style>
    .wheel-canvas-card {
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .custom-slider::-webkit-slider-thumb {
      appearance: none;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #1a3b62;
      cursor: pointer;
      box-shadow: 0 1px 4px rgba(0,0,0,0.3);
    }
    .custom-slider::-moz-range-thumb {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #1a3b62;
      cursor: pointer;
      box-shadow: 0 1px 4px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body id="wheel-test-lab" class="text-brand-dark min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white flex flex-col">

  @include('website.partials.navbar')

  <main class="w-full max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-20 flex-1 flex flex-col items-center">

    <!-- Top Breadcrumb -->
    <nav class="w-full max-w-[1080px] flex items-center justify-start gap-2 mb-6 font-messiri text-[14px] sm:text-[16px]" aria-label="مسار التنقل">
      <a href="{{ route('home') }}" class="text-[#6f6f6f] hover:text-brand-primary transition-colors">الرئيسية</a>
      <i class="fa-solid fa-chevron-left text-[11px] text-[#8e8e8e]"></i>
      <a href="{{ route('life-wheel.explore') }}" class="text-[#6f6f6f] hover:text-brand-primary transition-colors">عجلة الحياة</a>
      <i class="fa-solid fa-chevron-left text-[11px] text-[#8e8e8e]"></i>
      <span class="text-brand-primary font-bold">مختبر اختبار العجلة (UI & Behavior Lab)</span>
    </nav>

    <!-- Header Section (Centered) -->
    <div class="w-full max-w-[1080px] bg-gradient-to-r from-[#173357] via-[#204a7a] to-[#2c65a4] text-white rounded-3xl p-6 sm:p-8 shadow-lg mb-6 relative overflow-hidden text-center flex flex-col items-center">
      <div class="absolute -left-12 -bottom-12 w-64 h-64 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
      <div class="absolute right-10 -top-10 w-48 h-48 bg-blue-300/10 rounded-full blur-xl pointer-events-none"></div>

      <div class="relative z-10 max-w-3xl flex flex-col items-center">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/15 text-blue-100 text-xs sm:text-sm font-messiri font-semibold mb-3 border border-white/20">
          <i class="fa-solid fa-flask-vial text-amber-300"></i>
          <span>مختبر فحص الواجهات وسلوك العجلة بالحجم الكامل</span>
        </div>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-messiri leading-snug mb-2.5">
          اختبار عجلة الحياة بالحجم الكامل للصفحة الرئيسية
        </h1>
        <p class="text-blue-100 text-xs sm:text-sm md:text-base leading-relaxed font-messiri opacity-90 max-w-2xl">
          تعرض كل عجلة في المنتصف بكامل حجمها المطابق لنسخة الصفحة الرئيسية (593px)، مع إمكانية التبديل بين النسخ وتجربة حركة انسياب الماء السلسة بدون فواصل.
        </p>
      </div>
    </div>

    <!-- ROW 1 OF BUTTONS: Version Switcher Buttons (Centered in One Row on Desktop) -->
    <div class="w-full flex items-center justify-center my-3 select-none">
      <div class="inline-flex flex-row flex-nowrap overflow-x-auto items-center justify-center gap-1.5 sm:gap-2 p-1.5 sm:p-2 bg-white border border-gray-200 rounded-2xl shadow-sm max-w-full">
        <button data-tab-idx="0" class="px-3.5 sm:px-5 py-2 sm:py-2.5 rounded-xl font-messiri font-bold text-xs sm:text-sm bg-white text-gray-700 hover:bg-gray-50 transition-all flex items-center gap-2 cursor-pointer whitespace-nowrap">
          <span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span>
          <span>النسخة 1: تفاوت المستويات</span>
        </button>
        <button data-tab-idx="1" class="px-3.5 sm:px-5 py-2 sm:py-2.5 rounded-xl font-messiri font-bold text-xs sm:text-sm bg-white text-gray-700 hover:bg-gray-50 transition-all flex items-center gap-2 cursor-pointer whitespace-nowrap">
          <span class="w-2.5 h-2.5 rounded-full bg-slate-500"></span>
          <span>النسخة 2: البداية من الصفر (0%)</span>
        </button>
        <button data-tab-idx="2" class="px-3.5 sm:px-5 py-2 sm:py-2.5 rounded-xl font-messiri font-bold text-xs sm:text-sm bg-white text-gray-700 hover:bg-gray-50 transition-all flex items-center gap-2 cursor-pointer whitespace-nowrap">
          <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
          <span>النسخة 3: الاكتمال التام (100%)</span>
        </button>
        <button data-tab-idx="3" class="px-3.5 sm:px-5 py-2 sm:py-2.5 rounded-xl font-messiri font-bold text-xs sm:text-sm bg-[#1a3b62] text-white shadow-md transition-all flex items-center gap-2 cursor-pointer whitespace-nowrap">
          <span class="w-2.5 h-2.5 rounded-full bg-cyan-400"></span>
          <span>النسخة 4: واجهة الرئيسية (خط فاصل أبيض + حركة واقعية)</span>
        </button>
        <button data-tab-idx="4" class="px-3.5 sm:px-5 py-2 sm:py-2.5 rounded-xl font-messiri font-bold text-xs sm:text-sm bg-white text-gray-700 hover:bg-gray-50 transition-all flex items-center gap-2 cursor-pointer whitespace-nowrap">
          <span class="w-2.5 h-2.5 rounded-full bg-[#204a7a]"></span>
          <span>النسخة 5: عجلة الرئيسية الحالية + محاكاة 5 سنين</span>
        </button>
      </div>
    </div>

    <!-- ROW 2 OF BUTTONS: Global Actions & View Modes (Centered in One Row on Desktop) -->
    <div class="w-full flex items-center justify-center mb-8 select-none">
      <div class="flex flex-wrap sm:flex-nowrap items-center justify-center gap-2 p-1.5 max-w-full">
        <!-- View mode toggle -->
        <div class="inline-flex rounded-xl bg-gray-100 p-1 border border-gray-200">
          <button id="view-mode-single" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-[#1a3b62] text-white shadow-sm transition-all flex items-center gap-1.5 cursor-pointer whitespace-nowrap">
            <i class="fa-solid fa-window-maximize"></i>
            <span>عرض فردي بالحجم الكامل</span>
          </button>
          <button id="view-mode-stack" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-white text-gray-600 hover:text-[#1a3b62] transition-all flex items-center gap-1.5 cursor-pointer whitespace-nowrap">
            <i class="fa-solid fa-layer-group"></i>
            <span>عرض متتالي للكل</span>
          </button>
        </div>

        <button id="btn-global-replay-all" class="bg-white hover:bg-blue-50 text-[#173357] border border-gray-200 text-xs font-bold py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1.5 cursor-pointer whitespace-nowrap">
          <i class="fa-solid fa-play text-emerald-600"></i>
          <span>تشغيل الحركة</span>
        </button>
        <button id="btn-global-spin-all" class="bg-white hover:bg-blue-50 text-[#173357] border border-gray-200 text-xs font-bold py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1.5 cursor-pointer whitespace-nowrap">
          <i class="fa-solid fa-arrows-rotate text-amber-500"></i>
          <span>تدوير</span>
        </button>
        <button id="btn-global-autospin-all" class="bg-white hover:bg-blue-50 text-[#173357] border border-gray-200 text-xs font-bold py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1.5 cursor-pointer whitespace-nowrap">
          <i class="fa-solid fa-repeat text-blue-600"></i>
          <span>دوران 360°</span>
        </button>
        <button id="btn-toggle-canvas-bg" class="bg-white hover:bg-blue-50 text-[#173357] border border-gray-200 text-xs font-bold py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1.5 cursor-pointer whitespace-nowrap">
          <i class="fa-solid fa-circle-half-stroke"></i>
          <span>الخلفية: فاتحة</span>
        </button>
        <button id="btn-inspect-json" class="bg-white hover:bg-blue-50 text-[#173357] border border-gray-200 text-xs font-bold py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1.5 cursor-pointer whitespace-nowrap">
          <i class="fa-solid fa-code text-indigo-600"></i>
          <span>بيانات JSON</span>
        </button>
      </div>
    </div>

    <!-- The Wheels Stage Container (Centered, Full Size on Desktop matching Homepage 593px) -->
    <div id="wheels-container" class="w-full max-w-[1080px] mx-auto flex flex-col items-center gap-8">

      <!-- ============================================================== -->
      <!-- VARIANT 4: Homepage Typical with Thin White Separator Lines & Dynamic Journey -->
      <!-- ============================================================== -->
      <section id="card-wheel-4" class="wheel-canvas-card w-full max-w-[960px] mx-auto bg-gradient-to-b from-[#eaf5fc]/70 to-white rounded-3xl p-6 sm:p-8 shadow-sm border-2 border-cyan-200/80 flex flex-col items-center text-center gap-6">
        
        <!-- Header -->
        <div class="w-full border-b border-cyan-100 pb-4 flex flex-col items-center">
          <div class="flex items-center justify-center gap-3 mb-2">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-cyan-100 text-cyan-800 border border-cyan-300">
              النسخة 4 &bull; واجهة الرئيسية (خط فاصل أبيض + حركة ديناميكية واقعية)
            </span>
            <span class="text-xs font-semibold text-gray-500">المعدل: <strong data-stat-average class="text-cyan-700 font-bold text-sm">46%</strong></span>
          </div>
          <h2 class="text-xl sm:text-2xl font-bold font-messiri text-[#173357] flex items-center justify-center gap-2">
            <span>عجلة الرئيسية بخط فاصل أبيض وحركة واقعية متعددة الاتجاهات</span>
            <i class="fa-solid fa-water text-cyan-500"></i>
          </h2>
          <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-messiri mt-1 max-w-2xl">
            مطابقة لعجلة الرئيسية مع <strong>خطوط فاصلة بيضاء رفيعة بين الجوانب (Thin White Separation Lines)</strong>. تبدأ من 30% إلى 60% وتتحرك بانسيابية الماء؛ تصعد بعض الجوانب وتتراجع أخرى بشكل منطقي متأثرة بمصفوفة لوحة الإدارة، لتستقر في النهاية جميعها بين <strong>80% و 95%</strong>.
          </p>
        </div>

        <!-- Wheel Canvas Area (EXACT HOMEPAGE SIZE: max-w-[593px], aspect-[834.43/869.75]) -->
        <div class="relative w-full max-w-[325px] min-[410px]:max-w-[345px] sm:max-w-[593px] mx-auto flex items-center justify-center overflow-visible aspect-[319.08/332.58] sm:aspect-[834.43/869.75] my-2">
          <div class="w-full h-full relative z-10 flex items-center justify-center">
            <svg id="wheelSvg-4" viewBox="0 0 834.43 869.75" xmlns="http://www.w3.org/2000/svg" class="w-full h-full overflow-visible" role="img" aria-label="عجلة الحياة - نسخة الرئيسية بخط فاصل أبيض وحركة واقعية"></svg>
          </div>

          <!-- Center Overlay Badge -->
          <div id="wheel-4-center-badge" class="absolute inset-0 flex items-center justify-center pointer-events-none z-20" style="display: none;">
            <div class="bg-white rounded-full shadow-md flex flex-col items-center justify-center border border-gray-200 w-[17.7%] aspect-square">
              <span id="wheel-4-center-score" class="font-bold text-[14px] sm:text-[18px] text-[#21487B] leading-none mb-0.5">46%</span>
              <span id="wheel-4-center-label" class="text-[#21487B] text-[8px] sm:text-[10px] font-messiri font-semibold leading-none">جاهز</span>
            </div>
          </div>
        </div>

        <!-- CARD 4 ACTION BUTTONS: Centered in One Row on Desktop -->
        <div class="w-full flex items-center justify-center my-1 select-none">
          <div class="flex flex-wrap sm:flex-nowrap items-center justify-center gap-2 max-w-full">
            <button data-action-water-up class="bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white font-messiri font-bold text-xs sm:text-sm py-2 px-3.5 rounded-xl transition-all shadow-sm flex items-center gap-1.5 cursor-pointer whitespace-nowrap" title="حركة واقعية: صعود بعض الجوانب وتراجع أخرى حسب مصفوفة التأثير ثم استقرار الجميع بين 80% و 95%">
              <i class="fa-solid fa-arrow-trend-up text-amber-200"></i>
              <span>محاكاة 5 سنين (نمو وتراجع ← 75%-95%)</span>
            </button>
            <button data-action-water-down class="bg-white hover:bg-cyan-50 text-cyan-800 border border-cyan-300 font-messiri font-bold text-xs sm:text-sm py-2 px-3.5 rounded-xl transition-all shadow-sm flex items-center gap-1.5 cursor-pointer whitespace-nowrap" title="انسياب الماء إلى الأسفل (30%-60%)">
              <i class="fa-solid fa-arrow-down-left-dots text-cyan-600"></i>
              <span>انسياب هابط (30%-60%)</span>
            </button>
            <button data-action-water-loop class="bg-white hover:bg-cyan-50 text-cyan-800 border border-cyan-300 font-messiri font-bold text-xs sm:text-sm py-2 px-3.5 rounded-xl transition-all shadow-sm flex items-center gap-1.5 cursor-pointer whitespace-nowrap" title="تموج مائي وتناوب صاعد وهابط بشكل مستمر">
              <i class="fa-solid fa-water text-cyan-500"></i>
              <span>تموج مائي مستمر</span>
            </button>
            <button data-action-reset class="bg-white hover:bg-cyan-50 text-cyan-800 border border-cyan-200 font-messiri font-bold text-xs sm:text-sm py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1 cursor-pointer whitespace-nowrap" title="إعادة المستويات الابتدائية (30%-60%)">
              <i class="fa-solid fa-rotate-left"></i>
              <span>إعادة (30-60%)</span>
            </button>
            <button data-action-spin class="bg-white hover:bg-cyan-50 text-cyan-800 border border-cyan-200 font-messiri font-bold text-xs sm:text-sm py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1 cursor-pointer whitespace-nowrap">
              <i class="fa-solid fa-arrows-rotate"></i>
              <span>تدوير</span>
            </button>
            <button data-action-autospin class="bg-white hover:bg-cyan-50 text-cyan-800 border border-cyan-200 font-messiri font-bold text-xs sm:text-sm py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1 cursor-pointer whitespace-nowrap">
              <i class="fa-solid fa-circle-notch"></i>
              <span>360°</span>
            </button>
            <button data-action-breathing class="bg-white hover:bg-cyan-50 text-cyan-800 border border-cyan-200 font-messiri font-bold text-xs sm:text-sm py-2 px-3 rounded-xl transition-all shadow-sm flex items-center gap-1 cursor-pointer whitespace-nowrap">
              <i class="fa-solid fa-heart-pulse"></i>
              <span>نَفَس</span>
            </button>
          </div>
        </div>

        <!-- Status & Presets (Centered in One Row) -->
        <div class="w-full flex flex-wrap items-center justify-center gap-3 text-xs text-gray-600">
          <span data-water-status class="font-bold text-cyan-800 font-messiri bg-cyan-100/70 px-3 py-1 rounded-lg border border-cyan-200">
            استقرار عند (30% - 60%) 💧
          </span>
          <span class="text-gray-400">|</span>
          <div class="inline-flex items-center gap-1.5 bg-white border border-cyan-200 px-2.5 py-1 rounded-xl text-xs font-bold text-gray-700 shadow-sm">
            <span class="text-cyan-800 flex items-center gap-1"><i class="fa-solid fa-stopwatch text-cyan-600"></i> مدة الحركة:</span>
            <select data-action-duration class="bg-cyan-50 text-cyan-900 rounded-lg px-2 py-0.5 border border-cyan-200 cursor-pointer font-cairo text-xs font-bold focus:outline-none">
              <option value="3000">3 ثوانٍ (سريع)</option>
              <option value="4500">4.5 ثوانٍ</option>
              <option value="5000">5 ثوانٍ</option>
              <option value="6000">6 ثوانٍ</option>
              <option value="7000" selected>7 ثوانٍ (افتراضي: 5 سنين بسلاسة)</option>
              <option value="8000">8 ثوانٍ (هادئ)</option>
              <option value="10000">10 ثوانٍ (بطيء)</option>
            </select>
          </div>
          <span class="text-gray-400">|</span>
          <div class="flex items-center gap-1.5">
            <span class="font-bold text-gray-700">تطبيق سريع:</span>
            <button data-preset="zero" class="px-2 py-0.5 bg-gray-100 hover:bg-gray-200 rounded font-semibold cursor-pointer">0%</button>
            <button data-preset="half" class="px-2 py-0.5 bg-gray-100 hover:bg-gray-200 rounded font-semibold cursor-pointer">50%</button>
            <button data-preset="full" class="px-2 py-0.5 bg-gray-100 hover:bg-gray-200 rounded font-semibold cursor-pointer">100%</button>
          </div>
        </div>

        <!-- Sliders Drawer for Variant 4 (Centered, Collapsible) -->
        <details class="w-full max-w-[800px] group bg-white border border-cyan-200 rounded-2xl overflow-hidden shadow-sm text-right">
          <summary class="p-3 bg-cyan-50/70 hover:bg-cyan-100 font-messiri font-bold text-xs sm:text-sm text-cyan-900 flex items-center justify-between cursor-pointer select-none">
            <span class="flex items-center gap-2">
              <i class="fa-solid fa-sliders text-cyan-600"></i>
              <span>التحكم اليدوي في نسب الجوانب الثمانية (Variant 4)</span>
            </span>
            <i class="fa-solid fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform"></i>
          </summary>
          <div class="p-4 grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#7844D0] min-w-[55px]">الشخصي:</span>
              <input type="range" min="0" max="100" value="36" data-axis-slider="0" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="0" class="w-9 text-left font-bold text-gray-700">36%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#5875E5] min-w-[55px]">الروحاني:</span>
              <input type="range" min="0" max="100" value="54" data-axis-slider="1" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="1" class="w-9 text-left font-bold text-gray-700">54%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#43A074] min-w-[55px]">الصحي:</span>
              <input type="range" min="0" max="100" value="42" data-axis-slider="2" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="2" class="w-9 text-left font-bold text-gray-700">42%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#C53664] min-w-[55px]">الاجتماعي:</span>
              <input type="range" min="0" max="100" value="58" data-axis-slider="3" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="3" class="w-9 text-left font-bold text-gray-700">58%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#D98344] min-w-[55px]">العائلي:</span>
              <input type="range" min="0" max="100" value="48" data-axis-slider="4" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="4" class="w-9 text-left font-bold text-gray-700">48%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#C9B642] min-w-[55px]">الترفيهي:</span>
              <input type="range" min="0" max="100" value="34" data-axis-slider="5" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="5" class="w-9 text-left font-bold text-gray-700">34%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#3CB1B3] min-w-[55px]">المالي:</span>
              <input type="range" min="0" max="100" value="52" data-axis-slider="6" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="6" class="w-9 text-left font-bold text-gray-700">52%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#4474D0] min-w-[55px]">المهني:</span>
              <input type="range" min="0" max="100" value="44" data-axis-slider="7" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="7" class="w-9 text-left font-bold text-gray-700">44%</span>
            </div>
          </div>
        </details>
      </section>

      <!-- ========================================== -->
      <!-- VARIANT 5: عجلة الرئيسية الحالية + محاكاة 5 سنين من المستوى الحالي (75%-95%) -->
      <!-- ========================================== -->
      <section id="card-wheel-5" class="wheel-canvas-card w-full max-w-[960px] mx-auto bg-gradient-to-b from-[#f2f6fb] to-white rounded-3xl p-6 sm:p-8 shadow-sm border-2 border-[#bed1e6] flex flex-col items-center text-center gap-6 hidden">

        <div class="w-full border-b border-[#dbe5f1] pb-4 flex flex-col items-center">
          <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#d9eaff] text-[#204a7a] border border-[#bed1e6] mb-2">
            النسخة 5 &bull; عجلة الرئيسية الحالية + محاكاة 5 سنين
          </span>
          <h2 class="text-xl sm:text-2xl font-bold font-messiri text-[#173357] flex items-center justify-center gap-2">
            <span>خمس سنين من حياة شخص بحركة سلسة</span>
            <i class="fa-solid fa-hourglass-half text-[#204a7a]"></i>
          </h2>
          <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-messiri mt-1 max-w-2xl">
            نفس عجلة الصفحة الرئيسية بالظبط. بتبدأ من <strong>المستوى الحالي</strong> اللي بتحدده تحت، والحركة متصلة وسلسة (من غير قفزات): جوانب بتنمو، وجوانب بتتراجع لأن الاهتمام مشغول بغيرها،
            وجانب ممكن يتعب بعد نجاحه ثم يتعافى، وبتقفل كل الجوانب بين <strong>75% و95%</strong> (شبه دايرة). كل ضغطة «تشغيل» بتطلع قصة مختلفة.
          </p>
        </div>

        <!-- Wheel: exactly the homepage wheel (same markup/size as hero.blade.php) -->
        <div class="relative w-full max-w-[305px] min-[390px]:max-w-[325px] min-[410px]:max-w-[335px] sm:max-w-[593px] mx-auto flex items-center justify-center overflow-visible aspect-[319.08/332.58] sm:aspect-[834.43/869.75] my-2">
          <div id="wheel-wrap-5" class="w-full h-full relative z-10">
            <svg id="wheelSvg-5" viewBox="0 0 834.43 869.75" xmlns="http://www.w3.org/2000/svg" class="w-full h-full overflow-visible" style="overflow: visible;" role="img" aria-label="عجلة الحياة بجوانبها الثمانية"></svg>
          </div>
        </div>

        <!-- Year progress -->
        <div class="w-full max-w-[620px] flex flex-col items-center gap-2">
          <div class="w-full flex items-center justify-between text-sm font-bold font-messiri text-[#173357]">
            <span data-j-year>المستوى الحالي</span>
            <span data-j-hint class="text-xs text-gray-500 font-semibold">5 سنين = 7 ثواني</span>
          </div>
          <div class="w-full h-2.5 rounded-full bg-[#dbe5f1] overflow-hidden" role="progressbar" aria-label="تقدم المحاكاة">
            <div data-j-bar class="h-full w-0 rounded-full bg-gradient-to-l from-[#204a7a] to-[#59cfd6]" style="transition: width 120ms linear;"></div>
          </div>
          <p data-j-text class="text-sm font-semibold font-messiri text-[#262626] min-h-[22px]"></p>
        </div>

        <!-- Actions -->
        <div class="w-full flex flex-wrap items-center justify-center gap-2 select-none">
          <button data-j-play class="bg-[#204a7a] hover:bg-[#1a3b62] text-white font-messiri font-bold text-sm py-2.5 px-5 rounded-xl transition-all shadow-sm flex items-center gap-2 cursor-pointer whitespace-nowrap">
            <i class="fa-solid fa-play text-amber-200"></i>
            <span>تشغيل محاكاة 5 سنين</span>
          </button>
          <button data-j-reset class="bg-white hover:bg-blue-50 text-[#173357] border border-gray-200 font-messiri font-bold text-sm py-2.5 px-4 rounded-xl transition-all shadow-sm flex items-center gap-2 cursor-pointer whitespace-nowrap">
            <i class="fa-solid fa-rotate-left"></i>
            <span>الرجوع للمستوى الحالي</span>
          </button>
          <label class="bg-white border border-gray-200 text-[#173357] font-messiri font-bold text-sm py-2 px-3 rounded-xl shadow-sm flex items-center gap-2 whitespace-nowrap">
            <i class="fa-solid fa-stopwatch text-[#204a7a]"></i>
            <span>المدة:</span>
            <select data-j-duration class="bg-[#eef4fb] text-[#173357] rounded-lg px-2 py-0.5 border border-[#bed1e6] cursor-pointer font-cairo text-xs font-bold focus:outline-none">
              <option value="5000">5 ثواني</option>
              <option value="7000" selected>7 ثواني (سلس)</option>
              <option value="9000">9 ثواني (هادئ)</option>
              <option value="12000">12 ثانية</option>
            </select>
          </label>
          <button data-j-random class="bg-white hover:bg-blue-50 text-[#173357] border border-gray-200 font-messiri font-bold text-sm py-2.5 px-4 rounded-xl transition-all shadow-sm flex items-center gap-2 cursor-pointer whitespace-nowrap">
            <i class="fa-solid fa-dice"></i>
            <span>مستوى حالي عشوائي (30%-60%)</span>
          </button>
        </div>

        <!-- Current level (start) -->
        <details class="w-full max-w-[760px] bg-white border border-[#dbe5f1] rounded-2xl p-4 text-right" open>
          <summary class="cursor-pointer font-messiri font-bold text-[#173357] text-sm flex items-center gap-2"><i class="fa-solid fa-sliders text-[#204a7a]"></i> المستوى الحالي (نقطة البداية)</summary>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 mt-4 text-xs">
            @foreach ([['الشخصي', '#7844D0', 38], ['الروحاني', '#5875E5', 54], ['الصحي', '#43A074', 44], ['الاجتماعي', '#C53664', 58], ['العائلي', '#D98344', 48], ['الترفيهي', '#C9B642', 36], ['المالي', '#3CB1B3', 52], ['المهني', '#4474D0', 42]] as $i => [$name, $color, $value])
              <label class="flex items-center gap-2.5">
                <span class="size-2.5 rounded-full shrink-0" style="background: {{ $color }}"></span>
                <span class="w-[62px] font-bold text-gray-700 shrink-0">{{ $name }}</span>
                <input data-j-start type="range" min="5" max="100" step="1" value="{{ $value }}" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer" aria-label="المستوى الحالي: {{ $name }}">
                <span data-j-start-val="{{ $i }}" class="w-10 text-left font-bold text-gray-700" dir="ltr">{{ $value }}%</span>
              </label>
            @endforeach
          </div>
        </details>

        <!-- Result after the 5 years -->
        <div data-j-result class="hidden w-full max-w-[760px] bg-[#f6fbff] border border-[#bed1e6] rounded-2xl p-4 text-right"></div>
      </section>

      <!-- ========================================== -->
      <!-- VARIANT 1: Staggered / High-Low Realistic -->
      <!-- ========================================== -->
      <section id="card-wheel-1" class="wheel-canvas-card w-full max-w-[960px] mx-auto bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-gray-200 flex flex-col items-center text-center gap-6 hidden">
        
        <!-- Header -->
        <div class="w-full border-b border-gray-100 pb-4 flex flex-col items-center">
          <div class="flex items-center justify-center gap-3 mb-2">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-indigo-100 text-indigo-700 border border-indigo-200">
              النسخة 1 &bull; Asymmetric High / Low
            </span>
            <span class="text-xs font-semibold text-gray-500">المعدل: <strong data-stat-average class="text-indigo-600 font-bold text-sm">56%</strong></span>
          </div>
          <h2 class="text-xl sm:text-2xl font-bold font-messiri text-[#173357]">تفاوت المستويات (عالي / منخفض)</h2>
          <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-messiri mt-1 max-w-2xl">
            تبدأ بمستويات غير متساوية لاختبار تعرجات البتلات الحقيقية، حساب معدل التوازن، وتجربة وضوح النسب والألوان.
          </p>
        </div>

        <!-- Wheel Canvas Area (EXACT HOMEPAGE SIZE: max-w-[593px]) -->
        <div class="relative w-full max-w-[325px] min-[410px]:max-w-[345px] sm:max-w-[593px] mx-auto flex items-center justify-center overflow-visible aspect-[319.08/332.58] sm:aspect-[834.43/869.75] my-2">
          <div class="w-full h-full relative z-10 flex items-center justify-center">
            <svg id="wheelSvg-1" viewBox="0 0 834.43 869.75" xmlns="http://www.w3.org/2000/svg" class="w-full h-full overflow-visible" role="img" aria-label="عجلة الحياة - نسخة تفاوت المستويات"></svg>
          </div>

          <!-- Center Overlay Badge -->
          <div id="wheel-1-center-badge" class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
            <div class="bg-white rounded-full shadow-md flex flex-col items-center justify-center border border-gray-200 w-[17.7%] aspect-square">
              <span id="wheel-1-center-score" class="font-bold text-[14px] sm:text-[18px] text-[#21487B] leading-none mb-0.5">56%</span>
              <span id="wheel-1-center-label" class="text-[#21487B] text-[8px] sm:text-[10px] font-messiri font-semibold leading-none">توازن جيد</span>
            </div>
          </div>
        </div>

        <!-- CARD 1 ACTION BUTTONS: Centered in One Row on Desktop -->
        <div class="w-full flex items-center justify-center my-1 select-none">
          <div class="flex flex-wrap sm:flex-nowrap items-center justify-center gap-2 max-w-full">
            <button data-action-replay class="bg-white hover:bg-indigo-50 text-indigo-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-play"></i> <span>تشغيل الحركة</span>
            </button>
            <button data-action-spin class="bg-white hover:bg-indigo-50 text-indigo-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-arrows-rotate"></i> <span>تدوير تفاعلي</span>
            </button>
            <button data-action-autospin class="bg-white hover:bg-indigo-50 text-indigo-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-circle-notch"></i> <span>360° مستمر</span>
            </button>
            <button data-action-breathing class="bg-white hover:bg-indigo-50 text-indigo-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-heart-pulse"></i> <span>نَفَس حيوي</span>
            </button>
            <button data-action-reset class="bg-white hover:bg-indigo-50 text-indigo-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-rotate-left"></i> <span>إعادة للوضع الأولي</span>
            </button>
          </div>
        </div>

        <!-- Sliders Drawer for Variant 1 (Centered, Collapsible) -->
        <details class="w-full max-w-[800px] group bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm text-right">
          <summary class="p-3 bg-gray-50/80 hover:bg-gray-100 font-messiri font-bold text-xs sm:text-sm text-gray-700 flex items-center justify-between cursor-pointer select-none">
            <span class="flex items-center gap-2">
              <i class="fa-solid fa-sliders text-indigo-600"></i>
              <span>التحكم اليدوي في نسب الجوانب (Variant 1)</span>
            </span>
            <i class="fa-solid fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform"></i>
          </summary>
          <div class="p-4 grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#7844D0] min-w-[55px]">الشخصي:</span>
              <input type="range" min="0" max="100" value="85" data-axis-slider="0" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="0" class="w-9 text-left font-bold text-gray-700">85%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#5875E5] min-w-[55px]">الروحاني:</span>
              <input type="range" min="0" max="100" value="25" data-axis-slider="1" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="1" class="w-9 text-left font-bold text-gray-700">25%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#43A074] min-w-[55px]">الصحي:</span>
              <input type="range" min="0" max="100" value="90" data-axis-slider="2" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="2" class="w-9 text-left font-bold text-gray-700">90%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#C53664] min-w-[55px]">الاجتماعي:</span>
              <input type="range" min="0" max="100" value="35" data-axis-slider="3" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="3" class="w-9 text-left font-bold text-gray-700">35%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#D98344] min-w-[55px]">العائلي:</span>
              <input type="range" min="0" max="100" value="80" data-axis-slider="4" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="4" class="w-9 text-left font-bold text-gray-700">80%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#C9B642] min-w-[55px]">الترفيهي:</span>
              <input type="range" min="0" max="100" value="20" data-axis-slider="5" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="5" class="w-9 text-left font-bold text-gray-700">20%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#3CB1B3] min-w-[55px]">المالي:</span>
              <input type="range" min="0" max="100" value="75" data-axis-slider="6" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="6" class="w-9 text-left font-bold text-gray-700">75%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#4474D0] min-w-[55px]">المهني:</span>
              <input type="range" min="0" max="100" value="40" data-axis-slider="7" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="7" class="w-9 text-left font-bold text-gray-700">40%</span>
            </div>
          </div>
        </details>
      </section>

      <!-- ========================================== -->
      <!-- VARIANT 2: Zero Baseline (0% Everywhere)   -->
      <!-- ========================================== -->
      <section id="card-wheel-2" class="wheel-canvas-card w-full max-w-[960px] mx-auto bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-gray-200 flex flex-col items-center text-center gap-6 hidden">
        
        <!-- Header -->
        <div class="w-full border-b border-gray-100 pb-4 flex flex-col items-center">
          <div class="flex items-center justify-center gap-3 mb-2">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200">
              النسخة 2 &bull; Zero Baseline (0%)
            </span>
            <span class="text-xs font-semibold text-gray-500">المعدل: <strong data-stat-average class="text-slate-600 font-bold text-sm">0%</strong></span>
          </div>
          <h2 class="text-xl sm:text-2xl font-bold font-messiri text-[#173357]">البداية من الصفر (0% لجميع الجوانب)</h2>
          <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-messiri mt-1 max-w-2xl">
            توضح المظهر الأولي الفارغ قبل الإجابات لاختبار الهيكل الشبكي للحلقات، ونقطة الانطلاق لحركة النمو الصاعدة.
          </p>
        </div>

        <!-- Wheel Canvas Area (EXACT HOMEPAGE SIZE: max-w-[593px]) -->
        <div class="relative w-full max-w-[325px] min-[410px]:max-w-[345px] sm:max-w-[593px] mx-auto flex items-center justify-center overflow-visible aspect-[319.08/332.58] sm:aspect-[834.43/869.75] my-2">
          <div class="w-full h-full relative z-10 flex items-center justify-center">
            <svg id="wheelSvg-2" viewBox="0 0 834.43 869.75" xmlns="http://www.w3.org/2000/svg" class="w-full h-full overflow-visible" role="img" aria-label="عجلة الحياة - نسخة البداية من الصفر"></svg>
          </div>

          <!-- Center Overlay Badge -->
          <div id="wheel-2-center-badge" class="absolute inset-0 flex items-center justify-center pointer-events-none z-20" style="display: none;">
            <div class="bg-white rounded-full shadow-md flex flex-col items-center justify-center border border-gray-200 w-[17.7%] aspect-square">
              <span id="wheel-2-center-score" class="font-bold text-[14px] sm:text-[18px] text-[#21487B] leading-none mb-0.5">0%</span>
              <span id="wheel-2-center-label" class="text-[#21487B] text-[8px] sm:text-[10px] font-messiri font-semibold leading-none">جاهز للبدء</span>
            </div>
          </div>
        </div>

        <!-- CARD 2 ACTION BUTTONS: Centered in One Row on Desktop -->
        <div class="w-full flex items-center justify-center my-1 select-none">
          <div class="flex flex-wrap sm:flex-nowrap items-center justify-center gap-2 max-w-full">
            <button data-action-replay class="bg-slate-800 hover:bg-slate-900 text-white rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-seedling text-emerald-400"></i> <span>محاكاة نمو العجلة من الصفر</span>
            </button>
            <button data-action-spin class="bg-white hover:bg-slate-50 text-slate-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-arrows-rotate"></i> <span>تدوير</span>
            </button>
            <button data-action-autospin class="bg-white hover:bg-slate-50 text-slate-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-circle-notch"></i> <span>360°</span>
            </button>
            <button data-action-breathing class="bg-white hover:bg-slate-50 text-slate-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-heart-pulse"></i> <span>نَفَس</span>
            </button>
            <button data-action-reset class="bg-white hover:bg-slate-50 text-slate-700 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-rotate-left"></i> <span>إعادة للصفر 0%</span>
            </button>
          </div>
        </div>

        <!-- Sliders Drawer for Variant 2 (Centered, Collapsible) -->
        <details class="w-full max-w-[800px] group bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm text-right">
          <summary class="p-3 bg-gray-50/80 hover:bg-gray-100 font-messiri font-bold text-xs sm:text-sm text-gray-700 flex items-center justify-between cursor-pointer select-none">
            <span class="flex items-center gap-2">
              <i class="fa-solid fa-sliders text-slate-600"></i>
              <span>التحكم اليدوي في نسب الجوانب (Variant 2)</span>
            </span>
            <i class="fa-solid fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform"></i>
          </summary>
          <div class="p-4 grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#7844D0] min-w-[55px]">الشخصي:</span>
              <input type="range" min="0" max="100" value="0" data-axis-slider="0" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="0" class="w-9 text-left font-bold text-gray-700">0%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#5875E5] min-w-[55px]">الروحاني:</span>
              <input type="range" min="0" max="100" value="0" data-axis-slider="1" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="1" class="w-9 text-left font-bold text-gray-700">0%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#43A074] min-w-[55px]">الصحي:</span>
              <input type="range" min="0" max="100" value="0" data-axis-slider="2" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="2" class="w-9 text-left font-bold text-gray-700">0%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#C53664] min-w-[55px]">الاجتماعي:</span>
              <input type="range" min="0" max="100" value="0" data-axis-slider="3" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="3" class="w-9 text-left font-bold text-gray-700">0%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#D98344] min-w-[55px]">العائلي:</span>
              <input type="range" min="0" max="100" value="0" data-axis-slider="4" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="4" class="w-9 text-left font-bold text-gray-700">0%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#C9B642] min-w-[55px]">الترفيهي:</span>
              <input type="range" min="0" max="100" value="0" data-axis-slider="5" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="5" class="w-9 text-left font-bold text-gray-700">0%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#3CB1B3] min-w-[55px]">المالي:</span>
              <input type="range" min="0" max="100" value="0" data-axis-slider="6" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="6" class="w-9 text-left font-bold text-gray-700">0%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#4474D0] min-w-[55px]">المهني:</span>
              <input type="range" min="0" max="100" value="0" data-axis-slider="7" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="7" class="w-9 text-left font-bold text-gray-700">0%</span>
            </div>
          </div>
        </details>
      </section>

      <!-- ========================================== -->
      <!-- VARIANT 3: Full Saturation (100% Every)    -->
      <!-- ========================================== -->
      <section id="card-wheel-3" class="wheel-canvas-card w-full max-w-[960px] mx-auto bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-gray-200 flex flex-col items-center text-center gap-6 hidden">
        
        <!-- Header -->
        <div class="w-full border-b border-gray-100 pb-4 flex flex-col items-center">
          <div class="flex items-center justify-center gap-3 mb-2">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
              النسخة 3 &bull; Full Saturation (100%)
            </span>
            <span class="text-xs font-semibold text-gray-500">المعدل: <strong data-stat-average class="text-emerald-600 font-bold text-sm">100%</strong></span>
          </div>
          <h2 class="text-xl sm:text-2xl font-bold font-messiri text-[#173357]">الاكتمال التام (100% لجميع الجوانب)</h2>
          <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-messiri mt-1 max-w-2xl">
            تمتلئ الحلقات الخمس بالكامل لاختبار أقصى تمدد شعاعي، وضوح النصوص والأيقونات، والتناغم عند التعبئة القصوى.
          </p>
        </div>

        <!-- Wheel Canvas Area (EXACT HOMEPAGE SIZE: max-w-[593px]) -->
        <div class="relative w-full max-w-[325px] min-[410px]:max-w-[345px] sm:max-w-[593px] mx-auto flex items-center justify-center overflow-visible aspect-[319.08/332.58] sm:aspect-[834.43/869.75] my-2">
          <div class="w-full h-full relative z-10 flex items-center justify-center">
            <svg id="wheelSvg-3" viewBox="0 0 834.43 869.75" xmlns="http://www.w3.org/2000/svg" class="w-full h-full overflow-visible" role="img" aria-label="عجلة الحياة - نسخة الاكتمال 100%"></svg>
          </div>

          <!-- Center Overlay Badge -->
          <div id="wheel-3-center-badge" class="absolute inset-0 flex items-center justify-center pointer-events-none z-20">
            <div class="bg-gradient-to-b from-amber-50 to-white rounded-full shadow-md flex flex-col items-center justify-center border-2 border-amber-300/80 w-[17.7%] aspect-square">
              <span id="wheel-3-center-score" class="font-bold text-[14px] sm:text-[18px] text-emerald-700 leading-none mb-0.5">100%</span>
              <span id="wheel-3-center-label" class="text-amber-800 text-[8px] sm:text-[10px] font-messiri font-bold leading-none">توازن مثالي</span>
            </div>
          </div>
        </div>

        <!-- CARD 3 ACTION BUTTONS: Centered in One Row on Desktop -->
        <div class="w-full flex items-center justify-center my-1 select-none">
          <div class="flex flex-wrap sm:flex-nowrap items-center justify-center gap-2 max-w-full">
            <button data-action-replay class="bg-white hover:bg-emerald-50 text-emerald-800 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-play"></i> <span>تشغيل الحركة</span>
            </button>
            <button data-action-spin class="bg-white hover:bg-emerald-50 text-emerald-800 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-arrows-rotate"></i> <span>تدوير</span>
            </button>
            <button data-action-autospin class="bg-white hover:bg-emerald-50 text-emerald-800 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-circle-notch"></i> <span>360°</span>
            </button>
            <button data-action-breathing class="bg-white hover:bg-emerald-50 text-emerald-800 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-heart-pulse"></i> <span>نَفَس</span>
            </button>
            <button data-action-reset class="bg-white hover:bg-emerald-50 text-emerald-800 border border-gray-200 rounded-xl py-2 px-4 font-bold text-xs sm:text-sm transition-colors cursor-pointer flex items-center gap-1.5 whitespace-nowrap">
              <i class="fa-solid fa-rotate-left"></i> <span>إعادة لـ 100%</span>
            </button>
          </div>
        </div>

        <!-- Sliders Drawer for Variant 3 (Centered, Collapsible) -->
        <details class="w-full max-w-[800px] group bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm text-right">
          <summary class="p-3 bg-gray-50/80 hover:bg-gray-100 font-messiri font-bold text-xs sm:text-sm text-gray-700 flex items-center justify-between cursor-pointer select-none">
            <span class="flex items-center gap-2">
              <i class="fa-solid fa-sliders text-emerald-600"></i>
              <span>التحكم اليدوي في نسب الجوانب (Variant 3)</span>
            </span>
            <i class="fa-solid fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform"></i>
          </summary>
          <div class="p-4 grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#7844D0] min-w-[55px]">الشخصي:</span>
              <input type="range" min="0" max="100" value="100" data-axis-slider="0" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="0" class="w-9 text-left font-bold text-gray-700">100%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#5875E5] min-w-[55px]">الروحاني:</span>
              <input type="range" min="0" max="100" value="100" data-axis-slider="1" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="1" class="w-9 text-left font-bold text-gray-700">100%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#43A074] min-w-[55px]">الصحي:</span>
              <input type="range" min="0" max="100" value="100" data-axis-slider="2" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="2" class="w-9 text-left font-bold text-gray-700">100%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#C53664] min-w-[55px]">الاجتماعي:</span>
              <input type="range" min="0" max="100" value="100" data-axis-slider="3" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="3" class="w-9 text-left font-bold text-gray-700">100%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#D98344] min-w-[55px]">العائلي:</span>
              <input type="range" min="0" max="100" value="100" data-axis-slider="4" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="4" class="w-9 text-left font-bold text-gray-700">100%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#C9B642] min-w-[55px]">الترفيهي:</span>
              <input type="range" min="0" max="100" value="100" data-axis-slider="5" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="5" class="w-9 text-left font-bold text-gray-700">100%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#3CB1B3] min-w-[55px]">المالي:</span>
              <input type="range" min="0" max="100" value="100" data-axis-slider="6" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="6" class="w-9 text-left font-bold text-gray-700">100%</span>
            </div>
            <div class="flex items-center justify-between gap-2 bg-gray-50/70 p-2 rounded-xl border border-gray-100">
              <span class="font-bold text-[#4474D0] min-w-[55px]">المهني:</span>
              <input type="range" min="0" max="100" value="100" data-axis-slider="7" class="custom-slider flex-1 h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer">
              <span data-axis-val="7" class="w-9 text-left font-bold text-gray-700">100%</span>
            </div>
          </div>
        </details>
      </section>

    </div>

    <!-- UX & Design Comparison Matrix (Centered) -->
    <div class="w-full max-w-[1080px] mt-12 bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-gray-200 text-center">
      <h3 class="font-messiri font-bold text-lg sm:text-xl text-[#173357] mb-4 flex items-center justify-center gap-2">
        <i class="fa-solid fa-clipboard-check text-blue-600"></i>
        <span>دليل مقارنة واجهات وتجربة المستخدم (UI / UX Insights)</span>
      </h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-xs sm:text-sm text-gray-600 font-messiri leading-relaxed text-right">
        <div class="bg-blue-50/50 p-4 rounded-2xl border border-blue-100">
          <h4 class="font-bold text-[#173357] mb-2 text-sm flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
            <span>النسخة 1: تفاوت المستويات</span>
          </h4>
          <p class="mb-2"><strong>سلوك الواجهة:</strong> يُظهر كيف تبدو العجلة عندما تكون الحياة غير متوازنة، وهو الواقع الأغلب لدى المختبرين.</p>
        </div>
        <div class="bg-slate-50/60 p-4 rounded-2xl border border-slate-200">
          <h4 class="font-bold text-slate-800 mb-2 text-sm flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-slate-500"></span>
            <span>النسخة 2: البداية من الصفر (0%)</span>
          </h4>
          <p class="mb-2"><strong>سلوك الواجهة:</strong> يُظهر الحالة البدائية (Empty State) عندما يدخل المستخدم الاختبار لأول مرة قبل الإجابة على أي سؤال.</p>
        </div>
        <div class="bg-emerald-50/50 p-4 rounded-2xl border border-emerald-100">
          <h4 class="font-bold text-emerald-800 mb-2 text-sm flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
            <span>النسخة 3: الاكتمال التام (100%)</span>
          </h4>
          <p class="mb-2"><strong>سلوك الواجهة:</strong> يُظهر الحالة القصوى الممتلئة بالكامل بأزهى ألوان التدرج الشعاعي واختبار شارة الاحتفال.</p>
        </div>
        <div class="bg-cyan-50/50 p-4 rounded-2xl border border-cyan-200">
          <h4 class="font-bold text-cyan-900 mb-2 text-sm flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-cyan-600"></span>
            <span>النسخة 4: بدون فواصل (انسياب مائي)</span>
          </h4>
          <p class="mb-2"><strong>سلوك الواجهة:</strong> يزيل تماماً الفواصل البيضاء بين الجوانب (Gap = 0px) مع انسيابية الماء (Smootherstep) من (30%-60%) إلى (80%-90%).</p>
        </div>
      </div>
    </div>

  </main>

  <!-- JSON Data Modal -->
  <div id="json-inspector-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm hidden" role="dialog" aria-modal="true">
    <div class="bg-white rounded-3xl max-w-2xl w-full p-6 shadow-2xl border border-gray-200 flex flex-col gap-4 max-h-[85vh]">
      <div class="flex items-center justify-between border-b border-gray-100 pb-3">
        <h3 class="font-messiri font-bold text-lg text-[#173357] flex items-center gap-2">
          <i class="fa-solid fa-code text-blue-600"></i>
          <span>بيانات نسب العجلات الحالية (JSON Export)</span>
        </h3>
        <button id="btn-close-json-modal" class="size-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-500 cursor-pointer">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      <p class="text-xs text-gray-500 font-messiri">
        يمكنك نسخ هذه البيانات أو استخدامها لضبط النسب المعتمدة للاختبار والتقارير.
      </p>
      <div class="relative flex-1 overflow-auto bg-gray-900 text-emerald-400 p-4 rounded-2xl font-mono text-xs text-left" dir="ltr">
        <pre id="json-scores-output">{}</pre>
      </div>
      <div class="flex items-center justify-between pt-2">
        <span id="copy-feedback" class="text-xs font-bold text-emerald-600 hidden font-messiri">
          <i class="fa-solid fa-check ml-1"></i> تم نسخ البيانات بنجاح!
        </span>
        <button id="btn-copy-json" class="ml-auto bg-[#1a3b62] hover:bg-[#112948] text-white font-messiri font-bold text-xs py-2.5 px-5 rounded-xl transition-colors flex items-center gap-1.5 cursor-pointer">
          <i class="fa-solid fa-copy"></i>
          <span>نسخ JSON</span>
        </button>
      </div>
    </div>
  </div>

  @include('website.partials.footer')

</body>
</html>
