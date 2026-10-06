@extends('layouts.admin')

@php $editing = $assessment->exists; @endphp
@section('title', $editing ? 'تعديل المقياس' : 'مقياس جديد')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h1 class="h4 m-0">{{ $editing ? 'تعديل: ' . $assessment->title_ar : 'مقياس جديد' }}</h1>
        <a class="btn btn-outline-secondary" href="{{ $editing ? route('admin.assessments.show', $assessment) : route('admin.assessments.index') }}"><i class="bi bi-arrow-right"></i> رجوع</a>
    </div>

    <form method="POST" enctype="multipart/form-data" action="{{ $editing ? route('admin.assessments.update', $assessment) : route('admin.assessments.store') }}">
        @csrf
        @if ($editing) @method('PUT') @endif

        <div class="row g-4">
            <div class="col-xl-8">
                <div class="card border-0 shadow-sm mb-4"><div class="card-body p-4">
                    <h2 class="h6 mb-3">بيانات المقياس</h2>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">اسم المقياس *</label>
                            <input name="title_ar" class="form-control" required maxlength="255" value="{{ old('title_ar', $assessment->title_ar) }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">التصنيف</label>
                            <input name="category" class="form-control" maxlength="255" value="{{ old('category', $assessment->category) }}" placeholder="السلوك، الشخصية ...">
                        </div>
                        <div class="col-12">
                            <label class="form-label">عنوان فرعي</label>
                            <input name="subtitle_ar" class="form-control" maxlength="255" value="{{ old('subtitle_ar', $assessment->subtitle_ar) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">تعريف المقياس</label>
                            <textarea name="description_ar" rows="4" class="form-control">{{ old('description_ar', $assessment->description_ar) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">تعليمات الإجابة</label>
                            <textarea name="instructions_ar" rows="3" class="form-control">{{ old('instructions_ar', $assessment->instructions_ar) }}</textarea>
                        </div>
                    </div>
                </div></div>

                <div class="card border-0 shadow-sm"><div class="card-body p-4">
                    <h2 class="h6 mb-3">طريقة حساب النتيجة</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">طريقة الحساب *</label>
                            <select name="scoring_type" class="form-select" required>
                                @foreach (\App\Models\Assessment::SCORING_TYPES as $value => $label)
                                    <option value="{{ $value }}" @selected(old('scoring_type', $assessment->scoring_type) === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            <div class="form-text">«النمط الغالب»: كود كل محور رئيسي هو كود المستوى، ومعاه <span dir="ltr">balanced</span> و<span dir="ltr">dual_a_b</span>.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">المستويات بتتحسب على *</label>
                            <select name="level_basis" class="form-select" required>
                                @foreach (\App\Models\Assessment::LEVEL_BASES as $value => $label)
                                    <option value="{{ $value }}" @selected(old('level_basis', $assessment->level_basis) === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            <div class="form-text">لو «النسبة المئوية»: نطاقات المستويات من 0 لـ 100.</div>
                        </div>
                    </div>
                </div></div>
            </div>

            <div class="col-xl-4">
                <div class="card border-0 shadow-sm mb-4"><div class="card-body p-4">
                    <h2 class="h6 mb-3">الإعدادات</h2>
                    <div class="form-check form-switch mb-3">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" @checked(old('is_active', $assessment->is_active))>
                        <label class="form-check-label" for="is_active">مفعّل</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">كود المقياس</label>
                        <input name="code" class="form-control" dir="ltr" maxlength="60" pattern="[a-z0-9_]+" value="{{ old('code', $assessment->code) }}" placeholder="self_discipline">
                        <div class="form-text">حروف إنجليزية صغيرة وأرقام و _ . لو فاضي بيتعمل تلقائي.</div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label">المدة (دقيقة)</label>
                            <input type="number" min="1" name="time_limit_min" class="form-control" dir="ltr" value="{{ old('time_limit_min', $assessment->time_limit_min) }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">السعر</label>
                            <input type="number" min="0" step="0.01" name="price" class="form-control" dir="ltr" value="{{ old('price', $assessment->price ?? 0) }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">كود التقرير</label>
                            <input name="report_code" class="form-control" dir="ltr" maxlength="60" value="{{ old('report_code', $assessment->report_code) }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">الترتيب</label>
                            <input type="number" min="0" name="order_index" class="form-control" dir="ltr" value="{{ old('order_index', $assessment->order_index) }}">
                        </div>
                    </div>
                    <div>
                        <label class="form-label">صورة المقياس</label>
                        @php $imagePath = $assessment->image_url ? (str_starts_with($assessment->image_url, '/') ? $assessment->image_url : '/images/' . $assessment->image_url) : null; @endphp
                        @if ($imagePath && file_exists(public_path(ltrim($imagePath, '/'))))
                            <img src="{{ $imagePath }}" alt="" class="d-block rounded mb-2" style="max-height:90px">
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div></div>

                <button class="btn btn-brand w-100" type="submit"><i class="bi bi-check-lg"></i> {{ $editing ? 'حفظ التعديلات' : 'إنشاء المقياس' }}</button>
            </div>
        </div>
    </form>
@endsection
