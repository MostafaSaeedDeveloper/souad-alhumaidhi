@extends('admin.layout')
@php($title = $item->exists ? 'تعديل صورة' : 'إضافة صورة')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.gallery.update', $item) : route('admin.gallery.store') }}" enctype="multipart/form-data" class="stat-card">
  @csrf
  @if($item->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">الصورة {{ $item->exists ? '' : '*' }}</label>
      <input type="file" name="image" class="form-control" accept="image/*" {{ $item->exists ? '' : 'required' }}>
      @if($item->image)
        <img src="{{ \App\Support\Media::url($item->image) }}" class="mt-2 rounded" style="max-width:160px;">
      @endif
    </div>
    <div class="col-md-6">
      <label class="form-label">العنوان</label>
      <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">النص البديل (Alt) *</label>
      <input type="text" name="alt" value="{{ old('alt', $item->alt) }}" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">التسمية التوضيحية</label>
      <input type="text" name="caption" value="{{ old('caption', $item->caption) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">التصنيف</label>
      <select name="category" class="form-select">
        @foreach(['meetings' => 'لقاءات', 'events' => 'فعاليات', 'honors' => 'تكريمات', 'portraits' => 'صور شخصية', 'occasions' => 'مناسبات عامة', 'archive' => 'أرشيفية', 'general' => 'عام'] as $key => $label)
          <option value="{{ $key }}" @selected(old('category', $item->category) === $key)>{{ $label }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">اسم المصدر</label>
      <input type="text" name="source_name" value="{{ old('source_name', $item->source_name) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">رابط المصدر</label>
      <input type="url" name="source_url" value="{{ old('source_url', $item->source_url) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">ملاحظة حقوق النشر</label>
      <input type="text" name="copyright_note" value="{{ old('copyright_note', $item->copyright_note) }}" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">الترتيب</label>
      <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">الحالة</label>
      <select name="status" class="form-select">
        <option value="draft" @selected(old('status', $item->status ?: 'draft') === 'draft')>مسودة</option>
        <option value="published" @selected(old('status', $item->status) === 'published')>منشور</option>
      </select>
    </div>
    <div class="col-md-3 d-flex align-items-end">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_verified" value="1" id="iv" {{ old('is_verified', $item->is_verified) ? 'checked' : '' }}>
        <label class="form-check-label" for="iv">حقوق واضحة / تم التحقق</label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-dark mt-4">حفظ</button>
  <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary mt-4">إلغاء</a>
</form>
@endsection
