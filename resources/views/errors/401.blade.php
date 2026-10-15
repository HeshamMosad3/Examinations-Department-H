@php
    // Same life-wheel palette as the 404: here the ring is complete and a padlock sits in the middle
    $slices = ['#7E48CC', '#4C62D8', '#20AD70', '#E33E5A', '#D58641', '#D4AE30', '#4DC6B8', '#256699'];
    $point = fn (float $deg) => [round(50 + 40 * cos(deg2rad($deg - 90)), 2), round(50 + 40 * sin(deg2rad($deg - 90)), 2)];
@endphp
@extends('layouts.error')

@section('seo_title', cms('errors.unauthorized.seo_title', 'تسجيل الدخول مطلوب | دار الرؤى للتدريب'))

@section('content')
      <div id="nf-art" class="nf-rise relative w-[160px] h-[160px] sm:w-[200px] sm:h-[200px] lg:w-[232px] lg:h-[232px] select-none" role="img" aria-label="{{ cms('errors.unauthorized.aria', 'خطأ 401: تسجيل الدخول مطلوب') }}">
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
        {{-- padlock --}}
        <svg viewBox="0 0 64 64" class="absolute inset-[27%] w-[46%] h-[46%]" aria-hidden="true" focusable="false">
          <path d="M20 29v-7a12 12 0 0 1 24 0v7" fill="none" stroke="#204A7A" stroke-width="5" stroke-linecap="round" />
          <rect x="12" y="28" width="40" height="29" rx="8" fill="#204A7A" />
          <circle cx="32" cy="40" r="4.2" fill="#FCD34D" />
          <rect x="30" y="42" width="4" height="8" rx="2" fill="#FCD34D" />
        </svg>
      </div>

      <div class="nf-rise flex flex-col items-center gap-3" style="animation-delay: .1s">
        <p class="font-cairo font-bold text-[14px] tracking-widest text-[#8E98A8]" dir="ltr" aria-hidden="true">401</p>
        <h1 id="nf-title" class="font-bold text-[24px] sm:text-[28px] lg:text-[36px] leading-[1.3] text-[#204A7A]">{{ cms('errors.unauthorized.title', 'هذه الصفحة تحتاج إلى تسجيل الدخول') }}</h1>
        <p class="font-medium text-[15px] sm:text-[17px] lg:text-[19px] leading-[1.7] text-[#565656] max-w-[440px]">{{ cms('errors.unauthorized.text', 'ربما لم تسجّل دخولك بعد، أو انتهت جلستك. سجّل الدخول من القائمة العلوية للمتابعة، أو عُد للرئيسية أو للصفحة السابقة.') }}</p>
      </div>
@endsection
