<h3 class="card-title">{{$trabajador->user->name}}</h3>
                            <p class="card-text"><span class="font-weight-bold">Direccion: </span>{{$trabajador->direccion}}</p>
                            <p class="card-text"><span class="font-weight-bold">Provincia: </span>{{$trabajador->hasProvincia->region_name}}</p>
                            <p class="card-text"><span class="font-weight-bold">Telefono: </span>{{$trabajador->telefono}}</p>
                            <p class="card-text"><span class="font-weight-bold">Fecha Nacimiento: </span>{{$trabajador->getDate()}}</p>
                            <a href="" class="btn btn-primary">Mostrar Curriculum</a>
                            <a href="" class="btn btn-success">Seleccionar</a>
                            <a href="" class="btn btn-danger">Descartar</a>
                            <hr class="text-white">