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

    // الموبايل: نافذة الطباعة مش بتحفظ PDF عندهم، فبنبني الملف ونحمّله مباشرة (html2canvas + jsPDF، صفحة طويلة بعرض 1440px)
    var isMobile = (navigator.maxTouchPoints > 0 && Math.min(screen.width, screen.height) < 820) || /Android|iPhone|iPad|iPod|Mobi/i.test(navigator.userAgent);

    function loadScript(src) {
      return new Promise(function (resolve, reject) {
        var tag = document.createElement('script');
        tag.src = src; tag.onload = resolve; tag.onerror = reject;
        document.head.appendChild(tag);
      });
    }

    function showBusy(text) {
      var box = document.getElementById('pdf-busy');
      if (!box) {
        box = document.createElement('div');
        box.id = 'pdf-busy';
        box.setAttribute('data-no-print', '');
        box.style.cssText = 'position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;background:rgba(20,48,79,.78);color:#fff;font:700 18px Cairo,sans-serif;text-align:center;padding:24px';
        document.body.appendChild(box);
      }
      box.textContent = text;
      box.style.display = text ? 'flex' : 'none';
    }

    function downloadPdf() {
      showBusy('جارٍ تجهيز ملف الـ PDF، لحظات...');
      var root = document.getElementById('pdf-root') || document.body;
      return Promise.all([
        window.html2canvas ? null : loadScript('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js'),
        window.jspdf ? null : loadScript('https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js'),
        document.fonts ? document.fonts.ready : null
      ]).then(function () {
        var width = 1440;
        var height = Math.ceil(root.getBoundingClientRect().height);
        var slice = 1600;
        var pdf = new window.jspdf.jsPDF({ unit: 'px', format: [width, height], orientation: 'portrait', hotfixes: ['px_scaling'], compress: true });
        var chain = Promise.resolve();
        for (var y = 0; y < height; y += slice) {
          (function (top) {
            var h = Math.min(slice, height - top);
            chain = chain.then(function () {
              return window.html2canvas(root, {
                scale: 1.5, useCORS: true, backgroundColor: '#f6f6f6', logging: false,
                windowWidth: width, x: 0, y: top, width: width, height: h,
                ignoreElements: function (el) { return el.hasAttribute && el.hasAttribute('data-no-print'); }
              }).then(function (canvas) {
                pdf.addImage(canvas.toDataURL('image/jpeg', 0.92), 'JPEG', 0, top, width, h);
              });
            });
          })(y);
        }
        return chain.then(function () {
          var name = (document.title || 'report').replace(/[\/:*?"<>|]+/g, ' ').trim();
          pdf.save(name + '.pdf');
          showBusy('');
        });
      }).catch(function () {
        showBusy('');
        window.print();
      });
    }

    window.pdfPrint = function () {
      if (isMobile) { downloadPdf(); return; }
      fitPage(); window.print();
    };
    window.addEventListener('beforeprint', fitPage);

    if (new URLSearchParams(location.search).has('print')) {
      window.addEventListener('load', function () {
        var images = Array.from(document.images).map(function (img) { return img.complete ? null : new Promise(function (r) { img.onload = img.onerror = r; }); });
        Promise.all([document.fonts ? document.fonts.ready : null].concat(images)).then(function () { setTimeout(window.pdfPrint, 500); });
      });
    }
  })();
</script>
