<template>
  <div>
    <div v-observe-visibility="visibilityChanged"></div>
    <div
      id="sideBar"
      class="col-2 pb-0 inicio espacio"
      v-infinite-scroll="loadMore"
      infinite-scroll-disabled="busy"
      infinite-scroll-distance="0"
    >
      <h3 class="text-center" :style="{ 'padding-top': computar }">
        <a :href="mutableoferta">
          <span class="misiconos glyphicon glyphicon-flag text-light"></span>
          <br />
        </a><span class="d-block">Ver oferta Seleccionada</span>
      </h3>

      <h3 class="text-center">
        <a href="/#buscar">
          <span class="misiconos glyphicon glyphicon-eye-open text-light"></span>
        </a><span class="d-block">Cambiar busqueda</span>
      </h3>

      <h3 class="text-center">
        <a :href="mihref">
          <span class="misiconos glyphicon glyphicon-paperclip text-light"></span>
        </a><span class="d-block">Gestionar Candidaturas</span>
      </h3>
    </div>
  </div>
</template>

<script>
import { bus } from "../app";

export default {
  props: {
    mihref: String,
    mioferta: String,
    elementos: Number
  },
  computed: {
    computar() {
      return String(this.padding + "px");
    }
  },
  data() {
    return {
      mutableoferta: JSON.parse(this.mioferta),
      padding: 20
    };
  },
  created() {
    bus.$on("ofertaElegida", data => {
      var ruta = "/search/" + data;
      this.mutableoferta = ruta;
    });
  },
  mounted() {
    console.log("Barra busqueda montada");
  },
  methods: {
    loadMore: function() {
      this.busy = true;

      if (this.elementos * 70 > this.padding) {
        this.padding = this.padding + 100;
      }

      this.busy = false;
    },
    visibilityChanged: function(isVisible, entry) {
        if (isVisible) {
            this.padding=30;
        }
    }
  }
};
</script>
