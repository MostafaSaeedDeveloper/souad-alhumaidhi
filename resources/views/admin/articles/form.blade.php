@extends('admin.layout')
@php($title = $item->exists ? 'تعديل مقال' : 'إضافة مقال')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.articles.update', $item) : route('admin.articles.store') }}" enctype="multipart/form-data" class="stat-card">
  @csrf
  @if($item->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-12">
      <label class="form-label">العنوان *</label>
      <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required>
    </div>
    <div class="col-12">
      <label class="form-label">مقتطف</label>
      <textarea name="excerpt" rows="2" class="form-control">{{ old('excerpt', $item->excerpt) }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">المحتوى</label>
      <textarea name="content" rows="6" class="form-control">{{ old('content', $item->content) }}</textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">صورة</label>
      <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="col-md-6">
      <label class="form-label">تاريخ النشر</label>
      <input type="date" name="published_at" value="{{ old('published_at', $item->published_at?->format('Y-m-d')) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">اسم المصدر</label>
      <input type="text" name="source_name" value="{{ old('source_name', $item->source_name) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">رابط المصدر</label>
      <input type="url" name="source_url" value="{{ old('source_url', $item->source_url) }}" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">الترتيب</label>
      <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">الحالة</label>
      <select name="status" class="form-select">
        <option value="published" @selected(old('status', $item->status ?: 'published') === 'published')>منشور</option>
        <option value="draft" @selected(old('status', $item->status) === 'draft')>مسودة</option>
      </select>
    </div>
    <div class="col-md-2 d-flex align-items-end">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_verified" value="1" id="iv" {{ old('is_verified', $item->is_verified) ? 'checked' : '' }}>
        <label class="form-check-label" for="iv">تحقق</label>
      </div>
    </div>
    <div class="col-md-2 d-flex align-items-end">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="ift" {{ old('is_featured', $item->is_featured) ? 'checked' : '' }}>
        <label class="form-check-label" for="ift">مميز</label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-dark mt-4">حفظ</button>
  <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary mt-4">إلغاء</a>
</form>
@endsection
