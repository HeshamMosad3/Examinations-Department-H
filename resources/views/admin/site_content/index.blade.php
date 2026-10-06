@extends('layouts.admin')

@section('title', 'محتوى الصفحات')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
        <h1 class="h4 m-0">محتوى الصفحات</h1>
    </div>
    <p class="text-muted small mb-4">كل نص وصورة ورابط في صفحات الموقع، لحد الفوتر. التعديل بيغيّر المحتوى بس، والتصميم بيفضل زي ما هو.
        محتوى المقاييس نفسه (الأسئلة والنتائج والتوصيات) بيتعدل من <a href="{{ route('admin.assessments.index') }}">المقاييس</a>.</p>

    <div class="row g-3">
        @foreach ($pages as $page)
            <div class="col-md-6 col-xl-4">
                <a href="{{ route('admin.site-content.edit', $page['key']) }}" class="card border-0 shadow-sm h-100 text-decoration-none text-reset">
                    <div class="card-body d-flex align-items-center gap-3">
                        <span class="stat-icon rounded-3 bg-brand-subtle text-brand d-inline-flex align-items-center justify-content-center"><i class="bi {{ $page['icon'] }} fs-4"></i></span>
                        <div class="min-w-0">
                            <div class="fw-bold">{{ $page['label'] }}</div>
                            <div class="small text-muted">{{ $page['sections'] }} قسم · {{ $page['fields'] }} حقل</div>
                        </div>
                        @if ($page['changed'])
                            <span class="badge text-bg-warning ms-auto">{{ $page['changed'] }} معدّل</span>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
