<!DOCTYPE html>
<html>

<head>

    <title>Edit Subject</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h3>Edit Subject</h3>

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


            <form action="{{ route('admin.subjects.update', $subject->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                {{-- Course --}}

                <div class="mb-3">

                    <label class="form-label">
                        Course
                    </label>

                    <select name="course_id"
                            class="form-control">

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}"
                                {{ $subject->course_id == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Name --}}

                <div class="mb-3">

                    <label class="form-label">
                        Subject Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $subject->name) }}">

                </div>


                {{-- Code --}}

                <div class="mb-3">

                    <label class="form-label">
                        Subject Code
                    </label>

                    <input type="text"
                           name="code"
                           class="form-control"
                           value="{{ old('code', $subject->code) }}">

                </div>


                {{-- Semester --}}

                <div class="mb-3">

                    <label class="form-label">
                        Semester
                    </label>

                    <select name="semester"
                            class="form-control">

                        @for($i = 1; $i <= 8; $i++)

                            <option value="{{ $i }}"
                                {{ $subject->semester == $i ? 'selected' : '' }}>

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
                           value="{{ old('credits', $subject->credits) }}"
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

                        <option value="1"
                            {{ $subject->status ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="0"
                            {{ !$subject->status ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Update Subject

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