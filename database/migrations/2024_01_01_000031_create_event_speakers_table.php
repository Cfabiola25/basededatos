<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_speakers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            // Si events_agenda y speakers usan UUID como PK
            $table->foreignId('event_id')
                  ->constrained('events_agenda')
                  ->onDelete('cascade');

            $table->foreignId('speaker_id')
                  ->constrained('speakers')
                  ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();

            // Para evitar duplicados del mismo speaker en el mismo evento
            $table->unique(['event_id', 'speaker_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_speakers');
    }
};
