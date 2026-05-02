<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user with specified credentials
        User::updateOrCreate(
            ['email' => 'a@g.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('12345678'), // Hashed password
            ]
        );

        $this->command->info('Admin user created/updated successfully!');
        $this->command->info('Email: a@g.com');
        $this->command->info('Password: 12345678 (hashed)');
    }
}
