<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            'hero_title' => 'في ذكرى سيدة الأعمال الرائدة',
            'hero_tagline' => 'رحلة عطاء .. أثر لا ينتهي',
            'hero_description' => 'امرأة استثنائية شقّت طريقها في عالم المال والأعمال بدولة الكويت، وتركت أثرًا واضحًا في القطاعين المصرفي والاستثماري بين الكويت وبيروت، قبل أن تنتقل إلى رحمة الله في 3 أغسطس 2017 عن عمر ناهز 78 عامًا.',
            // No verified direct quote from her was found; per editorial policy this reflective line
            // is presented as an unattributed statement about her legacy, not as her own words.
            'hero_quote' => 'يُقاس الأثر الحقيقي بما يبقى في حياة الآخرين، لا بما نملكه لأنفسنا.',
            'homepage_quote' => 'يبقى الأثر .. حين يرحل العطاء',
            'cta_primary_text' => 'استكشف مسيرتها',
            'cta_secondary_text' => 'اقرأ السيرة الذاتية كاملة',
            'footer_text' => 'موقع تكريمي يوثق مسيرة سعاد الحميضي وإرثها الإنساني والمهني.',
            'site_meta_title' => 'سعاد الحميضي | رحلة عطاء .. أثر لا ينتهي',
            'site_meta_description' => 'موقع تكريمي يوثق مسيرة سيدة الأعمال الكويتية الراحلة سعاد الحميضي (1939 - 2017)، وإرثها الإنساني والمهني، وأبرز محطاتها وإنجازاتها.',
        ];

        foreach ($values as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value, 'type' => 'text', 'group' => 'general']);
        }
    }
}
