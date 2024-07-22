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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('activity_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->integer('slots_booked');
            $table->enum('status', ['pending', 'confirmed', 'cancelled']);
            $table->timestamps();

            // Setting up the foreign key constraint
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
