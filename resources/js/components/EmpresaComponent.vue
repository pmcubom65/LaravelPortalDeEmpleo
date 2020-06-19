<template>
  <form id="empresaform" @submit.prevent="crearoeditar">
 
    <div class="form-row">
      <div class="form-group col-6">
        <label for="nombrer">Nombre del Representante</label>

        <input
          type="text"
          class="form-control"
          id="nombrer"
          name="nombrer"
          placeholder="Nombre del representante"
          :value="nombre"
          @change="nombre_i=$event.target.value"
          :disabled="habilitado"
        />
      </div>

      <div class="fom-group col-6">
        <label for="apellidos">Apellidos del Representante</label>
        <input
          type="text"
          class="form-control"
          id="apellidos"
          name="apellidos"
          placeholder="Apellidos del representante"
          :value="apellidos"
          @change="apellidos_i=$event.target.value"
          :disabled="habilitado"
        />
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="cif">CIF de la empresa</label>
        <input
          type="text"
          class="form-control"
          id="cif"
          name="cif"
          placeholder="cif de la empresa"
          :value="cif"
          @change="cif_i=$event.target.value"
          :disabled="habilitado"
        />
      </div>

      <div class="fom-group col-sm-6">
        <label for="direccion">Direccion de la empresa</label>
        <input
          type="text"
          class="form-control"
          id="direccion"
          name="direccion"
          placeholder="Domicilio de la empresa"
          :value="domicilio"
          @change="domicilio_i=$event.target.value"
          :disabled="habilitado"
        />
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="latitud">Latitud</label>
        <input
          type="text"
          class="form-control"
          id="latitud"
          name="latitud"
          placeholder="latitud sede de la empresa"
          :value="latitud"
          @change="latitud_i=$event.target.value"
          :disabled="habilitado"
        />
      </div>

      <div class="fom-group col-sm-6">
        <label for="longitud">Longitud</label>
        <input
          type="text"
          class="form-control"
          id="longitud"
          name="longitud"
          placeholder="longitud sede de la empresa"
          :value="longitud"
          @change="longitud_i=$event.target.value"
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
          <option :value="provincia_id" selected hidden>{{region}}</option>
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
          placeholder="Telefono"
          :value="telefono"
          @change="telefono_i=$event.target.value"
          :disabled="habilitado"
        />
      </div>

      <div class="fom-group col-sm-6">
        <label for="num">Número de empleados</label>
        <input
          type="text"
          class="form-control"
          id="num"
          name="num"
          placeholder="Número de empleados"
          :value="numero_empleados"
          @change="numero_empleados_i=$event.target.value"
          :disabled="habilitado"
        />
      </div>
    </div>
    <div class="form-group col-sm-12">
      <div id="messages" class="text-center">
        <p class="alert">{{salida}}</p>
      </div>
    </div>

    <div class="form-row my-3">
      <button type="submit" class="btn btn-success m-auto btn-lg" :disabled="abierto_i">
        <span class="glyphicon glyphicon-ok"></span> Actualizar Datos
      </button>
    </div>
  </form>
</template>


<script>
import {bus} from '../app' ;
export default {
  components: {},
  mounted() {
    console.log("Formulario de empresa montado");
  },
  props: {
    apellidos: {
      type: String,
      required: false
    },
    cif: {
      type: String,
      required: false
    },
    domicilio: {
      type: String,
      required: false
    },
    latitud: {
      type: String,
      required: false
    },
    longitud: {
      type: String,
      required: false
    },
    nombre: {
      type: String,
      required: false
    },
    numero_empleados: {
      type: Number,
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
     crearempresa: {
      type: Boolean,
      required: true
    },
    id : {
      type: String,
      required: true
    },
     token: String,
  },
  data() {
    return {
      apellidos_i: "",
      cif_i: "",
      domicilio_i: "",
      latitud_i: "",
      longitud_i: "",
      nombre_i: "",
      numero_empleados_i: 0,
      provincia_i: 0,
      telefono_i: "",
      salida: "",
      abierto_i: false
    };
  },
 


  methods : {
      crearoeditar: function() {
        
   
                  axios
          .post(route("empresa", { id: this.id }), {
            id: this.id,
            trabajador_id: this.usuario,
            _token: this.token,
            direccion: this.domicilio_i,
            nombrer: this.nombre_i,
            apellidos: this.apellidos_i,
            num: this.numero_empleados_i,
            Provincia: this.provincia_i,
            telefono: this.telefono_i,
            latitud: this.latitud_i,
            longitud: this.longitud_i,
            cif: this.cif_i

          })
          .then(response => {
            let valores = response.data;

            Object.entries(valores).forEach(entry => {
              if (entry[0].toString()==='success'){
                  this.abierto_i = true;
                  this.$store.dispatch('getEmpresas');
                  this.$props.habilitado=true;
                  this.$props.crearempresa=false;

                  bus.$emit('empresacreada');
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
