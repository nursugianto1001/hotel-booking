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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke user
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); // Relasi ke room
            $table->date('check_in'); // Tanggal check-in
            $table->date('check_out'); // Tanggal check-out
            $table->integer('guests')->default(1); // Jumlah tamu
            $table->string('status')->default('pending'); // Status booking: pending, confirmed, rejected
            $table->timestamps();
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
