@extends('layouts.app')

@section('content')






        <div class="container-fluid position-ref full-height" >
  
        <div class="jumbotron jumbotron-fluid" style="height: 100vh; padding-top: 0;">
            <div class="container-fluid justify-content-center align-items-center">
            
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="img-responsive center-block w-110" src="img/dia450.jpg" alt="First slide">
      <div class="carousel-caption d-top d-md-block">
    <h1 class="display-2 text-center font-weight-bold">Tu trabajo está ahí fuera</h1>
    
  </div>
    </div>
    <div class="carousel-item">
      <img class="img-responsive center-block w-110" src="img/noche450.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
    <h1 class="display-2 text-center font-weight-bold">Para cumplir tus sueños</h5>
    <p></p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="img-responsive center-block w-110" src="img/puente450.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h1 class="display-2 text-center font-weight-bold">Unimos trabajo</h1>
    <p></p>
  </div>
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
</div>
                <div class="row  ">
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


<script>
// object-fit polyfill run
objectFitImages();

/* init Jarallax */
jarallax(document.querySelectorAll('.jarallax'));

jarallax(document.querySelectorAll('.jarallax-keep-img'), {
    keepImg: true,
});


</script>





<!-- Main layout -->
<main>

  <div class="view jarallax" style="height: 100vh;">
    <img class="jarallax-img" src="https://mdbootstrap.com/img/Photos/Others/img%20%2844%29.jpg" alt="">
    <div class="mask rgba-blue-slight">
      <div class="container flex-center text-center">
        <div class="row mt-5">
          <div class="col-md-12 wow fadeIn mb-3">
            <h1 class="display-3 mb-2 wow fadeInDown" data-wow-delay="0.3s">NATALIE <a class="indigo-text font-weight-bold">SMITH</a></h1>
            <h5 class="text-uppercase mb-3 mt-1 font-weight-bold wow fadeIn" data-wow-delay="0.4s">Web developer & graphic designer</h5>
            <a class="btn btn-light-blue btn-lg wow fadeIn" data-wow-delay="0.4s">portfolio</a> <a class="btn btn-indigo btn-lg wow fadeIn" data-wow-delay="0.4s">About me</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <!--Grid row-->
    <div class="row mb-5 pb-4">

      <!--Grid column-->
      <div class="col-md-12 text-center">

        <h2 class="h1 font-weight-bold light-blue-text my-5 py-4">Lorem ipsum dolor sit amet, consectetur quis elit.</h2>
        <p align="justify">Lorem ipsum dolor sit amet, consectetur quis elit. Perspiciatis commodi porro, cumque provident rem corporis odit, ut quas dolores maxime nesciunt possimus quis, soluta velit debitis amet, veritatis cupiditate reprehenderit.Lorem ipsum dolor sit amet, consectetur quis elit. Perspiciatis commodi porro, cumque provident rem corporis odit, ut quas dolores maxime nesciunt possimus quis, soluta velit debitis amet, veritatis cupiditate reprehenderit.Lorem ipsum dolor sit amet, consectetur quis elit. Perspiciatis commodi porro, cumque provident rem corporis odit, ut quas dolores maxime nesciunt possimus quis, soluta velit debitis amet, veritatis cupiditate reprehenderit.Lorem ipsum dolor sit amet, consectetur quis elit. Perspiciatis commodi porro, cumque provident rem corporis odit, ut quas dolores maxime nesciunt possimus quis, soluta velit debitis amet, veritatis cupiditate reprehenderit.Lorem ipsum dolor sit amet, consectetur quis elit. Perspiciatis commodi porro, cumque provident rem corporis odit, ut quas dolores maxime nesciunt possimus quis, soluta velit debitis amet, veritatis cupiditate reprehenderit.Lorem ipsum dolor sit amet, consectetur quis elit. Perspiciatis commodi porro, cumque provident rem corporis odit, ut quas dolores maxime nesciunt possimus quis, soluta velit debitis amet, veritatis cupiditate reprehenderit.Lorem ipsum dolor sit amet, consectetur quis elit. Perspiciatis commodi porro, cumque provident rem corporis odit, ut quas dolores maxime nesciunt possimus quis, soluta velit debitis amet, veritatis cupiditate reprehenderit.Lorem ipsum dolor sit amet, consectetur quis elit. Perspiciatis commodi porro, cumque provident rem corporis odit, ut quas dolores maxime nesciunt possimus quis, soluta velit debitis amet, veritatis cupiditate reprehenderit.</p>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>

  <div class="view jarallax">
    <img class="jarallax-img" src="https://mdbootstrap.com/img/Photos/Others/nature4.jpg" alt="">
  </div>

</main>
<!-- Main layout -->











@endsection
