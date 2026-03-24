@extends('layouts.app')

@section('title', 'Home | ')


@section('content')
  <section class="hero-surface mb-5">
    <div class="row align-items-center g-4 position-relative">
        <div class="col-lg-7">
            <span class="hero-badge">Academic Admin Dashboard</span>
            <h1 class="display-5 fw-bold mb-3">Manage students, courses, and academic records with a polished modern interface.</h1>
            <p class="lead text-white-50 mb-4">Empowering institutions with organized student data, structured course management, and a user-friendly dashboard experience.</p>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('students.index') }}" class="btn btn-light btn-lg rounded-pill px-4 fw-semibold">View Students</a>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">Browse Courses</a>
            </div>
        </div>
        <div class="col-lg-5">
                        <img src="{{ asset('images/2.jpg') }}" alt="Education dashboard" class="img-fluid rounded-4 shadow-lg">


        </div>
    </div>
</section>

    <section class="mb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon" style="background: var(--info-soft); color: #1d4ed8;">{{ $studentCount }}</div>
                    <h5 class="fw-bold mb-1">Registered Students</h5>
                    <p class="text-secondary mb-0">Students currently recorded in the system.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon" style="background: var(--success-soft); color: #15803d;">{{ $courseCount }}</div>
                    <h5 class="fw-bold mb-1">Available Courses</h5>
                    <p class="text-secondary mb-0">Course catalog ready for assignment and management.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon" style="background: var(--warning-soft); color: #b45309;">{{ $assignedCount }}</div>
                    <h5 class="fw-bold mb-1">Assigned Enrolments</h5>
                    <p class="text-secondary mb-0">Students currently linked to an active course.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="mb-4">
            <h2 class="section-heading">Core platform features</h2>
            <p class="section-subtext">A modern academic interface designed for clarity, efficiency, and a seamless user experience.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card p-3">
                    <img src="{{ asset('images/5.jpg') }}" alt="Student portal illustration" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Student management</h5>
                    <p class="text-secondary mb-0">Create, edit, and review student records in a cleaner professional layout.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-3">
                    <img src="{{ asset('images/4.jpg') }}" alt="Course catalog illustration" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Course overview</h5>
                    <p class="text-secondary mb-0">Track course information, course codes, and student distribution in one place.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-3">
                    <img src="{{ asset('images/3.jpg') }}" alt="Campus life photo" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Professional presentation</h5>
                    <p class="text-secondary mb-0">Extra pages and educational visuals make the site feel more complete and polished.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card-soft p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="h4 fw-bold mb-0">Recent students</h3>
                        <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">View all</a>
                    </div>
                    @forelse($recentStudents as $student)
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <div>
                                <div class="fw-semibold">{{ $student->name }}</div>
                                <small class="text-secondary">{{ $student->email }}</small>
                            </div>
                            <span class="badge badge-soft text-bg-light">{{ $student->course->title ?? 'No Course' }}</span>
                        </div>
                    @empty
                        <div class="empty-state">No students available yet.</div>
                    @endforelse
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-soft p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="h4 fw-bold mb-0">Top courses</h3>
                        <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline-success rounded-pill">Explore</a>
                    </div>
                    @forelse($topCourses as $course)
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <div>
                                <div class="fw-semibold">{{ $course->title }}</div>
                                <small class="text-secondary">{{ $course->code }}</small>
                            </div>
                            <span class="badge text-bg-primary rounded-pill">{{ $course->students_count }} Students</span>
                        </div>
                    @empty
                        <div class="empty-state">No course data available yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="page-banner">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">Explore a fully integrated platform designed to manage students, courses, and campus engagement — all in one place.”</h3>
                    <p class="text-secondary mb-0">Use the new <strong>About</strong> and <strong>Campus Life</strong> pages from the navigation bar to showcase your system with more information and more photos.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('about') }}" class="btn btn-primary rounded-pill px-4 me-2">About Page</a>
                    <a href="{{ route('gallery') }}" class="btn btn-outline-dark rounded-pill px-4">Campus Life</a>
                </div>
            </div>
        </div>
    </section>
@endsection
