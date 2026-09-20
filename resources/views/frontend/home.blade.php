
@extends('layouts.frontend')

@section('title', 'Home')

@section('content')


{{-- Hero Section --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="row align-items-center min-vh-75">

            <div class="col-12 col-lg-6">

                <h1 class="display-4 fw-bold">
                    College Management System
                </h1>

                <p class="lead text-muted">
                    Quality education, practical knowledge
                    and better career opportunities.
                </p>

                <a href="{{ url('/contact') }}"
                   class="btn btn-primary">
                    Apply Now
                </a>

                <a href="{{ url('/courses') }}"
                   class="btn btn-outline-primary">
                    Explore Courses
                </a>

            </div>

            <div class="col-12 col-lg-6 text-center">

                <img src="{{ asset('images/collageimage.webp') }}"
                     alt="College Campus"
                     class="img-fluid rounded shadow">

            </div>

        </div>

    </div>

</section>


    
{{-- About College Section --}}

<section class="py-5 bg-light">

    <div class="container">

        {{-- Section Heading --}}
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                About Our College
            </h2>

            <p class="text-muted">
                Building knowledge, skills and a better future.
            </p>

        </div>


        <div class="row align-items-center">

            {{-- College Introduction --}}
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">

                <h3 class="fw-bold mb-3">
                    College Introduction
                </h3>

                <p class="text-muted">

                    Our college is committed to providing quality
                    education and creating a positive learning
                    environment for students.

                </p>

                <p class="text-muted">

                    We provide modern facilities, experienced teachers,
                    practical learning opportunities and various
                    extracurricular activities to help students
                    achieve their academic and career goals.

                </p>

            </div>


            {{-- Mission & Vision --}}
            <div class="col-12 col-lg-6">

                {{-- Mission --}}
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body p-4">

                        <h4 class="fw-bold">
                            🎯 Our Mission
                        </h4>

                        <p class="text-muted mb-0">

                            Our mission is to provide affordable and
                            quality education, develop students'
                            technical and professional skills, and
                            prepare them for successful careers.

                        </p>

                    </div>

                </div>


                {{-- Vision --}}
                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">

                        <h4 class="fw-bold">
                            👁️ Our Vision
                        </h4>

                        <p class="text-muted mb-0">

                            Our vision is to become a leading educational
                            institution that inspires innovation,
                            excellence, discipline and lifelong learning.

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- Short Description --}}
        <div class="row mt-5">

            <div class="col-12">

                <div class="text-center">

                    <h4 class="fw-bold mb-3">
                        Education for a Better Future
                    </h4>

                    <p class="text-muted mx-auto"
                       style="max-width: 800px;">

                        We believe that education is the foundation
                        of personal growth and social development.
                        Our college focuses on academic excellence,
                        practical knowledge, character development
                        and career opportunities for every student.

                    </p>

                    <a href="{{ url('/about') }}"
                       class="btn btn-primary">

                        Read More

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- Statistics Section --}}

<section class="py-5 bg-primary text-white">

    <div class="container">

        <div class="row text-center g-4">

            {{-- Students --}}
            <div class="col-6 col-md-3">

                <div class="p-3">

                    <h2 class="display-5 fw-bold">
                        500+
                    </h2>

                    <p class="mb-0 fs-5">
                        Students
                    </p>

                </div>

            </div>


            {{-- Teachers --}}
            <div class="col-6 col-md-3">

                <div class="p-3">

                    <h2 class="display-5 fw-bold">
                        50+
                    </h2>

                    <p class="mb-0 fs-5">
                        Teachers
                    </p>

                </div>

            </div>


            {{-- Courses --}}
            <div class="col-6 col-md-3">

                <div class="p-3">

                    <h2 class="display-5 fw-bold">
                        20+
                    </h2>

                    <p class="mb-0 fs-5">
                        Courses
                    </p>

                </div>

            </div>


            {{-- Departments --}}
            <div class="col-6 col-md-3">

                <div class="p-3">

                    <h2 class="display-5 fw-bold">
                        10+
                    </h2>

                    <p class="mb-0 fs-5">
                        Departments
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- Departments Section --}}

<section class="py-5">

    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Our Departments
            </h2>

            <p class="text-muted">
                Explore our academic departments
            </p>

        </div>


        <div class="row g-4">

            @forelse($departments as $department)

                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body text-center p-4">

                            {{-- Icon --}}
                            <div class="fs-1 mb-3">
                                🏢
                            </div>


                            {{-- Department Name --}}
                            <h4 class="fw-bold">

                                {{ $department->name }}

                            </h4>


                            {{-- Description --}}
                            <p class="text-muted">

                                {{ $department->description
                                    ?? 'Explore our academic department and courses.' }}

                            </p>


                            {{-- View Department --}}
                            <a href="{{ url('/departments/' . $department->id) }}"
                               class="btn btn-outline-primary">

                                View Department

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        No departments available.

                    </div>

                </div>

            @endforelse


            {{-- View All --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body d-flex
                                flex-column
                                justify-content-center
                                align-items-center
                                p-4">

                        <h4 class="fw-bold mb-3">

                            Explore All Departments

                        </h4>

                        <a href="{{ url('/departments') }}"
                           class="btn btn-primary">

                            View All Departments

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- Popular Courses Section --}}

<section class="py-5 bg-light">

    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Popular Courses
            </h2>

            <p class="text-muted">
                Explore our popular academic courses
            </p>

        </div>


        <div class="row g-4">

            @forelse($courses as $course)

                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body p-4">

                            {{-- Course Name --}}
                            <h4 class="fw-bold mb-3">

                                {{ $course->course_name }}

                            </h4>


                            {{-- Duration --}}
                            <p class="mb-2">

                                <strong>
                                    Duration:
                                </strong>

                                {{ $course->duration }}

                            </p>


                            {{-- Fees --}}
                            <p class="mb-3">

                                <strong>
                                    Fees:
                                </strong>

                                ₹{{ number_format($course->fees) }}

                            </p>


                            {{-- View Details --}}
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


        {{-- View All Courses --}}
        <div class="text-center mt-4">

            <a href="{{ route('courses') }}"
             class="btn btn-outline-primary">

                 View All Courses

            </a>

        </div>
    </div>

</section>

{{-- Why Choose Us Section --}}

<section class="py-5 bg-light">

    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Why Choose Us
            </h2>

            <p class="text-muted">
                We provide quality education and better facilities
                for our students.
            </p>

        </div>


        <div class="row g-4">

            {{-- Experienced Teachers --}}
            <div class="col-12 col-sm-6 col-lg-3">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body text-center p-4">

                        <div class="display-5 mb-3">
                            👨‍🏫
                        </div>

                        <h5 class="fw-bold">
                            Experienced Teachers
                        </h5>

                        <p class="text-muted mb-0">
                            Learn from experienced and
                            qualified teachers.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Modern Labs --}}
            <div class="col-12 col-sm-6 col-lg-3">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body text-center p-4">

                        <div class="display-5 mb-3">
                            💻
                        </div>

                        <h5 class="fw-bold">
                            Modern Labs
                        </h5>

                        <p class="text-muted mb-0">
                            Practical learning with
                            modern laboratory facilities.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Library --}}
            <div class="col-12 col-sm-6 col-lg-3">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body text-center p-4">

                        <div class="display-5 mb-3">
                            📚
                        </div>

                        <h5 class="fw-bold">
                            Library
                        </h5>

                        <p class="text-muted mb-0">
                            Access books and useful
                            study resources.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Sports --}}
            <div class="col-12 col-sm-6 col-lg-3">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body text-center p-4">

                        <div class="display-5 mb-3">
                            🏆
                        </div>

                        <h5 class="fw-bold">
                            Sports
                        </h5>

                        <p class="text-muted mb-0">
                            Develop your skills through
                            sports and activities.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Placement Support --}}
            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center p-4">

                        <div class="display-5 mb-3">
                            💼
                        </div>

                        <h4 class="fw-bold">
                            Placement Support
                        </h4>

                        <p class="text-muted mb-0">
                            Get career guidance and placement
                            support for better opportunities.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- Teachers Section --}}

<section class="py-5">

    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Our Teachers
            </h2>

            <p class="text-muted">
                Meet our experienced and dedicated faculty members
            </p>

        </div>


        <div class="row g-4">

            @forelse($teachers as $teacher)

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="card h-100 border-0 shadow-sm">

                        {{-- Teacher Photo --}}
                        @if($teacher->photo)

                            <img src="{{ asset('storage/' . $teacher->photo) }}"
                                 class="card-img-top"
                                 alt="{{ $teacher->name }}"
                                 style="height: 220px; object-fit: cover;">

                        @else

                            <div class="d-flex align-items-center
                                        justify-content-center
                                        bg-light"
                                 style="height: 220px;">

                                <span class="display-3">
                                    👨‍🏫
                                </span>

                            </div>

                        @endif


                        <div class="card-body text-center">

                            {{-- Teacher Name --}}
                            <h5 class="fw-bold">

                                {{ $teacher->name }}

                            </h5>


                            {{-- Designation --}}
                            <p class="text-primary mb-1">

                                {{ $teacher->designation }}

                            </p>


                            {{-- Department --}}
                            <p class="text-muted mb-0">

                                {{ $teacher->department->name ?? 'N/A' }}

                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        No teachers available.

                    </div>

                </div>

            @endforelse

        </div>


        {{-- View All Teachers --}}
        <div class="text-center mt-5">

            <a href="{{ route('admin.teachers.index') }}"
               class="btn btn-primary">

                View All Teachers

            </a>

        </div>

    </div>

</section>

{{-- Latest Notices Section --}}

<section class="py-5 bg-light">

    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Latest Notices
            </h2>

            <p class="text-muted">
                Stay updated with the latest college announcements
            </p>

        </div>


        <div class="row g-4">

            @forelse($notices as $notice)

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body p-4">

                            {{-- Notice Title --}}
                            <h5 class="fw-bold mb-3">
                                {{ $notice->title }}
                            </h5>


                            {{-- Publish Date --}}
                            <p class="text-muted mb-3">

                                📅 Published:
                                {{ optional($notice->publish_date)->format('d M Y') }}

                            </p>


                            {{-- Description --}}
                            <p class="text-muted">

                                {{ Str::limit($notice->description, 100) }}

                            </p>


                            {{-- Read More --}}
                            <a href="{{ route('notices.show', $notice->id) }}"
                               class="btn btn-outline-primary">

                                Read More →

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        No notices available.

                    </div>

                </div>

            @endforelse

        </div>


        {{-- View All Notices --}}
        <div class="text-center mt-4">

            <a href="{{ route('notices') }}"
               class="btn btn-primary">

                View All Notices

            </a>

        </div>

    </div>

</section>
{{-- Upcoming Events Section --}}

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Upcoming Events
            </h2>

            <p class="text-muted">
                Join us in our upcoming college events
            </p>

        </div>


        <div class="row g-4">

            @forelse($events as $event)

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body p-4">

                            {{-- Event Name --}}
                            <h5 class="fw-bold mb-3">
                                {{ $event->title }}
                            </h5>


                            {{-- Date --}}
                            <p class="mb-2">
                                📅
                                <strong>Date:</strong>

                                {{ optional($event->event_date)->format('d M Y') }}
                            </p>


                            {{-- Time --}}
                            <p class="mb-2">
                                🕐
                                <strong>Time:</strong>

                                {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}

                                -

                                {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                            </p>


                            {{-- Location --}}
                            <p class="mb-0 text-muted">
                                📍
                                <strong>Location:</strong>

                                {{ $event->location }}
                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">
                        No upcoming events available.
                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>
{{-- Campus / Facilities Section --}}

<section class="py-5 bg-light">

    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Campus & Facilities
            </h2>

            <p class="text-muted">
                Explore our modern campus facilities
            </p>

        </div>


        <div class="row g-4">

            {{-- Library --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm text-center">

                    <div class="card-body p-4">

                        <div class="display-4 mb-3">
                            📚
                        </div>

                        <h4 class="fw-bold">
                            Library
                        </h4>

                        <p class="text-muted mb-0">
                            A well-equipped library with books,
                            journals and digital learning resources.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Computer Lab --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm text-center">

                    <div class="card-body p-4">

                        <div class="display-4 mb-3">
                            💻
                        </div>

                        <h4 class="fw-bold">
                            Computer Lab
                        </h4>

                        <p class="text-muted mb-0">
                            Modern computers and high-speed internet
                            for practical learning and projects.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Laboratory --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm text-center">

                    <div class="card-body p-4">

                        <div class="display-4 mb-3">
                            🧪
                        </div>

                        <h4 class="fw-bold">
                            Laboratory
                        </h4>

                        <p class="text-muted mb-0">
                            Well-equipped laboratories for practical
                            experiments and technical education.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Auditorium --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm text-center">

                    <div class="card-body p-4">

                        <div class="display-4 mb-3">
                            🏛️
                        </div>

                        <h4 class="fw-bold">
                            Auditorium
                        </h4>

                        <p class="text-muted mb-0">
                            Spacious auditorium for seminars,
                            cultural programs and college events.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Sports Ground --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm text-center">

                    <div class="card-body p-4">

                        <div class="display-4 mb-3">
                            🏟️
                        </div>

                        <h4 class="fw-bold">
                            Sports Ground
                        </h4>

                        <p class="text-muted mb-0">
                            Spacious sports facilities for cricket,
                            football, athletics and other activities.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Campus --}}
            <div class="col-12 col-sm-6 col-lg-4">

                <div class="card h-100 border-0 shadow-sm text-center">

                    <div class="card-body p-4">

                        <div class="display-4 mb-3">
                            🏫
                        </div>

                        <h4 class="fw-bold">
                            Modern Campus
                        </h4>

                        <p class="text-muted mb-0">
                            A safe, clean and student-friendly campus
                            designed for academic growth.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Student Testimonials
            </h2>

            <p class="text-muted">
                What our students say about us
            </p>
        </div>

        <div class="row g-4">

            @forelse($testimonials as $testimonial)

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body p-4 text-center">

                            <div class="display-5 mb-3">
                                🎓
                            </div>

                            <h5 class="fw-bold">
                                {{ $testimonial->student_name }}
                            </h5>

                            <p class="text-primary mb-3">
                                {{ $testimonial->course }}
                            </p>

                            <p class="text-muted">
                                "{{ $testimonial->feedback }}"
                            </p>

                            <div class="text-warning">
                                ★★★★★
                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No testimonials available.
                    </div>
                </div>

            @endforelse

        </div>

    </div>

</section>
{{-- Call To Action Section --}}

<section class="py-5 bg-primary text-white">


<div class="container">

    <div class="text-center">

        <h2 class="fw-bold mb-3">
            Start Your Journey With Us
        </h2>

        <p class="lead mb-4">
            Build your future with quality education,
            experienced teachers and modern facilities.
        </p>


        {{-- Buttons --}}
        <div class="d-flex justify-content-center gap-3 flex-wrap">

            {{-- Apply Now --}}
            <a href="{{ url('/apply') }}"
               class="btn btn-light btn-lg px-4">
                Apply Now
            </a>


            {{-- Contact Us --}}
            <a href="{{ url('/contact') }}"
               class="btn btn-outline-light btn-lg px-4">
                Contact Us
            </a>

        </div>

    </div>

</div>


</section>

{{-- ========================================================= --}}
{{-- Contact Section --}}
{{-- ========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        {{-- Section Heading --}}

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Contact Us
            </h2>

            <p class="text-muted">
                We would love to hear from you.
            </p>

        </div>


        <div class="row g-4">


            {{-- Contact Information --}}

            <div class="col-12 col-lg-5">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">
                            College Information
                        </h4>


                        {{-- Address --}}

                        <div class="d-flex mb-4">

                            <div class="me-3 fs-4">
                                📍
                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    College Address
                                </h6>

                                <p class="text-muted mb-0">

                                    College Campus,<br>
                                    Lucknow,<br>
                                    Uttar Pradesh, India

                                </p>

                            </div>

                        </div>


                        {{-- Phone --}}

                        <div class="d-flex mb-4">

                            <div class="me-3 fs-4">
                                📞
                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    Phone
                                </h6>

                                <p class="text-muted mb-0">

                                    +91 9876543210

                                </p>

                            </div>

                        </div>


                        {{-- Email --}}

                        <div class="d-flex mb-4">

                            <div class="me-3 fs-4">
                                📧
                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    Email
                                </h6>

                                <p class="text-muted mb-0">

                                    info@college.com

                                </p>

                            </div>

                        </div>


                        {{-- Office Hours --}}

                        <div class="d-flex">

                            <div class="me-3 fs-4">
                                🕐
                            </div>

                            <div>

                                <h6 class="fw-bold mb-1">
                                    Office Hours
                                </h6>

                                <p class="text-muted mb-0">

                                    Monday - Saturday<br>
                                    9:00 AM - 5:00 PM

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Google Map --}}

            <div class="col-12 col-lg-7">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-0">

                        <iframe
                            src="https://www.google.com/maps?q=Lucknow%20Uttar%20Pradesh%20India&output=embed"
                            width="100%"
                            height="400"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>


@endsection
