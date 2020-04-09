<section class="inicio intro-section">
        <div class="container  espacio2 text-center text-light">
            <div class="row">
                <div class="col-md-4">

                    <h3><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span><br>Datos de la Empresa
                    </h3>
                    <p>Actualizar perfil</p>
                    <a href="/empresa/{{ $datos->id }}" class="btn btn-primary m-auto">Ver</a>


                </div>
                @if ($contador===0)


                <div class="col-md-4">

                    <h3  class="text-secondary"><span class="glyphicon glyphicon-bullhorn text-muted" aria-hidden="true"></span><br>Publicar Nueva Oferta
                    </h3>
                    <p  class="text-secondary">Publicar Oferta de Empleo</p>
                    <button disabled  href=""  class="btn btn-primary m-auto">Ver</button>
                    

                </div>
                <div class="col-md-4">

                    <h3  class="text-secondary"><span class="glyphicon glyphicon-paperclip text-muted" aria-hidden="true"></span><br>Revisar Ofertas
                        Publicadas</h3>
                    <p  class="text-secondary">Revisar ofertas publicadas y candidaturas</p>
                   
                    <button disabled href="" class="btn btn-primary m-auto">Ver</button>
                  

                </div>







                @else
                <div class="col-md-4">

                    <h3><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span><br>Publicar Nueva Oferta
                    </h3>
                    <p>Publicar Oferta de Empleo</p>
                    <a href="/empresa/{{ $datos->id }}/oferta"  class="btn btn-primary m-auto">Ver</a>
                    

                </div>
                <div class="col-md-4">

                    <h3><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><br>Revisar Ofertas
                        Publicadas</h3>
                    <p>Revisar ofertas publicadas y candidaturas</p>
                   
                    <a href="/empresa/{{ $datos->id }}/published" class="btn btn-primary m-auto">Ver</a>
                  

                </div>
                @endif
            </div>

        </div>
    </section>