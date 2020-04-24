<section class="espacio">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><br>Complete su
                    curriculum</h1>

            </div>


        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form action="/home" method="POST" >
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre"
                                value="{{ Auth::user()->name }}" disabled>

                        </div>


                    </div>




                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="dni">DNI</label>
                            @error('dnis')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni"
                                oninput="dnis.value=dni.value">

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="direccion">Direccion</label>
                            @error('direcciones')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Direccion" oninput="direcciones.value=direccion.value">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="Provincia">Provincia</label>
                            @error('provincias')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <select class="form-control" id="Provincia" name="Provincia"
                                onchange="provincias.value=this.selectedIndex">
                                <option value="" selected disabled hidden>Elija su provincia</option>
                                @foreach ($provincias as $provincia) {
                                <option value="{{ $provincia->id }}">{{ $provincia->region_name }}</option>

                                }
                                @endforeach

                            </select>

                        </div>


                    </div>








                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="telefono">Telefono</label>
                            @error('telefonos')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono"
                                oninput="telefonos.value=telefono.value">

                        </div>

                        <div class="fom-group col-sm-6">
                            <label for="fecha">Fecha de nacimiento</label>
                            @error('fechas')
                            <div class="alert alert-danger">Campo erroneo</div>
                            @enderror
                            <input type="date" class="form-control" id="fecha" name="fecha"
                                oninput="fechas.value=fecha.value">



                    
                        </div>
                    </div>

                    @if( $trabajador!==0)
                    <div class="form-row my-3">

                                
                        <a href="" class="btn btn-primary m-auto btn-lg btn-xs-block" data-toggle="modal"
                            data-target="#sitiomodal">Añadir Experiencia</a>


                    </div>
                    @endif

                    <div class="form-row my-3">
                    <input type="hidden" class="form-control" id="userid" name="userid"
                                value="{{ Auth::id() }}">

    
                        <button type="submit" class="btn btn-success m-auto btn-lg btn-xs-block">Guardar Curriculum</button>


                    </div>




                </form>


            </div>
        </div>


    </div>

</section>


