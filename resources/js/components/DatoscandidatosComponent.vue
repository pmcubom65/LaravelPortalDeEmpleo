<template>
    <div>
      <div v-if="datostrabajador">
   
 
    <div class="media border border-primary rounded lead"  @click="elejido(datostrabajador)" :class="{ fondo : destacar }">
      <img
        :src="'/images/'+datostrabajador.imagen"
        class="align-self-center mr-3 mifoto d-xs-block"
        alt="foto"
      />
      <div class="media-body">
        <h3 class="mt-0 d-none d-lg-block d-xl-none">
          <span class="font-weight-bold">{{ datostrabajador.name }}</span>
        </h3>
        <p class="d-none d-lg-block d-xl-none">
          <span class="font-weight-bold ">Direccion:</span>
          {{ datostrabajador.direccion }} ({{ datostrabajador.region }})
        </p>
        <p class="mb-0 d-none d-lg-block d-xl-none">
          <span class="font-weight-bold d-none d-lg-block d-xl-none">Fecha de nacimiento:</span>
          {{ datostrabajador.fecha.substr(0, datostrabajador.fecha.indexOf(" ")) }}

        
        </p>
     
        <button type="button" class="btn btn-primary btn-lg botonescandidatos ">Ver más detalles</button>
        <button
          type="button"
          class="btn btn-success btn-lg botonescandidatos "
          v-show="entrevista"
        >Contactar</button>
        

       
      </div>
      </div>
      </div>
      </div>

</template>

<script>
import { bus } from "../app";

export default {
    mounted() {
    console.log("DatosCandidatos montado");
    
  
  },
   computed: {
   
   },
  created() {
    bus.$on("trabajadorElegido", data => {
      

      if (data.trabajador_id == this.datostrabajador.trabajador_id) {
        this.destacar = true;
      } else {
        this.destacar = false;
      }
    });
 
  },
  props: {
    datostrabajador: {
      type: Object,
      required: false
    },

    entrevista: {
      type: Boolean,
      required: false
    }
  },
  data() {
    return {
      destacar: false,
  
    };
  },

  methods: {
    elejido: function(datostrabajador) {
     
      bus.$emit("trabajadorElegido", datostrabajador);
    
    },


  }
}
</script>

<style lang="scss" scoped>
.media {
  padding: 10px;
  margin: 10px;
}

.botonescandidatos {
  margin-top: 5px;
}

.mifoto {
  width: auto;
  height: 100px;
  float: right;
}
.fondo {
  background-color: red !important;
}

@media screen and (max-width : 768px){
    .lead{
    margin-left: auto !important;
    margin-right: auto !important;
    display: block !important;
    overflow: hidden;
    }
}
</style>