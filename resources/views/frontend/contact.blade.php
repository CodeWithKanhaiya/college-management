
@extends('layouts.frontend')

@section('title', 'Contact')

@section('content')





{{-- Contact Section --}}

<section class="py-5">

    <div class="container">

        {{-- Heading --}}

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Contact Us
            </h2>

            <p class="text-muted">
                Have a question? Get in touch with us.
            </p>

        </div>


        <div class="row g-4">


            {{-- Contact Information --}}

            <div class="col-12 col-lg-5">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">
                            College Information
                        </h4>


                        {{-- Address --}}

                        <div class="mb-4">

                            <h6 class="fw-bold">
                                📍 Address
                            </h6>

                            <p class="text-muted">
                                College Campus, Lucknow,
                                Uttar Pradesh, India
                            </p>

                        </div>


                        {{-- Phone --}}

                        <div class="mb-4">

                            <h6 class="fw-bold">
                                📞 Phone
                            </h6>

                            <p class="text-muted">
                                +91 9876543210
                            </p>

                        </div>


                        {{-- Email --}}

                        <div class="mb-4">

                            <h6 class="fw-bold">
                                📧 Email
                            </h6>

                            <p class="text-muted">
                                info@college.com
                            </p>

                        </div>


                        {{-- Office Hours --}}

                        <div>

                            <h6 class="fw-bold">
                                🕐 Office Hours
                            </h6>

                            <p class="text-muted mb-0">

                                Monday - Saturday

                                <br>

                                9:00 AM - 5:00 PM

                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Contact Form --}}

            <div class="col-12 col-lg-7">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">
                            Send Us a Message
                        </h4>


                        {{-- Success Message --}}

                        @if(session('success'))

                            <div class="alert alert-success">

                                {{ session('success') }}

                            </div>

                        @endif


                        {{-- Validation Errors --}}

                        @if($errors->any())

                            <div class="alert alert-danger">

                                <strong>
                                    Please fix the following errors:
                                </strong>

                                <ul class="mb-0 mt-2">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        {{-- Form --}}

                        <form action="{{ route('contact.store') }}"
                              method="POST">

                            @csrf


                            {{-- Name --}}

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}"
                                       placeholder="Enter your name"
                                       required>

                                @error('name')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Email --}}

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Email
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       placeholder="Enter your email"
                                       required>

                                @error('email')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Phone --}}

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Phone
                                </label>

                                <input type="text"
                                       name="phone"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value="{{ old('phone') }}"
                                       placeholder="Enter your phone number">

                                @error('phone')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Subject --}}

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Subject
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                       name="subject"
                                       class="form-control @error('subject') is-invalid @enderror"
                                       value="{{ old('subject') }}"
                                       placeholder="Enter subject"
                                       required>

                                @error('subject')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Message --}}

                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Message
                                    <span class="text-danger">*</span>
                                </label>

                                <textarea name="message"
                                          class="form-control @error('message') is-invalid @enderror"
                                          rows="5"
                                          placeholder="Write your message"
                                          required>{{ old('message') }}</textarea>

                                @error('message')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Buttons --}}

                            <button type="submit"
                                    class="btn btn-primary">

                                📩 Send Message

                            </button>

                            <a href="{{ url('/') }}"
                               class="btn btn-secondary">

                                Back Home

                            </a>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection

