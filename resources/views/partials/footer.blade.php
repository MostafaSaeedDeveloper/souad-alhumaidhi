@php
    $social = [
        'youtube' => \App\Models\Setting::get('social_youtube'),
        'twitter' => \App\Models\Setting::get('social_twitter'),
        'instagram' => \App\Models\Setting::get('social_instagram'),
        'linkedin' => \App\Models\Setting::get('social_linkedin'),
    ];
@endphp
<footer id="siteFooter">
  <div class="container-xl">
    <div class="row gy-4">
      <div class="col-lg-4">
        <a href="{{ route('home') }}" class="brand-mark mb-3 d-inline-flex">
          <svg viewBox="0 0 40 40" width="34" height="34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="19" stroke="#d4af6a" stroke-width="1"/>
            <path d="M20 8c6 8 6 16 0 24-6-8-6-16 0-24z" fill="#d4af6a"/>
          </svg>
          <span class="fs-5 fw-semibold text-white">سعاد الحميضي</span>
        </a>
        <p class="font-display text-warning-emphasis" style="color:var(--c-gold-pale)">رحلة عطاء .. أثر لا ينتهي</p>
        <p class="small">موقع تكريمي يوثق مسيرة سعاد الحميضي وإرثها الإنساني والمهني.</p>
      </div>
      <div class="col-6 col-lg-2">
        <h6 class="mb-3">روابط سريعة</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2">
          <li><a href="{{ route('home') }}">الرئيسية</a></li>
          <li><a href="{{ route('biography') }}">السيرة الذاتية</a></li>
          <li><a href="{{ route('achievements.index') }}">الإنجازات</a></li>
          <li><a href="{{ route('media.index') }}">اللقاءات والإعلام</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h6 class="mb-3">استكشف</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2">
          <li><a href="{{ route('gallery.index') }}">معرض الصور</a></li>
          <li><a href="{{ route('initiatives.index') }}">مبادراتها</a></li>
          <li><a href="{{ route('articles.index') }}">مقالات وأخبار</a></li>
          <li><a href="{{ route('tributes.index') }}">كلمات الوفاء</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h6 class="mb-3">تواصل معنا</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2 mb-3">
          <li><a href="{{ route('contact') }}"><i class="bi bi-envelope ms-1"></i> نموذج التواصل</a></li>
        </ul>
        <div class="social-links">
          @if($social['youtube']) <a href="{{ $social['youtube'] }}" target="_blank" rel="noopener" aria-label="يوتيوب"><i class="bi bi-youtube"></i></a> @endif
          @if($social['twitter']) <a href="{{ $social['twitter'] }}" target="_blank" rel="noopener" aria-label="إكس"><i class="bi bi-twitter-x"></i></a> @endif
          @if($social['instagram']) <a href="{{ $social['instagram'] }}" target="_blank" rel="noopener" aria-label="انستقرام"><i class="bi bi-instagram"></i></a> @endif
          @if($social['linkedin']) <a href="{{ $social['linkedin'] }}" target="_blank" rel="noopener" aria-label="لينكدإن"><i class="bi bi-linkedin"></i></a> @endif
        </div>
      </div>
    </div>
    <div class="bottom-bar d-flex flex-wrap justify-content-between gap-2">
      <span>© {{ date('Y') }} موقع سعاد الحميضي. جميع الحقوق محفوظة لأسرة الفقيدة.</span>
      <span>عطاؤها مستمر .. وقيمها باقية</span>
    </div>
  </div>
</footer>
