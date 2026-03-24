@extends('layouts.app')

@section('title', 'Students | EduManage Pro')

@section('content')
    <section class="page-banner mb-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="section-heading mb-2">Student directory</h1>
                <p class="section-subtext mb-0">Manage student records with a cleaner table, quick stats, and better visual structure.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('students.create') }}" class="btn btn-primary rounded-pill px-4">Add New Student</a>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <div class="row g-4">
            <div class="col-md-4"><div class="stat-card"><h3 class="fw-bold">{{ $studentCount }}</h3><p class="text-secondary mb-0">Total students</p></div></div>
            <div class="col-md-4"><div class="stat-card"><h3 class="fw-bold">{{ $assignedCount }}</h3><p class="text-secondary mb-0">Students with assigned courses</p></div></div>
            <div class="col-md-4"><div class="stat-card"><h3 class="fw-bold">{{ $courseCount }}</h3><p class="text-secondary mb-0">Courses available for assignment</p></div></div>
        </div>
    </section>

    <section class="card-soft">
        <div class="p-4 border-bottom d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h3 class="h4 fw-bold mb-1">All students</h3>
                <p class="text-secondary mb-0">Academic records overview</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill">Home</a>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-primary rounded-pill">View Courses</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-0 rounded-bottom-4 m-4 mb-0">{{ session('success') }}</div>
        @endif

        <div class="table-responsive p-4">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Email Address</th>
                        <th>Assigned Course</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td class="fw-semibold">{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <span class="badge text-bg-light border rounded-pill px-3 py-2">
                                    {{ $student->course->title ?? 'No Course Assigned' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning rounded-pill px-3">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this student?')" class="btn btn-sm btn-danger rounded-pill px-3">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state">No students found yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
