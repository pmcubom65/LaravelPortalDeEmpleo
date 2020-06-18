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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    @routes
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <div id="app">





        <nav class="navbar navbar-expand-md fixed-top ">
            <button type="button" class="navbar-toggler ml-auto" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--     <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link " href="/#inicio" active>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/#informacion">Ayuda</a>
                    </li>
                  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toogle " aria-expanded="false" data-toggle="dropdown"
                            data-target="dt2" href="#">
                            Empresas Colaboradoras
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dt2">
                            @foreach($empresas as $empresa)
                            <a class="dropdown-item" tabindex="0" role="button" data-toggle="popover"
                                data-trigger="focus" title="{{$empresa->nombre}}"
                                data-content="">{{$empresa->usuario->name}}</a>
                            @endforeach
                        </div>

                    </li>-->
                <dropdown-component :titulo="'Empresas Colaboradoras'" :titulo2="'Categorias Profesionales'">
                </dropdown-component>

                <!--  <li class="nav-item">
                        <a class="nav-link" href="/#buscar">Buscar Trabajo</a>
                    </li>-->
                <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toogle " aria-expanded="false" data-toggle="dropdown"
                            data-target="dt" href="#">
                            Categorias Profesionales
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dt">
                            @foreach($categorias as $categoria)
                            <a class="dropdown-item " id="popoverData" title="{{$categoria->descripcion}}" type="button"
                                tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
                                data-content="{{$categoria->descripcion}}">{{$categoria->nombre}}</a>

                            @endforeach
                         

                    </li>
                  
                    <dropdowncategoria-component  :titulo="'Categorias Profesionales'">
                    </dropdown-component>-->


                </ul>
                <ul class="navbar-nav  ml-auto ">
  
                    @guest
                    <li class="nav-item ">
                        <a class="nav-link text-white " href="{{ route('login') }}">{{ __('Login') }}</a>
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
            </div>





        </nav>

        <div id="jumbotron" class="jumbotron jumbotron-fluid text-white py-xs-20 mt-xs-20">

            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-3 col-sm-3  ">
                        <a class="navbar-brand d-xs-block  py-lg-0 ml-lg-5 mr-lg-0 " href="{{ url('/') }}">
                            <img src="{{asset('img/logo.png')}}" class="w-50 h-50 " /></a>



                    </div>

                    <div class="col-lg-9 col-sm-9  ">
                        <h2 class="display-4  d-none d-sm-block ml-0 text-left">Conectamos trabajadores y empresas</h2>
                        <p class="lead d-sm-block">Hacemos el trabajo</p>

                    </div>




                </div>


            </div>
        </div>
        </ul>
        

        <div class="container-fluid w-100 px-0">



            <div class="row w-100 justify-content-center align-items-center mx-0">
                @yield('content')

            </div>

        </div>

    </div>

    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    $(document).ready(function() {
       
   
      
        $(".dropdown-menu").css('margin', '50px');
        $(function() {
            $('[data-toggle="popover"]').popover(),

        });
        $("#popoverData").popover({
                trigger: "hover"

            });
        });
    </script>-->

    @include('barras.footer')

</body>

</html>