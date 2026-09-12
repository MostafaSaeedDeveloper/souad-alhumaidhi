@extends('admin.layout')
@php($title = 'كلمات الوفاء')

@section('content')
<div class="table-responsive stat-card">
  <table class="table align-middle mb-0">
    <thead><tr><th>الاسم</th><th>المدينة</th><th>الرسالة</th><th>الحالة</th><th></th></tr></thead>
    <tbody>
      @forelse($items as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->city }}</td>
          <td>{{ \Illuminate\Support\Str::limit($item->message, 60) }}</td>
          <td><span class="badge bg-{{ $item->status === 'approved' ? 'success' : ($item->status === 'rejected' ? 'danger' : 'warning') }}">{{ $item->status }}</span></td>
          <td class="text-end">
            <form action="{{ route('admin.tributes.update', $item) }}" method="POST" class="d-inline">
              @csrf @method('PUT')
              <select name="status" onchange="this.form.submit()" class="form-select form-select-sm d-inline w-auto">
                <option value="pending" @selected($item->status === 'pending')>قيد المراجعة</option>
                <option value="approved" @selected($item->status === 'approved')>موافق عليها</option>
                <option value="rejected" @selected($item->status === 'rejected')>مرفوضة</option>
              </select>
            </form>
            <form action="{{ route('admin.tributes.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('تأكيد الحذف؟')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">حذف</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5" class="text-center text-secondary py-4">لا توجد رسائل بعد.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-3">{{ $items->links() }}</div>
@endsection
