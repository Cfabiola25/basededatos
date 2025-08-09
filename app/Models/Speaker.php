<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'last_name',
        'gmail',
        'document_type_id',
        'phone',
        'bio',
        'specialization',
        'document_number',
        'photo_url',
        'linkedin_url',
        'facebook_url',
        'instagram_url',
        'tiktok_url',
        'youtube_url',
    ];

    public function getRouteKeyName()
{
    return 'uuid';
}

}
