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
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade'); // Foreign key to the recipes table
            $table->integer('step_number'); // Step number in the recipe
            $table->string('title')->nullable(); // Optional title for the step
            $table->longText('instruction'); // Instruction for the step
            $table->string('image')->nullable(); // Optional image for the step
            $table->boolean('optional')->default(false); // Whether the step is optional or not
            $table->enum('level', ['easy', 'medium', 'hard'])->default('easy'); // Difficulty level of the step 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};
