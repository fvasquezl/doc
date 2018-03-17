<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <?php function activeMenu($url){
        return  request()->is($url) ? 'active' : '' ;
    }?>
    <header>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class = "{{activeMenu('/')}}">
                        <a class="nav-link" href="{{ route('home')}}">Inicio</a>
                    </li>
                    <li class = "{{activeMenu('saludos*')}}">
                        <a class="nav-link" href="{{ route('saludos', 'Faustino')}}">Saludo</a>
                    </li>
                    <li class = "{{activeMenu('mensajes/create')}}">
                        <a class="nav-link" href="{{ route('mensajes.create')}}">Contactos</a>
                    </li>
                    @auth
                        <li class = "{{activeMenu('mensajes*')}}">
                            <a class="nav-link" href="{{ route('mensajes.index')}}">Mensajes</a>
                        </li>
                        @if(auth()->user()->hasRoles(['admin']))
                            <li class = "{{activeMenu('usuarios*')}}">
                                <a class="nav-link" href="{{ route('usuarios.index')}}">Usuarios</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class = "{{activeMenu('login')}}"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        {{--<li><a class="nav-link" href="{{ route('register') }}">Register</a></li>--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/usuarios/{{auth()->id()}}/edit">Mi cuenta</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    </header>

    <main class="py-4 container">
        @if(session()->has('flash'))
            <div class="alert alert-success">{{session('flash')}}</div>
        @endif
        @yield('content')

    </main>

    <div class="container">
        <footer>Copyright &copy; {{date('Y')}}  </footer>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
