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
            $table->id(); // auto-increment primary key
            $table->foreignId('subject_id')->constrained()->onDelete('cascade'); // foreign key to subjects table
            $table->foreignId('level_id')->constrained()->onDelete('cascade'); // foreign key to levels table
            $table->foreignId('major_id')->nullable()->constrained()->onDelete('cascade'); // foreign key to majors table (nullable)
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
