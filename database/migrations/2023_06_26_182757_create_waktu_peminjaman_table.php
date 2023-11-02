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
        Schema::create('waktu_peminjaman', function (Blueprint $table) {
            $table->string('idwaktu')->primary()->nullable();
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->time('jam_awal')->nullable();
            $table->time('jam_akhir')->nullable();
            $table->foreignUlid('peminjaman_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waktu_peminjaman');
    }
};
