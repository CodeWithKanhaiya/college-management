@extends('layouts.admin')

@section('title', 'Teacher Details')

@section('content')

<div class="container-fluid py-4">


{{-- Page Header --}}
<div class="d-flex flex-column flex-md-row
            justify-content-between
            align-items-md-center
            gap-2 mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Teacher Details
        </h2>

        <p class="text-muted mb-0">
            View complete teacher information
        </p>
    </div>

    <div>
        <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
           class="btn btn-warning">
            ✏️ Edit
        </a>

        <a href="{{ route('admin.teachers.index') }}"
           class="btn btn-secondary">
            ← Back
        </a>
    </div>

</div>


{{-- Teacher Details Card --}}
<div class="card border-0 shadow-sm">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            Teacher Information
        </h5>
    </div>

    <div class="card-body p-4">

        <div class="row g-4">

            {{-- Photo --}}
            <div class="col-12 col-md-4 text-center">

                @if($teacher->photo)

                    <img src="{{ asset('storage/' . $teacher->photo) }}"
                         alt="Teacher Photo"
                         class="img-thumbnail rounded-circle"
                         width="180"
                         height="180"
                         style="object-fit: cover;">

                @else

                    <div class="border rounded-circle
                                d-flex align-items-center
                                justify-content-center mx-auto"
                         style="width:180px; height:180px;">

                        <span class="text-muted">
                            No Photo
                        </span>

                    </div>

                @endif

                <h4 class="mt-3 fw-bold">
                    {{ $teacher->user->name ?? 'N/A' }}
                </h4>

                <span class="badge
                    {{ $teacher->status ? 'bg-success' : 'bg-danger' }}">

                    {{ $teacher->status ? 'Active' : 'Inactive' }}

                </span>

            </div>


            {{-- Information --}}
            <div class="col-12 col-md-8">

                <div class="row g-3">

                    {{-- Employee ID --}}
                    <div class="col-12 col-sm-6">

                        <div class="border rounded p-3 h-100">

                            <small class="text-muted">
                                Employee ID
                            </small>

                            <div class="fw-semibold">
                                {{ $teacher->employee_id ?? 'N/A' }}
                            </div>

                        </div>

                    </div>


                    {{-- Email --}}
                    <div class="col-12 col-sm-6">

                        <div class="border rounded p-3 h-100">

                            <small class="text-muted">
                                Email
                            </small>

                            <div class="fw-semibold">
                                {{ $teacher->user->email ?? 'N/A' }}
                            </div>

                        </div>

                    </div>


                    {{-- Department --}}
                    <div class="col-12 col-sm-6">

                        <div class="border rounded p-3 h-100">

                            <small class="text-muted">
                                Department
                            </small>

                            <div class="fw-semibold">
                                {{ $teacher->department->name ?? 'N/A' }}
                            </div>

                        </div>

                    </div>


                    {{-- Phone --}}
                    <div class="col-12 col-sm-6">

                        <div class="border rounded p-3 h-100">

                            <small class="text-muted">
                                Phone
                            </small>

                            <div class="fw-semibold">
                                {{ $teacher->phone ?? 'N/A' }}
                            </div>

                        </div>

                    </div>


                    {{-- Qualification --}}
                    <div class="col-12 col-sm-6">

                        <div class="border rounded p-3 h-100">

                            <small class="text-muted">
                                Qualification
                            </small>

                            <div class="fw-semibold">
                                {{ $teacher->qualification ?? 'N/A' }}
                            </div>

                        </div>

                    </div>


                    {{-- Designation --}}
                    <div class="col-12 col-sm-6">

                        <div class="border rounded p-3 h-100">

                            <small class="text-muted">
                                Designation
                            </small>

                            <div class="fw-semibold">
                                {{ $teacher->designation ?? 'N/A' }}
                            </div>

                        </div>

                    </div>


                    {{-- Joining Date --}}
                    <div class="col-12 col-sm-6">

                        <div class="border rounded p-3 h-100">

                            <small class="text-muted">
                                Joining Date
                            </small>

                            <div class="fw-semibold">

                                {{ $teacher->joining_date
                                    ? $teacher->joining_date->format('d-m-Y')
                                    : 'N/A' }}

                            </div>

                        </div>

                    </div>


                    {{-- Created Date --}}
                    <div class="col-12 col-sm-6">

                        <div class="border rounded p-3 h-100">

                            <small class="text-muted">
                                Added On
                            </small>

                            <div class="fw-semibold">

                                {{ $teacher->created_at
                                    ? $teacher->created_at->format('d-m-Y')
                                    : 'N/A' }}

                            </div>

                        </div>

                    </div>


                    {{-- Address --}}
                    <div class="col-12">

                        <div class="border rounded p-3">

                            <small class="text-muted">
                                Address
                            </small>

                            <div class="fw-semibold">
                                {{ $teacher->address ?? 'N/A' }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
