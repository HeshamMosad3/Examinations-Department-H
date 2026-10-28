<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>@yield('title', cms('global.seo.title', 'دار الرؤى للتدريب | Dar Al-Ruya Training'))</title>
  <meta name="description" content="@yield('description', cms('global.seo.description', 'دار الرؤى للتدريب - منصة رائدة في التدريب والتطوير وبناء المهارات القيادية.'))" />
  <meta name="theme-color" content="#204A7A" />
  <link rel="icon" type="image/png" href="/assets/website/images/logo.png" />

  {{-- Bootstrap 5 (RTL) + jQuery + FontAwesome + fonts: installed with npm and bundled by Vite (no CDN).
       This layout does NOT load the Tailwind bundle, so the two frameworks never clash. --}}
  {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('assets/website/build')->withEntryPoints(['resources/landing/bootstrap/app.js']) }}
  @stack('vite')
</head>
<body class="bs-page">
  <a href="#main-content" class="visually-hidden-focusable bs-skip-link">{{ cms('global.a11y.skip_link', 'تخطي إلى المحتوى الرئيسي') }}</a>

  @include('website.bootstrap.partials.header', ['active' => $active ?? null])

  <main id="main-content">
    @yield('content')
  </main>

  @include('website.bootstrap.partials.footer')
</body>
</html>
