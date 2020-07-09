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
                  <span class="badge badge-light">{{sumainscritos}}</span>
                </h5>
              </a>
            </li>
            <li class="nav-item btn-xs-block">
              <a class="nav-link" data-toggle="tab" href="#seleccionados">
                <h5 class="font-weight-bolder">
                  Seleccionados
                  <span class="badge badge-light">{{sumaseleccionados}}</span>
                </h5>
              </a>
            </li>
            <li class="nav-item btn-xs-block">
              <a class="nav-link" data-toggle="tab" href="#descartados">
                <h5 class="font-weight-bolder">
                  Descartados
                  <span class="badge badge-light">{{sumadescartados}}</span>
                </h5>
              </a>
            </li>
          </ul>
        </div>
        <div class="card-body text-center">
          <div class="tab-content" ref="altura">
            <div id="inscritos" class="tab-pane fade show active">
              <div v-for="item in lista" :key="item.id">
                <div v-if="item.seleccionado === null">
                  <datoscandidatos-component :datostrabajador="item" :entrevista="false" :id="id"></datoscandidatos-component>
                </div>
              </div>
              <div v-observe-visibility="visibilityChanged"></div>
            </div>
            <div id="seleccionados" class="tab-pane fade">
              <div v-for="item in lista" :key="item.id">
                <div v-if="item.seleccionado==1 && item">
                  <datoscandidatos-component :datostrabajador="item" :entrevista="true" :id="id"></datoscandidatos-component>
                </div>
              </div>

              <div v-observe-visibility="visibilityChanged"></div>
            </div>
            <div id="descartados" class="tab-pane fade">
              <div v-for="item in lista" :key="item.id">
                <div v-if="item.seleccionado==0 && item">
                  <datoscandidatos-component :datostrabajador="item" :entrevista="false" :id="id"></datoscandidatos-component>
                </div>
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
    lista() {
      return this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
        .lista;
    },

    sumainscritos() {
      return this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
        .inscritos
        ? this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
            .inscritos
        : 0;
    },
    sumaseleccionados() {
      return this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
        .seleccionados
        ? this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
            .seleccionados
        : 0;
    },
    sumadescartados() {
      return this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
        .descartados
        ? this.$store.getters.getTrabajadorByOferta(this.$props.oferta)
            .descartados
        : 0;
    }
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