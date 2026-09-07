@extends('layouts.user')
@section('title', 'الشهادات الاحترافية')

@push('styles')
  <!-- Google Fonts: Cairo -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      corePlugins: {
        preflight: false, // Prevent Tailwind from overriding Bootstrap's Navbar!
      },
      theme: {
        extend: {
          fontFamily: {
            cairo: ['Cairo', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <style>
    body {
      background-color: #f8fafc; /* Very light slate/blue */
    }
    
    /* Background decorative blobs */
    .bg-blobs {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      z-index: -1;
      overflow: hidden;
      background: #f8fafc;
    }
    .blob-1 {
      position: absolute;
      top: -10%; left: -10%;
      width: 50vw; height: 50vw;
      background: radial-gradient(circle, rgba(219,234,254,0.7) 0%, rgba(219,234,254,0) 70%);
      border-radius: 50%;
    }
    .blob-2 {
      position: absolute;
      top: 20%; right: -20%;
      width: 60vw; height: 60vw;
      background: radial-gradient(circle, rgba(224,242,254,0.6) 0%, rgba(224,242,254,0) 70%);
      border-radius: 50%;
    }
    /* Fix Tailwind SVG rendering without preflight */
    svg {
      display: block;
    }
    /* Fix Bootstrap's anchor tag underline */
    a:hover {
      text-decoration: none;
    }
  </style>
@endpush

@section('content')
  <div class="bg-blobs">
    <div class="blob-1"></div>
    <div class="blob-2"></div>
  </div>

  <div class="max-w-[480px] mx-auto px-4 py-4 flex flex-col gap-5 pb-8 min-h-[70vh]" style="font-family: 'Cairo', sans-serif;">
    
    @if(session('error'))
    <div class="bg-red-50 border border-solid border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm font-bold flex items-center gap-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      {{ session('error') }}
    </div>
    @endif

    <!-- Hero Title -->
    <div class="flex flex-col items-center justify-center mt-2 mb-2 text-center">
      <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-3">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
        </svg>
      </div>
      <h1 class="text-2xl font-black text-slate-900 mb-1">الشهادات الاحترافية</h1>
      <p class="text-sm font-medium text-slate-500 mb-0">اختر الشهادة التي ترغب في أداء اختبارها</p>
    </div>

    <!-- Progress Track Button -->
    <a href="{{ route('user.graded_exams.progress') }}" class="bg-blue-500 rounded-[22px] p-4 flex items-center justify-between shadow-lg shadow-blue-500/30 text-white relative overflow-hidden hover:scale-[0.99] transition-transform active:scale-95 !text-white text-decoration-none">
      <!-- Decorative circles -->
      <div class="absolute -left-6 -top-6 w-24 h-24 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
      
      <div class="w-9 h-9 rounded-full bg-white/20 flex flex-shrink-0 items-center justify-center backdrop-blur-sm">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
      </div>
      
      <div class="flex-1 text-right px-4">
        <h3 class="font-bold text-base mb-0.5">تتبع تقدمي وسجل الاختبارات</h3>
        <p class="text-[10px] font-medium text-blue-100 mb-0">يمكنك متابعة اختباراتك السابقة ونتائجك بسهولة</p>
      </div>

      <div class="w-11 h-11 rounded-xl bg-white/20 flex flex-shrink-0 items-center justify-center backdrop-blur-sm">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
        </svg>
      </div>
    </a>

    <!-- Exams List -->
    <div class="flex flex-col gap-4 mt-2">
      @forelse($exams as $exam)
      <div class="bg-white rounded-[24px] p-5 shadow-sm border border-solid border-slate-100 flex flex-col gap-4 relative">
        
        <div class="flex gap-4 items-start">
          <div class="flex-1 text-right">
            <h2 class="text-[17px] font-black text-slate-900 leading-tight mb-2">{{ $exam->title_ar }}</h2>
            <p class="text-xs font-medium text-slate-500 leading-relaxed mb-3">
              {{ $exam->description_ar ?: 'بنك أسئلة شامل مكون من وحدات دراسية، لإعداد الطالب للشهادة الاحترافية.' }}
            </p>
            
            <div class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 px-3 py-1.5 rounded-lg text-xs font-bold">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
              </svg>
              <span>{{ $exam->constraintSettings ? $exam->constraintSettings->total_questions : 50 }} سؤال</span>
            </div>
          </div>
          
          <div class="w-14 h-14 bg-blue-50 text-blue-500 rounded-[14px] flex flex-shrink-0 items-center justify-center">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 3v5h5"></path>
              <circle cx="12" cy="12" r="3" stroke-width="2" fill="#eff6ff"></circle>
            </svg>
          </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-3 mt-1">
          <a href="{{ route('user.graded_exams.intro', $exam->id) }}" class="w-full sm:flex-1 bg-[#0ea472] hover:bg-[#0b8a5f] !text-white rounded-xl py-3 text-sm font-bold flex items-center justify-center gap-2 shadow-sm transition-colors active:scale-95 text-decoration-none">
            <span>بدء الاختبار</span>
            <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
          </a>
          <a href="{{ asset('marketing-book.pdf') }}" target="_blank" class="w-full sm:flex-1 bg-white border border-solid border-blue-200 !text-blue-600 hover:bg-blue-50 rounded-xl py-3 text-sm font-bold flex items-center justify-center gap-2 transition-colors active:scale-95 text-decoration-none">
            <span>تحميل كتاب الشهادة</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
          </a>
        </div>
      </div>
      @empty
      <div class="bg-white rounded-[24px] p-8 text-center shadow-sm border border-solid border-slate-100">
        <p class="text-slate-500 font-bold mb-0">لا توجد شهادات متوفرة حالياً</p>
      </div>
      @endforelse
    </div>

    <!-- Promo Banner -->
    <div class="bg-gradient-to-l from-[#e0f2fe] to-[#f0f9ff] rounded-[24px] p-4 flex items-center justify-between shadow-sm relative overflow-hidden mt-2 border border-solid border-blue-100">
      <div class="absolute -right-4 -bottom-4 text-blue-200 opacity-50">
        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
        </svg>
      </div>
      
      <div class="w-12 h-12 bg-white rounded-full flex flex-shrink-0 items-center justify-center shadow-sm z-10 text-blue-500">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
      
      <div class="flex-1 text-center z-10 px-2 flex flex-col items-center">
        <p class="text-[13px] font-bold text-slate-800 mb-0.5">سعر الاختبار التجريبي</p>
        <div class="flex items-center justify-center gap-2">
          <span class="text-2xl font-black text-slate-900">99 <span class="text-lg">ريال</span></span>
          <div class="w-px h-5 bg-slate-300 mx-1"></div>
          <span class="text-slate-400 font-bold line-through text-base">199</span>
        </div>
      </div>
      
      <div class="bg-[#10b981] text-white px-3 py-2 rounded-xl text-xs font-bold flex flex-col items-center justify-center shadow-sm z-10 whitespace-nowrap">
        <div class="flex items-center gap-1">
          <span>مجاني</span>
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
          </svg>
        </div>
        <span class="text-[9px] font-medium opacity-90 mt-0.5">لفترة محدودة</span>
      </div>
    </div>

  </div>
@endsection
