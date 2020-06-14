@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebar')
    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-send" aria-hidden="true"></span><br>Publique una nueva
                oferta de trabajo</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">

           <!-- @include('formulariopublicaroferta')-->


           <oferta-component  
  
                       
                        :crearoferta="true"


                        :id="'{{Auth::id()}}'"
                        :token="'{{Session::token()}}'"
                        
                        :letrero="'Publicar oferta'"
                       
                        :habilitado="false"

                        
                        :categorias="JSON.parse('{{$categorias->toJson()}}')"
                        :provincias="JSON.parse('{{$provincias->toJson()}}')"

                        :contratos="JSON.parse('{{$contratos->toJson()}}')"
                        :experiencias="JSON.parse('{{$experiencias->toJson()}}')"

                        :abierto="'1'"
                        :necesitocategoria="true"
                     
                       >
                    </oferta-component>




            </div>


            </section>


           <!-- <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

            </script>
            <script src="{{asset('js/oferta.js')}}" type="text/javascript"></script>-->



        </div>
    </div>

</div>

<!--@include('crearcategoria')-->

<categoria-component  :id="'{{$datos->id}}'"  :token="'{{Session::token()}}'"></categoria-component>

@endsection