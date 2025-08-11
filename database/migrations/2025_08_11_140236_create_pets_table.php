<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('type', ['dog', 'cat']);
            $table->string('breed', 150)->nullable();
            $table->unsignedSmallInteger('age');
            $table->enum('gender', ['male', 'female',]);
            $table->enum('size', ['small', 'medium', 'large']);
            $table->enum('size', ['small', 'medium', 'large']);
            $table->decimal('weight', 5, 2)->nullable();
            $table->string('color', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
