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

    <section class="espacio">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><br>Complete su
                        curriculum</h1>

                </div>


            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-sm-12 col-md-10 col-lg-8">
                    <form>
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="nombre">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre"
                                    value="{{ $datos->name }}" disabled>

                            </div>


                        </div>




                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="dni">DNI</label>
                                @error('dnis')
                                <div class="alert alert-danger">Campo erroneo</div>
                                @enderror
                                <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni"
                                    oninput="dnis.value=dni.value">

                            </div>

                            <div class="fom-group col-sm-6">
                                <label for="direccion">Direccion</label>
                                @error('direcciones')
                                <div class="alert alert-danger">Campo erroneo</div>
                                @enderror
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    placeholder="Direccion" oninput="direcciones.value=direccion.value">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="Provincia">Provincia</label>
                                @error('provincias')
                                <div class="alert alert-danger">Campo erroneo</div>
                                @enderror
                                <select class="form-control" id="Provincia" name="Provincia"
                                    onchange="provincias.value=this.selectedIndex">

                                    @foreach ($provincias as $provincia) {
                                    <option value="{{ $provincia->id }}">{{ $provincia->region_name }}</option>

                                    }
                                    @endforeach

                                </select>

                            </div>


                        </div>








                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="telefono">Telefono</label>
                                @error('telefonos')
                                <div class="alert alert-danger">Campo erroneo</div>
                                @enderror
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="telefono" oninput="telefonos.value=telefono.value">

                            </div>

                            <div class="fom-group col-sm-6">
                                <label for="fecha">Fecha de nacimiento</label>
                                @error('fechas')
                                <div class="alert alert-danger">Campo erroneo</div>
                                @enderror
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                    oninput="fechas.value=fecha.value">
                            </div>
                        </div>


                        <div class="form-row my-3">


                            <a href="" class="btn btn-primary m-auto" data-toggle="modal"
                                data-target="#sitiomodal">Añadir Experiencia</a>


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

@else

<div class="card">


    <div class="card-body">

        <h4>Su curriculum está dado de alta correctamente</h4>
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
                    <li class="nav-item">
                        <a class="nav-link active btn-lg" id="nav-pills-01" data-toggle="pill" href="#nav-item-01">Datos
                            Personales</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-lg" id="nav-pills-02" data-toggle="pill" href="#nav-item-02">Experiencias Laborales</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-lg" id="nav-pills-03" data-toggle="pill" href="#nav-item-03">Candidaturas</a>

                    </li>


                </ul>
                <div class="tab-content" id="nav-pills-content">

                <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">
                <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><br>Actualice su
                    curriculum</h1>

            </div>


        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre"
                                value="{{ $datos->name }}" disabled>

                        </div>


                    </div>




                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="dni">DNI</label>
                            @error('dnis')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni"
                                value="{{$curriculum->dni}}" oninput="dnis.value=dni.value">

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="direccion">Direccion</label>
                            @error('direcciones')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Direccion" oninput="direcciones.value=direccion.value"
                                value="{{$curriculum->direccion}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="Provincia">Provincia</label>
                            @error('provincias')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <select class="form-control" id="Provincia" name="Provincia"
                                onchange="provincias.value=this.selectedIndex">
                                <option value="" selected disabled hidden>Choose here</option>
                                @foreach ($provincias as $provincia) {
                                @if ($provincia->id===$curriculum->provincia_id)
                                <option value="{{ $provincia->id }}" selected="selected">
                                    {{ $provincia->region_name }}
                                </option>
                                @else
                                <option value="{{ $provincia->id }}">{{ $provincia->region_name }}</option>
                                @endif
                                }
                                @endforeach

                            </select>

                        </div>


                    </div>








                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="telefono">Telefono</label>
                            @error('telefonos')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono"
                                oninput="telefonos.value=telefono.value" value="{{$curriculum->telefono}}">

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="fecha">Fecha de nacimiento</label>
                            @error('fechas')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="date" class="form-control" id="fecha" name="fecha"
                                oninput="fechas.value=fecha.value" value="{{ $curriculum->getDate()}}">
                        </div>
                    </div>


                    <div class="form-row my-3">


                        <a href="" class="btn btn-primary m-auto" data-toggle="modal" data-target="#sitiomodal">Añadir
                            Experiencia</a>


                    </div>

                    <div class="form-row my-3">


                        <a href="#" class="btn btn-success m-auto">Guardar Curriculum</a>


                    </div>




                </form>


            </div>
        </div>


    </div>

                            </div>
                            <div class="tab-pane fade" id="nav-item-02" role="tabpanel">
                            @foreach ($experienciass as $experiencia) 

                            <div class="card">
  <h5 class="card-header">{{$experiencia->puesto}} - {{$experiencia->categoria->nombre}}</h5>
  <div class="card-body">
    <h5 class="card-title">{{$experiencia->empresa}}</h5>
    <p class="card-text">{{$experiencia->descripcion}}</p>
    <p class="card-text">{{$experiencia->inicio}}</p>
    <p class="card-text">{{$experiencia->fin}}</p>
    <a href="#" class="btn btn-primary">Editar</a>
    <a href="#" class="btn btn-primary">Borrar</a>
  </div>
</div>

    @endforeach

                            </div>
                            <div class="tab-pane fade" id="nav-item-03" role="tabpanel">

dsaasdasdf
                            </div>

            </div>

        </div>
    </div>
</div>



















@endif
<!--modal-->
<div class="modal fade" id="sitiomodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/home" method='POST'>
            @csrf
            <div class="modal-content">
                <div class="modal-header">



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










                    <button type="button" class="close mx-0 px-0" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
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

                    <button class="btn btn-success m-auto" type="submit">Guardar
                        Experiencia</button>


                </div>


            </div>
        </form>
    </div>
</div>


@endsection