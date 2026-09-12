<?php

namespace Database\Seeders;

use App\Models\MediaOutlet;
use App\Models\PressMention;
use Illuminate\Database\Seeder;

class PressSeeder extends Seeder
{
    public function run(): void
    {
        $outlets = [
            ['name' => 'وكالة الأنباء الكويتية (كونا)', 'website_url' => 'https://www.kuna.net.kw', 'country' => 'الكويت'],
            ['name' => 'جريدة القبس', 'website_url' => 'https://alqabas.com', 'country' => 'الكويت'],
            ['name' => 'جريدة الراي', 'website_url' => 'https://www.alraimedia.com', 'country' => 'الكويت'],
            ['name' => 'جريدة الجريدة', 'website_url' => 'https://www.aljarida.com', 'country' => 'الكويت'],
            ['name' => 'جريدة الأنباء', 'website_url' => 'https://www.alanba.com.kw', 'country' => 'الكويت'],
            ['name' => 'صحيفة عكاظ', 'website_url' => 'https://www.okaz.com.sa', 'country' => 'السعودية'],
            ['name' => 'Arabian Business', 'website_url' => 'https://www.arabianbusiness.com', 'country' => 'الإمارات'],
            ['name' => 'Kuwait Times', 'website_url' => 'https://www.kuwaittimes.com', 'country' => 'الكويت'],
            ['name' => 'Erem News', 'website_url' => 'https://www.eremnews.com', 'country' => 'دولي'],
        ];

        $outletIds = [];
        foreach ($outlets as $i => $o) {
            $outletIds[$o['name']] = MediaOutlet::updateOrCreate(
                ['name' => $o['name']],
                $o + ['sort_order' => $i + 1, 'status' => 'published']
            )->id;
        }

        $mentions = [
            [
                'outlet' => 'وكالة الأنباء الكويتية (كونا)',
                'title' => 'الديوان الأميري ينعى المغفور لها سعاد الحميضي',
                'url' => 'https://www.kuna.net.kw/ArticleDetails.aspx?id=2627223',
                'published_at' => '2017-08-03',
            ],
            [
                'outlet' => 'جريدة القبس',
                'title' => 'الكويت تفقد سعاد الحميضي',
                'url' => 'https://alqabas.com/article/422607',
                'published_at' => null,
            ],
            [
                'outlet' => 'جريدة الراي',
                'title' => 'الموت غيّب سفيرة سيدات الأعمال الكويتيات.. سعاد الحميضي',
                'url' => 'https://www.alraimedia.com/article/765611',
                'published_at' => null,
            ],
            [
                'outlet' => 'جريدة الجريدة',
                'title' => 'رائدة سيدات الأعمال الكويتيات سعاد الحميضي في ذمة الله',
                'url' => null,
                'published_at' => null,
            ],
            [
                'outlet' => 'جريدة الأنباء',
                'title' => 'سعاد الحميضي في ذمة الله.. وداعًا سفيرة الخير',
                'url' => null,
                'published_at' => '2017-08-04',
            ],
            [
                'outlet' => 'صحيفة عكاظ',
                'title' => 'سعاد الحميضي.. أول سيدة أعمال كويتية',
                'url' => 'https://www.okaz.com.sa/specialized-corners/na/2056470',
                'published_at' => null,
            ],
            [
                'outlet' => 'Arabian Business',
                'title' => '100 Most Powerful Arab Women 2013',
                'url' => 'https://www.arabianbusiness.com/100-most-powerful-arab-women-2013-491497.html',
                'published_at' => null,
            ],
            [
                'outlet' => 'Kuwait Times',
                'title' => 'Amiri Diwan mourns Suad Al-Humaidhi',
                'url' => null,
                'published_at' => null,
            ],
            [
                'outlet' => 'Erem News',
                'title' => 'وفاة سعاد الحميضي أشهر سيدة أعمال كويتية',
                'url' => 'https://www.eremnews.com/economy/937047',
                'published_at' => null,
            ],
        ];

        foreach ($mentions as $i => $m) {
            PressMention::updateOrCreate(
                ['title' => $m['title']],
                [
                    'media_outlet_id' => $outletIds[$m['outlet']],
                    'url' => $m['url'],
                    'published_at' => $m['published_at'],
                    'sort_order' => $i + 1,
                    'status' => 'published',
                ]
            );
        }
    }
}
