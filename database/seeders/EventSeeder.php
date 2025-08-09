<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Category;
use App\Models\Location;
use App\Models\Image;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('name', 'Conferencias')->first();
        $image = Image::where('alt_text', 'Imagen genérica día de evento')->first(); // Puedes cambiarlo por imagen específica si la tienes

        $days = [
            [
                'title' => 'Lunes 20 de octubre',
                'description' => 'Panel Inaugural',
                'start_date' => '2025-10-20',
                'start_time' => '18:00:00',
                'end_date' => '2025-10-20',
                'end_time' => '19:00:00',
                'location_name' => 'Teatro Zulima',
            ],
            [
                'title' => 'Martes 21 de octubre',
                'description' => 'Dinámicas Mundiales que Transforman Nuestra Industria Turística',
                'start_date' => '2025-10-21',
                'start_time' => '08:00:00',
                'end_date' => '2025-10-21',
                'end_time' => '20:00:00',
                'location_name' => null,
            ],
            [
                'title' => 'Miércoles 22 de octubre',
                'description' => 'Módulos Globales que Potencializan el Desarrollo Económico de la Región',
                'start_date' => '2025-10-22',
                'start_time' => '08:00:00',
                'end_date' => '2025-10-22',
                'end_time' => '21:15:00',
                'location_name' => null,
            ],
            [
                'title' => 'Jueves 23 de octubre',
                'description' => 'Impacto de la Investigación y la Tecnología en el Desarrollo Turístico y Productivo de la Región',
                'start_date' => '2025-10-23',
                'start_time' => '08:00:00',
                'end_date' => '2025-10-23',
                'end_time' => '23:00:00',
                'location_name' => null,
            ],
            [
                'title' => 'Viernes 24 de octubre',
                'description' => 'Rueda de Negocios, Feria Cultural y Fiesta de Cierre',
                'start_date' => '2025-10-24',
                'start_time' => '12:00:00',
                'end_date' => '2025-10-24',
                'end_time' => '23:59:00',
                'location_name' => null,
            ],
        ];

        foreach ($days as $day) {
            $location = $day['location_name']
                ? Location::where('name_location', $day['location_name'])->first()
                : null;

            Event::create([
                'uuid' => Str::uuid(),
                'title' => $day['title'],
                'category_id' => $category?->id,
                'description' => $day['description'],
                'start_date' => $day['start_date'],
                'start_time' => $day['start_time'],
                'end_date' => $day['end_date'],
                'end_time' => $day['end_time'],
                'location_id' => $location?->id,
                'capacity' => null,
                'virtual_link' => null,
                'is_status' => true,
                'image_id' => $image?->id,
                'access_type' => 'presencial',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]);
        }

        dump('Días del evento FESC 2025 insertados correctamente.');
    }
}
