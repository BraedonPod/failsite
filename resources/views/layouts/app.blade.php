<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FML: @yield('pageTitle')</title>

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css?v=0.1') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
</head>
<body>
    <div id="app">
        <nav id="header" class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        FML
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('moderate') }}">Moderate the FMLs</a></li>
                        <li><a href="{{ route('submission') }}">Submit your FML</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->username }} 
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/profile/{{ Auth::user()->id }}">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="/logout"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <nav class="nav" id="nav-primary-wrapper">
            <div class="container no-padding">
                <ul role="navigation" class="nav" id="nav-primary">
                    <li role="presentation" class="nav-selected">
                        <a href="/"><i class="fa fa-home"></i><span class="sr-only">Home</span></a>
                    </li>
                    <li>
                        <a href="/tops">The Top <i class="fa fa-trophy" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="/random">Random <i class="fa fa-random" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="/school">School</a>
                    </li>
                    <li>
                        <a href="/miscellaneous">Miscellaneous</a>
                    </li>
                    <li>
                        <a href="/geek">Geek</a>
                    </li>
                    <li>
                        <a href="/holidays">Holidays</a>
                    </li>
                    <li>
                        <a href="/transportation">Transportation</a>
                    </li>
                    <li>
                        <a href="/health">Health</a>
                    </li>
                    <li>
                        <a href="/kids">Kids</a>
                    </li>
                    <li>
                        <a href="/animals">Animals</a>
                    </li>
                    <li>
                        <a href="/intimacy">Intimacy</a>
                    </li>
                    <li>
                        <a href="/money">Money</a>
                    </li>
                    <li>
                        <a href="/work">Work</a>
                    </li>
                    <li>
                        <a href="/love">Love</a>
                    </li>
                </ul>
            </div>
        </nav>
        @if (session('status'))
            <div id="status" class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
        
    </div>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/a.js') }}"></script>
    
</body>
</html>
