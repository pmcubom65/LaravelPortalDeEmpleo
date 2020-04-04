@extends('layouts.app')

@section('content')
<div class="container espacio">


    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Bienvenido Empresa: {{ $datos->name }}</h1>

        </div>


    </div>


    <section  class="inicio intro-section">
            <div class="container  espacio text-center text-light">
                <div class="row">
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span><br>Datos de la Empresa</h3>
                        <p>Actualizar perfil</p>
                        <a href="" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span><br>Publicar Nueva Oferta</h3>
                        <p>Publicar Oferta de Empleo</p>
                        <a href="#" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><br>Revisar Ofertas Publicadas</h3>
                        <p>Revisar ofertas publicadas y candidaturas</p>
                        <a href="#" class="btn btn-primary m-auto">Ver</a>


                    </div>
                </div>

            </div>
        </section>






        <!--Esto es para la publicación de ofertas -->


        <section class="espacio">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1><span class="glyphicon glyphicon-send" aria-hidden="true"></span><br>Publique una nueva
                            oferta de trabajo</h1>

                    </div>


                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <form>

                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label for="nombre">Titulo de la Oferta Laboral</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                        placeholder="Titulo de la Oferta Laboral">

                                </div>


                            </div>




                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="Provincia">Provincia</label>
                                    <select class="form-control" id="Provincia" name="Provincia"></select>

                                </div>

                                <div class="fom-group col-sm-6">
                                    <label for="Experiencia">Experiencia Mínima</label>
                                    <select class="form-control" id="Experiencia" name="Experiencia">
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
                                    <label for="Salario">Salario bruto anual Jornada Completa</label>
                                    <input type="range" min="12000" max="50000" value="12000" class="form-control"
                                        id="Salarioid" name="Salario"
                                        oninput="mioutid.value=Salarioid.value.concat(' € brutos')">
                                    <output name="miout" id="mioutid">12000 € brutos<output>
                                </div>

                                <div class="fom-group col-sm-6">
                                    <label for="contrato">Tipo de Contrato</label>
                                    <select class="form-control" id="contrato" name="contrato">
                                        <option value="Jornada Completa">Jornada Completa
                                        <option>
                                        <option value="Jornada Parcial">Jornada Parcial
                                        <option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-12">


                                    <label for="exp">Descripcion de la Oferta</label>
                                    <textarea class="form-control" id="oferta" name="oferta"
                                        rows="8">Descripcion del puesto</textarea>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">

                                    <label for="exp">Categoria Profesional</label>
                                    <select name="cat" id="cat" class="form-control"></select>
                                </div>
                            </div>



                            <div class="form-row my-3">


                                <a href="" class="btn btn-warning m-auto" data-toggle="modal"
                                    data-target="#sitiocategoriamodal">Añadir una nueva categoria si ninguna
                                    coincide</a>


                            </div>

                            <div class="form-row my-3">


                                <a href="#" class="btn btn-success m-auto">Publicar Oferta</a>


                            </div>




                        </form>


                    </div>
                </div>


            </div>


        </section>


</div>
@endsection
