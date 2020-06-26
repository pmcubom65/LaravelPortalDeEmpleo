<section class="inicio intro-section">
        <div class="container  espacio2 text-center text-light">
            <div class="row">
                <div class="col-md-4">

                    <h3><a href="/empresa/{{ Auth::id() }}" ><span class="glyphicon glyphicon-briefcase misiconos text-light" aria-hidden="true"></span></a><br>Actualizar Perfil
                    </h3>
                    


                </div>
                @if (!$datosemp)


                <div class="col-md-4">

                    <h3  class="text-secondary"><span class="glyphicon glyphicon-bullhorn text-muted" aria-hidden="true"></span><br>Publicar Nueva Oferta
                    Publicar Oferta de empleo</h3>
                    
                    
                    

                </div>
                <div class="col-md-4">

                    <h3  class="text-secondary"><span class="glyphicon glyphicon-paperclip text-muted" aria-hidden="true"></span><br>Revisar Ofertas
                        Publicadas</h3>
      
                </div>

                @else
                <div class="col-md-4">

                    <h3> <a href="/empresa/{{ Auth::id() }}/oferta" ><span class="glyphicon glyphicon-bullhorn misiconos text-light" aria-hidden="true"></span></a><br>Publicar Nueva Oferta
                    </h3>
            
                 
                    

                </div>
                <div class="col-md-4">

                    <h3><a href="/empresa/{{ Auth::id() }}/published" ><span class="glyphicon glyphicon-paperclip misiconos text-light" aria-hidden="true"></span></a><br>Revisar Ofertas
                        Publicadas</h3>
                   
                  

                </div>
                @endif
            </div>

        </div>
    </section>