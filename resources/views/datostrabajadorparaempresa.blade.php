@extends('layouts.app')

@section('content')


<miarea-component :hhabilitado="true" :estrabajador="true"  
        :id="'{{$trabajador->user_id}}'"  :cabecera="true"  :esarea="true" 
        :datostrabajador="JSON.parse('{{$trabajador->toJson()}}')" :fecha="'{{$trabajador->getDate()}}'"
        :region="'{{$trabajador->hasProvincia->region_name}}'" :hhabilitado="true" :cabecera="false" :token="'{{Session::token()}}'"
        :soyunaempresa="false" :nombre="'{{$usuario->name}}'"

       ></miarea-component>


    <experiencia-component   :token="'{{Session::token()}}'"
    :id="'{{$trabajador->user_id}}'" :hhabilitado="true">
    </experiencia-component>


@endsection