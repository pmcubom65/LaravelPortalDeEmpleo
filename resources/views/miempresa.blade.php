@extends('layouts.app')

@section('content')



<div class="container-fluid">
<!--@include('sidebar')-->
@if($contador===0)
<sidebarempresa-component :user_id="'{{Auth::id()}}'" :esempresa="true"></sidebarempresa-component>
@else
<sidebarempresa-component :user_id="'{{Auth::id()}}'" :esempresa="false"></sidebarempresa-component>
@endif

<div class="row col-10 espacio float-right">


  

        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-user mx-auto" aria-hidden="true"></span><br>Bienvenido Empresa:
                {{ $datos->name }}</h1>

        </div>


    




    <div class="row-fluid col-12 espacio2">
       
        <div class="col-10 text-center mx-auto ">
            <h1><span class="glyphicon glyphicon-list-alt " aria-hidden="true"></span><br>Actualice los datos
            </h1>

           

        </div>
   
    </div>


    <div class="row-fluid col-10  d-inline-block mx-auto">
 
        <div class="col-12 d-inline-block ">
    @if($contador===0)


    <empresa-component  :habilitado="false" 
     :provincias="JSON.parse('{{$provincias->toJson()}}')" 
     :crearempresa="true"
    
    :id="'{{Auth::id()}}'"
    :token="'{{Session::token()}}'" ></empresa-component>
   

    @else
   <!-- @include('formularioempresarelleno')-->
    @endif
        </div>





    </div>
    </div>

</div>


    @endsection