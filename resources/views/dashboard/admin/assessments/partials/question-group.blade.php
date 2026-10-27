{{-- مجموعة أسئلة محور واحد ($group: id, label, questions) --}}
<div class="card border-0 shadow-sm mb-3 {{ $warning ? 'border-warning' : '' }}">
    <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center gap-2 py-2">
        <div class="fw-bold">
            @if ($warning)<i class="bi bi-exclamation-triangle text-warning"></i>@endif
            {{ $group['label'] }} <span class="badge text-bg-light fw-normal" dir="ltr">{{ $group['questions']->count() }}</span>
        </div>
        @unless ($warning)
            <div class="d-flex gap-1">
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#bulkModal" data-fill="{{ $bulkFill($group['id'], $group['label']) }}"><i class="bi bi-card-list"></i> أضف أسئلة</button>
                <button class="btn btn-sm btn-brand" data-bs-toggle="modal" data-bs-target="#questionModal" data-fill="{{ $newQuestion($group['id']) }}" title="سؤال واحد"><i class="bi bi-plus-lg"></i></button>
            </div>
        @endunless
    </div>
    @if ($warning)
        <div class="small text-muted px-3 pt-2">الأسئلة دي بتتحسب في الدرجة الكلية بس. عدّل كل سؤال واختار محوره.</div>
    @endif
    @if ($group['questions']->isEmpty())
        <div class="text-center text-muted small py-4">لسه مفيش أسئلة في المحور ده.</div>
    @else
        <div data-sortable-url="{{ route('admin.questions.reorder', $assessment) }}">
            @foreach ($group['questions'] as $i => $q)
                <div class="q-row d-flex align-items-start gap-2 px-3 py-2 border-top" data-id="{{ $q->id }}">
                    <i class="bi bi-grip-vertical drag-handle fs-5" title="اسحب للترتيب"></i>
                    <span class="q-num text-muted fw-bold" data-number dir="ltr">{{ $i + 1 }}</span>
                    <div class="min-w-0 flex-grow-1">
                        <div>{{ $q->text_ar }}</div>
                        <div class="d-flex flex-wrap gap-1 mt-1">
                            @if ($q->is_reversed)<span class="badge text-bg-warning fw-normal">معكوس</span>@endif
                            @if ($differs($q))
                                @foreach ($q->options as $o)<span class="badge text-bg-light fw-normal opt-pill">{{ $o->label_ar }} <b dir="ltr">{{ $o->score_value }}</b></span>@endforeach
                            @endif
                            @if (count($q->options) < 2)<span class="badge text-bg-danger fw-normal">محتاج اختيارين على الأقل</span>@endif
                        </div>
                    </div>
                    <div class="d-flex gap-1">
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#questionModal" data-fill="{{ $questionFill($q) }}" title="تعديل"><i class="bi bi-pencil"></i></button>
                        <form method="POST" action="{{ route('admin.questions.destroy', $q->id) }}" data-confirm="حذف السؤال وإجابات المستخدمين عليه؟">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" title="حذف"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
