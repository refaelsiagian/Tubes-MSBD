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
            $table->id(); // Primary key with custom name
            $table->integer('grade'); // Grade level (e.g., 1, 2, 3)
            $table->foreignId('level_id')->constrained()->onDelete('cascade'); // Create the foreign key column without constraint
            $table->foreignId('major_id')->nullable()->constrained()->onDelete('cascade'); // Create the foreign key column without constraint
            $table->string('subclass')->nullable(); // Subclass identifier (e.g., A, B, C)
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
