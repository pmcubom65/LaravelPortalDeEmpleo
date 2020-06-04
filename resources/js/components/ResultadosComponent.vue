<template>
  <div  @click="miprueba" :id="id" class="card-body px-0 py-2" :class="{ fondo : destacar }">
    <h5 class="card-title">{{titulo}} - {{nombre}}</h5>
    <br>{{region}}
    <br>{{contrato}}
    <br>Salario {{salario}} euros/año
    
    <hr class="text-white">
  </div>

</template>

<script>
import {bus} from '../app'

    export default {
     
        props: {
          id: String,
          titulo: String,
          nombre: String,
          region: String,
          contrato: String,
          salario: String
        },
       
        data() {
          return {
    destacar: false
          }
  },
        methods: {
          miprueba: function() {
            console.log('has hecho click')
            this.destacar=true
            bus.$emit('ofertaElegida', this.id)
      


          }
        },
          created() {
            bus.$on('ofertaElegida', (data)=>{
                if (this.id !== data){
                    this.destacar=false
                }
            })
        },

        mounted() {
            console.log('Component mounted. se trata de resultados.')
        }
    }
</script>


<style lang="scss" scoped>
.fondo {
  background-color: black !important;
}


</style>