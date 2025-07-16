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
        Schema::create('tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId("recipe_id")->constrained()->onDelete('cascade'); // Foreign key to the recipes table
            $table->string('content'); // Content of the tip    
            $table->string("title")->nullable(); // Optional title for the tip
            $table->string("icon")->nullable(); // Optional icon for the tip
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tips');
    }
};
