<?php

namespace Database\Seeders;

use App\Models\TimelineEvent;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'year' => '1939',
                'title' => 'الميلاد',
                'description' => 'وُلدت سعاد حمد صالح الحميضي في الكويت، الابنة الوحيدة والوريثة لوالدها حمد الحميضي.',
                'icon' => 'bi-star',
                'source_name' => 'ويكيبيديا / Wikidata',
                'source_url' => 'https://www.wikidata.org/wiki/Q20382395',
                'is_verified' => true,
                'sort_order' => 1,
            ],
            [
                'year' => '2013',
                'title' => 'أقوى 100 سيدة أعمال عربية',
                'description' => 'أدرجتها مجلة Arabian Business ضمن قائمة أقوى 100 سيدة أعمال عربية في المرتبة العاشرة.',
                'icon' => 'bi-award',
                'source_name' => 'Arabian Business',
                'source_url' => 'https://www.arabianbusiness.com/100-most-powerful-arab-women-2013-491497.html',
                'is_verified' => true,
                'sort_order' => 2,
            ],
            [
                'year' => '2017',
                'title' => 'الوفاة ونعي واسع',
                'description' => 'توفيت في 3 أغسطس 2017 عن عمر ناهز 78 عامًا، ونعاها الديوان الأميري الكويتي، وحظيت بتأبين واسع في الصحافة الخليجية.',
                'icon' => 'bi-flag',
                'source_name' => 'وكالة الأنباء الكويتية (كونا)',
                'source_url' => 'https://www.kuna.net.kw/ArticleDetails.aspx?id=2627223',
                'is_verified' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($events as $event) {
            TimelineEvent::updateOrCreate(
                ['year' => $event['year'], 'title' => $event['title']],
                $event + ['status' => 'published']
            );
        }
    }
}
