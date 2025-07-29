<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Category;
use App\Models\DocumentType;
use App\Models\Location;
use App\Models\Image;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $categoryMap = [
            'Panel Inaugural' => 'Académico',
            '4º FESCtival Internacional de Cine Universitario de Cúcuta' => 'Cultural',
            'City Tour: Cúcuta Destino Fronterizo e Histórico' => 'Turismo',
            'Feria Cultural: Las Riquezas de Mi Tierra' => 'Feria',
            'Fiesta de Cierre: Destino Norte de Santander' => 'Cierre',
        ];

        $events = [
            [
                'title' => 'Panel Inaugural',
                'category' => 'Académico',
                'description' => 'Experiencias de expertos nacionales e internacionales sobre el desarrollo turístico y productivo de Norte de Santander.',
                'start_date' => '2025-10-20',
                'start_time' => '18:00:00',
                'end_date' => '2025-10-20',
                'end_time' => '19:00:00',
                'name_location' => 'Teatro Zulima',
                'capacity' => 100,
                'image_alt' => 'Panel inaugural del Congreso FESC 2025',
            ],
            [
                'title' => '4º FESCtival Internacional de Cine Universitario de Cúcuta',
                'category' => 'Cultural',
                'description' => 'Concurso de cortometrajes con temáticas turísticas y culturales. Participan estudiantes de universidades de Colombia y otros países.',
                'start_date' => '2025-10-21',
                'start_time' => '08:00:00',
                'end_date' => '2025-10-21',
                'end_time' => '12:00:00',
                'name_location' => 'Centro Cultural Quinta Teresa',
                'capacity' => 200,
                'image_alt' => 'Festival de Cine Universitario',
            ],
            [
                'title' => 'City Tour: Cúcuta Destino Fronterizo e Histórico',
                'category' => 'Turismo',
                'description' => 'Recorrido guiado por los principales puntos turísticos e históricos de la ciudad de Cúcuta, promoviendo su valor patrimonial.',
                'start_date' => '2025-10-23',
                'start_time' => '17:00:00',
                'end_date' => '2025-10-23',
                'end_time' => '19:00:00',
                'name_location' => 'Centro Cultural Quinta Teresa',
                'capacity' => 60,
                'image_alt' => 'City Tour Cúcuta',
            ],
            [
                'title' => 'Feria Cultural: Las Riquezas de Mi Tierra',
                'category' => 'Feria',
                'description' => 'Exposición gastronómica, danzas, artesanías, música tradicional y atractivos turísticos del Norte de Santander.',
                'start_date' => '2025-10-24',
                'start_time' => '12:00:00',
                'end_date' => '2025-10-24',
                'end_time' => '18:00:00',
                'name_location' => 'Centro Cultural Quinta Teresa',
                'capacity' => 300,
                'image_alt' => 'Feria Cultural FESC 2025',
            ],
            [
                'title' => 'Fiesta de Cierre: Destino Norte de Santander',
                'category' => 'Cierre',
                'description' => 'Evento de clausura con presentaciones culturales, música, muestras gastronómicas y país invitado: España.',
                'start_date' => '2025-10-24',
                'start_time' => '18:00:00',
                'end_date' => '2025-10-24',
                'end_time' => '23:59:00',
                'name_location' => 'Ecoparque Comfanorte',
                'capacity' => 400,
                'image_alt' => 'Fiesta de Cierre FESC',
            ],
        ];

        foreach ($events as $data) {
            $category = Category::where('name', $data['category'])->first();
            $location = Location::where('name_location', $data['name_location'])->first();
            $image = Image::where('alt_text', $data['image_alt'])->first();

            Event::create([
                'uuid' => Str::uuid(),
                'title' => $data['title'],
                'category_id' => $category?->id,
                'description' => $data['description'],
                'start_date' => $data['start_date'],
                'start_time' => $data['start_time'],
                'end_date' => $data['end_date'],
                'end_time' => $data['end_time'],
                'location_id' => $location?->id,
                'capacity' => $data['capacity'],
                'virtual_link' => null,
                'is_status' => true,
                'image_id' => $image?->id,
                'access_type' => 'presencial',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]);
        }
    }
}
