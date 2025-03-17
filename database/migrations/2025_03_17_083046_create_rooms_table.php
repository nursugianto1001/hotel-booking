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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kamar
            $table->string('type'); // Tipe kamar (Single, Double, Suite, dll)
            $table->decimal('price', 10, 2); // Harga kamar
            $table->text('description')->nullable(); // Deskripsi kamar (opsional)
            $table->text('facilities')->nullable(); // Fasilitas kamar (opsional)
            $table->string('status')->default('available'); // Status kamar: available/booked
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
