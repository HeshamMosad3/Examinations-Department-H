{{-- شريط أدوات وضع الـPDF (الشاشة بس). $back: رابط الرجوع، $backLabel: نصه --}}
<div class="pdf-bar" data-no-print>
  <button type="button" class="pdf-btn primary" onclick="window.pdfPrint()">حفظ التقرير كملف PDF</button>
  <a class="pdf-btn ghost" href="{{ $back }}">{{ $backLabel }}</a>
  <span class="pdf-hint">في نافذة الطباعة اختر «حفظ كـ PDF» ثم اضغط حفظ.</span>
</div>
