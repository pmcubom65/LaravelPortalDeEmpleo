@extends('layouts.app')

@section('content')






        <div class="flex-center position-ref full-height">
  

            <div class="container justify-content-center align-items-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="img-responsive center-block w-100 h-75" src="img/dia.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="img-responsive center-block w-100 h-75" src="img/noche.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="img-responsive center-block w-100 h-75" src="img/puente.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                <div class="row  clearfix">
                <div class="col  float-left">
                <div class="card float-right" style="width: 18rem;">
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
               
                 <div class="col  float-right">
                 <div class="card float-left" style="width: 18rem;">
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
