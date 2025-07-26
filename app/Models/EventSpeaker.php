<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSpeaker extends Model
{
    use HasFactory;

public function event()
{
    return $this->belongsTo(Event::class);
}

public function speaker()
{
    return $this->belongsTo(Speaker::class);
}

}
