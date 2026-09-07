<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $exam->title_ar }}</title>
<!-- Google Fonts: Cairo -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS v3 CDN with Plugins -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Configuration Script -->
<script data-purpose="tailwind-config">
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            cairo: ['Cairo', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#f0f7ff',
              100: '#e0effe',
              500: '#2563eb',
              600: '#1d4ed8',
              700: '#1e40af',
              900: '#0f172a',
            }
          },
          boxShadow: {
            'card': '0 4px 20px -2px rgba(15, 23, 42, 0.05), 0 2px 6px -1px rgba(15, 23, 42, 0.02)',
            'card-subtle': '0 2px 10px rgba(0, 0, 0, 0.03)',
            'btn-blue': '0 8px 20px -4px rgba(37, 99, 235, 0.4)',
          }
        }
      }
    }
  </script>
<!-- Custom Typography & Layout Adjustments -->
<style data-purpose="typography">
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      overscroll-behavior: none;
    }
    body {
      font-family: 'Cairo', sans-serif;
      -webkit-tap-highlight-color: transparent;
    }
  </style>
<style data-purpose="decorations">
    .hero-glow {
      background: radial-gradient(circle, rgba(219, 234, 254, 0.8) 0%, rgba(239, 246, 255, 0.1) 70%);
    }
    /* Content is sized to fit one screen naturally. justify-center means:
       if a device is a bit taller than the content, the block centers
       instead of leaving a dead gap in one spot. If a device is shorter,
       this scrolls (rare) instead of clipping content. */
    .phone-shell {
      min-height: 100dvh;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      justify-content: center;
      max-width: 480px;
      margin-inline: auto;
      padding-inline: 1rem;
      padding-top: calc(0.65rem + env(safe-area-inset-top, 0px));
      padding-bottom: calc(0.65rem + env(safe-area-inset-bottom, 0px));
    }
    @media (min-width: 768px) {
      .phone-shell {
        max-width: 760px;
        padding-inline: 2rem;
        padding-block: 2.5rem;
      }
    }
    .custom-scrollbar::-webkit-scrollbar { display: none; }
    .custom-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="bg-[#f4f7fb] text-slate-800 antialiased selection:bg-blue-100">
<div class="phone-shell">
<div class="space-y-3">
<!-- BEGIN: HeroCard -->
<section class="bg-white rounded-[24px] p-4 shadow-card border border-slate-100 relative overflow-hidden" data-purpose="hero-section">
<div class="relative z-10">
<!-- Badge & Illustration Row -->
<div class="flex items-start justify-between gap-2">
<!-- Text and Badge Content Column -->
<div class="flex-1">
<!-- Training Exam Badge -->
<div class="inline-flex items-center gap-1.5 bg-blue-50/90 text-blue-600 px-3 py-1 rounded-full text-[11px] font-bold mb-2 border border-blue-100/60">
<svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
<path d="M12 3L1 9L12 15L21 10.09V17H23V9M5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z"></path>
</svg>
<span>اختبار تدريبي</span>
</div>
<!-- Title -->
<h1 class="text-lg sm:text-xl font-black text-slate-900 leading-[1.3] tracking-tight">
              {{ $exam->title_ar }}
            </h1>
</div>
<!-- Illustration: Clipboard & Target -->
<div class="w-20 h-20 flex-shrink-0 relative flex items-center justify-center">
<div class="absolute inset-0 hero-glow rounded-full scale-110 pointer-events-none"></div>
<svg class="w-full h-full relative z-10 drop-shadow-sm" fill="none" viewBox="0 0 130 130" xmlns="http://www.w3.org/2000/svg">
<rect fill="#E2E8F0" height="90" rx="14" width="70" x="25" y="24"></rect>
<rect fill="#FFFFFF" height="90" rx="14" stroke="#93C5FD" stroke-width="2.5" width="70" x="24" y="20"></rect>
<path d="M44 14C44 11.7909 45.7909 10 48 10H70C72.2091 10 74 11.7909 74 14V22H44V14Z" fill="#1D4ED8"></path>
<circle cx="59" cy="16" fill="#FFFFFF" r="2.5"></circle>
<rect fill="#2563EB" height="14" rx="4" width="14" x="33" y="34"></rect>
<path d="M36 41L39 44L44 38" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
<rect fill="#BFDBFE" height="4.5" rx="2.25" width="28" x="52" y="37"></rect>
<rect fill="#F8FAFC" height="14" rx="4" stroke="#93C5FD" stroke-width="1.8" width="14" x="33" y="54"></rect>
<rect fill="#E2E8F0" height="4.5" rx="2.25" width="22" x="52" y="58"></rect>
<rect fill="#F8FAFC" height="14" rx="4" stroke="#93C5FD" stroke-width="1.8" width="14" x="33" y="74"></rect>
<rect fill="#E2E8F0" height="4.5" rx="2.25" width="30" x="52" y="79"></rect>
<circle cx="95" cy="85" fill="white" r="23" stroke="#2563EB" stroke-width="5"></circle>
<circle cx="95" cy="85" fill="none" r="14" stroke="#60A5FA" stroke-width="4.5"></circle>
<circle cx="95" cy="85" fill="#1D4ED8" r="6"></circle>
<path d="M102 78L116 64" stroke="#1D4ED8" stroke-linecap="round" stroke-width="4"></path>
<path d="M112 60L120 62L118 70L112 66Z" fill="#2563EB"></path>
<path d="M110 32L116 26M103 24V16M92 20L97 27" stroke="#38BDF8" stroke-linecap="round" stroke-width="2"></path>
</svg>
</div>
</div>
<!-- Description Header -->
<div class="mt-3 flex items-center gap-2 text-slate-800">
<div class="w-5 h-5 rounded-md bg-blue-600 flex items-center justify-center text-white">
<svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
<path d="M4 6h16M4 12h16M4 18h10" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
<span class="text-sm font-black text-slate-900">وصف الاختبار</span>
</div>
<!-- Description Body Text -->
<p class="mt-1.5 text-xs leading-relaxed text-slate-500 font-medium text-justify line-clamp-2">
          {{ $exam->description_ar ?: 'يهدف هذا الاختبار إلى قياس مدى استيعابك للمفاهيم والمعارف الأساسية، ومساعدتك على تقييم جاهزيتك قبل التقدم إلى الاختبار النهائي للشهادة الاحترافية.' }}
        </p>
</div>
</section>
<!-- END: HeroCard -->
<!-- BEGIN: ExamDataCard -->
<section class="bg-white rounded-[24px] p-4 shadow-card border border-slate-100" data-purpose="exam-parameters">
<!-- Section Header -->
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">
            i
          </div>
<h2 class="text-sm font-black text-slate-900">بيانات الاختبار</h2>
</div>
<div class="h-[1px] flex-1 max-w-[150px] bg-slate-200/80 mr-2"></div>
</div>
<!-- 2x2 Grid of Exam Details -->
<div class="grid grid-cols-2 gap-2.5">
<!-- Item 1: Duration -->
<div class="bg-[#fbfcfe] border border-slate-100 rounded-2xl p-2.5 flex items-center justify-between shadow-card-subtle">
<div class="text-right">
<div class="text-sm font-black text-slate-900">{{ $timeText }}</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">مدة الاختبار</div>
</div>
<div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 flex-shrink-0">
<svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path d="M12 6v6l4 2" stroke-linecap="round" stroke-linejoin="round"></path>
<circle cx="12" cy="12" r="9"></circle>
</svg>
</div>
</div>
<!-- Item 2: Number of questions -->
<div class="bg-[#fbfcfe] border border-slate-100 rounded-2xl p-2.5 flex items-center justify-between shadow-card-subtle">
<div class="text-right">
<div class="text-sm font-black text-slate-900">{{ $questionCount }} سؤال</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">عدد الأسئلة</div>
</div>
<div class="w-8 h-8 rounded-full bg-teal-500 text-white flex items-center justify-center font-bold text-sm shadow-sm flex-shrink-0">
            ?
          </div>
</div>
<!-- Item 3: Question types -->
<div class="bg-[#fbfcfe] border border-slate-100 rounded-2xl p-2.5 flex items-center justify-between shadow-card-subtle">
<div class="text-right">
<div class="text-sm font-black text-slate-900">صح/خطأ واختياري</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">أنواع الأسئلة</div>
</div>
<div class="w-8 h-8 rounded-xl bg-purple-500 text-white flex items-center justify-center flex-shrink-0">
<svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
<rect height="18" rx="3" stroke-width="1.5" width="18" x="3" y="3"></rect>
<path d="M7 7l10 10M17 7l-2 2M7 17l2-2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
<!-- Item 4: Attempts -->
<div class="bg-[#fbfcfe] border border-slate-100 rounded-2xl p-2.5 flex items-center justify-between shadow-card-subtle">
<div class="text-right">
<div class="text-sm font-black text-slate-900">محاولات مفتوحة</div>
<div class="text-[11px] text-slate-400 font-medium mt-0.5">عدد المحاولات</div>
</div>
<div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center text-orange-500 flex-shrink-0">
<svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
<path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
</div>
</section>
<!-- END: ExamDataCard -->
<!-- BEGIN: InstructionsCard -->
<section class="bg-white rounded-[24px] p-4 shadow-card border border-slate-100" data-purpose="exam-instructions">
<!-- Section Header -->
<div class="flex items-center justify-between mb-3">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-md bg-blue-600 text-white flex items-center justify-center shadow-sm">
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
<path d="M4 6h16M4 12h16M4 18h7" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
<h2 class="text-sm font-black text-slate-900">تعليمات هامة</h2>
</div>
<div class="h-[1px] flex-1 max-w-[150px] bg-slate-200/80 mr-2"></div>
</div>
<!-- Numbered Instructions List -->
<div class="space-y-2 mb-3">
<div class="flex items-center gap-2.5">
<div class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold flex-shrink-0">
            1
          </div>
<p class="text-xs text-slate-700 font-semibold">اقرأ السؤال والبدائل بعناية.</p>
</div>
<div class="flex items-center gap-2.5">
<div class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold flex-shrink-0">
            2
          </div>
<p class="text-xs text-slate-700 font-semibold">يمكنك مراجعة وتعديل إجاباتك قبل التسليم.</p>
</div>
</div>
<!-- Alert / Warning Container -->
<div class="bg-[#f0f7ff] border border-blue-100 rounded-2xl p-3 flex items-center justify-between gap-2.5 relative overflow-hidden" data-purpose="warning-alert-box">
<!-- Text details -->
<div class="flex-1 text-right">
<div class="flex items-center gap-1 text-blue-600 mb-1">
<svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
<path clip-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" fill-rule="evenodd"></path>
</svg>
<span class="text-xs font-black">تنبيه:</span>
</div>
<p class="text-[11px] text-slate-600 font-medium leading-relaxed">
            حدد الإجابة أو الإجابات الصحيحة بناءً على المطلوب في كل سؤال، حيث قد يتطلب سؤال واحد اختيار أكثر من خيار.
          </p>
</div>
<!-- Lightbulb illustration -->
<div class="w-12 h-12 flex-shrink-0 relative flex items-center justify-center">
<div class="absolute inset-0 bg-blue-200/50 rounded-full blur-md"></div>
<svg class="w-11 h-11 relative z-10" fill="none" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
<path d="M32 6V12M14 18L18 22M50 18L46 22M8 34H14M50 34H56" stroke="#60A5FA" stroke-linecap="round" stroke-width="2"></path>
<path d="M32 16C24.268 16 18 22.268 18 30C18 34.5 20.5 38.5 24 41V46C24 47.1 24.9 48 26 48H38C39.1 48 40 47.1 40 46V41C43.5 38.5 46 34.5 46 30C46 22.268 39.732 16 32 16Z" fill="#3B82F6"></path>
<path d="M28 32C28 29.7909 29.7909 28 32 28C34.2091 28 36 29.7909 36 32V38H28V32Z" fill="none" stroke="#FFFFFF" stroke-width="1.8"></path>
<rect fill="#1D4ED8" height="3" rx="1" width="8" x="28" y="49"></rect>
<rect fill="#1E40AF" height="2.5" rx="1" width="6" x="29" y="53"></rect>
</svg>
</div>
</div>
</section>
<!-- END: InstructionsCard -->
<!-- BEGIN: ActionControls -->
<form action="{{ route('user.graded_exams.start', $exam->id) }}" method="POST" id="form-start-exam" class="m-0">
@csrf
<section class="bg-white rounded-[24px] p-3.5 shadow-card border border-slate-100 flex flex-col gap-3" data-purpose="actions-panel">
<!-- Terms and Agreement Checkbox -->
<label class="flex items-center gap-2.5 cursor-pointer select-none px-1">
<input id="agreeCheckbox" class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-0 focus:ring-offset-0 cursor-pointer" type="checkbox"/>
<span class="text-xs font-bold text-slate-800">قرأت التعليمات وأوافق على البدء.</span>
</label>
<!-- Action Buttons Row -->
<div class="flex items-center gap-3">
<!-- Start Exam Primary Button -->
<button class="flex-1 py-3 px-6 rounded-2xl bg-blue-600 hover:bg-blue-700 active:scale-[0.99] disabled:opacity-50 disabled:cursor-not-allowed transition-all text-white font-bold text-sm flex items-center justify-center gap-2 shadow-btn-blue" data-purpose="start-exam-button" id="btn-confirm-start" type="submit" disabled>
<span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center">
<svg class="w-3.5 h-3.5 fill-current rotate-180" viewBox="0 0 20 20">
<path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" fill-rule="evenodd"></path>
</svg>
</span>
<span>ابدأ الاختبار</span>
</button>
<!-- Cancel Secondary Button -->
<a href="{{ route('user.graded_exams.index') }}" class="flex-1 py-3 px-6 rounded-2xl bg-white border border-slate-200 hover:bg-slate-50 active:scale-[0.99] transition-all text-slate-700 font-bold text-sm flex items-center justify-center shadow-sm" data-purpose="cancel-button">
          إلغاء
        </a>
</div>
</section>
</form>
<!-- END: ActionControls -->
</div>
</div>

<script>
    document.getElementById('agreeCheckbox').addEventListener('change', function () {
        document.getElementById('btn-confirm-start').disabled = !this.checked;
    });

    document.getElementById('form-start-exam').addEventListener('submit', function () {
        var btn = document.getElementById('btn-confirm-start');
        btn.disabled = true;
        btn.innerHTML = '<span class="w-5 h-5 flex items-center justify-center"><svg class="animate-spin w-4 h-4" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg></span><span>جاري البدء...</span>';
    });
</script>
</body>
</html>