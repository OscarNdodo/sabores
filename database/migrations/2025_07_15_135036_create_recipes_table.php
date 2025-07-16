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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title'); // Title of the recipe
            $table->longText('description')->nullable(); // Description of the recipe
            $table->string("duration")->nullable(); // Duration to prepare the recipe
            $table->string('image'); // Image URL of the recipe
            $table->enum('level', ['low', 'medium', 'high'])->default('medium'); // Cooking level of the recipe
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft'); // Status of the recipe
            $table->enum('category', ["Mata-Bicho", "Almoço", "Jantar", "Sobremesa", "Lanche", "Petisco", "Bebida","Outro", "Salada", "Sopa"])->default("Almoço"); // Category of the recipe
            $table->enum('type', ['Vegetariano', 'Vegano', 'Sem Glúten', 'Sem Lactose', 'Carne', 'Peixe', 'Frutos do Mar', 'Outro'])->default('Carne'); // Tipo da receita
            $table->string('youtube_video')->nullable(); // Optional video link for the recipe
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
