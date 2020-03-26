@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="col-6-lg">
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" id="name" placeholder="Nombre" />
                </div>
                <div class="form-group">
                <label for="nombre">Trabajo deseado</label>
                <input class="form-control" type="text" id="name" placeholder="Nombre" />
  
                </div>















            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Eres un trabajador
                    You are logged in!
                </div>
            </div>
        </div>
        </div>
 
@endsection
