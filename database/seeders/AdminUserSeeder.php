<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'mostafasaeed.developer@gmail.com'],
            [
                'name' => 'مدير الموقع',
                'password' => 'Souad@Admin2026',
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
