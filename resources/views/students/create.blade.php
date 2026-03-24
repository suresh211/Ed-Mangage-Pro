@extends('layouts.app')

@section('title', 'Add Student | EduManage Pro')

@section('content')
    <section class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-soft">
                <div class="row g-0">
                    <div class="col-md-5 bg-light p-4 d-flex flex-column justify-content-center border-end">
                        <span class="badge text-bg-primary rounded-pill mb-3 w-auto">New record</span>
                        <h2 class="fw-bold">Add a new student</h2>
                        <p class="text-secondary">Complete the form to register a student and assign them to a course.</p>
                        <img src="{{ asset('images/students-portal.svg') }}" alt="Add student" class="img-fluid rounded-4 mt-3">
                    </div>
                    <div class="col-md-7 p-4 p-lg-5">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('students.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Student Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Assign Course</label>
                                <select name="course_id" class="form-select form-select-lg" required>
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                            {{ $course->title }} ({{ $course->code }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary rounded-pill px-4">Save Student</button>
                                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
