
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Timetable</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Add Timetable</h2>

        <a href="{{ route('admin.timetables.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.timetables.store') }}"
                  method="POST">

                @csrf


                {{-- Course --}}

                <div class="mb-3">

                    <label class="form-label">
                        Course
                    </label>

                    <select name="course_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Course --
                        </option>

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Subject --}}

                <div class="mb-3">

                    <label class="form-label">
                        Subject
                    </label>

                    <select name="subject_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Subject --
                        </option>

                        @foreach($subjects as $subject)

                            <option value="{{ $subject->id }}"
                                {{ old('subject_id') == $subject->id ? 'selected' : '' }}>

                                {{ $subject->name }}
                                - {{ $subject->code }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Teacher --}}

                <div class="mb-3">

                    <label class="form-label">
                        Teacher
                    </label>

                    <select name="teacher_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Teacher --
                        </option>

                        @foreach($teachers as $teacher)

                            <option value="{{ $teacher->id }}"
                                {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>

                                {{ $teacher->user->name ?? 'N/A' }}
                                - {{ $teacher->employee_id }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Day --}}

                <div class="mb-3">

                    <label class="form-label">
                        Day
                    </label>

                    <select name="day"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Day --
                        </option>

                        @foreach([
                            'Monday',
                            'Tuesday',
                            'Wednesday',
                            'Thursday',
                            'Friday',
                            'Saturday'
                        ] as $day)

                            <option value="{{ $day }}"
                                {{ old('day') == $day ? 'selected' : '' }}>

                                {{ $day }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Start Time --}}

                <div class="mb-3">

                    <label class="form-label">
                        Start Time
                    </label>

                    <input type="time"
                           name="start_time"
                           class="form-control"
                           value="{{ old('start_time') }}"
                           required>

                </div>


                {{-- End Time --}}

                <div class="mb-3">

                    <label class="form-label">
                        End Time
                    </label>

                    <input type="time"
                           name="end_time"
                           class="form-control"
                           value="{{ old('end_time') }}"
                           required>

                </div>


                {{-- Room --}}

                <div class="mb-3">

                    <label class="form-label">
                        Room No
                    </label>

                    <input type="text"
                           name="room_no"
                           class="form-control"
                           maxlength="40"
                           value="{{ old('room_no') }}">

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Save Timetable

                </button>

                <a href="{{ route('admin.timetables.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>

