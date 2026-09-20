
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Timetables</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Timetable List</h2>

        <a href="{{ route('admin.timetables.create') }}"
           class="btn btn-primary">

            + Add Timetable

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
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room No</th>
                        <th>Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($timetables as $timetable)

                        <tr>

                            <td>
                                {{ $timetable->id }}
                            </td>

                            <td>
                                {{ $timetable->course->course_name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $timetable->subject->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $timetable->teacher->user->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $timetable->day }}
                            </td>

                            <td>
                                {{ $timetable->start_time }}
                            </td>

                            <td>
                                {{ $timetable->end_time }}
                            </td>

                            <td>
                                {{ $timetable->room_no ?? '-' }}
                            </td>

                            <td>

                                <a href="{{ route('admin.timetables.edit', $timetable->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>


                                <form action="{{ route('admin.timetables.destroy', $timetable->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this timetable?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="text-center">

                                No timetable found.

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

