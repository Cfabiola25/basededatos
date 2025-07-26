<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventsAgendaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events_agenda')->insert([
            [
                'uuid' => Str::uuid(),
                'event_id' => 1,
                'agenda_id' => 1,
                'title' => 'Conferencia inaugural: Turismo en Norte de Santander',
                'program' => 'Programa principal de apertura con autoridades locales y ponentes internacionales.',
                'time' => '08:00 - 10:00',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 2,
                'agenda_id' => 1,
                'title' => 'Panel de Innovación y Sostenibilidad',
                'program' => 'Diálogo con empresarios, expertos y gobierno sobre sostenibilidad turística.',
                'time' => '10:30 - 12:00',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'uuid' => Str::uuid(),
                'event_id' => 3,
                'agenda_id' => 1, 
                'title' => 'Workshop de Gastronomía Regional',
                'program' => 'Taller práctico con chefs locales mostrando cocina típica de la región.',
                'time' => '14:00 - 16:00',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
