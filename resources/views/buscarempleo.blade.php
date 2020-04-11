        <!--Esto es para la busqueda de ofertas de trabajo -->


        <section id="buscar" class="espacio">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1><span class="glyphicon glyphicon-send" aria-hidden="true"></span><br>Buscar ofertas de
                            Empleo
                        </h1>
                        <h3>Seleccione criterios</h3>
                    </div>


                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <form method="GET" action="\search">
                            @csrf

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
                                    <label for="Experiencia">Experiencia Máxima</label>
                                    <select class="form-control" id="Experiencia" name="Experiencia">
                                        <option value="" selected disabled hidden>Elija tiempo de experiencia laboral
                                        </option>
                                        @foreach ($experiencias as $experiencia) {
                                        <option value="{{ $experiencia->id }}">{{ $experiencia->nombre }}</option>

                                        }
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="Salario">Salario mínimo requerido al año</label>
                                    <input type="range" min="11999" max="50000" value="12000" class="form-control"
                                        id="Salarioid" name="Salarioid" oninput="mioutid.value= (Salarioid.value < 12000) ? 'Cualquier Salario' :                                         
                                            Salarioid.value.concat(' € brutos')">


                                    <output name="miout" id="mioutid">Cualquier Salario<output>
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


                                <button type="submit" class="btn btn-success m-auto">Realizar Búsqueda</button>


                            </div>




                        </form>


                    </div>
                </div>


            </div>


        </section>