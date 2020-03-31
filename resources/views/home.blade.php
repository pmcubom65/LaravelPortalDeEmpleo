@extends('layouts.app')

@section('content')
<div class="container espacio">


    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Bienvenido {{ $datos->name }}</h1>

        </div>


    </div>

    @if( $trabajador ===0)
        
    

    <div class="card">
     

        <div class="card-body">

            <h4>No tienes ningún curriculum dado de alta por el momento</h4>
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
                            <div class="form-group col-sm-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre"
                                    value="{{ $datos->name }}">

                            </div>

                            <div class="fom-group col-sm-6">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos"
                                    placeholder="apellidos">
                            </div>
                        </div>




                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni">

                            </div>

                            <div class="fom-group col-sm-6">
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" id="direccion" name="direccion"
                                    placeholder="Direccion">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="Provincia">Provincia</label>
                                <select class="form-control" id="Provincia" name="Provincia">
                                
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
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="telefono">

                            </div>

                            <div class="fom-group col-sm-6">
                                <label for="fecha">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">
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
                        <select name="cat" id="cat" class="form-control">
                        @foreach ($categorias as $categoria) {
                            
                            
                            <option value="{{ $categoria->id}}">{{$categoria->nombre}}</option>
                            
                            
                            
                            
                        }
                        @endforeach
                        
                        
                        </select>
                        <input type="hidden"  class="form-control" id="userid" name="userid" value="{{ $datos->id }}" >

                    </div>

                    <div class="form-group col-12">
                        <label for="exp">Descripcion de la Experiencia</label>
                        <textarea class="form-control" id="desexp" name="desexp" rows="8">Descripcion del puesto</textarea>

                    </div>





                </div>
                <div class="modal-footer">

                    <button class="btn btn-success m-auto" type="submit" >Guardar
                        Experiencia</button>


                </div>


            </div>
        </form>
    </div>
</div>


@endsection