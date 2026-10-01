@extends('layouts.admin')
@section('title', 'تفاصيل المقياس: ' . $assessment->title_ar)
@section('page-title', 'إدارة المقياس')

@push('styles')
<style>
    /* Premium layout styles */
    .nav-tabs-custom {
        border-bottom: 2px solid #dee2e6;
        gap: 8px;
    }
    .nav-tabs-custom .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #495057;
        font-weight: 500;
        padding: 12px 20px;
        transition: all 0.2s ease-in-out;
        font-size: 0.95rem;
    }
    .nav-tabs-custom .nav-link:hover {
        color: #0d6efd;
        background: rgba(13, 110, 253, 0.05);
        border-radius: 8px 8px 0 0;
    }
    .nav-tabs-custom .nav-link.active {
        color: #0d6efd;
        border-bottom-color: #0d6efd;
        background: transparent;
        font-weight: 600;
    }
    
    /* Sortable handles and rows */
    .dim-drag-handle, .q-drag-handle {
        cursor: grab;
        color: #adb5bd;
        padding: 4px 8px;
        display: inline-flex;
        align-items: center;
        transition: color 0.15s;
    }
    .dim-drag-handle:hover, .q-drag-handle:hover {
        color: #495057;
    }
    .dim-drag-handle:active, .q-drag-handle:active {
        cursor: grabbing;
    }
    
    /* Accordion Custom Styling */
    .accordion-custom .accordion-item {
        border: 1px solid #dee2e6;
        border-radius: 12px !important;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.03);
        overflow: hidden;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .accordion-custom .accordion-item:hover {
        border-color: #b5d5ff;
        box-shadow: 0 6px 12px rgba(13, 110, 253, 0.05);
    }
    .accordion-custom .accordion-header {
        background-color: #f8fafd;
        border-bottom: 1px solid #dee2e6;
        border-right: 4px solid #cbd5e1;
        transition: border-right-color 0.2s, background-color 0.2s;
    }
    .accordion-custom .accordion-item.is-expanded .accordion-header,
    .accordion-custom .accordion-item:has(.accordion-collapse.show) .accordion-header {
        background-color: #edf5ff;
        border-right-color: #0d6efd;
        border-bottom: 1px solid #b5d5ff;
    }
    .accordion-custom .accordion-button {
        background-color: transparent;
        box-shadow: none;
        padding: 16px 20px;
        color: #344054;
        font-weight: 600;
        transition: color 0.2s;
    }
    .accordion-custom .accordion-button:not(.collapsed) {
        background-color: transparent;
        color: #0959cc;
    }
    .accordion-custom .accordion-button::after {
        margin-right: auto;
        margin-left: 0;
    }
    .accordion-custom .accordion-collapse {
        border-top: 1px solid #dee2e6;
    }
    
    /* Question list item */
    .question-row {
        background: #fff;
        border-bottom: 1px solid #f1f3f5;
        padding: 12px 16px;
        transition: background-color 0.15s;
    }
    .question-row:hover {
        background-color: #fdfdfe;
    }
    .question-row:last-child {
        border-bottom: none;
    }
    
    /* Recommendation Cards */
    .recommendation-card {
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.03);
        height: 100%;
        transition: transform 0.2s;
    }
    .recommendation-card:hover {
        transform: translateY(-2px);
    }
    
    /* Custom input/textarea adjustments */
    .auto-resize-textarea {
        min-height: 60px;
        resize: none;
        overflow-y: hidden;
    }
    .no-caret::after {
        display: none !important;
    }
</style>
@endpush

@section('content')
<!-- Header Area -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body py-3 px-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <h4 class="mb-0 fw-bold text-dark" id="header-assessment-title">{{ $assessment->title_ar }}</h4>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1" id="header-assessment-category">
                    {{ $assessment->category }}
                </span>
            </div>
            <div class="text-muted small">
                <i class="bi bi-clock me-1"></i>
                <span id="header-assessment-time">{{ $assessment->time_limit_min ? $assessment->time_limit_min . ' دقيقة' : 'بلا حد للوقت' }}</span>
                <span class="mx-2">•</span>
                <i class="bi bi-calendar3 me-1"></i>
                تاريخ الإنشاء: {{ $assessment->created_at->format('Y-m-d') }}
            </div>
        </div>
        
        <div class="d-flex align-items-center gap-3">
            <div class="form-check form-switch ps-0 pe-5 fs-5">
                <input class="form-check-input ms-0 me-2 cursor-pointer" type="checkbox" role="switch" id="header-is-active" 
                       {{ $assessment->is_active ? 'checked' : '' }} 
                       data-url="{{ route('admin.assessments.toggle', $assessment->id) }}">
                <label class="form-check-label text-dark small fw-medium" for="header-is-active" id="header-active-label">
                    {{ $assessment->is_active ? 'مفعّل' : 'موقف' }}
                </label>
            </div>
            
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="previewDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-eye me-1"></i>معاينة نتائج المقياس
                </button>
                <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="previewDropdown" style="max-height: 350px; overflow-y: auto;">
                    @if($assessment->scoring_type === 'perceptual_styles')
                        @php
                            $perceptualReports = [
                                'visual' => 'النمط البصري',
                                'auditory' => 'النمط السمعي',
                                'kinesthetic' => 'النمط الحسي (العملي)',
                                'balanced' => 'نمط متوازن',
                                'dual_visual_auditory' => 'نمط مزدوج (بصري – سمعي)',
                                'dual_visual_kinesthetic' => 'نمط مزدوج (بصري – حسي)',
                                'dual_auditory_kinesthetic' => 'نمط مزدوج (سمعي – حسي)',
                            ];
                        @endphp
                        @foreach($perceptualReports as $lvlKey => $lvlTitle)
                            <li>
                                <a class="dropdown-item py-2" target="_blank" href="{{ route('admin.assessments.preview', ['assessment' => $assessment->id, 'level' => $lvlKey]) }}">
                                    <i class="bi bi-file-earmark-bar-graph text-primary me-2"></i>{{ $lvlTitle }}
                                </a>
                            </li>
                        @endforeach
                    @else
                        @forelse($assessment->recommendations as $rec)
                            <li>
                                <a class="dropdown-item py-2" target="_blank" href="{{ route('admin.assessments.preview', ['assessment' => $assessment->id, 'level' => $rec->level]) }}">
                                    <i class="bi bi-file-earmark-bar-graph text-primary me-2"></i>{{ $rec->title_ar ?? $rec->level }}
                                </a>
                            </li>
                        @empty
                            <li><a class="dropdown-item disabled text-muted" href="#">لا توجد توصيات مسجلة</a></li>
                        @endforelse
                    @endif
                </ul>
            </div>

            <a href="{{ route('admin.assessments.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-right me-1"></i>العودة للمقاييس
            </a>
        </div>
    </div>
</div>

<!-- Tabs Navigation -->
<ul class="nav nav-tabs nav-tabs-custom mb-4" id="assessmentTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="dimensions-tab" data-bs-toggle="tab" data-bs-target="#tab-dimensions-questions" type="button" role="tab" aria-controls="tab-dimensions-questions" aria-selected="true">
            <i class="bi bi-collection-play me-1"></i>الأبعاد والأسئلة
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="recommendations-tab" data-bs-toggle="tab" data-bs-target="#tab-recommendations" type="button" role="tab" aria-controls="tab-recommendations" aria-selected="false">
            <i class="bi bi-lightbulb me-1"></i>ملخص التقرير
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#tab-settings" type="button" role="tab" aria-controls="tab-settings" aria-selected="false">
            <i class="bi bi-gear-wide-connected me-1"></i>إعدادات المقياس
        </button>
    </li>
</ul>

<!-- Tabs Content -->
<div class="tab-content" id="assessmentTabsContent">
    
    <!-- Tab 1: الأبعاد والأسئلة -->
    <div class="tab-pane fade show active" id="tab-dimensions-questions" role="tabpanel" aria-labelledby="dimensions-tab">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0 text-dark">هيكل الأبعاد والأسئلة</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bulkImportModal">
                <i class="bi bi-file-earmark-arrow-up me-1"></i>استيراد أسئلة بالجملة
            </button>
        </div>
        
        <!-- Dimensions Accordion List -->
        <div class="accordion accordion-custom" id="dimensions-accordion">
            @forelse($assessment->dimensions as $dim)
                @php
                    $dimRecs = $dim->interpretations->keyBy('level');
                    $firstRec = $dim->interpretations->first();
                    $lowThreshold = $firstRec ? $firstRec->low_threshold : '';
                    $highThreshold = $firstRec ? $firstRec->high_threshold : '';
                    $highText = $dimRecs->has('high') ? $dimRecs->get('high')->interpretation_text_ar : '';
                    $mediumText = $dimRecs->has('medium') ? $dimRecs->get('medium')->interpretation_text_ar : '';
                    $lowText = $dimRecs->has('low') ? $dimRecs->get('low')->interpretation_text_ar : '';
                @endphp
                <div class="accordion-item" data-id="{{ $dim->id }}">

                    <div class="accordion-header d-flex align-items-center justify-content-between px-3">
                        <div class="d-flex align-items-center flex-grow-1 py-1">
                            <span class="dim-drag-handle me-2" title="اسحب لإعادة ترتيب الأبعاد">
                                <i class="bi bi-grip-vertical fs-5"></i>
                            </span>
                            
                            <!-- Dimension Display Mode -->
                            <div class="dim-display-container d-flex align-items-center gap-2 flex-grow-1" id="dim-display-{{ $dim->id }}">
                                <span class="accordion-button collapsed py-2 px-1 border-0 bg-transparent fw-semibold" 
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $dim->id }}" 
                                        aria-expanded="false" aria-controls="collapse-{{ $dim->id }}">
                                    <span class="dim-name-text">{{ $dim->name_ar }}</span>
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle ms-2 rounded-pill px-2 py-1 fs-xs dim-q-count">
                                        {{ $dim->questions->count() }} سؤال
                                    </span>
                                    <span class="badge bg-info-subtle text-info border border-info-subtle ms-2 rounded-pill px-2 py-1 fs-xs">
                                        الدرجة القصوى: <span class="dim-max-score-text">{{ $dim->max_score }}</span>
                                    </span>
                                </span>
                                
                                <div class="ms-auto d-flex gap-1 align-items-center btn-actions-group">
                                    <button class="btn btn-sm btn-outline-secondary btn-edit-dim" data-id="{{ $dim->id }}" title="تعديل البعد">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger btn-delete-dim" 
                                            data-url="{{ route('admin.dimensions.destroy', $dim->id) }}" 
                                            data-name="{{ $dim->name_ar }}" title="حذف البعد">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Dimension Edit Mode Form (Hidden by default) -->
                            <div class="dim-edit-container d-none w-100 py-2 d-flex align-items-center gap-2" id="dim-edit-{{ $dim->id }}">
                                <input type="text" class="form-control form-control-sm w-50 input-dim-name" value="{{ $dim->name_ar }}" placeholder="اسم البعد">
                                <input type="number" class="form-control form-control-sm w-20 input-dim-max" value="{{ $dim->max_score }}" placeholder="الدرجة القصوى" min="1">
                                <button class="btn btn-sm btn-success btn-save-dim" data-id="{{ $dim->id }}">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                                <button class="btn btn-sm btn-secondary btn-cancel-dim" data-id="{{ $dim->id }}">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapse-{{ $dim->id }}" class="accordion-collapse collapse" data-bs-parent="#dimensions-accordion">
                        <div class="accordion-body p-0 bg-white">
                            <!-- Questions List (Sortable) -->
                            <div class="questions-list" data-dimension-id="{{ $dim->id }}">
                                @forelse($dim->questions as $qIdx => $q)
                                    <div class="question-row d-flex align-items-center justify-content-between" data-id="{{ $q->id }}">
                                        <div class="d-flex align-items-center flex-grow-1">
                                            <span class="q-drag-handle me-2" title="اسحب لإعادة ترتيب الأسئلة">
                                                <i class="bi bi-grip-vertical"></i>
                                            </span>
                                            <span class="text-muted me-2 small fw-semibold q-number">{{ $qIdx + 1 }}.</span>
                                            
                                            <!-- Question Text Container -->
                                            <div class="flex-grow-1 me-3">
                                                <span class="q-display-text text-dark" id="q-display-{{ $q->id }}">{{ $q->text_ar }}</span>
                                                @if($q->is_reversed)
                                                    <span class="badge ms-2 rounded-pill"
                                                          style="background:#fef3c7;color:#92400e;border:1px solid #fcd34d;font-size:.68rem"
                                                          title="سؤال معكوس: نعم=0 | إلى حد ما=1 | لا=2">
                                                        ⇄ معكوس
                                                    </span>
                                                @endif
                                                <div class="q-edit-container d-none mt-1" id="q-edit-{{ $q->id }}">
                                                    <textarea class="form-control form-control-sm auto-resize-textarea input-q-text">{{ $q->text_ar }}</textarea>
                                                    <div class="mt-2 d-flex gap-1 justify-content-end">
                                                        <button class="btn btn-sm btn-secondary btn-cancel-q" data-id="{{ $q->id }}">إلغاء</button>
                                                        <button class="btn btn-sm btn-success btn-save-q" data-id="{{ $q->id }}">حفظ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Actions -->
                                        <div class="d-flex gap-1 align-items-center q-actions" id="q-actions-{{ $q->id }}">
                                            <button class="btn btn-sm btn-outline-info border-0 btn-manage-options" data-id="{{ $q->id }}" title="خيارات الإجابة">
                                                <i class="bi bi-list-check"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary border-0 btn-edit-q" data-id="{{ $q->id }}" title="تعديل نص السؤال">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm border-0 btn-toggle-reversed"
                                                    data-id="{{ $q->id }}"
                                                    data-reversed="{{ $q->is_reversed ? '1' : '0' }}"
                                                    data-url="{{ route('admin.questions.update', $q->id) }}"
                                                    title="{{ $q->is_reversed ? 'إلغاء العكس' : 'تفعيل كسؤال معكوس' }}"
                                                    style="color:{{ $q->is_reversed ? '#d97706' : '#9ca3af' }}">
                                                <i class="bi bi-arrow-left-right"></i>
                                            </button>
                                            
                                            <!-- Move Dropdown -->
                                            <div class="dropdown d-inline">
                                                <button class="btn btn-sm btn-outline-secondary border-0 no-caret" data-bs-toggle="dropdown" title="نقل إلى بُعد آخر">
                                                    <i class="bi bi-folder-symlink"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                    <li><h6 class="dropdown-header">نقل إلى البُعد:</h6></li>
                                                    @foreach($assessment->dimensions as $dOption)
                                                        @if($dOption->id != $dim->id)
                                                            <li><button class="dropdown-item btn-move-q" data-question-id="{{ $q->id }}" data-dimension-id="{{ $dOption->id }}">{{ $dOption->name_ar }}</button></li>
                                                        @endif
                                                    @endforeach
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><button class="dropdown-item btn-move-q text-danger" data-question-id="{{ $q->id }}" data-dimension-id="">بدون بُعد (عام)</button></li>
                                                </ul>
                                            </div>
                                            
                                            <button class="btn btn-sm btn-outline-danger border-0 btn-delete-q" 
                                                    data-url="{{ route('admin.questions.destroy', $q->id) }}" title="حذف السؤال">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center text-muted py-3 small bg-light-subtle">لا توجد أسئلة في هذا البعد بعد.</div>
                                @endforelse
                            </div>
                            
                            <!-- Inline Add Question Form -->
                            <div class="p-3 bg-light border-top d-flex gap-2 align-items-center">
                                <input type="text" class="form-control form-control-sm flex-grow-1 input-add-q-text" placeholder="اكتب نص السؤال واضغط إضافة...">
                                <button class="btn btn-sm btn-outline-primary px-3 btn-add-q-inline" data-dimension-id="{{ $dim->id }}">
                                    <i class="bi bi-plus-lg me-1"></i>إضافة سؤال
                                </button>
                            </div>

                            <!-- Dimension Interpretations Form -->
                            <div class="p-4 border-top bg-light-subtle">
                                <h6 class="fw-bold mb-3 text-dark"><i class="bi bi-journal-text me-2 text-primary"></i>تفسيرات هذا البُعد ومستويات الدرجة</h6>
                                <form class="dimension-interpretations-ajax-form" data-dimension-id="{{ $dim->id }}">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-medium text-muted">الحد الأقصى للمستوى المنخفض (%) *</label>
                                            <input type="number" class="form-control form-control-sm input-dim-low-threshold" value="{{ $lowThreshold }}" required min="0" max="100" placeholder="مثال: 33">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-medium text-muted">الحد الأدنى للمستوى المرتفع (%) *</label>
                                            <input type="number" class="form-control form-control-sm input-dim-high-threshold" value="{{ $highThreshold }}" required min="0" max="100" placeholder="مثال: 70">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label small fw-medium text-success">تفسير المستوى المرتفع (High) *</label>
                                            <textarea class="form-control form-control-sm auto-resize-textarea textarea-dim-high-text" rows="3" required placeholder="التفسير في حال كانت الدرجة مرتفعة...">{{ $highText }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-medium text-warning">تفسير المستوى المتوسط (Medium) *</label>
                                            <textarea class="form-control form-control-sm auto-resize-textarea textarea-dim-medium-text" rows="3" required placeholder="التفسير في حال كانت الدرجة متوسطة...">{{ $mediumText }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-medium text-danger">تفسير المستوى المنخفض (Low) *</label>
                                            <textarea class="form-control form-control-sm auto-resize-textarea textarea-dim-low-text" rows="3" required placeholder="التفسير في حال كانت الدرجة منخفضة...">{{ $lowText }}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary btn-sm px-4 btn-save-dim-interpretations">
                                            <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التفسيرات والحدود</span>
                                            <span class="spinner-border spinner-border-sm d-none"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="card border-0 shadow-sm p-4 text-center text-muted mb-3">
                    <i class="bi bi-folder2-open display-6 mb-2"></i>
                    <div>لا توجد أبعاد فرعية لهذا المقياس بعد. يرجى إضافة بُعد بالأسفل للبدء.</div>
                </div>
            @endforelse
        </div>
        
        <!-- Questions without Dimension Section -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom-0">
                @if($assessment->dimensions->isEmpty())
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-question-square me-2 text-primary"></i>أسئلة المقياس</h6>
                    <span class="badge bg-primary-subtle text-dark border border-primary-subtle rounded-pill px-2 py-1 small">
                        {{ $assessment->questions->count() }} سؤال
                    </span>
                @else
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-question-square me-2 text-warning"></i>أسئلة بدون بُعد فرعي</h6>
                    <span class="badge bg-warning-subtle text-dark border border-warning-subtle rounded-pill px-2 py-1 small">
                        {{ $assessment->questions->count() }} سؤال معلّق
                    </span>
                @endif
            </div>
            <div class="card-body p-0">
                <div class="unassigned-questions-list">
                    @forelse($assessment->questions as $qIdx => $q)
                        <div class="question-row d-flex align-items-center justify-content-between border-top">
                            <div class="d-flex align-items-center flex-grow-1">
                                <span class="text-muted me-2 small fw-semibold">{{ $qIdx + 1 }}.</span>
                                
                                <div class="flex-grow-1 me-3">
                                    <span class="q-display-text text-dark" id="q-display-{{ $q->id }}">{{ $q->text_ar }}</span>
                                    <div class="q-edit-container d-none mt-1" id="q-edit-{{ $q->id }}">
                                        <textarea class="form-control form-control-sm auto-resize-textarea input-q-text">{{ $q->text_ar }}</textarea>
                                        <div class="mt-2 d-flex gap-1 justify-content-end">
                                            <button class="btn btn-sm btn-secondary btn-cancel-q" data-id="{{ $q->id }}">إلغاء</button>
                                            <button class="btn btn-sm btn-success btn-save-q" data-id="{{ $q->id }}">حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex gap-1 align-items-center q-actions" id="q-actions-{{ $q->id }}">
                                <button class="btn btn-sm btn-outline-info border-0 btn-manage-options" data-id="{{ $q->id }}" title="خيارات الإجابة">
                                    <i class="bi bi-list-check"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary border-0 btn-edit-q" data-id="{{ $q->id }}" title="تعديل السؤال">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                
                                @if(!$assessment->dimensions->isEmpty())
                                    <!-- Move Dropdown -->
                                    <div class="dropdown d-inline">
                                        <button class="btn btn-sm btn-outline-secondary border-0 no-caret" data-bs-toggle="dropdown" title="تعيين لبعد">
                                            <i class="bi bi-folder-symlink"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                            <li><h6 class="dropdown-header">تعيين للبُعد:</h6></li>
                                            @foreach($assessment->dimensions as $dOption)
                                                <li><button class="dropdown-item btn-move-q" data-question-id="{{ $q->id }}" data-dimension-id="{{ $dOption->id }}">{{ $dOption->name_ar }}</button></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <button class="btn btn-sm btn-outline-danger border-0 btn-delete-q" 
                                        data-url="{{ route('admin.questions.destroy', $q->id) }}" title="حذف السؤال">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        @if($assessment->dimensions->isEmpty())
                            <div class="text-center text-muted py-4 small">لا توجد أسئلة في هذا المقياس بعد.</div>
                        @else
                            <div class="text-center text-muted py-4 small">جميع الأسئلة مسندة لأبعاد فرعية بشكل صحيح!</div>
                        @endif
                    @endforelse
                </div>
                
                <!-- Inline Add Question Form for Unassigned Questions -->
                <div class="p-3 bg-light border-top d-flex gap-2 align-items-center">
                    <input type="text" class="form-control form-control-sm flex-grow-1 input-add-q-text-unassigned" placeholder="اكتب نص السؤال العام واضغط إضافة...">
                    <button class="btn btn-sm btn-outline-warning px-3 btn-add-q-inline-unassigned">
                        <i class="bi bi-plus-lg me-1"></i>إضافة سؤال عام
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Add Dimension Form Inline -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom-0">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-plus-circle-dotted me-2 text-primary"></i>إنشاء بُعد فرعي جديد</h6>
            </div>
            <div class="card-body pt-0">
                <div class="row g-3" id="add-dimension-inline-form">
                    <div class="col-md-7">
                        <input type="text" class="form-control form-control-sm" id="inline-dim-name" placeholder="اسم البعد الفرعي (مثال: الوعي العاطفي)">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control form-control-sm" id="inline-dim-max" placeholder="الدرجة القصوى" min="1">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm w-100" id="btn-save-dim-inline">
                            <span class="btn-text"><i class="bi bi-plus-lg me-1"></i>إضافة بُعد</span>
                            <span class="spinner-border spinner-border-sm d-none"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tab 2: التوصيات -->
    <div class="tab-pane fade" id="tab-recommendations" role="tabpanel" aria-labelledby="recommendations-tab">
        @php
            $recs = $assessment->recommendations;
        @endphp
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-1 text-dark fw-bold"><i class="bi bi-star-fill text-warning me-2"></i>التوصيات وتفسيرات النتيجة</h5>
                <p class="text-muted small mb-0">إدارة التوصيات التي تظهر للمستفيدين بناءً على المجموع أو النمط.</p>
            </div>
            <button class="btn btn-primary btn-sm" onclick="addNewRecommendationCard()">
                <i class="bi bi-plus-lg me-1"></i>إضافة توصية جديدة
            </button>
        </div>

        <div class="row g-4" id="recommendations-container">
            @forelse($recs as $index => $rec)
                @php $key = $rec->id; @endphp
                <div class="col-lg-4 rec-col" id="rec-col-{{ $key }}">
                    <div class="card border-0 border-start border-4 border-primary recommendation-card shadow-sm h-100">
                        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded">
                                <i class="bi bi-bar-chart-fill me-1"></i>{{ $rec->level }}
                            </span>
                        </div>
                        <div class="card-body">
                            <!-- Saved Recommendation View -->
                            <div class="rec-card-view-mode" id="rec-view-{{ $key }}">
                                <div class="mb-3">
                                    <label class="small text-muted mb-1 d-block">نطاق الدرجات</label>
                                    <div class="fw-bold text-dark fs-5">
                                        @if($rec->low_threshold !== null && $rec->high_threshold !== null)
                                            من {{ $rec->low_threshold }} إلى {{ $rec->high_threshold }} درجة
                                        @else
                                            <span class="text-muted fs-6">يعتمد على النمط أو المحور الأعلى</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small text-muted mb-1 d-block">الوصف العيادي</label>
                                    <div class="text-dark whitespace-pre-wrap small bg-light p-3 rounded" style="min-height: 80px;">{{ $rec->description_ar }}</div>
                                </div>
                                <div class="mb-3">
                                    <label class="small text-muted mb-1 d-block">البرامج الإرشادية والتوصيات المقترحة</label>
                                    <div class="text-dark small bg-light p-3 rounded" style="min-height: 80px;">
                                        @php
                                            $lines = is_array($rec->programs_ar) ? $rec->programs_ar : (is_string($rec->programs_ar) ? array_filter(array_map('trim', explode("\n", $rec->programs_ar))) : []);
                                        @endphp
                                        @if(count($lines) > 0)
                                            <ul class="mb-0 ps-0 list-unstyled">
                                                @foreach($lines as $line)
                                                    <li class="mb-1"><i class="bi bi-check2 text-primary me-1"></i>{{ is_array($line) ? ($line['title'] ?? '') : (is_object($line) ? ($line->title ?? '') : $line) }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">لا يوجد برامج مسجلة.</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.assessments.preview', ['assessment' => $assessment->id, 'level' => $rec->level]) }}" target="_blank" class="btn btn-outline-success btn-sm flex-grow-1" title="معاينة التقرير لهذا النمط">
                                        <i class="bi bi-eye me-1"></i>معاينة التقرير
                                    </a>
                                    <button class="btn btn-outline-primary btn-sm btn-toggle-rec-edit" data-level="{{ $key }}" title="تعديل التوصية">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm btn-delete-rec" data-url="{{ route('admin.recommendations.destroy', $rec->id) }}" data-name="{{ $rec->level }}" title="حذف التوصية">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Form container -->
                            <div class="rec-form-container d-none" id="rec-form-{{ $key }}">
                                <form class="recommendation-ajax-form" data-level="{{ $key }}">
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">اسم المستوى / النمط (مثال: مستوى مرتفع، النمط الأوتوقراطي)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-level-name" value="{{ $rec->level }}" required>
                                    </div>
                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label small fw-medium text-muted">الحد الأدنى للدرجة</label>
                                            <input type="number" class="form-control form-control-sm rec-input-low" value="{{ $rec->low_threshold }}" min="0">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label small fw-medium text-muted">الحد الأقصى للدرجة</label>
                                            <input type="number" class="form-control form-control-sm rec-input-high" value="{{ $rec->high_threshold }}" min="0">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الوصف العيادي للتوصية</label>
                                        <textarea class="form-control form-control-sm rec-textarea-desc" rows="4" required placeholder="ادخل تفاصيل تشخيص هذا المستوى..." style="min-height: 80px;">{{ $rec->description_ar }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الجملة الافتتاحية للشهادات (اختياري)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-certs-intro" placeholder="مثال: من أهم الشهادات التي ننصحك بالحصول عليها:" value="{{ $rec->certificates_intro_ar }}">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control form-control-sm rec-textarea-certificates json-certificates-data" rows="3" placeholder="إضافة شهادة...">{{ is_array($rec->certificates_ar) ? json_encode($rec->certificates_ar) : $rec->certificates_ar }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الجملة الافتتاحية للبرامج التدريبية (اختياري)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-programs-intro" placeholder="مثال: من أبرز البرامج التدريبية التي ننصحك بالالتحاق بها:" value="{{ $rec->programs_intro_ar }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">البرامج التدريبية المقترحة</label>
                                        <textarea class="form-control form-control-sm rec-textarea-programs json-programs-data" rows="3" placeholder="إضافة برنامج...">{{ is_array($rec->programs_ar) ? json_encode($rec->programs_ar) : $rec->programs_ar }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الجملة الختامية للبرامج التدريبية (اختياري)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-programs-outro" placeholder="مثال: يمكنك الاطلاع على هذه البرامج والتسجيل فيها عبر المنصات المعتمدة." value="{{ $rec->programs_outro_ar }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">الجملة الافتتاحية لخطة التطوير (اختياري)</label>
                                        <input type="text" class="form-control form-control-sm rec-input-plan-intro" placeholder="مثال: نقترح عليك خلال الـ 30 يوماً القادمة اتباع الخطوات التالية:" value="{{ $rec->plan_30_days_intro_ar }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-medium text-muted">خطة تطوير (30 يوماً)</label>
                                        <textarea class="form-control form-control-sm rec-textarea-plan json-plan-data" rows="3" placeholder="إضافة خطوة...">{{ is_array($rec->plan_30_days_ar) ? json_encode($rec->plan_30_days_ar) : $rec->plan_30_days_ar }}</textarea>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-success btn-sm flex-grow-1 btn-save-recommendation">
                                            <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التوصية</span>
                                            <span class="spinner-border spinner-border-sm d-none"></span>
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-sm btn-cancel-rec-edit" data-level="{{ $key }}">إلغاء</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5" id="no-recs-placeholder">
                    <i class="bi bi-inbox text-muted display-4"></i>
                    <p class="text-muted mt-3 mb-0">لا توجد توصيات لهذا المقياس حتى الآن.</p>
                </div>
            @endforelse
        </div>

        <!-- Template for new recommendation -->
        <template id="new-rec-template">
            <div class="col-lg-4 rec-col" id="rec-col-NEW_ID">
                <div class="card border-0 border-start border-4 border-success recommendation-card shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded">توصية جديدة</span>
                    </div>
                    <div class="card-body">
                        <div class="rec-form-container" id="rec-form-NEW_ID">
                            <form class="recommendation-ajax-form" data-level="NEW_ID">
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">اسم المستوى / النمط</label>
                                    <input type="text" class="form-control form-control-sm rec-input-level-name" placeholder="مثال: مستوى مرتفع" required>
                                </div>
                                <div class="row g-2 mb-3">
                                    <div class="col-6">
                                        <label class="form-label small fw-medium text-muted">الحد الأدنى للدرجة</label>
                                        <input type="number" class="form-control form-control-sm rec-input-low" min="0">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small fw-medium text-muted">الحد الأقصى للدرجة</label>
                                        <input type="number" class="form-control form-control-sm rec-input-high" min="0">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الوصف العيادي للتوصية</label>
                                    <textarea class="form-control form-control-sm rec-textarea-desc" rows="4" required style="min-height: 80px;"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الجملة الافتتاحية للشهادات (اختياري)</label>
                                    <input type="text" class="form-control form-control-sm rec-input-certs-intro" placeholder="مثال: من أهم الشهادات التي ننصحك بالحصول عليها:">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الشهادات الاحترافية المناسبة</label>
                                    <textarea class="form-control form-control-sm rec-textarea-certificates json-certificates-data" rows="3" placeholder="إضافة شهادة..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الجملة الافتتاحية للبرامج التدريبية (اختياري)</label>
                                    <input type="text" class="form-control form-control-sm rec-input-programs-intro" placeholder="مثال: من أبرز البرامج التدريبية التي ننصحك بالالتحاق بها:">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">البرامج التدريبية المقترحة</label>
                                    <textarea class="form-control form-control-sm rec-textarea-programs json-programs-data" rows="3" placeholder="إضافة برنامج..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الجملة الختامية للبرامج التدريبية (اختياري)</label>
                                    <input type="text" class="form-control form-control-sm rec-input-programs-outro" placeholder="مثال: يمكنك الاطلاع على هذه البرامج والتسجيل فيها عبر المنصات المعتمدة.">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">الجملة الافتتاحية لخطة التطوير (اختياري)</label>
                                    <input type="text" class="form-control form-control-sm rec-input-plan-intro" placeholder="مثال: نقترح عليك خلال الـ 30 يوماً القادمة اتباع الخطوات التالية:">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-medium text-muted">خطة تطوير (30 يوماً)</label>
                                    <textarea class="form-control form-control-sm rec-textarea-plan json-plan-data" rows="3" placeholder="إضافة خطوة..."></textarea>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-success btn-sm flex-grow-1 btn-save-recommendation">
                                        <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التوصية</span>
                                        <span class="spinner-border spinner-border-sm d-none"></span>
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-sm btn-cancel-rec-edit" data-level="NEW_ID">إلغاء</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        </div>
    </div>
    
    <!-- Tab 3: إعدادات المقياس -->
    <div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="settings-tab">
        <div class="row">
            <div class="col-md-8">
                <!-- Metadata settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-sliders me-2 text-primary"></i>تعديل بيانات المقياس الأساسية</h6>
                    </div>
                    <div class="card-body">
                        <form id="assessment-settings-form">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">اسم المقياس العربي *</label>
                                    <input type="text" class="form-control" id="settings-title" value="{{ $assessment->title_ar }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">العنوان الجذاب (وصف قصير)</label>
                                    <input type="text" class="form-control" id="settings-subtitle" value="{{ $assessment->subtitle_ar }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">المحور / الفئة *</label>
                                    <input type="text" class="form-control" id="settings-category" value="{{ $assessment->category }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-dark">أيقونة المقياس (اختياري)</label>
                                    @if($assessment->icon && str_starts_with($assessment->icon, '/'))
                                        <div class="mb-1">
                                            <img src="{{ asset($assessment->icon) }}" alt="Icon" style="height: 30px; object-fit: contain;">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control text-start" dir="ltr" id="settings-icon-file" accept="image/*">
                                    <div class="form-text" style="font-size:0.65rem;">ارفع صورة الأيقونة. يفضل خلفية شفافة (PNG).</div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="form-label small fw-semibold text-dark">طريقة حساب النتيجة والتوصية *</label>
                                    <select class="form-select" id="settings-scoring-type">
                                        <option value="overall_score" {{ ($assessment->scoring_type ?? 'overall_score') == 'overall_score' ? 'selected' : '' }}>بناءً على الدرجة الكلية (مثل: مرتفع/متوسط/منخفض)</option>
                                        <option value="highest_dimension" {{ ($assessment->scoring_type ?? 'overall_score') == 'highest_dimension' ? 'selected' : '' }}>بناءً على المحور الأعلى درجة (مثل: الأنماط القيادية)</option>
                                        <option value="dimension_only" {{ ($assessment->scoring_type ?? 'overall_score') == 'dimension_only' ? 'selected' : '' }}>لا يوجد تقييم كلي (تقييم الأبعاد فقط)</option>
                                         <option value="perceptual_styles" {{ ($assessment->scoring_type ?? '') == 'perceptual_styles' ? 'selected' : '' }}>أنماط إدراكية (بصري، سمعي، حسي، أنماط مزدوجة ومتوازنة)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-dark">وصف المقياس</label>
                                <textarea class="form-control" id="settings-description" rows="4" placeholder="اكتب نبذة أو وصف عيادي قصير للمقياس...">{{ $assessment->description_ar }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-dark">صورة المقياس</label>
                                @if($assessment->image_url)
                                    <div class="mb-2">
                                        <img src="{{ asset('images/dashboard/' . $assessment->image_url) }}" alt="Current Image" style="height: 60px; border-radius: 4px; border: 1px solid #dee2e6;">
                                    </div>
                                @endif
                                <input type="file" class="form-control text-start" dir="ltr" id="settings-image" accept="image/*">
                                <div class="form-text" style="font-size:0.65rem;">اختر صورة جديدة إذا أردت استبدال الصورة الحالية. سيتم مسح الصورة القديمة (إن لم تكن من الصور الافتراضية).</div>
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-dark">وقت الاختبار (دقائق)</label>
                                    <input type="number" class="form-control" id="settings-time-limit" value="{{ $assessment->time_limit_min }}" placeholder="بلا حد للوقت" min="1">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-dark">السعر (ر.س)</label>
                                    <input type="number" class="form-control" id="settings-price" value="{{ $assessment->price }}" step="0.01" min="0">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-dark">التقييم (1-5)</label>
                                    <input type="number" class="form-control" id="settings-rating" value="{{ $assessment->rating }}" step="0.1" min="1" max="5">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-dark">بادئة كود التقرير (مثال: VR)</label>
                                    <input type="text" class="form-control" id="settings-report-code" value="{{ $assessment->report_code }}" placeholder="بادئة رقم التقرير" maxlength="50">
                                </div>
                                <div class="col-12 mt-2 d-flex align-items-end flex-wrap gap-3">
                                    <div class="form-check form-switch ps-0 pe-5 mb-2 fs-6">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" role="switch" id="settings-is-active" {{ $assessment->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark fw-medium" for="settings-is-active">
                                            مفعّل وظاهر للمستفيدين
                                        </label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <hr class="my-4">

                            <button type="submit" class="btn btn-primary" id="btn-save-settings">
                                <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التعديلات</span>
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <!-- Danger zone card -->
                <div class="card border-danger border-opacity-25 bg-danger-subtle bg-opacity-10 shadow-sm">
                    <div class="card-header bg-transparent border-danger border-opacity-10 py-3">
                        <h6 class="fw-bold text-danger mb-0"><i class="bi bi-exclamation-octagon me-2"></i>منطقة الخطر</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">
                            عند حذف المقياس نهائياً، سيتم حذف جميع الأبعاد، الأسئلة، التوصيات، وجلسات الاختبار المرتبطة بالمقياس فوراً. هذا الإجراء لا يمكن التراجع عنه.
                        </p>
                        <button class="btn btn-danger w-100 btn-delete-assessment" 
                                data-url="{{ route('admin.assessments.destroy', $assessment->id) }}" 
                                data-name="{{ $assessment->title_ar }}">
                            <i class="bi bi-trash3 me-1"></i>حذف المقياس بالكامل
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Answer Options Modal -->
<div class="modal fade" id="optionsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">خيارات الإجابة للسؤال</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light">
                <p class="text-muted small mb-3">السؤال: <strong id="modal-q-text" class="text-dark"></strong></p>
                
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white py-2 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold small">إضافة خيار جديد</span>
                    </div>
                    <div class="card-body py-2">
                        <form id="add-option-form" class="row g-2 align-items-end">
                            <input type="hidden" id="modal-q-id">
                            <div class="col-sm-6">
                                <label class="form-label small text-muted mb-1">نص الخيار (مثال: نعم، أحياناً)</label>
                                <input type="text" id="add-opt-label" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label small text-muted mb-1">قيمة الدرجة (Score)</label>
                                <input type="number" id="add-opt-score" class="form-control form-control-sm" required>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-sm w-100">إضافة</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover align-middle mb-0" id="options-table">
                            <thead class="table-light">
                                <tr>
                                    <th>نص الخيار</th>
                                    <th>الدرجة</th>
                                    <th style="width: 100px;">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="options-tbody">
                                <!-- Options injected via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light d-flex justify-content-between">
                <button type="button" class="btn btn-outline-primary btn-sm" id="btn-sync-options">
                    <i class="bi bi-files me-1"></i>تعميم هذه الخيارات على جميع أسئلة المقياس
                </button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Import Modal -->
<div class="modal fade" id="bulkImportModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-file-earmark-arrow-up text-primary me-2"></i>استيراد أسئلة بالجملة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs mb-3" id="bulkImportTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active small py-2" id="import-text-tab" data-bs-toggle="tab" data-bs-target="#import-text" type="button" role="tab" aria-controls="import-text" aria-selected="true">استيراد نصي</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link small py-2" id="import-csv-tab" data-bs-toggle="tab" data-bs-target="#import-csv" type="button" role="tab" aria-controls="import-csv" aria-selected="false">استيراد ملف CSV</button>
                    </li>
                </ul>

                <div class="tab-content" id="bulkImportTabsContent">
                    <!-- Tab 1: Text Import -->
                    <div class="tab-pane fade show active" id="import-text" role="tabpanel" aria-labelledby="import-text-tab">
                        <div class="mb-3">
                            <label class="form-label small fw-medium">المقياس المختار</label>
                            <input type="text" class="form-control form-control-sm bg-light" value="{{ $assessment->title_ar }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">اسناد للأبعاد الفرعية</label>
                            <select class="form-select form-select-sm" id="modal-bulk-dimension-id">
                                <option value="">-- بدون بُعد (أسئلة عامة معلّقة) --</option>
                                @foreach($assessment->dimensions as $d)
                                    <option value="{{ $d->id }}">{{ $d->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">الأسئلة (اكتب كل سؤال في سطر مستقل) *</label>
                            <textarea class="form-control" id="modal-bulk-questions-text" rows="8" placeholder="مثال:&#10;هل تشعر بالتوتر بشكل متكرر؟&#10;هل تجد صعوبة في النوم ليلاً؟" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="button" class="btn btn-sm btn-primary" id="modal-btn-bulk-import">
                                <span class="btn-text"><i class="bi bi-cloud-arrow-down me-1"></i>بدء الاستيراد</span>
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Tab 2: CSV Import -->
                    <div class="tab-pane fade" id="import-csv" role="tabpanel" aria-labelledby="import-csv-tab">
                        <form id="csv-import-form" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label small fw-medium">المقياس المختار</label>
                                <input type="text" class="form-control form-control-sm bg-light" value="{{ $assessment->title_ar }}" disabled>
                            </div>
                            <div class="mb-3 bg-light p-3 rounded border">
                                <h6 class="small fw-bold text-dark mb-2"><i class="bi bi-info-circle me-1 text-primary"></i>تعليمات ملف CSV:</h6>
                                <p class="small text-muted mb-2">تأكد من أن ملف CSV يحتوي على الأعمدة التالية وبنفس الترتيب:</p>
                                <code class="small d-block mb-2 bg-white p-2 border rounded text-ltr text-start" style="font-family: monospace;">
                                    اسم البعد,نص السؤال,معكوس,الخيارات
                                </code>
                                <p class="small text-muted mb-0">يمكنك ترك عمود الأبعاد فارغاً لإضافة أسئلة عامة. عمود الخيارات اختياري ويقبل الصيغة: <code class="bg-white px-1">نعم:2|لا:0</code></p>
                                <a href="{{ route('admin.questions.template') }}" class="btn btn-sm btn-outline-secondary mt-2 px-3 py-1 small">
                                    <i class="bi bi-download me-1"></i>تحميل قالب الاستيراد (CSV)
                                </a>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-medium">اختر ملف CSV *</label>
                                <input type="file" class="form-control form-control-sm" id="csv_file" name="csv_file" accept=".csv" required>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-sm btn-success" id="modal-btn-csv-import">
                                    <span class="btn-text"><i class="bi bi-file-earmark-arrow-up me-1"></i>استيراد الملف</span>
                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.APP_ICONS = @json($icons ?? []);
</script>
<script>
$(document).ready(function() {
    
    // Accordion active styling helper (class toggle)
    $(document).on('show.bs.collapse', '.accordion-collapse', function () {
        $(this).closest('.accordion-item').addClass('is-expanded');
    });
    $(document).on('hide.bs.collapse', '.accordion-collapse', function () {
        $(this).closest('.accordion-item').removeClass('is-expanded');
    });
    
    // Toggle active state from header
    $('#header-is-active').on('change', function() {
        const toggle = $(this);
        const url = toggle.data('url');
        
        $.ajax({
            url: url,
            method: 'POST',
            success: function(res) {
                showAlert(res.message, 'success');
                $('#header-active-label').text(res.is_active ? 'مفعّل' : 'موقف');
                // Sync settings switch
                $('#settings-is-active').prop('checked', res.is_active);
            },
            error: function() {
                showAlert('فشل تغيير حالة المقياس.', 'danger');
                toggle.prop('checked', !toggle.is(':checked'));
            }
        });
    });

    // Auto-sync settings switch changes to header switch
    $('#settings-is-active').on('change', function() {
        $('#header-is-active').prop('checked', $(this).is(':checked')).trigger('change');
    });

    /* ==========================================================================
       TAB 1: DIMENSIONS & QUESTIONS ACTIONS
       ========================================================================== */

    // Initialize SortableJS
    function initSortables() {
        // Dimension reordering
        const accordionEl = document.getElementById('dimensions-accordion');
        if (accordionEl) {
            new Sortable(accordionEl, {
                handle: '.dim-drag-handle',
                animation: 150,
                onEnd: function() {
                    const order = [];
                    $('#dimensions-accordion > .accordion-item').each(function() {
                        order.push($(this).data('id'));
                    });
                    
                    $.ajax({
                        url: '{{ route('admin.dimensions.reorder') }}',
                        method: 'PATCH',
                        contentType: 'application/json',
                        data: JSON.stringify({ order: order }),
                        success: function(res) {
                            showAlert(res.message, 'success');
                        },
                        error: function() {
                            showAlert('فشل إعادة ترتيب الأبعاد.', 'danger');
                        }
                    });
                }
            });
        }

        // Question reordering per dimension
        document.querySelectorAll('.questions-list').forEach(function(el) {
            new Sortable(el, {
                handle: '.q-drag-handle',
                animation: 150,
                onEnd: function() {
                    const order = [];
                    $(el).find('.question-row').each(function() {
                        order.push($(this).data('id'));
                    });
                    
                    $.ajax({
                        url: '{{ route('admin.questions.reorder') }}',
                        method: 'PATCH',
                        contentType: 'application/json',
                        data: JSON.stringify({ order: order }),
                        success: function() {
                            showAlert('تم تحديث ترتيب الأسئلة بنجاح.', 'success');
                            // Re-calculate visual indexes
                            $(el).find('.question-row').each(function(index) {
                                $(this).find('.q-number').text((index + 1) + '.');
                            });
                        },
                        error: function() {
                            showAlert('فشل إعادة ترتيب الأسئلة.', 'danger');
                        }
                    });
                }
            });
        });
    }
    
    initSortables();

    // Reload tab 1 DOM section dynamically via AJAX and preserve accordion state
    function reloadTab1() {
        const openCollapseId = $('.accordion-collapse.show').attr('id');
        
        return $.ajax({
            url: window.location.href,
            method: 'GET',
            success: function(html) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#tab-dimensions-questions');
                
                $('#tab-dimensions-questions').html(newContent.innerHTML);
                
                // Keep the active accordion item open
                if (openCollapseId) {
                    const collapseEl = document.getElementById(openCollapseId);
                    if (collapseEl) {
                        $(collapseEl).addClass('show');
                        $(collapseEl).closest('.accordion-item').addClass('is-expanded');
                        $(`[data-bs-target="#${openCollapseId}"]`).removeClass('collapsed').attr('aria-expanded', 'true');
                    }
                }
                
                initSortables();
            }
        });
    }

    // Inline Dimension Editing Toggle (Stop Propagation to prevent collapse trigger)
    $(document).on('click', '.btn-edit-dim', function(e) {
        e.stopPropagation();
        const id = $(this).data('id');
        $(`#dim-display-${id}`).addClass('d-none');
        $(`#dim-edit-${id}`).removeClass('d-none');
    });

    $(document).on('click', '.btn-cancel-dim', function(e) {
        e.stopPropagation();
        const id = $(this).data('id');
        $(`#dim-edit-${id}`).addClass('d-none');
        $(`#dim-display-${id}`).removeClass('d-none');
    });

    // Save Dimension Inline Edit
    $(document).on('click', '.btn-save-dim', function(e) {
        e.stopPropagation();
        const id = $(this).data('id');
        const container = $(`#dim-edit-${id}`);
        const name = container.find('.input-dim-name').val().trim();
        const maxScore = container.find('.input-dim-max').val();
        
        if (!name || maxScore < 1) {
            showAlert('اسم البعد والدرجة مطلوبان.', 'warning');
            return;
        }
        
        const btn = $(this);
        btn.prop('disabled', true);
        
        $.ajax({
            url: `/admin/dimensions/${id}`,
            method: 'PATCH',
            contentType: 'application/json',
            data: JSON.stringify({ name_ar: name, max_score: maxScore }),
            success: function(res) {
                showAlert(res.message, 'success');
                // Update display values
                const display = $(`#dim-display-${id}`);
                display.find('.dim-name-text').text(name);
                display.find('.dim-max-score-text').text(maxScore);
                
                $(`#dim-edit-${id}`).addClass('d-none');
                $(`#dim-display-${id}`).removeClass('d-none');
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء حفظ التعديلات.', 'danger');
            },
            complete: function() {
                btn.prop('disabled', false);
            }
        });
    });

    // Delete Dimension
    $(document).on('click', '.btn-delete-dim', function(e) {
        e.stopPropagation();
        const url = $(this).data('url');
        const name = $(this).data('name');
        
        confirmDelete(`هل تريد حذف بُعد "${name}"؟ سيتم نقل كافة الأسئلة التابعة له إلى قائمة (بدون بُعد).`, url, function() {
            reloadTab1();
        });
    });

    // Inline Add Dimension (Form at bottom of Tab 1)
    $('#btn-save-dim-inline').on('click', function() {
        const btn = $(this);
        const name = $('#inline-dim-name').val().trim();
        const max = $('#inline-dim-max').val();
        
        if (!name || !max) {
            showAlert('اسم البعد والدرجة القصوى مطلوبان.', 'warning');
            return;
        }
        
        setLoading(btn, true);
        
        $.ajax({
            url: `/admin/assessments/{{ $assessment->id }}/dimensions`,
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ name_ar: name, max_score: max }),
            success: function(res) {
                showAlert(res.message, 'success');
                $('#inline-dim-name').val('');
                $('#inline-dim-max').val('');
                reloadTab1();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل إضافة البعد.', 'danger');
            },
            complete: function() {
                setLoading(btn, false);
            }
        });
    });

    // Inline Question Adding (Inside dimension accordion body)
    $(document).on('click', '.btn-add-q-inline', function() {
        const btn = $(this);
        const dimId = btn.data('dimension-id');
        const container = btn.closest('.accordion-body');
        const input = container.find('.input-add-q-text');
        const text = input.val().trim();
        
        if (!text) {
            showAlert('نص السؤال مطلوب.', 'warning');
            return;
        }
        
        btn.prop('disabled', true);
        
        // Payload with default options: نعم (2), إلى حد ما (1), لا (0)
        const payload = {
            assessment_id: '{{ $assessment->id }}',
            dimension_id: dimId,
            text_ar: text,
            options: [
                { label_ar: 'نعم', score_value: 2, order_index: 0 },
                { label_ar: 'إلى حد ما', score_value: 1, order_index: 1 },
                { label_ar: 'لا', score_value: 0, order_index: 2 }
            ]
        };
        
        $.ajax({
            url: '{{ route('admin.questions.store') }}',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                showAlert(res.message, 'success');
                input.val('');
                reloadTab1();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء إضافة السؤال.', 'danger');
            },
            complete: function() {
                btn.prop('disabled', false);
            }
        });
    });

    // Inline Question Adding for Unassigned Questions
    $(document).on('click', '.btn-add-q-inline-unassigned', function() {
        const btn = $(this);
        const input = $('.input-add-q-text-unassigned');
        const text = input.val().trim();
        
        if (!text) {
            showAlert('نص السؤال مطلوب.', 'warning');
            return;
        }
        
        btn.prop('disabled', true);
        
        const payload = {
            assessment_id: '{{ $assessment->id }}',
            dimension_id: null,
            text_ar: text,
            options: [
                { label_ar: 'نعم', score_value: 2, order_index: 0 },
                { label_ar: 'إلى حد ما', score_value: 1, order_index: 1 },
                { label_ar: 'لا', score_value: 0, order_index: 2 }
            ]
        };
        
        $.ajax({
            url: '{{ route('admin.questions.store') }}',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                showAlert(res.message, 'success');
                input.val('');
                reloadTab1();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'حدث خطأ أثناء إضافة السؤال.', 'danger');
            },
            complete: function() {
                btn.prop('disabled', false);
            }
        });
    });

    // Inline Question text Editing Toggle
    $(document).on('click', '.btn-edit-q', function() {
        const id = $(this).data('id');
        $(`#q-display-${id}`).addClass('d-none');
        $(`#q-actions-${id}`).addClass('d-none');
        $(`#q-edit-${id}`).removeClass('d-none');
        
        // Auto-focus and auto-resize textarea
        const textarea = $(`#q-edit-${id} textarea`);
        textarea.focus();
        textarea.css('height', 'auto').css('height', textarea[0].scrollHeight + 'px');
    });

    $(document).on('click', '.btn-cancel-q', function() {
        const id = $(this).data('id');
        $(`#q-edit-${id}`).addClass('d-none');
        $(`#q-display-${id}`).removeClass('d-none');
        $(`#q-actions-${id}`).removeClass('d-none');
    });

    // Auto-resize textareas as user types
    $(document).on('input', '.auto-resize-textarea', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Save Inline Question Edit
    $(document).on('click', '.btn-save-q', function() {
        const id = $(this).data('id');
        const container = $(`#q-edit-${id}`);
        const text = container.find('textarea').val().trim();
        
        if (!text) {
            showAlert('نص السؤال مطلوب.', 'warning');
            return;
        }
        
        const btn = $(this);
        btn.prop('disabled', true);
        
        $.ajax({
            url: `/admin/questions/${id}`,
            method: 'PATCH',
            contentType: 'application/json',
            data: JSON.stringify({ text_ar: text }),
            success: function(res) {
                showAlert(res.message, 'success');
                $(`#q-display-${id}`).text(text);
                $(`#q-edit-${id}`).addClass('d-none');
                $(`#q-display-${id}`).removeClass('d-none');
                $(`#q-actions-${id}`).removeClass('d-none');
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل تحديث السؤال.', 'danger');
            },
            complete: function() {
                btn.prop('disabled', false);
            }
        });
    });

    // Move / Assign Dimension Dropdown handler
    $(document).on('click', '.btn-move-q', function(e) {
        e.preventDefault();
        const qId = $(this).data('question-id');
        const dimId = $(this).data('dimension-id') || null;
        
        $.ajax({
            url: `/admin/questions/${qId}/dimension`,
            method: 'PATCH',
            contentType: 'application/json',
            data: JSON.stringify({ dimension_id: dimId }),
            success: function(res) {
                showAlert(res.message, 'success');
                reloadTab1();
            },
            error: function() {
                showAlert('حدث خطأ أثناء نقل السؤال.', 'danger');
            }
        });
    });

    // Delete Question
    $(document).on('click', '.btn-delete-q', function() {
        const url = $(this).data('url');
        confirmDelete('هل تريد حذف هذا السؤال نهائياً؟', url, function() {
            reloadTab1();
        });
    });

    // Bulk Import Questions AJAX Submission
    $('#modal-btn-bulk-import').on('click', function() {
        const btn = $(this);
        const dimId = $('#modal-bulk-dimension-id').val() || null;
        const text = $('#modal-bulk-questions-text').val().trim();
        
        if (!text) {
            showAlert('الرجاء كتابة أسئلة للاستيراد.', 'warning');
            return;
        }
        
        setLoading(btn, true);
        
        const payload = {
            assessment_id: '{{ $assessment->id }}',
            dimension_id: dimId,
            questions_text: text
        };
        
        $.ajax({
            url: '{{ route('admin.questions.bulk') }}',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                setLoading(btn, false);
                bootstrap.Modal.getInstance(document.getElementById('bulkImportModal')).hide();
                showAlert(res.message, 'success');
                $('#modal-bulk-questions-text').val('');
                reloadTab1();
            },
            error: function(xhr) {
                setLoading(btn, false);
                showAlert(xhr.responseJSON?.message || 'فشل استيراد الأسئلة.', 'danger');
            }
        });
    });

    // CSV Import Questions AJAX Submission
    $('#csv-import-form').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const btn = $('#modal-btn-csv-import');
        const fileInput = $('#csv_file')[0];
        
        if (fileInput.files.length === 0) {
            showAlert('الرجاء اختيار ملف CSV أولاً.', 'warning');
            return;
        }

        const formData = new FormData();
        formData.append('csv_file', fileInput.files[0]);

        setLoading(btn, true);

        $.ajax({
            url: '{{ route('admin.questions.importCsv', $assessment->id) }}',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                setLoading(btn, false);
                bootstrap.Modal.getInstance(document.getElementById('bulkImportModal')).hide();
                showAlert(res.message, 'success');
                form[0].reset();
                reloadTab1();
            },
            error: function(xhr) {
                setLoading(btn, false);
                showAlert(xhr.responseJSON?.message || 'فشل استيراد ملف CSV.', 'danger');
            }
        });
    });


    /* ==========================================================================
       TAB 2: RECOMMENDATIONS ACTIONS
       ========================================================================== */

    // Dynamically reload Tab 2 contents to reflect new models
    function reloadTab2() {
        return $.ajax({
            url: window.location.href,
            method: 'GET',
            success: function(html) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#tab-recommendations');
                $('#tab-recommendations').html(newContent.innerHTML);
                
                // Re-initialize dynamic lists and JSON lists after replacing DOM
                if (typeof window.initDynamicLists === 'function') {
                    window.initDynamicLists('#tab-recommendations');
                }
                if (typeof window.initAllJsonLists === 'function') {
                    window.initAllJsonLists('#tab-recommendations');
                }
            }
        });
    }

    window.addNewRecommendationCard = function() {
        $('#no-recs-placeholder').addClass('d-none');
        
        if ($('#rec-col-NEW_ID').length > 0) {
            $('#rec-col-NEW_ID').find('input').first().focus();
            return;
        }
        
        const template = document.getElementById('new-rec-template');
        if (!template) return;
        
        const clone = template.content.cloneNode(true);
        $('#recommendations-container').append(clone);
        
        if (typeof window.initAllJsonLists === 'function') {
            window.initAllJsonLists('#rec-col-NEW_ID');
        }
        
        $('html, body').animate({
            scrollTop: $('#rec-col-NEW_ID').offset().top - 100
        }, 300);
        
        $('#rec-col-NEW_ID').find('input').first().focus();
    };

    // Toggle forms
    $(document).on('click', '.btn-expand-rec-form', function() {
        const level = $(this).data('level');
        $(`#rec-add-placeholder-${level}`).addClass('d-none');
        $(`#rec-form-${level}`).removeClass('d-none');
    });

    $(document).on('click', '.btn-toggle-rec-edit', function() {
        const level = $(this).data('level');
        $(`#rec-view-${level}`).addClass('d-none');
        $(`#rec-form-${level}`).removeClass('d-none');
    });

    $(document).on('click', '.btn-cancel-rec-edit', function() {
        const level = $(this).data('level');
        if (level === 'NEW_ID') {
            $('#rec-col-NEW_ID').remove();
            if ($('#recommendations-container').children('.rec-col').length === 0) {
                $('#no-recs-placeholder').removeClass('d-none');
            }
        } else {
            $(`#rec-form-${level}`).addClass('d-none');
            $(`#rec-view-${level}`).removeClass('d-none');
        }
    });

    // Delete recommendation
    $(document).on('click', '.btn-delete-rec', function() {
        const url = $(this).data('url');
        const name = $(this).data('name');
        
        confirmDelete(`هل أنت متأكد من حذف التوصية الخاصة بمستوى "${name}"؟`, url, function() {
            reloadTab2();
        });
    });

    // Save/Update recommendation
    $(document).on('submit', '.recommendation-ajax-form', function(e) {
        e.preventDefault();
        const form = $(this);
        const levelData = form.data('level');
        const levelName = form.find('.rec-input-level-name').val().trim();
        const btn = form.find('.btn-save-recommendation');
        
        let certs = []; try { certs = JSON.parse(form.find('.rec-textarea-certificates').val() || '[]'); } catch(e){}
        let progs = []; try { progs = JSON.parse(form.find('.rec-textarea-programs').val() || '[]'); } catch(e){}
        let plan = []; try { plan = JSON.parse(form.find('.rec-textarea-plan').val() || '[]'); } catch(e){}

        const payload = {
            id: levelData !== 'NEW_ID' ? levelData : null,
            assessment_id: '{{ $assessment->id }}',
            level: levelName,
            low_threshold: form.find('.rec-input-low').val(),
            high_threshold: form.find('.rec-input-high').val(),
            description_ar: form.find('.rec-textarea-desc').val().trim(),
            certificates_intro_ar: form.find('.rec-input-certs-intro').val().trim(),
            certificates_ar: certs,
            programs_intro_ar: form.find('.rec-input-programs-intro').val().trim(),
            programs_ar: progs,
            programs_outro_ar: form.find('.rec-input-programs-outro').val().trim(),
            plan_30_days_intro_ar: form.find('.rec-input-plan-intro').val().trim(),
            plan_30_days_ar: plan
        };
        
        setLoading(btn, true);
        
        $.ajax({
            url: '{{ route('admin.recommendations.store') }}',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                showAlert(res.message, 'success');
                reloadTab2();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل حفظ التوصية.', 'danger');
                setLoading(btn, false);
            }
        });
    });


    /* ==========================================================================
       TAB 3: ASSESSMENT SETTINGS
       ========================================================================== */

    // Save Basic Assessment Settings
    $('#assessment-settings-form').on('submit', function(e) {
        e.preventDefault();
        const btn = $('#btn-save-settings');
        
        const formData = new FormData();
        formData.append('_method', 'PATCH');
        formData.append('title_ar', $('#settings-title').val().trim());
        formData.append('subtitle_ar', $('#settings-subtitle').val().trim());
        formData.append('category', $('#settings-category').val().trim());
        formData.append('scoring_type', $('#settings-scoring-type').val());
        
        if ($('#settings-description').val().trim()) formData.append('description_ar', $('#settings-description').val().trim());
        if ($('#settings-time-limit').val()) formData.append('time_limit_min', $('#settings-time-limit').val());
        if ($('#settings-price').val()) formData.append('price', $('#settings-price').val());
        if ($('#settings-rating').val()) formData.append('rating', $('#settings-rating').val());
        formData.append('is_active', $('#settings-is-active').is(':checked') ? 1 : 0);
        formData.append('report_code', $('#settings-report-code').val().trim());
        
        if ($('#settings-image')[0].files.length > 0) {
            formData.append('image', $('#settings-image')[0].files[0]);
        }

        if ($('#settings-icon-file')[0].files.length > 0) {
            formData.append('icon_file', $('#settings-icon-file')[0].files[0]);
        }
        
        setLoading(btn, true);
        
        $.ajax({
            url: '{{ route('admin.assessments.settings', $assessment->id) }}',
            method: 'POST', // Must be POST with _method=PATCH for FormData
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: formData,
            success: function(res) {
                showAlert(res.message, 'success');
                // Dynamically update the header metadata
                $('#header-assessment-title').text($('#settings-title').val().trim());
                $('#header-assessment-category').text($('#settings-category').val().trim());
                
                const timeLimit = $('#settings-time-limit').val();
                const timeText = timeLimit ? timeLimit + ' دقيقة' : 'بلا حد للوقت';
                $('#header-assessment-time').text(timeText);
                
                const isActive = $('#settings-is-active').is(':checked');
                $('#header-is-active').prop('checked', isActive);
                $('#header-active-label').text(isActive ? 'مفعّل' : 'موقف');
                
                // If there's an image uploaded, reload to show it (or we could just let them see the success message)
                if ($('#settings-image')[0].files.length > 0) {
                    setTimeout(() => location.reload(), 1000);
                }
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل تحديث الإعدادات.', 'danger');
            },
            complete: function() {
                setLoading(btn, false);
            }
        });
    });

    // Delete entire Assessment (Danger Zone)
    $('.btn-delete-assessment').on('click', function() {
        const url = $(this).data('url');
        const name = $(this).data('name');
        
        confirmDelete(`هل أنت متأكد من حذف مقياس "${name}" بالكامل؟ سيؤدي ذلك إلى مسح كافة الأبعاد والأسئلة والتوصيات ومحاضر الجلسات نهائياً ولا يمكن الرجوع!`, url, function() {
            window.location.href = '{{ route('admin.assessments.index') }}';
        });
    });

    // Save Dimension Interpretations
    $(document).on('submit', '.dimension-interpretations-ajax-form', function(e) {
        e.preventDefault();
        const form = $(this);
        const dimId = form.data('dimension-id');
        const btn = form.find('.btn-save-dim-interpretations');
        
        const payload = {
            high_threshold: form.find('.input-dim-high-threshold').val(),
            low_threshold: form.find('.input-dim-low-threshold').val(),
            interpretations: {
                high: form.find('.textarea-dim-high-text').val().trim(),
                medium: form.find('.textarea-dim-medium-text').val().trim(),
                low: form.find('.textarea-dim-low-text').val().trim()
            }
        };
        
        setLoading(btn, true);
        
        $.ajax({
            url: `/admin/dimensions/${dimId}/interpretations`,
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            success: function(res) {
                showAlert(res.message, 'success');
                reloadTab1();
            },
            error: function(xhr) {
                showAlert(xhr.responseJSON?.message || 'فشل حفظ التفسيرات.', 'danger');
                setLoading(btn, false);
            }
        });
    });
});

/* ── Toggle reversed question ── */
$(document).on('click', '.btn-toggle-reversed', function () {
    const btn      = $(this);
    const qId      = btn.data('id');
    const current  = btn.data('reversed') === 1 || btn.data('reversed') === '1';
    const newVal   = !current;

    $.ajax({
        url: btn.data('url'), method: 'PATCH', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify({ is_reversed: newVal }),
        success() {
            btn.data('reversed', newVal ? '1' : '0');
            btn.css('color', newVal ? '#d97706' : '#9ca3af');
            btn.attr('title', newVal ? 'إلغاء العكس' : 'تفعيل كسؤال معكوس');
            // Toggle badge next to question text
            const badge = btn.closest('.question-row').find('.q-display-text').siblings('.badge');
            if (newVal) {
                if (!badge.length) {
                    btn.closest('.question-row').find('.q-display-text').after(
                        `<span class="badge ms-2 rounded-pill"
                               style="background:#fef3c7;color:#92400e;border:1px solid #fcd34d;font-size:.68rem"
                               title="سؤال معكوس: نعم=0 | إلى حد ما=1 | لا=2">⇄ معكوس</span>`
                    );
                }
            } else {
                badge.remove();
            }
            showAlert(newVal ? 'تم تفعيل السؤال المعكوس.' : 'تم إلغاء العكس.', 'success');
        },
        error() { showAlert('فشل تحديث السؤال.', 'danger'); }
    });
});

/* ── Answer Options Management ── */
let currentQuestionId = null;

$(document).on('click', '.btn-manage-options', function () {
    const btn = $(this);
    currentQuestionId = btn.data('id');
    const qText = $(`#q-display-${currentQuestionId}`).text();
    
    $('#modal-q-id').val(currentQuestionId);
    $('#modal-q-text').text(qText);
    
    // Fetch options
    loadOptions();
    
    const modal = new bootstrap.Modal(document.getElementById('optionsModal'));
    modal.show();
});

function loadOptions() {
    $('#options-tbody').html('<tr><td colspan="3" class="text-center text-muted">جاري التحميل...</td></tr>');
    $.ajax({
        url: `/admin/questions/${currentQuestionId}/options`,
        method: 'GET',
        success: function(options) {
            let html = '';
            if (options.length === 0) {
                html = '<tr><td colspan="3" class="text-center text-muted small">لا توجد خيارات لهذا السؤال.</td></tr>';
            } else {
                options.forEach(opt => {
                    html += `
                        <tr data-id="${opt.id}">
                            <td>
                                <span class="opt-label-display">${opt.label_ar}</span>
                                <input type="text" class="form-control form-control-sm opt-label-edit d-none" value="${opt.label_ar}">
                            </td>
                            <td>
                                <span class="opt-score-display">${opt.score_value}</span>
                                <input type="number" class="form-control form-control-sm opt-score-edit d-none" value="${opt.score_value}">
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm opt-actions-view">
                                    <button type="button" class="btn btn-outline-secondary btn-edit-opt" title="تعديل"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-delete-opt" title="حذف"><i class="bi bi-trash"></i></button>
                                </div>
                                <div class="btn-group btn-group-sm opt-actions-edit d-none">
                                    <button type="button" class="btn btn-success btn-save-opt"><i class="bi bi-check2"></i></button>
                                    <button type="button" class="btn btn-secondary btn-cancel-opt"><i class="bi bi-x"></i></button>
                                </div>
                            </td>
                        </tr>
                    `;
                });
            }
            $('#options-tbody').html(html);
        },
        error: function() {
            $('#options-tbody').html('<tr><td colspan="3" class="text-center text-danger">فشل تحميل الخيارات.</td></tr>');
        }
    });
}

$('#add-option-form').on('submit', function(e) {
    e.preventDefault();
    const btn = $(this).find('button[type="submit"]');
    
    const payload = {
        label_ar: $('#add-opt-label').val().trim(),
        score_value: $('#add-opt-score').val()
    };
    
    setLoading(btn, true);
    
    $.ajax({
        url: `/admin/questions/${currentQuestionId}/options`,
        method: 'POST',
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            $('#add-opt-label').val('');
            $('#add-opt-score').val('');
            loadOptions();
            showAlert(res.message, 'success');
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'فشل إضافة الخيار', 'danger');
        }
    });
});

$(document).on('click', '.btn-edit-opt', function() {
    const tr = $(this).closest('tr');
    tr.find('.opt-label-display, .opt-score-display, .opt-actions-view').addClass('d-none');
    tr.find('.opt-label-edit, .opt-score-edit, .opt-actions-edit').removeClass('d-none');
});

$(document).on('click', '.btn-cancel-opt', function() {
    const tr = $(this).closest('tr');
    tr.find('.opt-label-display, .opt-score-display, .opt-actions-view').removeClass('d-none');
    tr.find('.opt-label-edit, .opt-score-edit, .opt-actions-edit').addClass('d-none');
});

$(document).on('click', '.btn-save-opt', function() {
    const tr = $(this).closest('tr');
    const optId = tr.data('id');
    const btn = $(this);
    
    const payload = {
        label_ar: tr.find('.opt-label-edit').val().trim(),
        score_value: tr.find('.opt-score-edit').val()
    };
    
    const originalHtml = btn.html();
    btn.html('<span class="spinner-border spinner-border-sm"></span>');
    
    $.ajax({
        url: `/admin/options/${optId}`,
        method: 'PUT',
        contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            btn.html(originalHtml);
            loadOptions();
            showAlert(res.message, 'success');
        },
        error: function(xhr) {
            btn.html(originalHtml);
            showAlert(xhr.responseJSON?.message || 'فشل التحديث', 'danger');
        }
    });
});

$(document).on('click', '.btn-delete-opt', function() {
    const tr = $(this).closest('tr');
    const optId = tr.data('id');
    
    if(!confirm('هل أنت متأكد من حذف هذا الخيار؟')) return;
    
    $.ajax({
        url: `/admin/options/${optId}`,
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            loadOptions();
            showAlert(res.message, 'success');
        }
    });
});

$('#btn-sync-options').on('click', function() {
    if(!confirm('تحذير: سيتم مسح كافة خيارات الإجابة الحالية لجميع الأسئلة الأخرى في هذا المقياس، واستبدالها بالخيارات الحالية لهذا السؤال. هل تريد الاستمرار؟')) return;
    
    const btn = $(this);
    const originalHtml = btn.html();
    btn.html('<i class="bi bi-hourglass-split me-1"></i>جاري التعميم...');
    btn.prop('disabled', true);
    
    $.ajax({
        url: `/admin/questions/${currentQuestionId}/sync-options`,
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            btn.html(originalHtml);
            btn.prop('disabled', false);
            showAlert(res.message, 'success');
        },
        error: function(xhr) {
            btn.html(originalHtml);
            btn.prop('disabled', false);
            showAlert('حدث خطأ أثناء التعميم.', 'danger');
        }
    });
});


    // Dynamic List Editor Initializer
    window.initDynamicLists = function(container = document) {
        $(container).find('.dynamic-list-data').not('.dynamic-list-initialized').each(function() {
            const $textarea = $(this);
            $textarea.addClass('dynamic-list-initialized d-none');
            const placeholder = $textarea.attr('placeholder') || 'إضافة عنصر جديد...';
            
            // Create UI wrapper
            const $wrapper = $('<div class="dynamic-list-wrapper"></div>');
            const $list = $('<div class="dynamic-list-items mb-2"></div>');
            const $inputGroup = $(`
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control dynamic-list-input" placeholder="${placeholder}">
                    <button type="button" class="btn btn-primary dynamic-list-add"><i class="bi bi-plus"></i> إضافة</button>
                </div>
            `);
            
            $wrapper.append($list).append($inputGroup);
            $textarea.after($wrapper);
            
            // Render initial items
            const val = $textarea.val().trim();
            const items = val ? val.split('\n') : [];
            items.forEach(item => {
                if(item.trim()) addItem(item.trim());
            });
            
            function updateTextarea() {
                const currentItems = [];
                $list.find('.dynamic-list-item-text').each(function() {
                    currentItems.push($(this).text().trim());
                });
                $textarea.val(currentItems.join('\n'));
            }
            
            function addItem(text) {
                const $item = $(`
                    <div class="d-flex justify-content-between align-items-center bg-white border border-light-subtle shadow-sm rounded px-3 py-2 mb-2">
                        <span class="dynamic-list-item-text text-dark fw-medium small"><i class="bi bi-check-circle-fill text-success me-2"></i>${text}</span>
                        <button type="button" class="btn btn-sm text-danger btn-remove-item py-0 px-2 border-0"><i class="bi bi-x-lg"></i></button>
                    </div>
                `);
                $list.append($item);
            }
            
            // Add event
            $inputGroup.find('.dynamic-list-add').on('click', function() {
                const $input = $inputGroup.find('.dynamic-list-input');
                const newText = $input.val().trim();
                if (newText) {
                    addItem(newText);
                    updateTextarea();
                    $input.val('');
                    $input.focus();
                }
            });
            
            $inputGroup.find('.dynamic-list-input').on('keypress', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    $inputGroup.find('.dynamic-list-add').click();
                }
            });
            
            // Remove event
            $list.on('click', '.btn-remove-item', function() {
                $(this).closest('div').remove();
                updateTextarea();
            });
        });
    };

    $(document).ready(function() {
        window.initDynamicLists();
    });
</script>
@endpush
