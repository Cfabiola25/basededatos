<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventRatingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('event_ratings')->insert([
            [
                'uuid' => Str::uuid(),
                'event_id' => 1,
                'rating' => 5,
                'comment' => 'Excelente ponencia y gran organización.',
                'created_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 2,
                'rating' => 4,
                'comment' => 'Muy buen contenido aunque faltó tiempo.',
                'created_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 3,
                'rating' => 3,
                'comment' => 'Interesante, pero se podría mejorar la interacción.',
                'created_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
