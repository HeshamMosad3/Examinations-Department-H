@extends('website.bootstrap.layouts.app', ['active' => 'courses'])

@section('title', 'الدورات | دار الرؤى للتدريب')
@section('description', 'اختر الدورة المناسبة لأهدافك، واكتسب خبرات جديدة تساعدك على تحقيق طموحاتك المهنية.')

@push('vite')
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/bootstrap/courses.js']) }}
@endpush

@php
    // Static UI-demo data (no backend) — see resources/data/courses.php. Figma: 3671:10129 (desktop) / 3671:7826 (mobile)
    $img = '/assets/website/images/courses';
    $ico = '/assets/website/icons/courses'; // icons exported straight from Figma
    $courses = require resource_path('data/courses.php');
    $stats = [
        ['+20 دورة', 'مسارات تدريبية مختلفة', 'stat-book', 'blue', 24],
        ['شهادات موثقة', 'معتمدة وقابلة للمشاركة', 'stat-certificate', 'green', 16],
        ['مدربون معتمدون', 'خبراء رواد بمجالهم', 'stat-user', 'gold', 24],
    ];
@endphp

@section('content')
<div class="courses-page">
  <div class="courses-wrap">

    {{-- Breadcrumb (desktop only, as in Figma) --}}
    <nav aria-label="مسار التنقل" class="courses-breadcrumb d-none d-lg-block">
      <ol class="crumb-list">
        <li><a href="{{ url('/') }}">الرئيسية</a></li>
        <li class="crumb-sep" aria-hidden="true"><img src="{{ $ico }}/breadcrumb-arrow.svg" alt="" width="7" height="13" /></li>
        <li class="is-current" aria-current="page">الدورات</li>
      </ol>
    </nav>

    {{-- ==================== HERO ==================== --}}
    <section class="courses-hero" aria-labelledby="courses-title">
      <span class="hero-glow hero-glow-top" aria-hidden="true"></span>
      <span class="hero-glow hero-glow-gold" aria-hidden="true"></span>

      <div class="hero-content">
        <div class="hero-top">
        <div class="hero-badge">
          <span class="hero-badge-part">
            <img src="{{ $ico }}/sparkle-green.svg" alt="" width="15" height="15" class="d-none d-md-inline" aria-hidden="true" />
            <img src="{{ $ico }}/sparkle-blue.svg" alt="" width="13" height="13" class="d-md-none" aria-hidden="true" />
            <span>مساحة اكتشافك الجديدة</span>
          </span>
          <span class="hero-badge-sep" aria-hidden="true">|</span>
          <span class="hero-badge-part hero-badge-part--dark">
            <i class="hero-badge-dot" aria-hidden="true"></i>
            <span class="d-none d-md-inline">منصة تعلّم تفاعلية معتمدة</span>
            <span class="d-md-none">منصة تعلّم معتمدة</span>
          </span>
        </div>

        <div class="hero-text">
          <h1 id="courses-title" class="hero-title">كل مهارة تفتح لك أفقًا وفرصة</h1>
          <p class="hero-sub">اختر الدورة المناسبة لأهدافك، واكتسب خبرات جديدة تساعدك على تحقيق طموحاتك المهنية.</p>
        </div>
        </div>

        <div class="hero-bottom">
        <div class="hero-stats d-none d-lg-flex">
          @foreach ($stats as [$stat, $note, $icon, $tone, $size])
            <div class="stat-card">
              <span class="stat-icon stat-icon--{{ $tone }}"><img src="{{ $ico }}/{{ $icon }}.svg" alt="" aria-hidden="true" /></span>
              <div>
                <div class="stat-title">{{ $stat }}</div>
                <div class="stat-note">{{ $note }}</div>
              </div>
            </div>
          @endforeach
        </div>

        <form id="course-search-form" class="hero-search" role="search" autocomplete="off">
          <span class="search-icon-box"><img src="{{ $ico }}/search.svg" alt="" aria-hidden="true" /></span>
          <input type="search" id="course-search" class="search-input" placeholder="ابحث باسم الدورة..." aria-label="ابحث باسم الدورة" />
          <button type="submit" class="search-btn">
            <span>بحث</span><img src="{{ $ico }}/search-arrow.svg" alt="" aria-hidden="true" />
          </button>
        </form>
        </div>
      </div>
    </section>

    {{-- ==================== COURSES GRID ==================== --}}
    <section aria-label="قائمة الدورات" class="courses-list">
      <div id="courses-grid" class="row courses-grid justify-content-start">
        @foreach ($courses as $c)
          <div class="col-12 col-md-6 col-xl-4 course-col" data-search="{{ $c['title'] }} {{ implode(' ', $c['cover']) }} {{ $c['desc'] }}">
            <article class="course-card">
              <div class="course-cover">
                <img src="{{ $img }}/{{ $c['img'] }}" alt="" class="course-cover-img" loading="lazy" />
                <span class="course-cover-shade" aria-hidden="true"></span>

                <div class="course-cover-inner">
                  <div class="cover-top">
                    <span class="brand-pill">
                      <span class="brand-pill-logo"><img src="/assets/website/images/logo.png" alt="" /></span>
                      <span class="brand-pill-text"><b>دار الرؤى</b><small>DAR AL-RUAA</small></span>
                    </span>
                    <span class="status-pill"><i aria-hidden="true"></i>أونلاين</span>
                  </div>

                  <div class="cover-title-block">
                    <h3 class="cover-title {{ count($c['cover']) > 1 ? 'cover-title--2' : '' }}">
                      @foreach ($c['cover'] as $line)<span>{{ $line }}</span>@endforeach
                    </h3>
                    <span class="cover-title-bar" aria-hidden="true"></span>
                  </div>

                  <div class="cover-details">
                    <div class="info-box">
                      <div class="info-row">
                        <div><small>تاريخ الدورة</small><strong>{{ $c['date'] }}</strong></div>
                        <span class="info-ico"><img src="{{ $ico }}/calendar-check.svg" alt="" aria-hidden="true" /></span>
                      </div>
                      <hr />
                      <div class="info-row">
                        <div><small>التوقيت اليومي</small><strong dir="ltr">{{ $c['time'] }}</strong></div>
                        <span class="info-ico"><img src="{{ $ico }}/clock.svg" alt="" aria-hidden="true" /></span>
                      </div>
                    </div>

                    <div class="trust-box">
                      <div class="trust-row">
                        <span class="trust-ico trust-ico--green"><img src="{{ $ico }}/gift.svg" alt="" aria-hidden="true" /></span>
                        <div><strong>مجـانـيــة</strong><small>(لا تشمل الشهادة)</small></div>
                      </div>
                      <div class="trust-row trust-row--accr">
                        <span class="trust-ico trust-ico--gold"><img src="{{ $ico }}/accredited-check.svg" alt="" aria-hidden="true" /></span>
                        <div><strong>مـعـتـمـدة</strong><small>رقم الاعتماد : {{ $c['accr'] }}</small></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="course-body">
                <span class="course-tag">الدورات التطويرية</span>
                <h3 class="course-title">@if (! empty($c['slug']))<a href="{{ route('courses.show', $c['slug']) }}">{{ $c['title'] }}</a>@else{{ $c['title'] }}@endif</h3>
                <p class="course-desc">{!! nl2br(e($c['desc'])) !!}</p>

                <div class="course-metrics">
                  <div class="metric"><img src="{{ $ico }}/metric-book.svg" alt="" aria-hidden="true" /><strong>{{ $c['days'] }}</strong><small>المدة الكلية</small></div>
                  <div class="metric"><img src="{{ $ico }}/clock-gray.svg" alt="" aria-hidden="true" /><strong>{{ $c['hours'] }}</strong><small>ساعة تدريبية</small></div>
                  <div class="metric"><img src="{{ $ico }}/metric-moon.svg" alt="" aria-hidden="true" /><strong>مسائي</strong><small>الفترة اليومية</small></div>
                </div>

                <a href="{{ ! empty($c['slug']) ? route('courses.show', $c['slug']) : '#' }}" class="course-register" aria-label="سجل الآن في {{ $c['title'] }}">
                  <span>سجل الآن</span><img src="{{ $ico }}/arrow-left.svg" alt="" aria-hidden="true" />
                </a>
              </div>
            </article>
          </div>
        @endforeach
      </div>

      <p id="courses-empty" class="courses-empty d-none">لا توجد دورات مطابقة لبحثك.</p>

      <nav id="courses-pager" class="courses-pager" aria-label="التنقل بين صفحات الدورات"
           data-icon-prev="{{ $ico }}/chevron-right.svg" data-icon-prev-off="{{ $ico }}/chevron-right-disabled.svg"
           data-icon-next="{{ $ico }}/chevron-left.svg" data-icon-next-off="{{ $ico }}/chevron-left-disabled.svg"></nav>
    </section>

  </div>
</div>
@endsection
