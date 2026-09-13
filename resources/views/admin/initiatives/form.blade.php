@extends('admin.layout')
@php($title = $item->exists ? 'تعديل مبادرة' : 'إضافة مبادرة')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.initiatives.update', $item) : route('admin.initiatives.store') }}" enctype="multipart/form-data" class="stat-card">
  @csrf
  @if($item->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-md-8">
      <label class="form-label">العنوان *</label>
      <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label class="form-label">أيقونة</label>
      <input type="text" name="icon" value="{{ old('icon', $item->icon) }}" class="form-control" placeholder="bi-heart">
    </div>
    <div class="col-md-6">
      <label class="form-label">التصنيف</label>
      <select name="category" class="form-select">
        <option value="">— بدون —</option>
        @foreach(\App\Support\Categories::all() as $key => $label)
          <option value="{{ $key }}" @selected(old('category', $item->category) === $key)>{{ $label }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">صورة</label>
      <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="col-12">
      <label class="form-label">الملخص</label>
      <textarea name="summary" rows="2" class="form-control">{{ old('summary', $item->summary) }}</textarea>
    </div>
    <div class="col-12">
      <label class="form-label">التفاصيل</label>
      <textarea name="content" rows="5" class="form-control">{{ old('content', $item->content) }}</textarea>
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
        <option value="draft" @selected(old('status', $item->status ?: 'draft') === 'draft')>مسودة</option>
        <option value="published" @selected(old('status', $item->status) === 'published')>منشور</option>
      </select>
    </div>
    <div class="col-md-4 d-flex align-items-end">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_verified" value="1" id="iv" {{ old('is_verified', $item->is_verified) ? 'checked' : '' }}>
        <label class="form-check-label" for="iv">تم التحقق</label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-dark mt-4">حفظ</button>
  <a href="{{ route('admin.initiatives.index') }}" class="btn btn-outline-secondary mt-4">إلغاء</a>
</form>
@endsection
