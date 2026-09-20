<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Exam Subject</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    {{-- Header --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Edit Exam Subject</h2>

        <a href="{{ route('admin.exam-subjects.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>


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


    {{-- Form --}}

    <div class="card shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">
                Update Exam Subject
            </h5>

        </div>


        <div class="card-body">

            <form action="{{ route('admin.exam-subjects.update', $examSubject->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                {{-- Exam --}}

                <div class="mb-3">

                    <label for="exam_id"
                           class="form-label">

                        Exam <span class="text-danger">*</span>

                    </label>


                    <select name="exam_id"
                            id="exam_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Exam --
                        </option>


                        @foreach($exams as $exam)

                            <option value="{{ $exam->id }}"
                                {{ old('exam_id', $examSubject->exam_id) == $exam->id ? 'selected' : '' }}>

                                {{ $exam->name }}
                                @if($exam->semester)
                                    - Semester {{ $exam->semester }}
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
                                {{ old('subject_id', $examSubject->subject_id) == $subject->id ? 'selected' : '' }}>

                                {{ $subject->name }}
                                - {{ $subject->code }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Exam Date --}}

                <div class="mb-3">

                    <label for="exam_date"
                           class="form-label">

                        Exam Date <span class="text-danger">*</span>

                    </label>


                    <input type="date"
                           name="exam_date"
                           id="exam_date"
                           class="form-control"
                           value="{{ old('exam_date', $examSubject->exam_date ? $examSubject->exam_date->format('Y-m-d') : '') }}"
                           required>

                </div>


                {{-- Start Time --}}

                <div class="mb-3">

                    <label for="start_time"
                           class="form-label">

                        Start Time <span class="text-danger">*</span>

                    </label>


                    <input type="time"
                           name="start_time"
                           id="start_time"
                           class="form-control"
                           value="{{ old('start_time', $examSubject->start_time) }}"
                           required>

                </div>


                {{-- End Time --}}

                <div class="mb-3">

                    <label for="end_time"
                           class="form-label">

                        End Time <span class="text-danger">*</span>

                    </label>


                    <input type="time"
                           name="end_time"
                           id="end_time"
                           class="form-control"
                           value="{{ old('end_time', $examSubject->end_time) }}"
                           required>

                </div>


                {{-- Room Number --}}

                <div class="mb-3">

                    <label for="room_no"
                           class="form-label">

                        Room No <span class="text-danger">*</span>

                    </label>


                    <input type="text"
                           name="room_no"
                           id="room_no"
                           class="form-control"
                           placeholder="Example: Room 101"
                           value="{{ old('room_no', $examSubject->room_no) }}"
                           required>

                </div>


                {{-- Buttons --}}

                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-primary">

                        Update Exam Subject

                    </button>


                    <a href="{{ route('admin.exam-subjects.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>