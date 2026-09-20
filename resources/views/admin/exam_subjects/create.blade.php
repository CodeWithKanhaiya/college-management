<!DOCTYPE html>
<html>

<head>

    <title>Add Exam Subject</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Add Exam Subject</h2>

        <a href="{{ route('admin.exam-subjects.index') }}"
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

            <form action="{{ route('admin.exam-subjects.store') }}"
                  method="POST">

                @csrf


                {{-- Exam --}}

                <div class="mb-3">

                    <label class="form-label">
                        Exam
                    </label>

                    <select name="exam_id"
                            class="form-control"
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
                            class="form-control"
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


                {{-- Exam Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Exam Date
                    </label>

                    <input type="date"
                           name="exam_date"
                           class="form-control"
                           value="{{ old('exam_date') }}"
                           required>

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
                           placeholder="Example: Room 101"
                           value="{{ old('room_no') }}"
                           required>

                </div>


                <button type="submit"
                        class="btn btn-success">

                    Save Exam Subject

                </button>


                <a href="{{ route('admin.exam-subjects.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>