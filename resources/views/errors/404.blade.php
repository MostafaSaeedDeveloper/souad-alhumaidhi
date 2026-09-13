@extends('layouts.app')

@php $title = 'الصفحة غير موجودة'; @endphp

@section('content')
<section class="page-hero">
  <div class="container-xl">
    <span class="section-kicker">404</span>
    <h1 class="mt-2">الصفحة غير موجودة</h1>
  </div>
</section>
<section class="section section-cream text-center">
  <div class="container-xl">
    <i class="bi bi-flower2" style="font-size:3rem;color:var(--c-gold)"></i>
    <p class="mt-3 text-secondary">عذرًا، الصفحة التي تبحث عنها غير متاحة أو تم نقلها.</p>
    <a href="{{ route('home') }}" class="btn-gold mt-2">العودة إلى الرئيسية</a>
  </div>
</section>
@endsection
