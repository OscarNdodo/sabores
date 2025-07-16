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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade'); // Foreign key to the recipes table
            $table->string('name'); // ex. Batata doce
            $table->string('quantity')->nullable(); // ex. 2
            $table->enum('unit', ['Xícaras', 'KG', 'Gramas', 'Pacotes', 'Mililitros', 'Litros', 'Colheres', 'Unidades'])->nullable(); // ex. xícaras, KG
            $table->boolean('optional')->default(false); // Whether the ingredient is optional or not
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
