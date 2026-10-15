{{--
  تقرير مفاتيح الشخصية السبعة (PDF): A4 أفقي.
  الملخص السريع: صفحة 1 (المخطط وأبرز المفاتيح) + صفحة 2 (التفسير الكامل وترتيب المفاتيح).
  التقرير الكامل: كل مفتاح في صف عريض بكل تفاصيله ومحاوره الفرعية بأوصافها (4 مفاتيح في الصفحة).
  من غير هيدر ولا فوتر الموقع: هوية المنصة + الاسم ووقت الاختبار والعمر + بيانات التقرير بس. من غير أي اختصار للنصوص.
  بيتفتح من «تحميل التقرير» (?print=1) وبيفتح نافذة الطباعة لوحده، والمستخدم يحفظه PDF.
  الـCSS هنا مستقل (بدون Tailwind) عشان شكل الورق ما يتأثرش بالـbuild، ما عدا مخطط المفاتيح المشترك مع صفحة النتيجة.
--}}
@php
  // ألوان كل مفتاح: accent (الخط والتعبئة) / tint (خلفية خفيفة) / ink (لون الاسم) / track (خلفية الشريط)
  $themes = [
    'K1' => ['accent' => '#204a7a', 'tint' => '#ecf4fe', 'ink' => '#204a7a', 'track' => '#dbe6f3'],
    'K2' => ['accent' => '#64748b', 'tint' => '#f1f4f8', 'ink' => '#465770', 'track' => '#e2e8f0'],
    'K3' => ['accent' => '#5fae7d', 'tint' => '#eef9f2', 'ink' => '#227f45', 'track' => '#d7e5dc'],
    'K4' => ['accent' => '#735297', 'tint' => '#f6f0fb', 'ink' => '#5d3589', 'track' => '#e3d6f0'],
    'K5' => ['accent' => '#ccab3e', 'tint' => '#fff8e6', 'ink' => '#9a7a1f', 'track' => '#f1e8c8'],
    'K6' => ['accent' => '#b35769', 'tint' => '#fff1f4', 'ink' => '#a04a5b', 'track' => '#f0d3d9'],
    'K7' => ['accent' => '#8640c9', 'tint' => '#f5ecfd', 'ink' => '#752fb7', 'track' => '#e4d3f3'],
  ];
  $theme = fn ($key) => $themes[$key->code] ?? $themes['K1'];

  ['desktop' => $diagram] = require resource_path('data/keys-result-diagram.php');
  $percents = $keys->mapWithKeys(fn ($k) => [$k->code => $k->percent])->all();

  // بيانات المستخدم: الاسم ووقت إجراء الاختبار والعمر بس
  $when = $completedAt ? \Illuminate\Support\Carbon::parse($completedAt) : now();
  $months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];
  $dateText = $when->day . ' ' . $months[$when->month - 1] . ' ' . $when->year;
  $timeText = $when->format('h:i') . ' ' . ($when->hour < 12 ? 'ص' : 'م');
  $infoItems = array_filter([
    'وقت إجراء الاختبار' => $dateText . ' · ' . $timeText,
    'الاسم' => trim((string) $user->name),
    'العمر' => $user->birth_date ? $user->birth_date->age . ' سنة' : '',
  ], 'strlen');

  // «ماذا تعني هذه النتيجة؟»: كل فقرات المستوى الإجمالي (من قاعدة البيانات) من غير اختصار
  $insight = $overallLevel ? array_values(array_filter(array_map('trim', preg_split('/\R+/u', (string) $overallLevel->description_ar)), 'strlen')) : [];
  if (! $insight) {
    $word = $overall >= 80 ? 'المرتفع جدًا' : ($overall >= 65 ? 'المرتفع' : ($overall >= 40 ? 'المتوسط' : 'المنخفض'));
    $insight = ["تشير نتيجتك إلى أن مستوى حضور السمات التي يقيسها مقياس مفاتيح الشخصية السبعة لديك يقع ضمن المستوى {$word}."];
  }
  $overallTitle = $overallLevel->title_ar ?? null;

  // صفحتان للملخص السريع + صفحات التقرير الكامل (4 مفاتيح في الصفحة)
  $fullPages = $keys->chunk(4);
  $totalPages = 2 + $fullPages->count();
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>تقرير مفاتيح الشخصية السبعة{{ $user->name ? ' - ' . $user->name : '' }}</title>
  <meta name="robots" content="noindex, nofollow" />
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- مخطط المفاتيح (نفس مكوّن صفحة النتيجة) محتاج كلاسات الـTailwind بتاعة الموقع --}}
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css']) }}

  <style>
    @page { size: A4 landscape; margin: 0; }

    :root {
      --navy: #204a7a; --navy-dark: #14304f; --ink: #262626; --text: #4a4a4a; --muted: #6f7a8a;
      --line: #dde4ed; --paper: #fff; --soft: #f5f8fc;
    }
    html, body { margin: 0 !important; padding: 0 !important; background: #e4e9f0 !important; overflow: visible !important; }
    body { font-family: 'Cairo', 'El Messiri', sans-serif; color: var(--ink); -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    .rp, .rp * { box-sizing: border-box; }

    /* ورقة A4 أفقي (على الشاشة: ورقة بظل، وفي الطباعة: صفحة كاملة) */
    .rp-page {
      position: relative; width: 297mm; height: 210mm; margin: 0 auto 24px; padding: 9mm 10mm 8mm;
      background: var(--paper); display: flex; flex-direction: column; overflow: hidden;
      box-shadow: 0 6px 30px rgba(20, 48, 79, .18);
    }
    .rp-page::before { content: ""; position: absolute; inset: 0 0 auto 0; height: 4mm; background: linear-gradient(90deg, #204a7a, #4c62d8 40%, #7e48cc 70%, #e33e5a); }
    .rp-page::after { content: ""; position: absolute; left: -40mm; bottom: -48mm; width: 110mm; height: 110mm; border-radius: 50%; background: radial-gradient(circle, rgba(32, 74, 122, .07), rgba(32, 74, 122, 0) 70%); pointer-events: none; }
    .rp-page > * { position: relative; z-index: 1; }

    /* رأس التقرير: هوية المنصة + عنوان التقرير */
    .rp-head { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding-top: 2.6mm; padding-bottom: 2.6mm; border-bottom: 1.5px solid var(--navy); }
    .rp-brand { display: flex; align-items: center; gap: 12px; }
    .rp-brand img { width: 46px; height: 46px; object-fit: contain; }
    .rp-brand b { display: block; font-family: 'El Messiri', sans-serif; font-size: 22px; line-height: 1.2; color: var(--navy); }
    .rp-brand small { display: block; font-size: 11px; letter-spacing: .08em; color: var(--muted); direction: ltr; text-align: right; }
    .rp-title { text-align: left; }
    .rp-title h1 { margin: 0; font-family: 'El Messiri', sans-serif; font-weight: 700; font-size: 24px; line-height: 1.25; color: var(--navy); text-align: left; }
    .rp-title .rp-subline { display: flex; align-items: center; justify-content: flex-start; gap: 8px; margin-top: 3px; font-size: 12px; color: var(--muted); }
    .rp-tag { display: inline-block; padding: 2px 12px; border-radius: 999px; background: var(--navy); color: #fff; font-weight: 700; font-size: 12px; }

    /* بيانات المستخدم: وقت الاختبار + الاسم + العمر */
    .rp-info { display: grid; grid-template-columns: 1.2fr 1.6fr .8fr; margin: 3mm 0 0; border: 1px solid var(--line); border-radius: 12px; background: var(--soft); overflow: hidden; }
    .rp-info > div { padding: 7px 18px 8px; min-width: 0; border-inline-start: 1px solid var(--line); }
    .rp-info > div:first-child { border-inline-start: 0; }
    .rp-info dt { margin: 0; font-size: 10.5px; font-weight: 600; color: var(--muted); }
    .rp-info dd { margin: 1px 0 0; font-size: 14.5px; font-weight: 700; color: var(--ink); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

    .rp-foot { margin-top: auto; padding-top: 2.5mm; display: flex; align-items: center; justify-content: space-between; font-size: 10.5px; color: var(--muted); border-top: 1px solid var(--line); }

    /* ===== مكونات مشتركة ===== */
    .rp-card { background: #fff; border: 1px solid var(--line); border-radius: 16px; }
    .rp-pill { padding: 2px 12px; border-radius: 999px; background: #eef2f7; color: #56627a; font-size: 11px; font-weight: 600; }
    .rp-rank { flex: none; width: 27px; height: 27px; border-radius: 50%; background: var(--c); color: #fff; display: grid; place-items: center; font-weight: 800; font-size: 13px; }
    .rp-lvl { display: inline-block; align-self: flex-start; padding: 1px 12px; border-radius: 999px; background: var(--tint); border: 1px solid var(--c); color: var(--ink); font-weight: 700; font-size: 11.5px; line-height: 19px; }
    .rp-bar { flex: 1; height: 6px; border-radius: 999px; background: var(--track); overflow: hidden; direction: ltr; }
    .rp-bar i { display: block; height: 100%; border-radius: 999px; background: var(--c); }

    /* ===== صفحة 1: المخطط وأبرز المفاتيح ===== */
    .rp-quick { flex: 1; min-height: 0; display: grid; grid-template-columns: 584px 1fr; grid-template-rows: minmax(0, 1fr); gap: 16px; margin-top: 3.4mm; margin-bottom: 2mm; }
    .rp-chart { display: flex; flex-direction: column; align-items: center; padding: 12px 20px 8px; }
    .rp-chart h2, .rp-insight h2, .rp-rank-card h2 { margin: 0; font-family: 'El Messiri', sans-serif; font-size: 17px; font-weight: 700; color: var(--ink); }
    .rp-chart-head { align-self: stretch; display: flex; align-items: center; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid #eef2f6; }
    .rp-chart-body { flex: 1; min-height: 0; display: flex; align-items: center; justify-content: center; --u: .98px; }
    .rp-chart-body > div { position: relative; width: calc(var(--u) * 558); height: calc(var(--u) * 474); }
    .rp-chart-note { margin: 0; font-size: 11px; color: var(--muted); }

    .rp-side { display: flex; flex-direction: column; gap: 12px; min-width: 0; min-height: 0; }
    .rp-overall { display: flex; align-items: center; gap: 18px; padding: 16px 20px; background: linear-gradient(80deg, #fff 0%, #e6eefa 100%); border-color: #bcd0e8; }
    .rp-donut { --p: 0; flex: none; width: 92px; height: 92px; border-radius: 50%; display: grid; place-items: center; background: conic-gradient(var(--navy) calc(var(--p) * 1%), #dbe6f3 0); }
    .rp-donut span { display: grid; place-items: center; width: 72px; height: 72px; border-radius: 50%; background: #fff; font-weight: 800; font-size: 23px; color: var(--navy); direction: ltr; }
    .rp-overall small { display: block; font-size: 12.5px; font-weight: 600; color: var(--muted); }
    .rp-overall b { display: block; margin-top: 2px; font-family: 'El Messiri', sans-serif; font-size: 25px; line-height: 1.3; color: var(--navy); }

    .rp-hl { flex: 1; min-height: 0; display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 12px; }
    .rp-key { display: flex; flex-direction: column; justify-content: center; gap: 4px; padding: 12px 16px; border: 1px solid; border-inline-start-width: 6px; border-radius: 15px; min-width: 0; }
    .rp-key small { display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; }
    .rp-key small i { font-style: normal; padding: 0 9px; border-radius: 999px; background: rgba(255, 255, 255, .85); font-size: 11px; line-height: 19px; }
    .rp-key strong { font-family: 'El Messiri', sans-serif; font-size: 22px; line-height: 1.35; color: var(--ink); }
    .rp-key em { font-style: normal; font-weight: 800; font-size: 34px; line-height: 1.1; direction: ltr; text-align: right; }
    .rp-key .rp-lvl { margin-top: 2px; background: rgba(255, 255, 255, .85); }
    .rp-key.wide { grid-column: 1 / -1; flex-direction: row; align-items: center; justify-content: space-between; }
    .rp-key.wide > div { display: flex; flex-direction: column; gap: 4px; }

    /* ===== صفحة 2: ماذا تعني هذه النتيجة؟ (كاملة) + ترتيب المفاتيح ===== */
    .rp-two { flex: 1; min-height: 0; display: flex; flex-direction: column; gap: 12px; margin: 3mm 0 2mm; }
    .rp-insight { padding: 16px 22px 18px; background: linear-gradient(79deg, #fff 1%, #e3ecf8 99%); border-color: #a3c0e2; }
    .rp-insight header { display: flex; align-items: center; gap: 12px; padding-bottom: 10px; margin-bottom: 12px; border-bottom: 1px solid rgba(32, 74, 122, .18); }
    .rp-bulb { flex: none; width: 38px; height: 38px; border-radius: 11px; background: var(--navy); display: grid; place-items: center; }
    .rp-bulb img { width: 22px; height: 22px; }
    .rp-insight h2 { color: #172554; font-size: 20px; }
    .rp-insight header .rp-pill { margin-inline-start: auto; background: #fff; color: var(--navy); }
    .rp-text { column-count: 2; column-gap: 28px; column-rule: 1px solid rgba(32, 74, 122, .14); font-size: 12.5px; line-height: 1.95; color: var(--text); font-weight: 500; }
    .rp-text p { margin: 0 0 7px; text-align: justify; }

    .rp-rank-card { padding: 14px 22px; }
    .rp-rank-card header { display: flex; align-items: center; justify-content: space-between; padding-bottom: 8px; margin-bottom: 9px; border-bottom: 1px solid #eef2f6; }
    .rp-rank-rows { display: grid; grid-template-columns: 1fr 1fr; gap: 7px 28px; }
    .rp-rr { display: grid; grid-template-columns: 24px 120px 1fr 42px; align-items: center; gap: 9px; }
    .rp-rr .rp-rank { width: 24px; height: 24px; font-size: 12px; }
    .rp-rr b { font-size: 13px; font-weight: 700; color: var(--ink); white-space: nowrap; }
    .rp-rr .rp-bar { height: 9px; }
    .rp-rr em { font-style: normal; font-weight: 800; font-size: 13.5px; color: var(--ink); direction: ltr; text-align: left; }

    /* ===== التقرير الكامل: صف عريض لكل مفتاح (4 في الصفحة) ===== */
    .rp-full-head { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding-top: 2.4mm; padding-bottom: 2mm; border-bottom: 1.5px solid var(--navy); }
    .rp-full-head .rp-brand img { width: 34px; height: 34px; }
    .rp-full-head .rp-brand b { font-size: 18px; }
    .rp-full-who { font-size: 12.5px; color: var(--muted); text-align: left; }
    .rp-full-who b { color: var(--ink); font-size: 14px; }
    .rp-full-head h1 { margin: 0; font-family: 'El Messiri', sans-serif; font-size: 22px; font-weight: 700; color: var(--navy); }

    .rp-wkgrid { flex: 1; min-height: 0; display: grid; grid-template-rows: repeat(4, minmax(0, 1fr)); gap: 9px; margin: 2.8mm 0 1.6mm; }
    .rp-wk { --c: #204a7a; --tint: #ecf4fe; --ink: #204a7a; --track: #dbe6f3; display: grid; grid-template-columns: 268px 1fr; min-width: 0; min-height: 0; border: 1px solid var(--line); border-radius: 14px; background: #fff; overflow: hidden; }
    .rp-wk-main { display: flex; flex-direction: column; gap: 5px; padding: 11px 14px 10px; background: var(--tint); border-inline-end: 1px solid var(--line); border-inline-start: 6px solid var(--c); min-width: 0; }
    .rp-wk-top { display: flex; align-items: center; gap: 9px; }
    .rp-wk-name { flex: 1; min-width: 0; }
    .rp-wk-name b { display: block; font-family: 'El Messiri', sans-serif; font-size: 18px; line-height: 1.25; color: var(--ink); }
    .rp-wk-name small { display: block; font-size: 10.5px; line-height: 1.35; font-weight: 600; color: var(--muted); }
    .rp-wk-pct { font-weight: 800; font-size: 28px; line-height: 1; color: var(--ink); direction: ltr; }
    .rp-wk-main .rp-lvl { background: #fff; }
    .rp-wk-sum { margin: 0; font-size: 12px; line-height: 1.6; color: var(--text); font-weight: 500; }

    .rp-wk-subs { display: grid; grid-template-columns: repeat(3, 1fr); min-width: 0; }
    .rp-sub { display: flex; flex-direction: column; gap: 5px; padding: 10px 14px; min-width: 0; border-inline-start: 1px solid var(--line); }
    .rp-sub:first-child { border-inline-start: 0; }
    .rp-sub-row { display: flex; align-items: center; gap: 7px; }
    .rp-sub-code { flex: none; min-width: 27px; padding: 0 5px; border-radius: 6px; background: var(--tint); border: 1px solid var(--c); font-size: 10px; font-weight: 700; line-height: 17px; text-align: center; color: var(--ink); direction: ltr; }
    .rp-sub-name { flex: 1; min-width: 0; font-size: 13px; font-weight: 700; line-height: 1.3; color: var(--ink); }
    .rp-sub-score { flex: none; font-size: 12px; font-weight: 800; color: var(--ink); direction: ltr; }
    .rp-sub-lvl { align-self: flex-start; padding: 0 10px; border-radius: 999px; background: var(--tint); border: 1px solid var(--c); font-size: 10.5px; font-weight: 700; line-height: 17px; color: var(--ink); }
    .rp-sub-sum { margin: 0; font-size: 11.5px; line-height: 1.6; color: var(--text); font-weight: 500; }
    .rp-sub .rp-bar { flex: none; margin-top: auto; }

    .rp-note { display: grid; grid-template-columns: 1fr 1.2fr; gap: 24px; align-items: center; padding: 12px 20px; border-radius: 14px; background: var(--navy); color: #fff; min-width: 0; }
    .rp-note h3 { margin: 0 0 6px; font-family: 'El Messiri', sans-serif; font-size: 16px; color: #fcd34d; }
    .rp-note ul { margin: 0; padding: 0; list-style: none; display: flex; flex-direction: column; gap: 4px; font-size: 11px; line-height: 1.55; color: #e8eef7; }
    .rp-note li { position: relative; padding-inline-start: 14px; }
    .rp-note li::before { content: ""; position: absolute; inset-inline-start: 0; top: 7px; width: 6px; height: 6px; border-radius: 50%; background: #fcd34d; }
    .rp-note .rp-legal { margin: 0; padding-inline-start: 24px; border-inline-start: 1px solid rgba(255, 255, 255, .25); font-size: 11px; line-height: 1.7; color: #c8d6ea; }

    /* شريط الأدوات (الشاشة بس) */
    .rp-bar-tools { position: sticky; top: 0; z-index: 50; display: flex; align-items: center; justify-content: center; gap: 14px; flex-wrap: wrap; padding: 10px 16px; margin-bottom: 20px; background: #fff; border-bottom: 1px solid var(--line); box-shadow: 0 2px 10px rgba(20, 48, 79, .08); font-family: 'Cairo', sans-serif; }
    .rp-btn { display: inline-flex; align-items: center; justify-content: center; height: 42px; padding: 0 22px; border-radius: 10px; border: 2px solid var(--navy); font: 700 15px 'Cairo', sans-serif; cursor: pointer; text-decoration: none; transition: background .15s, color .15s; }
    .rp-btn.primary { background: var(--navy); color: #fff; }
    .rp-btn.primary:hover { background: var(--navy-dark); border-color: var(--navy-dark); }
    .rp-btn.ghost { background: #fff; color: var(--navy); }
    .rp-btn.ghost:hover { background: var(--navy); color: #fff; }
    .rp-hint { font-size: 12.5px; color: var(--muted); }

    @media screen and (max-width: 1180px) { .rp-wrap { overflow-x: auto; } .rp-page { margin-inline: 0; } }
    @media print {
      html, body { background: #fff !important; }
      .rp-bar-tools { display: none !important; }
      .rp-wrap { overflow: visible; }
      .rp-page { margin: 0; box-shadow: none; break-after: page; page-break-after: always; }
      .rp-page:last-of-type { break-after: auto; page-break-after: auto; }
    }
  </style>
</head>
<body>
  <div class="rp-bar-tools">
    <button type="button" class="rp-btn primary" onclick="window.print()">حفظ التقرير كملف PDF</button>
    <a class="rp-btn ghost" href="{{ route('keys.details') }}">رجوع للتفاصيل</a>
    <span class="rp-hint">في نافذة الطباعة اختر «حفظ كـ PDF» ثم اضغط حفظ.</span>
  </div>

  <div class="rp-wrap rp">

    {{-- ================= صفحة 1: الملخص السريع (المخطط + أبرز المفاتيح) ================= --}}
    <section class="rp-page" aria-label="الملخص السريع">
      <header class="rp-head">
        <div class="rp-brand">
          <img src="/landing/images/logo.png" alt="" />
          <div><b>دار الرؤى للتدريب</b><small>DAR AL-RUYA TRAINING</small></div>
        </div>
        <div class="rp-title">
          <h1>{{ $title }}</h1>
          <div class="rp-subline"><span class="rp-tag">الملخص السريع</span></div>
        </div>
      </header>

      <dl class="rp-info" style="grid-template-columns: {{ count($infoItems) === 3 ? '1.2fr 1.6fr .8fr' : '1.2fr 1.6fr' }}">
        @foreach ($infoItems as $label => $value)
          <div @if($label === 'الاسم') style="text-align: center" @endif><dt>{{ $label }}</dt><dd>{{ $value }}</dd></div>
        @endforeach
      </dl>

      <div class="rp-quick">
        <section class="rp-card rp-chart" aria-label="مخطط المفاتيح">
          <div class="rp-chart-head">
            <h2>مخطط مفاتيح شخصيتك السبعة</h2>
            <span class="rp-pill">7 أبعاد رئيسية</span>
          </div>
          <div class="rp-chart-body"><div>@include('landing.partials.keys-result-diagram', ['c' => $diagram, 'percents' => $percents])</div></div>
          <p class="rp-chart-note">تم احتساب المفاتيح بالاعتماد على {{ $subCount }} بعداً فرعياً</p>
        </section>

        <div class="rp-side">
          <section class="rp-card rp-overall" aria-label="المتوسط العام">
            <div class="rp-donut" style="--p: {{ $overall }}"><span>{{ $overall }}%</span></div>
            <div>
              <small>المتوسط العام للمفاتيح</small>
              <b>{{ $overallTitle ?: 'نتيجتك الإجمالية' }}</b>
            </div>
          </section>

          <div class="rp-hl">
            @foreach ([[$top, 'المفتاح الأعلى'], [$next, 'المفتاح التالي']] as [$k, $label])
              @if ($k)
                @php $t = $theme($k); @endphp
                <div class="rp-key" style="--c: {{ $t['accent'] }}; --tint: {{ $t['tint'] }}; --ink: {{ $t['ink'] }}; border-color: {{ $t['accent'] }}; background: linear-gradient(to right, #fcfdfe, {{ $t['tint'] }})">
                  <small style="color: {{ $t['ink'] }}">{{ $label }}</small>
                  <strong>{{ $k->name }} ({{ $k->code }})</strong>
                  @if ($k->level)<span class="rp-lvl">{{ $k->level }}</span>@endif
                  <em style="color: {{ $t['ink'] }}">{{ $k->percent }}%</em>
                </div>
              @endif
            @endforeach
            @if ($lowest && $lowest !== $top)
              @php $t = $theme($lowest); @endphp
              <div class="rp-key wide" style="--c: {{ $t['accent'] }}; --tint: {{ $t['tint'] }}; --ink: {{ $t['ink'] }}; border-color: {{ $t['accent'] }}; background: linear-gradient(to right, #fff, {{ $t['tint'] }})">
                <div>
                  <small style="color: {{ $t['ink'] }}">المفتاح الأقل حضوراً <i style="color: {{ $t['ink'] }}">أولوية تطوير</i></small>
                  <strong>{{ $lowest->name }} ({{ $lowest->code }})</strong>
                  @if ($lowest->level)<span class="rp-lvl">{{ $lowest->level }}</span>@endif
                </div>
                <em style="color: {{ $t['ink'] }}">{{ $lowest->percent }}%</em>
              </div>
            @endif
          </div>
        </div>
      </div>

      <footer class="rp-foot"><span>دار الرؤى للتدريب · {{ $title }}</span><span dir="ltr">1 / {{ $totalPages }}</span></footer>
    </section>

    {{-- ================= صفحة 2: ماذا تعني هذه النتيجة؟ (كاملة) + ترتيب المفاتيح ================= --}}
    <section class="rp-page" aria-label="تفسير النتيجة">
      @include('landing.partials.keys-report-head', ['heading' => 'الملخص السريع · تفسير النتيجة'])

      <div class="rp-two">
        <section class="rp-card rp-insight" aria-label="ماذا تعني هذه النتيجة؟">
          <header>
            <span class="rp-bulb"><img src="/landing/images/keys-result/lightbulb.svg" alt="" /></span>
            <h2>ماذا تعني هذه النتيجة؟</h2>
            <span class="rp-pill">تحليل ذكي</span>
          </header>
          <div class="rp-text">
            @foreach ($insight as $paragraph)<p>{{ $paragraph }}</p>@endforeach
          </div>
        </section>

        <section class="rp-card rp-rank-card" aria-label="ترتيب المفاتيح">
          <header><h2>ترتيب مفاتيحك من الأعلى حضوراً</h2><span class="rp-pill">المتوسط العام {{ $overall }}%</span></header>
          <div class="rp-rank-rows">
            @foreach ($keys as $i => $key)
              @php $t = $theme($key); @endphp
              <div class="rp-rr" style="--c: {{ $t['accent'] }}; --ink: {{ $t['ink'] }}; --track: {{ $t['track'] }}">
                <span class="rp-rank">{{ $i + 1 }}</span>
                <b>{{ $key->name }} ({{ $key->code }})</b>
                <div class="rp-bar"><i style="width: {{ $key->percent }}%"></i></div>
                <em>{{ $key->percent }}%</em>
              </div>
            @endforeach
          </div>
        </section>
      </div>

      <footer class="rp-foot"><span>دار الرؤى للتدريب · {{ $title }}</span><span dir="ltr">2 / {{ $totalPages }}</span></footer>
    </section>

    {{-- ================= التقرير الكامل: 4 مفاتيح في الصفحة بكل تفاصيلها ================= --}}
    @foreach ($fullPages as $pageIndex => $pageKeys)
      <section class="rp-page" aria-label="التقرير الكامل">
        @include('landing.partials.keys-report-head', ['heading' => 'التقرير الكامل · تفاصيل المفاتيح السبعة'])

        <div class="rp-wkgrid">
          @foreach ($pageKeys as $key)
            @php $t = $theme($key); $rank = $pageIndex * 4 + $loop->iteration; @endphp
            <article class="rp-wk" style="--c: {{ $t['accent'] }}; --tint: {{ $t['tint'] }}; --ink: {{ $t['ink'] }}; --track: {{ $t['track'] }}">
              <div class="rp-wk-main">
                <div class="rp-wk-top">
                  <span class="rp-rank" title="الترتيب">{{ $rank }}</span>
                  <div class="rp-wk-name"><b>{{ $key->name }} ({{ $key->code }})</b>@if ($key->tagline)<small>{{ $key->tagline }}</small>@endif</div>
                  <span class="rp-wk-pct">{{ $key->percent }}%</span>
                </div>
                @if ($key->level)<span class="rp-lvl">{{ $key->level }}</span>@endif
                @if ($key->summary)<p class="rp-wk-sum">{{ $key->summary }}</p>@endif
              </div>
              <div class="rp-wk-subs">
                @foreach ($key->subs as $sub)
                  <div class="rp-sub">
                    <div class="rp-sub-row">
                      <span class="rp-sub-code">{{ $sub->code }}</span>
                      <span class="rp-sub-name">{{ $sub->name }}</span>
                      <span class="rp-sub-score">{{ $sub->score }}/{{ $sub->max }}</span>
                    </div>
                    @if ($sub->level)<span class="rp-sub-lvl">{{ $sub->level }}</span>@endif
                    @if ($sub->summary)<p class="rp-sub-sum">{{ $sub->summary }}</p>@endif
                    <div class="rp-bar"><i style="width: {{ $sub->percent }}%"></i></div>
                  </div>
                @endforeach
              </div>
            </article>
          @endforeach

          @if ($loop->last && $pageKeys->count() < 4)
            <aside class="rp-note" aria-label="كيف تقرأ التقرير">
              <div>
                <h3>كيف تقرأ هذا التقرير؟</h3>
                <ul>
                  <li>المفاتيح مرتبة بالأعلى حضوراً لديك أولاً، والرقم داخل الدائرة هو ترتيب المفتاح.</li>
                  <li>النسبة المئوية = درجتك ÷ الدرجة القصوى لكل مفتاح، وبجانبها محاوره الفرعية بدرجاتها.</li>
                  <li>الأقل حضوراً ليس ضعفاً، بل فرصة تطوير تبدأ منها خطتك.</li>
                </ul>
              </div>
              <p class="rp-legal">هذا التقرير أداة للتأمل والتطوير الذاتي، ولا يُعد تشخيصاً نفسياً أو حكماً نهائياً على الشخصية. المقياس يعتمد على وصفك لذاتك، وقد تختلف درجة ممارسة هذه السلوكيات باختلاف المواقف والظروف.</p>
            </aside>
          @endif
        </div>

        <footer class="rp-foot"><span>دار الرؤى للتدريب · {{ $title }}</span><span dir="ltr">{{ $pageIndex + 3 }} / {{ $totalPages }}</span></footer>
      </section>
    @endforeach
  </div>

  <script>
    // ?print=1 (من زرار «تحميل التقرير»): نستنى الخطوط والصور وبعدين نفتح نافذة الطباعة لحفظ الـPDF
    if (new URLSearchParams(location.search).has('print')) {
      const images = Array.from(document.images).map((img) => img.complete ? null : new Promise((r) => { img.onload = img.onerror = r; }));
      Promise.all([document.fonts ? document.fonts.ready : null, ...images]).then(() => setTimeout(() => window.print(), 400));
    }
  </script>
</body>
</html>
