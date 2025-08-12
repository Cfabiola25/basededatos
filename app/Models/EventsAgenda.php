<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsAgenda extends Model
{
    use HasFactory;

    protected $table = 'events_agenda';

    protected $fillable = [
        'uuid',
        'agenda_id',
        'event_id',      // Día (events.id)
        'jornada_id',
        'category_id',
        'location_id',
        'place',
        'title',
        'program',
        'time',
    ];

    /* ------- BelongsTo ------- */
    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    public function event() // Día al que pertenece esta actividad
    {
        return $this->belongsTo(Event::class);
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /* ------- Many-to-Many ------- */
    // ACTIVIDAD ↔ SPEAKERS (pivote: event_speakers, FK local en pivote: event_id → events_agenda.id)
    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'event_speakers', 'event_id', 'speaker_id')
                    ->withTimestamps()
                    ->withPivot('uuid');
    }
}
