<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // e.g., TESDA Course
            $table->date('date');                 // date of training
            $table->time('time');                 // time of training
            $table->string('location')->nullable(); // optional location
            $table->text('description')->nullable(); // optional details
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
