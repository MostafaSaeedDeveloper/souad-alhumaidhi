@extends('layouts.app')

@section('title', 'محطات المسيرة — سعاد الحميضي')
@section('description', 'أبرز المحطات الزمنية في مسيرة سعاد الحميضي، من الميلاد إلى الوفاة، موثقة بالمصادر.')

@section('content')
<section class="section" style="padding-top:8rem;">
    <div class="container-xl-custom">
        <x-section-title eyebrow="رحلة حافلة بالإنجاز والعطاء" title="محطات مسيرتها" />

        <div class="row justify-content-center">
            <div class="col-lg-9">
                @foreach ($timelineEvents as $event)
                    <div class="d-flex gap-3 gap-md-4 mb-4 fade-up" data-aos="fade-up">
                        <div class="flex-shrink-0">
                            <div class="node-dot"><i class="bi {{ $event->icon ?? 'bi-star' }}"></i></div>
                        </div>
                        <div class="gold-card flex-grow-1">
                            <div class="node-year mb-1">{{ $event->year }}</div>
                            <h3>{{ $event->title }}</h3>
                            <p>{{ $event->description }}</p>
                            @if ($event->source)
                                <p class="small text-muted mb-0">المصدر: <a href="{{ $event->source->url }}" target="_blank" rel="noopener nofollow">{{ $event->source->publisher }}</a></p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
