<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('organizational_unit_id')
                ->constrained('organizational_units')
                ->cascadeOnDelete();

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('achievement_type')->nullable();

            $table->string('photo_path')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index('organizational_unit_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};