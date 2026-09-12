@extends('layouts.app')

@php
    use App\Support\Media;
    use Illuminate\Support\Str;
    $title = 'مبادراتها';
    $description = 'مبادرات مجتمعية وإنسانية موثقة لسيدة الأعمال سعاد الحميضي.';
@endphp

@section('content')

@include('partials.page-hero', [
  'kicker' => 'استمرار الأثر',
  'heading' => 'مبادراتها',
  'crumbs' => ['مبادراتها' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    @if($initiatives->isNotEmpty())
      <div class="row g-4">
        @foreach($initiatives as $init)
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <div class="gold-card h-100">
              @include('partials.card-media', ['image' => Media::url($init->image), 'icon' => $init->icon, 'alt' => $init->title])
              <h5 class="fs-6 fw-bold">{{ $init->title }}</h5>
              <p class="small text-secondary">{{ Str::limit($init->summary, 110) }}</p>
              <a href="{{ route('initiatives.show', $init) }}" class="small fw-semibold" style="color:var(--c-gold)">التفاصيل <i class="bi bi-arrow-left"></i></a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-5">{{ $initiatives->links() }}</div>
    @else
      @include('partials.empty-state', ['text' => 'نعمل على توثيق مبادراتها الإنسانية والمجتمعية من مصادر موثوقة، وستُضاف هنا فور التحقق منها.'])
    @endif
  </div>
</section>

@endsection
