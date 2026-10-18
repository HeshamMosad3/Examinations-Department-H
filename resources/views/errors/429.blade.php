@php
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
@endphp
@extends('layouts.error')

@section('seo_title', cms('errors.too_many_requests.seo_title', 'طلبات كثيرة جداً | دار الرؤى للتدريب'))

@section('content')
      <div id="nf-art" class="nf-rise relative w-[160px] h-[160px] sm:w-[200px] sm:h-[200px] lg:w-[232px] lg:h-[232px] select-none" role="img" aria-label="{{ cms('errors.too_many_requests.aria', 'خطأ 429: تم إرسال طلبات كثيرة جداً') }}">
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
        {{-- speedometer / tachometer / hand limit emblem --}}
        <svg viewBox="0 0 64 64" class="absolute inset-[24%] w-[52%] h-[52%]" aria-hidden="true" focusable="false">
          <!-- Circular limit gauge -->
          <circle cx="32" cy="32" r="22" fill="#204A7A" />
          <path d="M18 38 A 16 16 0 1 1 46 38" fill="none" stroke="#90CDF4" stroke-width="3" stroke-linecap="round" />
          <path d="M38 18 A 16 16 0 0 1 46 38" fill="none" stroke="#E33E5A" stroke-width="3.5" stroke-linecap="round" />
          <!-- Gauge needle pointing to red high zone -->
          <circle cx="32" cy="34" r="3" fill="#FCD34D" />
          <line x1="32" y1="34" x2="42" y2="24" stroke="#FCD34D" stroke-width="2.5" stroke-linecap="round" />
        </svg>
      </div>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <p class="font-cairo font-bold text-[14px] tracking-widest text-[#8E98A8]" dir="ltr" aria-hidden="true">429</p>
        <h1 id="nf-title" class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.too_many_requests.title', 'تم إرسال طلبات كثيرة جداً') }}</h1>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ cms('errors.too_many_requests.text', 'لقد قمت بإرسال عدد كبير من الطلبات خلال فترة وجيزة. يُرجى الانتظار دقيقة والهدوء قبل المحاولة مرة أخرى.') }}</p>
      </div>
@endsection
