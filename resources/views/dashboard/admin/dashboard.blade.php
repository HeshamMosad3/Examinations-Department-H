@extends('layouts.admin')

@section('title', 'الرئيسية')

@section('content')
    @php
        $tiles = [
            ['label' => 'المقاييس', 'value' => $stats['assessments'], 'icon' => 'bi-ui-checks-grid', 'tone' => 'success'],
            ['label' => 'مقاييس مفعّلة', 'value' => $stats['active'], 'icon' => 'bi-toggle-on', 'tone' => 'primary'],
            ['label' => 'المستخدمون', 'value' => $stats['users'], 'icon' => 'bi-people', 'tone' => 'warning'],
            ['label' => 'نتائج محفوظة', 'value' => $stats['attempts'], 'icon' => 'bi-clipboard-data', 'tone' => 'info'],
        ];
    @endphp

    <h1 class="h4 mb-3">الرئيسية</h1>

    <div class="row g-3 mb-4">
        @foreach ($tiles as $tile)
            <div class="col-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100"><div class="card-body d-flex align-items-center gap-3">
                    <span class="stat-icon rounded-3 bg-{{ $tile['tone'] }}-subtle text-{{ $tile['tone'] }}-emphasis d-inline-flex align-items-center justify-content-center"><i class="bi {{ $tile['icon'] }} fs-4"></i></span>
                    <div><div class="text-muted small">{{ $tile['label'] }}</div><div class="fs-4 fw-bold" dir="ltr">{{ number_format($tile['value']) }}</div></div>
                </div></div>
            </div>
        @endforeach
    </div>

    <div class="row g-4">
        <div class="col-xl-7">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h2 class="h6 m-0">المقاييس</h2>
                <a href="{{ route('admin.assessments.index') }}" class="small">كل المقاييس</a>
            </div>
            <div class="card border-0 shadow-sm">
                <table class="table rtable align-middle mb-0">
                    <thead><tr><th>المقياس</th><th>الأسئلة</th><th>النتائج</th><th>الحالة</th></tr></thead>
                    <tbody>
                        @foreach ($assessments as $a)
                            <tr>
                                <td data-label="المقياس"><a href="{{ route('admin.assessments.show', $a->id) }}" class="fw-bold text-decoration-none">{{ $a->title_ar }}</a></td>
                                <td data-label="الأسئلة" dir="ltr" class="text-end text-md-start">{{ $a->questions_count }}</td>
                                <td data-label="النتائج" dir="ltr" class="text-end text-md-start">{{ $a->attempts_count }}</td>
                                <td data-label="الحالة"><span class="badge {{ $a->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">{{ $a->is_active ? 'مفعّل' : 'موقوف' }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-xl-5">
            <h2 class="h6 mb-2">أحدث النتائج</h2>
            <div class="card border-0 shadow-sm">
                @forelse ($recent as $attempt)
                    <a href="{{ route('admin.attempts.show', $attempt->id) }}" class="d-flex align-items-center gap-3 p-3 border-bottom text-decoration-none text-reset">
                        <span class="stat-icon rounded-circle bg-brand-subtle text-brand d-inline-flex align-items-center justify-content-center fw-bold" dir="ltr">{{ $attempt->percent }}%</span>
                        <div class="min-w-0">
                            <div class="fw-bold text-truncate">{{ $attempt->user_name }}</div>
                            <div class="small text-muted text-truncate">{{ $attempt->assessment_title }}@if ($attempt->level_title) · {{ $attempt->level_title }}@endif</div>
                        </div>
                        <span class="small text-muted ms-auto nw">{{ \Illuminate\Support\Carbon::parse($attempt->completed_at)->diffForHumans() }}</span>
                    </a>
                @empty
                    <div class="text-center text-muted py-5"><i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>لسه مفيش نتائج محفوظة.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
