<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   

    <title>ETT Publica</title>

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

                <div class="jumbotron jumbotron-fluid text-white"  >

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <a class="navbar-brand" href="{{ url('/') }}"><img src="img/logo.png" class="w-50 h-50"/></a>
                                </div>
                                <div class="col-lg-9  d-none d-lg-block">
                                    <h2 class="display-4 text-left">Conectamos trabajadores y empresas</h2>
                                    <p>Hacemos el trabajo</p>
                                </div>


                            </div>

                        </div>
                </div>


        <nav class="navbar navbar-expand-md bg-dark sticky-top" >
  
        <ul class="navbar-nav" style="Text-color: white;">
            <li class="nav-item">
                <a class="nav-link" href="#">link1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">link1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">link1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">link1</a>
            </li>
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
