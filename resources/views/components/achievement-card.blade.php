@props(['achievement'])
<div class="gold-card fade-up" data-aos="fade-up">
    <i class="bi {{ $achievement->icon ?? 'bi-star' }}" aria-hidden="true"></i>
    <h3>{{ $achievement->title }}</h3>
    <p>{{ $achievement->description }}</p>
</div>
