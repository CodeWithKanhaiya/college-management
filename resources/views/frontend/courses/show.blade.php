
@extends('layouts.frontend')

@section('title', $course->course_name)

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-8">

                <div class="card border-0 shadow">

                    <div class="card-body p-4 p-md-5">

                        {{-- Course Name --}}
                        <h1 class="fw-bold mb-4">

                            {{ $course->course_name }}

                        </h1>


                        {{-- Course Code --}}
                        <p>

                            <strong>Course Code:</strong>

                            {{ $course->course_code }}

                        </p>


                        {{-- Department --}}
                        <p>

                            <strong>Department:</strong>

                            {{ $course->department->name ?? 'N/A' }}

                        </p>


                        {{-- Duration --}}
                        <p>

                            <strong>Duration:</strong>

                            {{ $course->duration }}

                        </p>


                        {{-- Total Semesters --}}
                        <p>

                            <strong>Total Semesters:</strong>

                            {{ $course->total_semesters }}

                        </p>


                        {{-- Fees --}}
                        <p>

                            <strong>Fees:</strong>

                            ₹{{ number_format($course->fees) }}

                        </p>


                        {{-- Description --}}
                        <div class="mt-4">

                            <h4 class="fw-bold">
                                Description
                            </h4>

                            <p class="text-muted">

                                {{ $course->description ?? 'No description available.' }}

                            </p>

                        </div>


                        {{-- Status --}}
                        <p class="mt-3">

                            <strong>Status:</strong>

                            @if($course->status)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            @endif

                        </p>


                        {{-- Back Button --}}
                        <a href="{{ url('/') }}"
                           class="btn btn-secondary mt-3">

                            ← Back to Home

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
