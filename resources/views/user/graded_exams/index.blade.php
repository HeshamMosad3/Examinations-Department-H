@extends('layouts.user')
@section('title', 'الشهادات الاحترافية')

@push('styles')
<style>
/* ===== Design tokens (shared visual language for the exams module) ===== */
:root{
    --navy: #14213d;
    --navy-soft: #1e3a5f;
    --accent: #0ea472;
    --accent-dark: #0b8a5f;
    --warning: #f5a623;
    --danger: #e5484d;
    --bg: #f6f7fb;
    --surface: #ffffff;
    --border: #e6e9f0;
    --text: #1e293b;
    --text-muted: #64748b;
    --radius-lg: 18px;
    --radius-md: 14px;
    --radius-sm: 10px;
    --shadow-sm: 0 2px 10px rgba(15, 23, 42, .05);
    --shadow-md: 0 10px 30px rgba(15, 23, 42, .09);
}

.exams-page{
    background: var(--bg);
    min-height: 100%;
    padding: 24px 16px 48px;
}
@media (min-width: 768px){
    .exams-page{ padding: 40px 24px 64px; }
}

.exams-container{
    max-width: 880px;
    margin: 0 auto;
}

/* Header */
.exams-header{
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 28px;
}
@media (min-width: 768px){
    .exams-header{
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 36px;
    }
}
.exams-header h1{
    color: var(--navy);
    font-weight: 800;
    font-size: 1.5rem;
    margin: 0 0 6px;
}
@media (min-width: 768px){
    .exams-header h1{ font-size: 2rem; }
}
.exams-header p{
    color: var(--text-muted);
    margin: 0;
    font-size: .95rem;
}
.btn-progress{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: var(--navy);
    color: #fff;
    border: none;
    border-radius: 999px;
    padding: 12px 22px;
    font-weight: 700;
    font-size: .92rem;
    text-decoration: none;
    white-space: nowrap;
    transition: transform .15s ease, box-shadow .15s ease, background .15s ease;
}
.btn-progress:hover, .btn-progress:focus-visible{
    background: var(--navy-soft);
    color: #fff;
    box-shadow: var(--shadow-md);
}
.btn-progress:active{ transform: scale(.97); }

/* Alert */
.exams-alert{
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #991b1b;
    border-radius: var(--radius-sm);
    padding: 14px 16px;
    margin-bottom: 20px;
    font-size: .9rem;
}

/* Exam card */
.exams-list{
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.exam-card{
    background: var(--surface);
    border-radius: var(--radius-lg);
    padding: 18px;
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    transition: box-shadow .2s ease, border-color .2s ease;
}
@media (min-width: 768px){
    .exam-card{
        padding: 26px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }
}
.exam-card:hover{
    box-shadow: var(--shadow-md);
    border-color: #d6dbe6;
}

.exam-info h3{
    color: var(--navy);
    font-weight: 700;
    font-size: 1.08rem;
    line-height: 1.4;
    margin: 0 0 6px;
}
@media (min-width: 768px){
    .exam-info h3{ font-size: 1.25rem; }
}
.exam-info p{
    color: var(--text-muted);
    font-size: .9rem;
    line-height: 1.6;
    margin: 0 0 14px;
}
@media (min-width: 768px){
    .exam-info p{ max-width: 520px; }
}

.exam-meta{
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 4px;
}
@media (min-width: 768px){
    .exam-meta{ margin-bottom: 0; }
}
.exam-meta span{
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--bg);
    color: var(--text-muted);
    padding: 6px 12px;
    border-radius: 999px;
    border: 1px solid var(--border);
    font-size: .82rem;
    font-weight: 600;
}
.exam-meta span i{ color: var(--accent); }

.exam-action{ margin-top: 16px; }
@media (min-width: 768px){
    .exam-action{ margin-top: 0; flex-shrink: 0; }
}

.btn-start-exam{
    background: var(--accent);
    color: #fff;
    border: none;
    padding: 15px 24px;
    border-radius: var(--radius-sm);
    font-weight: 700;
    font-size: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    width: 100%;
    min-height: 50px;
    cursor: pointer;
    text-decoration: none;
    transition: background .2s ease, transform .15s ease, box-shadow .15s ease;
}
@media (min-width: 768px){
    .btn-start-exam{ width: auto; padding: 13px 28px; }
}
.btn-start-exam:hover, .btn-start-exam:focus-visible{
    background: var(--accent-dark);
    color: #fff;
    box-shadow: 0 8px 18px rgba(14, 164, 114, .25);
}
.btn-start-exam:active{ transform: scale(.98); }

/* Empty state */
.exams-empty{
    text-align: center;
    padding: 64px 20px;
    background: var(--surface);
    border-radius: var(--radius-lg);
    border: 1px dashed var(--border);
}
.exams-empty .icon-wrap{
    width: 72px; height: 72px;
    display: inline-flex; align-items: center; justify-content: center;
    background: var(--bg);
    border-radius: 50%;
    margin-bottom: 16px;
}
.exams-empty .icon-wrap i{ font-size: 2rem; color: var(--text-muted); }
.exams-empty h5{ color: var(--text-muted); font-weight: 700; margin: 0; }
</style>
@endpush

@section('content')
<div class="exams-page">
<div class="exams-container">
    <div class="exams-header text-center text-md-end">
        <div>
            <h1>الشهادات الاحترافية</h1>
            <p>اختر الشهادة التي ترغب في أداء اختبارها</p>
        </div>
        <a href="{{ route('user.graded_exams.progress') }}" class="btn-progress">
            <i class="bi bi-graph-up-arrow"></i> تتبع تقدمي وسجل الاختبارات
        </a>
    </div>

    @if(session('error'))
        <div class="exams-alert">{{ session('error') }}</div>
    @endif

    <div class="exams-list">
        @forelse($exams as $exam)
            <div class="exam-card">
                <div class="exam-info">
                    <h3>{{ $exam->title_ar }}</h3>
                    <p>{{ $exam->description_ar ?: 'لا يوجد وصف متوفر.' }}</p>
                    <div class="exam-meta">
                        <span><i class="bi bi-file-earmark-text"></i> {{ $exam->constraintSettings ? $exam->constraintSettings->total_questions : 50 }} سؤال</span>
                        @if($exam->time_limit_min)
                            <span><i class="bi bi-stopwatch"></i> {{ $exam->time_limit_min }} دقيقة</span>
                        @endif
                    </div>
                </div>
                <div class="exam-action">
                    <a href="{{ route('user.graded_exams.intro', $exam->id) }}" class="btn-start-exam">
                        بدء الاختبار <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="exams-empty">
                <div class="icon-wrap"><i class="bi bi-journal-x"></i></div>
                <h5>لا توجد شهادات متوفرة حالياً</h5>
            </div>
        @endforelse
    </div>
</div>
</div>
@endsection