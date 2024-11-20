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
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('employee_id'); // Foreign key
            $table->decimal('total', 15, 2); // Total payment, up to 15 digits with 2 decimal places
            $table->longText('detail')->nullable(); // Payment details, optional
            $table->date('date'); // Payment date
            $table->string('image')->nullable(); // Payment proof, optional
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraint
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_histories');
    }
};
