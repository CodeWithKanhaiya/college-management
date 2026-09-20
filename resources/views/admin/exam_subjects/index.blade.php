<!DOCTYPE html>
<html>

<head>

    <title>Exam Subjects</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Exam Subject List</h2>

        <a href="{{ route('admin.exam-subjects.create') }}"
           class="btn btn-primary">

            + Add Exam Subject

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
                    <th>Exam</th>
                    <th>Subject</th>
                    <th>Exam Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Room No</th>
                    <th>Action</th>

                </tr>

                </thead>


                <tbody>

                @forelse($examSubjects as $examSubject)

                    <tr>

                        <td>
                            {{ $examSubject->id }}
                        </td>

                        <td>
                            {{ $examSubject->exam->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $examSubject->subject->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $examSubject->exam_date?->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $examSubject->start_time }}
                        </td>

                        <td>
                            {{ $examSubject->end_time }}
                        </td>

                        <td>
                            {{ $examSubject->room_no }}
                        </td>

                        <td>

                            <a href="{{ route('admin.exam-subjects.edit', $examSubject->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>


                            <form action="{{ route('admin.exam-subjects.destroy', $examSubject->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this exam subject?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            No exam subjects found.

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