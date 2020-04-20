

@extends('layouts.app')



<div class="container-fluid">
    @include('sidebarmapa')
    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><br>Contactar con el candidato</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">
        <form id="contactoform" method="POST" data-route="{{route('contacto', [$datos->id, $laoferta->id ,$eltrabajador->id ])}}">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6 ">
                        <label for="dater">Día de la entrevista</label>
                   
                        <input type="date" class="form-control" id="dater" name="dater"
                         >

                    </div>

                    <div class="fom-group col-md-6 ">
                        <label for="horar">Hora de la entrevista</label>
                        <input type="time" class="form-control" id="horar" name="horar"  >
                    </div>
                </div>
                <h3 class="text-center">Localización alternativa de la entrevista (si no es la sede de la empresa)</h3>
                <div class="form-row">
                    <div class="form-group  col-md-12 ">
                        <label for="direccionr">Direccion</label>
                   
                        <input type="text" class="form-control" id="direccionr" name="direccionr" value="{{$laoferta->empresa->domicilio}}"
                         >

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  col-md-6 ">
                        <label for="latr">Latitud</label>
                   
                        <input type="text" class="form-control" id="latr" name="latr" value="{{$laoferta->empresa->latitud}}"
                         >

                    </div>

                    <div class="fom-group col-md-6 ">
                        <label for="longr">Longitud</label>
                        <input type="text" class="form-control" id="longr" name="longr"   value="{{$laoferta->empresa->longitud}}">
                        <input type="hidden" name="_token" id="_token" value="{{ Session::token() }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 text-center py-2">
                        <button type="submit" id="contactar" name="contactar" class="btn btn-success btn-lg btn-xs-block">
                        <span class="glyphicon glyphicon-ok"></span> Contactar</button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 text-center">
                        <div id="mensajes"></div>
                    </div>
                </div>
                </form>
            <h2  class="text-center">Localización de la empresa</h2>
            <h3  class="text-center">Si ha introducido una ubicacion alternativa, haga click en el mapa para visualizarla</h3>
            



            <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

</script>
            <script src="{{asset('js/contacto.js')}}" type="text/javascript"></script>
            <div class="d-block" style="{top: 700px; }">

</div>
        </div>
    </div class="text-center">
    @include('googlemaker')
</div>



