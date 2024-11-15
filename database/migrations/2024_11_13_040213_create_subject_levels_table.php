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
        Schema::create('subject_levels', function (Blueprint $table) {
            $table->id('subject_level_id'); // auto-increment primary key
            $table->unsignedBigInteger('subject_id'); // foreign key to subjects table
            $table->unsignedBigInteger('level_id'); // foreign key to levels table
            $table->unsignedBigInteger('major_id')->nullable(); // foreign key to majors table (nullable)
        
            // Add foreign key constraints
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->onDelete('cascade');
            $table->foreign('level_id')->references('level_id')->on('levels')->onDelete('cascade');
            $table->foreign('major_id')->references('major_id')->on('majors')->onDelete('set null'); // foreign key for major_id, set null on delete
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_levels');
    }
};
