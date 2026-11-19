{{-- Section banner of the redesigned course page (Figma 726 × 109). $label = gold eyebrow, $title, $num = "01" … --}}
<div class="cdv2-banner" @if (! empty($id)) id="{{ $id }}" @endif>
  <span class="cdv2-banner-blob" aria-hidden="true"></span>
  <span class="cdv2-banner-disc" aria-hidden="true"></span>
  <span class="cdv2-banner-dot" aria-hidden="true"></span>
  <span class="cdv2-banner-ring" aria-hidden="true"></span>
  <span class="cdv2-banner-dash" aria-hidden="true"></span>
  <span class="cdv2-banner-line" aria-hidden="true"></span>
  <p class="cdv2-banner-label">{{ $label }}</p>
  <h2 class="cdv2-banner-title"><span class="cdv2-only-d">{{ $title }}</span><span class="cdv2-only-m">{{ $titleM ?? $title }}</span></h2>
  @php
      // the number is centred in the ring: ring = 61 px circle, right 55, vertically centred in the 109 px banner → centre x 638.5 (inside the 1px border), line box 22 → top 42.5
      $numPos = [638.5, 42.5];
  @endphp
  <span class="cdv2-banner-num" style="--nx:{{ $numPos[0] }}px;--nt:{{ $numPos[1] }}px" aria-hidden="true">{{ $num }}</span>
</div>
