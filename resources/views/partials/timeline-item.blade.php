@php($eventImg = \App\Support\Media::url($event->image))
<div class="timeline-dot"><i class="bi {{ $event->icon }}"></i></div>
@if($eventImg)
  <img src="{{ $eventImg }}" alt="{{ $event->title }}" class="timeline-thumb">
@endif
<div class="timeline-year">{{ $event->year }}</div>
<h6>{{ $event->title }}</h6>
<p>{{ $event->description }}</p>
