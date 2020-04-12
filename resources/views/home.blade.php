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

        <h4 class="text-center">Su curriculum está dado de alta correctamente</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            Alguno de los campos no está correctamente relleno
        </div>
        @endif
    </div>
</div>

<section class="espacio">



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
                        <a class="nav-link active btn-lg " id="nav-pills-01" data-toggle="pill" href="#nav-item-01">Datos
                            Personales</a>

                    </li>
                    <li class="nav-item  btn-xs-block">
                        <a class="nav-link btn-lg" id="nav-pills-02" data-toggle="pill" href="#nav-item-02">Experiencias
                            Laborales</a>

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

                                <a href="/home/Expe/{{$experiencia->id}}" class="btn btn-primary btn-xs-block ">Editar o Borrar</a>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <div class="tab-pane fade" id="nav-item-03" role="tabpanel">

                  


                    <p>
                        @foreach ($trabbusc->ofertasempleo as $oferta)
                        @foreach ($oferta->titulo as $titulo)
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">{{$titulo}}</a>
  @endforeach
</p>

<div class="row">
@foreach ($oferta->descripcion as $descripcion)
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
      
      {{$descripcion}}
      </div>
    </div>
  </div>
  @endforeach

</div>
@endforeach




















                    </div>

                </div>

            </div>
        </div>
    </div>



















    @endif
    <!--modal-->
    <div class="modal fade" id="sitiomodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/home" method='POST' >
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
                            <input type="hidden" class="form-control" id="userid" name="userid"
                                value="{{ $datos->id }}">

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

                        <button class="btn btn-success m-auto btn-xs-block" type="submit" >Guardar
                            Experiencia</button>


                    </div>


                </div>
            </form>
        </div>
    </div>


    @endsection