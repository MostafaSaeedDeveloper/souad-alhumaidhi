@extends('admin.layout')
@php($title = 'الإعدادات')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" class="stat-card">
  @csrf
  @method('PUT')

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
