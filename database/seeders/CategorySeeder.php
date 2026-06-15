<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Café en grano',
            'description' => 'Café en su forma más pura, ideal para moler y preparar al gusto.',
            'slug' => 'cafe-en-grano',
        ]);

        Category::create([
            'name' => 'Café molido',
            'description' => 'Café ya molido, listo para usar en cafeteras de filtro o prensa francesa.',
            'slug' => 'cafe-molido',
        ]);

        Category::create([
            'name' => 'Café instantáneo',
            'description' => 'Café soluble para preparar rápidamente con agua caliente.',
            'slug' => 'cafe-instantaneo',
        ]);

        Category::create([
            'name' => 'Café en cápsulas',
            'description' => 'Café en porciones individuales para máquinas de cápsulas.',
            'slug' => 'cafe-en-capsulas',
        ]);

        Category::create([
            'name' => 'Café orgánico',
            'description' => 'Café cultivado sin pesticidas ni fertilizantes químicos.',
            'slug' => 'cafe-organico',
        ]);

        Category::create([
            'name' => 'Café de especialidad',
            'description' => 'Café de alta calidad con características únicas de sabor y aroma.',
            'slug' => 'cafe-de-especialidad',
        ]);

        Category::create([
            'name' => 'Café descafeinado',
            'description' => 'Café al que se le ha eliminado la cafeína, ideal para quienes buscan reducir su consumo.',
            'slug' => 'cafe-descafeinado',
        ]);
    }
}
