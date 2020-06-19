<template>
  <div id="sideBar" class="col-2 pb-0 inicio espacio">
    <h3 class="text-center">
      <a :href="rutainicial">
        <span class="misiconos glyphicon glyphicon-briefcase text-light"></span>
        <br />
      </a>Datos de la Empresa
    </h3>
    
    <div v-if="cambioaempresa">
    <h3 class="text-center text-secondary">
      <a>
        <span class="glyphicon glyphicon-bullhorn text-secondary"></span>
      </a>Publicar Nueva Oferta
    </h3>
    <h3  class="text-center text-secondary">
      <a>
        <span class="glyphicon glyphicon-paperclip text-secondary"></span>
      </a>Revisar ofertas publicadas
    </h3>
    </div>
    
    <div v-else>
    <h3  class="text-center">
      <a :href="ruta1">
        <span class="misiconos glyphicon glyphicon-bullhorn text-light"></span>
      </a>Publicar Nueva Oferta
    </h3>
    <h3  class="text-center">
      <a :href="ruta2">
        <span class="misiconos glyphicon glyphicon-paperclip text-light"></span>
      </a>Revisar ofertas publicadas
    </h3>
    </div>
  </div>
</template>

<script>
import { bus } from "../app";
export default {

    props : {
        user_id: String,
        esempresa: Boolean
        
    },


  computed: {
    
  },
  data() {
      return {
          cambioaempresa: this.$props.esempresa,
          ruta1: `/empresa/${this.$props.user_id}/oferta`,
          ruta2: `/empresa/${this.$props.user_id}/published`,
          rutainicial: `/empresa/${this.$props.user_id}`
      }
  },
  methods: {
  
  },
  created(){
      bus.$on('empresacreada', ()=>{
         this.cambioaempresa=false;
      });
  },
    mounted() {
    console.log("Sidebar montado");
   
    
  },
};
</script>