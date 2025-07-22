<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();       // user who submitted
            $table->unsignedBigInteger('service_id')->nullable();    // related service (optional)
            $table->text('content')->nullable();                     // for general feedback
            $table->text('comment')->nullable();                     // for service feedback
            $table->string('status')->default('pending');            // status: pending / approved / etc.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
