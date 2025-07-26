<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

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

public function speakers()
{
    return $this->belongsToMany(Speaker::class, 'event_speaker')->withPivot('role')->withTimestamps();
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
