<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuotesSeeder extends Seeder
{
    public function run(): void
    {
        $albayan = SourcesSeeder::find('albayan');

        $quotes = [
            [
                'text' => 'قضيت مع الشيخ جابر العلي 25 عامًا، وساعدني في العمل، وأرشدني للطريق.',
                'context' => 'نُسب إليها هذا القول في تغطيات صحفية حول دور زوجها الثاني الشيخ جابر العلي السالم الصباح في دعم مسيرتها المهنية.',
                'featured' => true,
                'source_id' => $albayan?->id,
            ],
        ];

        foreach ($quotes as $index => $item) {
            Quote::query()->updateOrCreate(
                ['text' => $item['text']],
                $item + ['sort_order' => $index]
            );
        }
    }
}
