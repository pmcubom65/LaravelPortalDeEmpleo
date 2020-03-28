<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/icon.png" alt="icono">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>ETT Publica</title>
    <meta name="description" content="página que sirve como portal de empleo">
    <meta name="keywords" content="empleo, trabajo, salario">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <div id="app">

        <div class="jumbotron jumbotron-fluid text-white">

            <div class="container">
                <div class="row">
                    <div class="col-lg-xs-3">
                        <a class="navbar-brand d-none d-lg-block" href="{{ url('/') }}"><img src="img/logo.png"
                                class="w-50 h-50" /></a>
                        <a class="navbar-brand d-lg-none" href="{{ url('/') }}"><img src="img/icon.png"
                                class="w-50 h-50" /></a>
                    </div>
                    <div class="col-lg-9  d-none d-lg-block">
                        <h2 class="display-4 text-left">Conectamos trabajadores y empresas</h2>
                        <p>Hacemos el trabajo</p>
                    </div>
                    <div class="d-lg-none my-1">
                        <p text-center>Hacemos trabajo</p>
                    </div>


                </div>

            </div>
        </div>


        <nav class="navbar navbar-expand-md sticky-top">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link " href="#inicio" active>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#informacion">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buscar Trabajo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buscar Cursos de Formación</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toogle " aria-expanded="false" data-toggle="dropdown"
                            data-target="dt" href="#">
                            Categorias Profesionales
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dt">
                            <a class="dropdown-item">Enlace</a>
                        </div>

                    </li>
                </ul>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto ">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item  dropdown">
                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>



        </nav>

        <div class="container-fluid w-100 px-0">
          


            <div class="row w-100 justify-content-center align-items-center mx-0">
                @yield('content')
            </div>
        </div>
    </div>



</body>

</html>