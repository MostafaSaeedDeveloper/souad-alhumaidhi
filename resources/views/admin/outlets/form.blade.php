@extends('admin.layout')
@php($title = $item->exists ? 'تعديل جهة إعلامية' : 'إضافة جهة إعلامية')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.outlets.update', $item) : route('admin.outlets.store') }}" enctype="multipart/form-data" class="stat-card">
  @csrf
  @if($item->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">الاسم *</label>
      <input type="text" name="name" value="{{ old('name', $item->name) }}" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">الدولة</label>
      <input type="text" name="country" value="{{ old('country', $item->country) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">رابط الموقع</label>
      <input type="url" name="website_url" value="{{ old('website_url', $item->website_url) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">الشعار (اختياري)</label>
      <input type="file" name="logo" class="form-control" accept="image/*">
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
  </div>
  <button type="submit" class="btn btn-dark mt-4">حفظ</button>
  <a href="{{ route('admin.outlets.index') }}" class="btn btn-outline-secondary mt-4">إلغاء</a>
</form>
@endsection
