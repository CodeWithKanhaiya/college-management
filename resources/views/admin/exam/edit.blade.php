<!DOCTYPE html>
<html>

<head>

    <title>Edit Exam</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Edit Exam</h2>

        <a href="{{ route('admin.exams.index') }}"
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

            <form action="{{ route('admin.exams.update', $exam->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                {{-- Exam Name --}}

                <div class="mb-3">

                    <label class="form-label">
                        Exam Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $exam->name) }}"
                           required>

                </div>


                {{-- Exam Type --}}

                <div class="mb-3">

                    <label class="form-label">
                        Exam Type
                    </label>

                    <select name="exam_type"
                            class="form-control"
                            required>

                        <option value="Internal"
                            {{ old('exam_type', $exam->exam_type) == 'Internal' ? 'selected' : '' }}>
                            Internal
                        </option>

                        <option value="Mid Term"
                            {{ old('exam_type', $exam->exam_type) == 'Mid Term' ? 'selected' : '' }}>
                            Mid Term
                        </option>

                        <option value="Final"
                            {{ old('exam_type', $exam->exam_type) == 'Final' ? 'selected' : '' }}>
                            Final
                        </option>

                        <option value="Practical"
                            {{ old('exam_type', $exam->exam_type) == 'Practical' ? 'selected' : '' }}>
                            Practical
                        </option>

                    </select>

                </div>


                {{-- Semester --}}

                <div class="mb-3">

                    <label class="form-label">
                        Semester
                    </label>

                    <select name="semester"
                            class="form-control"
                            required>

                        @for($i = 1; $i <= 12; $i++)

                            <option value="{{ $i }}"
                                {{ old('semester', $exam->semester) == $i ? 'selected' : '' }}>

                                Semester {{ $i }}

                            </option>

                        @endfor

                    </select>

                </div>


                {{-- Start Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Start Date
                    </label>

                    <input type="date"
                           name="start_date"
                           class="form-control"
                           value="{{ old('start_date', $exam->start_date?->format('Y-m-d')) }}"
                           required>

                </div>


                {{-- End Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        End Date
                    </label>

                    <input type="date"
                           name="end_date"
                           class="form-control"
                           value="{{ old('end_date', $exam->end_date?->format('Y-m-d')) }}"
                           required>

                </div>


                {{-- Status --}}

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-control"
                            required>

                        <option value="1"
                            {{ old('status', $exam->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $exam->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Update Exam

                </button>


                <a href="{{ route('admin.exams.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>