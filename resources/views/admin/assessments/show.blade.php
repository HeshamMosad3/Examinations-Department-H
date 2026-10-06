@extends('layouts.admin')

@section('title', $assessment->title_ar)

@php
    // مجموعات اختيارات جاهزة لمحرر الاختيارات، وأولها اختيارات أول سؤال في المقياس
    $firstOptions = array_map(fn ($o) => ['label_ar' => $o->label_ar, 'score_value' => $o->score_value], $data->questions->first()->options ?? []);
    $presets = array_filter([
        'اختيارات المقياس الحالية' => $firstOptions,
        'نعم / إلى حد ما / لا' => [['label_ar' => 'نعم', 'score_value' => 2], ['label_ar' => 'إلى حد ما', 'score_value' => 1], ['label_ar' => 'لا', 'score_value' => 0]],
        'خماسي (5 ← 1)' => [
            ['label_ar' => 'تنطبق عليّ بدرجة كبيرة جدًا', 'score_value' => 5], ['label_ar' => 'تنطبق عليّ بدرجة كبيرة', 'score_value' => 4],
            ['label_ar' => 'تنطبق عليّ إلى حد ما', 'score_value' => 3], ['label_ar' => 'تنطبق عليّ قليلًا', 'score_value' => 2], ['label_ar' => 'لا تنطبق عليّ إطلاقًا', 'score_value' => 1],
        ],
        'تكرار (4 ← 0)' => [
            ['label_ar' => 'دائمًا', 'score_value' => 4], ['label_ar' => 'غالبًا', 'score_value' => 3], ['label_ar' => 'أحيانًا', 'score_value' => 2],
            ['label_ar' => 'نادرًا', 'score_value' => 1], ['label_ar' => 'أبدًا', 'score_value' => 0],
        ],
    ]);
    // اسم المحور بمساره (المحور الرئيسي ← الفرعي) للقوائم
    $dimensionLabel = fn ($d) => $d->parent_id ? $data->dimensions[$d->parent_id]->name_ar . ' ← ' . $d->name_ar : $d->name_ar;
    $range = function ($questions) {
        $min = $questions->sum(fn ($q) => min(array_column($q->options, 'score_value') ?: [0]));
        $max = $questions->sum(fn ($q) => max(array_column($q->options, 'score_value') ?: [0]));
        return $min . ' – ' . $max;
    };
@endphp

@section('content')
    {{-- رأس الصفحة --}}
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
        <div class="min-w-0">
            <a href="{{ route('admin.assessments.index') }}" class="small text-decoration-none"><i class="bi bi-arrow-right"></i> المقاييس</a>
            <h1 class="h4 mt-1 mb-1">{{ $assessment->title_ar }}</h1>
            <div class="d-flex flex-wrap gap-2 small">
                <span class="badge {{ $assessment->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">{{ $assessment->is_active ? 'مفعّل' : 'موقوف' }}</span>
                <span class="badge text-bg-light" dir="ltr">{{ $assessment->code }}</span>
                @if ($assessment->category)<span class="badge text-bg-light">{{ $assessment->category }}</span>@endif
                <span class="badge text-bg-light">{{ \App\Models\Assessment::SCORING_TYPES[$assessment->scoring_type] ?? $assessment->scoring_type }}</span>
                <span class="badge text-bg-light">المستويات على {{ \App\Models\Assessment::LEVEL_BASES[$assessment->level_basis] }}</span>
            </div>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-brand" href="{{ route('admin.assessments.preview', $assessment) }}"><i class="bi bi-play-circle"></i> تجربة المقياس</a>
            <a class="btn btn-outline-secondary" href="{{ route('admin.assessments.edit', $assessment) }}"><i class="bi bi-pencil"></i> البيانات</a>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><form method="POST" action="{{ route('admin.assessments.toggle', $assessment) }}">@csrf<button class="dropdown-item"><i class="bi bi-toggle-on"></i> {{ $assessment->is_active ? 'إيقاف المقياس' : 'تفعيل المقياس' }}</button></form></li>
                    <li><form method="POST" action="{{ route('admin.assessments.duplicate', $assessment) }}" data-confirm="هيتعمل نسخة كاملة من المقياس (غير مفعّلة). تكمل؟">@csrf<button class="dropdown-item"><i class="bi bi-copy"></i> عمل نسخة</button></form></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><form method="POST" action="{{ route('admin.assessments.destroy', $assessment) }}" data-confirm="هيتحذف المقياس بكل محاوره وأسئلته ومستوياته ونتائج المستخدمين فيه. متأكد؟">@csrf @method('DELETE')<button class="dropdown-item text-danger"><i class="bi bi-trash"></i> حذف المقياس</button></form></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- خطوات إعداد المقياس: كل خطوة حالتها، ومشاكلها لو فيه، وزرار يفتحها --}}
    @php
        $subCount = $data->dimensions->count() - $data->roots()->count();
        $steps = [
            ['key' => 'info', 'title' => 'بيانات المقياس', 'ok' => true,
                'summary' => ($assessment->category ?: 'من غير تصنيف') . ' · ' . (\App\Models\Assessment::SCORING_TYPES[$assessment->scoring_type] ?? ''),
                'issues' => [], 'action' => ['href' => route('admin.assessments.edit', $assessment), 'label' => 'تعديل البيانات']],
            ['key' => 'dimensions', 'title' => 'المحاور', 'ok' => $data->dimensions->isNotEmpty() && ! $issues['dimensions'],
                'summary' => $data->roots()->count() . ' محور رئيسي' . ($subCount ? " · {$subCount} محور فرعي" : ''),
                'issues' => $issues['dimensions'], 'action' => ['tab' => 'dimensions', 'label' => 'المحاور']],
            ['key' => 'questions', 'title' => 'الأسئلة واختيارات الإجابة', 'ok' => $data->questions->isNotEmpty() && ! $issues['questions'],
                'summary' => $data->questions->count() . ' سؤال · الدرجة الكلية ' . $range($data->questions),
                'issues' => $issues['questions'], 'action' => ['tab' => 'questions', 'label' => 'الأسئلة']],
            ['key' => 'levels', 'title' => 'مستويات النتائج والتوصيات', 'ok' => $data->levels->isNotEmpty() && ! $issues['levels'],
                'summary' => $data->levels->count() . ' مستوى',
                'issues' => $issues['levels'], 'action' => ['tab' => 'levels', 'label' => 'المستويات']],
            ['key' => 'publish', 'title' => 'التجربة والتفعيل', 'ok' => $assessment->is_active,
                'summary' => $assessment->is_active ? 'المقياس مفعّل' : 'المقياس موقوف. جرّبه الأول، وبعدين فعّله.',
                'issues' => [], 'action' => ['href' => route('admin.assessments.preview', $assessment), 'label' => 'تجربة المقياس']],
        ];
        $done = collect($steps)->where('ok', true)->count();
    @endphp
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="fw-bold">خطوات إعداد المقياس</div>
            <div class="d-flex align-items-center gap-2 small text-muted">
                <span dir="ltr">{{ $done }}/{{ count($steps) }}</span>
                <div class="progress" style="width: 140px; height: 8px"><div class="progress-bar" style="width: {{ $done / count($steps) * 100 }}%"></div></div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($steps as $n => $s)
                <li class="list-group-item d-flex flex-wrap align-items-start gap-3 py-3">
                    <span class="fs-5 lh-1 {{ $s['ok'] ? 'text-success' : 'text-warning' }}"><i class="bi {{ $s['ok'] ? 'bi-check-circle-fill' : 'bi-exclamation-circle-fill' }}"></i></span>
                    <div class="min-w-0 flex-grow-1">
                        <div class="fw-bold">{{ $n + 1 }}. {{ $s['title'] }}</div>
                        <div class="small text-muted">{{ $s['summary'] }}</div>
                        @if ($s['issues'])
                            <ul class="small text-danger mb-0 mt-1 ps-3">@foreach ($s['issues'] as $issue)<li>{{ $issue }}</li>@endforeach</ul>
                        @endif
                    </div>
                    @if (isset($s['action']['tab']))
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-open-tab="{{ $s['action']['tab'] }}">{{ $s['action']['label'] }} <i class="bi bi-arrow-left"></i></button>
                    @elseif ($s['key'] === 'publish' && ! $assessment->is_active && ! array_filter(array_column($steps, 'issues')))
                        <div class="d-flex gap-2">
                            <a class="btn btn-sm btn-outline-secondary" href="{{ $s['action']['href'] }}">{{ $s['action']['label'] }}</a>
                            <form method="POST" action="{{ route('admin.assessments.toggle', $assessment) }}">@csrf<button class="btn btn-sm btn-brand">تفعيل</button></form>
                        </div>
                    @else
                        <a class="btn btn-sm btn-outline-secondary" href="{{ $s['action']['href'] }}">{{ $s['action']['label'] }} <i class="bi bi-arrow-left"></i></a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    {{-- التبويبات --}}
    <ul class="nav nav-underline mb-3" role="tablist">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-dimensions" type="button" role="tab">المحاور</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-questions" type="button" role="tab">الأسئلة <span class="badge text-bg-light" dir="ltr">{{ $data->questions->count() }}</span></button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-levels" type="button" role="tab">مستويات النتائج <span class="badge text-bg-light" dir="ltr">{{ $data->levels->count() }}</span></button></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-dimensions" role="tabpanel">@include('admin.assessments.partials.dimensions')</div>
        <div class="tab-pane fade" id="tab-questions" role="tabpanel">@include('admin.assessments.partials.questions')</div>
        <div class="tab-pane fade" id="tab-levels" role="tabpanel">@include('admin.assessments.partials.levels')</div>
    </div>

    @include('admin.assessments.partials.modals')
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    <script>
        // مستويات تلقائية: خانات الأسماء حسب العدد
        (function () {
            const defaults = { 2: ['منخفض', 'مرتفع'], 3: ['منخفض', 'متوسط', 'مرتفع'], 4: ['منخفض', 'متوسط', 'جيد', 'مرتفع'], 5: ['منخفض جدًا', 'منخفض', 'متوسط', 'مرتفع', 'مرتفع جدًا'] };
            const count = document.querySelector('[data-generate-count]');
            const box = document.querySelector('[data-generate-titles]');
            const render = () => {
                box.innerHTML = defaults[count.value].map((t, i) => `<input name="titles[]" class="form-control form-control-sm mb-2" required aria-label="المستوى ${i + 1}">`).join('');
                box.querySelectorAll('input').forEach((input, i) => { input.value = defaults[count.value][i]; });
            };
            count.addEventListener('change', render);
            document.getElementById('generateModal').addEventListener('show.bs.modal', () => { count.value = 3; render(); });
            render();
        })();
    </script>
@endpush
