# سعاد الحميضي — موقع تكريمي

موقع تكريمي/أرشيفي (Memorial / Tribute) يوثّق سيرة الراحلة **سعاد حمد الصالح الحميضي** (1939 – 2017)، أول سيدة أعمال كويتية، مبنيّ على Laravel + Blade + MySQL/SQLite + Bootstrap 5 RTL + jQuery، بدون أي اعتماد على npm/Vite في وقت التشغيل.

## التشغيل من الصفر

```bash
composer install
cp .env.example .env
php artisan key:generate
# اضبط DB_CONNECTION في .env — mysql للإنتاج، أو اتركه sqlite للتجربة السريعة
touch database/database.sqlite   # فقط إذا استخدمت sqlite
php artisan migrate --seed
php artisan serve
```

يعمل الموقع بالكامل بدون تشغيل أي أمر npm/yarn/pnpm/vite — جميع ملفات CSS/JS محمّلة محليًا في `public/assets`.

## بنية الأصول (بدون Node)

```
public/assets/css/        app.css, animations.css, responsive.css
public/assets/js/         app.js (jQuery + Vanilla JS)
public/assets/fonts/      Cairo + Noto Kufi Arabic (woff2 محلي)
public/assets/vendor/     Bootstrap 5 RTL, jQuery, Bootstrap Icons, AOS, GLightbox
```

## قاعدة البيانات والمصادر

كل معلومة منشورة في الموقع مرتبطة بسجل في جدول `sources`. راجع:

- `docs/research.md` — جدول كامل بالمصادر المستخدمة (ويكيبيديا، عكاظ، البيان، Kuwait Times، Arabian Business).
- `docs/media-candidates.md` — صور/فيديوهات تم العثور عليها لكن لم تُنشر لعدم التأكد من حقوقها.
- `/sources` داخل الموقع — نفس القائمة معروضة للزوار.

**ملاحظة شفافية مهمة**: لم يُعثر أثناء البحث على صورة شخصية أو فيديو لقاء موثّق الحقوق يمكن نشره قانونيًا للراحلة، لذا لا تحتوي صفحتا "الصور" و"اللقاءات والإعلام" على عناصر افتراضية أو ملفّقة، بل رسالة توضيحية وإحالة لصفحة المصادر. جداول `gallery_images` و`media_items` جاهزة بالكامل (نماذج، Migrations، صفحات، Lightbox، Modal فيديو، YouTubeService) لإضافة عناصر حقيقية فور توفر مصدر موثوق.

## الاختبارات

```bash
php artisan test
```

## الأوامر المخصصة

`app/Services/YouTubeService.php` يستخرج معرف الفيديو من روابط `youtu.be` / `watch` / `embed`، ويولّد رابط تضمين خاص بالخصوصية (`youtube-nocookie.com`)، تمهيدًا لإضافة لقاءات موثّقة لاحقًا دون تعديل بنية الموقع.
