@extends('layouts.app')

@php
    $title = 'كلمات الوفاء';
    $description = 'كلمات وفاء ورسائل تذكارية من زوار موقع سعاد الحميضي.';
@endphp

@section('content')

@include('partials.page-hero', [
  'kicker' => 'ذكرى باقية',
  'heading' => 'كلمات الوفاء',
  'crumbs' => ['كلمات الوفاء' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    @if(session('status'))
      <div class="alert alert-success" data-aos="fade-up">{{ session('status') }}</div>
    @endif

    @if($tributes->isNotEmpty())
      <div class="row g-4 mb-5">
        @foreach($tributes as $t)
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <div class="testimonial-card h-100 text-start">
              <i class="bi bi-quote"></i>
              <p class="mt-2">{{ $t->message }}</p>
              <h6 class="fw-bold mb-0 mt-3">{{ $t->name }}</h6>
              @if($t->city)<p class="small text-secondary">{{ $t->city }}</p>@endif
            </div>
          </div>
        @endforeach
      </div>
      <div class="mb-5">{{ $tributes->links() }}</div>
    @else
      @include('partials.empty-state', ['text' => 'كن أول من يكتب كلمة وفاء في حق الفقيدة.'])
    @endif

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div id="tribute-form" class="gold-card">
          <h3 class="fs-4 fw-bold mb-4 text-center">اكتب كلمة وفاء</h3>
          <form method="POST" action="{{ route('tributes.store') }}">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label small">الاسم *</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required maxlength="120">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label small">البريد الإلكتروني (اختياري)</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" maxlength="150">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label small">المدينة (اختياري)</label>
                <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" maxlength="120">
                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-12">
                <label class="form-label small">كلمة الوفاء *</label>
                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required minlength="10" maxlength="2000">{{ old('message') }}</textarea>
                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input @error('consent_to_publish') is-invalid @enderror" type="checkbox" name="consent_to_publish" id="consent" value="1" required>
                  <label class="form-check-label small" for="consent">أوافق على نشر الرسالة في الموقع بعد المراجعة.</label>
                  @error('consent_to_publish')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="col-12 text-center mt-2">
                <button type="submit" class="btn-gold">إرسال كلمة الوفاء</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
