@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between mb-4">

        <div>
            <h2 class="fw-bold">
                Edit Testimonial
            </h2>

            <p class="text-muted">
                Update student feedback
            </p>
        </div>

        <a href="{{ route('admin.testimonials.index') }}"
           class="btn btn-secondary">

            ← Back

        </a>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route(
                'admin.testimonials.update',
                $testimonial->id
            ) }}"
                  method="POST">

                @csrf

                @method('PUT')


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Student Name
                    </label>

                    <input type="text"
                           name="student_name"
                           class="form-control"
                           value="{{ old(
                               'student_name',
                               $testimonial->student_name
                           ) }}">

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Course
                    </label>

                    <input type="text"
                           name="course"
                           class="form-control"
                           value="{{ old(
                               'course',
                               $testimonial->course
                           ) }}">

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Short Feedback
                    </label>

                    <textarea name="feedback"
                              class="form-control"
                              rows="5">{{ old(
                                  'feedback',
                                  $testimonial->feedback
                              ) }}</textarea>

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="1"
                            {{ $testimonial->status
                                ? 'selected'
                                : '' }}>

                            Active

                        </option>

                        <option value="0"
                            {{ !$testimonial->status
                                ? 'selected'
                                : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Update Testimonial

                </button>

                <a href="{{ route(
                    'admin.testimonials.index'
                ) }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection