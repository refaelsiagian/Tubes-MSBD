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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('subject_level_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key to subject_levels
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade'); // Foreign key to lessons
            $table->foreignId('teacher_id')->nullable()->constrained('employee_jobs')->onDelete('cascade'); // Foreign key to employee_jobs
            $table->foreignId('room_id')->constrained()->onDelete('cascade'); // Foreign key to rooms
            $table->foreignId('semester_id')->constrained()->onDelete('cascade'); // Foreign key to semesters
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
