<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function enroll(Request $request)
{
    $student = Student::findOrFail($request->student_id);
    $course = Course::findOrFail($request->course_id);

    // Check capacity
    if ($course->students()->count() >= $course->capacity) {
        return back()->with('error', 'Course is already full.');
    }

    // Check duplicate enrollment
    if ($student->courses()->where('course_id', $course->id)->exists()) {
        return back()->with('error', 'Student already enrolled.');
    }

    $student->courses()->attach($course->id);

    return back()->with('success', 'Enrollment successful.');

     $request->validate([
        'student_id' => 'required|exists:students,id',
        'course_id'  => 'required|exists:courses,id',
    ]);
}

}
