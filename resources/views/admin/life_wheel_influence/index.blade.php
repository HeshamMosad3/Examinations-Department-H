@extends('layouts.admin')

@section('title', 'إدارة عجلة الحياة')

@push('styles')
<style>
    .lvl-weak { --lvl-bg: #f1f3f5; --lvl-fg: #495057; --lvl-bd: #ced4da; }
    .lvl-medium { --lvl-bg: #fff3cd; --lvl-fg: #7a5b00; --lvl-bd: #ffda6a; }
    .lvl-strong { --lvl-bg: #d1e7dd; --lvl-fg: #0f5132; --lvl-bd: #75b798; }
    .lvl-very_strong { --lvl-bg: #198754; --lvl-fg: #fff; --lvl-bd: #146c43; }
    .lvl-none { --lvl-bg: #fff; --lvl-fg: #adb5bd; --lvl-bd: #dee2e6; }
    .lvl-badge { background: var(--lvl-bg); color: var(--lvl-fg); border: 1px solid var(--lvl-bd); border-radius: 999px; padding: 4px 14px; font-weight: 600; font-size: .85rem; white-space: nowrap; }

    .range-track { position: relative; height: 10px; background: #e9ecef; border-radius: 999px; }
    .range-fill { position: absolute; top: 0; bottom: 0; border-radius: 999px; background: var(--lvl-bd); }
    .range-fill.lvl-very_strong { background: #198754; }

    .influence-table { min-width: 940px; }
    .influence-table th, .influence-table td { text-align: center; vertical-align: middle; padding: 6px; }
    .influence-table thead th { background: #212529; color: #fff; font-weight: 600; white-space: nowrap; }
    .influence-table tbody th { background: #f8f9fa; font-weight: 700; white-space: nowrap; }
    .influence-table .diag { background: #f1f3f5; color: #adb5bd; font-weight: 700; }
    .cell-select { background-color: var(--lvl-bg); color: var(--lvl-fg); border-color: var(--lvl-bd); font-weight: 600; font-size: .85rem; min-width: 100px; cursor: pointer; transition: background-color .15s, color .15s; }
    .cell-select:focus { box-shadow: 0 0 0 .2rem rgba(27,87,67,.2); }
    .cell-select option { background: #fff; color: #212529; }

    .save-bar { position: sticky; bottom: 0; z-index: 5; background: rgba(255,255,255,.96); border-top: 1px solid #dee2e6; backdrop-filter: blur(4px); }
</style>
@endpush

@section('content')
@php
    $levelInput = fn ($level, $field) => old("levels.{$level->key}.{$field}", $field === 'min' ? $level->min_percent : $level->max_percent);
@endphp
<form method="POST" action="{{ route('admin.life-wheel-influence.update') }}" id="influence-form">
    @csrf
    @method('PUT')

    <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
        <div>
            <h1 class="h4 mb-1">إدارة عجلة الحياة</h1>
            <p class="text-muted small mb-0" style="max-width: 760px">
                العجلة اللي في الصفحة الرئيسية بتحاكي سنين من حياة شخص: كل جانب بيكبر بيجر معاه الجوانب المرتبطة بيه بنسبة من نموه
                جوه نطاق المستوى اللي في الجدول ده (صف الجانب اللي بيكبر). مدة الحركة والمستوى الحالي والنهاية بتتظبط من
                <a href="#journey">إعدادات حركة العجلة</a> تحت.
            </p>
        </div>
    </div>

    {{-- مستويات التأثير --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 fw-bold">مستويات التأثير</h6>
            <small class="text-muted">لو زاد جانب، الجانب المتأثر بيتغير بنسبة عشوائية من التغيير ده جوه نطاق المستوى.</small>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" style="width: 160px">المستوى</th>
                            <th style="width: 150px">من (%)</th>
                            <th style="width: 150px">إلى (%)</th>
                            <th>النطاق</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($levels as $level)
                            <tr data-level-row="{{ $level->key }}">
                                <td class="ps-4"><span class="lvl-badge lvl-{{ $level->key }}">{{ $level->name_ar }}</span></td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="number" min="0" max="100" step="1" required class="form-control @error("levels.{$level->key}.min") is-invalid @enderror" name="levels[{{ $level->key }}][min]" value="{{ $levelInput($level, 'min') }}" data-level-min="{{ $level->key }}" aria-label="أقل نسبة لمستوى {{ $level->name_ar }}">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="number" min="0" max="100" step="1" required class="form-control" name="levels[{{ $level->key }}][max]" value="{{ $levelInput($level, 'max') }}" data-level-max="{{ $level->key }}" aria-label="أعلى نسبة لمستوى {{ $level->name_ar }}">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </td>
                                <td class="pe-4">
                                    <div class="range-track" aria-hidden="true"><div class="range-fill lvl-{{ $level->key }}" data-level-bar="{{ $level->key }}"></div></div>
                                    <div class="small text-muted mt-1" data-level-text="{{ $level->key }}"></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- جدول التأثير --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h6 class="m-0 fw-bold">جدول التأثير بين الجوانب</h6>
                <small class="text-muted">الصف = الجانب اللي زاد، والعمود = الجانب اللي بيتأثر بيه.</small>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                @foreach($levels as $level)<span class="lvl-badge lvl-{{ $level->key }}" data-level-legend="{{ $level->key }}">{{ $level->name_ar }}</span>@endforeach
                <span class="lvl-badge lvl-none">لا تأثير</span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered influence-table mb-0">
                    <thead>
                        <tr>
                            <th>لو زاد محور <i class="bi bi-arrow-down"></i></th>
                            @foreach($axes as $label)<th>{{ $label }}</th>@endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($axes as $source => $sourceLabel)
                            <tr>
                                <th scope="row">{{ $sourceLabel }}</th>
                                @foreach($axes as $target => $targetLabel)
                                    @if($source === $target)
                                        <td class="diag" aria-label="{{ $sourceLabel }} مع نفسه">—</td>
                                    @else
                                        @php $current = old("matrix.$source.$target", $matrix[$source][$target]); @endphp
                                        <td>
                                            <select name="matrix[{{ $source }}][{{ $target }}]" class="form-select form-select-sm cell-select lvl-{{ $current ?: 'none' }}" aria-label="تأثير زيادة {{ $sourceLabel }} على {{ $targetLabel }}">
                                                <option value="" @selected(!$current)>لا تأثير</option>
                                                @foreach($levels as $level)
                                                    <option value="{{ $level->key }}" data-level-option="{{ $level->key }}" @selected($current === $level->key)>{{ $level->name_ar }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="save-bar d-flex justify-content-between align-items-center px-3 py-3 rounded-3 shadow-sm">
        <small class="text-muted"><i class="bi bi-info-circle me-1"></i>التغييرات بتظهر في عجلة الصفحة الرئيسية من أول زيارة بعد الحفظ.</small>
        <button type="submit" class="btn btn-brand px-4"><i class="bi bi-save me-1"></i>حفظ التعديلات</button>
    </div>
</form>

{{-- ======================= حركة العجلة في الصفحة الرئيسية ======================= --}}
@php
    $j = $journey;
    $jv = fn ($key, $default = null) => old($key, data_get($j, $key, $default));
    $axisKeys = array_keys($axes);
    $startValues = array_values($j['start_values']);
    $priority = old('priority_axes', $j['priority_axes'] ?? []);
@endphp
<form method="POST" action="{{ route('admin.life-wheel-influence.journey') }}" id="journey" class="mt-4">
    @csrf
    @method('PUT')

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div>
                <h6 class="m-0 fw-bold">حركة العجلة في الصفحة الرئيسية</h6>
                <small class="text-muted">
                    العجلة بتبدأ من «المستوى الحالي» وبتحاكي سنين من حياة شخص بحركة سلسة متصلة: جوانب بتنمو، وجوانب بتتراجع شوية، وفي الآخر
                    كل الجوانب بتقفل جوه نطاق النهاية. النمو والتأثير بين الجوانب بيمشوا على جدول التأثير اللي فوق.
                </small>
            </div>
            <div class="form-check form-switch fs-6 m-0">
                <input type="hidden" name="enabled" value="0">
                <input class="form-check-input" type="checkbox" role="switch" id="journey-enabled" name="enabled" value="1" @checked((bool) $jv('enabled', true))>
                <label class="form-check-label fw-semibold" for="journey-enabled">تفعيل المحاكاة</label>
                <div class="small text-muted">لو اتقفلت العجلة بترجع للحركة القديمة</div>
            </div>
        </div>

        <div class="card-body">
            @if ($errors->hasAny(['duration_seconds', 'years', 'start_mode', 'start_min', 'start_max', 'start_values.*', 'final_min', 'final_max', 'setback_level', 'priority_axes.*']))
                <div class="alert alert-danger py-2 small">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-4">
                {{-- المدة والسنين --}}
                <div class="col-lg-4">
                    <label class="form-label fw-semibold" for="journey-duration">مدة الحركة كلها (بالثواني)</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="journey-duration" name="duration_seconds" min="3" max="20" step="1" required value="{{ $jv('duration_seconds', 7) }}">
                        <span class="input-group-text">ثانية</span>
                    </div>
                    <div class="form-text">من 3 لـ 20. كل ما زادت المدة الحركة بتبقى أهدى وأنعم (الافتراضي 7).</div>
                </div>
                <div class="col-lg-4">
                    <label class="form-label fw-semibold" for="journey-years">عدد السنين اللي بتتحاكى</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="journey-years" name="years" min="3" max="8" step="1" required value="{{ $jv('years', 5) }}">
                        <span class="input-group-text">سنين</span>
                    </div>
                    <div class="form-text">من 3 لـ 8. السنين بتتوزع على المدة، وكل سنة فيها جوانب في الصدارة.</div>
                </div>
                <div class="col-lg-4">
                    <label class="form-label fw-semibold" for="journey-setback">شدة التراجع في الطريق</label>
                    <select class="form-select" id="journey-setback" name="setback_level">
                        @foreach ($setbackLevels as $level => $label)
                            <option value="{{ $level }}" @selected((int) $jv('setback_level', 2) === $level)>{{ $label }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">تراجع جوانب مشغولة عنها الاهتمام، وإرهاق جانب بعد نجاحه ثم تعافيه.</div>
                </div>

                {{-- المستوى الحالي --}}
                <div class="col-12">
                    <hr class="my-0">
                </div>
                <div class="col-lg-5">
                    <div class="fw-semibold mb-2">المستوى الحالي (نقطة البداية)</div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="start_mode" id="journey-start-random" value="random" @checked($jv('start_mode', 'random') === 'random')>
                        <label class="form-check-label" for="journey-start-random">عشوائي في كل زيارة (جوه نطاق)</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="start_mode" id="journey-start-fixed" value="fixed" @checked($jv('start_mode', 'random') === 'fixed')>
                        <label class="form-check-label" for="journey-start-fixed">ثابت لكل جانب (القيم على اليمين)</label>
                    </div>
                    <div class="row g-2" data-start-random>
                        <div class="col-6">
                            <label class="form-label small mb-1" for="journey-start-min">من (%)</label>
                            <input type="number" class="form-control" id="journey-start-min" name="start_min" min="5" max="100" step="1" required value="{{ $jv('start_min', 30) }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label small mb-1" for="journey-start-max">إلى (%)</label>
                            <input type="number" class="form-control" id="journey-start-max" name="start_max" min="5" max="100" step="1" required value="{{ $jv('start_max', 60) }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-start-fixed>
                    <div class="row g-2">
                        @foreach ($axes as $key => $label)
                            <div class="col-6 col-md-3">
                                <label class="form-label small mb-1" for="journey-start-{{ $key }}">{{ $label }}</label>
                                <div class="input-group input-group-sm">
                                    <input type="number" class="form-control" id="journey-start-{{ $key }}" name="start_values[{{ $key }}]" min="5" max="100" step="1" required value="{{ old("start_values.$key", $startValues[$loop->index] ?? 50) }}">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- النهاية --}}
                <div class="col-12">
                    <hr class="my-0">
                </div>
                <div class="col-lg-5">
                    <div class="fw-semibold mb-2">نطاق النهاية (كل الجوانب بتقفل جواه)</div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label small mb-1" for="journey-final-min">من (%)</label>
                            <input type="number" class="form-control" id="journey-final-min" name="final_min" min="20" max="100" step="1" required value="{{ $jv('final_min', 75) }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label small mb-1" for="journey-final-max">إلى (%)</label>
                            <input type="number" class="form-control" id="journey-final-max" name="final_max" min="20" max="100" step="1" required value="{{ $jv('final_max', 95) }}">
                        </div>
                    </div>
                    <div class="form-text">كل ما النطاق أضيق العجلة بتبقى أقرب لدايرة كاملة.</div>
                </div>
                <div class="col-lg-7">
                    <div class="fw-semibold mb-2">الجوانب اللي غالبًا بتنمو الأول</div>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($axes as $key => $label)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="priority_axes[]" id="journey-priority-{{ $key }}" value="{{ $key }}" @checked(in_array($key, (array) $priority, true))>
                                <label class="form-check-label" for="journey-priority-{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-text">دي بتتقدم في أول السنين، والباقي بيلحق بيها بعد كده. سيبها فاضية لو عايزها عشوائية.</div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between align-items-center py-3">
            <small class="text-muted">التعديل بيظهر في الصفحة الرئيسية وصفحة «اكتشف عجلة الحياة» بعد الحفظ.</small>
            <button type="submit" class="btn btn-success px-4"><i class="bi bi-check2-circle me-1"></i> حفظ إعدادات الحركة</button>
        </div>
    </div>
</form>

@push('scripts')
<script>
(function () {
    const radios = document.querySelectorAll('input[name="start_mode"]');
    const randomBox = document.querySelector('[data-start-random]');
    const fixedBox = document.querySelector('[data-start-fixed]');
    function syncStartMode() {
        const fixed = document.getElementById('journey-start-fixed').checked;
        fixedBox.style.opacity = fixed ? '1' : '.45';
        randomBox.style.opacity = fixed ? '.45' : '1';
    }
    radios.forEach((radio) => radio.addEventListener('change', syncStartMode));
    syncStartMode();
})();
</script>
@endpush
@endsection

@push('scripts')
<script>
(function () {
    const levelNames = @json($levels->pluck('name_ar', 'key'));

    // يحدّث شريط النطاق ونص كل مستوى، ودليل الألوان فوق الجدول (مثلاً: قوي 51–75%)
    function refreshLevels() {
        Object.keys(levelNames).forEach((key) => {
            const min = parseInt(document.querySelector(`[data-level-min="${key}"]`).value, 10);
            const max = parseInt(document.querySelector(`[data-level-max="${key}"]`).value, 10);
            const valid = !isNaN(min) && !isNaN(max) && min <= max;
            const bar = document.querySelector(`[data-level-bar="${key}"]`);
            const text = document.querySelector(`[data-level-text="${key}"]`);
            if (valid) {
                bar.style.right = `${Math.max(0, min)}%`;
                bar.style.width = `${Math.max(1, Math.min(100, max) - Math.max(0, min))}%`;
                text.textContent = `من ${min}% إلى ${max}% من التغيير`;
                text.classList.remove('text-danger');
            } else {
                bar.style.width = '0';
                text.textContent = 'أقل نسبة لازم تكون أصغر من أو تساوي أعلى نسبة';
                text.classList.add('text-danger');
            }
            document.querySelector(`[data-level-legend="${key}"]`).textContent = valid ? `${levelNames[key]} ${min}–${max}%` : levelNames[key];
        });
    }

    document.querySelectorAll('[data-level-min], [data-level-max]').forEach((input) => input.addEventListener('input', refreshLevels));

    // لون الخلية على حسب المستوى المختار
    document.querySelectorAll('.cell-select').forEach((select) => {
        select.addEventListener('change', () => {
            select.className = select.className.replace(/\blvl-\S+/g, '').trim() + ` lvl-${select.value || 'none'}`;
        });
    });

    refreshLevels();
})();
</script>
@endpush
