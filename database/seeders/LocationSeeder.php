<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            [
                'uuid' => Str::uuid(),
                'name_location' => 'Teatro Zulima',
                'address' => 'Av. 5 # 13-58',
                'neighborhood' => 'Centro',
                'reference_point' => 'Frente al Parque Santander',
                'google_maps' => 'https://maps.google.com/?q=Teatro+Zulima+Cúcuta',
                'longitude' => null,
                'latitude' => null,
                'country' => 'Colombia',
                'city' => 'Cúcuta',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'name_location' => 'Hotel CasaBlanca',
                'address' => 'Calle 10 # 5-50',
                'neighborhood' => 'Centro',
                'reference_point' => 'Cerca al Parque Colón',
                'google_maps' => 'https://maps.google.com/?q=Hotel+CasaBlanca+Cúcuta',
                'longitude' => null,
                'latitude' => null,
                'country' => 'Colombia',
                'city' => 'Cúcuta',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'name_location' => 'Centro Cultural Quinta Teresa',
                'address' => 'Av. 3E entre calles 13 y 14',
                'neighborhood' => 'La Playa',
                'reference_point' => 'Frente a la Torre del Reloj',
                'google_maps' => 'https://maps.google.com/?q=Centro+Cultural+Quinta+Teresa+Cúcuta',
                'longitude' => null,
                'latitude' => null,
                'country' => 'Colombia',
                'city' => 'Cúcuta',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'name_location' => 'FESC – Sede Principal',
                'address' => 'Avenida 0 # 15-61',
                'neighborhood' => 'Centro',
                'reference_point' => 'Frente a la Biblioteca Pública Julio Pérez Ferrero',
                'google_maps' => 'https://maps.google.com/?q=FESC+Cúcuta',
                'longitude' => null,
                'latitude' => null,
                'country' => 'Colombia',
                'city' => 'Cúcuta',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'name_location' => 'C.C. Jardín Plaza',
                'address' => 'Diagonal 15 # 2N-65',
                'neighborhood' => 'Centro',
                'reference_point' => 'Frente a Alkosto Cúcuta',
                'google_maps' => 'https://maps.google.com/?q=C.C.+Jardín+Plaza+Cúcuta',
                'longitude' => null,
                'latitude' => null,
                'country' => 'Colombia',
                'city' => 'Cúcuta',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'name_location' => 'Ecoparque Comfanorte',
                'address' => 'Vía Boconó - Km 7',
                'neighborhood' => 'Zona Rural',
                'reference_point' => 'Cerca al colegio INEM',
                'google_maps' => 'https://maps.google.com/?q=Ecoparque+Comfanorte+Cúcuta',
                'longitude' => null,
                'latitude' => null,
                'country' => 'Colombia',
                'city' => 'Cúcuta',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
