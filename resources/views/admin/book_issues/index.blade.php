
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Issues</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Book Issues</h2>

        <a href="{{ route('admin.book-issues.create') }}"
           class="btn btn-primary">

            + Issue Book

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Book</th>
                            <th>Student</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookIssues as $bookIssue)

                            <tr>

                                <td>
                                    {{ $bookIssue->id }}
                                </td>

                                <td>
                                    {{ $bookIssue->book->title ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $bookIssue->student->user->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $bookIssue->issue_date?->format('d-m-Y') }}
                                </td>

                                <td>
                                    {{ $bookIssue->return_date?->format('d-m-Y') ?? 'Not Returned' }}
                                </td>

                                <td>

                                    @if($bookIssue->status === 'Issued')

                                        <span class="badge bg-warning text-dark">
                                            Issued
                                        </span>

                                    @else

                                        <span class="badge bg-success">
                                            Returned
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $bookIssue->remarks ?? 'N/A' }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.book-issues.edit', $bookIssue->id) }}"
                                       class="btn btn-warning btn-sm">

                                        Edit

                                    </a>


                                    <form action="{{ route('admin.book-issues.destroy', $bookIssue->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this record?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center">

                                    No book issue records found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>


