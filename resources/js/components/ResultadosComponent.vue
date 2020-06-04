<template>
  <div  @click="miprueba" :id="id" class="card-body px-0 py-2" >
    <h5 class="card-title">{{titulo}} - {{nombre}}</h5>
    <br>{{region}}
    <br>{{contrato}}
    <br>Salario {{salario}} euros/año
    
    <hr class="text-white">
  </div>

</template>

<script>

    export default {
     
        props: {
          id: String,
          titulo: String,
          nombre: String,
          region: String,
          contrato: String,
          salario: String
        },
       

        methods: {
          miprueba: function() {
            console.log('has hecho click')
      


          }
        },

        mounted() {
            console.log('Component mounted. se trata de resultados.')
        }
    }
</script>
