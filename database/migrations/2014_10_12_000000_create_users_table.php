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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username'); // Unique username for the user
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('profile_image')->nullable(); // Optional profile image
            $table->longText('bio')->nullable(); // Optional bio for the user
            $table->string('location')->nullable(); // Optional location for the user
            $table->string('website')->nullable(); // Optional website for the user
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
