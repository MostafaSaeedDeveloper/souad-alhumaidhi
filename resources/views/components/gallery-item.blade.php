@props(['image'])
<a href="{{ $image->image_path ? asset('storage/'.$image->image_path) : ($image->external_url ?? '#') }}"
   class="gallery-item glightbox fade-up"
   data-aos="fade-up"
   data-glightbox="title: {{ $image->caption }}"
   aria-label="{{ $image->alt_text ?? $image->caption }}">
    @if ($image->image_path)
        <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->alt_text ?? '' }}" loading="lazy">
    @else
        <i class="bi bi-image" style="font-size:2rem;"></i>
    @endif
</a>
