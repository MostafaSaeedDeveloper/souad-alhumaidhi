<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'person_full_name' => 'سعاد حمد الصالح الحميضي',
            'person_display_name' => 'سعاد الحميضي',
            'person_tagline' => 'رحلة عطاء.. أثر لا ينتهي',
            'person_birth_year' => '1939',
            'person_birth_place' => 'الكويت',
            'person_death_date' => '2017-08-03',
            'person_occupation' => 'سيدة أعمال كويتية',
            'site_description' => 'موقع تكريمي يوثق مسيرة الراحلة سعاد حمد الصالح الحميضي، أول سيدة أعمال كويتية، في التجارة والاستثمار والعمل الإنساني.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
