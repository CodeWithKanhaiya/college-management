
@extends('layouts.frontend')

@section('title', 'All Courses')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h1 class="fw-bold">
                All Courses
            </h1>

            <p class="text-muted">
                Explore all courses offered by our college.
            </p>

        </div>


        <div class="row g-4">

            @forelse($courses as $course)

                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body p-4">

                            <h4 class="fw-bold">
                                {{ $course->course_name }}
                            </h4>

                            <hr>

                            <p>
                                <strong>Course Code:</strong>
                                {{ $course->course_code }}
                            </p>

                            <p>
                                <strong>Duration:</strong>
                                {{ $course->duration }}
                            </p>

                            <p>
                                <strong>Fees:</strong>
                                ₹{{ number_format($course->fees) }}
                            </p>

                            <p>
                                <strong>Semesters:</strong>
                                {{ $course->total_semesters }}
                            </p>

                            <a href="{{ route('courses.show', $course->id) }}"
                               class="btn btn-primary">

                                View Details

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        No courses available.

                    </div>

                </div>

            @endforelse

        </div>


        <div class="text-center mt-5">

            <a href="{{ url('/') }}"
               class="btn btn-secondary">

                ← Back to Home

            </a>

        </div>

    </div>

</section>

@endsection
