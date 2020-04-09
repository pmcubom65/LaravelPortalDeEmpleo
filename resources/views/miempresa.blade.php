@extends('layouts.app')

@section('content')



<div class="container-fluid">
@include('sidebar')
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
    @include('formularioempresa')
    @else
    @include('formularioempresarelleno')
    @endif
        </div>


  


        <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
       
        </script>
        <script src="{{asset('js/empresa.js')}}" type="text/javascript"   ></script>



    </div>
    </div>

</div>


    @endsection