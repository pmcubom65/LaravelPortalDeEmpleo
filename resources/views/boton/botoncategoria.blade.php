<form method="get" action="/search"> 
@csrf
<input type="hidden" name="cat" id="cat" value="{{$experienciass->first()->categoria_id}}" class="form-control">
<input type="hidden" class="form-control" id="Provincia" name="Provincia" value="">
<input type="hidden"class="form-control" id="Experiencia" name="Experiencia" value="">
<input type="hidden" value="12000" class="form-control"
                                        id="Salarioid" name="Salarioid">
<input type="hidden"class="form-control" id="contrato" name="contrato" value="">

<button type="submit" class="btn btn-primary btn-lg">Buscar ofertas de mi categoria profesional</a>


</form>

