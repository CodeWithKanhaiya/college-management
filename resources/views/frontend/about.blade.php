@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')

<!-- =====================================================
     1. ABOUT HERO
===================================================== -->

<section class="about-hero position-relative">

    <div class="container">

        <div class="row justify-content-center text-center">

            <div class="col-12 col-md-10 col-lg-8">

                <h1 class="display-4 fw-bold text-white mb-3">
                    About Our College
                </h1>

                <p class="lead text-white mb-4">
                    Empowering students through quality education,
                    practical learning, innovation and professional
                    development.
                </p>

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb justify-content-center mb-0">

                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"
                               class="text-white text-decoration-none">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active text-white">
                            About
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     2. ABOUT COLLEGE
===================================================== -->

<section class="py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-12 col-lg-6">

                <img src="{{ asset('images/collageimage.webp') }}"
                     class="img-fluid rounded shadow"
                     alt="College">

            </div>


            <div class="col-12 col-lg-6">

                <span class="text-primary fw-bold">
                    ABOUT OUR COLLEGE
                </span>

                <h2 class="fw-bold mt-2 mb-3">
                    Welcome To Our College
                </h2>

                <p class="text-muted">
                    Our college is committed to providing quality
                    education and creating an environment where
                    students can develop academic knowledge,
                    practical skills and professional abilities.
                </p>

                <p class="text-muted">
                    We provide experienced faculty, modern
                    laboratories, library facilities, smart
                    classrooms, sports facilities and career
                    development opportunities.
                </p>

                <div class="row mt-4">

                    <div class="col-12 col-sm-6 mb-3">

                        <strong>
                            Established
                        </strong>

                        <br>

                        <span class="text-muted">
                            2005
                        </span>

                    </div>


                    <div class="col-12 col-sm-6 mb-3">

                        <strong>
                            Affiliation
                        </strong>

                        <br>

                        <span class="text-muted">
                            University / Board
                        </span>

                    </div>

                </div>


                <a href="{{ route('contact') }}"
                   class="btn btn-primary mt-2">

                    Contact Us

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     3. DYNAMIC STATISTICS
===================================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="row text-center g-4">


            <!-- STUDENTS -->

            <div class="col-6 col-md-3">

                <div class="card border-0 shadow-sm p-4 h-100">

                    <h2 class="fw-bold text-primary">

                        {{ $studentsCount }}+

                    </h2>

                    <p class="mb-0">
                        Students
                    </p>

                </div>

            </div>


            <!-- TEACHERS -->

            <div class="col-6 col-md-3">

                <div class="card border-0 shadow-sm p-4 h-100">

                    <h2 class="fw-bold text-primary">

                        {{ $teachersCount }}+

                    </h2>

                    <p class="mb-0">
                        Teachers
                    </p>

                </div>

            </div>


            <!-- COURSES -->

            <div class="col-6 col-md-3">

                <div class="card border-0 shadow-sm p-4 h-100">

                    <h2 class="fw-bold text-primary">

                        {{ $coursesCount }}+

                    </h2>

                    <p class="mb-0">
                        Courses
                    </p>

                </div>

            </div>


            <!-- DEPARTMENTS -->

            <div class="col-6 col-md-3">

                <div class="card border-0 shadow-sm p-4 h-100">

                    <h2 class="fw-bold text-primary">

                        {{ $departmentsCount }}+

                    </h2>

                    <p class="mb-0">
                        Departments
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     4. MISSION & VISION
===================================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-bold">
                OUR PURPOSE
            </span>

            <h2 class="fw-bold">
                Mission & Vision
            </h2>

        </div>


        <div class="row g-4">


            <div class="col-12 col-md-6">

                <div class="card border-0 shadow-sm h-100 p-4">

                    <div class="mb-3">

                        <i class="bi bi-bullseye fs-1 text-primary"></i>

                    </div>

                    <h3 class="fw-bold">
                        Our Mission
                    </h3>

                    <p class="text-muted mb-0">

                        To provide quality education and develop
                        knowledgeable, skilled and responsible
                        students who can contribute positively
                        to society.

                    </p>

                </div>

            </div>


            <div class="col-12 col-md-6">

                <div class="card border-0 shadow-sm h-100 p-4">

                    <div class="mb-3">

                        <i class="bi bi-eye fs-1 text-primary"></i>

                    </div>

                    <h3 class="fw-bold">
                        Our Vision
                    </h3>

                    <p class="text-muted mb-0">

                        To become a center of academic excellence
                        and create opportunities for students to
                        achieve their educational and professional
                        goals.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     5. WHY CHOOSE US
===================================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-bold">
                WHY US
            </span>

            <h2 class="fw-bold">
                Why Choose Our College?
            </h2>

        </div>


        @php

            $features = [

                [
                    'icon' => 'bi-person-check',
                    'title' => 'Experienced Faculty'
                ],

                [
                    'icon' => 'bi-pc-display',
                    'title' => 'Modern Laboratories'
                ],

                [
                    'icon' => 'bi-book',
                    'title' => 'Digital Library'
                ],

                [
                    'icon' => 'bi-display',
                    'title' => 'Smart Classrooms'
                ],

                [
                    'icon' => 'bi-trophy',
                    'title' => 'Sports Facilities'
                ],

                [
                    'icon' => 'bi-briefcase',
                    'title' => 'Placement Support'
                ],

                [
                    'icon' => 'bi-lightbulb',
                    'title' => 'Practical Learning'
                ],

                [
                    'icon' => 'bi-graph-up',
                    'title' => 'Career Guidance'
                ]

            ];

        @endphp


        <div class="row g-4">

            @foreach($features as $feature)

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="card border-0 shadow-sm
                                text-center h-100 p-4">

                        <i class="bi {{ $feature['icon'] }}
                                  fs-1 text-primary mb-3"></i>

                        <h5 class="fw-bold mb-0">

                            {{ $feature['title'] }}

                        </h5>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- =====================================================
     6. DYNAMIC DEPARTMENTS
===================================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-bold">
                ACADEMICS
            </span>

            <h2 class="fw-bold">
                Our Departments
            </h2>

        </div>


        <div class="row g-4">

            @forelse($departments as $department)

                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="card border-0 shadow-sm
                                h-100 p-4">

                        <div class="mb-3">

                            <i class="bi bi-building
                                      fs-1 text-primary"></i>

                        </div>

                        <h5 class="fw-bold">

                            {{ $department->department_name }}

                        </h5>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <p class="text-muted">
                        No departments available.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- =====================================================
     7. DYNAMIC COURSES
===================================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-bold">
                PROGRAMS
            </span>

            <h2 class="fw-bold">
                Our Courses
            </h2>

        </div>


        <div class="row g-4">

            @forelse($courses as $course)

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">

                    <div class="card border-0 shadow-sm
                                h-100">

                        <div class="card-body">

                            <div class="mb-3">

                                <i class="bi bi-mortarboard
                                          fs-1 text-primary"></i>

                            </div>

                            <h5 class="fw-bold">

                                {{ $course->course_name }}

                            </h5>


                            @if($course->course_code)

                                <p class="text-muted mb-0">

                                    Code:
                                    {{ $course->course_code }}

                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <p class="text-muted">
                        No courses available.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- =====================================================
     8. DYNAMIC FACULTY
===================================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-bold">
                OUR TEAM
            </span>

            <h2 class="fw-bold">
                Experienced Faculty
            </h2>

        </div>


        <div class="row g-4">

            @forelse($teachers as $teacher)

                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="card border-0 shadow-sm
                                text-center h-100">


                        @if($teacher->photo)

                            <img src="{{ asset('storage/' . $teacher->photo) }}"
                                 class="card-img-top"
                                 height="260"
                                 style="object-fit: cover;"
                                 alt="Teacher">

                        @else

                            <div class="bg-light d-flex
                                        align-items-center
                                        justify-content-center"
                                 style="height:260px;">

                                <i class="bi bi-person-circle
                                          fs-1 text-secondary"></i>

                            </div>

                        @endif


                        <div class="card-body">

                            <h5 class="fw-bold">

                                {{ $teacher->name }}

                            </h5>


                            {{-- @if($teacher->designation)

                                <p class="text-primary mb-1">

                                    {{ $teacher->designation }}

                                </p>

                            @endif --}}


                            @if($teacher->qualification)

                                <small class="text-muted">

                                    {{ $teacher->qualification }}

                                </small>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <p class="text-muted">
                        No faculty members available.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- =====================================================
     9. ACADEMIC INFORMATION
===================================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-bold">
                ACADEMIC ACTIVITIES
            </span>

            <h2 class="fw-bold">
                Our Academic Environment
            </h2>

        </div>


        <div class="row g-4">


            <div class="col-6 col-md-3">

                <div class="card border-0 shadow-sm
                            text-center p-4 h-100">

                    <i class="bi bi-journal-bookmark
                              fs-1 text-primary"></i>

                    <h3 class="fw-bold mt-3">

                        {{ $subjectsCount }}

                    </h3>

                    <p class="text-muted mb-0">
                        Subjects
                    </p>

                </div>

            </div>


            <div class="col-6 col-md-3">

                <div class="card border-0 shadow-sm
                            text-center p-4 h-100">

                    <i class="bi bi-calendar-check
                              fs-1 text-primary"></i>

                    <h3 class="fw-bold mt-3">

                        {{ $attendanceCount }}

                    </h3>

                    <p class="text-muted mb-0">
                        Attendance Records
                    </p>

                </div>

            </div>


            <div class="col-6 col-md-3">

                <div class="card border-0 shadow-sm
                            text-center p-4 h-100">

                    <i class="bi bi-pencil-square
                              fs-1 text-primary"></i>

                    <h3 class="fw-bold mt-3">

                        {{ $examsCount }}

                    </h3>

                    <p class="text-muted mb-0">
                        Examinations
                    </p>

                </div>

            </div>


            <div class="col-6 col-md-3">

                <div class="card border-0 shadow-sm
                            text-center p-4 h-100">

                    <i class="bi bi-award
                              fs-1 text-primary"></i>

                    <h3 class="fw-bold mt-3">

                        {{ $resultsCount }}

                    </h3>

                    <p class="text-muted mb-0">
                        Results
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     10. CAMPUS & FACILITIES
===================================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-bold">
                CAMPUS
            </span>

            <h2 class="fw-bold">
                Campus & Facilities
            </h2>

        </div>


        @php

            $facilities = [

                [
                    'icon' => 'bi-pc-display',
                    'name' => 'Modern Computer Labs',
                    'description' =>
                    'Well-equipped computer laboratories for practical learning.'
                ],

                [
                    'icon' => 'bi-book-half',
                    'name' => 'Library',
                    'description' =>
                    'A learning space with books, study materials and resources.'
                ],

                [
                    'icon' => 'bi-building',
                    'name' => 'Smart Classrooms',
                    'description' =>
                    'Modern classrooms designed for interactive learning.'
                ],

                [
                    'icon' => 'bi-trophy',
                    'name' => 'Sports Facilities',
                    'description' =>
                    'Facilities for sports and extracurricular activities.'
                ],

                [
                    'icon' => 'bi-wifi',
                    'name' => 'Campus Internet',
                    'description' =>
                    'Internet connectivity for academic and learning activities.'
                ],

                [
                    'icon' => 'bi-people',
                    'name' => 'Student Activities',
                    'description' =>
                    'Various activities for student development and engagement.'
                ]

            ];

        @endphp


        <div class="row g-4">

            @foreach($facilities as $facility)

                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="card border-0 shadow-sm
                                h-100 p-4">

                        <i class="bi {{ $facility['icon'] }}
                                  fs-1 text-primary mb-3"></i>

                        <h5 class="fw-bold">

                            {{ $facility['name'] }}

                        </h5>

                        <p class="text-muted mb-0">

                            {{ $facility['description'] }}

                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- =====================================================
     11. CALL TO ACTION
===================================================== -->

<section class="py-5 bg-primary text-white">

    <div class="container text-center">

        <h2 class="fw-bold">
            Start Your Journey With Us
        </h2>

        <p class="lead">

            Build your future with quality education,
            modern facilities and experienced faculty.

        </p>


        <a href="{{ route('apply') }}"
           class="btn btn-light text-primary fw-semibold me-2">

            Apply Now

        </a>


        <a href="{{ route('contact') }}"
           class="btn btn-outline-light">

            Contact Us

        </a>

    </div>

</section>


<!-- =====================================================
     12. CONTACT INFORMATION
===================================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-bold">
                CONTACT
            </span>

            <h2 class="fw-bold">
                Get In Touch
            </h2>

        </div>


        <div class="row g-4 text-center">


            <div class="col-12 col-md-4">

                <div class="card border-0 shadow-sm
                            p-4 h-100">

                    <i class="bi bi-geo-alt
                              fs-1 text-primary mb-3"></i>

                    <h5 class="fw-bold">
                        Address
                    </h5>

                    <p class="text-muted mb-0">

                        College Campus,
                        Uttar Pradesh, India

                    </p>

                </div>

            </div>


            <div class="col-12 col-md-4">

                <div class="card border-0 shadow-sm
                            p-4 h-100">

                    <i class="bi bi-telephone
                              fs-1 text-primary mb-3"></i>

                    <h5 class="fw-bold">
                        Phone
                    </h5>

                    <p class="text-muted mb-0">

                        +91 XXXXX XXXXX

                    </p>

                </div>

            </div>


            <div class="col-12 col-md-4">

                <div class="card border-0 shadow-sm
                            p-4 h-100">

                    <i class="bi bi-envelope
                              fs-1 text-primary mb-3"></i>

                    <h5 class="fw-bold">
                        Email
                    </h5>

                    <p class="text-muted mb-0">

                        info@college.com

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection