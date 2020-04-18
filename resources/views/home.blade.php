@extends('layouts.app')

@section('content')
<div class="container espacio">


    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Bienvenido {{ $datos->name }}</h1>

        </div>


    </div>

    @if( $trabajador===0)



    <div class="card">


        <div class="card-body">

            <h4>No tienes ningún curriculum dado de alta por el momento</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                Alguno de los campos no está correctamente relleno
            </div>
            @endif
        </div>
    </div>

    @include('formcurr')
</div>


@elseif ($experienciass===0)
<div class="container espacio">
    <div class="card-body">

        <h4>Tienes el curriculum dado de alta. No tienes experiencias registradas por el momento</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            Alguno de los campos no está correctamente relleno
        </div>
        @endif

    </div>
</div>

@include('currrelleno')


@else

<div class="card">


    <div class="card-body">

        <h4 class="text-center">Su curriculum está dado de alta correctamente: Actualizado {{$fechaact}}</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            Alguno de los campos no está correctamente relleno
        </div>
        @endif

        @if ($trabajadorseleccionado->count() > 0)
        <div class="container my-0 ">
            <button class="btn btn-default btn-lg btn-link float-right " data-toggle="modal" data-target="#sitiomodal4"
                style="font-size:36px;">
                <span class="glyphicon glyphicon-comment float-right"></span>
            </button>
            <span class="badge badge-notify float-right">{{$trabajadorseleccionado->count()}}</span>
        </div>
        @endif
    </div>
</div>

<section class="espacio2">



</section>

<div class="jumbotron jumbotron-fluid" id="jumbotronarea">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Mi área</h1>
                <p class="lead">Acceda a sus datos y a sus candidaturas</p>
                <hr>

            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center" id="pills-nav" role="tablist">
                    <li class="nav-item btn-xs-block">
                        <a class="nav-link active btn-lg " id="nav-pills-01" data-toggle="pill"
                            href="#nav-item-01">Datos
                            Personales</a>

                    </li>
                    <li class="nav-item  btn-xs-block">
                        <a class="nav-link btn-lg" id="nav-pills-02" data-toggle="pill" href="#nav-item-02">Experiencias
                            Laborales <span class="badge badge-light">
                                {{$experienciass->count()}}

                            </span></a>

                    </li>
                    <li class="nav-item  btn-xs-block">
                        <a class="nav-link btn-lg" id="nav-pills-03" data-toggle="pill"
                            href="#nav-item-03">Candidaturas</a>

                    </li>


                </ul>
                <div class="tab-content" id="nav-pills-content">

                    <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">
                        @include('currrelleno')

                    </div>
                    <div class="tab-pane fade" id="nav-item-02" role="tabpanel">

                        <div class="form-row my-3">


                            <a href="" class="btn btn-success m-auto btn-lg btn-xs-block" data-toggle="modal"
                                data-target="#sitiomodal">Añadir
                                Experiencia</a>


                        </div>
                        @foreach ($experienciass as $experiencia)

                        <div class="card">
                            <h5 class="card-header">{{$experiencia->puesto}} - {{$experiencia->categoria->nombre}}</h5>
                            <div class="card-body">
                                <h5 class="card-title">{{$experiencia->empresa}}</h5>
                                <p class="card-text">{{$experiencia->descripcion}}</p>
                                <p class="card-text">Desde: {{$experiencia->inicio}}</p>
                                <p class="card-text">Hasta: {{$experiencia->fin}}</p>

                                <a href="/home/Expe/{{$experiencia->id}}" class="btn btn-primary btn-xs-block ">Editar o
                                    Borrar</a>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <div class="tab-pane fade" id="nav-item-03" role="tabpanel">




                        <p>
                            @foreach ($candidaturas as $oferta)

                            <p>
                                <a class="btn btn-primary btn-block font-weight-bold" data-toggle="collapse"
                                    href="#collapseExample{{$oferta->id}}" role="button" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    {{$oferta->titulo}} - Categoria: {{$oferta->categoria->nombre}} - Salario:
                                    {{$oferta->salario}} euros brutos
                                </a>

                            </p>
                            <div class="collapse" id="collapseExample{{$oferta->id}}">
                                <div class="card card-body text-center">
                                    <h5 class="font-weight-bold card-title">Empresa: {{$oferta->empresa->usuario->name}}
                                        - Inscrito en la oferta desde: {{$oferta->created_at}}</h5>
                                    <p><span class="font-weight-bold">Descripción de la oferta:</span>
                                        {{$oferta->descripcion}}</p>
                                    <p><span class="font-weight-bold">Provincia:</span>
                                        {{$oferta->provincia->region_name}}</p>
                                    <p><span class="font-weight-bold">Contrato:</span> {{$oferta->contrato->nombre}}</p>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </p>
                    </div>





















                </div>

            </div>

        </div>
    </div>
</div>



















@endif

<!--modal-->
<div class="modal fade" id="sitiomodal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3  class="text-center">Entrevistas de trabajo en su agenda</h3>
            </div>
            @foreach ($trabajadorseleccionado as $t)
            
            <h4  class="text-center">Día de la entrevista {{ $t->contacto->getDate() }}<h4>
            <h4  class="text-center">Hora de la entrevista {{ $t->contacto->hora }}<h4>
            @foreach ($t->ofertas as $o)
            <h4  class="text-center">Empresa {{$o->empresa->usuario->name}}<h4>
            <h4  class="text-center">Oferta {{$o->titulo}} - {{$o->salario}}€/brutos<h4>
            
            <h4  class="text-center">Telefono {{$o->empresa->telefono}}<h4>
                <div class="text-center">
                <button class="btn btn-primary">Detalles</button>
</div>
                <hr>
            @endforeach
            @endforeach
        </div>

    </div>
</div>














<!--modal-->
<div class="modal fade" id="sitiomodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/home" method='POST'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">



                    <h3>Añada su experiencia laboral</h3>


                    <button type="button" class="close mx-0 px-0" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row col-12">
                        <div class="form-group col-6">
                            <label for="tituloexp">Puesto</label>
                            @error('tituloexp')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="tituloexp" name="tituloexp"
                                placeholder="puesto ocupado">

                        </div>
                        <div class="form-group col-6">
                            <label for="empresaexp">Empresa</label>
                            @error('empresaexp')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="empresaexp" name="empresaexp"
                                placeholder="Empresa">

                        </div>


                    </div>
                    <div class="form-row col-12">
                        <div class="form-group col-6">
                            <label for="inicioexp">Fecha Incorporacion</label>
                            @error('inicioexp')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="date" class="form-control" id="inicioexp" name="inicioexp">

                        </div>
                        <div class="form-group col-6">
                            <label for="finexp">Fecha Salida</label>
                            @error('finexp')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="date" class="form-control" id="finexp" name="finexp">

                        </div>

                    </div>


                    <div class="form-group col-12">
                        <label for="exp">Categoria Profesional</label>
                        @error('cat')
                        <div class="alert alert-danger">Campo erroneo</div>
                        @enderror
                        <select name="cat" id="cat" class="form-control">
                            @foreach ($categorias as $categoria) {


                            <option value="{{ $categoria->id}}">{{$categoria->nombre}}</option>




                            }
                            @endforeach


                        </select>
                        <input type="hidden" class="form-control" id="userid" name="userid" value="{{ $datos->id }}">

                        <input type="hidden" class="form-control" id="telefonos" name="telefonos">
                        <input type="hidden" class="form-control" id="direcciones" name="direcciones">
                        <input type="hidden" class="form-control" id="provincias" name="provincias">
                        <input type="hidden" class="form-control" id="dnis" name="dnis">
                        <input type="hidden" class="form-control" id="fechas" name="fechas">
                    </div>

                    <div class="form-group col-12">
                        <label for="desexp">Descripcion de la Experiencia</label>
                        @error('desexp')
                        <div class="alert alert-danger">Campo erroneo</div>
                        @enderror
                        <textarea class="form-control" id="desexp" name="desexp"
                            rows="8">Descripcion del puesto</textarea>

                    </div>





                </div>
                <div class="modal-footer">

                    <button class="btn btn-success m-auto btn-xs-block" type="submit">Guardar
                        Experiencia</button>


                </div>


            </div>
        </form>
    </div>
</div>


@endsection