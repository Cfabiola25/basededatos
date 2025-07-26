<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    use HasFactory;

public function agenda()
{
    return $this->belongsTo(Agenda::class);
}

public function jornadaSpeakers()
{
    return $this->hasMany(JornadaSpeaker::class);
}

public function events()
{
    return $this->hasMany(Event::class);
}

}
