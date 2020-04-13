@extends('layouts.app')

@section('content')



<div class="container-fluid">
    @include('sidebarveroferta')
    <div class="row col-10 espacio2 float-right">




        <div class="row-fluid col-10  d-inline-block mx-auto">

            <div class="col-12 d-inline-block ">

            @if (Auth::user()->rol_id===2)


                <div class="form-row my-3">
                    <div class="col-12 text-center">

                        <button class="editborr btn btn-danger btn-block    m-auto btn-lg" type="button" data-toggle="modal"
                            data-target="#sitiomodal2">Cerrar Proceso</button>

                    </div>
                </div>
                @endif


                @include('formularioeditaroferta')

            </div>




            <script type="application/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

            </script>
            <script src="{{asset('js/editaroferta.js')}}" type="text/javascript"></script>



        </div>
    </div>


    <!-- modal -->
    <div class="modal fade" id="sitiomodal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method='POST'>
                @method('PUT')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">



                        <div class="form-row col-12">
                            Alerta
                        </div>
                        <button type="button" class="close mx-0 px-0" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">



                        <input type="hidden" name="mihidden" id="mihidden">
                        <p>¿Esta seguro que desea terminar el proceso?</p>


                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-danger m-auto" type="submit">Confirmar</button>
                        <button class="btn btn-primary m-auto" class="close mx-0 px-0" data-dismiss="modal"
                            type="button">Volver</button>

                    </div>


                </div>
            </form>
        </div>
    </div>





</div>



@endsection