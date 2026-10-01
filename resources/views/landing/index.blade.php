<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>دار الرؤى للتدريب | Dar Al-Ruya Training</title>
  
  <meta name="description" content="دار الرؤى للتدريب - منصة رائدة في التدريب والتطوير وبناء المهارات القيادية والمقاييس الشخصية المتقدمة مثل اختبار عجلة الحياة المعتمد في المملكة العربية السعودية." />
  <meta name="keywords" content="دار الرؤى, تدريب, عجلة الحياة, مقاييس شخصية, دورات قيادية, شهادات احترافية, تطوير الذات, السعودية" />
  <meta name="robots" content="index, follow" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="canonical" href="https://alruaa.com/" />

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://alruaa.com/" />
  <meta property="og:title" content="دار الرؤى للتدريب | Dar Al-Ruya Training" />
  <meta property="og:description" content="اكتشف نفسك وابدأ رحلة تطورك مع مقاييس ذكية لفهم ذاتك وتوازنك في الحياة من دار الرؤى للتدريب." />
  <meta property="og:image" content="https://alruaa.com/images/hero_cover.png" />
  <meta property="og:locale" content="ar_SA" />
  <meta property="og:site_name" content="دار الرؤى للتدريب" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:url" content="https://alruaa.com/" />
  <meta name="twitter:title" content="دار الرؤى للتدريب | Dar Al-Ruya Training" />
  <meta name="twitter:description" content="اكتشف نفسك وابدأ رحلة تطورك مع مقاييس ذكية لفهم ذاتك وتوازنك في الحياة من دار الرؤى للتدريب." />
  <meta name="twitter:image" content="https://alruaa.com/images/hero_cover.png" />

  <!-- Structured Data (Schema.org) -->
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@graph": [
      {
        "@@type": "EducationalOrganization",
        "@@id": "https://alruaa.com/#organization",
        "name": "دار الرؤى للتدريب",
        "alternateName": "Dar Al-Ruya Training",
        "url": "https://alruaa.com/",
        "logo": "https://alruaa.com/images/logo.png",
        "image": "https://alruaa.com/images/hero_cover.png",
        "description": "مركز رائد يقدم برامج تدريبية وتطويرية معتمدة ومقاييس ذكية لاكتشاف الذات وتطوير المهارات القيادية والشخصية.",
        "address": {
          "@@type": "PostalAddress",
          "addressLocality": "الرياض",
          "addressCountry": "SA"
        },
        "contactPoint": {
          "@@type": "ContactPoint",
          "telephone": "+966557595769",
          "contactType": "customer service",
          "availableLanguage": "Arabic"
        },
        "sameAs": [
          "https://twitter.com/",
          "https://instagram.com/",
          "https://youtube.com/"
        ]
      },
      {
        "@@type": "WebSite",
        "@@id": "https://alruaa.com/#website",
        "url": "https://alruaa.com/",
        "name": "دار الرؤى للتدريب",
        "publisher": {
          "@@id": "https://alruaa.com/#organization"
        },
        "inLanguage": "ar"
      }
    ]
  }
  </script>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="/landing/images/logo.png" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- FontAwesome Icons for crisp UI symbols -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Local compiled styles via Vite -->
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css', 'resources/landing/js/main.js']) }}

  <style>
    @@keyframes marqueeRight {
      0% { transform: translateX(calc(-100% / 3)); }
      100% { transform: translateX(0%); }
    }
    .animate-marquee-right {
      animation: marqueeRight 40s linear infinite;
      will-change: transform;
      contain: layout paint;
    }
  </style>
</head>
<body class="bg-[#F8FAFC] text-brand-dark min-h-screen font-cairo antialiased selection:bg-brand-primary selection:text-white relative">
  <!-- Skip to Main Content Link for Keyboard Accessibility -->
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:right-4 focus:z-[999] focus:px-5 focus:py-3 focus:bg-brand-primary focus:text-white focus:rounded-xl focus:shadow-xl focus:outline-none">
    تخطي إلى المحتوى الرئيسي
  </a>

  <!-- Top anchor for Home (#home) navigation -->
  <div id="home" class="absolute top-0 left-0 w-full h-0 pointer-events-none"></div>

  <!-- 1. Floating Nav-Bar & Mobile Drawer -->
  @include('landing.partials.navbar')

  <!-- Main Container -->
  <main id="main-content" class="w-full mx-auto overflow-hidden relative">
    <!-- 2. Hero Section & Life Wheel -->
    @include('landing.partials.hero')

    <!-- 3. Perceptual Patterns Section -->
    @include('landing.partials.perceptual-patterns')

    <!-- 4. Seven Personality Keys Section -->
    @include('landing.partials.personality-keys')

    <!-- 5. Quick Challenge Section -->
    @include('landing.partials.quick-challenge')

    <!-- 6. Courses Section -->
    @include('landing.partials.courses')

    <!-- 7. Certifications Section -->
    @include('landing.partials.certifications')

    <!-- 8. Testimonials Section -->
    @include('landing.partials.testimonials')

    <!-- 9. Success Partners Section -->
    @include('landing.partials.partners')
  </main>

  <!-- 10. Footer & Rights -->
  @include('landing.partials.footer')

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

  <!-- 11. Login Modal -->
  @include('landing.partials.login-modal')

</body>
</html>
