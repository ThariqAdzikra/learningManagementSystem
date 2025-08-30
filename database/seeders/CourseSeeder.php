<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::create([
            'name' => 'Konsep Pemrograman',
            'code' => 'IF-A',
            'schedule' => 'Senin, 08:00 - 10:00',
            'room' => 'Lab Komputer 1',
            'semester' => 'Ganjil 2024/2025',
        ]);
        Course::create([
            'name' => 'Struktur Data',
            'code' => 'IF-B',
            'schedule' => 'Selasa, 10:00 - 12:00',
            'room' => 'Lab Komputer 2',
            'semester' => 'Ganjil 2024/2025',
        ]);
        Course::create([
            'name' => 'Basis Data',
            'code' => 'IF-C',
            'schedule' => 'Rabu, 13:00 - 15:00',
            'room' => 'Ruang Teori 3',
            'semester' => 'Ganjil 2024/2025',
        ]);
        Course::create([
            'name' => 'Algoritma Pemrograman',
            'code' => 'IF-D',
            'schedule' => 'Kamis, 08:00 - 10:00',
            'room' => 'Ruang Teori 1',
            'semester' => 'Ganjil 2024/2025',
        ]);
    }
}