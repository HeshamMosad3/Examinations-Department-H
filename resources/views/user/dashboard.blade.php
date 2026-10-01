@extends('layouts.user')
@section('title', 'الرئيسية')

@push('styles')
<style>
/* Reset container padding for full-width mobile experience */
main.container { padding: 0 !important; max-width: 100% !important; background: #fff; }
#alert-container.container { max-width: 100% !important; padding: 0 15px !important; }

/* Global Fonts & Colors */
body { font-family: 'Noto Kufi Arabic', sans-serif; background: #fff; }
.text-primary-custom { color: #1a2b56; } /* Dark Blue */
.text-warning-custom { color: #f59e0b; } /* Gold/Yellow */

/* ── Hero Section ── */
.hero-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 15px;
    background-color: #f8f9fa;
}
.hero-text {
    width: 60%;
    padding-left: 10px;
}
.hero-text h1 {
    color: #1a2b56;
    font-weight: 800;
    font-size: 1.4rem;
    line-height: 1.3;
    margin-bottom: 10px;
}
.hero-text p {
    color: #4a5568;
    font-size: 0.75rem;
    line-height: 1.5;
    margin-bottom: 0;
}
.hero-image-wrap {
    width: 40%;
}
.hero-image {
    width: 100%;
    border-radius: 12px;
}

/* ── Category Filter ── */
.category-filter {
    display: flex;
    justify-content: space-between;
    padding: 15px 10px;
    gap: 8px;
    overflow-x: auto;
    scrollbar-width: none;
}
.category-filter::-webkit-scrollbar { display: none; }
.cat-btn {
    flex: 1;
    text-align: center;
    white-space: nowrap;
    padding: 8px 6px;
    border-radius: 8px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #4a5568;
    font-weight: 700;
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-decoration: none;
}
.cat-btn.active {
    background: #1a2b56;
    color: #ffffff;
    border-color: #1a2b56;
}

/* ── Stats Row ── */
.stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
    padding: 15px 10px;
    background: #fff;
    border-top: 1px solid #f1f5f9;
    border-bottom: 1px solid #f1f5f9;
}
.stat-box {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.stat-box i { font-size: 1.4rem; color: #d97706; margin-bottom: 6px; }
.stat-box h5 { margin: 0; font-weight: 800; color: #1a2b56; font-size: 0.9rem; }
.stat-box p { margin: 0; font-size: 0.6rem; color: #64748b; line-height: 1.3; }

/* ── Assessments Grid ── */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 15px 15px;
    background: #fff;
}
.section-header h3 {
    color: #1a2b56;
    font-weight: 800;
    font-size: 1.2rem;
    margin: 0;
}
.section-header a {
    color: #64748b;
    font-size: 0.75rem;
    text-decoration: none;
    font-weight: 700;
}
.assessments-grid {
    padding: 0 4px 20px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    align-items: stretch;
    gap: 10px;
    background: #fff;
}
.assessment-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #f1f5f9;
    border-top: 4px solid #00b4d8;
    padding: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;
    min-width: 0;
}
.card-header-top {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 12px;
}
.card-icon {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1.5px solid #1a2b56;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1a2b56;
    font-size: 0.8rem;
    flex-shrink: 0;
    margin-top: 2px;
}
.card-title-area {
    text-align: right;
    flex-grow: 1;
    min-height: 70px;
}
.card-title {
    color: #1a2b56;
    font-weight: bold;
    font-size: 0.8rem;
    line-height: 1.3;
    margin-bottom: 2px;
    min-height: 32px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.card-desc {
    color: #64748b;
    font-size: 0.6rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.assessment-card img.cover {
    width: 100%;
    height: 60px;
    object-fit: cover;
    object-position: center 30%;
    border-radius: 8px;
    margin-bottom: 12px;
}
.card-meta {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 0;
    margin-bottom: 12px;
    font-size: 0.55rem;
    color: #475569;
    font-weight: 700;
}
.card-meta div {
    display: flex;
    align-items: center;
    gap: 4px;
}
.card-meta .divider {
    color: #cbd5e1;
    font-weight: 300;
}
.card-price-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    gap: 6px;
}
.card-price {
    color: #1e3a8a;
    font-weight: 900;
    font-size: 0.85rem;
    white-space: nowrap;
}
.card-price span { font-size: 0.55rem; font-weight: bold; color: #64748b; }
.btn-primary-custom {
    background: #1a2b56;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 6px 0;
    font-weight: 800;
    font-size: 0.7rem;
    white-space: nowrap;
    width: 100%;
    text-align: center;
    box-shadow: 0 4px 6px rgba(26, 43, 86, 0.15);
}
.btn-primary-custom:hover {
    background: #0f172a;
}
.btn-secondary-custom {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    width: 100%;
    color: #3b82f6;
    background: transparent;
    border: none;
    padding: 4px 0;
    font-size: 0.65rem;
    font-weight: 800;
    text-decoration: none;
    transition: all 0.2s;
}
.btn-secondary-custom:hover {
    color: #2563eb;
    text-decoration: underline;
}

/* ── Desktop Overrides for Assessments Grid ── */
@media (min-width: 768px) {
    .stats-row { grid-template-columns: repeat(4, 1fr); }
    .assessments-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        padding: 0 15px 20px;
    }
    .assessment-card { padding: 16px; }
    .card-header-top { gap: 12px; margin-bottom: 12px; }
    .card-icon { width: 32px; height: 32px; font-size: 0.9rem; margin-top: 2px; }
    .card-title { font-size: 0.95rem; line-height: 1.3; min-height: auto; }
    .card-desc { font-size: 0.65rem; -webkit-line-clamp: 2; line-height: 1.4; margin-bottom: 10px; }
    .assessment-card img.cover { height: 90px; border-radius: 8px; margin-bottom: 16px; }
    .card-meta { justify-content: space-between; font-size: 0.6rem; margin-bottom: 16px; gap: 8px; }
    .card-price-row { margin-bottom: 12px; gap: 8px; }
    .card-price { font-size: 1rem; }
    .card-price span { font-size: 0.75rem; }
    .btn-primary-custom { width: auto; padding: 6px 12px; font-size: 0.75rem; border-radius: 6px; }
    .btn-secondary-custom { padding: 6px 12px; font-size: 0.75rem; border-radius: 6px; }
}

@media (min-width: 992px) {
    .assessments-grid { grid-template-columns: repeat(4, 1fr); }
    .assessment-card img.cover { height: 120px; }
    .card-title { font-size: 1.1rem; }
    .card-price { font-size: 1.2rem; }
}

/* ── Features Section ── */
.features-section {
    padding: 20px 15px;
    background: #fff;
    border-top: 1px solid #f1f5f9;
}
.features-title {
    color: #1a2b56;
    font-weight: 800;
    margin-bottom: 20px;
    font-size: 1.1rem;
}
.features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}
.feature-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 6px;
}
.feature-box i { font-size: 1.5rem; color: #d97706; }
.feature-box h6 { color: #1a2b56; font-weight: 800; margin-bottom: 2px; font-size: 0.75rem; }
.feature-box p { color: #64748b; font-size: 0.55rem; margin: 0; line-height: 1.4; }

/* ── Testimonials ── */
.testimonials-section {
    padding: 20px 15px;
    background: #fff;
    border-top: 1px solid #f1f5f9;
}
.testimonials-title {
    color: #1a2b56;
    font-weight: 800;
    margin-bottom: 20px;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 8px;
}
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
}
.testimonial-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 12px;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.testimonial-text {
    font-size: 0.65rem;
    color: #4a5568;
    line-height: 1.6;
    font-weight: 600;
    margin-bottom: 15px;
    text-align: center;
}
.testimonial-text::before { content: "❝"; font-size: 0.9rem; color: #f59e0b; margin-left: 2px; }
.testimonial-text::after { content: "❞"; font-size: 0.9rem; color: #f59e0b; margin-right: 2px; }
.testimonial-user {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 5px;
}
.testimonial-user img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
}
.testimonial-user h6 { margin: 0; color: #1a2b56; font-weight: 800; font-size: 0.65rem; }
.testimonial-user p { margin: 0; color: #64748b; font-size: 0.55rem; }
.stars { color: #f59e0b; font-size: 0.6rem; margin-top: 4px; }

/* ── Footer CTA ── */
.footer-cta {
    background: #1a2b56;
    color: #ffffff;
    padding: 20px 15px;
    text-align: center;
    border-radius: 16px 16px 0 0;
    margin: 15px 15px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.footer-cta-text {
    text-align: right;
}
.footer-cta h4 { font-weight: 800; margin-bottom: 6px; font-size: 1rem; }
.footer-cta p { font-size: 0.65rem; opacity: 0.9; margin-bottom: 0; }
.btn-cta {
    background: #d97706;
    color: #ffffff;
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 0.75rem;
    text-decoration: none;
    white-space: nowrap;
}
</style>
@endpush

@section('content')

<!-- Hero Section -->
<div class="hero-section" style="padding: 30px 20px; background: linear-gradient(to left, #ffffff, #f8f9fa); border-radius: 0 0 20px 20px; gap: 20px;">
    <div class="hero-text" style="width: 55%; padding-left: 15px;">
        <h1 class="fw-bolder" style="color: #1a2b56; font-size: clamp(1.6rem, 4vw, 3rem); line-height: 1.4; margin-bottom: 12px;">
            المقاييس المهنية<br>والشخصية
        </h1>
        <p style="color: #4a5568; font-size: clamp(0.75rem, 1.5vw, 1.1rem); line-height: 1.6; margin-bottom: 0;">
            اكتشف قدراتك ومهاراتك من خلال مقاييس علمية معتمدة وتقارير تفصيلية تساعدك على التطوير واتخاذ القرارات بثقة.
        </p>
    </div>
    <div class="hero-image-wrap" style="width: 45%; text-align: left;">
        <img src="{{ asset('images/dashboard/hero_banner_new.jpg') }}" alt="Hero Banner" class="hero-image" style="width: 100%; max-height: 400px; border-radius: 12px; object-fit: cover;">
    </div>
</div>

<!-- Category Filter -->
<div class="category-filter">
    <a href="javascript:void(0)" class="cat-btn btn-category active" data-filter="all"><i class="bi bi-grid-fill"></i> جميع المقاييس</a>
    @php
        // Extract unique categories from active assessments
        $uniqueCategories = $assessments->pluck('category')->filter()->unique()->sort()->values();

        // Icon map – add any new category here or fallback to default
        $categoryIcons = [
            'مقاييس معرفة الذات والشخصية'          => 'bi-person-bounding-box',
            'مقاييس الكفاءة الشخصية والنجاح المهني' => 'bi-graph-up-arrow',
            'مقاييس الاتصال والعلاقات المهنية'       => 'bi-chat-quote',
            'مقاييس القيادة والإدارة'                => 'bi-award',
            'مقاييس التوجيه والتوافق المهني'         => 'bi-compass',
            'مقاييس الصحة المهنية'                   => 'bi-heart-pulse',
        ];
    @endphp
    @foreach($uniqueCategories as $cat)
        @php
            $icon = $categoryIcons[$cat] ?? 'bi-bookmark';
        @endphp
        <a href="javascript:void(0)" class="cat-btn btn-category" data-filter="{{ $cat }}">
            <i class="bi {{ $icon }}"></i> {{ $cat }}
        </a>
    @endforeach
</div>

<!-- Stats Row -->
<div class="stats-row">
    <div class="stat-box">
        <i class="bi bi-pie-chart"></i>
        <h5>50+</h5>
        <p>مجال ومهارة<br>مختلفة</p>
    </div>
    <div class="stat-box">
        <i class="bi bi-mortarboard"></i>
        <h5>9</h5>
        <p>مقياس مهني<br>وشخصي معتمد</p>
    </div>
    <div class="stat-box">
        <i class="bi bi-journal-check"></i>
        <h5>10,000+</h5>
        <p>اختبار ومقياس<br>تم إنجازه</p>
    </div>
    <div class="stat-box">
        <i class="bi bi-people"></i>
        <h5>25,000+</h5>
        <p>مستخدم من الأفراد<br>والجهات</p>
    </div>
</div>

<!-- Assessments Section -->
<div class="section-header">
    <h3>أشهر المقاييس</h3>
</div>

<div class="assessments-grid" id="assessments-container">
    @php
        // Images are now loaded directly from $assessment->image_url
        $icons = [
            'معرفة الذات' => 'bi-person-bounding-box',
            'الشخصية' => 'bi-person-lines-fill',
            'الثقة' => 'bi-person-up',
            'إيجابية' => 'bi-brightness-high',
            'العاطفي' => 'bi-heart-pulse',
            'النجاح' => 'bi-trophy',
            'الإبداع' => 'bi-lightbulb',
            'الوقت' => 'bi-hourglass-split',
            'تخطط' => 'bi-calendar2-check',
            'القرار' => 'bi-signpost-split',
            'الاتصال' => 'bi-chat-right-quote',
            'التفاوض' => 'bi-briefcase',
            'فريق' => 'bi-people',
            'القيادي' => 'bi-award',
            'التحويلي' => 'bi-lightning-charge',
            'الإدارة' => 'bi-diagram-3',
            'تحفيز' => 'bi-stars',
            'التوجيه' => 'bi-compass',
            'حب العمل' => 'bi-heart',
            'ولاؤك' => 'bi-bookmark-star',
            'الرضا' => 'bi-emoji-smile',
            'ضغوط' => 'bi-speedometer2',
            'الاحتراق' => 'bi-fire',
            'الإرهاق' => 'bi-battery-half',
            'السلامة' => 'bi-shield-check',
        ];
        
        $categoryColors = [
            'مقاييس معرفة الذات والشخصية' => ['iconColor' => '#8b5cf6', 'iconBg' => '#f5f3ff', 'titleColor' => '#6d28d9'],
            'مقاييس الكفاءة الشخصية والنجاح المهني' => ['iconColor' => '#3b82f6', 'iconBg' => '#eff6ff', 'titleColor' => '#1d4ed8'],
            'مقاييس الاتصال والعلاقات المهنية' => ['iconColor' => '#14b8a6', 'iconBg' => '#f0fdfa', 'titleColor' => '#0f766e'],
            'مقاييس القيادة والإدارة' => ['iconColor' => '#f59e0b', 'iconBg' => '#fffbeb', 'titleColor' => '#b45309'],
            'مقاييس التوجيه والتوافق المهني' => ['iconColor' => '#f43f5e', 'iconBg' => '#fff1f2', 'titleColor' => '#be123c'],
            'مقاييس الصحة المهنية' => ['iconColor' => '#10b981', 'iconBg' => '#ecfdf5', 'titleColor' => '#047857'],
        ];
    @endphp

    @foreach($assessments as $index => $assessment)
        @php
            $imageName = $assessment->image_url ?: 'default.png'; // admin uploaded image or fallback
            $iconName = $assessment->icon ?: 'bi-journal-text'; // dynamic from DB or default
            
            // Basic icon mapping (optional, but keep it minimal or remove entirely)
            // If the user wants no hardcoding, we can just use a default icon for all
            
            $theme = $categoryColors[$assessment->category] ?? ['iconColor' => '#1a2b56', 'iconBg' => '#f8fafc', 'titleColor' => '#1a2b56'];
        @endphp
        <div class="assessment-card" data-category="{{ $assessment->category }}">
            <div class="card-header-top">
                <div class="card-icon" style="color: {{ $theme['iconColor'] }}; background-color: {{ $theme['iconBg'] }}; border: 1.5px solid {{ $theme['iconColor'] }};">
                    @if(str_starts_with($iconName, '/') || str_starts_with($iconName, 'http'))
                        <img src="{{ asset($iconName) }}" alt="Icon" style="width: 24px; height: 24px; object-fit: contain;">
                    @else
                        <i class="bi {{ $iconName }}"></i>
                    @endif
                </div>
                <div class="card-title-area">
                    @php $r = $assessment->rating ?: 0; @endphp
                    @if($r > 0)
                    <div class="d-flex align-items-center gap-1 mb-1" style="font-size: 0.55rem; color: #f59e0b;">
                        <span class="fw-bold" style="color: #334155;">{{ number_format($r, 1) }}</span>
                        <div class="d-flex" style="padding-top: 1px;">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $r)
                                    <i class="bi bi-star-fill"></i>
                                @elseif($i - 0.5 <= $r)
                                    <i class="bi bi-star-half"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span style="color: #94a3b8;">({{ $assessment->rating_count ?: 0 }})</span>
                    </div>
                    @else
                    <div style="height: 16px; margin-bottom: 4px;"></div>
                    @endif
                    <h4 class="card-title" style="color: {{ $theme['titleColor'] }};">{{ $assessment->title_ar }}</h4>
                    <p class="card-desc">{{ $assessment->subtitle_ar ?: ($assessment->description_ar ?: 'لا يوجد وصف متاح') }}</p>
                </div>
            </div>
            
            @php
                $userSession = $userSessions->firstWhere('assessment_id', $assessment->id);
                $isCompleted = $userSession && $userSession->status === 'completed';
                $isInProgress = $userSession && $userSession->status === 'in_progress';
                $priceLabel = $assessment->price > 0 ? number_format($assessment->price, 0) . ' <span style="font-size:0.5rem; font-weight:normal;">ر.س</span>' : 'مجاني';
            @endphp
            
            <div style="position: relative;">
                <img src="{{ asset('images/dashboard/' . $imageName) }}" alt="{{ $assessment->title_ar }}" class="cover">
            </div>
            
            <div class="card-meta">
                <div><i class="bi bi-file-earmark-text"></i> تقرير مفصل</div>
                <span class="divider">|</span>
                <div><i class="bi bi-ui-checks"></i> {{ $assessment->questions_count ?: 0 }} سؤال</div>
                <span class="divider">|</span>
                <div><i class="bi bi-clock"></i> {{ $assessment->time_limit_min ? $assessment->time_limit_min . ' دقيقة' : 'مفتوح' }}</div>
            </div>

            <div style="margin-top: auto; display: flex; flex-direction: column; gap: 8px;">
                <div class="card-price-row">
                    @if($isCompleted)
                        <form method="POST" action="{{ route('exam.start', $assessment->id) }}" class="m-0" style="flex: 1;">
                            @csrf
                            <button type="submit" class="btn-primary-custom w-100">إعادة المقياس</button>
                        </form>
                    @elseif($isInProgress)
                        <form method="POST" action="{{ route('exam.start', $assessment->id) }}" class="m-0" style="flex: 1;">
                            @csrf
                            <button type="submit" class="btn-primary-custom w-100" style="background: #f59e0b;">استئناف المقياس</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('exam.start', $assessment->id) }}" class="m-0" style="flex: 1;">
                            @csrf
                            <button type="submit" class="btn-primary-custom w-100">ابدأ المقياس</button>
                        </form>
                    @endif
                </div>

                @if($isCompleted)
                    <a href="{{ route('exam.result', $userSession->id) }}" class="btn-secondary-custom">
                        عرض التقرير <i class="bi bi-eye"></i>
                    </a>
                @else
                    <a href="#" onclick="alert('ليس لديك نتيجة في هذا المقياس حتى الآن. يرجى أداء المقياس أولاً لاستخراج تقريرك.'); return false;" class="btn-secondary-custom" style="opacity: 0.7;">
                        عرض التقرير <i class="bi bi-eye"></i>
                    </a>
                @endif
            </div>
        </div>
    @endforeach
</div>

<!-- Features Section -->
<div class="features-section">
    <h3 class="features-title">ماذا ستحصل بعد إكمال المقياس؟</h3>
    <div class="features-grid">
        <div class="feature-box">
            <i class="bi bi-graph-up-arrow"></i>
            <h6>توصيات عملية</h6>
            <p>توصيات قابلة للتطبيق<br>في عملك وحياتك</p>
        </div>
        <div class="feature-box">
            <i class="bi bi-shield-check"></i>
            <h6>فرص التحسين</h6>
            <p>اكتشف المهارات التي تحتاج<br>لتطوير وخطة التحسين</p>
        </div>
        <div class="feature-box">
            <i class="bi bi-bullseye"></i>
            <h6>نقاط القوة</h6>
            <p>تعرف على نقاط قوتك<br>واستخدمها بذكاء</p>
        </div>
        <div class="feature-box">
            <i class="bi bi-file-earmark-richtext"></i>
            <h6>تقرير تفصيلي</h6>
            <p>عن نقاط قوتك<br>وفرص التحسين</p>
        </div>
    </div>
</div>

<!-- Footer CTA -->
<div class="footer-cta">
    <h4>ابدأ رحلتك نحو تطوير ذاتك اليوم</h4>
    <p>اختر المقياس المناسب لك واحصل على تقرير تفصيلي الآن</p>
    <a href="#" class="btn-cta">استعرض جميع المقاييس</a>
</div>

<style>
.custom-pills .nav-link {
    color: #64748b;
    background: #f8fafc;
    border-radius: 10px;
    margin: 0 4px;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}
.custom-pills .nav-link.active {
    background: #1a2b56;
    color: #fff;
    border-color: #1a2b56;
    box-shadow: 0 4px 6px -1px rgba(26, 43, 86, 0.2);
}
.custom-pills .nav-link:hover:not(.active) {
    background: #f1f5f9;
}
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {

    /* ── Category filter ── */
    const filterBtns = document.querySelectorAll('.btn-category');
    const assessmentCards = document.querySelectorAll('.assessment-card');
    
    // Normalize string for better matching (handling ة/ه and أ/ا)
    const normalize = (str) => {
        return str.replace(/ة/g, 'ه')
                  .replace(/[أإآ]/g, 'ا')
                  .replace('مقاييس ', '')
                  .replace('معرفة ', '')
                  .trim();
    };

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            assessmentCards.forEach(card => {
                if (filterValue === 'all') {
                    card.style.display = 'flex';
                } else {
                    const cardCat = card.getAttribute('data-category') || '';
                    const searchStr = normalize(filterValue);
                    const targetStr = normalize(cardCat);
                    
                    const show = targetStr.includes(searchStr) || searchStr.includes(targetStr);
                    card.style.display = show ? 'flex' : 'none';
                }
            });
        });
    });
});
</script>

@endsection
