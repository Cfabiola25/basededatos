<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\EventSpeaker;

class EventSpeakerSeeder extends Seeder
{
    public function run(): void
    {
        $eventSpeakers = [
            [
                'uuid' => Str::uuid(),
                'event_id' => 1, // Panel Inaugural
                'speaker_id' => 1, // Federico De Arteaga
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 1, // Panel Inaugural
                'speaker_id' => 2, // Javier Suescún
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 2, // FESCtival Cine
                'speaker_id' => 1, // Federico como invitado en taller paralelo
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($eventSpeakers as $item) {
            EventSpeaker::create($item);
        }
    }
}
