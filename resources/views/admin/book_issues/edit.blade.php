
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Book Issue</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Edit Book Issue</h2>

        <a href="{{ route('admin.book-issues.index') }}"
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

            <form action="{{ route('admin.book-issues.update', $bookIssue->id) }}"
                  method="POST">

                @csrf

                @method('PUT')


                {{-- Book --}}

                <div class="mb-3">

                    <label class="form-label">
                        Book
                    </label>

                    <select name="book_id"
                            class="form-select"
                            required>

                        @foreach($books as $book)

                            <option value="{{ $book->id }}"
                                {{ old('book_id', $bookIssue->book_id) == $book->id ? 'selected' : '' }}>

                                {{ $book->title }}
                                - Available: {{ $book->available_quantity }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Student --}}

                <div class="mb-3">

                    <label class="form-label">
                        Student
                    </label>

                    <select name="student_id"
                            class="form-select"
                            required>

                        @foreach($students as $student)

                            <option value="{{ $student->id }}"
                                {{ old('student_id', $bookIssue->student_id) == $student->id ? 'selected' : '' }}>

                                {{ $student->user->name ?? 'N/A' }}
                                - {{ $student->roll_no ?? 'N/A' }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Issue Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Issue Date
                    </label>

                    <input type="date"
                           name="issue_date"
                           class="form-control"
                           value="{{ old('issue_date', $bookIssue->issue_date?->format('Y-m-d')) }}"
                           required>

                </div>


                {{-- Return Date --}}

                <div class="mb-3">

                    <label class="form-label">
                        Return Date
                    </label>

                    <input type="date"
                           name="return_date"
                           class="form-control"
                           value="{{ old('return_date', $bookIssue->return_date?->format('Y-m-d')) }}">

                </div>


                {{-- Status --}}

                <div class="mb-3">

    <label class="form-label">
        Status
    </label>

    <select name="status" class="form-select" required>

        <option value="Issued"
            {{ old('status', $bookIssue->status) == 'Issued' ? 'selected' : '' }}>
            Issued
        </option>

        <option value="Returned"
            {{ old('status', $bookIssue->status) == 'Returned' ? 'selected' : '' }}>
            Returned
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
                              rows="3">{{ old('remarks', $bookIssue->remarks) }}</textarea>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Update Book Issue

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
