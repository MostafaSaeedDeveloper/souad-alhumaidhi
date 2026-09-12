@extends('admin.layout')
@php($title = 'اللقاءات والفيديو')

@section('content')
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('admin.media.create') }}" class="btn btn-dark btn-sm"><i class="bi bi-plus-lg"></i> إضافة لقاء</a>
</div>
<div class="table-responsive stat-card">
  <table class="table align-middle mb-0">
    <thead><tr><th>العنوان</th><th>الجهة</th><th>التاريخ</th><th>الحالة</th><th></th></tr></thead>
    <tbody>
      @forelse($items as $item)
        <tr>
          <td>{{ $item->title }}</td>
          <td>{{ $item->channel_name }}</td>
          <td>{{ $item->published_at?->format('Y/m/d') }}</td>
          <td><span class="badge bg-{{ $item->status === 'published' ? 'success' : 'secondary' }}">{{ $item->status }}</span></td>
          <td class="text-end">
            <a href="{{ route('admin.media.edit', $item) }}" class="btn btn-sm btn-outline-secondary">تعديل</a>
            <form action="{{ route('admin.media.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('تأكيد الحذف؟')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">حذف</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5" class="text-center text-secondary py-4">لا توجد عناصر بعد.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
