<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Jornada;
use Carbon\Carbon;

class JornadaSeeder extends Seeder
{
    public function run(): void
    {
        $jornadas = [
            [
                'uuid' => Str::uuid(),
                'event_id' => 1, 
                'title' => 'Lunes - Tendencias Mundiales en Innovación, Tecnología e Investigación, aportándole al desarrollo turístico y productivo de la región',
                'start_at' => Carbon::parse('2025-10-20 18:00:00'),
                'end_at' => Carbon::parse('2025-10-20 19:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 1, 
                'title' => 'Martes - Dinámicas Mundiales que Transforman Nuestra Industria Turística',
                'start_at' => Carbon::parse('2025-10-21 08:00:00'),
                'end_at' => Carbon::parse('2025-10-21 20:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 1, 
                'title' => 'Miércoles - Modelos Globales que Potencializan el Desarrollo Económico de la Región',
                'start_at' => Carbon::parse('2025-10-22 08:00:00'),
                'end_at' => Carbon::parse('2025-10-22 20:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 1, 
                'title' => 'Jueves - Impacto de la Investigación y la Tecnología en el Desarrollo Turístico y Productivo de la Región',
                'start_at' => Carbon::parse('2025-10-23 08:00:00'),
                'end_at' => Carbon::parse('2025-10-23 20:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 1, 
                'title' => 'Viernes: Rueda de Negocios (8:00 a.m. a 12:00 p.m.), Feria Cultural (8:00 a.m. a 6:00 p.m.), Fiesta de Cierre (6:00 p.m. a 12:00 a.m.)',
                'start_at' => Carbon::parse('2025-10-24 08:00:00'),
                'end_at' => Carbon::parse('2025-10-25 00:00:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($jornadas as $jornada) {
            Jornada::create($jornada);
        }
    }
}
