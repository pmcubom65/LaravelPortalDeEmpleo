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
    <section class="espacio">
    <empresa-component :habilitado="true" 
                     :id="'{{Auth::id()}}'" :token="'{{Session::token()}}'"
                    :apellidos="'{{$datosemp->apellidos}}'"  :cif="'{{$datosemp->cif}}'"
                    :domicilio="'{{$datosemp->domicilio}}'"  :latitud="'{{$datosemp->latitud}}'" 
                    :longitud="'{{$datosemp->longitud}}'"  :nombre="'{{$datosemp->nombre}}'"
                    :numero_empleados="Number('{{$datosemp->numero_empleados}}')"
                    :provincia_id="Number('{{$datosemp->provincia_id}}')" :region="'{{$datosemp->provincia->region_name}}'"
                    :telefono ="'{{$datosemp->telefono}}'" :editar="false">               
      
                    </empresa-component>
    </section>
    

    @endif






</div>
@endsection