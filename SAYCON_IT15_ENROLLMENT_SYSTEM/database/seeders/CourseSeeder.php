<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'course_code' => 'IT101',
            'course_name' => 'Introduction to Programming',
            'capacity' => 30
        ]);

        Course::create([
            'course_code' => 'IT202',
            'course_name' => 'Database Systems',
            'capacity' => 25
        ]);
    }
}
