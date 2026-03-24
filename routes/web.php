<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'studentCount' => Student::count(),
        'courseCount' => Course::count(),
        'assignedCount' => Student::whereNotNull('course_id')->count(),
        'recentStudents' => Student::with('course')->latest()->take(4)->get(),
        'topCourses' => Course::withCount('students')->orderByDesc('students_count')->take(3)->get(),
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'studentCount' => Student::count(),
        'courseCount' => Course::count(),
        'assignedCount' => Student::whereNotNull('course_id')->count(),
    ]);
})->name('about');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
