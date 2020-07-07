<template>
  <div class="container espacio text-center text-light">
    <div class="row">
      <div class="col-md-4 div1">
        <a @click="componerruta(false)" class="text-light" :href="ruta">
          <h3 class="movil">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <br />Mi Perfil
          </h3>
          <p>Ver y actualizar mi perfil</p>
          <button @click="componerruta(false)" :href="ruta" class="btn btn-primary m-auto btn-block">Ver</button>
        </a>
      </div>

      <div class="col-md-4 div1">
        <a class="text-light" href="#buscar">
          <h3 class="movil">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            <br />Buscar Ofertas de
            Empleo
          </h3>
          <p>Buscar Ofertas de Empleo</p>
          <button href="#buscar" class="btn btn-primary m-auto btn-block">Ver</button>
        </a>
      </div>
      <div class="col-md-4 div1">
        <a @click="componerruta(true)" :href="ruta">
          <h3 class="movil text-light">
            <span class="glyphicon glyphicon-phone-alt text-light" aria-hidden="true"></span>
            <br />Mis candidaturas
          </h3>
          <p class="text-light">Acceda a sus candidaturas</p>

          <a type="button" @click="componerruta(true)" :href="ruta" class="btn btn-primary m-auto btn-block">Ver</a>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import { getMostrarCandidaturas } from "../store/actions";

export default {
  components: {},
  mounted() {
    console.log("Boton mis candidaturas");
  },
  props: {
    login: {
      type: Boolean
    },
    rol: {
      type: Number,
      required: false
    },
    id: {
      type: Number,
      required: false
    }
  },
  data() {
    return {
      ruta: ""
    };
  },
  methods: {
    componerruta: function(boleano) {
      if (this.$props.login && this.$props.rol === 2) {
        this.ruta = "/empresa/" + this.$props.id + "/published";
      } else if (this.$props.login && this.$props.rol === 1) {
        this.$store.dispatch("getMostrarCandidaturas", boleano);
        this.ruta = "/home";
      } else {
        this.ruta = "/home";
      }
    },

  
  }
};
</script>