@props(['quote'])
@if ($quote)
<div class="about-quote-card">
    <i class="bi bi-quote"></i>
    <p>{{ $quote->text }}</p>
    @if ($quote->context)
        <cite>{{ $quote->context }}</cite>
    @endif
</div>
@endif
