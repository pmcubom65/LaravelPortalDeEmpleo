@extends('layouts.app')

@section('content')






<div class="container-fluid position-ref full-height">

    <div class="container-fluid" style="height: 100vh; padding-top: 0;">
        <div class="d-none d-lg-block container-fluid justify-content-center align-items-center">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-responsive center-block w-110" src="img/ciudad.jpg" alt="First slide">
                        <div class="carousel-caption d-top d-md-block">
                            <h1 class="display-2 text-center font-weight-bold">Tu trabajo está ahí fuera</h1>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive center-block w-110" src="img/noche450.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-2 text-center font-weight-bold">En cualquier sitio</h5>
                                <p></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive center-block w-110" src="img/tren.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-2 text-center font-weight-bold">Unimos proyectos</h1>
                            <p></p>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <section class="inicio2 intro-section">
            @if (Auth::check())
            <welcomemiscandidaturas-component :login="Boolean('{{Auth::check()}}')" :id="Number('{{Auth::id()}}')"
                :rol="Number('{{Auth::user()->rol_id}}')"></welcomemiscandidaturas-component>
            @else
            <welcomemiscandidaturas-component :login="Boolean('{{Auth::check()}}')"></welcomemiscandidaturas-component>
            @endif

        </section>


        <section id="informacion" class="d-none d-lg-block informacion-section">
            <div id="informacion2" class="container espacio2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col  float-left">
                                <div class="card float-right" style="width: 18rem;">
                                    <img src="/img/hombre.jpg" class="card-img-top infoimg" alt="trabajador">

                                    <div class="card-body cbw">
                                        <h5 class="card-title">Soy un trabajador</h5>
                                        <p class="card-text">Inscribase en las ofertas de empleo. Actualize su perfil y
                                            curriculum. Consulte en el estado de sus candidaturas</p>



                                        <!-- Button trigger modal -->
                                        @if (Auth::check())
                                        <a href="/home" type="button" class="btn btn-primary">
                                            Ayuda
                                        </a>
                                        @else
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalCenter2">
                                            Ayuda
                                        </button>
                                        @endif




                                    </div>
                                </div>
                            </div>

                            <div class="col  float-right">
                                <div class="card float-left" style="width: 18rem;">
                                    <img src="/img/edificio.jpg" class="card-img-top infoimg" alt="edificio">
                                    <div class="card-body cbw">
                                        <h5 class="card-title">Soy una empresa</h5>
                                        <p class="card-text">Añada nuevas ofertas de trabajo y actualice las ofertas.
                                            Revise las candidaturas. Contacte con los candidatos</p>

                                        @if (Auth::check())
                                        <a href="/home" class="btn btn-primary">
                                            Ayuda
                                        </a>
                                        @else
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            Ayuda
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>



        <section class="d-none d-lg-block" id="plx">
            <div class="container">
                <div class="wtitle text-center text-light">
                    <h2>Proporcionamos las mejores herramientas para empresarios y trabajadores.
                        Contamos con la ayuda de los mejores profesionales
                    </h2>
                </div>
            </div>


        </section>
        <div id="seccionbuscar">

            @include('buscarempleo')
        </div>
        <div class="d-none d-lg-block container-fluid position-ref">
            <section id="pfooter">
                <div class="container">
                    <div class="row text-light container">
                        <div class="col-md-4 p-3 pf">
                            <h3 class="text-center">Enlaces</h3>
                            <div class="pft">

                                <a href="www.google.es">Google</a>
                            </div>
                            <div class="pft">

                                <a href="www.google.es">Linkldn</a>
                            </div>
                            <div class="pft">

                                <a href="www.google.es">SEPE</a>
                            </div>
                            <div class="pft">

                                <a href="www.google.es">Ministerio de Trabajo</a>
                            </div>


                        </div>
                        <div class="col-md-4 p-3" id="mapainicio">
                            <h3 class="text-center">Localizacion</h3>



                            <mapa-component :objeto="{
                        lat: 40.451315,
                        lng: -3.599181,
                        domicilio: 'IES Barajas'
                        

                       }"></mapa-component>




                        </div>
                        <inicio-component :token="'{{Session::token()}}'"></inicio-component>

                    </div>
                </div>
            </section>

        </div>

    </div>

</div>











<!-- Modal -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ayuda para trabajadores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Para acceder al portal, haga click en login en la barra de navegación necesitará su correo y clave.
                Para registrarse vaya a registrarse en la barra de navegación. Podrá publicar inscribirse en las ofertas
                de empleo disponibles.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ayuda para Empresas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Para acceder al portal, haga click en login en la barra de navegación.
                Para registrarse vaya a registrarse en la barra de navegación. Podrá publicar ofertas de empleo y
                revisar candidaturas y contactar con los candidatos.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>


@endsection