@extends('layouts.app')

@section('content')
<div class="container espacio">

@if ($contador>0)
    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Experiencia {{ $miexpe->puesto }}</h1>

        </div>


    </div>

    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display: {{$midisplay}}">
  <strong>La Experiencia ha quedado editada</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
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


                    <div class="form-row col-12">
                        <label for="exp">Categoria Profesional</label>
                        @error('cat')
                        <div class="alert alert-danger">Campo erroneo</div>
                        @enderror
                        <select name="cat" id="cat" class="form-control">
                        <option value="{{ $miexpe->categoria_id}}" selected>{{$miexpe->categoria->nombre}}</option>
                            @foreach ($categorias as $categoria) 
                           
                            <option value="{{ $categoria->id}}">{{$categoria->nombre}}</option>
                            
                            @endforeach


                        </select>

                    </div>

                    <div class="form-row col-12">
                        <label for="desexp">Descripcion de la Experiencia</label>
                        @error('desexp')
                        <div class="alert alert-danger">Campo erroneo</div>
                        @enderror
                        <textarea class="form-control" id="desexp" name="desexp"
                            rows="8">{{$miexpe->descripcion}}</textarea>

                    </div>
                    <div class="row  justify-content-center">
                    <div class="form-group col-3  text-center my-5" >
                    
                    <button class="btn btn-success m-auto btn-lg" type="submit">Editar</button>
                    </form>
                    <a href="/home" class="btn btn-primary m-auto  btn-lg" type="button">Volver</a>
                    <button class="btn btn-danger m-auto  btn-lg " type="button" data-toggle="modal"
                                data-target="#sitiomodal">Borrar</button>
                    </div>
                    
                   
                  
                    </div>
                    </div>

                </div>
               

                    
 
        

</div>



<!-- modal -->
<div class="modal fade" id="sitiomodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/home/Expe/{{$miexpe->id}}" method='POST'>
            @method('DELETE')
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

                    

                <input type="hidden" name="mihidden" id="mihidden" >
                <p>¿Esta seguro que desea borrar esta experiencia?</p>


                </div>
                <div class="modal-footer">

                    <button class="btn btn-danger m-auto" type="submit">Confirmar</button>
                    <button class="btn btn-primary m-auto" class="close mx-0 px-0" data-dismiss="modal" type="button">Volver</button>

                </div>


            </div>
        </form>
    </div>
</div>



@else
<div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Esta experiencia ya no se encuentra registrada</h1>
            <a href="/home" class="btn btn-primary m-auto " type="button">Volver</a>

        </div>


    </div>

@endif









@endsection