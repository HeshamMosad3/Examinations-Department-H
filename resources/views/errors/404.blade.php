@php
    // Life-wheel palette (same colours as the result page); one slice is missing: "something is not here"
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $missing = 5;
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
@endphp
@extends('layouts.error')

@section('seo_title', cms('errors.not_found.seo_title', 'الصفحة غير موجودة | دار الرؤى للتدريب'))

@section('content')
      <h1 id="nf-title" class="nf-rise flex items-center justify-center gap-[0.04em] font-cairo text-[104px] sm:text-[140px] lg:text-[176px] leading-none font-bold text-[#1B436C] select-none" dir="ltr" aria-label="{{ cms('errors.not_found.aria', 'خطأ 404: الصفحة غير موجودة') }}">
        <span aria-hidden="true">4</span>
        <svg viewBox="0 0 100 100" class="w-[0.82em] h-[0.82em] shrink-0 drop-shadow-sm" role="presentation" aria-hidden="true" focusable="false">
          <g class="nf-ring">
            @foreach ($slices as $i => $color)
              @continue($i === $missing)
              @php
                  [$x1, $y1] = $point($i * 45 + 5);
                  [$x2, $y2] = $point(($i + 1) * 45 - 5);
              @endphp
              <path d="M {{ $x1 }} {{ $y1 }} A 40 40 0 0 1 {{ $x2 }} {{ $y2 }}" fill="none" stroke="{{ $color }}" stroke-width="11" stroke-linecap="round" />
            @endforeach
          </g>
          <circle cx="50" cy="50" r="6" fill="#204A7A" opacity=".85" />
        </svg>
        <span aria-hidden="true">4</span>
      </h1>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <h2 class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.not_found.title', 'عذرًا، الصفحة غير موجودة') }}</h2>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ cms('errors.not_found.text', 'ربما تم نقل الصفحة أو حذفها، أو أن الرابط غير صحيح. يمكنك العودة للرئيسية أو الرجوع للصفحة السابقة.') }}</p>
      </div>
@endsection
