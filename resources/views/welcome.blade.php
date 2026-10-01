<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ø¯Ø§Ø± Ø§Ù„Ø±Ø¤Ù‰ Ù„Ù„ØªØ¯Ø±ÙŠØ¨ | Dar Al-Ruya Training</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="/images/logo.png" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- FontAwesome Icons for crisp UI symbols -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Local compiled styles via Vite -->
  @vite(['resources/css/app.css', 'resources/js/home.js'])

  <style>
    @keyframes marqueeRight {
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
  <!-- Top anchor for Home (#home) navigation -->
  <div id="home" class="absolute top-0 left-0 w-full h-0 pointer-events-none"></div>

  <!-- 1. Floating Nav-Bar & Mobile Drawer -->
  @include('home.components.navbar')

  <!-- Main Container -->
  <main class="w-full mx-auto overflow-hidden relative">
    <!-- 2. Hero Section & Life Wheel -->
    @include('home.components.hero')

    <!-- 3. Perceptual Patterns Section -->
    @include('home.components.perceptual-patterns')

    <!-- 4. Seven Personality Keys Section -->
    @include('home.components.personality-keys')

    <!-- 5. Quick Challenge Section -->
    @include('home.components.quick-challenge')

    <!-- 6. Courses Section -->
    @include('home.components.courses')

    <!-- 7. Certifications Section -->
    @include('home.components.certifications')

    <!-- 8. Testimonials Section -->
    @include('home.components.testimonials')

    <!-- 9. Success Partners Section -->
    @include('home.components.partners')
  </main>

  <!-- 10. Footer & Rights -->
  @include('home.components.footer')

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
  

  <!-- 11. Login Modal -->
  @include('home.components.login-modal')

</body>
</html>

