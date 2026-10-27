{{-- محور في صفحة "مقياس جديد". $i رقم المحور (أو __I__ في القالب)، $d بياناته --}}
<div class="dim-card p-3 mb-3" data-dimension>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <span class="fw-bold small">محور <span data-number>{{ is_numeric($i) ? $i + 1 : '' }}</span></span>
        <button type="button" class="btn btn-sm btn-outline-danger" data-remove-dimension title="حذف المحور"><i class="bi bi-trash"></i></button>
    </div>
    <div class="row g-2">
        <div class="col-md-6">
            <input name="dimensions[{{ $i }}][name_ar]" class="form-control @error('dimensions.' . $i . '.name_ar') is-invalid @enderror" placeholder="اسم المحور *" value="{{ $d['name_ar'] ?? '' }}" data-name>
        </div>
        <div class="col-md-6">
            <input name="dimensions[{{ $i }}][description_ar]" class="form-control" placeholder="وصف المحور (اختياري)" value="{{ $d['description_ar'] ?? '' }}">
        </div>
        <div class="col-12">
            <textarea name="dimensions[{{ $i }}][questions_raw]" rows="5" class="form-control @error('dimensions.' . $i . '.questions') is-invalid @enderror" placeholder="اكتب أسئلة المحور، سطر لكل سؤال" data-questions>{{ $d['questions_raw'] ?? '' }}</textarea>
            <div class="d-flex justify-content-between small mt-1">
                <span class="text-muted">نصيحة: تقدر تنسخ الأسئلة من ملف Word مباشرة.</span>
                <span class="text-muted"><span data-q-count>0</span> سؤال</span>
            </div>
            @error('dimensions.' . $i . '.questions')<div class="text-danger small">{{ $message }}</div>@enderror
            @error('dimensions.' . $i . '.name_ar')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>
    </div>
</div>
