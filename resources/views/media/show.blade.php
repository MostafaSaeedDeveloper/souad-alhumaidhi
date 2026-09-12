@extends('layouts.app')

@php
    $title = $media->title;
    $description = \Illuminate\Support\Str::limit($media->description, 155);
@endphp

@section('content')

@include('partials.page-hero', [
  'heading' => $media->title,
  'crumbs' => ['اللقاءات والإعلام' => route('media.index'), $media->title => null],
])

<section class="section section-cream">
  <div class="container-xl">
    <div class="row gy-5">
      <div class="col-lg-8">
        <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm mb-4">
          @if($media->embedUrl())
            <iframe src="{{ $media->embedUrl() }}" title="{{ $media->title }}" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
          @else
            <div class="portrait-placeholder"><i class="bi bi-camera-video fs-1"></i></div>
          @endif
        </div>
        <p class="text-secondary">{{ $media->description }}</p>
        <p class="small text-secondary">{{ $media->channel_name }} @if($media->published_at) · {{ $media->published_at->format('Y/m/d') }} @endif</p>

        @if($media->source_url)
          <a href="{{ $media->source_url }}" target="_blank" rel="noopener" class="btn-outline-dark-sm">
            مشاهدة المصدر الأصلي <i class="bi bi-box-arrow-up-left"></i>
          </a>
        @endif
      </div>
      <div class="col-lg-4">
        @if($related->isNotEmpty())
          <h5 class="fw-bold mb-3">لقاءات أخرى</h5>
          <div class="d-flex flex-column gap-3">
            @foreach($related as $r)
              <a href="{{ route('media.show', $r) }}" class="video-card d-block text-decoration-none">
                <div class="video-meta">
                  <h6 class="fs-6 mb-0">{{ $r->title }}</h6>
                </div>
              </a>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

@endsection
