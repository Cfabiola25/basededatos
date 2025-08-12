<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('event_day_speakers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            // OJO: este event_id referencia a la tabla 'events' (DÍAS del evento)
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('speaker_id')->constrained('speakers')->onDelete('cascade');

            $table->unique(['event_id', 'speaker_id']); // evita duplicados
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_day_speakers');
    }
};
