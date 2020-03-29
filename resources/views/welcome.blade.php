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
                            <h1 class="display-2 text-center font-weight-bold">Para cumplir tus sueños</h5>
                                <p></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-responsive center-block w-110" src="img/tren.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="display-2 text-center font-weight-bold">Unimos trabajo</h1>
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
        <section id="inicio" id="inicio" class="intro-section">
            <div class="container  espacio text-center text-light">
                <div class="row">
                    <div class="col-md-4">
                        
                        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Mi Perfil</h3>
                        <p>Ver y actualizar mi perfil</p>
                        <a href="#" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">
                        
                        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Mi Perfil</h3>
                        <p>Ver y actualizar mi perfil</p>
                        <a href="#" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">
                        
                        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Mi Perfil</h3>
                        <p>Ver y actualizar mi perfil</p>
                        <a href="#" class="btn btn-primary m-auto">Ver</a>


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

                                        @if (Route::has('register'))

                                        <a href="/login" class="btn btn-primary hvr-pulse" id="miboton">Acceder</a>

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
                                        @if (Route::has('register'))
                                        <a href="/login2" class="btn btn-primary">Acceder</a>
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

        <section class="espacio">
            <div class="container">
                <div class="row" >
                    <div class="col-12 text-center"> 
                        <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><br>Complete su curriculum</h1>

                    </div>
                

                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12 col-md-10 col-lg-8">
                    <form>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                        
                        </div>
                        
                        <div class="fom-group col-sm-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos">
                        </div>
                    </div>




                        <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni">
                        
                        </div>
                        
                        <div class="fom-group col-sm-6">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                        </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
                        
                        </div>
                        
                        <div class="fom-group col-sm-6">
                            <label for="fecha">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                        </div>


                        <div class="form-row my-3">


                        <a href="" class="btn btn-primary m-auto" data-toggle="modal" data-target="#sitiomodal">Añadir Experiencia</a>


                        </div>

                        <div class="form-row my-3">


                        <a href="#" class="btn btn-success m-auto">Guardar Curriculum</a>


                        </div>




                    </form>


                    </div>
                </div>


            </div>


        </section>










    </div>

</div>



    <!--modal-->
    <div class="modal" id="sitiomodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form>
            <div class="modal-content">
                <div class="modal-header">
                
                
                
                <div class="form-row col-12">
                <div class="form-group col-6">
                            <label for="tituloexp">Puesto</label>
                            <input type="text" class="form-control" id="tituloexp" name="tituloexp" placeholder="puesto ocupado">
                        
                </div>
                <div class="form-group col-6">
                            <label for="empresaexp">Empresa</label>
                            <input type="text" class="form-control" id="empresaexp" name="empresaexp" placeholder="Empresa">
                        
                        </div>
                            
                        
                </div>
                
                        
                        
                






                <button type="button" class="close mx-0 px-0" data-dismiss="modal" >
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
                            <label for="exp">Descripcion de la Experiencia</label>
                            <textarea class="form-control" id="exp" name="exp" rows="8">Descripcion del puesto</textarea>
                        
                        </div>
                        
                        
                


                </div>
                <div class="modal-footer">

                <a href="#" class="btn btn-success m-auto" type="submit"  data-dismiss="modal">Guardar Experiencia</a>


                </div>


            </div>
            </form>
            </div>
    </div>







@endsection