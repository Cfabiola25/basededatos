<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LinkEventSpeakersToDays extends Command
{
    protected $signature = 'event:link-day-speakers {--fresh : Trunca event_day_speakers antes de recalcular}';
    protected $description = 'Genera vínculos speaker ↔ día (events) a partir de event_speakers (actividad ↔ speaker)';

    public function handle(): int
    {
        if ($this->option('fresh')) {
            DB::table('event_day_speakers')->truncate();
            $this->info('event_day_speakers truncada.');
        }

        $pairs = DB::table('event_speakers as es')
            ->join('events_agenda as ea', 'ea.id', '=', 'es.event_id')
            ->select('ea.event_id as day_event_id', 'es.speaker_id')
            ->distinct()
            ->get();

        $inserted = 0; $skipped = 0;

        foreach ($pairs as $row) {
            $exists = DB::table('event_day_speakers')
                ->where('event_id', $row->day_event_id)
                ->where('speaker_id', $row->speaker_id)
                ->exists();

            if ($exists) { $skipped++; continue; }

            DB::table('event_day_speakers')->insert([
                'uuid'       => Str::uuid(),
                'event_id'   => $row->day_event_id,
                'speaker_id' => $row->speaker_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $inserted++;
        }

        $this->info("Vínculos creados: {$inserted}. Omitidos (ya existían): {$skipped}.");
        return Command::SUCCESS;
    }
}
