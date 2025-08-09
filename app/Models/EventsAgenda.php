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
        'jornada_id', // Asegúrate de tener esta columna
        'title',
        'program',
        'time',
    ];

    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
