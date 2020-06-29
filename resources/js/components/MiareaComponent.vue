<template >
  <div>
    <div v-show="!modelestrabajador">
      <curriculum-component
        :hhabilitado="false"
        :estrabajador="true"
        :token="token"
        :provincias="provincias"
        :nombre="nombre"
        :id="id"
        :cabecera="true"
        :datostrabajador="datostrabajador"
        :fecha="fecha"
        :region="region"
      ></curriculum-component>
    </div>

    <div class="jumbotron jumbotron-fluid" id="jumbotronarea" v-show="modelestrabajador">
      <div class="container">
        <div class="row">
          <div class="col-5 text-center titular">
            <img :src="'/images/'+datostrabajador.imagen" class="mifoto" alt="Image" />
          </div>
          <div class="col-7 text-left titular" id="area">
            <h1 v-if="soyunaempresa" class="display-4">Mi área</h1>
            <h1 v-else class="display-4">{{ nombre }}</h1>
            <p v-show="soyunaempresa" class="lead">Acceda a sus datos y a sus candidaturas</p>
          </div>
        </div>
        <hr />

        <div class="row text-center mb-5" v-if="getExperiencias && soyunaempresa">
          <div class="col-12 mx-auto">
            <buscarcategoriatrabajador-component :token="token" :categoria_id="getUltimaCategoria"></buscarcategoriatrabajador-component>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <ul class="nav nav-pills justify-content-center" id="pills-nav" role="tablist">
              <li class="nav-item btn-xs-block">
                <a
                  class="nav-link active btn-lg"
                  id="nav-pills-01"
                  data-toggle="pill"
                  href="#nav-item-01"
                >
                  Datos
                  Personales
                </a>
              </li>
              <li class="nav-item btn-xs-block">
                <a class="nav-link btn-lg" id="nav-pills-02" data-toggle="pill" href="#nav-item-02">
                  Experiencias
                  Laborales
                  <span
                    class="badge badge-light"
                    v-if="getExperiencias"
                  >
                    <!--contar experiencias-->
                    {{getExperiencias.length}}
                  </span>
                </a>
              </li>
              <li class="nav-item btn-xs-block" v-show="soyunaempresa">
                <a
                  class="nav-link btn-lg"
                  id="nav-pills-03"
                  data-toggle="pill"
                  href="#nav-item-03"
                  v-tooltip="{ content: 'Aquí obtendrás información sobre las ofertas en las que te has inscrito', show: false }"
                >
                  Candidaturas
                  <span
                    class="badge badge-notify"
                    v-if="candidaturas"
                  >{{candidaturas.length}}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="tab-content" id="nav-pills-content">
          <div class="tab-pane fade show active" id="nav-item-01" role="tabpanel">
            <!--Curriculum relleno-->
            <curriculum-component
              :hhabilitado="true"
              :estrabajador="false"
              :token="token"
              :provincias="provincias"
              :nombre="nombre"
              :id="id"
              :cabecera="false"
              :esarea="true"
              :datostrabajador="datostrabajador"
              :fecha="fecha"
              :region="region"
              :soyunaempresa="soyunaempresa"
            ></curriculum-component>
          </div>
          <div class="tab-pane fade" id="nav-item-02" role="tabpanel">
            <div class="form-row my-3 justify-content-center">
              <tooltip-component
                v-show="soyunaempresa"
                :contenidotooltip="{ content: 'Añade aquí tus experiencias laborales.', show: false }"
                :letrero="'Añadir Experiencia'"
                :id="id"
              ></tooltip-component>
            </div>
            <div class="card" v-for="item in getExperiencias" :key="item.id">
              <h5 class="card-header text-center">{{item.puesto}} - {{item.nombre}}</h5>

              <div class="card-body text-center">
                <h5 class="card-title text-center">{{item.empresa}}</h5>
                <p class="card-text text-center">{{item.descripcion}}</p>
                <p class="card-text text-center">Desde: {{item.inicio}}</p>
                <p class="card-text text-center">Hasta: {{item.fin}}</p>

                <a
                  :href="getRuta(item.id)"
                  class="btn btn-primary btn-xs-block btn-lg"
                  v-show="soyunaempresa"
                >
                  Editar o
                  Borrar
                </a>

                <button
                  type="button"
                  class="btn btn-lg btn-primary"
                  data-toggle="modal"
                  data-target="#sitiomodalexperiencia"
                  v-show="!soyunaempresa"
                >Ver Detalles de la Experiencia</button>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-item-03" role="tabpanel">
            <div v-if="candidaturas && candidaturas.length>0" &#x26;&#x26; soyunaempresa>
              <div class="card" v-for="item in candidaturas" :key="item.id">
                <h5 class="card-header text-center">{{item.titulo}}</h5>

                <div class="card-body text-center">
                  <h5
                    class="card-title text-center"
                  >Fecha de inscripción en la oferta: {{item.pivot.updated_at}}</h5>
                  <h5 class="card-title text-center">{{empresanombre(item.empresa_id)}}</h5>
                  <p class="card-text text-center">Salario: {{item.salario}} euros</p>
                  <p
                    class="card-text text-center"
                  >Provincia: {{provincias[item.provincia_id].region_name}}</p>

                  <p class="card-text text-center alert" v-if="item.proceso==1">Candidatura Abierta</p>
                  <p class="card-text text-center alert" v-if="item.proceso==0">Candidatura Cerrada</p>
                  <p
                    class="card-text text-center alert"
                    v-if="item.pivot.seleccionado==1"
                  >La Empresa te ha seleccionado</p>

                  <a
                    :href="getRutaOferta(item.id)"
                    class="btn btn-primary btn-xs-block btn-lg"
                    :disabled="item.proceso==0"
                  >Ver detalles completos de la Oferta</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { bus } from "../app";
import { getExperiencias } from "../store/actions";
export default {
  mounted() {
    console.log("Perfil montado");
    this.$store.dispatch("getTrabajadores");
    this.$store.dispatch("getExperiencias");
    this.$store.dispatch("getEmpresas");
  },
  created() {
    bus.$on("editarcurriculum", () => {
      this.modelestrabajador = false;
    });
  },
  computed: {
    getExperiencias() {
      return this.$store.getters.getExperienciasById(this.$props.id);
    },
    getUltimaCategoria() {
      var arrayexperiencias = this.$store.getters.getExperienciasById(
        this.$props.id
      );

      if (typeof arrayexperiencias[0] === "undefined") {
        return "0";
      } else {
        return String(arrayexperiencias[0].categoria_id);
      }
    },
    getEmpresas() {
      return this.$store.state.empresas;
    }
  },

  props: {
    nombre: {
      type: String,
      required: false
    },
    soyunaempresa: {
      type: Boolean,
      required: false,
      default: true
    },

    region: {
      type: String,
      required: false
    },

    provincias: {
      type: Array,
      required: false
    },

    candidaturas: {
      type: Array,
      required: false
    },
    hhabilitado: {
      type: Boolean,
      required: false
    },
    estrabajador: {
      type: Boolean,
      required: false
    },
    cabecera: {
      type: Boolean,
      required: false,
      default: true
    },
    fecha: {
      type: String,
      required: false
    },
    token: String,
    id: String,

    datostrabajador: {
      type: Object,
      required: false
    }
  },

  data() {
    return {
      modelestrabajador: this.$props.estrabajador
    };
  },

  methods: {
    getRuta: function(id) {
      return "/home/Expe/" + id;
    },

    getRutaOferta: function(id) {
      return "/search/" + id;
    },
    empresanombre: function(user_id) {
      const nombreempresa = this.getEmpresas.filter(empresa => {
        return empresa.id == user_id;
      });

      if (typeof nombreempresa[0] === "undefined") {
        return "";
      } else {
        return nombreempresa[0].name;
      }
    }
  }
};
</script>


<style lang="scss" scoped>
.tab-pane,
.titular {
  color: white;
}

.card-header {
  background-color: black;
}

.mifoto {
  width: auto;
  height: 100px;
  float: right;
}

#area {
  padding-top: 25px;
}
</style>