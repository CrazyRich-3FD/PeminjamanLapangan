<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'iduser' => '001',
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '081123456789',
            'alamat' => 'Peminjaman Lapangan',
            'role' => 'admin',
            'password' => bcrypt('admin12345'),
        ]);
    }
}
