@extends('layouts.app')

@section('content')






<div class="container-fluid position-ref full-height">

    <div class="container-fluid d-none d-lg-block" style="height: 100vh; padding-top: 0;">
        <div class="container-fluid justify-content-center align-items-center">

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

        @include('welcomebarra')


        <section id="informacion" class="informacion-section">
            <div class="container espacio">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col  float-left">
                                <div class="card float-right" style="width: 18rem;">
                                    <img src="https://i.picsum.photos/id/1035/300/300.jpg" class="card-img-top"
                                        alt="...">

                                    <div class="card-body">
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
                                    <img src="https://i.picsum.photos/id/1078/300/300.jpg" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
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



        <section id="plx">
            <div class="container">
                <div class="wtitle text-center text-light">
                    <h2>Proporcionamos las mejores herramientas para empresarios y trabajadores.
                        Contamos con la ayuda de los mejores profesionales
                    </h2>
                </div>
            </div>


        </section>
        <div>

            @include('buscarempleo')
        </div>
        <div class="container-fluid position-ref">
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
                        <div class="col-md-4 p-3">
                            <h3 class="text-center">Localizacion</h3>
                       <!--     @include('googlemakerwelcome')-->

                        </div>
                      <inicio-component  :token="'{{Session::token()}}'"></inicio-component>

                    </div>
                </div>
            </section>
            
        </div>

    </div>

</div>






<div class="container-fluid d-lg-none" style="height: 100vh; padding-top: 0;">
    @include('welcomebarra')
    @include('buscarempleo')


</div>









<!--modal-->
<div class="modal fade" id="sitiomodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form>
            <div class="modal-content">
                <div class="modal-header">



                    <div class="form-row col-12">
                        <div class="form-group col-6">
                            <label for="tituloexp">Puesto</label>
                            <input type="text" class="form-control" id="tituloexp" name="tituloexp"
                                placeholder="puesto ocupado">

                        </div>
                        <div class="form-group col-6">
                            <label for="empresaexp">Empresa</label>
                            <input type="text" class="form-control" id="empresaexp" name="empresaexp"
                                placeholder="Empresa">

                        </div>


                    </div>










                    <button type="button" class="close mx-0 px-0" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="inicioexp">Fecha Incorporacion</label>
                            <input type="date" class="form-control" id="inicioexp" name="inicioexp">

                        </div>
                        <div class="form-group col-6">
                            <label for="finexp">Fecha Salida</label>
                            <input type="date" class="form-control" id="finexp" name="finexp">

                        </div>

                    </div>


                    <div class="form-group col-12">
                        <label for="exp">Categoria Profesional</label>
                        <select name="cat" id="cat" class="form-control"></select>

                    </div>

                    <div class="form-group col-12">
                        <label for="exp">Descripcion de la Experiencia</label>
                        <textarea class="form-control" id="exp" name="exp" rows="8">Descripcion del puesto</textarea>

                    </div>





                </div>
                <div class="modal-footer">

                    <a href="#" class="btn btn-success m-auto" type="submit" data-dismiss="modal">Guardar
                        Experiencia</a>


                </div>


            </div>
        </form>
    </div>
</div>



<!--<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

</script>
<script src="{{asset('js/inicio.js')}}" type="text/javascript"></script>-->









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