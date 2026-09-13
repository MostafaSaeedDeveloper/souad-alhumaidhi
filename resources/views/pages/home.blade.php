@extends('layouts.app')

@section('title', 'سعاد الحميضي — رحلة عطاء.. أثر لا ينتهي')
@section('description', 'موقع تكريمي يوثق مسيرة الراحلة سعاد حمد الصالح الحميضي، أول سيدة أعمال كويتية، إنجازاتها ومبادراتها الإنسانية.')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Person',
    'name' => 'سعاد حمد الصالح الحميضي',
    'alternateName' => 'Souad Al-Humaidhi',
    'birthDate' => '1939',
    'deathDate' => '2017-08-03',
    'jobTitle' => 'سيدة أعمال',
    'nationality' => 'Kuwaiti',
    'url' => url('/'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('content')

{{-- HERO --}}
<section class="hero">
    <div class="hero-pattern"></div>
    <div class="container-xl-custom hero-inner">
        <div class="row align-items-center gy-5">
            <div class="col-lg-7 order-2 order-lg-1">
                <span class="hero-eyebrow">في ذكرى سيدة الأعمال الرائدة</span>
                <h1 class="hero-name">سعاد الحميضي</h1>
                <p class="hero-subtitle">سيدة أعمال كويتية (1939 – 2017)، تُعرف بأنها أول كويتية مارست التجارة والاستثمار وتملّك العقار داخل الكويت وفي عدد من الدول العربية والأوروبية، وجمعت بين ريادة الأعمال والعطاء الإنساني.</p>
                <blockquote class="hero-quote">"قضيت مع الشيخ جابر العلي 25 عامًا، وساعدني في العمل، وأرشدني للطريق."</blockquote>
                <div class="hero-actions">
                    <a href="{{ route('biography') }}" class="btn-gold"><i class="bi bi-journal-text"></i> اكتشف مسيرتها</a>
                    <a href="{{ route('media') }}" class="btn-outline-cream"><i class="bi bi-play-circle"></i> شاهد لقاءاتها</a>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
                <div class="hero-visual">
                    <div class="hero-visual-frame"></div>
                    <span class="monogram">س ح</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- HIGHLIGHT BAR --}}
<section class="highlight-bar">
    <div class="container-xl-custom">
        <div class="row g-0 text-center">
            <div class="col-6 col-lg-3 fade-up" data-aos="fade-up"><div class="highlight-item"><i class="bi bi-lightbulb"></i><h3>رؤية ملهمة</h3><p>قادت مسيرة تعبّر عن إيجابية وريادة</p></div></div>
            <div class="col-6 col-lg-3 fade-up" data-aos="fade-up"><div class="highlight-item"><i class="bi bi-trophy"></i><h3>إنجازات رائدة</h3><p>بصمة واضحة في عالم الأعمال</p></div></div>
            <div class="col-6 col-lg-3 fade-up" data-aos="fade-up"><div class="highlight-item"><i class="bi bi-people"></i><h3>مبادرات مجتمعية</h3><p>أثر مستدام في المجتمع</p></div></div>
            <div class="col-6 col-lg-3 fade-up" data-aos="fade-up"><div class="highlight-item"><i class="bi bi-gender-female"></i><h3>تمكين المرأة</h3><p>نموذج مبكر لريادة المرأة الخليجية</p></div></div>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section class="section" id="about">
    <div class="container-xl-custom">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5 fade-up" data-aos="fade-up">
                <div class="about-portrait">
                    <span class="monogram">س ح</span>
                </div>
            </div>
            <div class="col-lg-7">
                <span class="eyebrow">تعرّف عليها</span>
                <h2 class="section-title mb-4">من هي سعاد الحميضي؟</h2>
                @foreach ($biographyIntro as $section)
                    <p class="mb-3">{{ $section->body }}</p>
                @endforeach
                <a href="{{ route('biography') }}" class="btn-gold mt-2"><i class="bi bi-arrow-left"></i> اقرأ السيرة الذاتية كاملة</a>

                @if ($featuredQuote)
                    <div class="mt-4">
                        <x-quote-card :quote="$featuredQuote" />
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- TIMELINE --}}
<section class="section section-alt" id="timeline-preview">
    <div class="container-xl-custom">
        <x-section-title eyebrow="مسيرة حافلة بالإنجاز والعطاء" title="أبرز محطات مسيرتها" subtitle="رحلة من العمل المصرفي إلى ريادة التجارة والاستثمار والعطاء الإنساني" />
        <div class="timeline-scroll">
            @foreach ($timelineEvents as $event)
                <x-timeline-item :event="$event" />
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('timeline') }}" class="btn-gold">عرض المسيرة كاملة</a>
        </div>
    </div>
</section>

{{-- ACHIEVEMENTS --}}
<section class="section" id="achievements-preview">
    <div class="container-xl-custom">
        <x-section-title eyebrow="بصمة واضحة" title="إنجازات ملهمة" subtitle="محطات بارزة في عالم الأعمال والمجتمع" />
        <div class="row g-4">
            @foreach ($achievements as $achievement)
                <div class="col-md-6 col-lg-4">
                    <x-achievement-card :achievement="$achievement" />
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('achievements') }}" class="btn-gold">اطلع على جميع الإنجازات</a>
        </div>
    </div>
</section>

{{-- MEDIA --}}
<section class="section section-alt" id="media-preview">
    <div class="container-xl-custom">
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-3">
            <x-section-title eyebrow="أفكار ملهمة.. رؤى واقعية" title="اللقاءات والإعلام" />
            <a href="{{ route('media') }}" class="btn-gold-outline text-dark border-dark mb-3">عرض الكل <i class="bi bi-arrow-left"></i></a>
        </div>
        @if ($mediaItems->isEmpty())
            <div class="text-center text-muted py-5">
                <i class="bi bi-camera-reels fs-1 d-block mb-3" style="color: var(--color-gold);"></i>
                <p class="mb-0">لم يتم بعد رصد لقاء تلفزيوني موثّق الحقوق لإدراجه هنا. راجع صفحة <a href="{{ route('sources') }}">المصادر</a> لمزيد من التفاصيل.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach ($mediaItems as $item)
                    <div class="col-md-6 col-lg-3 media-col">
                        <x-media-card :item="$item" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- GALLERY --}}
<section class="section" id="gallery-preview">
    <div class="container-xl-custom">
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-3">
            <x-section-title eyebrow="لحظات من رحلة العطاء" title="معرض الصور" />
            <a href="{{ route('gallery') }}" class="btn-gold-outline text-dark border-dark mb-3">عرض الكل <i class="bi bi-arrow-left"></i></a>
        </div>
        @php $allImages = $galleryAlbums->flatMap->images; @endphp
        @if ($allImages->isEmpty())
            <div class="text-center text-muted py-5">
                <i class="bi bi-images fs-1 d-block mb-3" style="color: var(--color-gold);"></i>
                <p class="mb-0">لم يُعثر بعد على صور موثقة الحقوق للراحلة يمكن نشرها. راجع <a href="{{ route('sources') }}">صفحة المصادر</a> لتفاصيل مرشحات الصور قيد المراجعة.</p>
            </div>
        @else
            <div class="row g-3">
                @foreach ($allImages->take(8) as $image)
                    <div class="col-6 col-md-3">
                        <x-gallery-item :image="$image" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- INITIATIVES --}}
<section class="section section-alt" id="initiatives-preview">
    <div class="container-xl-custom">
        <div class="row align-items-center gy-5">
            <div class="col-lg-8">
                <x-section-title eyebrow="برامج ومشاريع لصناعة مستقبل أفضل" title="مبادراتها" />
                <div class="row g-4">
                    @foreach ($initiatives as $initiative)
                        <div class="col-md-6">
                            <x-achievement-card :achievement="$initiative" />
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('initiatives') }}" class="btn-gold">تعرّف على جميع المبادرات</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-quote-card">
                    <i class="bi bi-quote"></i>
                    <p>المجتمع القوي يبدأ من أفراده.. ومن إيمانهم بقدرتهم على التغيير.</p>
                    <cite>روح مسيرة سعاد الحميضي</cite>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PRESS --}}
<section class="section" id="press-preview">
    <div class="container-xl-custom">
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-3">
            <x-section-title eyebrow="حضور واسع في الإعلام" title="في الصحافة والإعلام" />
            <a href="{{ route('press') }}" class="btn-gold-outline text-dark border-dark mb-3">عرض الكل <i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="press-strip">
            @foreach ($pressMentions as $mention)
                <a href="{{ $mention->url }}" target="_blank" rel="noopener nofollow" class="press-logo">{{ $mention->publisher }}</a>
            @endforeach
        </div>
    </div>
</section>

{{-- LEGACY --}}
<section class="legacy-section">
    <div class="container-xl-custom">
        <p class="legacy-quote fade-in" data-aos="fade-in">"يبقى الأثر.. حين يرحل العطاء"</p>
        <p class="legacy-sub">في ذكرى سعاد حمد الصالح الحميضي — 1939 – 2017</p>
    </div>
</section>

@endsection
