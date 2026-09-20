
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Attendance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    {{-- Header --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Edit Attendance</h2>

        <a href="{{ route('admin.attendances.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>


    {{-- Success Message --}}

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    {{-- Validation Errors --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Card --}}

    <div class="card shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">
                Update Attendance
            </h5>

        </div>


        <div class="card-body">

            <form action="{{ route('admin.attendances.update', $attendance->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                {{-- Student --}}

                <div class="mb-3">

                    <label for="student_id"
                           class="form-label">

                        Student <span class="text-danger">*</span>

                    </label>


                    <select name="student_id"
                            id="student_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Student --
                        </option>


                        @foreach($students as $student)

                            <option value="{{ $student->id }}"
                                {{ old('student_id', $attendance->student_id) == $student->id ? 'selected' : '' }}>

                                {{ $student->user->name ?? 'N/A' }}

                                @if($student->roll_no)
                                    - {{ $student->roll_no }}
                                @endif

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Subject --}}

                <div class="mb-3">

                    <label for="subject_id"
                           class="form-label">

                        Subject <span class="text-danger">*</span>

                    </label>


                    <select name="subject_id"
                            id="subject_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Subject --
                        </option>


                        @foreach($subjects as $subject)

                            <option value="{{ $subject->id }}"
                                {{ old('subject_id', $attendance->subject_id) == $subject->id ? 'selected' : '' }}>

                                {{ $subject->name }}

                                @if($subject->code)
                                    - {{ $subject->code }}
                                @endif

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Teacher --}}

                <div class="mb-3">

                    <label for="teacher_id"
                           class="form-label">

                        Teacher <span class="text-danger">*</span>

                    </label>


                    <select name="teacher_id"
                            id="teacher_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Teacher --
                        </option>


                        @foreach($teachers as $teacher)

                            <option value="{{ $teacher->id }}"
                                {{ old('teacher_id', $attendance->teacher_id) == $teacher->id ? 'selected' : '' }}>

                                {{ $teacher->user->name ?? 'N/A' }}

                                @if($teacher->employee_id)
                                    - {{ $teacher->employee_id }}
                                @endif

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Date --}}

                <div class="mb-3">

                    <label for="date"
                           class="form-label">

                        Date <span class="text-danger">*</span>

                    </label>


                    <input type="date"
                           name="date"
                           id="date"
                           class="form-control"

                           value="{{ old(
                               'date',
                               $attendance->date
                                   ? $attendance->date->format('Y-m-d')
                                   : ''
                           ) }}"

                           required>

                </div>


                {{-- Status --}}

                <div class="mb-3">

                    <label for="status"
                           class="form-label">

                        Status <span class="text-danger">*</span>

                    </label>


                    <select name="status"
                            id="status"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Status --
                        </option>


                        <option value="present"
                            {{ old('status', $attendance->status) == 'present' ? 'selected' : '' }}>

                            Present

                        </option>


                        <option value="absent"
                            {{ old('status', $attendance->status) == 'absent' ? 'selected' : '' }}>

                            Absent

                        </option>


                        <option value="late"
                            {{ old('status', $attendance->status) == 'late' ? 'selected' : '' }}>

                            Late

                        </option>

                    </select>

                </div>


                {{-- Remarks --}}

                <div class="mb-3">

                    <label for="remarks"
                           class="form-label">

                        Remarks

                    </label>


                    <textarea name="remarks"
                              id="remarks"
                              class="form-control"
                              rows="3"
                              placeholder="Enter remarks">{{ old('remarks', $attendance->remarks) }}</textarea>

                </div>


                {{-- Buttons --}}

                <button type="submit"
                        class="btn btn-primary">

                    Update Attendance

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

