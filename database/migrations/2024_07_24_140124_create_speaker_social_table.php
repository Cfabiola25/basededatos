<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('speaker_socials', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('speaker_id')->constrained()->onDelete('cascade');
            $table->string('platform');
            $table->string('url');
            $table->timestamps();
            $table->softDeletes(); // Para el deleted_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('speaker_socials');
    }
};
