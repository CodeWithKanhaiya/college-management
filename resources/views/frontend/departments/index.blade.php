
@extends('layouts.frontend')

@section('title', 'All Departments')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h1 class="fw-bold">
                All Departments
            </h1>

            <p class="text-muted">
                Explore all academic departments
            </p>

        </div>


        <div class="row g-4">

            @forelse($departments as $department)

                <div class="col-12 col-sm-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <div class="card-body text-center p-4">

                            <div class="fs-1 mb-3">
                                🏢
                            </div>

                            <h4 class="fw-bold">

                                {{ $department->name }}

                            </h4>

                            <p class="text-muted">

                                {{ $department->description
                                    ?? 'Explore our academic department.' }}

                            </p>

                            <a href="{{ route(
                                'departments.show',
                                $department->id
                            ) }}"
                               class="btn btn-primary">

                                View Details

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

        </div>


        <div class="text-center mt-5">

            <a href="{{ url('/') }}"
               class="btn btn-secondary">

                ← Back to Home

            </a>

        </div>

    </div>

</section>

@endsection
