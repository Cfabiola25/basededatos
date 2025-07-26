<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventTagSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('event_tag')->insert([
            [
                'uuid' => Str::uuid(),
                'tag_id' => 1, // Turismo
                'event_id' => 1, // Panel Inaugural
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'tag_id' => 2, // Innovación
                'event_id' => 2, // IA para Generación Gráfica
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'tag_id' => 3, // IA
                'event_id' => 2,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'tag_id' => 4, // Diseño
                'event_id' => 3, // Taller de Diseño
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'tag_id' => 5, // Moda
                'event_id' => 4, // Materia Viva
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
