<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class EventSpeakerDaySeeder extends Seeder
{
    public function run(): void
    {
        // Columnas textuales candidatas en 'events'
        $textCols = ['title', 'name', 'label'];

        // Detectar qué columnas existen en 'events'
        $eventsCols = Schema::getColumnListing('events');

        $usableTextCol = null;
        foreach ($textCols as $c) {
            if (in_array($c, $eventsCols, true)) { $usableTextCol = $c; break; }
        }

        // Traer pares (jornada_title, speaker_id) desde actividades
        $rows = DB::table('event_speakers as es')
            ->join('events_agenda as ea', 'ea.id', '=', 'es.event_id') // es.event_id -> events_agenda.id
            ->join('jornadas as j', 'j.id', '=', 'ea.jornada_id')
            ->select('j.title as jornada_title', 'es.speaker_id')
            ->distinct()
            ->get();

        // Pre-cargar todos los days (events) para fallback por posición
        $allDays = DB::table('events')->orderBy('id')->get();
        $byPosition = $this->buildPositionMap($allDays); // [Lunes=>id1, Martes=>id2, ...]

        $inserted = 0; $skipped = 0; $warnNoMatch = 0;

        foreach ($rows as $r) {
            $prefix = $this->prefixFromJornada($r->jornada_title); // Lunes/Martes/...
            if (!$prefix) {
                $this->warn("No se pudo inferir día para jornada: '{$r->jornada_title}'");
                $warnNoMatch++; 
                continue;
            }

            $eventRow = null;

            // 1) Buscar por columna textual si existe
            if ($usableTextCol) {
                $eventRow = DB::table('events')
                    ->where($usableTextCol, 'LIKE', $prefix.'%')
                    ->orderBy('id')
                    ->first();
            }

            // 2) Fallback por posición si no se encontró
            if (!$eventRow && isset($byPosition[$prefix])) {
                $eventRow = (object)['id' => $byPosition[$prefix]];
            }

            if (!$eventRow) {
                $this->warn("No encontré 'events' para jornada '{$r->jornada_title}' (día: {$prefix})");
                $warnNoMatch++; 
                continue;
            }

            $exists = DB::table('event_day_speakers')
                ->where('event_id', $eventRow->id)
                ->where('speaker_id', $r->speaker_id)
                ->exists();

            if ($exists) { $skipped++; continue; }

            DB::table('event_day_speakers')->insert([
                'uuid'       => Str::uuid(),
                'event_id'   => $eventRow->id,
                'speaker_id' => $r->speaker_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $inserted++;
        }

        $this->command->info("event_day_speakers -> insertados: {$inserted}, ya existentes: {$skipped}, sin match: {$warnNoMatch}");
    }

    private function prefixFromJornada(string $title): ?string
    {
        $t = trim($title);
        if ($t === '') return null;

        // aceptar Miércoles/Miercoles
        $candidatos = ['Lunes','Martes','Miércoles','Miercoles','Jueves','Viernes'];
        foreach ($candidatos as $c) {
            if (stripos($t, $c) === 0) return $c === 'Miercoles' ? 'Miércoles' : $c;
        }
        return null;
    }

    private function buildPositionMap($allDays): array
    {
        // Si tienes exactamente 5 días en events, mapea por orden:
        // 1=>Lunes, 2=>Martes, 3=>Miércoles, 4=>Jueves, 5=>Viernes
        $map = [];
        $dias = ['Lunes','Martes','Miércoles','Jueves','Viernes'];
        $i = 0;
        foreach ($allDays as $day) {
            if ($i >= count($dias)) break;
            $map[$dias[$i]] = $day->id;
            $i++;
        }
        return $map;
    }

    private function warn(string $msg): void
    {
        if (app()->runningInConsole()) $this->command->warn($msg); else dump($msg);
    }
}
