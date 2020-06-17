<template>
<div>
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

  
    
    ><p class="font-weight-bold mensaje" >{{objeto.domicilio}}</p></gmap-info-window>
   
</GmapMap>
</div>
</template>



<script>


    export default {
        components: {
 
        },
        props: {
           
            objeto: Object
          
        },
        methods: {
        openWindow () {
            this.window_open = true
            
        }
         
},
          
      
    
        mounted() {
            console.log('Mapa montado')
            
        },
        computed: {
         

          
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


<style lang="scss" scoped>
.mensaje {
    color: blue;
}
</style>
