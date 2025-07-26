<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeakerSocial extends Model
{
    use HasFactory;

public function speaker()
{
    return $this->belongsTo(Speaker::class);
}

}
