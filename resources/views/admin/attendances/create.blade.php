<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Attendance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Add Attendance</h2>

        <a href="{{ route('admin.attendances.index') }}"
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

            <form action="{{ route('admin.attendances.store') }}"
                  method="POST">

                @csrf


                {{-- Student --}}

                <div class="mb-3">

                    <label class="form-label">
                        Student
                    </label>

                    <select name="student_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Student --
                        </option>

                        @foreach($students as $student)

                            <option value="{{ $student->id }}">

                                {{ $student->user->name ?? 'N/A' }}
                                - {{ $student->roll_no }}

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

                            <option value="{{ $subject->id }}">

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

                            <option value="{{ $teacher->id }}">

                                {{ $teacher->user->name ?? 'N/A' }}
                                - {{ $teacher->employee_id }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Date
                    </label>

                    <input type="date"
                           name="date"
                           class="form-control"
                           value="{{ old('date') }}"
                           required>

                </div>


                {{-- Status --}}

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Status --
                        </option>

                        <option value="present">
                            Present
                        </option>

                        <option value="absent">
                            Absent
                        </option>

                        <option value="late">
                            Late
                        </option>

                    </select>

                </div>


                {{-- Remarks --}}

                <div class="mb-3">

                    <label class="form-label">
                        Remarks
                    </label>

                    <textarea name="remarks"
                              class="form-control"
                              rows="3">{{ old('remarks') }}</textarea>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Save Attendance

                </button>

                <a href="{{ route('admin.attendances.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>