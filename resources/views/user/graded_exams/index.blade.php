@extends('layouts.user')
@section('title', 'الشهادات والمقاييس')

@push('styles')
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Google Fonts: Cairo & Tajawal -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
  
  <script>
    tailwind.config = {
      corePlugins: {
        preflight: false, // DO NOT OVERRIDE BOOTSTRAP
      },
      theme: {
        extend: {
          fontFamily: {
            cairo: ['Cairo', 'sans-serif'],
            tajawal: ['Tajawal', 'sans-serif'],
          }
        }
      }
    }
  </script>
  
  <style>
    body {
      background-color: #f7faff !important; /* Force match background */
    }
    .bg-canvas {
      background-color: #f7faff;
      background-image: 
        radial-gradient(circle at 10% 12%, rgba(210, 235, 255, 0.75) 0%, transparent 35%),
        radial-gradient(circle at 95% 18%, rgba(219, 239, 255, 0.6) 0%, transparent 30%),
        radial-gradient(circle at 50% 100%, rgba(224, 242, 254, 0.5) 0%, transparent 40%);
      background-repeat: no-repeat;
    }
    .custom-strike {
      position: relative;
      display: inline-block;
    }
    .custom-strike::after {
      content: '';
      position: absolute;
      left: -2px;
      right: -2px;
      top: 50%;
      height: 2.2px;
      background: #e04444;
      transform: rotate(-10deg);
      border-radius: 9999px;
    }
    /* Fix Tailwind SVG rendering without preflight */
    svg { display: block; }
    /* Reset some anchor tags inside our container so they don't get bootstrap underline on hover */
    .no-underline-hover:hover { text-decoration: none; }

    /* ===== Scroll wrapper: fits the mobile screen height exactly.
       If content is short (e.g. one exam), it sits flush with no scroll.
       If content grows (multiple exams), it scrolls as a fallback. ===== */
    
    
    /* When content fits within the screen, center/stretch it to fill the height
       instead of leaving empty space at the bottom */
    .page-inner {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }
    .page-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center; /* center vertically when content is shorter than screen */
    }
  </style>
@endpush

@section('content')
<div class="bg-canvas page-scroll-wrapper w-full" id="pageScrollWrapper">
<div class="page-inner w-full max-w-[440px] md:max-w-[760px] mx-auto px-4 pt-2 pb-6" style="font-family: 'Cairo', 'Tajawal', sans-serif;">

  <div class="page-content gap-2">

    @if(session('error'))
    <div class="bg-red-50 border border-solid border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm font-bold flex items-center gap-2 mb-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      {{ session('error') }}
    </div>
    @endif

    <!-- Section Title with Ribbon Medal Icon -->
    <section class="flex items-start justify-end gap-3 mt-1 px-1 flex-row-reverse" data-purpose="page-title">
      <!-- Outer Badge Icon with Ribbon and Star -->
      <div class="relative shrink-0 mt-0.5">
        <svg class="w-11 h-11 text-[#2272e6]" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.6" viewBox="0 0 48 48">
          <path d="M24 4L28.3 7.8L33.9 6.8L36.2 12L41.5 13.9L41.2 19.6L45.4 23.5L42.4 28.3L44.1 33.7L38.7 35.5L37.7 41.2L32.1 40.5L28.5 45L24 42L19.5 45L15.9 40.5L10.3 41.2L9.3 35.5L3.9 33.7L5.6 28.3L2.6 23.5L6.8 19.6L6.5 13.9L11.8 12L14.1 6.8L19.7 7.8L24 4Z" fill="#f0f7ff"></path>
          <polygon fill="currentColor" points="24,15 26.5,21 33,21.5 28,25.5 29.5,32 24,28.5 18.5,32 20,25.5 15,21.5 21.5,21" stroke="none"></polygon>
          <path d="M16 38L12 47L20 44L22 39" fill="none" stroke="#2272e6" stroke-width="2.6"></path>
          <path d="M32 38L36 47L28 44L26 39" fill="none" stroke="#2272e6" stroke-width="2.6"></path>
        </svg>
      </div>
      <div class="flex flex-col text-right">
        <h1 class="text-[23px] font-extrabold text-[#0d2a4a] leading-tight tracking-tight mb-0">الشهادات والمقاييس</h1>
        <p class="text-[13.5px] font-semibold text-slate-500 mt-1 mb-0">اختر الشهادة أو المقياس الذي ترغب في أدائه</p>
      </div>
    </section>

    <!-- Banner: Track Progress & Exam History -->
    <a href="{{ route('user.graded_exams.progress') }}" class="w-full bg-[#1877F2] rounded-[20px] px-4 py-2 shadow-md flex items-center justify-between text-white relative overflow-hidden no-underline-hover hover:scale-[0.99] transition-transform active:scale-95 text-decoration-none" data-purpose="banner-tracker">
      <div class="flex items-center gap-3 z-10 flex-row-reverse">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0">
          <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" viewBox="0 0 36 36">
            <rect height="25" rx="5" width="24" x="6" y="7"></rect>
            <path d="M12 7V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"></path>
            <circle cx="18" cy="19" r="6" stroke-width="1.5"></circle>
            <polygon fill="currentColor" points="18,15.5 19.3,18 22,18.3 20,20 20.6,22.7 18,21.2 15.4,22.7 16,20 14,18.3 16.7,18" stroke="none"></polygon>
          </svg>
        </div>
        <div class="text-right">
          <h2 class="text-[15.5px] font-bold leading-tight mb-0 text-white">تتبع تقدمي وسجل الاختبارات</h2>
          <p class="text-[11.5px] text-blue-100 font-normal mt-0.5 mb-0">يمكنك متابعة اختباراتك السابقة ونتائجك بسهولة</p>
        </div>
      </div>
      <div aria-label="الانتقال لسجل الاختبارات" class="w-8 h-8 rounded-full bg-[#529eff] bg-opacity-70 flex items-center justify-center shrink-0 shadow-sm" type="button">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.8" viewBox="0 0 24 24">
          <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
      </div>
    </a>

    <!-- Exams list: grows naturally; wrapper scrolls if this exceeds screen height -->
    <div class="flex flex-col gap-2">
      @forelse($exams as $exam)
      <article class="w-full bg-white rounded-[22px] p-3 shadow-[0_4px_22px_-2px_rgba(0,40,100,0.07)] border border-solid border-slate-100 flex flex-col gap-1.5" data-purpose="course-details-card">
        <div class="flex items-start justify-between gap-3 flex-row-reverse">
          <div class="flex-1 text-right">
            <h3 class="text-[18px] font-black text-[#0b2447] leading-snug mb-0">
              {{ $exam->title_ar }}
            </h3>
          </div>
          <div class="w-11 h-11 p-2 rounded-2xl bg-[#e3efff] text-[#1c75fd] flex items-center justify-center shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" viewBox="0 0 32 32">
              <rect height="22" rx="3" width="20" x="5" y="4"></rect>
              <line x1="9" x2="17" y1="9" y2="9"></line>
              <line x1="9" x2="15" y1="13" y2="13"></line>
              <circle cx="21" cy="22" fill="#e3efff" r="4.5" stroke="#1c75fd" stroke-width="2"></circle>
              <path d="M19.5 26.5L18 30L21 28.5L24 30L22.5 26.5" fill="#1c75fd" stroke="none"></path>
            </svg>
          </div>
        </div>
        <p class="text-[13.5px] leading-relaxed text-slate-500 font-medium text-justify mb-0" style="direction: rtl;">
          {{ $exam->description_ar ?: 'بنك أسئلة شامل مكون من 13 وحدة دراسية، لإعداد الطالب للشهادة الاحترافية في التسويق. الصادرة عن IBTA.' }}
        </p>
        <div class="flex justify-end">
          <div class="inline-flex items-center gap-2 bg-[#E9F3FF] text-[#1e60aa] px-3.5 py-1 rounded-2xl flex-row-reverse">
            <span class="text-[14px] font-bold tracking-tight">{{ $exam->constraintSettings ? $exam->constraintSettings->total_questions : 50 }} سؤال</span>
            <svg class="w-4 h-4 text-[#1e60aa]" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
              <polyline points="14 2 14 8 20 8"></polyline>
              <line x1="16" x2="8" y1="13" y2="13"></line>
              <line x1="16" x2="8" y1="17" y2="17"></line>
              <line x1="10" x2="8" y1="9" y2="9"></line>
            </svg>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3 pt-1" style="direction: rtl;">
          <a href="{{ route('user.graded_exams.intro', $exam->id) }}" class="w-full bg-[#0fa362] hover:bg-[#0c8a52] active:scale-[0.98] transition text-white font-bold py-2 px-3 rounded-2xl flex items-center justify-center gap-2 text-[15px] shadow-sm no-underline-hover text-decoration-none">
            <span class="text-white">بدء الاختبار</span>
            <svg class="w-4 h-4 text-white rotate-180" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24">
              <line x1="19" x2="5" y1="12" y2="12"></line>
              <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
          </a>
          <a href="{{ asset('marketing-book.pdf') }}" target="_blank" download="كتاب التسويق - عربي.pdf" class="w-full bg-white hover:bg-blue-50 border border-solid border-[#2b72f5] text-[#1e60db] font-bold py-2 px-2 rounded-2xl flex items-center justify-center gap-2 text-[14px] transition no-underline-hover text-decoration-none">
            <span class="text-[#1e60db]">تحميل كتاب الشهادة</span>
            <svg class="w-4 h-4 text-[#1e60db]" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
              <polyline points="7 10 12 15 17 10"></polyline>
              <line x1="12" x2="12" y1="15" y2="3"></line>
            </svg>
          </a>
        </div>
      </article>
      @empty
      <div class="bg-white rounded-[26px] p-8 text-center shadow-sm border border-solid border-slate-100">
        <p class="text-slate-500 font-bold mb-0">لا توجد شهادات متوفرة حالياً</p>
      </div>
      @endforelse
    </div>

    <!-- Assessments Section -->
    <section class="flex items-start justify-end gap-3 mt-6 px-1 flex-row-reverse" data-purpose="section-title">
      <div class="flex flex-col text-right">
        <h2 class="text-[21px] font-extrabold text-[#0d2a4a] leading-tight tracking-tight mb-0">المقاييس السلوكية والمهنية</h2>
        <p class="text-[13.5px] font-semibold text-slate-500 mt-1 mb-0">اكتشف قدراتك وطوّر مهاراتك</p>
      </div>
    </section>

    <div class="flex flex-col gap-2 mt-2">
      @forelse($assessments as $assessment)
      <article class="w-full bg-white rounded-[22px] p-3 shadow-[0_4px_22px_-2px_rgba(0,40,100,0.07)] border border-solid border-slate-100 flex flex-col gap-1.5">
        <div class="flex items-start justify-between gap-3 flex-row-reverse">
          <div class="flex-1 text-right">
            <h3 class="text-[18px] font-black text-[#0b2447] leading-snug mb-0">
              {{ $assessment->title_ar }}
            </h3>
          </div>
          <div class="w-11 h-11 p-2 rounded-2xl bg-[#e3fdf3] text-[#0fa362] flex items-center justify-center shrink-0">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" viewBox="0 0 24 24">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
          </div>
        </div>
        <p class="text-[13.5px] leading-relaxed text-slate-500 font-medium text-justify mb-0" style="direction: rtl;">
          {{ Str::limit($assessment->description_ar, 120) }}
        </p>
        <div class="grid grid-cols-1 gap-3 pt-1" style="direction: rtl;">
          <a href="{{ route('dashboard.assessments') }}" class="w-full bg-[#1a2b56] hover:bg-[#0f172a] active:scale-[0.98] transition text-white font-bold py-2 px-3 rounded-2xl flex items-center justify-center gap-2 text-[15px] shadow-sm no-underline-hover text-decoration-none">
            <span class="text-white">تفاصيل المقياس</span>
            <svg class="w-4 h-4 text-white rotate-180" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" viewBox="0 0 24 24">
              <line x1="19" x2="5" y1="12" y2="12"></line>
              <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
          </a>
        </div>
      </article>
      @empty
      <div class="bg-white rounded-[26px] p-8 text-center shadow-sm border border-solid border-slate-100">
        <p class="text-slate-500 font-bold mb-0">لا توجد مقاييس متوفرة حالياً</p>
      </div>
      @endforelse
    </div>

    <!-- Bottom Card: Pricing & Limited Time Free Offer -->
    <section class="w-full bg-gradient-to-l from-[#dcf0ff]/60 via-[#eaf5ff]/70 to-[#f1f8ff] rounded-[22px] border border-solid border-[#bee3fd] p-3 flex items-center justify-between shadow-sm relative overflow-hidden" data-purpose="pricing-promo-card">
      <div class="relative flex items-center">
        <div class="absolute -top-3 -right-2 flex gap-1 pointer-events-none">
          <span class="w-1 h-2.5 bg-[#10b981] rounded-full rotate-45 transform"></span>
          <span class="w-1 h-3 bg-[#10b981] rounded-full rotate-12 -mt-1 transform"></span>
          <span class="w-1 h-2.5 bg-[#10b981] rounded-full -rotate-45 transform"></span>
        </div>
        <div class="bg-[#0f9f5b] text-white rounded-[18px] px-3 py-1.5 flex items-center gap-2 shadow-sm flex-row-reverse">
          <div class="flex flex-col text-right leading-tight">
            <span class="text-[16px] font-extrabold tracking-wide">مجاني</span>
            <span class="text-[10px] font-semibold text-emerald-100">لفترة محدودة</span>
          </div>
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" viewBox="0 0 24 24">
            <polyline points="20 12 20 22 4 22 4 12"></polyline>
            <rect height="5" width="20" x="2" y="7"></rect>
            <line x1="12" x2="12" y1="22" y2="7"></line>
            <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
            <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
          </svg>
        </div>
      </div>

      <div class="w-[1.5px] h-8 bg-slate-300 mx-1.5 self-center"></div>

      <div class="flex flex-col items-center justify-center flex-1">
        <span class="text-[12.5px] font-bold text-[#142d4c] mb-0">سعر الاختبار التجريبي</span>
        <div class="flex items-baseline gap-2 mt-0.5 flex-row-reverse">
          <span class="text-[14px] font-bold text-[#0c2340]">ريال</span>
          <div class="custom-strike">
            <span class="text-[23px] font-black text-[#0c2340] leading-none">199</span>
          </div>
        </div>
      </div>

      <div class="relative shrink-0 flex items-center justify-center mr-1">
        <div class="relative">
          <div class="absolute -right-3.5 top-1/2 -translate-y-1/2 flex flex-col gap-1.5 items-end pointer-events-none">
            <span class="w-3.5 h-[2.5px] bg-[#1d77ff] rounded-full"></span>
            <span class="w-2.5 h-[2.5px] bg-[#1d77ff] rounded-full"></span>
            <span class="w-4 h-[2.5px] bg-[#1d77ff] rounded-full"></span>
          </div>
          <svg class="w-10 h-10 text-[#1c77ff]" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" viewBox="0 0 24 24">
            <circle cx="12" cy="14" fill="#f0f7ff" r="8"></circle>
            <line x1="12" x2="12" y1="6" y2="3"></line>
            <line x1="10" x2="14" y1="3" y2="3"></line>
            <polyline points="12 14 12 10 15 13" stroke-width="2.4"></polyline>
            <line x1="18" x2="19.5" y1="8" y2="6.5"></line>
          </svg>
        </div>
      </div>
    </section>

  </div>
</div>
</div>
@endsection

@push('scripts')
<script>
  // Fix: mouse-wheel scroll not working on this page even though drag/touch scroll works.
  // This usually means a parent element in the layout is intercepting the wheel event
  // (preventDefault / stopPropagation). We manually move our own wrapper's scroll
  // position on wheel, independent of whatever the ancestor layout is doing.
  (function () {
    
  })();
</script>
@endpush