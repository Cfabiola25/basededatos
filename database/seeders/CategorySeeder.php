<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'uuid' => Str::uuid(),
                'name' => 'Conferencias',
                'description' => 'Sesiones expositivas dictadas por expertos nacionales e internacionales.',
                'color' => '#007bff',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Workshops',
                'description' => 'Talleres prácticos sobre turismo, sostenibilidad, innovación, moda, entre otros.',
                'color' => '#28a745',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Paneles',
                'description' => 'Espacios de diálogo entre expertos sobre temas clave del desarrollo regional.',
                'color' => '#ffc107',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Eventos Especiales',
                'description' => 'Rueda de Negocios, City Tours, Fiestas, Ferias culturales, Desfiles y más.',
                'color' => '#6f42c1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
