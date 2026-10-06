{{-- محرر اختيارات الإجابة (public/admin/admin.js). $options: الصفوف المبدئية --}}
<div data-options>
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
        <label class="form-label m-0">الاختيارات ودرجاتها *</label>
        @if ($presets)
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">اختيارات جاهزة</button>
                <ul class="dropdown-menu dropdown-menu-end">
                    @foreach ($presets as $name => $preset)
                        <li><button type="button" class="dropdown-item" data-options-preset="{{ json_encode($preset, JSON_UNESCAPED_UNICODE) }}">{{ $name }}</button></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div data-options-list>
        @foreach ($options ?: [[], []] as $i => $option)
            <div class="input-group input-group-sm mb-2" data-option-row>
                <input type="text" class="form-control" data-label name="options[{{ $i }}][label_ar]" value="{{ $option['label_ar'] ?? '' }}" placeholder="نص الاختيار" required>
                <input type="number" class="form-control" style="max-width:6.5rem" data-score name="options[{{ $i }}][score_value]" value="{{ $option['score_value'] ?? '' }}" placeholder="الدرجة" required>
                <button type="button" class="btn btn-outline-danger" data-remove-option aria-label="حذف الاختيار"><i class="bi bi-x-lg"></i></button>
            </div>
        @endforeach
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary" data-add-option><i class="bi bi-plus-lg"></i> اختيار</button>
</div>
