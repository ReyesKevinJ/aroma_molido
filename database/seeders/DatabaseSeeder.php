<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            WeightsSeeder::class,
            ProductSeeder::class,
            ImageSeeder::class,
            InboxSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
        ]);
    }
}
