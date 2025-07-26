<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('images')->insert([
            [
                'uuid' => Str::uuid(),
                'url' => 'images/evento-panel-inaugural.jpg',
                'alt_text' => 'Panel inaugural del Congreso FESC 2025',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'url' => 'images/workshop-ia-grafica.jpg',
                'alt_text' => 'Workshop sobre IA Gráfica',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'url' => 'images/moda-elementales.jpg',
                'alt_text' => 'Desfile de modas - Casa de Duendes',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]
        ]);
    }
}
