<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cabinets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('period_id')
                ->constrained('periods')
                ->cascadeOnDelete();

            $table->string('name'); // Nama kabinet
            $table->string('tagline')->nullable();

            $table->text('description')->nullable();

            $table->string('logo_path')->nullable();
            $table->string('cover_path')->nullable();

            $table->timestamps();

            $table->unique(['period_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cabinets');
    }
};