<template>
  <div id="sideBar" class="col-2 pb-0 inicio espacio">
    <h3 class="text-center">
      <a :href="rutainicial">
        <span class="misiconos glyphicon glyphicon-briefcase text-light"></span>
        <br />
      </a><span class="d-block">Datos de la Empresa</span>
    </h3>
    
    <div v-if="cambioaempresa">
    <h3 class="text-center text-secondary">
      <a>
        <span class="glyphicon glyphicon-bullhorn text-secondary"></span>
      </a><span class="d-block">Publicar Nueva Oferta</span>
    </h3>
    <h3  class="text-center text-secondary">
      <a>
        <span class="glyphicon glyphicon-paperclip text-secondary"></span>
      </a><span class="d-block">Revisar ofertas publicadas</span>
    </h3>
    </div>
    
    <div v-else>
    <h3  class="text-center">
      <a :href="ruta1">
        <span class="misiconos glyphicon glyphicon-bullhorn text-light"></span>
      </a><span class="d-block">Publicar Nueva Oferta</span>
    </h3>
    <h3  class="text-center">
      <a :href="ruta2">
        <span class="misiconos glyphicon glyphicon-paperclip text-light"></span>
      </a><span class="d-block">Revisar ofertas publicadas</span>
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