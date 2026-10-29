{{-- Dark section banner of the course-details page. Props: $label (gold eyebrow), $title, $num, optional $toggle (id of the panel it collapses) --}}
<div class="cd-head" @if (! empty($toggle)) data-cd-collapse="{{ $toggle }}" @endif>
  <span class="cd-head-orb cd-head-orb--big" aria-hidden="true"></span>
  <span class="cd-head-orb cd-head-orb--blur" aria-hidden="true"></span>
  <span class="cd-head-orb cd-head-orb--ring" aria-hidden="true"></span>
  <span class="cd-head-orb cd-head-orb--gold" aria-hidden="true"></span>
  <span class="cd-head-eyebrow"><i aria-hidden="true"></i>{{ $label }}</span>
  <h2 class="cd-head-title">{!! $titleHtml ?? e($title) !!}</h2>
  <span class="cd-head-line" aria-hidden="true"></span>
  <span class="cd-head-num">{{ $num }}</span>
  @if (! empty($toggle))
    <button type="button" class="cd-head-toggle" aria-expanded="true" aria-controls="{{ $toggle }}" aria-label="{{ $title }}">
      <img src="{{ $ico }}/toggle-up.svg" alt="" aria-hidden="true" />
    </button>
  @endif
</div>
