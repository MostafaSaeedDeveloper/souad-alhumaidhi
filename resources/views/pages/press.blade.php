@extends('layouts.app')

@section('title', 'في الصحافة والإعلام — سعاد الحميضي')
@section('description', 'أبرز التغطيات الصحفية والإعلامية عن سعاد الحميضي.')

@section('content')
<section class="section" style="padding-top:8rem;">
    <div class="container-xl-custom">
        <x-section-title eyebrow="حضور واسع في الإعلام" title="في الصحافة والإعلام" />
        <div class="row justify-content-center">
            <div class="col-lg-9">
                @foreach ($pressMentions as $mention)
                    <a href="{{ $mention->url }}" target="_blank" rel="noopener nofollow" class="d-block gold-card mb-3 fade-up" data-aos="fade-up">
                        <div class="d-flex justify-content-between flex-wrap gap-2">
                            <h3 class="mb-1">{{ $mention->title }}</h3>
                            @if ($mention->published_at)
                                <span class="small text-muted">{{ $mention->published_at->translatedFormat('d F Y') }}</span>
                            @endif
                        </div>
                        <p class="badge-gold d-inline-block mb-2">{{ $mention->publisher }}</p>
                        <p class="mb-0 text-dark">{{ $mention->excerpt }}</p>
                    </a>
                @endforeach
                <div class="mt-4">{{ $pressMentions->links() }}</div>
            </div>
        </div>
    </div>
</section>
@endsection
