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
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('gmail')->nullable();
            $table->foreignId('document_type_id')->nullable()->constrained()->onDelete('set null');
            $table->string('phone', 20)->nullable();
            $table->text('bio')->nullable();
            $table->string('specialization')->nullable();
            $table->string('document_number')->nullable()->unique();
            $table->text('photo_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->text('facebook_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('tiktok_url')->nullable();
            $table->text('youtube_url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
