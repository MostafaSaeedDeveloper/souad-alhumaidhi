@extends('layouts.app')

@section('title', 'السيرة الذاتية — سعاد الحميضي')
@section('description', 'السيرة الذاتية الكاملة لسعاد حمد الصالح الحميضي: النشأة، البداية المصرفية، التجارة والاستثمار، لبنان، العمل الإنساني، والإرث.')

@section('content')
<section class="section" style="padding-top:8rem;">
    <div class="container-xl-custom">
        <x-section-title eyebrow="التوثيق الكامل" title="السيرة الذاتية" subtitle="سعاد حمد الصالح الحميضي (1939 – 2017)" />

        <div class="row justify-content-center">
            <div class="col-lg-9">
                @foreach ($sections as $section)
                    <article class="mb-5 fade-up" data-aos="fade-up" id="{{ $section->slug }}">
                        <h2 class="section-title mb-3" style="font-size:1.5rem;">{{ $section->title }}</h2>
                        <p style="white-space:pre-line;">{{ $section->body }}</p>
                        @if ($section->source)
                            <p class="small text-muted mb-0">المصدر: <a href="{{ $section->source->url }}" target="_blank" rel="noopener nofollow">{{ $section->source->publisher }}</a></p>
                        @endif
                    </article>
                @endforeach

                <div class="mt-5 fade-up" data-aos="fade-up">
                    <h2 class="section-title mb-3" style="font-size:1.5rem;">المناصب</h2>
                    <div class="row g-3">
                        @foreach ($positions as $position)
                            <div class="col-md-6">
                                <div class="gold-card">
                                    <h3>{{ $position->title }}</h3>
                                    <p class="mb-1"><strong>{{ $position->organization }}</strong></p>
                                    @if ($position->period)
                                        <p class="small text-muted mb-1">{{ $position->period }}</p>
                                    @endif
                                    <p class="mb-0">{{ $position->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
