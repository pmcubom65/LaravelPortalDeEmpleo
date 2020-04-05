@extends('layouts.app')

@section('content')



<div class="container-fluid">
<div id="sideBar" class="col-2 pb-0 inicio espacio ">
            <h3 class="text-center"><a href=""><span class="misiconos glyphicon glyphicon-briefcase  text-light"></span><br></a>Datos de la Empresa</h3>
            
            <h3 class="text-center"><a href=""><span class="misiconos glyphicon glyphicon-bullhorn  text-light"></span></a>Publicar Nueva Oferta</h3>
            <h3 class="text-center"><a href=""><span class="misiconos glyphicon glyphicon-paperclip  text-light"></span></a>Revisar ofertas publicadas</h3>
</div>
<div class="row col-10 espacio float-right">


  

        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-user mx-auto" aria-hidden="true"></span><br>Bienvenido Empresa:
                {{ $datos->name }}</h1>

        </div>


    




    <div class="row-fluid col-12 espacio2">
       
        <div class="col-10 text-center mx-auto ">
            <h1><span class="glyphicon glyphicon-list-alt " aria-hidden="true"></span><br>Actualice los datos
            </h1>

        </div>

    </div>


    <div class="row-fluid col-10  d-inline-block mx-auto">
 
        <div class="col-12 d-inline-block ">
            <form method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-6 ">
                        <label for="nombrer">Nombre del Representante</label>
                        <input type="text" class="form-control" id="nombrer" name="nombrer"
                            placeholder="nombre del representante">

                    </div>

                    <div class="fom-group col-6 ">
                        <label for="apellidos">Apellidos del Representante</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos">
                    </div>
                </div>




                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="cif">CIF de la empresa</label>
                        <input type="text" class="form-control" id="cif" name="cif" placeholder="CIF">

                    </div>

                    <div class="fom-group col-sm-6  ">
                        <label for="direccion">Direccion de la empresa</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12   ">
                        <label for="Provincia">Provincia de la empresa</label>
                        <select class="form-control" id="Provincia" name="Provincia">
                            <option value="" selected disabled hidden>Elija su provincia</option>
                            @foreach ($provincias as $provincia) {
                            <option value="{{ $provincia->id }}">{{ $provincia->region_name }}</option>

                            }
                            @endforeach

                        </select>

                    </div>


                </div>








                <div class="form-row">
                    <div class="form-group col-sm-6  ">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">

                    </div>

                    <div class="fom-group col-sm-6  ">
                        <label for="fecha">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha" name="fecha">
                    </div>
                </div>



                <div class="form-row my-3">


                    <button onClick="getMessage()" class="btn btn-success m-auto"><span
                            class="glyphicon glyphicon-ok"></span> Actualizar Datos</a>


                </div>

                <div id="msg" class="h3 text-center d-none">Datos Actualizados</div>


            </form>


        </div>


        </section>


        <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        $(document).ready(function() {

                function getMessage() {
                    $.ajax({
                        type: 'POST',
                        url: '/empresa/{{ $datos->id }}',
                        data: '_token = <?php echo csrf_token() ?>',
                        success: function(data) {
                            $("#msg").html(data.msg);
                        }
                    });




                });







            function formSuccess() {
                $("#msgSubmit").removeClass("hidden");
            }
        }
        </script>



    </div>
    </div>

</div>


    @endsection