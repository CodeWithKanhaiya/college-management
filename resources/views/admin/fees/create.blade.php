
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Fee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Add Fee</h2>

        <a href="{{ route('admin.fees.index') }}"
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

            <form action="{{ route('admin.fees.store') }}"
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


                {{-- Total Amount --}}

                <div class="mb-3">

                    <label class="form-label">
                        Total Amount
                    </label>

                    <input type="number"
                           name="total_amount"
                           class="form-control"
                           step="0.01"
                           min="0"
                           value="{{ old('total_amount') }}"
                           required>

                </div>


                {{-- Paid Amount --}}

                <div class="mb-3">

                    <label class="form-label">
                        Paid Amount
                    </label>

                    <input type="number"
                           name="paid_amount"
                           class="form-control"
                           step="0.01"
                           min="0"
                           value="{{ old('paid_amount', 0) }}"
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

                        <option value="paid">
                            Paid
                        </option>

                        <option value="partial">
                            Partial
                        </option>

                        <option value="pending">
                            Pending
                        </option>

                    </select>

                </div>


                {{-- Due Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Due Date
                    </label>

                    <input type="date"
                           name="due_date"
                           class="form-control"
                           value="{{ old('due_date') }}"
                           required>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Save Fee

                </button>


                <a href="{{ route('admin.fees.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>
