<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Nombre del Evento',
                'description' => 'Proyectando FESC 2025',
                'is_active' => true,
                'user_id' => 1, // Asegúrate que el usuario con ID 1 exista
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Año del Evento',
                'description' => '2025',
                'is_active' => true,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
