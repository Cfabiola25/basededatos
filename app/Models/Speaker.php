<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'speakers';

    protected $fillable = [
        'uuid',
        'name',
        'last_name',
        'gmail',
        'document_type_id',
        'document_number',
        'phone',
        'bio',
        'specialization',
        'photo_url',
        'linkedin_url',
        'facebook_url',
        'instagram_url',
        'tiktok_url',
        'youtube_url',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    /* -----------------------------------------------------------------
     | Route binding por UUID
     * -----------------------------------------------------------------*/
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /* -----------------------------------------------------------------
     | Relaciones
     * -----------------------------------------------------------------*/

    // ACTIVIDADES (items de agenda) ↔ SPEAKERS
    // pivote: event_speakers (event_id → events_agenda.id, speaker_id)
    public function agendaItems()
    {
        return $this->belongsToMany(EventsAgenda::class, 'event_speakers', 'speaker_id', 'event_id')
                    ->withTimestamps()
                    ->withPivot('uuid');
    }

    // DÍAS (events) ↔ SPEAKERS
    // pivote: event_day_speakers (event_id → events.id, speaker_id)
    public function dayEvents()
    {
        return $this->belongsToMany(Event::class, 'event_day_speakers', 'speaker_id', 'event_id')
                    ->withTimestamps()
                    ->withPivot('uuid');
    }

    // JORNADAS ↔ SPEAKERS (si usas la tabla jornada_speaker)
    public function jornadas()
    {
        return $this->belongsToMany(Jornada::class, 'jornada_speaker', 'speaker_id', 'jornada_id')
                    ->withTimestamps();
    }

    // Tipo de documento
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    // (Opcional) Si manejas una tabla speaker_social aparte
    // public function socials()
    // {
    //     return $this->hasMany(SpeakerSocial::class);
    // }

    /* -----------------------------------------------------------------
     | Accessors / Scopes
     * -----------------------------------------------------------------*/

    // Accesor rápido para nombre completo
    public function getFullNameAttribute(): string
    {
        return trim("{$this->name} {$this->last_name}");
    }

    // Búsqueda por nombre/apellido
    public function scopeName($query, string $term)
    {
        $term = trim($term);
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'LIKE', "%{$term}%")
              ->orWhere('last_name', 'LIKE', "%{$term}%");
        });
    }
}
