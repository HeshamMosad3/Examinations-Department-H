@extends('website.bootstrap.layouts.app', ['active' => 'courses'])

@section('title', trim($course['title'].' '.$course['title_en']).' | دار الرؤى للتدريب')
@section('description', $course['lead'])
@section('no_header', '1')

@push('vite')
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/bootstrap/course-details-v2.js']) }}
@endpush

@php
    // Redesign (v2) — Figma "دار الرؤى للتدريب (1) Redesign", desktop 3931:12622. Data: resources/data/course-details-v2.php
    $ic = '/assets/website/icons/course-details-v2';
    $im = '/assets/website/images/course-details-v2';
    $h = $v2['hero'];
    $c = $v2['card'];
    $f = $v2['form'];
    $tb = $v2['topbar'];
    // ended course (Figma 4067:16755 desktop / 4067:19640 phone): "انتهت الدورة" bar + box instead of the countdown + booking form
    $ended = ! empty($v2['ended']);
    $ec = $v2['ended_copy'] ?? [];
@endphp

{{-- ==================== TOP BAR: countdown + logo (Figma 3931:12625, 1440 × 174) ==================== --}}
@section('before_header')
<div class="cdv2-top">
  @if ($ended)
  <div class="cdv2-countdown cdv2-countdown--ended">
    <div class="cdv2-ended-bar" dir="ltr">
      <a href="{{ route('courses.index') }}" class="cdv2-ended-bar-link"><span class="cdv2-only-d">{{ $ec['bar_link'] }}</span><span class="cdv2-only-m">{{ $ec['bar_link_m'] ?? $ec['bar_link'] }}</span></a>
      <i class="cdv2-ended-bar-sep" aria-hidden="true"></i>
      <span class="cdv2-ended-bar-state">{{ $ec['bar'] }}</span>
      <img src="{{ $ic }}/ended-calendar-check.svg" alt="" width="22" height="22" class="cdv2-ended-bar-ico" />
    </div>
  </div>
  @elseif (! empty($v2['ongoing']))
  <div class="cdv2-countdown cdv2-countdown--ended">
    <div class="cdv2-ended-bar" dir="ltr">
      <span class="cdv2-ended-bar-link">{{ $v2['ongoing']['text'] }}</span>
      <i class="cdv2-ended-bar-sep" aria-hidden="true"></i>
      <span class="cdv2-ended-bar-state">{{ $v2['ongoing']['bar'] }}</span>
      <img src="{{ $ic }}/ended-calendar-check.svg" alt="" width="22" height="22" class="cdv2-ended-bar-ico" />
    </div>
  </div>
  @else
  <div class="cdv2-countdown" data-cdv2-countdown="{{ $v2['start_at'] }}" role="timer" aria-label="{{ $tb['label'] }}">
    <div class="cdv2-cd" dir="ltr">
      {{-- Figma order: seconds, minutes, hours, days (left → right) --}}
      @foreach ([3, 2, 1, 0] as $i)
        <div class="cdv2-cd-box{{ $i === 3 ? ' is-sec' : '' }}"><b data-unit="{{ ['d', 'h', 'm', 's'][$i] }}">00</b><small>{{ $tb['units'][$i] }}</small></div>
      @endforeach
    </div>
    <div class="cdv2-cd-text" dir="ltr">
      <span class="cdv2-cd-label">{{ $tb['label'] }}</span>
      <img src="{{ $ic }}/hero-Line87.svg" alt="" width="16" height="1" class="cdv2-cd-sep" aria-hidden="true" />
      <span class="cdv2-cd-seats">{{ $tb['seats'] }}</span>
      <i class="cdv2-cd-dot" aria-hidden="true"></i>
    </div>
  </div>
  @endif
  <div class="cdv2-logobar">
    <a href="{{ url('/') }}" aria-label="الصفحة الرئيسية لدار الرؤى"><img src="{{ $im }}/hero-WhatsAppImage.png" alt="شعار دار الرؤى للتدريب" class="cdv2-logo-d" width="86" height="79" /><img src="{{ $im }}/m-logo.png" alt="شعار دار الرؤى للتدريب" class="cdv2-logo-m" width="58" height="45" /></a>
  </div>
</div>
@endsection

@section('content')
<div class="cdv2-page">
  <div class="cdv2-wrap">

    {{-- ==================== STAGE: hero + sections on the right, sticky booking form + enrollment card on the left ==================== --}}
    <div class="cdv2-stage" id="cdv2-details">

      <div class="cdv2-side">
        <div class="cdv2-form-rail">
        @if ($ended)
        <section class="cdv2-ended" aria-labelledby="cdv2-ended-t">
          <span class="cdv2-ended-glow" aria-hidden="true"></span>
          <span class="cdv2-form-logo"><img src="{{ $im }}/hero-WhatsAppImage.png" alt="" /></span>
          <div class="cdv2-ended-body">
            <div class="cdv2-ended-msg">
              <span class="cdv2-ended-ico"><span><img src="{{ $ic }}/m-success-check.svg" alt="" width="32" height="32" /></span></span>
              <div class="cdv2-ended-text">
                <h2 id="cdv2-ended-t">{{ $ec['title'] }}</h2>
                <p>{{ $ec['text'] }}</p>
              </div>
            </div>
            <a href="{{ route('courses.index') }}" class="cdv2-submit"><span>{{ $ec['button'] }}</span><img src="{{ $ic }}/hero-ArrowLeft.svg" alt="" width="12" height="12" /></a>
          </div>
        </section>
        @else
        <form class="cdv2-form" action="#" method="post" novalidate data-registered="{{ $v2['registered_demo'] ?? '' }}" data-whatsapp="https://wa.me/{{ ltrim($course['help']['phone'], '+') }}" data-start="{{ $v2['start_at'] }}" data-title="{{ trim($course['title'].' '.$course['title_en']) }}">
          <div class="cdv2-form-head">
            <span class="cdv2-form-logo"><img src="{{ $im }}/hero-WhatsAppImage.png" alt="" /></span>
            <div class="cdv2-form-title"><h2>{{ $f['title'] }}</h2><img src="{{ $ic }}/hero-Line72.svg" alt="" aria-hidden="true" /></div>
          </div>
          <div class="cdv2-form-body">
            <div class="cdv2-form-main">
            <div class="cdv2-fields">
              <label class="cdv2-field"><span class="cdv2-label"><img src="{{ $ic }}/hero-BoxiconsAsterisk.svg" alt="" width="10" height="10" />{{ $f['name'][0] }}</span><input type="text" name="name" placeholder="{{ $f['name'][1] }}" autocomplete="name" required /><span class="cdv2-err" role="alert" hidden></span></label>
              <label class="cdv2-field cdv2-field--phone"><span class="cdv2-label"><img src="{{ $ic }}/hero-BoxiconsAsterisk.svg" alt="" width="10" height="10" />{{ $f['phone'][0] }}</span>
                <span class="cdv2-input-phone" dir="ltr">
                  <input type="tel" name="phone" placeholder="{{ $f['phone'][1] }}" autocomplete="tel-national" inputmode="numeric" required />
                  <span class="cdv2-cc"><b>{{ $f['phone'][2] }}</b><img src="{{ $ic }}/hero-FlagSaudi.svg" alt="" width="28" height="28" /></span>
                </span>
                <span class="cdv2-err" role="alert" hidden></span>
              </label>
              <label class="cdv2-field"><span class="cdv2-label"><img src="{{ $ic }}/hero-BoxiconsAsterisk.svg" alt="" width="10" height="10" />{{ $f['email'][0] }}</span><input type="email" name="email" placeholder="{{ $f['email'][1] }}" autocomplete="email" required /><span class="cdv2-err" role="alert" hidden></span></label>
            </div>
            <button type="submit" class="cdv2-submit"><span>{{ $f['button'] }}</span><img src="{{ $ic }}/hero-ArrowLeft.svg" alt="" width="12" height="12" /></button>
            </div>
            <p class="cdv2-form-note">{{ $f['note'] }}</p>
          </div>
        </form>
        @endif
        </div>

      {{-- enrollment card (left column) --}}
      <aside class="cdv2-card" style="--ml:{{ $c['label_color'] ?? '#565656' }}" aria-label="التسجيل في الدورة">
        <div class="cdv2-card-top">
          <span class="cdv2-live"><i aria-hidden="true"></i>{{ $c['status'] }}</span>
          <button type="button" class="cdv2-share" id="cdv2-share" aria-label="مشاركة الدورة"><img src="{{ $ic }}/l-BasilShareOutline.svg" alt="" width="18" height="18" /></button>
        </div>
        <div class="cdv2-card-head">
          <div class="cdv2-card-title"{!! isset($c['title_k']) ? ' style="--k:'.(float) $c['title_k'].'"' : '' !!}>
            <div><strong>{{ $c['title'] }}</strong>@if (($c['title_en'] ?? '') !== '')<strong>{{ $c['title_en'] }}</strong>@endif</div>
            <span class="cdv2-card-bar"{!! ' style="--bar-w:'.(int) ($c['bar_w'] ?? 53).'px;--bar-wm:'.(int) ($c['bar_wm'] ?? 41).'px"' !!} aria-hidden="true"></span>
          </div>
          <div class="cdv2-seats{{ $ended ? ' cdv2-seats--ended' : '' }}">
            <span class="cdv2-seats-ico"><img src="{{ $ic }}/l-Icon.svg" alt="" width="18" height="18" /></span>
            <span class="cdv2-seats-text"><small>{{ $ended ? $ec['hint'] : $c['seats_hint'] }}</small><strong>{{ $ended ? $ec['next'] : $c['seats'] }}</strong></span>
            <span class="cdv2-open"><i aria-hidden="true"></i>{{ $ended ? $ec['chip'] : $c['open'] }}</span>
          </div>
        </div>
        <div class="cdv2-card-info">
          <ul class="cdv2-rows">
            @foreach ($c['rows'] as [$rk, $rl, $rv])
              <li>
                <span class="cdv2-row-label"><span class="cdv2-row-ico"><span class="cdv2-ic cdv2-ic--row-{{ $rk }}"><img src="{{ $ic }}/{{ ['calendar' => 'l-Fa7RegularCalendarCheck', 'clock' => 'l-Group', 'pin' => 'l-Group1'][$rk] }}.svg" alt="" /></span></span>{{ $rl }}</span>
                @if ($rv === null)
                  <span class="cdv2-row-val cdv2-row-range" dir="ltr"><span>{{ $c['date_to'] }}</span><em>إلى</em><span>{{ $c['date_from'] }}</span></span>
                @else
                  <span class="cdv2-row-val" @if ($rk === 'clock') dir="ltr" @endif>{{ $rv }}</span>
                @endif
              </li>
            @endforeach
          </ul>
          <div class="cdv2-metrics">
            @foreach ($c['metrics'] as [$mk, $mv, $ml])
              <div class="cdv2-metric"><span class="cdv2-ic cdv2-ic--metric cdv2-ic--m-{{ $mk }}"><img src="{{ $ic }}/{{ ['days' => 'l-Svg1', 'hours' => 'l-Group2', 'period' => 'l-Svg'][$mk] }}.svg" alt="" /></span><strong>{{ $mv }}</strong><small>{{ $ml }}</small></div>
            @endforeach
          </div>
        </div>
      </aside>
      </div>

      <section class="cdv2-hero{{ ! empty($h['plain']) ? ' cdv2-hero--plain' : '' }}{{ ! empty($h['lead_justify']) ? ' cdv2-hero--justify' : '' }}"{!! isset($h['title_h']) ? ' style="--title-h:'.(float) $h['title_h'].'px"' : '' !!} aria-labelledby="cdv2-title">
        <div class="cdv2-hero-text">
          <div class="cdv2-hero-head">
            <p class="cdv2-tag"><i aria-hidden="true"></i>{{ $h['tag'] }}</p>
            <div class="cdv2-hero-copy">
              <div class="cdv2-hero-titles">
                @if (! empty($h['title_inline']))
                <h1 id="cdv2-title" class="cdv2-title cdv2-title--inline"><span class="cdv2-only-d">{{ $h['title'] }}</span><span class="cdv2-only-m">{!! nl2br(e($h['title_m'] ?? $h['title'])) !!}</span> <span class="cdv2-title-latin" dir="ltr">{{ $h['title_en'] }}</span></h1>
                @else
                  <h1 id="cdv2-title" class="cdv2-title">{{ $h['title'] }}</h1>
                  @if (($h['title_en'] ?? '') !== '')<span class="cdv2-title-en">{{ $h['title_en'] }}</span>@endif
                @endif
              </div>
              <p class="cdv2-lead"{!! isset($h['lead_wm']) ? ' style="--lead-wm:'.(int) $h['lead_wm'].'px"' : '' !!}><span class="cdv2-only-d">{{ $h['lead'] }}</span><span class="cdv2-only-m">{{ $h['lead_m'] ?? $h['lead'] }}</span></p>
            </div>
          </div>
          <ul class="cdv2-meta" dir="ltr">
            <li><span>{{ $h['location'] }}</span><span class="cdv2-ic cdv2-ic--pin20"><img src="{{ $ic }}/hero-LocationGroup.svg" alt="" /></span></li>
            <li class="cdv2-meta-sep" aria-hidden="true"><img src="{{ $ic }}/hero-Line83.svg" alt="" /></li>
            <li><span>{{ $h['time'] }}</span><span class="cdv2-ic cdv2-ic--clock20"><img src="{{ $ic }}/hero-ClockGroup.svg" alt="" /></span></li>
            <li class="cdv2-meta-sep" aria-hidden="true"><img src="{{ $ic }}/hero-Line83.svg" alt="" /></li>
            <li><span>{{ $h['date'] }}</span><img src="{{ $ic }}/hero-CalendarCheck.svg" alt="" width="20" height="20" /></li>
          </ul>
          <ul class="cdv2-badges">
            @foreach ($h['badges'] as [$bi, $bt])
              <li><img src="{{ $ic }}/hero-{{ $bi === 'badge-icon' ? 'BadgeIcon' : 'BadgeIcon1' }}.svg" alt="" width="20" height="20" /><span>{{ $bt }}</span></li>
            @endforeach
          </ul>
        </div>
      </section>

      <div class="cdv2-discover">
        <span class="cdv2-discover-line cdv2-discover-line--r" aria-hidden="true"></span>
        <a href="#cdv2-details" class="cdv2-discover-pill"><img src="{{ $ic }}/hero-DiscoverContainer.svg" alt="" width="18" height="14" /><span>{{ $v2['discover'] }}</span></a>
        <span class="cdv2-discover-line cdv2-discover-line--l" aria-hidden="true"></span>
      </div>

      <div class="cdv2-main">

        {{-- 01 audience --}}
        <section class="cdv2-block" aria-labelledby="cdv2-s1">
          @include('website.bootstrap.partials.course-banner-v2', ['label' => $v2['audience']['label'], 'title' => $v2['audience']['title'], 'num' => '01'])
          <ul class="cdv2-aud">
            @foreach ($v2['audience']['items'] as $a)
              <li><span class="cdv2-tick"><img src="{{ $ic }}/l-HugeiconsTick2.svg" alt="" width="18" height="18" loading="lazy" decoding="async" /></span><span>{{ $a }}</span></li>
            @endforeach
          </ul>
        </section>

        {{-- 02 plan (accordion) --}}
        <section class="cdv2-block" aria-label="{{ $v2['plan']['title'] }}">
          @include('website.bootstrap.partials.course-banner-v2', ['label' => $v2['plan']['label'], 'title' => $v2['plan']['title'], 'num' => '02'])
          <div class="cdv2-acc cdv2-plan">
            @foreach ($v2['plan']['days'] as $i => $pDay)
              @php [$pTitle, $pText, $pChips] = $pDay; $pTextM = $pDay[3] ?? null; @endphp
              <div class="cdv2-item {{ $i === 0 ? 'is-open' : '' }}">
                <button type="button" class="cdv2-item-btn" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="cdv2-day-{{ $i }}">
                  <span class="cdv2-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                  <span class="cdv2-item-main">
                    <strong>{{ $pTitle }}</strong>
                    <span class="cdv2-item-body" id="cdv2-day-{{ $i }}">
                      <span class="cdv2-item-inner">
                        <span class="cdv2-item-text">@if ($pTextM)<span class="cdv2-only-d">{{ $pText }}</span><span class="cdv2-only-m">{{ $pTextM }}</span>@else{{ $pText }}@endif</span>
                        <span class="cdv2-chips">
                          @foreach ($pChips as $chip)
                            <span class="cdv2-chip"><img src="{{ $ic }}/l-HugeiconsTick01.svg" alt="" width="16" height="16" loading="lazy" decoding="async" />{{ $chip }}</span>
                          @endforeach
                        </span>
                      </span>
                    </span>
                  </span>
                  <span class="cdv2-toggle"><img src="{{ $ic }}/l-BiPlus.svg" alt="" class="ic-plus" width="18" height="18" loading="lazy" decoding="async" /><img src="{{ $ic }}/l-ClarityMinusLine.svg" alt="" class="ic-minus" width="18" height="18" loading="lazy" decoding="async" /></span>
                </button>
              </div>
            @endforeach
          </div>
        </section>

        {{-- 03 certificates --}}
        <section class="cdv2-block" aria-label="{{ $v2['certs']['title'] }}">
          @include('website.bootstrap.partials.course-banner-v2', ['label' => $v2['certs']['label'], 'title' => $v2['certs']['title'], 'num' => '03'])
          <div class="cdv2-certs">
            @foreach ($v2['certs']['items'] as $cert)
              <article class="cdv2-cert cdv2-cert--{{ $cert['key'] }}">
                <img src="{{ $ic }}/l-ArticleBefore.svg" alt="" class="cdv2-corner cdv2-corner--bl" aria-hidden="true" loading="lazy" decoding="async" />
                <img src="{{ $ic }}/l-ArticleBefore1.svg" alt="" class="cdv2-corner cdv2-corner--tl" aria-hidden="true" loading="lazy" decoding="async" />
                <img src="{{ $ic }}/l-ArticleBefore2.svg" alt="" class="cdv2-corner cdv2-corner--tr" aria-hidden="true" loading="lazy" decoding="async" />
                <img src="{{ $ic }}/l-ArticleBefore3.svg" alt="" class="cdv2-corner cdv2-corner--br" aria-hidden="true" loading="lazy" decoding="async" />
                <img src="{{ $im }}/l-Image31.png" alt="" class="cdv2-ribbon" width="25" height="46" aria-hidden="true" loading="lazy" decoding="async" />
                <div class="cdv2-cert-in">
                  <div class="cdv2-cert-logos" dir="ltr">
                    @if ($cert['key'] === 'cbp')
                      <span class="cdv2-logo cdv2-logo--a"><img src="{{ $im }}/l-Image29.png" alt="" loading="lazy" decoding="async" /></span>
                      <img src="{{ $ic }}/l-Line86.svg" alt="" class="cdv2-logo-sep" aria-hidden="true" loading="lazy" decoding="async" />
                      <span class="cdv2-logo cdv2-logo--b"><img src="{{ $im }}/l-Image28.png" alt="" loading="lazy" decoding="async" /></span>
                    @elseif ($cert['key'] === 'intl')
                      <img src="{{ $im }}/l-Logo1112.png" alt="" class="cdv2-logo-solo" width="28" height="34" loading="lazy" decoding="async" />
                    @else
                      <span class="cdv2-logo cdv2-logo--c"><img src="{{ $im }}/l-Image26.png" alt="" loading="lazy" decoding="async" /></span>
                      <img src="{{ $ic }}/l-Line86.svg" alt="" class="cdv2-logo-sep" aria-hidden="true" loading="lazy" decoding="async" />
                      <span class="cdv2-logo cdv2-logo--d"><img src="{{ $im }}/l-Image25.png" alt="" loading="lazy" decoding="async" /></span>
                    @endif
                  </div>
                  <div class="cdv2-cert-body">
                    <div class="cdv2-cert-copy">
                      <h3>{{ $cert['title'] }}</h3>
                      <p><span class="cdv2-only-d">{!! nl2br(e($cert['text'])) !!}</span><span class="cdv2-only-m">{!! nl2br(e($cert['text_m'] ?? $cert['text'])) !!}</span></p>
                    </div>
                    <img src="{{ $ic }}/l-Line82.svg" alt="" class="cdv2-cert-line" aria-hidden="true" loading="lazy" decoding="async" />
                    <div class="cdv2-price" dir="ltr">
                      <small>{{ $v2['certs']['tax'] }}</small>
                      <span class="cdv2-price-main"><span class="cdv2-price-val"><b>{{ $v2['certs']['currency'] }}</b><strong>{{ $cert['price'] }}</strong></span><img src="{{ $ic }}/l-FamiconsPricetagOutline.svg" alt="" width="14" height="14" loading="lazy" decoding="async" /></span>
                    </div>
                  </div>
                </div>
              </article>
            @endforeach
          </div>
          <div class="cdv2-dots cdv2-certs-dots" role="tablist" aria-label="{{ $v2['certs']['title'] }}"></div>
        </section>

        {{-- 04 steps --}}
        <section class="cdv2-block" aria-label="{{ $v2['steps']['title'] }}">
          @include('website.bootstrap.partials.course-banner-v2', ['label' => $v2['steps']['label'], 'title' => $v2['steps']['title'], 'num' => '04'])
          <div class="cdv2-steps">
            @foreach ([['01', 633.5, 0], ['02', 359.5, 0], ['03', 89.5, 5]] as [$sn, $sx, $sy])
              <span class="cdv2-step-n" style="left:{{ $sx }}px;top:{{ $sy }}px" aria-hidden="true">{{ $sn }}</span>
            @endforeach
            <span class="cdv2-step-path" style="left:416px"><img src="{{ $ic }}/l-Path.svg" alt="" aria-hidden="true" loading="lazy" decoding="async" /></span>
            <span class="cdv2-step-path" style="left:146px"><img src="{{ $ic }}/l-Path1.svg" alt="" aria-hidden="true" loading="lazy" decoding="async" /></span>
            @foreach ([[587.5, 66.5], [413.5, 73.5], [318.5, 69.5], [143.5, 73.5]] as [$dx, $dy])
              <i class="cdv2-step-dot" style="left:{{ $dx }}px;top:{{ $dy }}px" aria-hidden="true"></i>
            @endforeach
            <span class="cdv2-step-ico cdv2-step-ico--1"><img src="{{ $ic }}/l-BackgroundBorder.svg" alt="" aria-hidden="true" loading="lazy" decoding="async" /></span>
            <span class="cdv2-step-ico cdv2-step-ico--3"><img src="{{ $ic }}/l-BackgroundBorder1.svg" alt="" aria-hidden="true" loading="lazy" decoding="async" /></span>
            <span class="cdv2-step-ico cdv2-step-ico--2"><img src="{{ $ic }}/l-GardenWhatsappStroke16.svg" alt="" width="35" height="35" aria-hidden="true" loading="lazy" decoding="async" /></span>
            @foreach ([[581, 129], [265, 123], [40, 129]] as $si => [$tx, $ty])
              <div class="cdv2-step-text" style="left:{{ $tx }}px;top:{{ $ty }}px"><h3>{{ $v2['steps']['items'][$si][0] }}</h3><p>{{ $v2['steps']['items'][$si][1] }}</p></div>
            @endforeach
          </div>
        </section>

        {{-- 05 reviews (3 visible, slides by one card) --}}
        <section class="cdv2-block" aria-label="{{ $v2['reviews']['title'] }}">
          @include('website.bootstrap.partials.course-banner-v2', ['label' => $v2['reviews']['label'], 'title' => $v2['reviews']['title'], 'titleM' => $v2['reviews']['title_m'] ?? null, 'num' => '05'])
          <div class="cdv2-slider" id="cdv2-slider">
            <div class="cdv2-viewport">
              <div class="cdv2-track">
                @foreach ($v2['reviews']['items'] as $r)
                  <figure class="cdv2-review">
                                        <div class="cdv2-review-in">
                      <div class="cdv2-review-top">
                        <blockquote>{{ $r['text'] }}</blockquote>
                        <div class="cdv2-stars" role="img" aria-label="5 من 5"><span class="cdv2-quote" aria-hidden="true">&quot;</span>@foreach (range(1, 5) as $s)<img src="{{ $ic }}/r-star{{ $s }}.svg" alt="" width="12" height="12" loading="lazy" decoding="async" />@endforeach</div>
                      </div>
                      <figcaption>
                        <img src="{{ $im }}/r-avatar.png" alt="" width="28" height="28" loading="lazy" />
                        <span><strong>{{ $r['name'] }}</strong><small>{{ $r['role'] }}</small></span>
                      </figcaption>
                    </div>
                  </figure>
                @endforeach
              </div>
            </div>
            <div class="cdv2-dots" role="tablist" aria-label="{{ $v2['reviews']['title'] }}"></div>
          </div>
        </section>

        {{-- 06 FAQ --}}
        <section class="cdv2-block" aria-label="{{ $v2['faq']['title'] }}">
          @include('website.bootstrap.partials.course-banner-v2', ['label' => $v2['faq']['label'], 'title' => $v2['faq']['title'], 'num' => '06'])
          <div class="cdv2-acc cdv2-faq">
            @foreach ($v2['faq']['items'] as $i => [$q, $a])
              <div class="cdv2-item {{ $i === 0 ? 'is-open' : '' }}">
                <button type="button" class="cdv2-item-btn" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="cdv2-faq-{{ $i }}">
                  <span class="cdv2-faq-q">{{ $q }}</span>
                  <span class="cdv2-toggle"><img src="{{ $ic }}/l-BiPlus.svg" alt="" class="ic-plus" width="18" height="18" loading="lazy" decoding="async" /><img src="{{ $ic }}/l-ClarityMinusLine.svg" alt="" class="ic-minus" width="18" height="18" loading="lazy" decoding="async" /></span>
                </button>
                <div id="cdv2-faq-{{ $i }}" class="cdv2-item-body"><div class="cdv2-item-inner"><p class="cdv2-faq-a">{!! nl2br(e($a)) !!}</p></div></div>
              </div>
            @endforeach
          </div>
        </section>

        {{-- 07 about the centre --}}
        @php $ab = $v2['about']; @endphp
        <section class="cdv2-block" aria-label="{{ $ab['title'] }}">
          @include('website.bootstrap.partials.course-banner-v2', ['label' => $ab['label'], 'title' => $ab['title'], 'num' => '07'])
          <div class="cdv2-about">
            <div class="cdv2-stats">
              @foreach ($ab['stats'] as $stat)
                @php [$sk, $sv, $sl, $slm] = array_pad($stat, 4, null); @endphp
                <div class="cdv2-stat">
                  <div class="cdv2-stat-in">
                    <span class="cdv2-ico-box"><img src="{{ $ic }}/{{ $sk === 'education' ? 'l-FluentMdl2Education' : 'l-CilInstitution' }}.svg" alt="" width="{{ $sk === 'education' ? 32 : 28 }}" height="{{ $sk === 'education' ? 32 : 28 }}" loading="lazy" decoding="async" /></span>
                    <div class="cdv2-stat-text">@php preg_match('/^(\D*?)([\d,]+)(.*)$/us', $sv, $cm); @endphp
                    <strong @if (str_starts_with($sv, '+')) dir="ltr" @endif>{{ $cm[1] ?? '' }}<span class="cdv2-count" data-to="{{ str_replace(',', '', $cm[2] ?? '0') }}" data-comma="{{ str_contains($cm[2] ?? '', ',') ? 1 : 0 }}">{{ $cm[2] ?? $sv }}</span>{{ $cm[3] ?? '' }}</strong><span><span class="cdv2-only-d">{{ $sl }}</span><span class="cdv2-only-m">{{ $slm ?? $sl }}</span></span></div>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="cdv2-accr">
              <span class="cdv2-ico-box"><span class="cdv2-approved"><img src="{{ $ic }}/l-Group3.svg" alt="" loading="lazy" decoding="async" /></span></span>
              <div class="cdv2-accr-text"><h3>{{ $ab['accreditation'][0] }}</h3><p><span>{{ $ab['accreditation'][1] }}</span><b>{{ $ab['accreditation'][2] }}</b></p></div>
            </div>
            {{-- accreditation logos: endless marquee like the home page partners strip (3 sets, the 2nd + 3rd are decorative duplicates) --}}
            <div class="cdv2-logos" dir="ltr">
              <div class="cdv2-logos-track">
                @foreach ([0, 1, 2] as $set)
                  <ul class="cdv2-logos-set" @if ($set > 0) aria-hidden="true" @endif>
                    @foreach ($ab['logos'] as $lg)
                      @php
                          $lgMap = [
                              'ibta' => ['l-Images221', 'IBTA'],
                              'manar' => ['l-PaulScheeleInstitute1', 'منار'],
                              'tvtc' => ['l-Images211', 'المؤسسة العامة للتدريب التقني والمهني'],
                              'nelc' => ['l-Images11', 'المركز الوطني للتعليم الإلكتروني'],
                              'hrdf' => ['l-Hrdf', 'صندوق تنمية الموارد البشرية هدف'],
                              'certiport' => ['l-Certiport', 'Certiport'],
                              'oxford' => ['l-Oxford', 'Oxford Training Academy'],
                          ];
                      @endphp
                      <li class="cdv2-lg cdv2-lg--{{ $lg }}"><img src="{{ $ic }}/l-Ellipse4.svg" alt="" class="cdv2-lg-ring" aria-hidden="true" loading="lazy" decoding="async" /><span><img src="{{ $im }}/{{ $lgMap[$lg][0] }}.png" alt="{{ $set === 0 ? $lgMap[$lg][1] : '' }}" loading="lazy" /></span></li>
                    @endforeach
                  </ul>
                @endforeach
              </div>
            </div>
          </div>
        </section>

        {{-- closing countdown banner (not drawn for an ended course) --}}
        @unless ($ended)
        <section class="cdv2-closing" aria-label="{{ $v2['closing']['text'] }}">
          <span class="cdv2-closing-blob" aria-hidden="true"></span>
          <div class="cdv2-closing-in" dir="ltr">
            <div class="cdv2-cd" data-cdv2-countdown="{{ $v2['start_at'] }}" role="timer" aria-label="{{ $tb['label'] }}">
              @foreach ([3, 2, 1, 0] as $i)
                <div class="cdv2-cd-box{{ $i === 3 ? ' is-sec' : '' }}"><b data-unit="{{ ['d', 'h', 'm', 's'][$i] }}">00</b><small>{{ $tb['units'][$i] }}</small></div>
              @endforeach
            </div>
            <div class="cdv2-closing-text">
              <span class="cdv2-closing-pill"><b>{{ $v2['closing']['seats'] }}</b><img src="{{ $ic }}/l-BasilFireOutline.svg" alt="" width="14" height="14" loading="lazy" decoding="async" /></span>
              <p>{{ $v2['closing']['text'] }}<span class="cdv2-only-m">.</span></p>
            </div>
          </div>
        </section>
        @endunless
      </div>

    </div>

  </div>
</div>
@unless ($ended)
{{-- floating signup button: shown when the booking form has scrolled out of view (Figma 3931:13365) --}}
<button type="button" class="cdv2-fab" id="cdv2-fab" aria-hidden="true" tabindex="-1"><img src="{{ $ic }}/signup-compose.svg" alt="" width="20" height="20" loading="lazy" decoding="async" /><span>سجل الآن</span></button>
{{-- ==================== MODALS (Figma 3931:13462 success / 3931:13431 already registered) ==================== --}}
<div class="cdv2-modal" id="cdv2-modal-ok" role="dialog" aria-modal="true" aria-labelledby="cdv2-modal-ok-t" hidden>
  <div class="cdv2-modal-box cdv2-modal-box--ok">
    <button type="button" class="cdv2-modal-close" data-cdv2-close aria-label="إغلاق"><img src="{{ $ic }}/m-close.svg" alt="" width="24" height="24" loading="lazy" decoding="async" /></button>
    <div class="cdv2-modal-head cdv2-modal-head--ok">
      <span class="cdv2-modal-ok-ico"><span><img src="{{ $ic }}/m-success-check.svg" alt="" width="32" height="32" loading="lazy" decoding="async" /></span></span>
      <div class="cdv2-modal-text">
        <h2 id="cdv2-modal-ok-t">تم تسجيلك بنجاح!</h2>
        <p>تم حجز مقعدك في الدورة. انضم لمجموعة الواتساب<br />لتصلك التفاصيل وروابط الدخول.</p>
      </div>
    </div>
    <div class="cdv2-modal-actions">
      <a class="cdv2-modal-btn cdv2-modal-btn--wa" data-cdv2-wa href="#" target="_blank" rel="noopener"><img src="{{ $ic }}/m-whatsapp.svg" alt="" width="20" height="20" loading="lazy" decoding="async" /><span>انضم لمجموعة الواتساب</span></a>
      <button type="button" class="cdv2-modal-btn cdv2-modal-btn--outline" data-cdv2-ics><img src="{{ $ic }}/m-calendar.svg" alt="" width="20" height="20" loading="lazy" decoding="async" /><span>أضف للتقويم</span></button>
      <p class="cdv2-modal-note">يمكنك إضافة الموعد لتقويم جوالك لتذكيرك قبل البدء.</p>
    </div>
  </div>
</div>
<div class="cdv2-modal" id="cdv2-modal-dup" role="dialog" aria-modal="true" aria-labelledby="cdv2-modal-dup-t" hidden>
  <div class="cdv2-modal-box cdv2-modal-box--dup">
    <button type="button" class="cdv2-modal-close" data-cdv2-close aria-label="إغلاق"><img src="{{ $ic }}/m-close.svg" alt="" width="24" height="24" loading="lazy" decoding="async" /></button>
    <div class="cdv2-modal-head cdv2-modal-head--dup">
      <span class="cdv2-modal-user"><span class="cdv2-modal-user-c"><img src="{{ $ic }}/m-user.svg" alt="" width="32" height="32" loading="lazy" decoding="async" /></span><i><img src="{{ $ic }}/m-badge-check.svg" alt="" width="14" height="14" loading="lazy" decoding="async" /></i></span>
      <div class="cdv2-modal-text">
        <h2 id="cdv2-modal-dup-t">أنت مسجل مسبقاً في الدورة</h2>
        <p><span class="cdv2-dup-lbl">رقم الجوال</span> <b dir="ltr" data-cdv2-masked>+966 500 ••• 412</b> <span class="cdv2-dup-rest">مسجّل عندنا، وما تحتاج</span><br /><span class="cdv2-dup-lbl">تسجّل مرة ثانية.</span></p>
      </div>
    </div>
    <div class="cdv2-modal-actions">
      <a class="cdv2-modal-btn cdv2-modal-btn--wa" data-cdv2-wa href="#" target="_blank" rel="noopener"><img src="{{ $ic }}/m-whatsapp.svg" alt="" width="20" height="20" loading="lazy" decoding="async" /><span>انضم لمجموعة الواتساب</span></a>
    </div>
  </div>
</div>
@endunless
@endsection
