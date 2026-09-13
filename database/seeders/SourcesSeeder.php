<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Canonical list of sources used to build the site. Every biography,
     * timeline, achievement, award and press item references one of these
     * by URL so the origin of every fact stays traceable.
     */
    public static function all(): array
    {
        return [
            'wikipedia_ar' => [
                'title' => 'سعاد الحميضي',
                'publisher' => 'ويكيبيديا (النسخة العربية)',
                'url' => 'https://ar.wikipedia.org/wiki/سعاد_الحميضي',
                'source_type' => 'encyclopedia',
                'published_at' => null,
                'notes' => 'مقالة موسوعية تغطي السيرة الذاتية والمناصب والزيجات والأعمال الخيرية.',
            ],
            'wikipedia_en' => [
                'title' => 'Souad Al-Humaidhi',
                'publisher' => 'Wikipedia (English)',
                'url' => 'https://en.wikipedia.org/wiki/Souad_Al-Humaidhi',
                'source_type' => 'encyclopedia',
                'published_at' => null,
                'notes' => 'English-language biography summary, banking and real-estate holdings.',
            ],
            'okaz' => [
                'title' => 'سعاد الحميضي.. أول سيدة أعمال كويتية',
                'publisher' => 'صحيفة عكاظ',
                'url' => 'https://www.okaz.com.sa/specialized-corners/na/2056470',
                'source_type' => 'press_article',
                'published_at' => '2021-01-31',
                'notes' => 'تفاصيل الميلاد والمناصب والصفقة العقارية الكبرى ووفاة الوالد والزوج.',
            ],
            'albayan' => [
                'title' => 'سعاد الحميضي.. أول سيدة أعمال كويتية',
                'publisher' => 'صحيفة البيان',
                'url' => 'https://www.albayan.ae/culture-art/celebrities/2021-01-31-1.4079444',
                'source_type' => 'press_article',
                'published_at' => '2021-01-31',
                'notes' => 'تفاصيل الحياة الشخصية والأعمال الخيرية في الكويت ولبنان ومصر.',
            ],
            'kuwait_times' => [
                'title' => 'Amiri Diwan mourns Suad Al-Humaidhi',
                'publisher' => 'Kuwait Times',
                'url' => 'https://kuwaittimes.com/amiri-diwan-mourns-suad-al-humaidhi/',
                'source_type' => 'press_article',
                'published_at' => '2017-08-03',
                'notes' => 'نعي رسمي عند الوفاة، يذكر مناصبها في بنك عودة والبنك الأهلي والاستثمارات العقارية.',
            ],
            'arabian_business' => [
                'title' => "The World's 100 Most Powerful Arab Women",
                'publisher' => 'Arabian Business',
                'url' => 'https://www.arabianbusiness.com/lists/the-world-s-100-most-powerful-arab-women-541034-htmlitemid540920',
                'source_type' => 'ranking',
                'published_at' => '2013-01-01',
                'notes' => 'تصنيف ضمن أقوى 100 امرأة عربية لعام 2013، ووصفها بأنها سفيرة سيدات الأعمال في المنطقة.',
            ],
            'alqabas_2017' => [
                'title' => 'وفاة سعاد الحميضي',
                'publisher' => 'جريدة القبس',
                'url' => null,
                'source_type' => 'press_article',
                'published_at' => '2017-08-03',
                'notes' => 'مصدر الاقتباس المنسوب لها حول دور زوجها الشيخ جابر العلي في مسيرتها المهنية، كما ورد نقلاً في تغطيات صحفية لاحقة (عكاظ والبيان، 31 يناير 2021).',
            ],
        ];
    }

    public function run(): void
    {
        foreach (self::all() as $key => $data) {
            Source::query()->updateOrCreate(
                ['title' => $data['title'], 'publisher' => $data['publisher']],
                $data + ['accessed_at' => now()->toDateString()]
            );
        }
    }

    public static function find(string $key): ?Source
    {
        $data = self::all()[$key] ?? null;

        if (! $data) {
            return null;
        }

        return Source::query()->where('title', $data['title'])->where('publisher', $data['publisher'])->first();
    }
}
