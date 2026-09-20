
@extends('layouts.frontend')

@section('title', $department->name)

@section('content')

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-8">

                <div class="card border-0 shadow">

                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">

                            <div class="display-3">
                                🏢
                            </div>

                            <h1 class="fw-bold mt-3">

                                {{ $department->name }}

                            </h1>

                        </div>


                        <hr>


                        <h4 class="fw-bold">
                            About Department
                        </h4>

                        <p class="text-muted">

                            {{ $department->description
                                ?? 'No description available.' }}

                        </p>


                        <div class="mt-4">

                            <strong>
                                Status:
                            </strong>

                            @if($department->status)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            @endif

                        </div>


                        <div class="mt-4">

                            <a href="{{ route('departments.index') }}"
                               class="btn btn-secondary">

                                ← Back to Departments

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
