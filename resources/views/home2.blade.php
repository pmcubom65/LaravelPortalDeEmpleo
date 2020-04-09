@extends('layouts.app')

@section('content')
<div class="container espacio2">


    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Bienvenido Empresa:
                {{ $datos->name }}</h1>

        </div>


    </div>
    @include('barraempresa')


    @if ($contador==0)
    <div class="card">


        <div class="card-body">

            <h4>Los datos no están completos por el momento. Acceda a Actualizar Perfil</h4>

        </div>
    </div>






    @else
    <section>
        <div class="row-fluid col-10 espacio2 mx-auto">

            <div class="col-12 d-inline-block mx-auto ">
                <form>





                    <div class="form-row">
                        <div class="form-group col-6 ">
                            <label for="nombrer">Nombre del Representante</label>

                            <input type="text" class="form-control" id="nombrer" name="nombrer"
                            value="{{ $datosemp->nombre }}" disabled  >

                        </div>

                        <div class="fom-group col-6 ">
                            <label for="apellidos">Apellidos del Representante</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                                 value="{{ $datosemp->apellidos }}" disabled>
                        </div>
                    </div>




                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="cif">CIF de la empresa</label>
                            <input type="text" class="form-control" id="cif" name="cif" disabled  value="{{ $datosemp->cif }}">

                        </div>

                        <div class="fom-group col-sm-6  ">
                            <label for="direccion">Direccion de la empresa</label>
                            <input type="text" class="form-control" id="direccion" disabled name="direccion"
                                value="{{ $datosemp->domicilio }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12   ">
                            <label for="Provincia">Provincia de la empresa</label>
                            <select class="form-control" id="Provincia" name="Provincia">
                                <option  value="{{ $datosemp->provincia_id }}" selected disabled hidden>
                                    {{ $datosemp->provincia->region_name }}</option>

                            </select>

                        </div>


                    </div>








                    <div class="form-row">
                        <div class="form-group col-sm-6  ">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                            value="{{ $datosemp->telefono }}" disabled>

                        </div>

                        <div class="fom-group col-sm-6  ">
                            <label for="num">Número de empleados</label>
                            <input type="text" class="form-control" id="num" name="num"
                            value="{{ $datosemp->numero_empleados }}" disabled>
                        </div>
                    </div>





                </form>


            </div>
    </section>
    

    @endif






</div>
@endsection