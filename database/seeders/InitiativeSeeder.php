<?php

namespace Database\Seeders;

use App\Models\Initiative;
use App\Support\ArabicSlug;
use Illuminate\Database\Seeder;

class InitiativeSeeder extends Seeder
{
    public function run(): void
    {
        // Verified against multiple independent press sources that agree on the same specific
        // details (facility name, honoree, honor given): albayan.ae, okaz.com.sa, wikirowad.com.
        // No specific dates were reported in any source, so none are stated here.
        $items = [
            [
                'title' => 'مركز حمد الحميضي وشيخة السديراوي الصحي',
                'icon' => 'bi-hospital',
                'summary' => 'أنشأت سعاد الحميضي مركزًا صحيًا يحمل اسم "مركز حمد الحميضي وشيخة السديراوي" في منطقة الشويخ بالكويت لتقديم الخدمات الطبية.',
                'content' => 'أسّست سعاد الحميضي مركز "حمد الحميضي وشيخة السديراوي" الصحي في منطقة الشويخ بدولة الكويت، تكريمًا لوالديها، لتقديم الخدمات الطبية للمواطنين والمقيمين.',
                'category' => 'humanitarian',
                'source_name' => 'صحيفة البيان الإماراتية',
                'source_url' => 'https://www.albayan.ae/culture-art/celebrities/2021-01-31-1.4079444',
                'is_verified' => true,
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'title' => 'ترميم جامع العمري الكبير في بيروت',
                'icon' => 'bi-moon-stars',
                'summary' => 'قامت سعاد الحميضي بترميم جامع العمري الكبير في قلب بيروت على نفقتها الخاصة، وكرّمها رئيس الوزراء اللبناني الراحل رفيق الحريري بوشاح الأرز تقديرًا لذلك.',
                'content' => 'مَوّلت سعاد الحميضي من مالها الخاص عملية ترميم وتأهيل جامع العمري الكبير في قلب العاصمة اللبنانية بيروت، وهو أحد أقدم وأهم المساجد التاريخية في المدينة. وتقديرًا لهذا الإسهام، قلّدها رئيس الوزراء اللبناني الراحل رفيق الحريري "وشاح الأرز".',
                'category' => 'charity',
                'source_name' => 'صحيفة عكاظ السعودية',
                'source_url' => 'https://www.okaz.com.sa/specialized-corners/na/2056470',
                'is_verified' => true,
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'title' => 'مشروع تعليمي وسكني لرعاية الأيتام في لبنان',
                'icon' => 'bi-mortarboard',
                'summary' => 'أسّست سعاد الحميضي في لبنان مشروعًا تعليميًا وسكنيًا استقبل نحو 3000 طالب من الأيتام من مختلف المناطق والأديان، وكرّمها بابا الفاتيكان تقديرًا لهذا العمل الإنساني.',
                'content' => 'أنشأت سعاد الحميضي في لبنان مشروعًا يجمع بين الجانبين التعليمي والسكني، استقبل نحو 3000 طالب من الأيتام من مختلف المناطق والأديان. وتقديرًا لهذا العمل الإنساني، حصلت على وسام تقدير وكتاب شكر من بابا الفاتيكان.',
                'category' => 'humanitarian',
                'source_name' => 'موقع Wikirowad (رائدات الخليج العربي)',
                'source_url' => 'https://wikirowad.com/ar/portfolio-item/%D8%B3%D8%B9%D8%A7%D8%AF-%D8%A7%D9%84%D8%AD%D9%85%D9%8A%D8%B6%D9%8A/',
                'is_verified' => true,
                'status' => 'published',
                'sort_order' => 3,
            ],
        ];

        foreach ($items as $item) {
            Initiative::updateOrCreate(
                ['title' => $item['title']],
                $item + ['slug' => ArabicSlug::make($item['title'])]
            );
        }
    }
}
