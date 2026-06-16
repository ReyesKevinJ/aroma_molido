<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Configuramos Faker para generar datos de Argentina
        $faker = Faker::create('es_AR');

        // Obtenemos todos los IDs de los usuarios existentes
        $userIds = User::pluck('id')->toArray();

        // Si no hay usuarios, detenemos el seeder para evitar errores
        if (empty($userIds)) {
            $this->command->warn('No hay usuarios creados. Ejecuta el UserSeeder primero.');
            return;
        }

        // ARREGLOS CORREGIDOS SEGÚN TU MIGRACIÓN
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        $paymentMethods = ['credit_card', 'cash', 'bank_transfer'];
        $paymentStatuses = ['unpaid', 'paid', 'failed', 'refunded'];

        // Vamos a generar 20 pedidos de prueba
        for ($i = 0; $i < 20; $i++) {

            $status = $faker->randomElement($statuses);

            // Si el estado es completado, le asignamos una fecha de envío, sino null
            $shippedAt = ($status === 'completed')
                ? $faker->dateTimeBetween('-1 month', 'now')
                : null;

            Order::create([
                'user_id' => $faker->randomElement($userIds),
                'total_amount' => $faker->randomFloat(2, 5000, 50000),
                'status' => $status,
                'payment_method' => $faker->randomElement($paymentMethods),
                'payment_status' => $faker->randomElement($paymentStatuses),
                'shipped_at' => $shippedAt,
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'postal_code' => $faker->postcode,
                'notes' => $faker->optional(0.3)->sentence(6),
                'slug' => uniqid('aroma-ord-'),
                'shipping_cost' => $faker->randomFloat(2, 1000, 3500),
                'created_at' => $faker->dateTimeBetween('-2 months', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
