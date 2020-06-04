<template>
<div id="sideBar" class="col-2 pb-0 inicio espacio ">
        <h3 class="text-center"><a  :href="mutableoferta"><span
                    class="misiconos glyphicon glyphicon-flag  text-light"></span><br></a>Ver oferta Seleccionada</h3>

        <h3 class="text-center"><a href="/#buscar"><span
                    class="misiconos glyphicon glyphicon-eye-open  text-light"></span></a>Cambiar busqueda</h3>


     
        <h3 class="text-center"><a :href="mihref"><span
                    class="misiconos glyphicon glyphicon-paperclip  text-light"></span></a>Gestionar Candidaturas
        </h3>
      

      
    </div>

</template>

<script>
import {bus} from '../app'

    export default {
        props: {
            mihref : String,
            mioferta : String
        },
          data: function () {
        return {
            mutableoferta: JSON.parse(this.mioferta)
            
        }
    },
        created() {
            bus.$on('ofertaElegida', (data)=>{
                var ruta='/search/'+data
                this.mutableoferta=ruta
            })
        },
        mounted() {
            console.log('Barra busqueda montada')
           
        }
    }
</script>
