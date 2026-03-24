@extends('layouts.app')

@section('title', 'Add Course | EduManage Pro')

@section('content')
    <section class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-soft">
                <div class="row g-0">
                    <div class="col-md-5 bg-light p-4 d-flex flex-column justify-content-center border-end">
                        <span class="badge text-bg-success rounded-pill mb-3 w-auto">New course</span>
                        <h2 class="fw-bold">Create a new course</h2>
                        <p class="text-secondary">Add course details to make them available for student enrolment.</p>
                        <img src="{{ asset('images/course-catalog.svg') }}" alt="Add course" class="img-fluid rounded-4 mt-3">
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

                        <form action="{{ route('courses.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Course Name</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-lg" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Course Code</label>
                                <input type="text" name="code" value="{{ old('code') }}" class="form-control form-control-lg" placeholder="e.g. CS101" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success rounded-pill px-4">Save Course</button>
                                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
