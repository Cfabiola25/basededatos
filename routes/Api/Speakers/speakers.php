<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Speaker\SpeakerController;

{
    Route::get('/speakers', [SpeakerController::class, 'index']);
    Route::post('/speakers', [SpeakerController::class, 'store']);
    Route::get('/speakers/{uuid}', [SpeakerController::class, 'show']);
    Route::put('/speakers/{uuid}', [SpeakerController::class, 'update']);
    Route::delete('/speakers/{uuid}', [SpeakerController::class, 'destroy']);
};
