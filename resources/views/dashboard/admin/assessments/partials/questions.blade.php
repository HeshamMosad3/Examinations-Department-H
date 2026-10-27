{{-- تبويب الأسئلة: الأسئلة متجمعة تحت محاورها، والترتيب بالسحب جوه كل محور --}}
@php
    $questionFill = fn ($q) => json_encode([
        'title' => 'تعديل السؤال',
        'action' => route('admin.questions.update', $q->id),
        'method' => 'PUT',
        'values' => ['text_ar' => $q->text_ar, 'dimension_id' => $q->dimension_id, 'is_reversed' => $q->is_reversed, 'order_index' => $q->order_index],
        'options' => array_map(fn ($o) => ['label_ar' => $o->label_ar, 'score_value' => $o->score_value], $q->options),
    ], JSON_UNESCAPED_UNICODE);
    $newQuestion = fn ($dimensionId) => json_encode([
        'title' => 'سؤال جديد',
        'action' => route('admin.questions.store', $assessment),
        'values' => ['dimension_id' => $dimensionId],
        'options' => $firstOptions,
    ], JSON_UNESCAPED_UNICODE);
    $bulkFill = fn ($dimensionId, $label) => json_encode([
        'title' => 'إضافة أسئلة: ' . $label,
        'action' => route('admin.questions.store', $assessment),
        'values' => ['dimension_id' => $dimensionId],
        'options' => $firstOptions,
    ], JSON_UNESCAPED_UNICODE);

    // المحاور اللي بتشيل أسئلة: المحور الفرعي، أو المحور الرئيسي اللي مالوش فروع
    $groups = collect();
    foreach ($data->roots() as $root) {
        $children = $data->children($root->id);
        foreach ($children->isEmpty() ? [$root] : $children as $dim) {
            $groups->push(['id' => $dim->id, 'label' => $dimensionLabel($dim), 'questions' => $data->questions->where('dimension_id', $dim->id)->values()]);
        }
        // أسئلة متربطة بمحور رئيسي ليه فروع (مش المعتاد) بتظهر برضه
        if ($children->isNotEmpty() && ($direct = $data->questions->where('dimension_id', $root->id)->values())->isNotEmpty()) {
            $groups->push(['id' => $root->id, 'label' => $root->name_ar . ' (مباشرة)', 'questions' => $direct]);
        }
    }
    $loose = $data->questions->whereNull('dimension_id')->values();

    // الاختيارات المشتركة: بتتعرض مرة واحدة فوق، وتحت السؤال بس لو اختياراته مختلفة
    $optionsKey = fn ($q) => json_encode(array_map(fn ($o) => [$o->label_ar, $o->score_value], $q->options), JSON_UNESCAPED_UNICODE);
    $commonKey = $data->questions->map($optionsKey)->countBy()->sortDesc()->keys()->first();
    $common = $data->questions->first(fn ($q) => $optionsKey($q) === $commonKey)?->options ?? [];
    $differs = fn ($q) => $optionsKey($q) !== $commonKey;
    $differentCount = $data->questions->filter($differs)->count();
@endphp

@if ($common)
    <div class="card border-0 shadow-sm mb-3"><div class="card-body py-3 d-flex flex-wrap align-items-center gap-2">
        <span class="small fw-bold">اختيارات الإجابة{{ $differentCount ? ' (لأغلب الأسئلة)' : ' لكل الأسئلة' }}:</span>
        @foreach ($common as $o)<span class="badge bg-brand-subtle text-brand fw-normal">{{ $o->label_ar }} <b dir="ltr">{{ $o->score_value }}</b></span>@endforeach
        @if ($differentCount)<span class="small text-muted">· {{ $differentCount }} سؤال باختيارات مختلفة (مكتوبة تحته)</span>@endif
        <button class="btn btn-outline-secondary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#applyOptionsModal"><i class="bi bi-list-check"></i> تغيير الاختيارات لكل الأسئلة</button>
    </div></div>
@endif

<p class="text-muted small mb-3"><i class="bi bi-arrows-move"></i> اسحب السؤال من <i class="bi bi-grip-vertical"></i> لتغيير ترتيبه جوه المحور، والترتيب بيتحفظ تلقائيًا.</p>

@if ($data->dimensions->isEmpty())
    <div class="alert alert-warning small">أضف محور الأول من تبويب <button type="button" class="btn btn-link btn-sm p-0 align-baseline" data-open-tab="dimensions">المحاور</button>، وبعدين أضف أسئلته هنا.</div>
@endif

@if ($loose->isNotEmpty())
    @include('dashboard.admin.assessments.partials.question-group', ['group' => ['id' => null, 'label' => 'أسئلة من غير محور', 'questions' => $loose], 'warning' => true])
@endif

@foreach ($groups as $group)
    @include('dashboard.admin.assessments.partials.question-group', ['group' => $group, 'warning' => false])
@endforeach
