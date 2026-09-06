@extends('layouts.user')

@section('title', 'أداء الاختبار - ' . $session->gradedExam->title_ar)

@push('styles')
<style>
/* ---------------------------------------------------------------------
 * Palette & Base 
 * --------------------------------------------------------------------- */
:root {
  --bg: #f5f7fb;
  --card: #FFFFFF;
  --border: #E4E9F2;
  --text: #111827;
  --textMuted: #6B7280;
  --blue: #1e5bfb;
  --blueDark: #1648ca;
  --blueTint: #eff6ff;
  --blueTint2: #f2f7ff;
  --blueBorder: #d6e7ff;
  --green: #16a34a;
  --greenDark: #15803d;
  --greenTint: #f0fbf6;
  --greenIconBg: #dcfce7;
  --greenBorder: #d3f5e5;
  --red: #dc2626;
  --redDark: #e11d48;
  --redTint: #fff3f3;
  --redIconBg: #fee2e2;
  --redBorder: #fed7d7;
  --orange: #ea580c;
  --orangeDark: #d97706;
  --orangeTint: #fff9ef;
  --orangeIconBg: #ffedd5;
  --orangeBorder: #fedfb8;
  --font: 'Tajawal', sans-serif;
}

html, body {
  height: 100%;
  overflow: hidden; /* الصفحة نفسها متتسكرولش؛ السكرول جوه الشاشات بس */
}

body {
  background-color: var(--bg) !important;
  font-family: var(--font);
}

/* بيطفي هيدر وفوتر الموقع (layouts.user) بحيث الاختبار ياخد الشاشة كلها */
body > .top-navbar,
body > footer,
body > #alert-container {
  display: none !important;
}
main {
  padding: 0 !important;
  margin: 0 !important;
}

.app-shell {
  font-family: var(--font);
  max-width: 480px;
  width: 100%;
  margin: 0 auto;
  position: fixed;
  inset: 0;
  z-index: 1030; /* أعلى من top-navbar بتاع الليّاوت (z-index: 1020) لو ظهر لأي سبب */
  height: 100vh;
  height: 100dvh;
  display: flex;
  flex-direction: column;
  background-color: var(--bg);
  color: var(--text);
  overflow: hidden;
}

/* ---------------------------------------------------------------------
 * Utility
 * --------------------------------------------------------------------- */
.ltr-group {
  direction: ltr;
  display: inline-flex;
  align-items: center;
  gap: 7px;
}

/* ---------------------------------------------------------------------
 * Screen 1: Question Screen
 * --------------------------------------------------------------------- */
.page-fixed {
  display: flex;
  flex-direction: column;
  height: 100dvh;
  max-height: 100dvh;
  background-color: var(--bg);
  overflow: hidden;
}

.top-fixed {
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 14px 16px 10px;
}

.scroll-area {
  flex: 1;
  overflow-y: auto;
  padding: 0 16px 12px;
  -webkit-overflow-scrolling: touch;
}

.bottom-fixed {
  flex-shrink: 0;
  padding: 10px 16px 16px;
  background-color: var(--bg);
  box-shadow: 0 -4px 12px rgba(15, 23, 42, 0.04);
}

.ux-card {
  background-color: var(--card);
  border-radius: 20px;
  padding: 18px 18px 16px;
  box-shadow: 0 2px 10px rgba(30, 41, 59, 0.06);
}

/* Header */
.header-top-row {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  margin-bottom: 10px;
}

.exam-badge {
  font-size: 13px;
  font-weight: 700;
  color: #374151;
  background-color: #F1F3F8;
  padding: 5px 14px;
  border-radius: 999px;
}

.timer-text {
  font-size: 17px;
  font-weight: 800;
  font-variant-numeric: tabular-nums;
  color: var(--text);
}
.timer-text.low {
  color: var(--red);
}

.progress-line {
  font-size: 15px;
  font-weight: 700;
  color: var(--text);
  text-align: right;
  margin-bottom: 8px;
}

.progress-track {
  height: 6px;
  border-radius: 3px;
  background-color: #E7EBF3;
  overflow: hidden;
  margin-bottom: 14px;
}

.progress-fill {
  height: 100%;
  background-color: var(--blue);
  border-radius: 3px;
  transition: width 200ms ease;
}

.header-actions-row {
  display: flex;
  gap: 10px;
}

.header-action-btn {
  flex: 1;
  padding: 12px 10px;
  border-radius: 14px;
  border: 1.5px solid var(--border);
  background-color: #FFFFFF;
  font-size: 13.5px;
  font-weight: 700;
  color: var(--text);
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  justify-content: center;
}

/* Review Banner */
.review-banner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: var(--orangeTint);
  color: #8A5A14;
  font-size: 13px;
  font-weight: 600;
  padding: 10px 16px;
  border-radius: 14px;
}

.review-banner-close {
  background: none;
  border: none;
  color: #8A5A14;
  font-size: 13px;
  font-weight: 700;
  text-decoration: underline;
  cursor: pointer;
  font-family: var(--font);
}

/* Question Area */
.mark-link {
  background: none;
  border: none;
  padding: 0;
  font-size: 14px;
  font-weight: 700;
  cursor: pointer;
  font-family: var(--font);
  margin-bottom: 14px;
  color: var(--blue);
}
.mark-link.flagged {
  color: var(--orange);
}

.question-text {
  font-size: 17px;
  line-height: 1.65;
  font-weight: 700;
  color: var(--text);
  text-align: center;
  margin: 0 0 16px;
}

.options-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 4px;
}

.option-button {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
  padding: 13px 16px;
  border-radius: 14px;
  border: 1.5px solid var(--border);
  background-color: #FFFFFF;
  font-size: 14.5px;
  font-family: var(--font);
  cursor: pointer;
  transition: border-color 120ms ease, background-color 120ms ease;
  text-align: right;
}
.option-button.selected {
  border-color: var(--blue);
  background-color: var(--blueTint);
}

.option-text {
  flex: 1;
  line-height: 1.5;
  text-align: right;
  color: var(--text);
}

/* Footer Nav */
.footer-row {
  display: flex;
  gap: 10px;
}

.nav-button-outline {
  flex: 0.85;
  padding: 14px;
  border-radius: 14px;
  border: 1.5px solid var(--border);
  background-color: #FFFFFF;
  color: var(--text);
  font-size: 15px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  justify-content: center;
}
.nav-button-outline:disabled {
  opacity: 0.4;
  cursor: not-allowed;
}

.nav-button-primary {
  flex: 1.4;
  padding: 14px;
  border-radius: 14px;
  border: none;
  background-color: var(--blue);
  color: #FFFFFF;
  font-size: 15px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  justify-content: center;
}

/* ---------------------------------------------------------------------
 * Screen 2: Review Screen
 * --------------------------------------------------------------------- */
.page-centered {
  height: 100dvh;
  background-color: var(--bg);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 10px;
  overflow-y: auto;
}

.review-main {
  width: 100%;
  max-width: 480px;
  max-height: 100%;
  overflow-y: auto;
  background-color: #FFFFFF;
  border-radius: 26px;
  border: 1px solid #F1F5F9;
  box-shadow: 0 10px 30px -5px rgba(0,0,0,0.06), 0 4px 12px -2px rgba(0,0,0,0.02);
  padding: 16px 16px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.review-header-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding-bottom: 2px;
}

.review-title {
  font-size: 19px;
  font-weight: 900;
  color: #0f1d40;
  letter-spacing: -0.02em;
  margin: 0 0 4px;
}

.review-subtitle {
  font-size: 12.5px;
  color: #94A3B8;
  font-weight: 500;
  margin: 0;
}

.summary-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
}

.summary-card {
  border-radius: 14px;
  border: 1px solid;
  padding: 10px 6px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 5px;
}

.summary-icon-wrap {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.summary-label {
  font-size: 11.5px;
  color: #334155;
  font-weight: 600;
  text-align: center;
}

.summary-value {
  font-size: 13.5px;
  font-weight: 900;
}

.ready-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  gap: 6px;
  padding: 20px 16px;
  background-color: var(--greenTint);
  border: 1px solid var(--greenBorder);
  border-radius: 16px;
}

.ready-title {
  font-size: 16px;
  font-weight: 800;
  color: var(--greenDark);
}

.ready-sub {
  font-size: 13px;
  color: #2F5D45;
}

/* Notice Banner */
.notice-banner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  background-color: var(--blueTint2);
  border: 1px solid var(--blueBorder);
  border-radius: 14px;
  padding: 11px 12px;
}

.notice-lines {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.notice-line {
  display: flex;
  align-items: center;
  gap: 8px;
}

.notice-info-circle {
  width: 18px;
  height: 18px;
  border-radius: 50%;
  border: 2px solid var(--blue);
  color: var(--blue);
  font-size: 11px;
  font-weight: 800;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-style: italic;
}

.notice-line-text {
  font-size: 12.5px;
  font-weight: 700;
  color: #374151;
  margin: 0;
}

.review-actions {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.review-row {
  display: flex;
  align-items: center;
  gap: 10px;
  width: 100%;
  padding: 9px 10px;
  border-radius: 14px;
  background-color: #FFFFFF;
  border-style: solid;
  border-width: 1.5px;
  cursor: pointer;
  font-family: var(--font);
}

.review-row-chevron {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background-color: var(--blueTint);
  color: var(--blue);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.review-row-icon-box {
  width: 42px;
  height: 42px;
  border-radius: 13px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.review-row-text {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 3px;
  text-align: right;
}

.review-row-title {
  font-size: 14px;
  font-weight: 800;
  color: #0c2356;
}

.review-row-subtitle {
  font-size: 11.5px;
  color: #94A3B8;
  font-weight: 500;
}

.submit-footer {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  padding-top: 4px;
}

.submit-button {
  width: 100%;
  height: 50px;
  border-radius: 16px;
  border: none;
  background-color: var(--blue);
  color: #FFFFFF;
  font-size: 18px;
  font-weight: 800;
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 8px 16px -4px rgba(30, 91, 251, 0.3);
}

/* ---------------------------------------------------------------------
 * Bottom Sheet / Modal
 * --------------------------------------------------------------------- */
.sheet-overlay {
  position: fixed;
  inset: 0;
  background-color: rgba(17, 24, 39, 0.45);
  display: none; /* Flex when active */
  align-items: flex-end;
  z-index: 50;
}

.sheet-content {
  width: 100%;
  max-width: 480px;
  margin: 0 auto;
  background-color: #FFFFFF;
  border-radius: 24px 24px 0 0;
  padding: 16px 16px 20px;
  display: flex;
  flex-direction: column;
  max-height: 85vh;
}

.sheet-handle {
  width: 40px;
  height: 5px;
  border-radius: 3px;
  background-color: #E2E8F0;
  margin: 0 auto 16px;
}

.sheet-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
}

.sheet-title {
  font-size: 18px;
  font-weight: 800;
  color: var(--text);
}

.sheet-close {
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  background: none;
  border: none;
  color: var(--text);
}

.legend {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
  margin-bottom: 16px;
  padding-bottom: 14px;
  border-bottom: 1px solid #EEF0F5;
}

.legend-item {
  display: flex;
  align-items: center;
  gap: 6px;
}

.legend-swatch {
  width: 12px;
  height: 12px;
  border-radius: 4px;
  border: 1.5px solid;
  display: inline-block;
}

.legend-label {
  font-size: 12px;
  color: var(--textMuted);
  font-weight: 600;
}

.q-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 9px;
  overflow-y: auto;
  padding-bottom: 4px;
}

.grid-cell {
  position: relative;
  aspect-ratio: 1 / 1;
  border-radius: 10px;
  border: 1px solid;
  font-size: 13px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #FFFFFF;
}

.grid-flag {
  position: absolute;
  top: -6px;
  left: -6px;
  font-size: 11px;
}

/* Modal */
.modal-overlay {
  position: fixed;
  inset: 0;
  background-color: rgba(17, 24, 39, 0.5);
  display: none;
  align-items: center;
  justify-content: center;
  padding: 20px;
  z-index: 60;
}

.modal-card {
  width: 100%;
  max-width: 340px;
  background-color: #FFFFFF;
  border-radius: 20px;
  padding: 24px 20px;
  text-align: center;
  font-family: var(--font);
}

.modal-icon-wrap {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background-color: var(--blueTint);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 14px;
}

.modal-title {
  font-size: 17px;
  font-weight: 800;
  margin-bottom: 8px;
  color: var(--text);
}

.modal-body {
  font-size: 14px;
  color: var(--textMuted);
  line-height: 1.5;
  margin-bottom: 20px;
}

.modal-actions {
  display: flex;
  gap: 10px;
}

.modal-cancel-btn {
  flex: 1;
  padding: 13px;
  border-radius: 12px;
  border: 1.5px solid var(--border);
  background-color: #FFFFFF;
  color: var(--text);
  font-size: 14px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
}

.modal-confirm-btn {
  flex: 1;
  padding: 13px;
  border-radius: 12px;
  border: none;
  background-color: var(--blue);
  color: #FFFFFF;
  font-size: 14px;
  font-weight: 700;
  font-family: var(--font);
  cursor: pointer;
}

/* Generic Helpers */
.hidden { display: none !important; }
.v-hidden { visibility: hidden !important; }

/* ---------------------------------------------------------------------
 * Custom thin scrollbars
 * (dir="rtl" على app-shell بيخلي أي سكرول بار يظهر على شمال الشاشة
 *  بالشكل الافتراضي السميك/الغامق. هنا بنستبدله بشريط رفيع فاتح
 *  يناسب تصميم الشاشة بدل الخط البني اللي كان بيظهر) 
 * --------------------------------------------------------------------- */
.scroll-area,
.page-centered,
.review-main,
.q-grid,
.sheet-content {
  scrollbar-width: thin;
  scrollbar-color: #D7DEEA transparent;
}
.scroll-area::-webkit-scrollbar,
.page-centered::-webkit-scrollbar,
.review-main::-webkit-scrollbar,
.q-grid::-webkit-scrollbar,
.sheet-content::-webkit-scrollbar {
  width: 4px;
}
.scroll-area::-webkit-scrollbar-track,
.page-centered::-webkit-scrollbar-track,
.review-main::-webkit-scrollbar-track,
.q-grid::-webkit-scrollbar-track,
.sheet-content::-webkit-scrollbar-track {
  background: transparent;
}
.scroll-area::-webkit-scrollbar-thumb,
.page-centered::-webkit-scrollbar-thumb,
.review-main::-webkit-scrollbar-thumb,
.q-grid::-webkit-scrollbar-thumb,
.sheet-content::-webkit-scrollbar-thumb {
  background-color: #D7DEEA;
  border-radius: 10px;
}

/* Status cell styles */
.status-unanswered { background: #FFFFFF; border-color: var(--border); color: var(--textMuted); }
.status-answered { background: var(--greenTint); border-color: var(--green); color: #146C48; }
.status-flagged { background: var(--orangeTint); border-color: var(--orange); color: #8A5A14; }
.status-answered-flagged { background: var(--greenTint); border-color: var(--orange); color: #146C48; }
</style>
@endpush

@section('content')
@php
    $timeLimitMinutes = $session->gradedExam->time_limit_min ?? 60;
    $timeLeftSeconds = 0;
    $hasTimer = false;

    if ($timeLimitMinutes) {
        $hasTimer = true;
        $startedAt = $session->started_at ?? $session->created_at;
        $endTime = $startedAt->timestamp + ($timeLimitMinutes * 60);
        $timeLeftSeconds = max(0, $endTime - now()->timestamp);
    }
    $questions = $session->sessionQuestions;
@endphp
<div dir="rtl" class="app-shell" id="app-shell">

  <!-- ==========================================
       VIEW: QUESTION (Default)
  =========================================== -->
  <div id="view-question" class="page-fixed">
    
    <!-- Top Fixed -->
    <div class="top-fixed">
      <div class="ux-card">
        <div class="header-top-row" style="justify-content: space-between;">
          <div class="progress-line" dir="rtl" style="margin-bottom: 0;">
            السؤال <bdi id="lbl-q-index">1</bdi> من <bdi>{{ $session->total_questions }}</bdi>
          </div>
          <div class="ltr-group">
            <svg id="timer-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="13" r="8" />
              <path d="M12 9v4l3 2" />
              <path d="M9 2h6" />
              <path d="M12 2v3" />
            </svg>
            @if($hasTimer)
            <span class="timer-text" id="exam-timer">00:00:00</span>
            @else
            <span class="timer-text">--:--</span>
            @endif
          </div>
        </div>

        <div class="progress-track">
          <div class="progress-fill" id="progress-fill" style="width: 0%;"></div>
        </div>

        <div class="header-actions-row">
          <button type="button" class="header-action-btn" id="btn-open-nav">
            <div class="ltr-group">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 5.5c2.2-1 4.6-1 7 0v14c-2.4-1-4.8-1-7 0Z" />
                <path d="M20 5.5c-2.2-1-4.6-1-7 0v14c2.4-1 4.8-1 7 0Z" />
              </svg>
              <span>خريطة الأسئلة</span>
            </div>
          </button>
          <button type="button" class="header-action-btn" id="btn-finish-exam">
            <div class="ltr-group">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M7 3h7l4 4v14a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z" />
                <path d="M14 3v4h4" />
                <path d="M9 13.5l2 2 4-4.5" />
              </svg>
              <span>إنهاء الاختبار</span>
            </div>
          </button>
        </div>
      </div>

      <div class="review-banner hidden" id="review-queue-banner">
        <span>وضع المراجعة — سؤال <span id="rq-remaining">0</span> متبقي في هذه الجولة</span>
        <button type="button" class="review-banner-close" id="btn-exit-queue">رجوع</button>
      </div>
    </div>

    <!-- Scroll Area (Questions Form) -->
    <div class="scroll-area">
      <form id="exam-form" action="{{ route('user.graded_exams.answer', $session->id) }}" method="POST">
        @csrf
        
        @foreach($questions as $index => $sq)
          @php
            $isMulti = (bool) $sq->question->is_multi_correct;
            $correctCount = $isMulti
              ? $sq->question->options->filter(fn($opt) => $opt->is_correct)->count()
              : 1;
          @endphp
          
          <div class="ux-card question-card {{ $index === 0 ? 'active' : 'hidden' }}" data-index="{{ $index }}" data-is-multi="{{ $isMulti ? 'true' : 'false' }}" data-required-count="{{ $correctCount }}">
            
            <button type="button" class="mark-link btn-mark-star" data-index="{{ $index }}">
              <div class="ltr-group">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M7 3.5h10a1 1 0 0 1 1 1V21l-6-3.5L6 21V4.5a1 1 0 0 1 1-1Z" />
                </svg>
                <span class="mark-label">علّم السؤال للمراجعة</span>
              </div>
            </button>
            
            <!-- Hidden flag input to preserve state if needed, though we track via JS -->
            <input type="checkbox" class="flag-toggle hidden" tabindex="-1">

            <p class="question-text"><bdi>{{ $index + 1 }}</bdi>) {{ $sq->question->text_ar }}</p>

            @if($isMulti && $correctCount > 1)
              <div style="text-align: center; margin-bottom: 16px;">
                <span style="color: var(--blue); font-size: 13px; font-weight: 700; background: var(--blueTint); padding: 5px 14px; border-radius: 8px;">
                   @if($correctCount == 2)
                     (حدد إجابتين صحيحتين)
                   @else
                     (حدد {{ $correctCount }} إجابات صحيحة)
                   @endif
                </span>
              </div>
            @endif

            <div class="options-list">
              @foreach($sq->question->options as $optIdx => $opt)
                <label class="option-button" for="opt_{{ $sq->id }}_{{ $opt->id }}">
                  @if($isMulti)
                    <input type="checkbox" class="hidden option-input" name="answers[{{ $sq->id }}][]" value="{{ $opt->id }}" id="opt_{{ $sq->id }}_{{ $opt->id }}">
                  @else
                    <input type="radio" class="hidden option-input" name="answers[{{ $sq->id }}]" value="{{ $opt->id }}" id="opt_{{ $sq->id }}_{{ $opt->id }}">
                  @endif
                  
                  <div class="option-text">{{ $opt->option_text_ar }}</div>
                </label>
              @endforeach
            </div>

          </div>
        @endforeach
        
      </form>
    </div>

    <!-- Bottom Fixed (Navigation) -->
    <div class="bottom-fixed">
      <div class="footer-row">
        <button type="button" class="nav-button-outline" id="btn-prev" disabled>
          السابق
        </button>
        <button type="button" class="nav-button-primary" id="btn-next">
          التالي
        </button>
      </div>
    </div>

  </div>


  <!-- ==========================================
       VIEW: REVIEW (Dashboard)
  =========================================== -->
  <div id="view-review" class="page-centered hidden">
    <main class="review-main">
      
      <div class="ltr-group review-header-row" style="width:100%; justify-content:space-between;">
        <!-- SVGs for HeaderIllustration -->
        <div aria-hidden="true" style="width: 160px; height: 130px; flex-shrink: 0; position: relative;">
          <svg viewBox="0 0 160 130" width="100%" height="100%" style="filter: drop-shadow(0 6px 12px rgba(30, 91, 251, 0.15))">
            <circle cx="95" cy="70" fill="#f0f6ff" r="50" />
            <path d="M28 86C26 78 30 68 34 64C35 70 33 78 31 86Z" fill="#10B981" opacity="0.8" />
            <path d="M22 84C18 78 19 69 24 66C24 73 24 80 23 84Z" fill="#059669" />
            <path d="M35 84C40 79 43 72 40 68C37 73 35 79 34 84Z" fill="#34D399" />
            <rect fill="#E2E8F0" height="15" rx="5" width="18" x="20" y="85" />
            <g transform="rotate(-6 85 70)">
              <rect fill="#2563EB" height="92" rx="14" width="68" x="44" y="16" />
              <rect fill="#3B82F6" height="88" rx="12" width="64" x="46" y="18" />
              <rect fill="#FFFFFF" height="78" rx="8" width="56" x="50" y="24" />
              <rect fill="#94A3B8" height="12" rx="4" width="32" x="62" y="12" />
              <rect fill="#CBD5E1" height="8" rx="4" width="20" x="68" y="8" />
              <circle cx="78" cy="12" fill="#64748B" r="2.5" />
              <path d="M57 39L60 42L66 36" stroke="#2563EB" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" fill="none" />
              <rect fill="#CBD5E1" height="3" rx="1.5" width="26" x="70" y="38" />
              <path d="M57 52L60 55L66 49" stroke="#2563EB" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" fill="none" />
              <rect fill="#CBD5E1" height="3" rx="1.5" width="26" x="70" y="51" />
              <path d="M57 65L60 68L66 62" stroke="#2563EB" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" fill="none" />
              <rect fill="#E2E8F0" height="3" rx="1.5" width="18" x="70" y="64" />
            </g>
          </svg>
        </div>
        <div dir="rtl" style="text-align: right; display: flex; flex-direction: column; align-items: flex-end;">
          <button type="button" id="btn-return-from-review" style="background: var(--blueTint); border: none; color: var(--blue); cursor: pointer; display: flex; align-items: center; gap: 6px; font-family: var(--font); font-weight: 800; font-size: 12.5px; padding: 6px 12px; border-radius: 8px; margin-bottom: 12px;">
            الرجوع للأسئلة
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
               <path d="M9 5l7 7-7 7" />
            </svg>
          </button>
          <h1 class="review-title">مراجعة الاختبار</h1>
          <p class="review-subtitle">نظرة عامة قبل تسليم الاختبار</p>
        </div>
      </div>

      <div class="ltr-group summary-grid" style="width:100%; direction:ltr;">
        
        <div class="summary-card" style="background-color: var(--orangeTint); border-color: var(--orangeBorder);">
          <div class="summary-icon-wrap" style="background-color: var(--orangeIconBg);">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 14l9-5-9-5-9 5 9 5z" />
              <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
            </svg>
          </div>
          <div class="summary-label">معلّمة للمراجعة</div>
          <div class="summary-value" style="color: var(--orangeDark);" id="summary-flagged">0 سؤال</div>
        </div>

        <div class="summary-card" style="background-color: var(--redTint); border-color: var(--redBorder);">
          <div class="summary-icon-wrap" style="background-color: var(--redIconBg);">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <div class="summary-label">أسئلة متروكة</div>
          <div class="summary-value" style="color: var(--redDark);" id="summary-unanswered">0 سؤال</div>
        </div>

        <div class="summary-card" style="background-color: var(--greenTint); border-color: var(--greenBorder);">
          <div class="summary-icon-wrap" style="background-color: var(--greenIconBg);">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="9" />
              <path d="M8.3 12.3l2.5 2.5 5-5.3" />
            </svg>
          </div>
          <div class="summary-label">مجابة</div>
          <div class="summary-value" style="color: var(--greenDark);" id="summary-answered">0 من {{ $session->total_questions }}</div>
        </div>

      </div>

      <div id="ready-card" class="ready-card hidden">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="9" />
          <path d="M8.3 12.3l2.5 2.5 5-5.3" />
        </svg>
        <div class="ready-title">أنت جاهز للتسليم!</div>
        <div class="ready-sub">أجبت على جميع الأسئلة ولا يوجد أي أسئلة معلّمة.</div>
      </div>

      <div id="notice-banner" class="ltr-group notice-banner" style="width:100%; direction:ltr;">
        <div aria-hidden="true" style="width: 58px; height: 58px; flex-shrink: 0; position: relative;">
          <svg viewBox="0 0 100 100" width="100%" height="100%">
            <rect fill="#FFFFFF" height="64" rx="8" stroke="#3B82F6" stroke-width="3" width="52" x="18" y="16" />
            <rect fill="#3B82F6" height="10" rx="4" width="22" x="33" y="10" />
            <path d="M28 33L31 36L38 29" stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="none" />
            <line stroke="#94A3B8" stroke-linecap="round" stroke-width="2.5" x1="41" x2="60" y1="33" y2="33" />
            <line stroke="#CBD5E1" stroke-linecap="round" stroke-width="2.5" x1="41" x2="56" y1="48" y2="48" />
            <circle cx="68" cy="68" fill="#FFFFFF" r="18" stroke="#3B82F6" stroke-width="3" />
            <path d="M68 58V68L74 72" stroke="#1D4ED8" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" fill="none" />
            <circle cx="68" cy="68" fill="#1D4ED8" r="2.5" />
          </svg>
        </div>
        <div dir="rtl" class="notice-lines">
          <div class="notice-line" id="notice-unanswered">
            <span class="notice-info-circle">i</span>
            <p class="notice-line-text">
              لديك <strong style="color: var(--blue)" id="notice-unanswered-cnt">0 سؤال</strong> غير مجاب. يفضل إجابتها قبل التسليم.
            </p>
          </div>
          <div class="notice-line" id="notice-flagged">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <p class="notice-line-text">
              لديك <strong style="color: var(--orange)" id="notice-flagged-cnt">0 سؤال</strong> معلّم للمراجعة.
            </p>
          </div>
        </div>
      </div>

      <div class="review-actions">
        
        <div class="review-row" id="row-review-unanswered" style="border-color: var(--redBorder);">
          <div class="review-row-icon-box" style="background-color: var(--redTint);">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--red)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
              <polyline points="14 2 14 8 20 8" />
              <line x1="9" x2="15" y1="13" y2="13" />
              <line x1="9" x2="11" y1="17" y2="17" />
              <circle cx="16" cy="17" r="2.5" />
              <line x1="18" x2="20" y1="19" y2="21" />
            </svg>
          </div>
          <div class="review-row-text">
            <div class="review-row-title">الأسئلة المتروكة (<span id="rev-row-unanswered-cnt">0</span>)</div>
            <div class="review-row-subtitle">مراجعة الأسئلة غير المجابة فقط</div>
          </div>
          <div class="review-row-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M15 19l-7-7 7-7" /></svg></div>
        </div>

        <div class="review-row" id="row-review-flagged" style="border-color: var(--orangeBorder);">
          <div class="review-row-icon-box" style="background-color: var(--orangeTint);">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
              <rect height="4" rx="1" ry="1" width="8" x="8" y="2" />
              <path d="M9.5 10.5C9.5 9 10.5 8 12 8s2.5 1 2.5 2.5c0 1.5-1.5 2-1.5 3" />
              <circle cx="12" cy="17" fill="currentColor" r=".5" stroke="none" />
            </svg>
          </div>
          <div class="review-row-text">
            <div class="review-row-title">الأسئلة المعلّمة (<span id="rev-row-flagged-cnt">0</span>)</div>
            <div class="review-row-subtitle">مراجعة الأسئلة التي ميزتها بنجمة</div>
          </div>
          <div class="review-row-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M15 19l-7-7 7-7" /></svg></div>
        </div>

        <div class="review-row" id="row-review-all" style="border-color: var(--blueBorder);">
          <div class="review-row-icon-box" style="background-color: var(--blueTint);">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <rect x="5" y="4" width="12" height="17" rx="1.5" />
              <path d="M9 3.5h4a1 1 0 0 1 1 1V6H8V4.5a1 1 0 0 1 1-1Z" />
              <circle cx="17.5" cy="16.5" r="4.2" fill="#FFFFFF" />
              <path d="M17.5 14.5v2l1.3.9" />
            </svg>
          </div>
          <div class="review-row-text">
            <div class="review-row-title">كل الأسئلة</div>
            <div class="review-row-subtitle">تصفح جميع أسئلة الاختبار مجدداً</div>
          </div>
          <div class="review-row-chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M15 19l-7-7 7-7" /></svg></div>
        </div>

      </div>

      <div class="submit-footer">
        <button type="button" class="submit-button" id="btn-trigger-submit">
          تسليم الاختبار
        </button>
        <div class="submit-footnote">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
          لا يمكن التراجع بعد التسليم
        </div>
      </div>

    </main>
  </div>


  <!-- ==========================================
       MODALS & SHEETS
  =========================================== -->
  
  <!-- Question Map Bottom Sheet -->
  <div class="sheet-overlay" id="nav-sheet">
    <div class="sheet-content">
      <div class="sheet-handle"></div>
      <div class="sheet-header">
        <div class="sheet-title">خريطة الأسئلة</div>
        <button type="button" class="sheet-close" id="btn-close-sheet">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 6l12 12M18 6 6 18" />
          </svg>
        </button>
      </div>

      <div class="legend">
        <div class="legend-item"><span class="legend-swatch" style="background:#FFFFFF; border-color:var(--border);"></span> <span class="legend-label">متروك</span></div>
        <div class="legend-item"><span class="legend-swatch" style="background:var(--greenTint); border-color:var(--green);"></span> <span class="legend-label">مجاب</span></div>
        <div class="legend-item"><span class="legend-swatch" style="background:var(--orangeTint); border-color:var(--orange);"></span> <span class="legend-label">للمراجعة</span></div>
      </div>

      <div class="q-grid">
        @for($i=0; $i<$session->total_questions; $i++)
          <button type="button" class="grid-cell status-unanswered" data-map-index="{{$i}}">
            {{$i+1}}
            <span class="grid-flag hidden">⭐</span>
          </button>
        @endfor
      </div>
    </div>
  </div>

  <!-- Final Confirmation Modal -->
  <div class="modal-overlay" id="confirm-modal">
    <div class="modal-card">
      <div class="modal-icon-wrap">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="var(--blue)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" style="transform: scaleX(-1) rotate(12deg); transform-origin: center;" />
        </svg>
      </div>
      <div class="modal-title">تأكيد التسليم</div>
      <div class="modal-body" id="confirm-body-text">
        هل أنت متأكد من تسليم الاختبار؟
      </div>
      <div class="modal-actions">
        <button type="button" class="modal-cancel-btn" id="btn-cancel-submit">رجوع</button>
        <button type="button" class="modal-confirm-btn" id="btn-final-submit">تأكيد التسليم</button>
      </div>
    </div>
  </div>

  <!-- Flag Confirmation Modal (Review Flagged Queue) -->
  <div class="modal-overlay" id="confirm-flag-modal">
    <div class="modal-card">
      <div class="modal-icon-wrap" style="background-color: var(--orangeTint);">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
          <rect height="4" rx="1" ry="1" width="8" x="8" y="2" />
          <path d="M9.5 10.5C9.5 9 10.5 8 12 8s2.5 1 2.5 2.5c0 1.5-1.5 2-1.5 3" />
          <circle cx="12" cy="17" fill="currentColor" r=".5" stroke="none" />
        </svg>
      </div>
      <div class="modal-title">تأكيد الإجابة</div>
      <div class="modal-body">
        هل تود تأكيد هذه الإجابة؟ لو أكدت، هيتم إلغاء تعليم المراجعة عن السؤال.
      </div>
      <div class="modal-actions">
        <button type="button" class="modal-cancel-btn" id="btn-confirm-flag-no">لا</button>
        <button type="button" class="modal-confirm-btn" id="btn-confirm-flag-yes">نعم</button>
      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const totalQuestions = {{ $session->total_questions }};
    let currentIndex = 0;
    
    // State 
    let answers = {};
    let flags = {};
    let reviewQueueIds = null;
    let reviewQueuePos = 0;
    let reviewQueueType = null; // 'flagged' | 'unanswered' | null
    let flagReviewSnapshots = {}; // idx -> answer snapshot captured when a flagged question is opened in review mode
    let pendingFlagIdx = null; // question idx awaiting the "confirm answer" modal decision

    // View States
    // view: 'question' | 'review'

    function isQuestionAnswered(idx) {
        let card = $(`.question-card[data-index="${idx}"]`);
        let checkedCount = card.find('.option-input:checked').length;
        let isMulti = card.data('is-multi');
        if (isMulti) {
            let requiredCount = parseInt(card.data('required-count'), 10);
            return checkedCount === requiredCount;
        }
        return checkedCount > 0;
    }

    function getAnswerSnapshot(idx) {
        let card = $(`.question-card[data-index="${idx}"]`);
        let vals = card.find('.option-input:checked').map(function() { return $(this).val(); }).get();
        vals.sort();
        return vals.join(',');
    }

    function syncState() {
        answers = {};
        for(let i=0; i<totalQuestions; i++) {
            if (isQuestionAnswered(i)) {
                answers[i] = true;
            }
        }
    }

    // بيحدث حالة العلامة (flag) لسؤال معيّن، وبيزامن شكل زرار "علّم للمراجعة"
    // لو السؤال ده هو الظاهر دلوقتي على الشاشة
    function setFlag(idx, value) {
        flags[idx] = value;
        let starBtn = $(`.btn-mark-star[data-index="${idx}"]`);
        let starLabel = starBtn.find('.mark-label');
        if (value) {
            starBtn.addClass('flagged');
            starLabel.text('معلّم للمراجعة');
        } else {
            starBtn.removeClass('flagged');
            starLabel.text('علّم السؤال للمراجعة');
        }
        updateQuestionMap();
    }

    function updateQuestionMap() {
        syncState();
        let answeredCount = Object.keys(answers).length;
        let flaggedCount = Object.keys(flags).filter(k => flags[k]).length;
        let unansweredCount = totalQuestions - answeredCount;

        // Progress bar
        let pct = (currentIndex + 1) / totalQuestions * 100;
        $('#progress-fill').css('width', pct + '%');
        $('#lbl-q-index').text(currentIndex + 1);

        // Grid map cells
        $('.grid-cell').each(function() {
            let idx = $(this).data('map-index');
            let isAns = !!answers[idx];
            let isFlag = !!flags[idx];

            $(this).removeClass('status-unanswered status-answered status-flagged status-answered-flagged');
            
            if (isAns && isFlag) $(this).addClass('status-answered-flagged');
            else if (isFlag) $(this).addClass('status-flagged');
            else if (isAns) $(this).addClass('status-answered');
            else $(this).addClass('status-unanswered');

            if(isFlag) $(this).find('.grid-flag').removeClass('hidden');
            else $(this).find('.grid-flag').addClass('hidden');
            
            // highlight current
            if (idx === currentIndex) {
                $(this).css('border-color', 'var(--blue)');
                $(this).css('border-width', '2px');
            } else {
                $(this).css('border-width', '1px');
                if(!isAns && !isFlag) $(this).css('border-color', 'var(--border)');
            }
        });

        // Update review dashboard counts (يتنفذوا كل مرة يتغير فيها أي إجابة أو علامة مراجعة)
        $('#rev-answered').text(answeredCount);
        $('#rev-unanswered').text(unansweredCount);
        $('#rev-flagged').text(flaggedCount);
        $('#rev-row-unanswered-cnt').text(unansweredCount);
        $('#rev-row-flagged-cnt').text(flaggedCount);

        // Review Dashboard update
        $('#summary-answered').text(answeredCount + ' من ' + totalQuestions);
        $('#summary-unanswered').text(unansweredCount + ' سؤال');
        $('#summary-flagged').text(flaggedCount + ' سؤال');

        if(unansweredCount === 0 && flaggedCount === 0) {
            $('#ready-card').removeClass('hidden');
            $('#notice-banner').addClass('hidden');
        } else {
            $('#ready-card').addClass('hidden');
            $('#notice-banner').removeClass('hidden');
            
            if(unansweredCount > 0) {
                $('#notice-unanswered').removeClass('hidden');
                $('#notice-unanswered-cnt').text(unansweredCount + ' سؤال');
            } else {
                $('#notice-unanswered').addClass('hidden');
            }

            if(flaggedCount > 0) {
                $('#notice-flagged').removeClass('hidden');
                $('#notice-flagged-cnt').text(flaggedCount + ' سؤال');
            } else {
                $('#notice-flagged').addClass('hidden');
            }
        }
        
        // Hide/show row actions based on count
        if (unansweredCount === 0) $('#row-review-unanswered').addClass('hidden');
        else $('#row-review-unanswered').removeClass('hidden');
        
        if (flaggedCount === 0) $('#row-review-flagged').addClass('hidden');
        else $('#row-review-flagged').removeClass('hidden');
    }

    function showQuestion(idx) {
        currentIndex = idx;
        $('.question-card').addClass('hidden').removeClass('active');
        $(`.question-card[data-index="${idx}"]`).removeClass('hidden').addClass('active');

        // Review Queue Banner
        if (reviewQueueIds) {
            $('#review-queue-banner').removeClass('hidden');
            $('#rq-remaining').text(reviewQueueIds.length - reviewQueuePos);
            // In review mode, button is "Next" if not last in queue, else "Finish Review"
            if (reviewQueuePos < reviewQueueIds.length - 1) {
                $('#btn-next').text('التالي');
            } else {
                $('#btn-next').text('إنهاء المراجعة');
            }
        } else {
            $('#review-queue-banner').addClass('hidden');
            $('#btn-next').text(currentIndex === totalQuestions - 1 ? 'إنهاء' : 'التالي');
        }

        $('#btn-prev').prop('disabled', (reviewQueueIds && reviewQueuePos === 0) || (!reviewQueueIds && currentIndex === 0));

        // تحديث حالة زر "علّم للمراجعة" الظاهر فوق السؤال الحالي عشان يتزامن مع أي تعديل حصل
        let currentCard = $(`.question-card[data-index="${idx}"]`);
        let starBtn = currentCard.find('.btn-mark-star');
        let starLabel = starBtn.find('.mark-label');
        if (flags[idx]) {
            starBtn.addClass('flagged');
            starLabel.text('معلّم للمراجعة');
        } else {
            starBtn.removeClass('flagged');
            starLabel.text('علّم السؤال للمراجعة');
        }

        // لو داخلين في جولة مراجعة "الأسئلة المعلّمة"، نسجّل حالة الإجابة الحالية
        // عشان نقدر نعرف بعدين لما يدوس "التالي" هل غيّرها ولا لأ
        if (reviewQueueIds && reviewQueueType === 'flagged') {
            flagReviewSnapshots[idx] = getAnswerSnapshot(idx);
        }

        updateQuestionMap();
        window.scrollTo({top: 0});
    }

    // Toggle Flag (event delegation عشان تفضل شغالة مهما اتغيرت الشاشة الظاهرة،
    // وعشان الأرقام تتحدث فورًا لحظة بلحظة مع كل تعليم/إلغاء تعليم)
    $(document).on('click', '.btn-mark-star', function() {
        let idx = $(this).data('index');
        setFlag(idx, !flags[idx]);
    });

    // Options Selection Visuals (event delegation لنفس السبب: تحديث فوري
    // لعدد "الأسئلة المجابة/المتروكة" مع كل اختيار إجابة)
    $(document).on('change', '.option-input', function() {
        let type = $(this).attr('type');
        let card = $(this).closest('.question-card');
        
        if (type === 'radio') {
            card.find('.option-button').removeClass('selected');
            
            $(this).closest('.option-button').addClass('selected');
        } else {
            let btn = $(this).closest('.option-button');
            if ($(this).is(':checked')) {
                btn.addClass('selected');
            } else {
                btn.removeClass('selected');
            }
        }
        updateQuestionMap();
    });

    // Navigation
    // بيكمّل فعليًا لخطوة "التالي" (بعد ما أي تحقق خاص بوضع مراجعة الأسئلة المعلّمة يخلص)
    function proceedNext() {
        if (reviewQueueIds) {
            if (reviewQueuePos < reviewQueueIds.length - 1) {
                reviewQueuePos++;
                showQuestion(reviewQueueIds[reviewQueuePos]);
            } else {
                // Exit queue
                reviewQueueIds = null;
                reviewQueueType = null;
                showReviewScreen();
            }
        } else {
            if (currentIndex < totalQuestions - 1) {
                showQuestion(currentIndex + 1);
            } else {
                showReviewScreen();
            }
        }
    }

    $('#btn-next').on('click', function() {
        // السلوك الخاص بيشتغل بس جوه جولة مراجعة "الأسئلة المعلّمة"
        if (reviewQueueIds && reviewQueueType === 'flagged') {
            let idx = currentIndex;
            if (flags[idx]) {
                let currentSnapshot = getAnswerSnapshot(idx);
                let initialSnapshot = flagReviewSnapshots[idx];

                if (currentSnapshot !== initialSnapshot) {
                    // غيّر الإجابة -> تتشال العلامة تلقائي وينتقل عادي
                    setFlag(idx, false);
                    proceedNext();
                } else {
                    // مغيرش الإجابة -> اسأله تأكيد قبل ما يكمل
                    pendingFlagIdx = idx;
                    $('#confirm-flag-modal').css('display', 'flex');
                }
                return;
            }
        }
        proceedNext();
    });

    $('#btn-confirm-flag-yes').on('click', function() {
        $('#confirm-flag-modal').css('display', 'none');
        if (pendingFlagIdx !== null) {
            setFlag(pendingFlagIdx, false);
            pendingFlagIdx = null;
        }
        proceedNext();
    });

    $('#btn-confirm-flag-no').on('click', function() {
        $('#confirm-flag-modal').css('display', 'none');
        // العلامة تفضل زي ما هي، ويكمل للسؤال اللي بعده عادي
        pendingFlagIdx = null;
        proceedNext();
    });

    $('#btn-prev').on('click', function() {
        if (reviewQueueIds) {
            if (reviewQueuePos > 0) {
                reviewQueuePos--;
                showQuestion(reviewQueueIds[reviewQueuePos]);
            }
        } else {
            if (currentIndex > 0) {
                showQuestion(currentIndex - 1);
            }
        }
    });

    $('#btn-finish-exam').on('click', function() {
        reviewQueueIds = null;
        reviewQueueType = null;
        showReviewScreen();
    });

    $('#btn-exit-queue').on('click', function() {
        reviewQueueIds = null;
        reviewQueueType = null;
        showReviewScreen();
    });

    // Navigator Sheet
    $('#btn-open-nav').on('click', function() {
        updateQuestionMap();
        $('#nav-sheet').css('display', 'flex');
    });
    $('#btn-close-sheet').on('click', function() {
        $('#nav-sheet').css('display', 'none');
    });
    $(document).on('click', '.grid-cell', function() {
        let idx = $(this).data('map-index');
        $('#nav-sheet').css('display', 'none');
        reviewQueueIds = null; // drop out of queue if map used
        reviewQueueType = null;
        $('#view-review').addClass('hidden');
        $('#view-question').removeClass('hidden');
        showQuestion(idx);
    });

    // Views
    function showReviewScreen() {
        updateQuestionMap();
        $('#view-question').addClass('hidden');
        $('#view-review').removeClass('hidden');
        window.scrollTo({top: 0});
    }

    // Review Actions
    function buildQueue(filter) {
        syncState();
        let q = [];
        for(let i=0; i<totalQuestions; i++) {
            if (filter === 'unanswered' && !isQuestionAnswered(i)) q.push(i);
            if (filter === 'flagged' && flags[i]) q.push(i);
        }
        return q;
    }

    $('#row-review-unanswered').on('click', function() {
        let q = buildQueue('unanswered');
        if (q.length) {
            reviewQueueIds = q;
            reviewQueuePos = 0;
            reviewQueueType = 'unanswered';
            $('#view-review').addClass('hidden');
            $('#view-question').removeClass('hidden');
            showQuestion(reviewQueueIds[0]);
        }
    });

    $('#row-review-flagged').on('click', function() {
        let q = buildQueue('flagged');
        if (q.length) {
            reviewQueueIds = q;
            reviewQueuePos = 0;
            reviewQueueType = 'flagged';
            $('#view-review').addClass('hidden');
            $('#view-question').removeClass('hidden');
            showQuestion(reviewQueueIds[0]);
        }
    });

    $('#row-review-all').on('click', function() {
        reviewQueueIds = null;
        reviewQueueType = null;
        $('#view-review').addClass('hidden');
        $('#view-question').removeClass('hidden');
        showQuestion(0);
    });

    $('#btn-return-from-review').on('click', function() {
        reviewQueueIds = null;
        reviewQueueType = null;
        $('#view-review').addClass('hidden');
        $('#view-question').removeClass('hidden');
        showQuestion(currentIndex);
    });

    // Final Submit
    $('#btn-trigger-submit').on('click', function() {
        syncState();
        let unansweredCount = totalQuestions - Object.keys(answers).length;
        if (unansweredCount > 0) {
            $('#confirm-body-text').text("لديك " + unansweredCount + " أسئلة غير مجابة. هل أنت متأكد من تسليم الاختبار؟");
        } else {
            $('#confirm-body-text').text("أجبت على جميع الأسئلة. هل أنت متأكد من تسليم الاختبار؟");
        }
        $('#confirm-modal').css('display', 'flex');
    });

    $('#btn-cancel-submit').on('click', function() {
        $('#confirm-modal').css('display', 'none');
    });

    $('#btn-final-submit').on('click', function() {
        $('#exam-form').submit();
    });

    // Timer Logic
    const hasTimer = {{ $hasTimer ? 'true' : 'false' }};
    let timeLeft = {{ $timeLeftSeconds }};

    if (hasTimer) {
        function updateTimerDisplay() {
            let h = Math.floor(timeLeft / 3600);
            let m = Math.floor((timeLeft % 3600) / 60);
            let s = timeLeft % 60;

            let display = '';
            if (h > 0) display += String(h).padStart(2, '0') + ':';
            display += String(m).padStart(2, '0') + ':' + String(s).padStart(2, '0');

            $('#exam-timer').text(display);

            if (timeLeft <= 300) {
                $('#exam-timer').addClass('low');
                $('#timer-icon').attr('stroke', 'var(--red)');
            } else {
                $('#exam-timer').removeClass('low');
                $('#timer-icon').attr('stroke', 'currentColor');
            }
        }

        updateTimerDisplay();

        let timerInterval = setInterval(function() {
            timeLeft--;
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                $('#exam-form').submit(); 
            } else {
                updateTimerDisplay();
            }
        }, 1000);
    }

    // Init
    updateQuestionMap();
    showQuestion(0);
});
</script>
@endpush