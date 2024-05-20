<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{-- {{ $title ?? config('app.name', 'Laravel') }} --}}
        Epicerie
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
<div id="app">
<nav class="navbar navbar-expand-md" style="background-color: lime; border: 5px solid red; text-align: center;position: sticky;top: 0;z-index: 999">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon" style="filter: invert(100%);"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" style="color: orange; font-weight: bold;">{{ __('Accueil') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}" style="color: orange; font-weight: bold;">{{ __('Produits') }}</a>
                </li>
            </ul>

            <!-- Centered Logo -->
            <a class="navbar-brand mx-auto" href="{{ url('/') }}" style="font-family: 'Comic Sans MS', cursive; font-size: 2em; color: purple;">
                Enzo Epicerie
            </a>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}" style="color: orange; font-weight: bold;">{{ __('FAQ') }}</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" style="color: blue; background-color: yellow;">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="color: blue; background-color: yellow;">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: green; background-color: pink;">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background-color: orange;">
                            <a class="dropdown-item" href="{{ route('profil.index') }}" style="color: white;">Profil</a>
                            @if (isset(Auth::user()->is_admin) && Auth::user()->is_admin == 1)
                                <a class="dropdown-item" href="{{ route('admin.index') }}" style="color: white;">Admin</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" style="color: white;"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('cart') }}" class="nav-link">
                            <img src="{{ asset('img/cart-shopping-solid.svg') }}" width="18px" height="18px" style="filter: hue-rotate(180deg);">
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>



    <main class="">
        @yield('content')
    </main>
</div>
</body>

</html>
