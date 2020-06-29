@extends('layouts.app')

@section('content')



<div class="container-fluid">



<barracandidatos-component    :id="'{{ Auth::id() }}'" :oferta="Number('{{$oferta->id}}')" :token="'{{Session::token()}}'"
        ></barracandidatos-component>






  <div class="row col-10 espacio2 float-right">


         <div class="col-10 text-center mx-auto">
    <mostrarcandidatos-component   :id="Number('{{ Auth::id() }}')" :oferta="Number('{{$oferta->id}}')"></mostrarcandidatos-component>


  
            </div>



        </div>
    </div>




@endsection