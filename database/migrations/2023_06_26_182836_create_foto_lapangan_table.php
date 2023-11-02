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
        Schema::create('foto_lapangan', function (Blueprint $table) {
            $table->string('idfoto')->primary()->nullable();
            $table->string('foto', 255)->nullable();
            $table->longText('keterangan')->nullable();
            $table->foreignUlid('lapangan_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_lapangan');
    }
};
