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
        Schema::create('employee_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->unsignedBigInteger('job_id');
            $table->string('code_name')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_jobs');
    }
};
