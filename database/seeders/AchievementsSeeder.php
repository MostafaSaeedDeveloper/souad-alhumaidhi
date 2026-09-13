<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementsSeeder extends Seeder
{
    public function run(): void
    {
        $wikiAr = SourcesSeeder::find('wikipedia_ar');
        $wikiEn = SourcesSeeder::find('wikipedia_en');
        $okaz = SourcesSeeder::find('okaz');
        $albayan = SourcesSeeder::find('albayan');
        $arabianBusiness = SourcesSeeder::find('arabian_business');

        $achievements = [
            [
                'title' => 'الريادة في التجارة والاستثمار',
                'description' => 'وُصفت في مصادر متعددة بأنها أول كويتية مارست التجارة والاستثمار وتملّك العقار داخل الكويت وفي عدد من الدول العربية والأوروبية.',
                'icon' => 'bi-graph-up-arrow',
                'category' => 'ريادة',
                'source_id' => $wikiAr?->id,
            ],
            [
                'title' => 'القطاع المصرفي',
                'description' => 'عملت في البنك التجاري الكويتي، وكانت عضوًا مؤسسًا في البنك الأهلي الكويتي، وعضو مجلس إدارة في بنك عودة اللبناني، إلى جانب حيازتها حصصًا في بنك الكويت الوطني.',
                'icon' => 'bi-bank',
                'category' => 'مصارف',
                'source_id' => $wikiEn?->id,
            ],
            [
                'title' => 'الاستثمار العقاري',
                'description' => 'امتلكت مجمعات تجارية وسكنية في الكويت وبيروت، من بينها فندق وبرج سكني في بيروت، وأبرمت واحدة من أكبر الصفقات العقارية الكويتية بقيمة 40 مليون دينار.',
                'icon' => 'bi-building',
                'category' => 'عقار',
                'source_id' => $okaz?->id,
            ],
            [
                'title' => 'مجالس الإدارات',
                'description' => 'ترأست مجلس إدارة مؤسسة حمد الصالح الحميضي للتجارة والمقاولات وشركة الأبرار للتجارة والمقاولات، وعضوية مجلس إدارة بنك عودة.',
                'icon' => 'bi-people',
                'category' => 'قيادة',
                'source_id' => $wikiEn?->id,
            ],
            [
                'title' => 'مكانة عربية وإقليمية',
                'description' => 'صنّفتها مجلة Arabian Business ضمن أقوى 100 امرأة عربية لعام 2013، ووصفتها بأنها سفيرة لسيدات الأعمال في المنطقة.',
                'icon' => 'bi-globe2',
                'category' => 'تقدير',
                'source_id' => $arabianBusiness?->id,
            ],
            [
                'title' => 'الأعمال الإنسانية',
                'description' => 'أسهمت في إنشاء مركز صحي بالشويخ باسم والديها، وترميم المسجد العمري الكبير ببيروت، ودعم مشروع تعليمي وسكني لآلاف الطلاب الأيتام في لبنان.',
                'icon' => 'bi-heart',
                'category' => 'عمل إنساني',
                'source_id' => $albayan?->id,
            ],
        ];

        foreach ($achievements as $index => $item) {
            Achievement::query()->updateOrCreate(
                ['title' => $item['title']],
                $item + ['sort_order' => $index]
            );
        }
    }
}
