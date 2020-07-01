<template>
  <div class="container-fluid">

   <sidebarvolver-component :id="id" :oferta="oferta"></sidebarvolver-component>

    <div class="row col-10 espacio2 float-right">
      <div class="col-10 text-center mx-auto">
        <h1>
          <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
          <br />Contactar con el candidato
        </h1>
      </div>

      <div class="row-fluid col-10 d-inline-block mx-auto">
        <form id="contactoform" @submit.prevent="crearcontacto">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="dater">Día de la entrevista</label>

              <input
                type="date"
                class="form-control"
                id="dater"
                name="dater"
                v-model="fecha_i"
                @change="fecha_i=$event.target.value"
                :disabled="habilitado"
              />
            </div>

            <div class="fom-group col-md-6">
              <label for="horar">Hora de la entrevista</label>
              <input
                type="time"
                class="form-control"
                id="horar"
                name="horar"
                v-model="hora_i"
                @change="hora_i=$event.target.value"
                :disabled="habilitado"
              />
            </div>
          </div>
          <h3
            class="text-center"
          >Localización alternativa de la entrevista (si no es la sede de la empresa)</h3>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="direccionr">Direccion</label>

              <input
                type="text"
                class="form-control"
                id="direccionr"
                name="direccionr"
                v-model="direccion_i"
                @change="direccion_i=$event.target.value"
                :disabled="habilitado"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="latr">Latitud</label>

              <input
                type="text"
                class="form-control"
                id="latr"
                name="latr"
                v-model="latitud_i"
                @change="latitud_i=$event.target.value"
                :disabled="habilitado"
              />
            </div>

            <div class="fom-group col-md-6">
              <label for="longr">Longitud</label>
              <input
                type="text"
                class="form-control"
                id="longr"
                name="longr"
                v-model="longitud_i"
                @change="longitud_i=$event.target.value"
                :disabled="habilitado"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-12 text-center py-2">
              <button
                type="submit"
                id="contactar"
                name="contactar"
                class="btn btn-success btn-lg btn-xs-block"
              >
                <span class="glyphicon glyphicon-ok"></span>
                {{ abierto_i }}
              </button>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-12 text-center">
              <div id="mensajes">
                  <p class="alert">{{salida}}</p>
                  </div>
            </div>
          </div>
        </form>

        <h2 class="text-center">Localización de la empresa</h2>
        <h3
          class="text-center"
        >Si ha introducido una ubicacion alternativa, la visualizará en el mapa</h3>
        <div id="contenedormapa">
        <mapa-component
          :objeto="{lat: this.latitud_i,
                                        lng: this.longitud_i,
                                        domicilio: this.direccion_i
            }"
        ></mapa-component>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  mounted() {
    console.log("Entrevista montada.");
  },
  props: {
    oferta: {
      type: Number,
      required: true
    },
    id: {
      type: Number,
      required: true
    },
    trabajador: {
      type: Number,
      required: true
    },
    empresa: {
      type: Object,
      required: true
    },
    hhabilitado: Boolean,
    token: String
  },
  data() {
    return {
      fecha_i: "",
      hora_i: "",
      direccion_i: this.$props.empresa.domicilio,
      latitud_i: this.$props.empresa.latitud,
      longitud_i: this.$props.empresa.longitud,
      habilitado: this.$props.hhabilitado,
      salida: "",
      abierto_i: "Contactar con el candidato",
      crear: true,

   
    };
  },
  methods: {
    crearcontacto: function() {
          if (this.crear) {
        

      axios
        .post(
          route("contacto", {
            id: this.$props.id,
            ofertaid: this.$props.oferta,
            tid: this.$props.trabajador
          }),
          {
            dater: this.fecha_i,
            horar: this.hora_i,
            _token: this.token,
            direccionr: this.direccion_i,
            latr: this.latitud_i,
            longr: this.longitud_i
          }
        )
        .then(response => {
          let valores = response.data;

          Object.entries(valores).forEach(entry => {
            if (entry[0].toString() === "success") {
                 this.crear = false;
              this.abierto_i = "Editar datos de la entrevista";

              this.habilitado = true;
            }

            this.salida = entry[1].toString();
          });
             
        })
        .catch(function(error) {
          console.log(error);
        });

      

    }  else {
            this.habilitado=false;
            this.salida='';
            this.crear=true;
        }
  }
}
}
</script>

<style lang="scss" scoped>

#contenedormapa {
margin-left:90px;
}

@media (max-width: 767.98px) { 

#contenedormapa {
margin-left: -120px;
}
}
.alert {
  font-size: 1.5rem;
}
</style>