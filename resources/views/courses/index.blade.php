@extends('layouts.app')

@section('title', 'Courses | EduManage Pro')

@section('content')
    <section class="page-banner mb-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="section-heading mb-2">Course catalog</h1>
                <p class="section-subtext mb-0">Organize course titles, codes, and student enrolment counts with a more polished academic look.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('courses.create') }}" class="btn btn-success rounded-pill px-4">Add New Course</a>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <div class="row g-4">
            <div class="col-md-4"><div class="stat-card"><h3 class="fw-bold">{{ $courseCount }}</h3><p class="text-secondary mb-0">Total courses</p></div></div>
            <div class="col-md-4"><div class="stat-card"><h3 class="fw-bold">{{ $studentCount }}</h3><p class="text-secondary mb-0">Students across all courses</p></div></div>
            <div class="col-md-4"><div class="stat-card"><h3 class="fw-bold">{{ $mostPopular?->students_count ?? 0 }}</h3><p class="text-secondary mb-0">Highest enrolment in a single course</p></div></div>
        </div>
    </section>

    <section class="card-soft">
        <div class="p-4 border-bottom d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h3 class="h4 fw-bold mb-1">All courses</h3>
                <p class="text-secondary mb-0">Course details with enrolment summary</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill">Home</a>
                <a href="{{ route('students.index') }}" class="btn btn-outline-primary rounded-pill">View Students</a>
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
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Students</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td class="fw-semibold">{{ $course->title }}</td>
                            <td><span class="badge text-bg-light border rounded-pill px-3 py-2">{{ $course->code }}</span></td>
                            <td>{{ $course->students_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning rounded-pill px-3">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this course?')" class="btn btn-sm btn-danger rounded-pill px-3">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state">No courses found yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
