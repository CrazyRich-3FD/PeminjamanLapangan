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
        Schema::create('users', function (Blueprint $table) {
            $table->string('iduser')->primary()->nullable();
            $table->string('name', 255)->nullable();
            $table->string('username', 255)->unique()->nullable();
            $table->string('email', 255)->unique()->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->longText('alamat')->nullable();
            $table->string('foto', 128)->nullable();
            $table->enum('role', ['admin', 'user'])->nullable();
            $table->timestamps();
            $table->string('password', 255)->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
