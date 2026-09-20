<!DOCTYPE html>
<html>
<head>

    <title>Teacher Dashboard</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-primary bg-primary">

    <div class="container">

        <span class="navbar-brand text-white">
            Teacher Dashboard
        </span>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-light">
                Logout
            </button>

        </form>

    </div>

</nav>

<div class="container mt-5">

    <h2>
        Welcome Teacher,
        {{ auth()->user()->name }}
    </h2>

</div>

</body>
</html>