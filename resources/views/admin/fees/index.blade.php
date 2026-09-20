
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Fees</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Fees List</h2>

        <a href="{{ route('admin.fees.create') }}"
           class="btn btn-primary">

            + Add Fee

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
                        <th>Course</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>

                    </tr>

                    </thead>


                    <tbody>

                    @forelse($fees as $fee)

                        <tr>

                            <td>
                                {{ $fee->id }}
                            </td>

                            <td>
                                {{ $fee->student->user->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $fee->course->course_name ?? 'N/A' }}
                            </td>

                            <td>
                                ₹{{ $fee->total_amount }}
                            </td>

                            <td>
                                ₹{{ $fee->paid_amount }}
                            </td>

                            <td>
                                ₹{{ $fee->due_amount }}
                            </td>

                            <td>

                                @if($fee->status == 'paid')

                                    <span class="badge bg-success">
                                        Paid
                                    </span>

                                @elseif($fee->status == 'partial')

                                    <span class="badge bg-warning text-dark">
                                        Partial
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $fee->due_date?->format('d-m-Y') }}
                            </td>

                            <td>

                                <a href="{{ route('admin.fees.edit', $fee->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>


                                <form action="{{ route('admin.fees.destroy', $fee->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this fee?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="text-center">

                                No fees found.

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
