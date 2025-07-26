<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JornadaSpeaker extends Model
{
    use HasFactory;

public function jornada()
{
    return $this->belongsTo(Jornada::class, 'session_id');
}

public function speaker()
{
    return $this->belongsTo(Speaker::class);
}

}
