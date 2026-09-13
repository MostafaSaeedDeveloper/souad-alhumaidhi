@extends('admin.layout')
@php($title = 'الاقتباسات')

@section('content')
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('admin.quotes.create') }}" class="btn btn-dark btn-sm"><i class="bi bi-plus-lg"></i> إضافة اقتباس</a>
</div>
<div class="table-responsive stat-card">
  <table class="table align-middle mb-0">
    <thead><tr><th>النص</th><th>المنسوب إليه</th><th>النوع</th><th>الحالة</th><th>التحقق</th><th></th></tr></thead>
    <tbody>
      @forelse($items as $item)
        <tr>
          <td>{{ \Illuminate\Support\Str::limit($item->quote_text, 50) }}</td>
          <td>{{ $item->attributed_to }}</td>
          <td>{{ $item->type }}</td>
          <td><span class="badge bg-{{ $item->status === 'published' ? 'success' : 'secondary' }}">{{ $item->status }}</span></td>
          <td>{{ $item->is_verified ? '✔️' : '—' }}</td>
          <td class="text-end">
            <a href="{{ route('admin.quotes.edit', $item) }}" class="btn btn-sm btn-outline-secondary">تعديل</a>
            <form action="{{ route('admin.quotes.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('تأكيد الحذف؟')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">حذف</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center text-secondary py-4">لا توجد عناصر بعد.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
