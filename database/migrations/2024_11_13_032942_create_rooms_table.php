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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id'); // Primary key with custom name
            $table->integer('grade'); // Grade level (e.g., 1, 2, 3)
            $table->unsignedBigInteger('level_id'); // Create the foreign key column without constraint
            $table->unsignedBigInteger('major_id')->nullable(); // Create the foreign key column without constraint
            $table->string('subclass')->nullable(); // Subclass identifier (e.g., A, B, C)
        
            // Define foreign key constraints separately
            $table->foreign('level_id')->references('level_id')->on('levels')->onDelete('cascade');
            $table->foreign('major_id')->references('major_id')->on('majors')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
