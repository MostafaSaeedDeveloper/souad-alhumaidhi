{{-- Expects: $image (resolved URL or null), $icon, $alt --}}
@if($image)
  <div class="card-cover">
    <img src="{{ $image }}" alt="{{ $alt }}" loading="lazy">
    <span class="card-cover-icon"><i class="bi {{ $icon }}"></i></span>
  </div>
@else
  <div class="icon-circle"><i class="bi {{ $icon }}"></i></div>
@endif
