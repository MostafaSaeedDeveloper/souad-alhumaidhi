@extends('layouts.app')

@php
    use Illuminate\Support\Facades\Storage;
    use App\Support\Categories;
    $title = 'معرض الصور';
    $description = 'معرض صور موثقة لسيدة الأعمال سعاد الحميضي.';
@endphp

@section('content')

@include('partials.page-hero', [
  'kicker' => 'لحظات موثقة',
  'heading' => 'معرض الصور',
  'crumbs' => ['معرض الصور' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    @if($categories->isNotEmpty())
      <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
        <a href="{{ route('gallery.index') }}" class="btn-outline-dark-sm {{ !$category ? 'active' : '' }}">الكل</a>
        @foreach($categories as $cat)
          <a href="{{ route('gallery.index', ['category' => $cat]) }}" class="btn-outline-dark-sm">{{ Categories::label($cat) }}</a>
        @endforeach
      </div>
    @endif

    @if($galleryItems->isNotEmpty())
      <div class="gallery-grid">
        @foreach($galleryItems as $g)
          <a href="{{ Storage::url($g->image) }}" class="glightbox" data-glightbox="title: {{ $g->caption }}">
            <img src="{{ Storage::url($g->image) }}" alt="{{ $g->alt }}" loading="lazy">
            <span class="overlay">{{ $g->caption }}</span>
          </a>
        @endforeach
      </div>
      <div class="mt-5">{{ $galleryItems->links() }}</div>
    @else
      @include('partials.empty-state', ['text' => 'لا تتوفر حاليًا صور موثقة الحقوق للنشر. سيتم تحديث المعرض فور توفر صور بحقوق نشر واضحة، ويمكن رفعها عبر لوحة الإدارة.'])
    @endif
  </div>
</section>

@endsection
