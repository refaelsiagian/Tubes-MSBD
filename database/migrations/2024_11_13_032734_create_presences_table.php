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
        Schema::create('presences', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('employee_id'); // Foreign key to employee table
            $table->enum('status', ['hadir', 'terlambat', 'absen']); // Presence status, true or false
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraint (assuming employee_id is a string)
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
