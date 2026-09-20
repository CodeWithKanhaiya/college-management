@extends('layouts.admin')

@section('title', 'Testimonial Details')

@section('content')

<div class="container-fluid py-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <h2 class="fw-bold mb-4">
                Testimonial Details
            </h2>

            <h5 class="fw-bold">
                Student Name
            </h5>

            <p>
                {{ $testimonial->student_name }}
            </p>

            <h5 class="fw-bold">
                Course
            </h5>

            <p>
                {{ $testimonial->course }}
            </p>

            <h5 class="fw-bold">
                Feedback
            </h5>

            <p class="text-muted">
                {{ $testimonial->feedback }}
            </p>

            <h5 class="fw-bold">
                Status
            </h5>

            @if($testimonial->status)

                <span class="badge bg-success">
                    Active
                </span>

            @else

                <span class="badge bg-danger">
                    Inactive
                </span>

            @endif

            <div class="mt-4">

                <a href="{{ route(
                    'admin.testimonials.edit',
                    $testimonial->id
                ) }}"
                   class="btn btn-warning">

                    Edit

                </a>

                <a href="{{ route(
                    'admin.testimonials.index'
                ) }}"
                   class="btn btn-secondary">

                    ← Back

                </a>

            </div>

        </div>

    </div>

</div>

@endsection