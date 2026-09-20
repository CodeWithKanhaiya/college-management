<!DOCTYPE html>
<html>

<head>

    <title>Exams</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Exam List</h2>

        <a href="{{ route('admin.exams.create') }}"
           class="btn btn-primary">

            + Add Exam

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Exam Type</th>
                    <th>Semester</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

                </thead>


                <tbody>

                @forelse($exams as $exam)

                    <tr>

                        <td>
                            {{ $exam->id }}
                        </td>

                        <td>
                            {{ $exam->name }}
                        </td>

                        <td>
                            {{ $exam->exam_type }}
                        </td>

                        <td>
                            Semester {{ $exam->semester }}
                        </td>

                        <td>
                            {{ $exam->start_date?->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $exam->end_date?->format('d-m-Y') }}
                        </td>

                        <td>

                            @if($exam->status)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            @endif

                        </td>


                        <td>

                            <a href="{{ route('admin.exams.edit', $exam->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>


                            <form action="{{ route('admin.exams.destroy', $exam->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this exam?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            No exams found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>