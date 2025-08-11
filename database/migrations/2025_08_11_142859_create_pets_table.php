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
        // Primero eliminamos la tabla pets existente (si existe)
        Schema::dropIfExists('pets');

        // Recreamos la tabla pets con la nueva estructura
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_type_id')->constrained('animal_types')->onDelete('restrict');
            $table->string('name', 100);
            $table->string('breed', 150)->nullable();
            $table->unsignedSmallInteger('age');
            $table->enum('gender', ['male', 'female']);
            $table->enum('size', ['small', 'medium', 'large']);
            $table->decimal('weight', 5, 2)->nullable(); // Hasta 999.99 kg
            $table->string('color', 100);
            $table->timestamps();

            // Índices para mejorar performance
            $table->index('animal_type_id');
            $table->index(['animal_type_id', 'size']); // Para búsquedas combinadas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');

        // Recrear la tabla original (sin la foreign key)
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('type', ['dog', 'cat']);
            $table->string('breed', 150)->nullable();
            $table->unsignedSmallInteger('age');
            $table->enum('gender', ['male', 'female']);
            $table->enum('size', ['small', 'medium', 'large']);
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('color', 100);
            $table->timestamps();
        });
    }
};
