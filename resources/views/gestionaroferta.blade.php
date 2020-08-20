@extends('layouts.app')

@section('content')



<div class="container-fluid">


    <sidebarempresa-component   :user_id="'{{Auth::id()}}'"
        :esempresa="false"></sidebarempresa-component>



    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span><br>Ofertas Publicadas</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">
            <div class="card">
            <div class="card-header" id="candidatos">
                <ul class="nav nav-tabs  card-header-tabs">
                    <li class="nav-item active"><a class="nav-link" data-toggle="tab" href="#abierto"><h5 class="font-weight-bolder" >Proceso Abierto</h5></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cerrado"><h5 class="font-weight-bolder" >Proceso Cerrado</h5></a></li>
                  
                </ul>
            </div>
            <div class="card-body text-center">
                <div class="tab-content">
                    <div id="abierto" class="tab-pane fade show active">
                    @foreach($ofertas as $oferta)
                     
                         @if ($oferta->proceso=='t')
                            <h5 class="card-title">{{$oferta->titulo}} - {{$oferta->categoria->nombre}}</h5>
                            <p class="card-text">{{$oferta->provincia->region_name}}</p>
                            <p class="card-text">{{$oferta->contrato->nombre}}</p>
                            <p class="card-text">Salario {{$oferta->salario}} €/brutos</p>
                            <a href="/search/{{$oferta->id}}" class="btn btn-primary">Ver Oferta</a>
                            <a href="/empresa/{{Auth::id()}}/published/{{$oferta->id}}" class="btn btn-success">Mostrar Candidatos inscritos</a>
                            <hr class="text-white">
                            @endif
                            @endforeach
                    </div>
                    <div id="cerrado" class="tab-pane fade">
                    @foreach($ofertas as $oferta)
              
                         @if ($oferta->proceso=='f')
                            <h5 class="card-title">{{$oferta->titulo}} - {{$oferta->categoria->nombre}}</h5>
                            <p class="card-text">{{$oferta->provincia->region_name}}</p>
                            <p class="card-text">{{$oferta->contrato->nombre}}</p>
                            <p class="card-text">Salario {{$oferta->salario}}</p>
                            <a href="/search/{{$oferta->id}}" class="btn btn-primary">Ver Oferta</a>
                            <a href="/empresa/{{Auth::id()}}/published/{{$oferta->id}}" class="btn btn-success">Mostrar Candidatos inscritos</a>
                            <hr class="text-white">
                            @endif
                            @endforeach
                    </div>
               
                </div>
                </div>

            </div>
            </div>









        </div>
    </div>

</div>


@endsection