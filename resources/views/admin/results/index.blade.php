
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Results</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Result List</h2>

        <a href="{{ route('admin.results.create') }}"
           class="btn btn-primary">

            + Add Result

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

                    <thead>

                    <tr>

                        <th>ID</th>
                        <th>Student</th>
                        <th>Exam</th>
                        <th>Subject</th>
                        <th>Marks Obtained</th>
                        <th>Total Marks</th>
                        <th>Grade</th>
                        <th>Remarks</th>
                        <th>Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($results as $result)

                        <tr>

                            <td>
                                {{ $result->id }}
                            </td>

                            <td>
                                {{ $result->student->user->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $result->exam->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $result->subject->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $result->marks_obtained }}
                            </td>

                            <td>
                                {{ $result->total_marks }}
                            </td>

                            <td>
                                {{ $result->grade ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $result->remarks ?? '-' }}
                            </td>

                            <td>

                                <a href="{{ route('admin.results.edit', $result->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('admin.results.destroy', $result->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this result?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="text-center">

                                No results found.

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

