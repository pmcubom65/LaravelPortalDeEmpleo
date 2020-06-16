<template>
<!-- Modal -->
<div class="modal fade" id="componentmodal"  data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ titulo }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div v-if="generarcuerpo" >
  <h4>Numero de empleados: {{numero}} {{objeto}} </h4>
        <GmapMap 
  :center="{ lat: parseFloat(this.objeto.lat), lng: parseFloat(this.objeto.lng) }"
  :zoom="7"
  map-type-id="roadmap"
  style="width: 450px; height: 300px"
>
  <GmapMarker
    
   
    :position="{ lat: parseFloat(this.objeto.lat), lng: parseFloat(this.objeto.lng) }"
    :clickable="true"
    :draggable="true"
    @click="center=position"




  />
   
</GmapMap>
</div>

  <div v-else>

    {{ cuerpo }}
  </div>


        
      </div>
      <div class="modal-footer col text-center">
        <button type="button" class="btn btn-secondary  mx-auto" data-dismiss="modal">Close</button>
        
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
            latitud: Number,
            longitud: Number,
            objeto: Object
          
        },
    
        mounted() {
            console.log('Modal barra component montado')
            
        },
        computed: {
          generarcuerpo: function(){
            return this.empresa;
          },

          
        },
        data() {
         
    
          return {
            markers: [
                {
                    position:  { lat:  parseFloat(this.objeto.lat), lng:  parseFloat(this.objeto.lng) },
                    infoText: 'daddaasfdfaddf'
                },
           
            ],
         
          }
        }
    }
</script>

