@extends('layouts.admin')

@section('title', 'نتيجة ' . $attempt->user_name)

@section('content')
    <a href="{{ route('admin.users.show', $attempt->user_id) }}" class="small text-decoration-none"><i class="bi bi-arrow-right"></i> {{ $attempt->user_name }}</a>
    <h1 class="h4 mt-1 mb-3">{{ $attempt->assessment_title }}</h1>

    <div class="card border-0 shadow-sm mb-4"><div class="card-body p-4 d-flex flex-wrap align-items-center gap-4">
        <div class="text-center">
            <div class="display-6 fw-bold text-brand" dir="ltr">{{ $attempt->total_score }} <span class="fs-5 text-muted">/ {{ $attempt->max_score }}</span></div>
            <div class="small text-muted" dir="ltr">{{ $attempt->percent }}%</div>
        </div>
        <div class="min-w-0 flex-grow-1">
            <div class="h5 mb-1">{{ $attempt->level_title ?? 'من غير مستوى كلي' }}</div>
            @if ($attempt->level_summary)<div>{{ $attempt->level_summary }}</div>@endif
            @if ($attempt->level_description)<div class="small text-muted mt-1 pre-line">{{ $attempt->level_description }}</div>@endif
            <div class="small text-muted mt-2"><i class="bi bi-clock"></i> {{ \Illuminate\Support\Carbon::parse($attempt->completed_at)->format('Y-m-d H:i') }}</div>
        </div>
    </div></div>

    <h2 class="h6 mb-2">درجات المحاور</h2>
    <div class="card border-0 shadow-sm">
        <table class="table rtable align-middle mb-0">
            <thead><tr><th>المحور</th><th style="width:35%">الدرجة</th><th>المستوى</th></tr></thead>
            <tbody>
                @foreach ($scores->whereNull('parent_id') as $root)
                    <tr class="table-light">
                        <td data-label="المحور" class="fw-bold">{{ $root->name_ar }}</td>
                        <td data-label="الدرجة"><div class="d-flex align-items-center gap-2"><div class="progress flex-grow-1" style="height:8px"><div class="progress-bar" style="width: {{ $root->percent }}%"></div></div><span class="small nw" dir="ltr">{{ $root->score }} / {{ $root->max_score }}</span></div></td>
                        <td data-label="المستوى">{{ $root->level_title ?? '—' }}</td>
                    </tr>
                    @foreach ($scores->where('parent_id', $root->dimension_id) as $sub)
                        <tr>
                            <td data-label="المحور الفرعي" class="ps-4 small">{{ $sub->name_ar }}</td>
                            <td data-label="الدرجة"><div class="d-flex align-items-center gap-2"><div class="progress flex-grow-1" style="height:6px"><div class="progress-bar" style="width: {{ $sub->percent }}%"></div></div><span class="small nw" dir="ltr">{{ $sub->score }} / {{ $sub->max_score }}</span></div></td>
                            <td data-label="المستوى" class="small">{{ $sub->level_title ?? '—' }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
