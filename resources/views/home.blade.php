@extends('layouts.app')

@section('content')
<div class="container espacio">


    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Bienvenido {{ Auth::user()->name }}</h1>
        </div>
    </div>



    @if( $trabajador===0)
    <curriculum-component :hhabilitado="false" :estrabajador="false"  :token="'{{Session::token()}}'"
     :provincias="JSON.parse('{{$provincias->toJson()}}')" :nombre="'{{Auth::user()->name}}'" 
     :id="'{{Auth::user()->id}}'"></curriculum-component>

    @else
    <curriculum-component :hhabilitado="true" :estrabajador="true"  :token="'{{Session::token()}}'"
     :provincias="JSON.parse('{{$provincias->toJson()}}')" :nombre="'{{Auth::user()->name}}'" 
     :id="'{{Auth::user()->id}}'"></curriculum-component>

    @endif



</div>
<experiencia-component  :hhabilitado="false"   :token="'{{Session::token()}}'"
     :categorias="JSON.parse('{{$categorias->toJson()}}')" 
     :id="'{{Auth::user()->id}}'"
     hhabilitado="false"
    ></experiencia-component>

@endsection