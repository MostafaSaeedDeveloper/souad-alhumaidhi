@extends('layouts.app')

@php
    use Illuminate\Support\Str;
    $title = 'السيرة الذاتية';
    $description = Str::limit($biography->intro, 155);
@endphp

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type": "ListItem", "position": 1, "name": "الرئيسية", "item": "{{ route('home') }}"},
    {"@@type": "ListItem", "position": 2, "name": "السيرة الذاتية", "item": "{{ route('biography') }}"}
  ]
}
</script>
@endpush

@section('content')

@include('partials.page-hero', [
  'kicker' => 'التوثيق الكامل',
  'heading' => 'السيرة الذاتية',
  'sub' => $biography->title,
  'crumbs' => ['السيرة الذاتية' => null],
])

<section class="section section-cream">
  <div class="container-xl">
    <div class="row gy-5 align-items-start">
      <div class="col-lg-4" data-aos="fade-left">
        <div class="bio-portrait sticky-top" style="top:100px;">
          <div class="portrait-placeholder light" style="aspect-ratio:4/5;">
            <i class="bi bi-flower2" style="font-size:4rem;"></i>
          </div>
        </div>
        <p class="notice-source text-center mt-2">لا تتوفر صورة موثقة الحقوق للنشر حاليًا</p>
        <div class="border rounded-3 p-3 mt-4" style="border-color:var(--c-border)!important">
          <ul class="list-unstyled small mb-0 d-flex flex-column gap-2">
            <li><strong>الاسم الكامل:</strong> {{ $biography->full_name }}</li>
            <li><strong>الجنسية:</strong> {{ $biography->nationality }}</li>
            <li><strong>سنة الميلاد:</strong> {{ $biography->birth_year }}</li>
            <li><strong>سنة الوفاة:</strong> {{ $biography->death_year }}</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-8" data-aos="fade-right">
        <p class="lead text-secondary">{{ $biography->intro }}</p>

        @if($biography->early_life)
          <h3 class="mt-5">النشأة والبدايات</h3>
          <p class="text-secondary">{{ $biography->early_life }}</p>
        @endif

        @if($biography->career)
          <h3 class="mt-5">المسيرة المهنية</h3>
          <p class="text-secondary">{{ $biography->career }}</p>
        @endif

        @if($timeline->isNotEmpty())
          <h3 class="mt-5 mb-4">محطات موثقة</h3>
          <div class="row g-4">
            @foreach($timeline as $event)
              <div class="col-md-4">
                <div class="gold-card h-100">
                  <div class="icon-circle"><i class="bi {{ $event->icon }}"></i></div>
                  <div class="fw-bold" style="color:var(--c-gold)">{{ $event->year }}</div>
                  <h6 class="fw-bold">{{ $event->title }}</h6>
                  <p class="small text-secondary mb-0">{{ $event->description }}</p>
                </div>
              </div>
            @endforeach
          </div>
        @endif

        @if($biography->contributions)
          <h3 class="mt-5">الجانب الإنساني</h3>
          <p class="text-secondary">{{ $biography->contributions }}</p>
        @endif

        @if($biography->honors)
          <h3 class="mt-5">التكريمات والمكانة</h3>
          <p class="text-secondary">{{ $biography->honors }}</p>
        @endif

        @if($archiveImages->isNotEmpty())
          <h3 class="mt-5 mb-3">صور أرشيفية</h3>
          <div class="gallery-grid">
            @foreach($archiveImages as $g)
              <a href="{{ \Illuminate\Support\Facades\Storage::url($g->image) }}" class="glightbox">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($g->image) }}" alt="{{ $g->alt }}" loading="lazy">
              </a>
            @endforeach
          </div>
        @endif

        <h3 class="mt-5">مصادر ومراجع</h3>
        <ul class="text-secondary small">
          <li>وكالة الأنباء الكويتية (كونا) — <a href="https://www.kuna.net.kw/ArticleDetails.aspx?id=2627223" target="_blank" rel="noopener">بيان نعي الديوان الأميري</a></li>
          <li>ويكيبيديا / Wikidata — <a href="https://www.wikidata.org/wiki/Q20382395" target="_blank" rel="noopener">صفحة البيانات الموثقة</a></li>
          <li>Arabian Business — <a href="https://www.arabianbusiness.com/100-most-powerful-arab-women-2013-491497.html" target="_blank" rel="noopener">أقوى 100 سيدة أعمال عربية 2013</a></li>
          <li>جريدة القبس — <a href="https://alqabas.com/article/422607" target="_blank" rel="noopener">الكويت تفقد سعاد الحميضي</a></li>
          <li>صحيفة عكاظ — <a href="https://www.okaz.com.sa/specialized-corners/na/2056470" target="_blank" rel="noopener">سعاد الحميضي.. أول سيدة أعمال كويتية</a></li>
        </ul>
        @if($biography->source_name)
          <p class="notice-source">المصدر الأساسي المعتمد لهذه الصفحة: {{ $biography->source_name }}</p>
        @endif
      </div>
    </div>
  </div>
</section>

@endsection
