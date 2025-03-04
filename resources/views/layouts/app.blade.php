@php
    $states = App\Models\State::all();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECPC Personnel Standards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400i,500,500i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        /* links keep running off the page */
        a {
            word-wrap: break-word;
        }

        /** theme the whole thing a little bit uconn-ish */

        body {
            font-family: 'Roboto', sans-serif;
            background-image: radial-gradient(at center top, #013ecd 0%, #000e2f 75%);
            min-height: 100vh;
            overflow-y: scroll;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Roboto Slab', serif;
            color:#fff;
        }

        .navbar {
            /* uconn blue */
            background-color: #000e2f;
        }

        .navbar .navbar-brand {
            color: #fff;
        }

        .navbar .nav-link, .navbar .nav-link.show {
            color: #fff;
        }

        .navbar .nav-link:hover {
            color: #ccc;
        }

        .navbar .dropdown-menu {
            background-color: #000e2f;
        }

        .navbar .dropdown-menu .dropdown-item {
            color: #fff;
        }

        .navbar .dropdown-menu .dropdown-item:hover {
            background-color: #013ecd;
        }

        .accordion-button {
            background-color: #000e2f;
            color: #fff;
            border: none;
            border-radius: 0;
            padding: 1rem;
            font-size: 1.25rem;
        }

        .accordion-button:hover {
            background-color: #013ecd;
            color: #fff;
        }

        .accordion-button:not(.collapsed) {
            background-color: #013ecd;
            color: #fff;
        }

        .accordion-body {
            background-color: #b8c8ee;
            color: #000e2f;
            padding: 1.5rem;
            border-top: 1px solid #013ecd;
        }

        text {
            color: #fff;
            fill: #fff;
        }

    </style>

</head>

<body>
    <!-- discipines and standards navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">


            <a class="navbar-brand" href="{{ route('index') }}">ECPC Personnel Standards</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <!-- back to ecpc (external) -->

                    <li class="nav-item">
                        <a class="nav-link" href="https://ecipc.org/" target="_blank" rel="noopener">
                            <i class="bi bi-box-arrow-up-right"></i>
                            Back to ECIPC
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('standards.index') }}">Map</a>
                    </li>
  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Standards by State
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($states as $state)
                                <li><a class="dropdown-item"
                                        href="{{ route('state.show', $state->abbreviation) }}">{{ $state->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
