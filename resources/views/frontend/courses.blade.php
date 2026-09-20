@extends('layouts.frontend')

@section('title', 'Courses')

@section('content')

{{-- =========================
    COURSES HERO
========================= --}}
<section class="courses-hero">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">

                <h1 class="display-4 fw-bold text-white">
                    Our Courses
                </h1>

                <p class="lead text-white mb-4">
                    Explore our wide range of courses designed to provide
                    quality education, practical skills and career opportunities.
                </p>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">

                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"
                               class="text-white text-decoration-none">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active text-white"
                            aria-current="page">
                            Courses
                        </li>

                    </ol>
                </nav>

            </div>
        </div>
    </div>
</section>


{{-- =========================
    COURSES SECTION
========================= --}}
<section class="py-5">
    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                Academic Programs
            </span>

            <h2 class="fw-bold mt-2">
                Explore Our Courses
            </h2>

            <p class="text-muted">
                Choose from our professionally designed courses
                and build your successful career.
            </p>

        </div>


        {{-- Courses --}}
        <div class="row g-4">

            @forelse($courses as $course)

                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm course-card">

                        {{-- Course Icon --}}
                        <div class="course-icon text-center pt-4">

                            <div class="icon-circle mx-auto">
                                <i class="bi bi-book-half"></i>
                            </div>

                        </div>


                        <div class="card-body text-center p-4">

                            {{-- Course Name --}}
                            <h4 class="fw-bold mb-3">
                                {{ $course->course_name }}
                            </h4>


                            {{-- Department --}}
                            @if($course->department)
                                <p class="text-primary fw-semibold mb-2">
                                    <i class="bi bi-building me-1"></i>

                                    {{ $course->department->department_name }}
                                </p>
                            @endif


                            {{-- Course Code --}}
                            @if(isset($course->course_code))
                                <p class="text-muted mb-2">
                                    <strong>Course Code:</strong>
                                    {{ $course->course_code }}
                                </p>
                            @endif


                            {{-- Duration --}}
                            @if(isset($course->duration))
                                <p class="text-muted mb-3">
                                    <i class="bi bi-clock me-1"></i>
                                    Duration: {{ $course->duration }}
                                </p>
                            @endif


                            {{-- Fees --}}
                            @if(isset($course->fees))
                                <p class="fw-semibold mb-3">
                                    Fees:
                                    ₹{{ number_format($course->fees, 2) }}
                                </p>
                            @endif


                            {{-- View Course --}}
                            <a href="#"
                               class="btn btn-outline-primary">
                                View Details
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                {{-- No Courses --}}
                <div class="col-12">

                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i>

                        No courses available at the moment.
                    </div>

                </div>

            @endforelse

        </div>

    </div>
</section>


{{-- =========================
    WHY CHOOSE OUR COURSES
========================= --}}
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                Why Choose Us
            </span>

            <h2 class="fw-bold mt-2">
                Why Choose Our Courses?
            </h2>

        </div>


        <div class="row g-4">

            {{-- Feature 1 --}}
            <div class="col-md-6 col-lg-3">

                <div class="text-center p-4 h-100">

                    <div class="feature-icon mb-3">
                        <i class="bi bi-person-workspace"></i>
                    </div>

                    <h5 class="fw-bold">
                        Experienced Teachers
                    </h5>

                    <p class="text-muted">
                        Learn from experienced and qualified faculty members.
                    </p>

                </div>

            </div>


            {{-- Feature 2 --}}
            <div class="col-md-6 col-lg-3">

                <div class="text-center p-4 h-100">

                    <div class="feature-icon mb-3">
                        <i class="bi bi-laptop"></i>
                    </div>

                    <h5 class="fw-bold">
                        Practical Learning
                    </h5>

                    <p class="text-muted">
                        Gain practical knowledge through labs and real projects.
                    </p>

                </div>

            </div>


            {{-- Feature 3 --}}
            <div class="col-md-6 col-lg-3">

                <div class="text-center p-4 h-100">

                    <div class="feature-icon mb-3">
                        <i class="bi bi-award"></i>
                    </div>

                    <h5 class="fw-bold">
                        Quality Education
                    </h5>

                    <p class="text-muted">
                        Get quality education with industry-focused curriculum.
                    </p>

                </div>

            </div>


            {{-- Feature 4 --}}
            <div class="col-md-6 col-lg-3">

                <div class="text-center p-4 h-100">

                    <div class="feature-icon mb-3">
                        <i class="bi bi-briefcase"></i>
                    </div>

                    <h5 class="fw-bold">
                        Career Support
                    </h5>

                    <p class="text-muted">
                        Develop skills and prepare yourself for career opportunities.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
    CTA
========================= --}}
<section class="py-5">

    <div class="container">

        <div class="bg-primary text-white rounded-4 p-5 text-center">

            <h2 class="fw-bold mb-3">
                Start Your Academic Journey
            </h2>

            <p class="mb-4">
                Choose the right course and take the next step
                toward your career.
            </p>

            <a href="{{ route('apply') }}"
               class="btn btn-light btn-lg">
                Apply Now
                <i class="bi bi-arrow-right ms-1"></i>
            </a>

        </div>

    </div>

</section>

@endsection


{{-- =========================
    PAGE CSS
========================= --}}
@push('styles')

<style>

.courses-hero {
    min-height: 400px;
    padding: 100px 0;
    display: flex;
    align-items: center;

    background:
        linear-gradient(
            rgba(0, 0, 0, 0.65),
            rgba(0, 0, 0, 0.65)
        ),
        url('/images/collageimage.webp');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.courses-hero h1 {
    letter-spacing: 1px;
}

.courses-hero p {
    line-height: 1.7;
}


/* Course Card */

.course-card {
    transition: all 0.3s ease;
}

.course-card:hover {
    transform: translateY(-8px);
}


/* Course Icon */

.icon-circle {
    width: 70px;
    height: 70px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(13, 110, 253, 0.1);

    font-size: 30px;
    color: #0d6efd;
}


/* Feature Icon */

.feature-icon {
    font-size: 40px;
    color: #0d6efd;
}


/* Mobile */

@media (max-width: 767px) {

    .courses-hero {
        min-height: 350px;
        padding: 70px 15px;
    }

    .courses-hero h1 {
        font-size: 2.2rem;
    }

    .courses-hero p {
        font-size: 1rem;
    }

}

@media (max-width: 575px) {

    .courses-hero {
        min-height: 320px;
        padding: 60px 15px;
    }

    .courses-hero h1 {
        font-size: 1.8rem;
    }

    .courses-hero p {
        font-size: 0.95rem;
    }

}

</style>

@endpush