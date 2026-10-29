{{-- "اطلب عرض سعر لجهتك" dialog (Bootstrap modal). Figma: desktop 3707:9964 · mobile 3707:10047. UI demo only — nothing is sent. --}}
@php
    $di = '/assets/website/icons/course-details/dialog';
    // RTL order: right → left, top → bottom (the mobile frame shows the same sequence in one column)
    $fields = [
        ['name', 'الاسم بالكامل', 'text', 'أدخل الاسم', true],
        ['job', 'المسمى الوظيفي', 'text', 'مثال: مدير الموارد البشرية', true],
        ['company', 'اسم الشركة', 'text', 'اسم المنشأة', true],
        ['field', 'مجال الشركة', 'text', 'مثال: تقنية المعلومات', true],
        ['phone', 'رقم الجوال', 'tel', '00000000', true],
        ['count', 'عدد المتدربين', 'count', 'مثال: 10', true],
        ['method', 'طريقة التدريب', 'select', 'مثال: حضوري', true, ['حضوري', 'أونلاين', 'هجين']],
        ['city', 'مكان التدريب', 'select', 'اختر المدينة', true, ['الرياض', 'جدة', 'مكة المكرمة', 'المدينة المنورة', 'الدمام', 'الخبر', 'أبها', 'أخرى']],
        ['date', 'التاريخ المتوقع(اختياري)', 'date', 'mm/dd/yy', false],
        ['notes', 'تفاصيل إضافية (اختياري)', 'textarea', 'اكتب أهداف التدريب أو أي متطلبات خاصة....', false],
    ];
@endphp
<div class="modal fade cd-modal" id="cd-corp-modal" tabindex="-1" aria-labelledby="cd-corp-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <form class="modal-content" id="cd-corp-form" novalidate>
      <div class="cd-modal-head">
        <span class="cd-modal-ico"><img src="{{ $di }}/building.svg" alt="" aria-hidden="true" /></span>
        <div class="cd-modal-titles">
          <small>تدريب مخصص للمنشآت</small>
          <h2 id="cd-corp-title">اطلب عرض سعر لجهتك</h2>
          <p>شاركنا احتياج فريقك وسيتواصل معك فريقنا.</p>
        </div>
        <button type="button" class="cd-modal-close" data-bs-dismiss="modal" aria-label="إغلاق"><img src="{{ $di }}/close.svg" alt="" aria-hidden="true" /></button>
      </div>

      <div class="modal-body cd-modal-body">
        <div class="cd-fields">
          @foreach ($fields as $f)
            @php [$fName, $fLabel, $fType, $fHint, $fReq] = $f; @endphp
            @if ($fName === 'method')<div class="cd-pair">@endif
            <div class="cd-field {{ in_array($fType, ['date', 'textarea']) ? 'cd-field--full' : '' }} {{ $fName === 'city' ? 'cd-field--city is-collapsed' : '' }}" @if ($fName === 'city') id="cd-field-city" aria-hidden="true" @endif>
              <label for="cd-f-{{ $fName }}">{{ $fLabel }}@if ($fReq)<img src="{{ $di }}/asterisk.svg" alt="" aria-hidden="true" />@endif</label>
              @if ($fType === 'select')
                <select id="cd-f-{{ $fName }}" name="{{ $fName }}" class="cd-input cd-select" @if ($fReq) required @endif @if ($fName === 'method') aria-controls="cd-field-city" @endif @if ($fName === 'city') disabled @endif>
                  <option value="" selected disabled hidden>{{ $fHint }}</option>
                  @foreach ($f[5] as $opt)<option>{{ $opt }}</option>@endforeach
                </select>
              @elseif ($fType === 'textarea')
                <textarea id="cd-f-{{ $fName }}" name="{{ $fName }}" class="cd-input cd-textarea" rows="3" placeholder="{{ $fHint }}"></textarea>
              @elseif ($fType === 'tel')
                <div class="cd-phone">
                  <span class="cd-dial"><img src="{{ $di }}/flag.svg" alt="" aria-hidden="true" /><span dir="ltr">+966</span></span>
                  <input id="cd-f-{{ $fName }}" name="{{ $fName }}" class="cd-input" type="tel" inputmode="numeric" dir="ltr" autocomplete="tel-national" placeholder="{{ $fHint }}" @if ($fReq) required @endif />
                </div>
              @elseif ($fType === 'date')
                <input id="cd-f-{{ $fName }}" name="{{ $fName }}" class="cd-input cd-date" type="date" dir="ltr" />
              @else
                <input id="cd-f-{{ $fName }}" name="{{ $fName }}" class="cd-input" type="text" @if ($fType === 'count') inputmode="numeric" data-kind="count" @endif placeholder="{{ $fHint }}" @if ($fReq) required @endif />
              @endif
            </div>
            @if ($fName === 'city')</div>@endif
          @endforeach
        </div>

        <div class="cd-modal-foot">
          <p class="cd-note"><img src="{{ $di }}/shield.svg" alt="" aria-hidden="true" /><span>بياناتك محفوظة وتستخدم للتواصل بشأن هذا الطلب فقط.</span></p>
          <button type="submit" class="cd-send"><span>إرسال طلب عرض السعر</span><img src="/assets/website/icons/course-details/arrow-left-light.svg" alt="" aria-hidden="true" /></button>
        </div>
      </div>
    </form>
  </div>
</div>
