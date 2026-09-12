@extends('layouts.app')

@php
    $title = 'اللقاءات والإعلام';
    $description = 'لقاءات ومقابلات إعلامية موثقة لسيدة الأعمال سعاد الحميضي.';
@endphp

@section('content')

@include('partials.page-hero', [
  'kicker' => 'أفكار ملهمة .. ورؤى واقعية',
  'heading' => 'اللقاءات والإعلام',
  'crumbs' => ['اللقاءات والإعلام' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    @if($mediaItems->isNotEmpty())
      <div class="row g-4">
        @foreach($mediaItems as $m)
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <div class="video-card h-100">
              <div class="video-thumb" data-video-embed="{{ $m->embedUrl() }}" data-video-title="{{ $m->title }}">
                @if($m->thumbnail)
                  <img src="{{ $m->thumbnail }}" alt="{{ $m->title }}" loading="lazy">
                @else
                  <div class="portrait-placeholder"><i class="bi bi-camera-video fs-1"></i></div>
                @endif
                <div class="video-play"><span><i class="bi bi-play-fill"></i></span></div>
              </div>
              <div class="video-meta">
                <h6 class="fs-6 mb-1">{{ $m->title }}</h6>
                <p class="small text-secondary mb-0">{{ $m->channel_name }}</p>
                @if($m->published_at)<p class="small text-secondary mb-0">{{ $m->published_at->format('Y/m/d') }}</p>@endif
                <a href="{{ route('media.show', $m) }}" class="small fw-semibold d-inline-block mt-2" style="color:var(--c-gold)">التفاصيل <i class="bi bi-arrow-left"></i></a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-5">{{ $mediaItems->links() }}</div>
    @else
      @include('partials.empty-state', ['text' => 'سيتم إضافة اللقاءات الإعلامية الموثقة قريبًا.'])
    @endif
  </div>
</section>

@endsection
