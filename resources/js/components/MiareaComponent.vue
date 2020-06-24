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
          <div class="col-12 text-center titular">
            <h1 class="display-4">Mi área</h1>
            <p class="lead">Acceda a sus datos y a sus candidaturas</p>
            <hr />
          </div>
        </div>
        <div class="row text-center mb-5" v-if="getExperiencias">
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
                  <span class="badge badge-light">
                    <!--contar experiencias-->
                    {{getExperiencias.length}}
                  </span>
                </a>
              </li>
              <li class="nav-item btn-xs-block">
                <a
                  class="nav-link btn-lg"
                  id="nav-pills-03"
                  data-toggle="pill"
                  href="#nav-item-03"
                   v-tooltip="{ content: 'Aquí obtendrás información sobre las ofertas en las que te has inscrito', show: false }" 
                >Candidaturas</a>
                <span class="badge badge-notify float-right">
                  <!-- {{isset($candidaturas) ? $candidaturas->count() : 0 }}
                       
                  Contar candidaturas-->
                  {{candidaturas.length}}
                </span>
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
            ></curriculum-component>
          </div>
          <div class="tab-pane fade" id="nav-item-02" role="tabpanel">
            <div class="form-row my-3 justify-content-center">
              <tooltip-component
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

                <a :href="getRuta(item.id)" class="btn btn-primary btn-xs-block btn-lg">
                  Editar o
                  Borrar
                </a>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-item-03" role="tabpanel">
            <div v-if="candidaturas.length>0">
            <div class="card" v-for="item in candidaturas" :key="item.id">
              <h5 class="card-header text-center">{{item.titulo}}</h5>

              <div class="card-body text-center">
                  
                <h5 class="card-title text-center">Fecha de inscripción en la oferta: {{item.pivot.updated_at}}</h5>
                <h5 class="card-title text-center">{{empresanombre(item.empresa_id)}}</h5>
                <p class="card-text text-center">Salario: {{item.salario}} euros</p>
                <p class="card-text text-center">Provincia: {{provincias[item.provincia_id].region_name}}</p>
             
                <p class="card-text text-center alert" v-if="item.proceso==1">Candidatura Abierta</p>
                <p class="card-text text-center alert" v-if="item.proceso==0">Candidatura Cerrada</p>
                <p class="card-text text-center alert" v-if="item.pivot.seleccionado==1">La Empresa te ha seleccionado</p>

                <a :href="getRutaOferta(item.id)" class="btn btn-primary btn-xs-block btn-lg" :disabled="item.proceso==0">
                  Ver detalles completos de la Oferta
                </a>
              </div>
            </div>
            </div>


                         

                        <!--        <a class="btn btn-primary btn-block font-weight-bold" data-toggle="collapse"
                                    href="#collapseExample{{$oferta->id}}" role="button" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    {{$oferta->titulo}} - Categoria: {{$oferta->categoria->nombre}} - Salario:
                                    {{$oferta->salario}} euros brutos
                                </a>

                            </p>
                            <div class="collapse" id="collapseExample{{$oferta->id}}">
                                <div class="card card-body text-center">
                                    <h5 class="font-weight-bold card-title">Empresa: {{$oferta->empresa->usuario->name}}
                                        - Inscrito en la oferta desde: {{$oferta->created_at}}</h5>
                                    <p><span class="font-weight-bold">Descripción de la oferta:</span>
                                        {{$oferta->descripcion}}</p>
                                    <p><span class="font-weight-bold">Provincia:</span>
                                        {{$oferta->provincia->region_name}}</p>
                                    <p><span class="font-weight-bold">Contrato:</span> {{$oferta->contrato->nombre}}</p>
                                    @if ($oferta->pivot->seleccionado===1)
                                    <p><span class="font-weight-bold alert">Seleccionado:</span> Has pasado a
                                        seleccionado</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            @endforeach
                            @endif
            </p>-->
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
    
  },

  props: {
    nombre: {
      type: String,
      required: false
    },
    dni: {
      type: String,
      required: false
    },
    direccion: {
      type: String,
      required: false
    },

    provincia_id: {
      type: Number,
      required: false
    },
    region: {
      type: String,
      required: false
    },
    telefono: {
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
    empresanombre : function(user_id) {
      
      const nombreempresa=this.getEmpresas.filter(empresa => {
        
          return empresa.id==user_id
      });

      if (typeof nombreempresa[0] === "undefined") {
        return '';
      }else {
          return  nombreempresa[0].name;
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
</style>