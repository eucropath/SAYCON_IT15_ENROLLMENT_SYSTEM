<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        $student1 = Student::first();
        $course1 = Course::first();

        if ($student1 && $course1) {
            $student1->courses()->attach($course1->id);
        }
    }
}
