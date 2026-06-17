<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Café en grano 250g',
            'slug' => 'cafe-en-grano-250g',
            'description' => 'Café en grano de alta calidad, ideal para moler y preparar al gusto.',
            'price' => 10.99,
            'stock' => 10,
            'category_id' => 1, // Asumiendo que la categoría "Café en grano" tiene ID 1
            'weight_id' => 3, // Asumiendo que el peso "250g" tiene ID 3
        ]);
        Product::create([
            'name' => 'Café molido 500g',
            'slug' => 'cafe-molido-500g',
            'description' => 'Café molido listo para usar en cafeteras de filtro o prensa francesa.',
            'price' => 15.99,
            'stock' => 15,
            'category_id' => 2, // Asumiendo que la categoría "Café molido" tiene ID 2
            'weight_id' => 4, // Asumiendo que el peso "500g" tiene ID 4
        ]);
        Product::create([
            'name' => 'Café instantáneo 150g',
            'slug' => 'cafe-instantaneo-150g',
            'description' => 'Café soluble para preparar rápidamente con agua caliente.',
            'price' => 8.99,
            'stock' => 15,
            'category_id' => 3, // Asumiendo que la categoría "Café instantáneo" tiene ID 3
            'weight_id' => 2, // Asumiendo que el peso "150g" tiene ID 2
        ]);
        Product::create([
            'name' => 'Café en cápsulas 75g',
            'slug' => 'cafe-en-capsulas-75g',
            'description' => 'Café en porciones individuales para máquinas de cápsulas.',
            'price' => 12.99,
            'stock' => 15,
            'category_id' => 4, // Asumiendo que la categoría "Café en cápsulas" tiene ID 4
            'weight_id' => 1, // Asumiendo que el peso "75g" tiene ID 1
        ]);
        Product::create([
            'name' => 'Café orgánico 1kg',
            'slug' => 'cafe-orgánico-1kg',
            'description' => 'Café cultivado sin pesticidas ni fertilizantes químicos.',
            'price' => 25.99,
            'stock' => 5,
            'category_id' => 5, // Asumiendo que la categoría "Café orgánico" tiene ID 5
            'weight_id' => 5, // Asumiendo que el peso "1kg" tiene ID 5
        ]);
        Product::create([
            'name' => 'Café de especialidad 500g',
            'slug' => 'cafe-de-especialidad-500g',
            'description' => 'Café de alta calidad con características únicas de sabor y aroma.',
            'price' => 18.99,
            'category_id' => 6, // Asumiendo que la categoría "Café de especialidad" tiene ID 6
            'weight_id' => 4, // Asumiendo que el peso "500g" tiene ID 4
        ]);
        Product::create([
            'name' => 'Café descafeinado 250g',
            'slug' => 'cafe-descafeinado-250g',
            'description' => 'Café al que se le ha eliminado la cafeína, ideal para quienes buscan reducir su consumo.',
            'stock' => 11,
            'price' => 14.99,
            'category_id' => 7, // Asumiendo que la categoría "Café descafeinado" tiene ID 7
            'weight_id' => 3, // Asumiendo que el peso "250g" tiene ID 3
        ]);
    }
}