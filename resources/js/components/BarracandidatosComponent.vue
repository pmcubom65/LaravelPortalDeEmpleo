<template>
<div>
  <div v-observe-visibility="visibilityChanged"></div>
  <div id="sideBar" class="col-2 pb-0 inicio espacio"
       v-infinite-scroll="loadMore"
      infinite-scroll-disabled="busy"
      infinite-scroll-distance="0">
    <div class="bajando " v-if="gris">
      <h3 class="text-center text-secondary"  :style="{ 'padding-top': computar }">
        <a>
          <span class="misiconos glyphicon glyphicon-ok text-secondary"></span>
        </a><span class="d-block">Seleccionar</span>
      </h3>

      <h3 class="text-center text-secondary">
        <a>
          <span class="misiconos glyphicon glyphicon-remove text-secondary"></span>
        </a><span class="d-block">Descartar</span>
      </h3>
    </div>
    <div v-else>
      <h3 class="text-center">
        <a @click="seleccionado">
          <span class="misiconos glyphicon glyphicon-ok text-light"></span>
        </a><span class="d-block">Seleccionar</span>
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
        </a><span class="d-block">Descartar</span>
      </h3>
    </div>
    <h3 class="text-center">
      <a :href="ruta1">
        <span class="misiconos glyphicon glyphicon-repeat text-light"></span>
        <br />
      </a><span class="d-block">Volver</span>
    </h3>
  </div>
  </div>
</template>

<script>
import { bus } from "../app";

export default {
  props: {
    id: String,
    oferta: Number,
    token: String,
   
  },
  computed : {
       computar() {
      return String(this.padding + "px");
    }
  },
  data: function() {
    return {
      ruta1: "/empresa/" + this.$props.id + "/published",
      ruta2: "",
      ruta3: "",
      trabajador: 0,
      gris: true,
      seleccion: 0,
      padding: 10,
      fondo: false,
    };
  },
  created() {
    bus.$on("trabajadorElegido", data => {
  
      this.gris = false;
      this.trabajador=data.trabajador_id;
    });



     bus.$on("fondoresultados", (data) => {
       this.padding=data-250;
       this.fondo=true;
    });
  },
  mounted() {
    console.log("Barra candidatos montada");
       this.$store.dispatch("getTrabajadoresPorOferta");
  },

  methods: {
       loadMore: function() {

        
      this.busy = true;
    
   if (!this.fondo) {
        this.padding = this.padding + 100;
        }

      this.busy = false;
       
    },
        visibilityChanged: function(isVisible, entry) {
        if (isVisible) {
            this.padding=10;
        }
    },
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
            console.log('trabajador seleccionado')
              this.$store.dispatch("getTrabajadoresPorOferta");
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
            console.log('trabajador descartado')
              this.$store.dispatch("getTrabajadoresPorOferta");
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
  padding-top: 10px;
}


</style>