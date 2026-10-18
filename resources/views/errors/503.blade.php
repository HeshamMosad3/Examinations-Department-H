@php
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
@endphp
@extends('layouts.error')

@section('seo_title', cms('errors.service_unavailable.seo_title', 'الخدمة غير متوفرة حالياً | دار الرؤى للتدريب'))

@section('content')
      <div id="nf-art" class="nf-rise relative w-[160px] h-[160px] sm:w-[200px] sm:h-[200px] lg:w-[232px] lg:h-[232px] select-none" role="img" aria-label="{{ cms('errors.service_unavailable.aria', 'خطأ 503: الخدمة تحت الصيانة مؤقتاً') }}">
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
        {{-- maintenance / gear & wrench emblem --}}
        <svg viewBox="0 0 64 64" class="absolute inset-[24%] w-[52%] h-[52%]" aria-hidden="true" focusable="false">
          <!-- Central Gear / Maintenance Badge -->
          <circle cx="32" cy="32" r="16" fill="#204A7A" />
          <circle cx="32" cy="32" r="7" fill="#183B63" />
          <!-- Wrench Tool across center -->
          <path d="M22 42 L38 26 M38 26 A 4.5 4.5 0 0 0 44 20 A 4.5 4.5 0 0 0 38 20 L35 23 L41 29 L38 26" fill="none" stroke="#FCD34D" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
          <circle cx="21" cy="43" r="2.5" fill="#FCD34D" />
        </svg>
      </div>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <p class="font-cairo font-bold text-[14px] tracking-widest text-[#8E98A8]" dir="ltr" aria-hidden="true">503</p>
        <h1 id="nf-title" class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.service_unavailable.title', 'الخدمة تحت الصيانة مؤقتًا') }}</h1>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ cms('errors.service_unavailable.text', 'نجري حالياً بعض التحسينات الدورية لتقديم تجربة أفضل، وسنعود للعمل في أقرب وقت.') }}</p>
      </div>
@endsection
