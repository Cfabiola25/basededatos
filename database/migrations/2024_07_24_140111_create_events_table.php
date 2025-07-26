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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('title');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->text('description')->nullable();
            $table->foreignId('document_type_id')->nullable()->constrained()->onDelete('set null');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->foreignId('location_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('capacity')->nullable();
            $table->text('virtual_link')->nullable();
            $table->boolean('is_status')->default(true);
            $table->foreignId('image_id')->nullable()->constrained()->onDelete('set null');
            $table->string('access_type')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
