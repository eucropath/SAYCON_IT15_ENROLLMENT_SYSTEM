<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller 
{
    public function index()
{
    $students = Student::all();
    return view('students.index', compact('students'));
}
public function show($id)
{
    $student = Student::with('courses')->findOrFail($id);
    return view('students.show', compact('student'));
}

public function store(Request $request)
{
    $request->validate([
        'student_number' => 'required|unique:students,student_number',
        'first_name'     => 'required',
        'last_name'      => 'required',
        'email'          => 'required|email|unique:students,email'
    ]);

    Student::create($request->all());

    return redirect()->route('students.index')
                     ->with('success', 'Student created successfully.');
}

}




