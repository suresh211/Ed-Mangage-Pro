<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount('students')->orderBy('title')->get();

        return view('courses.index', [
            'courses' => $courses,
            'courseCount' => Course::count(),
            'studentCount' => Student::count(),
            'mostPopular' => Course::withCount('students')->orderByDesc('students_count')->first(),
        ]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:courses,code',
        ]);

        Course::create([
            'title' => $request->title,
            'code' => strtoupper($request->code),
        ]);

        return redirect()->route('courses.index')->with('success', 'Course added successfully.');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:courses,code,' . $course->id,
        ]);

        $course->update([
            'title' => $request->title,
            'code' => strtoupper($request->code),
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
