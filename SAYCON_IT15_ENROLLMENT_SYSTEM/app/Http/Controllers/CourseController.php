<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

public function index()
{
    $courses = Course::all();
    return view('courses.index', compact('courses'));
}    
public function show($id)
{
    $course = Course::with('students')->findOrFail($id);
    return view('courses.show', compact('course'));
}

public function store(Request $request)
{
    $request->validate([
        'course_code' => 'required|unique:courses,course_code',
        'course_name' => 'required',
        'capacity'    => 'required|integer|min:1'
    ]);

    Course::create($request->all());

    return redirect()->route('courses.index')
                     ->with('success', 'Course created successfully.');
}
public function update(Request $request, $id)
{
    $course = Course::findOrFail($id);

    $request->validate([
        'course_code' => 'required|string|max:20|unique:courses,course_code,' . $course->id,
        'course_name' => 'required|string|max:255',
        'capacity'    => 'required|integer|min:1'
    ]);

    $course->update($request->all());

    return redirect()->route('courses.index')
                     ->with('success', 'Course updated successfully.');
}


}

