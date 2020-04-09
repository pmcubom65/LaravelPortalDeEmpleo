@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebar')
    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span><br>Ofertas Publicadas</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">
            <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link font-weight-bolder active" href="#">Proceso Abierto</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link font-weight-bolder" href="#">Proceso Cerrado</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
  @foreach($ofertas as $oferta)
    <h5 class="card-title">{{$oferta->titulo}} - {{$oferta->categoria->nombre}}</h5>
    <p class="card-text">{{$oferta->provincia->region_name}}</p>
    <p class="card-text">{{$oferta->contrato->nombre}}</p>
    <p class="card-text">Salario {{$oferta->salario}}</p>
    <a href="/search/{{$oferta->id}}" class="btn btn-primary">Ver Oferta</a>
    <hr class="text-white">
    @endforeach


  </div>
</div>


            </div>


  


            <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

            </script>
            <script src="{{asset('js/oferta.js')}}" type="text/javascript"></script>



        </div>
    </div>

</div>


@endsection