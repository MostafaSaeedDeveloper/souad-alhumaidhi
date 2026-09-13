@extends('admin.layout')
@php($title = 'السيرة الذاتية')

@section('content')
<form method="POST" action="{{ route('admin.biography.update') }}" enctype="multipart/form-data" class="stat-card">
  @csrf
  @method('PUT')
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">الاسم الكامل</label>
      <input type="text" name="full_name" value="{{ old('full_name', $biography->full_name) }}" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">اللقب / الصفة</label>
      <input type="text" name="title" value="{{ old('title', $biography->title) }}" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">سنة الميلاد</label>
      <input type="text" name="birth_year" value="{{ old('birth_year', $biography->birth_year) }}" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">سنة الوفاة</label>
      <input type="text" name="death_year" value="{{ old('death_year', $biography->death_year) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">الجنسية</label>
      <input type="text" name="nationality" value="{{ old('nationality', $biography->nationality) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">صورة (اختياري — لا ترفع صورًا دون التأكد من حقوق النشر)</label>
      <input type="file" name="image" class="form-control" accept="image/*">
      @if($biography->image)<div class="small text-secondary mt-1">الصورة الحالية محفوظة.</div>@endif
    </div>
    <div class="col-12">
      <label class="form-label">مقدمة قصيرة</label>
      <textarea name="intro" rows="3" class="form-control">{{ old('intro', $biography->intro) }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">النشأة والبدايات</label>
      <textarea name="early_life" rows="4" class="form-control">{{ old('early_life', $biography->early_life) }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">المسيرة المهنية</label>
      <textarea name="career" rows="4" class="form-control">{{ old('career', $biography->career) }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">الجانب الإنساني</label>
      <textarea name="contributions" rows="4" class="form-control">{{ old('contributions', $biography->contributions) }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">التكريمات</label>
      <textarea name="honors" rows="3" class="form-control">{{ old('honors', $biography->honors) }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">النص الكامل للسيرة</label>
      <textarea name="full_content" rows="8" class="form-control">{{ old('full_content', $biography->full_content) }}</textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">اسم المصدر</label>
      <input type="text" name="source_name" value="{{ old('source_name', $biography->source_name) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">رابط المصدر</label>
      <input type="url" name="source_url" value="{{ old('source_url', $biography->source_url) }}" class="form-control">
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_verified" id="is_verified" value="1" {{ old('is_verified', $biography->is_verified) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_verified">تم التحقق من هذه المعلومات</label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-gold mt-4" style="background:linear-gradient(180deg,#d4af6a,#b6893f);border:none;color:#1b1712;font-weight:600;">حفظ التغييرات</button>
</form>
@endsection
