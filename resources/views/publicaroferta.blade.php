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
                            <select class="form-control" id="Provincia" name="Provincia"></select>

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="Experiencia">Experiencia Mínima</label>
                            <select class="form-control" id="Experiencia" name="Experiencia">
                                <option value="0">Sin Experiencia
                                <option>
                                <option value="1">1 año
                                <option>
                                <option value="2">2 años
                                <option>
                                <option value="3">3 años
                                <option>
                                <option value="4">mas de 3
                                <option>
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
                                <option value="Jornada Completa">Jornada Completa
                                <option>
                                <option value="Jornada Parcial">Jornada Parcial
                                <option>

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
                            <select name="cat" id="cat" class="form-control"></select>
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


@endsection