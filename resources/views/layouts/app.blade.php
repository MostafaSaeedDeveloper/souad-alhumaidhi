<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

@php
    $seoTitle = trim(($title ?? null) ? $title.' | سعاد الحميضي' : 'سعاد الحميضي | رحلة عطاء .. أثر لا ينتهي');
    $seoDescription = $description ?? 'موقع تكريمي يوثق مسيرة سيدة الأعمال الكويتية الراحلة سعاد الحميضي (1939 - 2017)، وإرثها الإنساني والمهني، وأبرز محطاتها وإنجازاتها ومبادراتها.';
    $seoImage = $image ?? asset('assets/img/og-cover.svg');
@endphp

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<link rel="canonical" href="{{ url()->current() }}">

<meta property="og:type" content="{{ $ogType ?? 'website' }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:locale" content="ar_AR">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

@stack('schema')

<link rel="icon" href="data:image/svg+xml,{{ rawurlencode('<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 40 40\'><circle cx=\'20\' cy=\'20\' r=\'19\' fill=\'%231b1712\'/><path d=\'M20 8c6 8 6 16 0 24-6-8-6-16 0-24z\' fill=\'%23d4af6a\'/></svg>') }}">

{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&family=Noto+Kufi+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- Bootstrap 5 RTL --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
{{-- AOS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
{{-- Swiper --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
{{-- GLightbox --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css">

<link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">

@stack('styles')
</head>
<body>

<div id="scrollProgress"></div>

@include('partials.header')

<main>
    @yield('content')
</main>

@include('partials.footer')

<button id="backToTop" aria-label="{{ __('العودة إلى الأعلى') }}"><i class="bi bi-arrow-up"></i></button>

{{-- Video Modal --}}
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-dark text-white border-0">
      <div class="modal-header border-0">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('إغلاق') }}"></button>
      </div>
      <div class="modal-body pt-0">
        <div class="ratio ratio-16x9"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/js/glightbox.min.js"></script>
<script src="{{ asset('assets/js/site.js') }}"></script>
@stack('scripts')
</body>
</html>
