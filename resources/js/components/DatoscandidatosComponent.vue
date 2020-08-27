<template>
    <div>
      <div v-if="datostrabajador">
   
 
    <div class="media border border-primary rounded lead"  @click="elejido(datostrabajador)" :class="{ fondo : destacar }">
      <img
        :src="datostrabajador.imagen"
        class="align-self-center mr-3 mifoto"
        alt="foto"
      />
      <div class="media-body">
        <h3 class="mt-0 text-nowrap ">
          <span class="font-weight-bold d-none d-sm-block">{{ datostrabajador.name }}</span>
        </h3>
        <p class="d-none d-sm-block">
          <span class="font-weight-bold ">Direccion:</span>
          {{ datostrabajador.direccion }} ({{ datostrabajador.region }})
        </p>
        <p class="mb-0 d-none d-none d-sm-block">
          <span class="font-weight-bold d-none d-sm-block">Fecha de nacimiento:</span>
          {{ datostrabajador.fecha.substr(0, datostrabajador.fecha.indexOf(" ")) }}

        
        </p>
    
        <a type="button" class="btn btn-primary btn-lg botonescandidatos text-nowrap btn-xs-block" :href="rutacurriculum">
          <span class="font-weight-bold d-block d-sm-none">{{ datostrabajador.name }}</span>
          Ver más detalles</a>
        <a
          class="btn btn-success btn-lg botonescandidatos "
          :href="this.rutaentrevista"
          v-show="entrevista"
        >Contactar</a>
        

       
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
      

      if (data.trabajador_id == this.$props.datostrabajador.trabajador_id) {
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
      id: {
      type: Number,
      required: true
    },

    entrevista: {
      type: Boolean,
      required: false
    }
  },
  data() {
    return {
      destacar: false,
      rutaentrevista: '/empresa/'+this.$props.id+'/published/'+this.$props.datostrabajador.oferta_id+'/trabajador/'+this.$props.datostrabajador.trabajador_id,
      rutacurriculum: '/empresa/'+this.$props.id+'/published/'+this.$props.datostrabajador.oferta_id+'/ofertatrabajador/'+this.$props.datostrabajador.trabajador_id
  
    }
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
  @media screen and (max-width : 768px){
    float: none;
    margin-bottom: 4px;
  }
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