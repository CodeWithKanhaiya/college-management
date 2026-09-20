@extends('layouts.frontend')

@section('title', 'College Events')

@section('content')

{{-- =========================
     EVENTS HERO
========================= --}}
<section class="events-hero">
    <div class="container">
        <div class="text-center text-white">

            <span class="badge bg-primary px-3 py-2 mb-3">
                College Activities
            </span>

            <h1 class="display-4 fw-bold">
                College Events
            </h1>

            <p class="lead mt-3 mb-0">
                Discover upcoming events, activities and
                memorable moments at our college.
            </p>

        </div>
    </div>
</section>


{{-- =========================
     EVENTS SECTION
========================= --}}
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                What's Happening
            </span>

            <h2 class="fw-bold mt-2">
                Upcoming Events
            </h2>

            <p class="text-muted mx-auto" style="max-width: 700px;">
                Stay connected with the latest academic,
                cultural, sports and college events.
            </p>

        </div>


        <div class="row g-4">

            @forelse($events as $event)

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

                    <div class="card event-card h-100 border-0 shadow-sm">

                        {{-- Event Image --}}
                        <div class="event-image">

                            @if($event->image)

                                <img
                                    src="{{ asset('storage/' . $event->image) }}"
                                    alt="{{ $event->title }}"
                                    class="img-fluid"
                                >

                            @else

                                <div class="event-placeholder">
                                    <i class="bi bi-calendar-event"></i>
                                </div>

                            @endif

                        </div>


                        <div class="card-body p-4">

                            {{-- Date --}}
                            @if($event->event_date)

                                <div class="event-date mb-3">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ $event->event_date->format('d M Y') }}

                                </div>

                            @endif


                            {{-- Title --}}
                            <h4 class="fw-bold mb-3">

                                {{ $event->title }}

                            </h4>


                            {{-- Description --}}
                            @if($event->description)

                                <p class="text-muted">

                                    {{ \Illuminate\Support\Str::limit(
                                        $event->description,
                                        140
                                    ) }}

                                </p>

                            @endif


                            {{-- Time --}}
                            @if($event->event_time)

                                <div class="event-info">

                                    <i class="bi bi-clock"></i>

                                    <span>
                                        {{ $event->event_time }}
                                    </span>

                                </div>

                            @endif


                            {{-- Venue --}}
                            @if($event->venue)

                                <div class="event-info">

                                    <i class="bi bi-geo-alt"></i>

                                    <span>
                                        {{ $event->venue }}
                                    </span>

                                </div>

                            @endif


                            {{-- Button --}}
                            <div class="mt-4">

                                <a href="#"
                                   class="btn btn-outline-primary">

                                    View Details

                                    <i class="bi bi-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- No Events --}}
                <div class="col-12">

                    <div class="text-center py-5">

                        <div class="mb-3">

                            <i class="bi bi-calendar-x display-1 text-muted"></i>

                        </div>

                        <h4 class="fw-bold">
                            No Events Available
                        </h4>

                        <p class="text-muted">
                            There are currently no upcoming events.
                            Please check back later.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>
</section>


{{-- =========================
     EVENT FEATURES
========================= --}}
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                College Life
            </span>

            <h2 class="fw-bold mt-2">
                More Than Just Academics
            </h2>

            <p class="text-muted mx-auto" style="max-width: 700px;">
                Participate in different activities and
                develop your skills beyond the classroom.
            </p>

        </div>


        <div class="row g-4">

            {{-- Cultural --}}
            <div class="col-lg-4 col-md-6">

                <div class="event-feature text-center p-4">

                    <div class="event-feature-icon mx-auto mb-3">

                        <i class="bi bi-music-note-beamed"></i>

                    </div>

                    <h5 class="fw-bold">
                        Cultural Events
                    </h5>

                    <p class="text-muted mb-0">
                        Enjoy cultural programs, celebrations,
                        competitions and creative activities.
                    </p>

                </div>

            </div>


            {{-- Sports --}}
            <div class="col-lg-4 col-md-6">

                <div class="event-feature text-center p-4">

                    <div class="event-feature-icon mx-auto mb-3">

                        <i class="bi bi-trophy"></i>

                    </div>

                    <h5 class="fw-bold">
                        Sports Activities
                    </h5>

                    <p class="text-muted mb-0">
                        Take part in sports competitions,
                        tournaments and fitness activities.
                    </p>

                </div>

            </div>


            {{-- Academic --}}
            <div class="col-lg-4 col-md-6">

                <div class="event-feature text-center p-4">

                    <div class="event-feature-icon mx-auto mb-3">

                        <i class="bi bi-mortarboard"></i>

                    </div>

                    <h5 class="fw-bold">
                        Academic Events
                    </h5>

                    <p class="text-muted mb-0">
                        Attend seminars, workshops, conferences
                        and educational programs.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================
     CTA
========================= --}}
<section class="py-5 bg-primary text-white">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8 text-center text-lg-start">

                <h2 class="fw-bold mb-2">
                    Be Part of Our College Events
                </h2>

                <p class="lead mb-0">
                    Stay updated and participate in upcoming
                    college activities.
                </p>

            </div>


            <div class="col-lg-4 text-center text-lg-end mt-4 mt-lg-0">

                <a href="{{ route('contact') }}"
                   class="btn btn-light btn-lg">

                    Contact Us

                    <i class="bi bi-arrow-right ms-1"></i>

                </a>

            </div>

        </div>

    </div>

</section>

@endsection