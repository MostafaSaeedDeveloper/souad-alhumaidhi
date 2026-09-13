@extends('admin.layout')
@php($title = $item->exists ? 'تعديل لقاء' : 'إضافة لقاء')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.media.update', $item) : route('admin.media.store') }}" class="stat-card">
  @csrf
  @if($item->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-12">
      <label class="form-label">العنوان *</label>
      <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required>
    </div>
    <div class="col-12">
      <label class="form-label">الوصف</label>
      <textarea name="description" rows="3" class="form-control">{{ old('description', $item->description) }}</textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">رابط يوتيوب</label>
      <input type="url" name="youtube_url" value="{{ old('youtube_url', $item->youtube_url) }}" class="form-control" placeholder="https://www.youtube.com/watch?v=...">
    </div>
    <div class="col-md-6">
      <label class="form-label">اسم الجهة / البرنامج</label>
      <input type="text" name="channel_name" value="{{ old('channel_name', $item->channel_name) }}" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">تاريخ النشر</label>
      <input type="date" name="published_at" value="{{ old('published_at', $item->published_at?->format('Y-m-d')) }}" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">اسم المصدر</label>
      <input type="text" name="source_name" value="{{ old('source_name', $item->source_name) }}" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">رابط المصدر</label>
      <input type="url" name="source_url" value="{{ old('source_url', $item->source_url) }}" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">الترتيب</label>
      <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">الحالة</label>
      <select name="status" class="form-select">
        <option value="published" @selected(old('status', $item->status ?: 'published') === 'published')>منشور</option>
        <option value="draft" @selected(old('status', $item->status) === 'draft')>مسودة</option>
      </select>
    </div>
    <div class="col-md-3 d-flex align-items-end">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_verified" value="1" id="iv" {{ old('is_verified', $item->is_verified) ? 'checked' : '' }}>
        <label class="form-check-label" for="iv">تم التحقق</label>
      </div>
    </div>
    <div class="col-md-3 d-flex align-items-end">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="ift" {{ old('is_featured', $item->is_featured) ? 'checked' : '' }}>
        <label class="form-check-label" for="ift">مميز</label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-dark mt-4">حفظ</button>
  <a href="{{ route('admin.media.index') }}" class="btn btn-outline-secondary mt-4">إلغاء</a>
</form>
@endsection
