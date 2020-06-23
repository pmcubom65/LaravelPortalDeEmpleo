<template>
    <form method="get" action="/search"> 

<!--<input type="hidden" name="cat" id="cat" value="{{$experienciass->first()->categoria_id}}" class="form-control">
<input type="hidden" name="_token" id="_token" value="{{ Session::token() }}">-->
<input type="hidden"   id="Provincia" name="Provincia" value="">
<input type="hidden"  id="Experiencia" name="Experiencia" value="" >
<input type="hidden" value="12000" 
                                        id="Salarioid" name="Salarioid">
<input type="hidden" id="contrato" name="contrato" value="">

<button type="submit" class="btn btn-primary btn-lg">Buscar ofertas de mi categoria profesional</button>


</form>


</template>

<script>
export default {
    props : {
        token : {
            type: String,
            required: true
        }


    }
}
</script>