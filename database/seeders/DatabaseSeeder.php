<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // 1. Tablas base del sistema
            DocumentTypeSeeder::class,
            GendersSeeder::class,
            UserTypesSeeder::class,

            // 2. Usuarios y configuración base
            UsersSeeder::class,
            SettingsSeeder::class,

            // 3. Elementos temáticos del evento
            CategorySeeder::class,
            TagSeeder::class,
            LocationSeeder::class,
            ImageSeeder::class,

            // 4. Estructura principal del evento
            AgendaSeeder::class,
            EventSeeder::class,
            JornadaSeeder::class,
            SpeakerSeeder::class,
            SpeakerSocialSeeder::class,

            // 5. Eventos y relaciones
            EventsAgendaSeeder::class,
            EventTagSeeder::class,
            EventSpeakerSeeder::class,
            JornadaSpeakerSeeder::class,
            EventRatingSeeder::class,
        ]);
    }
}
