<?php

namespace Database\Seeders;

use App\Models\GalleryAlbum;
use Illuminate\Database\Seeder;

/**
 * No rights-clear photograph of Souad Al-Humaidhi (Wikimedia Commons,
 * official archive, or otherwise) could be confirmed during research for
 * this build. Per project policy we never hotlink or embed unverified
 * press photography. Albums are seeded as empty shells so the page/schema
 * exist; candidates are logged in docs/media-candidates.md for follow-up
 * once a licensed source is confirmed.
 */
class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            ['title' => 'لقاءات وفعاليات', 'category' => 'فعاليات'],
            ['title' => 'تكريمات', 'category' => 'تكريمات'],
            ['title' => 'أرشيف', 'category' => 'أرشيف'],
        ];

        foreach ($albums as $index => $album) {
            GalleryAlbum::query()->updateOrCreate(
                ['title' => $album['title']],
                $album + ['sort_order' => $index]
            );
        }
    }
}
