@props(['eyebrow' => null, 'title', 'subtitle' => null, 'dark' => false])
<div class="section-head">
    @if ($eyebrow)
        <span class="eyebrow">{{ $eyebrow }}</span>
    @endif
    <div class="gold-divider"><i class="bi bi-gem"></i></div>
    <h2 class="section-title">{{ $title }}</h2>
    @if ($subtitle)
        <p class="section-subtitle">{{ $subtitle }}</p>
    @endif
</div>
