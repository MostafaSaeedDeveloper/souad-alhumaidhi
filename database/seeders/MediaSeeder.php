<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * No verified, rights-clear video interview of Souad Al-Humaidhi could be
 * confirmed during research for this build (no official channel upload,
 * no Wikimedia-hosted clip). Per project policy we do not fabricate a
 * video entry. Candidates found but not verified are logged in
 * docs/media-candidates.md for future review.
 */
class MediaSeeder extends Seeder
{
    public function run(): void
    {
        // Intentionally empty — see docs/media-candidates.md.
    }
}
