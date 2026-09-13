<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Seeder;

class AwardsSeeder extends Seeder
{
    public function run(): void
    {
        $wikiAr = SourcesSeeder::find('wikipedia_ar');
        $albayan = SourcesSeeder::find('albayan');
        $arabianBusiness = SourcesSeeder::find('arabian_business');

        $awards = [
            [
                'title' => 'وسام الأرز اللبناني',
                'presented_by' => 'رئيس الوزراء اللبناني الأسبق رفيق الحريري',
                'year' => null,
                'description' => 'تكريمًا لمساهمتها في ترميم المسجد العمري الكبير في بيروت ودعم مشاريع خيرية في لبنان.',
                'source_id' => $albayan?->id,
            ],
            [
                'title' => 'تكريم منتدى المرأة العربية والمستقبل',
                'presented_by' => 'منتدى المرأة العربية والمستقبل - دبي',
                'year' => '2007',
                'description' => 'كُرّمت ضمن فعاليات المنتدى تقديرًا لمسيرتها في عالم الأعمال.',
                'source_id' => $wikiAr?->id,
            ],
            [
                'title' => 'أقوى 100 امرأة عربية',
                'presented_by' => 'مجلة Arabian Business',
                'year' => '2013',
                'description' => 'ضمن قائمة أقوى 100 امرأة عربية، ووصفتها المجلة بأنها سفيرة لسيدات الأعمال في المنطقة.',
                'source_id' => $arabianBusiness?->id,
            ],
            [
                'title' => 'شهادة تقدير من رئيس مجلس الوزراء',
                'presented_by' => 'الشيخ جابر المبارك الحمد الصباح',
                'year' => null,
                'description' => 'شهادة تقدير رسمية تقديرًا لمسيرتها في العمل التجاري والخيري.',
                'source_id' => $wikiAr?->id,
            ],
        ];

        foreach ($awards as $index => $item) {
            Award::query()->updateOrCreate(
                ['title' => $item['title']],
                $item + ['sort_order' => $index]
            );
        }
    }
}
