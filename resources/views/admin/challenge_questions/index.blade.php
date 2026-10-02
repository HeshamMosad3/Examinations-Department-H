@extends('layouts.admin')

@section('title', 'إدارة التحدي السريع')
@section('page-title', 'أسئلة التحدي السريع')

@push('styles')
<style>
.ds-dot { width: 6px; height: 6px; background-color: #204A7A; border-radius: 50%; display: inline-block;}
.ds-gap { gap: 3px; }
.shape-btn { width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6; border-radius: 8px; cursor: pointer; background: #fff; transition: 0.2s; box-shadow: 0 1px 2px rgba(0,0,0,0.05);}
.shape-btn:hover { border-color: #0d6efd; background: #f8f9fa; transform: translateY(-1px);}
.shape-preview-box { min-height: 48px; padding: 8px; border: 1.5px dashed #adb5bd; border-radius: 8px; display: flex; gap: 8px; align-items: center; background: #f8f9fa; flex-wrap: wrap;}
.shape-item-tag { display: flex; align-items: center; gap: 6px; background: #fff; border: 1px solid #dee2e6; padding: 4px 8px; border-radius: 6px; cursor: pointer; font-size: 12px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: 0.2s;}
.shape-item-tag:hover { background: #f8d7da; border-color: #dc3545; color: #dc3545; }
</style>
@endpush

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
        <h6 class="m-0 fw-bold">الأسئلة الحالية</h6>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
            <i class="bi bi-plus-circle me-1"></i>إضافة سؤال
        </button>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">السؤال</th>
                        <th>النوع</th>
                        <th>الخيارات والإجابة الصحيحة</th>
                        <th>الحالة</th>
                        <th class="text-end pe-4">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($questions as $question)
                        <tr>
                            <td class="ps-4 fw-medium">{{ $question->question }}</td>
                            <td>
                                @if($question->type == 'pattern')
                                    <span class="badge bg-info text-dark">نمط بصري</span>
                                @else
                                    <span class="badge bg-secondary">نصي</span>
                                @endif
                            </td>
                            <td>
                                <ul class="list-unstyled mb-0 small">
                                    @foreach($question->options as $index => $opt)
                                        <li class="{{ $index == $question->correct_index ? 'text-success fw-bold' : 'text-muted' }}">
                                            @if($index == $question->correct_index)
                                                <i class="bi bi-check-circle-fill me-1"></i>
                                            @endif
                                            {{ $opt }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if($question->is_active)
                                    <span class="badge bg-success">نشط</span>
                                @else
                                    <span class="badge bg-danger">غير نشط</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editQuestionModal{{ $question->id }}">
                                    <i class="bi bi-pencil"></i> تعديل
                                </button>
                                <form action="{{ route('admin.challenge-questions.destroy', $question) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                        <i class="bi bi-trash"></i> حذف
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editQuestionModal{{ $question->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg text-start" dir="rtl">
                                <div class="modal-content">
                                    <form action="{{ route('admin.challenge-questions.update', $question) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">تعديل السؤال</h5>
                                            <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">السؤال</label>
                                                <input type="text" name="question" class="form-control" required value="{{ $question->question }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">نوع السؤال</label>
                                                <select name="type" class="form-select editQTypeSelect" data-target="editPatternOptions{{ $question->id }}">
                                                    <option value="text" {{ $question->type == 'text' ? 'selected' : '' }}>نصي</option>
                                                    <option value="pattern" {{ $question->type == 'pattern' ? 'selected' : '' }}>نمط بصري (نقاط)</option>
                                                </select>
                                            </div>

                                            <div id="editPatternOptions{{ $question->id }}" class="{{ $question->type == 'text' ? 'd-none' : '' }} mb-3 bg-light p-3 rounded">
                                                <label class="form-label fw-bold">النمط البصري (للسؤال)</label>
                                                <p class="text-muted small mb-2">اضغط على الأشكال لإضافتها، واضغط على الشكل في المربع الأزرق لحذفه.</p>
                                                <input type="text" name="pattern_row" class="form-control pattern-visual-input" value="{{ $question->pattern_row ? implode(', ', $question->pattern_row) : '' }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">الخيارات (4 خيارات)</label>
                                                <input type="text" name="options" class="form-control {{ $question->type == 'pattern' ? 'pattern-visual-input' : '' }}" required value="{{ implode(', ', $question->options) }}" {{ $question->type == 'pattern' ? 'readonly' : '' }} id="optionsInput{{ $question->id }}">
                                                <small class="text-muted">إذا كان السؤال نصياً، يمكنك كتابة الخيارات مفصولة بفاصلة. إذا كان نمطاً بصرياً، استخدم الأشكال.</small>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">رقم الإجابة الصحيحة</label>
                                                <select name="correct_index" class="form-select">
                                                    <option value="0" {{ $question->correct_index == 0 ? 'selected' : '' }}>الخيار الأول (1)</option>
                                                    <option value="1" {{ $question->correct_index == 1 ? 'selected' : '' }}>الخيار الثاني (2)</option>
                                                    <option value="2" {{ $question->correct_index == 2 ? 'selected' : '' }}>الخيار الثالث (3)</option>
                                                    <option value="3" {{ $question->correct_index == 3 ? 'selected' : '' }}>الخيار الرابع (4)</option>
                                                </select>
                                            </div>

                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActiveSwitch{{ $question->id }}" {{ $question->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label" for="isActiveSwitch{{ $question->id }}">نشط (يظهر للمستخدمين)</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">لا يوجد أسئلة حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addQuestionModal" tabindex="-1">
    <div class="modal-dialog modal-lg text-start" dir="rtl">
        <div class="modal-content">
            <form action="{{ route('admin.challenge-questions.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">إضافة سؤال جديد</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">السؤال</label>
                        <input type="text" name="question" class="form-control" required placeholder="مثال: ما الرقم التالي...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">نوع السؤال</label>
                        <select name="type" class="form-select" id="qTypeSelect">
                            <option value="text">نصي</option>
                            <option value="pattern">نمط بصري (نقاط)</option>
                        </select>
                    </div>

                    <div id="patternOptions" class="d-none mb-3 bg-light p-3 rounded">
                        <label class="form-label fw-bold">النمط البصري (للسؤال)</label>
                        <p class="text-muted small mb-2">اضغط على الأشكال لإضافتها، واضغط على الشكل في المربع للحذفه.</p>
                        <input type="text" name="pattern_row" class="form-control pattern-visual-input" placeholder="" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">الخيارات (4 خيارات)</label>
                        <input type="text" name="options" class="form-control" required placeholder="خيار 1, خيار 2, خيار 3, خيار 4" id="addOptionsInput">
                        <small class="text-muted">إذا كان السؤال نصياً، يمكنك كتابة الخيارات مفصولة بفاصلة. إذا كان نمطاً بصرياً، سيتم تفعيل اختيار الأشكال.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">رقم الإجابة الصحيحة</label>
                        <select name="correct_index" class="form-select">
                            <option value="0">الخيار الأول (1)</option>
                            <option value="1">الخيار الثاني (2)</option>
                            <option value="2">الخيار الثالث (3)</option>
                            <option value="3">الخيار الرابع (4)</option>
                        </select>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked id="isActiveSwitchAdd">
                        <label class="form-check-label" for="isActiveSwitchAdd">نشط (يظهر للمستخدمين)</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ السؤال</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const shapes = {
        '2-vert': '<div class="d-flex flex-column align-items-center ds-gap"><span class="ds-dot"></span><span class="ds-dot"></span></div>',
        '4-grid': '<div class="d-flex flex-wrap ds-gap" style="width:16px"><span class="ds-dot"></span><span class="ds-dot"></span><span class="ds-dot"></span><span class="ds-dot"></span></div>',
        '3-tr': '<div class="d-flex align-items-center ds-gap"><span class="ds-dot align-self-start mt-1"></span><div class="d-flex flex-column ds-gap"><span class="ds-dot"></span><span class="ds-dot"></span></div></div>',
        '3-tl': '<div class="d-flex align-items-center ds-gap"><div class="d-flex flex-column ds-gap"><span class="ds-dot"></span><span class="ds-dot"></span></div><span class="ds-dot align-self-end mb-1"></span></div>',
        '2-diag': '<div class="d-flex ds-gap"><span class="ds-dot align-self-end mb-1"></span><span class="ds-dot align-self-start mt-1"></span></div>',
        '2-horiz': '<div class="d-flex align-items-center ds-gap"><span class="ds-dot"></span><span class="ds-dot"></span></div>',
        '1-center': '<div class="d-flex align-items-center justify-content-center"><span class="ds-dot"></span></div>',
        '3-vert': '<div class="d-flex flex-column align-items-center ds-gap"><span class="ds-dot"></span><span class="ds-dot"></span><span class="ds-dot"></span></div>',
        '3-horiz': '<div class="d-flex align-items-center ds-gap"><span class="ds-dot"></span><span class="ds-dot"></span><span class="ds-dot"></span></div>',
        '5-dice': '<div class="d-flex flex-column align-items-center ds-gap" style="width:20px;"><div class="d-flex justify-content-between w-100"><span class="ds-dot"></span><span class="ds-dot"></span></div><div class="d-flex justify-content-center w-100"><span class="ds-dot"></span></div><div class="d-flex justify-content-between w-100"><span class="ds-dot"></span><span class="ds-dot"></span></div></div>',
        'question': '<span style="font-size:22px; font-weight:bold; color:#204A7A; line-height:1;">؟</span>'
    };

    function initVisualBuilders() {
        document.querySelectorAll('.pattern-visual-input').forEach(input => {
            if (input.nextElementSibling && input.nextElementSibling.classList.contains('visual-builder-container')) return;
            
            input.type = 'hidden';
            
            const container = document.createElement('div');
            container.className = 'visual-builder-container mt-2';
            
            // Available shapes toolbar
            const toolbar = document.createElement('div');
            toolbar.className = 'd-flex flex-wrap gap-2 mb-2 p-2 bg-white border rounded';
            for (const [key, html] of Object.entries(shapes)) {
                const btn = document.createElement('div');
                btn.className = 'shape-btn';
                btn.title = 'إضافة ' + key;
                btn.innerHTML = html;
                btn.onclick = () => {
                    const currentVals = input.value ? input.value.split(',').map(s=>s.trim()) : [];
                    currentVals.push(key);
                    input.value = currentVals.join(', ');
                    renderPreview();
                };
                toolbar.appendChild(btn);
            }
            
            // Selected items preview box
            const previewBox = document.createElement('div');
            previewBox.className = 'shape-preview-box';
            
            function renderPreview() {
                previewBox.innerHTML = '';
                const vals = input.value ? input.value.split(',').map(s=>s.trim()).filter(Boolean) : [];
                if(vals.length === 0) {
                    previewBox.innerHTML = '<span class="text-muted small">لم يتم اختيار أشكال بعد...</span>';
                }
                vals.forEach((val, idx) => {
                    const tag = document.createElement('div');
                    tag.className = 'shape-item-tag';
                    tag.innerHTML = (shapes[val] || val) + ' <i class="bi bi-x-circle ms-1"></i>';
                    tag.onclick = () => {
                        vals.splice(idx, 1);
                        input.value = vals.join(', ');
                        renderPreview();
                    };
                    previewBox.appendChild(tag);
                });
            }
            
            container.appendChild(toolbar);
            container.appendChild(previewBox);
            input.parentNode.insertBefore(container, input.nextSibling);
            renderPreview();
        });
    }

    // Toggle options input type based on question type
    function toggleOptionsInput(selectEl, optionsInputId) {
        const input = document.getElementById(optionsInputId);
        if(!input) return;
        if(selectEl.value === 'pattern') {
            input.classList.add('pattern-visual-input');
            input.readOnly = true;
            initVisualBuilders();
        } else {
            input.classList.remove('pattern-visual-input');
            input.type = 'text';
            input.readOnly = false;
            if(input.nextElementSibling && input.nextElementSibling.classList.contains('visual-builder-container')) {
                input.nextElementSibling.remove();
            }
        }
    }

    // Add form logic
    const qTypeSelect = document.getElementById('qTypeSelect');
    qTypeSelect.addEventListener('change', function() {
        if(this.value === 'pattern') {
            document.getElementById('patternOptions').classList.remove('d-none');
        } else {
            document.getElementById('patternOptions').classList.add('d-none');
        }
        toggleOptionsInput(this, 'addOptionsInput');
    });

    // Edit form logic for all edit modals
    document.querySelectorAll('.editQTypeSelect').forEach(function(select) {
        select.addEventListener('change', function() {
            var targetId = this.getAttribute('data-target');
            if(this.value === 'pattern') {
                document.getElementById(targetId).classList.remove('d-none');
            } else {
                document.getElementById(targetId).classList.add('d-none');
            }
            
            // Find the options input in the same form
            const form = this.closest('form');
            const optionsInput = form.querySelector('input[name="options"]');
            if(optionsInput) {
                if(this.value === 'pattern') {
                    optionsInput.classList.add('pattern-visual-input');
                    optionsInput.readOnly = true;
                    initVisualBuilders();
                } else {
                    optionsInput.classList.remove('pattern-visual-input');
                    optionsInput.type = 'text';
                    optionsInput.readOnly = false;
                    if(optionsInput.nextElementSibling && optionsInput.nextElementSibling.classList.contains('visual-builder-container')) {
                        optionsInput.nextElementSibling.remove();
                    }
                }
            }
        });
    });

    // Initialize visual builders on load
    initVisualBuilders();
</script>
@endpush
