@php
    $fi = '/assets/website/images/footer';
    $services = ['التدريب الفردي', 'التدريب المؤسسي', 'التعلم الإلكتروني', 'الشهادات الدولية', 'المقاييس والتقييم'];
    $links = [['الرئيسية', url('/')], ['الدورات', url('/courses')], ['الشهادات', url('/#certifications')], ['المقاييس', url('/#assessments')], ['عن دار الرؤى', url('/#about')]];
@endphp
{{-- ==================== FOOTER (same look as the main site footer) ==================== --}}
<footer id="contact" class="bs-footer" role="contentinfo">
  <div class="bs-footer-inner">

    <div class="bs-footer-cols">
      {{-- Logo & social --}}
      <div class="bs-fcol bs-fcol-brand">
        <img src="/assets/website/images/footer-logo.png" alt="شعار دار الرؤى للتدريب" class="bs-footer-logo" />
        <p class="bs-footer-tagline">مع دار الرؤى للتدريب... نصنع مستقبلك بخبرات علمية ومهارات عملية.</p>
        <div class="d-flex align-items-center gap-2">
          <a href="#" class="bs-social" aria-label="حساب دار الرؤى على إكس"><img src="{{ $fi }}/x.svg" alt="" aria-hidden="true" width="31" height="31" /></a>
          <a href="#" class="bs-social bs-social-bordered" aria-label="حساب دار الرؤى على إنستغرام"><img src="{{ $fi }}/instagram.svg" alt="" aria-hidden="true" width="20" height="20" /></a>
          <a href="#" class="bs-social bs-social-bordered" aria-label="قناة دار الرؤى على يوتيوب"><img src="{{ $fi }}/youtube.svg" alt="" aria-hidden="true" width="20" height="20" /></a>
        </div>
      </div>

      {{-- Services (hidden on phones, like the main site) --}}
      <div class="bs-fcol bs-fcol-services d-none d-md-block">
        <div class="bs-fhead"><h4>خدماتنا</h4><span class="bs-fhead-mark" dir="ltr"><i></i><b></b></span></div>
        <ul class="bs-flist">
          @foreach ($services as $s)
            <li><a href="{{ url('/courses') }}">{{ $s }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Quick links --}}
      <div class="bs-fcol bs-fcol-links">
        <div class="bs-fhead"><h4>روابط سريعة</h4><span class="bs-fhead-mark" dir="ltr"><i></i><b></b></span></div>
        <ul class="bs-flist">
          @foreach ($links as [$label, $href])
            <li><a href="{{ $href }}">{{ $label }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Contact --}}
      <div class="bs-fcol bs-fcol-contact">
        <div class="bs-fhead"><h4>تواصل معنا</h4><span class="bs-fhead-mark" dir="ltr"><i></i><b></b></span></div>
        <ul class="bs-flist bs-flist-contact">
          <li><img src="{{ $fi }}/location.svg" alt="" aria-hidden="true" /><span>الرياض - المملكة العربية السعودية</span></li>
          <li><img src="{{ $fi }}/phone.svg" alt="" aria-hidden="true" /><a href="tel:+966557595769" dir="ltr">+966 55 759 5769</a></li>
          <li><img src="{{ $fi }}/email.svg" alt="" aria-hidden="true" /><a href="mailto:info@alruaa.com" dir="ltr">info@alruaa.com</a></li>
          <li><img src="{{ $fi }}/clock.svg" alt="" aria-hidden="true" /><span>الأحد–الخميس: 9ص–6م</span></li>
        </ul>
      </div>
    </div>

    <hr class="bs-footer-divider" />

    <div class="bs-footer-rights">
      <p class="mb-0">جميع الحقوق محفوظة لـ مركز دار الرؤى للتدريب © 2026</p>
      <div class="d-flex align-items-center justify-content-center gap-4">
        <a href="#">الشروط والأحكام</a>
        <a href="#">سياسة الخصوصية</a>
      </div>
    </div>

  </div>
</footer>
