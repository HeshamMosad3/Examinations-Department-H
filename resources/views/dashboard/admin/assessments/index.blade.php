@extends('layouts.admin')

@section('title', 'المقاييس')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h4 m-0">المقاييس <span class="badge text-bg-light" dir="ltr">{{ $assessments->count() }}</span></h1>
        <a class="btn btn-brand" href="{{ route('admin.assessments.create') }}"><i class="bi bi-plus-lg"></i> مقياس جديد</a>
    </div>

    <div class="card border-0 shadow-sm">
        @if ($assessments->isEmpty())
            <div class="text-center text-muted py-5"><i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>لسه مفيش مقاييس.</div>
        @else
            <table class="table rtable align-middle mb-0">
                <thead>
                    <tr><th>المقياس</th><th>التصنيف</th><th>طريقة الحساب</th><th>المحاور</th><th>الأسئلة</th><th>النتائج</th><th>الحالة</th><th></th></tr>
                </thead>
                <tbody>
                    @foreach ($assessments as $a)
                        <tr>
                            <td data-label="المقياس">
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <a href="{{ route('admin.assessments.show', $a->id) }}" class="fw-bold text-decoration-none">{{ $a->title_ar }}</a>
                                        <div class="small text-muted" dir="ltr">{{ $a->code }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="التصنيف">{{ $a->category ?: '—' }}</td>
                            <td data-label="طريقة الحساب" class="small">{{ \App\Models\Assessment::SCORING_TYPES[$a->scoring_type] ?? $a->scoring_type }}</td>
                            <td data-label="المحاور" dir="ltr" class="text-end text-md-start">{{ $a->dimensions_count }}</td>
                            <td data-label="الأسئلة" dir="ltr" class="text-end text-md-start">{{ $a->questions_count }}</td>
                            <td data-label="النتائج" dir="ltr" class="text-end text-md-start">{{ $a->attempts_count }}</td>
                            <td data-label="الحالة">
                                <form method="POST" action="{{ route('admin.assessments.toggle', $a->id) }}">
                                    @csrf
                                    <button class="badge border-0 {{ $a->is_active ? 'text-bg-success' : 'text-bg-secondary' }}" title="تغيير الحالة">{{ $a->is_active ? 'مفعّل' : 'موقوف' }}</button>
                                </form>
                            </td>
                            <td class="actions">
                                <div class="d-flex gap-1 justify-content-end">
                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.assessments.show', $a->id) }}"><i class="bi bi-sliders"></i> إدارة</a>
                                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.assessments.preview', $a->id) }}" title="تجربة المقياس"><i class="bi bi-play-circle"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
