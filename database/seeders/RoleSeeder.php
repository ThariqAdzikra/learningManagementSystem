<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // <-- Pastikan ini ada

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Masukkan data dosen dan mahasiswa
        Role::create(['name' => 'dosen']);
        Role::create(['name' => 'mahasiswa']);
    }
}