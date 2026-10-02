@extends('layouts.admin')

@section('title', 'إدارة التحدي السريع')
@section('page-title', 'أسئلة التحدي السريع')

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
                                                <label class="form-label fw-bold">النمط البصري ( للسؤال )</label>
                                                <p class="text-muted small">أدخل الأنماط مفصولة بفاصلة. الخيارات: 2-vert, 4-grid, 3-tr, 3-tl, 2-diag, 2-horiz, question</p>
                                                <input type="text" name="pattern_row" class="form-control" value="{{ $question->pattern_row ? implode(', ', $question->pattern_row) : '' }}">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">الخيارات (4 خيارات مفصولة بفاصلة)</label>
                                                <input type="text" name="options" class="form-control" required value="{{ implode(', ', $question->options) }}">
                                                <small class="text-muted">إذا كان نمط بصري استخدم أسماء الأنماط</small>
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
                        <label class="form-label fw-bold">النمط البصري ( للسؤال )</label>
                        <p class="text-muted small">أدخل الأنماط مفصولة بفاصلة. الخيارات: 2-vert, 4-grid, 3-tr, 3-tl, 2-diag, 2-horiz, question</p>
                        <input type="text" name="pattern_row" class="form-control" placeholder="2-vert, 4-grid, 2-vert, question">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">الخيارات (4 خيارات مفصولة بفاصلة)</label>
                        <input type="text" name="options" class="form-control" required placeholder="خيار 1, خيار 2, خيار 3, خيار 4">
                        <small class="text-muted">إذا كان نمط بصري استخدم أسماء الأنماط</small>
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
    // Add form logic
    document.getElementById('qTypeSelect').addEventListener('change', function() {
        if(this.value === 'pattern') {
            document.getElementById('patternOptions').classList.remove('d-none');
        } else {
            document.getElementById('patternOptions').classList.add('d-none');
        }
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
        });
    });
</script>
@endpush
