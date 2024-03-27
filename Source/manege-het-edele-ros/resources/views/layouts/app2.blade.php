<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Styling -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesform.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-green shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <!-- <img id="logo" src="{{ asset('img\logo.png') }}"> -->
                   Manege Het Edele Ros
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    @auth
                        @if (Auth::user()->role == 'eigenaar')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user') }}">{{ __('Leerlingen') }}</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ url('Horses') }}">{{ __('Paarden') }}</a>
                            </li>
                            <li class="nav-item"> 
                                <a class="nav-link" href="{{ url('messages') }}">{{ __('Berichten') }}</a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'eigenaar' || Auth::user()->role == 'instructeur')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('exam/create') }}">{{ __('examen') }}</a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'eigenaar' || Auth::user()->role == 'instructeur' || Auth::user()->role == 'leerling')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('lessen') }}">{{ __('Lessen') }}</a>
                            </li>
                            
                            
                        @endif
                        @endauth

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="text-white nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                               
                            @endif
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="text-white nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->naam }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-roll dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-brown" href="{{ route('user.show', Auth::user()->id) }}">Profiel</a>
                                    @if (Auth::user()->role == 'leerling' || Auth::user()->role == 'instructeur')
                                    <a class="dropdown-item text-brown" href="{{ route('messages.index' )}}">Berichten</a>
                                    @endif
                                    <a class="dropdown-item text-brown" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="GreenSpacer"></div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
