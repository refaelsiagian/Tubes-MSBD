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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id'); // Primary key
            $table->string('job_name'); // Name of the job
            $table->integer('salary')->nullable(); // Salary (in rupiah or relevant currency)
            $table->enum('detail', ['per bulan', 'per les'])->nullable(); // Type of salary payment
        });
    }


    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
