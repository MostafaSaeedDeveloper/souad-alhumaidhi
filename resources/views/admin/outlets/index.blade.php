@extends('admin.layout')
@php($title = 'الجهات الإعلامية')

@section('content')
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('admin.outlets.create') }}" class="btn btn-dark btn-sm"><i class="bi bi-plus-lg"></i> إضافة جهة</a>
</div>
<div class="table-responsive stat-card">
  <table class="table align-middle mb-0">
    <thead><tr><th>الاسم</th><th>الدولة</th><th>الحالة</th><th></th></tr></thead>
    <tbody>
      @forelse($items as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->country }}</td>
          <td><span class="badge bg-{{ $item->status === 'published' ? 'success' : 'secondary' }}">{{ $item->status }}</span></td>
          <td class="text-end">
            <a href="{{ route('admin.outlets.edit', $item) }}" class="btn btn-sm btn-outline-secondary">تعديل</a>
            <form action="{{ route('admin.outlets.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('تأكيد الحذف؟')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">حذف</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center text-secondary py-4">لا توجد عناصر بعد.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
