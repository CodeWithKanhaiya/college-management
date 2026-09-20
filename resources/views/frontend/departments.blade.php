@extends('layouts.frontend')

@section('title', 'Departments')

@section('content')

{{-- =========================
     DEPARTMENT HERO
========================= --}}

<section class="departments-hero">
    <div class="container">
        <div class="text-center text-white">

            <h1 class="display-4 fw-bold">
                Our Departments
            </h1>

            <p class="lead mt-3">
                Explore our academic departments and discover
                quality education opportunities.
            </p>

        </div>
    </div>
</section>


{{-- =========================
     DEPARTMENTS
========================= --}}

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                Academic Departments
            </span>

            <h2 class="fw-bold mt-2">
                Explore Our Departments
            </h2>

            <p class="text-muted">
                Choose a department and explore the courses
                available for students.
            </p>

        </div>


        <div class="row g-4">

            @forelse($departments as $department)

                <div class="col-lg-4 col-md-6 col-sm-12">

                    <div class="card department-card h-100 border-0 shadow-sm">

                        <div class="card-body text-center p-4">

                            {{-- Icon --}}
                            <div class="department-icon mx-auto mb-4">

                                <i class="bi bi-building"></i>

                            </div>


                            {{-- Department Name --}}
                            <h4 class="fw-bold mb-3">

                                {{ $department->department_name }}

                            </h4>


                            {{-- Description --}}
                            @if($department->description)

                                <p class="text-muted">

                                    {{ $department->description }}

                                </p>

                            @else

                                <p class="text-muted">

                                    Explore courses and academic
                                    opportunities in this department.

                                </p>

                            @endif


                            {{-- View Courses --}}
         <a href="{{ route('courses') }}"
                 class="btn btn-outline-primary mt-3">
                View Courses
             <i class="bi bi-arrow-right ms-1"></i>
</a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        No departments available at the moment.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================
     CTA
========================= --}}

<section class="py-5 bg-primary text-white">

    <div class="container text-center">

        <h2 class="fw-bold">
            Find Your Right Department
        </h2>

        <p class="lead mt-3">
            Explore our departments and start your academic journey.
        </p>

        <a href="{{ route('apply') }}"
           class="btn btn-light btn-lg mt-3">

            Apply Now

        </a>

    </div>

</section>

@endsection