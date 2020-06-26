@extends('layouts.app')

@section('content')



<div class="container-fluid">

    @if(!$datosemp)
    <sidebarempresa-component :user_id="'{{Auth::id()}}'" :esempresa="true"></sidebarempresa-component>
    @else
    <sidebarempresa-component :user_id="'{{Auth::id()}}'" :esempresa="false"></sidebarempresa-component>
    @endif

    <div class="row col-10 espacio float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-piggy-bank mx-auto" aria-hidden="true"></span><br>Bienvenido Empresa:
                {{ Auth::user()->name }}</h1>

        </div>



        <div class="row-fluid col-12 espacio2">

            <div class="col-10 text-center mx-auto ">
                <h1><span class="glyphicon glyphicon-list-alt " aria-hidden="true"></span><br>Actualice los datos
                </h1>



            </div>

        </div>


        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">
                @if(!$datosemp)


                <empresa-component :hhabilitado="false" :provincias="JSON.parse('{{$provincias->toJson()}}')"
                    :crearempresa="true" :id="'{{Auth::id()}}'" :token="'{{Session::token()}}'"  :home="false"
   
                    ></empresa-component>


                @else
              
                
                <empresa-component :hhabilitado="false" :provincias="JSON.parse('{{$provincias->toJson()}}')"
                     :id="'{{Auth::id()}}'" :token="'{{Session::token()}}'"
                    :apellidos="'{{$datosemp->apellidos}}'"  :cif="'{{$datosemp->cif}}'"
                    :domicilio="'{{$datosemp->domicilio}}'"  :latitud="'{{$datosemp->latitud}}'" 
                    :longitud="'{{$datosemp->longitud}}'"  :nombre="'{{$datosemp->nombre}}'"
                    :numero_empleados="Number('{{$datosemp->numero_empleados}}')"
                    :provincia_id="Number('{{$datosemp->provincia_id}}')" :region="'{{$datosemp->provincia->region_name}}'"
                    :telefono ="'{{$datosemp->telefono}}'" :home="false" >               
      

                    </empresa-component>
                @endif
            </div>

        </div>
    </div>

</div>


@endsection