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

        <div v-if="computarcontactos" class="container my-0 ">
            <button id="contactos" class="btn btn-default btn-lg btn-link float-right " data-toggle="modal" data-target="#modalentrevista"
              >
                <span class="glyphicon glyphicon-comment float-right" :class="botar(contactos.length)"></span>
            </button>
            <span class="badge badge-notify float-right"  :class="botar(contactos.length)" style="  top: 10px;
  left: 50px;" id="mibadge"> {{ contactos.length }}</span>
        </div>



      <!--Modal de las notificaciones de la entrevista -->
         <div class="modal" tabindex="-1" role="dialog" id="modalentrevista" v-show="soyunaempresa" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Entrevistas Pendientes</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div v-if="!contactos.length">
           <h5 class="font-weight-bold">No hay entrevistas próximas en su agenda</h5>
        </div>
        <div v-else>
        <div v-for="item in contactos" :key="item.id">
          <div class="col text-center">
             <h2 class="font-weight-bold">{{buscaempresa(item.oferta_trabajador.oferta_id)}}</h2>
          <h5 class="font-weight-bold">Día de la entrevista: {{item.dia.substr(0, item.dia.indexOf(' '))}}</h5>
          <h5 class="font-weight-bold">Hora de la entrevista: {{item.hora}}</h5>
          
                  <a
                    :href="getRutaOferta(item.oferta_trabajador.oferta_id)"
                    class="btn btn-primary btn-xs-block btn-lg mb-5"
                   
                  >Ver detalles completos de la Oferta</a>
          </div>

          <mapa-component :objeto="{
            lat: item.latitud,
            lng: item.longitud,
            domicilio: item.direccion
          }"></mapa-component>
        </div>
        </div>
      </div>
      <div class="modal-footer">
         <div class="col text-center">
        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

 <!--Modal de las notificaciones de la entrevista -->

  <!--Panel de mi área -->

    <div class="jumbotron jumbotron-fluid" id="jumbotronarea" v-show="modelestrabajador">
      <div class="container">
        <div class="row">
          <div class="col-5 text-center titular  ">
            <img :src="'/images/'+datostrabajador.imagen" class=" img-responsive mifoto" alt="Image" />
          </div>
          <div class="col-7  text-left titular" id="area">
            <div v-if="soyunaempresa">
            <h1  class="display-4 d-none d-sm-block">Mi área</h1>
             <p  class="lead text-nowrap d-none d-sm-block">Acceda a sus datos y a sus candidaturas</p>
            </div>
            <div v-else class="d-block">
            <h2  class="display-4 d-none d-sm-block tituloemp">{{ nombre }}</h2>
            </div>
           
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
                  class="nav-link btn-lg"  
                  v-bind:class="[ !tab ? 'active' : '' ]"
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
                  class="nav-link btn-lg"  v-bind:class="[ tab ? 'active' : '' ]"
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
          <div class="tab-pane fade show" id="nav-item-01" role="tabpanel"  v-bind:class="[ !tab ? 'active' : '' ]">
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
                  @click="emitirexperiencia(item.id)"
                  data-target="#sitiomodalexperiencia"
                  v-show="!soyunaempresa"
                >Ver Detalles de la Experiencia</button>
              </div>
            </div>
          </div>
          <div class="tab-pane  fade show" id="nav-item-03" role="tabpanel"  v-bind:class="[ tab ? 'active' : '' ]">
            <div v-if="computar">
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
    },
    computar(){
      return this.$props.soyunaempresa && this.$props.candidaturas && this.$props.candidaturas.length>0;
    },
    computarcontactos() {
      return this.$props.soyunaempresa && this.modelestrabajador && this.$props.contactos;
    },

    tab() {

      return (this.$store.state.mostrarcandidaturas==="true");
    },

 


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
      required: false,
      default: function() {
        return []
      }
    },

    contactos: {
      type: Array,
      required: false,
      default: function() {
        return []
      }
    },




    hhabilitado: {
      type: Boolean,
      required: false
    },
    estrabajador: {
      type: Boolean,
      required: false,
      default: true
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
      modelestrabajador: this.$props.estrabajador,

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
    },

    buscaempresa: function(id) {
      console.log('oferta_id'+id)
      return this.empresanombre(this.$props.candidaturas.find(candidatura => candidatura.id == id).empresa_id);
    },
    emitirexperiencia: function(id) {
      bus.$emit('experienciaseleccionada', id);
    },

       botar : function(valor) {

        if (valor==0) {
      return '';
        } else {
          return 'animate__animated animate__bounce animate__repeat-3';
        }
    }

}
}
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
  max-height: 100px;
  
  float: right;
@media (max-width: 767.98px)  {
    float: none;
   margin-left: 60px;
   height: auto;
   min-width: 80px;
    
  }

 
 
}



#area {
  padding-top: 25px;
}

#contactos {
  font-size: 36px;
}

#mibadge {
  color: white !important;
  
}

.glyphicon:hover {
 

  -webkit-animation: none;
  -moz-animation:  none;
    animation:  none;

@-webkit-keyframes spin {100%{-webkit-transform: none;}}
@-moz-keyframes spin {100%{-moz-transform: none;}}
@keyframes spin {100%{-webkit-transform: none;transform:none;}}
}


.modal-body {
  overflow: hidden;
}

.tituloemp {
  text-align: left;
  @media (max-width: 767.98px)  {
  font-size: 2.3em;
 
  text-align: right;
 
  }
}
</style>