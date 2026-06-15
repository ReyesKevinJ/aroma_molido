<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'last_name' => 'User',
            'phone' => '1234567890',
            'dni' => '12345678',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'John',
            'last_name' => 'Doe',
            'phone' => '0987654321',
            'dni' => '87654321',
            'email' => 'john@user.com',
            'password' => bcrypt('user123'),
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Jane',
            'last_name' => 'Smith',
            'phone' => '5555555555',
            'dni' => '11223344',
            'email' => 'jane@user.com',
            'password' => bcrypt('user123'),
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Bob',
            'last_name' => 'Johnson',
            'phone' => '4444444444',
            'dni' => '55667788',
            'email' => 'bob@user.com',
            'password' => bcrypt('user123'),
            'role' => 'customer',
        ]);
    }
}
