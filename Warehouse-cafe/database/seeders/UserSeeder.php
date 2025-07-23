<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Akun Admin
        User::create([
            'username' => 'admin01',
            'nama_lengkap' => 'Danang Kurnia', // <-- DITAMBAHKAN
            'email'    => 'admin01@gudang.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang aman
            'role'     => 'admin',
        ]);

        // Buat Akun Kasir
        User::create([
            'username' => 'kasir01',
            'nama_lengkap' => 'Muhammad Abdul Aziz', // <-- DITAMBAHKAN
            'email'    => 'kasir01@gudang.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang aman
            'role'     => 'kasir',
        ]);
    }
}
