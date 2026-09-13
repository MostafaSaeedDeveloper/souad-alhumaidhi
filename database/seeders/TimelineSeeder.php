<?php

namespace Database\Seeders;

use App\Models\TimelineEvent;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    public function run(): void
    {
        $wikiAr = SourcesSeeder::find('wikipedia_ar');
        $okaz = SourcesSeeder::find('okaz');
        $albayan = SourcesSeeder::find('albayan');
        $arabianBusiness = SourcesSeeder::find('arabian_business');
        $kuwaitTimes = SourcesSeeder::find('kuwait_times');

        $events = [
            [
                'year' => '1939',
                'title' => 'الميلاد في الكويت',
                'description' => 'وُلدت سعاد حمد الصالح الحميضي في فريج عباس بمنطقة الجبلة، الكويت.',
                'icon' => 'bi-flag',
                'source_id' => $okaz?->id,
            ],
            [
                'year' => '1953',
                'title' => 'بداية العمل في البنك التجاري الكويتي',
                'description' => 'التحقت بالعمل في البنك التجاري الكويتي الذي أسسه والدها، واستمرت فيه قرابة عشر سنوات.',
                'icon' => 'bi-bank',
                'source_id' => $wikiAr?->id,
            ],
            [
                'year' => '1963',
                'title' => 'إدارة أعمال العائلة',
                'description' => 'بعد وفاة والدها في ديسمبر 1963، تولت إدارة مؤسسته التجارية واستثماراته.',
                'icon' => 'bi-briefcase',
                'source_id' => $okaz?->id,
            ],
            [
                'year' => '1969',
                'title' => 'محطة إنسانية',
                'description' => 'توفي زوجها الأول مرزوق محمد الغانم، وواصلت مسؤولياتها العائلية والمهنية.',
                'icon' => 'bi-heart',
                'source_id' => $okaz?->id,
            ],
            [
                'year' => '1970s',
                'title' => 'توسع الاستثمارات العقارية والمصرفية',
                'description' => 'وسّعت استثماراتها في قطاعي المصارف والعقار داخل الكويت وخارجها، وأصبحت عضوًا مؤسسًا في البنك الأهلي الكويتي.',
                'icon' => 'bi-graph-up-arrow',
                'source_id' => $wikiAr?->id,
            ],
            [
                'year' => '1980s',
                'title' => 'دخول الاستثمار العقاري في لبنان',
                'description' => 'امتلكت فندقًا وبرجًا سكنيًا في بيروت، وانضمت إلى مجلس إدارة بنك عودة اللبناني.',
                'icon' => 'bi-building',
                'source_id' => $wikiAr?->id,
            ],
            [
                'year' => '1994',
                'title' => 'وفاة الشيخ جابر العلي',
                'description' => 'توفي زوجها الثاني الشيخ جابر العلي السالم الصباح بعد 25 عامًا من الزواج.',
                'icon' => 'bi-heart',
                'source_id' => $albayan?->id,
            ],
            [
                'year' => '1990s',
                'title' => 'أكبر صفقة عقارية',
                'description' => 'أبرمت صفقة عقارية بقيمة 40 مليون دينار كويتي شملت مبادلة أراضٍ مقابل حصة 50% من سوق السالمية الجنوبي.',
                'icon' => 'bi-cash-stack',
                'source_id' => $okaz?->id,
            ],
            [
                'year' => '2007',
                'title' => 'تكريم في منتدى المرأة العربية والمستقبل',
                'description' => 'كُرّمت في فعاليات منتدى المرأة العربية والمستقبل الذي أُقيم في دبي.',
                'icon' => 'bi-award',
                'source_id' => $wikiAr?->id,
            ],
            [
                'year' => '2013',
                'title' => 'ضمن أقوى 100 امرأة عربية',
                'description' => 'صنّفتها مجلة Arabian Business ضمن قائمة أقوى 100 امرأة عربية، ووصفتها بأنها سفيرة لسيدات الأعمال في المنطقة.',
                'icon' => 'bi-trophy',
                'source_id' => $arabianBusiness?->id,
            ],
            [
                'year' => '2017',
                'title' => 'الوفاة',
                'description' => 'توفيت في 3 أغسطس 2017 عن عمر 78 عامًا، ونعاها الديوان الأميري الكويتي.',
                'icon' => 'bi-flower1',
                'source_id' => $kuwaitTimes?->id,
            ],
        ];

        foreach ($events as $index => $event) {
            TimelineEvent::query()->updateOrCreate(
                ['year' => $event['year'], 'title' => $event['title']],
                $event + ['sort_order' => $index]
            );
        }
    }
}
