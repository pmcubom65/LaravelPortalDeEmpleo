@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebar')
    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-send" aria-hidden="true"></span><br>Publique una nueva
                oferta de trabajo</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">

                <form>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="nombre">Titulo de la Oferta Laboral</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                placeholder="Titulo de la Oferta Laboral">

                        </div>


                    </div>




                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="Provincia">Provincia</label>
                            <select class="form-control" id="Provincia" name="Provincia">

                                <option value="" selected disabled hidden>Elija su provincia</option>
                                @foreach ($provincias as $provincia) {
                                <option value="{{ $provincia->id }}">{{ $provincia->region_name }}</option>

                                }
                                @endforeach



                            </select>

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="Experiencia">Experiencia Mínima</label>
                            <select class="form-control" id="Experiencia" name="Experiencia">
                                <option value="" selected disabled hidden>Elija tiempo de experiencia laboral</option>
                                @foreach ($experiencias as $experiencia) {
                                <option value="{{ $experiencia->id }}">{{ $experiencia->nombre }}</option>

                                }
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="Salario">Salario bruto anual Jornada Completa</label>
                            <input type="range" min="12000" max="50000" value="12000" class="form-control"
                                id="Salarioid" name="Salario"
                                oninput="mioutid.value=Salarioid.value.concat(' € brutos')">
                            <output name="miout" id="mioutid">12000 € brutos<output>
                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="contrato">Tipo de Contrato</label>
                            <select class="form-control" id="contrato" name="contrato">
                                <option value="" selected disabled hidden>Elija tipo de contrato</option>
                                @foreach ($contratos as $contrato)

                                <option value="{{ $contrato->id}}">{{$contrato->nombre}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">


                            <label for="exp">Descripcion de la Oferta</label>
                            <textarea class="form-control" id="oferta" name="oferta"
                                rows="8">Descripcion del puesto</textarea>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">

                            <label for="exp">Categoria Profesional</label>
                            <select name="cat" id="cat" class="form-control">
                                <option value="" selected disabled hidden>Elija categoria</option>
                                
                                @foreach ($categorias as $categoria)

                                <option value="{{ $categoria->id}}">{{$categoria->nombre}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>



                    <div class="form-row my-3">


                        <a href="" class="btn btn-warning m-auto" data-toggle="modal"
                            data-target="#sitiocategoriamodal">Añadir una nueva categoria si ninguna
                            coincide</a>


                    </div>

                    <div class="form-row my-3">


                        <a href="#" class="btn btn-success m-auto">Publicar Oferta</a>


                    </div>




                </form>

            </div>


            </section>


            <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

            </script>
            <script src="{{asset('js/empresa.js')}}" type="text/javascript"></script>



        </div>
    </div>

</div>



<!--modal categorias-->
<div class="modal fade" id="sitiocategoriamodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="categoria-data" method="POST" data-route="{{route('oferta', [$datos->id ])}}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">



                    <div class="form-row col-12">

                        <div class="form-group col-12">
                            <label for="catname">Nombre de la Categoria</label>
                            <input type="text" class="form-control" id="catname" name="catname"
                                placeholder="Nombre de la Categoria">

                        </div>


                    </div>


                    <button type="button" class="close mx-0 px-0" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="desccat">Descripcion de la Categoria</label>
                            <textarea class="form-control" id="desccat" name="desccat"
                                rows="8">Descripcion de la Categoria</textarea>

                        </div>

                    </div>
                    <div class="form-row text-center">

                        <div class="form-group col-12 text-center">
                            <div id="mismensajes" class="text-center"></div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">


                    <button class="btn btn-success m-auto" type="submit">Guardar
                        Categoria</button>


                </div>


            </div>
        </form>
    </div>
</div>
<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

</script>
<script src="{{asset('js/oferta.js')}}" type="text/javascript"></script>

@endsection