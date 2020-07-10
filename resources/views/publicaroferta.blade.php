@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <sidebarempresa-component  :user_id="'{{ Auth::id() }}'"
        :esempresa="false"></sidebarempresa-component>
    <div class="row col-10 espacio2 float-right">




        <div class="col-10 text-center mx-auto">
            <h1><span class="glyphicon glyphicon-send" aria-hidden="true"></span><br>Publique una nueva
                oferta de trabajo</h1>

        </div>



        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">

           


           <oferta-component  
  
                       
                        :crearoferta="true"


                        :usuario="'{{Auth::id()}}'"
                        :token="'{{Session::token()}}'"
                        
                        :letrero="'Publicar oferta'"
                       
                        :habilitado="false"

                        
                      
                        :provincias="JSON.parse('{{$provincias->toJson()}}')"

                        :contratos="JSON.parse('{{$contratos->toJson()}}')"
                        :experiencias="JSON.parse('{{$experiencias->toJson()}}')"

                        :abierto="'1'"
                        :necesitocategoria="true"
                     
                       >
                    </oferta-component>




            </div>


            </section>





        </div>
    </div>

</div>


<categoria-component  :id="'{{Auth::id()}}'"  :token="'{{Session::token()}}'"></categoria-component>

@endsection