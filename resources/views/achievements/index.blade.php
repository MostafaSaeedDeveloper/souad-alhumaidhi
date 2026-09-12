@extends('layouts.app')

@php
    use App\Support\Categories;
    use Illuminate\Support\Str;
    $title = 'الإنجازات';
    $description = 'إنجازات موثقة لسيدة الأعمال سعاد الحميضي في عالم المال والاستثمار والعقار.';
@endphp

@section('content')

@include('partials.page-hero', [
  'kicker' => 'بصمة واضحة',
  'heading' => 'إنجازات ملهمة',
  'crumbs' => ['الإنجازات' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    @if($achievements->isNotEmpty())
      <div class="row g-4">
        @foreach($achievements as $a)
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <div class="gold-card h-100">
              <div class="icon-circle"><i class="bi {{ $a->icon }}"></i></div>
              @if($a->category)<span class="badge badge-cat rounded-pill mb-2">{{ Categories::label($a->category) }}</span>@endif
              @if($a->year)<div class="small fw-bold" style="color:var(--c-gold)">{{ $a->year }}</div>@endif
              <h5 class="fs-6 fw-bold">{{ $a->title }}</h5>
              <p class="small text-secondary">{{ Str::limit($a->summary, 110) }}</p>
              <a href="{{ route('achievements.show', $a) }}" class="small fw-semibold" style="color:var(--c-gold)">التفاصيل <i class="bi bi-arrow-left"></i></a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-5">{{ $achievements->links() }}</div>
    @else
      @include('partials.empty-state', ['text' => 'سيتم إضافة الإنجازات فور توثيقها من مصادر موثوقة.'])
    @endif
  </div>
</section>

@endsection
