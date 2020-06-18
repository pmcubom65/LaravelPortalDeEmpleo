<template>
<!-- Modal -->
<div class="modal fade" id="componentmodal"  data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle">{{ titulo }}</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div v-if="generarcuerpo" >
  <h3>Numero de empleados: {{objeto.numeroempleados}}  </h3>


<mapa-component :objeto="objeto"></mapa-component>


</div>

  <div v-else>

    {{ cuerpo }}
  </div>


        
      </div>
      <div class="modal-footer col text-center">
        <button type="button" class="btn btn-secondary btn-lg  mx-auto" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
</template>

<script>


    export default {
        components: {
 
        },
        props: {
            titulo: String,
            cuerpo: String,
            empresa: Boolean,
            numero: Number,
            empdom: String,
            objeto: Object
          
        },
        methods: {
        openWindow () {
            this.window_open = true
            
        }
         
},
          
      
    
        mounted() {
            console.log('Modal barra component montado')
            
        },
        computed: {
          generarcuerpo: function(){
            return this.empresa;
          },

          getObjeto: function() {
            return this.objeto;
          }

          
        },
        data() {
         
    
          return {
           
            markers: [
                {
                    position:  { lat:  parseFloat(this.$props.objeto.lat), lng:  parseFloat(this.$props.objeto.lng) },
                    infoText: ''
                },
           
            ],
            info_marker: null,
            infocontent: '',
           
            window_open: false
         
          }
        }
    }
</script>


