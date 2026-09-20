<!DOCTYPE html>
<html>

<head>

    <title>Add Subject</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h3>Add Subject</h3>

        </div>


        <div class="card-body">


            @if($errors->any())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <form action="{{ route('admin.subjects.store') }}"
                  method="POST">

                @csrf


                {{-- Course --}}

                <div class="mb-3">

                    <label class="form-label">
                        Course
                    </label>

                    <select name="course_id"
                            class="form-control">

                        <option value="">
                            Select Course
                        </option>

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Subject Name --}}

                <div class="mb-3">

                    <label class="form-label">
                        Subject Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Enter subject name">

                </div>


                {{-- Code --}}

                <div class="mb-3">

                    <label class="form-label">
                        Subject Code
                    </label>

                    <input type="text"
                           name="code"
                           class="form-control"
                           value="{{ old('code') }}"
                           placeholder="Example: CS101">

                </div>


                {{-- Semester --}}

                <div class="mb-3">

                    <label class="form-label">
                        Semester
                    </label>

                    <select name="semester"
                            class="form-control">

                        <option value="">
                            Select Semester
                        </option>

                        @for($i = 1; $i <= 8; $i++)

                            <option value="{{ $i }}"
                                {{ old('semester') == $i ? 'selected' : '' }}>

                                Semester {{ $i }}

                            </option>

                        @endfor

                    </select>

                </div>


                {{-- Credits --}}

                <div class="mb-3">

                    <label class="form-label">
                        Credits
                    </label>

                    <input type="number"
                           name="credits"
                           class="form-control"
                           value="{{ old('credits', 0) }}"
                           min="0"
                           max="20">

                </div>


                {{-- Status --}}

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control">

                        <option value="1">
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-success">

                    Save Subject

                </button>


                <a href="{{ route('admin.subjects.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>