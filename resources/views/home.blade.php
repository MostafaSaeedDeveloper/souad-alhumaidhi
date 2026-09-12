@extends('layouts.app')

@php
    use App\Models\Setting;
    use App\Support\Categories;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;
    $title = null;
    $description = Setting::get('site_meta_description');
@endphp

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Person",
  "name": "{{ $biography->full_name ?? 'سعاد الحميضي' }}",
  "nationality": "{{ $biography->nationality ?? 'الكويت' }}",
  "birthDate": "{{ $biography->birth_year ?? '1939' }}",
  "deathDate": "{{ $biography->death_year ?? '2017' }}",
  "description": "{{ $description }}",
  "url": "{{ route('home') }}"
}
</script>
@endpush

@section('content')

{{-- ============ HERO ============ --}}
<section class="hero-section">
  <div class="bg-fade"></div>
  <div class="container-xl position-relative">
    <div class="row align-items-center gy-5">
      <div class="col-lg-5 order-lg-2" data-aos="fade-down" data-aos-delay="100">
        <div class="hero-portrait-frame">
          <div class="portrait-inner">
            <svg viewBox="0 0 200 240" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="g1" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0" stop-color="#d4af6a"/>
                  <stop offset="1" stop-color="#8f6a2e"/>
                </linearGradient>
              </defs>
              <circle cx="100" cy="82" r="52" fill="none" stroke="url(#g1)" stroke-width="2"/>
              <path d="M50 210c8-46 34-70 50-70s42 24 50 70" fill="none" stroke="url(#g1)" stroke-width="2"/>
              <path d="M100 20c14 18 14 36 0 54-14-18-14-36 0-54z" fill="url(#g1)" opacity=".85"/>
            </svg>
          </div>
        </div>
        <p class="notice-source text-center mt-2 text-white-50">لا تتوفر صورة موثقة الحقوق للنشر حاليًا — رمزية توضيحية</p>
      </div>
      <div class="col-lg-7 order-lg-1">
        <div data-aos="fade-up">
          <span class="hero-eyebrow">{{ Setting::get('hero_title') }}</span>
        </div>
        <h1 class="hero-title mt-3" data-aos="fade-up" data-aos-delay="150">
          سعاد <span class="accent">الحميضي</span>
        </h1>
        <p class="hero-tagline mt-2" data-aos="fade-up" data-aos-delay="250">{{ Setting::get('hero_tagline') }}</p>
        <p class="hero-desc mt-3" data-aos="fade-up" data-aos-delay="350">{{ Setting::get('hero_description') }}</p>

        <div class="d-flex flex-wrap gap-3 mt-4" data-aos="fade-up" data-aos-delay="450">
          <a href="{{ route('biography') }}" class="btn-gold">
            <i class="bi bi-arrow-left"></i> {{ Setting::get('cta_primary_text', 'استكشف مسيرتها') }}
          </a>
          @if($mediaItems->isNotEmpty())
            <a href="#" class="btn-outline-cream" data-video-embed="{{ $mediaItems->first()->embedUrl() }}" data-video-title="{{ $mediaItems->first()->title }}">
              <i class="bi bi-play-circle"></i> مشاهدة لقاء تعريفي
            </a>
          @endif
        </div>

        @if($heroQuote)
          <div class="hero-quote-card" data-aos="fade-up" data-aos-delay="550">
            "{{ $heroQuote->quote_text }}"
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- ============ QUICK HIGHLIGHTS ============ --}}
<section class="section section-cream">
  <div class="container-xl">
    <div class="row g-4">
      @php
        $highlights = [
          ['icon' => 'bi-lightbulb', 'title' => 'رؤية ملهمة', 'desc' => 'قادت مسيرة مهنية استثنائية بعزيمة وطموح متجدد.'],
          ['icon' => 'bi-trophy', 'title' => 'إنجازات رائدة', 'desc' => 'بصمة واضحة في عالم المال والاستثمار والعقار.'],
          ['icon' => 'bi-people', 'title' => 'حضور مجتمعي', 'desc' => 'حضور وتقدير في الأوساط الاقتصادية والإعلامية.'],
          ['icon' => 'bi-gem', 'title' => 'إرث مستمر', 'desc' => 'أثر باقٍ يُروى في الصحافة الخليجية والعربية.'],
        ];
      @endphp
      @foreach($highlights as $i => $h)
        <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
          <div class="highlight-card">
            <div class="highlight-icon"><i class="bi {{ $h['icon'] }}"></i></div>
            <h5 class="fs-6 fw-bold">{{ $h['title'] }}</h5>
            <p class="small text-secondary mb-0">{{ $h['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ============ BIOGRAPHY ============ --}}
@if($biography)
<section class="section section-ivory pattern-bg">
  <div class="container-xl">
    <div class="row gy-5 align-items-center">
      <div class="col-lg-5" data-aos="fade-left">
        <div class="bio-portrait">
          <div class="portrait-placeholder light" style="aspect-ratio:4/5;">
            <i class="bi bi-flower2" style="font-size:4rem;"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-7" data-aos="fade-right">
        <span class="section-kicker">تعرف عليها</span>
        <h2 class="section-title mt-2">من هي سعاد الحميضي؟</h2>
        <p class="text-secondary mt-3">{{ $biography->intro }}</p>
        <div class="bio-quote mt-4">
          <i class="bi bi-quote"></i>
          <p class="mb-1">{{ Setting::get('homepage_quote') }}</p>
        </div>
        <a href="{{ route('biography') }}" class="btn-outline-dark-sm mt-4">
          اقرأ السيرة الذاتية كاملة <i class="bi bi-arrow-left"></i>
        </a>
      </div>
    </div>
  </div>
</section>
@endif

{{-- ============ TIMELINE ============ --}}
@if($timeline->isNotEmpty())
<section class="section section-dark pattern-bg">
  <div class="container-xl">
    <div class="section-head" data-aos="fade-up">
      <span class="section-kicker">مسيرة موثقة</span>
      <h2 class="section-title text-white mt-2">أبرز محطات مسيرتها</h2>
      <p class="section-sub text-white-50">محطات موثقة من مصادر رسمية وصحفية موثوقة</p>
    </div>

    <div class="timeline-wrap d-none d-md-block">
      <div class="timeline-track row">
        @foreach($timeline as $i => $event)
          <div class="col timeline-item" data-aos="fade-up" data-aos-delay="{{ $i * 120 }}">
            <div class="timeline-dot"><i class="bi {{ $event->icon }}"></i></div>
            <div class="timeline-year">{{ $event->year }}</div>
            <h6>{{ $event->title }}</h6>
            <p>{{ $event->description }}</p>
          </div>
        @endforeach
      </div>
    </div>

    {{-- Mobile slider --}}
    <div class="d-md-none swiper" data-swiper='{"slidesPerView":1.15,"spaceBetween":16}'>
      <div class="swiper-wrapper">
        @foreach($timeline as $event)
          <div class="swiper-slide">
            <div class="timeline-item text-center bg-black bg-opacity-25 rounded-3 p-4">
              <div class="timeline-dot"><i class="bi {{ $event->icon }}"></i></div>
              <div class="timeline-year">{{ $event->year }}</div>
              <h6>{{ $event->title }}</h6>
              <p>{{ $event->description }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif

{{-- ============ ACHIEVEMENTS ============ --}}
<section class="section section-cream">
  <div class="container-xl">
    <div class="section-head" data-aos="fade-up">
      <span class="section-kicker">إرث يتحدث عن نفسه</span>
      <h2 class="section-title mt-2">إنجازات ملهمة</h2>
      <p class="section-sub">بصمة واضحة في عالم الأعمال والمجتمع</p>
    </div>

    @if($achievements->isNotEmpty())
      <div class="row g-4">
        @foreach($achievements as $i => $a)
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 100 }}">
            <div class="gold-card">
              <div class="icon-circle"><i class="bi {{ $a->icon }}"></i></div>
              @if($a->category)
                <span class="badge badge-cat rounded-pill mb-2">{{ Categories::label($a->category) }}</span>
              @endif
              <h5 class="fs-6 fw-bold">{{ $a->title }}</h5>
              <p class="small text-secondary">{{ Str::limit($a->summary, 90) }}</p>
              <a href="{{ route('achievements.show', $a) }}" class="small fw-semibold" style="color:var(--c-gold)">
                التفاصيل <i class="bi bi-arrow-left"></i>
              </a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="text-center mt-5" data-aos="fade-up">
        <a href="{{ route('achievements.index') }}" class="btn-gold">عرض جميع الإنجازات</a>
      </div>
    @else
      @include('partials.empty-state', ['text' => 'سيتم إضافة الإنجازات فور توثيقها من مصادر موثوقة.'])
    @endif
  </div>
</section>

{{-- ============ MEDIA ============ --}}
<section class="section section-ivory">
  <div class="container-xl">
    <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
      <div>
        <span class="section-kicker">توثيق إعلامي</span>
        <h2 class="section-title mt-2 mb-0">اللقاءات والإعلام</h2>
        <p class="section-sub mb-0">أفكار ملهمة .. ورؤى واقعية</p>
      </div>
      <a href="{{ route('media.index') }}" class="btn-outline-dark-sm">عرض الكل <i class="bi bi-arrow-left"></i></a>
    </div>

    @if($mediaItems->isNotEmpty())
      <div class="swiper media-swiper" data-swiper='{"slidesPerView":1.15,"spaceBetween":20,"breakpoints":{"768":{"slidesPerView":2,"spaceBetween":24},"1200":{"slidesPerView":4,"spaceBetween":24}}}'>
        <div class="swiper-wrapper py-2">
          @foreach($mediaItems as $m)
            <div class="swiper-slide h-auto">
              <div class="video-card h-100">
                <div class="video-thumb" data-video-embed="{{ $m->embedUrl() }}" data-video-title="{{ $m->title }}">
                  @if($m->thumbnail)
                    <img src="{{ $m->thumbnail }}" alt="{{ $m->title }}" loading="lazy">
                  @else
                    <div class="portrait-placeholder"><i class="bi bi-camera-video fs-1"></i></div>
                  @endif
                  <div class="video-play"><span><i class="bi bi-play-fill"></i></span></div>
                </div>
                <div class="video-meta">
                  <h6 class="fs-6 mb-1">{{ Str::limit($m->title, 55) }}</h6>
                  <p class="small text-secondary mb-0">{{ $m->channel_name }}</p>
                  @if($m->published_at)<p class="small text-secondary mb-0">{{ $m->published_at->format('Y/m/d') }}</p>@endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @else
      @include('partials.empty-state', ['text' => 'سيتم إضافة اللقاءات الإعلامية الموثقة قريبًا.'])
    @endif
  </div>
</section>

{{-- ============ GALLERY ============ --}}
<section class="section section-cream">
  <div class="container-xl">
    <div class="section-head" data-aos="fade-up">
      <span class="section-kicker">لحظات موثقة</span>
      <h2 class="section-title mt-2">معرض الصور</h2>
    </div>

    @if($galleryItems->isNotEmpty())
      <div class="gallery-grid" data-aos="fade-up">
        @foreach($galleryItems as $g)
          <a href="{{ Storage::url($g->image) }}" class="glightbox" data-glightbox="title: {{ $g->caption }}">
            <img src="{{ Storage::url($g->image) }}" alt="{{ $g->alt }}" loading="lazy">
            <span class="overlay">{{ $g->caption }}</span>
          </a>
        @endforeach
      </div>
      <div class="text-center mt-5">
        <a href="{{ route('gallery.index') }}" class="btn-gold">View All Gallery</a>
      </div>
    @else
      @include('partials.empty-state', ['text' => 'لا تتوفر حاليًا صور موثقة الحقوق للنشر. سيتم تحديث المعرض فور توفر صور بحقوق نشر واضحة.'])
    @endif
  </div>
</section>

{{-- ============ INITIATIVES ============ --}}
<section class="section section-ivory pattern-bg">
  <div class="container-xl">
    <div class="section-head" data-aos="fade-up">
      <span class="section-kicker">استمرار الأثر</span>
      <h2 class="section-title mt-2">مبادراتها</h2>
    </div>

    @if($initiatives->isNotEmpty())
      <div class="row g-4">
        @foreach($initiatives as $i => $init)
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 120 }}">
            <div class="gold-card">
              <div class="icon-circle"><i class="bi {{ $init->icon }}"></i></div>
              <h5 class="fs-6 fw-bold">{{ $init->title }}</h5>
              <p class="small text-secondary">{{ Str::limit($init->summary, 100) }}</p>
              <a href="{{ route('initiatives.show', $init) }}" class="small fw-semibold" style="color:var(--c-gold)">
                التفاصيل <i class="bi bi-arrow-left"></i>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    @else
      @include('partials.empty-state', ['text' => 'نعمل على توثيق مبادراتها الإنسانية والمجتمعية من مصادر موثوقة، وستُضاف هنا فور التحقق منها.'])
    @endif
  </div>
</section>

{{-- ============ QUOTE BANNER ============ --}}
<section class="quote-banner">
  <div class="container-xl">
    <div class="quote-mark">”</div>
    <blockquote>
      {{ $bannerQuote->quote_text ?? Setting::get('hero_quote') }}
    </blockquote>
    @if($bannerQuote && $bannerQuote->attributed_to && $bannerQuote->type === 'her_quote')
      <p class="mt-3 signature-line">— {{ $bannerQuote->attributed_to }}</p>
    @endif
  </div>
</section>

{{-- ============ ARTICLES ============ --}}
@if($articles->isNotEmpty())
<section class="section section-cream">
  <div class="container-xl">
    <div class="d-flex flex-wrap justify-content-between align-items-end mb-4" data-aos="fade-up">
      <div>
        <span class="section-kicker">في الأخبار</span>
        <h2 class="section-title mt-2 mb-0">مقالات وأخبار</h2>
      </div>
      <a href="{{ route('articles.index') }}" class="btn-outline-dark-sm">عرض الكل <i class="bi bi-arrow-left"></i></a>
    </div>
    <div class="row g-4">
      @foreach($articles as $i => $article)
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 120 }}">
          <div class="article-card">
            <div class="portrait-placeholder light" style="aspect-ratio:16/10;"><i class="bi bi-newspaper fs-2"></i></div>
            <div class="body">
              <div class="meta mb-2">{{ $article->source_name }} @if($article->published_at) · {{ $article->published_at->format('Y/m/d') }} @endif</div>
              <h6 class="fs-6 fw-bold">{{ $article->title }}</h6>
              <p class="small text-secondary">{{ Str::limit($article->excerpt, 90) }}</p>
              <a href="{{ route('articles.show', $article) }}" class="small fw-semibold" style="color:var(--c-gold)">اقرأ المزيد <i class="bi bi-arrow-left"></i></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ============ TESTIMONIALS ============ --}}
@if($testimonials->isNotEmpty())
<section class="section section-ivory">
  <div class="container-xl">
    <div class="section-head" data-aos="fade-up">
      <span class="section-kicker">ذكريات وشهادات</span>
      <h2 class="section-title mt-2">قالوا عنها</h2>
    </div>
    <div class="swiper" data-swiper='{"slidesPerView":1,"spaceBetween":20,"breakpoints":{"768":{"slidesPerView":2},"1200":{"slidesPerView":3}}}'>
      <div class="swiper-wrapper py-2">
        @foreach($testimonials as $t)
          <div class="swiper-slide">
            <div class="testimonial-card h-100">
              <i class="bi bi-quote"></i>
              <p class="mt-2">{{ $t->quote_text }}</p>
              <h6 class="fw-bold mb-0 mt-3">{{ $t->attributed_to }}</h6>
              @if($t->attributed_role)<p class="small text-secondary">{{ $t->attributed_role }}</p>@endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif

{{-- ============ PRESS ============ --}}
@if($mediaOutlets->isNotEmpty())
<section class="section section-cream">
  <div class="container-xl text-center">
    <span class="section-kicker">حضور إعلامي</span>
    <h2 class="section-title mt-2 mb-4">في الصحافة والإعلام</h2>
    <div class="press-strip" data-aos="fade-up">
      @foreach($mediaOutlets as $outlet)
        <div class="press-logo">{{ $outlet->name }}</div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ============ TRIBUTE CTA ============ --}}
<section class="section section-dark text-center pattern-bg">
  <div class="container-xl">
    <span class="section-kicker">شاركنا الذكرى</span>
    <h2 class="section-title text-white mt-2">اكتب كلمة وفاء</h2>
    <p class="section-sub text-white-50">شارك ذكرياتك أو كلمة وفاء في حق الفقيدة، لتظهر ضمن كلمات الوفاء بعد المراجعة.</p>
    <a href="{{ route('tributes.index') }}#tribute-form" class="btn-gold mt-3">كتابة كلمة وفاء</a>
  </div>
</section>

{{-- ============ LEGACY BANNER ============ --}}
<section class="legacy-banner">
  <div class="container-xl">
    <span class="section-kicker" style="color:var(--c-gold-light)">إلى الأبد</span>
    <h2 class="mt-2">يبقى الأثر .. حين يرحل العطاء</h2>
    <p class="text-white-50">رحمها الله .. وبقي أثرها</p>
  </div>
</section>

@endsection
