<template>
  <section>
   
    <div class="card" v-show="cabecera">
      <div class="card-body">
        <h4
          v-if="!trabajador"
        >No tienes ningún curriculum dado de alta por el momento. No podrás inscribirte en ofertas aún</h4>
        <h4 v-else>Tienes el curriculum dado de alta</h4>
      </div>
    </div>

    <div class="container espacio2">
      <div class="row">
        <div class="col-12 text-center">
          <h1>
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <br />Complete su
            curriculum
          </h1>
        </div>
      </div>
      <div class="row justify-content-center mb-5">
        <div class="col-sm-12 col-md-10 col-lg-8">
          <form @submit.prevent="curriculum">
            <div class="form-row">
              <div class="form-group col-sm-12">
                <label for="nombre">Nombre Completo</label>
                <input
                  type="text"
                  class="form-control"
                
                  name="nombre"
                  placeholder="nombre"
                  :value="nombre"
                  disabled="true"
                />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-sm-6">
                <label for="dni">DNI</label>

                <input
                  type="text"
                  class="form-control"
               
                  name="dni"
                  placeholder="Dni"
                  v-model="dni_i"
                  @change="dni_i=$event.target.value"
                  :disabled="habilitado"
                />
              </div>

              <div class="fom-group col-sm-6">
                <label for="direccion">Direccion</label>

                <input
                  type="text"
                  class="form-control"
                
                  name="direccion"
                  placeholder="Direccion"
                  v-model="direccion_i"
                  @change="direccion_i=$event.target.value"
                  :disabled="habilitado"
                />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-12">
                <label for="Provincia">Provincia</label>
                <select
                  class="form-control"
            
                  name="Provincia"
                  :disabled="habilitado"
                  @change="provincia_i=$event.target.value"
                >
                  <option :value="provincia_id" selected>{{region}}</option>
                  <option
                    v-for="item in provincias"
                    v-bind:key="item.id"
                    :value="item.id"
                  >{{item.region_name}}</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-sm-6">
                <label for="telefono">Telefono</label>

                <input
                  type="text"
                  class="form-control"
          
                  name="telefono"
                  placeholder="telefono"
                  v-model="telefono_i"
                  @change="telefono_i=$event.target.value"
                  :disabled="habilitado"
                />
              </div>

              <div class="fom-group col-sm-6">
                <label for="fecha">Fecha de nacimiento</label>

                <input
                  type="date"
                  class="form-control"
                  
                  name="fecha"
                  v-model="fecha_i"
                  @change="fecha_i=$event.target.value"
                  :disabled="habilitado"
                />
              </div>
            </div>

            <div class="form-row my-3" v-show="trabajador">
              <div class="form-group col-sm-12 text-center">
                <tooltip-component
                  :contenidotooltip="{ content: 'Añade aquí tus experiencias laborales.', show: 5000 }"
                  :contenidoslot="'Tienes registradas '+String(getNumeroExperiencias) + ' experiencias'"
                  :letrero="'Añadir Experiencia'"
                  :experiencia="true"
                ></tooltip-component>
              </div>
            </div>
            <div v-show="!esarea">
            <div class="form-row my-3"  v-show="!abierto_i">
              <div class="form-group col-sm-12 text-center">
                <label class="btn btn-primary btn-lg" for="imagen" >
                  <input
                    type="file"
                    class="d-none"
                    style="margin: 0 auto !important;"
                    id="imagen"
                    name="imagen"
                    
                  />
                  <span class="glyphicon glyphicon-upload"></span>
                  Subir Foto
                </label>
              </div>
            </div>
            
            <div class="form-group col-sm-12">
              <div id="messages" class="text-center">
                <p class="alert">{{salida}}</p>
              </div>
            </div>
            <div class="form-row my-3" v-show="abierto_i">
              <button type="button" href="/home" class="btn btn-success m-auto btn-lg btn-xs-block">
                <span class="glyphicon glyphicon-ok-circle"></span> No tengo más experiencias laborales. Terminar
              </button>
            </div>

            <div class="form-row my-3" v-show="!abierto_i">
              <button type="submit" class="btn btn-success m-auto btn-lg btn-xs-block">
                <span class="glyphicon glyphicon-ok"></span> Guardar Curriculum
              </button>
            </div>


            </div>
            <div v-show="esarea">
            <div class="form-row my-3" >
              <button type="button" class="btn btn-success m-auto btn-lg btn-xs-block" @click="editarlo">
                 Editar Curriculum
              </button>
            </div>


            </div>
          </form>
        </div>
      </div>
    </div>
  
  </section>
</template>

<script>
import { bus } from "../app";

export default {
  mounted() {
    console.log("Curriculum montado");
    this.$store.dispatch("getTrabajadores");
   
  },
  computed: {
    getNumeroExperiencias() {
      return this.$store.getters.numero_experiencias(this.$props.id);
    }
  },
  props: {
    nombre: {
      type: String,
      required: false
    },
    dni: {
      type: String,
      required: false,
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
       esarea: {
      type: Boolean,
      required: false
    },
    fecha: {
      type: String,
      required: false
    },
      datostrabajador: {
      type: Object,
      required: false
    },
    token: String,
    id: String
  },

  data() {
    return {
      nombre_i: this.$props.datostrabajador.nombre,
      dni_i:  this.$props.datostrabajador.dni,
      direccion_i:  this.$props.datostrabajador.direccion,
      provincia_i: this.$props.datostrabajador.provincia_id,
      telefono_i: this.$props.datostrabajador.telefono,
      fecha_i: this.$props.fecha,
      
      salida: "",
      abierto_i: false,
      trabajador: this.$props.estrabajador,
      habilitado: this.$props.hhabilitado,
      
    };
  },
  methods: {
    curriculum: function() {
      axios
        .put(route("homeput"), {
          _token: this.token,
          direccion: this.direccion_i,

          Provincia: this.provincia_i,
          telefono: this.telefono_i,
          fecha: this.fecha_i,
          dni: this.dni_i
        })
        .then(response => {
          let valores = response.data;

          Object.entries(valores).forEach(entry => {
            if (entry[0].toString() === "success") {
              this.abierto_i = true;
              this.trabajador = true;

              this.$store.dispatch("getTrabajadores");
              this.habilitado = true;
              this.salida = entry[1].toString();

              bus.$emit("trabajadorcreado");
            }

            this.salida = entry[1].toString();
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    editarlo: function() {
        bus.$emit("editarcurriculum");
    }
  }
};
</script>


<style scoped>
.alert {
  font-size: 1.5rem;
}
</style>