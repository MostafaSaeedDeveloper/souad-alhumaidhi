@extends('admin.layout')
@php($title = 'رسائل التواصل')

@section('content')
<div class="table-responsive stat-card">
  <table class="table align-middle mb-0">
    <thead><tr><th>الاسم</th><th>البريد</th><th>الموضوع</th><th>الرسالة</th><th>الحالة</th><th></th></tr></thead>
    <tbody>
      @forelse($items as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->subject }}</td>
          <td>{{ \Illuminate\Support\Str::limit($item->message, 50) }}</td>
          <td><span class="badge bg-{{ $item->status === 'new' ? 'primary' : 'secondary' }}">{{ $item->status }}</span></td>
          <td class="text-end">
            <form action="{{ route('admin.contact-messages.update', $item) }}" method="POST" class="d-inline">
              @csrf @method('PUT')
              <select name="status" onchange="this.form.submit()" class="form-select form-select-sm d-inline w-auto">
                <option value="new" @selected($item->status === 'new')>جديدة</option>
                <option value="read" @selected($item->status === 'read')>مقروءة</option>
                <option value="replied" @selected($item->status === 'replied')>تم الرد</option>
              </select>
            </form>
            <form action="{{ route('admin.contact-messages.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('تأكيد الحذف؟')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">حذف</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center text-secondary py-4">لا توجد رسائل بعد.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-3">{{ $items->links() }}</div>
@endsection
