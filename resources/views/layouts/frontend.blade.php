
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'College Management System')
    </title>

    {{-- Bootstrap CSS --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
        

        <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Your Frontend CSS -->
    <link rel="stylesheet"
          href="{{ asset('css/frontend.css') }}">

     @stack('styles')

</head>

<body>

    {{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        {{-- College Logo / Name --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            College Management
        </a>

        {{-- Mobile Menu Button --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/courses') }}">
                        Courses
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/departments') }}">
                        Departments
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/teachers') }}">
                        Teachers
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/notices') }}">
                        Notices
                    </a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('/events') }}">
                        Events
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">
                        Contact
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-light text-primary ms-lg-2 mt-2 mt-lg-0"
                       href="{{ url('/login') }}">
                        Login
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>



    {{-- Main Content --}}

    <main>

        @yield('content')

    </main>


    {{-- Footer --}}

    <footer class="bg-dark text-white mt-5">

        <div class="container py-4">

            <div class="row">

                <div class="col-md-6">

                    <h5>
                        College Management System
                    </h5>

                    <p>
                        Welcome to our college website.
                    </p>

                </div>


                <div class="col-md-6">

                    <h5>
                        Contact
                    </h5>

                    <p class="mb-1">
                        Email: info@college.com
                    </p>

                    <p>
                        Phone: 9876543210
                    </p>

                </div>

            </div>


            <hr>

            <p class="text-center mb-0">

                © 2026 College Management System

            </p>

        </div>

    </footer>


    {{-- Bootstrap JavaScript --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
