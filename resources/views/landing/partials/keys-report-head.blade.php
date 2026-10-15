{{-- رأس مصغّر لصفحات تقرير الـPDF الداخلية: هوية المنصة + عنوان الجزء + اسم المستخدم ووقت الاختبار. يحتاج $heading, $user, $dateText, $timeText --}}
<header class="rp-full-head">
  <div class="rp-brand">
    <img src="/landing/images/logo.png" alt="" />
    <div><b>دار الرؤى للتدريب</b><small>DAR AL-RUYA TRAINING</small></div>
  </div>
  <div style="text-align: center"><h1>{{ $heading }}</h1></div>
  <div class="rp-full-who"><b>{{ $user->name }}</b><br />{{ $dateText }} · {{ $timeText }}</div>
</header>
