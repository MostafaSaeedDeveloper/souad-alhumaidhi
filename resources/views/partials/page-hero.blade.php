@php($crumbs = $crumbs ?? [])
<section class="page-hero pattern-bg">
  <div class="container-xl position-relative">
    @if($kicker ?? null)<span class="section-kicker">{{ $kicker }}</span>@endif
    <h1 class="mt-2">{{ $heading }}</h1>
    @if($sub ?? null)<p class="text-white-50">{{ $sub }}</p>@endif
    @if(count($crumbs))
      <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
        <ol class="breadcrumb breadcrumb-gold mb-0">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
          @foreach($crumbs as $label => $url)
            @if($url)
              <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
            @else
              <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @endif
          @endforeach
        </ol>
      </nav>
    @endif
  </div>
</section>
