<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Support\ArabicSlug;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // -------- Verified / published --------
            [
                'title' => 'الريادة في التجارة والاستثمار والعقار',
                'category' => 'entrepreneurship',
                'icon' => 'bi-graph-up-arrow',
                'summary' => 'من أوائل النساء الكويتيات اللواتي دخلن مجالات التجارة والاستثمار وتملّك العقار، ثم الصيرفة والصناعة وتأسيس الشركات.',
                'content' => 'وصفتها الصحافة العربية بأنها أول امرأة كويتية تخوض هذه المجالات في زمن لم تكن فيه المرأة حاضرة بقوة في عالم المال والأعمال بالخليج.',
                'year' => null,
                'source_name' => 'عكاظ / إيلاف / البيان',
                'source_url' => 'https://www.okaz.com.sa/specialized-corners/na/2056470',
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'title' => 'إدارة إرث والدها التجاري',
                'category' => 'entrepreneurship',
                'icon' => 'bi-briefcase',
                'summary' => 'بعد عشر سنوات من العمل في "البنك التجاري" الذي أسسه والدها، تولّت إدارة تجارته واستثماراته بعد وفاته.',
                'content' => 'اختارت التركيز على الاستثمار في الأسهم والعقار والأراضي بدلًا من الاستمرار في أعمال المقاولات والتجارة الموروثة.',
                'year' => null,
                'source_name' => 'عكاظ / إيلاف',
                'source_url' => 'https://www.okaz.com.sa/specialized-corners/na/2056470',
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'title' => 'عضوية مجلس إدارة بنك عوده',
                'category' => 'investment',
                'icon' => 'bi-bank',
                'summary' => 'شغلت عضوية مجلس إدارة "بنك عوده" اللبناني، أحد أبرز البنوك في المنطقة.',
                'content' => null,
                'year' => null,
                'source_name' => 'ويكيبيديا / Wikidata',
                'source_url' => 'https://www.wikidata.org/wiki/Q20382395',
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'title' => 'المساهمة في بنك الكويت الوطني وشركة سوليدير',
                'category' => 'investment',
                'icon' => 'bi-building',
                'summary' => 'كانت من كبار المساهمين في بنك الكويت الوطني، وفي شركة "سوليدير" اللبنانية المعنية بإعادة إعمار وسط بيروت.',
                'content' => null,
                'year' => null,
                'source_name' => 'ويكيبيديا / Wikidata',
                'source_url' => 'https://www.wikidata.org/wiki/Q20382395',
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 4,
            ],
            [
                'title' => 'استثمارات عقارية في بيروت',
                'category' => 'economic_development',
                'icon' => 'bi-buildings',
                'summary' => 'امتلكت فندقًا وبرجًا سكنيًا في العاصمة اللبنانية بيروت، ضمن امتداد استثماراتها خارج الكويت.',
                'content' => null,
                'year' => null,
                'source_name' => 'ويكيبيديا / Wikidata',
                'source_url' => 'https://www.wikidata.org/wiki/Q20382395',
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 5,
            ],
            [
                'title' => 'المرتبة العاشرة ضمن أقوى 100 سيدة أعمال عربية',
                'category' => 'honors',
                'icon' => 'bi-trophy',
                'summary' => 'صنّفتها مجلة Arabian Business عام 2013 في المرتبة العاشرة ضمن قائمة أقوى 100 سيدة أعمال عربية، بثروة قُدّرت وقتها بنحو 3 مليارات دولار.',
                'content' => null,
                'year' => '2013',
                'source_name' => 'Arabian Business',
                'source_url' => 'https://www.arabianbusiness.com/100-most-powerful-arab-women-2013-491497.html',
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 6,
            ],
            [
                'title' => 'عضوية جمعية ملاك العقار بالكويت',
                'category' => 'community',
                'icon' => 'bi-people',
                'summary' => 'كانت عضوًا في جمعية ملاك العقار في الكويت، إحدى الهيئات المهنية المرتبطة بنشاطها الاستثماري.',
                'content' => null,
                'year' => null,
                'source_name' => 'ويكيبيديا / Wikidata',
                'source_url' => 'https://www.wikidata.org/wiki/Q20382395',
                'is_verified' => true,
                'is_featured' => false,
                'status' => 'published',
                'sort_order' => 7,
            ],

            // -------- Unverified: kept as drafts for admin review, per "no invented facts" rule --------
            [
                'title' => 'ترميم جامع العمري ببيروت (بحاجة إلى تحقق)',
                'category' => 'charity',
                'icon' => 'bi-moon-stars',
                'summary' => 'أشارت مقالات صحفية مجمّعة إلى قيامها بترميم جامع العمري في بيروت على نفقتها الخاصة، وتكريمها من رئيس الوزراء اللبناني الراحل رفيق الحريري وجهات أخرى.',
                'content' => 'هذه المعلومة وردت ضمن مقال صحفي مُجمّع (منشور في عدة مواقع بنفس الصياغة) ولم يتم التحقق من نصه الأصلي بعد بسبب تعذر الوصول المباشر للمصدر. أُبقيت كمسودة للمراجعة قبل النشر النهائي.',
                'year' => null,
                'source_name' => 'عكاظ / إيلاف (يتطلب تحقق إضافي)',
                'source_url' => 'https://www.okaz.com.sa/specialized-corners/na/2056470',
                'is_verified' => false,
                'is_featured' => false,
                'status' => 'draft',
                'sort_order' => 20,
            ],
            [
                'title' => 'تكريمات عربية ودولية متعددة (بحاجة إلى تحقق)',
                'category' => 'honors',
                'icon' => 'bi-award',
                'summary' => 'أشارت مصادر صحفية مُجمّعة إلى تكريمها في منتدى "المرأة العربية والمستقبل" بدبي 2007، وتكريم من دولة الفاتيكان، ومن السيدة سوزان مبارك في مصر.',
                'content' => 'هذه التفاصيل تحتاج تأكيدًا من مصادرها الأساسية قبل اعتمادها بشكل نهائي.',
                'year' => null,
                'source_name' => 'مصادر صحفية مُجمّعة (يتطلب تحقق إضافي)',
                'source_url' => null,
                'is_verified' => false,
                'is_featured' => false,
                'status' => 'draft',
                'sort_order' => 21,
            ],
        ];

        foreach ($items as $item) {
            Achievement::updateOrCreate(
                ['title' => $item['title']],
                $item + ['slug' => ArabicSlug::make($item['title'])]
            );
        }
    }
}
