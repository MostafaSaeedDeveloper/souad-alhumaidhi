<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    public function run(): void
    {
        $wikiEn = SourcesSeeder::find('wikipedia_en');
        $okaz = SourcesSeeder::find('okaz');
        $kuwaitTimes = SourcesSeeder::find('kuwait_times');

        $positions = [
            [
                'title' => 'رئيسة مجلس إدارة',
                'organization' => 'مؤسسة حمد الصالح الحميضي للتجارة والمقاولات',
                'period' => 'منذ 1963',
                'description' => 'تولت رئاسة المؤسسة وإدارة استثماراتها بعد وفاة والدها.',
                'source_id' => $okaz?->id,
            ],
            [
                'title' => 'رئيسة مجلس إدارة',
                'organization' => 'شركة الأبرار للتجارة والمقاولات',
                'period' => null,
                'description' => 'إحدى الشركات العائلية العاملة في التجارة والمقاولات.',
                'source_id' => $wikiEn?->id,
            ],
            [
                'title' => 'عضو مجلس إدارة',
                'organization' => 'بنك عودة - لبنان',
                'period' => null,
                'description' => 'عضوية في مجلس إدارة أحد أبرز البنوك اللبنانية.',
                'source_id' => $wikiEn?->id,
            ],
            [
                'title' => 'عضو مؤسس',
                'organization' => 'البنك الأهلي الكويتي',
                'period' => null,
                'description' => 'شاركت في التأسيس بصفتها من رواد القطاع المصرفي الكويتي.',
                'source_id' => $wikiEn?->id,
            ],
            [
                'title' => 'موظفة',
                'organization' => 'البنك التجاري الكويتي',
                'period' => 'قرابة 10 سنوات',
                'description' => 'بدأت مسيرتها المهنية في البنك الذي أسسه والدها.',
                'source_id' => $kuwaitTimes?->id,
            ],
        ];

        foreach ($positions as $index => $item) {
            Position::query()->updateOrCreate(
                ['title' => $item['title'], 'organization' => $item['organization']],
                $item + ['sort_order' => $index]
            );
        }
    }
}
