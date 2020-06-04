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
  <div class="card-header d-none d-lg-block">
   <h4 class="font-weight-bold my-2 py-2">Haga click en la oferta deseada y elija en la barra de menú "Ver oferta seleccionada"</h4>
  </div>

  @foreach($resultados as $oferta)
  <!--<div class="card-body px-0 py-2" id="{{$oferta->id}}">
    <h5 class="card-title">{{$oferta->titulo}} - {{$oferta->categoria->nombre}}</h5>
    <br>{{$oferta->provincia->region_name}}
    <br>{{$oferta->contrato->nombre}}
    <br>Salario {{$oferta->salario}} euros/año
    
    <hr class="text-white">-->
    <resultados-component   :id="'{{$oferta->id}}'"
          :titulo ="'{{$oferta->titulo}}'" 
          :nombre="'{{$oferta->categoria->nombre}}'"
          :region="'{{$oferta->provincia->region_name}}'"
          :contrato="'{{$oferta->contrato->nombre}}'"
          :salario="'{{$oferta->salario}}'"></resultados-component>

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