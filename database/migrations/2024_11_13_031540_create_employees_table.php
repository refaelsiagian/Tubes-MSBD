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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('id')->primary(); // String primary key
            $table->string('employee_name');
            $table->string('phone_number');
            $table->text('address')->nullable();
            $table->string('account_number')->nullable(); // Encrypted account number\
            $table->string('bank_name')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
