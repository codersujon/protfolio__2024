<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portfolio 2024</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif
            }
            .front {
                display: flex !important;
                flex-direction: column;
                height: 100vh !important;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="front">
                        <div class="py-3 p-3">
                            <img src="{{ asset('logo/logo.png') }}" alt="Hypershop Logo" width="150px">
                        </div>
                        <div>
                            @if (Route::has('login'))
                                <nav class="p-3">
                                    @auth
                                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Log in</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn mx-2 btn-primary btn-sm">Register</a>
                                        @endif
                                    @endauth
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
