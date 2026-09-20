<!DOCTYPE html>
<html>

<head>

    <title>Subjects</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Subjects</h2>

        <a href="{{ route('admin.subjects.create') }}"
           class="btn btn-primary">

            + Add Subject

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

                        <th>Subject Name</th>

                        <th>Code</th>

                        <th>Semester</th>

                        <th>Credits</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                @forelse($subjects as $subject)

                    <tr>

                        <td>
                            {{ $subject->id }}
                        </td>

                        <td>
                            {{ $subject->course->course_name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $subject->name }}
                        </td>

                        <td>
                            {{ $subject->code }}
                        </td>

                        <td>
                            {{ $subject->semester }}
                        </td>

                        <td>
                            {{ $subject->credits }}
                        </td>

                        <td>

                            @if($subject->status)

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

                            <a href="{{ route('admin.subjects.edit', $subject->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>


                            <form action="{{ route('admin.subjects.destroy', $subject->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this subject?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            No subjects found.

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