@extends('admin.layout')
@php($title = 'لوحة التحكم')

@section('content')
<div class="row g-3 mb-4">
  @foreach([
    ['label' => 'الإنجازات', 'count' => $stats['achievements'], 'icon' => 'bi-award'],
    ['label' => 'اللقاءات', 'count' => $stats['media'], 'icon' => 'bi-camera-video'],
    ['label' => 'صور المعرض', 'count' => $stats['gallery'], 'icon' => 'bi-images'],
    ['label' => 'المبادرات', 'count' => $stats['initiatives'], 'icon' => 'bi-heart'],
    ['label' => 'المقالات', 'count' => $stats['articles'], 'icon' => 'bi-newspaper'],
    ['label' => 'كلمات وفاء قيد المراجعة', 'count' => $stats['tributes_pending'], 'icon' => 'bi-envelope-heart'],
    ['label' => 'إجمالي كلمات الوفاء', 'count' => $stats['tributes_total'], 'icon' => 'bi-envelope-open-heart'],
    ['label' => 'رسائل تواصل جديدة', 'count' => $stats['contact_new'], 'icon' => 'bi-envelope'],
  ] as $s)
    <div class="col-6 col-lg-3">
      <div class="stat-card d-flex align-items-center gap-3">
        <i class="bi {{ $s['icon'] }} fs-3" style="color:#b6893f"></i>
        <div>
          <div class="fs-4 fw-bold">{{ $s['count'] }}</div>
          <div class="small text-secondary">{{ $s['label'] }}</div>
        </div>
      </div>
    </div>
  @endforeach
</div>

<div class="row g-4">
  <div class="col-lg-6">
    <div class="stat-card">
      <h6 class="fw-bold mb-3">أحدث كلمات الوفاء</h6>
      @forelse($latestTributes as $t)
        <div class="border-bottom py-2 d-flex justify-content-between">
          <div>
            <strong>{{ $t->name }}</strong>
            <div class="small text-secondary">{{ \Illuminate\Support\Str::limit($t->message, 60) }}</div>
          </div>
          <span class="badge bg-{{ $t->status === 'approved' ? 'success' : ($t->status === 'rejected' ? 'danger' : 'warning') }}">{{ $t->status }}</span>
        </div>
      @empty
        <p class="text-secondary small mb-0">لا توجد رسائل بعد.</p>
      @endforelse
      <a href="{{ route('admin.tributes.index') }}" class="small d-inline-block mt-3">عرض الكل &larr;</a>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="stat-card">
      <h6 class="fw-bold mb-3">أحدث رسائل التواصل</h6>
      @forelse($latestContacts as $c)
        <div class="border-bottom py-2 d-flex justify-content-between">
          <div>
            <strong>{{ $c->name }}</strong>
            <div class="small text-secondary">{{ \Illuminate\Support\Str::limit($c->message, 60) }}</div>
          </div>
          <span class="badge bg-{{ $c->status === 'new' ? 'primary' : 'secondary' }}">{{ $c->status }}</span>
        </div>
      @empty
        <p class="text-secondary small mb-0">لا توجد رسائل بعد.</p>
      @endforelse
      <a href="{{ route('admin.contact-messages.index') }}" class="small d-inline-block mt-3">عرض الكل &larr;</a>
    </div>
  </div>
</div>
@endsection
