
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Result</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Add Result</h2>

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

            <form action="{{ route('admin.results.store') }}"
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

                            <option value="{{ $student->id }}"
                                {{ old('student_id') == $student->id ? 'selected' : '' }}>

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
                                {{ old('exam_id') == $exam->id ? 'selected' : '' }}>

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
                                {{ old('subject_id') == $subject->id ? 'selected' : '' }}>

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
                           value="{{ old('marks_obtained') }}"
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
                           value="{{ old('total_marks', 100) }}"
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

                        <option value="A+"
                            {{ old('grade') == 'A+' ? 'selected' : '' }}>
                            A+
                        </option>

                        <option value="A"
                            {{ old('grade') == 'A' ? 'selected' : '' }}>
                            A
                        </option>

                        <option value="B+"
                            {{ old('grade') == 'B+' ? 'selected' : '' }}>
                            B+
                        </option>

                        <option value="B"
                            {{ old('grade') == 'B' ? 'selected' : '' }}>
                            B
                        </option>

                        <option value="C"
                            {{ old('grade') == 'C' ? 'selected' : '' }}>
                            C
                        </option>

                        <option value="D"
                            {{ old('grade') == 'D' ? 'selected' : '' }}>
                            D
                        </option>

                        <option value="F"
                            {{ old('grade') == 'F' ? 'selected' : '' }}>
                            F
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

                    Save Result

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

