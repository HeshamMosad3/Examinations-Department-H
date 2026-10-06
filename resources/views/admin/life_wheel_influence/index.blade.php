@extends('layouts.admin')

@section('title', 'تأثير عجلة الحياة')
@section('page-title', 'تأثير جوانب عجلة الحياة')

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
    .cell-select:focus { box-shadow: 0 0 0 .2rem rgba(13,110,253,.2); }
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
            <h4 class="mb-1 fw-bold"><i class="bi bi-diagram-3 me-2"></i>تأثير جوانب عجلة الحياة</h4>
            <p class="text-muted small mb-0" style="max-width: 760px">
                العجلة اللي في الصفحة الرئيسية بتعرض حياة شخص عشوائي في حوالي 5 ثواني: جوانب بتتطور وجوانب بتتراجع،
                وكل تغيير بينتقل لباقي الجوانب حسب الجدول ده. في كل مرة النظام بيختار نسبة عشوائية جوه نطاق المستوى.
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm rounded-3">
            <ul class="mb-0 ps-3">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

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
        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i>حفظ التعديلات</button>
    </div>
</form>
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
