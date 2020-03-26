@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="col-md-4 d-none d-lg-block">
    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
    <div class="card-header bg-primary text-white">
    Ofertas
    </div>
    <div class="card-body">
    <p>Aqui va una columna</p>
    <p>Aqui va una columna</p>
    <p>Aqui va una columna</p>
    <p>Aqui va una columna</p>
    <p>Aqui va una columna</p>
    <p>Aqui va una columna</p>
    <p>Aqui va una columna</p>
    <p>Aqui va una columna</p>
    <p>Aqui va una columna</p>

    </div>

    </div>
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
</div>
@endsection
