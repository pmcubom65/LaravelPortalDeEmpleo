<template>
    <div @click="componerruta" >
             <button :href="ruta" :disabled="habilitar" >
                        
                        <h3  
                         class="movil text-light"><span class="glyphicon glyphicon-phone-alt text-light" aria-hidden="true"></span><br>Mis candidaturas</h3>
                        <p class="text-light">Acceda a sus candidaturas</p>
                        
                        <button type="button" :href="ruta"  class="btn btn-primary m-auto btn-block">
                        Ver</button></button>
    </div>
</template>

<script>
 import { getMostrarCandidaturas } from "../store/actions";

    export default {
        
        components: {
      
        
        },
        mounted() {
            console.log('Boton mis candidaturas')
        },
        props : {
            login: {
                type: Boolean
            },
            rol : {
                type: Number,
                required: false
            },
            id : {
                type: Number,
                required: false
            }
        },
        data() {
            return {
               
               ruta: '',
               habilitar: true,
            }
        },
        methods : {
            componerruta : function() {
                if (this.$props.login && this.$props.rol===2) {
                    this.habilitar=false
                   this.ruta = '/empresa/'+this.$props.id+'/published'
                } else if (this.$props.login && this.$props.rol===1) {
                   
                    this.$store.dispatch('getMostrarCandidaturas', true);
                     this.habilitar=false
                     this.ruta = "/home"
                 
                } else {
                    this.habilitar=false
                   this.ruta = "/home"
                   
                }
            }
        }
    }
</script>