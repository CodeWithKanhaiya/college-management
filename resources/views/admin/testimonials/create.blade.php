@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')

<div class="container-fluid py-4">


{{-- Page Header --}}
<div class="d-flex justify-content-between mb-4">

    <div>
        <h2 class="fw-bold">
            Add Testimonial
        </h2>

        <p class="text-muted">
            Add student feedback
        </p>
    </div>

    <a href="{{ route('admin.testimonials.index') }}"
       class="btn btn-secondary">
        ← Back
    </a>

</div>


{{-- Validation Errors --}}
@if($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


{{-- Testimonial Form --}}
<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form action="{{ route('admin.testimonials.store') }}"
              method="POST">

            @csrf


            {{-- Student Name --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Student Name
                </label>

                <input type="text"
                       name="student_name"
                       class="form-control"
                       value="{{ old('student_name') }}"
                       placeholder="Rahul Sharma">

            </div>


            {{-- Course --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Course
                </label>

                <input type="text"
                       name="course"
                       class="form-control"
                       value="{{ old('course') }}"
                       placeholder="B.Tech Computer Science">

            </div>


            {{-- Feedback --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Short Feedback
                </label>

                <textarea name="feedback"
                          class="form-control"
                          rows="5"
                          placeholder="Write student feedback">{{ old('feedback') }}</textarea>

            </div>


            {{-- Status --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Status
                </label>

                <select name="status"
                        class="form-select">

                    <option value="1"
                        {{ old('status', '1') == '1' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status') === '0' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

            </div>


            {{-- Buttons --}}
            <button type="submit"
                    class="btn btn-success">
                Save Testimonial
            </button>

            <a href="{{ route('admin.testimonials.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>


</div>

@endsection
