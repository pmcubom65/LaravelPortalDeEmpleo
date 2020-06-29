@extends('layouts.app')

@section('content')


<miarea-component :hhabilitado="true" :estrabajador="true"  :token="'{{Session::token()}}'"
        :provincias=" JSON.parse('{{$provincias->toJson() }}') " :nombre="'{{Auth::user()->name}}'"
        :id="'{{Auth::id()}}'"  :cabecera="true"  :esarea="true" 
        :datostrabajador="JSON.parse('{{$trabajador->toJson()}}')" :fecha="'{{$trabajador->getDate()}}'"
        :region="'{{$trabajador->hasProvincia->region_name}}'" :candidaturas="JSON.parse('{{$candidaturas->toJson()}}')"
       ></miarea-component>


    <experiencia-component :hhabilitado="false" :token="'{{Session::token()}}'"
        :categorias="JSON.parse('{{$categorias->toJson()}}')" :id="'{{Auth::id()}}'" :hhabilitado="false">
    </experiencia-component>


@endsection