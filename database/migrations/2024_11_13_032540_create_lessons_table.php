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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id('lesson_id');
            $table->enum('day', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->integer('order'); // Position or order of the lesson in the day
            $table->unsignedBigInteger('type_id'); // Foreign key for lesson type
            $table->unsignedBigInteger('level_id'); // Foreign key for level
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('type_id')->references('type_id')->on('lesson_types')->onDelete('cascade');
            $table->foreign('level_id')->references('level_id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
