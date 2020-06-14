

<!--modal categorias-->
<div class="modal fade" id="sitiocategoriamodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="categoria-data" method="POST" data-route="{{route('oferta', [$datos->id ])}}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">



                    <div class="form-row col-12">

                        <div class="form-group col-12">
                            <label for="catname">Nombre de la Categoria</label>
                            <input type="text" class="form-control" id="catname" name="catname"
                                placeholder="Nombre de la Categoria">

                        </div>


                    </div>


                    <button type="button" class="close mx-0 px-0" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="desccat">Descripcion de la Categoria</label>
                            <textarea class="form-control" id="desccat" name="desccat"
                                rows="8">Descripcion de la Categoria</textarea>

                        </div>

                    </div>
                    <div class="form-row text-center">

                        <div class="form-group col-12 mx-auto">
                            <div id="mismensajes2">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer" id="botoncat">


                    <button class="btn btn-success m-auto" type="submit" >Guardar
                        Categoria</button>


                </div>


            </div>
        </form>
    </div>
</div>
<!--<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">

</script>
<script src="{{asset('js/categoria.js')}}" type="text/javascript"></script>-->