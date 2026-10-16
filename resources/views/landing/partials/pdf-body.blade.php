{{--
  شريط الأدوات (الشاشة بس) + سكربت الطباعة لوضع الـPDF الطويل. $back: رابط الرجوع، $backLabel: نصه.
  السكربت بيقيس ارتفاع المحتوى ويحطه كـ@page size (1440px × الارتفاع) فالـPDF يطلع صفحة واحدة طويلة،
  ولو الرابط فيه ?print=1 بيفتح نافذة الطباعة لوحده بعد تحميل الخطوط والصور.
--}}
<script>
  (function () {
    // الصور الكسولة (loading=lazy) لازم تتحمّل كلها قبل الطباعة
    document.querySelectorAll('img[loading="lazy"]').forEach(function (img) { img.loading = 'eager'; });

    var styleTag = document.createElement('style');
    document.head.appendChild(styleTag);

    function fitPage() {
      var root = document.getElementById('pdf-root') || document.body;
      var height = Math.ceil(root.getBoundingClientRect().height) + 2;
      styleTag.textContent = '@page { size: 1440px ' + height + 'px; margin: 0; }';
    }

    window.pdfPrint = function () { fitPage(); window.print(); };
    window.addEventListener('beforeprint', fitPage);

    if (new URLSearchParams(location.search).has('print')) {
      window.addEventListener('load', function () {
        var images = Array.from(document.images).map(function (img) { return img.complete ? null : new Promise(function (r) { img.onload = img.onerror = r; }); });
        Promise.all([document.fonts ? document.fonts.ready : null].concat(images)).then(function () { setTimeout(window.pdfPrint, 500); });
      });
    }
  })();
</script>
