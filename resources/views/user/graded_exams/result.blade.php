@extends('layouts.user')
@section('title', 'نتيجة الاختبار')

@push('styles')
<style>
:root{
    --navy: #14213d;
    --navy-soft: #1e3a5f;
    --accent: #0ea472;
    --bg: #f6f7fb;
    --surface: #ffffff;
    --border: #e6e9f0;
    --text: #1e293b;
    --text-muted: #64748b;
    --radius-lg: 18px;
    --radius-md: 14px;
    --radius-sm: 10px;
    --shadow-sm: 0 2px 10px rgba(15, 23, 42, .05);
}

.result-page{
    background: var(--bg);
    min-height: 100vh;
    min-height: 100dvh;
    padding: 20px 14px 56px;
    display: flex;
    flex-direction: column;
}
@media (min-width: 768px){
    .result-page{ padding: 36px 20px 64px; }
}
.result-container{ max-width: 960px; margin: 0 auto; }

.result-hero{ text-align: center; margin-bottom: 28px; }
.result-hero h1{
    color: var(--navy);
    font-weight: 800;
    font-size: 1.3rem;
    margin-bottom: 8px;
}
@media (min-width: 768px){ .result-hero h1{ font-size: 1.75rem; } }
.result-hero p{ color: var(--text-muted); font-size: .95rem; margin: 0; }

/* Summary card */
.summary-card{
    background: var(--surface);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border);
    overflow: hidden;
    margin-bottom: 28px;
}
.summary-grid{
    display: grid;
    grid-template-columns: 1fr;
}
@media (min-width: 640px){
    .summary-grid{ grid-template-columns: 1fr 1fr; }
}
.summary-cell{
    padding: 24px;
    text-align: center;
}
.summary-cell:first-child{
    border-bottom: 1px solid var(--border);
}
@media (min-width: 640px){
    .summary-cell:first-child{
        border-bottom: none;
        border-inline-end: 1px solid var(--border);
    }
}
.summary-cell h5{ color: var(--text-muted); font-size: .9rem; margin-bottom: 8px; font-weight: 600; }
.readiness-label{ font-weight: 800; font-size: 1.5rem; margin: 0; }
@media (min-width: 768px){ .readiness-label{ font-size: 1.75rem; } }
.score-big{
    font-weight: 800;
    color: var(--navy);
    font-size: 2.6rem;
    margin: 0;
    line-height: 1.1;
}
@media (min-width: 768px){ .score-big{ font-size: 3.4rem; } }
.score-fraction{ color: var(--text-muted); margin-top: 6px; font-size: .95rem; }
.score-perf{ font-weight: 700; margin-top: 8px; font-size: 1rem; }

/* Units breakdown: cards on mobile, table on desktop */
.units-card{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    margin-bottom: 20px;
    overflow: hidden;
}
.units-card-header{
    background: var(--navy);
    color: #fff;
    padding: 14px 18px;
    font-weight: 700;
    font-size: .95rem;
}
.unit-row{
    padding: 16px 18px;
    border-bottom: 1px solid var(--border);
}
.unit-row:last-child{ border-bottom: none; }
.unit-row-top{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
    gap: 10px;
}
.unit-name{ font-weight: 700; color: var(--text); font-size: .95rem; }
.unit-pct{ font-weight: 800; font-size: 1.05rem; }
.unit-bar{
    height: 8px;
    background: var(--bg);
    border-radius: 999px;
    overflow: hidden;
    margin-bottom: 8px;
}
.unit-bar > div{ height: 100%; border-radius: 999px; }
.unit-row-bottom{
    display: flex;
    justify-content: space-between;
    font-size: .82rem;
    color: var(--text-muted);
}

@media (min-width: 768px){
    .units-card-header{ display: none; }
    .units-table-wrap{ overflow: hidden; }
}

/* Highlight boxes */
.highlight-grid{
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
    margin-bottom: 24px;
}
@media (min-width: 640px){
    .highlight-grid{ grid-template-columns: 1fr 1fr; }
}
.highlight-box{
    border-radius: var(--radius-md);
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.highlight-box.is-danger{ background: #fef2f2; border: 1px solid #fecaca; }
.highlight-box.is-success{ background: #ecfdf5; border: 1px solid #a7f3d0; }
.highlight-icon{
    width: 52px; height: 52px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.3rem;
    flex-shrink: 0;
    background: #fff;
}
.highlight-box.is-danger .highlight-icon{ color: #dc2626; border: 2px solid #dc2626; }
.highlight-box.is-success .highlight-icon{ color: #059669; border: 2px solid #059669; }
.highlight-box h6{ font-size: .85rem; margin-bottom: 2px; font-weight: 700; }
.highlight-box.is-danger h6{ color: #dc2626; }
.highlight-box.is-success h6{ color: #059669; }
.highlight-box small{ color: var(--text-muted); font-size: .75rem; display: block; margin-bottom: 6px; }
.highlight-box .value{ font-weight: 800; font-size: 1.2rem; margin: 0; }

/* Legend */
.legend-card{
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    padding: 18px;
    margin-bottom: 28px;
}
.legend-grid{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px;
    text-align: center;
}
@media (min-width: 640px){
    .legend-grid{ grid-template-columns: repeat(4, 1fr); }
}
.legend-dot{
    width: 10px; height: 10px; border-radius: 50%;
    display: inline-block; margin-inline-end: 6px;
}

/* Actions */
.result-actions{
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 20px;
}
@media (min-width: 640px){
    .result-actions{ flex-direction: row; justify-content: center; }
}
.result-actions .btn{
    border-radius: 999px;
    font-weight: 700;
    padding: 13px 24px;
}

@media print {
    @page {
        size: A4 portrait;
        margin: 5mm 8mm;
    }
    html, body {
        background-color: #fff !important;
        margin: 0 !important;
        padding: 0 !important;
        height: auto !important;
    }
    .no-print, #reviewAnswers, #answersAccordion, .btn, .top-navbar, footer, .result-actions {
        display: none !important;
    }
    .result-page {
        padding: 0 !important;
        background: #fff !important;
        min-height: auto !important;
    }
    .result-container {
        max-width: 100% !important;
        width: 100% !important;
        margin: 0 auto !important;
        zoom: 0.75 !important;
    }
    * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    /* Hero */
    .result-hero {
        margin-bottom: 8px !important;
    }
    .result-hero h1 {
        font-size: 1.25rem !important;
        margin-bottom: 2px !important;
    }
    .result-hero p {
        font-size: 0.8rem !important;
    }

    /* Summary card */
    .summary-card {
        margin-bottom: 10px !important;
        box-shadow: none !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 12px !important;
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }
    .summary-cell {
        padding: 8px 14px !important;
    }
    .summary-cell h5 {
        font-size: 0.8rem !important;
        margin-bottom: 2px !important;
    }
    .readiness-label {
        font-size: 1.35rem !important;
    }
    .score-big {
        font-size: 2rem !important;
    }
    .score-fraction {
        font-size: 0.8rem !important;
        margin-top: 2px !important;
    }
    .score-perf {
        font-size: 0.85rem !important;
        margin-top: 2px !important;
    }

    /* Units card & table */
    .units-card {
        margin-bottom: 10px !important;
        box-shadow: none !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 12px !important;
        page-break-inside: auto !important;
        break-inside: auto !important;
    }
    .units-card-header {
        display: block !important;
        padding: 6px 14px !important;
        font-size: 0.85rem !important;
        background: #14213d !important;
        color: #fff !important;
    }
    .units-card .d-block.d-md-none {
        display: none !important;
    }
    .units-card .table-responsive.d-none.d-md-block {
        display: block !important;
        overflow: visible !important;
    }
    .table {
        margin-bottom: 0 !important;
        font-size: 0.74rem !important;
    }
    .table th, .table td, .table th.py-3, .table td.py-3 {
        padding: 2.5px 8px !important;
    }
    .table td.fs-5 {
        font-size: 0.85rem !important;
    }
    .progress {
        height: 6px !important;
        border: 1px solid #dee2e6;
        background-color: #f1f5f9 !important;
    }

    /* Highlight boxes */
    .highlight-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 8px !important;
        margin-bottom: 8px !important;
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }
    .highlight-box {
        padding: 6px 12px !important;
        border-radius: 10px !important;
    }
    .highlight-icon {
        width: 34px !important;
        height: 34px !important;
        font-size: 0.95rem !important;
    }
    .highlight-box h6 {
        font-size: 0.75rem !important;
        margin-bottom: 1px !important;
    }
    .highlight-box small {
        font-size: 0.65rem !important;
        margin-bottom: 1px !important;
    }
    .highlight-box .value {
        font-size: 0.88rem !important;
    }

    /* Legend card */
    .legend-card {
        padding: 6px 10px !important;
        border-radius: 10px !important;
        margin-bottom: 0 !important;
        box-shadow: none !important;
        border: 1px solid #cbd5e1 !important;
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }
    .legend-grid {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 6px !important;
        text-align: center !important;
    }
    .legend-grid div {
        font-size: 0.72rem !important;
    }
    .legend-grid small {
        font-size: 0.65rem !important;
    }
    .legend-dot {
        width: 8px !important;
        height: 8px !important;
    }
}
</style>
@endpush

@section('content')
<div class="result-page">
<div class="result-container">
    @if($result)
        <div class="result-hero">
            <h1>أداؤك حسب وحدات الاختبار</h1>
            <p>ترتيب الوحدات من أعلى درجة إلى أقل درجة</p>
        </div>

        <!-- Top Summary -->
        <div class="summary-card">
            <div class="summary-grid">
                <div class="summary-cell">
                    <h5>مستوى الجاهزية</h5>
                    @php
                        $readinessColor = '#f59e0b';
                        if ($result->percentage >= 75) $readinessColor = '#059669';
                        elseif ($result->percentage < 60) $readinessColor = '#dc2626';
                    @endphp
                    <p class="readiness-label" style="color: {{ $readinessColor }};">{{ $readinessLevel }}</p>
                </div>
                <div class="summary-cell">
                    <h5>النتيجة الإجمالية</h5>
                    <p class="score-big">{{ floatval($result->percentage) }}%</p>
                    <p class="score-fraction">{{ floatval($result->correct_count) }} من {{ $session->total_questions }} درجة</p>
                    <p class="score-perf {{ $overallPerformance['class'] }}">{{ $overallPerformance['name'] }}</p>
                </div>
            </div>
        </div>

        <!-- Units Breakdown -->
        <div class="units-card">
            <div class="units-card-header">تفاصيل الأداء حسب الوحدة</div>

            <!-- Mobile card rows -->
            <div class="d-block d-md-none">
                @foreach($unitsStats as $stat)
                    <div class="unit-row">
                        <div class="unit-row-top">
                            <span class="unit-name">{{ $stat['name'] }}</span>
                            <span class="unit-pct {{ $stat['level_class'] }}">{{ $stat['percentage'] }}%</span>
                        </div>
                        <div class="unit-bar">
                            <div class="progress-bar {{ $stat['bar_color'] }}" style="width: {{ $stat['percentage'] }}%"></div>
                        </div>
                        <div class="unit-row-bottom">
                            <span>{{ floatval($stat['score']) }} من {{ $stat['total'] }}</span>
                            <span class="fw-bold {{ $stat['level_class'] }}">{{ $stat['level_name'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Desktop table -->
            <div class="table-responsive d-none d-md-block">
                <table class="table table-borderless table-hover mb-0 align-middle">
                    <thead class="bg-light text-center">
                        <tr>
                            <th class="py-3 px-4 text-end" style="width: 30%">الوحدة</th>
                            <th class="py-3" style="width: 20%">الدرجة</th>
                            <th class="py-3" style="width: 25%">شريط التقدم</th>
                            <th class="py-3" style="width: 10%">النسبة</th>
                            <th class="py-3" style="width: 15%">مستوى الأداء</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($unitsStats as $stat)
                            <tr class="border-bottom">
                                <td class="py-3 px-4 text-end fw-bold">{{ $stat['name'] }}</td>
                                <td class="py-3">{{ floatval($stat['score']) }} من {{ $stat['total'] }}</td>
                                <td class="py-3">
                                    <div class="progress rounded-pill" style="height: 10px;">
                                        <div class="progress-bar {{ $stat['bar_color'] }}" role="progressbar" style="width: {{ $stat['percentage'] }}%" aria-valuenow="{{ $stat['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="py-3 fw-bold fs-5">{{ $stat['percentage'] }}%</td>
                                <td class="py-3 fw-bold {{ $stat['level_class'] }}">{{ $stat['level_name'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Highlight boxes -->
        <div class="highlight-grid">
            <div class="highlight-box is-danger">
                <div class="highlight-icon"><i class="bi bi-graph-down-arrow"></i></div>
                <div>
                    <h6>أولوية المراجعة</h6>
                    <small>(أقل وحدة حصلت فيها على درجة)</small>
                    @if($lowestUnit && $lowestUnit['percentage'] == 100)
                        <p class="value" style="color:#059669;">أداء مثالي 🌟</p>
                    @else
                        <p class="value" style="color:#dc2626;">{{ $lowestUnit ? $lowestUnit['name'].' — '.$lowestUnit['percentage'].'%' : '-' }}</p>
                    @endif
                </div>
            </div>
            <div class="highlight-box is-success">
                <div class="highlight-icon"><i class="bi bi-graph-up-arrow"></i></div>
                <div>
                    <h6>أعلى أداء</h6>
                    <small>(أعلى وحدة حصلت فيها على درجة)</small>
                    <p class="value" style="color:#059669;">{{ $highestUnit ? $highestUnit['name'].' — '.$highestUnit['percentage'].'%' : '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Legend -->
        <div class="legend-card">
            <div class="legend-grid">
                <div>
                    <div><span class="legend-dot" style="background:#10b981;"></span><span class="fw-bold" style="color:#10b981;">80% فأكثر</span></div>
                    <small class="text-muted fw-bold">متميز / جيد جداً</small>
                </div>
                <div>
                    <div><span class="legend-dot" style="background:#f59e0b;"></span><span class="fw-bold" style="color:#f59e0b;">70%-79%</span></div>
                    <small class="text-muted fw-bold">جيد</small>
                </div>
                <div>
                    <div><span class="legend-dot" style="background:#fd7e14;"></span><span class="fw-bold" style="color:#fd7e14;">60%-69%</span></div>
                    <small class="text-muted fw-bold">مراجعة</small>
                </div>
                <div>
                    <div><span class="legend-dot" style="background:#ef4444;"></span><span class="fw-bold" style="color:#ef4444;">أقل من 60%</span></div>
                    <small class="text-muted fw-bold">تطوير</small>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="result-actions no-print">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="bi bi-printer me-2"></i> طباعة التقرير
            </button>
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#reviewAnswers" aria-expanded="false" aria-controls="reviewAnswers">
                <i class="bi bi-journal-text me-2"></i> مراجعة الإجابات التفصيلية
            </button>
        </div>

        <!-- Review Answers Section -->
        <div class="collapse" id="reviewAnswers">
            <div class="card shadow-sm border-0 rounded-4 mb-5">
                <div class="card-body p-0">
                    <div class="accordion accordion-flush" id="answersAccordion">
                        @foreach($reviewData as $review)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $review['index'] }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $review['index'] }}" aria-expanded="false" aria-controls="collapse{{ $review['index'] }}">
                                        <div class="d-flex w-100 flex-column flex-md-row justify-content-between align-items-start align-items-md-center pe-3 gap-2">
                                            <div class="fw-bold">
                                                <span class="badge bg-secondary me-2">{{ $review['index'] }}</span>
                                                {{ $review['text'] }}
                                                @if($review['unit_name'])
                                                    <span class="badge bg-light text-secondary border ms-2 fw-normal" style="font-size: 0.8rem;"><i class="bi bi-book me-1"></i> {{ $review['unit_name'] }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                @if($review['points'] == 1)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> صحيح</span>
                                                @elseif($review['points'] > 0)
                                                    <span class="badge bg-warning"><i class="bi bi-dash-circle me-1"></i> صحيح جزئياً ({{ floatval($review['points']) }})</span>
                                                @else
                                                    <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> خاطئ</span>
                                                @endif
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse{{ $review['index'] }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $review['index'] }}" data-bs-parent="#answersAccordion">
                                    <div class="accordion-body bg-light">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <h6 class="fw-bold text-muted">إجابتك:</h6>
                                                <ul class="list-unstyled mb-0">
                                                    @forelse($review['options'] as $option)
                                                        @if(in_array($option->id, $review['selected_ids']))
                                                            <li class="mb-1"><i class="bi bi-check2-square text-primary me-2"></i> {{ $option->option_text_ar }}</li>
                                                        @endif
                                                    @empty
                                                        <li class="text-muted">لم تقم باختيار إجابة</li>
                                                    @endforelse
                                                    @if(empty($review['selected_ids']))
                                                        <li class="text-muted">لم تقم باختيار إجابة</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <h6 class="fw-bold text-muted">الإجابة الصحيحة:</h6>
                                                <p class="mb-0 text-success fw-bold"><i class="bi bi-check-circle-fill me-2"></i> {{ $review['correct_options_text'] }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <h6 class="fw-bold text-muted"><i class="bi bi-info-circle me-2"></i> التفسير:</h6>
                                            <p class="mb-0">{{ $review['explanation'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @else
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">جاري التحميل...</span>
            </div>
            <p class="text-muted mt-3">جاري حساب النتيجة...</p>
        </div>
    @endif

    <div class="text-center mt-4 no-print">
        <a href="{{ route('user.graded_exams.index') }}" class="btn btn-secondary px-4 rounded-pill">
            العودة للقائمة
        </a>
    </div>
</div>
</div>
@endsection