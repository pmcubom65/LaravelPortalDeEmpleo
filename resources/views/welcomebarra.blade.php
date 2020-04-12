<section id="inicio" class="inicio intro-section">
            <div class="container  espacio text-center text-light">
                <div class="row">
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span><br>Mi Perfil</h3>
                        <p >Ver y actualizar mi perfil</p>
                        <a href="/home" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-search" aria-hidden="true"></span><br>Buscar Ofertas de
                            Empleo</h3>
                        <p >Buscar Ofertas de Empleo</p>
                        <a href="#buscar" class="btn btn-primary m-auto">Ver</a>


                    </div>
                    <div class="col-md-4">

                        <h3><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span><br>Mis candidaturas</h3>
                        <p >Acceda a sus candidaturas</p>
                        @if (Auth::check() and Auth::user()->rol_id===2)
                        
                        <a href="/empresa/{{Auth::id()}}/published" class="btn btn-primary m-auto">Ver</a>
                        @elseif (Auth::check() and Auth::user()->rol_id===1)
                        <a href="/home" class="btn btn-primary m-auto">Ver</a>
                        @else
                        <button href="" class="btn btn-primary m-auto" disabled>Ver</button>
                        @endif

                    </div>
                </div>

            </div>
        </section>