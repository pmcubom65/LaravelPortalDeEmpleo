<div id="sideBar" class="col-2 pb-0 inicio2 espacio ">


    <h3 class="text-center"><a href="/#buscar"><span
                class="misiconos glyphicon glyphicon-eye-open  text-light"></span></a>
        <span class="d-block">Cambiar busqueda</span></h3>
    @if (Auth::check() && Auth::user()->rol_id===2)
    <h3 class="text-center"><a href="/empresa/{{ Auth::id() }}/published"><span
                class="misiconos glyphicon glyphicon-repeat  text-light"></span></a>
        <span class="d-block">Volver</span>
    </h3>
    @elseif (Auth::check() && Auth::user()->rol_id===1)
    <h3 class="text-center"><a href="/home"><span class="misiconos glyphicon glyphicon-repeat  text-light"></span></a>
        <span class="d-block">Volver</span>
    </h3>
    @else
    <h3 class="text-center text-muted"><span class="muted glyphicon glyphicon-paperclip text-muted"></span>
        <span class="d-block text-center">Gestionar</span>
    </h3>
    @endif
</div>