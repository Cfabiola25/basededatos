<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Turismo', 'uuid' => Str::uuid()],
            ['name' => 'Innovación', 'uuid' => Str::uuid()],
            ['name' => 'Tecnología', 'uuid' => Str::uuid()],
            ['name' => 'Sostenibilidad', 'uuid' => Str::uuid()],
            ['name' => 'Moda', 'uuid' => Str::uuid()],
            ['name' => 'Diseño', 'uuid' => Str::uuid()],
            ['name' => 'IA', 'uuid' => Str::uuid()],
            ['name' => 'Finanzas', 'uuid' => Str::uuid()],
            ['name' => 'Emprendimiento', 'uuid' => Str::uuid()],
            ['name' => 'Gastronomía', 'uuid' => Str::uuid()],
            ['name' => 'Negocios', 'uuid' => Str::uuid()],
            ['name' => 'Desarrollo', 'uuid' => Str::uuid()],
            ['name' => 'Cultura', 'uuid' => Str::uuid()],
            ['name' => 'Investigación', 'uuid' => Str::uuid()],
        ];
        
        foreach ($tags as $tag) {
            Tag::create([
                'uuid' => $tag['uuid'],
                'name' => $tag['name'],
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]);
        }
    }
}
