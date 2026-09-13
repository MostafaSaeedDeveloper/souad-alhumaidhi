@extends('layouts.app')

@section('title', 'الإنجازات والجوائز — سعاد الحميضي')
@section('description', 'تفصيل إنجازات ومناصب وجوائز سعاد الحميضي في عالم التجارة والاستثمار والعمل الإنساني.')

@section('content')
<section class="section" style="padding-top:8rem;">
    <div class="container-xl-custom">
        <x-section-title eyebrow="بصمة واضحة" title="الإنجازات" />
        <div class="row g-4 mb-5">
            @foreach ($achievements as $achievement)
                <div class="col-md-6 col-lg-4">
                    <x-achievement-card :achievement="$achievement" />
                </div>
            @endforeach
        </div>

        <x-section-title eyebrow="تقديرًا لمسيرتها" title="الجوائز والتكريمات" />
        <div class="row g-4 mb-5">
            @foreach ($awards as $award)
                <div class="col-md-6">
                    <div class="gold-card fade-up" data-aos="fade-up">
                        <i class="bi bi-award"></i>
                        <h3>{{ $award->title }}</h3>
                        @if ($award->presented_by)
                            <p class="mb-1"><strong>{{ $award->presented_by }}</strong> @if($award->year) — {{ $award->year }} @endif</p>
                        @endif
                        <p class="mb-0">{{ $award->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <x-section-title eyebrow="مسؤوليات قيادية" title="المناصب" />
        <div class="row g-4">
            @foreach ($positions as $position)
                <div class="col-md-6 col-lg-4">
                    <div class="gold-card fade-up" data-aos="fade-up">
                        <i class="bi bi-briefcase"></i>
                        <h3>{{ $position->title }}</h3>
                        <p class="mb-1"><strong>{{ $position->organization }}</strong></p>
                        <p class="mb-0">{{ $position->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
