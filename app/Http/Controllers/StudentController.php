<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course')->latest()->get();

        return view('students.index', [
            'students' => $students,
            'studentCount' => Student::count(),
            'assignedCount' => Student::whereNotNull('course_id')->count(),
            'courseCount' => Course::count(),
        ]);
    }

    public function create()
    {
        $courses = Course::orderBy('title')->get();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|exists:courses,id',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function edit(Student $student)
    {
        $courses = Course::orderBy('title')->get();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
