<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('employee_id'); // Foreign key
            $table->unsignedBigInteger('lesson_id'); // Foreign key
            $table->date('date'); // Report date
            $table->longText('report'); // Report content
            $table->boolean('acc')->default(false); // Approval status, default is false
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraints
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
