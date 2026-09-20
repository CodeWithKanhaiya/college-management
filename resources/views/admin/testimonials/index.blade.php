@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                gap-2 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Student Testimonials
            </h2>

            <p class="text-muted mb-0">
                Manage student feedback
            </p>
        </div>

        <a href="{{ route('admin.testimonials.create') }}"
           class="btn btn-primary">

            + Add Testimonial

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered
                              table-striped align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Feedback</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($testimonials as $testimonial)

                            <tr>

                                <td>
                                    {{ $testimonial->id }}
                                </td>

                                <td>
                                    {{ $testimonial->student_name }}
                                </td>

                                <td>
                                    {{ $testimonial->course }}
                                </td>

                                <td>
                                    {{ Str::limit(
                                        $testimonial->feedback,
                                        80
                                    ) }}
                                </td>

                                <td>

                                    @if($testimonial->status)

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

                                    <a href="{{ route(
                                        'admin.testimonials.show',
                                        $testimonial->id
                                    ) }}"
                                       class="btn btn-info btn-sm">

                                        View

                                    </a>

                                    <a href="{{ route(
                                        'admin.testimonials.edit',
                                        $testimonial->id
                                    ) }}"
                                       class="btn btn-warning btn-sm">

                                        Edit

                                    </a>


                                    <form action="{{ route(
                                        'admin.testimonials.destroy',
                                        $testimonial->id
                                    ) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm(
                                                    'Delete this testimonial?'
                                                )">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-4">

                                    No testimonials found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection