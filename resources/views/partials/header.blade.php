@php
    $navItems = [
        ['label' => 'الرئيسية', 'route' => route('home')],
        ['label' => 'السيرة الذاتية', 'route' => route('biography')],
        ['label' => 'الإنجازات', 'route' => route('achievements.index')],
        ['label' => 'اللقاءات والإعلام', 'route' => route('media.index')],
        ['label' => 'معرض الصور', 'route' => route('gallery.index')],
        ['label' => 'مبادراتها', 'route' => route('initiatives.index')],
        ['label' => 'مقالاتها', 'route' => route('articles.index')],
        ['label' => 'تواصل', 'route' => route('contact')],
    ];
@endphp
<header id="siteHeader">
  <nav class="navbar navbar-expand-lg navbar-dark container-xl">
    <a class="navbar-brand brand-mark" href="{{ route('home') }}">
      <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="19" stroke="#d4af6a" stroke-width="1"/>
        <path d="M20 8c6 8 6 16 0 24-6-8-6-16 0-24z" fill="#d4af6a"/>
        <path d="M8 20c8-6 16-6 24 0-8 6-16 6-24 0z" fill="#d4af6a" opacity=".55"/>
      </svg>
      <span>
        سعاد الحميضي
        <small>رحلة عطاء .. أثر لا ينتهي</small>
      </span>
    </a>

    <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="{{ __('فتح القائمة') }}">
      <i class="bi bi-list fs-2"></i>
    </button>

    <div class="collapse navbar-collapse d-none d-lg-flex">
      <ul class="navbar-nav mx-auto">
        @foreach ($navItems as $item)
          <li class="nav-item"><a class="nav-link" href="{{ $item['route'] }}">{{ $item['label'] }}</a></li>
        @endforeach
      </ul>
    </div>

    <div class="d-none d-lg-flex align-items-center gap-3">
      <a href="{{ route('search') }}" class="icon-btn" aria-label="{{ __('بحث') }}"><i class="bi bi-search"></i></a>
      <a href="{{ route('tributes.index') }}#tribute-form" class="btn-gold btn-sm">كلمة وفاء</a>
    </div>
  </nav>
</header>

{{-- Mobile offcanvas: kept OUTSIDE #siteHeader on purpose — the header gains
     backdrop-filter once scrolled (.scrolled), and backdrop-filter/filter on an
     ancestor creates a new containing block for position:fixed descendants in
     Chrome/WebKit, which would trap this fixed-position offcanvas inside the
     header's own (short) box instead of the full viewport. --}}
<div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="mobileMenu">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">سعاد الحميضي</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="{{ __('إغلاق') }}"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav">
      @foreach ($navItems as $item)
        <li class="nav-item mb-2"><a class="nav-link fs-5" href="{{ $item['route'] }}">{{ $item['label'] }}</a></li>
      @endforeach
    </ul>
    <hr class="border-secondary">
    <a href="{{ route('search') }}" class="nav-link fs-5 mb-2"><i class="bi bi-search ms-2"></i> بحث</a>
    <a href="{{ route('tributes.index') }}#tribute-form" class="btn-gold w-100 justify-content-center mt-2">كلمة وفاء</a>
  </div>
</div>
