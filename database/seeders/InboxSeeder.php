<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Query;
use App\Models\User;
use Faker\Factory as Faker;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('es_ES');

        // Obtenemos todos los IDs de usuarios registrados para asignarlos a las Queries
        $userIds = User::pluck('id')->toArray();

        if (empty($userIds)) {
            $this->command->warn('No hay usuarios creados. Ejecuta el UserSeeder primero para poder crear Queries.');
            return;
        }

        // 1. Crear 15 Contactos (Invitados)
        for ($i = 0; $i < 15; $i++) {
            Contact::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'subject' => $faker->sentence(4),
                'message' => $faker->paragraph(3),
                'status' => $faker->boolean(30), // 30% de probabilidad de que sea true (Leído)
                'created_at' => $faker->dateTimeBetween('-1 month', 'now')
            ]);
        }

        // 2. Crear 15 Queries (Usuarios Registrados)
        for ($i = 0; $i < 15; $i++) {
            Query::create([
                'user_id' => $faker->randomElement($userIds),
                'subject' => $faker->sentence(4),
                'message' => $faker->paragraph(3),
                'status' => $faker->boolean(30), // 30% de probabilidad de que sea true (Leído)
                'created_at' => $faker->dateTimeBetween('-1 month', 'now')
            ]);
        }
    }
}
