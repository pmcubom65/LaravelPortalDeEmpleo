@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebarbusqueda')
    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span><br>Resultados de la busqueda</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">
            <div class="card text-center">
  <div class="card-header">
   <p>Resultados</p>
  </div>

  @foreach($resultados as $oferta)
  <div class="card-body" id="{{$oferta->id}}">
    <h5 class="card-title">{{$oferta->titulo}} - {{$oferta->categoria->nombre}}</h5><br>
    <br>{{$oferta->provincia->region_name}}
    <br>{{$oferta->contrato->nombre}}
    <br>Salario {{$oferta->salario}}
    <a href="#" id="marcar" class="btn btn-primary">Ver Oferta</a>
    <hr class="text-white">
    @endforeach


  </div>
</div>


            </div>


  


            <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

            </script>
            <script src="{{asset('js/search.js')}}" type="text/javascript"></script>



        </div>
    </div>

</div>


@endsection