@extends('layouts.app')

@php
    use Illuminate\Support\Str;
    $title = 'مقالات وأخبار';
    $description = 'مقالات وتغطيات صحفية موثقة عن سيدة الأعمال سعاد الحميضي.';
@endphp

@section('content')

@include('partials.page-hero', [
  'kicker' => 'في الأخبار',
  'heading' => 'مقالات وأخبار',
  'crumbs' => ['مقالاتها' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    @if($articles->isNotEmpty())
      <div class="row g-4">
        @foreach($articles as $article)
          <div class="col-md-4" data-aos="fade-up">
            <div class="article-card h-100">
              <div class="portrait-placeholder light" style="aspect-ratio:16/10;"><i class="bi bi-newspaper fs-2"></i></div>
              <div class="body">
                <div class="meta mb-2">{{ $article->source_name }} @if($article->published_at) · {{ $article->published_at->format('Y/m/d') }} @endif</div>
                <h6 class="fs-6 fw-bold">{{ $article->title }}</h6>
                <p class="small text-secondary">{{ Str::limit($article->excerpt, 100) }}</p>
                <a href="{{ route('articles.show', $article) }}" class="small fw-semibold" style="color:var(--c-gold)">اقرأ المزيد <i class="bi bi-arrow-left"></i></a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-5">{{ $articles->links() }}</div>
    @else
      @include('partials.empty-state', ['text' => 'سيتم إضافة المقالات والأخبار الموثقة قريبًا.'])
    @endif
  </div>
</section>

@endsection
