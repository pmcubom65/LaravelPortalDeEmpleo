<template>
    <div class="media border border-primary rounded" @click="elejido"  :class="{ fondo : destacar }">
        <img :src="'/images/'+datostrabajador.imagen" class="align-self-center mr-3 mifoto" alt="foto">
    <div class="media-body">
        <h3 class="mt-0"><span class="font-weight-bold">{{ nombre }}</span> </h3>
        <p><span class="font-weight-bold">Direccion:</span>  {{ datostrabajador.direccion }} ({{ region }})</p>
        <p class="mb-0"><span class="font-weight-bold">Fecha de nacimiento:</span> {{ fecha }}</p>
        <button type="button" class="btn btn-primary btn-lg botonescandidatos">Ver más detalles</button>
         <button type="button" class="btn btn-success btn-lg botonescandidatos" v-show="seleccionado">Contactar</button>
  </div>
  
</div>
</template>

<script>
import {bus} from '../app'

export default {

        created() {
            bus.$on('trabajadorElegido', (data)=>{
                console.log('escucho')
                  console.log(data)

                  if (data==this.datostrabajador.id) {
                      this.destacar=true
                  }else {
                      this.destacar=false;
                  }
            })
        },
     props: {
    datostrabajador: {
      type: Object,
      required: true
    },
    fecha: {
        type: String,
        required: false
    },
      nombre: {
        type: String,
        required: false
    },
     region: {
        type: String,
        required: false
    },

   seleccionado: {
      type: Boolean,
      required: true
    },
     },
           data() {
          return {
    destacar: false
          }
  },
    




     methods: {
         elejido : function() {
            
            this.destacar=true;
            bus.$emit('trabajadorElegido', this.datostrabajador.id);
           
           
         }
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
</style>