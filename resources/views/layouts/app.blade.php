<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'سعاد الحميضي — رحلة عطاء.. أثر لا ينتهي')</title>
    <meta name="description" content="@yield('description', 'موقع تكريمي يوثق مسيرة الراحلة سعاد حمد الصالح الحميضي، أول سيدة أعمال كويتية.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="سعاد الحميضي">
    <meta property="og:title" content="@yield('title', 'سعاد الحميضي — رحلة عطاء.. أثر لا ينتهي')">
    <meta property="og:description" content="@yield('description', 'موقع تكريمي يوثق مسيرة الراحلة سعاد حمد الصالح الحميضي.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/img/og-image.png') }}">
    <meta property="og:locale" content="ar_AR">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'سعاد الحميضي')">
    <meta name="twitter:description" content="@yield('description', 'موقع تكريمي يوثق مسيرة الراحلة سعاد حمد الصالح الحميضي.')">
    <meta name="twitter:image" content="{{ asset('assets/img/og-image.png') }}">

    <link rel="preload" as="font" href="{{ asset('assets/fonts/notokufi-700.woff2') }}" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    @stack('schema')
</head>
<body>
    <a href="#main-content" class="skip-link">تخطَّ إلى المحتوى الرئيسي</a>

    @include('partials.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.video-modal')

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/glightbox/glightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.AOS && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                AOS.init({ duration: 700, once: true, offset: 60 });
            }
            if (window.GLightbox) {
                GLightbox({ selector: '.glightbox' });
            }
        });
    </script>
</body>
</html>
