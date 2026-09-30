<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@training.local'],
            [
                'name' => 'مدير النظام',
                'role' => 'admin',
                'password' => Hash::make('Admin@12345'),
                'email_verified_at' => now(),
            ],
        );

        User::updateOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'role' => 'trainee',
            'password' => Hash::make('Password@12345'),
            'email_verified_at' => now(),
        ]);
    }
}
