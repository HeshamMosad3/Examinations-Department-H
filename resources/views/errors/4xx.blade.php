@php
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
    $statusCode = $exception?->getStatusCode() ?? 400;
@endphp
@extends('layouts.error')

@section('seo_title', cms('errors.generic.seo_title', 'حدث خطأ ما | دار الرؤى للتدريب'))

@section('content')
      <div id="nf-art" class="nf-rise relative w-[160px] h-[160px] sm:w-[200px] sm:h-[200px] lg:w-[232px] lg:h-[232px] select-none" role="img" aria-label="{{ cms('errors.generic.aria', 'حدث خطأ أثناء معالجة الطلب') }}">
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
        {{-- alert octagon emblem --}}
        <svg viewBox="0 0 64 64" class="absolute inset-[24%] w-[52%] h-[52%]" aria-hidden="true" focusable="false">
          <polygon points="21,10 43,10 54,21 54,43 43,54 21,54 10,43 10,21" fill="#204A7A" />
          <polygon points="22,13 42,13 51,22 51,42 42,51 22,51 13,42 13,22" fill="#183B63" opacity="0.4" />
          <!-- Exclamation mark in center -->
          <line x1="32" y1="22" x2="32" y2="35" stroke="#FCD34D" stroke-width="4" stroke-linecap="round" />
          <circle cx="32" cy="42" r="2.5" fill="#FCD34D" />
        </svg>
      </div>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <p class="font-cairo font-bold text-[14px] tracking-widest text-[#8E98A8]" dir="ltr" aria-hidden="true">{{ $statusCode }}</p>
        <h1 id="nf-title" class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.generic.title', 'حدث خطأ ما') }}</h1>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ $exception && $exception->getMessage() ? $exception->getMessage() : cms('errors.generic.text', 'تعذر إتمام طلبك في الوقت الحالي. يمكنك المحاولة مرة أخرى أو العودة إلى الصفحة الرئيسية.') }}</p>
      </div>
@endsection
