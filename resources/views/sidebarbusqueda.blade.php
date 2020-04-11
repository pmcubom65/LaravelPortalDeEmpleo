<div id="sideBar" class="col-2 pb-0 inicio espacio ">
        <h3 class="text-center"><a  id="ira"><span
                    class="misiconos glyphicon glyphicon-flag  text-light"></span><br></a>Ver oferta Seleccionada</h3>

        <h3 class="text-center"><a href="/#buscar"><span
                    class="misiconos glyphicon glyphicon-eye-open  text-light"></span></a>Cambiar busqueda</h3>


        @if (Auth::check())
        <h3 class="text-center"><a href="/empresa/{{ $datos->id }}/published"><span
                    class="misiconos glyphicon glyphicon-paperclip  text-light"></span></a>Gestionar Candidaturas
        </h3>
        @else
        <h3 class="text-center "><span
class="glyphicon glyphicon-paperclip text-muted" ></span>Gestionar Candidaturas
        </h3>
        @endif
    </div>




