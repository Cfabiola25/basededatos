<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\JornadaSpeaker;

class JornadaSpeakerSeeder extends Seeder
{
    public function run(): void
    {
        $jornadaSpeakers = [
            [
                'uuid' => Str::uuid(),
                'session_id' => 1, // Jornada: Panel Inaugural (Lunes)
                'speaker_id' => 1, // Federico De Arteaga
                'role' => 'Panelista',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'session_id' => 1,
                'speaker_id' => 2, // Javier Suescún
                'role' => 'Panelista',
         
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($jornadaSpeakers as $item) {
            JornadaSpeaker::create($item);
        }
    }
}
