@extends('website.bootstrap.layouts.app', ['active' => 'courses'])

@section('title', $course['title'].' '.$course['title_en'].' | دار الرؤى للتدريب')
@section('description', $course['lead'])

@push('vite')
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/bootstrap/course-details.js']) }}
@endpush

@php
    // Static UI-demo data (no backend) — see resources/data/course-details.php. Figma: 3707:8657 (desktop) / 3707:9087 (mobile)
    $img = '/assets/website/images/course-details';
    $ico = '/assets/website/icons/course-details';
    $e = $course['enroll'];
    $details = [
        ['row-calendar', 'تاريخ الدورة', null],
        ['row-clock', 'التوقيت اليومي', $e['time']],
        ['row-pin', 'مقر الانعقاد', $e['place']],
        ['row-user', 'المدرب', $e['trainer']],
    ];
    $metrics = [
        ['metric-book', $e['days'], 'المدة الكلية'],
        ['metric-clock', $e['hours'], 'ساعة تدريبية'],
        ['metric-moon', $e['period'], 'الفترة اليومية'],
    ];
@endphp

@section('content')
<div class="cd-page">
  <div class="cd-wrap">

    {{-- Breadcrumb (desktop only, as in Figma) --}}
    <nav aria-label="مسار التنقل" class="cd-breadcrumb d-none d-xl-block">
      <ol class="crumb-list">
        <li><a href="{{ url('/') }}">الرئيسية</a></li>
        <li class="crumb-sep" aria-hidden="true"><img src="/assets/website/icons/courses/breadcrumb-arrow.svg" alt="" width="7" height="13" /></li>
        <li class="is-current"><a href="{{ route('courses.index') }}">الدورات</a></li>
      </ol>
    </nav>

    {{-- ==================== HERO ==================== --}}
    <section class="cd-hero" aria-labelledby="cd-title">
      <div class="cd-hero-text">
        <span class="cd-tag">{{ $course['tag'] }}<i aria-hidden="true"></i></span>
        <h1 id="cd-title" class="cd-title"><span>{{ $course['title'] }}</span> <bdi>{{ $course['title_en'] }}</bdi></h1>
        <p class="cd-lead">{{ $course['lead'] }}</p>
      </div>

      <div class="cd-hero-media">
        <span class="cd-hero-frame" aria-hidden="true"></span>
        <img class="cd-hero-img" src="{{ $img }}/{{ $course['hero_img'] }}" alt="فريق عمل يتعاون في تخطيط وإدارة مشروع" width="526" height="314" fetchpriority="high" />
        <div class="cd-start">
          <img src="{{ $ico }}/badge-calendar.svg" alt="" aria-hidden="true" />
          <span><small>{{ $course['start_label'] }}</small><strong>{{ $course['start_date'] }}</strong></span>
        </div>
      </div>

      <ul class="cd-badges">
        @foreach ($course['badges'] as [$bIcon, $bText])
          <li><img src="{{ $ico }}/{{ $bIcon }}.svg" alt="" aria-hidden="true" /><span>{{ $bText }}</span></li>
        @endforeach
      </ul>
    </section>

    <div class="cd-layout">

      {{-- ==================== ASIDE (booking + corporate + help) ==================== --}}
      <aside class="cd-aside" aria-label="التسجيل في الدورة">

        <div class="cd-enroll">
          <div class="cd-enroll-media">
            <img src="{{ $img }}/{{ $course['enroll']['img'] }}" alt="" class="cd-enroll-img" loading="lazy" />
            <span class="cd-enroll-shade" aria-hidden="true"></span>
            <div class="cd-enroll-top">
              <span class="cd-live"><i aria-hidden="true"></i>{{ $e['status'] }}</span>
              <button type="button" class="cd-share" id="cd-share" aria-label="مشاركة الدورة"><img src="{{ $ico }}/share.svg" alt="" aria-hidden="true" /></button>
            </div>
            <div class="cd-enroll-title">
              <strong>دورة {{ $course['title'] }}</strong>
              <strong>{{ $course['title_en'] }}</strong>
              <span class="cd-enroll-bar" aria-hidden="true"></span>
            </div>
          </div>

          <div class="cd-seats">
            <span class="cd-seats-ico"><img src="{{ $ico }}/seats.svg" alt="" aria-hidden="true" /></span>
            <div class="cd-seats-text"><small>{{ $e['seats_hint'] }}</small><strong>{{ $e['seats'] }}</strong></div>
            <span class="cd-open"><i aria-hidden="true"></i>{{ $e['open'] }}</span>
          </div>

          <ul class="cd-facts">
            @foreach ($details as [$fIcon, $fLabel, $fValue])
              <li>
                <span class="cd-fact-label"><span class="cd-fact-ico"><img src="{{ $ico }}/{{ $fIcon }}.svg" alt="" aria-hidden="true" /></span>{{ $fLabel }}</span>
                @if ($fValue === null)
                  <span class="cd-fact-value cd-fact-range" dir="ltr"><span>{{ $e['date_to'] }}</span><em>إلى</em><span>{{ $e['date_from'] }}</span></span>
                @else
                  <span class="cd-fact-value" @if ($fIcon === 'row-clock') dir="ltr" @endif>{{ $fValue }}</span>
                @endif
              </li>
            @endforeach
          </ul>

          <div class="cd-metrics">
            @foreach ($metrics as [$mIcon, $mValue, $mLabel])
              <div class="cd-metric"><img src="{{ $ico }}/{{ $mIcon }}.svg" alt="" aria-hidden="true" /><strong>{{ $mValue }}</strong><small>{{ $mLabel }}</small></div>
            @endforeach
          </div>

          <a href="#" class="cd-register"><span>سجل الآن</span><img src="{{ $ico }}/arrow-left-light.svg" alt="" aria-hidden="true" /></a>
        </div>

        <div class="cd-corporate">
          <span class="cd-corp-orb" aria-hidden="true"></span>
          <span class="cd-corp-ico"><img src="{{ $ico }}/building.svg" alt="" aria-hidden="true" /></span>
          <div class="cd-corp-text">
            <small>{{ $course['corporate']['eyebrow'] }}</small>
            <strong>{{ $course['corporate']['title'] }}</strong>
            <span>{{ $course['corporate']['text'] }}</span>
          </div>
          <button type="button" class="cd-corp-btn" data-bs-toggle="modal" data-bs-target="#cd-corp-modal"><span>{{ $course['corporate']['button'] }}</span><img src="{{ $ico }}/arrow-left-navy.svg" alt="" aria-hidden="true" /></button>
        </div>

        <div class="cd-help">
          <span class="cd-help-orb" aria-hidden="true"></span>
          <span class="cd-help-ico"><img src="{{ $ico }}/user-circle.svg" alt="" aria-hidden="true" /></span>
          <div class="cd-help-text">
            <strong>{{ $course['help']['title'] }}</strong>
            <span>{{ $course['help']['text'] }}</span>
          </div>
          <a href="https://wa.me/{{ ltrim($course['help']['phone'], '+') }}" class="cd-wa" rel="noopener" target="_blank">
            <span class="cd-wa-label">{{ $course['help']['button'] }}<img src="{{ $ico }}/whatsapp.svg" alt="" aria-hidden="true" /></span>
            <span class="cd-wa-phone" dir="ltr">{{ $course['help']['phone'] }}</span>
          </a>
        </div>
      </aside>

      {{-- ==================== MAIN COLUMN ==================== --}}
      <div class="cd-main">

        {{-- 01 overview --}}
        <section class="cd-block" aria-labelledby="cd-s1">
          @include('website.bootstrap.partials.course-section-head', ['label' => 'عن البرنامج', 'title' => 'نظرة عامة على الدورة', 'num' => '01'])
          <p class="cd-overview">{{ $course['overview'] }}</p>
          <div class="cd-audience">
            <span class="cd-audience-ico"><img src="{{ $ico }}/users.svg" alt="" aria-hidden="true" /></span>
            <div>
              <h3>{{ $course['audience_title'] }}</h3>
              <p>{!! nl2br(e($course['audience'])) !!}</p>
            </div>
          </div>
        </section>

        {{-- 02 gains (collapsible) --}}
        <section class="cd-block" aria-label="مكتسباتك من الدورة">
          @include('website.bootstrap.partials.course-section-head', ['label' => 'ماذا ستتعلم؟', 'title' => 'مكتسباتك من الدورة', 'num' => '02', 'toggle' => 'cd-gains'])
          <div id="cd-gains" class="cd-collapse is-open">
            <ul class="cd-gains">
              @foreach ($course['gains'] as $g)
                <li><span>{{ $g }}</span><img src="{{ $ico }}/tick-badge.svg" alt="" aria-hidden="true" /></li>
              @endforeach
            </ul>
          </div>
        </section>

        {{-- 03 plan (accordion, items open/close independently) --}}
        <section class="cd-block" aria-label="محاور الدورة">
          @include('website.bootstrap.partials.course-section-head', ['label' => 'الخطة التدريبية', 'title' => 'محاور الدورة', 'num' => '03'])
          <div class="cd-acc cd-days">
            @foreach ($course['days'] as $i => [$dLabel, $dTitle, $dText, $dChips])
              <div class="cd-item {{ $i === 0 ? 'is-open' : '' }}">
                <button type="button" class="cd-item-btn" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="cd-day-{{ $i }}">
                  <span class="cd-item-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                  <span class="cd-item-head"><small>{{ $dLabel }}</small><strong>{{ $dTitle }}</strong></span>
                  <span class="cd-item-icon"><img src="{{ $ico }}/minus.svg" alt="" class="ic-minus" aria-hidden="true" /><img src="{{ $ico }}/plus.svg" alt="" class="ic-plus" aria-hidden="true" /></span>
                </button>
                <div id="cd-day-{{ $i }}" class="cd-item-body">
                  <div class="cd-item-inner">
                    <p>{{ $dText }}</p>
                    <ul class="cd-chips">
                      @foreach ($dChips as $chip)
                        <li><img src="{{ $ico }}/chip-tick.svg" alt="" aria-hidden="true" />{{ $chip }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </section>

        {{-- 04 reviews (slider) --}}
        <section class="cd-block" aria-label="آراء العملاء">
          @include('website.bootstrap.partials.course-section-head', ['label' => 'تجارب المتدربين', 'title' => 'آراء العملاء', 'titleHtml' => '<span class="d-xl-none">آراء المتدربين</span><span class="d-none d-xl-inline">آراء العملاء</span>', 'num' => '04'])
          <div class="cd-slider" id="cd-slider">
            <div class="cd-viewport">
              <div class="cd-track">
                @foreach ($course['reviews'] as $r)
                  <figure class="cd-review">
                    <span class="cd-quote" aria-hidden="true">&quot;</span>
                    <blockquote>{{ $r['text'] }}</blockquote>
                    <div class="cd-stars" role="img" aria-label="5 من 5">@for ($s = 0; $s < 5; $s++)<img src="{{ $ico }}/star.svg" alt="" />@endfor</div>
                    <figcaption>
                      <img src="{{ $img }}/avatar.webp" alt="" width="40" height="40" loading="lazy" />
                      <span><strong>{{ $r['name'] }}</strong><small>{{ $r['role'] }}</small></span>
                    </figcaption>
                  </figure>
                @endforeach
              </div>
            </div>
            <div class="cd-dots" role="tablist" aria-label="آراء العملاء"></div>
          </div>
        </section>

        {{-- 05 FAQ --}}
        <section class="cd-block" aria-label="الأسئلة الشائعة">
          @include('website.bootstrap.partials.course-section-head', ['label' => 'معلومات مهمة', 'title' => 'الأسئلة الشائعة', 'num' => '05'])
          <div class="cd-acc cd-faq">
            @foreach ($course['faq'] as $i => [$q, $a])
              <div class="cd-item {{ $i === 0 ? 'is-open' : '' }}">
                <button type="button" class="cd-item-btn" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}" aria-controls="cd-faq-{{ $i }}">
                  <span class="cd-item-q">{{ $q }}</span>
                  <span class="cd-item-icon"><img src="{{ $ico }}/faq-minus.svg" alt="" class="ic-minus" aria-hidden="true" /><img src="{{ $ico }}/faq-plus.svg" alt="" class="ic-plus" aria-hidden="true" /></span>
                </button>
                <div id="cd-faq-{{ $i }}" class="cd-item-body">
                  <div class="cd-item-inner"><p>{!! nl2br(e($a)) !!}</p></div>
                </div>
              </div>
            @endforeach
          </div>
        </section>

      </div>
    </div>

  </div>
</div>
@include('website.bootstrap.partials.course-corp-modal')
@endsection
