<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizational_units', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cabinet_id')
                ->constrained('cabinets')
                ->cascadeOnDelete();

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('organizational_units')
                ->nullOnDelete();

            $table->string('name');

            $table->enum('type', [
                'bph',
                'division',
                'department',
            ]);

            $table->string('short_name')->nullable();

            $table->text('description')->nullable();
            $table->text('tasks')->nullable();

            $table->string('cover_path')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(['cabinet_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizational_units');
    }
};