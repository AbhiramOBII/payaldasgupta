<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ServiceSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(IndustrySeeder::class);

        // Admin user — change password before deploying to production
        User::firstOrCreate(
            ['email' => 'payal@payaldasgupta.com'],
            [
                'name'              => 'Payal Dasgupta',
                'email'             => 'payal@payaldasgupta.com',
                'password'          => Hash::make('changeme123'),
                'email_verified_at' => now(),
            ]
        );
    }
}
