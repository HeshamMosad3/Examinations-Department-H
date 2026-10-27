@extends('layouts.admin')

@section('title', 'المستخدمون')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h4 m-0">المستخدمون <span class="badge text-bg-light" dir="ltr">{{ $users->total() }}</span></h1>
    </div>

    <form class="row g-2 mb-3">
        <div class="col-12 col-md-5 col-lg-4"><input class="form-control" name="search" value="{{ request('search') }}" placeholder="ابحث بالاسم أو البريد أو الجوال أو الهوية"></div>
        <div class="col-6 col-lg-auto d-flex gap-2">
            <button class="btn btn-outline-secondary flex-fill"><i class="bi bi-search"></i> بحث</button>
            <a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}" aria-label="مسح"><i class="bi bi-x-lg"></i></a>
        </div>
    </form>

    <div class="card border-0 shadow-sm">
        @if ($users->isEmpty())
            <div class="text-center text-muted py-5"><i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>مفيش مستخدمين مطابقين.</div>
        @else
            <table class="table rtable align-middle mb-0">
                <thead><tr><th>المستخدم</th><th>الجوال</th><th>النتائج</th><th>آخر نتيجة</th><th>التسجيل</th><th></th></tr></thead>
                <tbody>
                    @foreach ($users as $u)
                        <tr>
                            <td data-label="المستخدم" class="fw-bold">{{ $u->name }}<div class="small text-muted fw-normal"><bdi>{{ $u->email }}</bdi></div></td>
                            <td data-label="الجوال"><bdi>{{ $u->phone ?: '—' }}</bdi></td>
                            <td data-label="النتائج" dir="ltr" class="text-end text-md-start">{{ $u->attempts_count }}</td>
                            <td data-label="آخر نتيجة" class="nw small">{{ $u->last_attempt_at ? \Illuminate\Support\Carbon::parse($u->last_attempt_at)->format('Y-m-d') : '—' }}</td>
                            <td data-label="التسجيل" class="nw small">{{ \Illuminate\Support\Carbon::parse($u->created_at)->format('Y-m-d') }}</td>
                            <td class="actions"><a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.users.show', $u->id) }}">تفاصيل</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="mt-3">{{ $users->links() }}</div>
@endsection
