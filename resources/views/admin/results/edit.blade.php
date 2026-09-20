
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Result</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Edit Result</h2>

        <a href="{{ route('admin.results.index') }}"
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

            <form action="{{ route('admin.results.update', $result->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


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

                            <option value="{{ $student->id }}"
                                {{ old('student_id', $result->student_id) == $student->id ? 'selected' : '' }}>

                                {{ $student->user->name ?? 'N/A' }}
                                - {{ $student->roll_no }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Exam --}}

                <div class="mb-3">

                    <label class="form-label">
                        Exam
                    </label>

                    <select name="exam_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Exam --
                        </option>

                        @foreach($exams as $exam)

                            <option value="{{ $exam->id }}"
                                {{ old('exam_id', $result->exam_id) == $exam->id ? 'selected' : '' }}>

                                {{ $exam->name }}
                                - Semester {{ $exam->semester }}

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
                                {{ old('subject_id', $result->subject_id) == $subject->id ? 'selected' : '' }}>

                                {{ $subject->name }}
                                - {{ $subject->code }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Marks Obtained --}}

                <div class="mb-3">

                    <label class="form-label">
                        Marks Obtained
                    </label>

                    <input type="number"
                           name="marks_obtained"
                           class="form-control"
                           step="0.01"
                           min="0"
                           value="{{ old('marks_obtained', $result->marks_obtained) }}"
                           required>

                </div>


                {{-- Total Marks --}}

                <div class="mb-3">

                    <label class="form-label">
                        Total Marks
                    </label>

                    <input type="number"
                           name="total_marks"
                           class="form-control"
                           step="0.01"
                           min="1"
                           value="{{ old('total_marks', $result->total_marks) }}"
                           required>

                </div>


                {{-- Grade --}}

                <div class="mb-3">

                    <label class="form-label">
                        Grade
                    </label>

                    <select name="grade"
                            class="form-select">

                        <option value="">
                            -- Select Grade --
                        </option>

                        @foreach(['A+', 'A', 'B+', 'B', 'C', 'D', 'F'] as $grade)

                            <option value="{{ $grade }}"
                                {{ old('grade', $result->grade) == $grade ? 'selected' : '' }}>

                                {{ $grade }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Remarks --}}

                <div class="mb-3">

                    <label class="form-label">
                        Remarks
                    </label>

                    <textarea name="remarks"
                              class="form-control"
                              rows="3">{{ old('remarks', $result->remarks) }}</textarea>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Update Result

                </button>

                <a href="{{ route('admin.results.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>

