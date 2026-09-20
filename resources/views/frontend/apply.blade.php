
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Apply Now - College Management System</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-dark bg-primary">

        <div class="container">

            <a href="{{ url('/') }}"
               class="navbar-brand fw-bold">

                College Management System

            </a>

            <a href="{{ url('/') }}"
               class="btn btn-light">

                Home

            </a>

        </div>

    </nav>


    {{-- Apply Section --}}
    <section class="py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-12 col-md-10 col-lg-8">

                    <div class="card border-0 shadow-sm">

                        {{-- Header --}}
                        <div class="card-header bg-primary text-white text-center">

                            <h2 class="mb-0">
                                Apply Now
                            </h2>

                        </div>


                        <div class="card-body p-4">

                            <p class="text-muted text-center mb-4">

                                Start your journey with us.
                                Fill in the details below to apply.

                            </p>


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


                            {{-- Application Form --}}
                            <form action="{{ route('apply.store') }}"
                                  method="POST">

                                @csrf


                                {{-- Full Name --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">

                                        Full Name
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input type="text"
                                           name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="Enter your full name"
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
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input type="text"
                                           name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}"
                                           placeholder="Enter your phone number"
                                           required>

                                    @error('phone')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                {{-- Course --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">

                                        Select Course
                                        <span class="text-danger">*</span>

                                    </label>

                                    <select name="course"
                                            class="form-select @error('course') is-invalid @enderror"
                                            required>

                                        <option value="">
                                            -- Select Course --
                                        </option>

                                        <option value="B.Tech Computer Science"
                                            {{ old('course') == 'B.Tech Computer Science' ? 'selected' : '' }}>

                                            B.Tech Computer Science

                                        </option>

                                        <option value="B.Tech Mechanical"
                                            {{ old('course') == 'B.Tech Mechanical' ? 'selected' : '' }}>

                                            B.Tech Mechanical

                                        </option>

                                        <option value="B.Tech Civil"
                                            {{ old('course') == 'B.Tech Civil' ? 'selected' : '' }}>

                                            B.Tech Civil

                                        </option>

                                        <option value="B.Tech Electrical"
                                            {{ old('course') == 'B.Tech Electrical' ? 'selected' : '' }}>

                                            B.Tech Electrical

                                        </option>

                                        <option value="BBA"
                                            {{ old('course') == 'BBA' ? 'selected' : '' }}>

                                            BBA

                                        </option>

                                    </select>

                                    @error('course')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                {{-- Address --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">

                                        Address

                                    </label>

                                    <textarea name="address"
                                              class="form-control @error('address') is-invalid @enderror"
                                              rows="4"
                                              placeholder="Enter your address">{{ old('address') }}</textarea>

                                    @error('address')

                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>

                                    @enderror

                                </div>


                                {{-- Buttons --}}
                                <div class="mt-4">

                                    <button type="submit"
                                            class="btn btn-primary">

                                        Submit Application

                                    </button>

                                    <a href="{{ url('/') }}"
                                       class="btn btn-secondary">

                                        Back Home

                                    </a>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- Footer --}}
    <footer class="bg-dark text-white text-center py-3">

        <p class="mb-0">

            © {{ date('Y') }}
            College Management System

        </p>

    </footer>


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>
