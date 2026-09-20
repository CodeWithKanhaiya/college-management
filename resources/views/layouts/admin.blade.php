<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Panel')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

{{-- Top Navbar --}}
<nav class="navbar navbar-dark bg-primary">

    <div class="container-fluid">

        <a class="navbar-brand"
           href="{{ route('admin.dashboard') }}">

            College Management System

        </a>


        <div class="d-flex align-items-center">

            {{-- Admin Name --}}
            <span class="text-white me-3">

                {{ auth()->user()->name ?? 'Admin' }}

            </span>


            {{-- Logout --}}
            <form action="{{ route('logout') }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button type="submit"
                        class="btn btn-light btn-sm">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>

<div class="d-flex">

    {{-- Sidebar --}}
    <div class="bg-dark text-white p-3"
         style="width: 250px; min-height: calc(100vh - 56px);">

        <h4 class="mb-4">
            Admin Panel
        </h4>


        <div class="nav flex-column">

            <a href="{{ route('admin.dashboard') }}"
               class="nav-link text-white mb-2">
                🏠 Dashboard
            </a>


            <a href="{{ route('admin.students.index') }}"
               class="nav-link text-white mb-2">
                👨‍🎓 Students
            </a>


            <a href="{{ route('admin.teachers.index') }}"
               class="nav-link text-white mb-2">
                👨‍🏫 Teachers
            </a>


            <a href="{{ route('admin.departments.index') }}"
               class="nav-link text-white mb-2">
                🏢 Departments
            </a>


            <a href="{{ route('admin.courses.index') }}"
               class="nav-link text-white mb-2">
                📚 Courses
            </a>


            <a href="{{ route('admin.subjects.index') }}"
               class="nav-link text-white mb-2">
                📖 Subjects
            </a>


            <a href="{{ route('admin.books.index') }}"
               class="nav-link text-white mb-2">
                📕 Books
            </a>


            <a href="{{ route('admin.book-issues.index') }}"
               class="nav-link text-white mb-2">
                📤 Book Issues
            </a>


            <a href="{{ route('admin.events.index') }}"
               class="nav-link text-white mb-2">
                📅 Events
            </a>


            <a href="{{ route('admin.notices.index') }}"
               class="nav-link text-white mb-2">
                📢 Notices
            </a>


            <a href="{{ route('admin.attendances.index') }}"
               class="nav-link text-white mb-2">
                ✅ Attendance
            </a>


            <a href="{{ route('admin.exams.index') }}"
               class="nav-link text-white mb-2">
                📝 Exams
            </a>


            <a href="{{ route('admin.results.index') }}"
               class="nav-link text-white mb-2">
                📊 Results
            </a>


            <a href="{{ route('admin.fees.index') }}"
               class="nav-link text-white mb-2">
                💰 Fees
            </a>


            <a href="{{ route('admin.payments.index') }}"
               class="nav-link text-white mb-2">
                💳 Payments
            </a>


            <a href="{{ route('admin.timetables.index') }}"
               class="nav-link text-white mb-2">
                🕐 Timetable
            </a>
            <a href="{{ route('admin.testimonials.index') }}"
                class="nav-link text-white mb-2">

                 ⭐ Testimonials

            </a>

        </div>

    </div>


    {{-- Main Content --}}
    <div class="flex-grow-1 p-4">

        @yield('content')

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>