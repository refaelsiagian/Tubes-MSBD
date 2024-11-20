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
        Schema::create('day_times', function (Blueprint $table) {
            $table->id(); // Ini setara dengan AUTO_INCREMENT PRIMARY KEY
            $table->string('day'); // VARCHAR(50) untuk kolom 'day'
            $table->time('start_time'); // TIME untuk kolom 'start_time'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_times');
    }
};
