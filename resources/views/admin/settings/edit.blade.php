@extends('admin.layout')
@php($title = 'الإعدادات')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="stat-card">
  @csrf
  @method('PUT')

  <h6 class="fw-bold mb-3">صور الواجهة الرئيسية</h6>
  <p class="small text-secondary">يمكن رفع الصور من هنا مباشرة، أو وضع الملفات يدويًا داخل <code>public/uploads/</code> مباشرة (بدون مجلدات فرعية) بالأسماء: <code>hero-portrait.jpg</code>، <code>hero-bg.jpg</code>، <code>legacy-banner.jpg</code>، <code>biography.jpg</code> — ستظهر تلقائيًا دون أي تعديل إضافي ودون الحاجة لأمر storage:link.</p>
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <label class="form-label">صورة الـ Hero الأساسية (بورتريه)</label>
      <input type="file" name="hero_portrait_image" class="form-control" accept="image/*">
      @if(\App\Support\Media::url($settings['hero_portrait_image'] ?? null))
        <img src="{{ \App\Support\Media::url($settings['hero_portrait_image']) }}" class="mt-2 rounded" style="max-width:120px;">
      @endif
    </div>
    <div class="col-md-4">
      <label class="form-label">صورة خلفية الـ Hero (باهتة)</label>
      <input type="file" name="hero_bg_image" class="form-control" accept="image/*">
      @if(\App\Support\Media::url($settings['hero_bg_image'] ?? null))
        <img src="{{ \App\Support\Media::url($settings['hero_bg_image']) }}" class="mt-2 rounded" style="max-width:120px;">
      @endif
    </div>
    <div class="col-md-4">
      <label class="form-label">صورة بانر "يبقى الأثر"</label>
      <input type="file" name="legacy_banner_image" class="form-control" accept="image/*">
      @if(\App\Support\Media::url($settings['legacy_banner_image'] ?? null))
        <img src="{{ \App\Support\Media::url($settings['legacy_banner_image']) }}" class="mt-2 rounded" style="max-width:120px;">
      @endif
    </div>
    <div class="col-md-6">
      <label class="form-label">موضع صورة الـ Hero (object-position)</label>
      <input type="text" name="hero_object_position" value="{{ old('hero_object_position', $settings['hero_object_position'] ?? 'top center') }}" class="form-control" placeholder="top center">
      <div class="form-text">مثال: <code>top center</code> أو <code>50% 20%</code> لضبط الجزء الظاهر من الصورة.</div>
    </div>
    <div class="col-md-6">
      <label class="form-label">موضع صورة خلفية الـ Hero الباهتة (background-position)</label>
      <input type="text" name="hero_bg_object_position" value="{{ old('hero_bg_object_position', $settings['hero_bg_object_position'] ?? 'center top') }}" class="form-control" placeholder="center top">
      <div class="form-text">الصورة تُعرض بوضع <code>cover</code> دائمًا (تملأ المساحة بالكامل)؛ هذا الحقل يضبط أي جزء منها يظهر في المنتصف.</div>
    </div>
  </div>

  <h6 class="fw-bold mb-3">محتوى الواجهة الرئيسية</h6>
  <div class="row g-3 mb-4">
    <div class="col-md-6">
      <label class="form-label">عنوان الـ Hero العلوي</label>
      <input type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">الشعار الفرعي (Tagline)</label>
      <input type="text" name="hero_tagline" value="{{ old('hero_tagline', $settings['hero_tagline'] ?? '') }}" class="form-control">
    </div>
    <div class="col-12">
      <label class="form-label">وصف الـ Hero</label>
      <textarea name="hero_description" rows="3" class="form-control">{{ old('hero_description', $settings['hero_description'] ?? '') }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">اقتباس الـ Hero (نص عام غير منسوب ما لم يُتحقق منه)</label>
      <textarea name="hero_quote" rows="2" class="form-control">{{ old('hero_quote', $settings['hero_quote'] ?? '') }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">اقتباس بانر الصفحة الرئيسية</label>
      <textarea name="homepage_quote" rows="2" class="form-control">{{ old('homepage_quote', $settings['homepage_quote'] ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">نص الزر الرئيسي</label>
      <input type="text" name="cta_primary_text" value="{{ old('cta_primary_text', $settings['cta_primary_text'] ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">نص الزر الثانوي</label>
      <input type="text" name="cta_secondary_text" value="{{ old('cta_secondary_text', $settings['cta_secondary_text'] ?? '') }}" class="form-control">
    </div>
  </div>

  <h6 class="fw-bold mb-3">التذييل و SEO</h6>
  <div class="row g-3 mb-4">
    <div class="col-12">
      <label class="form-label">نص التذييل</label>
      <input type="text" name="footer_text" value="{{ old('footer_text', $settings['footer_text'] ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">عنوان SEO الافتراضي</label>
      <input type="text" name="site_meta_title" value="{{ old('site_meta_title', $settings['site_meta_title'] ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">وصف SEO الافتراضي</label>
      <input type="text" name="site_meta_description" value="{{ old('site_meta_description', $settings['site_meta_description'] ?? '') }}" class="form-control">
    </div>
  </div>

  <h6 class="fw-bold mb-3">روابط التواصل الاجتماعي</h6>
  <div class="row g-3 mb-4">
    <div class="col-md-6">
      <label class="form-label">يوتيوب</label>
      <input type="url" name="social_youtube" value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">إكس (تويتر)</label>
      <input type="url" name="social_twitter" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">انستقرام</label>
      <input type="url" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">لينكدإن</label>
      <input type="url" name="social_linkedin" value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}" class="form-control">
    </div>
  </div>

  <button type="submit" class="btn btn-dark">حفظ الإعدادات</button>
</form>
@endsection
