<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('organizational_unit_id')
                ->constrained('organizational_units')
                ->cascadeOnDelete();

            $table->string('name');

            $table->text('description')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index('organizational_unit_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};