@extends('layouts.app')

@section('content')
<div class="container espacio">


    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Experiencia {{ $miexpe->puesto }}</h1>

        </div>


    </div>
    <form action="/home/Expe/{{$miexpe->id}}" method='POST'>
            @csrf
                <div class="container">
                    <div class="form-row col-12">
                        <div class="form-group col-6">
                            <label for="tituloexp">Puesto</label>
                            @error('tituloexp')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="tituloexp" name="tituloexp"
                                value="{{$miexpe->puesto}}">

                        </div>
                        <div class="form-group col-6">
                            <label for="empresaexp">Empresa</label>
                            @error('empresaexp')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="empresaexp" name="empresaexp"
                                value="{{$miexpe->empresa}}">

                        </div>


                    </div>


                    <div class="form-row col-12">
                        <div class="form-group col-6">
                            <label for="inicioexp">Fecha Incorporacion</label>
                            @error('inicioexp')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="date" class="form-control" id="inicioexp" name="inicioexp" value="{{$miexpe->inicio}}">

                        </div>
                        <div class="form-group col-6">
                            <label for="finexp">Fecha Salida</label>
                            @error('finexp')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="date" class="form-control" id="finexp" name="finexp" value="{{$miexpe->fin}}">

                        </div>

                    </div>


                    <div class="form-group col-12">
                        <label for="exp">Categoria Profesional</label>
                        @error('cat')
                        <div class="alert alert-danger">Campo erroneo</div>
                        @enderror
                        <select name="cat" id="cat" class="form-control">
                            @foreach ($categorias as $categoria) 
                               
                            <option value="{{ $categoria->id}}">{{$categoria->nombre}}</option>

                            @endforeach


                        </select>

                    </div>

                    <div class="form-group col-12">
                        <label for="desexp">Descripcion de la Experiencia</label>
                        @error('desexp')
                        <div class="alert alert-danger">Campo erroneo</div>
                        @enderror
                        <textarea class="form-control" id="desexp" name="desexp"
                            rows="8">{{$miexpe->descripcion}}</textarea>

                    </div>
                    <div class="form-group col-12">
                    <div class="row  justify-content-center">
                    <button class="btn btn-success m-auto " type="submit">Editar</button>
                  
                    </div>
                    <div class="row  justify-content-center">
                    <button class="btn btn-danger m-auto " type="submit">Borrar</button>
                  
                    </div>
                    </div>

                </div>
               

                    
 
        </form>

</div>

@endsection