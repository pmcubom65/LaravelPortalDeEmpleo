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
   @click="openWindow"

  />


      <gmap-info-window 
        @closeclick="window_open=false" 
        :opened="window_open" 
        :position="{ lat: parseFloat(this.objeto.lat), lng: parseFloat(this.objeto.lng) }"
        :content="infocontent"

       
        :options="{
          pixelOffset: {
            width: 0,
            height: -35
          }
        }"

  
    
    ><p>{{objeto}}</p></gmap-info-window>
   
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
                    infoText: 'daddaasfdfaddf'
                },
           
            ],
            info_marker: null,
            infocontent: 'hola que tal',
           
            window_open: false
         
          }
        }
    }
</script>

