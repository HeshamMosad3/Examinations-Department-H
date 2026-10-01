@extends('layouts.admin')
@section('title', 'لوحة الإدارة')
@section('page-title', 'لوحة الإدارة')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-people text-primary fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold">{{ $totalUsers }}</div>
                    <div class="text-muted small">إجمالي المستخدمين</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="bg-success bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-clipboard-check text-success fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold">{{ $todaySessions }}</div>
                    <div class="text-muted small">اختبارات اليوم</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-stars text-warning fs-4"></i>
                </div>
                <div>
                    <div class="fs-5 fw-bold text-truncate" style="max-width:130px">
                        {{ $mostUsedAssessment?->title_ar ?? '—' }}
                    </div>
                    <div class="text-muted small">الأكثر استخداماً</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <div class="bg-info bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-bar-chart text-info fs-4"></i>
                </div>
                <div>
                    <div class="fs-3 fw-bold">{{ round($avgScore ?? 0, 1) }}</div>
                    <div class="text-muted small">متوسط الدرجات</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-transparent border-0 py-3">
        <h6 class="mb-0 fw-semibold"><i class="bi bi-clock-history me-2 text-muted"></i>آخر الجلسات المكتملة</h6>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>المستخدم</th>
                    <th>المقياس</th>
                    <th>وقت الإتمام</th>
                    <th>الدرجة</th>
                    <th>المستوى</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentSessions as $session)
                <tr>
                    <td>
                        <div class="fw-medium">{{ $session->user?->name ?? 'مستخدم محذوف' }}</div>
                        <div class="text-muted small">{{ $session->user?->email ?? '-' }}</div>
                    </td>
                    <td>{{ $session->assessment?->title_ar ?? 'مقياس محذوف' }}</td>
                    <td class="text-muted small">{{ $session->completed_at?->format('Y/m/d H:i') }}</td>
                    <td>
                        @if($session->result)
                            {{ $session->result->total_score }}/{{ $session->result->max_possible_score }}
                        @else — @endif
                    </td>
                    <td>
                        @if($session->result)
                            @php $lc = match($session->result->level) { 'high'=>'success','medium'=>'warning',default=>'danger' }; @endphp
                            @php $ll = match($session->result->level) { 'high'=>'مرتفع','medium'=>'متوسط',default=>'منخفض' }; @endphp
                            <span class="badge bg-{{ $lc }}-subtle text-{{ $lc }} border border-{{ $lc }}-subtle">{{ $ll }}</span>
                        @else — @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">لا توجد جلسات بعد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
