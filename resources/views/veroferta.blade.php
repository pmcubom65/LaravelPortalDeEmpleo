@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebarveroferta')
    <div class="row col-10 espacio2 float-right">




        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">

            @if ($oferta->proceso == 0)
                <div class="card">


                    <div class="card-body">

                        <h4 class="text-center">Proceso Cerrado</h4>

                    </div>
                </div>
                <div class="form-row my-3">
                    <div class="col-12 text-center">

                        <button class="editborr btn btn-primary btn-block  m-auto btn-lg" type="button" disabled>Editar oferta</button>

                    </div>
                </div>

                <div class="form-row my-3">
                    <div class="col-12 text-center">

                        <button class="editborr btn btn-danger btn-block    m-auto btn-lg" type="button" disabled data-toggle="modal"
                            data-target="#sitiomodal">Cerrar Proceso</button>

                    </div>
                </div>


            @elseif ($oferta->empresa->usuario->id===Auth::id())
                <div class="form-row my-3">
                    <div class="col-12 text-center">

                        <a href="/search/{{$oferta->id}}/edit" class="editborr btn btn-primary btn-block  m-auto btn-lg" type="button">Editar oferta</a>

                    </div>
                </div>

                <div class="form-row my-3">
                    <div class="col-12 text-center">

                        <button class="editborr btn btn-danger btn-block    m-auto btn-lg" type="button" data-toggle="modal"
                            data-target="#sitiomodal">Cerrar Proceso</button>

                    </div>
                </div>
                @endif

                <oferta-component :id="'{{$oferta->id}}'" :titulo="'{{$oferta->titulo}}'"
                        :provincia_id="'{{$oferta->provincia_id}}'"
                        :region="'{{$oferta->provincia->region_name}}'"
                        :experiencia_id="'{{$oferta->experiencia_id}}'"
                        :experiencia="'{{$oferta->experiencia->nombre}}'"

                        :salario="'{{$oferta->salario}}'"
                       
                        :crearoferta="false"
                        :contrato_id="'{{$oferta->contrato_id}}'"
                        :contrato="'{{$oferta->contrato->nombre}}'"

                        :relato="'{{$oferta->descripcion}}'"
                        :categoria_id="'{{$oferta->categoria_id}}'"
                        :categoria="'{{$oferta->categoria->nombre}}'"

                        :usuario="'{{Auth::id()}}'"
                        :token="'{{Session::token()}}'"
                        
                        :letrero="'Inscribirse'"
                        :abierto="'{{$oferta->proceso}}'"
                        :necesitocategoria="false"
                        :habilitado="true"

                                     
                     
                       >
                    </oferta-component>

            </div>

        </div>
    </div>


    <!-- modal -->
    <div class="modal fade" id="sitiomodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method='POST'>
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">



                        <div class="form-row col-12">
                            Alerta
                        </div>
                        <button type="button" class="close mx-0 px-0" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">



                        <input type="hidden" name="mihidden" id="mihidden">
                        <p>¿Esta seguro que desea terminar el proceso?</p>


                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-danger m-auto" type="submit">Confirmar</button>
                        <button class="btn btn-primary m-auto" class="close mx-0 px-0" data-dismiss="modal"
                            type="button">Volver</button>

                    </div>


                </div>
            </form>
        </div>
    </div>





</div>



@endsection