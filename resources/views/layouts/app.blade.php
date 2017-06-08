<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <div id="app">
        <header>
        <nav class="navbar navbar-toggleable-md dark-primary-color ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand text-primary-color" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right text-primary-color">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item text-primary-color"><a href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item text-primary-color"><a href="{{ route('register') }}">Register</a></li>
                        @else
                        @if (Auth::user()->isAdmin())
                            <li class="nav-item dropdown ">
                                <a href="#" class="dropdown-toggle text-primary-color" data-toggle="dropdown" role="button"  aria-expanded="false">
                                     Administration <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown" role="menu">
                                    <li>
                                        <a href="/admin/roles">Roller</a>
                                    </li>
                                    <li>
                                        <a href="/admin/api-users">API-användare</a>
                                    </li>
                                    <li>
                                        <a href="/admin/vehicles">Fordon</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            @endif

                            <li class="nav-item dropdown ">
                                <a href="#" class="dropdown-toggle text-primary-color" data-toggle="dropdown" role="button"  aria-expanded="false">
                                     {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown" role="menu">
                                    <li>
                                        <a href="/self-edit">Personliga inställningar</a>
                                    </li>
                                    <li class="text-primary-color">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logga ut
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        </header>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>