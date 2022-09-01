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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css',])
    
</head>
<body class="body-pd" id="body-pd">
    <header class="header shadow-sm body-pd" id="header">
            @guest
                @if (Route::has('login'))
                    <div class="header_toggle" hidden> <i class='bx bx-menu' id="header-toggle" value='true'></i> </div>
                    <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
                @endif

                @if (Route::has('register'))
                    <div class="header_toggle" hidden> <i class='bx bx-menu' id="header-toggle" value='true'></i> </div>
                    <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
                @endif
                @else
                    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle" value='true'></i> </div>
                    <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
            @endguest

            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="container">
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="logoutNavLink dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end logoutItem" aria-labelledby="navbarDropdown">
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
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
    </header>
    @guest
        @if (Route::has('login'))
        @endif

        @if (Route::has('register'))
        @endif
    @else
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">San Martin</span> </a>
                <div class="nav_list"> 
                    <a href="{{ route('home') }}" class="nav_link {{ Request::path() ==  'home' ? 'active' : ''  }}"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="{{ route('rooms') }}" class="nav_link {{ Request::path() ==  'rooms' ? 'active' : ''  }}"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Rooms</span> 
                    </a> 
                    <a href="{{ route('available') }}" class="nav_link {{ Request::path() ==  'available' ? 'active' : ''  }}"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 
                        <span class="nav_name">available</span> 
                    </a> 
                    <a href="{{ route('unavailable') }}" class="nav_link {{ Request::path() ==  'unavailable' ? 'active' : ''  }}"> 
                        <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name">unavailable</span> 
                    </a> 
                    <a href="{{ route('users') }}" class="nav_link {{ Request::path() ==  'users' ? 'active' : ''  }}"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Users</span> 
                    </a> 
                    <a href="{{ route('settings') }}" class="nav_link {{ Request::path() ==  'settings' ? 'active' : ''  }}"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Settings</span> 
                    </a> 
                </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    @endguest
    <!--Container Main start-->
    <main class="py-4">
        @yield('content')
    </main>
    <!--Container Main end-->
</body>
</html>
