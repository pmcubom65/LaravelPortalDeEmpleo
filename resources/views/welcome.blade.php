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
        <section id="inicio" class="inicio intro-section">
            <div class="container  espacio text-center text-light">
                <div class="row">
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Mi Perfil</h3>
                        <p>Ver y actualizar mi perfil</p>
                        <a href="/home" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-search" aria-hidden="true"></span><br>Buscar Ofertas de
                            Empleo</h3>
                        <p>Buscar Ofertas de Empleo</p>
                        <a href="#buscar" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>???????</h3>
                        <p>???????????</p>
                        <a href="#" class="btn btn-primary m-auto">??????????</a>


                    </div>
                </div>

            </div>
        </section>



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


        <!--Esto es para la busqueda de ofertas de trabajo -->


        <section id="buscar" class="espacio buscar-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1><span class="glyphicon glyphicon-send" aria-hidden="true"></span><br>Buscar ofertas de
                            Empleo
                        </h1>
                        <h3>Seleccione criterios</h3>
                    </div>


                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <form>


                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="Provincia">Provincia</label>
                                    <select class="form-control" id="Provincia" name="Provincia">
                                        <option value="0">Todas</option>
                                    </select>

                                </div>

                                <div class="fom-group col-sm-6">
                                    <label for="Experiencia">Experiencia Mínima</label>
                                    <select class="form-control" id="Experiencia" name="Experiencia">
                                        <option value="0">Todas</option>
                                        <option value="0">Sin Experiencia
                                        <option>
                                        <option value="1">1 año
                                        <option>
                                        <option value="2">2 años
                                        <option>
                                        <option value="3">3 años
                                        <option>
                                        <option value="4">mas de 3
                                        <option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="Salario">Salario mínimo requerido al año</label>
                                    <input type="range" min="11999" max="50000" value="12000" class="form-control"
                                        id="Salarioid" name="Salario" oninput="mioutid.value= (Salarioid.value < 12000) ? 'Cualquier Salario' :                                         
                                            Salarioid.value.concat(' € brutos')">


                                    <output name="miout" id="mioutid">Cualquier Salario<output>
                                </div>

                                <div class="fom-group col-sm-6">
                                    <label for="contrato">Tipo de Contrato</label>
                                    <select class="form-control" id="contrato" name="contrato">
                                        <option value="0">Todas</option>
                                        <option value="Jornada Completa">Jornada Completa
                                        <option>
                                        <option value="Jornada Parcial">Jornada Parcial
                                        <option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-12">

                                    <label for="exp">Categoria Profesional</label>
                                    <select name="cat" id="cat" class="form-control">
                                        <option value="0">Todas</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-row my-3">


                                <a href="#" class="btn btn-success m-auto">Realizar Búsqueda</a>


                            </div>




                        </form>


                    </div>
                </div>


            </div>


        </section>
















    </div>

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