<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'student_number' => '2026-0001',
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'juan@example.com'
        ]);

        Student::create([
            'student_number' => '2026-0002',
            'first_name' => 'Maria',
            'last_name' => 'Santos',
            'email' => 'maria@example.com'
        ]);

        Student::factory()->count(10)->create();

    }
}
