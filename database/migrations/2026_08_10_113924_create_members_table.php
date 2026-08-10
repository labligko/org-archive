<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->foreignId('position_id')
                ->constrained('positions')
                ->cascadeOnDelete();

            $table->string('name');

            $table->string('photo_path')->nullable();

            $table->text('bio')->nullable();

            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index('position_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};