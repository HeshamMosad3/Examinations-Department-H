@extends('layouts.admin')
@section('title', 'إدارة التوصيات')
@section('page-title', 'إدارة التوصيات')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-muted small mb-0">ضع توصية لكل مستوى (مرتفع / متوسط / منخفض) لكل مقياس.</p>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#recModal">
        <i class="bi bi-plus-circle me-1"></i>إضافة توصية
    </button>
</div>

@forelse($assessments as $assessment)
    @php $recs = $recommendations[$assessment->id] ?? collect(); @endphp
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-transparent border-0 py-3">
            <h6 class="mb-0 fw-semibold">
                <i class="bi bi-collection text-primary me-2"></i>{{ $assessment->title_ar }}
                <span class="text-muted fw-normal small ms-2">{{ $assessment->category }}</span>
            </h6>
        </div>
        <div class="card-body px-4 pb-4 pt-0">
            @if($recs->isEmpty())
                <p class="text-muted small mb-0">لا توجد توصيات لهذا المقياس بعد.</p>
            @else
                <div class="row g-3">
                    @foreach($recs as $rec)
                        @php
                            $lc = match($rec->level) { 
                                'high', 'excellent', 'very_good', 'متميز', 'جيد جدًا', 'مرتفع' => 'success', 
                                'medium', 'good', 'متوسط', 'جيد' => 'warning', 
                                default => 'danger' 
                            };
                            $ll = match($rec->level) { 
                                'high' => 'مرتفع', 
                                'medium' => 'متوسط', 
                                'low' => 'منخفض',
                                'very_low' => 'منخفض جدًا',
                                'excellent' => 'متميز',
                                'very_good' => 'جيد جدًا',
                                'good' => 'جيد',
                                default => $rec->level 
                            };
                        @endphp
                        <div class="col-md-4">
                            <div class="border border-{{ $lc }} rounded-3 p-3 h-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-{{ $lc }}-subtle text-{{ $lc }} border border-{{ $lc }}-subtle">{{ $ll }}</span>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary btn-edit-rec"
                                                data-id="{{ $rec->id }}"
                                                data-assessment="{{ $rec->assessment_id }}"
                                                data-level="{{ $rec->level }}"
                                                data-high="{{ $rec->high_threshold }}"
                                                data-low="{{ $rec->low_threshold }}"
                                                data-desc="{{ $rec->description_ar }}"
                                                data-certificates_intro="{{ $rec->certificates_intro_ar }}"
                                                data-certificates="{{ json_encode($rec->certificates_ar ?? []) }}"
                                                data-programs="{{ json_encode($rec->programs_ar ?? []) }}"
                                                data-plan_intro="{{ $rec->plan_30_days_intro_ar }}"
                                                data-plan="{{ json_encode($rec->plan_30_days_ar ?? []) }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger btn-delete-rec"
                                                data-id="{{ $rec->id }}"
                                                data-url="{{ route('admin.recommendations.destroy', $rec->id) }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="small text-muted mb-2">{{ Str::limit($rec->description_ar, 100) }}</p>
                                <div class="small text-muted">
                                    <span class="badge bg-light text-dark border me-1">حد أعلى: {{ $rec->high_threshold }}</span>
                                    <span class="badge bg-light text-dark border">حد أدنى: {{ $rec->low_threshold }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@empty
    <div class="alert alert-info"><i class="bi bi-info-circle me-2"></i>لا توجد مقاييس بعد.</div>
@endforelse

<!-- Recommendation Modal -->
<div class="modal fade" id="recModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">إضافة / تحديث توصية</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="r-id" value="">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المقياس *</label>
                        <select class="form-select" id="r-assessment_id">
                            <option value="">اختر المقياس</option>
                            @foreach($assessments as $a)
                                <option value="{{ $a->id }}">{{ $a->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">المستوى *</label>
                        <select class="form-select" id="r-level">
                            <option value="">اختر المستوى</option>
                            <option value="متميز">متميز</option>
                            <option value="جيد جدًا">جيد جدًا</option>
                            <option value="جيد">جيد</option>
                            <option value="مرتفع">مرتفع</option>
                            <option value="متوسط">متوسط</option>
                            <option value="منخفض">منخفض</option>
                            <option value="منخفض جدًا">منخفض جدًا</option>
                            <!-- Keep English for backwards compatibility if needed -->
                            <option value="high">مرتفع (High)</option>
                            <option value="medium">متوسط (Medium)</option>
                            <option value="low">منخفض (Low)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">حد الدرجة المرتفعة (%) *</label>
                        <input type="number" class="form-control" id="r-high_threshold" placeholder="مثال: 70" min="0" max="100">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-medium">حد الدرجة المنخفضة (%) *</label>
                        <input type="number" class="form-control" id="r-low_threshold" placeholder="مثال: 33" min="0" max="100">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">وصف نتيجة هذا المستوى *</label>
                        <textarea class="form-control" id="r-description_ar" rows="3"
                            placeholder="وصف يظهر للمستخدم بناءً على مستواه..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الجملة الافتتاحية للشهادات (اختياري)</label>
                        <input type="text" class="form-control" id="r-certificates_intro_ar" placeholder="مثال: من أهم الشهادات التي ننصحك بالحصول عليها:">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الشهادات الاحترافية المناسبة *</label>
                        <textarea class="form-control json-certificates-data" id="r-certificates_ar" rows="3"
                            placeholder="إضافة شهادة..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">البرامج والتوصيات المقترحة *</label>
                        <textarea class="form-control json-programs-data" id="r-programs_ar" rows="5"
                            placeholder="إضافة برنامج/توصية..."></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">الجملة الافتتاحية لخطة التطوير (اختياري)</label>
                        <input type="text" class="form-control" id="r-plan_30_days_intro_ar" placeholder="مثال: نقترح عليك خلال الـ 30 يوماً القادمة اتباع الخطوات التالية:">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-medium">خطة تطوير (30 يوماً) *</label>
                        <textarea class="form-control json-plan-data" id="r-plan_30_days_ar" rows="3"
                            placeholder="إضافة خطوة..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn-save-rec">
                    <span class="btn-text"><i class="bi bi-save me-1"></i>حفظ التوصية</span>
                    <span class="spinner-border spinner-border-sm d-none"></span>
                </button>
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
$('#btn-save-rec').on('click', function() {
    const btn = $(this);
    let certs = []; try { certs = JSON.parse($('#r-certificates_ar').val() || '[]'); } catch(e){}
    let progs = []; try { progs = JSON.parse($('#r-programs_ar').val() || '[]'); } catch(e){}
    let plan = []; try { plan = JSON.parse($('#r-plan_30_days_ar').val() || '[]'); } catch(e){}

    const payload = {
        id: $('#r-id').val() || null,
        assessment_id: $('#r-assessment_id').val(),
        level: $('#r-level').val(),
        description_ar: $('#r-description_ar').val().trim(),
        certificates_intro_ar: $('#r-certificates_intro_ar').val().trim(),
        certificates_ar: certs,
        programs_ar: progs,
        plan_30_days_intro_ar: $('#r-plan_30_days_intro_ar').val().trim(),
        plan_30_days_ar: plan,
        high_threshold: parseInt($('#r-high_threshold').val()) || 0,
        low_threshold:  parseInt($('#r-low_threshold').val()) || 0,
    };

    if (!payload.assessment_id || !payload.level || !payload.description_ar) {
        showAlert('يرجى ملء جميع الحقول المطلوبة.', 'warning'); return;
    }

    setLoading(btn, true);
    $.ajax({
        url: '{{ route('admin.recommendations.store') }}',
        method: 'POST', contentType: 'application/json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: JSON.stringify(payload),
        success: function(res) {
            setLoading(btn, false);
            bootstrap.Modal.getInstance($('#recModal')).hide();
            showAlert(res.message, 'success');
            setTimeout(() => location.reload(), 1000);
        },
        error: function(xhr) {
            setLoading(btn, false);
            showAlert(xhr.responseJSON?.message || 'حدث خطأ.', 'danger');
        }
    });
});

$(document).on('click', '.btn-delete-rec', function() {
    const url = $(this).data('url');
    confirmDelete('هل تريد حذف هذه التوصية؟', url, () => location.reload());
});

$(document).on('click', '.btn-edit-rec', function() {
    const btn = $(this);
    $('#r-id').val(btn.data('id') || '');
    $('#r-assessment_id').val(btn.data('assessment'));
    $('#r-level').val(btn.data('level'));
    $('#r-high_threshold').val(btn.data('high'));
    $('#r-low_threshold').val(btn.data('low'));
    $('#r-description_ar').val(btn.data('desc'));
    $('#r-certificates_intro_ar').val(btn.data('certificates_intro'));
    $('#r-plan_30_days_intro_ar').val(btn.data('plan_intro'));
    
    const certsVal = JSON.stringify(btn.data('certificates') || []);
    const progsVal = JSON.stringify(btn.data('programs') || []);
    const planVal = JSON.stringify(btn.data('plan') || []);
    
    $('#r-certificates_ar').val(certsVal);
    $('#r-programs_ar').val(progsVal);
    $('#r-plan_30_days_ar').val(planVal);
    
    if ($('#r-certificates_ar').data('clearItems')) {
        $('#r-certificates_ar').data('clearItems')(certsVal);
    }
    if ($('#r-programs_ar').data('clearItems')) {
        $('#r-programs_ar').data('clearItems')(progsVal);
    }
    if ($('#r-plan_30_days_ar').data('clearItems')) {
        $('#r-plan_30_days_ar').data('clearItems')(planVal);
    }
    
    $('.modal-title').text('تحديث التوصية');
    new bootstrap.Modal(document.getElementById('recModal')).show();
});

$('[data-bs-target="#recModal"]').on('click', function() {
    clearRecommendationModal();
    $('.modal-title').text('إضافة / تحديث توصية');
});

function clearRecommendationModal() {
    $('#r-id').val('');
    $('#r-assessment_id').val('');
    $('#r-level').val('');
    $('#r-high_threshold').val('');
    $('#r-low_threshold').val('');
    $('#r-description_ar').val('');
    $('#r-certificates_intro_ar').val('');
    $('#r-plan_30_days_intro_ar').val('');
    function clearJsonList(selector) {
        const textarea = $(selector);
        textarea.val('');
        if (textarea.data('clearItems')) {
            textarea.data('clearItems')();
        }
    }

    clearJsonList('#r-certificates_ar');
    clearJsonList('#r-programs_ar');
    clearJsonList('#r-plan_30_days_ar');
}
</script>
@endpush
