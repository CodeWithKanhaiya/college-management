<!DOCTYPE html>
<html>

<head>

    <title>Edit Class</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Edit Class</h2>

        <a href="{{ route('admin.classes.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.classes.update', $class->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                {{-- Course --}}

                <div class="mb-3">

                    <label class="form-label">
                        Course
                    </label>

                    <select name="course_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Select Course --
                        </option>

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}"
                                {{ old('course_id', $class->course_id) == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Class Name --}}

                <div class="mb-3">

                    <label class="form-label">
                        Class Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $class->name) }}"
                           required>

                </div>


                {{-- Section --}}

                <div class="mb-3">

                    <label class="form-label">
                        Section
                    </label>

                    <input type="text"
                           name="section"
                           class="form-control"
                           value="{{ old('section', $class->section) }}"
                           required>

                </div>


                {{-- Semester --}}

                <div class="mb-3">

                    <label class="form-label">
                        Semester
                    </label>

                    <select name="semester"
                            class="form-control"
                            required>

                        @for($i = 1; $i <= 12; $i++)

                            <option value="{{ $i }}"
                                {{ old('semester', $class->semester) == $i ? 'selected' : '' }}>

                                Semester {{ $i }}

                            </option>

                        @endfor

                    </select>

                </div>


                {{-- Academic Year --}}

                <div class="mb-3">

                    <label class="form-label">
                        Academic Year
                    </label>

                    <input type="text"
                           name="academic_year"
                           class="form-control"
                           value="{{ old('academic_year', $class->academic_year) }}"
                           required>

                </div>


                {{-- Status --}}

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control">

                        <option value="1"
                            {{ old('status', $class->status) == 1 ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="0"
                            {{ old('status', $class->status) == 0 ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Update Class

                </button>


                <a href="{{ route('admin.classes.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>