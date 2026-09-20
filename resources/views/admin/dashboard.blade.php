@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex flex-wrap justify-content-between
                align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Admin Dashboard
            </h2>

            <p class="text-muted mb-0">
                College Management System Overview
            </p>
        </div>

        <div class="mt-2 mt-md-0">

            <span class="badge bg-primary fs-6">
                {{ now()->format('d M Y') }}
            </span>

        </div>

    </div>


    {{-- Statistics Cards --}}
    <div class="row g-4">


        {{-- Students --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between
                                align-items-center">

                        <div>

                            <h6 class="text-muted">
                                Students
                            </h6>

                            <h2 class="fw-bold mb-0">
                                {{ $students }}
                            </h2>

                        </div>

                        <div class="bg-primary text-white
                                    rounded-circle p-3">

                            <span>👨‍🎓</span>

                        </div>

                    </div>

                    <a href="{{ route('admin.students.index') }}"
                       class="btn btn-sm btn-outline-primary mt-3">

                        View Students

                    </a>

                </div>

            </div>

        </div>


        {{-- Teachers --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between
                                align-items-center">

                        <div>

                            <h6 class="text-muted">
                                Teachers
                            </h6>

                            <h2 class="fw-bold mb-0">
                                {{ $teachers }}
                            </h2>

                        </div>

                        <div class="bg-success text-white
                                    rounded-circle p-3">

                            <span>👨‍🏫</span>

                        </div>

                    </div>

                    <a href="{{ route('admin.teachers.index') }}"
                       class="btn btn-sm btn-outline-success mt-3">

                        View Teachers

                    </a>

                </div>

            </div>

        </div>


        {{-- Courses --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between
                                align-items-center">

                        <div>

                            <h6 class="text-muted">
                                Courses
                            </h6>

                            <h2 class="fw-bold mb-0">
                                {{ $courses }}
                            </h2>

                        </div>

                        <div class="bg-warning text-dark
                                    rounded-circle p-3">

                            <span>📚</span>

                        </div>

                    </div>

                    <a href="{{ route('admin.courses.index') }}"
                       class="btn btn-sm btn-outline-warning mt-3">

                        View Courses

                    </a>

                </div>

            </div>

        </div>


        {{-- Departments --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between
                                align-items-center">

                        <div>

                            <h6 class="text-muted">
                                Departments
                            </h6>

                            <h2 class="fw-bold mb-0">
                                {{ $departments }}
                            </h2>

                        </div>

                        <div class="bg-info text-white
                                    rounded-circle p-3">

                            <span>🏢</span>

                        </div>

                    </div>

                    <a href="{{ route('admin.departments.index') }}"
                       class="btn btn-sm btn-outline-info mt-3">

                        View Departments

                    </a>

                </div>

            </div>

        </div>


        {{-- Books --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Total Books
                    </h6>

                    <h2 class="fw-bold">
                        {{ $books }}
                    </h2>

                    <a href="{{ route('admin.books.index') }}"
                       class="btn btn-sm btn-outline-primary">

                        View Books

                    </a>

                </div>

            </div>

        </div>


        {{-- Book Issues --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Book Issues
                    </h6>

                    <h2 class="fw-bold">
                        {{ $bookIssues }}
                    </h2>

                    <a href="{{ route('admin.book-issues.index') }}"
                       class="btn btn-sm btn-outline-success">

                        View Issues

                    </a>

                </div>

            </div>

        </div>


        {{-- Events --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Events
                    </h6>

                    <h2 class="fw-bold">
                        {{ $events }}
                    </h2>

                    <a href="{{ route('admin.events.index') }}"
                       class="btn btn-sm btn-outline-warning">

                        View Events

                    </a>

                </div>

            </div>

        </div>


        {{-- Notices --}}
        <div class="col-12 col-sm-6 col-xl-3">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h6 class="text-muted">
                        Notices
                    </h6>

                    <h2 class="fw-bold">
                        {{ $notices }}
                    </h2>

                    <a href="{{ route('admin.notices.index') }}"
                       class="btn btn-sm btn-outline-danger">

                        View Notices

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- Recent Students + Notices --}}
    <div class="row g-4 mt-2">


        {{-- Recent Students --}}
        <div class="col-12 col-lg-6">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        Recent Students
                    </h5>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>

                                <tr>

                                    <th>Name</th>
                                    <th>Roll No</th>
                                    <th>Date</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($recentStudents as $student)

                                    <tr>

                                        <td>
                                            {{ $student->full_name ?? $student->name }}
                                        </td>

                                        <td>
                                            {{ $student->roll_no ?? '-' }}
                                        </td>

                                        <td>
                                            {{ $student->created_at?->format('d-m-Y') }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3"
                                            class="text-center">

                                            No students found.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>


        {{-- Recent Notices --}}
        <div class="col-12 col-lg-6">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        Recent Notices
                    </h5>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>

                                <tr>

                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Status</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($recentNotices as $notice)

                                    <tr>

                                        <td>
                                            {{ $notice->title }}
                                        </td>

                                        <td>
                                            {{ $notice->publish_date?->format('d-m-Y') }}
                                        </td>

                                        <td>

                                            @if($notice->status)

                                                <span class="badge bg-success">
                                                    Active
                                                </span>

                                            @else

                                                <span class="badge bg-danger">
                                                    Inactive
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3"
                                            class="text-center">

                                            No notices found.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Upcoming Events --}}
    <div class="row mt-4">

        <div class="col-12">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white">

                    <h5 class="mb-0">
                        Upcoming Events
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row g-3">

                        @forelse($upcomingEvents as $event)

                            <div class="col-12 col-md-6 col-xl-4">

                                <div class="border rounded p-3 h-100">

                                    <h5>
                                        {{ $event->title }}
                                    </h5>

                                    <p class="text-muted mb-2">

                                        📅
                                        {{ $event->event_date?->format('d M Y') }}

                                    </p>

                                    <p class="mb-2">

                                        📍
                                        {{ $event->location }}

                                    </p>

                                    <small>

                                        {{ $event->start_time }}
                                        -
                                        {{ $event->end_time }}

                                    </small>

                                </div>

                            </div>

                        @empty

                            <div class="col-12">

                                <p class="text-center text-muted mb-0">

                                    No upcoming events.

                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection