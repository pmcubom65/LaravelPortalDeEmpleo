<section class="inicio2 intro-section">
        <div class="container  espacio2 text-center text-light">
            <div class="row">
                <div class="col-md-4">

                    <h3><a href="/empresa/{{ Auth::id() }}" ><span class="glyphicon glyphicon-briefcase misiconos text-light" aria-hidden="true"></span></a><br>
                    <span class="d-block">Actualizar Perfil</span>
                    </h3>
                    


                </div>
                @if (!$datosemp)


                <div class="col-md-4">

                    <h3  class="text-muted"><span class="muted glyphicon glyphicon-bullhorn  text-muted" ></span>
                    <span class="d-block">Publicar Oferta de empleo</span></h3>
                    
                    
                    

                </div>
                <div class="col-md-4">

                    <h3  class="text-muted"><span class="muted glyphicon glyphicon-paperclip  text-muted" ></span><br>
                    <span class="d-block">Revisar Ofertas
                        Publicadas</span></h3>
      
                </div>

                @else
                <div class="col-md-4">

                    <h3> <a href="/empresa/{{ Auth::id() }}/oferta" ><span class="glyphicon glyphicon-bullhorn misiconos text-light" aria-hidden="true"></span></a>
                    <br><span class="d-block">Publicar Nueva Oferta</span>
                    </h3>
            
                 
                    

                </div>
                <div class="col-md-4">

                    <h3><a href="/empresa/{{ Auth::id() }}/published" ><span class="glyphicon glyphicon-paperclip misiconos text-light" aria-hidden="true"></span></a><br>
                    <span class="d-block">Revisar Ofertas
                        Publicadas</span></h3>
                   
                  

                </div>
                @endif
            </div>

        </div>
    </section>