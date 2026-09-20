@extends('layouts.frontend')

@section('title', 'Latest Notices')

@section('content')

{{-- =========================================================
     NOTICE HERO
========================================================= --}}

<section class="notices-hero">

    <div class="container">

        <div class="text-center text-white">

            <span class="badge bg-primary px-3 py-2 mb-3">
                College Updates
            </span>

            <h1 class="display-4 fw-bold">
                Latest Notices
            </h1>

            <p class="lead mt-3 mb-0">
                Stay updated with the latest college announcements,
                notices and important information.
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
     NOTICES SECTION
========================================================= --}}

<section class="py-5">

    <div class="container">

        {{-- Section Heading --}}

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                Important Updates
            </span>

            <h2 class="fw-bold mt-2">
                Latest College Notices
            </h2>

            <p class="text-muted mx-auto" style="max-width: 700px;">
                Check the latest announcements and important
                information from the college administration.
            </p>

        </div>


        {{-- Notices --}}

        <div class="row g-4">

            @forelse($notices as $notice)

                <div class="col-lg-6 col-md-6 col-sm-12">

                    <div class="card notice-card h-100 border-0 shadow-sm">

                        <div class="card-body p-4">

                            <div class="d-flex align-items-start">

                                {{-- Notice Icon --}}

                                <div class="notice-icon flex-shrink-0">

                                    <i class="bi bi-megaphone-fill"></i>

                                </div>


                                {{-- Notice Content --}}

                                <div class="ms-3 flex-grow-1">

                                    {{-- Notice Title --}}

                                    <h5 class="fw-bold mb-2">

                                        {{ $notice->title }}

                                    </h5>


                                    {{-- Date --}}

                                    @if($notice->published_at)

                                        <div class="notice-date mb-3">

                                            <i class="bi bi-calendar3 me-1"></i>

                                            {{ \Carbon\Carbon::parse($notice->published_at)->format('d M Y') }}

                                        </div>

                                    @elseif($notice->created_at)

                                        <div class="notice-date mb-3">

                                            <i class="bi bi-calendar3 me-1"></i>

                                            {{ $notice->created_at->format('d M Y') }}

                                        </div>

                                    @endif


                                    {{-- Description --}}

                                    @if($notice->description)

                                        <p class="text-muted mb-3">

                                            {{ Str::limit($notice->description, 150) }}

                                        </p>

                                    @elseif($notice->content)

                                        <p class="text-muted mb-3">

                                            {{ Str::limit($notice->content, 150) }}

                                        </p>

                                    @endif


                                    {{-- Read More --}}

                                    <a href="#"
                                       class="btn btn-outline-primary btn-sm">

                                        Read More

                                        <i class="bi bi-arrow-right ms-1"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


            @empty

                {{-- Empty State --}}

                <div class="col-12">

                    <div class="text-center py-5">

                        <div class="mb-3">

                            <i class="bi bi-megaphone display-1 text-muted"></i>

                        </div>

                        <h4 class="fw-bold">
                            No Notices Available
                        </h4>

                        <p class="text-muted">
                            There are currently no notices available.
                            Please check back later.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     NOTICE INFORMATION
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-4">

            {{-- Academic Updates --}}

            <div class="col-lg-4 col-md-6">

                <div class="text-center p-4">

                    <div class="notice-feature-icon mx-auto mb-3">

                        <i class="bi bi-book"></i>

                    </div>

                    <h5 class="fw-bold">
                        Academic Updates
                    </h5>

                    <p class="text-muted mb-0">
                        Get important information related to
                        classes, examinations and academics.
                    </p>

                </div>

            </div>


            {{-- Events --}}

            <div class="col-lg-4 col-md-6">

                <div class="text-center p-4">

                    <div class="notice-feature-icon mx-auto mb-3">

                        <i class="bi bi-calendar-event"></i>

                    </div>

                    <h5 class="fw-bold">
                        Events & Activities
                    </h5>

                    <p class="text-muted mb-0">
                        Stay informed about upcoming college
                        events and activities.
                    </p>

                </div>

            </div>


            {{-- Announcements --}}

            <div class="col-lg-4 col-md-6">

                <div class="text-center p-4">

                    <div class="notice-feature-icon mx-auto mb-3">

                        <i class="bi bi-bell"></i>

                    </div>

                    <h5 class="fw-bold">
                        Important Announcements
                    </h5>

                    <p class="text-muted mb-0">
                        Never miss important announcements from
                        the college administration.
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

    <div class="container text-center">

        <h2 class="fw-bold">
            Stay Connected With Us
        </h2>

        <p class="lead mt-3">
            Check this page regularly for the latest college updates.
        </p>

        <a href="{{ route('contact') }}"
           class="btn btn-light btn-lg mt-3">

            Contact College

            <i class="bi bi-arrow-right ms-1"></i>

        </a>

    </div>

</section>

@endsection