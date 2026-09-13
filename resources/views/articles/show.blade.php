@extends('layouts.app')

@php
    $title = $article->title;
    $description = \Illuminate\Support\Str::limit($article->excerpt, 155);
    $ogType = 'article';
@endphp

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "NewsArticle",
  "headline": "{{ $article->title }}",
  "datePublished": "{{ $article->published_at?->toDateString() }}",
  "author": {"@@type": "Organization", "name": "{{ $article->source_name }}"}
}
</script>
@endpush

@section('content')

@include('partials.page-hero', [
  'heading' => $article->title,
  'crumbs' => ['مقالاتها' => route('articles.index'), $article->title => null],
])

<section class="section section-cream">
  <div class="container-xl">
    <div class="row gy-5">
      <div class="col-lg-8">
        <div class="meta mb-3">{{ $article->source_name }} @if($article->published_at) · {{ $article->published_at->format('Y/m/d') }} @endif</div>
        <p class="lead text-secondary">{{ $article->excerpt }}</p>
        @if($article->content)
          <div class="text-secondary" style="white-space:pre-line">{{ $article->content }}</div>
        @endif

        @if($article->source_url)
          <a href="{{ $article->source_url }}" target="_blank" rel="noopener" class="btn-outline-dark-sm mt-3">
            قراءة المصدر الأصلي <i class="bi bi-box-arrow-up-left"></i>
          </a>
        @endif

        <div class="d-flex align-items-center gap-2 mt-4 pt-4 border-top">
          <span class="small text-secondary">مشاركة:</span>
          <a class="btn-outline-dark-sm" target="_blank" rel="noopener"
             href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}"
             aria-label="مشاركة على إكس"><i class="bi bi-twitter-x"></i></a>
          <a class="btn-outline-dark-sm" target="_blank" rel="noopener"
             href="https://api.whatsapp.com/send?text={{ urlencode($article->title.' '.url()->current()) }}"
             aria-label="مشاركة على واتساب"><i class="bi bi-whatsapp"></i></a>
          <a class="btn-outline-dark-sm" target="_blank" rel="noopener"
             href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
             aria-label="مشاركة على فيسبوك"><i class="bi bi-facebook"></i></a>
        </div>
      </div>
      <div class="col-lg-4">
        @if($related->isNotEmpty())
          <h5 class="fw-bold mb-3">مقالات ذات صلة</h5>
          <div class="d-flex flex-column gap-3">
            @foreach($related as $r)
              <a href="{{ route('articles.show', $r) }}" class="article-card d-block text-decoration-none p-3">
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
