@extends('layouts.app')

@section('content')



<div class="container-fluid">



<barracandidatos-component    :id="'{{ Auth::id() }}'" :oferta="Number('{{$oferta->id}}')" :token="'{{Session::token()}}'"
        ></barracandidatos-component>






  <div class="row col-10 espacio2 float-right">


         <div class="col-10 text-center mx-auto">
    <mostrarcandidatos-component   :id="Number('{{ Auth::id() }}')" :oferta="Number('{{$oferta->id}}')"></mostrarcandidatos-component>
     <!--        <h1><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br>Candidatos a la oferta</h1>

        </div>
        <div class="col-12 d-inline-block mb-5 ">
                <div class="card text-center">
                    <div class="card-header d-none d-lg-block">
                        <h4 class="font-weight-bold my-2 py-2">Haga click en el candidato y elija en la barra de
                            menú seleccionar o descartar para gestionarlo</h4>
                    </div>

                </div>
        </div>
<div class="row-fluid col-10  d-inline-block mx-auto" >

            <div class="col-12 d-inline-block ">
            <div class="card">
            <div class="card-header" >
                <ul class="nav nav-tabs  card-header-tabs">
                    <li class="nav-item active btn-xs-block"><a class="nav-link" data-toggle="tab" href="#inscritos"><h5 class="font-weight-bolder" >Inscritos</h5></a></li>
                    <li class="nav-item btn-xs-block"><a class="nav-link" data-toggle="tab" href="#seleccionados"><h5 class="font-weight-bolder" >Seleccionados</h5></a></li>
                    <li class="nav-item btn-xs-block"><a class="nav-link" data-toggle="tab" href="#descartados"><h5 class="font-weight-bolder" >Descartados</h5></a></li>
                </ul>
            </div>
            <div class="card-body text-center">
                <div class="tab-content">
                    <div id="inscritos" class="tab-pane fade show active">
                    @if ($trabajadores)
                    @foreach($trabajadores as $trabajador)
                            @if(is_null($trabajador->pivot->seleccionado))
               
                    <datoscandidatos-component :datostrabajador="JSON.parse('{{$trabajador->toJson()}}')" :fecha="'{{$trabajador->getDate()}}'"
                  :region="'{{$trabajador->hasProvincia->region_name}}'" :entrevista="false" :nombre="'{{$trabajador->user->name}}'"
                  :oferta='{{$oferta->id}}' 
                  ></datoscandidatos-component>
                            @endif
                        @endforeach
                    </div>
                    <div id="seleccionados" class="tab-pane fade">
                    @foreach($trabajadores as $trabajador)
                    @if($trabajador->pivot->seleccionado===1)
                    
 
                    <datoscandidatos-component :datostrabajador="JSON.parse('{{$trabajador->toJson()}}')" :fecha="'{{$trabajador->getDate()}}'"
                  :region="'{{$trabajador->hasProvincia->region_name}}'"  :entrevista="true" :nombre="'{{$trabajador->user->name}}'"
                  :oferta='{{$oferta->id}}'  :seleccionado=1
                  ></datoscandidatos-component>
                            @endif
                            @endforeach
                            
                      
                    </div>
                    <div id="descartados" class="tab-pane fade">
                    @foreach($trabajadores as $trabajador)
                    @if($trabajador->pivot->seleccionado===0)
               
                  <datoscandidatos-component :datostrabajador="JSON.parse('{{$trabajador->toJson()}}')" :fecha="'{{$trabajador->getDate()}}'"
                  :region="'{{$trabajador->hasProvincia->region_name}}'" :entrevista="false" :nombre="'{{$trabajador->user->name}}'"
                  :oferta='{{$oferta->id}}'  :seleccionado=0
                  ></datoscandidatos-component>
                            @endif
                            @endforeach
                    </div>
                @else
                        No hay trabajadores apuntados en la oferta
                @endif
                </div>
                </div>

            </div>-->
            </div>





           


        </div>
    </div>

</div>


@endsection