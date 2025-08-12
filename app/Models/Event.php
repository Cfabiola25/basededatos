<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Si estos FKs realmente viven en events (días), déjalos.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }

    // Speakers a nivel DÍA (tabla pivote: event_day_speakers)
    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'event_day_speakers', 'event_id', 'speaker_id')
                    ->withTimestamps()
                    ->withPivot('uuid');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'event_tag')->withTimestamps();
    }

    public function ratings()
    {
        return $this->hasMany(EventRating::class);
    }
}
