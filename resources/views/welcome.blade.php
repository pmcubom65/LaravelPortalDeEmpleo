@extends('layouts.app')

@section('content')
<!--<div class="carousel" id="mislider">
    <div class="carousel-inner">
        <div class="item active">
            <img src="img/dia.jpg" />

        </div>
        <div class="item">
            <img src="img/noche.jpg" />

        </div>
        <div class="item">
            <img src="img/puente.jpg" />

        </div>


    </div>

</div>-->





        <div class="flex-center position-ref full-height">
  

            <div class="container">
                <div class="row">
                <div class="col">
                <div class="card" style="width: 18rem;">
                 <img src="https://i.picsum.photos/id/1035/300/300.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Soy un trabajador</h5>
                <p class="card-text">Inscribase en las ofertas de empleo. Actualize su perfil y curriculum. Consulte en el estado de sus candidaturas</p>
                
                @if (Route::has('register'))
               
                <a href="/login" class="btn btn-primary" id="miboton">Acceder</a>
               
                @endif



            </div>
            </div>
                </div>
               
                 <div class="col">
                 <div class="card" style="width: 18rem;">
            <img src="https://i.picsum.photos/id/1078/300/300.jpg" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Soy una empresa</h5>
            <p class="card-text">Añada nuevas ofertas de trabajo y actualice las ofertas. Revise las candidaturas. Contacte con los candidatos</p>
            @if (Route::has('register'))
            <a href="/login2" class="btn btn-primary">Acceder</a>
            @endif
            
            </div>
            </div>
                  </div>
              </div>


            
          
            
        </div>
@endsection
