<!DOCTYPE html>
<html>

<head>

    <title>Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Student List</h2>

        <a href="{{ route('admin.students.create') }}"
           class="btn btn-primary">

            + Add Student

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
                    <th>Department</th>
                    <th>Course</th>
                    <th>Admission No</th>
                    <th>Roll No</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($students as $student)

                    <tr>

                        <td>{{ $student->id }}</td>

                        <td>
                            {{ $student->user->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $student->department->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $student->course->course_name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $student->admission_no }}
                        </td>

                        <td>
                            {{ $student->roll_no }}
                        </td>

                        <td>
                            {{ $student->phone }}
                        </td>

                        <td>
                            {{ $student->gender }}
                        </td>

                        <td>

                            @if($student->status)

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

                            <a href="{{ route('admin.students.edit', $student->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('admin.students.destroy', $student->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this student?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="10"
                            class="text-center">

                            No students found.

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