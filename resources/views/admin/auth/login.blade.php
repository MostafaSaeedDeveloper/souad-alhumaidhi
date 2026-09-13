<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>تسجيل الدخول | لوحة إدارة سعاد الحميضي</title>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
  body{ font-family:"IBM Plex Sans Arabic", sans-serif; background:#1b1712; min-height:100vh; display:flex; align-items:center; }
  .login-card{ background:#fff; border-radius:.75rem; padding:2.5rem; max-width:420px; margin-inline:auto; border-top:3px solid #b6893f; }
  .btn-gold{ background:linear-gradient(180deg,#d4af6a,#b6893f); border:none; color:#1b1712; font-weight:600; }
</style>
</head>
<body>
<div class="container">
  <div class="login-card">
    <h1 class="h4 text-center mb-1">سعاد الحميضي</h1>
    <p class="text-center text-secondary small mb-4">لوحة إدارة الموقع التكريمي</p>

    @if($errors->any())
      <div class="alert alert-danger small">
        @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.attempt') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">البريد الإلكتروني</label>
        <input type="email" name="email" class="form-control" required autofocus value="{{ old('email') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">كلمة المرور</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember">
        <label class="form-check-label small" for="remember">تذكرني</label>
      </div>
      <button type="submit" class="btn btn-gold w-100">تسجيل الدخول</button>
    </form>
  </div>
</div>
</body>
</html>
