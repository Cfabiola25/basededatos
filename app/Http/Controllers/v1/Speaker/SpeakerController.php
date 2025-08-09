<?php

namespace App\Http\Controllers\v1\Speaker;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpeakerController extends Controller
{
    public function index()
    {
        return response()->json(Speaker::all(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'gmail' => 'required|email|unique:speakers,gmail',
            'document_type_id' => 'nullable|exists:document_types,id',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'specialization' => 'nullable|string',
            'document_number' => 'required|string|unique:speakers,document_number',
            'photo_url' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'facebook_url' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'tiktok_url' => 'nullable|string',
            'youtube_url' => 'nullable|string',
        ]);

        $data['uuid'] = Str::uuid();

        $speaker = Speaker::create($data);

        return response()->json($speaker, 201);
    }

    public function show($uuid)
    {
        $speaker = Speaker::where('uuid', $uuid)->first();

        if (!$speaker) {
            return response()->json(['message' => 'Speaker no encontrado.'], 404);
        }

        return response()->json($speaker, 200);
    }

    public function update(Request $request, $uuid)
{
    $speaker = Speaker::where('uuid', $uuid)->firstOrFail();

    $data = $request->only([
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
        'youtube_url'
    ]);

    // Actualiza los campos que se hayan enviado (sin sobreescribir los demás si no vienen)
    foreach ($data as $key => $value) {
        if (!is_null($value)) {
            $speaker->$key = $value;
        }
    }

    $speaker->save();

    return response()->json([
        'message' => 'Speaker actualizado correctamente',
        'data' => $speaker
    ], 200);
}

    public function destroy($uuid)
    {
        $speaker = Speaker::where('uuid', $uuid)->first();

        if (!$speaker) {
            return response()->json(['message' => 'Speaker no encontrado.'], 404);
        }

        $speaker->delete();

        return response()->json([
            'message' => 'Speaker eliminado correctamente'
        ]);
    }
}
