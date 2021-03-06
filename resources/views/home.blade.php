@extends('layouts.app')

@section('content')
<div class="container espacio">


    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Bienvenido {{ Auth::user()->name }}
            </h1>
        </div>
    </div>


    @if(!$trabajador)
    <curriculum-component :hhabilitado="false" :estrabajador="false" :token="'{{Session::token()}}'"
        :provincias="JSON.parse('{{$provincias->toJson()}}')" :nombre="'{{Auth::user()->name}}'"
        :id="'{{Auth::user()->id}}'" :cabecera="true" 
       :region="'Region'" :esarea="false" 
       
       :datostrabajador="{ direccion: '',
                            dni: '',
                            
                            provincia_id : 1,
                            telefono: '',
                            }"

   
        ></curriculum-component>

 

    @else

  


    <miarea-component :hhabilitado="true" :estrabajador="true"  :token="'{{Session::token()}}'"
        :provincias=" JSON.parse('{{$provincias->toJson() }}') " :nombre="'{{Auth::user()->name}}'"
        :id="'{{Auth::id()}}'"  :cabecera="true"  :esarea="true" 
        :datostrabajador="JSON.parse('{{$trabajador->toJson()}}')" :fecha="'{{$trabajador->getDate()}}'"
        :region="'{{$trabajador->hasProvincia->region_name}}'" :candidaturas="JSON.parse('{{$candidaturas->toJson()}}')"
        :soyunaempresa="true" :contactos=" JSON.parse('{{$contactos->toJson() }}') "
       ></miarea-component>


    @endif

    <experiencia-component :hhabilitado="false" :token="'{{Session::token()}}'"
        :categorias="JSON.parse('{{$categorias->toJson()}}')" :id="'{{Auth::id()}}'" >
    </experiencia-component>

</div>


@endsection