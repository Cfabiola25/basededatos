<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // UUID
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Relaciones
            $table->foreignId('gender_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('document_type_id')->constrained()->onDelete('cascade');

            $table->string('document_number');
            $table->string('role')->nullable(); // Campo opcional si no usas tabla intermedia con Spatie

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); // Si usas borrado suave
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

