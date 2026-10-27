<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'دار الرؤى للتدريب | Dar Al-Ruya Training')</title>
  <meta name="description" content="@yield('description', 'دار الرؤى للتدريب - منصة رائدة في التدريب والتطوير وبناء المهارات القيادية.')" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- Bootstrap 5 (RTL build) + FontAwesome — this layout does NOT load the Tailwind bundle, so the two never clash --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <link rel="stylesheet" href="/assets/website/bootstrap/css/theme.css" />
  @stack('styles')
</head>
<body class="bs-page">
  <a href="#main-content" class="visually-hidden-focusable bs-skip-link">تخطي إلى المحتوى الرئيسي</a>

  @include('website.bootstrap.partials.header', ['active' => $active ?? null])

  <main id="main-content">
    @yield('content')
  </main>

  @include('website.bootstrap.partials.footer')

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/website/bootstrap/js/layout.js"></script>
  @stack('scripts')
</body>
</html>
