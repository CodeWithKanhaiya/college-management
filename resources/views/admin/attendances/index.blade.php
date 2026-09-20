<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Attendance List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Attendance List</h2>

        <a href="{{ route('admin.attendances.create') }}"
           class="btn btn-primary">

            + Add Attendance

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
                    <th>Student</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Action</th>

                </tr>

                </thead>


                <tbody>

                @forelse($attendances as $attendance)

                    <tr>

                        <td>
                            {{ $attendance->id }}
                        </td>

                        <td>
                            {{ $attendance->student->user->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $attendance->subject->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $attendance->teacher->user->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $attendance->date?->format('d-m-Y') }}
                        </td>

                        <td>

                            @if($attendance->status == 'present')

                                <span class="badge bg-success">
                                    Present
                                </span>

                            @elseif($attendance->status == 'absent')

                                <span class="badge bg-danger">
                                    Absent
                                </span>

                            @else

                                <span class="badge bg-warning text-dark">
                                    Late
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $attendance->remarks ?? '-' }}
                        </td>

                        <td>

                            <a href="{{ route('admin.attendances.edit', $attendance->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>


                            <form action="{{ route('admin.attendances.destroy', $attendance->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this attendance?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            No attendance records found.

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