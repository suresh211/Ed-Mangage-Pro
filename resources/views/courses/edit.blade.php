@extends('layouts.app')

@section('title', 'Edit Course | EduManage Pro')

@section('content')
    <section class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-soft p-4 p-lg-5">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                    <div>
                        <span class="badge text-bg-warning rounded-pill mb-2">Update course</span>
                        <h2 class="fw-bold mb-1">Edit course details</h2>
                        <p class="text-secondary mb-0">Update the course name and code in a cleaner admin form.</p>
                    </div>
                    <img src="{{ asset('images/course-catalog.svg') }}" alt="Edit course" style="max-width: 180px;" class="img-fluid rounded-4">
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

                <form action="{{ route('courses.update', $course->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Course Name</label>
                        <input type="text" name="title" value="{{ old('title', $course->title) }}" class="form-control form-control-lg" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Course Code</label>
                        <input type="text" name="code" value="{{ old('code', $course->code) }}" class="form-control form-control-lg" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning rounded-pill px-4">Update Course</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
