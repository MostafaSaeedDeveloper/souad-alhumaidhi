@extends('admin.layout')
@php($title = $item->exists ? 'تعديل محطة' : 'إضافة محطة')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.timeline.update', $item) : route('admin.timeline.store') }}" class="stat-card">
  @csrf
  @if($item->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-md-3">
      <label class="form-label">السنة *</label>
      <input type="text" name="year" value="{{ old('year', $item->year) }}" class="form-control" required>
    </div>
    <div class="col-md-9">
      <label class="form-label">العنوان *</label>
      <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required>
    </div>
    <div class="col-12">
      <label class="form-label">الوصف</label>
      <textarea name="description" rows="3" class="form-control">{{ old('description', $item->description) }}</textarea>
    </div>
    <div class="col-md-4">
      <label class="form-label">أيقونة Bootstrap Icons</label>
      <input type="text" name="icon" value="{{ old('icon', $item->icon) }}" class="form-control" placeholder="bi-flag">
    </div>
    <div class="col-md-4">
      <label class="form-label">اسم المصدر</label>
      <input type="text" name="source_name" value="{{ old('source_name', $item->source_name) }}" class="form-control">
    </div>
    <div class="col-md-4">
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
        <option value="published" @selected(old('status', $item->status) === 'published')>منشور</option>
        <option value="draft" @selected(old('status', $item->status) === 'draft')>مسودة</option>
      </select>
    </div>
    <div class="col-md-4 d-flex align-items-end">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_verified" id="is_verified" value="1" {{ old('is_verified', $item->is_verified) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_verified">تم التحقق</label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-dark mt-4">حفظ</button>
  <a href="{{ route('admin.timeline.index') }}" class="btn btn-outline-secondary mt-4">إلغاء</a>
</form>
@endsection
