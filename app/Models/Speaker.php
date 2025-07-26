<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

public function documentType()
{
    return $this->belongsTo(DocumentType::class);
}

public function jornadaSpeakers()
{
    return $this->hasMany(JornadaSpeaker::class);
}

public function eventSpeakers()
{
    return $this->hasMany(EventSpeaker::class);
}

public function socials()
{
    return $this->hasMany(SpeakerSocial::class);
}

}
