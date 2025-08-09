<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events_agenda', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->foreignId('agenda_id')->constrained()->onDelete('cascade');
            $table->foreignId('jornada_id')->constrained('jornadas')->onDelete('cascade');

            // Nuevas relaciones solicitadas
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('location_id')->nullable()->constrained('locations')->nullOnDelete();

            // Sala/Lugar específico dentro de la ubicación
            $table->string('place')->nullable();

            $table->string('title');
            // program queda como descripción opcional (sin speakers ni categorías ni ubicación)
            $table->text('program')->nullable();
            $table->string('time');

            $table->softDeletes();
            $table->timestamps();

            // Índices útiles
            $table->index(['agenda_id', 'jornada_id']);
            $table->index(['category_id', 'location_id']);
            $table->index(['title', 'time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events_agenda');
    }
};
