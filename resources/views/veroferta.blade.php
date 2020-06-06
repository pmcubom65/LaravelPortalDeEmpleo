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
                        :habilitado="true"

                        :contrato_id="'{{$oferta->contrato_id}}'"
                        :contrato="'{{$oferta->contrato->nombre}}'"

                        :relato="'{{$oferta->descripcion}}'"
                        :categoria_id="'{{$oferta->categoria_id}}'"
                        :categoria="'{{$oferta->categoria->nombre}}'"

                        :usuario="'{{Auth::id()}}'"
                        :token="'{{Session::token()}}'"
                        :crearoferta="false"
                        
                        :abierto="'{{$oferta->proceso}}'"
                       >
                    </oferta-component>


           <!--     <form id="inscribirse" method="POST" data-route="{{ route('apuntarse', $oferta->id) }}">

                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="nombre">Titulo de la Oferta Laboral</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                value="{{$oferta->titulo}}" disabled>

                        </div>


                    </div>




                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="Provincia">Provincia</label>
                            <select class="form-control" id="Provincia" name="Provincia" disabled>

                                <option value="{{$oferta->provincia_id}}" selected disabled hidden>
                                    {{$oferta->provincia->region_name}}</option>




                            </select>

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="Experiencia">Experiencia Mínima</label>
                            <select class="form-control" id="Experiencia" name="Experiencia" disabled>
                                <option value="{{$oferta->experiencia_id}}" selected disabled hidden>
                                    {{$oferta->experiencia->nombre}}</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="Salario">Salario bruto anual Jornada Completa</label>
                            <input type="text" class="form-control" id="Salarioid" name="Salarioid" disabled
                                value="{{$oferta->salario}}">

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="contrato">Tipo de Contrato</label>
                            <select class="form-control" id="contrato" name="contrato" disabled>
                                <option value="{{$oferta->contrato_id}}" selected disabled hidden>
                                    {{$oferta->contrato->nombre}}</option>


                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">


                            <label for="exp">Descripcion de la Oferta</label>
                            <textarea class="form-control" id="oferta" disabled name="oferta"
                                rows="8">{{$oferta->descripcion}}</textarea>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">

                            <label for="exp">Categoria Profesional</label>
                            <select name="cat" id="cat" class="form-control" disabled>
                                <option value="{{$oferta->categoria_id}}" selected disabled hidden>
                                    {{$oferta->categoria->nombre}}</option>



                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="usu" id="usu" value="{{Auth::id()}}">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                    <div class="form-row">
                        <div class="col-12" id="mensajesinsc">
                        </div>
                    </div>


                    <div class="form-row my-3 fuera">
                    @if ($oferta->proceso == 1)

                        <button class="btn btn-success m-auto btn-lg" type="submit" id="botonsub">Inscribirse</button>
                    @endif

                    </div>




                </form>-->


            </div>


            </section>


  <!--          <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

            </script>
            <script src="{{asset('js/inscribirse.js')}}" type="text/javascript"></script>-->



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