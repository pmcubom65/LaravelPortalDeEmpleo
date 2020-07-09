<template>
  <div class="col-10 text-center mx-auto anchura">
    <div class="col-12 d-inline-block">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item active btn-xs-block">
              <a class="nav-link" data-toggle="tab" href="#inscritos">
                <h5 class="font-weight-bolder">
                  Inscritos
                  <span class="badge badge-light">{{inscritos.length}}</span>
                </h5>
              </a>
            </li>
            <li class="nav-item btn-xs-block">
              <a class="nav-link" data-toggle="tab" href="#seleccionados">
                <h5 class="font-weight-bolder">
                  Seleccionados
                  <span class="badge badge-light">{{seleccionados.length}}</span>
                </h5>
              </a>
            </li>
            <li class="nav-item btn-xs-block">
              <a class="nav-link" data-toggle="tab" href="#descartados">
                <h5 class="font-weight-bolder">
                  Descartados
                  <span class="badge badge-light">{{descartados.length}}</span>
                </h5>
              </a>
            </li>
          </ul>
        </div>
        <div class="card-body text-center">
          <div class="tab-content" ref="altura">
            <div id="inscritos" class="tab-pane fade show active">
              <div v-for="item in inscritos" :key="item.id">
                
                  <datoscandidatos-component :datostrabajador="item" :entrevista="false" :id="id"></datoscandidatos-component>
                
              </div>
              <div v-observe-visibility="visibilityChanged"></div>
            </div>
            <div id="seleccionados" class="tab-pane fade">
              <div v-for="item in seleccionados" :key="item.id">
               
                  <datoscandidatos-component :datostrabajador="item" :entrevista="true" :id="id"></datoscandidatos-component>
                
              </div>

              <div v-observe-visibility="visibilityChanged"></div>
            </div>
            <div id="descartados" class="tab-pane fade">
              <div v-for="item in descartados" :key="item.id">
            
                  <datoscandidatos-component :datostrabajador="item" :entrevista="false" :id="id"></datoscandidatos-component>
               
              </div>
              <div v-observe-visibility="visibilityChanged"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { bus } from "../app";

export default {
  mounted() {
    console.log("MostrarCandidatos montado");
    this.$store.dispatch("getTrabajadoresPorOferta");
  },
  computed: {
    inscritos() {
      return this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
        .inscritos;
    },

     seleccionados() {
      return this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
        .seleccionados;
    },

     descartados() {
      return this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
        .descartados;
    },

    
  },
  created() {},
  props: {
    oferta: {
      type: Number,
      required: true
    },
    id: {
      type: Number,
      required: true
    }
  },
  data() {
    return {};
  },

  methods: {
    visibilityChanged: function(isVisible, entry) {
      if (isVisible) {
        bus.$emit("fondoresultados", this.$refs.altura.clientHeight);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.anchura {
  min-width: 250px;
  margin-left: 0;
  padding-left: 0;
}
</style>