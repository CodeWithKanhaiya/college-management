@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">Edit Event</h2>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <form
                action="{{ route('admin.events.update', $event) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="mb-3">

                    <label class="form-label">
                        Event Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $event->title) }}"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        required>{{ old('description', $event->description) }}</textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Event Date
                    </label>

                    <input
                        type="date"
                        name="event_date"
                        class="form-control"
                        value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}"
                        required>

                </div>


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Start Time
                        </label>

                        <input
                            type="time"
                            name="start_time"
                            class="form-control"
                            value="{{ old('start_time', $event->start_time) }}"
                            required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            End Time
                        </label>

                        <input
                            type="time"
                            name="end_time"
                            class="form-control"
                            value="{{ old('end_time', $event->end_time) }}"
                            required>

                    </div>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        class="form-control"
                        value="{{ old('location', $event->location) }}"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Current Image
                    </label>

                    @if($event->image)

                        <br>

                        <img
                            src="{{ asset('uploads/events/' . $event->image) }}"
                            width="120"
                            class="mb-2">

                    @else

                        <p>No image</p>

                    @endif

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Change Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp">

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required>

                        <option value="1"
                            {{ old('status', $event->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $event->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>


                <button
                    type="submit"
                    class="btn btn-success">

                    Update Event

                </button>


                <a
                    href="{{ route('admin.events.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection