<!DOCTYPE html>
<html>

<head>

    <title>Classes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Class List</h2>

        <a href="{{ route('admin.classes.create') }}"
           class="btn btn-primary">

            + Add Class

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
                    <th>Course</th>
                    <th>Class Name</th>
                    <th>Section</th>
                    <th>Semester</th>
                    <th>Academic Year</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

                </thead>


                <tbody>

                @forelse($classes as $class)

                    <tr>

                        <td>
                            {{ $class->id }}
                        </td>

                        <td>
                            {{ $class->course->course_name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $class->name }}
                        </td>

                        <td>
                            {{ $class->section }}
                        </td>

                        <td>
                            {{ $class->semester }}
                        </td>

                        <td>
                            {{ $class->academic_year }}
                        </td>

                        <td>

                            @if($class->status)

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

                            <a href="{{ route('admin.classes.edit', $class->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>


                            <form action="{{ route('admin.classes.destroy', $class->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this class?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            No classes found.

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