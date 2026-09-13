@extends('layouts.app')

@section('title', 'معرض الصور — سعاد الحميضي')
@section('description', 'معرض صور موثق المصادر من مسيرة سعاد الحميضي.')

@section('content')
<section class="section" style="padding-top:8rem;">
    <div class="container-xl-custom">
        <x-section-title eyebrow="لحظات من رحلة العطاء" title="معرض الصور" />

        @php $allImages = $albums->flatMap->images; @endphp

        @if ($allImages->isEmpty())
            <div class="text-center text-muted py-5">
                <i class="bi bi-images fs-1 d-block mb-3" style="color: var(--color-gold);"></i>
                <p class="mb-2">لم يُعثر حتى الآن على صور حقيقية موثقة الحقوق للراحلة يمكن نشرها ضمن هذا المعرض.</p>
                <p class="mb-0 small">تم تجنّب استخدام أي صورة غير مؤكدة الحقوق أو تحمل علامة مائية، التزامًا بسياسة الموقع. راجع <a href="{{ route('sources') }}">صفحة المصادر</a> لتفاصيل المرشحات قيد المراجعة.</p>
            </div>
        @else
            <div class="gallery-tabs media-tabs">
                <button type="button" class="active" data-filter="all">الكل</button>
                @foreach ($albums as $album)
                    <button type="button" data-filter="{{ $album->category }}">{{ $album->title }}</button>
                @endforeach
            </div>
            <div class="row g-3">
                @foreach ($allImages as $image)
                    <div class="col-6 col-md-4 col-lg-3 gallery-item-col" data-category="{{ $image->album->category ?? '' }}">
                        <x-gallery-item :image="$image" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
