<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Tag;

class EventTagSeeder extends Seeder
{
    public function run(): void
    {
        $events = Event::all();
        $tags = Tag::all();

        if ($events->isEmpty() || $tags->isEmpty()) {
            dump('No hay eventos o tags para relacionar');
            return;
        }

        foreach ($events as $event) {
            // Seleccionamos aleatoriamente de 1 a 3 tags por evento
            $tagIds = $tags->random(rand(1, min(3, $tags->count())))->pluck('id');

            foreach ($tagIds as $tagId) {
                DB::table('event_tag')->insert([
                    'uuid' => Str::uuid(), // Aquí generamos el UUID
                    'event_id' => $event->id,
                    'tag_id' => $tagId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        dump('Tags relacionados correctamente con eventos');
    }
}
