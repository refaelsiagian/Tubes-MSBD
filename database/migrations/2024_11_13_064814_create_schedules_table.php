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
            $table->id('schedule_id'); // Primary key
            $table->unsignedBigInteger('subject_level_id'); // Foreign key to subject_levels
            $table->unsignedBigInteger('lesson_id'); // Foreign key to lessons
            $table->unsignedBigInteger('teacher_id'); // Foreign key to employee_jobs
            $table->unsignedBigInteger('room_id'); // Foreign key to rooms
            $table->unsignedBigInteger('semester_id'); // Foreign key to semesters
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('subject_level_id')->references('subject_level_id')->on('subject_levels')->onDelete('cascade');
            $table->foreign('lesson_id')->references('lesson_id')->on('lessons')->onDelete('cascade');
            $table->foreign('teacher_id')->references('employee_job_id')->on('employee_jobs')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('rooms')->onDelete('cascade');
            $table->foreign('semester_id')->references('semester_id')->on('semesters')->onDelete('cascade');
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
