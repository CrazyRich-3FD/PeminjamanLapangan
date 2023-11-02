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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->string('idpinjam')->primary()->nullable();
            $table->enum('status', ['tolak', 'disetujui', 'menunggu', 'selesai'])->nullable();
            $table->foreignUlid('user_id')->nullable();
            $table->foreignUlid('lapangan_id')->nullable();
            $table->foreignUuid('ulasan_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
