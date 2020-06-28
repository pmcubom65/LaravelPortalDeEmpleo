<template>
  <div id="sideBar" class="col-2 pb-0 inicio espacio">
    <div class="bajando" v-if="gris">
      <h3 class="text-center text-secondary">
        <a>
          <span class="misiconos glyphicon glyphicon-ok text-secondary"></span>
        </a>Seleccionar
      </h3>

      <h3 class="text-center text-secondary">
        <a>
          <span class="misiconos glyphicon glyphicon-remove text-secondary"></span>
        </a>Descartar
      </h3>
    </div>
    <div v-else>
      <h3 class="text-center">
        <a @click="seleccionado">
          <span class="misiconos glyphicon glyphicon-ok text-light"></span>
        </a>Seleccionar
        <input
          type="hidden"
          v-model="trabajador"
          name="trabajador_id"
          id="trabajador_id"
        />
      </h3>

      <h3 class="text-center">
        <a @click="descartado">
          <span class="misiconos glyphicon glyphicon-remove text-light"></span>
        </a>Descartar
      </h3>
    </div>
    <h3 class="text-center">
      <a :href="ruta1">
        <span class="misiconos glyphicon glyphicon-repeat text-light"></span>
        <br />
      </a>Volver
    </h3>
  </div>
</template>

<script>
import { bus } from "../app";

export default {
  props: {
    id: String,
    oferta: Number,
    token: String
  },
  data: function() {
    return {
      ruta1: "/empresa/" + this.$props.id + "/published",
      ruta2: "",
      ruta3: "",
      trabajador: "",
      gris: true,
      seleccion: 0
    };
  },
  created() {
    bus.$on("trabajadorElegido", data => {
      this.trabajador = data;
      this.gris = false;
    });
  },
  mounted() {
    console.log("Barra candidatos montada");
  },

  methods: {
    seleccionado: function() {
      axios
        .post(
          route("candidatos", {
            id: this.$props.id,
            ofertaid: this.$props.oferta,

            _token: this.token
          }),
          {
            trabajador_id: this.trabajador,
            seleccion: 1
          }
        )
        .then(response => {
          console.log(response.data.success);
          if (response.data.success == 1) {
            bus.$emit("trabajadorCambiado", {
              id: this.trabajador,
              ofertaid: this.$props.oferta
            });
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    descartado: function() {
      axios
        .post(
          route("candidatos", {
            id: this.$props.id,
            ofertaid: this.$props.oferta,

            _token: this.token
          }),
          {
            trabajador_id: this.trabajador,
            seleccion: 0
          }
        )
        .then(response => {
          console.log(response.data.success);
          if (response.data.success == 1) {
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.bajando {
  padding-top: 100px;
}

@media (max-width: 1000px) {
}
</style>