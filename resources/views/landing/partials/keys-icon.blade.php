{{--
    أيقونة مفتاح (K1..K7) داخل دايرة، من أصول Figma (public/landing/images/keys-test).
    $code: K1..K7 — $on: مفعّلة (دايرة زرقا وأيقونة بيضا) أو عادية (دايرة رمادية) — $circle: مقاس الدايرة — $glyph: مقاس الأيقونة جواها
    $ring: كلاس حدود الدايرة العادية (اختياري)
    $done: المحور اتجاوب كله (Figma #3396:9891): دايرة زرقا وأيقونة بيضا ممتلئة
--}}
@php
    $dir = '/landing/images/keys-test';
    $on = $on ?? false;
    $done = $done ?? false;
    $ring = $ring ?? 'border-[0.6px] md:border-[1.6px] border-[#565656] md:border-[#6f6f6f]';
    $white = $on ? '[filter:brightness(0)_invert(1)]' : '';
@endphp
@if ($done && $code !== 'K2')
  <span aria-hidden="true" class="flex shrink-0 items-center justify-center rounded-full bg-[#204a7a] {{ $circle }}">
    <span class="relative block {{ $glyph }}">
      @if ($code === 'K6')
        <span class="absolute" style="inset: 5.56% 9.73% 9.73% 5.56%"><img src="{{ $dir }}/k6-filled.svg" alt="" class="absolute block max-w-none size-full" /></span>
      @else
        <img src="{{ $dir }}/{{ ['K1' => 'k1-eye-filled', 'K3' => 'k3-filled', 'K4' => 'k4-filled', 'K5' => 'k5-filled', 'K7' => 'k7-filled'][$code] }}.svg" alt="" class="block size-full" />
      @endif
    </span>
  </span>
@elseif ($code === 'K2')
  {{-- K2 جاية من Figma كدايرة كاملة (عادية / مفعّلة) --}}
  <img src="{{ $dir }}/{{ $on ? 'k2-active' : 'k2' }}.svg" alt="" aria-hidden="true" class="block shrink-0 {{ $circle }}" />
@else
  <span aria-hidden="true" class="flex shrink-0 items-center justify-center rounded-full {{ $circle }} {{ $on ? 'bg-[#204a7a]' : 'bg-[#f5f6fa] border-solid ' . $ring }}">
    <span class="relative block overflow-hidden {{ $glyph }}">
      @switch($code)
        @case('K1')
          <img src="{{ $dir }}/k1-eye.svg" alt="" class="block size-full {{ $on ? '' : '[filter:brightness(0)_opacity(.55)]' }}" />
          @break
        @case('K3')
          <img src="{{ $dir }}/k3.svg" alt="" class="block size-full {{ $white }}" />
          @break
        @case('K4')
          <span class="absolute" style="inset: 16.67% 8.35% 12.5% 8.32%">
            <img src="{{ $dir }}/k4.svg" alt="" class="absolute block max-w-none {{ $white }}" style="inset: -3.78% -3.21%; width: calc(100% + 6.42%); height: calc(100% + 7.56%)" />
          </span>
          @break
        @case('K5')
          <img src="{{ $dir }}/k5.svg" alt="" class="block size-full {{ $white }}" />
          @break
        @case('K6')
          <span class="absolute" style="inset: 5.56% 9.73% 9.73% 5.56%">
            <img src="{{ $dir }}/k6.svg" alt="" class="absolute block max-w-none {{ $white }}" style="inset: 0 -3.16% -3.16% 0; width: calc(100% + 3.16%); height: calc(100% + 3.16%)" />
          </span>
          @break
        @case('K7')
          <img src="{{ $dir }}/k7.svg" alt="" class="block size-full {{ $white }}" />
          @break
      @endswitch
    </span>
  </span>
@endif
