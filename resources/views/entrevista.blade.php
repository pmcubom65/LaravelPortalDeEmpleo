

@extends('layouts.app')



<div class="container-fluid">
    @include('sidebarentrevista')
    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><br>Detalles de la Entrevista</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">
        <form">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6 ">
                        <label for="dater">Día de la entrevista</label>
                   
                        <input type="date" class="form-control" id="dater" name="dater"
                         value="{{$entrevista->getDate()}}" disabled>

                    </div>

                    <div class="fom-group col-md-6 ">
                        <label for="horar">Hora de la entrevista</label>
                        <input type="time" class="form-control" id="horar" name="horar"      value="{{$entrevista->hora}}" disabled>
                    </div>
                </div>
                <h3 class="text-center">Localización</h3>
                <div class="form-row">
                    <div class="form-group  col-md-12 ">
                        <label for="direccionr">Direccion</label>
                   
                        <input type="text" class="form-control" id="direccionr" name="direccionr" value="{{$entrevista->direccion}}"
                        disabled >

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  col-md-6 ">
                        <label for="latr">Latitud</label>
                   
                        <input type="text" class="form-control" id="latr" name="latr"     value="{{$entrevista->latitud}}" disabled
                         >

                    </div>

                    <div class="fom-group col-md-6 ">
                        <label for="longr">Longitud</label>
                        <input type="text" class="form-control" id="longr" name="longr"  value="{{$entrevista->longitud}}" disabled>
               
                    </div>
                </div>
          
        
                </form>
            <h2  class="text-center">Localización de la entrevista</h2>
            <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

</script>
            <script src="{{asset('js/entrevista.js')}}" type="text/javascript"></script>
       
 
        </div>

    
    @include('googlemaker2')
</div>



