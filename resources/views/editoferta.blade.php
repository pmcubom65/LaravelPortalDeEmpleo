@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebarveroferta')
    <div class="row col-10 espacio2 float-right">




        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">

 

                <oferta-component :id="'{{$oferta->id}}'" :titulo="'{{$oferta->titulo}}'"
                        :provincia_id="'{{$oferta->provincia_id}}'"
                        :region="'{{$oferta->provincia->region_name}}'"
                        :experiencia_id="'{{$oferta->experiencia_id}}'"
                        :experiencia="'{{$oferta->experiencia->nombre}}'"

                        :salario="'{{$oferta->salario}}'"
                       
                        :crearoferta="true"
                        :contrato_id="'{{$oferta->contrato_id}}'"
                        :contrato="'{{$oferta->contrato->nombre}}'"

                        :relato="'{{$oferta->descripcion}}'"
                        :categoria_id="'{{$oferta->categoria_id}}'"
                        :categoria="'{{$oferta->categoria->nombre}}'"

                        :usuario="'{{Auth::id()}}'"
                        :token="'{{Session::token()}}'"
                        
                        :letrero="'Editar Oferta'"
                        :abierto="'{{$oferta->proceso}}'"
                        :necesitocategoria="true"
                        :habilitado="false"
                        :provincias="JSON.parse('{{$provincias->toJson()}}')"

                        :contratos="JSON.parse('{{$contratos->toJson()}}')"
                        :experiencias="JSON.parse('{{$experiencias->toJson()}}')"
                                     
                        :abierto="'1'"
                       >
                    </oferta-component>
                   
            </div>







        </div>
    </div>


  




</div>



@endsection