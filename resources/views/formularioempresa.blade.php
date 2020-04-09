<form id="empresaform" method="POST" data-route="{{route('empresa', [$datos->id ])}}">
                @csrf
             



                <div class="form-row">
                    <div class="form-group col-6 ">
                        <label for="nombrer">Nombre del Representante</label>
                   
                        <input type="text" class="form-control" id="nombrer" name="nombrer"
                         >

                    </div>

                    <div class="fom-group col-6 ">
                        <label for="apellidos">Apellidos del Representante</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos"  >
                    </div>
                </div>




                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="cif">CIF de la empresa</label>
                        <input type="text" class="form-control" id="cif" name="cif" >

                    </div>

                    <div class="fom-group col-sm-6  ">
                        <label for="direccion">Direccion de la empresa</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12   ">
                        <label for="Provincia">Provincia de la empresa</label>
                        <select class="form-control" id="Provincia" name="Provincia">
                        <option  value="" selected >
                                    Elija provincia</option>
                            @foreach ($provincias as $provincia) 
                            <option value="{{ $provincia->id }}">{{ $provincia->region_name }}</option>

                            
                            @endforeach

                        </select>

                    </div>


                </div>








                <div class="form-row">
                    <div class="form-group col-sm-6  ">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">

                    </div>

                    <div class="fom-group col-sm-6  ">
                        <label for="num">Número de empleados</label>
                        <input type="text" class="form-control" id="num" name="num">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                <div id="messages" class="text-center">
                
                </div>
                </div>

                <div class="form-row my-3">
               


                    <button type="submit" class="btn btn-success m-auto"><span
                            class="glyphicon glyphicon-ok"></span> Actualizar Datos</button>


                </div>

                


            </form>