<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers v1
use App\Http\Controllers\v1\Auth\LoginController;
use App\Http\Controllers\v1\User\UserController;
use App\Http\Controllers\v1\Agenda\AgendaController;
use App\Http\Controllers\v1\Category\CategoryController;
use App\Http\Controllers\v1\DocumentType\DocumentTypeController;
use App\Http\Controllers\v1\Event\EventController;
use App\Http\Controllers\v1\EventSpeaker\EventSpeakerController;
use App\Http\Controllers\v1\EventTag\EventTagController;
use App\Http\Controllers\v1\Gender\GenderController;
use App\Http\Controllers\v1\Jornada\JornadaController;
use App\Http\Controllers\v1\JornadaSpeaker\JornadaSpeakerController;
use App\Http\Controllers\v1\Location\LocationController;
use App\Http\Controllers\v1\Setting\SettingController;
use App\Http\Controllers\v1\Speaker\SpeakerController;
use App\Http\Controllers\v1\Tag\TagController;
use App\Http\Controllers\v1\UserType\UserTypeController;

// Ruta pública de login
Route::post('v1/login', [LoginController::class, 'login']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {

    // Usuario autenticado
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
        ]);
    });

    // CRUDs protegidos
    Route::apiResource('user', UserController::class);
    Route::apiResource('agenda', AgendaController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('document-types', DocumentTypeController::class);
    Route::apiResource('events', EventController::class);
    Route::apiResource('event-speakers', EventSpeakerController::class);
    Route::apiResource('event-tags', EventTagController::class);
    Route::apiResource('genders', GenderController::class);
    Route::apiResource('jornadas', JornadaController::class);
    Route::apiResource('jornada-speakers', JornadaSpeakerController::class);
    Route::apiResource('locations', LocationController::class);
    Route::apiResource('settings', SettingController::class);
    Route::apiResource('speakers', SpeakerController::class);
    Route::apiResource('tags', TagController::class);
    Route::apiResource('user-types', UserTypeController::class);
});
