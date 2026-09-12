@extends('layouts.app')

@php
    use App\Support\Media;
    $title = $initiative->title;
    $description = \Illuminate\Support\Str::limit($initiative->summary, 155);
    $initiativeImageUrl = Media::url($initiative->image);
@endphp

@section('content')

@include('partials.page-hero', [
  'heading' => $initiative->title,
  'crumbs' => ['مبادراتها' => route('initiatives.index'), $initiative->title => null],
])

<section class="section section-cream">
  <div class="container-xl">
    <div class="row gy-5">
      <div class="col-lg-8">
        @if($initiativeImageUrl)
          <img src="{{ $initiativeImageUrl }}" alt="{{ $initiative->title }}" class="w-100 rounded-3 mb-4" style="aspect-ratio:16/9;object-fit:cover;">
        @endif
        <p class="lead text-secondary">{{ $initiative->summary }}</p>
        @if($initiative->content)
          <div class="text-secondary" style="white-space:pre-line">{{ $initiative->content }}</div>
        @endif
        @if($initiative->source_name)
          <div class="border rounded-3 p-3 mt-4 small" style="border-color:var(--c-border)!important">
            <strong>المصدر:</strong> {{ $initiative->source_name }}
            @if($initiative->source_url)
              — <a href="{{ $initiative->source_url }}" target="_blank" rel="noopener">رابط المصدر</a>
            @endif
          </div>
        @endif
        <a href="{{ route('initiatives.index') }}" class="btn-outline-dark-sm mt-4"><i class="bi bi-arrow-right"></i> العودة إلى المبادرات</a>
      </div>
      <div class="col-lg-4">
        @if($related->isNotEmpty())
          <h5 class="fw-bold mb-3">مبادرات أخرى</h5>
          <div class="d-flex flex-column gap-3">
            @foreach($related as $r)
              <a href="{{ route('initiatives.show', $r) }}" class="gold-card d-block text-decoration-none">
                <h6 class="fw-bold mb-0">{{ $r->title }}</h6>
              </a>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

@endsection
