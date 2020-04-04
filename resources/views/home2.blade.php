@extends('layouts.app')

@section('content')
<div class="container espacio">


    <div class="row">
        <div class="col-12 text-center">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Bienvenido {{ $datos->name }}</h1>

        </div>


    </div>


    <section id="inicioenpresa" class="inicio intro-section">
            <div class="container  espacio text-center text-light">
                <div class="row">
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span><br>Datos de la Empresa</h3>
                        <p>Actualizar perfil</p>
                        <a href="" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span><br>Publicar Nueva Oferta</h3>
                        <p>Publicar Oferta de Empleo</p>
                        <a href="#" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><br>Mi Perfil</h3>
                        <p>Revisar ofertas publicadas y candidaturas</p>
                        <a href="#" class="btn btn-primary m-auto">Ver</a>


                    </div>
                </div>

            </div>
        </section>



</div>
@endsection
