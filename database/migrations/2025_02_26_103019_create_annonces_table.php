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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('location');
            $table->date('available_from')->nullable();
            $table->date('available_to')->nullable();
            $table->integer('rooms')->nullable();
            $table->string('image')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to users table
            $table->enum('type', ['appartement', 'house', 'villa', 'studio']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
