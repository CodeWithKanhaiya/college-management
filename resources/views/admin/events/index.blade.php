@extends('layouts.admin')

@section('title', 'Events')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Events</h2>

        <a href="{{ route('admin.events.create') }}"
           class="btn btn-primary">

            + Add Event

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-responsive">

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($events as $event)

                    <tr>

                        <td>
                            {{ $event->id }}
                        </td>

                        <td>
                            {{ $event->title }}
                        </td>

                        <td>
                            {{ $event->event_date?->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $event->start_time }}
                        </td>

                        <td>
                            {{ $event->end_time }}
                        </td>

                        <td>
                            {{ $event->location }}
                        </td>

                        <td>

                            @if($event->image)

                                <img
                                    src="{{ asset('uploads/events/' . $event->image) }}"
                                    width="70"
                                    height="50"
                                    style="object-fit: cover;">

                            @else

                                No Image

                            @endif

                        </td>

                        <td>

                            @if($event->status)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.events.edit', $event) }}"
                               class="btn btn-sm btn-warning">

                                Edit

                            </a>


                            <form
                                action="{{ route('admin.events.destroy', $event) }}"
                                method="POST"
                                class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this event?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9"
                            class="text-center">

                            No events found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection