<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account for testing via Basic Auth
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin',
                'password' => 'admin123', // hashed by model cast
                'role'     => 'admin',
            ]
        );

        // Optional: a non-admin user
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name'     => 'User',
                'password' => 'user12345',
                'role'     => 'customer',
            ]
        );
    }
}

