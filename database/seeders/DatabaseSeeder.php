<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Pedro Sánchez',
            'email' => 'pedro@ejemplo.com',
            'password' => Hash::make('password123'),
        ]);

        $user2 = User::create([
            'name' => 'María López',
            'email' => 'maria@ejemplo.com',
            'password' => Hash::make('password123'),
        ]);

        $user3 = User::create([
            'name' => 'Carlos Gómez',
            'email' => 'carlos@ejemplo.com',
            'password' => Hash::make('password123'),
        ]);

        // Notas con expiración dentro de las 24 horas
        Note::create([
            'user_id' => $user1->id,
            'content' => 'Hoy organizamos una reunión de trabajo para revisar avances del proyecto.',
            'type' => 'texto',
            'expires_at' => Carbon::now()->addHours(18),
        ]);

        Note::create([
            'user_id' => $user2->id,
            'content' => 'Soñé que volaba sobre montañas de cristal y podía hablar con los animales.',
            'type' => 'sueño',
            'expires_at' => Carbon::now()->addHours(22),
        ]);

        Note::create([
            'user_id' => $user3->id,
            'content' => 'Crear una app que organice las notas por formas geométricas según la emoción.',
            'type' => 'idea',
            'expires_at' => Carbon::now()->addHours(10),
        ]);

        Note::create([
            'user_id' => $user1->id,
            'content' => 'Soñé que llegaba tarde a un examen de la universidad y no encontraba la puerta.',
            'type' => 'sueño',
            'expires_at' => Carbon::now()->addHours(14),
        ]);
    }
}