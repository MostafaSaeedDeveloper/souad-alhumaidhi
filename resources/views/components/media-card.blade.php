@props(['item'])
<div class="media-card fade-up" data-aos="fade-up">
    <div class="media-thumb" data-video-embed="{{ $item->embed_url ?? '' }}" data-video-title="{{ $item->title }}" data-bs-toggle="modal" data-bs-target="#videoModal" role="button" tabindex="0" aria-label="تشغيل: {{ $item->title }}">
        @if ($item->thumbnail_url)
            <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}" loading="lazy" width="480" height="270">
        @endif
        <span class="play-btn"><i class="bi bi-play-fill"></i></span>
    </div>
    <div class="media-body">
        <h3>{{ $item->title }}</h3>
        <div class="meta">{{ $item->channel }} @if($item->published_at) · {{ $item->published_at->translatedFormat('d F Y') }} @endif</div>
    </div>
</div>
