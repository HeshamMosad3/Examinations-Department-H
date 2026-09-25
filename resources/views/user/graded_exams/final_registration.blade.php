@extends('layouts.user')
@section('title', 'التسجيل في الاختبار النهائي')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom p-4 text-center">
                    <h4 class="mb-0 fw-bold text-darkblue">التسجيل في الاختبار النهائي</h4>
                    <p class="text-muted mb-0 mt-2">شهادة {{ $exam->title_ar }}</p>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h6 class="fw-bold text-muted mb-3">بيانات المتدرب للتأكيد:</h6>
                        <ul class="list-group list-group-flush border rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="text-muted"><i class="bi bi-person me-2"></i> الاسم الكامل:</span>
                                <span class="fw-bold">{{ $user->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="text-muted"><i class="bi bi-envelope me-2"></i> البريد الإلكتروني:</span>
                                <span class="fw-bold">{{ $user->email }}</span>
                            </li>
                            @if($user->phone)
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="text-muted"><i class="bi bi-telephone me-2"></i> رقم الهاتف:</span>
                                <span class="fw-bold" dir="ltr">{{ $user->phone }}</span>
                            </li>
                            @endif
                        </ul>
                    </div>

                    <div class="mb-4">
                        <div class="alert alert-info border-0 bg-light d-flex align-items-center" role="alert">
                            <i class="bi bi-info-circle-fill fs-4 text-primary me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-1">رسوم الاختبار النهائي</h6>
                                <p class="mb-0">رسوم التسجيل في الاختبار النهائي لشهادة {{ $exam->title_ar }} هي <strong class="fs-5 text-primary">500 ريال</strong>.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary rounded-pill py-3 fw-bold fs-6" onclick="alert('سيتم توجيهك الآن إلى بوابة الدفع الإلكتروني (في مرحلة التطوير)')">
                            إتمام التسجيل والانتقال للدفع <i class="bi bi-credit-card ms-2"></i>
                        </button>
                        <a href="{{ route('user.graded_exams.index') }}" class="btn btn-outline-secondary rounded-pill py-2 mt-2">
                            العودة للقائمة
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
