@extends('layouts.app')

@section('title', 'Edit Student | EduManage Pro')

@section('content')
    <section class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-soft p-4 p-lg-5">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                    <div>
                        <span class="badge text-bg-warning rounded-pill mb-2">Update record</span>
                        <h2 class="fw-bold mb-1">Edit student</h2>
                        <p class="text-secondary mb-0">Modify details and reassign course information.</p>
                    </div>
                    <img src="{{ asset('images/about-education.svg') }}" alt="Edit student" style="max-width: 180px;" class="img-fluid rounded-4">
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Student Name</label>
                        <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $student->email) }}" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Assigned Course</label>
                        <select name="course_id" class="form-select form-select-lg" required>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }} ({{ $course->code }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning rounded-pill px-4">Update Student</button>
                        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
