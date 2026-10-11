@extends('layouts.admin')

@section('title', $meta[0])

@section('content')
    <a href="{{ route('admin.site-content.index') }}" class="small text-decoration-none"><i class="bi bi-arrow-right"></i> محتوى الصفحات</a>
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-1 mb-3">
        <h1 class="h4 m-0"><i class="bi {{ $meta[1] }}"></i> {{ $meta[0] }}</h1>
        <div class="d-flex gap-2">
            <input type="search" id="field-search" class="form-control form-control-sm" style="min-width: 15rem" placeholder="ابحث عن نص في الصفحة">
            @if ($meta[2])<a class="btn btn-sm btn-outline-secondary nw" href="{{ $meta[2] }}" target="_blank"><i class="bi bi-box-arrow-up-left"></i> عرض الصفحة</a>@endif
        </div>
    </div>

    <form method="POST" action="{{ route('admin.site-content.update', $page) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        @foreach ($sections as $sectionKey => $section)
            <div class="card border-0 shadow-sm mb-3" data-section>
                <div class="card-header bg-white fw-bold py-3">{{ $section['label'] }} <span class="badge text-bg-light fw-normal" dir="ltr">{{ count($section['fields']) }}</span></div>
                <div class="card-body">
                    <div class="row g-3">
                        @foreach ($section['fields'] as $field)
                            @php $name = str_replace('.', '__', $field['key']); @endphp
                            <div class="{{ in_array($field['type'], ['textarea', 'image']) ? 'col-12' : (in_array($field['type'], ['toggle', 'number']) ? 'col-6 col-md-3' : 'col-md-6') }}" data-field data-search="{{ $field['label'] }} {{ $field['default'] }} {{ $field['value'] }}">
                                <div class="d-flex justify-content-between align-items-center gap-2 mb-1">
                                    <label class="form-label small fw-bold m-0" for="f-{{ $name }}">{{ $field['label'] }}</label>
                                    @if ($field['changed'])
                                        <div class="form-check form-check-sm m-0" title="يرجع للنص أو الصورة الأصلية">
                                            <input class="form-check-input" type="checkbox" name="reset[{{ $name }}]" value="1" id="r-{{ $name }}">
                                            <label class="form-check-label small text-muted" for="r-{{ $name }}"><span class="badge text-bg-warning">معدّل</span> رجوع للأصل</label>
                                        </div>
                                    @endif
                                </div>

                                @if ($field['type'] === 'image')
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-light border rounded-3 d-flex align-items-center justify-content-center p-2" style="width: 120px; height: 80px">
                                            <img src="{{ $field['value'] }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain">
                                        </div>
                                        <div class="flex-grow-1">
                                            <input type="file" name="files[{{ $name }}]" id="f-{{ $name }}" class="form-control form-control-sm" accept="image/*">
                                            <div class="form-text" dir="ltr">{{ $field['value'] }}</div>
                                        </div>
                                    </div>
                                @elseif ($field['type'] === 'toggle')
                                    <input type="hidden" name="values[{{ $name }}]" value="0">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" role="switch" name="values[{{ $name }}]" value="1" id="f-{{ $name }}" @checked($field['value'] === '1')>
                                        <label class="form-check-label small text-muted" for="f-{{ $name }}">مفعّل</label>
                                    </div>
                                @elseif ($field['type'] === 'number')
                                    <input type="number" min="0" step="1" name="values[{{ $name }}]" id="f-{{ $name }}" class="form-control" value="{{ $field['value'] }}" dir="ltr">
                                @elseif ($field['type'] === 'list')
                                    <textarea name="values[{{ $name }}]" id="f-{{ $name }}" rows="3" class="form-control">{{ implode("\n", cms_list($field['key'], $field['default'])) }}</textarea>
                                    <div class="form-text">خيار في كل سطر (أو افصل بينها بفاصلة).</div>
                                @elseif ($field['type'] === 'textarea')
                                    <textarea name="values[{{ $name }}]" id="f-{{ $name }}" rows="3" class="form-control">{{ $field['value'] }}</textarea>
                                @else
                                    <input type="text" name="values[{{ $name }}]" id="f-{{ $name }}" class="form-control" value="{{ $field['value'] }}" @if ($field['type'] === 'url') dir="ltr" @endif>
                                @endif

                                @if ($field['changed'] && $field['type'] !== 'image')
                                    <div class="form-text"><i class="bi bi-arrow-counterclockwise"></i> الأصلي: {{ $field['type'] === 'toggle' ? ($field['default'] === '1' ? 'مفعّل' : 'متوقف') : \Illuminate\Support\Str::limit($field['default'], 140) }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="position-sticky bottom-0 bg-white border-top py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <small class="text-muted"><i class="bi bi-info-circle"></i> سيب الحقل زي ما هو أو فاضي عشان يفضل النص الأصلي.</small>
            <button class="btn btn-brand px-4"><i class="bi bi-check-lg"></i> حفظ التعديلات</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        document.getElementById('field-search').addEventListener('input', (e) => {
            const q = e.target.value.trim();
            document.querySelectorAll('[data-section]').forEach((section) => {
                let visible = 0;
                section.querySelectorAll('[data-field]').forEach((field) => {
                    const show = !q || field.dataset.search.includes(q);
                    field.classList.toggle('d-none', !show);
                    visible += show ? 1 : 0;
                });
                section.classList.toggle('d-none', visible === 0);
            });
        });
    </script>
@endpush
