<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        .scrollable {
            overflow: auto;
        }

        .scrollable::-webkit-scrollbar {
            width: 8px;
        }

        .scrollable::-webkit-scrollbar-thumb {
            background-color: gray;
            border-radius: 999px;
        }
    </style>
    @vite(['resources/js/app.js'])

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('home.index') }}">Gootax</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link link-underline-opacity-0 link-secondary "
                                    href="{{ route('feedback.create') }}">Создать отзыв</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-underline-opacity-0 link-secondary "
                                    href="{{ route('user.create') }}">Зарегистрироваться</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div>
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @yield('script')

</body>

</html>
