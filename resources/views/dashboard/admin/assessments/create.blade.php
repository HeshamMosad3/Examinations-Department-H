@extends('layouts.admin')

@section('title', 'مقياس جديد')

@php
    $presets = [
        'yes_no' => ['label' => 'نعم / إلى حد ما / لا', 'hint' => '3 اختيارات (2 · 1 · 0)', 'options' => [['label_ar' => 'نعم', 'score_value' => 2], ['label_ar' => 'إلى حد ما', 'score_value' => 1], ['label_ar' => 'لا', 'score_value' => 0]]],
        'likert5' => ['label' => 'خماسي (تنطبق عليّ ...)', 'hint' => '5 اختيارات (5 ← 1)', 'options' => [
            ['label_ar' => 'تنطبق عليّ بدرجة كبيرة جدًا', 'score_value' => 5], ['label_ar' => 'تنطبق عليّ بدرجة كبيرة', 'score_value' => 4],
            ['label_ar' => 'تنطبق عليّ إلى حد ما', 'score_value' => 3], ['label_ar' => 'تنطبق عليّ قليلًا', 'score_value' => 2], ['label_ar' => 'لا تنطبق عليّ إطلاقًا', 'score_value' => 1],
        ]],
        'frequency' => ['label' => 'تكرار (دائمًا ... أبدًا)', 'hint' => '5 اختيارات (4 ← 0)', 'options' => [
            ['label_ar' => 'دائمًا', 'score_value' => 4], ['label_ar' => 'غالبًا', 'score_value' => 3], ['label_ar' => 'أحيانًا', 'score_value' => 2],
            ['label_ar' => 'نادرًا', 'score_value' => 1], ['label_ar' => 'أبدًا', 'score_value' => 0],
        ]],
    ];
    $presetOptions = array_map(fn ($p) => $p['options'], $presets);

    // بعد خطأ في التحقق: البيانات بترجع زي ما اتكتبت
    $options = old('options', $presets['yes_no']['options']);
    $dimensions = collect(old('dimensions', [['name_ar' => '', 'description_ar' => '', 'questions_raw' => '']]))
        ->map(fn ($d) => $d + ['questions_raw' => implode("\n", $d['questions'] ?? [])])->values()->all();
    $levels = old('levels', [
        ['title_ar' => 'منخفض', 'min' => '', 'max' => '', 'description' => ''],
        ['title_ar' => 'متوسط', 'min' => '', 'max' => '', 'description' => ''],
        ['title_ar' => 'مرتفع', 'min' => '', 'max' => '', 'description' => ''],
    ]);
    $categories = \App\Models\Assessment::query()->whereNotNull('category')->distinct()->orderBy('category')->pluck('category');
    $step = fn ($n, $title, $hint) => '<div class="d-flex align-items-start gap-3 mb-3"><span class="wizard-step">' . $n . '</span><div><h2 class="h6 m-0 fw-bold">' . e($title) . '</h2><div class="small text-muted">' . e($hint) . '</div></div></div>';
@endphp

@push('styles')
<style>
    .wizard-step { width: 2rem; height: 2rem; flex: 0 0 2rem; border-radius: 50%; background: var(--brand); color: #fff; display: inline-flex; align-items: center; justify-content: center; font-weight: 800; }
    .preset-card { cursor: pointer; border: 1.5px solid var(--line); border-radius: .75rem; padding: .75rem 1rem; height: 100%; transition: border-color .15s, background .15s; }
    .preset-card:hover { border-color: var(--brand-mid); }
    .btn-check:checked + .preset-card { border-color: var(--brand); background: #e6f1ec; }
    .dim-card { border: 1px solid var(--line); border-radius: .75rem; }
    .summary-card { position: sticky; top: 76px; }
    .q-count { font-variant-numeric: tabular-nums; }
</style>
@endpush

@section('content')
    <a href="{{ route('admin.assessments.index') }}" class="small text-decoration-none"><i class="bi bi-arrow-right"></i> المقاييس</a>
    <h1 class="h4 mt-1 mb-1">مقياس جديد</h1>
    <p class="text-muted small mb-4">اكتب المقياس كله هنا وهيتعمل مرة واحدة بمحاوره وأسئلته ونتائجه. بعدها تقدر تعدّل أي حاجة وتضيف الأوصاف والتوصيات من صفحة المقياس.</p>

    <form method="POST" action="{{ route('admin.assessments.store') }}" id="wizard" novalidate>
        @csrf
        <div class="row g-4">
            <div class="col-xl-8">

                {{-- 1. البيانات --}}
                <div class="card border-0 shadow-sm mb-4"><div class="card-body p-4">
                    {!! $step(1, 'بيانات المقياس', 'الاسم والتعريف اللي هيشوفهم المستخدم.') !!}
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label" for="title_ar">اسم المقياس *</label>
                            <input id="title_ar" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" required maxlength="255" value="{{ old('title_ar') }}" placeholder="مثال: مقياس الانضباط الذاتي">
                            @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="category">التصنيف</label>
                            <input id="category" name="category" class="form-control" list="categories" maxlength="255" value="{{ old('category') }}" placeholder="السلوك، الشخصية ...">
                            <datalist id="categories">@foreach ($categories as $c)<option value="{{ $c }}">@endforeach</datalist>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="description_ar">تعريف المقياس</label>
                            <textarea id="description_ar" name="description_ar" rows="3" class="form-control" placeholder="المقياس ده بيقيس إيه، وليه مهم">{{ old('description_ar') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="instructions_ar">تعليمات الإجابة</label>
                            <textarea id="instructions_ar" name="instructions_ar" rows="2" class="form-control" placeholder="مثال: لا توجد إجابات صحيحة أو خاطئة، اختر الأقرب لسلوكك المعتاد.">{{ old('instructions_ar') }}</textarea>
                        </div>
                    </div>

                    <a class="small d-inline-block mt-3 text-decoration-none" data-bs-toggle="collapse" href="#more-settings" role="button"><i class="bi bi-sliders"></i> إعدادات إضافية (اختيارية)</a>
                    <div class="collapse {{ $errors->hasAny(['code', 'time_limit_min', 'price']) ? 'show' : '' }}" id="more-settings">
                        <div class="row g-3 pt-3">
                            <div class="col-md-6">
                                <label class="form-label" for="subtitle_ar">عنوان فرعي</label>
                                <input id="subtitle_ar" name="subtitle_ar" class="form-control" maxlength="255" value="{{ old('subtitle_ar') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="code">كود المقياس</label>
                                <input id="code" name="code" class="form-control @error('code') is-invalid @enderror" dir="ltr" maxlength="60" pattern="[a-z0-9_]+" value="{{ old('code') }}" placeholder="بيتعمل تلقائي لو فاضي">
                                @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="time_limit_min">المدة (دقيقة)</label>
                                <input id="time_limit_min" type="number" min="1" name="time_limit_min" class="form-control" dir="ltr" value="{{ old('time_limit_min') }}">
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="price">السعر</label>
                                <input id="price" type="number" min="0" step="0.01" name="price" class="form-control" dir="ltr" value="{{ old('price', 0) }}">
                            </div>
                            <div class="col-md-6 d-flex align-items-end">
                                <div class="form-check form-switch mb-2">
                                    <input type="hidden" name="is_active" value="0">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" @checked(old('is_active'))>
                                    <label class="form-check-label" for="is_active">تفعيل المقياس فورًا</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>

                {{-- 2. الإجابات --}}
                <div class="card border-0 shadow-sm mb-4"><div class="card-body p-4">
                    {!! $step(2, 'طريقة الإجابة', 'الاختيارات اللي هتظهر تحت كل سؤال ودرجة كل اختيار. نفس الاختيارات لكل الأسئلة.') !!}
                    <div class="row g-2 mb-3">
                        @foreach ($presets as $key => $preset)
                            <div class="col-md-4">
                                <input type="radio" class="btn-check" name="preset" id="preset-{{ $key }}" value="{{ $key }}" @checked($loop->first && ! old('options'))>
                                <label class="preset-card d-block" for="preset-{{ $key }}">
                                    <div class="fw-bold small">{{ $preset['label'] }}</div>
                                    <div class="text-muted small">{{ $preset['hint'] }}</div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @include('dashboard.admin.assessments.partials.options-editor', ['options' => $options, 'presets' => []])
                    @error('options')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                </div></div>

                {{-- 3. المحاور والأسئلة --}}
                <div class="card border-0 shadow-sm mb-4"><div class="card-body p-4">
                    {!! $step(3, 'المحاور والأسئلة', 'كل محور بأسئلته، سطر لكل سؤال. المقياس اللي ليه محور واحد: اكتب محور واحد بنفس اسم المقياس.') !!}
                    <div id="dimensions">
                        @foreach ($dimensions as $i => $d)
                            @include('dashboard.admin.assessments.partials.wizard-dimension', ['i' => $i, 'd' => $d])
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="add-dimension"><i class="bi bi-plus-lg"></i> محور آخر</button>
                    @error('dimensions')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
                    <template id="dimension-template">@include('dashboard.admin.assessments.partials.wizard-dimension', ['i' => '__I__', 'd' => ['name_ar' => '', 'description_ar' => '', 'questions_raw' => '']])</template>
                </div></div>

                {{-- 4. النتائج --}}
                <div class="card border-0 shadow-sm mb-4"><div class="card-body p-4">
                    {!! $step(4, 'مستويات النتيجة', 'النتيجة بتتحدد من النطاق اللي الدرجة الكلية واقعة فيه. النطاقات بتتحسب تلقائي وتقدر تعدّلها.') !!}
                    <div class="row g-3 align-items-end mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="level_basis">النطاقات على</label>
                            <select id="level_basis" name="level_basis" class="form-select">
                                <option value="score" @selected(old('level_basis', 'score') === 'score')>الدرجة الكلية</option>
                                <option value="percent" @selected(old('level_basis') === 'percent')>النسبة المئوية (0 – 100)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="level-count">عدد المستويات</label>
                            <select id="level-count" class="form-select">
                                @foreach ([2, 3, 4, 5] as $n)<option value="{{ $n }}" @selected(count($levels) === $n)>{{ $n }}</option>@endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-secondary w-100" id="distribute"><i class="bi bi-distribute-horizontal"></i> توزيع النطاقات بالتساوي</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle mb-2">
                            <thead class="table-light"><tr><th style="width:28%">اسم المستوى</th><th style="width:13%">من</th><th style="width:13%">إلى</th><th>وصف مختصر (اختياري)</th></tr></thead>
                            <tbody id="levels">
                                @foreach ($levels as $i => $l)
                                    <tr>
                                        <td><input name="levels[{{ $i }}][title_ar]" class="form-control form-control-sm" value="{{ $l['title_ar'] ?? '' }}" required></td>
                                        <td><input type="number" name="levels[{{ $i }}][min]" class="form-control form-control-sm" dir="ltr" value="{{ $l['min'] ?? '' }}" required></td>
                                        <td><input type="number" name="levels[{{ $i }}][max]" class="form-control form-control-sm" dir="ltr" value="{{ $l['max'] ?? '' }}" required></td>
                                        <td><input name="levels[{{ $i }}][description]" class="form-control form-control-sm" value="{{ $l['description'] ?? '' }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @error('levels')<div class="alert alert-danger py-2 small">{{ $message }}</div>@enderror
                    <div class="small text-muted mb-3" id="range-hint"></div>

                    <div class="form-check" id="dimension-levels-wrap">
                        <input type="hidden" name="dimension_levels" value="0">
                        <input class="form-check-input" type="checkbox" name="dimension_levels" value="1" id="dimension_levels" @checked(old('dimension_levels'))>
                        <label class="form-check-label" for="dimension_levels">نفس المستويات لكل محور كمان (بنطاقات على درجة المحور)</label>
                    </div>
                </div></div>
            </div>

            {{-- الملخص --}}
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm summary-card"><div class="card-body p-4">
                    <h2 class="h6 fw-bold mb-3">ملخص المقياس</h2>
                    <dl class="row small mb-3">
                        <dt class="col-7 fw-normal text-muted">المحاور</dt><dd class="col-5 text-end fw-bold q-count" id="sum-dimensions">0</dd>
                        <dt class="col-7 fw-normal text-muted">الأسئلة</dt><dd class="col-5 text-end fw-bold q-count" id="sum-questions">0</dd>
                        <dt class="col-7 fw-normal text-muted">اختيارات الإجابة</dt><dd class="col-5 text-end fw-bold q-count" id="sum-options">0</dd>
                        <dt class="col-7 fw-normal text-muted">الدرجة الكلية</dt><dd class="col-5 text-end fw-bold q-count" id="sum-range" dir="ltr">—</dd>
                    </dl>
                    <ul class="list-unstyled small mb-4" id="checklist"></ul>
                    <button class="btn btn-brand w-100" type="submit"><i class="bi bi-check2-circle"></i> إنشاء المقياس</button>
                    <div class="form-text text-center mt-2">تقدر تعدّل كل حاجة بعد الإنشاء.</div>
                </div></div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
(function () {
    const presets = @json($presetOptions);
    const defaultTitles = { 2: ['منخفض', 'مرتفع'], 3: ['منخفض', 'متوسط', 'مرتفع'], 4: ['منخفض', 'متوسط', 'جيد', 'مرتفع'], 5: ['منخفض جدًا', 'منخفض', 'متوسط', 'مرتفع', 'مرتفع جدًا'] };
    const form = document.getElementById('wizard');
    const dims = document.getElementById('dimensions');
    const levelsBody = document.getElementById('levels');
    const $ = (id) => document.getElementById(id);

    const lines = (text) => text.split(/\r?\n/).map((l) => l.trim()).filter(Boolean);
    const optionScores = () => [...form.querySelectorAll('[data-options] [data-score]')].map((i) => parseInt(i.value, 10)).filter((n) => !isNaN(n));
    const questionCount = () => [...dims.querySelectorAll('textarea[data-questions]')].reduce((n, t) => n + lines(t.value).length, 0);
    const scoreRange = () => {
        if ($('level_basis').value === 'percent') return [0, 100];
        const s = optionScores(), q = questionCount();
        return s.length && q ? [Math.min(...s) * q, Math.max(...s) * q] : null;
    };

    // نطاقات متساوية من غير فجوات (نفس AssessmentManager::equalRanges)
    function equalRanges(min, max, n) {
        n = Math.max(1, Math.min(n, max - min + 1));
        const span = (max - min + 1) / n, out = [];
        for (let i = 0; i < n; i++) out.push([min + Math.round(i * span), i === n - 1 ? max : min + Math.round((i + 1) * span) - 1]);
        return out;
    }

    function levelRow(i, title) {
        const tr = document.createElement('tr');
        tr.innerHTML = `<td><input name="levels[${i}][title_ar]" class="form-control form-control-sm" required></td>
            <td><input type="number" name="levels[${i}][min]" class="form-control form-control-sm" dir="ltr" required></td>
            <td><input type="number" name="levels[${i}][max]" class="form-control form-control-sm" dir="ltr" required></td>
            <td><input name="levels[${i}][description]" class="form-control form-control-sm"></td>`;
        tr.querySelector('input').value = title;
        return tr;
    }

    function distribute() {
        const range = scoreRange();
        if (!range) return;
        const rows = [...levelsBody.rows];
        equalRanges(range[0], range[1], rows.length).forEach(([from, to], i) => {
            rows[i].querySelector('[name$="[min]"]').value = from;
            rows[i].querySelector('[name$="[max]"]').value = to;
        });
    }

    let touched = [...levelsBody.querySelectorAll('[name$="[min]"]')].some((i) => i.value !== '');
    function refresh() {
        const dimCards = dims.querySelectorAll('[data-dimension]');
        dimCards.forEach((card, i) => {
            card.querySelector('[data-number]').textContent = i + 1;
            card.querySelector('[data-q-count]').textContent = lines(card.querySelector('textarea[data-questions]').value).length;
            card.querySelector('[data-remove-dimension]').classList.toggle('d-none', dimCards.length === 1);
        });
        const range = scoreRange();
        $('sum-dimensions').textContent = dimCards.length;
        $('sum-questions').textContent = questionCount();
        $('sum-options').textContent = optionScores().length;
        $('sum-range').textContent = range ? `${range[0]} – ${range[1]}${$('level_basis').value === 'percent' ? '%' : ''}` : '—';
        $('range-hint').textContent = range ? `الدرجات الممكنة من ${range[0]} لـ ${range[1]}. لازم النطاقات تغطيها كلها من غير فجوات.` : 'اكتب الأسئلة والاختيارات الأول عشان النطاقات تتحسب.';
        $('dimension-levels-wrap').classList.toggle('d-none', dimCards.length < 2);
        if (!touched) distribute();

        const checks = [
            [form.title_ar.value.trim() !== '', 'اسم المقياس'],
            [optionScores().length >= 2, 'اختياران للإجابة على الأقل'],
            [questionCount() > 0 && [...dimCards].every((c) => c.querySelector('[data-name]').value.trim() && lines(c.querySelector('textarea[data-questions]').value).length), 'كل محور له اسم وأسئلة'],
            [[...levelsBody.querySelectorAll('[name$="[title_ar]"]')].every((i) => i.value.trim()), 'أسماء المستويات'],
        ];
        $('checklist').innerHTML = checks.map(([ok, label]) => `<li class="mb-1 ${ok ? 'text-success' : 'text-muted'}"><i class="bi ${ok ? 'bi-check-circle-fill' : 'bi-circle'}"></i> ${label}</li>`).join('');
    }

    // الاختيارات الجاهزة
    document.querySelectorAll('[name="preset"]').forEach((radio) => radio.addEventListener('change', () => {
        const editor = form.querySelector('[data-options]');
        editor.querySelector('[data-options-list]').innerHTML = '';
        presets[radio.value].forEach(() => editor.querySelector('[data-add-option]').click());
        editor.querySelectorAll('[data-option-row]').forEach((row, i) => {
            row.querySelector('[data-label]').value = presets[radio.value][i].label_ar;
            row.querySelector('[data-score]').value = presets[radio.value][i].score_value;
        });
        refresh();
    }));

    // المحاور
    let nextIndex = dims.querySelectorAll('[data-dimension]').length;
    $('add-dimension').addEventListener('click', () => {
        const html = $('dimension-template').innerHTML.replaceAll('__I__', nextIndex++);
        dims.insertAdjacentHTML('beforeend', html);
        dims.lastElementChild.querySelector('[data-name]').focus();
        refresh();
    });
    dims.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-remove-dimension]');
        if (btn && dims.querySelectorAll('[data-dimension]').length > 1) { btn.closest('[data-dimension]').remove(); refresh(); }
    });

    // المستويات
    $('level-count').addEventListener('change', (e) => {
        const n = parseInt(e.target.value, 10);
        levelsBody.innerHTML = '';
        defaultTitles[n].forEach((t, i) => levelsBody.appendChild(levelRow(i, t)));
        touched = false;
        refresh();
    });
    $('distribute').addEventListener('click', () => { touched = false; distribute(); });
    levelsBody.addEventListener('input', (e) => { if (e.target.type === 'number') touched = true; refresh(); });
    $('level_basis').addEventListener('change', () => { touched = false; refresh(); });

    form.addEventListener('input', refresh);
    form.addEventListener('click', (e) => { if (e.target.closest('[data-add-option],[data-remove-option]')) setTimeout(refresh); });
    refresh();
})();
</script>
@endpush
