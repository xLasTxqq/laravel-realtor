<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link href="{{asset('/css/master.css')}}" rel="stylesheet">
    </head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navh">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Realtor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('appartment.index')}}">Main</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login.index')}}">Login</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('application.index')}}">Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('appartment.create')}}">Add appartment</a>
                    </li>
                    <form class="nav-item" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-light text-center d-flex flex-column justify-content-center align-items-center conh">
        @yield('content')
    </div>
</body>

</html>