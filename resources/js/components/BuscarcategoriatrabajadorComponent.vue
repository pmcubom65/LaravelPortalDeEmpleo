<template>
    <form method="get" action="/search"> 

<input type="hidden" name="cat" id="cat" :value="categoria_id" class="form-control">
<input type="hidden" name="_token" id="_token" :value="token">
<input type="hidden"   id="Provincia" name="Provincia" value="">
<input type="hidden"  id="Experiencia" name="Experiencia" value="" >
<input type="hidden" value="12000" 
                                        id="Salarioid" name="Salarioid">
<input type="hidden" id="contrato" name="contrato" value="">

<button type="submit" v-tooltip="{ content: 'Tienes que tener experiencias registradas. Mostrará las ofertas de trabajo actuales con la categoría profesional de la experiencia laboral más reciente', show: false }" class="btn btn-primary btn-lg">Buscar ofertas de mi última categoria profesional</button>


</form>


</template>

<script>
export default {
    props : {
        token : {
            type: String,
            required: true
        },
        categoria_id: {
            type: String,
            required: true,
            default: ''
        },

    data() {}


    }
}
</script>