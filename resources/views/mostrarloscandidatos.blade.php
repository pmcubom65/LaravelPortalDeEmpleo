@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebar')
    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br>Candidatos a la oferta</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">
            <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs  card-header-tabs">
                    <li class="nav-item active btn-xs-block"><a class="nav-link" data-toggle="tab" href="#inscritos"><h5 class="font-weight-bolder" >Inscritos</h5></a></li>
                    <li class="nav-item btn-xs-block"><a class="nav-link" data-toggle="tab" href="#seleccionados"><h5 class="font-weight-bolder" >Seleccionados</h5></a></li>
                    <li class="nav-item btn-xs-block"><a class="nav-link" data-toggle="tab" href="#descartados"><h5 class="font-weight-bolder" >Descartados</h5></a></li>
                </ul>
            </div>
            <div class="card-body text-center">
                <div class="tab-content">
                    <div id="inscritos" class="tab-pane fade show active">
                    @foreach($trabajadores as $trabajador)
                            @if(is_null($trabajador->pivot->seleccionado))
                            @include('datoscandidatos')
                            @endif
                        @endforeach
                    </div>
                    <div id="seleccionados" class="tab-pane fade">
                    @foreach($trabajadores as $trabajador)
                    @if($trabajador->pivot->seleccionado==1)
                    
                            @include('datoscandidatos')
                            @endif
                            @endforeach
                        <button type="button"  class="btn btn-success btn-lg  btn-block font-weight-bold" >Contactar con {{$trabajador->user->name}}</button>
                    </div>
                    <div id="descartados" class="tab-pane fade">
                    @foreach($trabajadores as $trabajador)
                    @if($trabajador->pivot->seleccionado==0)
                    @include('datoscandidatos')
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