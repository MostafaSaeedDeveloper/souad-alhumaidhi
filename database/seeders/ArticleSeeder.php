<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Support\ArabicSlug;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'سعاد الحميضي.. أول سيدة أعمال كويتية',
                'excerpt' => 'قراءة في مسيرة سعاد الحميضي التي شقّت طريقها في التجارة والاستثمار والعقار، وصولًا إلى الصيرفة وتأسيس الشركات داخل الكويت وخارجها.',
                'content' => 'تناولت تغطيات صحفية عربية مسيرة سعاد الحميضي بوصفها من أوائل النساء الكويتيات اللواتي دخلن عالم التجارة والاستثمار وتملّك العقار، ثم الصيرفة والصناعة، بعد أن تولت إدارة أعمال والدها حمد الحميضي عقب وفاته.',
                'source_name' => 'صحيفة عكاظ',
                'source_url' => 'https://www.okaz.com.sa/specialized-corners/na/2056470',
                'published_at' => null,
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'title' => 'الكويت تفقد سعاد الحميضي',
                'excerpt' => 'نعت الصحف الكويتية سيدة الأعمال سعاد الحميضي عقب وفاتها في 3 أغسطس 2017، مستذكرة مسيرتها الرائدة في المال والأعمال.',
                'content' => 'توفيت سعاد الحميضي عن عمر ناهز 78 عامًا، ونعاها الديوان الأميري الكويتي، كما نعاها رئيس مجلس الأمة الكويتي مرزوق الغانم عبر بيان قال فيه: "خالص العزاء والمواساة لآل الحميضي الكرام بوفاة السيدة الفاضلة سعاد الحميضي إحدى رائدات قطاع الأعمال والاقتصاد بالكويت".',
                'source_name' => 'جريدة القبس',
                'source_url' => 'https://alqabas.com/article/422607',
                'published_at' => '2017-08-03',
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'title' => 'وفاة سعاد الحميضي أشهر سيدة أعمال كويتية',
                'excerpt' => 'تغطية إخبارية لوفاة سيدة الأعمال الكويتية سعاد الحميضي وأبرز محطات مسيرتها المهنية.',
                'content' => 'رصدت وسائل إعلام إقليمية نبأ وفاة سعاد الحميضي، مستعرضة أبرز محطات مسيرتها في عالم المال والاستثمار العقاري.',
                'source_name' => 'Erem News',
                'source_url' => 'https://www.eremnews.com/economy/937047',
                'published_at' => null,
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'title' => 'سعاد الحميضي ضمن أقوى 100 سيدة أعمال عربية لعام 2013',
                'excerpt' => 'صنّفت مجلة Arabian Business سعاد الحميضي في المرتبة العاشرة ضمن قائمتها السنوية لأقوى سيدات الأعمال العربيات.',
                'content' => 'قدّرت المجلة ثروة سعاد الحميضي وقتها بنحو 3 مليارات دولار أمريكي، مستندة إلى محفظتها الاستثمارية في القطاعين المصرفي والعقاري بين الكويت ولبنان.',
                'source_name' => 'Arabian Business',
                'source_url' => 'https://www.arabianbusiness.com/100-most-powerful-arab-women-2013-491497.html',
                'published_at' => null,
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 4,
            ],
        ];

        foreach ($items as $item) {
            Article::updateOrCreate(
                ['title' => $item['title']],
                $item + ['slug' => ArabicSlug::make($item['title'])]
            );
        }
    }
}
