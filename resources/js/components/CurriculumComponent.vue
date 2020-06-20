<template>
  <section class="espacio">
    <div class="container">
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
                  id="nombre"
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
                  id="dni"
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
                  id="direccion"
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
                  id="Provincia"
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
                  id="telefono"
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
                  id="fecha"
                  name="fecha"
                  v-model="fecha_i"
                  @change="fecha_i=$event.target.value"
                  :disabled="habilitado"
                />
              </div>
            </div>

            <div class="form-row my-3" v-show="estrabajador">
              <a
                class="btn btn-primary m-auto btn-lg btn-xs-block"
                data-toggle="modal"
                data-target="#sitiomodal"
              >Añadir Experiencia</a>
            </div>

            <div class="form-row my-3">
              <div class="form-group col-sm-12 text-center">
                <label class="btn btn-primary btn-lg" for="imagen">
                  <input
                    type="file"
                    class="d-none"
                    style="margin: 0 auto !important;"
                    id="imagen"
                    name="imagen"
                  /><span
                            class="glyphicon glyphicon-upload"></span>
                   Subir Foto
                </label>
              </div>
            </div>
            <div class="form-group col-sm-12">
              <div id="messages" class="text-center">
                <p class="alert">{{salida}}</p>
              </div>
            </div>

            <div class="form-row my-3">
              <button
                type="submit"
                class="btn btn-success m-auto btn-lg btn-xs-block" :disabled="abierto_i"
              ><span
                            class="glyphicon glyphicon-ok"></span> Guardar Curriculum</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import {bus} from '../app' ;

export default {
  mounted() {
    console.log("Curriculum montado");
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
    habilitado: {
      type: Boolean,
      required: false
    },
    estrabajador: {
      type: Boolean,
      required: false
    },
    fecha: {
      type: String,
      required: false
    },
    token: String
  },

  data() {
    return {
      nombre_i: this.$props.nombre,
      dni_i: this.$props.dni,
      direccion_i: this.$props.direccion,
      provincia_i: this.$props.provincia_id,
      telefono_i: this.$props.telefono,
      fecha_i: this.$props.fecha,
      salida: '',
      abierto_i: false,
      
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
          console.log(response);

            let valores = response.data;

            Object.entries(valores).forEach(entry => {
              if (entry[0].toString()==='success'){
                  this.abierto_i = true;
                  this.estrabajador=true;

                  this.$store.dispatch('getTrabajadores');
                  this.$props.habilitado=true;
                  this.salida = entry[1].toString();

                  bus.$emit('trabajadorcreado');
              } 
              
              this.salida = entry[1].toString();

            });
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>