@extends('layouts.frontend')

@section('title', 'Our Teachers')

@section('content')

{{-- =========================================================
     TEACHERS HERO
========================================================= --}}

<section class="teachers-hero">

    <div class="container">

        <div class="text-center text-white">

            <span class="badge bg-primary px-3 py-2 mb-3">
                Our Faculty
            </span>

            <h1 class="display-4 fw-bold">
                Meet Our Teachers
            </h1>

            <p class="lead mt-3 mb-0">
                Meet our experienced and dedicated faculty members
                who are committed to student success.
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
     TEACHERS SECTION
========================================================= --}}

<section class="py-5">

    <div class="container">

        {{-- Section Heading --}}

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                Academic Faculty
            </span>

            <h2 class="fw-bold mt-2">
                Our Experienced Teachers
            </h2>

            <p class="text-muted mx-auto" style="max-width: 700px;">
                Our faculty members provide quality education,
                practical knowledge and continuous guidance
                to help students achieve their goals.
            </p>

        </div>


        {{-- Teachers --}}

        <div class="row g-4">

            @forelse($teachers as $teacher)

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                    <div class="card teacher-card h-100 border-0 shadow-sm">

                        {{-- =========================
                             TEACHER IMAGE
                        ========================= --}}

                        <div class="teacher-image">

                            @if($teacher->photo)

                                <img
                                    src="{{ asset('storage/' . $teacher->photo) }}"
                                    alt="{{ $teacher->user?->name ?? 'Teacher' }}"
                                    class="img-fluid"
                                >

                            @else

                                <div class="teacher-placeholder">

                                    <i class="bi bi-person-fill"></i>

                                </div>

                            @endif

                        </div>


                        {{-- =========================
                             TEACHER DETAILS
                        ========================= --}}

                        <div class="card-body text-center p-4">

                            {{-- Name --}}

                            <h4 class="fw-bold mb-2">

                                {{ $teacher->user?->name ?? 'Teacher' }}

                            </h4>


                            {{-- Designation --}}

                            @if($teacher->designation)

                                <p class="text-primary fw-semibold mb-3">

                                    {{ $teacher->designation }}

                                </p>

                            @endif


                            {{-- Department --}}

                            @if($teacher->department)

                                <div class="teacher-info">

                                    <i class="bi bi-building"></i>

                                    <span>
                                        {{ $teacher->department->department_name }}
                                    </span>

                                </div>

                            @endif


                            {{-- Qualification --}}

                            @if($teacher->qualification)

                                <div class="teacher-info">

                                    <i class="bi bi-mortarboard"></i>

                                    <span>
                                        {{ $teacher->qualification }}
                                    </span>

                                </div>

                            @endif


                            {{-- Employee ID --}}

                            @if($teacher->employee_id)

                                <div class="teacher-info">

                                    <i class="bi bi-person-badge"></i>

                                    <span>
                                        {{ $teacher->employee_id }}
                                    </span>

                                </div>

                            @endif


                            {{-- Phone --}}

                            @if($teacher->phone)

                                <div class="teacher-info">

                                    <i class="bi bi-telephone"></i>

                                    <span>
                                        {{ $teacher->phone }}
                                    </span>

                                </div>

                            @endif


                            {{-- Joining Date --}}

                            @if($teacher->joining_date)

                                <div class="teacher-info">

                                    <i class="bi bi-calendar"></i>

                                    <span>
                                        Joined:
                                        {{ \Carbon\Carbon::parse($teacher->joining_date)->format('d M Y') }}
                                    </span>

                                </div>

                            @endif


                            {{-- View Profile --}}

                            <div class="mt-4">

                                <a href="#"
                                   class="btn btn-outline-primary">

                                    View Profile

                                    <i class="bi bi-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


            @empty

                {{-- No Teachers --}}

                <div class="col-12">

                    <div class="text-center py-5">

                        <div class="mb-3">

                            <i class="bi bi-people display-1 text-muted"></i>

                        </div>

                        <h4 class="fw-bold">
                            No Teachers Available
                        </h4>

                        <p class="text-muted">
                            Teacher information will be available soon.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     FACULTY FEATURES
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                Why Our Faculty
            </span>

            <h2 class="fw-bold mt-2">
                Quality Teaching & Guidance
            </h2>

        </div>


        <div class="row g-4">

            {{-- Experienced Faculty --}}

            <div class="col-lg-4 col-md-6">

                <div class="text-center p-4">

                    <div class="feature-icon-circle mx-auto mb-3">

                        <i class="bi bi-person-check"></i>

                    </div>

                    <h5 class="fw-bold">
                        Experienced Faculty
                    </h5>

                    <p class="text-muted mb-0">
                        Learn from experienced teachers with
                        strong academic backgrounds.
                    </p>

                </div>

            </div>


            {{-- Practical Learning --}}

            <div class="col-lg-4 col-md-6">

                <div class="text-center p-4">

                    <div class="feature-icon-circle mx-auto mb-3">

                        <i class="bi bi-lightbulb"></i>

                    </div>

                    <h5 class="fw-bold">
                        Practical Learning
                    </h5>

                    <p class="text-muted mb-0">
                        Students receive practical knowledge
                        along with classroom learning.
                    </p>

                </div>

            </div>


            {{-- Student Support --}}

            <div class="col-lg-4 col-md-6">

                <div class="text-center p-4">

                    <div class="feature-icon-circle mx-auto mb-3">

                        <i class="bi bi-heart"></i>

                    </div>

                    <h5 class="fw-bold">
                        Student Support
                    </h5>

                    <p class="text-muted mb-0">
                        Our teachers provide continuous guidance
                        and academic support.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     CTA
========================================================= --}}

<section class="py-5 bg-primary text-white">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8 text-center text-lg-start">

                <h2 class="fw-bold mb-2">
                    Start Your Academic Journey
                </h2>

                <p class="lead mb-0">
                    Explore our courses and apply for admission today.
                </p>

            </div>


            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">

                <a href="{{ route('apply') }}"
                   class="btn btn-light btn-lg">

                    Apply Now

                    <i class="bi bi-arrow-right ms-1"></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection