<template>
  <section>
    <div class="card animate__animated  animate__heartBeat" v-show="cabecera">
      <div class="card-body ">
        <h4
          v-if="!trabajador"
        >No tienes ningún curriculum dado de alta por el momento. No podrás inscribirte en ofertas aún</h4>
        <h4 v-else>Tienes el curriculum dado de alta</h4>
      </div>
    </div>

    <div class="container espacio2">
      <div class="row">
        <div class="col-12 text-center">
          <h1 v-show="soyunaempresa" class="text-nowrap">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <br />Complete su
            curriculum
          </h1>
        </div>
      </div>
      <div class="row justify-content-center mb-5" >
        <div class="col-sm-12 col-md-10 col-lg-8">
          <form enctype="multipart/form-data" @submit.prevent="curriculum">
            <div class="form-row">
              <div class="form-group col-sm-12">
                <input type="hidden" value="inicializar">
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
                  <option :value="provincia_i" selected>{{region}}</option>
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
                  :letrero="'Añadir Experiencia'"
                  :id="id"
                ></tooltip-component>
              </div>
            </div>
            <div v-show="!esarea">
              <div class="form-row my-3" v-show="!abierto_i">
                
                <div class="form-group col-sm-12 text-center nomargen">
                  <input
                    type="file"
                    data-cloudinary-field="image_id"
                    data-form-data="{ 'transformation': {'crop':'limit','tags':'samples','width':300,'height':200}}"
                    class="file-upload custom-file-input"
                    id="imagen"
                    name="imagen"
                    lang="es"
                    multiple="multiple"
                    @change="fileChange($event.target.name, $event.target.files)"
                  />
                  <label class="custom-file-label btn btn-success btn-lg" for="customFileLang">
                    <span class="glyphicon glyphicon-upload"></span>{{labelfile}}
                  </label>
                  <img :src="imagenver" class="imagencurriculum">
                </div>
              </div>

              <div class="form-group col-sm-9 mx-auto">
                <div id="messages" class="text-center">
                  <p class="alert" v-html="salida"></p>
                </div>
              </div>
              <div class="form-row my-3" v-show="abierto_i">
                <a type="button" href="/home" class="btn btn-success m-auto btn-lg btn-xs-block">
                  <span class="glyphicon glyphicon-ok-circle"></span> No tengo más experiencias laborales. Terminar
                </a>
              </div>

              <div class="form-row my-3" v-show="!abierto_i">
                <button type="submit" class="btn btn-success m-auto btn-lg btn-xs-block">
                  <span class="glyphicon glyphicon-ok"></span> Guardar Curriculum
                </button>
              </div>
            </div>
            <div v-show="esarea">
              <div class="form-row my-3" v-show="soyunaempresa">
                <button
                  type="button"
                  class="btn btn-success m-auto btn-lg btn-xs-block"
                  @click="editarlo"
                >Editar Curriculum</button>
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

  props: {
    nombre: {
      type: String,
      required: false
    },
     soyunaempresa: {
      type: Boolean,
      required: false,
      default: true,
    },

    region: {
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
      nombre_i: "",
      dni_i: this.$props.datostrabajador.dni,
      direccion_i: this.$props.datostrabajador.direccion,
      provincia_i: this.$props.datostrabajador.provincia_id,
      telefono_i: this.$props.datostrabajador.telefono,
      fecha_i: this.$props.fecha,

      salida: "",
      abierto_i: false,
      trabajador: this.$props.estrabajador,
      habilitado: this.$props.hhabilitado,
      file: {},
      labelfile: 'Seleccionar Archivo',
      image: '',
      imagenver: this.$props.datostrabajador.imagen ? 'images/'+this.$props.datostrabajador.imagen : 'images/No_image.jpg',
    };
  },
  methods: {
    fileChange: function(nombre,evt) {
      this.file = evt[0];
      this.labelfile=evt[0].name;
      console.log("file Object:==>", this.file);
             let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                    vm.imagenver=vm.image;
                };
                reader.readAsDataURL(this.file);

      var urlcloud=process.env.MIX_CLOUDINARY_BASE_URL
      var preset=process.env.MIX_CLOUDINARY_CLOUD_NAME
      var formDatafile=new FormData();
      formDatafile.append('file', this.file);
      formDatafile.append('upload_preset', preset);


  

      axios({
        url: urlcloud,
        method: 'POST',
        mode: 'no-cors',
        headers: {
          'Access-Control-Allow-Origin': '*',
          'Access-Control-Allow-Methods': 'POST',
          'Access-Control-Request-Headers': 'origin',
            headers: {
            'Authorization': 'Basic ' + base64.encode(process.env.MIX_CLOUDINARY_API_KEY + ":" + process.env.MIX_CLOUDINARY_API_SECRET),
          },
          'Origin': 'https://pedro-manuel-cubo-laravelvue.herokuapp.com/',
          'Content-Type' : 'application/x-www-form-urlencoded',
          'Access-Control-Allow-Headers': '*, accept, origin, Authorization, Content-Type, X-Auth-Token, Access-Control-Request-Headers, X-Requested-With, Access-Control-Request-Method'

        },
        data: formDatafile, 
      }).then((res)=>{
        console.log(res);
      }).catch((err)=>{
        console.log(err)
      })
    },


    curriculum: function() {

      axios
        .put(route("homeput"), {
          _token: this.token,
          direccion: this.direccion_i,

          Provincia: this.provincia_i,
          telefono: this.telefono_i,
          fecha: this.fecha_i,
          dni: this.dni_i,
          imagen: this.image
        })
        .then(response => {
          let valores = response.data;
           this.salida='';
          Object.entries(valores).forEach(entry => {
            if (entry[0].toString() === "success") {
              this.abierto_i = true;
              this.trabajador = true;

              this.$store.dispatch("getTrabajadores");
              this.habilitado = true;
              this.salida = entry[1].toString();

            }else {
              var campoerroneo=entry[0].toString();
              var clave=entry[1].toString();
              
              this.salida = this.salida+'  '+clave+': '+campoerroneo+'.<br/>';
            
            }
  
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

.imagencurriculum {
  width: auto; 
  height: 150px;
  margin-bottom: 0;
}

.nomargen {
  margin-bottom: 0;
}
</style>