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
                'title' => 'مقابلة يوسف الجاسم مع سيدة الأعمال سعاد الحميضي',
                'description' => 'لقاء تلفزيوني ضمن برنامج حواري تناولت فيه سعاد الحميضي تجربتها في تجارة العقار والاستثمار.',
                'youtube_url' => 'https://www.youtube.com/watch?v=tOZPRO6Y0xc',
                'channel_name' => 'برنامج "ضيفي والجانب الآخر" - يوسف الجاسم',
                'published_at' => null,
                'source_name' => 'يوتيوب',
                'source_url' => 'https://www.youtube.com/watch?v=tOZPRO6Y0xc',
                'is_verified' => false,
                'is_featured' => true,
                'status' => 'published',
                'sort_order' => 1,
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
