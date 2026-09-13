<?php

namespace Database\Seeders;

use App\Models\Initiative;
use Illuminate\Database\Seeder;

class InitiativesSeeder extends Seeder
{
    public function run(): void
    {
        $albayan = SourcesSeeder::find('albayan');

        $initiatives = [
            [
                'title' => 'مركز حمد الحميضي وشيخة السديراوي الصحي',
                'location' => 'الشويخ، الكويت',
                'description' => 'أسهمت في إنشاء مركز صحي في منطقة الشويخ حمل اسم والديها، خدمة للمجتمع المحلي.',
                'icon' => 'bi-hospital',
                'source_id' => $albayan?->id,
            ],
            [
                'title' => 'ترميم المسجد العمري الكبير',
                'location' => 'بيروت، لبنان',
                'description' => 'ساهمت في مشروع ترميم وتوسعة المسجد العمري الكبير في وسط بيروت، وهو من أبرز المعالم الدينية والتاريخية في المدينة.',
                'icon' => 'bi-building',
                'source_id' => $albayan?->id,
            ],
            [
                'title' => 'مشروع تعليمي وسكني للأيتام',
                'location' => 'لبنان',
                'description' => 'دعمت مشروعًا تعليميًا وسكنيًا استفاد منه آلاف الطلاب الأيتام في لبنان من مختلف المناطق والأديان.',
                'icon' => 'bi-mortarboard',
                'source_id' => $albayan?->id,
            ],
            [
                'title' => 'أعمال خيرية في مصر',
                'location' => 'مصر',
                'description' => 'شاركت في أعمال ومبادرات خيرية في مصر حظيت بتقدير السيدة الأولى المصرية آنذاك سوزان مبارك.',
                'icon' => 'bi-heart',
                'source_id' => $albayan?->id,
            ],
        ];

        foreach ($initiatives as $index => $item) {
            Initiative::query()->updateOrCreate(
                ['title' => $item['title']],
                $item + ['sort_order' => $index]
            );
        }
    }
}
