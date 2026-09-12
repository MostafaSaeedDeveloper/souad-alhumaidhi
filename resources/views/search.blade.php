@extends('layouts.app')

@php
    $title = 'نتائج البحث';
    $description = 'ابحث في محتوى موقع سعاد الحميضي التكريمي.';
@endphp

@section('content')

@include('partials.page-hero', [
  'kicker' => 'البحث',
  'heading' => 'نتائج البحث',
  'crumbs' => ['البحث' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    <form method="GET" action="{{ route('search') }}" class="row justify-content-center mb-5">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" name="q" value="{{ $q }}" class="form-control form-control-lg" placeholder="ابحث في الموقع..." aria-label="بحث">
          <button class="btn-gold" type="submit"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </form>

    @if($q === '')
      @include('partials.empty-state', ['text' => 'اكتب كلمة للبحث في السيرة الذاتية، الإنجازات، اللقاءات، المبادرات والمقالات.'])
    @elseif($results->isEmpty())
      @include('partials.empty-state', ['text' => 'لا توجد نتائج مطابقة لبحثك عن "'.$q.'".'])
    @else
      <p class="text-secondary mb-4">{{ $results->count() }} نتيجة لبحثك عن "{{ $q }}"</p>
      <div class="row g-4">
        @foreach($results as $r)
          <div class="col-md-6" data-aos="fade-up">
            <a href="{{ $r['url'] }}" class="gold-card d-block text-decoration-none h-100">
              <span class="badge badge-cat rounded-pill mb-2">{{ $r['type'] }}</span>
              <h6 class="fw-bold">{{ $r['title'] }}</h6>
              <p class="small text-secondary mb-0">{{ \Illuminate\Support\Str::limit($r['summary'], 100) }}</p>
            </a>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>

@endsection
