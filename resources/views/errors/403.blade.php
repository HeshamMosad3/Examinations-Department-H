@php
    // Same life-wheel palette as 401 & 404: here a protective shield with a lock/slash badge sits in the center
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
@endphp
@extends('layouts.error')

@section('seo_title', cms('errors.forbidden.seo_title', 'غير مصرح بالوصول | دار الرؤى للتدريب'))

@section('content')
      <div id="nf-art" class="nf-rise relative w-[160px] h-[160px] sm:w-[200px] sm:h-[200px] lg:w-[232px] lg:h-[232px] select-none" role="img" aria-label="{{ cms('errors.forbidden.aria', 'خطأ 403: غير مصرح لك بالوصول') }}">
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
        {{-- shield icon with keyhole & diagonal restriction accent --}}
        <svg viewBox="0 0 64 64" class="absolute inset-[24%] w-[52%] h-[52%]" aria-hidden="true" focusable="false">
          <!-- Shield Body -->
          <path d="M32 6 C42 12 52 14 54 26 C54 44 42 53 32 58 C22 53 10 44 10 26 C12 14 22 12 32 6 Z" fill="#204A7A" />
          <!-- Inner Shield Contour -->
          <path d="M32 10 C40 15 48 17 50 26 C50 41 40 49 32 53 C24 49 14 41 14 26 C16 17 24 15 32 10 Z" fill="#183B63" opacity="0.5" />
          <!-- Golden Lock Keyhole inside Shield -->
          <circle cx="32" cy="27" r="4.5" fill="#FCD34D" />
          <path d="M29.5 29 L34.5 29 L36 40 L28 40 Z" fill="#FCD34D" />
          <circle cx="32" cy="40" r="2.2" fill="#FCD34D" />
        </svg>
      </div>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <p class="font-cairo font-bold text-[14px] tracking-widest text-[#8E98A8]" dir="ltr" aria-hidden="true">403</p>
        <h1 id="nf-title" class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.forbidden.title', 'غير مصرح لك بالوصول') }}</h1>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ $exception && $exception->getMessage() ? $exception->getMessage() : cms('errors.forbidden.text', 'عذرًا، لا تملك الصلاحيات الكافية للوصول إلى هذه الصفحة أو المورد المطلوب. يمكنك العودة للصفحة السابقة أو الانتقال إلى الصفحة الرئيسية.') }}</p>
      </div>
@endsection
