<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Agenda;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $agendas = [
            [
                'uuid' => Str::uuid(),
                'name' => 'Proyectando FESC 2025 - II',
                'description' => 'Evento institucional de la FESC: "Impulsamos el Desarrollo Turístico y Productivo de Norte de Santander a través de la Educación Superior", celebrado del 20 al 24 de octubre de 2025.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    }
}
