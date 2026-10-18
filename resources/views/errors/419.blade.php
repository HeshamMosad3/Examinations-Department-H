@php
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
@endphp
@extends('layouts.error')

@section('seo_title', cms('errors.expired.seo_title', 'انتهت صلاحية الصفحة | دار الرؤى للتدريب'))

@section('content')
      <div id="nf-art" class="nf-rise relative w-[160px] h-[160px] sm:w-[200px] sm:h-[200px] lg:w-[232px] lg:h-[232px] select-none" role="img" aria-label="{{ cms('errors.expired.aria', 'خطأ 419: انتهت صلاحية الصفحة أو الجلسة') }}">
        <svg viewBox="0 0 100 100" class="absolute inset-0 w-full h-full drop-shadow-sm" aria-hidden="true" focusable="false">
          <g class="nf-ring">
            @foreach ($slices as $i => $color)
              @php
                  [$x1, $y1] = $point($i * 45 + 5);
                  [$x2, $y2] = $point(($i + 1) * 45 - 5);
              @endphp
              <path d="M {{ $x1 }} {{ $y1 }} A 40 40 0 0 1 {{ $x2 }} {{ $y2 }}" fill="none" stroke="{{ $color }}" stroke-width="11" stroke-linecap="round" />
            @endforeach
          </g>
        </svg>
        {{-- hourglass / clock refresh emblem --}}
        <svg viewBox="0 0 64 64" class="absolute inset-[25%] w-[50%] h-[50%]" aria-hidden="true" focusable="false">
          <!-- Circular Clock Frame -->
          <circle cx="32" cy="32" r="22" fill="#204A7A" />
          <circle cx="32" cy="32" r="18" fill="#183B63" opacity="0.4" />
          <!-- Clock Hands -->
          <line x1="32" y1="32" x2="32" y2="19" stroke="#FCD34D" stroke-width="3" stroke-linecap="round" />
          <line x1="32" y1="32" x2="42" y2="32" stroke="#FCD34D" stroke-width="3" stroke-linecap="round" />
          <circle cx="32" cy="32" r="3" fill="#FCD34D" />
          <!-- Circular Refresh / Expired Arc Indicator -->
          <path d="M48 24 A 20 20 0 0 1 48 40" fill="none" stroke="#FCD34D" stroke-width="2.5" stroke-linecap="round" stroke-dasharray="3 3" />
        </svg>
      </div>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <p class="font-cairo font-bold text-[14px] tracking-widest text-[#8E98A8]" dir="ltr" aria-hidden="true">419</p>
        <h1 id="nf-title" class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.expired.title', 'انتهت صلاحية الصفحة أو الجلسة') }}</h1>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ cms('errors.expired.text', 'بقيت الصفحة غير نشطة لفترة طويلة، يرجى تحديث الصفحة أو العودة للمحاولة من جديد.') }}</p>
      </div>
@endsection
