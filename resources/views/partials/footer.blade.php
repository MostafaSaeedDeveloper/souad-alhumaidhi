<footer class="site-footer">
    <div class="container-xl-custom">
        <div class="row gy-4">
            <div class="col-lg-4">
                <h5 class="mb-2">سعاد الحميضي</h5>
                <p class="small mb-3">موقع تكريمي يوثق مسيرة الراحلة سعاد حمد الصالح الحميضي، أول سيدة أعمال كويتية، في التجارة والاستثمار والعمل الإنساني.</p>
            </div>
            <div class="col-lg-3 col-6">
                <h6 class="text-uppercase small text-white mb-3">التصفح</h6>
                <ul class="list-unstyled small d-flex flex-column gap-2">
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('biography') }}">السيرة الذاتية</a></li>
                    <li><a href="{{ route('timeline') }}">محطات المسيرة</a></li>
                    <li><a href="{{ route('achievements') }}">الإنجازات</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-6">
                <h6 class="text-uppercase small text-white mb-3">المزيد</h6>
                <ul class="list-unstyled small d-flex flex-column gap-2">
                    <li><a href="{{ route('media') }}">اللقاءات والإعلام</a></li>
                    <li><a href="{{ route('gallery') }}">معرض الصور</a></li>
                    <li><a href="{{ route('initiatives') }}">مبادراتها</a></li>
                    <li><a href="{{ route('press') }}">في الصحافة</a></li>
                    <li><a href="{{ route('sources') }}">المصادر والمراجع</a></li>
                </ul>
            </div>
            <div class="col-lg-2" id="contact">
                <h6 class="text-uppercase small text-white mb-3">حول الموقع</h6>
                <p class="small">موقع أرشيفي غير تجاري، أُعدّ لتوثيق سيرة الراحلة استنادًا إلى مصادر صحفية وموسوعية موثقة. راجع صفحة <a href="{{ route('sources') }}">المصادر</a> للاطلاع على المراجع الكاملة.</p>
            </div>
        </div>
        <div class="footer-bottom">
            © {{ now()->year }} — موقع تكريمي يوثق مسيرة الراحلة سعاد حمد الصالح الحميضي. عطاؤها مستمر.. وقيمها باقية.
        </div>
    </div>
</footer>
