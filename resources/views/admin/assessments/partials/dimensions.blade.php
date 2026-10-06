{{-- تبويب المحاور: المحاور الرئيسية وتحتها المحاور الفرعية --}}
@php
    $dimensionFill = fn ($d) => json_encode([
        'title' => 'تعديل المحور',
        'action' => route('admin.dimensions.update', $d->id),
        'method' => 'PUT',
        'values' => [
            'name_ar' => $d->name_ar, 'code' => $d->code, 'description_ar' => $d->description_ar,
            'parent_id' => $d->parent_id, 'reverse_in_total' => $d->reverse_in_total, 'order_index' => $d->order_index,
        ],
    ], JSON_UNESCAPED_UNICODE);
    $newDimension = fn ($parentId = null) => json_encode([
        'title' => $parentId ? 'محور فرعي جديد' : 'محور جديد',
        'action' => route('admin.dimensions.store', $assessment),
        'values' => ['parent_id' => $parentId],
    ], JSON_UNESCAPED_UNICODE);
@endphp

<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
    <p class="text-muted small m-0">درجة المحور = مجموع درجات أسئلته وأسئلة محاوره الفرعية. المحاور الرئيسية هي اللي بتتجمع في الدرجة الكلية.</p>
    <button class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#dimensionModal" data-fill="{{ $newDimension() }}"><i class="bi bi-plus-lg"></i> محور جديد</button>
</div>

@forelse ($data->roots() as $root)
    @php $rootQuestions = $data->questionsUnder($root->id); @endphp
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <div class="d-flex flex-wrap align-items-start gap-2">
                <div class="min-w-0 flex-grow-1">
                    <div class="fw-bold">{{ $root->name_ar }}
                        @if ($root->code)<span class="badge text-bg-light fw-normal" dir="ltr">{{ $root->code }}</span>@endif
                        @if ($root->reverse_in_total)<span class="badge text-bg-warning fw-normal">معكوس في الدرجة الكلية</span>@endif
                    </div>
                    @if ($root->description_ar)<div class="small text-muted mt-1">{{ $root->description_ar }}</div>@endif
                    <div class="small mt-2 text-muted">
                        <i class="bi bi-question-circle"></i> {{ $rootQuestions->count() }} سؤال ·
                        <i class="bi bi-123"></i> الدرجة <span dir="ltr">{{ $range($rootQuestions) }}</span> ·
                        <i class="bi bi-bar-chart-steps"></i> {{ $data->levelsFor($root->id)->count() }} مستوى
                    </div>
                </div>
                <div class="d-flex gap-1">
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#dimensionModal" data-fill="{{ $newDimension($root->id) }}" title="محور فرعي"><i class="bi bi-node-plus"></i></button>
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#dimensionModal" data-fill="{{ $dimensionFill($root) }}" title="تعديل"><i class="bi bi-pencil"></i></button>
                    @include('admin.assessments.partials.dimension-delete', ['dimension' => $root])
                </div>
            </div>

            @foreach ($data->children($root->id) as $child)
                @php $childQuestions = $data->questionsUnder($child->id); @endphp
                <div class="dim-child ps-3 mt-3 d-flex flex-wrap align-items-start gap-2">
                    <div class="min-w-0 flex-grow-1">
                        <div class="fw-bold small">{{ $child->name_ar }} @if ($child->code)<span class="badge text-bg-light fw-normal" dir="ltr">{{ $child->code }}</span>@endif</div>
                        @if ($child->description_ar)<div class="small text-muted">{{ $child->description_ar }}</div>@endif
                        <div class="small text-muted">{{ $childQuestions->count() }} سؤال · الدرجة <span dir="ltr">{{ $range($childQuestions) }}</span> · {{ $data->levelsFor($child->id)->count() }} مستوى</div>
                    </div>
                    <div class="d-flex gap-1">
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#dimensionModal" data-fill="{{ $dimensionFill($child) }}" title="تعديل"><i class="bi bi-pencil"></i></button>
                        @include('admin.assessments.partials.dimension-delete', ['dimension' => $child])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@empty
    <div class="card border-0 shadow-sm"><div class="text-center text-muted py-5"><i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>لسه مفيش محاور. ابدأ بإضافة محور (مقياس من محور واحد برضه محتاج محور).</div></div>
@endforelse
