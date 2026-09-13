<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with the documented, sourced content
     * of the memorial site. Order matters: SourcesSeeder must run first so
     * later seeders can attach a source_id to every fact.
     */
    public function run(): void
    {
        $this->call([
            SourcesSeeder::class,
            SiteSettingsSeeder::class,
            BiographySeeder::class,
            TimelineSeeder::class,
            AchievementsSeeder::class,
            AwardsSeeder::class,
            PositionsSeeder::class,
            InitiativesSeeder::class,
            QuotesSeeder::class,
            MediaSeeder::class,
            GallerySeeder::class,
            PressSeeder::class,
        ]);
    }
}
