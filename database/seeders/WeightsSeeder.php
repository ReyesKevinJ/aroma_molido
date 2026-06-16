<?php

namespace Database\Seeders;

use App\Models\Weight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Weight::create([
            'name' => "75g",
        ]);
        Weight::create([
            'name' => "150g",
        ]);

        Weight::create([
            'name' => "250g",
        ]);
        Weight::create([
            'name' => "500g",
        ]);
        Weight::create([
            'name' => "1kg",
        ]);
        Weight::create([
            'name' => "5kg",
        ]);
    }
}
