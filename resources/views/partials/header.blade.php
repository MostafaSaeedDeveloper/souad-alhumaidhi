@php
    $navItems = [
        ['route' => 'home', 'label' => 'الرئيسية'],
        ['route' => 'biography', 'label' => 'السيرة الذاتية'],
        ['route' => 'achievements', 'label' => 'الإنجازات'],
        ['route' => 'media', 'label' => 'اللقاءات والإعلام'],
        ['route' => 'gallery', 'label' => 'الصور'],
        ['route' => 'initiatives', 'label' => 'مبادراتها'],
    ];
@endphp
<header class="site-header">
    <nav class="navbar navbar-expand-lg" aria-label="التنقل الرئيسي">
        <div class="container-xl-custom d-flex align-items-center justify-content-between">
            <a class="navbar-brand-ar" href="{{ route('home') }}">
                سعاد الحميضي
                <span class="navbar-brand-tagline">رحلة عطاء.. أثر لا ينتهي</span>
            </a>

            <button class="navbar-toggler border-0 text-white d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNav" aria-controls="mobileNav" aria-label="فتح القائمة">
                <i class="bi bi-list fs-2 text-white"></i>
            </button>

            <div class="d-none d-lg-flex align-items-center gap-2">
                <ul class="navbar-nav flex-row gap-1 mb-0">
                    @foreach ($navItems as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}" href="{{ route($item['route']) }}">{{ $item['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('press') }}#contact" class="btn-gold-outline">تواصل</a>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="mobileNav" style="background:var(--color-charcoal);">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title navbar-brand-ar">سعاد الحميضي</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="إغلاق"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav gap-2">
                @foreach ($navItems as $item)
                    <li class="nav-item">
                        <a class="nav-link fs-5 {{ request()->routeIs($item['route']) ? 'active' : '' }}" href="{{ route($item['route']) }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach
                <li class="nav-item"><a class="nav-link fs-5" href="{{ route('press') }}">في الصحافة</a></li>
                <li class="nav-item"><a class="nav-link fs-5" href="{{ route('sources') }}">المصادر</a></li>
            </ul>
        </div>
    </div>
</header>
