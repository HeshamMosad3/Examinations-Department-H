@extends('layouts.admin')

@section('title', 'تجربة: ' . $assessment->title_ar)

@php
    $answers = old('answers', request('answers', []));
    $unit = $assessment->level_basis === 'percent' ? '%' : '';
@endphp

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
        <div>
            <a href="{{ route('admin.assessments.show', $assessment) }}" class="small text-decoration-none"><i class="bi bi-arrow-right"></i> {{ $assessment->title_ar }}</a>
            <h1 class="h4 mt-1 mb-0">تجربة المقياس</h1>
            <p class="text-muted small mb-0">جاوب زي المستخدم وشوف النتيجة المحسوبة. التجربة مش بتتحفظ.</p>
        </div>
    </div>

    @if ($result)
        @php
            $roots = collect($result['ranking'])->map(fn ($id) => $result['dimensions'][$id]);
            $subs = collect($result['dimensions'])->whereNotNull('parent_id');
        @endphp
        <div class="card border-0 shadow-sm mb-4 border-brand"><div class="card-body p-4">
            <div class="d-flex flex-wrap align-items-center gap-4">
                <div class="text-center">
                    <div class="display-6 fw-bold text-brand" dir="ltr">{{ $result['total'] }} <span class="fs-5 text-muted">/ {{ $result['max'] }}</span></div>
                    <div class="small text-muted" dir="ltr">{{ $result['percent'] }}%</div>
                </div>
                <div class="min-w-0 flex-grow-1">
                    @if ($result['level'])
                        <div class="h5 mb-1">{{ $result['level']->title_ar }} @if ($result['level']->code)<span class="badge text-bg-light fw-normal" dir="ltr">{{ $result['level']->code }}</span>@endif</div>
                        @if ($result['level']->summary_ar)<div>{{ $result['level']->summary_ar }}</div>@endif
                        @if ($result['level']->description_ar)<div class="small text-muted mt-1 pre-line">{{ $result['level']->description_ar }}</div>@endif
                    @else
                        <div class="text-muted">مفيش مستوى للمقياس كله (النتيجة بتتقري من المحاور).</div>
                    @endif
                </div>
            </div>
        </div></div>

        <h2 class="h6 mb-2">المحاور من الأعلى للأقل</h2>
        <div class="card border-0 shadow-sm mb-4">
            <table class="table rtable align-middle mb-0">
                <thead><tr><th>المحور</th><th style="width:35%">الدرجة</th><th>المستوى</th></tr></thead>
                <tbody>
                    @foreach ($roots as $d)
                        <tr class="table-light">
                            <td data-label="المحور" class="fw-bold">{{ $d['name'] }}</td>
                            <td data-label="الدرجة">
                                <div class="d-flex align-items-center gap-2"><div class="progress flex-grow-1" style="height:8px"><div class="progress-bar" style="width: {{ $d['percent'] }}%"></div></div><span class="small nw" dir="ltr">{{ $d['score'] }} / {{ $d['max'] }}</span></div>
                            </td>
                            <td data-label="المستوى">{{ $d['level']?->title_ar ?? '—' }}</td>
                        </tr>
                        @foreach ($subs->where('parent_id', $d['id']) as $s)
                            <tr>
                                <td data-label="المحور الفرعي" class="ps-4 small">{{ $s['name'] }}</td>
                                <td data-label="الدرجة">
                                    <div class="d-flex align-items-center gap-2"><div class="progress flex-grow-1" style="height:6px"><div class="progress-bar" style="width: {{ $s['percent'] }}%"></div></div><span class="small nw" dir="ltr">{{ $s['score'] }} / {{ $s['max'] }}</span></div>
                                </td>
                                <td data-label="المستوى" class="small">{{ $s['level']?->title_ar ?? '—' }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.assessments.preview', $assessment) }}">
        @csrf
        <div class="d-flex flex-wrap gap-2 mb-3">
            @foreach ($data->questions->first()->options ?? [] as $i => $option)
                <button type="button" class="btn btn-sm btn-outline-secondary" data-answer-all="{{ $i }}">الكل: {{ $option->label_ar }}</button>
            @endforeach
            <button type="button" class="btn btn-sm btn-outline-secondary" data-answer-random><i class="bi bi-shuffle"></i> إجابات عشوائية</button>
        </div>

        @foreach ($data->questions as $n => $q)
            <div class="card border-0 shadow-sm mb-2 preview-q"><div class="card-body py-3">
                <div class="mb-2"><span class="text-muted fw-bold" dir="ltr">{{ $n + 1 }}.</span> {{ $q->text_ar }}
                    @if ($q->dimension_id)<span class="badge bg-brand-subtle text-brand fw-normal">{{ $data->dimensions[$q->dimension_id]->name_ar }}</span>@endif
                </div>
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($q->options as $i => $o)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $q->id }}]" id="a{{ $q->id }}_{{ $o->id }}" value="{{ $o->id }}" data-index="{{ $i }}" required @checked((int) ($answers[$q->id] ?? 0) === $o->id)>
                            <label class="form-check-label" for="a{{ $q->id }}_{{ $o->id }}">{{ $o->label_ar }} <span class="text-muted small" dir="ltr">({{ $o->score_value }})</span></label>
                        </div>
                    @endforeach
                </div>
            </div></div>
        @endforeach

        <div class="position-sticky bottom-0 bg-white border-top py-3 mt-3">
            <button class="btn btn-brand px-4"><i class="bi bi-calculator"></i> احسب النتيجة</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        const radiosByQuestion = () => Object.values([...document.querySelectorAll('.preview-q input[type=radio]')].reduce((all, r) => ((all[r.name] ||= []).push(r), all), {}));
        document.querySelectorAll('[data-answer-all]').forEach((b) => b.addEventListener('click', () => {
            radiosByQuestion().forEach((group) => { const r = group.find((x) => x.dataset.index === b.dataset.answerAll) || group[0]; r.checked = true; });
        }));
        document.querySelector('[data-answer-random]').addEventListener('click', () => {
            radiosByQuestion().forEach((group) => { group[Math.floor(Math.random() * group.length)].checked = true; });
        });
    </script>
@endpush
