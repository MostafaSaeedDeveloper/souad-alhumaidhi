@extends('layouts.app')

@section('title', 'اللقاءات والإعلام — سعاد الحميضي')
@section('description', 'اللقاءات التلفزيونية والظهور الإعلامي لسعاد الحميضي.')

@section('content')
<section class="section" style="padding-top:8rem;">
    <div class="container-xl-custom">
        <x-section-title eyebrow="أفكار ملهمة.. رؤى واقعية" title="اللقاءات والإعلام" />

        <div class="media-tabs">
            @foreach (['all' => 'الكل', 'interview' => 'لقاءات', 'tv' => 'تلفزيون', 'documentary' => 'وثائقيات', 'honor' => 'تكريمات', 'archive' => 'أرشيف'] as $key => $label)
                <button type="button" class="{{ $category === $key ? 'active' : '' }}" data-filter="{{ $key }}">{{ $label }}</button>
            @endforeach
        </div>

        @if ($mediaItems->isEmpty())
            <div class="text-center text-muted py-5">
                <i class="bi bi-camera-reels fs-1 d-block mb-3" style="color: var(--color-gold);"></i>
                <p class="mb-2">لم يتم العثور بعد على لقاء تلفزيوني أو تسجيل موثّق الحقوق يمكن نشره ضمن هذا الأرشيف.</p>
                <p class="mb-0 small">راجع صفحة <a href="{{ route('sources') }}">المصادر</a> لتفاصيل عملية البحث والتحقق من الحقوق.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach ($mediaItems as $item)
                    <div class="col-md-6 col-lg-4 media-col">
                        <x-media-card :item="$item" />
                    </div>
                @endforeach
            </div>
            <div class="mt-5">{{ $mediaItems->links() }}</div>
        @endif
    </div>
</section>
@endsection
