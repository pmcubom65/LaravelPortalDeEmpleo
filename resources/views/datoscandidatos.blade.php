<div id="t{{$trabajador->id}}">
<h3 class="card-title text-light">{{$trabajador->user->name}}</h3>
<p class="card-text"><span class="font-weight-bold">Direccion: </span>{{$trabajador->direccion}}</p>
<p class="card-text"><span class="font-weight-bold">Provincia: </span>{{$trabajador->hasProvincia->region_name}}</p>
<p class="card-text"><span class="font-weight-bold">Telefono: </span>{{$trabajador->telefono}}</p>
<p class="card-text"><span class="font-weight-bold">Fecha Nacimiento: </span>{{$trabajador->getDate()}}</p>

<div class="row">
    <div class="col-10 text-center  mx-auto ">

        <p>
            <a class="btn btn-primary btn-lg  btn-block font-weight-bold" data-toggle="collapse" href="#collapseExample"
                role="button" aria-expanded="false" aria-controls="collapseExample">Mostrar Experiencias Laborales</a>
        </p>

        <div class="collapse" id="collapseExample">
            @foreach($trabajador->user->explaborales->sortByDesc('fin') as $laexpe)
            <div class="card card-body text-center">
                <h5 class="font-weight-bold card-title">{{$laexpe->puesto}} - {{$laexpe->categoria->nombre}}</h5>
                <p><span class="font-weight-bold">Empresa:</span> {{$laexpe->empresa}}</p>
                <p><span class="font-weight-bold">Descripción:</span> {{$laexpe->descripcion}}</p>
                <p><span class="font-weight-bold">Inicio: </span> {{$laexpe->inicio}}</p>
                <p><span class="font-weight-bold">Fin: </span>{{$laexpe->fin}}</p>
            </div>
            <hr>

            @endforeach
        </div>
        <p>
    <form id="postseleccionado" data-route="/empresa/{{$datos->id}}/published/{{$laoferta->id}}" method="POST" >
    @csrf
    <input type="hidden" name="seleccionado" id="seleccionado" value="{{$trabajador->id}}">
    <button type="submit" class="btn btn-success btn-lg  btn-block font-weight-bold" id="sele">Seleccionar</button>
    </form>
    </p>
    <p>
    <form id="putdescartado" data-route="/empresa/{{$datos->id}}/published/{{$laoferta->id}}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="descartado" id="descartado" value="{{$trabajador->id}}">
    <button type="submit" class="btn btn-danger btn-lg  btn-block font-weight-bold" id="deco">Descartar</button>

    </form>
</p>

    </div>
</div>
<script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

            </script>
            <script src="{{asset('js/candidatos.js')}}" type="text/javascript"></script>

<hr class="text-white">

</div>
<div id="mismensajes">

</div>