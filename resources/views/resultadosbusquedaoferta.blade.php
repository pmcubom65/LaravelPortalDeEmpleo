@extends('layouts.app')

@section('content')



<div class="container-fluid">
    

    @if (\Session::has('success'))
    <div class="alert alert-success">
        
            <h4 class="text-center font-weight-bold">{!! \Session::get('success') !!}</h4>
        
    </div>
    @endif

    @if (Auth::check() && Auth::user()->rol_id===2)
    <bbusqueda-component :mihref="'/empresa/{{ Auth::id() }}/published'" :mioferta="new String('0')" 
    :elementos="Number('{{count($resultados)}}')">
    </bbusqueda-component>


    @elseif (Auth::check() && Auth::user()->rol_id===1)
    <bbusqueda-component :mihref="new String('/home')" :mioferta="new String('0')"
    :elementos="Number('{{count($resultados)}}')"></bbusqueda-component>
    @else
    <bbusqueda-component :mihref="new String('/home')" :mioferta="new String('0')"
    :elementos="Number('{{count($resultados)}}')"></bbusqueda-component>
    @endif


    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span><br>Resultados de la busqueda</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">
                <div class="card text-center">
                    <div class="card-header d-none d-lg-block">
                        <h4 class="font-weight-bold my-2 py-2">Haga click en la oferta deseada y elija en la barra de
                            menú "Ver oferta seleccionada"</h4>
                    </div>

                    @foreach($resultados as $oferta)
                   
                    <resultados-component :id="'{{$oferta->id}}'" :titulo="'{{$oferta->titulo}}'"
                        :nombre="'{{$oferta->categoria->nombre}}'" :region="'{{$oferta->provincia->region_name}}'"
                        :contrato="'{{$oferta->contrato->nombre}}'" :salario="'{{$oferta->salario}}'">
                    </resultados-component>

                    @endforeach
                  

                </div>
              
            </div>


        </div>





    </div>
</div>

</div>


@endsection