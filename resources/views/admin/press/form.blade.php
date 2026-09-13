@extends('admin.layout')
@php($title = $item->exists ? 'تعديل ذكر صحفي' : 'إضافة ذكر صحفي')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.press.update', $item) : route('admin.press.store') }}" class="stat-card">
  @csrf
  @if($item->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-md-8">
      <label class="form-label">العنوان *</label>
      <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label class="form-label">الجهة الإعلامية *</label>
      <select name="media_outlet_id" class="form-select" required>
        @foreach($outlets as $outlet)
          <option value="{{ $outlet->id }}" @selected(old('media_outlet_id', $item->media_outlet_id) == $outlet->id)>{{ $outlet->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">رابط المقال</label>
      <input type="url" name="url" value="{{ old('url', $item->url) }}" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">تاريخ النشر</label>
      <input type="date" name="published_at" value="{{ old('published_at', $item->published_at?->format('Y-m-d')) }}" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">الحالة</label>
      <select name="status" class="form-select">
        <option value="published" @selected(old('status', $item->status ?: 'published') === 'published')>منشور</option>
        <option value="draft" @selected(old('status', $item->status) === 'draft')>مسودة</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-dark mt-4">حفظ</button>
  <a href="{{ route('admin.press.index') }}" class="btn btn-outline-secondary mt-4">إلغاء</a>
</form>
@endsection
