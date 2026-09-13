@extends('layouts.app')

@php
    use App\Support\Categories;
    use App\Support\Media;
    $title = $achievement->title;
    $description = \Illuminate\Support\Str::limit($achievement->summary, 155);
    $achievementImageUrl = Media::url($achievement->image);
@endphp

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Article",
  "headline": "{{ $achievement->title }}",
  "datePublished": "{{ $achievement->created_at?->toDateString() }}",
  "about": "سعاد الحميضي"
}
</script>
@endpush

@section('content')

@include('partials.page-hero', [
  'kicker' => Categories::label($achievement->category),
  'heading' => $achievement->title,
  'crumbs' => ['الإنجازات' => route('achievements.index'), $achievement->title => null],
])

<section class="section section-cream">
  <div class="container-xl">
    <div class="row gy-5">
      <div class="col-lg-8">
        @if($achievementImageUrl)
          <img src="{{ $achievementImageUrl }}" alt="{{ $achievement->title }}" class="w-100 rounded-3 mb-4" style="aspect-ratio:16/9;object-fit:cover;">
        @endif
        <p class="lead text-secondary">{{ $achievement->summary }}</p>
        @if($achievement->content)
          <div class="text-secondary" style="white-space:pre-line">{{ $achievement->content }}</div>
        @endif

        @if($achievement->source_name)
          <div class="border rounded-3 p-3 mt-4 small" style="border-color:var(--c-border)!important">
            <strong>المصدر:</strong> {{ $achievement->source_name }}
            @if($achievement->source_url)
              — <a href="{{ $achievement->source_url }}" target="_blank" rel="noopener">رابط المصدر <i class="bi bi-box-arrow-up-left"></i></a>
            @endif
          </div>
        @endif

        <a href="{{ route('achievements.index') }}" class="btn-outline-dark-sm mt-4"><i class="bi bi-arrow-right"></i> العودة إلى الإنجازات</a>
      </div>

      <div class="col-lg-4">
        @if($related->isNotEmpty())
          <h5 class="fw-bold mb-3">إنجازات ذات صلة</h5>
          <div class="d-flex flex-column gap-3">
            @foreach($related as $r)
              <a href="{{ route('achievements.show', $r) }}" class="gold-card d-block text-decoration-none">
                <h6 class="fw-bold mb-1">{{ $r->title }}</h6>
                <p class="small text-secondary mb-0">{{ \Illuminate\Support\Str::limit($r->summary, 70) }}</p>
              </a>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

@endsection
