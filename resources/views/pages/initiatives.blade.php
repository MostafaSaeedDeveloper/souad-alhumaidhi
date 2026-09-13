@extends('layouts.app')

@section('title', 'مبادراتها — سعاد الحميضي')
@section('description', 'المبادرات والأعمال الإنسانية والخيرية للراحلة سعاد الحميضي في الكويت ولبنان ومصر.')

@section('content')
<section class="section" style="padding-top:8rem;">
    <div class="container-xl-custom">
        <x-section-title eyebrow="برامج ومشاريع لصناعة مستقبل أفضل" title="مبادراتها" subtitle="أعمال إنسانية وخيرية موثقة في الكويت ولبنان ومصر" />
        <div class="row g-4">
            @foreach ($initiatives as $initiative)
                <div class="col-md-6 col-lg-3">
                    <div class="gold-card fade-up" data-aos="fade-up">
                        <i class="bi {{ $initiative->icon ?? 'bi-heart' }}"></i>
                        <h3>{{ $initiative->title }}</h3>
                        @if ($initiative->location)
                            <p class="small mb-2 badge-gold d-inline-block">{{ $initiative->location }}</p>
                        @endif
                        <p>{{ $initiative->description }}</p>
                        @if ($initiative->source)
                            <p class="small text-muted mb-0">المصدر: <a href="{{ $initiative->source->url }}" target="_blank" rel="noopener nofollow">{{ $initiative->source->publisher }}</a></p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
