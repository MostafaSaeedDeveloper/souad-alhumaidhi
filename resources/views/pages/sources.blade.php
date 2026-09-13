@extends('layouts.app')

@section('title', 'المصادر والمراجع — سعاد الحميضي')
@section('description', 'قائمة كاملة بالمصادر والمراجع الصحفية والموسوعية التي استُخدمت لتوثيق سيرة سعاد الحميضي.')

@section('content')
<section class="section" style="padding-top:8rem;">
    <div class="container-xl-custom">
        <x-section-title eyebrow="شفافية كاملة" title="المصادر والمراجع" subtitle="كل معلومة في هذا الموقع مستندة إلى مصدر موثق أدناه" />

        <div class="row justify-content-center mb-5">
            <div class="col-lg-9">
                <div class="gold-card">
                    <p class="mb-0">هذا موقع تكريمي أرشيفي غير رسمي، أُعدّ بالاعتماد على مصادر عامة متاحة على الإنترنت (موسوعات، صحف، مجلات اقتصادية). لم يُستخدم أي محتوى مختلق أو غير موثق. الصور ومقاطع الفيديو التي تعذّر التحقق من حقوقها لم تُنشر، وسُجّلت كمرشحات في <code>docs/media-candidates.md</code> ضمن مستودع المشروع لمراجعتها لاحقًا.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>الجهة الناشرة</th>
                                <th>النوع</th>
                                <th>تاريخ النشر</th>
                                <th>الرابط</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sources as $source)
                                <tr>
                                    <td>{{ $source->title }}</td>
                                    <td>{{ $source->publisher }}</td>
                                    <td><span class="badge-gold">{{ $source->source_type }}</span></td>
                                    <td>{{ $source->published_at?->translatedFormat('Y/m/d') ?? '—' }}</td>
                                    <td>
                                        @if ($source->url)
                                            <a href="{{ $source->url }}" target="_blank" rel="noopener nofollow">الرابط الأصلي <i class="bi bi-box-arrow-up-left"></i></a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
