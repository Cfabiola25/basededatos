<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'event_id',
        'name',
        'description',
        'start_time',
        'end_time',
        'location_id',
        'speaker_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($agenda) {
            $agenda->uuid = (string) Str::uuid();
        });
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
} 