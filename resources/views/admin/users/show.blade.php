@extends('layouts.admin')

@section('title', $user->name)

@section('content')
    <a href="{{ route('admin.users.index') }}" class="small text-decoration-none"><i class="bi bi-arrow-right"></i> المستخدمون</a>
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mt-1 mb-3">
        <h1 class="h4 m-0">{{ $user->name }} <span class="badge text-bg-light fs-6 fw-normal">مستخدم</span></h1>
        @if (true)
            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" data-confirm="هيتحذف المستخدم وكل نتائجه نهائيًا. متأكد؟">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger"><i class="bi bi-trash"></i> حذف المستخدم</button>
            </form>
        @endif
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm"><div class="card-body">
                <dl class="row mb-0 small">
                    @foreach ([
                        'البريد' => $user->email, 'الجوال' => $user->phone, 'رقم الهوية' => $user->national_id,
                        'النوع' => ['male' => 'ذكر', 'female' => 'أنثى'][$user->gender] ?? null,
                        'المؤهل' => $user->qualification, 'الجنسية' => $user->nationality, 'تاريخ التسجيل' => $user->created_at?->format('Y-m-d'),
                    ] as $label => $value)
                        <dt class="col-5 text-muted fw-normal">{{ $label }}</dt><dd class="col-7"><bdi>{{ $value ?: '—' }}</bdi></dd>
                    @endforeach
                </dl>
            </div></div>
        </div>

        <div class="col-lg-8">
            <h2 class="h6 mb-2">النتائج <span class="badge text-bg-light" dir="ltr">{{ $attempts->count() }}</span></h2>
            <div class="card border-0 shadow-sm">
                @if ($attempts->isEmpty())
                    <div class="text-center text-muted py-5"><i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>المستخدم ده ماخدش أي مقياس لسه.</div>
                @else
                    <table class="table rtable align-middle mb-0">
                        <thead><tr><th>المقياس</th><th>الدرجة</th><th>المستوى</th><th>التاريخ</th><th></th></tr></thead>
                        <tbody>
                            @foreach ($attempts as $a)
                                <tr>
                                    <td data-label="المقياس" class="fw-bold">{{ $a->assessment_title }}</td>
                                    <td data-label="الدرجة" class="nw" dir="ltr">{{ $a->total_score }} / {{ $a->max_score }} ({{ $a->percent }}%)</td>
                                    <td data-label="المستوى">{{ $a->level_title ?? '—' }}</td>
                                    <td data-label="التاريخ" class="nw small">{{ \Illuminate\Support\Carbon::parse($a->completed_at)->format('Y-m-d H:i') }}</td>
                                    <td class="actions"><a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.attempts.show', $a->id) }}">التفاصيل</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
