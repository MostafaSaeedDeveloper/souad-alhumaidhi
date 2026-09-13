<?php

namespace Database\Seeders;

use App\Models\MediaItem;
use App\Support\ArabicSlug;
use Illuminate\Database\Seeder;

class MediaItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'برنامج "ضيفي والجانب الآخر" مع سيدة الأعمال سعاد الحميضي',
                'description' => 'حلقة من برنامج "ضيفي والجانب الآخر" التلفزيوني، قدّمها الإعلامي يوسف الجاسم الصقر بتاريخ 13/10/2005، واستضاف فيها سيدة الأعمال سعاد الحميضي للحديث عن تجربتها في تجارة العقار والاستثمار.',
                'category' => 'interview',
                'youtube_url' => 'https://www.youtube.com/watch?v=ZFgTbGnur2U',
                'channel_name' => 'برنامج "ضيفي والجانب الآخر" - يوسف الجاسم الصقر',
                'published_at' => '2005-10-13',
                'source_name' => 'يوتيوب',
                'source_url' => 'https://www.youtube.com/watch?v=ZFgTbGnur2U',
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'title' => 'مقابلة يوسف الجاسم مع سيدة الأعمال سعاد الحميضي',
                'description' => 'لقاء تلفزيوني ضمن برنامج حواري تناولت فيه سعاد الحميضي تجربتها في تجارة العقار والاستثمار.',
                'category' => 'interview',
                'youtube_url' => 'https://www.youtube.com/watch?v=tOZPRO6Y0xc',
                'channel_name' => 'برنامج "ضيفي والجانب الآخر" - يوسف الجاسم',
                'published_at' => null,
                'source_name' => 'يوتيوب',
                'source_url' => 'https://www.youtube.com/watch?v=tOZPRO6Y0xc',
                'is_verified' => false,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'title' => 'ثرى الكويت يحتضن جثمان "سفيرة سيدات الأعمال" الراحلة سعاد الحميضي',
                'description' => 'تقرير إخباري مصوّر يوثّق تشييع جثمان سيدة الأعمال الكويتية سعاد الحميضي بعد وفاتها في 3 أغسطس 2017.',
                'category' => 'news',
                'youtube_url' => 'https://www.youtube.com/watch?v=amKuCGI80_U',
                'channel_name' => 'تغطية إخبارية',
                'published_at' => '2017-08-04',
                'source_name' => 'يوتيوب',
                'source_url' => 'https://www.youtube.com/watch?v=amKuCGI80_U',
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 3,
            ],
            [
                'title' => 'الموت يغيّب سعاد الحميضي',
                'description' => 'تقرير إخباري عن وفاة سيدة الأعمال الكويتية الرائدة سعاد الحميضي، أحد أبرز رموز قطاع المال والأعمال في الكويت.',
                'category' => 'news',
                'youtube_url' => 'https://www.youtube.com/watch?v=wU4o4HgCahs',
                'channel_name' => 'تغطية إخبارية',
                'published_at' => '2017-08-03',
                'source_name' => 'يوتيوب',
                'source_url' => 'https://www.youtube.com/watch?v=wU4o4HgCahs',
                'is_verified' => true,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 4,
            ],
        ];

        foreach ($items as $item) {
            $youtubeId = null;
            if (preg_match('/(?:v=|youtu\.be\/)([A-Za-z0-9_-]{6,15})/', $item['youtube_url'], $m)) {
                $youtubeId = $m[1];
            }

            MediaItem::updateOrCreate(
                ['title' => $item['title']],
                $item + [
                    'slug' => ArabicSlug::make($item['title']),
                    'youtube_id' => $youtubeId,
                    'thumbnail' => $youtubeId ? "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg" : null,
                ]
            );
        }
    }
}
