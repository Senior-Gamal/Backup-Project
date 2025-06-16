<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default admin user if none exists
        \App\Models\User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
