<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTag extends Model
{
    use HasFactory;

public function event()
{
    return $this->belongsTo(Event::class);
}

public function tag()
{
    return $this->belongsTo(Tag::class);
}

}
