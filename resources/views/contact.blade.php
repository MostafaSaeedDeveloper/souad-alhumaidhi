@extends('layouts.app')

@php
    $title = 'تواصل معنا';
    $description = 'تواصل مع القائمين على موقع سعاد الحميضي التكريمي.';
@endphp

@section('content')

@include('partials.page-hero', [
  'kicker' => 'نرحب برسائلكم',
  'heading' => 'تواصل معنا',
  'crumbs' => ['تواصل' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    @if(session('status'))
      <div class="alert alert-success" data-aos="fade-up">{{ session('status') }}</div>
    @endif
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="gold-card">
          <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label small">الاسم *</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required maxlength="120">
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label small">البريد الإلكتروني *</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required maxlength="150">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-12">
                <label class="form-label small">الموضوع</label>
                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" maxlength="150">
                @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-12">
                <label class="form-label small">الرسالة *</label>
                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required minlength="10" maxlength="3000">{{ old('message') }}</textarea>
                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              <div class="col-12 text-center mt-2">
                <button type="submit" class="btn-gold">إرسال الرسالة</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
