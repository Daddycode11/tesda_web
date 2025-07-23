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
Schema::create('tesda_requests', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user who submitted
    $table->string('request_type'); // Scholarship, Assessment, Training
    $table->string('name');  // optional, could also get from user
    $table->string('email'); // optional, could also get from user
    $table->text('message')->nullable();
    $table->string('status')->default('Pending'); // Pending, Approved, Rejected
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tesda_requests');
    }
};
