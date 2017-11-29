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
    <link href="{{ secure_asset('css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/animate.css') }}" rel="stylesheet">


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
    <script src="{{ secure_asset('js/app.js') }}"></script>
    <script src="{{ secure_asset('js/a.js') }}"></script>
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/img/loading.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
    
</body>
</html>
