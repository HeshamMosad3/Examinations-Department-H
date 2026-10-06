{{-- تبويب مستويات النتائج: مستويات المقياس كله، ثم مستويات كل محور (accordion) --}}
@php
    $levelFill = fn ($l) => json_encode([
        'title' => 'تعديل المستوى',
        'action' => route('admin.levels.update', $l->id),
        'method' => 'PUT',
        'values' => [
            'dimension_id' => $l->dimension_id, 'code' => $l->code, 'title_ar' => $l->title_ar,
            'min_score' => $l->min_score, 'max_score' => $l->max_score, 'summary_ar' => $l->summary_ar, 'description_ar' => $l->description_ar,
            'strengths_raw' => implode("\n", $l->strengths ?? []), 'development_areas_raw' => implode("\n", $l->development_areas ?? []),
            'how_to_learn_raw' => implode("\n", $l->how_to_learn ?? []), 'practical_tips_raw' => implode("\n", $l->practical_tips ?? []),
            'programs_intro_ar' => $l->programs_intro_ar, 'programs_outro_ar' => $l->programs_outro_ar,
            'programs_raw' => implode("\n", array_map(fn ($p) => trim(($p['title'] ?? '') . (! empty($p['subtitle']) ? ' | ' . $p['subtitle'] : '')), $l->programs ?? [])),
        ],
    ], JSON_UNESCAPED_UNICODE);
    $newLevel = fn ($dimensionId) => json_encode([
        'title' => 'مستوى جديد',
        'action' => route('admin.levels.store', $assessment),
        'values' => ['dimension_id' => $dimensionId],
    ], JSON_UNESCAPED_UNICODE);
    $scopes = collect([['id' => null, 'label' => 'نتيجة المقياس كله', 'questions' => $data->questions]])
        ->merge($data->dimensions->map(fn ($d) => ['id' => $d->id, 'label' => $dimensionLabel($d), 'questions' => $data->questionsUnder($d->id)]));
    $unit = $assessment->level_basis === 'percent' ? '%' : '';
    // أول قسم فيه مستويات هو اللي بيتفتح (في مقياس زي 7PK مفيش مستويات للمقياس كله)
    $openIndex = max(0, (int) $scopes->search(fn ($s) => $data->levelsFor($s['id'])->isNotEmpty()));
@endphp

<p class="text-muted small mb-3">
    @if ($assessment->scoring_type === 'dominant_style')
        نتيجة المقياس كله بتتحدد بالنمط الغالب: كود المستوى لازم يكون كود المحور (زي <span dir="ltr">visual</span>)، أو <span dir="ltr">balanced</span> للمتوازن، أو <span dir="ltr">dual_a_b</span> للثنائي بترتيب المحاور.
    @else
        المستوى بيتحدد من النطاق اللي الدرجة {{ $unit ? '(كنسبة مئوية)' : '' }} واقعة فيه. النطاقات لازم تغطي كل الدرجات من غير تداخل.
        أسهل طريقة: «مستويات تلقائية» بتعمل النطاقات بالتساوي، وبعدها تكتب وصف وتوصيات كل مستوى.
    @endif
</p>

@if ($assessment->scoring_type !== 'dominant_style' && $data->roots()->count() > 1)
    <div class="d-flex justify-content-end mb-2">
        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#generateModal"
            data-fill="{{ json_encode(['title' => 'مستويات تلقائية لكل المحاور الرئيسية', 'action' => route('admin.levels.generate', $assessment), 'values' => ['scope' => 'roots']], JSON_UNESCAPED_UNICODE) }}">
            <i class="bi bi-magic"></i> نفس المستويات لكل المحاور الرئيسية
        </button>
    </div>
@endif

<div class="accordion" id="levelsAccordion">
    @foreach ($scopes as $i => $scope)
        @php $levels = $data->levelsFor($scope['id']); $key = 'scope-' . ($scope['id'] ?? 'all'); @endphp
        <div class="accordion-item border-0 shadow-sm mb-2 rounded overflow-hidden">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $i === $openIndex ? '' : 'collapsed' }} gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $key }}">
                    <span class="fw-bold">{{ $scope['label'] }}</span>
                    <span class="badge {{ $levels->isEmpty() ? 'text-bg-light' : 'bg-brand-subtle text-brand' }}" dir="ltr">{{ $levels->count() }}</span>
                    @if ($assessment->level_basis !== 'percent')<span class="small text-muted fw-normal">الدرجة <span dir="ltr">{{ $range($scope['questions']) }}</span></span>@endif
                </button>
            </h2>
            <div id="{{ $key }}" class="accordion-collapse collapse {{ $i === $openIndex ? 'show' : '' }}" data-bs-parent="#levelsAccordion">
                <div class="accordion-body bg-light">
                    @foreach ($levels as $level)
                        <div class="card level-card border-0 shadow-sm mb-2"><div class="card-body py-3">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <div class="min-w-0 flex-grow-1">
                                    <div class="fw-bold">{{ $level->title_ar }}
                                        @if ($level->code)<span class="badge text-bg-light fw-normal" dir="ltr">{{ $level->code }}</span>@endif
                                        @if ($level->min_score !== null)<span class="badge text-bg-success fw-normal level-range" dir="ltr">{{ $level->min_score }}{{ $unit }} – {{ $level->max_score }}{{ $unit }}</span>@endif
                                    </div>
                                    @if ($level->summary_ar)<div class="small mt-1">{{ $level->summary_ar }}</div>@endif
                                    @if ($level->description_ar)<div class="small text-muted mt-1 pre-line">{{ \Illuminate\Support\Str::limit($level->description_ar, 260) }}</div>@endif
                                    <div class="d-flex flex-wrap gap-1 mt-2">
                                        @foreach (\App\Models\ResultLevel::LISTS as $field => $label)
                                            @if (! empty($level->{$field}))<span class="badge text-bg-light fw-normal">{{ $label }}: {{ count($level->{$field}) }}</span>@endif
                                        @endforeach
                                        @if (! empty($level->programs))<span class="badge text-bg-light fw-normal">برامج تدريبية: {{ count($level->programs) }}</span>@endif
                                    </div>
                                </div>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#levelModal" data-fill="{{ $levelFill($level) }}" title="تعديل"><i class="bi bi-pencil"></i></button>
                                    <form method="POST" action="{{ route('admin.levels.destroy', $level->id) }}" data-confirm="حذف المستوى «{{ $level->title_ar }}»؟">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="حذف"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div></div>
                    @endforeach
                    @if ($levels->isEmpty())
                        <div class="text-muted small mb-2">مفيش مستويات هنا لسه.</div>
                    @endif
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#levelModal" data-fill="{{ $newLevel($scope['id']) }}"><i class="bi bi-plus-lg"></i> إضافة مستوى</button>
                        @if ($assessment->scoring_type !== 'dominant_style' || $scope['id'] !== null)
                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#generateModal"
                                data-fill="{{ json_encode(['title' => 'مستويات تلقائية: ' . $scope['label'], 'action' => route('admin.levels.generate', $assessment), 'values' => ['scope' => $scope['id'] ?? 'all']], JSON_UNESCAPED_UNICODE) }}">
                                <i class="bi bi-magic"></i> مستويات تلقائية
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
