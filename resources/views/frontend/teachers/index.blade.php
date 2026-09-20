@extends('layouts.frontend')

@section('title', 'Our Teachers')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">
            Our Teachers
        </h1>

        <p class="text-muted">
            Meet our experienced and dedicated faculty members
        </p>

    </div>


    <div class="row g-4">

        @forelse($teachers as $teacher)

            <div class="col-12 col-sm-6 col-lg-3">

                <div class="card h-100 border-0 shadow-sm">

                    {{-- Photo --}}
                    @if($teacher->photo)

                        <img src="{{ asset('storage/' . $teacher->photo) }}"
                             class="card-img-top"
                             alt="{{ $teacher->user->name ?? 'Teacher' }}"
                             style="height:220px; object-fit:cover;">

                    @else

                        <div class="d-flex align-items-center justify-content-center bg-light"
                             style="height:220px;">

                            <span class="text-muted">
                                No Photo
                            </span>

                        </div>

                    @endif


                    <div class="card-body text-center">

                        {{-- Name --}}
                        <h5 class="fw-bold">
                            {{ $teacher->user->name ?? 'N/A' }}
                        </h5>


                        {{-- Designation --}}
                        <p class="text-primary mb-1">
                            {{ $teacher->designation ?? 'Faculty' }}
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


    <div class="text-center mt-5">

        <a href="{{ route('home') }}"
           class="btn btn-secondary">

            ← Back to Home

        </a>

    </div>

</div>

@endsection