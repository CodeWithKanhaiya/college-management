<!DOCTYPE html>
<html>
<head>

    <title>Edit Course</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            <h3>Edit Course</h3>
        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)

                        <div>{{ $error }}</div>

                    @endforeach

                </div>

            @endif

            <form action="{{ route('admin.courses.update', $course->id) }}"
                  method="POST">

                @csrf

                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Department
                    </label>

                    <select name="department_id"
                            class="form-control">

                        @foreach($departments as $department)

                            <option value="{{ $department->id }}"
                                {{ $course->department_id == $department->id ? 'selected' : '' }}>

                                {{ $department->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Course Name
                    </label>

                    <input type="text"
                           name="course_name"
                           class="form-control"
                           value="{{ old('course_name', $course->course_name) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Course Code
                    </label>

                    <input type="text"
                           name="course_code"
                           class="form-control"
                           value="{{ old('course_code', $course->course_code) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Duration
                    </label>

                    <input type="text"
                           name="duration"
                           class="form-control"
                           value="{{ old('duration', $course->duration) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Total Semesters
                    </label>

                    <input type="number"
                           name="total_semesters"
                           class="form-control"
                           value="{{ old('total_semesters', $course->total_semesters) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fees
                    </label>

                    <input type="number"
                           name="fees"
                           class="form-control"
                           step="0.01"
                           value="{{ old('fees', $course->fees) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="4">{{ old('description', $course->description) }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control">

                        <option value="1"
                            {{ $course->status ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ !$course->status ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Update Course

                </button>

                <a href="{{ route('admin.courses.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>