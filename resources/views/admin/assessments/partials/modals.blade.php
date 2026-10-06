{{-- مودالات صفحة المقياس. اللي بيتفتح بزرار [data-fill] بيتملي من admin.js --}}

{{-- المحور --}}
<div class="modal fade" id="dimensionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" class="modal-content border-0">
            @csrf <input type="hidden" name="_method" value="POST">
            <div class="modal-header"><h5 class="modal-title" data-title="محور">محور</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button></div>
            <div class="modal-body">
                <div class="mb-3"><label class="form-label">اسم المحور *</label><input name="name_ar" class="form-control" required maxlength="255"></div>
                <div class="row g-2 mb-3">
                    <div class="col-7">
                        <label class="form-label">تابع لمحور</label>
                        <select name="parent_id" class="form-select">
                            <option value="">— محور رئيسي —</option>
                            @foreach ($data->roots() as $root)<option value="{{ $root->id }}">{{ $root->name_ar }}</option>@endforeach
                        </select>
                    </div>
                    <div class="col-5"><label class="form-label">الكود</label><input name="code" class="form-control" dir="ltr" maxlength="60"></div>
                </div>
                <div class="mb-3"><label class="form-label">الوصف</label><textarea name="description_ar" rows="3" class="form-control"></textarea></div>
                <div class="row g-2 align-items-end">
                    <div class="col-4"><label class="form-label">الترتيب</label><input type="number" min="0" name="order_index" class="form-control" dir="ltr"></div>
                    <div class="col-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reverse_in_total" value="1" id="reverse_in_total">
                            <label class="form-check-label small" for="reverse_in_total">درجته تتعكس في الدرجة الكلية (زي العصابية)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button><button class="btn btn-brand">حفظ</button></div>
        </form>
    </div>
</div>

{{-- سؤال واحد --}}
<div class="modal fade" id="questionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form method="POST" class="modal-content border-0">
            @csrf <input type="hidden" name="_method" value="POST">
            <div class="modal-header"><h5 class="modal-title" data-title="سؤال">سؤال</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button></div>
            <div class="modal-body">
                <div class="mb-3"><label class="form-label">نص السؤال *</label><textarea name="text_ar" rows="2" class="form-control" required></textarea></div>
                <div class="row g-2 mb-3 align-items-end">
                    <div class="col-md-6">
                        <label class="form-label">المحور</label>
                        <select name="dimension_id" class="form-select">
                            <option value="">— بدون —</option>
                            @foreach ($data->dimensions as $d)<option value="{{ $d->id }}">{{ $dimensionLabel($d) }}</option>@endforeach
                        </select>
                    </div>
                    <div class="col-md-3"><label class="form-label">الترتيب</label><input type="number" min="0" name="order_index" class="form-control" dir="ltr"></div>
                    <div class="col-md-3">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="is_reversed" value="1" id="is_reversed">
                            <label class="form-check-label" for="is_reversed">سؤال معكوس</label>
                        </div>
                    </div>
                </div>
                @include('admin.assessments.partials.options-editor', ['options' => $firstOptions])
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button><button class="btn btn-brand">حفظ</button></div>
        </form>
    </div>
</div>

{{-- أسئلة كتير --}}
<div class="modal fade" id="bulkModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form method="POST" action="{{ route('admin.questions.store', $assessment) }}" class="modal-content border-0">
            @csrf
            <div class="modal-header"><h5 class="modal-title" data-title="إضافة أسئلة">إضافة أسئلة</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button></div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">الأسئلة * <span class="text-muted small">(سطر لكل سؤال)</span></label>
                    <textarea name="texts_raw" rows="8" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">المحور</label>
                    <select name="dimension_id" class="form-select">
                        <option value="">— بدون —</option>
                        @foreach ($data->dimensions as $d)<option value="{{ $d->id }}">{{ $dimensionLabel($d) }}</option>@endforeach
                    </select>
                </div>
                @include('admin.assessments.partials.options-editor', ['options' => $firstOptions])
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button><button class="btn btn-brand">إضافة</button></div>
        </form>
    </div>
</div>

{{-- اختيارات موحدة لكل الأسئلة --}}
<div class="modal fade" id="applyOptionsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('admin.questions.applyOptions', $assessment) }}" class="modal-content border-0" data-confirm="الاختيارات دي هتستبدل اختيارات كل أسئلة المقياس. تكمل؟">
            @csrf
            <div class="modal-header"><h5 class="modal-title">اختيارات موحدة لكل الأسئلة</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button></div>
            <div class="modal-body">
                <p class="small text-muted">بيتطبق على كل أسئلة المقياس ({{ $data->questions->count() }} سؤال).</p>
                @include('admin.assessments.partials.options-editor', ['options' => $firstOptions])
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button><button class="btn btn-brand">تطبيق</button></div>
        </form>
    </div>
</div>

{{-- مستوى نتيجة --}}
<div class="modal fade" id="levelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <form method="POST" class="modal-content border-0">
            @csrf <input type="hidden" name="_method" value="POST">
            <div class="modal-header"><h5 class="modal-title" data-title="مستوى">مستوى</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button></div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-5"><label class="form-label">اسم المستوى *</label><input name="title_ar" class="form-control" required maxlength="255"></div>
                    <div class="col-md-3">
                        <label class="form-label">خاص بـ</label>
                        <select name="dimension_id" class="form-select">
                            <option value="">المقياس كله</option>
                            @foreach ($data->dimensions as $d)<option value="{{ $d->id }}">{{ $dimensionLabel($d) }}</option>@endforeach
                        </select>
                    </div>
                    <div class="col-md-2"><label class="form-label">من {{ $assessment->level_basis === 'percent' ? '(%)' : '' }}</label><input type="number" name="min_score" class="form-control" dir="ltr"></div>
                    <div class="col-md-2"><label class="form-label">إلى {{ $assessment->level_basis === 'percent' ? '(%)' : '' }}</label><input type="number" name="max_score" class="form-control" dir="ltr"></div>
                    <div class="col-md-4"><label class="form-label">الكود</label><input name="code" class="form-control" dir="ltr" maxlength="60" placeholder="low / medium / high"></div>
                    <div class="col-md-8"><label class="form-label">الوصف المختصر</label><input name="summary_ar" class="form-control"></div>
                    <div class="col-12"><label class="form-label">التفسير التفصيلي</label><textarea name="description_ar" rows="3" class="form-control"></textarea></div>

                    @foreach (\App\Models\ResultLevel::LISTS as $field => $label)
                        <div class="col-md-6">
                            <label class="form-label">{{ $label }} <span class="text-muted small">(سطر لكل عنصر)</span></label>
                            <textarea name="{{ $field }}_raw" rows="4" class="form-control"></textarea>
                        </div>
                    @endforeach

                    <div class="col-12"><hr class="my-1"></div>
                    <div class="col-12"><label class="form-label">مقدمة البرامج التدريبية</label><input name="programs_intro_ar" class="form-control"></div>
                    <div class="col-12">
                        <label class="form-label">البرامج التدريبية المقترحة <span class="text-muted small">(سطر لكل برنامج: اسم البرنامج | وصف قصير)</span></label>
                        <textarea name="programs_raw" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-12"><label class="form-label">خاتمة البرامج</label><input name="programs_outro_ar" class="form-control"></div>
                </div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button><button class="btn btn-brand">حفظ</button></div>
        </form>
    </div>
</div>

{{-- مستويات تلقائية بنطاقات متساوية --}}
<div class="modal fade" id="generateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" class="modal-content border-0" data-confirm="المستويات الموجودة في المكان ده هتتمسح وتتعمل مستويات جديدة بنطاقات متساوية. تكمل؟">
            @csrf
            <input type="hidden" name="scope">
            <div class="modal-header"><h5 class="modal-title" data-title="مستويات تلقائية">مستويات تلقائية</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button></div>
            <div class="modal-body">
                <p class="small text-muted">النطاقات بتتقسم بالتساوي على كل الدرجات الممكنة. بعدها تقدر تعدّل أي مستوى وتكتب وصفه وتوصياته.</p>
                <div class="mb-3">
                    <label class="form-label" for="generate-count">عدد المستويات</label>
                    <select id="generate-count" class="form-select" data-generate-count>
                        @foreach ([2, 3, 4, 5] as $n)<option value="{{ $n }}" @selected($n === 3)>{{ $n }}</option>@endforeach
                    </select>
                </div>
                <label class="form-label">أسماء المستويات (من الأقل للأعلى)</label>
                <div data-generate-titles></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button><button class="btn btn-brand"><i class="bi bi-magic"></i> عمل المستويات</button></div>
        </form>
    </div>
</div>