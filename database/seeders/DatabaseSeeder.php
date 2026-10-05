<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat Akun Admin (Pemilik Kos)
        User::create([
            'name' => 'Juragan Kos',
            'email' => 'admin@kos.com',
            'password' => Hash::make('password123'), 
            'role' => 'admin',
        ]);

        // 2. Membuat Akun Pengguna (Anak Kos) untuk testing
        User::create([
            'name' => 'Budi Penyewa',
            'email' => 'budi@kos.com',
            'password' => Hash::make('password123'),
            'role' => 'pengguna',
        ]);
    }
} 