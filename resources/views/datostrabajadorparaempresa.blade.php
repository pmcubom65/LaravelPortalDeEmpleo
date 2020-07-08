@extends('layouts.app')

@section('content')
<div class="container-fluid">


    <sidebarvolver-component :id="Number('Auth::id()')" :oferta="Number('{{$oferta_id}}')"
    ></sidebarvolver-component>

    <div class="row col-10 espacio2 float-right">


        <div class="col-10 text-center mx-auto">

            <miarea-component :hhabilitado="true" :estrabajador="true" :id="'{{$trabajador->user_id}}'" :cabecera="true"
                :esarea="true" :datostrabajador="JSON.parse('{{$trabajador->toJson()}}')"
                :fecha="'{{$trabajador->getDate()}}'" :region="'{{$trabajador->hasProvincia->region_name}}'"
                :hhabilitado="true" :cabecera="false" :token="'{{Session::token()}}'" :soyunaempresa="false"
                :nombre="'{{$usuario->name}}'"
               
                
                
                ></miarea-component>

        </div>



    </div>


    <experiencia-component :token="'{{Session::token()}}'" :id="'{{$trabajador->user_id}}'"  :hhabilitado="true">
    </experiencia-component>
</div>

@endsection