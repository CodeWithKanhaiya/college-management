@extends('layouts.admin')

@section('title', 'All Notices')

@section('content')

<div class="container-fluid py-5">


{{-- Heading --}}
<div class="text-center mb-5">

    <h1 class="fw-bold">
        All Notices
    </h1>

    <p class="text-muted">
        Latest college announcements and notices
    </p>

</div>


<div class="row g-4">

    @forelse($notices as $notice)

        <div class="col-12 col-md-6 col-lg-4">

            <div class="card h-100 border-0 shadow-sm">

                <div class="card-body p-4">

                    {{-- Title --}}
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

                        {{ Str::limit($notice->description, 120) }}

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


{{-- Back Home --}}
<div class="text-center mt-5">

    <a href="{{ route('home') }}"
       class="btn btn-secondary">

        ← Back to Home

    </a>

</div>


</div>

@endsection
