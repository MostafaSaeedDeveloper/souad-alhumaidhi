<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title ?? 'لوحة الإدارة' }} | إدارة موقع سعاد الحميضي</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
  body{ font-family:"IBM Plex Sans Arabic", sans-serif; background:#f5f3ee; }
  #adminSidebar{ width:250px; min-height:100vh; background:#1b1712; color:#efe7d6; position:fixed; top:0; right:0; }
  #adminSidebar a{ color:#efe7d6; display:block; padding:.65rem 1.25rem; border-radius:.4rem; }
  #adminSidebar a:hover, #adminSidebar a.active{ background:#332b21; color:#d4af6a; }
  #adminSidebar .brand{ padding:1.25rem; font-weight:700; color:#d4af6a; border-bottom:1px solid rgba(255,255,255,.1); }
  #adminContent{ margin-right:250px; padding:2rem; }
  @media (max-width: 991.98px){ #adminSidebar{ width:100%; min-height:auto; position:static; } #adminContent{ margin-right:0; } }
  .stat-card{ background:#fff; border:1px solid #e4d9c3; border-radius:.6rem; padding:1.25rem; }
  .table thead{ background:#f3ead9; }
</style>
</head>
<body>

<div class="d-flex flex-wrap">
  <aside id="adminSidebar">
    <div class="brand">لوحة إدارة سعاد الحميضي</div>
    <nav class="p-3 d-flex flex-column gap-1">
      <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 ms-2"></i> الرئيسية</a>
      <a href="{{ route('admin.biography.edit') }}"><i class="bi bi-person-badge ms-2"></i> السيرة الذاتية</a>
      <a href="{{ route('admin.timeline.index') }}"><i class="bi bi-clock-history ms-2"></i> الخط الزمني</a>
      <a href="{{ route('admin.achievements.index') }}"><i class="bi bi-award ms-2"></i> الإنجازات</a>
      <a href="{{ route('admin.media.index') }}"><i class="bi bi-camera-video ms-2"></i> اللقاءات والفيديو</a>
      <a href="{{ route('admin.gallery.index') }}"><i class="bi bi-images ms-2"></i> معرض الصور</a>
      <a href="{{ route('admin.initiatives.index') }}"><i class="bi bi-heart ms-2"></i> المبادرات</a>
      <a href="{{ route('admin.articles.index') }}"><i class="bi bi-newspaper ms-2"></i> المقالات</a>
      <a href="{{ route('admin.quotes.index') }}"><i class="bi bi-chat-quote ms-2"></i> الاقتباسات</a>
      <a href="{{ route('admin.outlets.index') }}"><i class="bi bi-broadcast ms-2"></i> الجهات الإعلامية</a>
      <a href="{{ route('admin.press.index') }}"><i class="bi bi-newspaper ms-2"></i> ذكر صحفي</a>
      <a href="{{ route('admin.tributes.index') }}"><i class="bi bi-envelope-heart ms-2"></i> كلمات الوفاء</a>
      <a href="{{ route('admin.contact-messages.index') }}"><i class="bi bi-envelope ms-2"></i> رسائل التواصل</a>
      <a href="{{ route('admin.settings.edit') }}"><i class="bi bi-gear ms-2"></i> الإعدادات</a>
      <hr class="border-secondary">
      <a href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-left ms-2"></i> عرض الموقع</a>
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button class="btn btn-link text-danger w-100 text-start p-0 ps-2" style="text-decoration:none;"><i class="bi bi-box-arrow-right ms-2"></i> تسجيل الخروج</button>
      </form>
    </nav>
  </aside>

  <main id="adminContent" class="flex-fill">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h4 mb-0">{{ $title ?? 'لوحة الإدارة' }}</h1>
      <span class="text-secondary small">{{ auth()->user()->name ?? '' }}</span>
    </div>

    @if(session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
      </div>
    @endif

    @yield('content')
  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
