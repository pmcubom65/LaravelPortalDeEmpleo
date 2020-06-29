

@extends('layouts.app')

@section('content')

<div class="container-fluid">
  

        <entrevista-component  :id="Number('{{ Auth::id() }}')" :oferta="Number('{{$oferta}}')" :empresa="JSON.parse('{{$empresa->toJson()}}')"
        :trabajador="Number('{{$trabajador}}')" :hhabilitado="false"
        :token="'{{Session::token()}}'"
        
        ></entrevista-component>

</div>
   
 @endsection



