@extends('layouts.user')
@section('title', $exam->title_ar . ' - بدء الاختبار')

@php
    // Build the human-readable duration text (kept in PHP so it renders correctly
    // even before any JS runs, and works the same on server-rendered exports).
    $timeMin = $exam->time_limit_min;
    $timeText = 'غير محدد';
    if ($timeMin) {
        $hours = intdiv($timeMin, 60);
        $mins = $timeMin % 60;
        if ($hours > 0 && $mins === 0) {
            $timeText = $hours == 1 ? 'ساعة واحدة' : ($hours == 2 ? 'ساعتان' : $hours . ' ساعات');
        } elseif ($hours > 0) {
            $timeText = $hours . ' ساعة و ' . $mins . ' دقيقة';
        } else {
            $timeText = $mins . ' دقيقة';
        }
    }
    $questionCount = $exam->constraintSettings ? $exam->constraintSettings->total_questions : 50;
@endphp

@push('styles')
<style>
/* ===== Design tokens (shared with the exams list page) ===== */
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

.intro-page{
    background: var(--bg);
    min-height: 100dvh;
    padding: 20px 16px 32px;
    display: flex;
    flex-direction: column;
}
@media (min-width: 768px){
    .intro-page{ padding: 40px 24px 48px; }
}

.intro-container{
    max-width: 560px;
    margin: 0 auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 16px;
    flex: 1;
}

/* Back link */
.intro-back{
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--text-muted);
    font-weight: 700;
    font-size: .85rem;
    text-decoration: none;
    margin-bottom: 4px;
    width: fit-content;
}
.intro-back:hover{ color: var(--navy); }

/* Cards */
.intro-card{
    background: var(--surface);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    padding: 20px;
}

.intro-badge{
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #eafbf3;
    color: var(--accent-dark);
    padding: 5px 14px;
    border-radius: 999px;
    font-size: .78rem;
    font-weight: 700;
    margin-bottom: 12px;
}
.intro-title{
    color: var(--navy);
    font-weight: 800;
    font-size: 1.25rem;
    line-height: 1.4;
    margin: 0 0 16px;
}
.intro-section-head{
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
}
.intro-section-head .icon-box{
    width: 22px; height: 22px;
    border-radius: 7px;
    background: var(--navy);
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: .75rem;
    flex-shrink: 0;
}
.intro-section-head span{
    font-weight: 800;
    color: var(--navy);
    font-size: .9rem;
}
.intro-desc{
    color: var(--text-muted);
    font-size: .85rem;
    line-height: 1.7;
    margin: 0;
    text-align: justify;
}

/* Data grid */
.intro-grid{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}
.intro-stat{
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}
.intro-stat .val{
    font-weight: 800;
    color: var(--navy);
    font-size: .92rem;
}
.intro-stat .lbl{
    color: var(--text-muted);
    font-size: .72rem;
    font-weight: 600;
    margin-top: 2px;
}
.intro-stat .ico{
    width: 36px; height: 36px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: #fff;
    font-size: .95rem;
    flex-shrink: 0;
}
.intro-stat .ico.navy{ background: var(--navy); }
.intro-stat .ico.accent{ background: var(--accent); }
.intro-stat .ico.warning{ background: var(--warning); }
.intro-stat .ico.muted{ background: #7c6ff0; }

/* Instructions */
.intro-steps{
    list-style: none;
    padding: 0;
    margin: 0 0 14px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.intro-steps li{
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: .85rem;
    font-weight: 600;
    color: var(--text);
}
.intro-steps li .num{
    width: 20px; height: 20px;
    border-radius: 50%;
    background: #e8ecf7;
    color: var(--navy);
    font-size: .72rem;
    font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}

.intro-warn{
    background: #fffbeb;
    border: 1px solid #fde68a;
    border-radius: var(--radius-md);
    padding: 14px;
}
.intro-warn strong{
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--text);
    font-size: .85rem;
    margin-bottom: 4px;
}
.intro-warn strong i{ color: var(--warning); }
.intro-warn p{
    margin: 0;
    color: var(--text-muted);
    font-size: .8rem;
    line-height: 1.6;
}

/* Actions */
.intro-actions{
    background: var(--surface);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    padding: 16px;
    display: flex;
    flex-direction: column;
    gap: 14px;
    margin-top: auto;
}
.intro-agree{
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    font-weight: 700;
    font-size: .85rem;
    color: var(--text);
}
.intro-agree input{
    width: 20px; height: 20px;
    accent-color: var(--accent);
    cursor: pointer;
    flex-shrink: 0;
}
.intro-btn-row{
    display: flex;
    gap: 10px;
}
.intro-btn-row .btn{
    flex: 1;
    border-radius: var(--radius-sm);
    font-weight: 700;
    padding: 13px;
    font-size: .92rem;
}
.btn-cancel-outline{
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text);
}
.btn-cancel-outline:hover{ background: var(--bg); }
.btn-confirm-start{
    background: var(--accent);
    border: none;
    color: #fff;
    display: flex; align-items: center; justify-content: center; gap: 6px;
}
.btn-confirm-start:hover:not(:disabled){ background: var(--accent-dark); }
.btn-confirm-start:disabled{ opacity: .55; cursor: not-allowed; }
</style>
@endpush

@section('content')
<div class="intro-page">
<div class="intro-container">

    <a href="{{ route('user.graded_exams.index') }}" class="intro-back">
        <i class="bi bi-arrow-right"></i> الرجوع لقائمة الشهادات
    </a>

    <!-- Hero: title + description -->
    <div class="intro-card">
        <span class="intro-badge"><i class="bi bi-mortarboard-fill"></i> اختبار تدريبي</span>
        <h1 class="intro-title">{{ $exam->title_ar }}</h1>

        <div class="intro-section-head">
            <span class="icon-box"><i class="bi bi-list-ul"></i></span>
            <span>وصف الاختبار</span>
        </div>
        <p class="intro-desc">{{ $exam->description_ar ?: 'يهدف هذا الاختبار إلى قياس مدى استيعابك للمفاهيم والمعارف الأساسية، ومساعدتك على تقييم جاهزيتك قبل التقدم إلى الاختبار النهائي للشهادة الاحترافية.' }}</p>
    </div>

    <!-- Exam data grid -->
    <div class="intro-card">
        <div class="intro-section-head">
            <span class="icon-box"><i class="bi bi-info-circle-fill"></i></span>
            <span>بيانات الاختبار</span>
        </div>
        <div class="intro-grid">
            <div class="intro-stat">
                <div>
                    <div class="val">{{ $timeText }}</div>
                    <div class="lbl">مدة الاختبار</div>
                </div>
                <div class="ico navy"><i class="bi bi-stopwatch"></i></div>
            </div>
            <div class="intro-stat">
                <div>
                    <div class="val">{{ $questionCount }} سؤال</div>
                    <div class="lbl">عدد الأسئلة</div>
                </div>
                <div class="ico accent"><i class="bi bi-patch-question-fill"></i></div>
            </div>
            <div class="intro-stat">
                <div>
                    <div class="val">صح/خطأ واختياري</div>
                    <div class="lbl">أنواع الأسئلة</div>
                </div>
                <div class="ico muted"><i class="bi bi-ui-checks-grid"></i></div>
            </div>
            <div class="intro-stat">
                <div>
                    <div class="val">محاولات مفتوحة</div>
                    <div class="lbl">عدد المحاولات</div>
                </div>
                <div class="ico warning"><i class="bi bi-arrow-repeat"></i></div>
            </div>
        </div>
    </div>

    <!-- Instructions -->
    <div class="intro-card">
        <div class="intro-section-head">
            <span class="icon-box"><i class="bi bi-list-check"></i></span>
            <span>تعليمات هامة</span>
        </div>
        <ul class="intro-steps">
            <li><span class="num">1</span> اقرأ السؤال والبدائل بعناية.</li>
            <li><span class="num">2</span> يمكنك مراجعة وتعديل إجاباتك قبل التسليم.</li>
        </ul>
        <div class="intro-warn">
            <strong><i class="bi bi-exclamation-triangle-fill"></i> تنبيه:</strong>
            <p>حدد الإجابة أو الإجابات الصحيحة بناءً على المطلوب في كل سؤال، حيث قد يتطلب سؤال واحد اختيار أكثر من خيار.</p>
        </div>
    </div>

    <!-- Agreement + actions -->
    <form action="{{ route('user.graded_exams.start', $exam->id) }}" method="POST" id="form-start-exam" class="m-0">
        @csrf
        <div class="intro-actions">
            <label class="intro-agree" for="agreeCheckbox">
                <input type="checkbox" id="agreeCheckbox">
                قرأت التعليمات وأوافق على البدء.
            </label>
            <div class="intro-btn-row">
                <button type="submit" class="btn btn-confirm-start" id="btn-confirm-start" disabled>
                    ابدأ الاختبار <i class="bi bi-play-circle-fill"></i>
                </button>
                <a href="{{ route('user.graded_exams.index') }}" class="btn btn-cancel-outline">إلغاء</a>
            </div>
        </div>
    </form>

</div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('agreeCheckbox').addEventListener('change', function () {
        document.getElementById('btn-confirm-start').disabled = !this.checked;
    });

    document.getElementById('form-start-exam').addEventListener('submit', function () {
        var btn = document.getElementById('btn-confirm-start');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> جاري البدء...';
    });
</script>
@endpush