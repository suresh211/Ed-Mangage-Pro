<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Add New Student</h3>
            </div>
            <div class="card-body">
                <!-- Display success message if available -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form to add student -->
                <form action="{{ route('add.student') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="form-label">Student ID:</label>
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                   <div class="mb-3">
    <label for="course_id" class="form-label">Course:</label>
    <select class="form-control" id="course_id" name="course_id" required>
        <option value="">Select Course</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->title }} ({{ $course->code }})
            </option>
        @endforeach
    </select>
</div>

                    <button type="submit" class="btn btn-success">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>