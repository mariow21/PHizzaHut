<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: rgba(201, 40, 40, 0.952);">
            <div class="container">              
                <a class="navbar-brand " style="color: white;" href="{{ url('/') }}">
                   PHizza Hut
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item" >
                                    <a class="nav-link " style="color: white;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                        <nav class="navbar navbar-expand-lg navbar-light">                         
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                @if (Auth()->user()->roles == 'admin')
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/vaut" style="color: white;">View All User Transaction<span class="sr-only"></span></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="/au" style="color: white;">View All User</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white;">
                                            {{ Auth::user()->name }}
                                        </a>
                                @else
                                    <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                      <a class="nav-link" href="/history" style="color: white;">View Transaction History<span class="sr-only"></span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/cart" style="color: white;">View Cart</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white;">
                                            {{ Auth::user()->name }}
                                        </a>
                                @endif
                              
                                    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                              </ul>
                            </div>
                          </nav>

                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
