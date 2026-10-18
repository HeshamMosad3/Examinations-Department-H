@php
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
@endphp
@extends('layouts.error')

@section('seo_title', cms('errors.server_error.seo_title', 'حدث خطأ في الخادم | دار الرؤى للتدريب'))

@section('content')
      <div id="nf-art" class="nf-rise relative w-[160px] h-[160px] sm:w-[200px] sm:h-[200px] lg:w-[232px] lg:h-[232px] select-none" role="img" aria-label="{{ cms('errors.server_error.aria', 'خطأ 500: حدث خطأ غير متوقع في الخادم') }}">
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
        {{-- server / wrench icon --}}
        <svg viewBox="0 0 64 64" class="absolute inset-[24%] w-[52%] h-[52%]" aria-hidden="true" focusable="false">
          <!-- Server racks / Cog emblem -->
          <rect x="14" y="14" width="36" height="10" rx="3" fill="#204A7A" />
          <circle cx="20" cy="19" r="1.5" fill="#20AD70" />
          <line x1="26" y1="19" x2="44" y2="19" stroke="#90CDF4" stroke-width="2" stroke-linecap="round" />

          <rect x="14" y="27" width="36" height="10" rx="3" fill="#204A7A" />
          <circle cx="20" cy="32" r="1.5" fill="#FCD34D" />
          <line x1="26" y1="32" x2="44" y2="32" stroke="#90CDF4" stroke-width="2" stroke-linecap="round" />

          <rect x="14" y="40" width="36" height="10" rx="3" fill="#204A7A" />
          <circle cx="20" cy="45" r="1.5" fill="#E33E5A" />
          <line x1="26" y1="45" x2="44" y2="45" stroke="#90CDF4" stroke-width="2" stroke-linecap="round" />

          <!-- Warning badge -->
          <circle cx="46" cy="45" r="7" fill="#E33E5A" />
          <text x="46" y="49" font-size="10" font-weight="bold" fill="#ffffff" text-anchor="middle" font-family="sans-serif">!</text>
        </svg>
      </div>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <p class="font-cairo font-bold text-[14px] tracking-widest text-[#8E98A8]" dir="ltr" aria-hidden="true">500</p>
        <h1 id="nf-title" class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.server_error.title', 'حدث خطأ غير متوقع في الخادم') }}</h1>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ cms('errors.server_error.text', 'نعتذر عن هذا الخطأ الفني. فريقنا يعمل على معالجته، يرجى المحاولة مرة أخرى لاحقاً.') }}</p>
      </div>
@endsection
