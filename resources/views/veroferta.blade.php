@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebarveroferta')
    <div class="row col-10 espacio2 float-right">




         <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">

                <form id="inscribirse" method="POST" data-route="{{ route('apuntarse', $oferta->id) }}">
                    
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

                                <option value="{{$oferta->provincia_id}}" selected disabled hidden>{{$oferta->provincia->region_name}}</option>




                            </select>

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="Experiencia">Experiencia Mínima</label>
                            <select class="form-control" id="Experiencia" name="Experiencia" disabled>
                                <option value="{{$oferta->experiencia_id}}" selected disabled hidden>{{$oferta->experiencia->nombre}}</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="Salario">Salario bruto anual Jornada Completa</label>
                            <input type="text" class="form-control"
                                id="Salarioid" name="Salarioid"  disabled value="{{$oferta->salario}}">
                           
                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="contrato">Tipo de Contrato</label>
                            <select class="form-control" id="contrato" name="contrato" disabled>
                                <option value="{{$oferta->contrato_id}}" selected disabled hidden>{{$oferta->contrato->nombre}}</option>


                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">


                            <label for="exp">Descripcion de la Oferta</label>
                            <textarea class="form-control" id="oferta"  disabled name="oferta"
                                rows="8">{{$oferta->descripcion}}</textarea>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">

                            <label for="exp">Categoria Profesional</label>
                            <select name="cat" id="cat" class="form-control" disabled>
                                <option value="{{$oferta->categoria_id}}" selected disabled hidden>{{$oferta->categoria->nombre}}</option>



                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="usu" id="usu" value="{{Auth::id()}}">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                 
                   
                    <div  id="mensajesinsc">





                    </div>



                    <div class="form-row my-3 fuera">


                        <button class="btn btn-success m-auto btn-lg" type="submit" id="botonsub">Inscribirse</button>


                    </div>




                </form>

            </div>


            </section>


            <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

            </script>
            <script src="{{asset('js/inscribirse.js')}}" type="text/javascript"></script>



        </div>
    </div>

</div>



@endsection