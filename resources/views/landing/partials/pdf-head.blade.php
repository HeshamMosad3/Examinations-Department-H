{{--
  وضع الـPDF الطويل (صفحة واحدة بعرض 1440px): ستايل مشترك لتقارير الأنماط الإدراكية وعجلة الحياة.
  بيتحط في <head>، والـbody بياخد الكلاس pdf-mode، وفي آخر الصفحة @include('landing.partials.pdf-body').
  ارتفاع الصفحة بيتحسب من المحتوى وقت الطباعة (pdf-body) فيطلع PDF صفحة واحدة طويلة.
--}}
{{-- CSS الموقع بعد تثبيت تصميم الديسكتوب (من غير اعتماد على عرض نافذة المتصفح): شوف App\Support\PdfStyles --}}
<style>{!! \App\Support\PdfStyles::css() !!}</style>
<style>
  /* احتياطي لو الـJS مشتغلش: الارتفاع الحقيقي بيتحدد وقت الطباعة */
  @page { size: 1440px 3000px; margin: 0; }

  html { background: #e4e9f0; }
  html { height: auto !important; }
  body.pdf-mode { height: auto !important; min-height: 0 !important; width: 1440px; min-width: 1440px; margin-inline: auto !important; padding-top: 0 !important; overflow: hidden; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
  /* الأزرار والتحكم مش بتتطبع، والنصوص المطوية بتتفتح كاملة */
  .pdf-mode .pr-no-print, .pdf-mode [data-no-pdf] { display: none !important; }
  .pdf-mode .pr-clamp { -webkit-line-clamp: unset !important; display: block !important; }

  .pdf-bar { position: sticky; top: 0; z-index: 50; display: flex; align-items: center; justify-content: center; gap: 14px; flex-wrap: wrap; padding: 10px 16px; background: #fff; border-bottom: 1px solid #dde4ed; box-shadow: 0 2px 10px rgba(20, 48, 79, .08); font-family: 'Cairo', sans-serif; }
  .pdf-btn { display: inline-flex; align-items: center; justify-content: center; height: 42px; padding: 0 22px; border-radius: 10px; border: 2px solid #204a7a; font: 700 15px 'Cairo', sans-serif; cursor: pointer; text-decoration: none; transition: background .15s, color .15s; }
  .pdf-btn.primary { background: #204a7a; color: #fff; }
  .pdf-btn.primary:hover { background: #14304f; border-color: #14304f; }
  .pdf-btn.ghost { background: #fff; color: #204a7a; }
  .pdf-btn.ghost:hover { background: #204a7a; color: #fff; }
  .pdf-hint { font-size: 12.5px; color: #6f7a8a; }

  @media print {
    html { background: #fff; }
    .pdf-bar { display: none !important; }
  }
</style>
