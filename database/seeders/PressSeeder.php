<?php

namespace Database\Seeders;

use App\Models\PressMention;
use Illuminate\Database\Seeder;

class PressSeeder extends Seeder
{
    public function run(): void
    {
        $okaz = SourcesSeeder::find('okaz');
        $albayan = SourcesSeeder::find('albayan');
        $kuwaitTimes = SourcesSeeder::find('kuwait_times');
        $arabianBusiness = SourcesSeeder::find('arabian_business');
        $wikiEn = SourcesSeeder::find('wikipedia_en');

        $items = [
            [
                'title' => 'سعاد الحميضي.. أول سيدة أعمال كويتية',
                'publisher' => 'صحيفة عكاظ',
                'url' => 'https://www.okaz.com.sa/specialized-corners/na/2056470',
                'published_at' => '2021-01-31',
                'excerpt' => 'تقرير عن مسيرة سعاد الحميضي بوصفها أول سيدة أعمال كويتية، وأبرز محطاتها التجارية والعقارية.',
                'source_id' => $okaz?->id,
            ],
            [
                'title' => 'سعاد الحميضي.. أول سيدة أعمال كويتية',
                'publisher' => 'صحيفة البيان',
                'url' => 'https://www.albayan.ae/culture-art/celebrities/2021-01-31-1.4079444',
                'published_at' => '2021-01-31',
                'excerpt' => 'تغطية لمسيرتها الشخصية والمهنية وأعمالها الخيرية في الكويت ولبنان ومصر.',
                'source_id' => $albayan?->id,
            ],
            [
                'title' => 'Amiri Diwan mourns Suad Al-Humaidhi',
                'publisher' => 'Kuwait Times',
                'url' => 'https://kuwaittimes.com/amiri-diwan-mourns-suad-al-humaidhi/',
                'published_at' => '2017-08-03',
                'excerpt' => 'نعي رسمي بمناسبة وفاتها، يستعرض أبرز مناصبها ومساهماتها.',
                'source_id' => $kuwaitTimes?->id,
            ],
            [
                'title' => "The World's 100 Most Powerful Arab Women",
                'publisher' => 'Arabian Business',
                'url' => 'https://www.arabianbusiness.com/lists/the-world-s-100-most-powerful-arab-women-541034-htmlitemid540920',
                'published_at' => '2013-01-01',
                'excerpt' => 'تصنيفها ضمن أقوى 100 امرأة عربية، ووصفها بأنها سفيرة لسيدات الأعمال.',
                'source_id' => $arabianBusiness?->id,
            ],
            [
                'title' => 'Souad Al-Humaidhi',
                'publisher' => 'Wikipedia (English)',
                'url' => 'https://en.wikipedia.org/wiki/Souad_Al-Humaidhi',
                'published_at' => null,
                'excerpt' => 'ملخص موسوعي بالإنجليزية لمسيرتها التجارية والعقارية والمصرفية.',
                'source_id' => $wikiEn?->id,
            ],
        ];

        foreach ($items as $index => $item) {
            PressMention::query()->updateOrCreate(
                ['title' => $item['title'], 'publisher' => $item['publisher']],
                $item + ['sort_order' => $index]
            );
        }
    }
}
