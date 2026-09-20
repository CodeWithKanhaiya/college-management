
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Issue Book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Issue Book</h2>

        <a href="{{ route('admin.book-issues.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>


    {{-- Validation Errors --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.book-issues.store') }}"
                  method="POST">

                @csrf


                {{-- Book --}}

                <div class="mb-3">

                    <label class="form-label">
                        Book
                    </label>

                    <select name="book_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Select Book --
                        </option>

                        @foreach($books as $book)

                            <option value="{{ $book->id }}"
                                {{ old('book_id') == $book->id ? 'selected' : '' }}>

                                {{ $book->title }}
                                - Available:
                                {{ $book->available_quantity }}

                            </option>

                        @endforeach

                    </select>

                    @error('book_id')

                        <div class="text-danger">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


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

                                {{ $student->user->name ?? 'Student' }}

                                @if(isset($student->roll_no))
                                    - Roll No: {{ $student->roll_no }}
                                @endif

                            </option>

                        @endforeach

                    </select>

                    @error('student_id')

                        <div class="text-danger">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Issue Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Issue Date
                    </label>

                    <input type="date"
                           name="issue_date"
                           class="form-control"
                           value="{{ old('issue_date', date('Y-m-d')) }}"
                           required>

                    @error('issue_date')

                        <div class="text-danger">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Return Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Return Date
                    </label>

                    <input type="date"
                           name="return_date"
                           class="form-control"
                           value="{{ old('return_date') }}">

                    @error('return_date')

                        <div class="text-danger">
                            {{ $message }}
                        </div>

                    @enderror

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

                        <option value="Issued"
                            {{ old('status', 'Issued') == 'Issued' ? 'selected' : '' }}>

                            Issued

                        </option>

                        <option value="Returned"
                            {{ old('status') == 'Returned' ? 'selected' : '' }}>

                            Returned

                        </option>

                    </select>

                    @error('status')

                        <div class="text-danger">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Remarks --}}

                <div class="mb-3">

                    <label class="form-label">
                        Remarks
                    </label>

                    <textarea name="remarks"
                              class="form-control"
                              rows="3"
                              placeholder="Enter remarks">{{ old('remarks') }}</textarea>

                    @error('remarks')

                        <div class="text-danger">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Buttons --}}

                <button type="submit"
                        class="btn btn-primary">

                    Issue Book

                </button>


                <a href="{{ route('admin.book-issues.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>
