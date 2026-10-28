@php
    $fi = '/assets/website/images/footer';
    // Same CMS keys + defaults as website/partials/footer.blade.php
    $services = [
        [cms('global.footer.service_1', 'التدريب الفردي'), cms_url('global.footer.service_1_url', url('/courses'))],
        [cms('global.footer.service_2', 'التدريب المؤسسي'), cms_url('global.footer.service_2_url', url('/courses'))],
        [cms('global.footer.service_3', 'التعلم الإلكتروني'), cms_url('global.footer.service_3_url', url('/courses'))],
        [cms('global.footer.service_4', 'الشهادات الدولية'), cms_url('global.footer.service_4_url', url('/#certifications'))],
        [cms('global.footer.service_5', 'المقاييس والتقييم'), cms_url('global.footer.service_5_url', url('/#assessments'))],
    ];
    $links = [
        [cms('global.footer.link_1', 'الرئيسية'), cms_url('global.footer.link_1_url', url('/'))],
        [cms('global.footer.link_2', 'الدورات'), cms_url('global.footer.link_2_url', url('/courses'))],
        [cms('global.footer.link_3', 'الشهادات'), cms_url('global.footer.link_3_url', url('/#certifications'))],
        [cms('global.footer.link_4', 'المقاييس'), cms_url('global.footer.link_4_url', url('/#assessments'))],
        [cms('global.footer.link_5', 'عن دار الرؤى'), cms_url('global.footer.link_5_url', url('/#about'))],
    ];
    $phone = cms('global.footer.phone', '+966 55 759 5769');
    $email = cms('global.footer.email', 'info@alruaa.com');
@endphp
{{-- ==================== FOOTER (same look as the main site footer) ==================== --}}
<footer id="contact" class="bs-footer" role="contentinfo">
  <div class="bs-footer-inner">

    <div class="bs-footer-cols">
      {{-- Logo & social --}}
      <div class="bs-fcol bs-fcol-brand">
        <img src="{{ cms_image('global.footer.logo', '/assets/website/images/footer-logo.png') }}" alt="شعار دار الرؤى للتدريب" class="bs-footer-logo" />
        <p class="bs-footer-tagline">{{ cms('global.footer.tagline', 'مع دار الرؤى للتدريب... نصنع مستقبلك بخبرات علمية ومهارات عملية.') }}</p>
        <div class="d-flex align-items-center gap-2">
          <a href="{{ cms_url('global.footer.x_url', '#') }}" class="bs-social" rel="noopener noreferrer" aria-label="حساب دار الرؤى للتدريب على منصة إكس"><img src="{{ $fi }}/x.svg" alt="" aria-hidden="true" width="31" height="31" /></a>
          <a href="{{ cms_url('global.footer.instagram_url', '#') }}" class="bs-social bs-social-bordered" rel="noopener noreferrer" aria-label="حساب دار الرؤى للتدريب على إنستغرام"><img src="{{ $fi }}/instagram.svg" alt="" aria-hidden="true" width="20" height="20" /></a>
          <a href="{{ cms_url('global.footer.youtube_url', '#') }}" class="bs-social bs-social-bordered" rel="noopener noreferrer" aria-label="قناة دار الرؤى للتدريب على يوتيوب"><img src="{{ $fi }}/youtube.svg" alt="" aria-hidden="true" width="20" height="20" /></a>
        </div>
      </div>

      {{-- Services (hidden on phones, like the main site) --}}
      <div class="bs-fcol bs-fcol-services d-none d-md-block">
        <div class="bs-fhead"><h4>{{ cms('global.footer.services_title', 'خدماتنا') }}</h4><span class="bs-fhead-mark" dir="ltr"><i></i><b></b></span></div>
        <ul class="bs-flist">
          @foreach ($services as [$label, $href])
            <li><a href="{{ $href }}">{{ $label }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Quick links --}}
      <div class="bs-fcol bs-fcol-links">
        <div class="bs-fhead"><h4>{{ cms('global.footer.links_title', 'روابط سريعة') }}</h4><span class="bs-fhead-mark" dir="ltr"><i></i><b></b></span></div>
        <ul class="bs-flist">
          @foreach ($links as [$label, $href])
            <li><a href="{{ $href }}">{{ $label }}</a></li>
          @endforeach
        </ul>
      </div>

      {{-- Contact --}}
      <div class="bs-fcol bs-fcol-contact">
        <div class="bs-fhead"><h4>{{ cms('global.footer.contact_title', 'تواصل معنا') }}</h4><span class="bs-fhead-mark" dir="ltr"><i></i><b></b></span></div>
        <ul class="bs-flist bs-flist-contact">
          <li><img src="{{ $fi }}/location.svg" alt="" aria-hidden="true" /><span>{{ cms('global.footer.address', 'الرياض - المملكة العربية السعودية') }}</span></li>
          <li><img src="{{ $fi }}/phone.svg" alt="" aria-hidden="true" /><a href="{{ cms_url('global.footer.phone_url', 'tel:+966557595769') }}" dir="ltr" aria-label="الاتصال بالهاتف: {{ $phone }}">{{ $phone }}</a></li>
          <li><img src="{{ $fi }}/email.svg" alt="" aria-hidden="true" /><a href="mailto:{{ $email }}" dir="ltr" aria-label="إرسال بريد إلكتروني: {{ $email }}">{{ $email }}</a></li>
          <li><img src="{{ $fi }}/clock.svg" alt="" aria-hidden="true" /><span>{{ cms('global.footer.hours', 'الأحد–الخميس: 9ص–6م') }}</span></li>
        </ul>
      </div>
    </div>

    <hr class="bs-footer-divider" />

    <div class="bs-footer-rights">
      <p class="mb-0">{{ cms('global.footer.copyright', 'جميع الحقوق محفوظة لـ مركز دار الرؤى للتدريب © 2026') }}</p>
      <div class="d-flex align-items-center justify-content-center gap-4">
        <a href="{{ cms_url('global.footer.terms_url', '#') }}">{{ cms('global.footer.terms', 'الشروط والأحكام') }}</a>
        <a href="{{ cms_url('global.footer.privacy_url', '#') }}">{{ cms('global.footer.privacy', 'سياسة الخصوصية') }}</a>
      </div>
    </div>

  </div>
</footer>
