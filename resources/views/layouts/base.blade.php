<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            @if (Route::has('login'))
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                            <a href="/" class="nav-link">main</a>
                            <a href="/posts" class="nav-link">posts</a>
                            <a href="/posts/create" class="nav-link">create posts</a>
                            <a href="/api/posts" class="nav-link">api</a>


                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                            </form>

                    @else

                        <a href="{{ route('login') }}" class="nav-link">Log in</a>

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>

                        @endif
                    @endauth
                </div>
            @endif

            </div>
        </nav>
        @yield('content')

    </body>
</html>
