<div id="sideBar" class="col-2 pb-0 inicio espacio ">
<h3 class="text-center"><a  href="{{URL::previous()}}"><span
                    class="misiconos glyphicon glyphicon-repeat  text-light"></span><br></a>Volver</h3>
   
    @if($contador===0)
    <h3 class="text-center text-secondary"><a href=""><span
                class="glyphicon glyphicon-bullhorn text-secondary "></span></a>Publicar Nueva Oferta</h3>
    <h3 class="text-center text-secondary"><a href=""><span
                class="glyphicon glyphicon-paperclip text-secondary "></span></a>Revisar ofertas publicadas
    </h3>
    @else
    <h3 class="text-center"><a href="/empresa/{{ $datos->id }}/oferta"><span
                class="misiconos glyphicon glyphicon-bullhorn  text-light"></span></a>Publicar Nueva Oferta</h3>
                <h3 class="text-center"><a href="/empresa/{{ $datos->id }}"><span
                class="misiconos glyphicon glyphicon-briefcase  text-light"></span><br></a>Datos de la Empresa</h3>
    </h3>

    @endif

</div>