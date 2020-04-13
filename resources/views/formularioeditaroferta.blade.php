<form id="editar" method="POST" data-route="{{route('editar', [$oferta->id ])}}">

    @csrf
    <div class="form-row">
        <div class="form-group col-sm-12">
            <label for="nombre">Titulo de la Oferta Laboral</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$oferta->titulo}}">

        </div>


    </div>




    <div class="form-row">
        <div class="form-group col-sm-6">
            <label for="Provincia">Provincia</label>
            <select class="form-control" id="Provincia" name="Provincia">

                <option value="{{$oferta->provincia_id}}" selected hidden>{{$oferta->provincia->region_name}}
                </option>
                @foreach ($provincias as $provincia) {
                <option value="{{ $provincia->id }}">{{ $provincia->region_name }}</option>

                }
                @endforeach



            </select>

        </div>

        <div class="fom-group col-sm-6">
            <label for="Experiencia">Experiencia Mínima</label>
            <select class="form-control" id="Experiencia" name="Experiencia">
                <option value="{{$oferta->experiencia_id}}" selected hidden>{{$oferta->experiencia->nombre}}
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
            <label for="Salario">Salario bruto anual Jornada Completa</label>
            <input type="range" min="12000" max="50000" value="{{$oferta->salario}}" class="form-control" id="Salarioid"
                name="Salarioid" oninput="mioutid.value=Salarioid.value.concat(' € brutos')">
            <output name="miout" id="mioutid">{{$oferta->salario}} € brutos<output>
        </div>

        <div class="fom-group col-sm-6">
            <label for="contrato">Tipo de Contrato</label>
            <select class="form-control" id="contrato" name="contrato">
                <option value="{{$oferta->contrato_id}}" selected hidden>{{$oferta->contrato->nombre}}</option>
                @foreach ($contratos as $contrato)

                <option value="{{ $contrato->id}}">{{$contrato->nombre}}</option>

                @endforeach

            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-sm-12">


            <label for="exp">Descripcion de la Oferta</label>
            <textarea class="form-control" id="oferta" name="oferta" rows="8">{{$oferta->descripcion}}</textarea>

        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12">

            <label for="exp">Categoria Profesional</label>
            <select name="cat" id="cat" class="form-control">
                <option value="{{$oferta->categoria_id}}" selected hidden>{{$oferta->categoria->nombre}}
                </option>

                @foreach ($categorias as $categoria)

                <option value="{{ $categoria->id}}">{{$categoria->nombre}}</option>

                @endforeach

            </select>
        </div>
    </div>
    <div id="mismensajes">





    </div>



    <div class="form-row my-3 fuera">


        <a href="" class="btn btn-warning btn-lg m-auto" data-toggle="modal" id="botoncatmodal"
            data-target="#sitiocategoriamodal">Añadir una nueva categoria si ninguna
            coincide</a>


    </div>

    <div class="form-row my-3 fuera">


        <button class="btn btn-success m-auto btn-lg" type="submit" id="botoneditar">Editar Oferta</button>


    </div>




</form>
@include('crearcategoria')