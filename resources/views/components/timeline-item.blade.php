@props(['event'])
<div class="timeline-node fade-up" data-aos="fade-up">
    <div class="node-dot"><i class="bi {{ $event->icon ?? 'bi-star' }}"></i></div>
    <div class="node-year">{{ $event->year }}</div>
    <div class="node-title">{{ $event->title }}</div>
    @if ($event->description)
        <div class="node-desc">{{ $event->description }}</div>
    @endif
</div>
