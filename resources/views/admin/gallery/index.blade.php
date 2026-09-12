@extends('admin.layout')
@php($title = 'معرض الصور')

@section('content')
<div class="alert alert-warning small">تنبيه: لا ترفع صورًا حقيقية للفقيدة إلا بعد التأكد من وضوح حقوق النشر الخاصة بها.</div>
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('admin.gallery.create') }}" class="btn btn-dark btn-sm"><i class="bi bi-plus-lg"></i> إضافة صورة</a>
</div>
<div class="row g-3">
  @forelse($items as $item)
    <div class="col-md-3">
      <div class="stat-card p-2">
        <img src="{{ \Illuminate\Support\Facades\Storage::url($item->image) }}" class="w-100 rounded mb-2" style="aspect-ratio:1/1;object-fit:cover;" alt="{{ $item->alt }}">
        <p class="small mb-1">{{ $item->caption }}</p>
        <span class="badge bg-{{ $item->status === 'published' ? 'success' : 'secondary' }}">{{ $item->status }}</span>
        <div class="d-flex justify-content-between mt-2">
          <a href="{{ route('admin.gallery.edit', $item) }}" class="btn btn-sm btn-outline-secondary">تعديل</a>
          <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">حذف</button>
          </form>
        </div>
      </div>
    </div>
  @empty
    <p class="text-secondary text-center py-4">لا توجد صور بعد.</p>
  @endforelse
</div>
@endsection
