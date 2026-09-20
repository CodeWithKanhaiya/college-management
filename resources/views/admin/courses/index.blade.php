<!DOCTYPE html>
<html>
<head>

    <title>Courses</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Course List</h2>

        <a href="{{ route('admin.courses.create') }}"
           class="btn btn-primary">
            + Add Course
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
                        <th>#</th>
                        <th>Department</th>
                        <th>Course Name</th>
                        <th>Code</th>
                        <th>Duration</th>
                        <th>Semesters</th>
                        <th>Fees</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($courses as $course)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $course->department->name ?? '-' }}
                            </td>

                            <td>
                                {{ $course->course_name }}
                            </td>

                            <td>
                                {{ $course->course_code }}
                            </td>

                            <td>
                                {{ $course->duration }}
                            </td>

                            <td>
                                {{ $course->total_semesters }}
                            </td>

                            <td>
                                ₹{{ number_format($course->fees, 2) }}
                            </td>

                            <td>

                                @if($course->status)

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

                                <a href="{{ route('admin.courses.edit', $course->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.courses.destroy', $course->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="text-center">
                                No courses found.
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