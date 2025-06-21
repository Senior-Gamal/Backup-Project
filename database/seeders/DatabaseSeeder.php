<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, BackupServer, ClientServer, License, ActivityLog};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        BackupServer::factory()->count(3)->create();
        ClientServer::factory()->count(2)->create();
        License::factory()->count(2)->create();

        ActivityLog::create(['description' => 'Initial seed data']);
    }
}
