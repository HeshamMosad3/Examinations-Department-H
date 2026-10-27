@extends('website.bootstrap.layouts.app', ['active' => 'courses'])

@section('title', 'الدورات | دار الرؤى للتدريب')
@section('description', 'اختر الدورة المناسبة لأهدافك، واكتسب خبرات جديدة تساعدك على تحقيق طموحاتك المهنية.')

@push('styles')
  <link rel="stylesheet" href="/assets/website/bootstrap/css/courses.css" />
@endpush

@php
    // Static page data (no backend). Figma: node 3671:10129 (desktop) / 3671:7826 (mobile)
    $img = '/assets/website/images/courses';
    $courses = [
        [
            'img' => 'cybersecurity.jpg', 'cover' => ['دورة مهارات الأمن السيبراني'], 'title' => 'دورة مهارات الأمن السيبراني',
            'desc' => 'دورة تدريبية لتعلّم تقييم أمان الشبكات بأدوات سهلة، دون الحاجة إلى خبرة تقنية أو برمجية.',
            'date' => '01–05 نوفمبر 2026', 'time' => '09:00 - 4:00', 'accr' => '138127', 'days' => '5 أيام', 'hours' => '25 ساعة',
        ],
        [
            'img' => 'pmp.jpg', 'cover' => ['دورة إدارة المشاريع الاحترافية', 'PMP'], 'title' => 'إدارة المشاريع الاحترافية PMP',
            'desc' => 'دورة تدريبية لتطوير مهارات إدارة المشاريع والقيادة، وتعزيز التخطيط والتنظيم لتحقيق النجاح.',
            'date' => '07–12 نوفمبر 2026', 'time' => '09:00 - 4:00', 'accr' => '2077028', 'days' => '6 أيام', 'hours' => '35 ساعة',
        ],
        [
            'img' => 'cbp-hr.jpg', 'cover' => ['إدارة الموارد البشرية الحديثة', 'CBP'], 'title' => 'إدارة الموارد البشرية الحديثة CBP',
            'desc' => 'دورة تدريبية تهدف إلى تطوير مهارات إدارة الموارد البشرية، وتعزيز كفاءة العاملين ومواكبة التحديات في بيئة الأعمال.',
            'date' => '15–19 نوفمبر 2026', 'time' => '09:00 - 4:00', 'accr' => '189311873', 'days' => '5 أيام', 'hours' => '25 ساعة',
        ],
        [
            'img' => 'cbp-customer-service.jpg', 'cover' => ['دورة خدمة العملاء', 'CBP'], 'title' => 'دورة خدمة العملاء CBP',
            'desc' => 'دورة تدريبية تهدف إلى تطوير مهارات خدمة العملاء وتقديم تجربة مميزة تحقق رضاهم وفق المعايير الدولية.',
            'date' => '27–29 أكتوبر 2026', 'time' => '09:30 - 4:30', 'accr' => '189375272', 'days' => '3 أيام', 'hours' => '15 ساعة',
        ],
        [
            'img' => 'six-sigma.jpg', 'cover' => ['دورة 6 سيجما'], 'title' => 'دورة 6 سيجما',
            'desc' => 'دورة تدريبية لتطبيق منهجية 6 سيجما، وتحسين كفاءة العمليات، وتقليل الهدر، واتخاذ قرارات مبنية على البيانات.',
            'date' => '18–22 أكتوبر 2026', 'time' => '09:30 - 4:30', 'accr' => '44823', 'days' => '5 أيام', 'hours' => '25 ساعة',
        ],
        [
            'img' => 'tot.jpg', 'cover' => ['دورة تدريب المدربين', 'TOT'], 'title' => 'تدريب المدربين TOT',
            'desc' => 'دورة تهدف إلى تأهيل مدربين مؤثرين وتطوير مهارات تقديم التدريب ونقل المعرفة بكفاءة.',
            'date' => '25–29 أكتوبر 2026', 'time' => '09:00 - 4:00', 'accr' => '189351776', 'days' => '5 أيام', 'hours' => '25 ساعة',
        ],
    ];
    // Figma lists each row left→right; the RTL grid renders right→left, so flip every row of three
    $courses = array_map(fn ($i) => $courses[$i], [2, 1, 0, 5, 4, 3]);
    $stats = [
        ['+20 دورة', 'مسارات تدريبية مختلفة', 'fa-solid fa-book-open', 'blue'],
        ['شهادات موثقة', 'معتمدة وقابلة للمشاركة', 'fa-solid fa-award', 'green'],
        ['مدربون معتمدون', 'خبراء رواد بمجالهم', 'fa-regular fa-user', 'gold'],
    ];
@endphp

@section('content')
<div class="courses-page">
  <div class="courses-wrap">

    {{-- Breadcrumb (desktop only, as in Figma) --}}
    <nav aria-label="مسار التنقل" class="courses-breadcrumb d-none d-lg-block">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">الدورات</li>
      </ol>
    </nav>

    {{-- ==================== HERO ==================== --}}
    <section class="courses-hero" aria-labelledby="courses-title">
      <span class="hero-glow hero-glow-top" aria-hidden="true"></span>
      <span class="hero-glow hero-glow-gold" aria-hidden="true"></span>

      <div class="hero-content">
        <div class="hero-badge">
          <span class="hero-badge-part">
            <svg viewBox="0 0 24 24" width="15" height="15" aria-hidden="true"><path fill="currentColor" d="M12 2l1.9 5.6L19.5 9.5l-5.6 1.9L12 17l-1.9-5.6L4.5 9.5l5.6-1.9L12 2zm7 11l.9 2.6 2.6.9-2.6.9L19 20l-.9-2.6-2.6-.9 2.6-.9L19 13zM5 14l.7 1.8 1.8.7-1.8.7L5 19l-.7-1.8-1.8-.7 1.8-.7L5 14z"/></svg>
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

        <div class="hero-stats d-none d-lg-flex">
          @foreach ($stats as [$stat, $note, $icon, $tone])
            <div class="stat-card">
              <span class="stat-icon stat-icon--{{ $tone }}"><i class="{{ $icon }}" aria-hidden="true"></i></span>
              <div>
                <div class="stat-title">{{ $stat }}</div>
                <div class="stat-note">{{ $note }}</div>
              </div>
            </div>
          @endforeach
        </div>

        <form id="course-search-form" class="hero-search" role="search" autocomplete="off">
          <span class="search-icon-box"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></span>
          <input type="search" id="course-search" class="search-input" placeholder="ابحث باسم الدورة..." aria-label="ابحث باسم الدورة" />
          <button type="submit" class="search-btn">
            <span>بحث</span><i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
          </button>
        </form>
      </div>
    </section>

    {{-- ==================== COURSES GRID ==================== --}}
    <section aria-label="قائمة الدورات" class="courses-list">
      <div id="courses-grid" class="row g-3 g-lg-4 justify-content-center">
        @foreach ($courses as $c)
          <div class="col-12 col-md-6 col-lg-4 course-col" data-search="{{ $c['title'] }} {{ implode(' ', $c['cover']) }} {{ $c['desc'] }}">
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

                  <div class="cover-bottom">
                    <div class="cover-title-block">
                      <h3 class="cover-title">
                        @foreach ($c['cover'] as $line)<span>{{ $line }}</span>@endforeach
                      </h3>
                      <span class="cover-title-bar" aria-hidden="true"></span>
                    </div>

                    <div class="cover-details">
                      <div class="info-box">
                        <div class="info-row">
                          <div><small>تاريخ الدورة</small><strong>{{ $c['date'] }}</strong></div>
                          <span class="info-ico"><i class="fa-regular fa-calendar-check" aria-hidden="true"></i></span>
                        </div>
                        <hr />
                        <div class="info-row">
                          <div><small>التوقيت اليومي</small><strong dir="ltr">{{ $c['time'] }}</strong></div>
                          <span class="info-ico"><i class="fa-regular fa-clock" aria-hidden="true"></i></span>
                        </div>
                      </div>

                      <div class="trust-box">
                        <div class="trust-row">
                          <span class="trust-ico trust-ico--green"><i class="fa-solid fa-gift" aria-hidden="true"></i></span>
                          <div><strong>مجـانـيــة</strong><small>(لا تشمل الشهادة)</small></div>
                        </div>
                        <div class="trust-row trust-row--accr">
                          <span class="trust-ico trust-ico--gold"><i class="fa-solid fa-circle-check" aria-hidden="true"></i></span>
                          <div><strong>مـعـتـمـدة</strong><small>رقم الاعتماد : {{ $c['accr'] }}</small></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="course-body">
                <span class="course-tag">الدورات التطويرية</span>
                <h3 class="course-title">{{ $c['title'] }}</h3>
                <p class="course-desc">{{ $c['desc'] }}</p>

                <div class="course-metrics">
                  <div class="metric"><i class="fa-solid fa-book-open" aria-hidden="true"></i><strong>{{ $c['days'] }}</strong><small>المدة الكلية</small></div>
                  <div class="metric"><i class="fa-regular fa-clock" aria-hidden="true"></i><strong>{{ $c['hours'] }}</strong><small>ساعة تدريبية</small></div>
                  <div class="metric"><i class="fa-regular fa-moon" aria-hidden="true"></i><strong>مسائي</strong><small>الفترة اليومية</small></div>
                </div>

                <a href="#" class="course-register" aria-label="سجل الآن في {{ $c['title'] }}">
                  <span>سجل الآن</span><i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                </a>
              </div>
            </article>
          </div>
        @endforeach
      </div>

      <p id="courses-empty" class="courses-empty d-none">لا توجد دورات مطابقة لبحثك.</p>

      <nav id="courses-pager" class="courses-pager" aria-label="التنقل بين صفحات الدورات"></nav>
    </section>

  </div>
</div>
@endsection

@push('scripts')
  <script src="/assets/website/bootstrap/js/courses.js"></script>
@endpush
