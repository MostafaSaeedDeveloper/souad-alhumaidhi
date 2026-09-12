@extends('admin.layout')
@php($title = $item->exists ? 'تعديل اقتباس' : 'إضافة اقتباس')

@section('content')
<form method="POST" action="{{ $item->exists ? route('admin.quotes.update', $item) : route('admin.quotes.store') }}" class="stat-card">
  @csrf
  @if($item->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-12">
      <label class="form-label">نص الاقتباس *</label>
      <textarea name="quote_text" rows="3" class="form-control" required>{{ old('quote_text', $item->quote_text) }}</textarea>
    </div>
    <div class="col-md-6">
      <label class="form-label">المنسوب إليه</label>
      <input type="text" name="attributed_to" value="{{ old('attributed_to', $item->attributed_to) }}" class="form-control">
    </div>
    <div class="col-md-6">
      <label class="form-label">الصفة / المنصب</label>
      <input type="text" name="attributed_role" value="{{ old('attributed_role', $item->attributed_role) }}" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">النوع</label>
      <select name="type" class="form-select">
        <option value="her_quote" @selected(old('type', $item->type) === 'her_quote')>اقتباس منها</option>
        <option value="testimonial" @selected(old('type', $item->type ?: 'testimonial') === 'testimonial')>شهادة عنها</option>
        <option value="general" @selected(old('type', $item->type) === 'general')>عام</option>
      </select>
    </div>
    <div class="col-md-8">
      <label class="form-label">السياق</label>
      <input type="text" name="context" value="{{ old('context', $item->context) }}" class="form-control">
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
  <a href="{{ route('admin.quotes.index') }}" class="btn btn-outline-secondary mt-4">إلغاء</a>
</form>
@endsection
